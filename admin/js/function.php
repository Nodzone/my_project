<?php

function upload_image()
{
 if(isset($_FILES["news_picture"]))
 {
  $extension = explode('.', $_FILES['news_picture']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = './upload/' . $new_name;
  move_uploaded_file($_FILES['news_picture']['tmp_name'], $destination);
  return $new_name;
 }
}

function get_image_name($news_id)
{
 include('db.php');
 $statement = $connection->prepare("SELECT news_picture FROM news_coop WHERE news_id = '$news_id'");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["news_picture"];
 }
}

function get_total_all_records()
{
 include('db.php');
 $statement = $connection->prepare("SELECT * FROM news_coop");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

?>