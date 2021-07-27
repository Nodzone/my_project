<?php
include_once '../config/db.php';
include_once '../modal/news.php';

$UploadNews = new News_Page;

// print_r($_POST); 



$newFileName = '';

if(isset($_FILES['news_picture']['name'])) {
    
    $ext = pathinfo($_FILES['news_picture']['name'], PATHINFO_EXTENSION);
    $newFileName = $_FILES['news_picture']['name'];
    $fullPath = "../img/news/".$newFileName;
    move_uploaded_file($_FILES["news_picture"]["tmp_name"],$fullPath);
}

if($_POST['type'] == 'insert')
{
    $input = $_POST;
    $news_topic = !empty($input['news_topic']) ? $input['news_topic'] : '';
    $news_picture = $newFileName;
    $news_detail = !empty($input['news_detail']) ? $input['news_detail'] : '';
    $news_create_by = !empty($input['news_create_by']) ? $input['news_create_by'] : '';
    $news_update_by = !empty($input['news_update_by']) ? $input['news_update_by'] : '';

    $table = 'news_coop';
    $data = [
        'news_topic'=>$news_topic,
        'news_detail'=>$news_detail,
        'news_picture'=>$newFileName,
        'news_create_date'=>date('Y-m-d H:i:s'),
        'news_update_date'=>date('Y-m-d H:i:s'),
        'news_create_by'=>$news_create_by,
        'news_update_by'=>$news_update_by
    ];
    
      
    $UploadNews->insert_news($table, $data);
    
    $find_news_last = $UploadNews->find_news_last();

    echo json_encode($find_news_last);
    
    // function update_news($table_news_coop, $datanews_coop = array())
    // {
    //     $this->db->update($table_news_coop, $datanews_coop, []);
    // }  
}

if($_POST['type'] == 'showDetail')
{
    $id = $_POST['id'];
    $result = $UploadNews->find_news_by_id($id);
    echo json_encode($result);
}

if($_POST['type'] == 'delete'){
    $delete_news_id = $_POST['delete_news_id'];
    $UploadNews->delete_news('news_coop', $delete_news_id);
}

if($_POST['type'] == 'edit')  {  
    $input = $_POST;
    $news_id = !empty($input['news_id']) ? $input['news_id'] : '';
    $news_topic = !empty($input['news_topic']) ? $input['news_topic'] : '';
    $news_picture = $newFileName;
    $news_detail = !empty($input['news_detail']) ? $input['news_detail'] : '';
    $news_update_by = !empty($input['news_update_by']) ? $input['news_update_by'] : '';

    $table = 'news_coop';
    $data = [
        'news_id'=>$news_id,
        'news_topic'=>$news_topic,
        'news_detail'=>$news_detail,
        'news_update_date'=>date('Y-m-d H:i:s'),
        'news_update_by'=>$news_update_by
    ];
    if(!empty($news_picture)) $data['news_picture'] = $news_picture;
    $UploadNews->update_news($table,$data);

    $find_news_last = $UploadNews->find_news_last();

    echo json_encode($find_news_last);
}  
?>
