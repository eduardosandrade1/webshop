<?php

    include("../classes/Products.php");

    if ( isset($_POST) 
    && isset($_POST['id']) 
    && isset($_POST['name']) 
    && isset($_POST['price']) 
    && isset($_POST['description']) 
    && isset($_POST['quantity'])
    && isset($_FILES['fileToUpload'])
    ) {
        if ( empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == "" ) {
            // mantém a imagem que já estava cadastrada no banco
            $product = new Products();
            $productFileName = $product->getById($_POST['id']);
            $fileName = $productFileName[0]['image_path'];

        } else {
            // upload de nova imagem
            $folderName = "../uploads/";
            // Get the file name
            $fileName = $folderName . $_FILES['fileToUpload']['name'];
    
            $movedFile = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileName);
    
            if ( ! $movedFile ) {
                $_SESSION['msg'] = "Ocorreu um erro ao cadastrar a imagem!";
                header("Location: createProducts.php");
            }
        }

        $product = new Products();
        $createdProduct = $product->update($_POST['id'], $_POST['name'], $_POST['price'], $_POST['quantity'], $_POST['description'], $_POST['cod'], $fileName);

        session_start();
        if ( $createdProduct ) {
            $_SESSION['msg'] = "Produto editado com sucesso!";
        } else {
            $_SESSION['msg'] = "Houve um erro ao editar o produto!";
        }

        header("Location: produtos.php");


    }

?>