<?php
include_once '../config/db.php';
include_once '../modal/select_input.php';

$s_data = new Select_Doc();
$select_co9 = $s_data->select_co9();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="../img/icons/LOGO-bru.ico"/>
<link rel="icon" type="image/png" href="/img/icons/adminicon.ico"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Employee - STD - Partner</title>
<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="css/emp.css" rel="stylesheet">
<style> 
input[type=text] {
  width: 100%;
  padding: 6px 10px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #000000;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus {
  border: 3px solid #0085BF;
}


</style>
</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
      <!-- Topbar -->
      <?php include 'header-emp.php'; ?>
      <!-- End of Topbar -->
      <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">ตรวจสอบข้อมูลบริษัท</h1>
        </div><?php if ($select_co9) {
    foreach ($select_co9 as $val) {
        $COMPANY = !empty($val['COMPANY']) ? $val['COMPANY'] : '';
        $ADDRESS = !empty($val['ADDRESS']) ? $val['ADDRESS'] : '';
        $C_PHONE = !empty($val['C_PHONE']) ? $val['C_PHONE'] : '';
        $C_FAX = !empty($val['C_FAX']) ? $val['C_FAX'] : '';
    }
} ?>
        <form action="../controller/company_controller.php" method="post">
            <div class="row">
                <div class="col-auto">
                    <label for="">ชื่อบริษัท : </label>
                    <input type="text" name="user_company_name" id="user_company_name" value="<?php echo $COMPANY; ?>"></input>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <label for="">ที่อยู่ :</label> 
                    <input type="text" name="user_company_address" id="user_company_address" value="<?php echo $ADDRESS; ?>" style="width:650px;"> </input>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <label for="">เบอร์โทรศัพท์ :</label>
                    <input type="text" name="user_company_phone" maxlength="10" id="user_company_phone" value="<?php echo $C_PHONE; ?>"></input>
                </div>
                <div class="col-auto">
                    <label for="">เบอร์โทรแฟลก :</label>
                    <input type="text" name="user_company_fax" maxlength="9" id="user_company_fax" value="<?php echo $C_FAX; ?>"></input>
                </div>
            </div> <br>
            <input type="submit" value="แก้ไข" class="btn btn-success">
        </form>
        
    </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <?php include 'footer.php'; ?>
    
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
<script src="js/emp.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->

<script src="js/script.js"></script>

</body>

</html>
