<?php

class Product extends CI_Controller
{
    public function index()
    {
        // echo "I am index function";
        $products = $this->db->get('products');
        $this->load->view('product/index', ['products' => $products]);
    }

    public function create()
    {
        // $_POST['name']  is similar to $this->input->post('name');

        // start validations
        $this->form_validation->set_rules('name', 'product name', 'required|min_length[1]|is_unique[products.name]');
        $this->form_validation->set_rules('description', 'product description', 'required');
        $this->form_validation->set_rules('price', 'product price', 'required');
        // end validation

        // image uploading here

        $config['upload_path'] = './documents/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; // kb
        $config['max_width']            = 1024; // px
        $config['max_height']           = 768; // px


        $this->load->library('upload', $config);

        $fileUploadError = false;
        if ($this->upload->do_upload('product_photo')) {
            // successfully uploaded
            $response = ['upload_data' => $this->upload->data()];
        } else {
            // error while uploaded
            $fileUploadError = true;
            $response = ['error' => $this->upload->display_errors()];
        }

        if ($this->form_validation->run() == false or $fileUploadError) {
            // default is false and validation fail also make it false
            $this->load->view('product/create', $response);
        } else {

            $fileName = $response['upload_data']['file_name'];

            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'photo' => $fileName
            ];
            $this->db->insert('products', $data);
            redirect('product/');
        }
    }
    public function delete($id)
    {
        print_r($id);
        $this->db->delete('products', ['id' => $id]);
        redirect('product');
    }

    public function edit($id)
    {
        $record = $this->db->get_where('products', ['id' => $id]);
        $this->load->view('product/edit', ['product' => $record]);
    }

    public function update()
    {
        $this->form_validation->set_rules('name', 'product name', 'required|min_length[1]');
        $this->form_validation->set_rules('description', 'product description', 'required');
        $this->form_validation->set_rules('price', 'product price', 'required');
        if ($this->form_validation->run() == false) {
            // default is false and validation fail also make it false
            $this->load->view('product/edit');
        } else {
            // echo "updated";exit;
            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
            ];
            // $this->db->insert('products', $data);
            // $this->db->set($data);

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('products', $data);

            redirect('product/');
        }
    }

    public function checkProductExist($title)
    {
        $record = $this->db->get_where('products', ['name' => $title]);
        $count = count($record->result());
        if ($count > 0) {
            $response = ['response' => 'Product Title Already Used Please choose something else'];
        } else {
            $response = ['response' => 'good title'];
        }
        echo json_encode($response);
    }
}
