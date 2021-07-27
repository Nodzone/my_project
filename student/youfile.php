<?php
include_once '../config/db.php';
include_once '../modal/upload_file.php';
$file = new Upload_File();
$find_user_file = $file->find_file_user();

// echo "<pre>"; print_r($find_user_file); echo "</pre>";
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

  <title>Student - My Doc</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/std-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
        <!-- Topbar -->
        <?php include "header-std.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">เอกสารของฉัน</h1>
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
                  <th>                  อัพโหลด / แก้ไข โดย             </th>
                  <th>                  View              </th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0;
                  if($find_user_file){
                    foreach ($find_user_file as $val){
                      $user_title = !empty($val['user_title'])? $val['user_title'] : '';
                      $user_name = !empty($val['user_name'])? $val['user_name'] : '';
                      $file_id = !empty($val['file_id'])? $val['file_id'] : '';
                      $file_local = !empty($val['file_local'])? '../files/' . $val['file_local'] : '';
                      $file_name = !empty($val['file_name'])? $val['file_name'] : '';
                      $file_type = !empty($val['file_type'])? $val['file_type'] : '';
                      $file_status = !empty($val['file_status'])? $val['file_status'] : '';
                      $file_update_date = !empty($val['file_update_date'])? $val['file_update_date'] : '';
                      $file_create_by = !empty($val['file_create_by'])? $val['file_create_by'] : '';
                     
                      $i=$i+1;
                      
                ?>
                <tr class="table-success">
                      <td><?php echo $i;?></td>
                      <td><?php echo $file_create_by;?></td>
                      <td><?php echo $file_name;?></td>
                      <td><?php echo $file_type;?></td>
                      <td><?php echo $file_update_date;?></td>
                      <td><?php echo $file_create_by;?></td>
                      <td><button onclick="window.open('<?php echo $file_local;?>', '_blank')" class="btn btn-info btn-xs view_data">View</button></td>
                    
                      
                </tr>
                <?php }}?>
                <? if($find_user_file == null)
                {
                    '<font color="red"><h2>ไม่มีข้อมูล </h2> </font>' ;
                } ?>
              </tbody>
            </table>
            </div>
        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     <? include "footer-std.php" ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include "logout.php" ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
