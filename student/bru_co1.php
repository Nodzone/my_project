<?PHP

$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;

include_once '../config/db.php';
include_once '../modal/select_input.php';
$DocProfile = new Select_Doc();
$find_major = $DocProfile->find_major();
// print_r ($find_major);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../img/icons/LOGO-bru.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>BRU Coop - CO1</title>



  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template-->
  <link href="css/std-2.css" rel="stylesheet">

  <style>
  </style>
</head>

<body color="black">
  <div id="wrapper">
    <?php include "header-std.php" ?>

    <!-- Services -->
    <section class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">แบบฟอร์มกรอกคำร้องขอฝึกงานสหกิจ</h2>
            <h3 class="section-subheading text-muted">
              <font color="red">** จำเป็นต้องกรอก</font>
            </h3>
          </div>
        </div>

        <h2>ฟอร์มคำร้องขอสมัครงานสหกิจ</h2>
        <div>
          <h3> </h3>
          <br>
          <form name="register" action="../FPDF/bru_co1.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="date" id="date">

            <!-- Body  -->
            <div class="form-group">
              <label id="red"> เวลาฝึกงาน (Time For Intership)</label>
              <input type="date" value="<?php echo date('Y-m-d'); ?>" name="start" placeholder=""> -
              <input type="date" value="<?php echo date('Y-m-d'); ?>" name="until" placeholder="">
              <input class="" type="radio" name="class" id="class" value="1">
              <label class="" for="inlineRadio1">ตามกำหนดการ (ภาคเรียนปกติ)</label>
            </div>
            <div class="form-group">
              <label id="red"> ชื่อสถานปฏิบัติงานที่ต้องการสมัคร (Name of Company): </label>
              <input type="text" name="company_name" placeholder="ชื่อหน่วยงาน/องกรค์" required>
            </div>
            <div class="form-group">
              <label id="red"> สมัครงานในตำแหน่ง (Position Sought) :</label>
              <input type="text" name="wantposition" placeholder="สมัครงานในตำแหน่ง" required>
            </div>
            <div class="form-group">
              <label for="">หมายเลขงาน (Job number) :</label>
              <input type="text" name="work_number" id="work_number" placeholder="หมายเลขงาน">
            </div>
            <div class="form-group">
              <h2>ข้อมูลส่วนตัวนักศึกษา (Student Personal Data)</h2> <br>
              <label for="" id="red"> คำนำหน้าชื่อ (Title Name)</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="title_std" id="title_std" value="1">
                <label class="form-check-label" for="">นาย</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="title_std" id="title_std" value="2">
                <label class="form-check-label" for="">นาง</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="title_std" id="title_std" value="3">
                <label class="form-check-label" for="">นางสาว</label>
              </div>
            </div>
            <div class="form-group">
              <label id="red"> เลือกรูปภาพ :</label>
              <input type="file" name="profile" id="profile"> .jpg,png
            </div>
            <div class="form-group">
              <label id="red">ชื่อ-สกุล (First Name-Last Name) :</label>
              <input type="text" name="std_fullname" id="std_fullname" placeholder="ชื่อ-สกุล" required>
            </div>
            <div class="form-group">
              <label id="red"> First Name-Last Name :</label>
              <input type="text" name="eng_std_fullname" id="eng_std_fullname" placeholder="ชื่อ-สกุล" required>
            </div>
            <div class="form-group">
              <label id="red">รหัสนักศึกษา (Student identification No.) :</label>
              <input type="text" name="std_id" id="std_id" placeholder="รหัสนักศึกษา" maxlength="12" required>
            </div>
            <div class="form-group">
              <label id="red" for=""> หลักสูตร</label>
              <select class="form-control" name="fatory" style="width:200px;">
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
                <option value="10">ไม่ระบุ</option>
              </select>
            </div>
            <div class="form-group">
              <label id="red">คณะ (Faculty)</label>
              <select class="form-control" name="faculty" style="width:200px;">
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

            <div class="form-group">
              <label id="red">สาขาวิชา (Major)</label>
              <select class="form-control" name="major" id="major" data-required="" style="width:250px;">
                <option>-- โปรดเลือก --</option>
                <?php  if($find_major){
                        foreach ($find_major as $val){
                        $major_id = !empty($val['major_id'])? $val['major_id'] : '';
                        $major_name = !empty($val['major_name'])? $val['major_name'] : '';?>
                <option value="<? echo $major_name; ?>">
                  <? echo $major_name; ?>
                </option>
                <?php }} ?>
              </select>
            </div>
            <div class="form-group">
              <label for="" id="red"> นักศึกษาชั้นปีที่ (Year in Department) :</label>
              <!-- <input type="text" name="std_year" placeholder="ระบุชั้นปี" maxlength="1" required> -->
              <input type="number" name="std_year" id="std_year" min="3" max="8" step="1" value="4" required />
            </div>
            <div class="form-group">
              <label for="" id="red"> อาจารย์ที่ปรึกษา (Name of Academic Advisor) :</label>
              <input type="text" name="teac_name" placeholder="ชื่ออาจารย์ที่ปรึกษา" data-required style="width:300px;">
            </div>
            <div class="form-group">
              <label for="" id="red"> เกรดเฉลี่ยภาคการศึกษาที่ผ่านมา (GPA for most Recently Completed Semester Year)
                :</label>
              <input type="text" name="gpa" required placeholder="เกรดเฉลี่ยภาคการศึกษาที่ผ่านมา" maxlength="5">
            </div>
            <div class="form-group">
              <label for="" id="red"> เกรดเฉลี่ยรวม (GPAX for all Courses Completed to Date) : </label>
              <input type="text" name="gpax" required placeholder="เกรดเฉลี่ยรวม" maxlength="5">
            </div>
            <div class=" form-group">
              <label for="" id="red"> บัตรประจำตัวประชาชนเลขที่ (ID CARD NUMBER):</label>
              <input type="text" name="id_card" placeholder="เลขบัตรประชาขน" required maxlength="13">
            </div>
            <div class="form-group">
              <label for="" id="red"> ออกให้ ณ. (Issue at): </label>
              <input type="text" name="isa" placeholder=" เช่นทีว่าการอำเภอ เมือง ">

            </div>
            <div class="form-group">
              <label for="" id="red"> เมื่อวันที่ (Issue Date):</label>
              <input type="date" value="" id="isd" name="isd">

            </div>
            <div class="form-group">
              <label for="" id="red"> หมดอายุวัน (Expiry Date):</label>
              <input type="date" value="" id="exd" name="exd">
            </div>
            <div class="form-group">
              <label for="" id="red"> เชื้อชาติ (Race) :</label>
              <!-- <input type="text" name="race" placeholder=" โปรดระบุ "  required> -->
              <select class="form-control" name="race" id="race" style="width:200px;">
                <option>-- โปรดเลือก --</option>
                <option value="ไทย">ไทย</option>
                <option value="อังกฤษ">อังกฤษ</option>
                <option value="จีน">จีน</option>
                <option value="เวียดนาม">เวียดนาม</option>
                <option value="ลาว">ลาว</option>
                <option value="กัมพูชา">กัมพูชา</option>
              </select>
            </div>
            <div class="form-group">
              <label for="" id="red"> สัญชาติ (Nationality) :</label>
              <!-- <input type="text" name="nation" placeholder=" โปรดระบุ " required > -->
              <select class="form-control" name="nation" id="nation" style="width:200px;">
                <option>-- โปรดเลือก --</option>
                <option value="ไทย">ไทย</option>
                <option value="อังกฤษ">อังกฤษ</option>
                <option value="จีน">จีน</option>
                <option value="เวียดนาม">เวียดนาม</option>
                <option value="ลาว">ลาว</option>
                <option value="กัมพูชา">กัมพูชา</option>
              </select>
              </select>
            </div>
            <div class="form-group">
              <label for="" id="red"> ศาสนา (Religion) :</label>
              <select class="form-control" name="religion" style="width:200px;">
                <option>-- โปรดเลือก --</option>
                <option value="พุทธ">พุทธ</option>
                <option value="คริสต์ ">คริสต์</option>
                <option value="อิสลาม">อิสลาม</option>
                <option value="ไม่ระบุ">ไม่ระบุ </option>
              </select>
            </div>
            <div class="form-group">
              <label for="" id="red"> วัน เดือน ปีเกิด (Date of Birth) :</label>
              <input type="date" value="" id="dob" name="dob">
            </div>
            <div class="form-group">
              <label for="" id="red"> สถานที่เกิด (Place of Birth) :</label>
              <input type="text" name="pob" id="pob" placeholder=" โปรดระบุ " required>
            </div>
            <div class="form-group">
              <label for="" id="red"> อายุ (Age) : </label>
              <input type="number" name="age" id="age" placeholder=" โปรดระบุ " min="19" max="30" value="22" required>
              ปี
            </div>
            <div class="form-group">
              <label for="" id="red"> เพศ (Sex) :</label>
              <select class="form-control" name="sex" id="sex" style="width:200px;">
                <option>-- โปรดเลือก --</option>
                <option value="ชาย">ชาย</option>
                <option value="หญิง">หญิง</option>
              </select>
            </div>
            <div class="form-group">
              <label for="" id="red"> ส่วนสูง (Height) :</label>
              <input type="text" name="hight" id="hight" placeholder=" โปรดระบุ " pattern="[0-9]{1,}" required>เซนติเมตร
            </div>
            <div class="form-group">
              <label for="" id="red"> น้ำหนัก (Weight) :</label>
              <input type="text" name="weight" id="weight" placeholder=" โปรดระบุ " pattern="[0-9]{1,}" required>
              กิโลกรัม
            </div>
            <div class="form-group">
              <label for="" id="red"> โรคประจำตัวระบุ (Chronicle Disease : Specify) :</label>
              <input type="text" name="cds" id="cds" placeholder=" โปรดระบุ หากไม่มีใส่ '-' " required>
            </div>
            <div class="form-group">
              <label for="" id="red"> ที่อยู่ปัจจุบัน (Address) :</label>
              <input type="text" name="address" id="address" placeholder=" โปรดระบุ " style="width:500px;" required>
            </div>
            <div class="form-group">
              <label for="">โทรศัพท์ (Telephone No.) :</label>
              <input type="text" name="call" id="call" placeholder=" โปรดระบุ " maxlength="9">
            </div>
            <div class="form-group">
              <label for="" id="red"> โทรศัพท์เคลื่อนที่ (Mobile Phone No.) :</label>
              <input type="text" name="phone" id="phone" placeholder=" โปรดระบุ " maxlength="10" required>
            </div>
            <div class="form-group">
              <label for="">โทรสาร (Fax No.) :</label>
              <input type="text" name="fax" id="fax" placeholder="หากไม่มีใส่ - ">
            </div>
            <div class="form-group">
              <label for="" id="red"> จดหมายอิเล็กทรอนิกส์ (E-mail) :</label>
              <input type="email" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <input type="hidden" class="form-check-input" value="1" name="old_address" id="old_address">

            <div class="form-group">
              <label for="">ถ้าที่อยู่ปัจจุบัน เหมือนกัน กับที่อยู่ถาวร เลือกเครื่องหมายนี้:</label>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" value="2" name="old_address" id="old_address" required
                  style="width:500px;">
                <label class="form-check-label" for="exampleCheck1">เหมือนกัน</label>
              </div>
            </div>
            <div class="form-group">
              <label for="">ที่อยู่ถาวร (Permanent Address) : </label>
              <input type="text" name="address_2" id="address_2" placeholder=" โปรดระบุ ">
            </div>
            <div class="form-group">
              <label for="">โทรศัพท์ (Telephone No.) :</label>
              <input type="text" name="call_2" id="call_2" placeholder=" โปรดระบุ " maxlength="9">
            </div>
            <div class="form-group">
              <label for="">โทรศัพท์เคลื่อนที่ (Mobile Phone No.) :</label>
              <input type="text" name="phone_2" id="phone_2" placeholder=" โปรดระบุ " maxlength="10">
            </div>
            <div class="form-group">
              <label for="">โทรสาร (Fax No.) :</label>
              <input type="text" name="fax_2" id="fax" placeholder=" โปรดระบุ ">
            </div>


            <!-- End Body  -->

            <!-- Page2 -->
            <div class="form-group">
              <h2 id="red"> บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน (Emergency Case Contact to) </h2>
            </div>
            <div class="form-group">
              <label for="">คำนำหน้าชื่อ (Title Name)</label>
              <select class="form-control" style="width:100px;">
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว3">นางสาว</option>
              </select>
            </div>
            <div class="form-group">
              <label id="red"> ชื่อ (First Name) สกุล (Last Name) :</label>
              <input type="text" name="contact" placeholder="เช่น นาย สมมาตร" required>
            </div>

            <div class="form-group">
              <label for="" id="red"> ความเกี่ยวข้อง (Relation) :</label>
              <input type="text" id="rela" name="rela" placeholder=" เช่น พ่อ แม่ เป็นต้น" required>
            </div>
            <div class="form-group">
              <label for=""> อาชีพ (Occupation) </label>
              <input type="text" name="ct_work" placeholder="เช่น ค้าขาย เกษตร">
            </div>
            <div class="form-group">
              <label for="" id="red"> สถานที่ทำงาน (Place of Work)</label>
              <input type="text" name="ct_place" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="" id="red"> ที่อยู่ปัจจุบัน (Address) :</label>
              <input type="text" name="ct_address" id="ct_address" required placeholder=" โปรดระบุ ">
            </div>
            <div class="form-group">
              <label for="">โทรศัพท์ (Telephone No.) :</label>
              <input type="text" name="ct_call" id="ct_call" placeholder=" โปรดระบุ " maxlength="9">
            </div>
            <div class="form-group">
              <label for="" id="red"> โทรศัพท์เคลื่อนที่ (Mobile Phone No.) :</label>
              <input type="text" name="ct_phone" id="ct_phone" required placeholder=" โปรดระบุ " maxlength="10">
            </div>
            <div class="form-group">
              <label for="">โทรสาร (Fax No.) :</label>
              <input type="text" name="ct_fax" id="ct_fax" placeholder=" โปรดระบุ ">
            </div>


            <div class="form-group">
              <h2 id="red"> ข้อมูลครอบครัว (Family Details)</h2>

            </div>
            <div class="form-group">
              <label for="" id="red"> บิดา</label>
              <label>ชื่อ - สกุล (Full Name) :</label>
              <input type="text" id="dad_fullname" name="dad_fullname" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="" id="red"> อาชีพ (Occupation) </label>
              <input type="text" id="dad_work" name="dad_work" placeholder="เช่น ค้าขาย เกษตร" required>
            </div>
            <div class="form-group">
              <label for="" id="red"> มารดา</label>
              <label>ชื่อ - สกุล (Full Name) :</label>
              <input type="text" id="mom_fullname" name="mom_fullname" placeholder="" required>
            </div>

            <div class="form-group">
              <label for="" id="red"> อาชีพ (Occupation) </label>
              <input type="text" name="mom_work" placeholder="เช่น ค้าขาย เกษตร" required>
            </div>
            <div class="form-group">
              <label for="" id="red"> ที่อยู่ (Address) :</label>
              <input type="text" name="pr_address" id="pr_address" placeholder=" โปรดระบุ " style="width:500px;"
                required>
            </div>
            <div class="form-group">
              <label for="">โทรศัพท์ (Telephone No.) :</label>
              <input type="text" name="pr_call" id="pr_call" placeholder=" โปรดระบุ " maxlength="9">
            </div>
            <div class="form-group">
              <label for="" id="red">โทรศัพท์เคลื่อนที่ (Mobile Phone No.) :</label>
              <input type="text" name="pr_phone" id="pr_phone" placeholder=" โปรดระบุ " maxlength="10" required>
            </div>
            <div class="form-group">
              <label for="">โทรสาร (Fax No.) :</label>
              <input type="text" name="pr_fax" id="pr_fax" placeholder=" โปรดระบุ ">
            </div>
            <div class="form-group">
              <label for="" id="red"> จำนวนพี่น้อง (No. of Relatives) : คน</label>
              <input type="text" name="allbro" id="allbro" placeholder=" โปรดระบุ " required>
            </div>
            <div class="form-group">
              <label for="" id="red"> เป็นบุตรคนที่ (You are the):</label>
              <input type="text" name="ambro" id="ambro" placeholder=" โปรดระบุ " required>
            </div>

            <!-- Page2 -->
            <div>
              <!-- FamilyTable -->
              <h3>ตามรายละเอียดข้างล่างนี้ (as Follows)</h3>


              <div class="col-lg-12 ">
                <div class="table-responsive">
                  <table class="" id="inbro">
                    <thead class="">
                      <tr>

                        <th class="">ชื่อ - นามสกุล / Name</th>
                        <th class="">อายุ / Age</th>
                        <th class="">เพศ / Sex</th>
                        <th class="">ความสัมพันธ์ (Relations)</th>
                        <th class="">อาชีพ / Occupation</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>

                        <td> <input type="text" class="form-control" name="bro_name1" id="bro_name1"></td>
                        <td><input type="number" class="form-control" name="bro_age1" id="bro_age1" min="0" max="99"
                            maxlength="2"></td>
                        <td>
                          <select name="bro_sex1" id="bro_sex1">
                            <option>-- โปรดเลือก --</option>
                            <option value="ชาย" checked>ชาย</option>
                            <option value="หญิง">หญิง</option>
                          </select>
                        </td>
                        <td>
                          <select name="bro_type1" id="bro_type1">
                            <option>-- โปรดเลือก --</option>
                            <option value="พี่ชาย" checked>พี่ชาย</option>
                            <option value="พี่สาว">พี่สาว</option>
                            <option value="ฉัน">ฉัน</option>
                            <option value="น้องชาย" checked>น้องชาย</option>
                            <option value="น้องสาว">น้องสาว</option>
                          </select>
                        </td>
                        <!-- <td><input type="text" class="form-control" name="bro_type1" id="bro_type1"></td> -->
                        <td><input type="text" class="form-control" name="bro_work1" id="bro_work1"></td>


                      </tr>
                      <tr>

                        <td> <input type="text" class="form-control" name="bro_name2" id="bro_name2"></td>
                        <td><input type="number" class="form-control" name="bro_age2" id="bro_age2" min="0" max="99"
                            maxlength="2"></td>
                        <td>
                          <select name="bro_sex2" id="bro_sex2">
                            <option>-- โปรดเลือก --</option>
                            <option value="ชาย" checked>ชาย</option>
                            <option value="หญิง">หญิง</option>
                          </select>
                        </td>
                        <td>
                          <select name="bro_type2" id="bro_type2">
                            <option>-- โปรดเลือก --</option>
                            <option value="พี่ชาย" checked>พี่ชาย</option>
                            <option value="พี่สาว">พี่สาว</option>
                            <option value="ฉัน">ฉัน</option>
                            <option value="น้องชาย" checked>น้องชาย</option>
                            <option value="น้องสาว">น้องสาว</option>
                          </select>
                        </td>
                        <td><input type="text" class="form-control" name="bro_work2" id="bro_work2"></td>


                      </tr>
                      <tr>
                        <td> <input type="text" class="form-control" name="bro_name3" id="bro_name3"></td>
                        <td><input type="number" class="form-control" name="bro_age3" id="bro_age3" min="0" max="99"
                            maxlength="2"></td>
                        <td><select name="bro_sex3" id="bro_sex2">
                            <option>-- โปรดเลือก --</option>
                            <option value="ชาย" checked>ชาย</option>
                            <option value="หญิง">หญิง</option>
                          </select></td>
                        <td>
                          <select name="bro_type3" id="bro_type3">
                            <option>-- โปรดเลือก --</option>
                            <option value="พี่ชาย" checked>พี่ชาย</option>
                            <option value="พี่สาว">พี่สาว</option>
                            <option value="ฉัน">ฉัน</option>
                            <option value="น้องชาย" checked>น้องชาย</option>
                            <option value="น้องสาว">น้องสาว</option>
                          </select>
                        </td>
                        <td><input type="text" class="form-control" name="bro_work3" id="bro_work3"></td>


                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" name="bro_name4" id="bro_name4"></td>
                        <td><input type="number" class="form-control" name="bro_age4" id="bro_age4" min="0" max="99"
                            maxlength="2"></td>
                        <td>
                          <select name="bro_sex4" id="bro_sex4">
                            <option>-- โปรดเลือก --</option>
                            <option value="ชาย" checked>ชาย</option>
                            <option value="หญิง">หญิง</option>
                          </select>
                        </td>
                        <td>
                          <select name="bro_type4" id="bro_type4">
                            <option>-- โปรดเลือก --</option>
                            <option value="พี่ชาย" checked>พี่ชาย</option>
                            <option value="พี่สาว">พี่สาว</option>
                            <option value="ฉัน">ฉัน</option>
                            <option value="น้องชาย" checked>น้องชาย</option>
                            <option value="น้องสาว">น้องสาว</option>
                          </select>
                        </td>
                        <td><input type="text" class="form-control" name="bro_work4" id="bro_work4"></td>


                      </tr>

                      <tr>
                        <td> <input type="text" class="form-control" name="bro_name5" id="bro_name5"></td>
                        <td><input type="number" class="form-control" name="bro_age5" id="bro_age5" min="0" max="99"
                            maxlength="2"></td>
                        <td>
                          <select name="bro_sex5" id="bro_sex5">
                            <option>-- โปรดเลือก --</option>
                            <option value="ชาย" checked>ชาย</option>
                            <option value="หญิง">หญิง</option>
                          </select>
                        </td>
                        <td>
                          <select name="bro_type5" id="bro_type5">
                            <option>-- โปรดเลือก --</option>
                            <option value="พี่ชาย" checked>พี่ชาย</option>
                            <option value="พี่สาว">พี่สาว</option>
                            <option value="ฉัน">ฉัน</option>
                            <option value="น้องชาย" checked>น้องชาย</option>
                            <option value="น้องสาว">น้องสาว</option>
                          </select>
                        </td>
                        <td><input type="text" class="form-control" name="bro_work5" id="bro_work5"></td>


                      </tr>

                      <tr>
                        <td> <input type="text" class="form-control" name="bro_name6" id="bro_name6"></td>
                        <td><input type="number" class="form-control" name="bro_age6" id="bro_age6" min="0" max="99"
                            maxlength="2"></td>
                        <td>
                          <select name="bro_sex6" id="bro_sex6">
                            <option>-- โปรดเลือก --</option>
                            <option value="ชาย" checked>ชาย</option>
                            <option value="หญิง">หญิง</option>
                          </select>
                        </td>
                        <td>
                          <select name="bro_type6" id="bro_type6">
                            <option>-- โปรดเลือก --</option>
                            <option value="พี่ชาย" checked>พี่ชาย</option>
                            <option value="พี่สาว">พี่สาว</option>
                            <option value="ฉัน">ฉัน</option>
                            <option value="น้องชาย" checked>น้องชาย</option>
                            <option value="น้องสาว">น้องสาว</option>
                          </select>
                        </td>
                        <td><input type="text" class="form-control" name="bro_work6" id="bro_work6"></td>


                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- FamilyTable -->
            <br> <br>
            <!-- EducationTable -->
            <div class="row">
              <div class="col-lg-12">
                <div class="box box-danger">
                  <div class="box-header">
                    <h4>** ประวัติการศึกษา (Educational Background)</h4>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <label>ประถม (Prinacy School)</label>
                      </div>
                      <div class="col-lg-3 col-12">
                        <div class="form-group">
                          <span>ชื่อสถาบัน </span>
                          <input type="text" class="form-control" name="school_1" id="school_1">
                        </div>
                      </div>
                      <div class="col-lg-2 col-12">
                        <div class="form-group">
                          <span>ปีที่เริ่มการศึกษา</span>
                          <input type="text" class="form-control" name="yeas_s1" id="yeas_s1">
                        </div>
                      </div>
                      <div class="col-lg-2 col-12">
                        <div class="form-group">
                          <span>ปีที่สำเร็จการศึกษา</span>
                          <input type="text" class="form-control" name="year_d1" id="year_d1">
                        </div>
                      </div>
                      <div class="col-lg-2 col-12">
                        <div class="form-group">
                          <span>คะแนนเฉลี่ย / G.P.A</span>
                          <input type="text" class="form-control" name="s_gpa1" id="s_gpa1">
                        </div>
                      </div>
                      <div class="col-lg-2 col-12">
                        <div class="form-group">
                          <span>วิชาเอก / Major</span>
                          <select name="s_type1" class="form-control" id="s_type1">
                            <option value="-">โปรดเลือก</option>
                            <option value="-">-</option>
                            <option value="สามัญ">สามัญ</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="row">
                        <div class="col-lg-12">
                          <label>มัธยมศึกษาตอนต้น</label>
                        </div>
                        <div class="col-lg-3 col-12">
                          <div class="form-group">
                            <span>ชื่อสถาบัน </span>
                            <input type="text" class="form-control" name="school_2" id="school_2">
                          </div>
                        </div>
                        <div class="col-lg-2 col-12">
                          <div class="form-group">
                            <span>ปีที่เริ่มการศึกษา</span>
                            <input type="text" class="form-control" name="yeas_s2" id="yeas_s2">
                          </div>
                        </div>
                        <div class="col-lg-2 col-12">
                          <div class="form-group">
                            <span>ปีที่สำเร็จการศึกษา</span>
                            <input type="text" class="form-control" name="year_d2" id="year_d2">
                          </div>
                        </div>
                        <div class="col-lg-2 col-12">
                          <div class="form-group">
                            <span>คะแนนเฉลี่ย / G.P.A</span>
                            <input type="text" class="form-control" name="s_gpa2" id="s_gpa2">
                          </div>
                        </div>
                        <div class="col-lg-2 col-12">
                          <div class="form-group">
                            <span>วิชาเอก / Major</span>
                            <select name="s_type2" id="s_type2" class="form-control">
                              <option value="-">โปรดเลือก</option>
                              <option value="-">-</option>
                              <option value="สามัญ">สามัญ</option>
                            </select>
                          </div>
                        </div>

                      </div>
                      <div class="box-body">
                        <div class="row">
                          <div class="col-lg-12">
                            <label>มัธยมศึกษาตอนปลาย</label>
                          </div>
                          <div class="col-lg-3 col-12">
                            <div class="form-group">
                              <span>ชื่อสถาบัน </span>
                              <input type="text" class="form-control" name="school_3" id="school_3">
                            </div>
                          </div>
                          <div class="col-lg-2 col-12">
                            <div class="form-group">
                              <span>ปีที่เริ่มการศึกษา</span>
                              <input type="text" class="form-control" name="yeas_s3" id="yeas_s3">
                            </div>
                          </div>
                          <div class="col-lg-2 col-12">
                            <div class="form-group">
                              <span>ปีที่สำเร็จการศึกษา</span>
                              <input type="text" class="form-control" name="year_d3" id="year_d3">
                            </div>
                          </div>
                          <div class="col-lg-2 col-12">
                            <div class="form-group">
                              <span>คะแนนเฉลี่ย / G.P.A</span>
                              <input type="text" class="form-control" name="s_gpa3" id="s_gpa3">
                            </div>
                          </div>
                          <div class="col-lg-2 col-12">
                            <div class="form-group">
                              <span>วิชาเอก / Major</span>
                              <select class="form-control" name="s_type3" id="s_type3">
                                <option value="-">โปรดเลือก</option>
                                <option value="-">-</option>
                                <option value="วิทยาศาสตร์-คณิตศาสตร์"> วิทยาศาสตร์-คณิตศาสตร์</option>
                                <option value="ศิลปศาสตร์-คณิตศาสตร์"> ศิลปศาสตร์-คณิตศาสตร์ </option>
                                <option value="ศิลปศาสตร์-สังคม"> ศิลปศาสตร์-สังคม </option>
                                <option value="ศิลปศาสตร์-ภาษา"> ศิลปศาสตร์-ภาษา </option>
                              </select>
                            </div>
                          </div>


                          <div class="row">
                            <div class="col-lg-12">
                              <label>ต่ำกว่าอนุปริญญา</label>
                            </div>
                            <div class="col-lg-3 col-12">
                              <div class="form-group">
                                <span>ชื่อสถาบัน </span>
                                <input type="text" class="form-control" name="school_4" id="school_4">
                              </div>
                            </div>
                            <div class="col-lg-2 col-12">
                              <div class="form-group">
                                <span>ปีที่เริ่มการศึกษา</span>
                                <input type="text" class="form-control" name="yeas_s4" id="yeas_s4">
                              </div>
                            </div>
                            <div class="col-lg-2 col-12">
                              <div class="form-group">
                                <span>ปีที่สำเร็จการศึกษา</span>
                                <input type="text" class="form-control" name="year_d4" id="year_d4">
                              </div>
                            </div>
                            <div class="col-lg-2 col-12">
                              <div class="form-group">
                                <span>คะแนนเฉลี่ย / G.P.A</span>
                                <input type="text" class="form-control" name="s_gpa4" id="s_gpa4">
                              </div>
                            </div>
                            <div class="col-lg-2 col-12">
                              <div class="form-group">
                                <span>วิชาเอก / Major</span>
                                <select class="form-control" name="s_type4" id="s_type4">
                                  <option value="-">โปรดเลือก</option>
                                  <option value="-">-</option>
                                  <option value="อุตสาหกรรม"> อุตสาหกรรม </option>
                                  <option value="พาณิชยกรรม"> พาณิชยกรรม </option>
                                  <option value="ศิลปกรรม"> ศิลปกรรม</option>
                                  <option value="คหกรรม"> คหกรรม </option>
                                  <option value="เกษตรกรรม"> เกษตรกรรม </option>
                                  <option value="ประมง"> ประมง</option>
                                  <option value="อุตสาหกรรมท่องเที่ยว"> อุตสาหกรรมท่องเที่ยว </option>
                                  <option value="อุตสาหกรรมสิ่งทอ"> อุตสาหกรรมสิ่งทอ </option>
                                  <option value="อุตสาหกรรมสิ่งทอ"> อุตสาหกรรมสิ่งทอ </option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="box-body">

                            <div class="row">
                              <div class="col-lg-12">
                                <label>อนุปริญญา</label>
                              </div>
                              <div class="col-lg-3 col-12">
                                <div class="form-group">
                                  <span>ชื่อสถาบัน </span>
                                  <input type="text" class="form-control" name="school_5" id="school_5">
                                </div>
                              </div>
                              <div class="col-lg-2 col-12">
                                <div class="form-group">
                                  <span>ปีที่เริ่มการศึกษา</span>
                                  <input type="text" class="form-control" name="yeas_s5" id="yeas_s5">
                                </div>
                              </div>
                              <div class="col-lg-2 col-12">
                                <div class="form-group">
                                  <span>ปีที่สำเร็จการศึกษา</span>
                                  <input type="text" class="form-control" name="year_d5" id="year_d5">
                                </div>
                              </div>
                              <div class="col-lg-2 col-12">
                                <div class="form-group">
                                  <span>คะแนนเฉลี่ย / G.P.A</span>
                                  <input type="text" class="form-control" name="s_gpa5" id="s_gpa5">
                                </div>
                              </div>
                              <div class="col-lg-2 col-12">
                                <div class="form-group">
                                  <span>วิชาเอก / Major</span>
                                  <input type="text" class="form-control" name="s_type5" id="s_type5">
                                </div>
                              </div>

                            </div>
                            <div class="box-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <label>มหาวิทยาลัย</label>
                                </div>
                                <div class="col-lg-3 col-12">
                                  <div class="form-group">
                                    <span>ชื่อสถาบัน </span>
                                    <input type="text" class="form-control" name="school_6" id="school_6">
                                  </div>
                                </div>
                                <div class="col-lg-2 col-12">
                                  <div class="form-group">
                                    <span>ปีที่เริ่มการศึกษา</span>
                                    <input type="text" class="form-control" name="yeas_s6" id="yeas_s6">
                                  </div>
                                </div>
                                <div class="col-lg-2 col-12">
                                  <div class="form-group">
                                    <span>ปีที่สำเร็จการศึกษา</span>
                                    <input type="text" class="form-control" name="year_d6" id="year_d6">
                                  </div>
                                </div>
                                <div class="col-lg-2 col-12">
                                  <div class="form-group">
                                    <span>คะแนนเฉลี่ย / G.P.A</span>
                                    <input type="text" class="form-control" name="s_gpa6" id="s_gpa6">
                                  </div>
                                </div>
                                <div class="col-lg-2 col-12">
                                  <div class="form-group">
                                    <span>วิชาเอก / Major</span>
                                    <input type="text" class="form-control" name="s_type6" id="s_type6">
                                  </div>
                                </div>

                                <!-- PreviousTraining -->
                                <br> <br>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">
                                      <h3>ประวัติการอบรบและปฏิบัตงานสหกิจศึกษา(Previous Training)</h3>
                                    </label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form1" id="form1"> ถึง : <input type="text"
                                      name="until1" id="until1">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local1" id="local1">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position1" id="used_position1">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form2" id="form2"> ถึง : <input type="text"
                                      name="until2" id="until2">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local2" id="local2">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position2" id="used_position2">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form3" id="form3"> ถึง : <input type="text"
                                      name="until3" id="until3">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local3" id="local3">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position3" id="used_position3">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form4" id="form4"> ถึง : <input type="text"
                                      name="until4" id="until4">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local4" id="local4">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position4" id="used_position4">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form5" id="form5"> ถึง : <input type="text"
                                      name="until5" id="until5">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local5" id="local5">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position5" id="used_position5">
                                  </div>
                                </div>



                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form6" id="form6"> ถึง : <input type="text"
                                      name="until6" id="until6">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local6" id="local6">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position6" id="used_position6">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form7" id="form7"> ถึง : <input type="text"
                                      name="until7" id="until7">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local7" id="local7">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position7" id="used_position7">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form8" id="form8"> ถึง : <input type="text"
                                      name="until8" id="until8">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local8" id="local8">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position8" id="used_position8">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form9" id="form9"> ถึง : <input type="text"
                                      name="until9" id="until9">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local9" id="local9">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position9" id="used_position9">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form10" id="form10"> ถึง : <input type="text"
                                      name="until10" id="until10">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local10" id="local10">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position10" id="used_position10">
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">ระยะเวลาฝึก (Training Period)</label>
                                    จาก :<input type="text" name="form11" id="form11"> ถึง : <input type="text"
                                      name="until11" id="until11">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-auto">
                                    <label for="">สถานที่ปฏิบัติงาน/ที่อยู่ </label>
                                    <input type="text" name="local11" id="local11">
                                  </div>
                                  <div class="col-lg-auto">
                                    <label for="">ตำแหน่ง/หัวข้ออบรม/หน้าที่ </label>
                                    <input type="text" name="used_position11" id="used_position11">
                                  </div>
                                </div>


                                <!-- PreviousTraining -->

                                <!-- LanguagesAbility -->
                                <div class="col-lg-12">
                                  <label>
                                    <h3 id="red"> ภาษา (Languages)</h3>
                                  </label>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <span>อังกฤษ (English)</span>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การพูด / Speaking</span>
                                    <select class="form-control" name="lavel1_1" id="lavel1_1">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การอ่าน Reading</span>
                                    <select class="form-control" name="lavel1_2" id="lavel1_2">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การเขียน Writing</span>
                                    <select class="form-control" name="lavel1_3" id="lavel1_3">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <span>ญี่ปุ่น (Japan)</span>

                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การพูด / Speaking</span>
                                    <select class="form-control" name="lavel2_1" id="lavel2_1">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การอ่าน Reading</span>
                                    <select class="form-control" name="lavel2_2" id="lavel2_2">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การเขียน Writing</span>
                                    <select class="form-control" name="lavel2_3" id="lavel2_3">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <span>จีน (China)</span>

                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การพูด / Speaking</span>
                                    <select class="form-control" name="lavel3_1" id="lavel3_1">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การอ่าน Reading</span>
                                    <select class="form-control" name="lavel3_2" id="lavel3_2">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การเขียน Writing</span>
                                    <select class="form-control" name="lavel3_3" id="lavel3_3">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <span>อื่นๆ</span>
                                    <input type="text" name="other" id="other">
                                    <!-- <textarea class="form-control" id="other_languages"></textarea> -->
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การพูด / Speaking</span>
                                    <select class="form-control" name="lavel4_1" id="lavel4_1">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การอ่าน Reading</span>
                                    <select class="form-control" name="lavel4_2" id="lavel4_2">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="form-group">
                                    <span>การเขียน Writing</span>
                                    <select class="form-control" name="lavel4_3" id="lavel4_3">
                                      <option value="-">-</option>
                                      <option value="ดีมาก">ดีมาก</option>
                                      <option value="ดี">ดี</option>
                                      <option value="พอใช้">พอใช้</option>
                                      <option value="ไม่ได้">ไม่ได้</option>
                                    </select>
                                  </div>
                                </div>



                                <!-- LanguagesAbility  -->
                              </div>



                            </div>
                            <div class="form-group">
                              <label for="">*** จุดมุ่งหมายอาชีพ (Career Objectives)</label>
                              <label for="">ระบุสายงานและลักษณะงานที่นักศึกษาสนใจ (อย่างน้อย 1) (Indicate your Career
                                Objectives, Files of Interest and Job Preference)</label>
                              <br>
                              1. <input type="text" id="job_in1" name="job_in1" required> ** <br><br>
                              2. <input type="text" id="job_in2" name="job_in2"> <br><br>
                              3. <input type="text" id="job_in3" name="job_in3"> <br><br>
                              4. <input type="text" id="job_in4" name="job_in4">
                            </div>
                            <div class="form-group">
                              <label for="">กิจกรรมนอกหลักสูตร (Student Activities)</label>
                              <label for="">ระยะเวลา (Years) ตำแหน่งและหน้าที่ Position / Responsibility</label>
                              <br>
                              1. <input type="text" id="work_out_plan1" name="work_out_plan1"> <br><br>
                              2. <input type="text" id="work_out_plan2" name="work_out_plan2"> <br><br>
                              3. <input type="text" id="work_out_plan3" name="work_out_plan3"> <br><br>
                              4. <input type="text" id="work_out_plan4" name="work_out_plan4">
                            </div>
                            <div class="form-group">
                            </div>

                            <div class="form-group">
                              <label for="">(ลงชื่อ)</label>
                              <input type="text" name="std_name" id="std_name" placeholder=" โปรดระบุ " required>
                              นักศึกษา
                            </div>

                            <button class="btn btn-success" type="Submit" name="submit"
                              id="submit">สร้างเอกสารคำร้อง</button> แล้วดาวน์โหลดไปใช้ได้เลย
          </form>
        </div>

        <div>
          <h2>ส่วนข้อมูลติดต่อ องค์กรภายนอก</h2>
          <form name="company" action="" method="post">
            <div class="row">
              <div class="col-auto">
                <label for="">ชื่อผู้ต้องการติดต่อ : </label>
                <input type="text" name="emp_name" id="emp_name"></input>
              </div>
              <div class="col-auto">
                <label>ที่อยู่ : </label>
                <input type="text" name="company_address" id="company_address" style="width:600px;"></input>
              </div>
            </div>
            <div class="row">
              <div class="col-auto">
                <label>เบอร์ติดต่อ : </label>
                <input type="text" name="emp_phone" id="emp_phone" maxlength="10" onkeypress="return isNumberKey(event)"
                  style="width:200px;"></input>
              </div>
              <div class="col-auto">
                <label>เบอร์แฟกซ์ : </label>
                <input type="text" name="emp_fax" id="emp_fax" maxlength="9" onkeypress="return isNumberKey(event)"
                  style="width:200px;"></input>
              </div>
            </div>
            <div class="row">
              <div class="col-auto">
                <label id="important" for=""> เฉพาะตัวเลขเท่านั่น (0-9) </label>
              </div>
            </div>
          </form>
        </div>
    </section>

    <? include "footer-std.php" ?>

  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/script.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>
</body>

</html>