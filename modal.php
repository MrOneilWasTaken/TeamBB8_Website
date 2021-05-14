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
  