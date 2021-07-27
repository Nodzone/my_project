<?php
include_once '../config/db.php';
include_once '../modal/partner.php';
$user = $_SESSION['user'];
$user_type = $user['user_type'];


if ($input = $_POST )
{
    $managePartner = new Manage_Partnet;

    $user = $_SESSION['user'];
    $user_name = !empty($input['user_name']) ? $input['user_name'] : '';
    $user_surname = !empty($input['user_surname']) ? $input['user_surname'] : '';
    $user_id = !empty($input['user_id']) ? $input['user_id'] : '';
    $user_partner1_id= !empty($input['user_partner1_id']) ? $input['user_partner1_id'] : '';
    $user_partner1_fullname = !empty($input['user_partner1_fullname']) ? $input['user_partner1_fullname'] : '';
    $user_partner1_major = !empty($input['user_partner1_major']) ? $input['user_partner1_major'] : '';
    
    $partner_crate_date = !empty($input['partner_crate_date']) ? $input['partner_crate_date'] : '';
    $partner_crate_by = !empty($input['partner_crate_by']) ? $input['partner_crate_by'] : '';
    $partner_update_date = !empty($input['partner_update_date']) ? $input['partner_update_date'] : '';
    $partner_update_by = !empty($input['partner_update_by']) ? $input['partner_update_by'] : '';
    //$user_type = !empty($input['user_type']) ? $input['user_type'] : '';

    $table = 'user_coop_partner';
    $data = [
        'user_id'=>$user_id,
        'user_partner1_id'=>$user_partner1_id,
        'user_partner1_fullname'=>$user_partner1_fullname,
        'user_partner1_major'=>$user_partner1_major,
        'user_partner2_id'=>'99',
        'user_partner2_fullname'=>'99',
        'user_partner2_company'=>'99',
        'partner_crate_date'=>date('Y-m-d H:i:s'),
        'partner_update_date'=>date('Y-m-d H:i:s'),
        'partner_crate_by'=>$user_id,
        'partner_update_by'=>$user_id
    ];
    $managePartner->insert_partner($table, $data);

    if($user_type == '3'){
    header("location:../emp/index.php");
    }
    else if($user_type == '2') {
        header("location:../teacher/index.php");
    }
   
}    
    

?>