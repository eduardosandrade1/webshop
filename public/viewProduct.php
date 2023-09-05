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
        $quantity = $productInfos[0]['quantidade'];
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
    
        <div>
            <img src="<?php echo $image ?>" alt="" width="500">
            <a href="formAddToCart.php?id=<?php echo $_GET['id']; ?>">Add to Cart</a>
            <h4><?php echo $name; ?></h4>
            <h6><?php echo $description; ?></h6>
            <p>price: $<?php echo $price; ?></p>
            <p>Qtd: <?php echo $quantity; ?></p>
        </div>
        <?php include("../view/msg.php"); ?>
    </div>
</body>
</html>