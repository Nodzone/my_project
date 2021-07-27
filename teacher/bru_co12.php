<?php
include_once '../config/db.php';
include_once '../modal/select_input.php';
$s_data = new Select_Doc();

$find_partner_infor = $s_data->find_partner_infor();
// print_r ($find_partner_infor);
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

  <title>Teacher - BRU_C12</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template-->
  <link href="css/teacher.css" rel="stylesheet">

</head>

<body class="color">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include "header-tech.php" ?>
        
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">แบบแจ้งกำหนดการนิเทศงานนักศึกษาสหกิจศึกษา</h1>
            <div>
                <form name="bru_co12" action="../FPDF/bru_co12.php"  method="post" >
                        <div class="form-group">            
                            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="date" id="date">  
                        </div> 
                        <? if($find_partner_infor){
                        foreach ($find_partner_infor as $val){
                        $TITLE_S = !empty($val['TITLE_S'])? $val['TITLE_S'] : '';
                        $NAME_S = !empty($val['NAME_S'])? $val['NAME_S'] : '';
                        $LASTNAME_S = !empty($val['LASTNAME_S'])? $val['LASTNAME_S'] : '';
                        $FACULTY_S = !empty($val['FACULTY_S'])? $val['FACULTY_S'] : '';
                        $MAJOR_S = !empty($val['MAJOR_S'])? $val['MAJOR_S'] : '';
                        $INTERSHIP_S = !empty($val['INTERSHIP_S'])? $val['INTERSHIP_S'] : '';
                        $STD_PASTNER = !empty($val['STD_PASTNER'])? $val['STD_PASTNER'] : '';
                
                        ?>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">ชื่อสถานปฎิบัติงาน (ไทย หรือ อังกฤษ) :</label>
                                <input type="text" name="companyname" id="companyname" value="<?echo $INTERSHIP_S ;?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">สถานที่ตั้ง ณ อำเภอ / เขต :</label>
                                <input type="text" name="district" id="district" required>
                            </div>
                            <div class="col-auto">
                                <label for="">จังหวัด :</label>
                                <input type="text" name="province" id="province" required>
                            </div>
                            <div class="col-auto">
                                <label for="">โทรศัพท์ :</label>
                                <input type="text" name="phone" id="phone">
                            </div>
                            <div class="col-auto">
                                <label for="">โทรสาร :</label>
                                <input type="text" name="fax" id="fax">
                            </div>
                        </div>
                        <!-- Student List -->
                        <br>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">รายนามนักศึกษาที่ได้รับการนิเทศงานในสถานปฏิบัติงานแห่งนี้</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">** 1 :</label>
                                <input type="text" name="std_fullname1" id="std_fullname1" value="<?echo  $TITLE_S.' '.$NAME_S.''.$LASTNAME_S  ;?>" required>
                            </div>
                            <div class="col-auto">
                                <label for="">JOB NO :</label>
                                <input type="text" name="jobno1" id="jobno1" required>
                            </div>
                            <div class="col-auto">
                                <label for="">หลักสูตร :</label>
                                <!-- <input type="text" name="fatory1" id="fatory1" required> -->
                                <select class="" name="fatory1" id="fatory1"  style="width:200px;" required>
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

                        <div class="row">
                            <div class="col-auto">
                                <label for="">2 :</label>
                                <input type="text" name="std_fullname2" id="std_fullname2">
                            </div>
                            <div class="col-auto">
                                <label for="">JOB NO :</label>
                                <input type="text" name="jobno2" id="jobno2">
                            </div>
                            <div class="col-auto">
                                <label for="">หลักสูตร :</label>
                                <!-- <input type="text" name="fatory2" id="fatory2"> -->
                                <select class="" name="fatory2" id="fatory2"  style="width:200px;" >
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

                        <div class="row">
                            <div class="col-auto">
                                <label for="">3 :</label>
                                <input type="text" name="std_fullname3" id="std_fullname3">
                            </div>
                            <div class="col-auto">
                                <label for="">JOB NO :</label>
                                <input type="text" name="jobno3" id="jobno3">
                            </div>
                            <div class="col-auto">
                                <label for="">หลักสูตร :</label>
                                <!-- <input type="text" name="fatory3" id="fatory3"> -->
                                <select class="" name="fatory3" id="fatory3"  style="width:200px;" >
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

                        <div class="row">
                            <div class="col-auto">
                                <label for="">4 :</label>
                                <input type="text" name="std_fullname4" id="std_fullname4">
                            </div>
                            <div class="col-auto">
                                <label for="">JOB NO :</label>
                                <input type="text" name="jobno4" id="jobno4">
                            </div>
                            <div class="col-auto">
                                <label for="">หลักสูตร :</label>
                                <!-- <input type="text" name="fatory4" id="fatory4"> -->
                                <select class="" name="fatory4" id="fatory4"  style="width:200px;" >
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

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5 :</label>
                                <input type="text" name="std_fullname5" id="std_fullname5">
                            </div>
                            <div class="col-auto">
                                <label for="">JOB NO :</label>
                                <input type="text" name="jobno5" id="jobno5">
                            </div>
                            <div class="col-auto">
                                <label for="">หลักสูตร :</label>
                                <!-- <input type="text" name="fatory5" id="fatory5"> -->
                                <select class="" name="fatory5" id="fatory5"  style="width:200px;" required>
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

                        <div class="row">
                            <div class="col-auto">
                                <label for="">6 :</label>
                                <input type="text" name="std_fullname6" id="std_fullname6">
                            </div>
                            <div class="col-auto">
                                <label for="">JOB NO :</label>
                                <input type="text" name="jobno6" id="jobno6">
                            </div>
                            <div class="col-auto">
                                <label for="">หลักสูตร :</label>
                                <!-- <input type="text" name="fatory6" id="fatory6"> -->
                                <select class="" name="fatory6" id="fatory6"  style="width:200px;" >
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
                        <!-- TeacherLisence --> 
                        <div class="row">
                            <div class="col-auto">
                                <label for="">ลงชื่อ</label>
                                <input type="text" name="teacher_name" id="teacher_name" >
                                <label for="">อาจารย์นิเทศงานสหกิจศึกษา</label>
                            </div>
                           
                        </div>

                        <!-- GroupTeacher --> 
                        <div class="row">
                            <div>
                                <label for="">รายนามอาจารย์ผู้ร่วมนิเทศงาน</label>
                            </div>                           
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">** 1.</label>
                                <input type="text" name="teacherjoin_name1" id="teacherjoin_name1" required>
                               
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">2.</label>
                                <input type="text" name="teacherjoin_name2" id="teacherjoin_name2">
                                
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">3.</label>
                                <input type="text" name="teacherjoin_name3" id="teacherjoin_name3">
                            </div>
                        </div>
 <br> <br>
                         <!-- Title -->  
                         <div class="row">
                            <div class="col-auto">
                            <b>คำชี้แจง </b>โปรดบันทึกหมายเลข 5, 4, 3, 2, 1 หรือ - ตามความเห็นของท่านในแต่ละหัวข้อการประเมิน 
                                    <br> โดยใช้เกณฑ์การประเมินค่าสำหรับระดับความคิดเห็น ดังนี้
                                   <br> 5 	หมายถึง  เห็นด้วยกับข้อความนั้นมากที่สุด หรือเหมาะสมมากที่สุด
                                   <br> 4 	หมายถึง  เห็นด้วยกับข้อความนั้นมาก หรือเหมาะสมมาก
                                   <br> 3 	หมายถึง  เห็นด้วยกับข้อความนั้นปานกลาง หรือเหมาะสมปานกลาง
                                   <br> 2 	หมายถึง  เห็นด้วยกับข้อความนั้นน้อย หรือเหมาะสมน้อย
                                   <br> 1 	หมายถึง  เห็นด้วยกับข้อความนั้นน้อยที่สุด หรือเหมาะสมน้อยที่สุด
                                    - 	หมายถึง  ไม่สามารถให้ระดับคะแนนได้ เช่น ไม่มีความเห็น ไม่มีข้อมูล ไม่ต้องการประเมิน เป็นต้น

                            </div>
                        </div>
                        <br> <br>
                         <!-- Part 1 CompamyComment -->  
                         <div class="row">
                            <div class="col-auto">
                                <label for=""> <b>1.  ความเข้าใจในปรัชญาของสหกิจศึกษา</b> </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.1 เจ้าหน้าที่ระดับบริหารและฝ่ายบุคคล :</label>
                                <!-- <input type="text" name="p1_1" id="p1_1" required> -->
                                <select class="" name="p1_1" id="p1_1" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm1_1" id="cm1_1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.2 พนักงานที่ปรึกษา (Job Supervisor) :</label>
                                 <!-- <input type="text" name="p1_2" id="p1_2" required> -->
                                 <select class=""  name="p1_2" id="p1_2" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm1_2" id="cm1_2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for=""><b>2.  การจัดการและสนับสนุน</b> </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">2.1การประสานงานด้านการจัดการดูแลนักศึกษาภายใน สถานปฏิบัติงานระหว่างฝ่ายบุคคลและ Job Supervisor :</label>
                                <!-- <input type="text" name="p2_1" id="p2_1" required> -->
                                <select class="" name="p2_1" id="p2_1" required  style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm2_1" id="cm2_1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">2.2การให้คำแนะนำดูแลนักศึกษาของฝ่ายบริหารบุคคล(การปฐมนิเทศ การแนะนำระเบียบวินัย การลางาน สวัสดิการ การจ่ายค่าตอบแทน) :</label>
                                 <!-- <input type="text" name="p2_2" id="p2_2" required> -->
                                 <select class="" name="p2_2" id="p2_2" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm2_2" id="cm2_2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">2.3บุคลากรในสถานประกอบการให้ความสนใจสนับสนุนและให้ความ เป็นกันเองกับนักศึกษา :</label>
                                 <!-- <input type="text" name="p2_3" id="p2_3" required> -->
                                 <select class="" name="p2_3" id="p2_3" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm2_3" id="cm2_3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for=""> <b>3.  ปริมาณงานที่นักศึกษาได้รับ</b>  :</label>
                                <!-- <input type="text" name="p3_1" id="p3_1" required> -->
                                <select class="" name="p3_1" id="p3_1" required  style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm3_1" id="cm3_1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for=""> <b> 4.  คุณภาพงาน</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">4.1 คุณลักษณะงาน (Job description) :</label>
                                <!-- <input type="text" name="p4_1" id="p4_1" required> -->
                                <select class=""  name="p4_1" id="p4_1" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm4_1" id="cm4_1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">4.2 งานที่ได้รับมอบหมายตรงกับสาขาวิชาเอกของนักศึกษา :</label>
                                 <!-- <input type="text" name="p4_2" id="p4_2" required> -->
                                 <select class="" name="p4_2" id="p4_2" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm4_2" id="cm4_2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">4.3 งานที่ได้รับมอบหมายตรงกับที่บริษัทเสนอไว้ :</label>
                                 <!-- <input type="text" name="p4_3" id="p4_3" required> -->
                                 <select class="" name="p4_3" id="p4_3" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm4_3" id="cm4_3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">4.4 งานที่ได้รับมอบหมายตรงกับความสนใจของนักศึกษา :</label>
                                 <!-- <input type="text" name="p4_4" id="p4_4" required> -->
                                 <select class="" name="p4_4" id="p4_4" style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm4_4" id="cm4_4">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">4.5 ความเหมาะสมของหัวข้อรายงานที่นักศึกษาได้รับ :</label>
                                 <!-- <input type="text" name="p4_5" id="p4_5" required> -->
                                 <select class="" name="p4_5" id="p4_5" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm4_5" id="cm4_5">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-auto">
                                <label for=""> <b>5.  การมอบหมายงานและนิเทศงาน ของ Supervisor</b>  </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">5.1 มี Supervisor ดูแลนักศึกษาตั้งแต่วันแรกที่เข้างาน :</label>
                                <!-- <input type="text" name="p5_1" id="p5_1" required> -->
                                <select class="" name="p5_1" id="p5_1" required  style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm5_1" id="cm5_1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5.2 ความรู้และประสบการณ์วิชาชีพของ Supervisor :</label>
                                 <!-- <input type="text" name="p5_2" id="p5_2" required> -->
                                 <select class="" name="p5_2" id="p5_2" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm5_2" id="cm5_2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5.3 เวลาที่ Supervisor ให้แก่นักศึกษาด้านการปฏิบัติงาน :</label>
                                 <!-- <input type="text" name="p5_3" id="p5_3" required> -->
                                 <select class="" name="p5_3" id="p5_3" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm5_3" id="cm5_3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5.4 เวลาที่ Supervisor ให้แก่นักศึกษาด้านการเขียนรายงาน :</label>
                                 <!-- <input type="text" name="p5_4" id="p5_4" required> -->
                                 <select class="" name="p5_4" id="p5_4"  style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm5_4" id="cm5_4">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5.5 ความสนใจของ Supervisor ต่อการสอนงาน และสั่งงาน :</label>
                                 <!-- <input type="text" name="p5_5" id="p5_5" required> -->
                                 <select class=""name="p5_5" id="p5_5"  style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm5_5" id="cm5_5">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5.6 การให้ความสำคัญต่อการประเมินผลการปฏิบัติงาน และเขียนรายงานของ Supervisor :</label>
                                 <!-- <input type="text" name="p5_6" id="p5_6" equired> -->
                                 <select class="" name="p5_6" id="p5_6"  style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm5_6" id="cm5_6">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5.7 ความพร้อมของอุปกรณ์เครื่องมือสำหรับนักศึกษา (พิจารณาในกรณีนักศึกษา Co-op ซึ่งไปปฏิบัติงานชั่วคราวเท่านั้น) :</label>
                                 <!-- <input type="text" name="p5_7" id="p5_7" required> -->
                                 <select class="" name="p5_7" id="p5_7"  style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm5_7" id="cm5_7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5.8 การจัดทำแผนปฏิบัติงานตลอดระยะเวลาของการปฏิบัติงาน :</label>
                                 <!-- <input type="text" name="p5_8" id="p5_8" required> -->
                                 <select class="" name="p5_8" id="p5_8" style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm5_8" id="cm5_8">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for=""> <b>6. สรุปคุณภาพโดยรวมของสถานปฏิบัติงานแห่งนี้ : </b></label>
                                 <!-- <input type="text" name="p6_1" id="p6_1" required> -->
                                 <select class="" name="p6_1" id="p6_1"  style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                              
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="cm6_1" id="cm6_1">
                            </div>
                        </div>

                        <br><br> 
                         <!-- Part 2 StudentComment-->  
                         
                         <div class="row">
                            <div class="col-auto">
                                <label for=""> <b>ส่วนที่ 2 สำหรับการประเมินนักศึกษา (1 แผ่นสำหรับนักศึกษา 1 ราย)</b>  </label>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-auto">
                                <label for="">ชื่อนักศึกษา :</label>
                                <input type="text" name="std_name" id="std_name"  value="<?echo  $TITLE_S.' '.$NAME_S.''.$LASTNAME_S  ;?>" required>
                            </div>
                            <div class="col-auto">
                            <label for="">สาขาวิชา :</label>
                                <input type="text" name="std_submajor" id="std_submajor" value="<?echo  $MAJOR_S ;?>"required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">Check List  :  เอกสารที่นักศึกษาจะต้องนำส่งให้กับงานสหกิจศึกษา</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="obj1" id="obj1">
                                <label class="form-check-label" for="defaultCheck1">
                                แบบแจ้งรายละเอียดที่พักระหว่างการปฏิบัติงานสหกิจศึกษา
                                </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="obj2" id="obj2">
                                <label class="form-check-label" for="defaultCheck1">
                                แบบแจ้งรายละเอียดงาน ตำแหน่งงาน พนักงานที่ปรึกษา
                                </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="obj3" id="obj3">
                                <label class="form-check-label" for="defaultCheck1">
                                แบบแจ้งแผนการปฏิบัติงานสหกิจศึกษา
                                </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="obj4" id="obj4">
                                <label class="form-check-label" for="defaultCheck1">
                                แบบแจ้งโครงร่างรายงานการปฏิบัติงาน
                                </label>
                                </div>
                            </div>
                        </div>

                        
                            
                        

                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.  การพัฒนาตนเอง :</label>
                                <!-- <input type="text" name="sp1" id="sp1" required> -->
                                <select class=""  name="sp1" id="sp1"  required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm1" id="scm1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.1 บุคลิกภาพ :</label>
                                <!-- <input type="text" name="sp1_1" id="sp1_1" required> -->
                                <select class="" name="sp1_1" id="sp1_1"required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm1_1" id="scm1_1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.2 วุฒิภาวะ :</label>
                                 <!-- <input type="text" name="sp1_2" id="sp1_2" required> -->
                                 <select class=""  name="sp1_2" id="sp1_2" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm1_2" id="scm1_2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.3 การปรับตัว :</label>
                                 <!-- <input type="text" name="sp1_3" id="sp1_3" required> -->
                                 <select class=""  name="sp1_3" id="sp1_3" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm1_3" id="scm1_3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.4 การเรียนรู้ :</label>
                                 <!-- <input type="text" name="sp1_4" id="sp1_4" required> -->
                                 <select class=""  name="sp1_4" id="sp1_4"required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm1_4" id="scm1_4">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.5 การแสดงความคิดเห็น การแสดงออก :</label>
                                 <!-- <input type="text" name="sp1_5" id="sp1_5" required> -->
                                 <select class=""  name="sp1_5" id="sp1_5" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm1_5" id="scm1_5">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.6 มนุษยสัมพันธ์ :</label>
                                 <!-- <input type="text" name="sp1_6" id="sp1_6" required> -->
                                 <select class=""  name="sp1_6" id="sp1_6" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm1_6" id="scm1_6">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">1.7 ทัศนคติ :</label>
                                 <!-- <input type="text" name="sp1_7" id="sp1_7" required> -->
                                 <select class=""  name="sp1_7" id="sp1_7" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm1_7" id="scm1_7">
                            </div>
                        </div> 


                        <div class="row">
                            <div class="col-auto">
                                <label for="">2. การแสดงความมีส่วนร่วมกับสถานปฏิบัติงาน:</label>
                                <!-- <input type="text" name="sp2" id="sp2" required> -->
                                <select class=""   name="sp2" id="sp2"  required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm2" id="scm2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">3. ความประพฤติ คุณธรรม จริยธรรม และการปฏิบัติตามระเบียบ :</label>
                                <!-- <input type="text" name="sp3" id="sp3" required> -->
                                <select class="" name="sp3" id="sp3"required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm3" id="scm3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">4. ความรู้ความสามารถพื้นฐานที่จำเป็นต่อการปฏิบัติงานที่ได้รับ :</label>
                                <!-- <input type="text" name="sp4" id="sp4" required> -->
                                <select class=""  name="sp4" id="sp4" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm4" id="scm4">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">5. ความก้าวหน้าของการจัดทำรายงาน (Work Term Report):</label>
                                <!-- <input type="text" name="sp5" id="sp5" required> -->
                                <select class=""  name="sp5" id="sp5" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm5" id="scm5">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">6.  ความพึงพอใจของนักศึกษา </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <label for="">6.1 ต่องานที่ได้ปฏิบัติและสถานประกอบการ :</label>
                                <!-- <input type="text" name="sp6_1" id="sp6_1" required> -->
                                <select class=""  name="sp6_1" id="sp6_1"  required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm6_1" id="scm6_1">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">6.2 ต่อความเหมาะสม ความปลอดภัย ของที่พัก :</label>
                                 <!-- <input type="text" name="sp6_2" id="sp6_2" required> -->
                                 <select class=""  name="sp6_2" id="sp6_2" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm6_2" id="scm6_2">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">6.3 ต่อความสะดวกปลอดภัยในการเดินทางไป – กลับ:</label>
                                 <!-- <input type="text" name="sp6_3" id="sp6_3" required> -->
                                 <select class=""  name="sp6_3" id="sp6_3"required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm6_3" id="scm6_3">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">6.4 ต่อความเหมาะสมของค่าตอบแทน :</label>
                                 <!-- <input type="text" name="sp6_4" id="sp6_4" required> -->
                                 <select class=""  name="sp6_4" id="sp6_4"required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm6_4" id="scm6_4">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label for="">7.  สรุปโดยรวมของนักศึกษา:</label>
                                <!-- <input type="text" name="sp7" id="sp7" required> -->
                                <select class=""   name="sp7" id="sp7" required style="width:200px;" >
                                <option>-- โปรดเลือก --</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>   
                                <option value="2">2</option>   
                                <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-auto">
                            <label for="">หมายเหตุ</label>
                                <input type="text" name="scm7" id="scm7">
                            </div>
                        </div>

                        <!-- More Comment -->   
                        <div class="row">
                            <div class="col-auto">
                                <label for="">ความคิดเห็นเพิ่มเติม : </label>
                                
                            </div>
                            <div class="col-auto">
                               
                                <textarea name="morecomment" id="morecomment" cols="100" rows="10"></textarea>
                            </div>
                        </div>
                        <?}}?>
                         <!-- Submit -->                                                
                         <br>
                        <div class="row">
                            <div class="col-auto">
                            <button class="btn btn-success" name="submit" type="submit" id="submit">สร้างเอกสาร</button>
                            </div>
                        </div>

                        
                        
                </form>
            </div>
        </div>
        <? include "footer.php" ?>
      </div>
     
      
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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
