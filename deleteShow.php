<?php

require_once('header.php');
if(getSession('logged-in')) {
    try {
        $showID = $_GET['showID'];

        $deleteShow = "DELETE FROM shows WHERE showID = :showID";
        $prepDelete = $dbConn->prepare($deleteShow);
        $prepDelete->execute(array(':showID' => $showID));
        header('Location: admin.php');
    } catch (\Throwable $th) {
        //throw $th;
    } {

    }
} else {
    header('Location: admin.php');
}
?>