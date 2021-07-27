<?php
include_once '../config/db.php';
if (empty($_SESSION['user'])) { // if นี้ใช้ตรวจสอบถ้าไม่ได้ login ให้ไปหน้า login
    header('location:../login/login.php');
}

// กราฟแสดงผล
$dataPoints = array(
    array('x' => 10, 'y' => 41, 'indexLabel' => 'คณะครุศาสตร์'),
    array('x' => 20, 'y' => 35, 'indexLabel' => 'คณะเทคโนโลยีอุตสาหกรรม'),
    array('x' => 30, 'y' => 50, 'indexLabel' => 'คณะเทคโนโลยีการเกษตร'),
    array('x' => 40, 'y' => 45, 'indexLabel' => 'คณะมนุษยศาสตร์และสังคมศาสตร์'),
    array('x' => 50, 'y' => 52, 'indexLabel' => 'คณะวิทยาศาสตร์'),
    array('x' => 60, 'y' => 68, 'indexLabel' => 'คณะวิทยาการจัดการ'),
    array('x' => 70, 'y' => 38, 'indexLabel' => 'คณะพยาบาลศาสตร์'),
    array('x' => 80, 'y' => 71, 'indexLabel' => 'บัณฑิตวิทยาลัย'),
);

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
  <title>Admin - Dashboard</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "กราฟแสดงการนิเทศก์งานนักศึกษา"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
        <!-- Topbar -->
        <?php include 'header-admin.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">หน้าหลัก</h1>
          </div>
          <div>
          <div id="chartContainer" style="height: 370px; width: 90%;"></div>
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
          </div>
        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
    <?php include 'footer-admin.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include 'logout.php'; ?>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script> -->
  <script src="js/script.js"></script>

</body>

</html>
