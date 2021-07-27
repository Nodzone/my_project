<?php
  include_once '../config/db.php';
  include_once '../modal/adduser.php';
  $user = new Manage_User();
  $find_user_admin = $user->find_user_admin();
  $find_user_emp = $user->find_user_emp();
  $find_user_manager = $user->find_user_manager();
  $find_user_std = $user->find_user_std();
  $find_user_teacher = $user->find_user_teacher();
  //echo "<pre>"; print_r($find_user); echo "</pre>";
  

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

  <title>Admin - Manage - All User</title>

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
          <div class="tabbable" id="tabs-343650">
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link active show" href="#tab1" data-toggle="tab">นักศึกษา</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#tab2" data-toggle="tab">อาจารย์</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#tab3" data-toggle="tab">พนักงานองค์กร</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#tab4" data-toggle="tab">ผู้บริหาร</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#tab5" data-toggle="tab">ผู้ดูแลเว็บไซด์</a>
                    </li>
                  </ul>

                  <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                      <div>
                        <table class="table table-bordered table-sm">
                      
                        <thead>
                          <tr>
                            <th>                  ลำดับ                </th>
                            <th>                  ชื่อ                </th>
                            <th>                   สกุล              </th>
                            <th>                    เบอร์ติดต่อ              </th>
                            <th>                 Username              </th>
                            <th>               Password               </th>
                            <th>                  แก้ไข                </th>                          
                          </tr>
                        </thead>
                        <tbody>
                          
                        <?php $i = 0;
                            if($find_user_std){
                              foreach ($find_user_std as $val){
                                $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                                $user_name = !empty($val['user_name'])? $val['user_name'] : '';
                                $user_surname = !empty($val['user_surname'])? $val['user_surname'] : '';
                                $user_username = !empty($val['user_username'])? $val['user_username'] : '';
                                $user_password = !empty($val['user_password'])? $val['user_password'] : '';
                                $user_phone = !empty($val['user_phone'])? $val['user_phone'] : '';
                                $i = $i+1;
                                
                            ?>
                            <tr class="table-success">
                                  
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $user_name;?></td>
                                  <td><?php echo $user_surname;?></td>
                                  <td><?php echo $user_phone;?></td>
                                  <td><?php echo $user_username;?></td>
                                  <td><?php echo $user_password;?></td>
                                  <td></td>
                            </tr>
                            <?php }}?>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                    <div class="tab-pane" id="tab2">
                      <div>
                          <table class="table table-bordered table-sm">
                        
                          <thead>
                            <tr>
                              <th>                  ลำดับ                </th>
                              <th>                  ชื่อ                </th>
                              <th>                   สกุล              </th>
                              <th>                    เบอร์ติดต่อ              </th>
                              <th>                 Username              </th>
                              <th>               Password               </th>
                              <th>                  แก้ไข                </th>         
                            </tr>
                          </thead>
                          <tbody>
                            
                          <?php $i2 = 0;
                            if($find_user_teacher){
                              foreach ($find_user_teacher as $val){
                                $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                                $user_name = !empty($val['user_name'])? $val['user_name'] : '';
                                $user_surname = !empty($val['user_surname'])? $val['user_surname'] : '';
                                $user_username = !empty($val['user_username'])? $val['user_username'] : '';
                                $user_password = !empty($val['user_password'])? $val['user_password'] : '';
                                $user_phone = !empty($val['user_phone'])? $val['user_phone'] : '';
                                $i2 = $i2+1;
                            ?>
                            <tr class="table-success">
                                  
                                  <td><?php echo $i2;?></td>
                                  <td><?php echo $user_name;?></td>
                                  <td><?php echo $user_surname;?></td>
                                  <td><?php echo $user_phone;?></td>
                                  <td><?php echo $user_username;?></td>
                                  <td><?php echo $user_password;?></td>
                                  <td></td>
                            </tr>
                            <?php }}?>
                          
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="tab-pane" id="tab3">
                      <div>
                          <table class="table table-bordered table-sm">
                        
                          <thead>
                            <tr>
                              <th>                  ลำดับ                </th>
                              <th>                  ชื่อ                </th>
                              <th>                   สกุล              </th>
                              <th>                    เบอร์ติดต่อ              </th>
                              <th>                 Username              </th>
                              <th>               Password               </th>
                              <th>                  แก้ไข                </th>         
                            
                            </tr>
                          </thead>
                          <tbody>
                            
                          <?php $i3 = 0;
                            if($find_user_emp){
                              foreach ($find_user_emp as $val){
                                $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                                $user_name = !empty($val['user_name'])? $val['user_name'] : '';
                                $user_surname = !empty($val['user_surname'])? $val['user_surname'] : '';
                                $user_username = !empty($val['user_username'])? $val['user_username'] : '';
                                $user_password = !empty($val['user_password'])? $val['user_password'] : '';
                                $user_phone = !empty($val['user_phone'])? $val['user_phone'] : '';
                                $i3 = $i3+1;
                            ?>
                            <tr class="table-success">
                                  
                                  <td><?php echo $i3;?></td>
                                  <td><?php echo $user_name;?></td>
                                  <td><?php echo $user_surname;?></td>
                                  <td><?php echo $user_phone;?></td>
                                  <td><?php echo $user_username;?></td>
                                  <td><?php echo $user_password;?></td>
                                  <td></td>
                            </tr>
                            <?php }}?>
                          
                          </tbody>
                        </table>
                      </div>
                    </div>


                    <div class="tab-pane" id="tab4">
                      <div>
                          <table class="table table-bordered table-sm">
                        
                          <thead>
                            <tr>
                              <th>                  ลำดับ                </th>
                              <th>                  ชื่อ                </th>
                              <th>                   สกุล              </th>
                              <th>                    เบอร์ติดต่อ              </th>
                              <th>                 Username              </th>
                              <th>               Password               </th>
                              <th>                  แก้ไข                </th>     
                            </tr>
                          </thead>
                          <tbody>
                            
                          <?php $i4 = 0;
                            if($find_user_manager){
                              foreach ($find_user_manager as $val){
                                $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                                $user_name = !empty($val['user_name'])? $val['user_name'] : '';
                                $user_surname = !empty($val['user_surname'])? $val['user_surname'] : '';
                                $user_username = !empty($val['user_username'])? $val['user_username'] : '';
                                $user_password = !empty($val['user_password'])? $val['user_password'] : '';
                                $user_phone = !empty($val['user_phone'])? $val['user_phone'] : '';
                                $i4 = $i4+1;
                            ?>
                            <tr class="table-success">
                                  
                                  <td><?php echo $i4;?></td>
                                  <td><?php echo $user_name;?></td>
                                  <td><?php echo $user_surname;?></td>
                                  <td><?php echo $user_phone;?></td>
                                  <td><?php echo $user_username;?></td>
                                  <td><?php echo $user_password;?></td>
                                  <td></td>
                            </tr>
                            <?php }}?>
                          
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="tab-pane" id="tab5">
                      <div>
                          <table class="table table-bordered table-sm">
                        
                          <thead>
                            <tr>
                              <th>                  ลำดับ                </th>
                              <th>                  ชื่อ                </th>
                              <th>                   สกุล              </th>
                              <th>                    เบอร์ติดต่อ              </th>
                              <th>                 Username              </th>
                              <th>               Password               </th>
                              <th>                  แก้ไข                </th>     
                            </tr>
                          </thead>
                          <tbody>
                            
                          <?php
                            if($find_user_admin){
                              foreach ($find_user_admin as $val){
                                $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                                $user_name = !empty($val['user_name'])? $val['user_name'] : '';
                                $user_surname = !empty($val['user_surname'])? $val['user_surname'] : '';
                                $user_username = !empty($val['user_username'])? $val['user_username'] : '';
                                $user_password = !empty($val['user_password'])? $val['user_password'] : '';
                                $user_phone = !empty($val['user_phone'])? $val['user_phone'] : '';
                                
                            ?>
                            <tr class="table-success">
                                  
                                  <td><?php echo $i;?></td>
                                  <td><?php echo $user_name;?></td>
                                  <td><?php echo $user_surname;?></td>
                                  <td><?php echo $user_phone;?></td>
                                  <td><?php echo $user_username;?></td>
                                  <td><?php echo $user_password; ?></td>
                                  <td></td>
                            </tr>
                            <?php  }}?>
                          
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>
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
