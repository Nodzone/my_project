<?php

if(isset($_POST["subject"]))

{

include("connect.php");

$subject = mysqli_real_escape_string($con, $_POST["subject"]);

$comment = mysqli_real_escape_string($con, $_POST["email"]);

$email = mysqli_real_escape_string($con, $_POST["phone"]);

$phone = mysqli_real_escape_string($con, $_POST["comment"]);


$query = "INSERT INTO `ct_coop` (`ct_name`, `ct_email`, `ct_phone`, `ct_text`, `ct_status`)VALUES ($subject' ,'$email' ,'$phone' ,'$comment')";
mysqli_query($con, $query);

}

?>