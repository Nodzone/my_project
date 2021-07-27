<?php
include_once '../config/db.php';
include_once '../modal/select_input.php';
$select = new Select_Doc();
$select_std_emp = $select->select_std_emp();


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

  <title>Employee - Coop</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/emp.css" rel="stylesheet">

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
            <h1 class="h3 mb-0 text-gray-800">หน้าหลัก</h1>
          </div>
          <div>
                <br><br>
                เพิ่มนักศึกษาในการดูแล
                <form role="form" action="../controller/partner_controller.php" method="post">
               
                          <div class="row">
                                <div class="col-2">    
                                <input type="hidden" name="user_type" value="<?$user_type = 3;?>">                
                                  <label>ชื่อนักศึกษา </label>
                                  <select class="form-control" name="user_partner1_fullname"  id="user_partner1_fullname" data-required="กรุณาเลือกคำนำหน้า" style="width:250px;">
                                        <option value="">-- โปรดเลือก --</option>
                                        <?php  if($select_std_emp){
                                    foreach ($select_std_emp as $val){
                                      $STD_ID = !empty($val['STD_ID'])? $val['STD_ID'] : '';
                                      $STD_TITLE = !empty($val['STD_TITLE'])? $val['STD_TITLE'] : '';
                                      $STD_NAME = !empty($val['STD_NAME'])? $val['STD_NAME'] : '';
                                      $STD_SURNAME = !empty($val['STD_SURNAME'])? $val['STD_SURNAME'] : '';
                                      
                                    ?>
                                <option value="<? echo $STD_TITLE.' '.$STD_NAME.''.$STD_SURNAME; ?>" > <? echo $STD_TITLE.' '.$STD_NAME.''.$STD_SURNAME; ?> </option>
                                <?php }} ?>                             
                                      </select>
                                </div>
                            <input type="hidden" name="user_partner1_id" value="<?echo $STD_ID;?>">
                            <input type="hidden" name="user_name" value="<?echo $user_name;?>">
                            <input type="hidden" name="user_surname" value="<?echo $user_surname;?>">
                            <input type="hidden" name="user_id" value="<?echo $user_id;?>">
                          <div class="col-auto">
                              <label for="">สาขาวิชา </label> 
                              <select class="form-control" name="user_partner1_major" id="user_partner1_major" data-required="" style="width:250px;">
                                <option>-- โปรดเลือก --</option>
                                <?php  if($select_std_emp){
                                    foreach ($select_std_emp as $val){
                                      $STD_MAJOR = !empty($val['STD_MAJOR'])? $val['STD_MAJOR'] : '';
                                      $STD_IDMAJOR = !empty($val['STD_IDMAJOR'])? $val['STD_IDMAJOR'] : '';
                                    ?>
                                <option value="<? echo $STD_IDMAJOR;?>" > <? echo $STD_MAJOR; ?> </option>
                                <?php }} ?>                                                                                    
                              </select>
                          </div>
                       
                          </div>
                          <div class="row">
                            
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
