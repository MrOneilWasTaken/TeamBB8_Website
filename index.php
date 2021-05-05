<?php
require_once('header.php');

/* Display show that user has searched for if it matches a title from the database */
if (isset($_POST["submit"])) {
  $searchShow = $_POST["search"];
  $findShow = $connection->prepare("SELECT * FROM `search` WHERE showName = '$searchShow'");

  $findShow->setFetchMode(PDO:: FETCH_OBJ);
  $findShow -> execute();

  if ($rowShow = $findShow->fetch()) {
    ?>
    <div class="row row-cols-3">
            <div class="col-md-4"><img class="img" src="img/<?php echo $rowShow->showImage; ?>" alt="<?php echo $showRow->showName; ?>"></a>
                <div> <?php echo $rowShow->showName; ?> <br />
                    <?php echo $rowShow->showStu; ?> <br />
                    <button type="button" class="btn btn-dark" style="background-color: #8AAFD5;" data-toggle="modal" data-target="#showModal">
                    More Info
                    </button>
                </div>
            </div>
        </div> <!--End row-->
    </div> <!--End container-->
<?php
  }
  else {
      echo "Sorry, we're unable to find what you're looking for";
  }
}/* End of search bar code */


$showList = "SELECT * FROM ((shows 
INNER JOIN category ON shows.showCat=category.catID)
INNER JOIN studio ON shows.showStu=studio.stuID)";

$showPrep = $dbConn->prepare($showList);

$showPrep->execute();

while ($showRow = $showPrep->fetchObject()) { ?>

  <div class="container-fluid" id="shows-section">

    <h2 id="pageTitle">Browse Shows</h2><br />

    <div class="row row-cols-3">
      <div class="col-md-4"><img class="img-thumbnail" src="img/<?php echo $showRow->showImage; ?>" alt="<?php echo $showRow->showName; ?>"></a>
        <div> <?php echo $showRow->showName; ?> <br />
          <?php echo $showRow->stuName; ?> <br />
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
            <p><?php echo $showRow->catDesc; ?></p> <br />
            <p><?php echo $showRow->showDesc; ?> <br />
            <p><?php echo $showRow->showEp; ?></p> <br />
            <p><?php echo $showRow->stuName; ?></p> <br />
            <p><?php echo $showRow->startDate; ?></p> <br />
          </div>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" href="addWatchList.php">Add to WatchList</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div id="footer-content">
      <p>&copy; MyShows 2021. All rights reserved.</p>
    </div>
  </footer>

<?php }
require_once('footer.php'); ?>