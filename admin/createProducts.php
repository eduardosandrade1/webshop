<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Products</title>
</head>
<body>

    <?php include("../view/header.php"); ?>

    <div class="container">

        <a href="produtos.php">All Products</a>

        <form action="formCreateProducts.php" method="post" enctype="multipart/form-data">
    
            <div class="">
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            <div class="">
                <label for="price">Price</label>
                <input type="number" name="price" step=".01">
            </div>

            <div class="">
                <label for="price">Quantity</label>
                <input type="number" name="quantity">
            </div>
            <div class="">
                <label for="description">Image</label>
                <input type="file" name="fileToUpload" accept="image/png, image/jpeg">
            </div>
            <div class="">
                <label for="description">Description</label>
                <input type="text" name="description">
            </div>
            <div class="">
                <label for="description">Cod Artigo</label>
                <input type="text" name="cod">
            </div>

            <button type="submit">Create</button>
        </form>

        <?php
            include("msg.php");
        ?>
    </div>
</body>
</html>