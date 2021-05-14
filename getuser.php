<?php
   
   header('Content-type: application/json; charset=UTF-8');
   

   if (isset($_POST['id']) && !empty($_POST['id'])) {
    
       $id = intval($_POST['id']);
       $query = "SELECT * FROM shows WHERE showID=:id";
       $stmt = $dbConn->prepare( $query ); 
       $stmt->execute(array(':id'=>$id));
       $row=$stmt->fetch(PDO::FETCH_ASSOC);       
       echo json_encode($row);
       exit; 
   }
 
 ?>