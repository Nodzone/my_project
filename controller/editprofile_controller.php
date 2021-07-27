<?php
include_once '../config/db.php';
include_once '../modal/editprofile.php';

if($input = $_POST)
{
    $editProfile = new Edit_Profile;

    $check_user_coop_detail = $editProfile->check_user_coop_detail();
    $user = $_SESSION['user'];
    $user_title= !empty($input['user_title']) ? $input['user_title'] : '';
    $user_name = !empty($input['user_name']) ? $input['user_name'] : '';
    $user_surname = !empty($input['user_surname']) ? $input['user_surname'] : '';
    $user_phone = !empty($input['user_phone']) ? $input['user_phone'] : '';
    $user_position = !empty($input['user_position']) ? $input['user_position'] : '';
    $user_std_id = !empty($input['user_std_id']) ? $input['user_std_id'] : '';
    $user_major = !empty($input['user_major']) ? $input['user_major'] : '';
    $user_faculty = !empty($input['user_faculty']) ? $input['user_faculty'] : '';
    $user_company = !empty($input['user_company']) ? $input['user_company'] : '';
    $user_coop_intership_name = !empty($input['user_coop_intership_name']) ? $input['user_coop_intership_name'] : '';
    $user_grade = !empty($input['user_grade']) ? $input['user_grade'] : '';
    $user_address = !empty($input['user_address']) ? $input['user_address'] : '';
    $user_supervisor_status = !empty($input['user_supervisor_status']) ? $input['user_supervisor_status'] : '';
    $user_partner = !empty($input['user_partner']) ? $input['user_partner'] : '';
    
    $table = 'user_coop_detail';
    $data = [
        'user_id'=>$user['user_id'],
        'user_std_id'=>$user_std_id, 
        'user_position'=>$user_position,
        'user_major'=>$user_major, 
        'user_faculty'=>$user_faculty, 
        'user_company'=>$user_company, 
        'user_coop_intership_name'=>$user_coop_intership_name, 
        'user_grade'=>$user_grade,
        'user_address'=>$user_address,
        'user_supervisor_status'=>$user_supervisor_status,
        'user_detail_update_date'=>date('Y-m-d H:i:s')
    ];
    $table_user_coop = 'user_coop';
    $datauser_coop = [
        
        'user_title'=>$user_title, 
        'user_name'=>$user_name, 
        'user_surname'=>$user_surname, 
        'user_phone'=>$user_phone,
        'user_ckeckinfor'=>'2', 
    ];
    
    if(!$check_user_coop_detail) $editProfile->insert_profile($table, $data);
    else $editProfile->update_profile($table, $data);

    $editProfile->update_user_coop($table_user_coop, $datauser_coop);
    $user['user_name'] = $user_name;
    $user['user_surname'] = $user_surname;
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

        
}


?>