<?php 

session_start();
include_once("../modules/config.php");
include_once('../classes/Sql.php');
include_once("../classes/Cart.php");
include_once('../classes/Products.php');
include_once("../classes/ProductsCart.php");

$cart = new Cart();
if ( isset($_SESSION['cartId']) ) {
    $productsInCart = $cart->getAllProductsid($_SESSION['cartId']);
} else {
    $productsInCart = [];
}
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
                <li style="list-style:none;margin:10px; border:1px solid black;">
                    <?php 
                        $productInfo = new Products();
                        $productCart = new ProductsCart();
                        $productInfo = $productInfo->getById($product['product_id']);
                        $qttProduct  = $product['quantity'];

                        $totalInCart += ($productInfo[0]['price'] * $qttProduct);

                    ?>
                    <img src="<?php echo SITE_ROOT.$productInfo[0]['image_path']; ?>" alt="" width="150">
                    <p>Name: <?php echo $productInfo[0]['name']; ?></p>
                    <br>
                    <p>Qtt: <?php echo $qttProduct; ?></p>

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

        <a href="finishOrder.php">Finish Cart</a>


    </div>

</body>
</html>