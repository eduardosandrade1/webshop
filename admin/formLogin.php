<?php 

    include ("../classes/Usuario.php");

    if ( isset($_POST['email']) && ! empty($_POST['email']) && isset($_POST['pwd']) && ! empty($_POST['pwd']) ) {
    
        $user = new Usuario();
        $userExists = $user->getUserByLoginAndPassword($_POST['email'], $_POST['pwd'], "admin");

        if ( ! empty($userExists) && count($userExists) == 1 ) {
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['user_info'] = $userExists;
            header("location: produtos.php");
        } else {
            session_start();
            $_SESSION['error_login'] = "Usuário e/ou senha não existem!";
            header("location: login.php");
        }

    }

?>