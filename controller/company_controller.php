<?php
include_once '../config/db.php';
include_once '../modal/company.php';

$manageCompany = new Edit_Company;

if( $_POST['type'] = 'insert')
{
  
    
   
    $user = $_SESSION['user'];
    $user_id = $user['user_id'];
    $user_coop_company_name = !empty($input['user_coop_company_name']) ? $input['user_coop_company_name'] : '';
    $user_coop_company_update_date = !empty($input['user_coop_company_update_date']) ? $input['user_coop_company_update_date'] : '';
    $user_coop_company_address = !empty($input['user_coop_company_address']) ? $input['user_coop_company_address'] : '';
    $user_coop_company_update_by = !empty($input['user_coop_company_update_by']) ? $input['user_coop_company_update_by'] : '';
    $user_company_phone = !empty($input['user_company_phone']) ? $input['user_company_phone'] : '';
  
    $user_company_fax = !empty($input['user_company_fax']) ? $input['user_company_fax'] : '';

    $table = 'user_coop_company';
    $data = [
        'user_company_name'=>$user_coop_company_name,
        'user_company_address'=>$user_coop_company_address,
        'user_company_phone'=>$user_company_phone,
        'user_company_fax'=>$user_company_fax,
        'user_company_update_by'=>''.$user_id,
        'user_company_update_date'=>date('Y-m-d H:i:s')
      
    ];
   
        $manageCompany->insert_company($table, $data);
                
}

if( $_POST['type'] = 'update')
{
    $input = $_POST;
    $user = $_SESSION['user'];
    $user_id = $user['user_id'];
    $user_coop_company_name = !empty($input['user_coop_company_name']) ? $input['user_coop_company_name'] : '';
    $user_coop_company_update_date = !empty($input['user_coop_company_update_date']) ? $input['user_coop_company_update_date'] : '';
    $user_coop_company_address = !empty($input['user_coop_company_address']) ? $input['user_coop_company_address'] : '';
    $user_coop_company_update_by = !empty($input['user_coop_company_update_by']) ? $input['user_coop_company_update_by'] : '';
    
  

    $table = 'user_coop_company';
    $data = [
        'user_coop_company_id'=>'',
        'user_coop_company_name'=>$user_coop_company_name,
        'user_coop_company_address'=>$user_coop_company_address,
        'user_coop_company_update_date'=>date('Y-m-d H:i:s'),
        'user_coop_company_update_by'=>$user_id
    ];
    $manageCompany->update_company($table,$data);

  
          
}
if($_POST['type'] == 'delete'){
    $delete_company = $_POST['delete_company_id'];
    $manageCompany->delete_company('user_coop_company', $delete_company_id);
}
?>