<?php require_once('header.php'); ?>

<div class="container text-white pt-3">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Your watchlist:</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <?php

            if (isset($_POST['reset'])) {
                unset($_SESSION['watchList']);
            }

            if (isset($_SESSION['watchList'])) {
                foreach ($_SESSION['watchList'] as $value) {
                    $list = "SELECT * FROM ((shows 
            INNER JOIN category ON shows.showCat=category.catID)
            INNER JOIN studio ON shows.showStu=studio.stuID)
            WHERE showID = $value";

                    $prepareList = $dbConn->prepare($list);
                    $prepareList->execute();

                    while ($listRow = $prepareList->fetchObject()) {
                        $item = $listRow->showName . " | " . $listRow->catDesc . " | " . $listRow->stuName;

                        echo '<div class="">'.$item.'</div>';
                    }
                }

                if (isset($_POST['download'])) {
                    header('Location: ' . $_SERVER['PHP_SELF']);
                }
            ?>
            <div class="pt-5">
                <form method="post" class="d-inline-block">
                    <input type="submit" class="btn btn-orange btn-lg" name="reset" value="Reset">
                </form>

                <form action="dowloadwatchList.php" method="post" class="d-inline-block">
                    <input type="submit" class="btn btn-success btn-lg" name="download" value="Download Watchlist">
                </form>
            </div>
            <?php } else {
                echo 'You have not yet added any shows to your watchlist';
            } ?>


        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>