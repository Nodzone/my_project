<?PHP
    include_once '../config/db.php';



?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/icons/LOGO-bru.ico"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Form - แบบแจ้งรายชื่อนักศึกษาสหกิจศึกษา</title>

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
          <h2 class="section-heading text-uppercase">แบบแจ้งรายชื่อนักศึกษาสหกิจศึกษา</h2>
          <h3 class="section-subheading text-muted"></h3>
          <br>
        </div>
      </div>
      <h2></h2> 
      <div>
              <!-- <br>../controller/title_doc_controller.php -->
          <form name="BRU_CO3" action="../FPDF/bru_co3.php" method="post">
          <div class="form-group">
                  <label>เรียน (To): </label> 
                  <input type="text" name="hr_name" id="hr_name" style="width:300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว" required>
                  <input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="date" id="date">
              </div>
            
              
             <div class="form-group">
                <label for="">ตามที่หน่วยงานของท่านได้เสนองานสหกิจศึกษาในตำแหน่งงาน : <input type="text" name="position" id="position" required>  <br> 
                ทางสหกิจศึกษาได้ดำเนินการรับสมัครและคัดเลือกนักศึกษาเพื่อดำเนินงานตามที่ท่านได้เสนอมาดังรายละเอียดดังนี้</label>
             </div>

             <div class="row">
                <div class="col-auto">
                    <label for="">1.</label> <input type="text" name="std_name1" id="std_name1" style="width: 300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว" required> 
                    <label for="">รหัสนักศึกษา :</label> <input type="text" name="std_id1" id="std_id1" maxlength="12" required>
                </div>
                <div class="col-auto">  <label for="">หลักสูตร</label>  </div>
               <div class="col-auto">
                    <select class="form-control" name="std_fatory1"  style="width:200px;" required>
                        <option value="">-- โปรดเลือก --</option>
                        <option value="ครุศาสตรบัณฑิต">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                        <option value="วิทยาศาสตรบัณฑิต">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>   
                        <option value="รัฐประศาสนศาสตรบัณฑิต">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>   
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                        <option value="นิติศาสตรบัณฑิต">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>   
                        <option value="บัญชีบัณฑิต">บัญชีบัณฑิต (บช.บ.4 ปี)</option>   
                        <option value="นิเทศศาสตรบัณฑิต">นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)</option>   
                        <option value="เศรษฐศาสตรบัณฑิต">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>   
                        <option value="บริหารธุรกิจบัณฑิต">บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)</option>   
                        <option value="10">ไม่ระบุ</option> 
                    </select>
                </div>
             </div>
             <div class="row">
                <div class="col-auto">
                    <label for="">2.</label> <input type="text" name="std_name2" id="std_name2" style="width: 300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว"> 
                    <label for="">รหัสนักศึกษา :</label> <input type="text" name="std_id2" id="std_id2" maxlength="12">
                </div>
                <div class="col-auto">  <label for="">หลักสูตร</label>  </div>
               <div class="col-auto">
                    <select class="form-control" name="std_fatory2"  style="width:200px;">
                        <option value="">-- โปรดเลือก --</option>
                        <option value="ครุศาสตรบัณฑิต">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                        <option value="วิทยาศาสตรบัณฑิต">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>   
                        <option value="รัฐประศาสนศาสตรบัณฑิต">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>   
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                        <option value="นิติศาสตรบัณฑิต">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>   
                        <option value="บัญชีบัณฑิต">บัญชีบัณฑิต (บช.บ.4 ปี)</option>   
                        <option value="นิเทศศาสตรบัณฑิต">นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)</option>   
                        <option value="เศรษฐศาสตรบัณฑิต">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>   
                        <option value="บริหารธุรกิจบัณฑิต">บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)</option>   
                        <option value="10">ไม่ระบุ</option> 
                    </select>
                </div>
             </div>
             <div class="row">
                <div class="col-auto">
                    <label for="">3.</label> <input type="text" name="std_name3" id="std_name3" style="width: 300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว"> 
                    <label for="">รหัสนักศึกษา :</label> <input type="text" name="std_id3" id="std_id3" maxlength="12">
                </div>
                <div class="col-auto">  <label for="">หลักสูตร</label>  </div>
               <div class="col-auto">
                    <select class="form-control" name="std_fatory3"  style="width:200px;">
                        <option value="">-- โปรดเลือก --</option>
                        <option value="ครุศาสตรบัณฑิต">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                        <option value="วิทยาศาสตรบัณฑิต">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>   
                        <option value="รัฐประศาสนศาสตรบัณฑิต">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>   
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                        <option value="นิติศาสตรบัณฑิต">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>   
                        <option value="บัญชีบัณฑิต">บัญชีบัณฑิต (บช.บ.4 ปี)</option>   
                        <option value="นิเทศศาสตรบัณฑิต">นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)</option>   
                        <option value="เศรษฐศาสตรบัณฑิต">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>   
                        <option value="บริหารธุรกิจบัณฑิต">บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)</option>   
                        <option value="10">ไม่ระบุ</option> 
                    </select>
                </div>
             </div>
             <div class="row">
                <div class="col-auto">
                    <label for="">4.</label> <input type="text" name="std_name4" id="std_name4" style="width: 300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว"> 
                    <label for="">รหัสนักศึกษา :</label> <input type="text" name="std_id4" id="std_id4" maxlength="12">
                </div>
                <div class="col-auto">  <label for="">หลักสูตร</label>  </div>
               <div class="col-auto">
                    <select class="form-control" name="std_fatory4"  style="width:200px;">
                        <option value="">-- โปรดเลือก --</option>
                        <option value="ครุศาสตรบัณฑิต">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                        <option value="วิทยาศาสตรบัณฑิต">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>   
                        <option value="รัฐประศาสนศาสตรบัณฑิต">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>   
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                        <option value="นิติศาสตรบัณฑิต">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>   
                        <option value="บัญชีบัณฑิต">บัญชีบัณฑิต (บช.บ.4 ปี)</option>   
                        <option value="นิเทศศาสตรบัณฑิต">นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)</option>   
                        <option value="เศรษฐศาสตรบัณฑิต">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>   
                        <option value="บริหารธุรกิจบัณฑิต">บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)</option>   
                        <option value="10">ไม่ระบุ</option> 
                    </select>
                </div>
             </div>
             <div class="row">
                <div class="col-auto">
                    <label for="">5.</label> <input type="text" name="std_name5" id="std_name5" style="width: 300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว"> 
                    <label for="">รหัสนักศึกษา :</label> <input type="text" name="std_id5" id="std_id5" maxlength="12">
                </div>
                <div class="col-auto">  <label for="">หลักสูตร</label>  </div>
               <div class="col-auto">
                    <select class="form-control" name="std_fatory5"  style="width:200px;">
                        <option value="">-- โปรดเลือก --</option>
                        <option value="ครุศาสตรบัณฑิต">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                        <option value="วิทยาศาสตรบัณฑิต">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>   
                        <option value="รัฐประศาสนศาสตรบัณฑิต">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>   
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                        <option value="นิติศาสตรบัณฑิต">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>   
                        <option value="บัญชีบัณฑิต">บัญชีบัณฑิต (บช.บ.4 ปี)</option>   
                        <option value="นิเทศศาสตรบัณฑิต">นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)</option>   
                        <option value="เศรษฐศาสตรบัณฑิต">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>   
                        <option value="บริหารธุรกิจบัณฑิต">บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)</option>   
                        <option value="10">ไม่ระบุ</option> 
                    </select>
                </div>
             </div>
             <div class="row">
                <div class="col-auto">
                    <label for="">6.</label> <input type="text" name="std_name6" id="std_name6" style="width: 300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว"> 
                    <label for="">รหัสนักศึกษา :</label> <input type="text" name="std_id6" id="std_id6" maxlength="12">
                </div>
                <div class="col-auto">  <label for="">หลักสูตร</label>  </div>
               <div class="col-auto">
                    <select class="form-control" name="std_fatory6"  style="width:200px;">
                        <option value="">-- โปรดเลือก --</option>
                        <option value="ครุศาสตรบัณฑิต">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                        <option value="วิทยาศาสตรบัณฑิต">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>   
                        <option value="รัฐประศาสนศาสตรบัณฑิต">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>   
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                        <option value="นิติศาสตรบัณฑิต">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>   
                        <option value="บัญชีบัณฑิต">บัญชีบัณฑิต (บช.บ.4 ปี)</option>   
                        <option value="นิเทศศาสตรบัณฑิต">นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)</option>   
                        <option value="เศรษฐศาสตรบัณฑิต">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>   
                        <option value="บริหารธุรกิจบัณฑิต">บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)</option>   
                        <option value="10">ไม่ระบุ</option> 
                    </select>
                </div>
             </div>
             <div class="row">
                <div class="col-auto">
                    <label for="">7.</label> <input type="text" name="std_name7" id="std_name7" style="width: 300px;" placeholder="เช่น นาย สมเกียตริ ไม่เหยียดผิว"> 
                    <label for="">รหัสนักศึกษา :</label> <input type="text" name="std_id7" id="std_id7" maxlength="12">
                </div>
                <div class="col-auto">  <label for="">หลักสูตร</label>  </div>
               <div class="col-auto">
                    <select class="form-control" name="std_fatory7"  style="width:200px;">
                        <option value="">-- โปรดเลือก --</option>
                        <option value="ครุศาสตรบัณฑิต">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                        <option value="วิทยาศาสตรบัณฑิต">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>   
                        <option value="รัฐประศาสนศาสตรบัณฑิต">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>   
                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                        <option value="นิติศาสตรบัณฑิต">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>   
                        <option value="บัญชีบัณฑิต">บัญชีบัณฑิต (บช.บ.4 ปี)</option>   
                        <option value="นิเทศศาสตรบัณฑิต">นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)</option>   
                        <option value="เศรษฐศาสตรบัณฑิต">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>   
                        <option value="บริหารธุรกิจบัณฑิต">บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)</option>   
                        <option value="10">ไม่ระบุ</option> 
                    </select>
                </div>
             </div>
              <div class="form-group">
                  <label>ลงชื่อ (ออกเอกสาร) : </label> 
                  <input type="text" name="co_name" id="co_name" placeholder="ชื่อและนามสกุลผู้ลงนาม">
              </div>
              <div class="form-group">
                  <label>ตำแหน่ง (Position) : </label> 
                  <input type="text" name="co_positiom" placeholder="ตำแหน่งผู้ลงนาม">
              </div>
              <div class="form-group">
                  <button class="btn btn-success" name="submit" type="submit" id="submit">ส่งคำร้อง</button>
              </div>
          </form>
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