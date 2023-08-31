<?php 

    include ("./classes/Products.php");

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

    <?php 
    include("./view/header.php");

    ?>

    <h1>
        Bem vindo!
    </h1>



    <div class="container">
        
    </div>
</body>
</html>