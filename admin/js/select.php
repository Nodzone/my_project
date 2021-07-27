<?php  
include_once '../../config/db.php';
$db = new PHPMySQLi();
if(isset($_POST["news_id"]))
{
    $output = '';
    $news_id = $_POST["news_id"];

    $sql = "SELECT * FROM news_coop WHERE news_id = ?";
    $result = $db->query($sql,[$diary_id]);
    $row = $db->fetch_row($result);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    
     $output .= '
     <tr>  
            <td width="30%"><label>ชื่อเรื่อง</label></td>  
            <td width="70%">'.$row["news_topic"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>เนื้อหางาน</label></td>  
            <td width="70%">'.$row["news_detail"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>รูปภาพ</label></td>  
            <td width="70%">'.$row["news_picture"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>วันที่สร้าง</label></td>  
            <td width="70%">'.$row["news_create_date"].'</td>  
        </tr>
       
     ';
    
    $output .= '</table></div>';
    echo $output;
}
?>