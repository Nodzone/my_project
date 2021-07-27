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
            $this->Write(1,"BRU-Co4");
            //$this->Image('photo1inc.png',150,25,25,0,'');
            $this->SetXY(80,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' แบบแจ้งรายชื่ออาจารย์นิเทศ' )  );
            $this->SetXY(75,55);
            $this->Write( 2  , iconv( 'UTF-8','cp874' , 'สหกิจศึกษา มหาวิทยาลัยราชภัฏบุรีรัมย์' )  );
            // $this->Cell(1,10,iconv('UTF-8','cp874',"ถนนจิระ อำเภอเมืองบุรีรัมย์ "),0,0,'R');
            // $this->Cell(-5,20,iconv('UTF-8','cp874',"จังหวัดบุรีรัมย์ ๓๑๐๐๐ "),0,0,'R');
            // //input valume
            // $this->Cell(-135,45,iconv('UTF-8','cp874',"๒๐ ตุลาคม ๒๕๖๒ "),0,0,'C');
            // $this->Cell(50,60,iconv('UTF-8','cp874',"เรื่อง ขอความอนุเคราะห์รับนักศึกษาสหกิจศึกษาเข้าปฏิบัติงาน"),0,0,'C');
            
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
    function Title($submajor,$major,$num ){
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetXY(30,70);
        $this->SetFont('THSarabun Bold','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'เรียน ' )  );
        $this->SetXY(50,70);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'คณบดี' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,77);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตามที่สาขาวิชา $submajor คณะ $major" )  );
        $this->SetXY(30,84);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "มีนักศึกษาเข้าร่วมสหกิจศึกษาจำนวน $num     คน จึงขอส่งรายชื่ออาจารย์นิเทศเพื่อทำงานนิเทศนักศึกษา" )  );
        $this->SetXY(30,91);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ดังนี้' )  );
    }
    function Body($allstudent){
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->SetXY(50,106);
        $this->MultiCell( 150  , 10, iconv( 'UTF-8','cp874' , "$allstudent" )  );
    
       
    }

    

    function Buttom($t_name,$t_position,$date){
        $this->SetXY(50,210);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'จึงเรียนมาเพื่อโปรดทราบ' )  );
        $this->SetXY(120,225);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ลงชื่อ  $t_name" )  );
        $this->SetXY(130,230);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($t_name)" )  );
        $this->SetXY(120,235);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่ง: $t_position" )  );
        $this->SetXY(120,240);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date" )  );
    }

    
}
if($input = $_POST)
{

$submajor = $_POST['submajor'];
$major = $_POST['major'];
$num = $_POST['num'];
$allstudent = $_POST['allstudent'];
$date = $_POST['date'];
$t_name = $_POST['t_name'];
$t_position = $_POST['t_position'];

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
            return $day . ' เดือน ' . $monthThai . ' พ.ศ.  ' . $yearThai;
            break;
        case 'time':
        return $day . ' เดือน ' . $monthThai . ' พ.ศ.  ' . $yearThai . ' ' . $dateTime;
            break;
    }
    
}

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->Header();
$pdf->Title($submajor,$major,$num );
$pdf->Body($allstudent);
$pdf->Buttom($t_name,$t_position,DateThai($date));
$pdf->Footer();

$pdf->Output();

}
?>