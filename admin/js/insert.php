<?php
include_once '../../config/db.php';
$db = new PHPMySQLi();

// print_r($_POST);
if($input = $_POST)
{
  $output = '';
  
  $fields = [
    "news_id"=> $input['news_id'],
    "news_topic"=> $input['news_topic'],
    "news_picture"=> $input['news_picture'],
    "news_detail"=> $input['news_detail'],
    "news_create_date"=> date('Y-m-d H:i:s'),
    "news_create_by"=> $input['user_id'],
    "news_update_date"=> date('Y-m-d H:i:s'),
    "news_update_by"=> $input['user_id']
    
  ];

  $resultInsert = $db->insert('news_coop', $fields);

  if($resultInsert)
  {    
    $sql = "SELECT * FROM news_coop ORDER BY news_id DESC";
    $result = $db->query($sql,[]);
    $row = $db->fetch_row($result);
    
   
    $output .= '
      <tr>  
        <td> '. $row["news_id"] . '</td>
        <td> '. $row["news_topic"] . '</td>
        <td> '. $row["news_picture"] . '</td>
        <td> '. $row["news_detail"] . '</td>
        <td> '. $row["news_create_date"] . '</td>
        <td><input type="button" name="view" value="View" onclick="select_view(' . $row["news_id"] . ')" class="btn btn-info btn-xs view_data" /></td>  
      </tr>
    ';
    
    
  }
  echo $output;
}
?>