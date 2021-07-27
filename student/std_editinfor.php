<?php
include_once '../config/db.php';
include_once '../modal/editprofile.php';
include_once '../modal/select_input.php';

$editProfile = new Edit_Profile();
$find_profile = $editProfile->find_profile();
$select_sub_major = $editProfile->select_sub_major();

$select = new Select_Doc();
$find_company = $select->find_company();
//$user->find_profile_user();

// echo "<pre>"; print_r($select_sub_major); echo "</pre>";
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

    <?php include "header-std.php" ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">แก้ไขข้อมูลส่วนตัว</h1>

      <div>
        <form role="form" action="../controller/editprofile_controller.php" method="post">
          <div class="row">
            <div class="col-2">
              <label>*คำนำหน้าชื่อ</label>
              <select class="form-control" name="user_title" data-required="กรุณาเลือกคำนำหน้า" style="width:150px;">
                <option>-- โปรดเลือก --</option>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
              </select>
            </div>
            <input type="hidden" name="user_position" id="user_position" value="1">
            <div class="col-auto">
              <label>*ชื่อ</label>
              <input type="text" class="form-control" required="กรุณากรอกชื่อ" name="user_name" style="width:250px;"
                value="<?echo $user_name;?>" placeholder="" />
            </div>
            <div class="col-auto">
              <label>*นามสกุล</label>
              <input type="text" class="form-control" data-required="กรุณากรอกนามสกุล" name="user_surname"
                style="width:250px;" value="<?echo $user_surname;?>" placeholder="" />
            </div>
            <div class="col-auto">
              <label>*เบอร์ติดต่อ</label>
              <input type="text" class="form-control" data-required="กรุณากรอกเบอร์โทรศัพท์" name="user_phone"
                maxlength="10" style="width:250px;" value="<?echo $user_phone;?>" placeholder="" />
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-auto">
              <label>Username</label> <input type="text" class="form-control" data-required="กรอกชื่อผู้ใช้งาน"
                name="user_username" value="<?echo $user_username ;?>" style="width:250px;" placeholder="ชื่อผู้ใช้งาน"
                disabled pattern="[A-Za-z0-9]{1,20}" maxlength="15 " />
            </div>
            <div class="col-auto">
              <label>Password</label><input type="password" class="form-control" data-required="กรอกรหัสผ่าน"
                name="user_password" style="width:250px;" placeholder="รหัสผ่าน" />
            </div>

            <div class="col-auto">
              <label>รหัสนักศึกษา</label>
              <input type="text" class="form-control" data-required="กรอกรหัสผ่าน" name="user_std_id"
                value="<?echo $user_std_id;?>" style="width:250px;" placeholder="" />
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-auto">
              <label for="exampleFormControlSelect1">*คณะ</label>
              <select class="form-control" name="user_faculty" data-required="กรุณาเลือกสถานะผู้ใช้"
                style="width:250px;">
                <option>-- โปรดเลือก --</option>
                <option value="1">คณะครุศาสตร์</option>
                <option value="2">คณะเทคโนโลยีอุตสาหกรรม</option>
                <option value="3">คณะเทคโนโลยีการเกษตร</option>
                <option value="4">คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                <option value="5">คณะวิทยาศาสตร์</option>
                <option value="6">คณะวิทยาการจัดการ</option>
                <option value="7">คณะพยาบาลศาสตร์</option>
                <option value="8">บัณฑิตวิทยาลัย</option>

              </select>
            </div>
            <div class="col-auto">
              <label for="exampleFormControlSelect1">*สาขาวิชา</label>
              <select class="form-control" name="user_major" data-required="" style="width:250px;">
                <option>-- โปรดเลือก --</option>
                <?php  if($select_sub_major){
                                                  foreach ($select_sub_major as $val){
                                                    $submajor_id = !empty($val['major_id'])? $val['major_id'] : '';
                                                    $submajor_name = !empty($val['major_name'])? $val['major_name'] : '';
                                              ?>
                <option value="<? echo $submajor_id;?>">
                  <? echo $submajor_name;?>
                </option>
                <?php }} ?>

              </select>
            </div>
            <div class="col-auto">
              <label>ที่อยู่</label>
              <input type="text" class="form-control" required="กรุณากรอกที่อยู่" name="user_address" id="user_address"
                style="width:500px;" placeholder="" />
            </div>
            <div class="col-auto">
              <label>*หลักสูตรการศึกษา</label>
              <select class="form-control" name="user_grade" data-required="กรุณาเลือกคำนำหน้า" style="width:200px;">
                <option>-- โปรดเลือก --</option>
                <option value="ครุศาสตรบัณฑิต (ค.บ.5 ปี)">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                <option value="วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                <option value="ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>
                <option value="รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>
                <option value="ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                <option value="นิติศาสตรบัณฑิต (น.บ. 4 ปี)">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>
                <option value="บัญชีบัณฑิต (บช.บ.4 ปี)">บัญชีบัณฑิต (บช.บ.4 ปี)</option>
                <option value="นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)">นิเทศศาสตรบัณฑิต (นศ.บ. 4 ปี)</option>
                <option value="เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>
                <option value="บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)">บริหารธุรกิจบัณฑิต (บธ.บ. 4 ปี)</option>
                <option value="ไม่ระบุ">ไม่ระบุ</option>
              </select>
            </div>

          </div> <br>
          <div class="row">
            <div class="col-auto">
              <label>*ตำแหน่ง / อาชีพ</label>
              <select class="form-control" name="user_position" data-required="" style="width:200px;" disabled>
                <option>-- นักศึกษา --</option>
                <option value="1">นักศึกษา</option>
                <option value="2">อาจารย์</option>
                <option value="3">พนักงานบริษัท</option>
                <option value="4">เจ้าหน้าที่</option>
              </select>
            </div>
            <div class="col-auto">
              <label>*สถานที่ฝึกงาน</label>
              <select class="form-control" name="user_coop_intership_name" id="user_coop_intership_name"
                data-required="กรุณาเลือกคำนำหน้า" style="width:200px;">
                <option>-- โปรดเลือก --</option>
                <?php  if($find_company){
                                                  foreach ($find_company as $val){
                                                    $user_company_id = !empty($val['user_company_id'])? $val['user_company_id'] : '';
                                                    $user_company_name = !empty($val['user_company_name'])? $val['user_company_name'] : '';
                                    ?>
                <option value="<?echo $user_company_id;?>">
                  <?echo $user_company_name;?>
                </option>
                <?php }}?>
                <option value="ไม่ระบุ">ไม่ระบุ</option>

              </select>
            </div>
            <div class="col-auto">
              <label>*สังกัด</label>
              <select class="form-control" name="user_company" id="user_company" data-required="" style="width:200px;">
                <option>-- โปรดเลือก --</option>
                <?php  if($find_company){
                                                  foreach ($find_company as $val){
                                                    $user_company_id = !empty($val['user_company_id'])? $val['user_company_id'] : '';
                                                    $user_company_name = !empty($val['user_company_name'])? $val['user_company_name'] : '';
                                    ?>
                <option value="<?echo $user_company_id;?>">
                  <?echo $user_company_name;?>
                </option>
                <?php }}?>
                <option value="ไม่ระบุ">ไม่ระบุ</option>

              </select>
            </div>
          </div> <br> <br>
          <div class="row">
            <div class="col-md-4">
              <label>ข้อมูลอื่น ๆ (ไม่จำเป็นต้องกรอกก็ได้)</label>
              <input class="form-control" type="text" name="user_supervisor_status" id="user_supervisor_status"
                value="1" style="width:500px;" placeholder="" />
            </div>
          </div>

          <br>

          <font color="red">***หมายเหตุ จำเป็นต้องกรอกข้อมูลให้ครบทุกช่องก่อนทำการบันทึก</font> <br>
          <font color="green"></font>
          <br>
          <div class="row">
            <div class="col-auto">
              <button type="submit" class="btn btn-success" style="width:150px;">บันทึก</button>
            </div>
            <br>
            <div class="col-auto">
              <button type="cancal" class="btn btn-danger" style="width:150px;">แก้ไข</button>
            </div>


          </div>
        </form>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->

  <!-- End of Footer -->
  <?php include "footer-std.php"?>
  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include "logout_std.php" ?>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/std-2.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>