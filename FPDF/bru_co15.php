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
            $this->SetFont('THSarabun Bold','',16);
            $this->Image('logo_bru.jpg',90,20,20,0,'');
            $this->SetXY(155,20);
            $this->Write(1,"BRU-Co15");
            $this->SetXY(70,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , 'แบบแจ้งยืนยันส่งรายงานการปฏิบัติงาน' )  );
            $this->SetXY(68,55);
            $this->Write( 2  , iconv( 'UTF-8','cp874' , 'สหกิจศึกษา     มหาวิทยาลัยราชภัฏบุรีรัมย์' )  );
          
            
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
    function Title(){
        $this->SetXY(30,68);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(ผู้ให้ข้อมูล: นักศึกษา) ' )  );
        $this->SetXY(30,75);
        $this->SetFont('THSarabun Bold','U',18);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'คำชี้แจง' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(42,83);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ขอให้นักศึกษาเขียนแบบแจ้งยืนยันการส่ง รายงานการปฏิบัติงาน (Work Term Report) ก่อนการเข้า')  );
        $this->SetXY(30,90);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'รับการสัมภาษณ์ และนำส่งให้อาจารย์ที่ปรึกษาสหกิจศึกษาลงนามในขณะที่รับการสัมภาษณ์ เพื่อรับรองว่า')  );
        $this->SetXY(30,97);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'นักศึกษาได้ส่งรายงานเป็นที่เรียบร้อยแล้ว จะส่งแบบแจ้งส่งรายงานฉบับนี้ ที่งานสหกิจศึกษาคณะภายหลังเสร็จ')  );
        $this->SetXY(30,104);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'สิ้นการสัมภาษณ์แล้ว' )  );
    }

    function Intro($title_std,$std_name,$std_id,$std_major,$std_submajor,$title_report)
    {
        $this->SetXY(30,118);
        $this->SetFont('THSarabun Bold','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'เรียน คณบดี ' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,125);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อ – นามสกุล :$title_std $std_name รหัสประจำตัว: $std_id ")  );
        $this->SetXY(30,132);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "สาขาวิชา : $std_submajor      คณะ : $std_major")  );
        $this->SetXY(30,139);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ปฏิบัติงานสหกิจศึกษา ณ ชื่อสถานปฏิบัติงาน")  );
        $this->SetXY(30,146);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ใคร่ขอเรียนแจ้งว่าได้ส่ง " )  );
        $this->SetXY(65,146);
        $this->SetFont('THSarabun Bold','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รายงานการปฏิบัติงานสหกิจศึกษา (Work Term Report)" )  );
        $this->SetXY(30,153);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "หัวข้อเรื่อง (ภาษาไทย หรือ ภาษาอังกฤษ) $title_report       " )  );
        $this->SetXY(30,167);
        $this->SetFont('THSarabun','',16);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ให้กับอาจารย์ที่ปรึกษาสหกิจศึกษาของสาขาวิชาเรียบร้อยแล้ว" )  );
    }

    function StudentLisence($title_std,$std_name,$date){
        $this->SetXY(120,181);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ลงชื่อ) $title_std $std_name" )  );
        $this->SetXY(125,189);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($std_name)")  );
        $this->SetXY(125,196);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "นักศึกษาผู้ปฏิบัติงานสหกิจศึกษา" )  );
        $this->SetXY(120,203);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date" )  );

    }

    function TeacherLisence(){
        $this->SetXY(30,210);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ขอรับรองว่านักศึกษาได้ส่งรายงานเรียบร้อยแล้ว" )  );
        $this->SetXY(30,217);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ลงชื่อ) " )  );
        $this->SetXY(35,224);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "()" )  );
        $this->SetXY(30,231);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "อาจารย์ที่ปรึกษาสหกิจศึกษา" )  );
        $this->SetXY(30,238);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่")  );

    }

    function EmpEducation(){
        $this->SetXY(110,217);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "สำหรับเจ้าหน้าที่สหกิจศึกษาลงนามรับเอกสาร" )  );
        $this->SetXY(110,224);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "" )  );
        $this->SetXY(115,236);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่" )  );
    }
}
if($input = $_POST)
{

$title_std = $_POST['title_std'];
$std_name = $_POST['std_name'];
$std_submajor = $_POST['std_submajor'];
$title_report = $_POST['title_report'];
$std_major = $_POST['std_major'];
$std_id = $_POST['std_id'];
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
            return $day . 'เดือน ' . $monthThai . ' พ.ศ. ' . $yearThai;
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
$pdf->Title();
$pdf->Intro($title_std,$std_name,$std_id,$std_major,$std_submajor,$title_report);
$pdf->StudentLisence($title_std,$std_name,DateThai($date));
$pdf->TeacherLisence();
$pdf->SetLineWidth(0.1);
$pdf->Rect(110,214,70,28);
$pdf->EmpEducation();
$pdf->Footer();
$pdf->Output();

}
?>    