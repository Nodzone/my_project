<?php
require('rotation.php');




class PDF_Title extends PDF_Rotate 
{   
    
 
    function RotatedText($x,$y,$txt,$angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle,$x,$y);
        $this->Text($x,$y,$txt);
        $this->Rotate(0);
    }
	//Override คำสั่ง (เมธอด) Header
	function Head(){
        if($this->page==1)
        {
            $this->AddFont('THSarabun','','THSarabun.php');
            $this->SetFont('THSarabun','',150);
            $this->SetTextColor(255,192,203);
            // $this->RotatedText(35,190,iconv('UTF-8','cp874',"ตัวอย่างเอกสาร"),45);
            $this->SetTextColor(0,0,0);
            $this->SetFont('THSarabun','',16);
            $this->Image('logo.png',90,15,30,0,'');
            $this->SetXY(30,41);
            $this->Write(1,iconv('UTF-8','cp874',"ที่ อว  ๐๖๒๔.๑๐/๒๗"));
            $this->SetXY(150,41);
            $this->Write(1,iconv('UTF-8','cp874',"มหาวิทยาลัยราชภัฏบุรีรัมย์"));
            $this->SetXY(150,46);
            $this->Write(1,iconv('UTF-8','cp874',"ถนนจิระ อำเภอเมืองบุรีรัมย์ "));
            $this->SetXY(150,51);
            $this->Write(1,iconv('UTF-8','cp874',"จังหวัดบุรีรัมย์ ๓๑๐๐๐ "));
            //input valume
            
            
            
		//พิมพ์ตัวหนังสือตัวเอียงๆ ที่ตำแหน่งเยื้องขอบกระดาษซ้าย 5หน่วย ขอบกระดาษบน 5หน่วย
        }
		//ปัดบรรทัด กำหนดความกว้างของบรรทัด 20หน่วย
		//$this->Ln(20);
    }
    
    function Date($date){
        $this->SetXY(105,60);
        $this->Write(1,iconv('UTF-8','cp874',"$date"));
    }

    function Title($to_name)
    {
        $this->SetTextColor(0,0,0);
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,70);
        $this->Write(1,iconv('UTF-8','cp874',"เรื่อง ขอความอนุเคราะห์รับนักศึกษาสหกิจศึกษาเข้าปฏิบัติงาน"));
        //input valume
        $this->SetXY(30,80);
        $this->Write(1,iconv('UTF-8','cp874',"เรียน $to_name"));
        $this->SetXY(30,90);
        $this->Write(1,iconv('UTF-8','cp874',"สิ่งที่ส่งมาด้วย"));
        $this->SetXY(65,90);
        $this->Write(1,iconv('UTF-8','cp874',"๑.   ใบสมัครงานสหกิจศึกษา          จำนวน ๑ ชุด"));
        $this->SetXY(65,95);
        $this->Write(1,iconv('UTF-8','cp874',"๒.   ใบตอบรับ                            จำนวน ๑ ฉบับ"));
        $this->SetXY(65,100);
        $this->Write(1,iconv('UTF-8','cp874',"๓.   แบบสามถามข้อมูลลักษณะงานของสหกิจศึกษา   จำนวน ๑ ฉบับ"));
        $this->SetXY(30,105);
        
    }
    
    function Body($tdoc_std_submajor, $tdoc_std_major){
        //input valume
        $this->SetXY(40,110);
        $this->Write(1,iconv('UTF-8','cp874',"ด้วยภาคเรียนที่ ๒ ปีการศึกษา ๒๕๖๒ นักศึกษาภาคปกติสาขาวิชา $tdoc_std_submajor"));
        //input valume
        $this->SetXY(30,116);
        $this->Write(1,iconv('UTF-8','cp874',"คณะ$tdoc_std_major มหาวิทยาลัยราชภัฏบุรีรัมย์ จะต้องออกปฏิบัติงานสหกิจศึกษาในหน่วยงานต่าง ๆ"));

        $this->SetXY(30,122);
        $this->Write(1,iconv('UTF-8','cp874',"ระหว่างวันที่ ๓ ธันวาคม ๒๕๖๒ - ๒๒ มีนาคม ๒๕๖๓ นักศึกษามีความสนใจที่จะปฏิบัติงานใน"));
        $this->SetXY(30,128);
        $this->Write(1,iconv('UTF-8','cp874',"หน่วยงานของท่าน โดยยินดีที่จะปฏิบัติตามเงื่อนไขของหน่วยงานทุกประการ ดังนั้น มหาวิทยาลัย"));
        $this->SetXY(30,134);
        $this->Write(1,iconv('UTF-8','cp874',"จึงขอความอนุเคราะห์หน่วยงานของท่านรับนักศึกษาสหกิจศึกษา ดังมีรายชื่อต่อไปนี้"));
        //input valume
    }

    function Student($tdoc_std_titlename, $tdoc_std_name){
        $this->SetXY(50,144);
        $this->Write(1,iconv('UTF-8','cp874',"$tdoc_std_titlename $tdoc_std_name"));

        $this->SetXY(30,154);
        $this->Write(1,iconv('UTF-8','cp874',"จึงเรียนมาเพื่อโปรดพิจาณา มหาวิทยาลัยหวังเป็นอย่างยิ่งว่าคงได้รับความร่วมมือจากท่านด้วยดี"));
        $this->SetXY(30,160);
        $this->Write(1,iconv('UTF-8','cp874',"หากไม่ขัดข้องโปรดกรอกแบบตอบรับที่แนบมาพร้อมนี้ เพื่อที่มหาวิทยาลัยจะได้ทำหนังสือส่งตัวนักศึกษา"));
        $this->SetXY(30,166);
        $this->Write(1,iconv('UTF-8','cp874',"เข้าฝึกงานสหกิจศึึกษาตามระเบียบมหาวิทยาลัยต่อไป และขอขอบคุณในความร่วมมือมา ณ โอกาสนี้"));
        $this->Ln();

    }

    function Licesen($title_pr,$pr_fullname)
    {
        $this->SetXY(112,185);
        $this->Write(1,iconv('UTF-8','cp874',"ขอแสดงความนับถือ"));
        $this->SetXY(105,210);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , " ($title_pr $pr_fullname)" )  );
        $this->SetXY(100,217);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'อธิการบดีมหาวิทยาลัยราชภัฏบุรีรัมย์' )  );
 
        //$this->Write( 1  , iconv( 'UTF-8','cp874' , ' www.select2web.com ' ) );
        
    }

    function Foot(){
       
            $this->SetXY(30,255);            
            $this->Write(1,iconv('UTF-8','cp874',"สำนักงานส่งเสริมวิชาการและงานทะเบียน"));
            $this->SetXY(30,260);
            $this->Write(1,iconv('UTF-8','cp874',"โทร. ๐ ๔๔๖๑ ๑๒๒๑ ต่อ ๓๒๑๑,๓๒๑๙"));
            $this->SetXY(30,265);
            $this->Write(1,iconv('UTF-8','cp874',"โทรสาร. ๐ ๔๔๖๑ ๒๘๕๘"));
            // $this->SetXY(30,220); เว้นมา 3 cm. ลงมา 22 cm.
    }
 
}

if($input = $_POST)
{

$to_name = $_POST['to_name'];
$tdoc_std_titlename = $_POST['tdoc_std_titlename'];
$tdoc_std_name = $_POST['tdoc_std_name'];
$tdoc_std_submajor = $_POST['tdoc_std_submajor'];
$tdoc_std_major = $_POST['tdoc_std_major'];
$title_pr = $_POST['title_pr'];
$pr_fullname = $_POST['pr_fullname'];


$date = $_POST['date'];

function DateThai($date, $type = 'date')
{

    $date = date('Y-n-j H:i:s', strtotime($date));
    $TH_Day = array(null, "๑","๒","๓","๔","๕","๖","๗","๘","๙","๑๐","๑๑","๑๒","๑๓","๑๔","๑๕","๑๖","๑๗","๑๘","๑๙","๒๐","๒๑","๒๒","๒๓","๒๔","๒๕","๒๖","๒๗","๒๘","๒๙","๓๐","๓๑");
    $TH_Month = array(null, "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    
    function ThainumDigit($num){

        return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
    
        array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
    
        $num);
    
    }


    //$TH_Year = array(null, "๑","๒","๓","๔","๕","๖","๗","๘","๙","๐");
    $dateFullArr = explode(' ', $date);
    $dateFull = explode('-', $dateFullArr[0]);
    $dateTime = $dateFullArr[1];
    $yearThai = ThainumDigit($dateFull[0] + 543);
    $monthThai = $TH_Month[$dateFull[1]];
    $day = $TH_Day[$dateFull[2]];

    switch ($type) {
        case 'date':
            return $day . ' ' . $monthThai . ' ' . $yearThai;
            break;
        case 'time':
        return $day . ' เดือน ' . $monthThai . ' พ.ศ. ' . $yearThai . ' ' . $dateTime;
            break;
    }

}

 
//เรียกใช้งาน เราจะเรียกใช้คลาสใหม่ของเราแทน
$pdf=new PDF_Title();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Head();
$pdf->Date(DateThai($date));
$pdf->Title($to_name);
$pdf->Body($tdoc_std_submajor, $tdoc_std_major);
$pdf->Student($tdoc_std_titlename, $tdoc_std_name);
$pdf->Licesen($title_pr,$pr_fullname);
$pdf->Foot();

$pdf->Output();
// กรณีต้องการ ดาวโหลดให้เปิดใช้ด้านล่าง
// $pdf->Output( 'doc/title.pdf' , 'D' );
}
?>