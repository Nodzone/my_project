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
            $this->Write(1, 'BRU-Co13');
            $this->SetXY(70, 50);
            $this->Write(1, iconv('UTF-8', 'cp874', 'แบบประเมินผลนักศึกษาสหกิจศึกษา'));
            $this->SetXY(68, 55);
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
        $this->Write(1, iconv('UTF-8', 'cp874', '2. แบบประเมินผลนี้มีทั้งหมด 18 ข้อ โปรดให้ข้อมูลครบทุกข้อเพื่อความสมบูรณ์ของการ'));
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

    //$std_fullname,$std_id,$fatory,$major,$company_name,$emp_name,$emp_position,$emp_group
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

    //$cm_more,$cm_name,$cm_position,$date,$sum
    public function Lisence($cm_more, $cm_name, $cm_position, $date, $sum)
    {
        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(30, 120);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ข้อคิดเห็นเพิ่มเติม /Other comments'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(30, 127);
        $this->MultiCell(160, 7, iconv('UTF-8', 'cp874', "$cm_more"));

        $this->SetXY(30, 134);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ลงชื่อ/Evaluator’s Signature'));
        $this->SetXY(45, 150);
        $this->Write(1, iconv('UTF-8', 'cp874', "($cm_name)"));
        $this->SetXY(30, 156);
        $this->Write(1, iconv('UTF-8', 'cp874', "ตำแหน่ง/Position : $cm_position"));
        $this->SetXY(30, 162);
        $this->Write(1, iconv('UTF-8', 'cp874', "วันที่/Date : $date"));

        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(30, 168);
        $this->Write(1, iconv('UTF-8', 'cp874', 'หมายเหตุ : หากไม่ได้รับแบบประเมินนี้ภายในระยะเวลาที่กำหนด นักศึกษาจะไม่ผ่านการประเมิน'));

        $this->Rect(130, 131, 70, 33); //กรอบ
        $this->SetFont('THSarabun', '', 14);
        $this->SetXY(140, 134);
        $this->Write(1, iconv('UTF-8', 'cp874', 'สำหรับเจ้าหน้าที่สหกิจศึกษา /'));
        $this->SetXY(140, 139);
        $this->Write(1, iconv('UTF-8', 'cp874', 'Cooperative staffonly'));
        $this->SetXY(130, 146);
        $this->Write(1, iconv('UTF-8', 'cp874', "คะแนนรวมข้อ 1-14 = $sum คะแนน"));
        $this->SetXY(130, 153);
        $this->Write(1, iconv('UTF-8', 'cp874', "            รวม = $sum คะแนน"));
        $this->SetXY(150, 160);
        $this->Write(1, iconv('UTF-8', 'cp874', '100'));
    }

    public function CommentPart1($p1, $p2)
    {
        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(30, 176);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ผลสำเร็จของงาน / Work Achievement '));
        $this->SetXY(30, 183);
        $this->Cell(160, 7, iconv('UTF-8', 'cp874', 'หัวข้อประเมิน / Items'), 1, 1, 'C');
        $this->Rect(30, 183, 160, 60); // boder
        $this->SetFont('THSarabun', '', 14);
        $this->SetXY(30, 200);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "1. ปริมาณงาน (Quantity of Work)                              [ $p1 / 20 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 207);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ปริมาณงานที่ปฏิบัติสำเร็จตามหน้าที่ หรือตามที่ได้รับมอบหมายภายในระยะเวลา'));
        $this->SetXY(45, 214);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ที่กำหนด (ในระดับที่นักศึกษาจะปฏิบัติได้) และเทียบกับนักศึกษาทั่วๆ ไป'));
        $this->SetXY(30, 221);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "2. คุณภาพงาน (Quality of Work)                                 [ $p2 / 20 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 229);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ทำงานได้ถูกต้องครบถ้วนสมบูรณ์ มีความประณีตเรียบร้อย มีความรอบคอบ'));
        $this->SetXY(45, 236);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ไม่เกิดปัญหาติดตามมา งานไม่ค้างคา ทำงานเสร็จทันเวลาหรือก่อนเวลาที่กำหนด'));
        $this->SetXY(30, 243);

        $this->SetXY(30, 250);
    }

    public function CommentPart2($p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10)
    {
        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(30, 30);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ความรู้ความสามารถ / Knowledge and Ability '));
        $this->SetXY(30, 37);
        $this->Cell(160, 7, iconv('UTF-8', 'cp874', 'หัวข้อประเมิน / Items'), 1, 1, 'C');
        $this->Rect(30, 37, 160, 200); // boder
        $this->SetXY(30, 46);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "3. ความรู้ความสามารถทางวิชาการ (Academic Ability)                      [ $p3 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 53);
        $this->Write(1, iconv('UTF-8', 'cp874', 'นักศึกษามีความรู้ทางวิชาการเพียงพอ ที่จะทำงานตามที่ได้รับมอบหมาย'));
        $this->SetXY(45, 60);
        $this->Write(1, iconv('UTF-8', 'cp874', '(ในระดับที่นักศึกษาจะปฏิบัติได้)'));
        $this->SetXY(30, 67);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "4. ความสามารถในการเรียนรู้และประยุกต์วิชาการ                               [ $p4 / 10 คะแนน ]"));
        $this->SetXY(45, 75);
        $this->Write(1, iconv('UTF-8', 'cp874', '(Ability to Learn and  Apply  Knowledge)'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 82);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ความรวดเร็วในการเรียนรู้ เข้าใจข้อมูล ข่าวสาร และวิธีการทำงาน'));
        $this->SetXY(45, 89);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ตลอดจนการนำความรู้ไปประยุกต์ใช้งาน'));
        $this->SetXY(30, 96);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "5. ความรู้ความชำนาญด้านปฏิบัติการ (Practical Aability)                     [ $p5 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 103);
        $this->Write(1, iconv('UTF-8', 'cp874', 'เช่น การปฏิบัติงานในภาคสนาม ในห้องปฏิบัติการ'));
        $this->SetXY(30, 110);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "6. วิจารณญาณและการตัดสินใจ (Judgment and Decision Making)      [ $p6 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 117);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ตัดสินใจได้ดี ถูกต้อง รวดเร็ว มีการวิเคราะห์ ข้อมูลและปัญหาต่าง ๆ'));
        $this->SetXY(45, 124);
        $this->Write(1, iconv('UTF-8', 'cp874', 'อย่างรอบคอบก่อนการตัดสินใจสามารถแก้ปัญหาเฉพาะหน้า สามารถ'));
        $this->SetXY(45, 131);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ไว้วางใจให้ตัดสินใจได้ด้วยตนเอง'));
        $this->SetXY(30, 138);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "7.  การจัดการและวางแผน (Organization and Planning)                     [ $p7 / 10 คะแนน ]"));
        $this->SetXY(30, 145);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "8.  ทักษะการสื่อสาร (Communication Skills)         [ $p8 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 152);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ความสามารถในการติดต่อสื่อสาร การพูด การเขียน และการนำเสนอ'));
        $this->SetXY(45, 159);
        $this->Write(1, iconv('UTF-8', 'cp874', '(Presentation) สามารถสื่อให้เข้าใจได้ง่าย เรียบร้อย ชัดเจน ถูกต้อง รัดกุม'));
        $this->SetXY(45, 166);
        $this->Write(1, iconv('UTF-8', 'cp874', 'มีลำดับขั้นตอนที่ดีไม่ก่อให้เกิดความสับสนต่อการทำงาน รู้จักสอบถาม '));
        $this->SetXY(45, 173);
        $this->Write(1, iconv('UTF-8', 'cp874', 'รู้จักชี้แจง ผลการปฏิบัติงานและข้อขัดข้องให้ทราบ'));
        $this->SetXY(30, 180);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "9.  การพัฒนาด้านภาษาและวัฒนธรรมต่างประเทศ          [ $p9 / 10 คะแนน ]"));
        $this->SetXY(45, 187);
        $this->Write(1, iconv('UTF-8', 'cp874', '(Foreign Language and Cultural Envelopment) '));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 194);
        $this->Write(1, iconv('UTF-8', 'cp874', 'เช่น ภาษาอังกฤษ การทำงานกับชาวต่างชาติ'));
        $this->SetXY(30, 201);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "10. ความเหมาะสมต่อตำแหน่งที่ได้รับมอบหมาย(Suitability for Job Position)[ $p10 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 208);
        $this->Write(1, iconv('UTF-8', 'cp874', 'สามารถพัฒนาตนเองให้ปฏิบัติงานตาม Job Position และ Job Description'));
        $this->SetXY(45, 215);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ที่มอบหมายได้อย่างเหมาะสมหรือ ตำแหน่งงานนี้เหมาะสมกับนักศึกษาคนนี้'));
        $this->SetXY(45, 222);
        $this->Write(1, iconv('UTF-8', 'cp874', 'หรือไม่เพียงใด'));
    }

    public function CommentPart3($p11, $p12, $p13, $p14)
    {
        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(30, 30);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ความรับผิดชอบต่อหน้าที่ /Responsibility '));
        $this->SetXY(28, 37);
        $this->Cell(165, 7, iconv('UTF-8', 'cp874', 'หัวข้อประเมิน / Items'), 1, 1, 'C');
        $this->Rect(28, 37, 165, 125); // boder

        $this->SetXY(30, 47);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "11. ความรับผิดชอบและเป็นผู้ที่ไว้วางใจได้(Responsibility and Dependability) [ $p11 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 53);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ดำเนินงานให้สำเร็จลุล่วงโดยคำนึงถึงเป้าหมายและความสำเร็จของงานเป็นหลัก ยอมรับผล'));
        $this->SetXY(45, 59);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ที่เกิดจากการทำงานอย่างมีเหตุผล สามารถปล่อยให้ทำงาน (กรณีงานประจำ) ได้โดยไม่'));
        $this->SetXY(45, 66);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ต้องควบคุมมากจนเกินไป ความจำเป็นในการตรวจสอบขั้นตอนและผลงานตลอดเวลา'));
        $this->SetXY(45, 73);
        $this->Write(1, iconv('UTF-8', 'cp874', 'สามารถไว้วางใจให้รับผิดชอบงานที่มากกว่าเวลาประจำ สามารถไว้วางใจได้แทบทุก'));
        $this->SetXY(45, 80);
        $this->Write(1, iconv('UTF-8', 'cp874', 'สถานการณ์หรือในสถานการณ์ปกติเท่านั้น'));

        $this->SetXY(30, 87);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "12. ความสนใจ อุตสาหะในการทำงาน (Interest in Work) [ $p12 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 94);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ความสนใจและความกระตือรือร้นในการทำงาน มีความอุตสาหะ ความพยายาม'));
        $this->SetXY(45, 101);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ความตั้งใจที่จะทำงานได้สำเร็จ ความมานะบากบั่น ไม่ย่อท้อต่ออุปสรรคและปัญหา'));

        $this->SetXY(30, 108);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "13. ความสามารถเริ่มต้นทำงานได้ด้วยตนเอง (Initiative or Self Starter) [ $p13 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 115);
        $this->Write(1, iconv('UTF-8', 'cp874', 'เมื่อได้รับคำชี้แนะ สามารถเริ่มทำงานได้เองโดยไม่ต้องรอคำสั่ง (กรณีงานประจำ)'));
        $this->SetXY(45, 122);
        $this->Write(1, iconv('UTF-8', 'cp874', 'เสนอตัวเข้าช่วยงานแทบทุกอย่าง มาขอรับงานใหม่ ๆ ไปทำ ไม่ปล่อยเวลาว่าง'));
        $this->SetXY(45, 129);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ให้ล่วงเลยไปโดยเปล่าประโยชน์'));

        $this->SetXY(30, 136);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "14. การตอบสนองต่อการสั่งการ (Response to Supervision) [ $p14 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 143);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ยินดีรับคำสั่ง คำแนะนำ คำวิจารณ์ไม่แสดงความอึดอัดใจ เมื่อได้รับคำติเตือนและวิจารณ์ '));
        $this->SetXY(45, 150);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ความรวดเร็วในการปฏิบัติตามคำสั่ง การปรับตัวปฏิบัติตามคำแนะนำ ข้อเสนอแนะ       '));
        $this->SetXY(45, 157);
        $this->Write(1, iconv('UTF-8', 'cp874', 'และวิจารณ์'));
    }

    public function CommentPart4($p15, $p16, $p17, $p18)
    {
        $this->SetFont('THSarabun Bold', '', 16);
        $this->SetXY(30, 167);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ลักษณะส่วนบุคคล / Personality '));
        $this->SetXY(28, 174);
        $this->Cell(165, 7, iconv('UTF-8', 'cp874', 'หัวข้อประเมิน / Items'), 1, 1, 'C');
        $this->Rect(28, 174, 165, 110); // boder

        $this->SetXY(30, 184);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "15. บุคลิกภาพและการวางตัว (Personality)    [ $p15 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 191);
        $this->Write(1, iconv('UTF-8', 'cp874', 'มีบุคลิกภาพและวางตัวได้เหมาะสม เช่น ทัศนคติ วุฒิภาวะ ความอ่อนน้อมถ่อมตน'));
        $this->SetXY(45, 198);
        $this->Write(1, iconv('UTF-8', 'cp874', 'การแต่งกาย กิริยาวาจา การตรงต่อเวลา และอื่น ๆ'));

        $this->SetXY(30, 205);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "16. มนุษยสัมพันธ์ (Interpersonal Skills)   [ $p16 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 212);
        $this->Write(1, iconv('UTF-8', 'cp874', 'สามารถร่วมงานกับผู้อื่น การทำงานเป็นทีม สร้างมนุษยสัมพันธ์ได้ดี เป็นที่รักใคร่'));
        $this->SetXY(45, 219);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ชอบพอของผู้ร่วมงาน เป็นผู้ที่ช่วยก่อให้เกิดความร่วมมือประสานงาน'));

        $this->SetXY(30, 226);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "17.    ความมีระเบียบวินัย ปฏิบัติตามวัฒนธรรมของสถานปฏิบัติงาน   [ $p17 / 10 คะแนน ]"));

        $this->SetXY(45, 233);
        $this->Write(1, iconv('UTF-8', 'cp874', '(Discipline andAdaptability to Formal Organization)'));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 240);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ความสนใจเรียนรู้ ศึกษา กฎระเบียบ นโยบายต่าง ๆ และปฏิบัติตามโดยเต็มใจ'));
        $this->SetXY(45, 247);
        $this->Write(1, iconv('UTF-8', 'cp874', 'การปฏิบัติตามระเบียบบริหารงานบุคคล (การเข้างาน ลางาน) ปฏิบัติตามกฎ'));
        $this->SetXY(45, 254);
        $this->Write(1, iconv('UTF-8', 'cp874', 'การรักษาความปลอดภัยในโรงงาน การควบคุมคุณภาพ 5 ส และอื่น ๆ'));

        $this->SetXY(30, 260);
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Write(1, iconv('UTF-8', 'cp874', "18.  คุณธรรมและจริยธรรม (Ethics and Morality))   [ $p18 / 10 คะแนน ]"));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(45, 267);
        $this->Write(1, iconv('UTF-8', 'cp874', 'มีความซื่อสัตย์ สุจริต มีจิตใจสะอาด รู้จักเสียสละ ไม่เห็นแก่ตัว เอื้อเฟื้อ'));
        $this->SetXY(45, 274);
        $this->Write(1, iconv('UTF-8', 'cp874', 'ช่วยเหลือผู้อื่น'));
    }

    public function CommentPart5($obj1, $strength_1, $improvement_1, $strength_2, $improvement_2, $strength_3, $improvement_3, $strength_4, $improvement_4, $strength_5, $improvement_5)
    {
        $this->SetFont('THSarabun Bold', '', 16);

        $this->SetXY(30, 35);
        $this->Write(1, iconv('UTF-8', 'cp874', 'โปรดให้ข้อคิดเห็นที่เป็นประโยชน์ แก่นักศึกษา / Please give comments on the student'));
        $this->SetXY(20, 42);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', 'จุดเด่นของนักศึกษา /Strength'), 1, 0, 'C');
        $this->SetXY(110, 42);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', 'ข้อควรปรับปรุงของนักศึกษา / Improvement'), 1, 0, 'C');

        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(20, 49);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$strength_1"), 1, 0, 'C');
        $this->SetXY(110, 49);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$improvement_1"), 1, 0, 'C');

        $this->SetXY(20, 56);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$strength_2"), 1, 0, 'C');
        $this->SetXY(110, 56);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$improvement_2"), 1, 0, 'C');

        $this->SetXY(20, 63);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$strength_3"), 1, 0, 'C');
        $this->SetXY(110, 63);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$improvement_3"), 1, 0, 'C');

        $this->SetXY(20, 70);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$strength_4"), 1, 0, 'C');
        $this->SetXY(110, 70);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$improvement_4"), 1, 0, 'C');

        $this->SetXY(20, 77);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$strength_5"), 1, 0, 'C');
        $this->SetXY(110, 77);
        $this->Cell(90, 7, iconv('UTF-8', 'cp874', "$improvement_5"), 1, 0, 'C');

        if ($obj1 == 1) {
            $obj21 = '•';
            $obj22 = '';
            $obj23 = '';
        } elseif ($obj1 == 2) {
            $obj21 = '';
            $obj22 = '•';
            $obj23 = '';
        } else {
            $obj21 = '';
            $obj22 = '';
            $obj23 = '•';
        }
        $this->SetFont('THSarabun Bold', '', 16);
        $this->Rect(28, 86, 160, 30); // boder
        $this->SetXY(30, 89);
        $this->Write(1, iconv('UTF-8', 'cp874', 'หากนักศึกษาผู้นี้สำเร็จการศึกษาแล้ว ท่านจะรับเข้าทำงานในสถานประกอบการนี้หรือไม่'));
        $this->SetXY(30, 96);
        $this->Write(1, iconv('UTF-8', 'cp874', '(หากมีโอกาสเลือก) '));
        $this->SetFont('THSarabun', '', 16);
        $this->SetXY(30, 103);
        $this->Write(1, iconv('UTF-8', 'cp874', 'Once this student graduate, will you be interested to offer him/her a job ?'));
        $this->SetXY(30, 110);
        $this->Write(1, iconv('UTF-8', 'cp874', "($obj21)  รับ / Yes ($obj22)  ไม่แน่ใจ / Not sure ($obj23)  ไม่รับ / No"));
    }
}

if ($input = $_POST) {
    $date = $_POST['date'];
    /// Nomal Infor
    $std_fullname = $_POST['std_fullname'];
    $std_id = $_POST['std_id'];
    $fatory = $_POST['fatory'];
    $major = $_POST['major'];
    $company_name = $_POST['company_name'];
    $emp_name = $_POST['emp_name'];
    $emp_position = $_POST['emp_position'];
    $emp_group = $_POST['emp_group'];
    /// P 1
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];

    /// P 2
    $p3 = $_POST['p3'];
    $p4 = $_POST['p4'];
    $p5 = $_POST['p5'];
    $p6 = $_POST['p6'];
    $p7 = $_POST['p7'];
    $p8 = $_POST['p8'];
    $p9 = $_POST['p9'];
    $p10 = $_POST['p10'];

    /// P 3
    $p11 = $_POST['p11'];
    $p12 = $_POST['p12'];
    $p13 = $_POST['p13'];
    $p14 = $_POST['p14'];

    /// P 4
    $p15 = $_POST['p15'];
    $p16 = $_POST['p16'];
    $p17 = $_POST['p17'];
    $p18 = $_POST['p18'];

    /// P 5

    $obj1 = isset($_POST['obj1']) ? isset($_POST['obj1']) : '';

    $strength_1 = $_POST['strength_1'];
    $improvement_1 = $_POST['improvement_1'];

    $strength_2 = $_POST['strength_2'];
    $improvement_2 = $_POST['improvement_2'];

    $strength_3 = $_POST['strength_3'];
    $improvement_3 = $_POST['improvement_3'];

    $strength_4 = $_POST['strength_4'];
    $improvement_4 = $_POST['improvement_4'];

    $strength_5 = $_POST['strength_5'];
    $improvement_5 = $_POST['improvement_5'];

    ///
    $cm_more = $_POST['cm_more'];
    $cm_name = $_POST['cm_name'];
    $cm_position = $_POST['cm_position'];
    $sum = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9 + $p10 + $p11 + $p12 + $p13 + $p14 + $p15 + $p16 + $p17 + $p18;

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
                return $day.' เดือน'.$monthThai.' พ.ศ.'.$yearThai;
                break;
            case 'time':
            return $day.' เดือน '.$monthThai.' พ.ศ. '.$yearThai.' '.$dateTime;
                break;
        }
    }

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

    $pdf->CommentPart1($p1, $p2);
    // End 1 Page //

    // P2
    $pdf->AliasNbPages();
    $pdf->AddPage('P', 'A4');
    $pdf->CommentPart2($p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10);

    // P3
    $pdf->AliasNbPages();
    $pdf->AddPage('P', 'A4');
    $pdf->CommentPart3($p11, $p12, $p13, $p14);
    $pdf->CommentPart4($p15, $p16, $p17, $p18);

    $pdf->AliasNbPages();
    $pdf->AddPage('P', 'A4');
    $pdf->CommentPart5($obj1, $strength_1, $improvement_1, $strength_2, $improvement_2, $strength_3, $improvement_3, $strength_4, $improvement_4, $strength_5, $improvement_5);
    $pdf->Lisence($cm_more, $cm_name, $cm_position, DateThai($date), $sum);
    //$cm_more,$cm_name,$cm_position,$date,$sum
    $pdf->Output();
}
