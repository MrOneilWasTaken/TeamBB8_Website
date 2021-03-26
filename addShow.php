<?php require_once('header.php'); ?>

<?php 
$genre = "SELECT * FROM category";
$prepGenre = $dbConn->prepare($genre);
$prepGenre->execute();

$studio = "SELECT * FROM studio";
$prepStudio = $dbConn->prepare($studio);
$prepStudio->execute();
?>
<div class="container">
    <form id="showForm" action="addShowProcess.php" method="post">
        <div class="row text-center">
            <div class="col-12">    
                <h1>Add New Show</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <label>Name:</label>
                <input type="text" class="full-width" name="showName" required>
            </div>
            <div class="col-12 col-md-6">
                <label>Description:</label>
                <textarea class="full-width" name="showDesc" id="" oninput="autoHeight()" required></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <label>Start Date:</label>
                <input class="full-width" name="startDate" type="date" name="" id="" required>
            </div>
            <div id="endDateCont" class="col-12 col-md-6">
                <label>End Date:</label>
                <input class="full-width" name="endDate" type="date" name="" id="endDate" required>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <label>Genre:</label>
                <select class="full-width" name="showCat" id="" required>
                    <option value="" disabled selected>Select Genre</option>
                    <?php while($genreRow = $prepGenre->fetchObject()) { ?>
                    <option value="<?php echo "$genreRow->catID"; ?>"><?php echo "$genreRow->catDesc"; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label>Studio:</label>
                <select class="full-width" name="showStu" id="" required>
                <option value="" disabled selected>Select Studio</option>
                    <?php while($studioRow = $prepStudio->fetchObject()) { ?>
                    <option value="<?php echo "$studioRow->stuID"; ?>"><?php echo "$studioRow->stuName"; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <label>Image name:</label>
                <input class="full-width" type="text" name="showImage" id="" required>
            </div>
            <div class="col-12 col-md-6">
                <label>Number of Episodes:</label>
                <input class="full-width"  type="number" name="showEp" id="">
            </div>
            <div class="col-12 col-md-1">
                <label>Airing?:</label><br/>
                <input name="isAiring" id="checkboxAiring" type="checkbox">
            </div>
            <div class="col-12 text-center">
                <input type="submit" value="Add Show">
            </div>
        </div>
    </form>

    
</div>

<?php require_once('footer.php'); ?>