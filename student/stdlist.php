<?php
include_once '../config/db.php';
include_once '../modal/std_list.php';
$student = new List_Student();
$find_our_student = $student->find_our_student();

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

  <title>Teacher - Student List</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/teacher.css" rel="stylesheet">
  <style>
    #std {
      border-collapse: collapse;
      width: 100%;
      background-color: #ffff;
    }

    #std td, #std th {
      border: 1px solid #ddd;
      text-align: center;
      padding: 8px;
    }

    #std tr:nth-child(even){background-color: #ffff;}

    #std tr:hover {background-color: #ffff;}

    #std th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #316AF9;
      color: white;
  }
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

     <?php include "header-tech.php" ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">รายชื่อ นิสิต/นักศึกษาฝึกงาน</h1>
              <div class="tabbable" id="tabs-343650">
                  
                  
                      <div>
                        <table id="std">
                      
                        <thead>
                          <tr>
                            <th>                  No.                </th>
                            <th>                  รหัสนักศึกษา                </th>
                            <th>                  ชือนักศึกษา            </th>
                            <th>                  สาขาวิชา            </th>
                            <th>                  คณะ            </th>
                            <th>                  สถานที่ฝึกงาน             </th>
                            <th>                  ผลการประเมิน         </th>
                            <th>                  หมายเหตุ                </th>
                          
                          </tr>
                        </thead>
                        <tbody>
                        <?php
              if($find_our_student){
                foreach ($find_our_student as $val){
                  $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                  $user_std_id = !empty($val['user_std_id'])? $val['user_std_id'] : '';
                  $user_title = !empty($val['user_title'])? $val['user_title'] : '';
                  $user_name = !empty($val['user_name'])? $val['user_name'] : '';
                  $user_surname = !empty($val['user_surname'])? $val['user_surname'] : '';
                  $user_company = !empty($val['user_company'])? $val['user_company'] : '';
                  $user_coop_intership_name = !empty($val['user_coop_intership_name'])? $val['user_coop_intership_name'] : ''; 
                  $user_submajor = !empty($val['user_submajor'])? $val['user_submajor'] : '';
                  $user_major = !empty($val['user_major'])? $val['user_major'] : '';

                  $find_our_student = $student->major_student($user_submajor);
                }}
                if($find_our_student){
                  foreach ($find_our_student as $val){
                    $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                    $user_std_id = !empty($val['user_std_id'])? $val['user_std_id'] : '';
                    $user_title = !empty($val['user_title'])? $val['user_title'] : '';
                    $user_name = !empty($val['user_name'])? $val['user_name'] : '';
                    $user_surname = !empty($val['user_surname'])? $val['user_surname'] : '';
                    $user_company = !empty($val['user_company'])? $val['user_company'] : '';
                    $user_coop_intership_name = !empty($val['user_coop_intership_name'])? $val['user_coop_intership_name'] : ''; 
                    $user_submajor = !empty($val['user_submajor'])? $val['user_submajor'] : '';
                    $user_major = !empty($val['user_major'])? $val['user_major'] : '';

                    $find_file_student = $student->find_file_student($user_id);

                  $i = 0;

                  $i++;
                  if ($user_submajor == 1)
                  {
                    $submajor = "นาฏศิลป์";
                  }
                  else if ($user_submajor == 2)
                  {
                    $submajor = "คณิตศาสตร์";
                  }
                  else if ($user_submajor == 3)
                  {
                    $submajor = "การศึกษาปฐมวัย";
                  }
                  else if ($user_submajor == 4)
                  {
                    $submajor = "เทคโนโลยีและคอมพิวเตอร์เพื่อการศึกษา ";
                  }
                  else if ($user_submajor == 5)
                  {
                    $submajor = "สังคมศึกษา";
                  }
                  else if ($user_submajor == 6)
                  {
                    $submajor = "ภาษาอังกฤษ";
                  }
                  else if ($user_submajor == 7)
                  {
                    $submajor = "วิทยาศาสตร์ทั่วไป";
                  }
                  else if ($user_submajor == 8)
                  {
                    $submajor = "ภาษาไทย";
                  }
                  else if ($user_submajor == 9)
                  {
                    $submajor = "ศิลปศึกษา";
                  }
                  else if ($user_submajor == 10)
                  {
                    $submajor = "ดนตรีศึกษา";
                  }
                  else if ($user_submajor == 11)
                  {
                    $submajor = "พลศึกษา";
                  }
                  else if ($user_submajor == 12)
                  {
                    $submajor = "ฟิสิกส์";
                  }
                  else if ($user_submajor == 13)
                  {
                    $submajor = "เทคโนโลยีสถาปัตยกรรม";
                  }
                  else if ($user_submajor == 14)
                  {
                    $submajor = "เทคโนโลยีการจัดการอุตสาหกรรม";
                  }
                  else if ($user_submajor == 15)
                  {
                    $submajor = "เทคโนโลยีวิศวกรรมโยธา";
                  }
                  else if ($user_submajor == 16)
                  {
                    $submajor = "เทคโนโลยีวิศวกรรมไฟฟ้า";
                  }
                  else if ($user_submajor == 17)
                  {
                    $submajor = "เทคโนโลยีเซรามิกส์และการออกแบบ";
                  }
                  else if ($user_submajor == 18)
                  {
                    $submajor = "เทคโนโลยีวิศวกรรมอิเล็กทรอนิกส์ ";
                  }
                  else if ($user_submajor == 19)
                  {
                    $submajor = "ออกแบบผลิตภัณฑ์อุตสาหกรรม";
                  }
                  else if ($user_submajor == 20)
                  {
                    $submajor = "เกษตรศาสตร์";
                  }
                  else if ($user_submajor == 21)
                  {
                    $submajor = "ประมง";
                  }
                  else if ($user_submajor == 22)
                  {
                    $submajor = "สัตวศาสตร์ ";
                  }
                  else if ($user_submajor == 23)
                  {
                    $submajor = "การพัฒนาสังคม ";
                  }
                  else if ($user_submajor == 24)
                  {
                    $submajor = "ภาษาไทย";
                  }
                  else if ($user_submajor == 25)
                  {
                    $submajor = "บรรณารักษ์ศาสตร์และสารสนเทศศาสตร์ ";
                  }
                  else if ($user_submajor == 26)
                  {
                    $submajor = "ภาษาอังกฤษ ";
                  }
                  else if ($user_submajor == 27)
                  {
                    $submajor = "ภาษาอังกฤษธุรกิจ";
                  }
                  else if ($user_submajor == 28)
                  {
                    $submajor = "ดนตรีสากล";
                  }
                  else if ($user_submajor == 29)
                  {
                    $submajor = "คอมพิวเตอร์ศิลปะและการออกแบบ";
                  }
                  else if ($user_submajor == 30)
                  {
                    $submajor = "รัฐประศาสนศาสตร์";
                  }
                  else if ($user_submajor == 31)
                  {
                    $submajor = "นิติศาสตร์";
                  }
                  else if ($user_submajor == 32)
                  {
                    $submajor = "ภูมิสารสนเทศ";
                  }
                  else if ($user_submajor == 33)
                  {
                    $submajor = "เคมี";
                  }
                  else if ($user_submajor == 34)
                  {
                    $submajor = "วิทยาศาสตร์สิ่งแวดล้อม";
                  }
                  else if ($user_submajor == 35)
                  {
                    $submajor = "สาธารณสุขชุมชน ";
                  }
                  else if ($user_submajor == 36)
                  {
                    $submajor = "สถิติประยุกต์ ";
                  }
                  else if ($user_submajor == 37)
                  {
                    $submajor = "ชีววิทยา";
                  }
                  else if ($user_submajor == 38)
                  {
                    $submajor = "เทคโนโลยีสารสนเทศ";
                  }
                  else if ($user_submajor == 39)
                  {
                    $submajor = "วิทยาการคอมพิวเตอร์ ";
                  }
                  else if ($user_submajor == 40)
                  {
                    $submajor = "คณิตศาสตร์";
                  }
                  else if ($user_submajor == 41)
                  {
                    $submajor = "วิทยาศาสตร์การกีฬา";
                  }
                  else if ($user_submajor == 42)
                  {
                    $submajor = "วิทยาศาสตร์สิ่งทอ";
                  }
                  else if ($user_submajor == 43)
                  {
                    $submajor = "วิทยาศาสตร์การอาหาร ";
                  }
                  else if ($user_submajor == 44)
                  {
                    $submajor = "การบัญชี";
                  }
                  else if ($user_submajor == 45)
                  {
                    $submajor = "การสื่อสารมวลชน";
                  }
                  else if ($user_submajor == 46)
                  {
                    $submajor = "การท่องเที่ยวและการโรงแรม";
                  }
                  else if ($user_submajor == 47)
                  {
                    $submajor = "เศรษฐศาสตร์";
                  }
                  else if ($user_submajor == 48)
                  {
                    $submajor = "การเงินและการธนาคาร ";
                  }
                  else if ($user_submajor == 49)
                  {
                    $submajor = "การจัดการ";
                  }
                  else if ($user_submajor == 50)
                  {
                    $submajor = "การตลาด";
                  }
                  else if ($user_submajor == 51)
                  {
                    $submajor = "การบริหารทรัพยากรมนุษย์";
                  }
                  else if ($user_submajor == 52)
                  {
                    $submajor = "คอมพิวเตอร์ธุรกิจ";
                  }
                  else if ($user_submajor == 53)
                  {
                    $submajor = "พยาบาล";
                  }
                  else if ($user_submajor == 54)
                  {
                    $submajor = "ไม่ระบุ";
                  }
                  else if ($user_submajor == 55)
                  {
                    $submajor = "-";
                  }


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
              ?>
                          <tr class="table">
                            <td><?php echo "$i" ?>   </td>
                            <td><?php  echo "  $user_std_id"  ?></td>
                            <td><?php echo " $user_title $user_name $user_surname  "?>     </td>
                            <td><?php echo  "$submajor" ?> </td>
                            <td> <?php echo  "$major" ?> </td>
                            <td> <?php echo "$user_coop_intership_name" ?></td>
                            <td> </td>
                            
                          </tr>
                          <?php 
                          // echo "<pre>"; print_r($find_file_student); echo "</pre>"; 
                          ?>
                <?php }}?>
                        </tbody>
                      </table>
                    </div>

                    </div>



                    <!-- End 1 Year  -->
                    
                    
                  
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
