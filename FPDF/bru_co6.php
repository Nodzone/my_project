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
            $this->Write(1,"BRU-Co6");
            $this->SetXY(60,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' หนังสือสัญญาการเข้ารับการฝึกปฏิบัติงานของนักศึกษา' )  );
            $this->SetXY(73,55);
            $this->Write( 2  , iconv( 'UTF-8','cp874' , 'สหกิจศึกษา มหาวิทยาลัยราชภัฏบุรีรัมย์' )  );
          
            
		//พิมพ์ตัวหนังสือตัวเอียงๆ ที่ตำแหน่งเยื้องขอบกระดาษซ้าย 5หน่วย ขอบกระดาษบน 5หน่วย
        }
		//ปัดบรรทัด กำหนดความกว้างของบรรทัด 20หน่วย
		//$this->Ln(20);
    }
    function ThaiDate()
    {
        $ThDay = array ( "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์" );
        $ThMonth = array ( "มกรามก", "กุมภาพันธ์", "มีนาคม", "เมษายน",
        "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม",
        "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" );

        $b = date( "n" )-1; // ค่าเดือน (1-12)
        $c = date( "j" ); // ค่าวันที่(1-31)
        $d = date( "Y" )+543; // ค่า ค.ศ.บวก 543 ทำให้เป็น ค.ศ.
        return "วัน$ThDay[$a] ที่ $c เดือน$ThMonth[$b] พ.ศ. $d";
    }


    
    function Footer(){

        $this->SetAutoPageBreak(0);
        $this->SetY( -10 ); //dกำหนดการเยื้อง 10 มม.
        $this->SetFont('THSarabun','',5);
        $this->Cell(0,10, 'https://www.bru.ac.th' ,0,0,'L');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    
    }
    function Title($writelocal,$day,$moumt,$year){
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetXY(120,70);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เขียนที่ $writelocal" )  );
        $this->SetXY(120,77);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $day เดือน $moumt พ.ศ.$year" )  );
       
    }
   

    function Intro($title_name,$fullname,$submajor,$major,$std_id,$name_company,$bday,$bmount,$byear,$old){
        $this->SetFont('THSarabun','',16);
        $this->SetXY(40,91);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ข้าพเจ้า $title_name $fullname  เกิดวันที่ $bday เดือน $bmount พ.ศ. $byear อายุ $old ปี" )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,98);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ขณะนี้เป็นนักศึกษาของสาขาวิชา  $submajor คณะ $major") );
        $this->SetXY(30,105);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสนักศึกษา $std_id ขอให้สัญญาต่อ $name_company") );
        $this->SetXY(30,112);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ในการปฏิบัติงานของข้าพเจ้า ณ สถานปฏิบัติงานนี้ว่า') );
        
    }

    function BodyContract($name_company,$name_major){
        $this->SetXY(40,119);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '1. ข้าพเจ้ายินดีปฏิบัติตามกฎระเบียบและข้อบังคับหรือข้อกำหนดหรือเงื่อนไขใด ๆซึ่งสถาน' )  );
        $this->SetXY(30,126);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ปฏิบัติงานที่ข้าพเจ้าเข้าปฏิบัติงานแห่งนี้ได้ตั้งหรือกำหนดไว้สำหรับคนงานหรือเจ้าหน้าที่ของสถานปฏิบัติงานนี้' )  );
        $this->SetXY(30,133);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'และสำหรับข้าพเจ้าโดยเฉพาะทุกประการ' )  );
        $this->SetXY(40,140);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '2.ในระหว่างการปฏิบัติงานถ้าหากข้าพเจ้าประสบอันตรายหรือเจ็บป่วยเนื่องจากการปฏิบัติงานให้แก่' )  );
        $this->SetXY(30,147);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'สถานปฏิบัติงานที่ข้าพเจ้าปฏิบัติงานนี้ข้าพเจ้าให้สัญญาว่าข้าพเจ้าจะไม่เรียกเงินทดแทนใด ๆ ทั้งสิ้นรวมทั้งจะ' )  );
        $this->SetXY(30,154);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ไม่ถือเป็นมูลเหตุแห่งการดำเนินคดีใด ๆ กับ $name_company และ/หรือเจ้าหน้าที่ผู้เกี่ยวข้องในการ" )  );
        $this->SetXY(30,161);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ปฏิบัติงานของสถานปฏิบัติงานทั้งในทางแพ่งและทางอาญารวมทั้งกฎหมายฉบับอื่นๆ อันอาจฟ้องร้องโดย' )  );
        $this->SetXY(30,168);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'อาศัยบทบัญญัติของกฎหมายนั้น ๆ ด้วย' )  );
        $this->SetXY(40,175);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ข้อความข้างบนนี้ข้าพเจ้าได้อ่านและเข้าใจโดยตลอดแล้วเพื่อเป็นหลักฐานจึงทำขึ้นเป็น 2 ฉบับ' )  );
        $this->SetXY(30,182);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ข้อความตรงกันสำหรับสถานประกอบการยึดถือไว้ 1 ฉบับและงานสหกิจศึกษาคณะ $name_major" )  );
        $this->SetXY(30,189);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'มหาวิทยาลัยราชภัฏบุรีรัมย์เก็บไว้ 1 ฉบับและลงลายมือชื่อไว้เป็นสำคัญ' )  );
    }

    function FootDoc($title_name,$fullname,$emp_one,$emp_two,$emp_three){
        $this->SetFont('THSarabun','',16);
        $this->SetXY(80,210);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ลงชื่อ $title_name $fullname " )  );
        $this->SetXY(130,210);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(นักศึกษา)" )  );
        $this->SetXY(80,217);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ลงชื่อ $emp_one") );
        $this->SetXY(80,224);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ลงชื่อ $emp_two" )  );
        $this->SetXY(80,231);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ลงชื่อ $emp_three") );
        $this->SetXY(130,217);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ผู้มีอำนาจในสถานปฏิบัติงาน)") );
        $this->SetXY(130,224);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(พยาน) " )  );
        $this->SetXY(130,231);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(พยาน)") );
       
       
  
    }
}

if ($input = $_POST)
{

$writelocal = $_POST['writelocal'];
$day = $_POST['day'];
$moumt = $_POST['moumt'];
$year = $_POST['year'];
$title_name = $_POST['title_name'];
$fullname = $_POST['fullname'];
$submajor = $_POST['submajor'];
$major = $_POST['major'];
$std_id = $_POST['std_id'];
$name_company = $_POST['name_company'];
$emp_one = $_POST['emp_one'];
$emp_two = $_POST['emp_two'];
$emp_three = $_POST['emp_three'];
$name_major = $_POST['name_major'];
$bday = $_POST['bday'];
$bmount = $_POST['bmount'];
$byear = $_POST['byear'];
$old = $_POST['old'];

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.5);
$pdf->Line(30,64,185,64);
$pdf->Header();
$pdf->Title($writelocal,$day,$moumt,$year);

$pdf->Intro($title_name,$fullname,$submajor,$major,$std_id,$name_company,$bday,$bmount,$byear,$old);
$pdf->BodyContract($name_company,$name_major);
$pdf->FootDoc($title_name,$fullname,$emp_one,$emp_two,$emp_three);
$pdf->Footer();

$pdf->Output();
}
?>