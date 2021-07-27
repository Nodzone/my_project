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
            $this->Write(1,"BRU-Co16");
            $this->SetXY(60,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , 'แบบแจ้งรายละเอียดเกี่ยวกับการปฏิบัติงานสหกิจศึกษา' )  );
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
        $this->SetXY(45,68);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(ผู้ให้ข้อมูล: นักศึกษา หลังกลับจากสถานประกอบการ) ' )  );
        $this->SetXY(45,75);
        $this->SetFont('THSarabun Bold','U',18);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'คำชี้แจง' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(45,83);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'งานสหกิจศึกษาฯ ต้องการข้อมูลเกี่ยวกับการปฏิบัติงานของนักศึกษาเพื่อจัดทำเป็นหนังสือ')  );
        $this->SetXY(45,90);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'สรุปผลการปฏิบัติงาน ประจำภาคการศึกษา โปรดเขียนข้อความด้วยตัวอักษรบรรจง และนำส่งงาน')  );
        $this->SetXY(45,97);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'สหกิจศึกษาทันทีที่กลับจากสถานปฏิบัติงานถึงมหาวิทยาลัย เรียบร้อยแล้ว')  );
       
    }

    function Intro($title_std,$std_name,$std_id,$std_submajor,$std_major,$companyname,$position)
    {
        $this->SetXY(45,104);
        $this->SetFont('THSarabun Bold','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'เรียน คณบดี ' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(45,111);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อ – นามสกุล (นักศึกษา): $title_std $std_name  รหัสประจำตัว : $std_id")  );
        $this->SetXY(45,118);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "สาขาวิชา : $std_submajor คณะ : $std_major ")  );
        $this->SetXY(45,125);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ปฏิบัติงานสหกิจศึกษา ณ ชื่อสถานปฏิบัติงาน')  );
        $this->SetXY(45,132);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ภาษาไทย หรือภาษาอังกฤษ) : $companyname " )  );
        $this->SetXY(45,139);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่ง : $position" )  );
        $this->SetXY(100,139);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ใคร่ขอเรียนแจ้งรายละเอียดการปฏิบัติงานสหกิจศึกษา ดังนี้' )  );
    }

    function StudentEnter($jobdescription){
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,146);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'รายละเอียดเนื้องานที่ปฏิบัติ (Job Description)' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(105,146);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(นักศึกษาควรขอคำปรึกษาจากอาจารย์ที่ปรึกษาสหกิจศึกษา' )  );
        $this->SetXY(30,153);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ก่อนเขียน เพื่อความถูกต้องทางด้านวิชาการ หรือดูตัวอย่างประกอบ)' )  );
        $this->SetXY(30,157);
        $this->MultiCell( 150,5  , iconv( 'UTF-8','cp874' , "$jobdescription" )  );
        
        $this->SetFont('THSarabun Bold','',16);
    }

    function HeadReport($thai,$english){
        $this->SetXY(30,217);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'หัวข้อรายงาน (Report Topic)' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,224);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ภาษาไทย) : $thai ")  );
        $this->SetXY(30,231);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ภาษาอังกฤษ) : $english  " )  );

    }

    function StudentLisence($title_std,$std_name,$date){
        $this->SetXY(30,245);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ลงชื่อ) $title_std $std_name" )  );
        $this->SetXY(40,252);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($std_name)" )  );
        $this->SetXY(35,259);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "นักศึกษาผู้ปฏิบัติงานสหกิจศึกษา" )  );
        $this->SetXY(30,266);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date" )  );

    }


    function EmpEducation(){
        $this->SetXY(110,245);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "สำหรับเจ้าหน้าที่สหกิจศึกษาลงนามรับเอกสาร" )  );
        $this->SetXY(110,252);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "" )  );
        $this->SetXY(115,259);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่" )  );
    }
}

if($input = $_POST)
{

$title_std = $_POST['title_std'];
$std_name = $_POST['std_name'];
$std_submajor = $_POST['std_submajor'];
$std_major = $_POST['std_major'];
$std_id = $_POST['std_id'];
$date = $_POST['date'];
$companyname = $_POST['companyname'];
$position = $_POST['position'];
$jobdescription = $_POST['jobdescription'];

$thai = $_POST['thai'];
$english  = $_POST['english'];
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
            return $day . ' ' . $monthThai . ' ' . $yearThai;
            break;
        case 'time':
        return $day . ' ' . $monthThai . ' ' . $yearThai . ' ' . $dateTime;
            break;
    }
    
}


$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.5);
$pdf->Line(30,60,190,60);
$pdf->Header();
$pdf->Title();
$pdf->Intro($title_std,$std_name,$std_id,$std_submajor,$std_major,$companyname,$position);
$pdf->StudentLisence($title_std,$std_name,DateThai($date));
$pdf->SetLineWidth(0.1);
$pdf->Rect(29,143,170,95);
$pdf->Rect(29,214,170,24);
$pdf->Rect(110,242,70,28);
$pdf->StudentEnter($jobdescription);
// $pdf->StudentEnter($jobdescription,$report,$ereport);
$pdf->HeadReport($thai,$english);
$pdf->EmpEducation();
$pdf->Footer();
$pdf->Output();

}
?>    