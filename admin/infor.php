<?php
include_once '../config/db.php';
$db = new PHPMySQLi();



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

  <title>Admin - Information</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="color">

  <!-- Page Wrapper -->
  <div id="wrapper">

     <?php include "header-admin.php" ?>
        
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">ข้อมูลส่วนตัว</h1>
            <div>
            <form role="form" action="../controller/editprofile_controller.php" method="post">
                                <div class="row">
                                      <div class="col-2">                    
                                        <label>*คำนำหน้าชื่อ</label>
                                        <select class="form-control" name="user_title" data-required="กรุณาเลือกคำนำหน้า" style="width:150px;">
                                              <option>-- โปรดเลือก --</option>
                                              <option value="1">นาย</option>
                                              <option value="2">นาง</option>
                                              <option value="3">นางสาว</option>                                      
                                            </select>
                                      </div>
                                      
                                      <div class="col-auto">                    
                                        <label>*ชื่อ</label>
                                         <input type="text" class="form-control" required="กรุณากรอกชื่อ" 
                                         name="user_name" style="width:250px;" placeholder=""/>
                                      </div>
                                      <div class="col-auto"> 
                                        <label>*นามสกุล</label>
                                        <input type="text" class="form-control" data-required="กรุณากรอกนามสกุล" 
                                        name="user_surname" style="width:250px;" placeholder=""/>
                                      </div>
                                      <div class="col-auto">                    
                                        <label>*เบอร์ติดต่อ</label>
                                        <input type="text" class="form-control" data-required="กรุณากรอกเบอร์โทรศัพท์" 
                                        name="user_phone" maxlength="10" style="width:250px;" placeholder=""/>
                                      </div>
                                </div>                               
                                <br>
                                <div class="row">
                                      <div class="col-auto">                    
                                        <label>Username</label> <input type="text" class="form-control" data-required="กรอกชื่อผู้ใช้งาน" name="user_username" style="width:250px;" placeholder="ชื่อผู้ใช้งาน"  disabled pattern="[A-Za-z0-9]{1,20}" maxlength="15 "/>
                                      </div> 
                                      <div class="col-auto"> 
                                        <label>Password</label><input type="text" class="form-control" data-required="กรอกรหัสผ่าน" name="user_password" style="width:250px;" placeholder="รหัสผ่าน"/>
                                      </div>
                                      
                                </div>
                                <br>
                                <div class="row">
                                      <div class="col-auto">
                                            <label for="exampleFormControlSelect1">*คณะ</label>
                                            <select class="form-control" name="user_major" data-required="กรุณาเลือกสถานะผู้ใช้" style="width:250px;">
                                              <option>-- โปรดเลือก --</option>
                                              <option value="9">ไม่ระบุ</option>
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
                                            <select class="form-control" name="user_submajor" data-required="" style="width:250px;">
                                              <option>-- โปรดเลือก --</option>
                                              <option value="1">1111111</option>
                                              <option value="2">ไม่ระบุ</option>
                                              
                                                                                                 
                                            </select>
                                      </div>
                                      <div class="col-auto">                    
                                        <label>ที่อยู่</label>
                                         <input type="text" class="form-control" required="กรุณากรอกที่อยู่" 
                                         id="address" style="width:500px;" placeholder=""/>
                                      </div>
                                      <div class="col-auto"> 
                                        <label>*หลักสูตรการศึกษา</label>
                                        <select class="form-control" name="user_grade" data-required="กรุณาเลือกคำนำหน้า" style="width:200px;">
                                        <option>-- โปรดเลือก --</option>
                                        <option value="0">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                                        <option value="1">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                                        <option value="2">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>   
                                        <option value="3">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>   
                                        <option value="4">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                                        <option value="5">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>   
                                        <option value="6">บัญชีบัณฑิต (บช.บ.4 ปี)</option>   
                                        <option value="7">นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)</option>   
                                        <option value="8">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>   
                                        <option value="9">บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)</option>   
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                      </div>
                                      
                                </div> <br>
                                <div class="row">
                                      <div class="col-auto">
                                      <label >*ตำแหน่ง / อาชีพ</label>
                                      <select class="form-control" name="user_position" data-required="" style="width:200px;">
                                        <option>-- นักศึกษา --</option>
                                        <option value="1">นักศึกษา</option>
                                        <option value="2">อาจารย์</option>
                                        <option value="3">พนักงานบริษัท</option>   
                                        <option value="4">เจ้าหน้าที่</option>   
                                       </select>
                                      </div>
                                </div>  <br>  <br>
                                <div class="row">
                                      <div class="col-md-4">                                       
                                      <label>ข้อมูลอื่น ๆ (ไม่มจำเป็นต้องกรอกก็ได้)</label>
                                      <input   type="text" name="ีuser_moreinfor" style="width:500px;" placeholder=""/>
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
