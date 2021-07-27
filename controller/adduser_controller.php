<?php
include_once '../config/db.php';
include_once '../modal/adduser.php';



if($input = $_POST)
{
    $manageUser = new Manage_User;

    $user = $_SESSION['user'];
    $user_id = $user['user_id'];
    $user_title= !empty($input['user_title']) ? $input['user_title'] : '';
    $user_name = !empty($input['user_name']) ? $input['user_name'] : '';
    $user_surname = !empty($input['user_surname']) ? $input['user_surname'] : '';
    $user_phone = !empty($input['user_phone']) ? $input['user_phone'] : '';
    $user_type = !empty($input['user_type']) ? $input['user_type'] : '';
    $user_username = !empty($input['user_username']) ? $input['user_username'] : '';
    $user_password = MD5(!empty($input['user_password']) ? $input['user_password'] : '');

    $user_company = !empty($input['user_company']) ? $input['user_company'] : '';
    $user_faculty = !empty($input['user_faculty']) ? $input['user_faculty'] : '';
    $user_major = !empty($input['user_major']) ? $input['user_major'] : '';
    $user_std_id = !empty($input['user_std_id']) ? $input['user_std_id'] : '';
    $user_grade = !empty($input['user_grade']) ? $input['user_grade'] : '';

    $user_moreinfor = !empty($input['user_moreinfor']) ? $input['user_moreinfor'] : '';

    $table = 'user_coop';
    $data = [
        'user_username'=>$user_username,
        'user_password'=>$user_password,
        'user_type'=>$user_type,
        'user_title'=>$user_title,
        'user_name'=>$user_name,
        'user_surname'=>$user_surname,
        'user_phone'=>$user_phone,
        'user_create_date'=>date('Y-m-d H:i:s'),
        'user_update_date'=>date('Y-m-d H:i:s'),
        'user_create_by'=>$user_id,
        'user_update_by'=>$user_id
    ];
   
        $manageUser->insert_user($table, $data);
    $table_2 = 'user_coop_detail';
    $data_2 = [
        'user_id'=>$manageUser->find_user_last_id()+1,
        'user_std_id'=>$user_std_id,
        'user_position'=>$user_type,
        'user_major'=> $user_major,
        'user_faculty'=>$user_faculty,
        'user_company'=>$user_company,
        'user_coop_intership_name'=>'',
        'user_grade'=>'',
        'user_address'=>'',
        'user_moreinfor'=>$user_moreinfor,
        'user_coop_detail_update_date'=>date('Y-m-d H:i:s')
    ];
    
       
        $manageUser->insert_user_detail($table_2, $data_2);
        header("location:../admin/adduser.php");
        
        
          
}
?>