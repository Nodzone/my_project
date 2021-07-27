<?php
include_once '../config/db.php';
include_once '../modal/editprofile.php';
include_once '../modal/user_infor.php';
include_once '../modal/partner.php';
$editProfile = new Edit_Profile();
$find_profile = $editProfile->find_profile();
$select_sub_major = $editProfile->select_sub_major();
$partner = new  Manage_Partnet ();
$find_student_part = $partner->find_student_part();

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

  <title>Teacher - Information</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template-->
  <link href="css/teacher.css" rel="stylesheet">

</head>

<body class="color">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include "header-tech.php" ?>

    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">ข้อมูลส่วนตัวอาจารย์นิเทศ</h1>
      <div>

        <?php
                    if($find_profile_user){
                      foreach ($find_profile_user as $val){
                        $user_address = !empty($val['user_address'])? $val['user_address'] : '';
                        $user_company = !empty($val['user_company'])? $val['user_company'] : '';
                        $user_std_id = !empty($val['user_std_id'])? $val['user_std_id'] : '';
                        $user_major = !empty($val['user_major'])? $val['user_major'] : '';
                        $user_submajor = !empty($val['user_submajor'])? $val['user_submajor'] : '';
                        $user_grade = !empty($val['user_grade'])? $val['user_grade'] : '';
                        
                        
                    ?>
        <div class="row">
          <div class="col-auto">
            <label>ชื่อ - นามสกุล :</label>
            <? if($user_title == 1){$title = "นาย";} else if($user_title == 2){$title = "นาง";} else if($user_title == 3){$title = "นางสาว";} ?>
            <? echo $user_title. "&nbsp;".$user_name. "&nbsp;". $user_surname; ?>
          </div>
          <div class="col-auto">
            <label>เบอร์โทรศัพท์ (Phone): <?php echo  $user_phone; ?></label>
          </div>
          <div class="col-auto">
            <label>รหัสนักศึกษา (Student ID):
              <? echo $user_std_id ?></label>
          </div>
          <div class="clo-auto">
            <label>หลักสูตรการศึกษา :
              <? echo $user_grade ?></label>
          </div>
        </div>
        <div class="row">
          <div class="col-auto">
            <label>คณะ (Major): <?php 
                    if ($user_major == 1)
                    {
                      $major = "คณะศึกษาศาสตร์ / คุรุศาสตร์";
                    }
                    else if ($user_major == 2)
                    {
                      $major = "คณะเทคโนโลยีอุตสาหกรรม  ";
                    }
                    else if ($user_major == 3)
                    {
                      $major = "คณะเทคโนโลยีการเกษตร  ";
                    }
                    else if ($user_major == 4)
                    {
                      $major = "คณะมนุษยศาสตร์และสังคมศาสตร์ ";
                    }
                    else if ($user_major == 5)
                    {
                      $major = "คณะวิทยาศาสตร์  ";
                    }
                    else if ($user_major == 6)
                    {
                      $major = "คณะวิทยาการจัดการ ";
                    }
                    else if ($user_major == 7)
                    {
                      $major = "คณะพยาบาลศาสตร์ ";
                    }
                    else if ($user_major == 8)
                    {
                      $major = "บัณฑิตวิทยาลัย ";
                    }
                   
                    
                    
                    
                    
                    echo  $show_major; ?></label> <br>
          </div>
          <div class="col-auto">
            <label>สาขาวิชา (SubMajor) :
              <? if  ($user_submajor == 1){ $show_submajor= "นาฏศิลป์" ; } 
                                else if ($user_submajor == 2) { $show_submajor= "คณิตศาสตร์"; } 
                                else if  ($user_submajor == 3) { $show_submajor="การศึกษาปฐมวัย"; }  
                                else if  ($user_submajor == 4 ){ $show_submajor="เทคโนโลยีและคอมพิวเตอร์เพื่อการศึกษา"; }  
                                else if  ($user_submajor == 5) { $show_submajor="สังคมศึกษา"; }  
                                else if  ($user_submajor == 6) { $show_submajor= "ภาษาอังกฤษ"; }  
                                else if  ($user_submajor == 7) { $show_submajor="วิทยาศาสตร์ทั่วไป"; }  
                                else if  ($user_submajor == 8) { $show_submajor="ภาษาไทย"; }  
                                else if  ($user_submajor == 9) { $show_submajor="ศิลปศึกษา"; }  
                                else if  ($user_submajor == 10) { $show_submajor="ดนตรีศึกษา"; }  
                                else if  ($user_submajor == 11) { $show_submajor="พลศึกษา"; }  
                                else if  ($user_submajor == 12) { $show_submajor= "ฟิสิกส์"; }  
                                else if  ($user_submajor == 13) { $show_submajor="เทคโนโลยีสถาปัตยกรรม"; }  
                                else if  ($user_submajor == 14) { $show_submajor="เทคโนโลยีการจัดการอุตสาหกรรม"; }  
                                else if  ($user_submajor == 15) { $show_submajor="เทคโนโลยีวิศวกรรมโยธา"; }  
                                else if  ($user_submajor == 16) { $show_submajor="เทคโนโลยีวิศวกรรมไฟฟ้"; }  
                                else if ( $user_submajor == 17) { $show_submajor="เทคโนโลยีเซรามิกส์และการออกแบบ"; }  
                                else if ( $user_submajor == 18) { $show_submajor="เทคโนโลยีวิศวกรรมอิเล็กทรอนิกส์"; }  
                                else if  ($user_submajor == 19) { $show_submajor="ออกแบบผลิตภัณฑ์อุตสาหกรรม"; }  
                                else if  ($user_submajor == 20) { $show_submajor="เกษตรศาสตร์"; }  
                                else if  ($user_submajor == 21) { $show_submajor= "ประมง"; } 
                                else if  ($user_submajor ==  22) { $show_submajor="สัตวศาสตร์"; }  
                                else if  ($user_submajor == 23) { $show_submajor = "การพัฒนาสังคม"; }  
                                else if  ($user_submajor == 24) { $show_submajor="ภาษาไทย"; }  
                                else if  ($user_submajor == 25) { $show_submajor="บรรณารักษ์ศาสตร์และสารสนเทศศาสตร์"; }  
                                else if  ($user_submajor == 26) { $show_submajor="ภาษาอังกฤษ"; }  
                                else if  ($user_submajor == 27) { $show_submajor="ภาษาอังกฤษธุรกิจ"; }  
                                else if  ($user_submajor == 28) { $show_submajor="ดนตรีสากล"; }  
                                else if  ($user_submajor == 29) { $show_submajor="คอมพิวเตอร์ศิลปะและการออกแบบ"; }  
                                else if  ($user_submajor == 30) { $show_submajor="รัฐประศาสนศาสตร์"; }  
                                else if  ($user_submajor == 31) { $show_submajor= "นิติศาสตร์"; }  
                                else if  ($user_submajor == 32) { $show_submajor="ภูมิสารสนเทศ"; }  
                                else if  ($user_submajor == 33) { $show_submajor="เคมี"; }  
                                else if  ($user_submajor == 34) {$show_submajor=" วิทยาศาสตร์สิ่งแวดล้อม" ; }  
                                else if  ($user_submajor == 35) {$show_submajor="สาธารณสุขชุมชน"; }  
                                else if  ($user_submajor == 36) { $show_submajor="สถิติประยุกต์"; } 
                                else if  ($user_submajor == 37) { $show_submajor="ชีววิทยา" ; } 
                                else if  ($user_submajor == 38) { $show_submajor="เทคโนโลยีสารสนเทศ" ; } 
                                else if  ($user_submajor == 39) {$show_submajor="วิทยาการคอมพิวเตอร์" ; } 
                                else if  ($user_submajor == 40) {$show_submajor="คณิตศาสตร์" ; } 
                                else if  ($user_submajor == 41) {$show_submajor="วิทยาศาสตร์การกีฬา" ; } 
                                else if  ($user_submajor == 42) {$show_submajor="วิทยาศาสตร์สิ่งทอ" ; } 
                                else if  ($user_submajor == 43) {$show_submajor="วิทยาศาสตร์การอาหาร" ; } 
                                else if  ($user_submajor == 44) {$show_submajor="การบัญชี" ; } 
                                else if  ($user_submajor == 45) {$show_submajor="การสื่อสารมวลชน" ; } 
                                else if  ($user_submajor == 46) {$show_submajor="การท่องเที่ยวและการโรงแรม" ; } 
                                else if  ($user_submajor == 47) {$show_submajor="เศรษฐศาสตร์"; }
                                else if  ($user_submajor == 48) {$show_submajor="การเงินและการธนาคาร"; } 
                                else if  ($user_submajor == 49) {$show_submajor="การจัดการ" ; } 
                                else if  ($user_submajor == 50) {$show_submajor="การตลาด" ; } 
                                else if  ($user_submajor == 51) {$show_submajor="การบริหารทรัพยากรมนุษย์"; }
                                else if  ($user_submajor == 52) {$show_submajor="คอมพิวเตอร์ธุรกิจ"; } 
echo  $show_submajor;?></label>
            <?php }}?>
          </div>
          <div class="col-auto">
            <label>ที่อยู่ (Address): <?php echo  $user_address; ?></label>
          </div>
        </div>
        <div class="row">
          <div class="col-auto">
            <label>ชื่อผู้ใช้งาน (User) : <?php echo  $user_username; ?></label> <br>
            <label>รหัสผ่าน (Passowrd) :<?php echo  $user_password; ?></label>
          </div>
        </div>

        <div class="row">
          <div class="col-auto">
            <?php
                    if($find_student_part){
                      foreach ($find_student_part as $val){
                        $user_partner1_fullname = !empty($val['user_partner1_fullname'])? $val['user_partner1_fullname'] : '';
                        $user_partner1_major = !empty($val['user_partner1_major'])? $val['user_partner1_major'] : '';
                        $user_partner2_fullname = !empty($val['user_partner2_fullname'])? $val['user_partner2_fullname'] : '';
                        $user_partner2_company = !empty($val['user_partner2_company'])? $val['user_partner2_company'] : '';
                    
                        
                        
                    ?>
            <label>พี่เลี้ยงที่ฝึกงาน (Jop Supervisitor) : <?php echo  $user_partner2_fullname; ?></label> <br>

          </div>
          <div class="col-auto">
            <label for="">องค์กร : <?php echo $user_partner2_company; ?></label>
          </div>
        </div>

        <?php }}?>
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
  <script src="js/teacher.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>