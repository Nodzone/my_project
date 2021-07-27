<?php

require 'rotation.php';

class PDF extends PDF_Rotate
{
    public function RotatedText($x, $y, $txt, $angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }

    //Override คำสั่ง (เมธอด) Header
    public function Header()
    {
        if ($this->page == 1) {
            $this->AddFont('THSarabun', '', 'THSarabun.php');
            $this->SetFont('THSarabun', '', 100);
            $this->SetTextColor(255, 192, 203);
            // $this->RotatedText(35,190,iconv('UTF-8','cp874',"ตัวอย่างเอกสาร"),45);
            $this->SetTextColor(0, 0, 0);
            $this->SetFont('THSarabun', '', 16);
            $this->Image('logo_bru.jpg', 90, 15, 25, 0, '');
            $this->SetXY(155, 20);
            $this->Write(1, 'BRU-Co9');
            $this->SetXY(65, 50);
            $this->Write(1, iconv('UTF-8', 'cp874', ' แบบแจ้งรายละเอียดงานตำแหน่งพนักงานที่ปรึกษา'));
            $this->SetXY(73, 55);
            $this->Write(2, iconv('UTF-8', 'cp874', 'สหกิจศึกษา มหาวิทยาลัยราชภัฏบุรีรัมย์'));

            //พิมพ์ตัวหนังสือตัวเอียงๆ ที่ตำแหน่งเยื้องขอบกระดาษซ้าย 5หน่วย ขอบกระดาษบน 5หน่วย
        }
        //ปัดบรรทัด กำหนดความกว้างของบรรทัด 20หน่วย
        //$this->Ln(20);
    }

    public function Footer()
    {
        $this->SetAutoPageBreak(0);
        $this->SetY(-10); //dกำหนดการเยื้อง 10 มม.
        $this->SetFont('THSarabun', '', 5);
        $this->Cell(0, 10, 'https://www.bru.ac.th', 0, 0, 'L');
        $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    public function Intro()
    {
        $this->AddFont('THSarabun', '', 'THSarabun.php');
        $this->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
        $this->SetXY(30, 68);
        $this->SetFont('THSarabun', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', '(ผู้ให้ข้อมูล: ผู้จัดการฝ่ายบุคคลและหรือพนักงานที่ปรึกษา) '));
        $this->SetXY(30, 75);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', 'คำชี้แจง '));
    }

    public function Title()
    {
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 80);
        $this->Write(1, iconv('UTF-8', 'cp874', 'เพื่อให้การประสานงานระหว่างโครงการสหกิจศึกษาและสถานปฏิบัติงานเป็นไปโดยความเรียบร้อย'));
        $this->SetXY(30, 87);
        $this->Write(1, iconv('UTF-8', 'cp874', 'และมีประสิทธิภาพจึงใคร่ของความกรุณาผู้จัดการฝ่ายบุคคลหรือผู้ที่รับผิดชอบดูแลการปฏิบัติงานของนักศึกษา'));
        $this->SetXY(30, 94);
        $this->Write(1, iconv('UTF-8', 'cp874', 'สหกิจศึกษาได้โปรดประสานงานกับพนักงานที่ปรึกษา (Job Supervisor) เพื่อจัดทำข้อมูลตำแหน่งงานลักษณะ'));
        $this->SetXY(30, 101);
        $this->Write(1, iconv('UTF-8', 'cp874', 'งานและพนักงานที่ปรึกษา(Job Position, Job Description and Job Supervisor)ตามแบบฟอร์มฉบับนี้และ'));
        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(70, 108);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ขอได้โปรดส่งกลับคืนให้โครงการสหกิจศึกษา'));
        $this->SetXY(75, 115);
        $this->Write(1, iconv('UTF-8', 'cp874', 'มหาวิทยาลัยราชภัฏบุรีรัมย์'));
    }

    public function Body($major_name, $companyname_thai, $companyname_eng, $num, $road, $soi, $subdistrict, $district, $province, $postcard, $phone, $fax)
    {
        $this->SetXY(30, 122);
        $this->Write(1, iconv('UTF-8', 'cp874', "เรียนคณบดีคณะ $major_name"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(30, 129);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ขอแจ้งรายละเอียดเกี่ยวกับตำแหน่งงาน ลักษณะงานและพนักงานที่ปรึกษา ดังนี้'));
        $this->SetXY(30, 136);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ชื่อที่อยู่ของสถานปฏิบัติงาน'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(30, 143);
        $this->Write(1, iconv('UTF-8', 'cp874', 'โปรดให้ชื่อที่เป็นทางการเพื่อจะนำไประบุในใบรับรองภาษาอังกฤษให้แก่นักศึกษาได้อย่างถูกต้อง'));
        $this->SetXY(30, 150);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ที่อยู่ (เพื่อประกอบการเดินทางไปนิเทศงานนักศึกษาที่ถูกต้องโปรดระบุที่อยู่ตามสถานที่ที่นักศึกษาปฏิบัติงาน)'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(30, 157);
        $this->Write(1, iconv('UTF-8', 'cp874', "สถานปฏิบัติงาน (ภาษาไทย) : $companyname_thai"));
        $this->SetXY(30, 164);
        $this->Write(1, iconv('UTF-8', 'cp874', "(ภาษาอังกฤษ): $companyname_eng"));
        $this->SetXY(30, 171);
        $this->Write(1, iconv('UTF-8', 'cp874', "เลขที่ : $num ถนน : $road ซอย : $soi ตำบล/แขวง : $subdistrict"));
        $this->SetXY(30, 178);
        $this->Write(1, iconv('UTF-8', 'cp874', "อำเภอ/เขต : $district จังหวัด: $province รหัสไปรษณีย์ : $postcard "));
        $this->SetXY(30, 185);
        $this->Write(1, iconv('UTF-8', 'cp874', "โทรศัพท์ : $phone โทรสาร : $fax"));
    }

    public function ManagerInfor($obj1, $mng_name, $mng_position, $mng_phone, $mng_fax, $mng_mail, $ct_name, $ct_position, $ct_group, $ct_phone, $ct_fax, $ct_mail)
    {
        if ($obj1 == 1) {
            $obj_21 = '•';
            $obj_22 = '';
        } elseif ($obj1 == 2) {
            $obj_21 = '';
            $obj_22 = '•';
        }
        $this->SetXY(30, 195);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ผู้จัดการทั่วไป / ผู้จัดการโรงงาน และผู้ได้รับมอบหมายให้ประสานงาน'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(30, 202);
        $this->Write(1, iconv('UTF-8', 'cp874', "ชื่อผู้จัดการสถานปฏิบัติงาน : $mng_name "));
        $this->SetXY(30, 209);
        $this->Write(1, iconv('UTF-8', 'cp874', "ตำแหน่ง : $mng_position"));
        $this->SetXY(30, 216);
        $this->Write(1, iconv('UTF-8', 'cp874', "โทรศัพท์ : $mng_phone โทรสาร : $mng_fax E-mail : $mng_mail"));
        $this->SetXY(30, 223);
        $this->Write(1, iconv('UTF-8', 'cp874', 'การติดต่อประสานงานกับมหาวิทยาลัย (การนิเทศงานนักศึกษาและอื่นๆ) ขอมอบให้'));
        $this->SetXY(30, 230);
        $this->Write(1, iconv('UTF-8', 'cp874', "[$obj_21] ติดต่อกับผู้จัดการโดยตรง"));
        $this->SetXY(30, 237);
        $this->Write(1, iconv('UTF-8', 'cp874', "[$obj_22] มอบหมายให้บุคคลต่อไปนี้ประสานงานแทน "));
        $this->SetXY(30, 244);
        $this->Write(1, iconv('UTF-8', 'cp874', "ชื่อ – นามสกุล : $ct_name "));
        $this->SetXY(30, 251);
        $this->Write(1, iconv('UTF-8', 'cp874', "ตำแหน่ง : $ct_position"));
        $this->SetXY(80, 251);
        $this->Write(1, iconv('UTF-8', 'cp874', "แผนก : $ct_group "));
        $this->SetXY(30, 258);
        $this->Write(1, iconv('UTF-8', 'cp874', "โทรศัพท์ :$ct_phone"));
        $this->SetXY(80, 258);
        $this->Write(1, iconv('UTF-8', 'cp874', "โทรสาร : $ct_fax "));
        $this->SetXY(130, 258);
        $this->Write(1, iconv('UTF-8', 'cp874', "E-mail : $ct_mail"));
    }
}

if ($input = $_POST) {
    //Body
    $major_name = $_POST['major_name'];
    $companyname_thai = $_POST['companyname_thai'];
    $companyname_eng = $_POST['companyname_eng'];
    $num = $_POST['num'];
    $road = $_POST['road'];
    $soi = $_POST['soi'];
    $subdistrict = $_POST['subdistrict'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $postcard = $_POST['postcard'];
    $phone = $_POST['phone'];
    $fax = $_POST['fax'];

    // ManagerInfor
    $obj1 = $_POST['obj1'];
    $mng_name = $_POST['mng_name'];
    $mng_position = $_POST['mng_position'];
    $mng_phone = $_POST['mng_phone'];
    $mng_fax = $_POST['mng_fax'];
    $mng_mail = $_POST['mng_mail'];
    $ct_name = $_POST['ct_name'];
    $ct_position = $_POST['ct_position'];
    $ct_group = $_POST['ct_group'];
    $ct_phone = $_POST['ct_phone'];
    $ct_fax = $_POST['ct_fax'];
    $ct_mail = $_POST['ct_mail'];

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('P', 'A4');
    $pdf->SetLineWidth(0.5);
    $pdf->Line(30, 63, 190, 63);
    $pdf->Header();
    $pdf->Intro();
    $pdf->Title();
    $pdf->SetLineWidth(0.1);
    $pdf->Rect(30, 134, 160, 55);
    $pdf->Rect(30, 134, 160, 20);
    $pdf->Body($major_name, $companyname_thai, $companyname_eng, $num, $road, $soi, $subdistrict, $district, $province, $postcard, $phone, $fax);
    $pdf->ManagerInfor($obj1, $mng_name, $mng_position, $mng_phone, $mng_fax, $mng_mail, $ct_name, $ct_position, $ct_group, $ct_phone, $ct_fax, $ct_mail);
    $pdf->Rect(30, 192, 160, 72);
    $pdf->Rect(30, 192, 160, 7);
    $pdf->Footer();

    $pdf->Output();
}
