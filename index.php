<?php 
require_once('header.php');
    
$showList = "SELECT showID, showImage, showName, showStu, showCat, showDesc, showEp, startDate FROM shows
    INNER JOIN category ON shows.showCat = category.catID
    INNER JOIN studio ON shows.showStu = studio.stuID";

    $showPrep = $dbConn->prepare($showList);

    $showPrep->execute();

while($showRow = $showPrep->fetchObject()) { ?>

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

.container-fluid {
  background-color: #6F6FD6;
  padding: 20px;
  flex-direction: row;
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


<div class="container-fluid" id="shows-section">

    <h2 id="pageTitle">Browse Shows</h2><br />

        <div class="row row-cols-3">
            <div class="col-md-4"><img class="img-thumbnail" src="img/<?php echo $showRow->showImage; ?>" alt="<?php echo $showRow->showName; ?>"></a>
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
            <img class="img-thumbnail" src="img/<?php echo $showRow->showImage; ?>" alt="<?php echo $showRow->showName; ?>">
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

<footer>
  <div id="footer-content">
    <p>&copy; MyShows 2021. All rights reserved.</p>
  </div>
</footer>

<?php } require_once('footer.php'); ?>
