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
            $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
            $this->AddFont('THSarabun','','THSarabun.php');
            $this->SetFont('THSarabun','',100);
            $this->SetTextColor(255,192,203);
            // $this->RotatedText(35,190,iconv('UTF-8','cp874',"ตัวอย่างเอกสาร"),45);
            $this->SetTextColor(0,0,0);
            $this->SetFont('THSarabun','',16);
            $this->Image('logo_bru.jpg',90,20,20,0,'');
            $this->SetXY(155,20);
            $this->Write(1,"BRU-Co10");
            $this->SetXY(70,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา' )  );
            $this->SetXY(70,55);
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

    function Title($std_fullname,$std_id,$factory,$major,$company_name){
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,65);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(ผู้ให้ข้อมูล : นักศึกษาร่วมกับพนักงานที่ปรึกษา)' )  );
        $this->SetXY(30,72);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อ – นามสกุล (นักศึกษา): $std_fullname รหัสประจำตัว : $std_id" )  );
        $this->SetXY(30,79);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หลักสูตร : $factory คณะ : $major" )  );
        $this->SetXY(30,86);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ปฏิบัติงานสหกิจศึกษา ณ สถานปฏิบัติงาน : $company_name " )  );
        $this->SetXY(30,93);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ขอแจ้งรายละเอียดเกี่ยวกับแผนปฏิบัติงานสหกิจศึกษา ดังนี้" )  );
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(80,100);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "แผนปฏิบัติงานสหกิจศึกษา" )  );
    }

    function TablePlan($title_work_1,$m1_1,$m2_1,$m3_1,$m4_1,$title_work_2,$m1_2,$m2_2,$m3_2,$m4_2,$title_work_3,$m1_3,$m2_3,$m3_3,$m4_3,
    $title_work_4,$m1_4,$m2_4,$m3_4,$m4_4,$title_work_5,$m1_5,$m2_5,$m3_5,$m4_5,$title_work_6,$m1_6,$m2_6,$m3_6,$m4_6,
    $title_work_7,$m1_7,$m2_7,$m3_7,$m4_7,$title_work_8,$m1_8,$m2_8,$m3_8,$m4_8,$title_work_9,$m1_9,$m2_9,$m3_9,$m4_9,
    $title_work_10,$m1_10,$m2_10,$m3_10,$m4_10,$title_work_11,$m1_11,$m2_11,$m3_11,$m4_11,$title_work_12,$m1_12,$m2_12,$m3_12,$m4_12)
    {
        $this->SetFont('THSarabun','',16);
        $this->SetLineWidth(0.1);
        $this->SetXY(30,107);
        $this->Cell(80,7,iconv( 'UTF-8','cp874' , "หัวข้องาน" ),1,1,'C');
        $this->SetXY(110,107);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , "เดือนที่ 1" ),1,1,'C');
        $this->SetXY(130,107);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , "เดือนที่ 2" ),1,1,'C');
        $this->SetXY(150,107);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , "เดือนที่ 3" ),1,1,'C');
        $this->SetXY(170,107);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , "เดือนที่ 4" ),1,1,'C');
        // End Head Table

        $this->SetXY(30,114);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "1" ),1,1,'C');
        $this->SetXY(35,114);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , " $title_work_1" ),1,1,'C');
        $this->SetXY(110,114);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_1" ),1,1,'C');
        $this->SetXY(130,114);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_1" ),1,1,'C');
        $this->SetXY(150,114);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_1" ),1,1,'C');
        $this->SetXY(170,114);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_1" ),1,1,'C');

        $this->SetXY(30,121);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "2" ),1,1,'C');
        $this->SetXY(35,121);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_2" ),1,1,'C');
        $this->SetXY(110,121);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_2" ),1,1,'C');
        $this->SetXY(130,121);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_2" ),1,1,'C');
        $this->SetXY(150,121);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_2" ),1,1,'C');
        $this->SetXY(170,121);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_2" ),1,1,'C');

        $this->SetXY(30,128);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "3" ),1,1,'C');
        $this->SetXY(35,128);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_3" ),1,1,'C');
        $this->SetXY(110,128);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_3" ),1,1,'C');
        $this->SetXY(130,128);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_3" ),1,1,'C');
        $this->SetXY(150,128);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_3" ),1,1,'C');
        $this->SetXY(170,128);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_3" ),1,1,'C');

        $this->SetXY(30,135);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "4" ),1,1,'C');
        $this->SetXY(35,135);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_4" ),1,1,'C');
        $this->SetXY(110,135);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_4" ),1,1,'C');
        $this->SetXY(130,135);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_4" ),1,1,'C');
        $this->SetXY(150,135);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_4" ),1,1,'C');
        $this->SetXY(170,135);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_4" ),1,1,'C');

        $this->SetXY(30,142);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "5" ),1,1,'C');
        $this->SetXY(35,142);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_5" ),1,1,'C');
        $this->SetXY(110,142);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_5" ),1,1,'C');
        $this->SetXY(130,142);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_5" ),1,1,'C');
        $this->SetXY(150,142);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_5" ),1,1,'C');
        $this->SetXY(170,142);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_5" ),1,1,'C');

        $this->SetXY(30,149);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "6" ),1,1,'C');
        $this->SetXY(35,149);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_6" ),1,1,'C');
        $this->SetXY(110,149);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_6" ),1,1,'C');
        $this->SetXY(130,149);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_6" ),1,1,'C');
        $this->SetXY(150,149);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_6" ),1,1,'C');
        $this->SetXY(170,149);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_6" ),1,1,'C');

        $this->SetXY(30,156);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "7" ),1,1,'C');
        $this->SetXY(35,156);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_7" ),1,1,'C');
        $this->SetXY(110,156);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_7" ),1,1,'C');
        $this->SetXY(130,156);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_7" ),1,1,'C');
        $this->SetXY(150,156);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_7" ),1,1,'C');
        $this->SetXY(170,156);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_7" ),1,1,'C');

        $this->SetXY(30,163);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "8" ),1,1,'C');
        $this->SetXY(35,163);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_8" ),1,1,'C');
        $this->SetXY(110,163);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_8" ),1,1,'C');
        $this->SetXY(130,163);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_8" ),1,1,'C');
        $this->SetXY(150,163);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_8" ),1,1,'C');
        $this->SetXY(170,163);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_8" ),1,1,'C');

        $this->SetXY(30,170);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "9" ),1,1,'C');
        $this->SetXY(35,170);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_9" ),1,1,'C');
        $this->SetXY(110,170);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_9" ),1,1,'C');
        $this->SetXY(130,170);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_9" ),1,1,'C');
        $this->SetXY(150,170);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_9" ),1,1,'C');
        $this->SetXY(170,170);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_9" ),1,1,'C');

        $this->SetXY(30,177);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "10" ),1,1,'C');
        $this->SetXY(35,177);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_10" ),1,1,'C');
        $this->SetXY(110,177);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_10" ),1,1,'C');
        $this->SetXY(130,177);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_10" ),1,1,'C');
        $this->SetXY(150,177);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_10" ),1,1,'C');
        $this->SetXY(170,177);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_10" ),1,1,'C');

        $this->SetXY(30,184);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "11" ),1,1,'C');
        $this->SetXY(35,184);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_11" ),1,1,'C');
        $this->SetXY(110,184);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_11" ),1,1,'C');
        $this->SetXY(130,184);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_11" ),1,1,'C');
        $this->SetXY(150,184);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_11" ),1,1,'C');
        $this->SetXY(170,184);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_11" ),1,1,'C');

        $this->SetXY(30,191);
        $this->Cell(5,7,iconv( 'UTF-8','cp874' , "12" ),1,1,'C');
        $this->SetXY(35,191);
        $this->Cell(75,7,iconv( 'UTF-8','cp874' , "$title_work_12" ),1,1,'C');
        $this->SetXY(110,191);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m1_12" ),1,1,'C');
        $this->SetXY(130,191);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m2_12" ),1,1,'C');
        $this->SetXY(150,191);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m3_12" ),1,1,'C');
        $this->SetXY(170,191);
        $this->Cell(20,7,iconv( 'UTF-8','cp874' , " $m4_12" ),1,1,'C');
        
    }


    function Lisence($std_fullname,$emp_fullname,$emp_position,$date){
        $this->SetXY(30,208);
        $this->Write(1,iconv( 'UTF-8','cp874' , "(ลงชื่อ) $std_fullname นักศึกษา" ));
        $this->SetXY(30,215);
        $this->Write(1,iconv( 'UTF-8','cp874' , "( $std_fullname )" ));
        $this->SetXY(30,222);
        $this->Write(1,iconv( 'UTF-8','cp874' , "วันที่ $date" ));


        $this->SetXY(100,208);
        $this->Write(1,iconv( 'UTF-8','cp874' , "(ลงชื่อ) $emp_fullname พนักงานที่ปรึกษา" ));
        $this->SetXY(100,215);
        $this->Write(1,iconv( 'UTF-8','cp874' , "( $emp_fullname )" ));
        $this->SetXY(100,222);
        $this->Write(1,iconv( 'UTF-8','cp874' , "ตำแหน่ง $emp_position" ));
        $this->SetXY(100,229);
        $this->Write(1,iconv( 'UTF-8','cp874' , "วันที่ $date" ));

        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,239);
        $this->Write(1,iconv( 'UTF-8','cp874' , "โปรดส่งคืนอาจารย์นิเทศภายในสัปดาห์ที่ 2 ของการปฏิบัติงานของนักศึกษาด้วยจักขอบคุณยิ่ง" ));
    }
}

if($input=$_POST){

    // Title $std_fullname,$std_id,$factory,$major,$company_name
$std_fullname = $_POST['std_fullname'];
$std_id = $_POST['std_id'];
$factory = $_POST['factory'];
$major = $_POST['major'];
$company_name = $_POST['company_name'];

// TablePlan 

$title_work_1 = $_POST['title_work_1'];
$m1_1 = $_POST['m1_1'];
$m2_1 = $_POST['m2_1'];
$m3_1 = $_POST['m3_1'];
$m4_1 = $_POST['m4_1'];

$title_work_2 = $_POST['title_work_2'];
$m1_2 = $_POST['m1_2'];
$m2_2 = $_POST['m2_2'];
$m3_2 = $_POST['m3_2'];
$m4_2 = $_POST['m4_2'];

$title_work_3 = $_POST['title_work_3'];
$m1_3 = $_POST['m1_3'];
$m2_3 = $_POST['m2_3'];
$m3_3 = $_POST['m3_3'];
$m4_3 = $_POST['m4_3'];

$title_work_4 = $_POST['title_work_4'];
$m1_4 = $_POST['m1_4'];
$m2_4 = $_POST['m2_4'];
$m3_4 = $_POST['m3_4'];
$m4_4 = $_POST['m4_4'];

$title_work_5 = $_POST['title_work_5'];
$m1_5 = $_POST['m1_5'];
$m2_5 = $_POST['m2_5'];
$m3_5 = $_POST['m3_5'];
$m4_5 = $_POST['m4_5'];

$title_work_6 = $_POST['title_work_6'];
$m1_6 = $_POST['m1_6'];
$m2_6 = $_POST['m2_6'];
$m3_6 = $_POST['m3_6'];
$m4_6 = $_POST['m4_6'];

$title_work_7 = $_POST['title_work_7'];
$m1_7 = $_POST['m1_7'];
$m2_7 = $_POST['m2_7'];
$m3_7 = $_POST['m3_7'];
$m4_7 = $_POST['m4_7'];

$title_work_8 = $_POST['title_work_8'];
$m1_8 = $_POST['m1_8'];
$m2_8 = $_POST['m2_8'];
$m3_8 = $_POST['m3_8'];
$m4_8 = $_POST['m4_8'];

$title_work_9 = $_POST['title_work_9'];
$m1_9 = $_POST['m1_9'];
$m2_9 = $_POST['m2_9'];
$m3_9 = $_POST['m3_9'];
$m4_9 = $_POST['m4_9'];

$title_work_10 = $_POST['title_work_10'];
$m1_10 = $_POST['m1_10'];
$m2_10 = $_POST['m2_10'];
$m3_10 = $_POST['m3_10'];
$m4_10 = $_POST['m4_10'];

$title_work_11 = $_POST['title_work_11'];
$m1_11 = $_POST['m1_11'];
$m2_11 = $_POST['m2_11'];
$m3_11 = $_POST['m3_11'];
$m4_11 = $_POST['m4_11'];

$title_work_12 = $_POST['title_work_12'];
$m1_12 = $_POST['m1_12'];
$m2_12 = $_POST['m2_12'];
$m3_12 = $_POST['m3_12'];
$m4_12 = $_POST['m4_12'];


// Lisence $emp_fullname,$emp_position,$date

$emp_fullname = $_POST['emp_fullname'];
$emp_position = $_POST['emp_position'];

$date = $_POST['date'];

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
        return $day . ' เดือน ' . $monthThai . ' พ.ศ. ' . $yearThai . ' ' . $dateTime;
            break;
    }

}

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.5);
$pdf->Line(30,60,180,60);
$pdf->Header();
$pdf->Footer();

$pdf->Title($std_fullname,$std_id,$factory,$major,$company_name);

$pdf->TablePlan($title_work_1,$m1_1,$m2_1,$m3_1,$m4_1,$title_work_2,$m1_2,$m2_2,$m3_2,$m4_2,$title_work_3,$m1_3,$m2_3,$m3_3,$m4_3,
$title_work_4,$m1_4,$m2_4,$m3_4,$m4_4,$title_work_5,$m1_5,$m2_5,$m3_5,$m4_5,$title_work_6,$m1_6,$m2_6,$m3_6,$m4_6,
$title_work_7,$m1_7,$m2_7,$m3_7,$m4_7,$title_work_8,$m1_8,$m2_8,$m3_8,$m4_8,$title_work_9,$m1_9,$m2_9,$m3_9,$m4_9,
$title_work_10,$m1_10,$m2_10,$m3_10,$m4_10,$title_work_11,$m1_11,$m2_11,$m3_11,$m4_11,$title_work_12,$m1_12,$m2_12,$m3_12,$m4_12);

$pdf->Lisence($std_fullname,$emp_fullname,$emp_position,DateThai($date));
$pdf->SetLineWidth(0.5);
$pdf->Line(30,235,180,235);
$pdf->Output();

}
?>