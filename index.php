<?php require_once('header.php');
    
$showList = "SELECT showImage, showName, showStu FROM shows
    INNER JOIN studio ON shows.showStu = studio.stuID";

    $showPrep = $dbConn->prepare($showList);

    $showPrep->execute();

while($showRow = $prepShow->fetchObject()) { ?>

<div class="container-fluid" id="shows-section">

    <h2 id="pageTitle">Browse Shows</h2><br />

        <div class="row row-cols-3">
            <div class="col-md-4"><img src="img/<?php $showRow->showImage; ?>" class="img-thumbnail" alt="<?php echo $showRow->showName; ?>"></a>
                <div> <?php echo $showRow->showName; ?> <br />
                    <?php echo $showRow->showStu; ?> <br />
                    <button type="button" class="btn btn-dark" style="background-color: #8AAFD5;" data-toggle="modal" data-target="#showModal">
                    More Info
                    </button>
                </div>
            </div>
        </div> <!--End row-->
    </div> <!--End container-->

    <!-- Modal -->
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
            <div class="zoom-image">
            <img src="img/<?php $showRow->showImage; ?>" class="img-thumbnail" alt="<?php echo $showRow->showName; ?>"></a>
            </div>
            <p><?php echo $showRow->showCat; ?></p> <br />
            <p><?php echo $showRow->showDesc; ?> <br />
            <p><?php echo $showRow->showEp; ?></p> <br />
            <p><?php echo $showRow->showStu; ?></p> <br />
            <p><?php echo $showRow->startDate; ?></p> <br />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Add to Watch List</button>
        </div>
      </div>
    </div>
  </div>
<?php } require_once('footer.php'); ?>