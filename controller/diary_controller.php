<?
include_once '../config/db.php';
include_once '../modal/dairy.php';


$Dairy_Student = new Dairy_Student();
if($_POST['type'] == 'updateStdPartner'){
    $id = $_POST['id'];
    $return = $Dairy_Student->update_Dairy_STD($id);
    echo json_encode($return);
}
?>