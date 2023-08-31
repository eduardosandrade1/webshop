<?php

    session_start();

    if ( ! isset($_SESSION['logado']) || $_SESSION['user_info'][0]['role'] != 1 ) {
        header('Location: login.php');
        return;
    }