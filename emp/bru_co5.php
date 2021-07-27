<?php
include_once '../config/db.php';
include_once '../modal/select_input.php';
$select = new Select_Doc();
$find_major = $select->find_major();
$find_company = $select->find_company();

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

  <title>Employee - BRU_CO5</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template-->
  <link href="css/emp.css" rel="stylesheet">

</head>

<body class="color">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include 'header-emp.php'; ?>
        
        <div class="container-fluid">
        <script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
    </script>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">แบบยืนยันการตอบรับนักศึกษาสหกิจศึกษา</h1>
            <div>
                <form name="bru_co5" action="../FPDF/bru_co5.php"  method="post" >
                        
                        <div class="form-group">
                        <u><b>คำชี้แจง</b></u>   กรุณากรอกข้อมูลเพื่อยืนยันความประสงค์รับนักศึกษาสหกิจศึกษาที่ได้รับการพิจารณาจาก <br>
                                    งานสหกิจศึกษามหาวิทยาลัยราชบุรีรัมย์

                        </div>
                        <input type="hidden" name="date" id="date" value="<?php echo date('Y-n-d H:i:s'); ?>">
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ชื่อสถานปฏิบัติงาน : </label>
                                    <?php if ($find_company) {
    foreach ($find_company as $val) {
        $C_NAME = !empty($val['C_NAME']) ? $val['C_NAME'] : '';
        $user_company_phone = !empty($val['user_company_phone']) ? $val['user_company_phone'] : '';
        $user_company_fax = !empty($val['user_company_fax']) ? $val['user_company_fax'] : ''; ?>
                                    <input type="text" name="company_name" id="company_name" placeholder="เช่น บริษัท รุ่งฤดึ ทวีหนี้ จำกัด" style="width:350px;" value="<?php echo $C_NAME; ?>"  required></input>                                        <?php
    }
}?>
                                    <!-- <select class="" name="company_name" id="company_name"  style="width:200px;" required>
                                        <option value="">-- โปรดเลือก --</option>
                                       
                                        <option value="<?php echo $C_NAME; ?>"><?php echo $C_NAME; ?> </option>
 -->
                                       
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ชื่อผู้ประสานงาน : </label>
                                    <input type="text" name="emp_name" id="emp_name" placeholder="เช่น นาย สมหมาน ชาญชัย" value="<?echo $user_title.''.$user_name.' '.$user_surname; ?>" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ตำแหน่ง : </label>
                                    <input type="text" name="emp_position" id="emp_position" required></input>
                                </div>
                            </div>
                        
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> โทรศัพท์ : </label>
                                    <input type="text" name="emp_phone" id="emp_phone" maxlength="10" OnKeyPress="return chkNumber(this)" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> โทรสาร : </label>
                                    <input type="text" name="emp_fax" id="emp_fax" maxlength="9" OnKeyPress="return chkNumber(this)"></input>
                                </div>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>1. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_01" id="std_01" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    
                                    <select class="" name="std_submajor_01" id="std_submajor_01"  style="width:200px;" required>
                                    <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std01" id="more_std01"></input>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>2. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_02" id="std_02"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    
                                    <select class="" name="std_submajor_02" id="std_submajor_02"  style="width:200px;" >
                                    <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std02" id="more_std02"></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>3. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_03" id="std_03"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    <!-- <input type="text" name="std_submajor_03" id="std_submajor_03"></input> -->
                                    <select class="" name="std_submajor_03" id="std_submajor_03"  style="width:200px;" >
                                    <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                    
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std03" id="more_std03"></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>4. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_04" id="std_04"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    <!-- <input type="text" name="std_submajor_04" id="std_submajor_04"></input> -->
                                    <select class="" name="std_submajor_04" id="std_submajor_04"  style="width:200px;" >
                                    <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std04" id="more_std04"></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>5. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_05" id="std_05"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    <select class="" name="std_submajor_05" id="std_submajor_05"  style="width:200px;" >
                                        <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std05" id="more_std05"></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>6. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_06" id="std_06"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    
                                    <select class="" name="std_submajor_06" id="std_submajor_06"  style="width:200px;" >
                                    <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std06" id="more_std06"></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>7. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_07" id="std_07"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    
                                        <select class="" name="std_submajor_07" id="std_submajor_07"  style="width:200px;" >
                                        <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std07" id="more_std07"></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>8. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_08" id="std_08"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    <!-- <input type="text" name="std_submajor_08" id="std_submajor_08"></input> -->
                                    <select class="" name="std_submajor_08" id="std_submajor_08"  style="width:200px;" >
                                    <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std08" id="more_std08"></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>9. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_09" id="std_09"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    <!-- <input type="text" name="std_submajor_09" id="std_submajor_09"></input> -->
                                    <select class="" name="std_submajor_09" id="std_submajor_09"  style="width:200px;" >
                                    <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std09" id="more_std09"></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>10. ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_10" id="std_10"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สาขาวิชา : </label>
                                    <!-- <input type="text" name="std_submajor_10" id="std_submajor_10"></input> -->
                                    <select class="" name="std_submajor_10" id="std_submajor_10"  style="width:200px;" >
                                    <option value="">-- โปรดเลือก --</option>
                                        <?php if ($find_major) {
    foreach ($find_major as $val) {
        $major_id = !empty($val['major_id']) ? $val['major_id'] : '';
        $major_name = !empty($val['major_name']) ? $val['major_name'] : ''; ?>
                                        <option value="<?php echo $major_name; ?>"><?php echo $major_name; ?> </option>
                                        <?php
    }
}?>
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> หมายเหตุ : </label>
                                    <input type="text" name="more_std10" id="more_std10"></input>
                                </div>
                            </div>
                        </div>
                        
                     
                    

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="obj1" id="obj1" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                            รับนักศึกษาสหกิจศึกษาทั้งหมดตามที่งานสหกิจศึกษามหาวิทยาลัยราชบุรีรัมย์ เสนอมา
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="obj1" id="obj1" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                            มีความต้องการอื่นๆเพิ่มเติม (โปรดระบุ) :
                            </label>
                            <input type="text" name="tellmore" id="tellmore" placeholder="หากเลือกกรุณากรอก"></input>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="obj1" id="obj1" value="3">
                            <label class="form-check-label" for="exampleRadios3">
                            ให้งานสหกิจศึกษาติดต่อกลับทางโทรศัพท์หมายเลข :
                            </label>
                            <input type="text" name="phonemore" id="phonemore" value="" placeholder="หากเลือกกรุณากรอก" ></input>
                        </div>

                       
                        
                        <div class="row">
                            <div class="col-auto">
                                <font color="red"> ** หมายเหตุ จำเป็นต้องกรอกข้อมูลให้ครบทุกช่อง <br> </font>
                                <font color="blue">  *** หมายเหตุ หากไม่ประสงค์จะกรอกกรุณากรอกเว้นวรรค (Spac Bar)  " " แทน </font> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                            <button class="btn btn-success" name="submit" type="submit" id="submit">สร้างเอกสาร</button>
                            </div>
                        </div>

                        
                        
                </form>
            </div>
        </div>
      </div>
      <?php include 'footer.php'; ?>
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include 'logout.php'; ?> 
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/emp.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>
