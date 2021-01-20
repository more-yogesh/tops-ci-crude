<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>

</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>name</td>
                <td><input type="text" name="name" id="" onblur="checkTitle(this.value)">
                    <span id="js-respo"></span>
                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td><input type="text" name="description" id="">
                    <?php echo form_error('description', '<div class="error">', '</div>'); ?>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" name="price" id="">
                    <?php echo form_error('price', '<div class="error">', '</div>'); ?>

                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="product_photo" id="">
                    <?php print_r($error); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit"></td>
            </tr>
        </table>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function checkTitle(title) {
            $.ajax({
                url: '<?php echo base_url('product/checkProductExist/') ?>' + title,
                method: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    console.log(data.response);
                    $('#js-respo').html(data.response);
                }
            });
        }
    </script>
</body>

</html>