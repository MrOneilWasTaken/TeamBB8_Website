<?php
   
   header('Content-type: application/json; charset=UTF-8');
   require_once('functions.php');
    $dbConn = getConnection();
   if (isset($_POST['id']) && !empty($_POST['id'])) {
    
       $id = intval($_POST['id']);
       $query = "SELECT * FROM ((shows 
       INNER JOIN category ON shows.showCat=category.catID)
       INNER JOIN studio ON shows.showStu=studio.stuID) WHERE showID=:id";
       $stmt = $dbConn->prepare( $query ); 
       $stmt->execute(array(':id'=>$id));
       $row=$stmt->fetch(PDO::FETCH_ASSOC);       
       echo json_encode($row);
       exit; 
   }
 
 ?>