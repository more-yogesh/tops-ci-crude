<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Product List</h1>
    <?php
    //print_r($products->result());
    // it'll return array of rows
    ?>
    <table border="1">
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Price</td>
            <td>Photo</td>
            <td>Action</td>
        </tr>
        <?php
        foreach ($products->result() as $product) {
        ?>
            <tr>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->description; ?></td>
                <td><?php echo $product->price; ?></td>
                <td><img src="<?php echo base_url('documents/' . $product->photo); ?>" height="100"></td>
                <td>
                    <a href="<?php echo base_url('product/delete/' . $product->id) ?>">DELETE</a>
                    <a href="<?php echo base_url('product/edit/' . $product->id) ?>">EDIT</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>