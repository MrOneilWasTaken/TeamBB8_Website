<?php
require_once('header.php');


$showID = $_GET['showID'];

setSession('errors', '');
if(!is_array($_SESSION['watchList'])) {
    $watchList = array();
    setSession('watchList', $watchList);
}
    if (!in_array($showID, $_SESSION['watchList'])) {
        echo "works";
        $_SESSION['watchList'][] = $showID;
    } else {
        
        $_SESSION['errors'] = 'Show is already added to Watch List';
    }
//header('Location: index.php');

?>