<?php
include_once '../config/db.php';

include_once '../modal/select_input.php';

$s_data = new Select_Doc();
$find_partner_infor = $s_data->find_partner_infor();

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

  <title>Employee - BRU_CO14</title>

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
          <h1 class="h3 mb-4 text-gray-800">แบบประเมินรายงานนักศึกษาสหกิจศึกษา</h1>
            <div>
                <form name="bru_co14" action="../FPDF/bru_co14.php"  method="post" >
                <input type="hidden" value="<?php echo date('Y-n-d H:i:s'); ?>" name="date" id="date">

                        <div class="form-group">
                        <u><b>คำชี้แจง</b></u>  <br> 1.	ผู้ให้ข้อมูลในแบบประเมินนี้ต้องเป็นพนักงานที่ปรึกษา (Job Supervisor) ของนักศึกษาสหกิจศึกษาหรือบุคคลที่ได้รับมอบหมายให้ทำหน้าที่แทน
                                          <br>  2.	แบบประเมินผลนี้มีทั้งหมด 18 ข้อ โปรดให้ข้อมูลครบทุกข้อเพื่อความสมบูรณ์ของการประเมินผล
                                          <br>  3.	โปรดให้คะแนนในช่อง 􀀘 ในแต่ละหัวข้อการประเมิน หากไม่มีข้อมูลให้ใส่เครื่องหมาย  -  และโปรดให้ความคิดเห็นเพิ่มเติม (ถ้ามี)
                                          <br>  4.	เมื่อประเมินผลเรียบร้อยแล้ว โปรดนำเอกสารนี้ใส่ซองประทับตรา “ลับ” และให้นักศึกษานำส่ง
                                          <br>  งานสหกิจศึกษาคณะทันทีที่นักศึกษากลับมหาวิทยาลัย
                        </div>
                        <?php if ($find_partner_infor) {
    foreach ($find_partner_infor as $val) {
        $TITLE_S = !empty($val['TITLE_S']) ? $val['TITLE_S'] : '';
        $NAME_S = !empty($val['NAME_S']) ? $val['NAME_S'] : '';
        $LASTNAME_S = !empty($val['LASTNAME_S']) ? $val['LASTNAME_S'] : '';
        $ID_STD = !empty($val['ID_STD']) ? $val['ID_STD'] : '';
        $FACULTY_S = !empty($val['FACULTY_S']) ? $val['FACULTY_S'] : '';
        $MAJOR_S = !empty($val['MAJOR_S']) ? $val['MAJOR_S'] : '';
        $INTERSHIP_S = !empty($val['INTERSHIP_S']) ? $val['INTERSHIP_S'] : '';
        $STD_PASTNER = !empty($val['STD_PASTNER']) ? $val['STD_PASTNER'] : '';
    }
}
                        ?>
                        <!-- NomalInfor -->
                        <div class="row">
                            <div class="col-auto">
                                <label for=""><b>ข้อมูลทั่วไป / Work Term Information</b></label>
                            </div>
                            <div class="col-auto">    
                                <div class="form-group">
                                    <label> ชื่อ – นามสกุลนักศึกษา : </label>
                                    <input type="text" name="std_fullname" id="std_fullname" value="<?php echo $TITLE_S.''.$NAME_S.''.$LASTNAME_S; ?>" placeholder="" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">รหัสประจำตัว</label>                                  
                                    <input type="text" name="std_id" id="std_id" placeholder="" value="<?php echo $ID_STD; ?>" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">หลักสูตร : </label>                                  
                                    <select class="" name="fatory" id="fatory"  style="width:200px;" required>
                                        <option>-- โปรดเลือก --</option>
                                        <option value="ครุศาสตรบัณฑิต">ครุศาสตรบัณฑิต (ค.บ.5 ปี)</option>
                                        <option value="วิทยาศาสตรบัณฑิต">วิทยาศาสตรบัณฑิต (วท.บ.4 ปี)</option>
                                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศศ.บ.4 ปี)</option>   
                                        <option value="รัฐประศาสนศาสตรบัณฑิต">รัฐประศาสนศาสตรบัณฑิต (รป.บ.4 ปี)</option>   
                                        <option value="ศิลปศาสตรบัณฑิต">ศิลปศาสตรบัณฑิต (ศป.บ.4 ปี)</option>
                                        <option value="นิติศาสตรบัณฑิต">นิติศาสตรบัณฑิต (น.บ. 4 ปี)</option>   
                                        <option value="บัญชีบัณฑิต">บัญชีบัณฑิต (บช.บ.4 ปี)</option>   
                                        <option value="นิเทศศาสตรบัณฑิต">นิเทศศาสตรบัณฑิต	(นศ.บ. 4 ปี)</option>   
                                        <option value="เศรษฐศาสตรบัณฑิต">เศรษฐศาสตรบัณฑิต (ศ.บ. 4 ปี)</option>   
                                        <option value="บริหารธุรกิจบัณฑิต">บริหารธุรกิจบัณฑิต	(บธ.บ. 4 ปี)</option>   
                                        <option value="10">ไม่ระบุ</option> 
                                        </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">คณะ : </label>                                  
                                    <input type="text" name="major" id="major" placeholder="" value="<?echo $FACULTY_S; ?>" required></input>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-auto">    
                                <div class="form-group">
                                    <label> ชื่อสถานประกอบการ : </label>
                                    <input type="text" name="company_name" id="company_name" value="<?echo $INTERSHIP_S; ?>" placeholder="" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">ชื่อ – นามสกุลผู้ประเมิน :</label>                                  
                                    <input type="text" name="emp_name" id="emp_name" placeholder="" value="<?echo $user_title.''.$user_name.''.$user_surname; ?>" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">ตำแหน่ง : </label>                                  
                                    <input type="text" name="emp_position" id="emp_position" placeholder="" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">แผนก : </label>                                  
                                    <input type="text" name="emp_group" id="emp_group" placeholder="" required></input>
                                </div>
                            </div>
                        </div>   
                        <!-- ReportTitle -->
                        <div class="row">
                            <div class="col-auto"> <b> <i>หัวข้อรายงาน /Report title</i></b> </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                
                                <div class="form-group">              
                                <label for=""><b>ภาษาไทย/Thai :</b></label>                      
                                    <input type="text" name="thai_title" id="thai_title" placeholder="" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for=""><b>ภาษาอังกฤษ/English :</b></label>
                                    <input type="text" name="eng_title" id="eng_title" placeholder="" required></input>
                                </div>
                            </div>
                        </div>    

                        <!-- CommentPart1 -->
                        <div class="row">
                            <div class="col-auto"> <b> <i>ความรู้ความสามารถ / Knowledge and Ability</i></b> </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">1.  วิธีการศึกษา (Method of Education)</label>
                                    <input type="number"  min="1" max="10" name="p1" id="p1" placeholder="" required> / 10 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm1" id="cm1" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">2.  กิตติกรรมประกาศ (Acknowledgement)</label>
                                    <input type="number"  min="1" max="5" name="p2" id="p2" placeholder="" required> / 5 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm2" id="cm2" placeholder=""> </input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">3.  บทคัดย่อ (Abstract)</label>
                                    <input type="number"  min="1" max="10" name="p3" id="p3" placeholder="" required> / 10 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm3" id="cm3" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">4.  สารบัญ สารบัญรูป และสารบัญตาราง (Table of Contents)</label>
                                    <input type="number"  min="1" max="5" name="p4" id="p4" placeholder="" required> / 5 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm4" id="cm4" placeholder=""> </input>
                                </div>
                            </div>

                        </div>    
                        
                        <!-- CommentPart2 -->
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">5. วัตถุประสงค์ (Objectives)</label>
                                    <input type="number"  min="1" max="5" name="p5" id="p5" placeholder="" required> / 5 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm5" id="cm5" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">6.  ผลการศึกษา (Result)</label>
                                    <input type="number"  min="1" max="10" name="p6" id="p6" placeholder="" required> / 10 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm6" id="cm6" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">7.  วิเคราะห์ผลการศึกษา (Analysis)</label>
                                    <input type="number"  min="1" max="10" name="p7" id="p7" placeholder="" required> / 10 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm7" id="cm7" placeholder=""> </input>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">8.  สรุปผลการศึกษา (Conclusion)</label>
                                    <input type="number"  min="1" max="10" name="p8" id="p8" placeholder="" required> / 10 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm8" id="cm8" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">9.  ข้อเสนอแนะ (Comment)</label>
                                    <input type="number"  min="1" max="5" name="p9" id="p9" placeholder="" required> / 5 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm9" id="cm9" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">10.  สำนวนการเขียน และการสื่อความหมาย (Idiom and Meaning)</label>
                                    <input type="number"  min="1" max="10" name="p10" id="p10" placeholder="" required> / 10 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm10" id="cm10" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">11.  ความถูกต้องตัวสะกด (Spelling)</label>
                                    <input type="number"  min="1" max="5" name="p11" id="p11" placeholder="" required> / 5 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm11" id="cm11" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">12.  รูปแบบ และความสวยงาม ของรูปเล่ม (Pattern)</label>
                                    <input type="number"  min="1" max="5" name="p12" id="p12" placeholder="" required> / 5 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm12" id="cm12" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">13. เอกสารอ้างอิง (References)</label>
                                    <input type="number"  min="1" max="5" name="p13" id="p13" placeholder="" required> / 5 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm13" id="cm13" placeholder=""> </input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">14. ภาคผนวก (Appendix)</label>
                                    <input type="number"  min="1" max="5" name="p14" id="p14" placeholder="" required> / 5 คะแนน</input>
                                    <label> ความเห็นเพิ่มเติม : </label>
                                    <input type="text" name="cm14" id="cm14" placeholder=""> </input>
                                </div>
                            </div>
                        
                        </div>    
                        <br>
                       
                        
                        <!-- Lisence -->
                        <div class="row">
                            <div class="col-auto"> 
                            <label>ข้อคิดเห็นเพิ่มเติม /Other comments : </label>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    
                                    <textarea rows="5" cols="100" name="cm_more" id="cm_more"></textarea>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ลงชื่อ : </label>
                                    <input type="text" name="cm_name" id="cm_name" value="<?php echo $user_title.' '.$user_name.' '.$user_surname; ?>"  required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ตำแหน่ง/Position : </label>
                                    <input type="text" name="cm_position" id="cm_position" required></input>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <font color="red"> ** หมายเหตุ จำเป็นต้องกรอกข้อมูลให้ครบทุกช่อง <br> </font>
                                <font color="blue">  *** หมายเหตุ หากไม่ประสงค์จะกรอกกรุณากรอกเว้นวรรค (Spac Bar) " " หรือ "-" แทน </font> 
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
