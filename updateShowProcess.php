<?php
require_once('header.php');
require_once('functions.php');

if(getSession('logged-in')) {

    function updateShow(array $input) {

        try
        {
            $dbConn = getConnection();

            $updateShow = "UPDATE shows SET
            showName     = :showName, 
            showDesc     = :showDesc, 
            showEp       = :showEp, 
            startDate    = :startDate, 
            endDate      = :endDate, 
            showCat      = :showCat, 
            showStu      = :showStu, 
            showImage    = :showImage, 
            isAiring     = :isAiring
            WHERE showID = :showID";

            $prepareUpdate = $dbConn->prepare($updateShow);

            $prepareUpdate->execute(array(
                ':showName'  => $input['showName'],
                ':showDesc'  => $input['showDesc'],
                ':showEp'    => $input['showEp'],
                ':startDate' => $input['startDate'],
                ':endDate'   => $input['endDate'],
                ':showCat'   => $input['showCat'],
                ':showStu'   => $input['showStu'],
                ':showImage' => $input['showImage'],
                ':isAiring'  => $input['isAiring'],
                ':showID'    => $input['showID']
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
        echo updateShow($input);
        echo "<br>Update Successful<br>";
        echo "<a class='btn bg-dark text-white' href='chooseShow.php'>Add New Show<a>";
    }

}

?>