<?php 
 include_once '../config/db.php';
 include_once '../modal/upload_file.php';
$file_income =  $_GET['file'];
$file_edit = new Upload_File();
$check_file_coop = $file_edit->check_file_coop($file_income);
echo "<pre>"; print_r($check_file_coop); echo "</pre>"; 

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
  
    #edit {
    border-collapse: collapse;
    width: 100%;
  }

  #edit div, #edit th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #edit tr:nth-child(even){background-color: #FAFFFD;}

  #edit tr:hover {background-color: #FAFFFD;}

  #edit th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #FA824C;
    color: #FAFFFD;
  }
  input[type=text] {
  border: 2px solid red;
  border-radius: 4px;
    }
    textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  resize: none;
    }
    input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
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
            <form action="" method="post" name="updatefile" >
            <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
            <?php 
              
            ?>
                <tr>
                <td height="40" colspan="2" align="center" bgcolor="#D6D5D6"><b>แก้ไขข้อมูลเอกสาร</b></td>
                </tr>
                <tr>
                <td align="right" bgcolor="#EBEBEB">File ID : </td>
                <td bgcolor="#EBEBEB">

                <p><input type="text" name="file_id" value="<?php echo $file_id; ?>" disabled='disabled' />
                <input type="hidden" name="file_id" value="<?php echo $file_id; ?>" />
                <input type="hidden" name="file_update_by" value="<?php echo $user_id; ?>" />

                
                </td>
                </tr>
                <tr>
                <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                </tr>
                <tr>
                <td width="117" align="right" bgcolor="#EBEBEB">ชื่อเอกสาร :</td>
                <td width="583" bgcolor="#EBEBEB"><input name="file_name" type="text" id="file_name" value="<?=$file_name;?>" size="" placehsolder=""  required="required"  /></td>
                </tr>
                <tr>
                <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                </tr>
                <tr>
                <td width="117" align="right" bgcolor="#EBEBEB">เจ้าของเอกสาร :</td>
                <td width="583" bgcolor="#EBEBEB"><input name="file_create_by" type="text" id="file_create_by" value="<?=$file_create_by;?>" size="" placehsolder=""  required="required"  /></td>
                </tr>
                <tr>
                <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                </tr>
                <tr>
                <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                </tr>
                <tr>
                <td align="right" bgcolor="#EBEBEB">เลือกไฟล์ :</td>
                <td bgcolor="#EBEBEB"><input type="file" name="file_local" id="file_local" required="required"></td>
                </tr>
                <tr>
                <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                </tr>
                <tr>
                <td align="right" bgcolor="#EBEBEB">ประเภทเอกสาร :</td>
                <td bgcolor="#EBEBEB">
                        <select class="form-control" name="file_type" id="file_type"  style="width:450px;">
                            <option value="13">โปรดเลือก</option> 
                            <option value="13">หนังสือขอความอนุเคราะห์</option> 
                            <option value="3">แบบแจ้งรายชื่อนักศึกษาสหกิจศึกษา - BRU_CO3</option>
                        </select>
                </td>        
                </tr>
                <tr>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                </tr>
                <tr>
                <td align="right" bgcolor="#EBEBEB">สถานะเอกสาร :</td>
                <td bgcolor="#EBEBEB"><select class="form-control" name="file_status" id="file_status"  style="width:450px;">
                            <option value="1">ยังไม่ตรวจสอบ</option> 
                            <option value="2">ตรวจสอบแล้ว</option> 
                            <!-- <option value="3">แบบแจ้งรายชื่อนักศึกษาสหกิจศึกษา - BRU_CO3</option> -->
                        </select></td>
                </tr>
                <tr>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                </tr>
                <tr>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                <td bgcolor="#EBEBEB">&nbsp;
                <input type="button" value=" ยกเลิก " onclick="window.location='all_file.php' " /> <!-- ถ้าไม่แก้ไขให้กลับไปหน้าแสดงรายการ -->
                &nbsp;
                <input type="submit" name="Update" id="Update" value="Update" /></td>
                </tr>
                <tr>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                <td bgcolor="#EBEBEB">&nbsp;</td>
                </tr>
              
            </table>
            </form>
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