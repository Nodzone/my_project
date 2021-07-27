<?php
require('rotation.php');

class PDF extends PDF_Rotate
{   
    
    function RotatedText($x,$y,$txt,$angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle,$x,$y);
        $this->Text($x,$y,$txt);
        $this->Rotate(0);
    }
	//Override คำสั่ง (เมธอด) Header
	function Header(){
        if($this->page==1)
        {
            $this->AddFont('THSarabun','','THSarabun.php');
            $this->SetFont('THSarabun','',100);
            $this->SetTextColor(255,192,203);
            // $this->RotatedText(35,190,iconv('UTF-8','cp874',"ตัวอย่างเอกสาร"),45);
            $this->SetTextColor(0,0,0);
            $this->SetFont('THSarabun','',16);
            $this->Image('logo_bru.jpg',90,15,25,0,'');
            $this->SetXY(155,20);
            $this->Write(1,"BRU-Co7");
            $this->SetXY(65,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' แบบแจ้งกำหนดการนิเทศงานนักศึกษาสหกิจศึกษา' )  );
            $this->SetXY(73,55);
            $this->Write( 2  , iconv( 'UTF-8','cp874' , 'สหกิจศึกษา มหาวิทยาลัยราชภัฏบุรีรัมย์' )  );
          
            
		//พิมพ์ตัวหนังสือตัวเอียงๆ ที่ตำแหน่งเยื้องขอบกระดาษซ้าย 5หน่วย ขอบกระดาษบน 5หน่วย
        }
		//ปัดบรรทัด กำหนดความกว้างของบรรทัด 20หน่วย
		//$this->Ln(20);
    }
    
    function Footer(){

        $this->SetAutoPageBreak(0);
        $this->SetY( -10 ); //dกำหนดการเยื้อง 10 มม.
        $this->SetFont('THSarabun','',5);
        $this->Cell(0,10, 'https://www.bru.ac.th' ,0,0,'L');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    
    }
    function CompanyName($company_name){
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetXY(30,68);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อสถานประกอบการ : $company_name " )  );
        
       
    }
   

    function Allbody($d_student,$m_student,$y_student,$time_student,$d_emp,$m_emp,$y_emp,$time_emp){
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,80);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'หัวข้อที่จะหารือในระหว่างการนิเทศ' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(87,80);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ได้แก่' )  );
        $this->SetXY(50,87);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '1.หน้าที่ที่มอบหมายให้นักศึกษาปฏิบัติและแผนการปฏิบัติงานตลอดระยะเวลาปฏิบัติงาน') );
        $this->SetXY(50,94);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '2.การพัฒนาตนเองของนักศึกษา') );
        $this->SetXY(50,101);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '3.หัวข้อรายงานและโครงร่างรายงาน') );
        $this->SetXY(50,108);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '4.รับฟังความคิดเห็นจากสถานปฏิบัติงานเรื่องรูปแบบและปรัชญาของสหกิจศึกษา') );
        $this->SetXY(50,115);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '5.ปัญหาต่าง ๆ ที่เกิดขึ้นในช่วงระยะเวลาที่ปฏิบัติงานผ่านมา') );        
        $this->SetXY(30,122);
        $this->SetFont('THSarabun Bold','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ขั้นตอนการนิเทศ' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(50,129);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "1.ขอพบนักศึกษาก่อนโดยลำพังวันที่ $d_student $m_student $y_student เวลา  $time_student")  );
        $this->SetXY(50,136);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "2.ขอพบ Job Supervisor โดยลำพังวันที่  $d_emp $m_emp $y_emp เวลา $time_emp")  );
        $this->SetXY(50,143);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "3.เยี่ยมชมสถานปฏิบัติงาน (แล้วแต่ความเหมาะสมและความสะดวกของสถานปฏิบัติงาน)")  );

    }
    function Middle($obj1,$t_name1,$t_position1,$t_name2,$t_position2,$t_name3,$t_position3,$co_day,$co_m,$co_y,$co_time,$cob_d1,$cob_m1,$cob_y1,$cob_time1,$cob_d2,$cob_m2,$cob_y2,$cob_time2)
    {    
        if ($obj1 == 1){
            $obj_21 =  "•";
            $obj_22 =  "";
            $obj_23 =  ""; 
        }
        else if ($obj1 == 2){
            $obj_21 =  "";
            $obj_22 =  "•";
            
        }
        
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,150);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'คณะผู้นิเทศสหกิจศึกษาของมหาวิทยาลัยฯประกอบด้วย ' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(50,157);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "1.อาจารย์ $t_name1  ตำแหน่ง $t_position1" )  );
        $this->SetXY(50,164);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "2.อาจารย์ $t_name2  ตำแหน่ง $t_position2" )  );
        $this->SetXY(50,171);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "3.อาจารย์ $t_name3  ตำแหน่ง $t_position3" )  );
        $this->SetXY(50,178);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "สถานปฏิบัติงานได้รับทราบกำหนดการนิเทศงานนักศึกษาสหกิจศึกษาในวันที่ $co_day $co_m $co_y" )  );
        $this->SetXY(30,185);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เวลา $co_time น.ตลอดจนขั้นตอนรายละเอียดการนิเทศงานดังกล่าวข้างต้นโดยชัดเจนแล้วและใคร่ขอ " )  );
        $this->SetXY(30,192);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'แจ้งให้โครงการ ฯ ทราบว่า' )  );
        $this->SetXY(50,199);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "[$obj_21]  ไม่ขัดข้องและยินดีต้อนรับคณะนิเทศงานสหกิจศึกษาในวันและเวลาดังกล่าว" )  );
        $this->SetXY(50,206);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "[$obj_22] ไม่สะดวกที่จะต้อนรับในวันและเวลาดังกล่าวและขอแจ้งวันเวลาที่สะดวกดังนี้")  );
        $this->SetXY(50,213);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วัน $cob_d1 $cob_m1 $cob_y1 เวลา $cob_time1 น. หรือ" )  );
        $this->SetXY(50,220);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วัน $cob_d2 $cob_m2 $cob_y2 เวลา $cob_time2 น." )  );
    }

    function Buttom($t_enter,$t_enter_position,$date){
        $this->SetXY(50,227);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'จึงเรียนมาเพื่อโปรดทราบ' )  );
        $this->SetXY(120,236);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ลงชื่อ $t_enter" )  );
        $this->SetXY(130,242);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($t_enter)" )  );
        $this->SetXY(120,248);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่ง $t_enter_position" )  );
        $this->SetXY(120,254);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date" )  );
    }
}
if ($input = $_POST)
{

$company_name = $_POST['company_name'];

//Allbody
$d_student = $_POST['d_student'];
$m_student = $_POST['m_student'];
$y_student = $_POST['y_student'];
$time_student = $_POST['time_student'];
$d_emp = $_POST['d_emp'];
$m_emp = $_POST['m_emp'];
$y_emp = $_POST['y_emp'];
$time_emp = $_POST['time_emp'];

//Middle
// $obj1 = $_POST['obj1'];
$obj1= !empty($input['obj1']) ? $input['obj1'] : '';

$t_name1 = $_POST['t_name1'];
$t_position1 = $_POST['t_position1'];
$t_name2 = $_POST['t_name2'];
$t_position2 = $_POST['t_position2'];
$t_name3 = $_POST['t_name3'];
$t_position3 = $_POST['t_position3'];
$co_day = $_POST['co_day'];
$co_m = $_POST['co_m'];
$co_y = $_POST['co_y'];
$co_time = $_POST['co_time'];

$cob_d1 = $_POST['cob_d1'];
$cob_m1 = $_POST['cob_m1'];
$cob_y1 = $_POST['cob_y1'];
$cob_time1 = $_POST['cob_time1'];
$cob_d2 = $_POST['cob_d2'];
$cob_m2 = $_POST['cob_m2'];
$cob_y2 = $_POST['cob_y2'];
$cob_time2 = $_POST['cob_time2'];



// Buttom
$date = $_POST['date'];
$t_enter_position = $_POST['t_enter_position'];
$t_enter = $_POST['t_enter'];

function DateThai($date, $type = 'date')
{
    
    $date = date('Y-n-d H:i:s', strtotime($date));
    $TH_Month = array(null, "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $dateFullArr = explode(' ', $date);
    $dateFull = explode('-', $dateFullArr[0]);
    $dateTime = $dateFullArr[1];
    $yearThai = $dateFull[0] + 543;
    $monthThai = $TH_Month[$dateFull[1]];
    $day = $dateFull[2];

    switch ($type) {
        case 'date':
            return $day . ' เดือน ' . $monthThai . ' พ.ศ. ' . $yearThai;
            break;
        case 'time':
        return $day . ' เดือน  ' . $monthThai . ' พ.ศ.  ' . $yearThai . ' ' . $dateTime;
            break;
    }
    
}

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.5);
$pdf->Line(30,64,185,64);
$pdf->Header();
$pdf->CompanyName($company_name);

$pdf->Allbody($d_student,$m_student,$y_student,$time_student,$d_emp,$m_emp,$y_emp,$time_emp);
$pdf->Middle($obj1,$t_name1,$t_position1,$t_name2,$t_position2,$t_name3,$t_position3,$co_day,$co_m,$co_y,$co_time,$cob_d1,$cob_m1,$cob_y1,$cob_time1,$cob_d2,$cob_m2,$cob_y2,$cob_time2);
$pdf->Buttom($t_enter,$t_enter_position,DateThai($date));
$pdf->Footer();

$pdf->Output();
}
?>