<?php require_once('header.php'); ?>

<?php if(getSession('logged-in')) { ?>

<?php $genre = "SELECT * FROM category";
$prepGenre = $dbConn->prepare($genre);
$prepGenre->execute();

$studio = "SELECT * FROM studio";
$prepStudio = $dbConn->prepare($studio);
$prepStudio->execute();

$showID = $_GET['showID'];

$show = "SELECT * FROM shows WHERE showID = :showID";
$prepareShow = $dbConn->prepare($show);
$prepareShow->execute(array(':showID' => $showID));

?>

<div class="container">
    <form id="showForm" action="updateShowProcess.php" method="post">
        <?php while($singleShow = $prepareShow->fetchObject()) { ?>
        <div class="row text-center">
            <div class="col-6 offset-3">    
                <h1>Update Show</h1>
                
                <img class="img-thumbnail" style="width: 50%;" src="img/<?php echo "$singleShow->showImage"; ?>" alt=""><br>
                <label class="text-right">Show ID:</label>
                <input class="full-width" type="number" name="showID" id="" value="<?php echo "$singleShow->showID" ?>" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <label>Name:</label>
                <input type="text" class="full-width" name="showName" value="<?php echo "$singleShow->showName"; ?>" required>
            </div>
            <div class="col-12 col-md-6">
                <label>Description:</label>
                <textarea class="full-width" name="showDesc" id="" oninput="autoHeight()" required><?php echo "$singleShow->showDesc";?></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <label>Start Date:</label>
                <input class="full-width" name="startDate" type="date" id="" value="<?php echo "$singleShow->startDate"; ?>" required>
            </div>
            <?php $singleShow->endDate == NULL ? $visibility = 'hidden' : $visibility = 'visible'; ?>
            <div id="endDateCont" class="col-12 col-md-6"  style="visibility:<?php echo $visibility ?>" >
                <label>End Date:</label>
                <input class="full-width" name="endDate" type="date" id="endDate" value="<?php echo "$singleShow->endDate"; ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <label>Genre:</label>
                <select class="full-width" name="showCat" id="" required>
                    <option value="" disabled>Select Genre</option>
                    <?php while($genreRow = $prepGenre->fetchObject()) { ?>
                        <?php $singleShow->showCat == $genreRow->catID ? $selected = 'selected' : $selected = ''; ?>
                    <option value="<?php echo "$genreRow->catID"; ?>" <?php echo $selected; ?>><?php echo "$genreRow->catDesc"; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label>Studio:</label>
                <select class="full-width" name="showStu" id="" required>
                <option value="" disabled selected>Select Studio</option>
                    <?php while($studioRow = $prepStudio->fetchObject()) { ?>
                        <?php $singleShow->showStu == $studioRow->stuID ? $selected = 'selected' : $selected = ''; ?>
                    <option value="<?php echo "$studioRow->stuID"; ?>" <?php echo $selected; ?>><?php echo "$studioRow->stuName"; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <label>Image name:</label>
                <input class="full-width" type="text" name="showImage" id="" value="<?php echo "$singleShow->showImage"; ?>" required>
            </div>
            <div class="col-12 col-md-6">
                <label>Number of Episodes:</label>
                <input class="full-width"  type="number" name="showEp" id="" value="<?php echo "$singleShow->showEp"; ?>" required>
            </div>
            <div class="col-12 col-md-1">
                <label>Airing?:</label><br/>
                <?php $singleShow->endDate == NULL ? $checked = 'checked' : $checked = ''; ?>
                <input name="isAiring" id="checkboxAiring" type="checkbox" <?php echo $checked; ?>>
            </div>
            <div class="col-12 text-center">
                <input type="submit" class="btn btn-primary" value="Update Show">
                <a href="admin.php" class="btn btn-secondary">Return</a>
            </div>
        </div>
        <?php } ?>
    </form>

    
</div>

<?php } else { header('Location: login.php'); } 
require_once('footer.php'); ?>