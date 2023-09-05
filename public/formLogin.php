<?php 
    session_start();
    include ("../classes/Usuario.php");
    include("../classes/Cart.php");

    if ( isset($_POST['email']) && ! empty($_POST['email']) && isset($_POST['pwd']) && ! empty($_POST['pwd']) ) {
    
        $user = new Usuario();
        $userExists = $user->getUserByLoginAndPassword($_POST['email'], $_POST['pwd'], "user");

        if ( ! empty($userExists) && count($userExists) == 1 ) {
            $_SESSION['logado'] = true;
            $_SESSION['user_info'] = $userExists;

            $cart = new Cart();
            $checkUserCart = $cart->getCartByUserId($userExists[0]['id']);

            if ( ! empty($checkUserCart) && count($checkUserCart) == 1 ) {
                $_SESSION['cartId'] = $checkUserCart[0]['id'];
            }

            header("location: ../index.php");
        } else {
            $_SESSION['error_login'] = "Usuário e/ou senha não existem!";
            header("location: login.php");
        }

    }

?>