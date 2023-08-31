<?php 

    include("../classes/Products.php");

    if ( isset($_GET) && ! empty($_GET) && isset($_GET['id']) && ! empty($_GET['id']) ) {
 
        $product = new Products();
        $productAttr = $product->getById($_GET['id']);


        $id = $productAttr[0]['id'];
        $name = $productAttr[0]['name'];
        $price = $productAttr[0]['price'];
        $quantity = $productAttr[0]['quantidade'];
        $description = $productAttr[0]['description'];
        $cod = $productAttr[0]['cod_artigo'];
        $image = $productAttr[0]['image_path'];
    }

?>



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

        <form action="formEditProducts.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="">
                <label for="price">Price</label>
                <input type="number" name="price" step=".01" value="<?php echo $price; ?>">
            </div>
            <div class="">
                <label for="price">Quantity</label>
                <input type="number" name="quantity" value="<?php echo $quantity; ?>">
            </div>
            <div class="">
                <img src="<?php echo $image; ?>" alt="teste" width="300">
                <label for="price">Image</label>
                <input type="file" name="fileToUpload">
            </div>
            <div class="">
                <label for="description">Description</label>
                <input type="text" name="description" value="<?php echo $description; ?>">
            </div>
            <div class="">
                <label for="description">Cod Artigo</label>
                <input type="text" name="cod" value="<?php echo $cod; ?>">
            </div>
            <button type="submit">Update</button>
        </form>

        <?php
            include("msg.php");
        ?>
    </div>
</body>
</html>