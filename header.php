<?php
session_save_path();
session_start();
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
<?php if($_SERVER['REQUEST_URI'] == '/TeamBB8_Website/index.php' || $_SERVER['REQUEST_URI'] == '/TeamBB8_Website/watchlist.php' || $_SERVER['REQUEST_URI'] == '/TeamBB8_Website/donate.php' ) { $bg = "#6F6FD6"; } else { $bg = "#FFF"; } ?>
<body style="justify-content: center;background-color: <?= $bg ?>">
    <?php
    require_once('functions.php');
    $dbConn = getConnection();

    if($_SERVER['REQUEST_URI'] == '/TeamBB8_Website/index.php' || $_SERVER['REQUEST_URI'] == '/TeamBB8_Website/watchlist.php' || $_SERVER['REQUEST_URI'] == '/TeamBB8_Website/donate.php' ) { require_once('nav.php'); }
    ?>