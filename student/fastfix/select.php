<?php  
include_once '../../config/db.php';
$db = new PHPMySQLi();
if(isset($_POST["diary_id"]))
{
    $output = '';
    $diary_id = $_POST["diary_id"];

    $sql = "SELECT * FROM user_diary WHERE diary_id = ?";
    $result = $db->query($sql,[$diary_id]);
    $row = $db->fetch_row($result);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    
     $output .= '
     <tr>  
            <td width="30%"><label>ชื่อเรื่อง</label></td>  
            <td width="70%">'.$row["dairy_name"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>เนื้อหางาน</label></td>  
            <td width="70%">'.$row["dairy_detail"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>วันที่ปฏิบัติ</label></td>  
            <td width="70%">'.$row["dairy_date"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>หมายเหตุ</label></td>  
            <td width="70%">'.$row["diary_more"].'</td>  
        </tr>
       
     ';
    
    $output .= '</table></div>';
    echo $output;
}
?>