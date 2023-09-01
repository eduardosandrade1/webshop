<?php 

    include ("../classes/Usuario.php");

    if (
        isset($_POST) &&
        isset($_POST['email']) &&
        isset($_POST['nome']) &&
        isset($_POST['sobrenome']) &&
        isset($_POST['niver']) &&
        isset($_POST['passwd']) &&
        isset($_POST['senha_confirm'])
    ) {
        $user = new Usuario();

        session_start();

        // validação de senha
        if ( $_POST['passwd'] == $_POST['senha_confirm'] ) {

            if ( $user->checkRulePassword($_POST['passwd']) ) {
                $userCreated = $user->create($_POST['email'], $_POST['nome'], $_POST['sobrenome'], $_POST['niver'], $_POST['passwd']);

                if ($userCreated) {
                    $_SESSION['msg'] = "Usuário criado com sucesso!";
                    header("Location: login.php");
                } else {
                    $_SESSION['msg'] = "Ocorreu um erro ao tentar cadastrar o usuário!";
                    header("Location: login.php");
                }
            } else {

                $_SESSION['msg'] = "Sua senha é muito fraca!!!!";
                header("Location: registerUser.php");
            }
        }

    }

?>