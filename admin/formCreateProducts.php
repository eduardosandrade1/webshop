<?php

    include("../classes/Products.php");
    // var_dump($_POST, $_FILES);
    // die;
    if ( isset($_POST) 
        && isset($_POST['name']) 
        && isset($_POST['price']) 
        && isset($_POST['description']) 
        && isset($_POST['quantity']) 
        && isset($_POST['cod']) 
        && isset($_FILES['fileToUpload']) 
    ) {
        // funciona, mas não tem tratativa de erro
        session_start();
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $_SESSION['msg'] = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

        } else {
            $_SESSION['msg'] = "Sorry, there was an error uploading your file.";
            header("Location: createProducts.php");
            return;
        }

        // if ( $_FILES["fileToUpload"]['error'] == 1) {
        //     session_start();
        //     $_SESSION['msg'] = "Ocorreu um erro ao cadastrar a imagem! Imagem muito grande...";
        //     header("Location: createProducts.php");
        //     return;
        // }

        // $folderName = "../uploads/";
        // // Get the file name
        // $fileName = $folderName . $_FILES['fileToUpload']['name'];  

        // $movedFile = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileName);

        // if ( ! $movedFile ) {
        //     $_SESSION['msg'] = "Ocorreu um erro ao cadastrar a imagem!";
        //     header("Location: createProducts.php");
        // }

        $product = new Products();
        $createdProduct = $product->create($_POST['name'], $_POST['price'], $_POST['quantity'], $_POST['description'], $_POST['cod'], $target_file);

        if ( $createdProduct ) {
            $_SESSION['msg'] = "Produto criado com sucesso!";
        } else {
            $_SESSION['msg'] = "Houve um erro ao cadastrar o produto!";
        }

        header("Location: createProducts.php");

    }

?>