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
            $this->Write(1,"BRU-Co11");
            $this->SetXY(70,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' แบบแจ้งโครงร่างรายงานการปฏิบัติงาน' )  );
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
    
    function Title(){
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetXY(30,68);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(ผู้ให้ข้อมูล: นักศึกษาร่วมกับพนักงานที่ปรึกษา) ' )  );
        $this->SetXY(30,75);
        $this->SetFont('THSarabun Bold','U',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'คำชี้แจง ' )  );
    }

    function Intro(){
        $this->SetFont('THSarabun','',16);
        $this->SetXY(43,82);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'รายงานถือเป็นส่วนหนึ่งของการปฏิบัติงานสหกิจศึกษามีวัตถุประสงค์เพื่อฝึกฝนทักษะการสื่อสาร  ' )  );
        $this->SetXY(30,89);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(Communication Skill)ของนักศึกษาและจัดทำข้อมูลที่เป็นประโยชน์สำหรับสถานปฏิบัติงานนักศึกษาจะ' )  );
        $this->SetXY(30,96);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ต้องขอรับคำปรึกษาจากพนักงานที่ปรึกษา(Job Supervisor)เพื่อกำหนดหัวข้อรายงานที่เหมาะสมโดยคำนึงถึง' )  );
        $this->SetXY(30,103);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ความต้องการของสถานปฏิบัติงานเป็นหลัก ตัวอย่างของรายงาน ได้แก่ ผลงานวิจัยที่นักศึกษาปฏิบัติรายงาน' )  );
        $this->SetXY(30,110);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'วิชาการที่น่าสนใจ การสรุปข้อมูลหรือสถิติบางประการ การวิเคราะห์และประเมินผลข้อมูล เป็นต้น ' )  );
        $this->SetXY(30,117);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ทั้งนี้รายงานอาจจะจัดทำเป็นกลุ่มของนักศึกษาสหกิจศึกษามากกว่า 1 คนก็ได้' )  );
        $this->SetXY(43,124);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ในกรณีที่สถานปฏิบัติงานไม่ต้องการรายงานในหัวข้อข้างต้น นักศึกษาจะต้องพิจารณาเรื่องที่ตนสนใจ  ' )  );
        $this->SetXY(30,131);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'และหยิบยกมาทำรายงานโดยปรึกษากับพนักงานที่ปรึกษาเสียก่อน ตัวอย่างหัวข้อที่จะใช้เขียนรายงาน ได้แก่' )  );
        $this->SetXY(30,139);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'รายงานวิชาการที่นักศึกษาสนใจรายงานการปฏิบัติงานที่ได้รับมอบหมายหรือแผนและวิธีการปฏิบัติงานที่จะทำ' )  );
        $this->SetXY(30,146);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ให้บรรลุถึงวัตถุประสงค์ของการเรียนรู้ที่นักศึกษาวางเป้าหมายไว้จากการปฏิบัติงานสหกิจศึกษาครั้งนี้ ' )  );
        $this->SetXY(30,153);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(Learning Objectives) เมื่อกำหนดหัวข้อได้แล้วให้นักศึกษาจัดทำโครงร่างของเนื้อหารายงานพอสังเขปตาม ' )  );
        $this->SetXY(30,160);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'แบบฟอร์ม Work Term Report Outline ฉบับนี้ทั้งนี้ให้ปรึกษากับพนักงานที่ปรึกษาเสียก่อนแล้วจึงส่งกลับมายัง' )  );
        $this->SetXY(30,167);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'โครงการสหกิจศึกษาภายใน 2 สัปดาห์แรกของการปฏิบัติงาน' )  );
        $this->SetXY(43,174);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'โครงการสหกิจศึกษาจะรวบรวมนำเสนออาจารย์ที่ปรึกษาสหกิจศึกษาเพื่อพิจารณาหากอาจารย์มี' )  );
        $this->SetXY(30,181);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ข้อเสนอแนะใด ๆ ก็จะส่งกลับมาให้นักศึกษาทราบภายใน 2 สัปดาห์ และเพื่อมิให้เป็นการเสียเวลา นักศึกษา' )  );
        $this->SetXY(30,189);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ควรดำเนินการเขียนรายงานโดยทันที' )  );
    }
    function StudentInfor($std_fullname,$std_id,$std_submajor,$std_major,$companyname,$num,$road,$soi,$subdistrict,$district,$province,$postcard,$phone,$fax){
        $this->SetXY(30,199);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อ – นามสกุล (นักศึกษา):  $std_fullname รหัสประจำตัว: $std_id " )  );
        $this->SetXY(30,206);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "สาขาวิชา : $std_submajor  คณะ : $std_major" )  );
        $this->SetXY(30,213);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ปฏิบัติงานสหกิจศึกษา ณ (ชื่อสถานปฏิบัติงาน) : $companyname" )  );
        $this->SetXY(30,220);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เลขที่ :$num ถนน : $road ซอย : $soi ตำบล/แขวง : $subdistrict" )  );
        $this->SetXY(30,227);
        $this->Write( 1  , iconv( 'UTF-8','cp874' ,"อำเภอ/เขต : $district จังหวัด: $province รหัสไปรษณีย์ : $postcard " )  );
        $this->SetXY(30,234);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรศัพท์ : $phone โทรสาร : $fax")  );
        
    }
    
    function TitleReport($std_fullname,$t_thai,$t_eng,$emp_fullname,$date,$emp_position,$detail){
        $this->SetXY(30,30);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ขอแจ้งรายละเอียดเกี่ยวกับโครงร่างรายงานการปฏิบัติงานสหกิจศึกษาดังนี้' )  );
        $this->SetXY(30,37);
        $this->SetFont('THSarabun Bold','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '1. หัวข้อรายงาน (Report Title)' )  );
        $this->SetXY(83,37);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'อาจจะขอเปลี่ยนแปลงหรือแก้ไขเพิ่มเติมได้ในภายหลัง' )  );
        $this->SetXY(30,44);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ภาษาไทย : $t_thai " )  );
        $this->SetXY(30,51);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ภาษาอังกฤษ : $t_eng " )  );
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,58);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '2. รายละเอียดเนื้อหาของรายงาน' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(83,58);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(อาจจะขอเปลี่ยนแปลงหรือแก้ไขเพิ่มเติมได้ในภายหลัง)' )  );
        $this->SetXY(30,65);
        $this->MultiCell( 145  , 5 , iconv( 'UTF-8','cp874' , "$detail" ) );;
        $this->SetXY(30,240);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ลงชื่อ) $std_fullname (นักศึกษา)" )  );
        $this->SetXY(100,240);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ลงชื่อ) $emp_fullname" )  );
        $this->SetXY(150,240);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(พนักงานที่ปรึกษา)" )  );
        $this->SetXY(40,247);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($std_fullname)" )  );
        $this->SetXY(105,247);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($emp_fullname )" )  );
        $this->SetXY(30,254);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date" )  );
        $this->SetXY(100,254);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ตำแหน่ง $emp_position" )  );
        $this->SetXY(100,260);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date" )  );
    }

}
if ($input = $_POST)
{
    
    //StudentInfor
$std_fullname = $_POST['std_fullname'];
$std_id = $_POST['std_id'];
$std_submajor = $_POST['std_submajor'];
$std_major = $_POST['std_major'];
$companyname = $_POST['companyname'];
$num = $_POST['num'];
$road = $_POST['road'];
$soi = $_POST['soi'];
$subdistrict = $_POST['subdistrict'];
$district = $_POST['district'];
$province = $_POST['province'];
$postcard = $_POST['postcard'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];


//TitleReport

$detail = $_POST['detail'];
$t_thai = $_POST['t_thai'];
$t_eng = $_POST['t_eng'];
$emp_fullname = $_POST['emp_fullname'];
$date = $_POST['date'];
$emp_position = $_POST['emp_position'];



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
        return $day . 'เดือน' . $monthThai . ' พ.ศ. ' . $yearThai . ' ' . $dateTime;
            break;
    }
    
}

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.5);
$pdf->Line(30,63,180,63);
$pdf->Header();
$pdf->Footer();
$pdf->Title();
$pdf->Intro();
$pdf->StudentInfor($std_fullname,$std_id,$std_submajor,$std_major,$companyname,$num,$road,$soi,$subdistrict,$district,$province,$postcard,$phone,$fax);
// New Page!
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.1);
$pdf->Rect(30,33,150,200);
$pdf->Rect(30,33,150,8);
$pdf->Rect(30,41,150,14);
$pdf->Rect(30,55,150,7);
$pdf->TitleReport($std_fullname,$t_thai,$t_eng,$emp_fullname,DateThai($date),$emp_position,$detail);

$pdf->Output();
}
?>