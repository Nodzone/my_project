<?php
include_once '../config/db.php';
include_once '../modal/select_input.php';

$s_data = new Select_Doc();
$select_co9 = $s_data->select_co9();

$month = date('m');
$day = date('d');
$year = date('Y');
$today = $day.'-'.$month.'-'.$year;

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

  <title>Employee - BRU_CO9</title>

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

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">แบบแจ้งรายละเอียดงาน ตำแหน่ง พนักงานที่ปรึกษา</h1>
            <div>
                <form name="bru_co9" action="../FPDF/bru_co9.php"  method="post" >
                        <div class="form-group">
                        <u><b>คำชี้แจง</b></u>   เพื่อให้การประสานงานระหว่างโครงการสหกิจศึกษาและสถานปฏิบัติงานเป็นไปโดยความเรียบร้อย <br>
                         และมีประสิทธิภาพจึงใคร่ของความกรุณาผู้จัดการฝ่ายบุคคลหรือผู้ที่รับผิดชอบดูแลการปฏิบัติงานของนักศึกษา <br>
                          สหกิจศึกษาได้โปรดประสานงานกับพนักงานที่ปรึกษา (Job Supervisor) เพื่อจัดทำข้อมูลตำแหน่งงานลักษณะงาน <br> 
                          และพนักงานที่ปรึกษา (Job Position, Job Description and Job Supervisor) ตามแบบฟอร์มฉบับนี้และ <br> <br>

                         <center> <b><font size="5">ขอได้โปรดส่งกลับคืนให้โครงการสหกิจศึกษามหาวิทยาลัยราชภัฏบุรีรัมย์</font> </b> </center>


                        </div>
                        <?php if ($select_co9) {
    foreach ($select_co9 as $val) {
        $COMPANY = !empty($val['COMPANY']) ? $val['COMPANY'] : '';
        $ADDRESS = !empty($val['ADDRESS']) ? $val['ADDRESS'] : '';
        $C_PHONE = !empty($val['C_PHONE']) ? $val['C_PHONE'] : '';
        $C_FAX = !empty($val['C_FAX']) ? $val['C_FAX'] : '';
    }
} ?>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> เรียนคณบดีคณะ : </label>
                                    <!-- <input type="text" name="major_name" id="major_name" value="" placeholder="" required></input> -->
                                    <select class="form-control" name="major_name" style="width:200px;">
                                        <option value="">-- โปรดเลือก --</option>
                                        <option value="คณะครุศาสตร์">คณะครุศาสตร์</option>
                                        <option value="คณะเทคโนโลยีอุตสาหกรรม">คณะเทคโนโลยีอุตสาหกรรม</option>
                                        <option value="คณะเทคโนโลยีการเกษตร">คณะเทคโนโลยีการเกษตร</option>
                                        <option value="คณะมนุษยศาสตร์และสังคมศาสตร์">คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                                        <option value="คณะวิทยาศาสตร์">คณะวิทยาศาสตร์</option>
                                        <option value="คณะวิทยาการจัดการ">คณะวิทยาการจัดการ</option>
                                        <option value="คณะพยาบาลศาสตร์">คณะพยาบาลศาสตร์</option>
                                        <option value="บัณฑิตวิทยาลัย">บัณฑิตวิทยาลัย</option>
                                    </select>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">ชื่อที่อยู่ของสถานปฏิบัติงาน</label>
                                    <label> สถานปฏิบัติงาน (ภาษาไทย): </label>
                                    <input type="text" name="companyname_thai" id="companyname_thai" value="<?php echo $COMPANY; ?>" style="width:350px;" placeholder="" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> สถานปฏิบัติงาน (ภาษาอังกฤษ) : </label>
                                    <input type="text" name="companyname_eng" id="companyname_eng"></input>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> เลขที่ :  </label>
                                    <input type="text" name="num" id="num" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ถนน : </label>
                                    <input type="text" name="road" id="road" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ซอย :  </label>
                                    <input type="text" name="soi" id="soi"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ตำบล/แขวง : </label>
                                    <input type="text" name="subdistrict" id="subdistrict" required></input>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> อำเภอ/เขต :  </label>
                                    <input type="text" name="district" id="district" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> จังหวัด : </label>
                                    <input type="text" name="province" id="province" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> รหัสไปรษณีย์ : </label>
                                    <input type="text" name="postcard" id="postcard" maxlength="5" OnKeyPress="return chkNumber(this)" required></input>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-auto">
                                <label for="">โทรศัพท์ :  </label>
                                <input type="text" name="phone" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?php echo $C_PHONE; ?>" id="phone" required></input>
                            </div>
                            <div class="col-auto">
                                <label for="">โทรสารหน่วยงาน : </label>
                                <input type="text" name="fax" maxlength="9" OnKeyPress="return chkNumber(this)" value="<?php echo $C_FAX; ?>" id="fax"></input>
                            </div>
                        </div>
                            <br>
                        <div class="row">
                         <b>ผู้จัดการทั่วไป / ผู้จัดการโรงงาน และผู้ได้รับมอบหมายให้ประสานงาน</b>
                         <br>
                        </div>    
                        <br>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>ชื่อผู้จัดการสถานปฏิบัติงาน : </label>
                                    <input type="text" name="mng_name" id="mng_name" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ตำแหน่ง : </label>
                                    <input type="text" name="mng_position" id="mng_position" required></input>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> โทรศัพท์ : </label>
                                    <input type="text" name="mng_phone" maxlength="10" OnKeyPress="return chkNumber(this)" id="mng_phone" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> โทรสาร : </label>
                                    <input type="text" name="mng_fax" maxlength="9" OnKeyPress="return chkNumber(this)" id="mng_fax"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> E-mail : </label>
                                    <input type="text" name="mng_mail" id="mng_mail"></input>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-auto">
                                    <label> การติดต่อประสานงานกับมหาวิทยาลัย (การนิเทศงานนักศึกษาและอื่นๆ) ขอมอบให้ : </label>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="obj1" id="obj1" value="1" required>
                                        <label class="form-check-label" for="inlineRadio1">ติดต่อกับผู้จัดการโดยตรง</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="obj1" id="obj1" value="2">
                                        <label class="form-check-label" for="inlineRadio2">มอบหมายให้บุคคลต่อไปนี้ประสานงานแทน</label>
                                        </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>ชื่อ – นามสกุล : </label>
                                    <input type="text" name="ct_name" id="ct_name"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ตำแหน่ง : </label>
                                    <input type="text" name="ct_position" id="ct_position"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> แผนก : </label>
                                    <input type="text" name="ct_group" id="ct_group"></input>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> โทรศัพท์ : </label>
                                    <input type="text" name="ct_phone"  OnKeyPress="return chkNumber(this)" maxlength="10" id="ct_phone"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> โทรสาร : </label>
                                    <input type="text" name="ct_fax"  OnKeyPress="return chkNumber(this)" maxlength="9" id="ct_fax"></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> E-mail : </label>
                                    <input type="text" name="ct_mail" id="ct_mail"></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <font color="red"> ** หมายเหตุ จำเป็นต้องกรอกข้อมูลให้ครบทุกช่อง <br> </font>
                                <font color="blue">  *** หมายเหตุ หากไม่ประสงค์จะกรอกกรุณากรอกเว้นวรรค (Spac Bar) " " หรือ "-" แทน </font> 
                            </div>
                        </div> <br> 

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

  <script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
    </script>
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
