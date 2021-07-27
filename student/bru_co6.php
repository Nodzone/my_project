<?php
include_once '../config/db.php';
include_once '../modal/select_input.php';
$find = new Select_Doc();
$std_infor = $find->std_infor();  



$month = date('m');
$day = date('d');
$year = date('Y');
$today = $day . '-' . $month . '-' . $year;


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

  <title>Student - BRU_CO6</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template-->
  <link href="css/std-2.css" rel="stylesheet">

</head>

<body class="color">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "header-std.php" ?>

    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">หนังสือสัญญาการเข้ารับการฝึกปฏิบัติงานของนักศึกษา</h1>
      <div>
        <form name="bru_co5" action="../FPDF/bru_co6.php" method="post">
          <div class="form-group">
            <u><b>คำชี้แจง</b></u> กรุณากรอกข้อมูลเพื่อยืนยัน สัญญาจ้างนักศึกษาฝึกงานสหกิจศึกษา <br>
          </div>
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
          <div class="row">
            <div class="col-auto">
              <div class="form-group">
                <label> เขียนที่ : </label>
                <input type="text" name="writelocal" id="writelocal" placeholder="เช่น บริษัท รุ่งฤดึ ทวีหนี้ จำกัด"
                  value="<? echo $STD_NAME_INTERSHIP; ?>" required></input>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label> วันที่ : </label>
                <select name="day" id="day">
                  <option value="โปรดเลือก">โปรดเลือก</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">9</option>
                  <option value="9">8</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>

                </select>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label> เดือน : </label>

                <select name="moumt" id="moumt">
                  <option value="โปรดเลือก">โปรดเลือก</option>
                  <option value="มกราคม">มกราคม</option>
                  <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                  <option value="มีนาคม">มีนาคม</option>
                  <option value="เมษายน">เมษายน</option>
                  <option value="พฤษภาคม">พฤษภาคม</option>
                  <option value="มิถุนายน">มิถุนายน</option>
                  <option value="กรกฎาคม">กรกฎาคม</option>
                  <option value="สิงหาคม">สิงหาคม</option>
                  <option value="กันยายน">กันยายน</option>
                  <option value="ตุลาคม">ตุลาคม</option>
                  <option value="พฤษจิกายน">พฤษจิกายน</option>
                  <option value="ธันวาคม">ธันวาคม</option>
                </select>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label> ปี พ.ศ. : </label>
                <input type="number" name="year" id="year" min="2550" max="3000" step="1" value="2562" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <label> ข้าพเจ้า : </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="title_name" id="title_name" value="นาย" required>
                <label class="form-check-label" for="inlineRadio1">นาย</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="title_name" id="title_name" value="นางสาว">
                <label class="form-check-label" for="inlineRadio2">นางสาว</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="title_name" id="title_name" value="นาง">
                <label class="form-check-label" for="inlineRadio3">นาง </label>
              </div>

            </div>
            <div class="col-auto">
              <div><label for="">ชื่อ - นามสกุล</label>
                <input type="text" name="fullname" id="fullname" value="<? echo $STD_NAME .''. $STD_SURNAME; ?>"
                  required></input>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label for="">เกิดเมื่อ</label>
                <label> วันที่ : </label>
                <select name="bday" id="bday">
                  <option value="โปรดเลือก">โปรดเลือก</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">9</option>
                  <option value="9">8</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>

                </select>

              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label> เดือน : </label>

                <select name="bmount" id="bmount">
                  <option value="โปรดเลือก">โปรดเลือก</option>
                  <option value="มกราคม">มกราคม</option>
                  <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                  <option value="มีนาคม">มีนาคม</option>
                  <option value="เมษายน">เมษายน</option>
                  <option value="พฤษภาคม">พฤษภาคม</option>
                  <option value="มิถุนายน">มิถุนายน</option>
                  <option value="กรกฎาคม">กรกฎาคม</option>
                  <option value="สิงหาคม">สิงหาคม</option>
                  <option value="กันยายน">กันยายน</option>
                  <option value="ตุลาคม">ตุลาคม</option>
                  <option value="พฤษจิกายน">พฤษจิกายน</option>
                  <option value="ธันวาคม">ธันวาคม</option>
                </select>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label> ปี พ.ศ. : </label>
                <input type="number" name="byear" id="byear" min="2500" max="3000" step="1" value="" />
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label> อายุ : </label>
                <input type="number" name="old" id="old" min="17" max="100" step="1" value="" />
              </div>
            </div>

            <div class="col-auto">
              <div class="form-group">
                <label> สาขาวิชา : </label>
                <input type="text" name="submajor" id="submajor" value="<? echo $STD_MAJOR; ?>" required></input>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label> คณะ : </label>
                <input name="major" id="major" value="<? echo $STD_FACULTY; ?>" style="width:200px;" required></input>

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-auto">
              <div class="form-group">
                <label> รหัสนักศึกษา : </label>
                <input type="text" name="std_id" id="std_id" value="<? echo $STD_ID; ?>" required></input>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <label> ขอให้สัญญาต่อ : </label>
                <input type="text" name="name_company" id="name_company" value="<? echo $STD_NAME_INTERSHIP; ?>"
                  required></input>
              </div>
            </div>
          </div>

          <div>
            1. ข้าพเจ้ายินดีปฏิบัติตามกฎระเบียบและข้อบังคับหรือข้อกำหนดหรือเงื่อนไขใด ๆ
            ซึ่งสถานปฏิบัติงานที่ข้าพเจ้าเข้าปฏิบัติงานแห่งนี้ได้ตั้งหรือกำหนดไว้สำหรับคนงาน
            <br> หรือเจ้าหน้าที่ของสถานปฏิบัติงานนี้และสำหรับข้าพเจ้าโดยเฉพาะทุกประการ <br>
            2.
            ในระหว่างการปฏิบัติงานถ้าหากข้าพเจ้าประสบอันตรายหรือเจ็บป่วยเนื่องจากการปฏิบัติงานให้แก่สถานปฏิบัติงานที่ข้าพ
            <br> เจ้าปฏิบัติงานนี้ข้าพเจ้าให้สัญญาว่าข้าพเจ้าจะไม่เรียกเงินทดแทนใด ๆ
            ทั้งสิ้นรวมทั้งจะไม่ถือเป็นมูลเหตุแห่งการดำเนินคดีใด ๆ กับ <input type="text" name="name_company"
              id="name_company" value="<? echo $STD_NAME_INTERSHIP; ?>"
              placeholder="เช่น บริษัท รุ่งฤดึ ทวีหนี้ จำกัด"></input> <br>
            และ/หรือเจ้าหน้าที่ผู้เกี่ยวข้องในการปฏิบัติงานของสถานปฏิบัติงานทั้งในทางแพ่งและทางอาญารวมทั้งกฎหมายฉบับอื่น
            ๆ อันอาจฟ้องร้องโดยอาศัยบทบัญญัติของกฎหมายนั้น ๆ ด้วย

            ข้อความข้างบนนี้ข้าพเจ้าได้อ่านและเข้าใจโดยตลอดแล้วเพื่อเป็นหลักฐานจึงทำขึ้นเป็น 2 ฉบับ <br>
            ข้อความตรงกันสำหรับสถานประกอบการยึดถือไว้ 1 ฉบับและงานสหกิจศึกษาคณะ
            <input type="text" name="name_major" id="name_major" value="<? echo $STD_NAME_INTERSHIP; ?>"
              placeholder="เช่น สำนักงานสหกิจมหาวิทยาลัย"></input> <br>
            มหาวิทยาลัยราชภัฏบุรีรัมย์เก็บไว้ 1 ฉบับและลงลายมือชื่อไว้เป็นสำคัญ
          </div>

          <div class="row">
            <div class="col-auto">
              <label for="">ลงชื่อ</label> <input type="text" name="emp_one" id="emp_one"
                placeholder="">(ผู้มีอำนาจในนามของสถานปฏิบัติงาน)</input>
            </div>
            <div class="col-auto">
              <label for="">ลงชื่อ</label> <input type="text" name="emp_two" id="emp_two" placeholder="">(พยานคนที่
              1)</input>
            </div>
            <div class="col-auto">
              <label for="">ลงชื่อ</label> <input type="text" name="emp_three" id="emp_three" placeholder="">(พยานคนที่
              2)</input>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <font color="red"> ** หมายเหตุ จำเป็นต้องกรอกข้อมูลให้ครบทุกช่อง <br> </font>
              <font color="blue"> *** หมายเหตุ หากไม่ประสงค์จะกรอกกรุณากรอกเว้นวรรค (Spac Bar) " " แทน </font>
            </div>
          </div>

          <div class="row">
            <div class="col-auto">
              <button class="btn btn-success" name="submit" type="submit" id="submit">สร้างเอกสาร</button>
            </div>
          </div>


          <?php }} ?>
        </form>
      </div>
    </div>

  </div>
  <? include "footer-std.php" ?>

  </div>
  </div>
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
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>