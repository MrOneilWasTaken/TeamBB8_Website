<?php
  require_once('functions.php');
  $dbConn = getConnection();
  

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT showName FROM shows WHERE showName LIKE :showName';
    $stmt = $dbConn->prepare($sql);
    $stmt->execute(['showName' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['showName'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>