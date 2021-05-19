<?php
require_once('header.php');

if (isset($_POST['submit'])) {
  $showName = $_POST['search'];
  $sql = "SELECT * FROM ((shows 
    INNER JOIN category ON shows.showCat=category.catID)
    INNER JOIN studio ON shows.showStu=studio.stuID) WHERE showName = :showName";
  $stmt = $dbConn->prepare($sql);
  $stmt->execute(['showName' => $showName]);
} else {
  header('location: .');
  exit();
}
?>

<div class="container">

  <?php if ($stmt->rowCount() == 0) { ?>
    <div class="row mt-5">
      <div class="col">
        No Results Found
      </div>
    </div>
  <?php } ?>
  <?php while ($showRow = $stmt->fetchObject()) { ?>
    <table class="table mt-5">
      <thead>
        <tr>
          <th scope="col-3">Title</th>
          <th scope="col-3">Category</th>
          <th scope="col-3">Studio</th>
          <th scope="col-3">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= $showRow->showName; ?></td>
          <td><?= $showRow->catDesc; ?></td>
          <td><?= $showRow->stuName; ?></td>
          <td>
            <button type="button" class="btn btn-dark" style="background-color: #8AAFD5;" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $showRow->showID; ?>" id="getShow">
              More Info
            </button>
          </td>
        </tr>
      <?php require_once('modal.php');
    } ?>

      </tbody>
    </table>
</div>



<?php require_once('footer.php'); ?>