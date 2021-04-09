<?php require_once('header.php'); 

if(getSession('logged-in')) { ?>

<div class="container">
    <?php getSession('permaClose') ? $visibility = 'hidden' : $visibility = 'visible';  ?>
    <div class="row" style="visibility:<?php echo $visibility; ?>;">
        <div class="alert alert-success col-12 my-3" role="alert">
            <div class="row">
                <div class="col-11">    
                    <h3>Login successful:</h3>
                    Welcome, Admin
                </div>
                <div class="col align-self-center">
                    <button type="button" onclick="setSession('permaClose', 'true')" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php 

        $show = "SELECT * FROM ((shows 
        INNER JOIN category ON shows.showCat=category.catID)
        INNER JOIN studio ON shows.showStu=studio.stuID)";
        
        $prepShow = $dbConn->prepare($show);

        $prepShow->execute();
?>
    <div class="row text-center py-4">
        <div class="col-12">
            <h1>Please Choose a Show:</h1>
        </div>
    </div>
    <div class="row py-4 text-center">
        <div class="col-12 col-md-4 border border-dark py-4 mx-4 rounded">            
            <a href="addShow.php">
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
        <div class="col-12 col-md-4 border border-dark py-4 mx-4 rounded">
            <form action="deleteShow.php?showID=<?php echo $showRow->showID; ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this show?');">
                <div class="row">
                    <div class="col-6 offset-3">
                        <img class="img-fluid" src="img/<?php echo $showRow->showImage; ?>" alt="<?php echo $showRow->showName; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3 text-center">
                        <?php echo $showRow->showName; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4 text-center">
                        <?php echo $showRow->catDesc; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3 text-center">
                        <?php echo $showRow->stuName; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <?php $showRow->endDate == '0000-00-00' ? $value = "Present" : $value = $showRow->endDate; ?>
                        <?php echo $showRow->startDate; ?> - <?php echo $value; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 offset-3 text-center">
                        <a href="updateShow.php?showID=<?php echo $showRow->showID; ?>" data-toggle="tooltip" data-placement="top" title="Edit Show">
                            <img src="img/pencil.svg" class="full-width" alt="edit">
                        </a>
                    </div>
                    <div class="col-3 align-self-center">
                    <input type="submit" class="deleteButton" value="">
                    </div>
                </div>
            </form>
        </div>
        
    </div>

</div>
<?php } require_once('footer.php'); 
} else {
    header('Location: login.php');
} ?>