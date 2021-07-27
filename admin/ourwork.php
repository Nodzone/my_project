<?php
  include_once '../config/db.php';
 
  include_once '../modal/index.php';

  $work_our = new Manage_Index();
  $find_ourwork = $work_our->all_ourwork_coop();
  // echo "<pre>"; print_r($find_ourwork); echo "</pre>";
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

  <title>Admin OurWork - Update</title>

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
          <h1 class="h3 mb-4 text-gray-800">ผลงาน</h1>
        </div>
        <div align="right">  
          <button type="button" name="add" id="add" onclick="add_form();" class="btn btn-success">เพิ่มข้อมูล</button>  
        </div>  
        <div class="tabbable" id="tabs-343650">
                  <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active show" href="#tab1" data-toggle="tab">รายการที่มีอยู่</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">เพิ่มผลงาน</a></li> -->
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
                    $i=0;
                    if($find_ourwork){
                      foreach ($find_ourwork as $val){
                        $ourwork_id = !empty($val['ourwork_id'])? $val['ourwork_id'] : '';
                        $ourwork_title = !empty($val['ourwork_title'])? $val['ourwork_title'] : '';
                        $ourwork_photo = !empty($val['ourwork_photo'])? $val['ourwork_photo'] : '';
                        $ourwork_detail = !empty($val['ourwork_detail'])? $val['ourwork_detail'] : '';
                        $ourwork_create_date = !empty($val['ourwork_create_date'])? $val['ourwork_create_date'] : '';
                        $ourwork_create_by = !empty($val['ourwork_create_by'])? $val['ourwork_create_by'] : '';
                        $i=$i+1;
                    ?>
                    <tr class="table-success" id="row-<?php echo $ourwork_id;?>">
                          
                          <td><?php echo $i;?></td>
                          <td><?php echo $ourwork_title;?></td>
                          <?php echo "<td><img src='../img/ourwork/".$ourwork_photo."' style='width:75px;height:75px;'/></td>" ?>
                          <!-- <td><input type="file" name="uploadedFile" /></td> -->
                          <td><?php echo $ourwork_detail;?></td>
                          <td><?php echo $ourwork_create_date;?></td> 
                          <td><button class="btn btn-warning" onclick="window.open('../page_ourwork.php?ourwork=<?php echo $ourwork_id; ?>');">ตรวจสอบ</button></td>                               
                          <td><button type="button" name="Edit" value="Edit"  onclick="edit_data(<?php echo $ourwork_id; ?>)" class="btn btn-info btn-xs">แก้ไข</button></td> 
                          <td><button type="button" name="del_ourwork" class="btn btn-danger"  onclick="return delete_ourwork(<?php echo $ourwork_id?>);">ลบ</button></td> 
                          
                    </tr>
                    <?php }}?>
                  </tbody>
                </table>
              </div>
            </div>

                
        </div>
        <!-- Modal - Updae Ourwork details -->

           
      </div>
      <!-- End of Main Content -->
      <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">
                     <h4 class="modal-title">เพิ่มผลงาน</h4>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form_ourwork" enctype="multipart/form-data">  
                          <label>หัวข้อ</label>  
                          <input type="text" name="ourwork_title" id="ourwork_title" class="form-control" required/>  
                          <br />  
                          <label>เขียนเนื้อหาข่าวสาร</label>  
                          <textarea name="ourwork_detail" id="ourwork_detail" class="form-control" required></textarea>  
                          <br />  
            
                          <label>เลือกรูปภาพ</label>  
                          <input type="file" name="ourwork_photo" id="ourwork_photo"/> 
                          <br />  
<<<<<<< HEAD
                          <input type="hidden" name="ourwork_create_date" id="ourwork_create_date" value="<?php echo date('Y-m-d H:i:s'); ?>"> 
                          <input type="hidden" name="ourwork_create_by" id="ourwork_create_by" value="<? echo $user_title." ".$user_name." ".$user_surname ?>">
=======
                          <input type="hidden" name="type" value="insert">
                          <input type="hidden" name="ourwork_create_date" id="ourwork_create_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                          
                          <input type="hidden" name="ourwork_create_by" id="ourwork_create_by" value="<? echo $user_id; ?>">
                          
>>>>>>> 455034b7a855ee7b84b9f7fa1270c73d52c0728a
                          <input type="hidden" name="ourwork_id" id="ourwork_id" />  
                          <input type="submit" name="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
        </div>  
        </div>  
<!-- // Modal -->
   
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
  <script src="js/ourwork.js"></script>
  <script src="js/script.js"></script>

</body>

</html>




   
 
