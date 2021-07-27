<?php
include_once '../config/db.php';
include_once '../modal/mydoc.php';
$file = new Manage_File();
$find_myfile = $file->find_myfile(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/icons/LOGO-bru.ico" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Request</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "header-admin.php" ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">เอกสารคำร้อง</h1>
      <div>
        <table class="table table-dark">

          <thead>
            <tr>
              <th> No. </th>
              <th> ชือนักศึกษา </th>
              <th> เอกสาร </th>
              <th> ดู </th>
              <th> หมายเหตุ </th>

            </tr>
          </thead>
          <tbody>
            <?php $i=0;
                    if($find_myfile){
                      foreach ($find_myfile as $val){
                        $file_id = !empty($val['file_id'])? $val['file_id'] : '';
                        $file_local = !empty($val['file_local'])? '../files/' . $val['file_local'] : '';
                        $file_create_by = !empty($val['file_create_by'])? $val['file_create_by'] : '';
                        $file_status = !empty($val['file_status'])? $val['file_status'] : '';
                        $file_type = !empty($val['file_type'])? $val['file_type'] : '';
                        $i++;

                        if($file_type == 1){ $file_name = "BRU_CO1";}
                        if($file_local == null) { $file_part = "404.php";}
                    ?>
            <tr class="table-dark">
              <td>
                <? echo $i; ?>
              </td>
              <td>
                <? echo $file_create_by; ?>
              </td>
              <td>
                <? echo $file_name; ?>
              </td>
              <td><button onclick="window.open('<?php echo $file_local;?>', '_blank')"
                  class="btn btn-secondary btn-xs view_data">View</button></td>
              <td> ยังไม่ส่งเอกสาร</td>

            </tr>
            <?php  }}?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->

  <?php include "footer-admin.php" ?>
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