<?php
include_once '../config/db.php';
include_once '../modal/upload_file.php';
$file = new Upload_File();
$find_user_file = $file->find_file_user();

//echo "<pre>"; print_r($find_user_file); echo "</pre>";
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
  <link href="css/emp.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
        <!-- Topbar -->
        <?php include "header-emp.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">นำเข้าเอกสาร</h1>
          </div>
            <form action="../controller/upload_file_controller.php"  method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">ชื่อเอกสาร :</label>
                    <input type="text" name="file_name" id="file_name"> (กรุณาตั้งชื้อให้ง่ายต่อการจดจำและเลือกชนิดของเอกสารให้ถูก เช่น แบบแจ้งรายชื่ออาจารย์นิเทศ "YOURNAME_BRU_CO4")
                </div>
                <div class="form-group">
                  <input type="file" name="file_local" id="file_local">
                </div>
                <div>
                    <label for="">ประเภทเอกสาร</label>
                    <div class="form-group">
                        <select class="form-control" name="file_type" id="file_type"  style="width:500px;">
                            <option value="5">แบบยืนยันการตอบรับนักศึกษาสหกิจศึกษา - BRU_CO5</option> 
                            <option value="9">แบบแจ้งรายละเอียดงาน ตำแหน่ง พนักงานที่ปรึกษา- BRU_CO9</option>
                            <option value="13">แบบประเมินผลนักศึกษาสหกิจศึกษา - BRU_C13</option> 
                            <option value="14">แบบประเมินรายงานนักศึกษาสหกิจศึกษา - BRU_C14</option>
                            
                        </select>
                    </div>
                </div>              
                    <input type="hidden" name="file_status" id="file_status" value="2">
                    <input type="hidden" name="file_create_date" id="file_create_date" value="<?php echo date('Y-m-d H:i:s') ?>">
                    <input type="hidden" name="file_create_by" id="file_create_by" value="<?php echo $user_id." ".$user_title." ".$user_name." ".$user_surname ?>">
                    <input type="hidden" name="file_update_date" id="file_update_date" value="<?php echo date('Y-m-d H:i:s') ?>">
                    <input type="hidden" name="file_update_by" id="file_update_by" value="<?php echo $user_title." ".$user_name." ".$user_surname ?>">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                  <div class="row">
                    <div class="form-grup">
                            <button type="submit" class="btn btn-success">อัพโหลด</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     <? include "footer.php" ?>

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
  <script src="js/emp.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
