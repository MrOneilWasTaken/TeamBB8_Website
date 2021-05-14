<?php require_once('header.php'); 

if(getSession('logged-in')) { ?>

<div class="container text-center">
    <?php getSession('permaClose') ? $visibility = 'hidden' : $visibility = 'visible';  ?>
    <div class="row" style="visibility:<?php echo $visibility; ?>;">
        <div class="alert alert-success col-12 my-3" role="alert">
            <div class="row">
                <div class="col-9 col-md-11">    
                    <h3>Login successful:</h3>
                    Welcome, Admin
                </div>
                <div class="col-3 float-right col-md-1 align-self-center">
                    <a type="button" href="logout.php" class="btn btn-outline-dark">
                        logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php 

        $show = "SELECT * FROM ((shows 
        INNER JOIN category ON shows.showCat=category.catID)
        INNER JOIN studio ON shows.showStu=studio.stuID) ORDER BY showID";
        
        $prepShow = $dbConn->prepare($show);

        $prepShow->execute();
?>
    <div class="row text-center py-4">
        <div class="col-12">
            <h1>Please Choose a Show:</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12 col-md-4 border border-dark rounded">            
            <a href="addShow.php" id="add-show">
                <div class="row">
                    <div class="col-4 offset-4 align-self-center py-5">
                        <img src="img/plus.svg" class="full-width" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col display-4 text-center pt-5">
                        Add New Show
                    </div>
                </div>
            </a>
        </div>
        <?php while($showRow = $prepShow->fetchObject()) { ?>
        <div class="col-12 col-md-4">
            <form action="deleteShow.php?showID=<?= $showRow->showID ?>" method="post" class="border border-dark rounded py-4" onsubmit="return confirm('Are you sure you want to delete this show?');">
                <div class="row">
                    <div class="col-6 offset-3">
                        <img class="img-fluid" src="img/<?= $showRow->showImage ?>" alt="<?= $showRow->showName ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3 text-center">
                        <?= $showRow->showName ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4 text-center">
                        <?= $showRow->catDesc ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3 text-center">
                        <?= $showRow->stuName ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <?php $showRow->endDate == '0000-00-00' ? $value = "Present" : $value = $showRow->endDate; ?>
                        <?= $showRow->startDate ?> - <?= $value ?>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-3 offset-3 text-center">
                        <a href="updateShow.php?showID=<?= $showRow->showID ?>" class="btn btn-orange">Edit</a>
                    </div>
                    <div class="col-3 align-self-center">
                        <input type="submit" class="btn btn-danger" value='Delete'>
                    </div>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

</div>
<?php require_once('footer.php'); 
} else {
    header('Location: login.php');
} ?>