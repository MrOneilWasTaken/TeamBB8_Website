<?php
require_once('header.php');
require_once('functions.php');

if(getSession('logged-in')) {

function processShow(array $input) {

    try
    {
        $dbConn = getConnection();

        $newShow = "INSERT INTO shows
        (showName, showDesc, showEp, startDate, endDate, showCat, showStu, showImage, isAiring)
        VALUES (:showName, :showDesc, :showEp, :startDate, :endDate, :showCat, :showStu, :showImage, :isAiring)";

        $prepareNewShow = $dbConn->prepare($newShow);

        $prepareNewShow->execute(array(
            ':showName'  => $input['showName'],
            ':showDesc'  => $input['showDesc'],
            ':showEp'    => $input['showEp'],
            ':startDate' => $input['startDate'],
            ':endDate'   => $input['endDate'],
            ':showCat'   => $input['showCat'],
            ':showStu'   => $input['showStu'],
            ':showImage' => $input['showImage'],
            ':isAiring'  => $input['isAiring']
        ));
    }
    catch(Exception $e)
    {
        echo "New show error: ".$e->getMessage();
    }
}

list($input, $errors) = validateShow();

if($errors)
{
    echo showErrors($errors);
} else {
    echo processShow($input);
    echo "Update Successful<br>";
    echo "<a class='btn bg-dark text-white' href='add-show.php'>Add New Show<a>";
}

} else {
    header('Location: login.php');
}

?>