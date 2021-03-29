<?php require_once('header.php'); ?>

<div class="container">
    <div class="row text-center py-4">
        <div class="col-12">
            <h1>Please Choose a Show:</h1>
        </div>
    </div>
    <?php 

        $show = "SELECT * FROM ((shows 
        INNER JOIN category ON shows.showCat=category.catID)
        INNER JOIN studio ON shows.showStu=studio.stuID)";
        
        $prepShow = $dbConn->prepare($show);

        $prepShow->execute();
?>

    
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
                    <?php $showRow->endDate == null ? $value = "Present" : $value = $showRow->endDate; ?>
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
                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-placement="top" title="Delete Show">
                        <img src="img/delete.svg" class="full-width" alt="delete">
                    </a>
                </div>
            </div>
        </div>
        
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Show</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this show?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a role="button" href="deleteShow.php?showID=<?php echo $showRow->showID; ?>" class="btn btn-primary">Delete</a>
        </div>
        </div>
    </div>
    </div>
<?php } require_once('footer.php'); ?>