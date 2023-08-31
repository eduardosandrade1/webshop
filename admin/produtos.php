<?php
    include("middleware.php");
    include("../classes/Products.php");

    $products = new Products();
    $allProducts = $products->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>

    <?php include("../view/header.php"); ?>

    <div class="container">
        <a href="createProducts.php">Create Products</a>
    </div>

    <div class="container">
        <ul>
            <!-- Listando os produtos -->
            <?php foreach($allProducts as $product){ ?>
                <li>
                    <img src="<?php echo $product['image_path']; ?>" alt="" width="100">
                    <?php
                     // "Nome: {$product['name']} - Preço: R$ ".number_format((float)$product["price"], 2); 
                     echo "Nome: ". $product['name'] . " - Price: $".$product['price'];
                    ?>

                    <a href="editProducts.php?id=<?php echo $product['id']; ?>">Edit</a>
                    <a href="formDeleteProducts.php?id=<?php echo $product['id']; ?>">Remove</a>
                </li>
            <?php } ?>
        </ul>

        <?php
            include("msg.php");
        ?>
    </div>
</body>
</html>

