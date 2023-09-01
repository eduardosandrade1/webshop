<?php

if ( session_status() !== PHP_SESSION_ACTIVE )
{
    session_start();
}

?>

<link rel="stylesheet" href="../src/css/header.css"> 

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <?php if (isset($_SESSION['logado']) && $_SESSION['logado']) { ?>
    <a href="<?php echo SITE_ROOT; ?>/logout.php">Logout</a>
  <?php } else { ?>
    <a href="<?php echo SITE_ROOT; ?>/public/login.php">entrar</a>
  <?php } ?>
</div>