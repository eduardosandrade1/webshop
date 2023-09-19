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
            <li style="list-style: none;border: 1px solid black; margin:5px;">
                <img src="<?php echo SITE_ROOT.$product['image_path']; ?>" alt="" width="100">
                <p>
                <?php
                    echo "Nome: ". $product['name'];
                ?>
                </p>
                <p>
                    <?php
                        echo "Price: $".$product['price'];
                    ?>
                </p>
                <a href="./public/viewProduct.php?id=<?php echo $product['id']; ?>">Visualizar</a>
            </li>
        <?php } ?>
    </ul>

    </div>


    <div class="container">
        
    </div>
</body>
</html>