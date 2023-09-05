<?php 

session_start();
include('../classes/Sql.php');
include("../classes/Cart.php");
include('../classes/Products.php');

$cart = new Cart();
$productsInCart = $cart->getAllProductsid($_SESSION['cartId']);

// array_map(function ($param) {

//     var_dump($param);
//     return $param['product_id'] ;

// }, $productsInCart);


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

        <ul>
            <?php foreach ($productsInCart as $product) { ?>
                <li>
                    <?php 
                        $productInfo = new Products();
                        $productInfo = $productInfo->getById($product['product_id']);
                        var_dump($productInfo);
                    ?>

                </li>
            <?php } ?>
        </ul>

    </div>

</body>
</html>