<?php
require_once('header.php');

$order = '';

if(isset($_POST['dropdownSubmit'])) {

switch($_POST['dropdownSubmit']) {
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
  case 'Ongoing':
    $order = "WHERE endDate IS NULL";
    break;
  case 'default':
    $order = '';
}

echo $order;

}

$showList = "SELECT * FROM ((shows 
INNER JOIN category ON shows.showCat=category.catID)
INNER JOIN studio ON shows.showStu=studio.stuID)";

$showPrep = $dbConn->prepare($showList);

$showPrep->execute(); ?>

<?php if(getSession('errors')) { ?>
<div class="container-fluid pt-3">
    <div class="row alert alert-danger">
        <div class="col-12">
            <h3>Error: </h3>
            <?php echo getSession('errors'); ?>
        </div>
    </div>
</div>
<?php } 

while ($showRow = $showPrep->fetchObject()) { ?>

  <div class="container" id="shows-section">

    <h2 class="text-white text-center">Browse Shows</h2><br />

    <div class="row text-center">
      <div class="col-md-4"><img class="img-thumbnail" src="img/<?= $showRow->showImage ?>" alt="<?= $showRow->showName ?>"></a>
        <div class="py-3">
          <?= $showRow->showName ?>
        </div>
        <div>
          <button type="button" class="btn btn-dark" style="background-color: #8AAFD5;" data-toggle="modal" data-target="#showModal">
              More Info
            </button>
          </div>
      </div>
    </div>
    <!--End row-->
  </div>
  <!--End container-->


<?php require_once('modal.php'); } require_once('footer.php'); ?>