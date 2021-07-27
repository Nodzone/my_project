<?php
require('rotation.php');

class PDF extends PDF_Rotate
{   
    public $imageHeader;

    function setImageHeader($img)
    {
        $this->imageHeader = $img;
    }
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
            $this->Write(1,"BRU-Co8");
            $this->SetXY(65,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' แบบแจ้งรายละเอียดระหว่างการปฏิบัติงานสหกิจศึกษา' )  );
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
    function Intro(){
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetXY(30,68);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(ผู้ให้ข้อมูล : นักศึกษา) ' )  );
        
       
    }
   

    function Student($t_major,$major,$title_std,$std_full_name,$std_id,$fatory){
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,80);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เรียนงานสหกิจศึกษา $t_major คณะมหาวิทยาลัยราชภัฏบุรีรัมย์" )  );        
        $this->SetXY(30,87);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อ – นามสกุล : $title_std $std_full_name" )  );  
        $this->SetXY(90,87);   
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสประจำตัวนึกศึกษา : $std_id ") );  
        $this->SetXY(30,94);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หลักสูตร : $fatory ") );
        $this->SetXY(90,94);   
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "คณะ :$major ") );
    }
    function CompanyAddress($companyname,$add_number,$road,$alley,$subdistrict,$district,$province,$postcode,$phone,$fax){

        $this->SetXY(30,101);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อสถานประกอบการ(ไทยหรืออังกฤษ) : $companyname") );
        $this->SetXY(30,108);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ขอแจ้งรายละเอียดเกี่ยวกับที่อยู่สถานปฏิบัติงานที่ปฏิบัติงานสหกิจศึกษาดังนี้') );
        $this->SetXY(30,115);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เลขที่: $add_number ถนน: $road      ซอย: $alley  ตำบล:$subdistrict") );        
        $this->SetXY(30,122);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "อำเภอ: $district   จังหวัด: $province    รหัสไปรษณีย์: $postcode" )  );
        // $this->SetFont('THSarabun','',16);
        $this->SetXY(30,129);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรศัทพ์: $phone         โทรสาร: $fax" )  );
        $this->SetFont('THSarabun','U',16);
        $this->SetXY(30,136);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "แผนที่แสดงตำแหน่งที่ตั้งสถานปฏิบัติงาน" )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,143);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เพื่อความสะดวกในการนิเทศงานของคณาจารย์โปรดระบุชื่อถนนและสถานที่สำคัญใกล้เคียงที่สามารถ")  );
        $this->SetXY(30,150);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เข้าใจโดยง่าย ")  );
    } 
    
    

    function LocationCompany(){    
        //import qr core for google map
        $this->Image("uploads/$this->imageHeader",90,180,30,0,'');
    }


    function Buttom($std_full_name,$date){
        $this->SetXY(50,227);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '' )  );
        $this->SetXY(120,236);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "(ลงชื่อ) $std_full_name " ) );
        $this->SetXY(130,242);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($std_full_name)" )  );
        $this->SetXY(120,248);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "นักศึกษาผู้ปฏิบัติงานสหกิจศึกษา" )  );
        $this->SetXY(120,254);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date " )  );
    }
}


if($input = $_POST)
{

$title_std = $_POST['title_std'];
$std_full_name = $_POST['std_full_name'];
$t_major = $_POST['t_major'];
$fatory = $_POST['fatory'];
$major = $_POST['major'];
$std_id = $_POST['std_id'];
$companyname = $_POST['companyname'];
$add_number = $_POST['add_number'];
$road = $_POST['road'];
$alley = $_POST['alley'];
$subdistrict = $_POST['subdistrict'];
$district = $_POST['district'];
$province = $_POST['province'];
$postcode = $_POST['postcode'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];


$date = $_POST['date_in'];


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

$pdf = new PDF();

if(isset($_FILES['qr_code']['name'])) {
	// foreach ($_FILES['profile']['name'] as $index=>$file) {
    $file = $_FILES['qr_code']['name'];
   
    if(move_uploaded_file($_FILES["qr_code"]["tmp_name"],"uploads/".$file)) // Upload/Copy
    {
      
        $pdf->setImageHeader($file);
        
    }
	// }
}

$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.5);
$pdf->Line(30,60,180,60);
$pdf->Header();
$pdf->Intro();

$pdf->Student($t_major,$major,$title_std,$std_full_name,$std_id,$fatory);
$pdf->CompanyAddress($companyname,$add_number,$road,$alley,$subdistrict,$district,$province,$postcode,$phone,$fax);
$pdf->SetLineWidth(0.1);
$pdf->Rect(30,160,150,65);
$pdf->LocationCompany();
$pdf->Buttom($std_full_name,DateThai($date));
$pdf->Footer();

$pdf->Output();
}
?>