<?php require_once('header.php'); ?>

<div class="container text-white pt-3">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Your watchlist:</h1>
        </div>
    </div>
    <div class="row text-center">

        <?php

        try {
            if (isset($_POST['reset'])) {
                unset($_SESSION['watchList']);
            }

            if (isset($_SESSION['watchList'])) {
                foreach ($_SESSION['watchList'] as $value) {
                    $list = "SELECT showID ,showName, showImage FROM shows WHERE showID = $value";

                    $prepareList = $dbConn->prepare($list);
                    $prepareList->execute();

                    while ($showRow = $prepareList->fetchObject()) {  ?>

                        <div class="col-md-4">
                            <img class="img-thumbnail" src="img/<?= $showRow->showImage ?>" alt="<?= $showRow->showName ?>">
                            <div class="py-3">
                                <?= $showRow->showName ?>
                            </div>
                            <div>
                                <form action="removeWatchlist.php" method="get">
                                    <input type="hidden" name="showID" value="<?= $showRow->showID ?>">
                                    <input type="submit" class="btn btn-danger" value="Remove">
                                </form>
                            </div>
                        </div>
                <?php  }
                } ?>
    </div>
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
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } ?>




</div>
</div>


<?php require_once('footer.php'); ?>