<?php
  include_once '../config/db.php';
  include_once '../modal/dairy.php';
  $calldairy = new Dairy_Student();
  $find_dairy = $calldairy->find_Dairy();
  // echo "<pre>"; print_r($find_dairy); echo "</pre>";



  $month = date('m');
  $day = date('d');
  $year = date('Y');

  $today = $year . '-' . $month . '-' . $day;
  $user_id = $_SESSION['user']['user_id'];
  
  // $sql = "SELECT * FROM user_diary WHERE user_id = $user_id  ORDER BY user_id DESC ";
	// $result = $db->query($sql,[]);
  // $objResult = $db->fetch_all($result); // data in table

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

  <title>Student - Coop - Diary</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/std-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include "header-std.php" ?>

  
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">จัดการบันทึกกิจกรรมรายวัน</h1> 
            <button class="btn btn-success" data-toggle="modal" data-target="#add_diary_Modal">เพิ่มบันทึก</button>
          </div>
          <div></div>
          
                  
            <div id="employee_table">
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th width="5%">No.<? ?></th>  
                    <th width="20%">ชื่อเรื่อง</th>
                    <th width="20%">เนื้อหางาน</th>  
                    <th width="10%">วันที่ปฏิบัติ</th>
                    <th width="10%">หมายเหตุ</th>  
                    <th width="10%">View</th>
                    <th width="5%">ตรวจสอบ</th>
                   
                  </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                foreach($find_dairy as $row)
                {
                  $i = $i + 1;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row["dairy_name"]; ?></td>
                  <td><?php echo $row["dairy_detail"]; ?></td>
                  <td><?php echo $row["dairy_date"]; ?></td>
                  <td><?php echo $row["diary_more"]; ?></td>
                  <? if ($row["diary_status"]==1){$row_status = '<font color="red">' . "ยังไม่ได้ตรวจสอบ". '</font>';} elseif ($row["diary_status"]==2){$row_status = '<font color="green">' ."ตรวจแล้ว". '</font>';} ?>
                  <td>
                    <button onclick="select_view(<?php echo $row['diary_id']; ?>)" class="btn btn-info btn-xs view_data">View</button>
                  </td>
                  <td><?php echo $row_status; ?></td>
                  <!-- <td><?php echo $row['user_id']; ?></td> -->
                </tr>
                
                <?php 
                }
                ?>
                </tbody>
              </table>
          </div>
          <font color="red">*** หมายเหตุ  1 คือ ยังไม่ได้ตรวจสอบจากพี่เลี้ยง (Superviser) </font>  <br>
          <font color="green">***  2 คือ ตรวจสอบแล้ว </font> 
        </div>
        <!-- /.container-fluid -->
        
      </div>
      <!-- Modal Add Diary -->
      <div id="add_diary_Modal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">เพิ่มบันทึกงานประจำวัน</h4>
            </div>
            <div class="modal-body">
              <form method="post" id="insert_form">
              
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id ?>">
                <label>ชื่อเรื่อง</label>
                <input type="text" name="dairy_name" id="dairy_name" class="form-control" />
                <br />
                <label>เนื้อหางาน</label>
                <textarea name="dairy_detail" id="dairy_detail" class="form-control"></textarea>
                <br />
                <label>วันที่ปฏิบัติ</label>
                <input type="date" value="<?php echo $today; ?>" class="form-control" id="dairy_date" name="dairy_date">
                <br />  
                <label>หมายเหตุ</label>
                <input type="text" name="diary_more" id="diary_more" class="form-control" />
                <br />  
                <input type="hidden" id="diary_status" name="diary_status" value="1">
                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">รายละเอียดบันทึก</h4>
          </div>
          <div class="modal-body" id="employee_detail">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </div>
        </div>
      </div>



      <?php include "footer-std.php"?>
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
  <?php include "logout_std.php" ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/script.js"></script>
  
  <script>
    insser_doc();
  </script>

</body>

</html>
