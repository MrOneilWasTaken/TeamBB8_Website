<?php require_once('header.php'); ?>

<div class="container">
    <div class="row border-bottom border-dark pt-4 pb-4">
        <div class="col">
            Image:
        </div>
        <div class="col">
            Show:
        </div>
        <div class="col-4">
            Description:
        </div>
        <div class="col">
            Genre:
        </div>
        <div class="col">
            Studio:
        </div>
        <div class="col">
            StartDate:
        </div>
        <div class="col">
            End Date:
        </div>
        <div class="col">
        </div>
        <div class="col">
        </div>
    </div>
    <?php 

        $show = "SELECT * FROM ((shows 
        INNER JOIN category ON shows.showCat=category.catID)
        INNER JOIN studio ON shows.showStu=studio.stuID)";
        
        $prepShow = $dbConn->prepare($show);

        $prepShow->execute();

        while($showRow = $prepShow->fetchObject()) {
    ?>
    <div class="row pb-4 pt-4 border-bottom border-dark">
        <div class="col align-self-center">
            <img class="img-fluid" src="img/<?php echo $showRow->showImage; ?>" alt="<?php echo $showRow->showName; ?>">
        </div>
        <div class="col align-self-center">
            <?php echo $showRow->showName; ?>
        </div>
        <div class="col-4 align-self-center">
            <?php echo $showRow->showDesc; ?>
        </div>
        <div class="col align-self-center">
            <?php echo $showRow->catDesc; ?>
        </div>
        <div class="col align-self-center">
            <?php echo $showRow->stuName; ?>
        </div>
        <div class="col align-self-center">
            <?php echo $showRow->startDate; ?>
        </div>
        <div class="col align-self-center">
            <?php echo $showRow->endDate; ?>
        </div>
        <div class="col align-self-center">
            <img src="img/delete.svg" class="full-width" alt="delete">
        </div>
        <div class="col align-self-center">
            <img src="img/pencil.svg" class="full-width" alt="edit">
        </div>
    </div>

</div>
<?php } require_once('footer.php'); ?>