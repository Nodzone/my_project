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
            $this->SetFont('THSarabun','',16);
            $this->Image('logo_bru.jpg',90,20,20,0,'');
            $this->SetXY(155,20);
            $this->Write(1,"BRU-Co12");
            $this->SetXY(70,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , 'แบบบันทึกการนิเทศงานสหกิจศึกษา' )  );
            $this->SetXY(68,55);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , 'สหกิจศึกษา มหาวิทยาลัยราชภัฏบุรีรัมย์' )  );
        }
		
    }
    
    function Footer(){

        $this->SetAutoPageBreak(0);
        $this->SetY( -10 ); //dกำหนดการเยื้อง 10 มม.
        $this->SetFont('THSarabun','',5);
        $this->Cell(0,10, 'https://www.bru.ac.th' ,0,0,'L');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    // Page 1 //
    function Title($companyname,$district,$province,$phone,$fax){
        $this->SetFont('THSarabun','',16);
        $this->SetXY(45,65);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อสถานปฎิบัติงาน (ไทย หรือ อังกฤษ) : $companyname" )  );
        $this->SetXY(45,72);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "สถานที่ตั้ง ณ อำเภอ / เขต : $district จังหวัด : $province" )  );
        $this->SetXY(45,79);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรศัพท์ : $phone โทรสาร : $fax" )  );
    }

    function Studentlist($std_fullname1,$jobno1,$fatory1,$std_fullname2,$jobno2,$fatory2,$std_fullname3,$jobno3,$fatory3,$std_fullname4,$jobno4,$fatory4,$std_fullname5,$jobno5,$fatory5,$std_fullname6,$jobno6,$fatory6){
        $this->SetXY(45,86);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "1. $std_fullname1 JOB NO : $jobno1 หลักศุตร : $fatory1" )  );
        $this->SetXY(45,93);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "2. $std_fullname2 JOB NO : $jobno2 หลักศุตร : $fatory2" )  );
        $this->SetXY(45,100);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "3. $std_fullname3 JOB NO : $jobno3 หลักศุตร : $fatory3" )  );
        $this->SetXY(45,107);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "4. $std_fullname4 JOB NO : $jobno4 หลักศุตร : $fatory4" )  );
        $this->SetXY(45,114);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "5. $std_fullname5 JOB NO : $jobno5 หลักศุตร : $fatory5" )  );
        $this->SetXY(45,121);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "6. $std_fullname6 JOB NO : $jobno6 หลักศุตร : $fatory6" )  );
    }

    function TeacherLisence($teacher_name,$date){
        $this->SetXY(120,128);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ลงชื่อ ($teacher_name)" )  );
        $this->SetXY(130,135);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "($teacher_name)" )  );
        $this->SetXY(120,142);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "อาจารย์นิเทศงานสหกิจศึกษา" )  );
        $this->SetXY(120,149);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วันที่ $date" )  );
    }

    function GroupTeacher($teacherjoin_name1,$teacherjoin_name2,$teacherjoin_name3){
        $this->SetXY(30,149);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รายนามอาจารย์ผู้ร่วมนิเทศงาน" )  );
        $this->SetXY(30,156);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "1.$teacherjoin_name1" )  );
        $this->SetXY(30,163);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "2.$teacherjoin_name2" )  );
        $this->SetXY(30,169);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "3.$teacherjoin_name3" )  );
    }

    ///// End Title ////

    /// Now Comment ///
    // Page 2 //
    function Explan(){
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,176);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "คำชี้แจง " )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(47,176);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โปรดบันทึกหมายเลข 5, 4, 3, 2, 1 หรือ - ตามความเห็นของท่านในแต่ละหัวข้อการประเมิน" )  );
        $this->SetXY(47,183);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โดยใช้เกณฑ์การประเมินค่าสำหรับระดับความคิดเห็น ดังนี้" )  );
        $this->SetXY(47,190);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "5 	หมายถึง  เห็นด้วยกับข้อความนั้นมากที่สุด หรือเหมาะสมมากที่สุด" )  );
        $this->SetXY(47,197);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "4 	หมายถึง  เห็นด้วยกับข้อความนั้นมาก หรือเหมาะสมมาก" )  );
        $this->SetXY(47,204);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "3 	หมายถึง  เห็นด้วยกับข้อความนั้นปานกลาง หรือเหมาะสมปานกลาง" )  );
        $this->SetXY(47,211);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "2 	หมายถึง  เห็นด้วยกับข้อความนั้นน้อย หรือเหมาะสมน้อย" )  );
        $this->SetXY(47,218);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "1 	หมายถึง  เห็นด้วยกับข้อความนั้นน้อยที่สุด หรือเหมาะสมน้อยที่สุด" )  );
        $this->SetXY(47,225);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "- 	หมายถึง  ไม่สามารถให้ระดับคะแนนได้ เช่น ไม่มีความเห็น ไม่มีข้อมูล ไม่ต้องการประเมิน เป็นต้น" )  );
        
    }
    // Page 2 //
    // Part 1 Comment Company //
    function CompamyComment($p1_1,$cm1_1,$p1_2,$cm1_2,
    $p2_1,$cm2_1,$p2_2,$cm2_2,$p2_3,$cm2_3,$p3_1,$cm3_1,$p4_1,$cm4_1,$p4_2,$cm4_2,$p4_3,$cm4_3,$p4_4,$cm4_4,$p4_5,$cm4_5,
    $p5_1,$cm5_1,$p5_2,$cm5_2,$p5_3,$cm5_3,$p5_4,$cm5_4,$p5_5,$cm5_5,$p5_6,$cm5_6,$p5_7,$cm5_7,$p5_8,$cm5_8,$p6_1,$cm6_1){
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,30);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ส่วนที่ 1 สำหรับการประเมินสถานปฏิบัติงาน  " )  );

        // Head Table
        $this->SetXY(25,37);  
        $this->Cell(95,7,iconv('UTF-8','cp874' ,'หัวข้อการประเมิน '),1,0,'C');
        $this->Cell(35,7,iconv('UTF-8','cp874' ,'ระดับความคิดเห็น'),1,0,'C');
        $this->Cell(40,7,iconv('UTF-8','cp874' ,'หมายเหตุ'),1,0,'C');
       
        // Body 
        $this->SetFont('THSarabun','',16);

        // Filed In Table
        
        $this->SetXY(25,44);
        $this->Rect(25,44,170,15);
        $this->SetFont('THSarabun Bold','',16);
        $this->Cell(95,6,iconv('UTF-8','cp874' , "1.  ความเข้าใจในปรัชญาของสหกิจศึกษา"),0,0,'L');
        $this->SetFont('THSarabun','',14);
        $this->Cell(35,15,"$p1_1",1,0,'C');
        $this->Cell(40,15,"$cm1_1",1,0,'C');
        $this->SetXY(30,52);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "1.1 เจ้าหน้าที่ระดับบริหารและฝ่ายบุคคล" )  );
        
        $this->SetXY(25,59);
        $this->SetFont('THSarabun','',14); //วรรค 4 ครั้ง //
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    1.2 พนักงานที่ปรึกษา (Job Supervisor)" ),1,0,'L');
        $this->Cell(35,6,"$p1_2",1,0,'C');
        $this->Cell(40,6,"$cm1_2",1,0,'C');
        
        // 2
        $this->SetXY(25,65);
        $this->Rect(25,65,170,20);
        $this->SetFont('THSarabun Bold','',16);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "2.  การจัดการและสนับสนุน" ),0,0,'L');
        $this->SetFont('THSarabun','',14);
        $this->Cell(35,20,"$p2_1",1,0,'C');
        $this->Cell(40,20,"$cm2_1",1,0,'C');
        $this->SetXY(30,72);
        $this->MultiCell( 85,6, iconv( 'UTF-8','cp874' , "2.1การประสานงานด้านการจัดการดูแลนักศึกษาภายใน สถานปฏิบัติงานระหว่างฝ่ายบุคคลและ Job Supervisor" )  );
        $this->SetXY(30,85);
        //วรรค 4 ครั้ง //
        $this->MultiCell(95,6,iconv( 'UTF-8','cp874' , "2.2การให้คำแนะนำดูแลนักศึกษาของฝ่ายบริหารบุคคล(การปฐมนิเทศ การแนะนำระเบียบวินัย การลางาน สวัสดิการ การจ่ายค่าตอบแทน)" ));
        $this->SetXY(25,85);
        $this->Cell(95,14,'',1,0,'C');
        $this->Cell(35,14,"$p2_2",1,0,'C');
        $this->Cell(40,14,"$cm2_2",1,0,'C');

        $this->SetXY(30,99);
        //วรรค 4 ครั้ง // //
        $this->MultiCell(95,6,iconv( 'UTF-8','cp874' , "2.3บุคลากรในสถานประกอบการให้ความสนใจสนับสนุนและให้ความ เป็นกันเองกับนักศึกษา" ));
        $this->SetXY(25,99);
        $this->Cell(95,14,'',1,0,'C');
        $this->Cell(35,14,"$p2_3",1,0,'C');
        $this->Cell(40,14,"$cm2_3",1,0,'C');

        // 3
        $this->SetXY(25,113);
        $this->Rect(25,113,170,15);
        $this->SetFont('THSarabun Bold','',16);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "3.  ปริมาณงานที่นักศึกษาได้รับ" ),0,0,'L');
        $this->SetFont('THSarabun','',14);
        $this->Cell(35,15,"$p3_1",1,0,'C');
        $this->Cell(40,15,"$cm3_1",1,0,'C');
        $this->SetXY(30,120);
        $this->MultiCell( 85,6, iconv( 'UTF-8','cp874' , "3.1 ปริมาณงานที่นักศึกษาได้รับมอบหมาย" )  );
        // 4
        $this->SetXY(25,128);
        $this->Rect(25,128,170,15);
        $this->SetFont('THSarabun Bold','',16);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "4.  คุณภาพงาน" ),0,0,'L');
        $this->SetFont('THSarabun','',14);
        $this->Cell(35,15,"$p4_1",1,0,'C');
        $this->Cell(40,15,"$cm4_1",1,0,'C');
        $this->SetXY(30,134);
        $this->MultiCell( 85,6, iconv( 'UTF-8','cp874' , "4.1 คุณลักษณะงาน (Job description)" )  );
        
       
        $this->SetXY(25,143);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "     4.2 งานที่ได้รับมอบหมายตรงกับสาขาวิชาเอกของนักศึกษา" ),1,0,'L');
        $this->Cell(35,6,"$p4_2",1,0,'C');
        $this->Cell(40,6,"$cm4_2",1,0,'C');
        
        $this->SetXY(25,149);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "     4.3 งานที่ได้รับมอบหมายตรงกับที่บริษัทเสนอไว้" ),1,0,'L');
        $this->Cell(35,6,"$p4_3",1,0,'C');
        $this->Cell(40,6,"$cm4_3",1,0,'C');
       
        $this->SetXY(25,155);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "     4.4 งานที่ได้รับมอบหมายตรงกับความสนใจของนักศึกษา" ),1,0,'L');
        $this->Cell(35,6,"$p4_4",1,0,'C');
        $this->Cell(40,6,"$cm4_4",1,0,'C');

        $this->SetXY(25,161);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "     4.5 ความเหมาะสมของหัวข้อรายงานที่นักศึกษาได้รับ" ),1,0,'L');
        $this->Cell(35,6,"$p4_5",1,0,'C');
        $this->Cell(40,6,"$cm4_5",1,0,'C');
        
        //5
        $this->SetXY(25,167);
        $this->Rect(25,167,170,15);
        $this->SetFont('THSarabun Bold','',16);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "5.  การมอบหมายงานและนิเทศงาน ของ Supervisor" ),0,0,'L');
        $this->SetFont('THSarabun','',14);
        $this->Cell(35,15,"$p5_1",1,0,'C');
        $this->Cell(40,15,"$cm5_1",1,0,'C');
        $this->SetXY(30,173);
        $this->MultiCell( 85,6, iconv( 'UTF-8','cp874' , "5.1 มี Supervisor ดูแลนักศึกษาตั้งแต่วันแรกที่เข้างาน" )  );

        $this->SetXY(25,182);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "     5.2 ความรู้และประสบการณ์วิชาชีพของ Supervisor" ),1,0,'L');
        $this->Cell(35,6,"$p5_2",1,0,'C');
        $this->Cell(40,6,"$cm5_2",1,0,'C');
        
        $this->SetXY(25,188);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "     5.3 เวลาที่ Supervisor ให้แก่นักศึกษาด้านการปฏิบัติงาน" ),1,0,'L');
        $this->Cell(35,6,"$p5_3",1,0,'C');
        $this->Cell(40,6,"$cm5_3",1,0,'C');
       
        $this->SetXY(25,194);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "     5.4 เวลาที่ Supervisor ให้แก่นักศึกษาด้านการเขียนรายงาน" ),1,0,'L');
        $this->Cell(35,6,"$p5_4",1,0,'C');
        $this->Cell(40,6,"$cm5_4",1,0,'C');

        $this->SetXY(25,200);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "     5.5 ความสนใจของ Supervisor ต่อการสอนงาน และสั่งงาน" ),1,0,'L');
        $this->Cell(35,6,"$p5_5",1,0,'C');
        $this->Cell(40,6,"$cm5_5",1,0,'C');

        $this->SetXY(30,206);
        //วรรค 4 ครั้ง //
        $this->MultiCell(95,6,iconv( 'UTF-8','cp874' , "5.6การให้ความสำคัญต่อการประเมินผลการปฏิบัติงาน และเขียนรายงานของ Supervisor" ));
        $this->SetXY(25,206);
        $this->Cell(95,14,'',1,0,'C');
        $this->Cell(35,14,"$p5_6",1,0,'C');
        $this->Cell(40,14,"$cm5_6",1,0,'C');

        $this->SetXY(30,220);
        //วรรค 4 ครั้ง // //
        $this->MultiCell(95,6,iconv( 'UTF-8','cp874' , "5.7ความพร้อมของอุปกรณ์เครื่องมือสำหรับนักศึกษา (พิจารณาในกรณีนักศึกษา Co-op ซึ่งไปปฏิบัติงานชั่วคราวเท่านั้น)" ));
        $this->SetXY(25,220);
        $this->Cell(95,14,'',1,0,'C');
        $this->Cell(35,14,"$p5_7",1,0,'C');
        $this->Cell(40,14,"$cm5_7",1,0,'C');

        $this->SetXY(25,234);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "     5.8 การจัดทำแผนปฏิบัติงานตลอดระยะเวลาของการปฏิบัติงาน" ),1,0,'L');
        $this->Cell(35,6,"$p5_8",1,0,'C');
        $this->Cell(40,6,"$cm5_8",1,0,'C');
        //6
        $this->SetXY(25,240);
        $this->Rect(25,240,170,15);
        $this->SetFont('THSarabun Bold','',16);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "6. สรุปคุณภาพโดยรวมของสถานปฏิบัติงานแห่งนี้" ),0,0,'L');
        $this->Cell(35,15,"$p6_1",1,0,'C');
        $this->Cell(40,15,"$cm6_1",1,0,'C');
        $this->SetXY(30,246);
        $this->MultiCell( 85,6, iconv( 'UTF-8','cp874' , "สำหรับสหกิจศึกษา" )  );
       

    }

    // Page 3 // 
        function TitleStudentComment($obj1,$obj2,$obj3,$obj4,
        $std_name,$std_submajor)
        {
            if($obj1 == 1)
                {$obj1=" • ";
                   }
            if($obj2 == 1 )
                { $obj2 = " • ";
                    }
            if($obj3 == 1 )
                { $obj3 = " • ";
                   }
            if($obj4 == 1)
                { $obj4= " • "; }


            $this->SetFont('THSarabun Bold','',16);
            $this->SetXY(30,23);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , "ส่วนที่ 2 สำหรับการประเมินนักศึกษา (1 แผ่นสำหรับนักศึกษา 1 ราย)" )  );
            $this->SetXY(30,30);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อนักศึกษา: $std_name สาขาวิชา : $std_submajor" )  );
            $this->SetFont('THSarabun','',16);
            $this->SetXY(30,37);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , 'Check List  :  เอกสารที่นักศึกษาจะต้องนำส่งให้กับงานสหกิจศึกษา' )  );
            $this->SetXY(50,44);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , "[$obj1] แบบแจ้งรายละเอียดที่พักระหว่างการปฏิบัติงานสหกิจศึกษา" )  );
            $this->SetXY(50,51);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , "[$obj2] แบบแจ้งรายละเอียดงาน ตำแหน่งงาน พนักงานที่ปรึกษา" )  );
            $this->SetXY(50,58);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , "[$obj3] แบบแจ้งแผนการปฏิบัติงานสหกิจศึกษา" )  );
            $this->SetXY(50,65);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , "[$obj4] แบบแจ้งโครงร่างรายงานการปฏิบัติงาน" )  );
        
        }

        function StudentComment($sp1,$scm1,$sp1_1,$scm1_1,$sp1_2,$scm1_2,$sp1_3,$scm1_3,$sp1_4,$scm1_4,
        $sp1_5,$scm1_5,$sp1_6,$scm1_6,$sp1_7,$scm1_7,$sp2,$scm2,$sp3,$scm3,$sp4,$scm4,$sp5,$scm5,$sp6_1,$scm6_1,$sp6_2,$scm6_2
        ,$sp6_3,$scm6_3,$sp6_4,$scm6_4,$sp7,$scm7)
    {
        // Head Table 
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(25,72);  
        $this->Cell(95,7,iconv('UTF-8','cp874' ,'หัวข้อการประเมิน '),1,0,'C');
        $this->Cell(35,7,iconv('UTF-8','cp874' ,'ระดับความคิดเห็น'),1,0,'C');
        $this->Cell(40,7,iconv('UTF-8','cp874' ,'หมายเหตุ'),1,0,'C');
        $this->SetFont('THSarabun','',16);

        $this->SetXY(25,79);
        $this->Rect(25,79,170,6);
        $this->SetFont('THSarabun Bold','',16);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "1.  การพัฒนาตนเอง" ),0,0,'L');
        $this->SetFont('THSarabun','',14);
        $this->Cell(35,6,"$sp1",1,0,'C');
        $this->Cell(40,6,"$scm1",1,0,'C');
        $this->SetXY(30,52);
        
        $this->SetXY(25,85);
        $this->SetFont('THSarabun','',14); //วรรค 4 ครั้ง //
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    1.1 บุคลิกภาพ" ),1,0,'L');
        $this->Cell(35,6,"$sp1_1",1,0,'C');
        $this->Cell(40,6,"$scm1_1",1,0,'C');

        $this->SetXY(25,91);
        $this->SetFont('THSarabun','',14); //วรรค 4 ครั้ง //
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    1.2 วุฒิภาวะ" ),1,0,'L');
        $this->Cell(35,6,"$sp1_2",1,0,'C');
        $this->Cell(40,6,"$scm1_2",1,0,'C');

        $this->SetXY(25,97);
        $this->SetFont('THSarabun','',14); //วรรค 4 ครั้ง //
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    1.3 การปรับตัว" ),1,0,'L');
        $this->Cell(35,6,"$sp1_3",1,0,'C');
        $this->Cell(40,6,"$scm1_3",1,0,'C');

        $this->SetXY(25,103);
        $this->SetFont('THSarabun','',14); //วรรค 4 ครั้ง //
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    1.4 การเรียนรู้" ),1,0,'L');
        $this->Cell(35,6,"$sp1_4",1,0,'C');
        $this->Cell(40,6,"$scm1_4",1,0,'C');

        $this->SetXY(25,109);
        $this->SetFont('THSarabun','',14); //วรรค 4 ครั้ง //
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    1.5 การแสดงความคิดเห็น การแสดงออก" ),1,0,'L');
        $this->Cell(35,6,"$sp1_5",1,0,'C');
        $this->Cell(40,6,"$scm1_5",1,0,'C');

        $this->SetXY(25,115);
        $this->SetFont('THSarabun','',14); //วรรค 4 ครั้ง //
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    1.6 มนุษยสัมพันธ์" ),1,0,'L');
        $this->Cell(35,6,"$sp1_6",1,0,'C');
        $this->Cell(40,6,"$scm1_6",1,0,'C');

        $this->SetXY(25,121);
        $this->SetFont('THSarabun','',14); //วรรค 4 ครั้ง //
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    1.7 ทัศนคติ" ),1,0,'L');
        $this->Cell(35,6,"$sp1_7",1,0,'C');
        $this->Cell(40,6,"$scm1_7",1,0,'C');
        
        // 2
        $this->SetXY(25,127);
        $this->SetFont('THSarabun Bold','',14);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "2. การแสดงความมีส่วนร่วมกับสถานปฏิบัติงาน" ),1,0,'L');
        $this->Cell(35,6,"$sp2",1,0,'C');
        $this->Cell(40,6,"$scm2",1,0,'C');
        // 3
        $this->SetXY(25,133);
        
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "3. ความประพฤติ คุณธรรม จริยธรรม และการปฏิบัติตามระเบียบ" ),1,0,'L');
        $this->Cell(35,6,"$sp3",1,0,'C');
        $this->Cell(40,6,"$scm3",1,0,'C');
        // 4
        $this->SetXY(25,139);
        $this->Rect(25,139,170,12);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "4. ความรู้ความสามารถพื้นฐานที่จำเป็นต่อการปฏิบัติงานที่ได้รับ" ),0,0,'L');
        $this->Cell(35,12,"$sp4",1,0,'C');
        $this->Cell(40,12,"$scm4",1,0,'C');
        $this->SetXY(30,145);
        $this->MultiCell( 85,6, iconv( 'UTF-8','cp874' , "มอบหมายให้สำเร็จ" )  );
        // 5

        $this->SetXY(25,151);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "5. ความก้าวหน้าของการจัดทำรายงาน (Work Term Report)" ),1,0,'L');
        $this->Cell(35,6,"$sp5",1,0,'C');
        $this->Cell(40,6,"$scm5",1,0,'C');
        // 6
        $this->SetXY(25,157);
        $this->Rect(25,157,170,14);
        $this->SetFont('THSarabun Bold','',16);
        $this->Cell(95,14,iconv( 'UTF-8','cp874' , "6.  ความพึงพอใจของนักศึกษา" ),0,0,'L');
        $this->SetFont('THSarabun','',14);
        $this->Cell(35,14,"$sp6_1",1,0,'C');
        $this->Cell(40,14,"$scm6_1",1,0,'C');
        $this->SetXY(30,168);
        $this->Write( 1, iconv( 'UTF-8','cp874' , "6.1 ต่องานที่ได้ปฏิบัติและสถานประกอบการ" )  );

        $this->SetXY(25,171);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    6.2 ต่อความเหมาะสม ความปลอดภัย ของที่พัก" ),1,0,'L');
        $this->Cell(35,6,"$sp6_2",1,0,'C');
        $this->Cell(40,6,"$scm6_2",1,0,'C');

        //วรรค 4 ครั้ง // //
        $this->SetXY(25,177);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    6.3 ต่อความสะดวกปลอดภัยในการเดินทางไป – กลับ" ),1,0,'L');
        $this->Cell(35,6,"$sp6_3",1,0,'C');
        $this->Cell(40,6,"$scm6_3",1,0,'C');

        $this->SetXY(25,183);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "    6.4 ต่อความเหมาะสมของค่าตอบแทน" ),1,0,'L');
        $this->Cell(35,6,"$sp6_4",1,0,'C');
        $this->Cell(40,6,"$scm6_4",1,0,'C');

        // 7

        $this->SetXY(25,189);
        $this->SetFont('THSarabun Bold','',16);
        $this->Cell(95,6,iconv( 'UTF-8','cp874' , "7.  สรุปโดยรวมของนักศึกษา" ),1,0,'L');
        $this->Cell(35,6,"$sp7",1,0,'C');
        $this->Cell(40,6,"$scm7",1,0,'C');
     
    }

    function MoreComemnt($morecomment)
    {
        $this->SetXY(25,201);
        $this->SetFont('THSarabun Bold','',16);
        $this->Write(1,iconv( 'UTF-8','cp874' , "ความคิดเห็นเพิ่มเติม" ));
        $this->SetXY(25,208);
        $this->SetFont('THSarabun','',16);
        $this->MultiCell(180,7,"$morecomment");

    }
    // End Page //
}

if ($input = $_POST)
{
//Title
$companyname = $_POST['companyname'];
$district = $_POST['district'];
$province = $_POST['province'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];


// StudentList
$std_fullname1 = $_POST['std_fullname1'];
$jobno1 = $_POST['jobno1'];
$fatory1 = $_POST['fatory1'];
$std_fullname2 = $_POST['std_fullname2'];
$jobno2 = $_POST['jobno2'];
$fatory2 = $_POST['fatory2'];
$std_fullname3 = $_POST['std_fullname3'];
$jobno3 = $_POST['jobno3'];
$fatory3 = $_POST['fatory3'];
$std_fullname4 = $_POST['std_fullname4'];
$jobno4 = $_POST['jobno4'];
$fatory4 = $_POST['fatory4'];
$std_fullname5 = $_POST['std_fullname5'];
$jobno5 = $_POST['jobno5'];
$fatory5 = $_POST['fatory5'];
$std_fullname6 = $_POST['std_fullname6'];
$jobno6 = $_POST['jobno6'];
$fatory6 = $_POST['fatory6'];



  //TeacherLisence  
$date = $_POST['date'];   
$teacher_name = $_POST['teacher_name'];


//GroupTeacher
$teacherjoin_name1 = $_POST['teacherjoin_name1'];
$teacherjoin_name2 = $_POST['teacherjoin_name2'];
$teacherjoin_name3 = $_POST['teacherjoin_name3'];


// Page 2

$p1_1 = $_POST['p1_1'];
$cm1_1 = $_POST['cm1_1'];
$p1_2 = $_POST['p1_2'];
$cm1_2 = $_POST['cm1_2'];
$p2_1 = $_POST['p2_1'];
$cm2_1 = $_POST['cm2_1'];
$p2_2 = $_POST['p2_2'];
$cm2_2 = $_POST['cm2_2'];
$p2_3 = $_POST['p2_3'];
$cm2_3 = $_POST['cm2_3'];
$p3_1 = $_POST['p3_1'];
$cm3_1 = $_POST['cm3_1'];
$p4_1 = $_POST['p4_1'];
$cm4_1 = $_POST['cm4_1'];
$p4_2 = $_POST['p4_2'];
$cm4_2 = $_POST['cm4_2'];
$p4_3 = $_POST['p4_3']; 
$cm4_3 = $_POST['cm4_3'];
$p4_4 = $_POST['p4_4'];
$cm4_4 = $_POST['cm4_4']; 
$p4_5= $_POST['p4_5'];
$cm4_5 = $_POST['cm4_5'];
$p5_1 = $_POST['p5_1'];
$cm5_1 = $_POST['cm5_1'];
$p5_2 = $_POST['p5_2'];
$cm5_2 = $_POST['cm5_2'];
$p5_3 = $_POST['p5_3'];
$cm5_3 = $_POST['cm5_3'];
$p5_4 = $_POST['p5_4'];
$cm5_4 = $_POST['cm5_4'];
$p5_5 = $_POST['p5_5'];
$cm5_5 = $_POST['cm5_5'];
$p5_6 = $_POST['p5_6'];
$cm5_6 = $_POST['cm5_6'];
$p5_7 = $_POST['p5_7'];
$cm5_7 = $_POST['cm5_7'];
$p5_8 = $_POST['p5_8'];
$cm5_8 = $_POST['cm5_8'];
$p6_1 = $_POST['p6_1'];
$cm6_1 = $_POST['cm6_1'];

// End 2

// Page 3

// TitleStudentComment
$obj1 = ISSET($_POST['obj1']) ? ISSET($_POST['obj1']) : '';
$obj2 = ISSET($_POST['obj2']) ? ISSET($_POST['obj2']) : '';
$obj3 = ISSET($_POST['obj3']) ? ISSET($_POST['obj3']) : '';
$obj4 = ISSET($_POST['obj4']) ? ISSET($_POST['obj4']) : '';
// $obj1 = $_POST['obj1'];
// $obj2 = $_POST['obj2'];
// $obj3 = $_POST['obj3'];
// $obj4 = $_POST['obj4'];
$std_name = $_POST['std_name'];
$std_submajor = $_POST['std_submajor'];

/// Std Cm
$sp1 = $_POST['sp1'];
$scm1 = $_POST['scm1'];
$sp1_1 = $_POST['sp1_1'];
$scm1_1 = $_POST['scm1_1'];
$sp1_2 = $_POST['sp1_2'];
$scm1_2 = $_POST['scm1_2'];
$sp1_3 = $_POST['sp1_3'];
$scm1_3 = $_POST['scm1_3'];
$sp1_4 = $_POST['sp1_4'];
$scm1_4 = $_POST['scm1_4'];
$sp1_5 = $_POST['sp1_5'];
$scm1_5 = $_POST['scm1_5'];
$sp1_6 = $_POST['sp1_6'];
$scm1_6 = $_POST['scm1_6'];
$sp1_7 = $_POST['sp1_7'];
$scm1_7= $_POST['scm1_7'];
$sp2 = $_POST['sp2'];
$scm2 = $_POST['scm2'];
$sp3 = $_POST['sp3'];
$scm3 = $_POST['scm3'];
$sp4 = $_POST['sp4'];
$scm4 = $_POST['scm4'];
$sp5 = $_POST['sp5'];
$scm5 = $_POST['scm5'];
$sp6_1 = $_POST['sp6_1'];
$scm6_1 = $_POST['scm6_1'];
$sp6_2 = $_POST['sp6_2'];
$scm6_2 = $_POST['scm6_2'];
$sp6_3 = $_POST['sp6_3'];
$scm6_3 = $_POST['scm6_3'];
$sp6_4 = $_POST['sp6_4'];
$scm6_4 = $_POST['scm6_4']; 
$sp7 = $_POST['sp7'];
$scm7 = $_POST['scm7'];

// MoreComemnt
$morecomment = $_POST['morecomment'];


// End 3
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
//Page 1
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.5);
$pdf->Line(30,60,180,60);
$pdf->Header();
$pdf->Footer();

$pdf->Title($companyname,$district,$province,$phone,$fax);
$pdf->Studentlist($std_fullname1,$jobno1,$fatory1,$std_fullname2,$jobno2,$fatory2,
                $std_fullname3,$jobno3,$fatory3,$std_fullname4,$jobno4,$fatory4,
                $std_fullname5,$jobno5,$fatory5,$std_fullname6,$jobno6,$fatory6);
$pdf->TeacherLisence($teacher_name,DateThai($date));
$pdf->GroupTeacher($teacherjoin_name1,$teacherjoin_name2,$teacherjoin_name3);
$pdf->Explan();
$pdf->SetLineWidth(0.1);
//Page 2
$pdf->AddPage('P','A4');

$pdf->CompamyComment($p1_1,$cm1_1,$p1_2,$cm1_2,
$p2_1,$cm2_1,$p2_2,$cm2_2,$p2_3,$cm2_3,$p3_1,$cm3_1,
$p4_1,$cm4_1,$p4_2,$cm4_2,$p4_3,$cm4_3,$p4_4,$cm4_4,$p4_5,$cm4_5,
$p5_1,$cm5_1,$p5_2,$cm5_2,$p5_3,$cm5_3,$p5_4,$cm5_4,$p5_5,$cm5_5,$p5_6,$cm5_6,$p5_7,$cm5_7,$p5_8,$cm5_8,
$p6_1,$cm6_1);

//Page 3
$pdf->AddPage('P','A4');
$pdf->TitleStudentComment($obj1,$obj2,$obj3,$obj4,$std_name,$std_submajor);
$pdf->StudentComment($sp1,$scm1,$sp1_1,$scm1_1,$sp1_2,$scm1_2,$sp1_3,$scm1_3,$sp1_4,$scm1_4,
$sp1_5,$scm1_5,$sp1_6,$scm1_6,$sp1_7,$scm1_7,
$sp2,$scm2,$sp3,$scm3,$sp4,$scm4,$sp5,$scm5,
$sp6_1,$scm6_1,$sp6_2,$scm6_2
,$sp6_3,$scm6_3,$sp6_4,$scm6_4,$sp7,$scm7);
$pdf->MoreComemnt($morecomment);
//
$pdf->Output();
}
?>    