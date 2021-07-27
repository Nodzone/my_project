<?php
  include_once '../config/db.php';
  include_once '../modal/adduser.php';
  $user = new Manage_User();
  $find_user = $user->find_all_user();
  //echo "<pre>"; print_r($find_user); echo "</pre>";
  

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

  <title>Admin - Manage - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="js/excelexportjs.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="color">

  <!-- Page Wrapper -->
  <div id="wrapper">

     <?php include "header-admin.php" ?>
        
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">เพิ่มผู้ใช้งานระบบ</h1>
            <div>
            </div>
    <br><br>
            <!-- ตารางผู้ใช้งานทั้งหมด -->
            <table class="table table-bordered" id="AllUser">
            <center><H3>รายชื่อผู้ใช้งานทั้งหมด ที่มีอยู่ในขณะนี้</H3></center>
            <br>
            <thead>
              <tr>
                <th>                  ลำดับ                </th>
                <th>                  ชื่อ                </th>
                <th>                   สกุล              </th>
                <th>                ตำแหน่ง                </th>
                <th>                สาขาวิชา            </th>
                <th>                 คณะ          </th>
                <th>                             </th>
              </tr>
            </thead>
            <tbody>
              <?php
              if($find_user){
                foreach ($find_user as $val){
                  $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                  $user_title = !empty($val['user_title'])? $val['user_title'] : '';
                  $user_name = !empty($val['user_name'])? $val['user_name'] : '';
                  $user_surname = !empty($val['user_surname'])? $val['user_surname'] : '';
                  
                  $user_phone = !empty($val['user_phone'])? $val['user_phone'] : '';

                  $user_company = !empty($val['user_company'])? $val['user_company'] : '';
                  $user_submajor = !empty($val['user_submajor'])? $val['user_submajor'] : '';
                  $user_major = !empty($val['user_major'])? $val['user_major'] : '';

                  $user_type = !empty($val['user_type'])? $val['user_type'] : '';
                  
              ?>
              <tr class="table-success">
              <?php if($user_type == 1 ){$position="นักศึกษา";} elseif ($user_type == 2 ){$position="อาจารย์";} elseif ($user_type == 3 ){$position="พนักงานองค์กร";} ?>
                    <td><?php echo $user_id;?></td>
                    <td><?php echo $user_title." ".$user_name;?></td>
                    <td><?php echo $user_surname;?></td>
                    <td><?php echo $position; ?></td>

                    <td><?php echo $user_submajor;?></td>
                    <td><?php echo $user_major;?></td>
                    <td></td>
               </tr>
              <?php }}?>
            </tbody>
          </table>

          <button id="DLtoExcel">ออกรายงาน (Excel)</button>
          <script type="text/javascript">
            var $btnDLtoExcel = $('#DLtoExcel');
            $btnDLtoExcel.on('click', function () {
              $("#AllUser").excelexportjs({
                  containerid: "AllUser"
                  ,datatype: 'table'
              });
            });
        </script>
          

        </div>
        
        <!-- /.container-fluid -->

      </div>

      
      <? include "footer-admin.php" ?>
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
