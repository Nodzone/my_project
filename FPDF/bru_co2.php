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
            $this->Write(1,"BRU-Co2");
            //$this->Image('photo1inc.png',150,25,25,0,'');
            $this->SetXY(85,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' แบบเสนองานสหกิจศึกษา' )  );
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

    function Title(){
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetXY(30,70);
        $this->SetFont('THSarabun Bold','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'เรียนคณบดี' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(50,80);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'สถานปฏิบัติงาน/หน่วยงานมีความสนใจที่รับนักศึกษาสหกิจศึกษา และขอเสนองาน' )  );
        $this->SetXY(30,87);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'โดยมีรายละเอียดดังนี้' )  );
    }
    // เว้นวรรคแต่ละ บรรทัดด้วย 0.7 มิลลิเมตร
    function DetailCompay($t_company,$e_company){
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,95);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '1. รายละเอียดเกี่ยวกับสถานปฏิบัติงาน / หน่วยงาน' )  );
        $this->SetXY(30,100);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ชื่อสถานปฏิบัติงาน / หน่วยงาน' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,107);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ภาษาไทย): $t_company" )  );
        $this->SetXY(30,114);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ภาษาอังกฤษ): $e_company" )  );
        $this->SetXY(30,121);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ที่อยู่ เลขที่: $addnum ถนน :    ซอย :   ตำบล :" )  );
        $this->SetXY(30,128);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "อำเภอ :    จังหวัด :   รหัสไปรษณีย์ : " )  );
        $this->SetXY(30,135);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรศัพท์ :$comphone   โทรสาร: $comfax" )  );
        $this->SetXY(30,142);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "E-mail (ถ้ามี): $comemil" )  );
        $this->SetXY(30,149);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ผลิตภัณฑ์/ลักษณะการดำเนินงาน :         จำนวนพนักงานรวม :    คน " )  );

    }
    function ManagerName(){
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,159);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ชื่อผู้จัดการสถานปฏิบัติงาน / หัวหน้าหน่วยงาน' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,165);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อ - นามสกุล : $title_mng $mng_name" )  );
        $this->SetXY(30,172);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่ง : $mng_position  แผนก : $mgroup " )  );
        $this->SetXY(30,179);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'หากมหาวิทยาลัยฯประสงค์จะติดต่อประสานงานในรายละเอียดับสถานปฏิบัติงาน/หน่วยงาน ขอให้' )  );
        $this->SetXY(35,186);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ติดต่อโดยตรงกับหัวหน้างาน/ผู้จัดการ ' )  );
        $this->SetXY(35,193);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ติดต่อกับผู้คนที่สถานปฏิบัติงาน/หน่วยงาน หน่วยงานมอบหมายดังนี้' )  );
        $this->SetXY(30,200);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อ - นามสกุล : $ctitle_name $cname" )  );
        $this->SetXY(30,207);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่ง :$c_position  แผนก :$cgroup" )  );
    }

    function DeatailJob($fatory1,$num_want1,$atibility1,$positionjob1,$detailjob1,$daywork1){
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,217);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '2. รายละเอียดเกี่ยวงาน / สวัสดิการที่เสนอให้นักศึกษาและคุณสมบัตินักศึกษาที่ต้องการ' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,224);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หลักสูตรที่ต้องการ:  $fatory1   จำนวนงานที่เสนอนักศึกษา: $num_want1 ตำแหน่ง"  )  );
        $this->SetXY(30,231);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ความสามารถทางวิชาการหรือทักษะที่นึกศึกษาควรมี: $atibility1" )  );
        $this->SetXY(30,245);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่งงานที่เสนอให้นักศึกษาปฏิบัติ (Job Position): $positionjob1 " )  );
        $this->SetXY(30,252);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ลักษณะงานที่นักศึกษาต้องปฏิบัติ (Job Description): $detailjob1"  )  );
        $this->SetXY(30,30);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "จำนวนทำงาน : $daywork1    วันต่อสัปดาห์" )  );
    }

    function DeatailJob2($fatory2,$num_want2,$atibility2,$positionjob2,$detailjob2,$daywork2,$fatory3,$num_want3,$atibility3,$positionjob3,$detailjob3,$daywork3)
    {
        $this->SetFont('THSarabun','',16);    
        $this->SetXY(30,37);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หลักสูตรที่ต้องการ:  $fatory2   จำนวนงานที่เสนอนักศึกษา: $num_want2 ตำแหน่ง" )  );
        $this->SetXY(30,44);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ความสามารถทางวิชาการหรือทักษะที่นึกศึกษาควรมี: $atibility2" )  );
        $this->SetXY(30,58);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่งงานที่เสนอให้นักศึกษาปฏิบัติ (Job Position): $positionjob2 " )  );
        $this->SetXY(30,65);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ลักษณะงานที่นักศึกษาต้องปฏิบัติ (Job Description): $detailjob2" )  );
        $this->SetXY(30,79);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "จำนวนทำงาน : $daywork2    วันต่อสัปดาห์")  );
        $this->SetXY(30,86);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หลักสูตรที่ต้องการ:  $fatory3   จำนวนงานที่เสนอนักศึกษา: $num_want3 ตำแหน่ง" )  );
        $this->SetXY(30,93);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ความสามารถทางวิชาการหรือทักษะที่นึกศึกษาควรมี: $atibility3" )  );
        $this->SetXY(30,100);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่งงานที่เสนอให้นักศึกษาปฏิบัติ (Job Position): $positionjob3 " )  );
        $this->SetXY(30,107);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ลักษณะงานที่นักศึกษาต้องปฏิบัติ (Job Description): $detailjob4 " )  );
        $this->SetXY(30,121);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "จำนวนทำงาน : $daywork3    วันต่อสัปดาห์" )  );

    }
    function DeatailJob3($fatory4,$num_want4,$atibility4,$positionjob4,$detailjob4,$daywork4,$fatory5,$num_want5,$atibility5,$positionjob5,$detailjob5,$daywork5)
    {
        $this->SetXY(30,128);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หลักสูตรที่ต้องการ:  $fatory4   จำนวนงานที่เสนอนักศึกษา: $num_want4 ตำแหน่ง" )  );
        $this->SetXY(30,135);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ความสามารถทางวิชาการหรือทักษะที่นึกศึกษาควรมี: $atibility4"  )  );
        $this->SetXY(30,145);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่งงานที่เสนอให้นักศึกษาปฏิบัติ (Job Position): $positionjob4 " )  );
        $this->SetXY(30,152);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ลักษณะงานที่นักศึกษาต้องปฏิบัติ (Job Description): $detailjob4" )  );
        $this->SetXY(30,166);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "จำนวนทำงาน : $daywork4    วันต่อสัปดาห์" )  );
        $this->SetXY(30,173);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หลักสูตรที่ต้องการ:  $fatory5   จำนวนงานที่เสนอนักศึกษา: $num_want5 ตำแหน่ง" )  );
        $this->SetXY(30,180);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ความสามารถทางวิชาการหรือทักษะที่นึกศึกษาควรมี: $atibility5" )  );
        $this->SetXY(30,194);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่งงานที่เสนอให้นักศึกษาปฏิบัติ (Job Position): $positionjob5 " )  );
        $this->SetXY(30,201);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ลักษณะงานที่นักศึกษาต้องปฏิบัติ (Job Description): $detailjob5" )  );
        $this->SetXY(30,215);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "จำนวนทำงาน : $daywork5    วันต่อสัปดาห์" )  );
        
    }

    function Intership(){
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,40);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ระยะเวลาที่ต้องการให้นักศึกษาไปปฏิบัติงาน' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(35,50);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '[ ] ภาคการศึกษาที่ 1 (มิถุนายน - กันยายน)     [ ] ภาคการศึกษาที่ 2 (พฤศจิกายน - กุมภาพันธ์)' )  );
        $this->SetXY(35,57);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '[ ] ตลอดปีการศึกษา (ทั้งภาคการศึกษาที่ 1 และ 2)' )  );
        $this->SetXY(30,64);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'สวัสดิการที่มีให้นักศึกษาระหว่างปฏิบัติงาน' )  );
        $this->SetXY(30,71);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ค่าตอบแทน' )  );
        $this->SetXY(60,71);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "[ ] ไม่มี" )  );
        $this->SetXY(73,71);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "[ ] มี $d_bath    บาท/วัน หรือ    $m_bath       บาท/เดือน" )  );
        $this->SetXY(30,78);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ที่พัก' )  );
        $this->SetXY(60,78);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '[ ] ไม่มี' )  );
        $this->SetXY(73,78);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '[ ] มี' )  );
        $this->SetXY(70,85);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "[ ] นักศึกษาเสียค่าใช้จ่ายเอง บาท        /เดือน" )  );
        $this->SetXY(70,92);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "[ ] ไม่เสียค่าใช้จ่าย" )  );
        $this->SetXY(30,99);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "สวัสดิการอื่น ๆ (ถ้ามีโปรดระบุ) : ") );

    }

    function FootDoc(){
        $this->SetXY(120,150);        
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ลงชื่อ) $empname  ผู้ให้ข้อมูล ") );
        $this->SetXY(125,155);        
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($empname)") );
        $this->SetXY(125,160);        
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่ง $position") );
        $this->SetXY(125,165);        
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date") );

        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,185);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หมายเหตุ : $more" )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(50,185);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "กรุณาส่งเอกสารฉบับนี้กลับมายังสำนักงานสหกิจศึกษาก่อนวันที่ $date_2") );
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,195);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "งานสหกิจศึกษาคณะ$major") );
        $this->SetXY(30,205);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรศัพท์: $phone        โทรสาร: $fax") );
    }
}



$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.5);
$pdf->Line(30,60,190,60);
$pdf->Header();
$pdf->Title();
$pdf->DetailCompay();
$pdf->ManagerName();
$pdf->DeatailJob($fatory1,$num_want1,$atibility1,$positionjob1,$detailjob1,$daywork1);
$pdf->Footer();
$pdf->AddPage('P','A4');
$pdf->DeatailJob2($fatory2,$num_want2,$atibility2,$positionjob2,$detailjob2,$daywork2,$fatory3,$num_want3,$atibility3,$positionjob3,$detailjob3,$daywork3);
$pdf->DeatailJob3($fatory4,$num_want4,$atibility4,$positionjob4,$detailjob4,$daywork4,$fatory5,$num_want5,$atibility5,$positionjob5,$detailjob5,$daywork5);
$pdf->AddPage('P','A4');
$pdf->Intership();
$pdf->FootDoc();
$pdf->Output();
?>