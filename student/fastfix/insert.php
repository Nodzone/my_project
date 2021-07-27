<?php
include_once '../../config/db.php';
$db = new PHPMySQLi();

if($input = $_POST)
{
  $output = '';
  
  $fields = [
    "user_id"=> $input['user_id'],
    "dairy_name"=> $input['dairy_name'],
    "dairy_detail"=> $input['dairy_detail'],
    "dairy_date"=> $input['dairy_date'],
    "diary_more"=> $input['diary_more'],
    "dairy_create_by"=> $input['user_id'],
    "diary_status"=> $input['diary_status']
  ];

  $resultInsert = $db->insert('user_diary', $fields);

  if($resultInsert)
  {    
    $sql = "SELECT * FROM user_diary ORDER BY diary_id DESC";
    $result = $db->query($sql,[]);
    $row = $db->fetch_row($result);
    
   
    $output .= '
      <tr>  
        <td> '. $row["diary_id"] . '</td>
        <td> '. $row["dairy_name"] . '</td>
        <td> '. $row["dairy_detail"] . '</td>
        <td> '. $row["dairy_date"] . '</td>
        <td> '. $row["diary_more"] . '</td>
        <td><input type="button" name="view" value="View" onclick="select_view(' . $row["diary_id"] . ')" class="btn btn-info btn-xs view_data" /></td>  
      </tr>
    ';
    
    
  }
  echo $output;
}
?>
