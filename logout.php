<?php require_once('header.php'); 

    unset($_SESSION['logged-in']);
    header('Location: index.php');
 ?>