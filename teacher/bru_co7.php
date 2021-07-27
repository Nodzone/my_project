<?php
include_once '../config/db.php';
include_once '../modal/select_input.php';

$s_data = new Select_Doc();
$find_partner_infor = $s_data->find_partner_infor();

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

  <title>Teacher - BRU_CO7</title>

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
                <form name="bru_co7" action="../FPDF/bru_co7.php"  method="post" >
                        <div class="form-group">            
                            <input type="hidden" value="<?php echo date('Y-m-d H:i:s'); ?>" name="date" id="date">  
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
                        <div class="form-group">
                        <u><b>คำชี้แจง</b></u>   กรุณากรอกข้อมูลเพื่อยืนยันการนิเทศนักศึกงาน<br>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label> ชื่อสถานประกอบการ : </label>
                                    <!-- <input type="text" name="company_name" id="company_name" placeholder="เช่น บริษัท รุ่งฤดึ ทวีหนี้ จำกัด" value="<? echo $INTERSHIP_S;?>" required></input> -->
                                    <select name="company_name" id="company_name">
                                                <option value="โปรดเลือก">โปรดเลือก</option>
                                                <option value="<? echo $INTERSHIP_S;?>"><? echo $INTERSHIP_S;?></option>                                              
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-auto">
                            <b>หัวข้อที่จะหารือในระหว่างการนิเทศ </b> ได้แก่ <br>
                            1. หน้าที่ที่มอบหมายให้นักศึกษาปฏิบัติและแผนการปฏิบัติงานตลอดระยะเวลาปฏิบัติงาน <br>
                            2. การพัฒนาตนเองของนักศึกษา <br>
                            3. หัวข้อรายงานและโครงร่างรายงาน <br>
                            4. รับฟังความคิดเห็นจากสถานปฏิบัติงานเรื่องรูปแบบและปรัชญาของสหกิจศึกษา <br>
                            5. ปัญหาต่าง ๆ ที่เกิดขึ้นในช่วงระยะเวลาที่ปฏิบัติงานผ่านมา

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                            <b>ขั้นตอนการนิเทศ </b> ได้แก่ <br>
                            1. ขอพบนักศึกษาก่อนโดยลำพังวันที่ 
                            <div class="row">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> วันที่ : </label>
                                        <select name="d_student" id="d_student">
                                                <option value="-">โปรดเลือก</option>
                                                <option value="1">1</option>                                                <option value="2">2</option>
                                                <option value="3">3</option>                                                <option value="4">4</option>
                                                <option value="5">5</option>                                                <option value="6">6</option>
                                                <option value="7">7</option>                                                <option value="8">9</option>
                                                <option value="9">8</option>                                                <option value="10">10</option>
                                                <option value="11">11</option>                                                <option value="12">12</option>
                                                <option value="13">13</option>                                                <option value="14">14</option>
                                                <option value="15">15</option>                                                <option value="16">16</option>
                                                <option value="17">17</option>                                                <option value="18">18</option>
                                                <option value="19">19</option>                                                <option value="20">20</option>
                                                <option value="21">21</option>                                                <option value="22">22</option>
                                                <option value="23">23</option>                                                <option value="24">24</option>
                                                <option value="25">25</option>                                                <option value="26">26</option>
                                                <option value="27">27</option>                                                <option value="28">28</option>
                                                <option value="29">29</option>                                                <option value="30">30</option>
                                                <option value="31">31</option>                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> เดือน : </label>
                                    
                                        <select name="m_student" id="m_student">
                                                <option value="-">โปรดเลือก</option>
                                                <option value="มกราคม">มกราคม</option>
                                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                                <option value="มีนาคม">มีนาคม</option>
                                                <option value="เมษายน">เมษายน</option>
                                                <option value="พฤษภาคม">พฤษภาคม</option>
                                                <option value="มิถุนายน">มิถุนายน</option>
                                                <option value="กรกฎาคม">กรกฎาคม</option>
                                                <option value="สิงหาคม">สิงหาคม</option>
                                                <option value="กันยายน">กันยายน</option>
                                                <option value="ตุลาคม">ตุลาคม</option>
                                                <option value="พฤษจิกายน">พฤษจิกายน</option>
                                                <option value="ธันวาคม">ธันวาคม</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> ปี พ.ศ. : </label>
                                        <input type="number" name="y_student" id="y_student" min="2550" max="3000" step="1" value="2562" />
                                    </div>
                                </div>
                                <div class="col-auto">
                                เวลา <input type="text" name="time_student" id="time_student"> น. </input>
                                </div> 
                            </div>
                        </div>
                         
                        
                            </div>
                        </div>    
                        <div class="row">    
                            <div class="col-auto">
                            2. ขอพบ Job Supervisor โดยลำพังวันที่<div class="row">
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> วันที่ : </label>
                                        <select name="d_emp" id="d_emp">
                                        <option value="-">โปรดเลือก</option>
                                                <option value="1">1</option>                                                <option value="2">2</option>
                                                <option value="3">3</option>                                                <option value="4">4</option>
                                                <option value="5">5</option>                                                <option value="6">6</option>
                                                <option value="7">7</option>                                                <option value="8">9</option>
                                                <option value="9">8</option>                                                <option value="10">10</option>
                                                <option value="11">11</option>                                                <option value="12">12</option>
                                                <option value="13">13</option>                                                <option value="14">14</option>
                                                <option value="15">15</option>                                                <option value="16">16</option>
                                                <option value="17">17</option>                                                <option value="18">18</option>
                                                <option value="19">19</option>                                                <option value="20">20</option>
                                                <option value="21">21</option>                                                <option value="22">22</option>
                                                <option value="23">23</option>                                                <option value="24">24</option>
                                                <option value="25">25</option>                                                <option value="26">26</option>
                                                <option value="27">27</option>                                                <option value="28">28</option>
                                                <option value="29">29</option>                                                <option value="30">30</option>
                                                <option value="31">31</option>                                                
                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> เดือน : </label>
                                    
                                        <select name="m_emp" id="m_emp">
                                                <option value="-">โปรดเลือก</option>
                                                <option value="มกราคม">มกราคม</option>
                                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                                <option value="มีนาคม">มีนาคม</option>
                                                <option value="เมษายน">เมษายน</option>
                                                <option value="พฤษภาคม">พฤษภาคม</option>
                                                <option value="มิถุนายน">มิถุนายน</option>
                                                <option value="กรกฎาคม">กรกฎาคม</option>
                                                <option value="สิงหาคม">สิงหาคม</option>
                                                <option value="กันยายน">กันยายน</option>
                                                <option value="ตุลาคม">ตุลาคม</option>
                                                <option value="พฤษจิกายน">พฤษจิกายน</option>
                                                <option value="ธันวาคม">ธันวาคม</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> ปี พ.ศ. : </label>
                                        <input type="number" name="y_emp" id="y_emp" min="2550" max="3000" step="1" value="2562" />
                                    </div>
                                </div>
                                <div class="col-auto">
                                เวลา <input type="text" name="time_emp" id="time_emp"> น. </input>
                                </div> 
                            </div>
                        </div>
                            
                        </div>    
                        <div class="row">   
                            <div class="col-auto">
	                        3. เยี่ยมชมสถานปฏิบัติงาน (แล้วแต่ความเหมาะสมและความสะดวกของสถานปฏิบัติงาน)
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-auto">
	                        <b>คณะผู้นิเทศสหกิจศึกษา</b> ของมหาวิทยาลัยฯประกอบด้วย
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-auto">
                                <label for="">1.อาจารย์</label>
                                <input type="text" name="t_name1" id="t_name1" value="<? echo $STD_PASTNER;?>"required>
                            </div>
                            <div class="col-auto">
                                <label for="">ตำแหน่ง</label>
                                <input type="text" name="t_position1" id="t_position1" required>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-auto">
                                <label for="">2.อาจารย์</label>
                                <input type="text" name="t_name2" id="t_name2">
                            </div>
                            <div class="col-auto">
                                <label for="">ตำแหน่ง</label>
                                <input type="text" name="t_position2" id="t_position">
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-auto">
                                <label for="">3.อาจารย์</label>
                                <input type="text" name="t_name3" id="t_name3">
                            </div>
                            <div class="col-auto">
                                <label for="">ตำแหน่ง</label>
                                <input type="text" name="t_position3" id="t_position3">
                            </div>
                        </div>

                        <div class="row">
                        สถานปฏิบัติงานได้รับทราบกำหนดการนิเทศงานนักศึกษาสหกิจศึกษาในวันที่ <br>
                        <div class="row">        
                        <div class="col-auto">
                                    <div class="form-group">
                                        <label> : </label>
                                        <select name="co_day" id="co_day">
                                        <option value="-">โปรดเลือก</option>
                                                <option value="1">1</option>                                                <option value="2">2</option>
                                                <option value="3">3</option>                                                <option value="4">4</option>
                                                <option value="5">5</option>                                                <option value="6">6</option>
                                                <option value="7">7</option>                                                <option value="8">9</option>
                                                <option value="9">8</option>                                                <option value="10">10</option>
                                                <option value="11">11</option>                                                <option value="12">12</option>
                                                <option value="13">13</option>                                                <option value="14">14</option>
                                                <option value="15">15</option>                                                <option value="16">16</option>
                                                <option value="17">17</option>                                                <option value="18">18</option>
                                                <option value="19">19</option>                                                <option value="20">20</option>
                                                <option value="21">21</option>                                                <option value="22">22</option>
                                                <option value="23">23</option>                                                <option value="24">24</option>
                                                <option value="25">25</option>                                                <option value="26">26</option>
                                                <option value="27">27</option>                                                <option value="28">28</option>
                                                <option value="29">29</option>                                                <option value="30">30</option>
                                                <option value="31">31</option>                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> เดือน : </label>
                                    
                                        <select name="co_m" id="co_m">
                                                <option value="-">โปรดเลือก</option>
                                                <option value="มกราคม">มกราคม</option>
                                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                                <option value="มีนาคม">มีนาคม</option>
                                                <option value="เมษายน">เมษายน</option>
                                                <option value="พฤษภาคม">พฤษภาคม</option>
                                                <option value="มิถุนายน">มิถุนายน</option>
                                                <option value="กรกฎาคม">กรกฎาคม</option>
                                                <option value="สิงหาคม">สิงหาคม</option>
                                                <option value="กันยายน">กันยายน</option>
                                                <option value="ตุลาคม">ตุลาคม</option>
                                                <option value="พฤษจิกายน">พฤษจิกายน</option>
                                                <option value="ธันวาคม">ธันวาคม</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> ปี พ.ศ. : </label>
                                        <input type="number" name="co_y" id="co_y" min="2550" max="3000" step="1" value="2562" />
                                    </div>
                                </div>
                                <div class="col-auto">
                                เวลา <input type="text" name="co_time" id="co_time"> น. </input>
                                </div> 
                        </div> 
                        ตลอดจนขั้นตอนรายละเอียดการนิเทศงานดังกล่าวข้างต้นโดยชัดเจนแล้วและใคร่ขอ 
                        แจ้งให้โครงการ ฯ ทราบว่า <br>

                        </div>
                        <div class="row">
                            
                                <div class="form-check">
                                    
                                    <input class="form-check-input" type="radio" name="obj1" id="obj1" value="1" required>
                                    <label class="form-check-label" for="exampleRadios1">
                                    ไม่ขัดข้องและยินดีต้อนรับคณะนิเทศงานสหกิจศึกษาในวันและเวลาดังกล่าว
                                    </label>
                                </div>
                        </div>        
                        <div class="row">        
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="obj1" id="obj1" value="2">
                                    <label class="form-check-label" for="exampleRadios2">
                                    ไม่สะดวกที่จะต้อนรับในวันและเวลาดังกล่าวและขอแจ้งวันเวลาที่สะดวกดังนี้
                                </div>
                        </div>
                            
                        <div class="row">        
                        <div class="col-auto">
                                    <div class="form-group">
                                        <label> วันที่ : </label>
                                        <select name="cob_d1" id="cob_d1">
                                        <option value="โปรดเลือก">โปรดเลือก</option>
                                                <option value="1">1</option>                                                <option value="2">2</option>
                                                <option value="3">3</option>                                                <option value="4">4</option>
                                                <option value="5">5</option>                                                <option value="6">6</option>
                                                <option value="7">7</option>                                                <option value="8">9</option>
                                                <option value="9">8</option>                                                <option value="10">10</option>
                                                <option value="11">11</option>                                                <option value="12">12</option>
                                                <option value="13">13</option>                                                <option value="14">14</option>
                                                <option value="15">15</option>                                                <option value="16">16</option>
                                                <option value="17">17</option>                                                <option value="18">18</option>
                                                <option value="19">19</option>                                                <option value="20">20</option>
                                                <option value="21">21</option>                                                <option value="22">22</option>
                                                <option value="23">23</option>                                                <option value="24">24</option>
                                                <option value="25">25</option>                                                <option value="26">26</option>
                                                <option value="27">27</option>                                                <option value="28">28</option>
                                                <option value="29">29</option>                                                <option value="30">30</option>
                                                <option value="31">31</option>                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> เดือน : </label>
                                    
                                        <select name="cob_m1" id="cob_m1">
                                                <option value="โปรดเลือก">โปรดเลือก</option>
                                                <option value="มกราคม">มกราคม</option>
                                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                                <option value="มีนาคม">มีนาคม</option>
                                                <option value="เมษายน">เมษายน</option>
                                                <option value="พฤษภาคม">พฤษภาคม</option>
                                                <option value="มิถุนายน">มิถุนายน</option>
                                                <option value="กรกฎาคม">กรกฎาคม</option>
                                                <option value="สิงหาคม">สิงหาคม</option>
                                                <option value="กันยายน">กันยายน</option>
                                                <option value="ตุลาคม">ตุลาคม</option>
                                                <option value="พฤษจิกายน">พฤษจิกายน</option>
                                                <option value="ธันวาคม">ธันวาคม</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> ปี พ.ศ. : </label>
                                        <input type="number" name="cob_y1" id="cob_y1" min="2550" max="3000" step="1" value="2562" />
                                    </div>
                                </div>
                                <div class="col-auto">
                                เวลา <input type="text" name="cob_time1" id="cob_time1"> น. </input>
                                </div> 
                        </div>  
                        <div class="row">
                            
                            <div class="col-auto">
                            <label for="">หรือ</label>
                            
                            </div>
                            <div class="col-auto">
                            
                                    <div class="form-group">
                                        <label> วันที่ : </label>
                                        <select name="cob_d2" id="cob_d2">
                                        <option value="โปรดเลือก">โปรดเลือก</option>
                                                <option value="1">1</option>                                                <option value="2">2</option>
                                                <option value="3">3</option>                                                <option value="4">4</option>
                                                <option value="5">5</option>                                                <option value="6">6</option>
                                                <option value="7">7</option>                                                <option value="8">9</option>
                                                <option value="9">8</option>                                                <option value="10">10</option>
                                                <option value="11">11</option>                                                <option value="12">12</option>
                                                <option value="13">13</option>                                                <option value="14">14</option>
                                                <option value="15">15</option>                                                <option value="16">16</option>
                                                <option value="17">17</option>                                                <option value="18">18</option>
                                                <option value="19">19</option>                                                <option value="20">20</option>
                                                <option value="21">21</option>                                                <option value="22">22</option>
                                                <option value="23">23</option>                                                <option value="24">24</option>
                                                <option value="25">25</option>                                                <option value="26">26</option>
                                                <option value="27">27</option>                                                <option value="28">28</option>
                                                <option value="29">29</option>                                                <option value="30">30</option>
                                                <option value="31">31</option>                                                
                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> เดือน : </label>
                                    
                                        <select name="cob_m2" id="cob_m2">
                                                <option value="โปรดเลือก">โปรดเลือก</option>
                                                <option value="มกราคม">มกราคม</option>
                                                <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                                <option value="มีนาคม">มีนาคม</option>
                                                <option value="เมษายน">เมษายน</option>
                                                <option value="พฤษภาคม">พฤษภาคม</option>
                                                <option value="มิถุนายน">มิถุนายน</option>
                                                <option value="กรกฎาคม">กรกฎาคม</option>
                                                <option value="สิงหาคม">สิงหาคม</option>
                                                <option value="กันยายน">กันยายน</option>
                                                <option value="ตุลาคม">ตุลาคม</option>
                                                <option value="พฤษจิกายน">พฤษจิกายน</option>
                                                <option value="ธันวาคม">ธันวาคม</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label> ปี พ.ศ. : </label>
                                        <input type="number" name="cob_y2" id="cob_y2" min="2550" max="3000" step="1" value="2562" />
                                    </div>
                                </div>
                                <div class="col-auto">
                                เวลา <input type="text" name="cob_time2" id="cob_time2"> น. </input>
                                </div> 
                        </div>

                        <div class="row">
                            <div class="col-auto">
                                <label>ลงชื่อ</label>
                                <input type="text" name="t_enter" id="t_enter"></input>
                            </div>
                            <div class="col-auto">
                                <label>ตำแหน่ง</label>
                                <input type="text" name="t_enter_position" id="t_enter_position"></input>
                            </div>
                        
                        </div>
                       

                        <div class="row">
                            <div class="col-auto">
                                    จึงเรียนมาเพื่อโปรดทราบ <br>
                                <font color="red"> ** หมายเหตุ จำเป็นต้องกรอกข้อมูลให้ครบทุกช่อง <br> </font>
                                <font color="blue">  *** หมายเหตุ หากไม่ประสงค์จะกรอกกรุณากรอกเว้นวรรค (Spac Bar)  " " หรือ "-" แทน </font> 
                            </div>
                        </div>
                        <?}}?>
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
