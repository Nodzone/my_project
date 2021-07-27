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

  <title>Employee - BRU_CO13</title>

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
          <h1 class="h3 mb-4 text-gray-800" id="page-top">แบบประเมินผลนักศึกษาสหกิจศึกษา</h1>
            <div>
                <form name="bru_co13" action="../FPDF/bru_co13.php"  method="post" >
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
                                    <select class="" name="std_fullname" id="std_fullname"  style="width:200px;" required>
                                        <option value="">-- โปรดเลือก --</option>
                                        <option value="<?echo $TITLE_S.''.$NAME_S.''.$LASTNAME_S; ?>"><?echo $TITLE_S.''.$NAME_S.''.$LASTNAME_S; ?></option>
                                    </select>    
                                    <!-- <input type="text" name="std_fullname" id="std_fullname" placeholder="" value=""  required></input> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">รหัสประจำตัว</label>                                  
                                    <input type="text" name="std_id" id="std_id" placeholder="" value="<?echo $ID_STD; ?>" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for=""> หลักสูตร : </label>                                   
                                        <select class="" name="fatory" id="fatory"  style="width:200px;" required>
                                        <option value="">-- โปรดเลือก --</option>
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
                                    <input type="text" name="company_name" id="company_name" placeholder=""  value="<?echo $INTERSHIP_S; ?>" required></input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">ชื่อ – นามสกุลผู้ประเมิน :</label>                                  
                                    <input type="text" name="emp_name" id="emp_name" placeholder="" value="<?echo $user_title.' '.$user_name.' '.$user_surname; ?>" required></input>
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
                        <!-- CommentPart1 -->
                        <div class="row">
                            <div class="col-auto"> <h2><b> <i>ผลสำเร็จของงาน / Work Achievement</i></b></h2> </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for=""><b>1. ปริมาณงาน (Quantity of Work)</b></label>
                                <div class="form-group">
                                    <label> ปริมาณงานที่ปฏิบัติสำเร็จตามหน้าที่ หรือตามที่ได้รับมอบหมายภายในระยะเวลา ที่กำหนด (ในระดับที่นักศึกษาจะปฏิบัติได้) และเทียบกับนักศึกษาทั่วๆ ไป : </label>
                                    <input  name="p1" id="p1" placeholder="" type="number"  min="1" max="20" required> / 20 คะแนน</input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for=""><b>2. คุณภาพงาน (Quality of Work)</b></label>
                                    <label> ทำงานได้ถูกต้องครบถ้วนสมบูรณ์ มีความประณีตเรียบร้อย มีความรอบคอบ    ไม่เกิดปัญหาติดตามมา งานไม่ค้างคา ทำงานเสร็จทันเวลาหรือก่อนเวลาที่กำหนด </label>
                                    <input type="number"  min="1" max="20" name="p2" id="p2" placeholder="" required> / 20 คะแนน</input>
                                </div>
                            </div>
                        </div>    

                        <!-- CommentPart2 -->
                        <div class="row">
                            <div class="col-auto"> <h2><b> <i>ความรู้ความสามารถ / Knowledge and Ability</i></b> </h2></div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">3.  ความรู้ความสามารถทางวิชาการ (Academic Ability)</label>
                                    <label> นักศึกษามีความรู้ทางวิชาการเพียงพอ ที่จะทำงานตามที่ได้รับมอบหมาย (ในระดับที่นักศึกษาจะปฏิบัติได้) : </label>
                                    <input type="number"  min="1" max="10" name="p3" id="p3" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">4.	ความสามารถในการเรียนรู้และประยุกต์วิชาการ (Ability to Learn and  Apply  Knowledge)</label>
                                    <label> ความรวดเร็วในการเรียนรู้ เข้าใจข้อมูล ข่าวสาร และวิธีการทำงานตลอดจนการนำความรู้ไปประยุกต์ใช้งาน: </label>
                                    <input type="number"  min="1" max="10" name="p4" id="p4" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">5.  ความรู้ความชำนาญด้านปฏิบัติการ (Practical Aability)</label>
                                    <label> เช่น การปฏิบัติงานในภาคสนาม ในห้องปฏิบัติการ : </label>
                                    <input type="number"  min="1" max="10" name="p5" id="p5" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">6.  วิจารณญาณและการตัดสินใจ (Judgment and Decision Making)</label>
                                    <label> ตัดสินใจได้ดี ถูกต้อง รวดเร็ว มีการวิเคราะห์ ข้อมูลและปัญหาต่าง ๆ อย่างรอบคอบก่อนการตัดสินใจสามารถแก้ปัญหาเฉพาะหน้า สามารถไว้วางใจให้ตัดสินใจได้ด้วยตนเอง : </label>
                                    <input type="number"  min="1" max="10" name="p6" id="p6" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">7.  การจัดการและวางแผน (Organization and Planning)</label>
                                    <input type="number"  min="1" max="10" name="p7" id="p7" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">8.    ทักษะการสื่อสาร (Communication Skills)</label>
                                    <label> ความสามารถในการติดต่อสื่อสาร การพูด การเขียน และการนำเสนอ(Presentation) สามารถสื่อให้เข้าใจได้ง่าย เรียบร้อย ชัดเจน ถูกต้อง 
                                    รัดกุมมีลำดับขั้นตอนที่ดีไม่ก่อให้เกิดความสับสนต่อการทำงาน รู้จักสอบถาม รู้จักชี้แจงผลการปฏิบัติงานและข้อขัดข้องให้ทราบ : </label>
                                    <input type="number"  min="1" max="10" name="p8" id="p8" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">9.    การพัฒนาด้านภาษาและวัฒนธรรมต่างประเทศ (Foreign Languageand Cultural Envelopment) </label>
                                    <label> เช่น ภาษาอังกฤษ การทำงานกับชาวต่างชาติ : </label>
                                    <input type="number"  min="1" max="10" name="p9" id="p9" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">10. ความเหมาะสมต่อตำแหน่งที่ได้รับมอบหมาย (Suitability for Job Position)</label>
                                    <label> สามารถพัฒนาตนเองให้ปฏิบัติงานตาม Job Position และ Job Descriptionที่มอบหมายได้อย่างเหมาะสมหรือ ตำแหน่งงานนี้เหมาะสมกับนักศึกษาคนนี้หรือไม่เพียงใด: </label>
                                    <input type="number"  min="1" max="10" name="p10" id="p10" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>
                        </div>    
                        <br>
                        <!-- CommentPart3 -->
                        <div class="row">
                            <div class="col-auto"> <h2><b> <i>ความรับผิดชอบต่อหน้าที่ /Responsibility</i></b> </h2></div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">11. ความรับผิดชอบและเป็นผู้ที่ไว้วางใจได้ (Responsibility and Dependability)</label>
                                    <label for="">ดำเนินงานให้สำเร็จลุล่วงโดยคำนึงถึงเป้าหมายและความสำเร็จของงานเป็นหลัก 
                                    ยอมรับผลที่เกิดจากการทำงานอย่างมีเหตุผล สามารถปล่อยให้ทำงาน (กรณีงานประจำ) ได้โดยไม่ต้องควบคุมมากจนเกินไป 
                                    ความจำเป็นในการตรวจสอบขั้นตอนและผลงานตลอดเวลาสามารถไว้วางใจให้รับผิดชอบงานที่มากกว่าเวลาประจำ 
                                    สามารถไว้วางใจได้แทบทุกสถานการณ์หรือในสถานการณ์ปกติเท่านั้น</label>
                                    <input type="number"  min="1" max="10" name="p11" id="p11" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">12. ความสนใจ อุตสาหะในการทำงาน (Interest in Work)</label>
                                    <label> ความสนใจและความกระตือรือร้นในการทำงาน มีความอุตสาหะ ความพยายามความตั้งใจที่จะทำงานได้สำเร็จ ความมานะบากบั่น ไม่ย่อท้อต่ออุปสรรคและปัญหา : </label>
                                    <input type="number"  min="1" max="10" name="p12" id="p12" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">13. ความสามารถเริ่มต้นทำงานได้ด้วยตนเอง (Initiative or Self Starter) </label>
                                    <label> เมื่อได้รับคำชี้แนะ สามารถเริ่มทำงานได้เองโดยไม่ต้องรอคำสั่ง (กรณีงานประจำ)เสนอตัวเข้าช่วยงานแทบทุกอย่าง 
                                    มาขอรับงานใหม่ ๆ ไปทำ ไม่ปล่อยเวลาว่างให้ล่วงเลยไปโดยเปล่าประโยชน์ : </label>
                                    <input type="number"  min="1" max="10" name="p13" id="p13" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">14. การตอบสนองต่อการสั่งการ (Response to Supervision)</label>
                                    <label> ยินดีรับคำสั่ง คำแนะนำ คำวิจารณ์ไม่แสดงความอึดอัดใจ เมื่อได้รับคำติเตือนและวิจารณ์ ความรวดเร็วในการปฏิบัติตามคำสั่ง การปรับตัวปฏิบัติตามคำแนะนำ ข้อเสนอแนะ และวิจารณ์: </label>
                                    <input type="number"  min="1" max="10" name="p14" id="p14" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>
                        
                        </div>    
                        <br>
                        <!-- CommentPart4 -->
                        
                        <div class="row">
                            <div class="col-auto"> <h2><b> <i>ลักษณะส่วนบุคคล / Personality</i></b> </h2></div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">15. บุคลิกภาพและการวางตัว (Personality)</label>
                                    <label for="">มีบุคลิกภาพและวางตัวได้เหมาะสม เช่น ทัศนคติ วุฒิภาวะ ความอ่อนน้อมถ่อมตนการแต่งกาย กิริยาวาจา การตรงต่อเวลา และอื่น ๆ :</label>
                                    <input type="number"  min="1" max="10" name="p15" id="p15" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">16. มนุษยสัมพันธ์ (Interpersonal Skills)</label>
                                    <label> สามารถร่วมงานกับผู้อื่น การทำงานเป็นทีม สร้างมนุษยสัมพันธ์ได้ดี เป็นที่รักใคร่ชอบพอของผู้ร่วมงาน เป็นผู้ที่ช่วยก่อให้เกิดความร่วมมือประสานงาน : </label>
                                    <input type="number"  min="1" max="10" name="p16" id="p16" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">17.  ความมีระเบียบวินัย ปฏิบัติตามวัฒนธรรมของสถานปฏิบัติงาน (Discipline andAdaptability to Formal Organization)</label>
                                    <label> ความสนใจเรียนรู้ ศึกษา กฎระเบียบ นโยบายต่าง ๆ และปฏิบัติตามโดยเต็มใจการปฏิบัติตามระเบียบบริหารงานบุคคล 
                                    (การเข้างาน ลางาน) ปฏิบัติตามกฎการรักษาความปลอดภัยในโรงงาน การควบคุมคุณภาพ 5 ส และอื่น ๆ : </label>
                                    <input type="number"  min="1" max="10" name="p17" id="p17" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="">18.  คุณธรรมและจริยธรรม (Ethics and Morality)</label>
                                    <label> มีความซื่อสัตย์ สุจริต มีจิตใจสะอาด รู้จักเสียสละ ไม่เห็นแก่ตัว เอื้อเฟื้อช่วยเหลือผู้อื่น : </label>
                                    <input type="number"  min="1" max="10" name="p18" id="p18" placeholder="" required> / 10 คะแนน</input>
                                </div>
                            </div>
                        </div>
                        <!-- CommentPart5 -->
                        <div class="row">
                            <div class="col-auto"><h2><b><i>โปรดให้ข้อคิดเห็นที่เป็นประโยชน์ แก่นักศึกษา / Please give comments on the student</i></b></h2></div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.จุดเด่นของนักศึกษา /Strength</label>
                                <input type="text" name="strength_1" id="strength_1">
                            </div>
                            <div class="col-auto">
                                <label for="">1.ข้อควรปรับปรุงของนักศึกษา / Improvement</label>
                                <input type="text" name="improvement_1" id="improvement_1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">2.จุดเด่นของนักศึกษา /Strength</label>
                                <input type="text" name="strength_2" id="strength_2">
                            </div>
                            <div class="col-auto">
                                <label for="">2.ข้อควรปรับปรุงของนักศึกษา / Improvement</label>
                                <input type="text" name="improvement_2" id="improvement_2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">3.จุดเด่นของนักศึกษา /Strength</label>
                                <input type="text" name="strength_3" id="strength_3">
                            </div>
                            <div class="col-auto">
                                <label for="">3.ข้อควรปรับปรุงของนักศึกษา / Improvement</label>
                                <input type="text" name="improvement_3" id="improvement_3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">4.จุดเด่นของนักศึกษา /Strength</label>
                                <input type="text" name="strength_4" id="strength_4">
                            </div>
                            <div class="col-auto">
                                <label for="">4.ข้อควรปรับปรุงของนักศึกษา / Improvement</label>
                                <input type="text" name="improvement_4" id="improvement_4">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5.จุดเด่นของนักศึกษา /Strength</label>
                                <input type="text" name="strength_5" id="strength_5" >
                            </div>
                            <div class="col-auto">
                                <label for="">5.ข้อควรปรับปรุงของนักศึกษา / Improvement</label>
                                <input type="text" name="improvement_5" id="improvement_5">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">หากนักศึกษาผู้นี้สำเร็จการศึกษาแล้ว ท่านจะรับเข้าทำงานในสถานประกอบการนี้หรือไม่ (หากมีโอกาสเลือก)Once this student graduate, will you be interested to offer him/her a job ?</label>
                                
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="obj1" id="obj1" value="1" required>
                                <label class="form-check-label" for="inlineRadio1">รับ / Yes </label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="obj1" id="obj1" value="2">
                                <label class="form-check-label" for="inlineRadio2">ไม่แน่ใจ / Not sure </label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="obj1" id="obj1" value="3" >
                                <label class="form-check-label" for="inlineRadio3">ไม่รับ / No</label>
                                </div>
                            </div>
                        </div>
                        <!-- Lisence -->
                        <div class="row">
                            <div class="col-auto"> 
                            <label>ข้อคิดเห็นเพิ่มเติม /Other comments : </label>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    
                                    <textarea rows="5" cols="100" name="cm_more" id="cm_more" ></textarea>
                                </div>
                            </div>
                            
                       
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ลงชื่อ : </label>
                                    <input type="text" name="cm_name" id="cm_name" value="<?php echo $user_title.''.$user_name.' '.$user_surname; ?>" required></input>
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
