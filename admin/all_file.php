<?php
  include_once '../config/db.php';
  include_once '../modal/upload_file.php';

  $news = new Upload_File();
  $find_file = $news->find_file();

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

  <title>Admin File - Update</title>

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
    #file {
    border-collapse: collapse;
    width: 100%;
  }

  #file td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #file tr:nth-child(even){background-color: #FAFFFD;}

  #file tr:hover {background-color: #FAFFFD;}

  #file th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #FA824C;
    color: #FAFFFD;
  }
  </style> 
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
  <?php include "header-admin.php" ?>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-4 text-gray-800">ไฟล์ทั้งหมด ในตอนนี้</h1>
        </div>      
        <!-- Table Update News -->
            <div class="tab-pane active" id="tab1">
              <div>
                  <table id="file">
                  <thead>
                    <tr>
                      <th>                  No.                </th>
                      <th>                  ชื่อไฟล์               </th>
                      <th>                  รูปแบบไฟล์                </th>
                      <th>                  วันที่อัพเดท                </th>
                      <th>                  สถานะ               </th>
                      <th>                  ดู                </th>
                      <th>                  แก้ไข               </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($find_file){
                      foreach ($find_file as $val){
                        $file_id = !empty($val['file_id'])? $val['file_id'] : '';
                        $file_name = !empty($val['file_name'])? $val['file_name'] : '';
                        $user_id = !empty($val['user_id'])? $val['user_id'] : '';
                        $file_type = !empty($val['file_type'])? $val['file_type'] : '';
                        $file_local = !empty($val['file_local'])? '../files/' . $val['file_local'] : '';
                        $file_status = !empty($val['file_status'])? $val['file_status'] : '';
                        $file_update_date = !empty($val['file_update_date'])? $val['file_update_date'] : '';                        
                    ?>
                    <tr>         
                          <td><?php echo $file_id;?></td>
                          <td><?php echo $file_name;?></td>
                          <td><?php echo $file_type;?></td>                     
                          <td><?php echo $file_update_date;?></td>
                          <td><?php  if ($file_status == 1)
                                            {$row_status = '<font color="red">' . "ยังไม่ได้ตรวจสอบ". '</font>';} else if 
                                            ($file_status == 2){$row_status = '<font color="green">' ."ตรวจแล้ว". '</font>';} echo $row_status; ?></td>      
                          <td><button onclick="window.open('<?php echo $file_local;?>', '_blank')" class="btn btn-info btn-xs view_data">View</button></td> 
                          <td><button class="btn btn-warning" onclick="window.open('edit_file.php?file=<?php echo $file_id; ?>');">Edit</button></td>               
                    </tr>
                    <?php }}?>
                  </tbody>
                </table>
              </div>           
        </div>    
      </div>
      <!-- End of Main Content -->
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
