<?php 

    include ("./classes/Products.php");
    include("./modules/config.php");

    // $prod = new Products
    $products = new Products();
    $allProducts = $products->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">

    <?php include("view/header.php"); ?>

    <ul>
        <!-- Listando os produtos -->
        <?php foreach($allProducts as $product){ ?>
            <li>
                <img src="<?php echo SITE_ROOT.$product['image_path']; ?>" alt="" width="100">
                <?php
                    // "Nome: {$product['name']} - Preço: R$ ".number_format((float)$product["price"], 2); 
                    echo "Nome: ". $product['name'] . " - Price: $".$product['price'];
                ?>

            </li>
        <?php } ?>
    </ul>

    </div>


    <div class="container">
        
    </div>
</body>
</html>