<?php
include_once '../config/db.php';
include_once '../modal/title_doc.php';


if($input = $_POST)
{
    $manageTDoc = new Manage_TitilDoc;

    $user = $_SESSION['user'];
    $user_id = $user['user_id'];
    $date_create_tdoc= !empty($input['user_title']) ? $input['user_title'] : '';
    $to_name = !empty($input['to_name']) ? $input['to_name'] : '';
    $date_start = !empty($input['date_start']) ? $input['date_start'] : '';
    $date_done = !empty($input['date_done']) ? $input['date_done'] : '';
    $tdoc_std_titlename = !empty($input['tdoc_std_titlename']) ? $input['tdoc_std_titlename'] : '';
    $tdoc_std_name = !empty($input['tdoc_std_name']) ? $input['tdoc_std_name'] : '';
    $tdoc_std_submajor = !empty($input['tdoc_std_submajor']) ? $input['tdoc_std_submajor'] : '';
    $tdoc_std_major = !empty($input['tdoc_std_major']) ? $input['tdoc_std_major'] : '';
    $manager_name = !empty($input['manager_name']) ? $input['manager_name'] : '';
    $mng_position = !empty($input['mng_position']) ? $input['mng_position'] : '';
    $t_manager_name = !empty($input['t_manager_name']) ? $input['t_manager_name'] : '';



    $table = 'title_doc';
    $data = [
        'user_id'=>$user_id,
        'date_create_tdoc'=>date('Y-m-d H:i:s'),
        'to_name'=>$to_name,
        'date_start'=>$date_start,
        'date_done'=>$date_done,
        'tdoc_std_titlename'=>$tdoc_std_titlename,
        'tdoc_std_name'=>$tdoc_std_name,
        'tdoc_std_submajor'=>$tdoc_std_submajor,
        'tdoc_std_major'=>$tdoc_std_major,
        'manager_name'=>$manager_name,
        'mng_position'=>$mng_position,
        't_manager_name'=>$t_manager_name,
        'tdoc_creata_date'=>date('Y-m-d H:i:s'),       
        'tdoc_creata_by'=>$user_id,
        'tdoc_status'=> '1'
    ];

    
    $manageTDoc->insert_tdoc($table, $data);
    header("location:../index.php");
        
        
          
}

?>