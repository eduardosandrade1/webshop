<?php 
    session_start();
    include("../classes/Cart.php");
    include("../modules/config.php");

    if ( 
        isset($_POST) &&
        isset($_POST['id']) &&
        isset($_POST['qttProduct'])
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

        $productsInCart = $cart->getProductInCartByCartIdAndProductId($idCart, $_POST['id']);

        // se tiver vazia, insere um novo produto no products_cart
        if ( empty($productsInCart) ) {
            $addOnCart = $cart->addItem($idCart, $_POST['id'], $_POST['qttProduct']);// recebe um booleano true ou false
            // verifica se o item foi inserido com sucesso
            if( ! $addOnCart ) {
                $_SESSION['msg'] = "Ocorreu um erro ao cadastrar um produto!";
                header("Location: viewProduct.php?id=".$_POST['id']);
                return;
            }
        } else {
            $newQtt = $productsInCart[0]['quantity'] + $_POST['qttProduct'];
            
            $addOnCart = $cart->updateItem($idCart, $_POST['id'], $newQtt);// recebe um booleano true ou false
            // verifica se o item foi inserido com sucesso
            if( ! $addOnCart ) {
                $_SESSION['msg'] = "Ocorreu um erro ao cadastrar um produto!";
                header("Location: viewProduct.php?id=".$_POST['id']);
                return;
            }

        }

        


        // for ($i = 0; $i < $_POST['qttProduct']; $i++) {

        //     $addOnCart = $cart->addItem($idCart, $_POST['id']);

        //     if( ! $addOnCart ) {
        //         $_SESSION['msg'] = "Ocorreu um erro ao cadastrar um produto!";
        //         header("Location: viewProduct.php?id=".$_POST['id']);
        //         return;
        //     }

        // }

        $_SESSION['msg'] = "Produto adicionado no carrinho com sucesso!";
        header("Location: viewProduct.php?id=".$_POST['id']);


    }

?>