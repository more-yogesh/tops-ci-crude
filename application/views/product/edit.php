<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo base_url('product/update'); ?>" method="post">
        <?php
        // print_r($product->result()[0]);
        $editProduct = $product->result()[0];
        // echo $editProduct->name;
        ?>
        <input type="hidden" name="id" value="<?php echo $editProduct->id; ?>">

        <table border="1">
            <tr>
                <td>name</td>
                <td><input type="text" name="name" id="" value="<?php echo $editProduct->name; ?>">
                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>

                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="description" id="" value="<?php echo $editProduct->description; ?>">
                    <?php echo form_error('description', '<div class="error">', '</div>'); ?>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="price" id="" value="<?php echo $editProduct->price; ?>">
                    <?php echo form_error('price', '<div class="error">', '</div>'); ?>

                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="UPDATE"></td>
            </tr>
        </table>
    </form>
</body>

</html>