<?php  
 //fetch.php  
 $connect = mysqli_connect("mysql", "root", "Mac++18", "coop_bru");  
 if(isset($_POST["news_id"]))  
 {  
      $query = "SELECT * FROM news_coop WHERE news_id = '".$_POST["news_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>