<?php
require_once('header.php');


$showID = $_GET['showID'];

setSession('errors', '');
if(is_array($_SESSION['watchList'])) {
    
    if (in_array($showID, $_SESSION['watchList'])) {

        $index = array_search($showID, $_SESSION['watchList']);

        if($index !== false) {
            unset($_SESSION['watchList'][$index]);

            if(empty($_SESSION['watchList'])) {
                unset($_SESSION['watchList']);
            }
        }
    } else {
        
        $_SESSION['errors'] = 'Sorry, an error has occurred';
    }
}
header('Location: watchlist.php');