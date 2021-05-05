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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Localhost construction</title>
</head>

<body style="justify-content: center">
    <?php
    require_once('functions.php');
    $dbConn = getConnection();

    setSession('watchList', array());
    
    ?>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8AAFD5">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" area-expanded="false">
                            Shows
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #D7A878">
                            <a class="dropdown-item">Alphabetical</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item">Producer</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"> Genre</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"> Ongoing</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"> Year</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="watchlist.php">WatchList</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donate.php">Donate</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"><br />
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
    </nav>