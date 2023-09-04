<?php 

    include("../classes/Cart.php");
    include("../modules/config.php");

    if ( 
        isset($_GET) &&
        isset($_GET['id'])
     ) {

        session_start();
        // caso não esteja logado
        if ( ! isset($_SESSION['logado']) || ! $_SESSION['logado'] ) {
            $_SESSION['msg'] = "Faça login para poder adicionar ao carrinho.";
            header("Location: ".SITE_ROOT."/public/login.php");
            return;
        }

        if ( !isset($_SESSION['cartId']) || empty($_SESSION['cartId']) ) {
            $userInfos = $_SESSION['user_info'];
            $cart = new Cart();
            $idCart = $cart->create($userInfos[0]['id']); // criando o carrinho para poder adicionar itens nele
            $_SESSION['cartId'] = $idCart;
        }

        if( $cart->addItem($idCart, $_GET['id']) ) {
            header("Location: viewProduct.php?id=".$_GET['id']);
        }

    }

?>