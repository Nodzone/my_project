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
            $this->AddFont('THSarabun Bold', '', 'THSarabun Bold.php');
            $this->AddFont('THSarabun', '', 'THSarabun.php');
            $this->SetFont('THSarabun', '', 100);
            $this->SetTextColor(255, 192, 203);
            // $this->RotatedText(35,190,iconv('UTF-8','cp874',"ตัวอย่างเอกสาร"),45);
            $this->SetTextColor(0, 0, 0);
            $this->SetFont('THSarabun', '', 16);
            $this->Image('logo_bru.jpg', 90, 20, 20, 0, '');
            $this->SetXY(155, 20);
            $this->Write(1, 'BRU-Co14');
            $this->SetXY(70, 50);
            $this->Write(1, iconv('UTF-8', 'cp874', 'แบบประเมินรายงานนักศึกษาสหกิจศึกษา'));
            $this->SetXY(70, 55);
            $this->Write(1, iconv('UTF-8', 'cp874', 'สหกิจศึกษา มหาวิทยาลัยราชภัฏบุรีรัมย์'));
        }
    }

    public function Footer()
    {
        $this->SetAutoPageBreak(0);
        $this->SetY(-10); //dกำหนดการเยื้อง 10 มม.
        $this->SetFont('THSarabun', '', 5);
        $this->Cell(0, 10, 'https://www.bru.ac.th', 0, 0, 'L');
        $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    public function Title()
    {
        $this->SetFont('THSarabun Bold', 'U', 18);
        $this->SetXY(30, 65);
        $this->Write(1, iconv('UTF-8', 'cp874', 'คำชี้แจง'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 72);
        $this->Write(1, iconv('UTF-8', 'cp874', '1. ผู้ให้ข้อมูลในแบบประเมินนี้ต้องเป็นพนักงานที่ปรึกษา (Job Supervisor) ของนักศึกษา'));
        $this->SetXY(50, 79);
        $this->Write(1, iconv('UTF-8', 'cp874', 'สหกิจศึกษาหรือบุคคลที่ได้รับมอบหมายให้ทำหน้าที่แทน'));
        $this->SetXY(45, 86);
        $this->Write(1, iconv('UTF-8', 'cp874', '2. แบบประเมินผลนี้มีทั้งหมด 14 ข้อ โปรดให้ข้อมูลครบทุกข้อเพื่อความสมบูรณ์ของการ'));
        $this->SetXY(50, 93);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ประเมินผล'));
        $this->SetXY(45, 100);
        $this->Write(1, iconv('UTF-8', 'cp874', '3. โปรดให้คะแนนในช่อง [ ] ในแต่ละหัวข้อการประเมิน หากไม่มีข้อมูลให้ใส่เครื่องหมาย -'));
        $this->SetXY(50, 107);
        $this->Write(1, iconv('UTF-8', 'cp874', 'และโปรดให้ความคิดเห็นเพิ่มเติม (ถ้ามี)'));
        $this->SetXY(45, 114);
        $this->Write(1, iconv('UTF-8', 'cp874', '4.  เมื่อประเมินผลเรียบร้อยแล้ว โปรดนำเอกสารนี้ใส่ซองประทับตราลับ และให้นักศึกษา'));
        $this->SetXY(50, 121);
        $this->Write(1, iconv('UTF-8', 'cp874', 'นำส่งงานสหกิจศึกษาคณะ ทันทีที่กลับมหาวิทยาลัย'));
    }

    public function NomalInfor($std_fullname, $std_id, $fatory, $major, $company_name, $emp_name, $emp_position, $emp_group)
    {
        $this->SetFont('THSarabun Bold', '', 18);
        $this->SetXY(30, 131);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ข้อมูลทั่วไป / '));
        $this->SetXY(60, 131);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', 'Work Tern Information'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(30, 138);
        $this->Write(1, iconv('UTF-8', 'cp874', "ชื่อ – นามสกุลนักศึกษา : $std_fullname รหัสประจำตัว : $std_id"));
        $this->SetXY(30, 145);
        $this->Write(1, iconv('UTF-8', 'cp874', "หลักสูตร : $fatory คณะ : $major "));
        $this->SetXY(30, 152);
        $this->Write(1, iconv('UTF-8', 'cp874', "ชื่อสถานประกอบการ : $company_name "));
        $this->SetXY(30, 159);
        $this->Write(1, iconv('UTF-8', 'cp874', "ชื่อ – นามสกุลผู้ประเมิน : $emp_name "));
        $this->SetXY(30, 166);
        $this->Write(1, iconv('UTF-8', 'cp874', "ตำแหน่ง : $emp_position แผนก : $emp_group"));
    }

    public function ReportTitle($thai_title, $eng_title)
    {
        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(30, 176);
        $this->Write(1, iconv('UTF-8', 'cp874', 'หัวข้อรายงาน / '));
        $this->SetXY(60, 176);
        $this->Write(1, iconv('UTF-8', 'cp874', 'Report title'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(30, 183);
        $this->Write(1, iconv('UTF-8', 'cp874', "ภาษาไทย/Thai : $thai_title"));
        $this->SetXY(30, 190);
        $this->Write(1, iconv('UTF-8', 'cp874', "ภาษาอังกฤษ/English: $eng_title"));
    }

    public function CommentPart1($p1, $p2, $p3, $p4, $cm1, $cm2, $cm3, $cm4)
    {
        $this->Rect(28, 200, 160, 70); //กรอบ
        $this->SetXY(28, 200);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Cell(160, 7, iconv('UTF-8', 'cp874', 'หัวข้อประเมิน / Items'), 1, 1, 'C');
        $this->SetFont('THSarabun', '', 16);

        $this->SetXY(30, 210);
        $this->Write(1, iconv('UTF-8', 'cp874', "1.  วิธีการศึกษา (Method of Education)                              [ $p1 / 10 คะแนน ]"));
        $this->SetXY(30, 217);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm1"));
        $this->SetXY(30, 224);
        $this->Write(1, iconv('UTF-8', 'cp874', "2.  กิตติกรรมประกาศ (Acknowledgement)                              [ $p2 / 5 คะแนน ]"));
        $this->SetXY(30, 231);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm2"));
        $this->SetXY(30, 239);
        $this->Write(1, iconv('UTF-8', 'cp874', "3.  บทคัดย่อ (Abstract)                                            [ $p3 / 10 คะแนน ]"));
        $this->SetXY(30, 246);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm3"));
        $this->SetXY(30, 253);
        $this->Write(1, iconv('UTF-8', 'cp874', "4.  สารบัญ สารบัญรูป และสารบัญตาราง (Table of Contents)              [ $p4 / 5 คะแนน ]"));
        $this->SetXY(30, 260);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm4"));
    }

    public function CommentPart2($p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $cm5, $cm6, $cm7, $cm8, $cm9, $cm10, $cm11, $cm12, $cm13, $cm14)
    {
        $this->Rect(28, 30, 160, 160); //กรอบ
        $this->SetXY(28, 30);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Cell(160, 7, iconv('UTF-8', 'cp874', 'หัวข้อประเมิน / Items'), 1, 1, 'C');
        $this->SetFont('THSarabun', '', 16);

        $this->SetXY(30, 47);
        $this->Write(1, iconv('UTF-8', 'cp874', "5. วัตถุประสงค์ (Objectives)                              [ $p5 / 5 คะแนน ]"));
        $this->SetXY(30, 54);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm5"));
        $this->SetXY(30, 61);
        $this->Write(1, iconv('UTF-8', 'cp874', "6.  ผลการศึกษา (Result)                              [ $p6 / 10 คะแนน ]"));
        $this->SetXY(30, 69);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm6"));
        $this->SetXY(30, 76);
        $this->Write(1, iconv('UTF-8', 'cp874', "7.  วิเคราะห์ผลการศึกษา (Analysis)                                           [ $p7  / 10 คะแนน ]"));
        $this->SetXY(30, 83);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm7"));
        $this->SetXY(30, 90);
        $this->Write(1, iconv('UTF-8', 'cp874', "8.  สรุปผลการศึกษา (Conclusion)             [ $p8 / 10 คะแนน ]"));
        $this->SetXY(30, 97);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm8"));

        $this->SetXY(30, 104);
        $this->Write(1, iconv('UTF-8', 'cp874', "9.  ข้อเสนอแนะ (Comment)                             [ $p9 / 5 คะแนน ]"));
        $this->SetXY(30, 111);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm9"));
        $this->SetXY(30, 118);
        $this->Write(1, iconv('UTF-8', 'cp874', "10.  สำนวนการเขียน และการสื่อความหมาย (Idiom and Meaning)                     [ $p10 / 10 คะแนน ]"));
        $this->SetXY(30, 125);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm10"));
        $this->SetXY(30, 132);
        $this->Write(1, iconv('UTF-8', 'cp874', "11.  ความถูกต้องตัวสะกด (Spelling)                                            [ $p11 / 5 คะแนน ]"));
        $this->SetXY(30, 139);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm11"));
        $this->SetXY(30, 146);
        $this->Write(1, iconv('UTF-8', 'cp874', "12.  รูปแบบ และความสวยงาม ของรูปเล่ม (Pattern)                             [ $p12 / 5 คะแนน ]"));
        $this->SetXY(30, 153);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm12"));

        $this->SetXY(30, 160);
        $this->Write(1, iconv('UTF-8', 'cp874', "13. เอกสารอ้างอิง (References)                                            [ $p13 / 5 คะแนน ]"));
        $this->SetXY(30, 167);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm13"));
        $this->SetXY(30, 174);
        $this->Write(1, iconv('UTF-8', 'cp874', "14. ภาคผนวก (Appendix)                                                   [ $p14 / 5 คะแนน ]"));
        $this->SetXY(30, 181);
        $this->Write(1, iconv('UTF-8', 'cp874', "$cm14"));
    }

    public function Lisence($cm_more, $cm_name, $cm_position, $date, $sum)
    {
        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(30, 195);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ข้อคิดเห็นเพิ่มเติม /Other comments'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(30, 200);
        $this->MultiCell(160, 7, iconv('UTF-8', 'cp874', "$cm_more"));

        $this->SetXY(30, 218);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ลงชื่อ/Evaluator’s Signature'));
        $this->SetXY(45, 238);
        $this->Write(1, iconv('UTF-8', 'cp874', "($cm_name)"));
        $this->SetXY(30, 244);
        $this->Write(1, iconv('UTF-8', 'cp874', "ตำแหน่ง/Position $cm_position"));
        $this->SetXY(30, 250);
        $this->Write(1, iconv('UTF-8', 'cp874', "วันที่/Date $date"));

        $this->Rect(130, 215, 70, 40); //กรอบ
        $this->SetFont('THSarabun', '', 14);
        $this->SetXY(140, 218);
        $this->Write(1, iconv('UTF-8', 'cp874', 'สำหรับเจ้าหน้าที่สหกิจศึกษา /'));
        $this->SetXY(140, 225);
        $this->Write(1, iconv('UTF-8', 'cp874', 'Cooperative staffonly'));
        $this->SetXY(130, 232);
        $this->Write(1, iconv('UTF-8', 'cp874', "คะแนนรวมข้อ 1-14 = $sum คะแนน"));
        $this->SetXY(130, 239);
        $this->Write(1, iconv('UTF-8', 'cp874', "            รวม = $sum คะแนน"));
        $this->SetXY(150, 246);
        $this->Write(1, iconv('UTF-8', 'cp874', '100'));

        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(30, 260);
        $this->Write(1, iconv('UTF-8', 'cp874', 'หมายเหตุ : หากไม่ได้รับแบบประเมินนี้ภายในระยะเวลาที่กำหนด นักศึกษาจะไม่ผ่านการประเมิน'));
    }
}
if ($input = $_POST) {
    $date = $_POST['date'];

    function DateThai($date, $type = 'date')
    {
        $date = date('Y-n-d H:i:s', strtotime($date));
        $TH_Month = array(null, 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        $dateFullArr = explode(' ', $date);
        $dateFull = explode('-', $dateFullArr[0]);
        $dateTime = $dateFullArr[1];
        $yearThai = $dateFull[0] + 543;
        $monthThai = $TH_Month[$dateFull[1]];
        $day = $dateFull[2];

        switch ($type) {
        case 'date':
            return $day.' เดือน '.$monthThai.' พ.ศ.'.$yearThai;
            break;
        case 'time':
        return $day.' เดือน'.$monthThai.' พ.ศ. '.$yearThai.' '.$dateTime;
            break;
    }
    }
    /// Nomal Infor
    $std_fullname = $_POST['std_fullname'];
    $std_id = $_POST['std_id'];
    $fatory = $_POST['fatory'];
    $major = $_POST['major'];
    $company_name = $_POST['company_name'];
    $emp_name = $_POST['emp_name'];
    $emp_position = $_POST['emp_position'];
    $emp_group = $_POST['emp_group'];

    //ReportTitle

    $thai_title = $_POST['thai_title'];
    $eng_title = $_POST['eng_title'];

    //CommentPart1
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $p3 = $_POST['p3'];
    $p4 = $_POST['p4'];
    $cm1 = $_POST['cm1'];
    $cm2 = $_POST['cm2'];
    $cm3 = $_POST['cm3'];
    $cm4 = $_POST['cm4'];

    //CommentPart2
    $p5 = $_POST['p5'];
    $p6 = $_POST['p6'];
    $p7 = $_POST['p7'];
    $p8 = $_POST['p8'];
    $p9 = $_POST['p9'];
    $p10 = $_POST['p10'];
    $p11 = $_POST['p11'];
    $p12 = $_POST['p12'];
    $p13 = $_POST['p13'];
    $p14 = $_POST['p14'];
    $cm5 = $_POST['cm5'];
    $cm6 = $_POST['cm6'];
    $cm7 = $_POST['cm7'];
    $cm8 = $_POST['cm8'];
    $cm9 = $_POST['cm9'];
    $cm10 = $_POST['cm10'];
    $cm11 = $_POST['cm11'];
    $cm12 = $_POST['cm12'];
    $cm13 = $_POST['cm13'];
    $cm14 = $_POST['cm14'];

    //Lisence

    $cm_more = $_POST['cm_more'];
    $cm_name = $_POST['cm_name'];
    $cm_position = $_POST['cm_position'];
    $sum = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9 + $p10 + $p11 + $p12 + $p13 + $p14;

    $pdf = new PDF();

    $pdf->AliasNbPages();
    $pdf->AddPage('P', 'A4');
    $pdf->SetLineWidth(0.5);
    $pdf->Line(30, 60, 180, 60);
    $pdf->Header();
    $pdf->Footer();
    $pdf->SetLineWidth(0.1);
    // In side //
    $pdf->Title();
    $pdf->NomalInfor($std_fullname, $std_id, $fatory, $major, $company_name, $emp_name, $emp_position, $emp_group);
    $pdf->ReportTitle($thai_title, $eng_title);
    $pdf->CommentPart1($p1, $p2, $p3, $p4, $cm1, $cm2, $cm3, $cm4);
    // End 1 Page //

    $pdf->AliasNbPages();
    $pdf->AddPage('P', 'A4');
    $pdf->CommentPart2($p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $cm5, $cm6, $cm7, $cm8, $cm9, $cm10, $cm11, $cm12, $cm13, $cm14);
    $pdf->Lisence($cm_more, $cm_name, $cm_position, DateThai($date), $sum);

    $pdf->Output();
}
