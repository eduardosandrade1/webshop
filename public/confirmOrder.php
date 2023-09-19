<?php 

session_start();
include_once("../modules/config.php");
include_once("../classes/Cart.php");
include_once("../classes/Products.php");
include_once("../classes/Address.php");

$cart = new Cart();
$productsInCart = $cart->getAllProductsid($_SESSION['cartId']);
$totalInCart = 0;


$address = new Address();
$allAddress = $address->getByUserId($_SESSION['user_info'][0]['id']);
// var_dump($_SESSION['user_info'], $allAddress);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>
        Confirme sua compra
    </h1>

    <div>
        <h3>Produtos no carrinho</h3>
        <ul>
            <?php foreach ($productsInCart as $product) { ?>
                <li style="display: flex; margin:10px;">
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
    
                </li>
            <?php } ?>
        </ul>

        <div>
            <h3>Total: R$ <?php echo $totalInCart; ?></h3>
        </div>
    </div>

    <hr>
    <div>

        <h3>Delivery Address</h3>
        <p>Street: <?php echo $allAddress[0]['street']; ?></p>
        <p>Street number: <?php echo $allAddress[0]['street_number']; ?></p>
        <p>Zip code: <?php echo $allAddress[0]['zip_code']; ?></p>
        <p>City: <?php echo $allAddress[0]['city']; ?></p>
    </div>
    <hr>
    <div>

        <h3>Invoice Address</h3>
        <p>Street: <?php echo $allAddress[1]['street']; ?></p>
        <p>Street number: <?php echo $allAddress[1]['street_number']; ?></p>
        <p>Zip code: <?php echo $allAddress[1]['zip_code']; ?></p>
        <p>City: <?php echo $allAddress[1]['city']; ?></p>
    </div>

                <hr>
    <a href="">Confirmar Compra</a>
</body>
</html>