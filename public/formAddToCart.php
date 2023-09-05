<?php 
    session_start();
    include("../classes/Cart.php");
    include("../modules/config.php");

    if ( 
        isset($_GET) &&
        isset($_GET['id'])
     ) {

        // caso não esteja logado
        if ( ! isset($_SESSION['logado']) || ! $_SESSION['logado'] ) {
            $_SESSION['msg'] = "Faça login para poder adicionar ao carrinho.";
            header("Location: ".SITE_ROOT."/public/login.php");
            return;
        }

        $userInfos = $_SESSION['user_info'];
        $cart = new Cart();
        if ( !isset($_SESSION['cartId']) || empty($_SESSION['cartId']) ) {
            $idCart = $cart->create($userInfos[0]['id']); // criando o carrinho para poder adicionar itens nele
            $_SESSION['cartId'] = $idCart;
        } else {
            $idCart = $_SESSION['cartId'];
        }

        if( $cart->addItem($idCart, $_GET['id']) ) {
            $_SESSION['msg'] = "Produto adicionado no carrinho com sucesso!";
            header("Location: viewProduct.php?id=".$_GET['id']);
        }

    }

?>