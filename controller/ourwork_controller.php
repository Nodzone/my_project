<?php
include_once '../config/db.php';
include_once '../modal/index.php';

//print_r($_POST); 
$UploadOurwork = new Manage_Index;

$newFileName = '';

if(isset($_FILES['ourwork_photo']['name'])) {
// $file_name = !empty($_POST['ourwork_title']) ? $_POST['ourwork_title'] : '';
    $ext = pathinfo($_FILES['ourwork_photo']['name'], PATHINFO_EXTENSION);
    $newFileName = $_FILES['ourwork_photo']['name'];
    $fullPath = "../img/ourwork/".$newFileName;
    move_uploaded_file($_FILES["ourwork_photo"]["tmp_name"],$fullPath);
}

if($input = $_POST)
{
    
    if($input['type'] == 'insert'){
        $ourwork_title = !empty($input['ourwork_title']) ? $input['ourwork_title'] : '';
        $ourwork_photo = $newFileName;
        $ourwork_detail = !empty($input['ourwork_detail']) ? $input['ourwork_detail'] : '';
        $ourwork_create_date = !empty($input['ourwork_create_date']) ? $input['ourwork_create_date'] : '';
        $ourwork_create_by = !empty($input['ourwork_create_by']) ? $input['ourwork_create_by'] : '';
    
        $table = 'ourwork_coop';
        $data = [
            'ourwork_title'=>$ourwork_title,
            'ourwork_photo'=>$newFileName,
            'ourwork_detail'=>$ourwork_detail,
            'ourwork_create_date'=>$ourwork_create_date,
            'ourwork_create_by'=>$ourwork_create_by
            
        ];
    
        $UploadOurwork->insert_ourwork($table, $data);

        $find_ourwork_last = $UploadOurwork->find_ourwork_last();

        echo json_encode($find_ourwork_last);
    }
    if($_POST['type'] == 'showDetail')
{
    $id = $_POST['id'];
    $result = $UploadOurwork->find_ourworl_by_id($id);
    echo json_encode($result);
}

    if($input['type'] == 'delete'){
        $delete_ourwork_id = 'ourwork_id = ' . $_POST['delete_ourwork_id'];
        $UploadOurwork->delete_ourwork('ourwork_coop', $delete_ourwork_id);
    }

    if($_POST['type'] == 'edit')  {  
        $input = $_POST;
        $ourwork_id = !empty($input['ourwork_id']) ? $input['ourwork_id'] : '';
        $ourwork_title = !empty($input['ourwork_title']) ? $input['ourwork_title'] : '';
        $ourwork_photo = $newFileName;
        $ourwork_detail = !empty($input['ourwork_detail']) ? $input['ourwork_detail'] : '';
        $ourwork_create_date = !empty($input['ourwork_create_date']) ? $input['ourwork_create_date'] : '';
        $ourwork_create_by = !empty($input['ourwork_create_by']) ? $input['ourwork_create_by'] : '';
    
        $table = 'ourwork_coop';
        $data = [
            'ourwork_id'=>$ourwork_id,
            'ourwork_title'=>$ourwork_title,
            'ourwork_detail'=>$ourwork_detail,
            'ourwork_create_date'=>$ourwork_create_date,
            'ourwork_create_by'=>$ourwork_create_by
        ];
        if(!empty($ourwork_photo)) $data['ourwork_photo'] = $ourwork_photo;
        $UploadOurwork->update_ourwork($table,$data);
    
        $find_ourwork_last = $UploadOurwork->find_ourwork_last();
    
        echo json_encode($find_ourwork_last);
    } 
      
}   

?>