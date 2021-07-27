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
            $this->Write(1,"BRU-Co3");
            //$this->Image('photo1inc.png',150,25,25,0,'');
            $this->SetXY(75,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' แบบแจ้งรายชื่อนักศึกษาสหกิจศึกษา' )  );
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
    function Title($hr_name,$position){
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetXY(30,70);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เรียน $hr_name" )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(50,85);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตามที่หน่วยงานของท่านได้เสนองานสหกิจศึกษาในตำแหน่งงาน $position" )  );
        $this->SetXY(30,92);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ทางสหกิจศึกษาได้ดำเนินการรับสมัครและคัดเลือกนักศึกษาเพื่อดำเนินงานตามที่ท่านได้เสนอมา' )  );
        $this->SetXY(30,99);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ดังรายละเอียดดังนี้' )  );
    }
    function Body($std_name1,$std_id1,$std_fatory1,$std_name2,$std_id2,$std_fatory2,$std_name3,$std_id3,$std_fatory3,$std_name4,$std_id4,$std_fatory4,$std_name5,$std_id5,$std_fatory5,$std_name6,$std_id6,$std_fatory6,$std_name7,$std_id7,$std_fatory7)
    {
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->SetXY(50,106);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "1. $std_name1" )  );
        $this->SetXY(50,113);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสนักศึกษา : $std_id1 หลักสูตร : $std_fatory1" )  );
        $this->SetXY(50,120);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "2. $std_name2"  )  );
        $this->SetXY(50,127);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสนักศึกษา : $std_id2 หลักสูตร : $std_fatory2" )  );
        $this->SetXY(50,134);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "3. $std_name3"  )  );
        $this->SetXY(50,141);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสนักศึกษา : $std_id3 หลักสูตร : $std_fatory3" )  );
        $this->SetXY(50,148);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "4. $std_name4"  )  );
        $this->SetXY(50,155);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสนักศึกษา : $std_id4 หลักสูตร : $std_fatory4" )  );
        $this->SetXY(50,162);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "5. $std_name5"  )  );
        $this->SetXY(50,169);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสนักศึกษา : $std_id5 หลักสูตร : $std_fatory5" )  );
        $this->SetXY(50,176);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "6. $std_name6"  )  );
        $this->SetXY(50,183);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสนักศึกษา : $std_id6 หลักสูตร : $std_fatory6" )  );
        $this->SetXY(50,190);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "7. $std_name7"  )  );
        $this->SetXY(50,197);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสนักศึกษา : $std_id7 หลักสูตร : $std_fatory7" )  );
    }

    function Buttom($co_name,$co_positiom,$date){
        $this->SetXY(50,210);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'จึงเรียนมาเพื่อโปรดทราบ' )  );
        $this->SetXY(120,225);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ลงชื่อ " )  );
        $this->SetXY(130,230);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($co_name)" )  );
        $this->SetXY(120,235);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่ง $co_positiom" )  );
        $this->SetXY(120,240);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date" )  );
    }
}
if ($input=$_POST)
{
$date = $_POST['date'];
    /// Title
$hr_name = $_POST['hr_name'];
$position = $_POST['position'];

// Body
$std_name1 = $_POST['std_name1'];
$std_id1   = $_POST['std_id1'];
$std_fatory1 = $_POST['std_fatory1'];

$std_name2 = $_POST['std_name2'];
$std_id2   = $_POST['std_id2'];
$std_fatory2 = $_POST['std_fatory2'];

$std_name3 = $_POST['std_name3'];
$std_id3   = $_POST['std_id3'];
$std_fatory3 = $_POST['std_fatory3'];

$std_name4 = $_POST['std_name4'];
$std_id4   = $_POST['std_id4'];
$std_fatory4 = $_POST['std_fatory4'];

$std_name5 = $_POST['std_name5'];
$std_id5   = $_POST['std_id5'];
$std_fatory5 = $_POST['std_fatory5'];

$std_name6 = $_POST['std_name6'];
$std_id6  = $_POST['std_id6'];
$std_fatory6 = $_POST['std_fatory6'];

$std_name7 = $_POST['std_name7'];
$std_id7   = $_POST['std_id7'];
$std_fatory7 = $_POST['std_fatory7'];


//Buttom
$co_name = $_POST['co_name'];
$co_positiom   = $_POST['co_positiom'];

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
$pdf->Line(30,60,190,60);
$pdf->Header();
$pdf->Title($hr_name,$position);
$pdf->Body($std_name1,$std_id1,$std_fatory1,$std_name2,$std_id2,$std_fatory2,$std_name3,$std_id3,$std_fatory3,$std_name4,$std_id4,$std_fatory4,$std_name5,$std_id5,$std_fatory5,$std_name6,$std_id6,$std_fatory6,$std_name7,$std_id7,$std_fatory7);
$pdf->Buttom($co_name,$co_positiom,DateThai($date));
$pdf->Footer();

$pdf->Output();
}
?>