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
        <h1 class="h3 mb-0 text-gray-800">แบบแจ้งโครงร่างรายงานการปฏิบัติงาน</h1>
      </div>
      <div>

        <Form name="BRU_CO11" action="../FPDF/bru_co11.php" method="post" align="left">
          <?php 
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
              <label for=""> รายงานถือเป็นส่วนหนึ่งของการปฏิบัติงานสหกิจศึกษามีวัตถุประสงค์เพื่อฝึกฝนทักษะการสื่อสาร
                (Communication Skill)
                ของนักศึกษาและจัดทำข้อมูลที่เป็นประโยชน์สำหรับสถานปฏิบัติงานนักศึกษาจะต้องขอรับคำปรึกษาจากพนักงานที่ปรึกษา
                <br>(Job Supervisor) เพื่อกำหนดหัวข้อรายงานที่เหมาะสมโดยคำนึงถึงความต้องการของสถานปฏิบัติงานเป็นหลัก
                ตัวอย่างของรายงาน
                ได้แก่ ผลงานวิจัยที่นักศึกษาปฏิบัติรายงานวิชาการที่น่าสนใจ <br> การสรุปข้อมูลหรือสถิติบางประการ
                การวิเคราะห์และประเมินผลข้อมูล เป็นต้น
                ทั้งนี้รายงานอาจจะจัดทำเป็นกลุ่มของนักศึกษาสหกิจศึกษามากกว่า 1 คนก็ได้
                ในกรณีที่สถานปฏิบัติงานไม่ต้องการรายงานในหัวข้อข้างต้น <br>
                นักศึกษาจะต้องพิจารณาเรื่องที่ตนสนใจและหยิบยกมาทำรายงานโดยปรึกษากับพนักงานที่ปรึกษาเสียก่อน
                ตัวอย่างหัวข้อที่จะใช้เขียนรายงาน
                ได้แก่รายงานวิชาการที่นักศึกษาสนใจรายงานการปฏิบัติงานที่ได้รับมอบหมายหรือแผนและวิธีการปฏิบัติงาน <br>
                ที่จะทำให้บรรลุถึงวัตถุประสงค์ของการเรียนรู้ที่นักศึกษาวางเป้าหมายไว้จากการปฏิบัติงานสหกิจศึกษาครั้งนี้
                (Learning Objectives)
                เมื่อกำหนดหัวข้อได้แล้วให้นักศึกษาจัดทำโครงร่างของเนื้อหารายงานพอสังเขปตามแบบฟอร์ม Work Term Report
                Outline <br>
                ฉบับนี้ทั้งนี้ให้ปรึกษากับพนักงานที่ปรึกษาเสียก่อนแล้วจึงส่งกลับมายังโครงการสหกิจศึกษาภายใน 2
                สัปดาห์แรกของการปฏิบัติงาน
                โครงการสหกิจศึกษาจะรวบรวมนำเสนออาจารย์ที่ปรึกษาสหกิจศึกษาเพื่อพิจารณาหากอาจารย์มีข้อเสนอแนะใด ๆ <br>
                ก็จะส่งกลับมาให้นักศึกษาทราบภายใน 2 สัปดาห์ และเพื่อมิให้เป็นการเสียเวลา
                นักศึกษาควรดำเนินการเขียนรายงานโดยทันที
              </label>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">ชื่อ – นามสกุล (นักศึกษา ใส่คำนำหน้าชื่้อด้วย) :</label>
              <input type="text" name="std_fullname" id="std_fullname"
                value="<? echo $STD_TITLE." ".$STD_NAME ." ".$STD_SURNAME ; ?>" required></input>
            </div>
            <div class="col-auto">
              <label for="">รหัสประจำตัว (นักศึกษา) :</label>
              <input type="text" name="std_id" id="std_id" value="<?echo $STD_ID;?>" required>
            </div>
            <div class="col-auto">
              <label for="">สาขาวิชา :</label>
              <input type="text" name="std_submajor" id="std_submajor" value="<?echo $STD_MAJOR; ?>" required>
            </div>
            <div class="col-auto">
              <label for="">คณะ :</label>
              <select class="form" name="std_major" style="width:200px;">
                <option>-- โปรดเลือก --</option>
                <option value="คณะครุศาสตร์">คณะครุศาสตร์</option>
                <option value="คณะเทคโนโลยีอุตสาหกรรม">คณะเทคโนโลยีอุตสาหกรรม</option>
                <option value="คณะเทคโนโลยีการเกษตร">คณะเทคโนโลยีการเกษตร</option>
                <option value="คณะมนุษยศาสตร์และสังคมศาสตร์">คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                <option value="คณะวิทยาศาสตร์">คณะวิทยาศาสตร์</option>
                <option value="คณะวิทยาการจัดการ">คณะวิทยาการจัดการ</option>
                <option value="คณะพยาบาลศาสตร์">คณะพยาบาลศาสตร์</option>
                <option value="บัณฑิตวิทยาลัย">บัณฑิตวิทยาลัย</option>
              </select>
            </div>
          </div>
          <!-- Company -->

          <div class="row">
            <div class="col-auto">
              <label for="">ปฏิบัติงานสหกิจศึกษา ณ (ชื่อสถานปฏิบัติงาน) :</label>
              <input type="text" name="companyname" id="companyname" value="<?echo $STD_NAME_INTERSHIP; ?>" required>
            </div>
            <div class="col-auto">
              <label for="">เลขที่ :</label>
              <input type="text" name="num" id="num" required>
            </div>
            <div class="col-auto">
              <label for="">ถนน :</label>
              <input type="text" name="road" id="road">
            </div>
            <div class="col-auto">
              <label for="">ซอย :</label>
              <input type="text" name="soi" id="soi">
            </div>
            <div class="col-auto">
              <label for="">ตำบล/แขวง :</label>
              <input type="text" name="subdistrict" id="subdistrict" required>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">อำเภอ/เขต :</label>
              <input type="text" name="district" id="district" required>
            </div>
            <div class="col-auto">
              <label for="">จังหวัด :</label>
              <input type="text" name="province" id="province" required>
            </div>
            <div class="col-auto">
              <label for="">รหัสไปรษณีย์ :</label>
              <input type="text" name="postcard" id="postcard" required>
            </div>
            <div class="col-auto">
              <label for="">โทรศัพท์ :</label>
              <input type="text" name="phone" id="phone">
            </div>
            <div class="col-auto">
              <label for="">โทรสาร :</label>
              <input type="text" name="fax" id="fax">
            </div>
          </div>

          <!-- Detail -->
          <div class="row">
            <div class="col-auto">
              <label for="">ขอแจ้งรายละเอียดเกี่ยวกับโครงร่างรายงานการปฏิบัติงานสหกิจศึกษาดังนี้</label>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for=""><b>1. หัวข้อรายงาน (Report Title)</b>
                อาจจะขอเปลี่ยนแปลงหรือแก้ไขเพิ่มเติมได้ในภายหลัง</label>
            </div>
          </div>
          <div class="row">
            <div class="col-auto">
              <label for="">ภาษาไทย</label>
              <input type="text" name="t_thai" id="t_thai" required>
            </div>
          </div>
          <div class="row">
            <div class="col-auto">
              <label for="">ภาษาอังกฤษ</label>
              <input type="text" name="t_eng" id="t_eng" required>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label for=""><b>2. รายละเอียดเนื้อหาของรายงาน
                </b>(อาจจะขอเปลี่ยนแปลงหรือแก้ไขเพิ่มเติมได้ในภายหลัง)</label>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <textarea rows="10" cols="200" name="detail" id="detail">
                            </textarea>
            </div>
          </div>

          <!-- Lisence -->
          <div class="row">
            <div class="col-auto">

              <label for="">ลงชื่อพนักงานที่ปรึกษา : </label>
              <input type="text" name="emp_fullname" id="emp_fullname" required>

            </div>
          </div>
          <div class="row">
            <div class="col-auto">

              <label for="">ตำแหน่ง : </label>
              <input type="text" name="emp_position" id="emp_position" required>

            </div>
          </div>
          <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date" id="date">


          <div class="row">
            <div class="col-auto">
              <button type="submit" class="btn btn-success" style="width:150px;">สร้างเอกสาร</button>
            </div>
            <br>
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