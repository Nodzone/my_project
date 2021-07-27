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
            $this->Write(1,"BRU-Co5");
            //$this->Image('photo1inc.png',150,25,25,0,'');
            $this->SetXY(70,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' แบบยืนยันการตอบรับนักศึกษาสหกิจศึกษา' )  );
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

    function Date($date)
    {
        $this->SetFont('THSarabun','',10);
        $this->SetXY(150,5);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่สร้างเอกสาร $date")  );
    }
    function Title($company_name,$emp_name,$emp_position,$emp_phone,$emp_fax){
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetXY(30,70);
        $this->SetFont('THSarabun Bold','U',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'คำชี้แจง' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(50,70);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'กรุณากรอกข้อมูลเพื่อยืนยันความประสงค์รับนักศึกษาสหกิจศึกษาที่ได้รับการพิจารณาจาก' )  );
        $this->SetXY(50,77);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'งานสหกิจศึกษามหาวิทยาลัยราชภัฎบุรีรัมย์' )  );
       
        $this->SetXY(30,87);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อสถานปฏิบัติงาน : $company_name " )  );
        $this->SetXY(30,94);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อผู้ประสานงาน : $emp_name " )  );
        $this->SetXY(30,101);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่ง : $emp_position  โทรศัพท์ : $emp_phone            โทรสาร : $emp_fax " )  );
    }
    function Studentlist($std_01,$std_submajor_01,$more_std01,
    $std_02,$std_submajor_02,$more_std02,
    $std_03,$std_submajor_03,$more_std03,
    $std_04,$std_submajor_04,$more_std04,
    $std_05,$std_submajor_05,$more_std05,
    $std_06,$std_submajor_06,$more_std06,
    $std_07,$std_submajor_07,$more_std07,
    $std_08,$std_submajor_08,$more_std08,
    $std_09,$std_submajor_09,$more_std09,
    $std_10,$std_submajor_10,$more_std10
    ){
         // Don't Fix That
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(90,111);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'รายชื่อนักศึกษา' )  );
        $h1 = iconv('UTF-8','cp874' ,'ลำดับที่');
        $h2 = iconv('UTF-8','cp874' ,'ชื่อ-นามสกุลนักศึกษา');
        $h3 = iconv('UTF-8','cp874' ,'สาขาวิชา');
        $h4 = iconv('UTF-8','cp874', 'หมายเหตุ');
        $this->SetXY(30,118);  
        $this->Cell(15,8,$h1,1,0,'C');
        $this->Cell(55,8,$h2,1,0,'C');
        $this->Cell(50,8,$h3,1,0,'C');
        $this->Cell(25,8,$h4,1,0,'C');
       


        // Don't Fix That

        $r1 = iconv('UTF-8','cp874', '1');
        $r2 = iconv('UTF-8','cp874' ,"$std_01");
        $r3 = iconv('UTF-8','cp874' ,"$std_submajor_01");
        $r4 = iconv('UTF-8','cp874' ,"$more_std01");

        $r5 = iconv('UTF-8','cp874', '2');
        $r6 = iconv('UTF-8','cp874' ,"$std_02");
        $r7 = iconv('UTF-8','cp874' ,"$std_submajor_02");
        $r8 = iconv('UTF-8','cp874' ,"$more_std02");

        $r9 = iconv('UTF-8','cp874', '3');
        $r10 = iconv('UTF-8','cp874' ,"$std_03");
        $r11 = iconv('UTF-8','cp874' ,"$std_submajor_03");
        $r12 = iconv('UTF-8','cp874' ,"$more_std02");

        $r13 = iconv('UTF-8','cp874', '4');
        $r14 = iconv('UTF-8','cp874' ,"$std_04");
        $r15 = iconv('UTF-8','cp874' ,"$std_submajor_04");
        $r16 = iconv('UTF-8','cp874' ,"$more_std02");

        $r17 = iconv('UTF-8','cp874', '5');
        $r18 = iconv('UTF-8','cp874' ,"$std_05");
        $r19 = iconv('UTF-8','cp874' ,"$std_submajor_05");
        $r20 = iconv('UTF-8','cp874' ,"$more_std05");

        $r21 = iconv('UTF-8','cp874', '6');
        $r22 = iconv('UTF-8','cp874' ,"$std_06");
        $r23 = iconv('UTF-8','cp874' ,"$std_submajor_06");
        $r24 = iconv('UTF-8','cp874' ,"$more_std06");

        $r25 = iconv('UTF-8','cp874', '7');
        $r26 = iconv('UTF-8','cp874' ,"$std_07");
        $r27 = iconv('UTF-8','cp874' ,"$std_submajor_07");
        $r28 = iconv('UTF-8','cp874' ,"$more_std07");

        $r29 = iconv('UTF-8','cp874', '8');
        $r30 = iconv('UTF-8','cp874' ,"$std_08");
        $r31 = iconv('UTF-8','cp874' ,"$std_submajor_08");
        $r32 = iconv('UTF-8','cp874' ,"$more_std08");

        $r33 = iconv('UTF-8','cp874', '9');
        $r34 = iconv('UTF-8','cp874' ,"$std_09");
        $r35 = iconv('UTF-8','cp874' ,"$std_submajor_09");
        $r36 = iconv('UTF-8','cp874' ,"$more_std09");

        $r37 = iconv('UTF-8','cp874', '10');
        $r38 = iconv('UTF-8','cp874' ,"$std_10");
        $r39 = iconv('UTF-8','cp874' ,"$std_submajor_10");
        $r40 = iconv('UTF-8','cp874' ,"$more_std10");

        

        $this->Ln();
       
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,126);
        $this->Cell(15,6,$r1,1,0,'C');
        $this->Cell(55,6,$r2,1,0,'C');
        $this->Cell(50,6,$r3,1,0,'C');
        $this->Cell(25,6,$r4,1,0,'C');

        $this->SetXY(30,132);
        $this->Cell(15,6,$r5,1,0,'C');
        $this->Cell(55,6,$r6,1,0,'C');
        $this->Cell(50,6,$r7,1,0,'C');
        $this->Cell(25,6,$r8,1,0,'C');

        $this->SetXY(30,138);
        $this->Cell(15,6,$r9,1,0,'C');
        $this->Cell(55,6,$r10,1,0,'C');
        $this->Cell(50,6,$r11,1,0,'C');
        $this->Cell(25,6,$r12,1,0,'C');

        $this->SetXY(30,144);
        $this->Cell(15,6,$r13,1,0,'C');
        $this->Cell(55,6,$r14,1,0,'C');
        $this->Cell(50,6,$r15,1,0,'C');
        $this->Cell(25,6,$r16,1,0,'C');

        $this->SetXY(30,150);
        $this->Cell(15,6,$r17,1,0,'C');
        $this->Cell(55,6,$r18,1,0,'C');
        $this->Cell(50,6,$r19,1,0,'C');
        $this->Cell(25,6,$r20,1,0,'C');

        $this->SetXY(30,156);
        $this->Cell(15,6,$r21,1,0,'C');
        $this->Cell(55,6,$r22,1,0,'C');
        $this->Cell(50,6,$r23,1,0,'C');
        $this->Cell(25,6,$r24,1,0,'C');

        $this->SetXY(30,162);
        $this->Cell(15,6,$r25,1,0,'C');
        $this->Cell(55,6,$r26,1,0,'C');
        $this->Cell(50,6,$r27,1,0,'C');
        $this->Cell(25,6,$r28,1,0,'C');

        $this->SetXY(30,168);
        $this->Cell(15,6,$r29,1,0,'C');
        $this->Cell(55,6,$r30,1,0,'C');
        $this->Cell(50,6,$r31,1,0,'C');
        $this->Cell(25,6,$r32,1,0,'C');

        $this->SetXY(30,174);
        $this->Cell(15,6,$r33,1,0,'C');
        $this->Cell(55,6,$r34,1,0,'C');
        $this->Cell(50,6,$r35,1,0,'C');
        $this->Cell(25,6,$r36,1,0,'C');
        
        $this->SetXY(30,180);
        $this->Cell(15,6,$r37,1,0,'C');
        $this->Cell(55,6,$r38,1,0,'C');
        $this->Cell(50,6,$r39,1,0,'C');
        $this->Cell(25,6,$r40,1,0,'C');
        
       
    }

    function MoreInfor($obj1,$tellmore,$phonemore){
        if ($obj1 == 1){
            $obj_21 =  "•";
            $obj_22 =  "";
            $obj_23 =  ""; 
        }
        else if ($obj1 == 2){
            $obj_21 =  "";
            $obj_22 =  "•";
            $obj_23 =  ""; 
        }
        else if($obj1 == 3){
            $obj_21 =  "";
            $obj_22 =  "";
            $obj_23 =  "•"; }

        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,195);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'โปรดทำเครื่องหมายข้อที่ท่านมีความต้องการ ' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,202);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "[ $obj_21 ] รับนักศึกษาสหกิจศึกษาทั้งหมดตามที่งานสหกิจศึกษามหาวิทยาลัยราชภัฏบุรีรัมย์ เสนอมา") );
        $this->SetXY(30,209);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "[ $obj_22 ] มีความต้องการอื่น ๆ เพิ่มเติม (กรุณาระบุ) $tellmore") );
        $this->SetXY(30,216);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "[ $obj_23 ] ให้งานสหกิจศึกษาติดต่อกลับทางหมายเลข  $phonemore") );
        
    }

    function FootDoc(){
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,230);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'กรุณาส่งแบบตอบรับกลับมายังงานสหกิจศึกษา สำนักงานส่งเสริมวิชาการและงานทะเบียน' )  );
        $this->SetXY(30,237);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ภายใน 1 สัปดาห์ ด้วยจักขอบคุณยิ่ง") );
        $this->SetXY(30,244);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ทางอีเมลล์ : Wanalee.tv@bru.ac.th' )  );
        $this->SetXY(30,251);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ทางโทรสารหมายเลข 044 - 612858" ) );
        $this->SetXY(30,258);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เบอร์ติดต่อ 044-611221 ต่อ 7100" ) );
       
  
    }
}

if($input = $_POST)
{

$company_name = $_POST['company_name'];
$emp_name = $_POST['emp_name'];
$emp_position = $_POST['emp_position'];
$emp_phone = $_POST['emp_phone'];
$emp_fax = $_POST['emp_fax'];

$obj1 = ISSET($_POST['obj1']) ? ISSET($_POST['obj1']) : '';



$std_01 = $_POST['std_01'];
$std_submajor_01 = $_POST['std_submajor_01'];
$more_std01 = $_POST['more_std01'];

$std_02 = $_POST['std_02'];
$std_submajor_02 = $_POST['std_submajor_02'];
$more_std02 = $_POST['more_std02'];

$std_03 = $_POST['std_03'];
$std_submajor_03 = $_POST['std_submajor_03'];
$more_std03 = $_POST['more_std03'];

$std_04 = $_POST['std_04'];
$std_submajor_04 = $_POST['std_submajor_04'];
$more_std04 = $_POST['more_std04'];

$std_05 = $_POST['std_05'];
$std_submajor_05 = $_POST['std_submajor_05'];
$more_std05 = $_POST['more_std05'];

$std_06 = $_POST['std_06'];
$std_submajor_06 = $_POST['std_submajor_06'];
$more_std06 = $_POST['more_std06'];

$std_07 = $_POST['std_07'];
$std_submajor_07 = $_POST['std_submajor_07'];
$more_std07 = $_POST['more_std07'];

$std_08 = $_POST['std_08'];
$std_submajor_08 = $_POST['std_submajor_08'];
$more_std08 = $_POST['more_std08'];

$std_09 = $_POST['std_09'];
$std_submajor_09 = $_POST['std_submajor_09'];
$more_std09 = $_POST['more_std09'];

$std_10 = $_POST['std_10'];
$std_submajor_10 = $_POST['std_submajor_10'];
$more_std10 = $_POST['more_std10'];


$tellmore = $_POST['tellmore'];
$phonemore = $_POST['phonemore'];

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
$pdf->Line(30,64,185,64);
$pdf->SetLineWidth(0.1);


$pdf->Header();
$pdf->Date(DateThai($date));
$pdf->Title($company_name,$emp_name,$emp_position,$emp_phone,$emp_fax);
$pdf->Studentlist($std_01,$std_submajor_01,$more_std01,
$std_02,$std_submajor_02,$more_std02,
$std_03,$std_submajor_03,$more_std03,
$std_04,$std_submajor_04,$more_std04,
$std_05,$std_submajor_05,$more_std05,
$std_06,$std_submajor_06,$more_std06,
$std_07,$std_submajor_07,$more_std07,
$std_08,$std_submajor_08,$more_std08,
$std_09,$std_submajor_09,$more_std09,
$std_10,$std_submajor_10,$more_std10);

$pdf->MoreInfor($obj1,$tellmore,$phonemore);
$pdf->FootDoc();
$pdf->SetLineWidth(0.5);
$pdf->Line(30,226,185,226);
$pdf->Footer();

$pdf->Output();
}
?>