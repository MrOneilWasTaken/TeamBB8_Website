<?php
require_once('header.php');

$order = '';

if (isset($_POST['dropdownSubmit'])) {

  switch ($_POST['dropdownSubmit']) {
    case 'Alphabetical (asc)':
      $order = "ORDER BY showName";
      break;
    case 'Alphabetical (desc)':
      $order = "ORDER BY showName DESC";
      break;
    case 'Producer':
      $order = "ORDER BY stuName";
      break;
    case 'Genre':
      $order = "ORDER BY catDesc";
      break;
    case 'Year':
      $order = "ORDER BY startDate";
      break;
    case 'Ongoing':
      $order = "WHERE endDate IS NULL";
      break;
    case 'default':
      $order = '';
  }

}

$showList = "SELECT * FROM ((shows 
INNER JOIN category ON shows.showCat=category.catID)
INNER JOIN studio ON shows.showStu=studio.stuID) $order";

$showPrep = $dbConn->prepare($showList);

$showPrep->execute(); ?>

<?php if (getSession('errors')) { ?>
  <div class="container-fluid pt-3">
    <div class="row alert alert-danger">
      <div class="col-12">
        <h3>Error: </h3>
        <?php echo getSession('errors'); ?>
      </div>
    </div>
  </div>
<?php } ?>

<div class="container" id="shows-section">

  <h2 class="text-white text-center">Browse Shows</h2><br />
  <div class="row text-center">

    <?php while ($showRow = $showPrep->fetchObject()) { ?>

      <div class="col-md-4 pb-4">
        <img class="img-thumbnail" src="img/<?= $showRow->showImage ?>" alt="<?= $showRow->showName ?>">
        <div class="py-3">
          <?= $showRow->showName ?>
        </div>
        <div>
          <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $showRow->showID; ?>" id="getShow" class="btn btn-sm btn-info">
            More Info
          </button>
        </div>
      </div>
<?php } ?>
</div>
<!--End row-->
</div>
<!--End container-->


<?php
require_once('modal.php');
require_once('footer.php');
?>