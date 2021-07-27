<?php
include_once '../config/db.php';
include_once '../modal/select_input.php';
$find = new Select_Doc();
$std_infor = $find->std_infor(); 


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

  <title>Student - Coop</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

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
        <h1 class="h3 mb-0 text-gray-800">แบบแจ้งรายละเอียดระหว่างการปฏิบัติงานสหกิจศึกษา</h1>
      </div>
      <div>

        <form name="BRU_CO8" action="../FPDF/bru_co8.php" method="post" align="center" enctype="multipart/form-data">
          <div class="form-group">

            <input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="date_in" id="date_in">
            <?php $i=0;
                        if($std_infor){
                        foreach ($std_infor as $val){
                      $STD_TITLE = !empty($val['STD_TITLE'])? $val['STD_TITLE'] : '';
                      $STD_NAME = !empty($val['STD_NAME'])? $val['STD_NAME'] : '';
                      $STD_SURNAME = !empty($val['STD_SURNAME'])? $val['STD_SURNAME'] : '';
                      $STD_ID = !empty($val['STD_ID'])? $val['STD_ID'] : '';
                      $STD_ID_MAJOR = !empty($val['STD_ID_MAJOR'])? $val['STD_ID_MAJOR'] : '';
                      $STD_MAJOR = !empty($val['STD_MAJOR'])? $val['STD_MAJOR'] : '';
                      $STD_ID_FACULTY = !empty($val['STD_ID_FACULTY'])? $val['STD_ID_FACULTY'] : '';
                      $STD_FACULTY = !empty($val['STD_FACULTY'])? $val['STD_FACULTY'] : '';
                      $STD_ID_INTERSHIP = !empty($val['STD_ID_INTERSHIP'])? $val['STD_ID_INTERSHIP'] : '';
                      $STD_NAME_INTERSHIP = !empty($val['STD_NAME_INTERSHIP'])? $val['STD_NAME_INTERSHIP'] : '';
                     
                      $i=$i+1;
                      
                    ?>
          </div>
          <div class="form-group">
            <label> เรียนงานสหกิจศึกษาคณะ</label>
            <input type="text" name="t_major" data-required="กรุณาระบุ" id="t_major" value="<? echo $STD_FACULTY; ?>"
              placeholder="ชื่อคณะ"></input>
          </div>
          <div class="form-group">
            <label for="">คำนำหน้าชื่อ :</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="title_std" id="title_std" value="นาย">
              <label class="form-check-label" for="inlineRadio1">นาย</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="title_std" id="title_std" value="นาง">
              <label class="form-check-label" for="inlineRadio2">นาง</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="title_std" id="title_std" value="นางสาว">
              <label class="form-check-label" for="inlineRadio2">นางสาว</label>
            </div>
          </div>
          <div class="form-group">
            <label for="">ชื่อ – นามสกุล :</label>
            <input type="text" name="std_full_name" id="std_full_name" data-required="กรุณาระบุ"
              placeholder="เช่น สมเกียตริ ไม่เหยียดผิว" value="<? echo $STD_NAME.''.$STD_SURNAME; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">เลขรหัสประจำตัว:</label>
            <input type="text" name="std_id" id="std_id" data-required="กรุณาระบุ" placeholder="รหัสนักศึกษา"
              value="<? echo $STD_ID; ?>"></input>
          </div>
          <div class="form-group">
            <label>หลักสูตรคณะ</label>
            <input type="text" name="fatory" id="fatory" data-required="กรุณาระบุ" value="<? echo $STD_FACULTY; ?>"
              placeholder="ชื่อคณะ"></input>
          </div>
          <div class="form-group">
            <label>สาขา</label>
            <input type="text" name="major" id="major" data-required="กรุณาระบุ" value="<? echo $STD_MAJOR; ?>"
              placeholder="ชื่อคณะ"></input>
          </div>
          <div class="form-group">
            <label for="">ชื่อสถานประกอบการ (ไทยหรืออังกฤษ):</label>
            <input type="text" name="companyname" id="companyname" data-required="กรุณาระบุ"
              value="<? echo $STD_NAME_INTERSHIP; ?>" placeholder="ชื่อสถานประกอบการ "></input>
          </div>
          <div class="form-group">
            <h4>ที่อยู่สถานประกอบการ</h4>
            <label>เลขที่</label>
            <input type="text" name="add_number" id="add_number" data-required="กรุณาระบุ"
              placeholder="หากไม่มีให้ใส่ - "></input>
          </div>
          <div class="form-group">
            <label>ถนน</label>
            <input type="text" name="road" id="road" placeholder="หากไม่มีให้ใส่ - "></input>
          </div>
          <div class="form-group">
            <label for="">ซอย</label>
            <input type="text" name="alley" id="alley" placeholder="หากไม่มีให้ใส่ - "></input>
          </div>
          <div class="form-group">
            <label for="">ตำบล</label>
            <input type="text" name="subdistrict" id="subdistrict" data-required="กรุณาระบุ"
              placeholder="หากไม่มีให้ใส่ - "></input>
          </div>
          <div class="form-group">
            <label for="">อำเภอ</label>
            <input type="text" name="district" id="district" data-required="กรุณาระบุ"
              placeholder="หากไม่มีให้ใส่ - "></input>
          </div>

          <div class="form-group">
            <label for="">จังหวัด</label>
            <input type="text" name="province" id="province" data-required="กรุณาระบุ"
              placeholder="หากไม่มีให้ใส่ - "></input>
          </div>
          <div class="form-group">
            <label for="">รหัสไปรษณีย์</label>
            <input type="text" name="postcode" id="postcode" placeholder="หากไม่มีให้ใส่ - "></input>
          </div>
          <div class="form-group">
            <label for="">เบอร์โทรศัพท์</label>
            <input type="text" name="phone" id="phone" placeholder="หากไม่มีให้ใส่ - "></input>
          </div>
          <div class="form-group">
            <label for="">เบอร์โทรสาร</label>
            <input type="text" name="fax" id="fax" placeholder="หากไม่มีให้ใส่ - "></input>
          </div>

          <div>
            เลือกไฟล์ภาพ หรือ QrCode เพื่ออัพโหลด (นามสกุล .png,jpg):
            <input type="file" name="qr_code" id="qr_code">
          </div>
          <div class="form-group">
            <br>
            <button class="btn btn-success" name="submit" type="submit" id="submit">สร้างเอกสาร</button>
          </div>
          <?php }} ?>
        </Form>
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

  <?php include "logout_std.php" ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/std-2.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/script.js"></script>
</body>

</html>