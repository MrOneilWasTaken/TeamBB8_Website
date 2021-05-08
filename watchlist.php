<?php require_once('header.php'); ?>

<h1>your watchlist:</h1>

<?php

    if(isset($_POST['reset'])) {
        unset($_SESSION['watchList']);
    }

    if(isset($_SESSION['watchList'])) {
        foreach($_SESSION['watchList'] as $value)
        {
            $list = "SELECT * FROM ((shows 
            INNER JOIN category ON shows.showCat=category.catID)
            INNER JOIN studio ON shows.showStu=studio.stuID)
            WHERE showID = $value";
    
            $prepareList = $dbConn->prepare($list);
            $prepareList->execute();
    
            while($listRow = $prepareList->fetchObject()) {
                $item = $listRow->showName." | ".$listRow->catDesc." | ".$listRow->stuName."\n";
    
                echo $item;
            }
        }
        
        if(isset($_POST['download'])) {
            header('Location: '.$_SERVER['PHP_SELF']);
        }
        ?>
        <form method="post">
            <input type="submit" class="btn" name="reset" value="Reset">
        </form>

        <form action="dowloadwatchList.php" method="post">
            <input type="submit" class="btn" name="download" value="Download Watchlist">
        </form>

    <?php }
    else {
    echo 'You have not yet added any shows to your watchlist';
    }
?>



<?php require_once('footer.php'); ?>