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
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active show" href="#tab1" data-toggle="tab">ประจำปี 2561</a>
                    </li>
                   
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                      <div>
                        <table class="table table-bordered table-sm">
                      
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
                    $STD_USERID = !empty($val['STD_USERID'])? $val['STD_USERID'] : '';
                    $STD_TITLE = !empty($val['STD_TITLE'])? $val['STD_TITLE'] : '';
                    $STD_NAME = !empty($val['STD_NAME'])? $val['STD_NAME'] : '';
                    $STD_SURNAME = !empty($val['STD_SURNAME'])? $val['STD_SURNAME'] : '';
                    $STD_MAJOR = !empty($val['STD_MAJOR'])? $val['STD_MAJOR'] : '';
                    $STD_FACULTY = !empty($val['STD_FACULTY'])? $val['STD_FACULTY'] : '';
                    $STD_COMPANY = !empty($val['STD_COMPANY'])? $val['STD_COMPANY'] : ''; 
                    $STD_ID = !empty($val['STD_ID'])? $val['STD_ID'] : '';
                    
                    $i = 0;
                    $i++;
                ?>
              
                          <tr class="table">
                            <td><?php echo $i; ?>   </td>
                            <td><?php  echo $STD_ID;  ?></td>
                            <td><?php echo " $STD_TITLE $STD_NAME $STD_SURNAME  "?>     </td>
                            <td><?php echo  $STD_MAJOR; ?> </td>
                            <td> <?php echo  $STD_FACULTY; ?> </td>
                            <td> <?php echo $STD_COMPANY; ?></td>
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
