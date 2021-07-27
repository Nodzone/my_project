<?php
include_once '../config/db.php';
include_once '../modal/upload_file.php';

$newFileName = '';

if(isset($_FILES['file_local']['name'])) {
    //$file_name = !empty($_POST['file_name']) ? $_POST['file_name'] : '';
    $ext = pathinfo($_FILES['file_local']['name'], PATHINFO_EXTENSION);
    $newFileName = $_FILES['file_local']['name'];
    $fullPath = "../files/".$newFileName;
    move_uploaded_file($_FILES["file_local"]["tmp_name"],$fullPath);
}

if($input = $_POST)
{
    $UploadFile = new Upload_File;

    $user = $_SESSION['user'];
    $user_type = $user['user_type'];
    $user_id = $user['user_id'];
    $user_name = $user['user_name'];
    $file_name = !empty($input['file_name']) ? $input['file_name'] : '';
    $file_local = $newFileName;
    $file_type = !empty($input['file_type']) ? $input['file_type'] : '';
    $file_status = !empty($input['file_status']) ? $input['file_status'] : '';
    $file_create_by = !empty($input['file_create_by']) ? $input['file_create_by'] : '';
    $file_update_by = !empty($input['file_update_by']) ? $input['file_update_by'] : '';

    $table = 'file_coop';
    $data = [
        'user_id'=>$user_id,
        'file_name'=>$file_name,
        'file_local'=>$newFileName,
        'file_type'=>$file_type,
        'file_status'=>$file_status,
        'file_create_date'=>date('Y-m-d H:i:s'),
        'file_update_date'=>date('Y-m-d H:i:s'),
        'file_create_by'=>$file_create_by,
        'file_update_by'=>$file_update_by
    ];
    
    $UploadFile->insert_file($table, $data);
    $_SESSION['user'] = $user;
    
    if($user["user_type"] == "5")
		{
			header("location:../admin/index.php"); 
		}
		else if ($user["user_type"] == "1")
		{
			header("location:../student/index.php");
		}
		else if ($user["user_type"] == "2")
		{
			header("location:../teacher/index.php");
		}
		else if ($user["user_type"] == "3")
		{
			header("location:../emp/index.php");
        }
        else if ($user["user_type"] == "4")
		{
			header("location:../manager/index.php");
        }
           
        
          
}
?>