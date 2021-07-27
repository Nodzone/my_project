<?php
  include_once '../config/db.php';
  if(empty($_SESSION['user'])) { // if นี้ใช้ตรวจสอบถ้าไม่ได้ login ให้ไปหน้า login
    header ("location:../login/login.php");
    }
  include_once '../modal/news.php';

  $news = new News_Page();
  $find_news = $news->find_news();
  //echo "<pre>"; print_r($find_news); echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/icons/LOGO-bru.ico"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin News - Update</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <style>
    .button2
    {
      background-color: #1982C4;
      border: none;
      border-radius: 2px;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer; /* Blue */
    }
  </style> 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include "header-admin.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-4 text-gray-800">ข่าวสาร-กิจกรรม</h1>
        </div>
        <div align="right">  
          <button type="button" name="add" id="add" onclick="add_form();" class="btn btn-success">เพิ่มข้อมูล</button>  
        </div>  
        <div class="tabbable" id="tabs-343650">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">                      <a class="nav-link active show" href="#tab1" data-toggle="tab">รายการที่มีอยู่</a>                    </li>
                    <!-- <li class="nav-item">                      <a class="nav-link" href="#tab2" data-toggle="tab">เพิ่มข่าว</a>                    </li> -->
                  </ul>
          <div class="tab-content">
        <!-- Table Update News -->
            <div class="tab-pane active" id="tab1">
              <div>
                  <table class="table table-bordered table-sm">
                  <thead>
                    <tr>
                      <th>                  No.                </th>
                      <th>                  หัวเรื่อง               </th>
                      <th>                  ภาพประกอบ                 </th>
                      <th>                  รายละเอียด                </th>
                      <th>                  วันที่อัพเดท                </th>
                      <th>                  View                </th>
                      <th>                  แก้ไข               </th>
                      <th>                  ลบ               </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 0;
                    if($find_news){
                      foreach ($find_news as $val){
                        $news_id = !empty($val['news_id'])? $val['news_id'] : '';
                        $news_topic = !empty($val['news_topic'])? $val['news_topic'] : '';
                        $news_picture = !empty($val['news_picture'])? $val['news_picture'] : '';
                        $news_detail = !empty($val['news_detail'])? $val['news_detail'] : '';
                        $news_create_date = !empty($val['news_create_date'])? $val['news_create_date'] : '';
                        $news_create_by = !empty($val['news_create_by'])? $val['news_create_by'] : '';
                        $news_update_date = !empty($val['news_update_date'])? $val['news_update_date'] : '';
                        $i = $i+1;
                    ?>
                    <tr class="table-success" id="row-<?php echo $news_id;?>">
                          
                          <td><?php echo $i;?></td>
                          <td><?php echo $news_topic;?></td>
                          <?php echo "<td><img src='../img/news/".$news_picture."' style='width:75px;height:75px;'/></td>" ?>
                          <!-- <td><input type="file" name="uploadedFile" /></td> -->
                          <td><?php echo $news_detail;?></td>
                          <td><?php echo $news_update_date;?></td>
                          <td><button class="btn btn-warning" onclick="window.open('../page_news.php?news=<?php echo $news_id; ?>');">ดู</button></td>                    
                          <td><input type="button" name="edit" value="แก้ไข" onclick="edit_data(<?php echo $news_id; ?>)" class="btn btn-info btn-xs" /></td> 
                          <td><button type="button" name="del_news" class="btn btn-danger" onclick="return delete_news(<?php echo $news_id?>);">ลบ</button></td> 
                          
                    </tr>
                    <?php }}?>
                  </tbody>
                </table>
              </div>
              
            </div>
        </div>
        
           
      </div>
      <!-- End of Main Content -->
 
          
<!-- Modal - Updae NEWS details -->
<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">
                     <h4 class="modal-title">เพิ่มข่าว </h4>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" enctype="multipart/form-data">  
                          <label>หัวข้อ</label>  
                          <input type="text" name="news_topic" id="news_topic" class="form-control" required/>  
                          <br />  
                          <label>เขียนเนื้อหาข่าวสาร</label>  
                          <textarea name="news_detail" id="news_detail" class="form-control" required></textarea>  
                          <br />  
            
                          <label>เลือกรูปภาพ</label>  
                          <input type="file" name="news_picture" id="news_picture"/> 
                          <br />  
                          <input type="hidden" name="type" value="insert">
                          <input type="hidden" name="news_create_date" id="news_create_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                          <input type="hidden" name="news_create_by" id="news_create_by" value="<? echo $user_name." ".$user_surname ?>">
                          <input type="hidden" name="news_update_by" id="news_update_by" value="<? echo $user_title." ".$user_name." ".$user_surname ?>">
                          <input type="hidden" name="news_update_date" id="news_update_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                          <input type="hidden" name="news_id" id="news_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<!-- // Modal -->
<script>
// Modal script


</script>
    </div>
    <!-- End of Content Wrapper -->
    <?php include "footer-admin.php" ?>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include "logout.php" ?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/news.js"></script>

</body>

</html>