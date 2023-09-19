<?php 

    include("../classes/Products.php");
    include("../modules/config.php");

    if (
        isset($_GET)
        && isset($_GET['id'])
    ) {

        $product = new Products();
        $productInfos = $product->getById($_GET['id']);

        $name = $productInfos[0]['name'];
        $price = $productInfos[0]['price'];
        $description = $productInfos[0]['description'];
        $image = $productInfos[0]['image_path'];


    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View product</title>
</head>
<body>

    <?php include("../view/header.php"); ?>
    <div class="container">
        <a href="<?php echo SITE_ROOT; ?>/index.php">All products</a>
    
        <form method="post" action="formAddToCart.php">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <img src="<?php echo $image ?>" alt="" width="300">
            <h2><?php echo $name; ?></h2>
            <h6><?php echo $description; ?></h6>
            <p>price: $<?php echo $price; ?></p>
            <div>
                <label for="qttProduct">Qtt: </label>
                <input type="number" name="qttProduct" min="1" value="1">
            </div>
            <button type="submit">Add to Cart</button>
        </form>
        <?php include("../view/msg.php"); ?>
    </div>
</body>
</html>