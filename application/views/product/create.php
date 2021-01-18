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
    <form method="post">
        <table border="1">
            <tr>
                <td>name</td>
                <td><input type="text" name="name" id="">
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
                <td colspan="2"><input type="submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>