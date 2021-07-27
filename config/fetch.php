<?php

include('connect.php');

if(isset($_POST['view'])){

 //$con = mysqli_connect("localhost", "root", "", "coop_bru");

if($_POST["view"] != '')

{
   $update_query = "UPDATE 'ct_coop' SET 'ct_status' = '1' WHERE ct_status=0";
   mysqli_query($con, $update_query);
}

$query = "SELECT * FROM 'ct_coop' ORDER BY 'ct_id' DESC LIMIT 5";
$result = mysqli_query($con, $query);
$output = '';

if(mysqli_num_rows($result) > 0)
{

while($row = mysqli_fetch_array($result))

{

  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["ct_name"].'</strong><br />
  <small><em>'.$row["ct_email"].'</em></small>
  <strong>'.$row["ct_phone"].'</strong><br />
  <small><em>'.$row["ct_text"].'</em></small>
  </a>
  </li>

  ';
}
}

else{
    $output .= '<li><a href="#" class="text-bold text-italic">ไม่มีการแจ้งเตือนใดๆ</a></li>';
}

$status_query = "SELECT * FROM 'ct_coop' WHERE ct_status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);

$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);

echo json_encode($data);
}
?>