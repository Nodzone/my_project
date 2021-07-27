<?php
include_once '../config/db.php';
include_once '../modal/partner.php';
include_once '../modal/dairy.php';
$emp_std = new Manage_Partnet();
$find_student_part = $emp_std->find_student_part();
$calldairy = new Dairy_Student();



?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<link rel="icon" type="image/png" href="../img/icons/LOGO-bru.ico"/>
<link rel="icon" type="image/png" href="/img/icons/adminicon.ico"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Employee - STD - Partner</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/emp.css" rel="stylesheet">
<style>
  #doc {
    border-collapse: collapse;
    width: 100%;
  }

  #doc td, #customers th {
    border: 2px solid #ddd;
    text-align: center;
    padding: 8px;
  }

  #doc tr:nth-child(even){background-color: #ffff;}

  #doc tr:hover {background-color: #D7F2BA;}

  #doc th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #5CC8FF;
    color: white;
}
</style>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
      <!-- Topbar -->
      <?php include "header-emp.php" ?>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">ตรวจสอบกิจกรรม บันทึกงานนักศึกษา</h1>
        </div>
        <?php
            if($find_student_part){
              foreach ($find_student_part as $val){
                $user_partner1_id = !empty($val['user_partner1_id'])? $val['user_partner1_id'] : '';
                $user_partner1_fullname = !empty($val['user_partner1_fullname'])? $val['user_partner1_fullname'] : '';
                $user_partner1_major = !empty($val['user_partner1_major'])? $val['user_partner1_major'] : '';
                $find_Dairy_Student = $calldairy->find_Dairy_Student($user_partner1_id);

                if ($user_partner1_major == 1)
                {
                  $major = "ศึกษาศาสตร์ / คุรุศาสตร์";
                }
                else if ($user_partner1_major == 2)
                {
                  $major = "เทคโนโลยีอุตสาหกรรม  ";
                }
                else if ($user_partner1_major == 3)
                {
                  $major = "เทคโนโลยีการเกษตร  ";
                }
                else if ($user_partner1_major == 4)
                {
                  $major = "มนุษยศาสตร์และสังคมศาสตร์ ";
                }
                else if ($user_partner1_major == 5)
                {
                  $major = "วิทยาศาสตร์  ";
                }
                else if ($user_partner1_major == 6)
                {
                  $major = "วิทยาการจัดการ ";
                }
                else if ($user_partner1_major == 7)
                {
                  $major = "พยาบาลศาสตร์ ";
                }
                else if ($user_partner1_major == 8)
                {
                  $major = "บัณฑิตวิทยาลัย ";
                }
                ?>
          <div class="col-auto">
                <label for="">ชื่อ นักศึกษาในการดูแล : <?php echo $user_partner1_fullname; ?> คณะ : <?php echo  $major;?></label>
          </div>
              <?php }}?>
        <div>
        <table id="doc">
          <br>

          <center><H3>รายการฝึกงานในแต่ละวัน </H3></center>
          <thead>
            <tr>
              <th>               No.            </th>
              <th>                  หัวเรื่องบันทึก               </th>
              <th>                  รายละเอียด                </th>
              <th>                  หมายเหตุ              </th>
              <th>                  วันที่              </th>
              <th>                สถานนะ             </th>
              <th>                อนุมัติ             </th>

            </tr>
          </thead>
          <tbody>
          <?php
            if($find_Dairy_Student){
              $i = 0;
              foreach ($find_Dairy_Student as $val){
                $diary_id = !empty($val['diary_id'])? $val['diary_id'] : '';
                $dairy_name = !empty($val['dairy_name'])? $val['dairy_name'] : '';
                $dairy_detail = !empty($val['dairy_detail'])? $val['dairy_detail'] : '';
                $diary_more = !empty($val['diary_more'])? $val['diary_more'] : '';
                $dairy_date = !empty($val['dairy_date'])? $val['dairy_date'] : '';
                $diary_status = !empty($val['diary_status'])? $val['diary_status'] : '';
                $i = $i + 1;
            ?>
            <tr class="">
                <td><?php echo  $diary_id; ?></td>
                <td><?php echo  $dairy_name ?></td>
                <td><?php echo  $dairy_detail ?></td>
                <td><?php echo  $diary_more ?></td>
                <td><?php echo  $dairy_date ?></td>
                <td><?php if ($diary_status == 1 )
                { $diary_show_status =  '<font color="red">' . "ยังไม่ได้ตรวจสอบ". '</font>'  ;} 
                else if ($diary_status == 2 )
                { $diary_show_status = '<font color="green">' ."ตรวจแล้ว". '</font>'  ; }  echo $diary_show_status; ?> </td>
                  <td>   <button class="btn btn-success btn-dairy-id" data-id="<?echo $diary_id;?>"> อนุมัติ </button> </td>
              </tr>
            <?php  }} ?>
          </tbody>
        </table>
                  
        
        <br>
        <div class="row" align="right">
                <div class="col-auto">
                  <button class="btn btn-primary" > อนุมัติทั้งหมด </button>
                </div>
        </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <? include "footer.php" ?>
    
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

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->

<script src="js/script.js"></script>

</body>

</html>
