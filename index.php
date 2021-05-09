<?php
require_once('header.php');

$showList = "SELECT * FROM ((shows 
INNER JOIN category ON shows.showCat=category.catID)
INNER JOIN studio ON shows.showStu=studio.stuID)";

$showPrep = $dbConn->prepare($showList);

$showPrep->execute(); ?>

  <style>
    #pageTitle {
      text-align: center;
      padding: -5px;
      margin-top: 0;
    }

    .navbar {
      margin-bottom: 0;
    }

    .body {
      background-color: #6F6FD6;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
    }

    .zoom-image {
      transition: transform .2s;
      width: 250px;
      height: 200px;
      margin: 0 auto;
    }

    .zoom-image:hover {
      -ms-transform: scale(1.5);
      transform: scale(1.5);
    }

    .modal-body {
      text-align: center;
    }

    #footer-content {
      background-color: #8AAFD5;
    }
  </style>

<?php if(getSession('errors')) { ?>
<div class="container-fluid pt-3">
    <div class="row alert alert-danger">
        <div class="col-12">
            <h3>Error: </h3>
            <?php echo getSession('errors'); ?>
        </div>
    </div>
</div>
<?php } ?>

<?php while ($showRow = $showPrep->fetchObject()) { ?>

  <div class="container-fluid" id="shows-section" style="background-color: #6F6FD6;padding: 20px;flex-direction: row;">



    <h2 id="pageTitle">Browse Shows</h2><br />

    <div class="row">
      <div class="col-md-4"><img class="img-thumbnail" src="img/<?= $showRow->showImage ?>" alt="<?= $showRow->showName ?>"></a>
        <div> <?= $showRow->showName ?> <br />
          <?= $showRow->stuName ?> <br />
          <button type="button" class="btn btn-dark" style="background-color: #8AAFD5;" data-toggle="modal" data-target="#showModal">
            More Info
          </button>
        </div>
      </div>
    </div>
    <!--End row-->
  </div>
  <!--End container-->

  <!-- Modal -->
  <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showModalLabel"><?= $showRow->showName ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-4 offset-4">
            <img class="img-thumbnail" src="img/<?= $showRow->showImage ?>" alt="<?= $showRow->showName ?>">
          </div>
          <div>
            <p><?= "Category:<br>".$showRow->catDesc."<br><br> 
                    Synopsis:<br>".$showRow->showDesc."<br><br> 
                    Number of Episodes:<br>".$showRow->showEp."<br><br>
                    Studio:<br>".$showRow->stuName."<br><br>
                    Start Date:<br>".$showRow->startDate ?></p>
          </div>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" href="addWatchList.php?showID=<?= $showRow->showID ?>">Add to WatchList</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<?php }
require_once('footer.php'); ?>