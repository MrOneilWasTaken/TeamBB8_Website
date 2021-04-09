<?php
if(getSession('logged-in')) {
    require_once('header.php');
    try {
        $showID = $_GET['showID'];

        $deleteShow = "DELETE FROM shows WHERE showID = :showID";
        $prepDelete = $dbConn->prepare($deleteShow);
        $prepDelete->execute(array(':showID' => $showID));

    } catch (\Throwable $th) {
        //throw $th;
    } {

    }
} else {
    header('Location: admin.php');
}
?>