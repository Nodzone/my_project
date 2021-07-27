<?php
  include_once '../config/db.php';
  include_once '../modal/upload_file.php';
  $file = new Upload_File();
  $find_file  = $file->find_file();
//print_r($fetch);

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

  <title>Admin - จัดการเอกสาร</title>
  <script src="js/main.js"></script>

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
      font-size: 12px;
      margin: 4px 2px;
      cursor: pointer; /* Blue */
    }
    .btn 
    {
      border-radius: 2px;
      padding: 5px 10px;
      font-size: 12px;
    }
  </style> 
</head>

<body id="page-top" >

  <!-- Page Wrapper -->
  <div id="wrapper" >
  
  <?php include "header-admin.php"?>

  
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="background-color: #FFFCFF;">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">จัดการเอกสาร</h1>  

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_doc"><i class="fas fa-upload fa-sm text-white-50"></i>อัพโหลดเอกสาร</button>
            

          </div>
          <div>
            <table class="table table-bordered table-sm">
            <?php
                       
            ?>
            <thead>
              <tr>
                <th>                  No.                </th>
                <th>                  ชื่อเจ้าของเอกสาร / ผู้รับ                    </th>
                <th>                   ชื่อเอกสาร               </th>
                <th>                   ชนิดเอกสาร         </th>                
                <th>                  วันที่อัพโหลด / แก้ไข              </th>
                <th>                  สถานนะเอกสาร               </th>
                <th>                  View              </th>
                <th>                  Edit              </th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($find_file){
                foreach ($find_file as $val){
                  $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                  $file_id= !empty($input['file_id']) ? $input['file_id'] : '';
                  $file_name= !empty($input['file_name']) ? $input['file_name'] : '';
                  $file_type = !empty($input['file_type']) ? $input['file_type'] : '';
                  $file_status = !empty($input['file_status']) ? $input['file_status'] : '';
                  $file_update_date = !empty($input['file_update_date']) ? $input['file_update_date'] : '';
                  
              ?>
              <tr class="table-success">
                    <td><?php echo $file_id;?></td>
                    <td><?php echo $user_id;?></td>
                    <td><?php echo $file_name;?></td>
                    <td><?php echo $file_type;?></td>
                    <td><?php echo $file_update_date;?></td>
                    
                    <td><?php echo $file_status;?></td>
                    <td>
                    <button onclick="select_view(<?php echo $row["diary_id"]; ?>)" class="btn btn-info btn-xs view_data">View</button>
                  </td>
                    <td><input type="file" name="uploadedFile" /></td>
                   
                    
               </tr>
              <?php }}?>
            </tbody>
          </table>
        </div>
         
          <!-- Table Update Doc -->
          
      </div>
    </div>
        <!-- /.container-fluid -->
        
      <!-- End of Main Content -->

      <!-- Modal Add Doc -->
      <div class="modal fade" id="add_doc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มเอกสาร</h4>
              </div>
              <div class="modal-body">
                    <form id="add_doc_form">
                      <div class="form-group">
                        <label >ชื่อเอกสาร</label>
                        <input type="text" class="form-control" name="send_name"  placeholder="ระบุ ชื่อเอกสาร">
                      </div>
                      <div class="form-group">
                        <label >คำอธิบายเอกสาร</label>
                        <input type="text" class="form-control" name="send_infor"  placeholder="บอกเกี่ยวกับสิ่งนี้">
                      </div>
                      <div>
                      <label> วันที่อัพเอกสาร</label>
                      <input type="text" name="Date" readonly = "readonly"  value="<?php echo date('m/d/y');?>"/>
                      </div>
                      <div class="form-group">
                        <label >เลือกไฟล์</label>
                        <input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" />
                      </div>
                    </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="return add_doc_form();">เพื่ม</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Modal Edit Doc -->
        <!-- <div class="modal fade" id="edit_doc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
              </div>
              <div class="modal-body">
                    <div id="edit_form"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="return edit_doc_form();">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
            
        <?php include "footer-admin.php" ?>
      </div>    -->
      <!-- Footer -->
     
      <!-- End of Footer -->

    </div>
    
    <!-- End of Content Wrapper -->

    
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

</body>

</html>