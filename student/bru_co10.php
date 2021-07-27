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
        <h1 class="h3 mb-0 text-gray-800">แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา</h1>
      </div>
      <div>

        <Form name="BRU_CO10" action="../FPDF/bru_co10.php" method="post" align="left">
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
          <div class="form-group">
            <input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="date" id="date">
          </div>
          <div class=row>
            <label for=""> <b> <u>
                  <font size="5"> คำชี้แจง </font>
                </u></b></label>
          </div>
          <div class=row>
            <div class="col-auto">
              (ผู้ให้ข้อมูล :นักศึกษาร่วมกับพนักงานที่ปรึกษา) (จำเป็นต้องกรอกข้อมูลทุกช่อง)
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-auto">
              <label for="">ชื่อ – นามสกุล (นักศึกษา ใส่คำนำหน้าชื่้อด้วย) :</label>
              <input type="text" name="std_fullname" id="std_fullname"
                value="<? echo $STD_TITLE.' '.$STD_NAME.''.$STD_SURNAME; ?> " required>
            </div>
            <div class="col-auto">
              <label for="">รหัสประจำตัว (นักศึกษา) :</label>
              <input type="text" name="std_id" id="std_id" value="<? echo $STD_ID; ?>" required>
            </div>
            <div class="col-auto">
              <label for="">หลักสูตร :</label>
              <select class="form" name="factory" id="factory" style="width:200px;">
                <option>-- โปรดเลือก --</option>
                <option value="ครุศาสตรบัณฑิต">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                <option value="วิทยาศาสตรบัณฑิต">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>
                <option value="รัฐประศาสนศาสตรบัณฑิต">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>
                <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                <option value="นิติศาสตรบัณฑิต">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>
                <option value="บัญชีบัณฑิต">บัญชีบัณฑิต (บช.บ.4 ปี)</option>
                <option value="นิเทศศาสตรบัณฑิต">นิเทศศาสตรบัณฑิต (นศ.บ. 4 ปี)</option>
                <option value="เศรษฐศาสตรบัณฑิต">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>
                <option value="บริหารธุรกิจบัณฑิต">บริหารธุรกิจบัณฑิต (บธ.บ. 4 ปี)</option>
              </select>
            </div>
            <div class="col-auto">
              <label for="">คณะ :</label>
              <input type="text" name="major" id="major" value="<? echo $STD_FACULTY; ?>">
            </div>
          </div>
          <!-- Company -->

          <div class="row">
            <div class="col-auto">
              <label for="">ปฏิบัติงานสหกิจศึกษา ณ (ชื่อสถานปฏิบัติงาน) :</label>
              <input type="text" name="company_name" id="company_name" value="<? echo $STD_NAME_INTERSHIP ;?>" required
                size="50">
            </div>

          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">ขอแจ้งรายละเอียดเกี่ยวกับแผนปฏิบัติงานสหกิจศึกษา ดังนี้</label>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">แผนปฏิบัติงานสหกิจศึกษา (ลงเป็นช่วงอาทิตย์ เช่น อาทิตย์ที่ 1 และ 2 เป็น 1-2,3-4
                เป็นต้น)</label>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 1</label>
              <input type="text" name="title_work_1" id="title_work_1" required>
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_1" id="m1_1" required>
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_1" id="m2_1" required>
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_1" id="m3_1" required>
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_1" id="m4_1" required>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 2</label>
              <input type="text" name="title_work_2" id="title_work_2">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_2" id="m1_2">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_2" id="m2_2">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_2" id="m3_2">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_2" id="m4_2">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 3</label>
              <input type="text" name="title_work_3" id="title_work_3">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_3" id="m1_3">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_3" id="m2_3">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_3" id="m3_3">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_3" id="m4_3">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 4</label>
              <input type="text" name="title_work_4" id="title_work_4">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_4" id="m1_4">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_4" id="m2_4">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_4" id="m3_4">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_4" id="m4_4">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 5</label>
              <input type="text" name="title_work_5" id="title_work_5">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_5" id="m1_5">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_5" id="m2_5">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_5" id="m3_5">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_5" id="m4_5">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 6</label>
              <input type="text" name="title_work_6" id="title_work_6">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_6" id="m1_6">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_6" id="m2_6">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_6" id="m3_6">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_6" id="m4_6">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 7</label>
              <input type="text" name="title_work_7" id="title_work_7">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_7" id="m1_7">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_7" id="m2_7">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_7" id="m3_7">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_7" id="m4_7">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 8</label>
              <input type="text" name="title_work_8" id="title_work_8">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_8" id="m1_8">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_8" id="m2_8">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_8" id="m3_8">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_8" id="m4_8">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 9</label>
              <input type="text" name="title_work_9" id="title_work_9">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_9" id="m1_9">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_9" id="m2_9">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_9" id="m3_9">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_9" id="m4_9">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 10</label>
              <input type="text" name="title_work_10" id="title_work_10">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_10" id="m1_10">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_10" id="m2_10">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_10" id="m3_10">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_10" id="m4_10">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 11</label>
              <input type="text" name="title_work_11" id="title_work_11">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_11" id="m1_11">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_11" id="m2_11">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_11" id="m3_11">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_11" id="m4_11">
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">หัวข้องานที่ 12</label>
              <input type="text" name="title_work_12" id="title_work_12">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 1 </label>
              <input type="text" name="m1_12" id="m1_12">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 2</label>
              <input type="text" name="m2_12" id="m2_12">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 3</label>
              <input type="text" name="m3_12" id="m3_12">
            </div>
            <div class="col-auto">
              <label for="">เดือนที่ 4</label>
              <input type="text" name="m4_12" id="m4_12">
            </div>
          </div>

          <!-- <Lisence> -->

          <div class="row">
            <div class="col-auto">
              <label for="">ลงชื่อ (พนักงานที่ปรึกษา)</label>
              <input type="text" name="emp_fullname" id="emp_fullname">
            </div>
            <div class="col-auto">
              <label for="">ตำแหน่ง </label>
              <input type="text" name="emp_position" id="emp_position">
            </div>

          </div>
      </div>

      <input type="hidden" value="<?php echo date('Y-n-d H:i:s'); ?>" name="date" id="date">


      <div class="row">
        <div class="col-auto">
          <button type="submit" class="btn btn-success" style="width:150px;">สร้างเอกสาร</button>
        </div>
        <br>
      </div>
      <?php }} ?>
      </Form>
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