<?php
include_once '../config/db.php';
include_once '../modal/select_input.php';
$t_data = new Select_Doc();

$select_teacher_infor = $t_data->select_teacher_infor();
// $month = date('m');
// $day = date('d');
// $year = date('Y');

// $today =  $day .'-'.$month.'-' .$year_thai ;

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

  <title>Teacher - Coop</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/teacher.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Topbar -->
    <?php include "header-tech.php" ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">แบบแจ้งรายชื่ออาจารย์นิเทศ</h1>
      </div>
      <div class="row">
        <div class="col">
          <div>
            เรียน คณบดี
          </div>
          <Form name="BRU_CO8" action="../FPDF/bru_co4.php" method="post" align="left">
            <?php
              if($select_teacher_infor){
                foreach ($select_teacher_infor as $val){
                  $TITLE_T = !empty($val['TITLE_T'])? $val['TITLE_T'] : '';
                  $NAME_T = !empty($val['NAME_T'])? $val['NAME_T'] : '';
                  $LASTNAME_T = !empty($val['LASTNAME_T'])? $val['LASTNAME_T'] : '';
                  $FACULTY_T = !empty($val['FACULTY_T'])? $val['FACULTY_T'] : '';
                  $MAJOR_T = !empty($val['MAJOR_T'])? $val['MAJOR_T'] : '';
                  $STD_PASTNER = !empty($val['STD_PASTNER'])? $val['STD_PASTNER'] : '';
                
                  ?>
            <div class="form-group">
              <input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="date" id="date">
            </div>

            <div class="form-group">
              <label for="">ตามที่สาขาวิชา :</label>
              <input type="text" class="form-control" style="width:250px;" name="submajor" id="submajor"
                placeholder="สาขาวิชา" value="<?echo $MAJOR_T;?>" disabled></input>
            </div>

            <div class="form-group">
              <label>คณะ :</label>
              <input type="text" class="form-control" name="major" style="width:250px;" value="<? echo $FACULTY_T;?>"
                disabled></input>

            </div>
            <div class="form-group">
              <label for="">มีนักศึกษาเข้าร่วมสหกิจศึกษาจำนวน :</label>
              <input type="text" name="num" id="num" placeholder="จำนวนคน" style="width:100px;" required></input>
            </div>
            <div class="form-group">
              <h6>จึงขอส่งรายชื่ออาจารย์นิเทศเพื่อทำงานนิเทศนักศึกษาดังนี้</h6>
              <textarea rows="10" cols="100" name="allstudent" id="allstudent" required> </textarea>
            </div>


            <div class="form-group">
              <label for="">ลงชื่อ</label>
              <input type="text" name="t_name" id="t_name" placeholder="อาจารย์ที่ส่งเอกสาร"></input>
            </div>
            <div class="form-group">
              <label for="">ตำแหน่ง</label>
              <input type="text" name="t_position" id="phot_positionne" placeholder="หากไม่มีให้ใส่ - "></input>
            </div>
            <?php }}?>
            <div class="form-group">
              <br>
              <button class="btn btn-success" name="submit" type="submit" id="submit">สร้างเอกสาร</button>
            </div>
          </Form>
        </div>
      </div>
      <div class="col">
        2 of 2
      </div>
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

  <!-- Logout Modal-->
  <?php include "logout.php" ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/teacher.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/script.js"></script>


</body>

</html>