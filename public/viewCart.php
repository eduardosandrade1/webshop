<?php 

session_start();
include_once("../modules/config.php");
include_once('../classes/Sql.php');
include_once("../classes/Cart.php");
include_once('../classes/Products.php');
include_once("../classes/ProductsCart.php");

$cart = new Cart();
$productsInCart = $cart->getAllProductsid($_SESSION['cartId']);
$totalInCart = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
</head>
<body>

    <div class="container">
        <a href="../index.php">All products</a>
        <ul>
            <?php foreach ($productsInCart as $product) { ?>
                <li style="display: flex; margin:10px;">
                    <?php 
                        $productInfo = new Products();
                        $productCart = new ProductsCart();
                        $productInfo = $productInfo->getById($product['product_id']);
                        $qttProduct  = $productCart->getQttProductInCart($_SESSION['cartId'], $product['product_id']);

                        $totalInCart += ($productInfo[0]['price'] * $qttProduct[0]['qtt']);


                    ?>
                    <img src="<?php echo SITE_ROOT.$productInfo[0]['image_path']; ?>" alt="" width="150">
                    <p>Name: <?php echo $productInfo[0]['name']; ?></p>
                    <br>
                    <p>Qtt: <?php echo $qttProduct[0]['qtt']; ?></p>

                    <p>Price: <?php echo $productInfo[0]['price']; ?></p>
                    <a href="formDeleteProductCart.php?productcartid=<?php echo $product['id']; ?>">Remove</a>

                </li>
            <?php } ?>
        </ul>

        <p>
            <?php
                include_once('../view/msg.php');
            ?>
        </p>

        <div>
            <h3>Total: R$ <?php echo $totalInCart; ?></h3>
        </div>


    </div>

</body>
</html>