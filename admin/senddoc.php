<?PHP
    include_once '../config/db.php';
    include_once '../modal/select_input.php';
    $select  = new Select_Doc();
    $find_faculty = $select->find_faculty ();
    $find_major = $select->find_major ();

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/icons/LOGO-bru.ico"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Form - เอกสารส่งคำขอฝึกงาน</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <style>
    .button2
    {
      background-color: #1982C4;
      border: none;
      border-radius: 2px;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      cursor: pointer; /* Blue */
    }
  </style> 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  <?php include "header-admin.php" ?>
  
    <section class="page-section" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">แบบฟอร์มส่งคำร้องขอฝึกงานสหกิจกับบริษัท/หน่วยงาน</h2>
          
        </div>
      </div>
    

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="tabbable" id="tabs-591767">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active show" href="#tab1" data-toggle="tab">ผู้ลงนาม ผู้อำนวยการสำรัก</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#tab2" data-toggle="tab">ผู้ลงนาม รักษาการแทน</a>
                </li>
              </ul>


              <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                 <br>
                <h4>กรณี ผู้อำนวยการอนุมัติเอกสาร</h4>
                   <form name="tdoc" action="../FPDF/test.php" method="post">
                      <div class="form-group">
                            <label>เรียน (To): </label> 
                            <input type="text" name="to_name" id="to_name" style="width:300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว" required>
                            <input type="hidden" value="<?php echo date('Y-m-j H:i:s'); ?>" name="date" id="date">
                        </div>
                      
                        <div class="form-group">
                            <label>เวลาที่เริ่มฝึกงาน (Time Start Intership)</label>
                            <input type="date" value="<?php echo date('Y-n-d H:i:s'); ?>" name="date_start" id="date_start">               
                        </div> 
                        <div class="form-group">
                            <label>วันสุดท้าย (Time End Intership) :</label>
                            <input type="date" value="<?php echo date('Y-n-d H:i:s'); ?>" name="date_done" id="date_done">
                            
                        </div> 
                        <div class="form-group">
                   
                            <label>ชื่อ สาขาวิชา (Submajor) : </label> 
                            <select class="" name="tdoc_std_submajor"  id="tdoc_std_submajor" style="width:200px;" required>
                                <option>-- โปรดเลือก --</option>
                                <?php
                                $i = 0;
                                if($find_major){
                                  foreach ($find_major as $val){
                                    $major_name = !empty($val['major_name'])? $val['major_name'] : '';
                                  ?>
                                <option value="<?echo $major_name;?>"><?echo $major_name;?></option> 
                                <?php }}?>
                            </select>
                        </div>
                      
                        <div class="form-group">
                            <label>ชื่อ คณะ (Major): </label> 
                           
                            <select class="" name="tdoc_std_major"  id="tdoc_std_major" style="width:200px;" required>
                                <option>-- โปรดเลือก --</option>
                                <?php
                                $i = 0;
                                if($find_faculty){
                                  foreach ($find_faculty as $val){
                                    $faculty_name = !empty($val['faculty_name'])? $val['faculty_name'] : '';
                                  ?>
                                <option value="<?echo $faculty_name;?>"><?echo $faculty_name;?></option> 
                                <?php }}?>
                            </select>
                        </div>
                        <div class="form-group">
                                <label>คำนำหน้า ชื่อนักศึกษา (Tiitle Student Name) :
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tdoc_std_titlename" id="tdoc_std_titlename" value="นาย">
                          <label class="form-check-label" for="inlineRadio1">นาย</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tdoc_std_titlename" id="tdoc_std_titlename" value="นาง">
                          <label class="form-check-label" for="inlineRadio2">นาง</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tdoc_std_titlename" id="tdoc_std_titlename" value="นางสาว">
                          <label class="form-check-label" for="inlineRadio2">นางสาว</label>
                        </div>

                        </div>

                        <div class="form-group">
                            <label>ชื่อนักศึกษา - สกุล (Student Name) : </label> 
                            <input type="tdoc_std_name" name="tdoc_std_name" placeholder="ชื่อและนามสกุล" style="width:300px;" required>
                        </div>
                        <div class="form-group">
                            <label>คำนำหน้า : </label> 
                            <input type="title_pr" name="title_pr" placeholder="เช่น อาจารย์ ดร." required>
                        </div>
                        <div class="form-group">
                            <label>ชื่อผู้ลงนาม : </label> 
                            <input type="pr_fullname" name="pr_fullname" placeholder="ชื่อและนามสกุลผู้ลงนาม" style="width:300px;" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>ตำแหน่ง (Position) : </label> 
                            <input type="mng_position" name="mng_position" placeholder="ตำแหน่งผู้ลงนาม">
                        </div> -->
                        <div class="form-group">
                            <button class="btn btn-success" name="submit" type="submit" id="submit">สร้างเอกสาร</button>
                        </div>
                  </form>
                </div>


                <div class="tab-pane" id="tab2"> <br>
                <h4>กรณี รักษาการแทนผู้อำนวยการอนุมัติเอกสาร</h4>
                <form name="tdoc" action="../FPDF/title_co.php" method="post">
                  <div class="form-group">
                          <label>เรียน (To): </label> 
                          <input type="text" name="to_name" id="to_name" style="width:300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว" required> 
                          <input type="hidden" value="<?php echo date('Y-m-j H:i:s'); ?>" name="date" id="date">
                      </div>
                    
                      <div class="form-group">
                          <label>เวลาที่เริ่มฝึกงาน (Time Start Intership)</label>
                          <input type="date" value="<?php echo date('Y-m-d H:i:s'); ?>" name="date_start" id="date_start">               
                      </div> 
                      <div class="form-group">
                          <label>วันสุดท้าย (Time End Intership) :</label>
                          <input type="date" value="<?php echo date('Y-m-d H:i:s'); ?>" name="date_done" id="date_done">
                          
                      </div> 
                      <div class="form-group">
                          <label>ชื่อ สาขาวิชา (Submajor) : </label> 
                          <select class="" name="tdoc_std_submajor"  id="tdoc_std_submajor" style="width:200px;" required>
                                <option>-- โปรดเลือก --</option>
                                <?php
                                $i = 0;
                                if($find_major){
                                  foreach ($find_major as $val){
                                    $major_name = !empty($val['major_name'])? $val['major_name'] : '';
                                  ?>
                                <option value="<?echo $major_name;?>"><?echo $major_name;?></option> 
                                <?php }}?>
                            </select>
                      </div>
                      <div class="form-group">
                          <label>ชื่อ คณะ (Major): </label> 
                          <select class="" name="tdoc_std_major"  id="tdoc_std_major" style="width:200px;" required>
                                <option>-- โปรดเลือก --</option>
                                <?php
                                $i = 0;
                                if($find_faculty){
                                  foreach ($find_faculty as $val){
                                    $faculty_name = !empty($val['faculty_name'])? $val['faculty_name'] : '';
                                  ?>
                                <option value="<?echo $faculty_name;?>"><?echo $faculty_name;?></option> 
                                <?php }}?>
                            </select>
                      </div>
                      <div class="form-group">
                              <label>คำนำหน้า ชื่อนักศึกษา (Tiitle Student Name) :
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tdoc_std_titlename" id="tdoc_std_titlename" value="นาย">
                        <label class="form-check-label" for="inlineRadio1">นาย</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tdoc_std_titlename" id="tdoc_std_titlename" value="นาง">
                        <label class="form-check-label" for="inlineRadio2">นาง</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tdoc_std_titlename" id="tdoc_std_titlename" value="นางสาว">
                        <label class="form-check-label" for="inlineRadio2">นางสาว</label>
                      </div>

                      </div>

                      <div class="form-group">
                          <label>ชื่อนักศึกษา - สกุล (Student Name) : </label> 
                          <input type="tdoc_std_name" name="tdoc_std_name" placeholder="ชื่อและนามสกุล" style="width:300px;" required>
                      </div>
                      <div class="form-group">
                          <label>คำนำหน้า : </label> 
                          <input type="title_pr" name="title_pr" placeholder="เช่น อาจารย์ ดร.สุรเดช" required>
                      </div>
                      <div class="form-group">
                          <label>ชื่อผู้ลงนาม : </label> 
                          <input type="pr_fullname" name="pr_fullname" placeholder="ชื่อและนามสกุลผู้ลงนาม" required>
                      </div>
                      <div class="form-group">
                          <label>ตำแหน่ง (Position) : </label> 
                          <input type="pr_position" name="pr_position" placeholder="ตำแหน่งผู้ลงนาม" style="width:300px;" required>
                      </div>
                      <div class="form-group">
                          <button class="btn btn-success" name="submit" type="submit" id="submit">สร้างเอกสาร</button>
                      </div>
                  </form>

                </div>

              </div>


            </div>
          </div>
        </div>
      </div>

      
            

           
        
      </div>
        
    </section>
    </div>
    <!-- End of Content Wrapper -->
    <?php include "footer-admin.php" ?>
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