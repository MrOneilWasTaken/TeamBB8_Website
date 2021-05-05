<?php 
    require_once('header.php');

    $showID = $_GET['showID'];

    array_push(getSession('watchList'), $showID);
    
    header('Location: index.php');
?>