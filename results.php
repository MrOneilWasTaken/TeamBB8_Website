<?php
  require_once('header.php');

  if (isset($_POST['submit'])) {
    $showName = $_POST['search'];
    // ((shows 
    // INNER JOIN category ON shows.showCat=category.catID)
    // INNER JOIN studio ON shows.showStu=studio.stuID)
    $sql = "SELECT * FROM ((shows 
    INNER JOIN category ON shows.showCat=category.catID)
    INNER JOIN studio ON shows.showStu=studio.stuID) WHERE showName = :showName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute(['showName' => $showName]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }
?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-5 mx-auto">
        <div class="card shadow text-center">
          <div class="card-header">
            <h1><?= $row['showName'] ?></h1>
          </div>
          <div class="card-body">
            <h4><b>Category :</b> <?= $row['catDesc'] ?></h4>
            <h4><b>Studio :</b> <?= $row['stuName'] ?></h4>
            <h4><button class="btn" data-toggle="modal" data-target="#showModal">More Info</button></h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal
  <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showModalLabel"><?php echo $showRow->showName; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-4 offset-4">
            <img class="img-thumbnail" src="img/<?php echo $showRow->showImage; ?>" alt="<?php echo $showRow->showName; ?>">
          </div>
          <div>
            <p><?= $showRow->catDesc; ?></p> <br />
            <p><?= $showRow->showDesc; ?> <br />
            <p><?= $showRow->showEp; ?></p> <br />
            <p><?= $showRow->stuName; ?></p> <br />
            <p><?= $showRow->startDate; ?></p> <br />
          </div>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" href="addWatchList.php?showID=<?= $showRow->showID ?>">Add to WatchList</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> -->

<?php require_once('footer.php'); ?>