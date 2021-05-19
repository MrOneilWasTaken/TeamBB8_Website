<?php
session_save_path();
session_start();
$uri = array(
    '/TeamBB8_Website/index.php',
    '/TeamBB8_Website/watchlist.php',
    '/TeamBB8_Website/donate.php',
    '/TeamBB8_Website/results.php'
)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Localhost construction</title>
</head>
<?php if (in_array($_SERVER['REQUEST_URI'], $uri)) {
    $bg = "#6F6FD6";
} else {
    $bg = "#FFF";
} ?>

<body style="justify-content: center;background-color: <?= $bg ?>">
    <?php
    require_once('functions.php');
    $dbConn = getConnection();
    
    $show = "SELECT * FROM ((shows 
    INNER JOIN category ON shows.showCat=category.catID)
    INNER JOIN studio ON shows.showStu=studio.stuID)";

    $showPrep = $dbConn->prepare($show);

    $showPrep->execute();

    $showList = array();

    while ($showRow = $showPrep->fetchObject()) {
        $showList[] = $showRow->showName;
    }



    if (in_array($_SERVER['REQUEST_URI'], $uri)) {
        require_once('nav.php');
    }
    ?>