<?php
  include_once '../config/db.php';
  include_once '../modal/adduser.php';
  $user = new Manage_User();
  $find_user = $user->find_user();
  
  // echo "<pre>"; print_r($find_user); echo "</pre>";
  include_once '../modal/editprofile.php';

  $editProfile = new Edit_Profile();

  $select_sub_major = $editProfile->select_sub_major();

  include_once '../modal/select_input.php';
  $select = new Select_Doc();
  $company_coop = $select->company_coop();
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

  <title>Admin - Manage - User</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="color">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "header-admin.php" ?>

    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">เพิ่มผู้ใช้งานระบบ</h1>
      <div>
        <form role="form" action="../controller/adduser_controller.php" method="post">
          <div class="row">
            <div class="col-2">
              <label>คำนำหน้าชื่อ</label>
              <select class="form-control" name="user_title" data-required="กรุณาเลือกคำนำหน้า" style="width:150px;">
                <option>-- โปรดเลือก --</option>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
                <option value="อาจารย์">อาจารย์</option>
              </select>
            </div>
            <div class="col-auto">
              <label>ชื่อ</label>
              <input type="text" class="form-control" required="กรุณากรอกชื่อ" name="user_name" style="width:250px;"
                placeholder="" />
            </div>
            <div class="col-auto">
              <label>นามสกุล</label>
              <input type="text" class="form-control" data-required="กรุณากรอกนามสกุล" name="user_surname"
                style="width:250px;" placeholder="" />
            </div>
            <div class="col-auto">
              <label>เบอร์ติดต่อ</label>
              <input type="text" class="form-control" data-required="กรุณากรอกเบอร์โทรศัพท์" name="user_phone"
                maxlength="10" style="width:250px;" placeholder="" />
            </div>
            <div class="col-auto">
              <label>หน่วยงาน / องค์กร</label>

              <select class="form-control" name="user_company" data-required="กรุณาเลือกคำนำหน้า" style="width:300px;">
                <option>-- โปรดเลือก --</option>
                <?php
                                  $i = 0;
                                  if($company_coop){
                                    foreach ($company_coop as $val){ 
                                      $ID = !empty($val['ID'])? $val['ID'] : '';
                                      $Company = !empty($val['Company'])? $val['Company'] : '';
                                    ?>

                <option value="<?echo $ID;?>">
                  <?echo $Company; ?>
                </option>
                <?php }}?>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-auto">
              <label>Username</label> <input type="text" class="form-control" data-required="กรอกชื่อผู้ใช้งาน"
                name="user_username" style="width:250px;" placeholder="ชื่อผู้ใช้งาน" pattern="[A-Za-z0-9]{1,20}"
                maxlength="15 " />
            </div>
            <div class="col-auto">
              <label>Password</label><input type="text" class="form-control" data-required="กรอกรหัสผ่าน"
                name="user_password" style="width:250px;" placeholder="รหัสผ่าน" />
            </div>
            <div class="col">
              <label for="exampleFormControlSelect1">เลือกสถานะ</label>
              <select class="form-control" name="user_type" data-required="กรุณาเลือกสถานะผู้ใช้" style="width:250px;">
                <option>-- โปรดเลือก --</option>
                <option value="1">นิสิต/นักศึกษา</option>
                <option value="2">อาจารย์นิเทศ</option>
                <option value="3">ตัวแทนองกรค์/บริษัท</option>
                <option value="5">ผู้ดูแลเว็บไซด์</option>
              </select>
            </div>
          </div> <br>
          <div class="row">
            <div class="col-auto">
              <label for="">หากเป็นนักศึกษาให้กรอกส่วนนี้ด้วย****</label>
            </div>
          </div>
          <div class="row">
            <div class="col-auto">
              <label for="">รหัสนักศึกษา </label> <input type="text" class="form-control" name="user_std_id"
                style="width:250px;" />
            </div>
            <div class="col-auto">
              <label for="">สาขาวิชา </label>
              <select class="form-control" name="user_major" id="user_major" data-required="" style="width:250px;">
                <option>-- โปรดเลือก --</option>
                <?php  if($select_sub_major){
                                    foreach ($select_sub_major as $val){
                                      $major_id = !empty($val['major_id'])? $val['major_id'] : '';
                                      $major_name = !empty($val['major_name'])? $val['major_name'] : '';?>
                <option value="<? echo $major_id;?>">
                  <? echo $major_name; ?>
                </option>
                <?php }} ?>
              </select>
            </div>
            <div class="col-auto">
              <label for="">คณะ </label> <select class="form-control" name="user_faculty" data-required=""
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
              <label>*หลักสูตรการศึกษา</label>
              <select class="form-control" name="user_grade" style="width:200px;">
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
              <label for="">ข้อมูลอื่น ๆ (ไม่ต้องระบุก็ได้) </label> <input type="text" class="form-control"
                name="user_moreinfor" style="width:500px;">
            </div>
          </div>
          <br>
          <font color="red">***หมายเหตุ จำเป็นต้องกรอกข้อมูลให้ครบทุกช่องก่อนทำการเพิ่มผู้ใช้งาน</font> <br>
          <font color="green">***หมายเหตุ ข้อมูลเฉพาะผู้ใช้งานจะทำการเพิ่ม/แก้ไข ได้ในหน้าโปรไฟล์ของตัวเอง</font>
          <br>
          <button type="submit" class="btn btn-success" style="width:150px;">เพิ่มผู้ใช้งาน</button>
        </form>
      </div>


    </div>

    <!-- /.container-fluid -->

  </div>


  <? include "footer-admin.php" ?>
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