<?php

class Product extends CI_Controller
{
    public function index()
    {
        // echo "I am index function";
        $products = $this->db->get('products');
        $status = true;
        $this->load->view('product/index', ['products' => $products, 'mystatus' => $status]);
    }

    public function create()
    {
        // $_POST['name']  is similar to $this->input->post('name');

        // start validations
        $this->form_validation->set_rules('name', 'product name', 'required|min_length[1]|is_unique[products.name]');
        $this->form_validation->set_rules('description', 'product description', 'required');
        $this->form_validation->set_rules('price', 'product price', 'required');
        // end validation

        if ($this->form_validation->run() == false) {
            // default is false and validation fail also make it false
            $this->load->view('product/create');
        } else {

            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
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
}
