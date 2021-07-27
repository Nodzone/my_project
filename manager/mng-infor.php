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

  <title>Employee - Information</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template-->
  <link href="css/emp.css" rel="stylesheet">

</head>

<body class="color">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include "header-emp.php" ?>
        
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">ข้อมูลส่วนตัว</h1>
            <div>
                      <form role="form" >
                                <div class="row">
                                      <div class="col-auto">                    
                                        <label>คำนำหน้าชื่อ</label>
                                        <select class="form-control" id="title" data-required="กรุณาเลือกคำนำหน้า" style="width:150px;">
                                              <option>-- โปรดเลือก --</option>
                                              <option value="0">นาย</option>
                                              <option value="1">นาง</option>
                                              <option value="2">นางสาว</option>                                      
                                            </select>
                                      </div>
                                      <div class="col-auto">                    
                                        <label>ชื่อ</label>
                                         <input type="text" class="form-control" required="กรุณากรอกชื่อ" 
                                         id="name" style="width:250px;" placeholder="" disabled />
                                      </div>
                                      <div class="col-auto"> 
                                        <label>นามสกุล</label>
                                        <input type="text" class="form-control" data-required="กรุณากรอกนามสกุล" 
                                        id="Surname" style="width:250px;" placeholder="" disabled/>
                                      </div>
                                </div> <br>
                                      <div class="row">
                                      <div class="col-auto">                    
                                        <label>เบอร์ติดต่อ</label>
                                        <input type="text" class="form-control" data-required="กรุณากรอกเบอร์โทรศัพท์" 
                                        id="Tel" maxlength="10" style="width:250px;" pattern="[0-9]" placeholder=""/>
                                        
                                      </div>                                   
                                      <div class="col-auto"> 
                                              <label>ตำแหน่ง</label>
                                              <input type="text" class="form-control" data-required="กรุณาระบุตำแหน่งงาน" 
                                                    id="Tel" maxlength="10" style="width:250px;" pattern="[0-9]" placeholder=""/>
                                              
                                      </div>                                    
                                            <div class="col-auto"> 
                                              <label>บริษัท</label>
                                              <input type="text" class="form-control" data-required="กรุณาระบุบริษัท/หน่วยงาน" 
                                                    id="Tel" maxlength="10" style="width:250px;" pattern="[0-9]" placeholder=""/>
                                             
                                            </div>
                                       
                                      </div>                             
                                <br>
                                <div class="row">
                                      <div class="col-auto">                    
                                        <label>Username</label> <input type="text" class="form-control" 
                                        data-required="กรอกชื่อผู้ใช้งาน" id="user" style="width:250px;" placeholder="ชื่อผู้ใช้งาน"  
                                        pattern="[A-Za-z0-9]{1,20}" maxlength="15" disabled/>
                                      </div> 
                                      <div class="col-auto"> 
                                        <label>Password</label><input type="text" class="form-control" 
                                        data-required="กรอกรหัสผ่าน" id="password" style="width:250px;" placeholder="รหัสผ่าน" />
                                      </div>
                                      
                                </div>
                                
                                <br>
                                
                                <div class="row">
                                    <div class="col-auto">
                                      <button type="submit" class="btn btn-success" style="width:150px;">บันทึก</button>
                                    </div>
                                    <br>
                                    <div class="col-auto">
                                      <button type="submit" class="btn btn-danger" style="width:150px;">แก้ไข</button>
                                    </div>
                                  
                                  
                                  </div>
                      </form>
            </div>
        </div>
        
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <? include "footer.php" ?>
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
  <script src="js/emp.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
