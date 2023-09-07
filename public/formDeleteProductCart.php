<?php 
    include_once("../classes/ProductsCart.php");

    if (
        isset($_GET) &&
        isset($_GET['productcartid'])
    ) {

        $productCart = new ProductsCart();
        if ( $productCart->delete($_GET['productcartid']) ) {
            $_SESSION['msg'] = "Item removido com sucesso!";
            header("Location: viewCart.php");
        }

    }

?>