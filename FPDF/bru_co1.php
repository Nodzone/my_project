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
            $this->Write(1,"BRU-Co1");
            ///  User up load img ผมจะอัพรูปลงตรงนี้
            $this->Image("uploads/$this->imageHeader",150,25,25,0,'');
            $this->SetXY(85,50);
            $this->Write( 1  , iconv( 'UTF-8','cp874' , ' ใบสมัครงานสหกิจศึกษา' )  );
            $this->SetXY(75,55);
            $this->Write( 2  , iconv( 'UTF-8','cp874' , 'สหกิจศึกษา มหาวิทยาลัยราชภัฏบุรีรัมย์' )  );
        }
    }
    
    function Footer(){
       
        $this->SetAutoPageBreak(0);
        $this->SetY( -10 ); //dกำหนดการเยื้อง 10 มม.
        $this->SetFont('THSarabun','',5);
        $this->Cell(0,10, 'https://www.bru.ac.th' ,0,0,'L');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    
}
    function Body($title_name,
        $company_name,$wantposition,$work_number,$start,$until,$std_fullname,$eng_std_fullname,$std_id,$fatory,
        $faculty,$major,$std_year,$teac_name,$gpa,$gpax,$id_card,$isa,$isd,$exd,$race,$nation,$religion,
        $dob,$pob,$age,$sex,$hight,$weight,$cds,$address,$call,$phone,$fax,$email,$address_2,$call_2,$phone_2,$fax_2 
    )
    {
        $this->SetXY(30,70);
        $this->SetTextColor(0,0,0);
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อสถานปฏิบัติงานที่ต้องการสมัคร (Name of Company): $company_name" )  );
        //input valume
        $this->SetXY(30,76);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "สมัครงานในตำแหน่ง(Position Sought) : $wantposition" )  );
        $this->SetXY(130,76);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หมายเลขงาน : $work_number" )  );
        $this->SetXY(30,82);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ระยะเวลาปฏิบัติงานสหกิจศึกษาจาก (Period of Work Form Until) : $start จนถึง $until" )  );
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,88);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ข้อมูลส่วนตัวนักศึกษา (Student Personal Data) " )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,94);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อ-สกุล  : $title_name $std_fullname " )  );
        $this->SetXY(30,100);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "Name & Surname English :  $eng_std_fullname " )  );
        $this->SetXY(30,106);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "รหัสนักศึกษา (Student identification No.) : $std_id" )  );
        $this->SetXY(30,112);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "หลักสูตร : $fatory คณะ (Faculty) : $faculty สาขาวิชา (Major) : $major" )  );
        $this->SetXY(30,118);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "นักศึกษาชั้นปีที่ (Year in Department) : $std_year " )  );
        $this->SetXY(30,124);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "อาจารย์ที่ปรึกษา (Name of Academic Advisor) : $teac_name " )  );
        $this->SetXY(30,130);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เกรดเฉลี่ยภาคการศึกษาที่ผ่านมา (GPA) : $gpa เกรดเฉลี่ยรวม (GPAX) : $gpax" )  );
        $this->SetXY(30,136);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "บัตรประจำตัวประชาชนเลขที่ (ID CARD NUMBER) : $id_card" )  );
        $this->SetXY(30,142);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ออกให้ ณ. (Issue at): $isa เมื่อวันที่ (Issue Date): $isd หมดอายุวัน (Expiry Date): $exd" )  );
        $this->SetXY(30,148);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "เชื้อชาติ (Race) : $race สัญชาติ (Nationality) : $nation  ศาสนา (Religion) : $religion " )  );
        $this->SetXY(30,156);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "วัน เดือน ปีเกิด (Date of Birth) : $dob  สถานที่เกิด (Place of Birth) : $pob " )  );
        $this->SetXY(30,162);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "อายุ (Age) : $age ปี  เพศ (Sex) : $sex  ส่วนสูง (Height) : $hight  น้ำหนัก (Weight) : $weight " )  );
        $this->SetXY(30,168);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โรคประจำตัวระบุ (Chronicle Disease : Specify) : $cds " )  );
        $this->SetXY(30,174);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ที่อยู่ปัจจุบัน (Address) : $address  ")  );
        $this->SetXY(30,180);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรศัพท์ (Telephone No.) : $call  โทรศัพท์เคลื่อนที่ (Mobile Phone No.) : $phone  ")  );
        $this->SetXY(30,186);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรสาร (Fax No.) : $fax  ")  );
        $this->SetXY(30,192);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "จดหมายอิเล็กทรอนิกส์ (E-mail) : $email " )  );
        $this->SetXY(30,198);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ที่อยู่ถาวร (Permanent Address): $address_2 " )  );
        $this->SetXY(30,204);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรศัพท์ (Telephone No.) : $call_2 โทรศัพท์เคลื่อนที่ (Mobile Phone No.) : $phone_2    " )  );
        $this->SetXY(30,210);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรสาร (Fax No.) : $fax_2   " )  );
        
        
        
        
    }

    function Page2($contact ,$rela,$ct_work,$ct_place,$ct_address ,$ct_call,$ct_phone,$ct_fax,$dad_work,$dad_fullname,$mom_fullname ,$mom_work ,$pr_address,$pr_call,$pr_phone,$pr_fax,$allbro,$ambro)
    {
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->SetFont('THSarabun','',100);
        $this->SetTextColor(255,192,203);
        $this->RotatedText(35,190,iconv('UTF-8','cp874',"ตัวอย่างเอกสาร"),45);
        $this->SetTextColor(0,0,0);
        $this->SetFont('THSarabun','',16);
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,30);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน (Emergency Case Contact to) " )  );
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,37);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ชื่อ-สกุล (First Name-Last Name) : $contact    ความเกี่ยวข้อง (Relation) : $rela " )  );
        $this->SetXY(30,44);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "อาชีพ (Occupation)   : $ct_work  สถานที่ทำงาน (Place of Work) : $ct_place" )  );
        $this->SetXY(30,51);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ที่อยู่ (Address) : $ct_address " )  );
        $this->SetXY(30,58);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรศัพท์ (Telephone No.) : $ct_call  โทรศัพท์เคลื่อนที่ (Mobile Phone No.) : $ct_phone  " )  );
        $this->SetXY(30,65);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "โทรสาร (Fax No.) : $ct_fax   " )  );
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,72);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ข้อมูลครอบครัว (Family Details)" )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,79);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "บิดา ชื่อ-สกุล (Father Full-Name)  : $dad_fullname  อาชีพ (Occupation) : $dad_work  " )  );
        $this->SetXY(30,86);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "มารดา ชื่อ-สกุล (Mother Full-Name) : $mom_fullname  อาชีพ (Occupation) : $mom_work  " )  );
        $this->SetXY(30,93);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ที่อยู่ (Address) :  $pr_address " )  );
        $this->SetXY(30,100);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "ทรศัพท์ (Telephone No.) : $pr_call  โทรศัพท์เคลื่อนที่ (Mobile Phone No.) : $pr_phone    " )  );
        $this->SetXY(30,107);
        $this->Write( 2  , iconv( 'UTF-8','cp874' , "โทรสาร (Fax No.) :  $pr_fax  " )  );
        $this->SetXY(30,114);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "จำนวนพี่น้อง (No. of Relatives) : $allbro คน เป็นบุตรคนที่ (You are the):  $ambro  " )  );
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,121);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ตามรายละเอียดข้างล่างนี้ (as Follows)' )  );
    }
    
    function FamilyTable($bro_name1,$bro_age1,$bro_sex1,$bro_type1,$bro_work1,$bro_name2,$bro_age2,$bro_sex2,$bro_type2,$bro_work2,
    $bro_name3,$bro_age3,$bro_sex3,$bro_type3,$bro_work3,$bro_name4,$bro_age4,$bro_sex4,$bro_type4,$bro_work4,
     $bro_name5,$bro_age5,$bro_sex5,$bro_type5,$bro_work5,$bro_name6,$bro_age6,$bro_sex6,$bro_type6,$bro_work6)
    
    {
        // Header

       
        $this->SetXY(20,131);  
        $this->Cell(60,8,iconv('UTF-8','cp874' ,'ชื่อ-นามสกุล / Name'),1,0,'C');
        $this->Cell(20,8,iconv('UTF-8','cp874' ,'อายุ / Age'),1,0,'C');
        $this->Cell(20,8,iconv('UTF-8','cp874' ,'เพศ / Sex'),1,0,'C');
        $this->Cell(25,8,iconv('UTF-8','cp874', 'ความสัมพันธ์ '),1,0,'C');
        $this->Cell(35,8,iconv('UTF-8','cp874', 'อาชีพ / Occupation'),1,0,'C');
        $this->Ln();
        $this->SetFont('THSarabun','',16);
        $this->SetXY(20,139);
        $this->Cell(60,6,iconv('UTF-8','cp874' ,"1.$bro_name1"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_age1"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_sex1"),1,0,'C');
        $this->Cell(25,6,iconv('UTF-8','cp874', "$bro_type1"),1,0,'C');
        $this->Cell(35,6,iconv('UTF-8','cp874', "$bro_work1"),1,0,'C');
        $this->SetXY(20,145);  
        $this->Cell(60,6,iconv('UTF-8','cp874' ,"2.$bro_name2"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_age2"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_sex2"),1,0,'C');
        $this->Cell(25,6,iconv('UTF-8','cp874', "$bro_type2"),1,0,'C');
        $this->Cell(35,6,iconv('UTF-8','cp874', "$bro_work2"),1,0,'C');
        $this->SetXY(20,151);  
        $this->Cell(60,6,iconv('UTF-8','cp874' ,"3.$bro_name3"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_age3"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_sex3"),1,0,'C');
        $this->Cell(25,6,iconv('UTF-8','cp874', "$bro_type3"),1,0,'C');
        $this->Cell(35,6,iconv('UTF-8','cp874', "$bro_work3"),1,0,'C');
        $this->SetXY(20,157);  
        $this->Cell(60,6,iconv('UTF-8','cp874' ,"4.$bro_name4"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_age4"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_sex4"),1,0,'C');
        $this->Cell(25,6,iconv('UTF-8','cp874', "$bro_type4"),1,0,'C');
        $this->Cell(35,6,iconv('UTF-8','cp874', "$bro_work4"),1,0,'C');
        $this->SetXY(20,163);  
        $this->Cell(60,6,iconv('UTF-8','cp874' ,"5.$bro_name5"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_age5"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_sex5"),1,0,'C');
        $this->Cell(25,6,iconv('UTF-8','cp874', "$bro_type5"),1,0,'C');
        $this->Cell(35,6,iconv('UTF-8','cp874', "$bro_work5"),1,0,'C');
        $this->SetXY(20,169);  
        $this->Cell(60,6,iconv('UTF-8','cp874' ,"6.$bro_name6"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_age6"),1,0,'C');
        $this->Cell(20,6,iconv('UTF-8','cp874' ,"$bro_sex6"),1,0,'C');
        $this->Cell(25,6,iconv('UTF-8','cp874', "$bro_type6"),1,0,'C');
        $this->Cell(35,6,iconv('UTF-8','cp874', "$bro_work6"),1,0,'C');
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,179);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ประวัติการศึกษา (Educational Background)' )  );
        
    }

// Better table
    function EducationTable($school_1,$yeas_s1,$year_d1,$s_gpa1,$s_type1,$school_2,$yeas_s2,$year_d2,$s_gpa2,$s_type2
    ,$school_3,$yeas_s3,$year_d3,$s_gpa3,$s_type3,$school_4,$yeas_s4,$year_d4,$s_gpa4,$s_type4
    ,$school_5,$yeas_s5,$year_d5,$s_gpa5,$s_type5,$school_6,$yeas_s6,$year_d6,$s_gpa6,$s_type6)
    {

        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(20,189);  
        $this->Cell(40,10,iconv('UTF-8','cp874' ,'ระดับ'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874' ,'สถานศึกษา'),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874' ,'ปีที่เริ่ม'),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874', 'ปีที่จบ'),1,0,'C');
        $this->Cell(30,10,iconv('UTF-8','cp874', 'วุฒิการศึกษา'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874', 'วิชา'),1,0,'C');

        $this->SetFont('THSarabun','',16);
       

        $this->SetFont('THSarabun','',16);
        $this->SetXY(20,199); 
        $this->Cell(40,10,iconv('UTF-8','cp874' ,'ประถมศึกษา'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874' ,"$school_1"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874' ,"$yeas_s1"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874', "$year_d1"),1,0,'C');
        $this->Cell(30,10,iconv('UTF-8','cp874', "$s_gpa1"),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874', "$s_type1"),1,0,'C');

        $this->SetXY(20,209); 
        $this->Cell(40,10,iconv('UTF-8','cp874' ,'มัธยมศึกษาตอนต้น'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874' ,"$school_2"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874' ,"$yeas_s2"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874', "$year_d2"),1,0,'C');
        $this->Cell(30,10,iconv('UTF-8','cp874', "$s_gpa2"),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874', "$s_type2"),1,0,'C');

        $this->SetXY(20,219); 
        $this->Cell(40,10,iconv('UTF-8','cp874' ,'มัธยมศึกษาตอนปลาย'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874' ,"$school_3"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874' ,"$yeas_s3"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874', "$year_d3"),1,0,'C');
        $this->Cell(30,10,iconv('UTF-8','cp874', "$s_gpa3"),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874', "$s_type3"),1,0,'C');

        $this->SetXY(20,229); 
        $this->Cell(40,10,iconv('UTF-8','cp874' ,'ต่ำกว่าอนุปริญญา'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874' ,"$school_4"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874' ,"$yeas_s4"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874', "$year_d4"),1,0,'C');
        $this->Cell(30,10,iconv('UTF-8','cp874', "$s_gpa4"),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874', "$s_type4"),1,0,'C');

        $this->SetXY(20,239); 
        $this->Cell(40,10,iconv('UTF-8','cp874' ,'อนุปริญญา'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874' ,"$school_5"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874' ,"$yeas_s5"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874', "$year_d5"),1,0,'C');
        $this->Cell(30,10,iconv('UTF-8','cp874', "$s_gpa5"),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874', "$s_type5"),1,0,'C');

        $this->SetXY(20,249); 
        $this->Cell(40,10,iconv('UTF-8','cp874' ,'มหาวิทยาลัย'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874' ,"$school_6"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874' ,"$yeas_s6"),1,0,'C');
        $this->Cell(12,10,iconv('UTF-8','cp874', "$year_d6"),1,0,'C');
        $this->Cell(30,10,iconv('UTF-8','cp874', "$s_gpa6"),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','cp874', "$s_type6"),1,0,'C');
       
    }

    function StartPage3($job_in1,$job_in2,$job_in3,$job_in4,$work_out_plan1,$work_out_plan2,$work_out_plan3,$work_out_plan4)
    {
        $this->AddFont('THSarabun','','THSarabun.php');
        $this->SetFont('THSarabun','',100);
        $this->SetTextColor(255,192,203);
        $this->RotatedText(35,190,iconv('UTF-8','cp874',"ตัวอย่างเอกสาร"),45);
        $this->SetTextColor(0,0,0);
        $this->AddFont('THSarabun Bold','','THSarabun Bold.php');
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,140);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'จุดมุ่งหมายอาชีพ (Career Objectives) ' )  );
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,145);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ระบุสายงานและลักษณะงานที่นักศึกษาสนใจ' )  );
        $this->SetXY(30,150);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , '(Indicate your Career Objectives, Files of Interest and Job Preference) ' )  );
        $this->SetXY(30,155);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "1. $job_in1" )  );
        $this->SetXY(30,160);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "2. $job_in2 " )  );
        $this->SetXY(30,165);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "3. $job_in3 " )  );
        $this->SetXY(30,170);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "4. $job_in4 " )  );
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,175);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'กิจกรรมนอกหลักสูตร (Student Activities) ' )  );
        $this->SetXY(30,180);
        $this->SetFont('THSarabun','',16);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ระยะเวลา (Years) ตำแหน่งและหน้าที่ (Position / Responsibility)' )  );
        $this->SetXY(30,185);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "1. $work_out_plan1" )  );
        $this->SetXY(30,190);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "2. $work_out_plan2 " )  );
        $this->SetXY(30,195);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "3. $work_out_plan3 " )  );
        $this->SetXY(30,200);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "4. $work_out_plan4 " )  );   
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,205);
        $this->Write( 1  , iconv( 'UTF-8','cp874' , 'ความสามารถทางด้านภาษา (Languages Ability) ' )  );  
    }

    function PreviousTraining($form1,$until1,$local1,$used_position1 ,$form2,$until2,$local2,$used_position2 , $form3,$until3,$local3,$used_position3,
    $form4,$until4,$local4,$used_position4 ,$form5,$until5,$local5,$used_position5 , $form6,$until6,$local6,$used_position6,
    $form7,$until7,$local7,$used_position7 ,$form8,$until8,$local8,$used_position8 , $form9,$until9,$local9,$used_position9,
    $form10,$until10,$local10,$used_position10 , $form11,$until11,$local11,$used_position11
    )
    
    {
        $this->SetFont('THSarabun Bold','',16);      
        $this->Rect(30,60,162,77);
        $this->SetXY(30,30);  
        $this->Cell(162,10,iconv('UTF-8','cp874' ,'ประวัติการอบรบและปฏิบัตงานสหกิจศึกษา(Previous Training)'),1,0,'C');
        $this->SetXY(30,40);  
        $this->Cell(52,10,iconv('UTF-8','cp874' ,'ระยะเวลาฝึก (Training Period)'),1,0,'C');
        $this->SetXY(30,50); 
        $this->Cell(26,10,iconv('UTF-8','cp874' ,'จาก (From)'),1,0,'C');
        $this->SetXY(56,50); 
        $this->Cell(26,10,iconv('UTF-8','cp874', 'ถึง (Until)'),1,0,'C');
        $this->SetXY(82,40);
        $this->Cell(60,10,iconv('UTF-8','cp874' ,'สถานที่ปฏิบัติงาน/ที่อยู่'),0,0,'C');
        $this->Rect(82,40,60,97);
        $this->SetXY(85,49);
        $this->MultiCell(50,6,iconv('UTF-8','cp874', 'Organization / Address'));
        $this->SetXY(142,40);
        $this->Cell(50,10,iconv('UTF-8','cp874', 'ตำแหน่ง/หัวข้ออบรม/หน้าที่'),0,0,'C');
        $this->Rect(142,40,50,97);
        $this->SetXY(142,47);
        $this->MultiCell(50,6,iconv('UTF-8','cp874', 'Position / Topics / Job Title/ Job Description'));

        // ข้อมูลแต่ละแถวในตาราง
        $this->SetFont('THSarabun','',16);
        $this->SetXY(30,60); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form1 - $until1 "),1,0,'C');
        $this->SetXY(82,60);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local1 "),1,0,'C');
        $this->SetXY(142,60);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position1 "),1,0,'C');


        $this->SetXY(30,67); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form2 - $until2 "),1,0,'C');
        $this->SetXY(82,67);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local2 "),1,0,'C');
        $this->SetXY(142,67);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position2 "),1,0,'C');

        $this->SetXY(30,74); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form3 - $until3 "),1,0,'C');
        $this->SetXY(82,74);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local3 "),1,0,'C');
        $this->SetXY(142,74);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position3 "),1,0,'C');

        $this->SetXY(30,81); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form4 - $until4 "),1,0,'C');
        $this->SetXY(82,81);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local4 "),1,0,'C');
        $this->SetXY(142,81);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position4 "),1,0,'C');

        $this->SetXY(30,88); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form5 - $until5 "),1,0,'C');
        $this->SetXY(82,88);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local5 "),1,0,'C');
        $this->SetXY(142,88);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position5 "),1,0,'C');

        $this->SetXY(30,95); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form6 - $until6 "),1,0,'C');
        $this->SetXY(82,95);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local6 "),1,0,'C');
        $this->SetXY(142,95);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position6 "),1,0,'C');

        $this->SetXY(30,102); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form7 - $until7 "),1,0,'C');
        $this->SetXY(82,102);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local7 "),1,0,'C');
        $this->SetXY(142,102);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position7 "),1,0,'C');

        $this->SetXY(30,109); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form8 - $until8 "),1,0,'C');
        $this->SetXY(82,109);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local8 "),1,0,'C');
        $this->SetXY(142,109);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position8 "),1,0,'C');

        $this->SetXY(30,116); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form9 - $until9 "),1,0,'C');
        $this->SetXY(82,116);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local9 "),1,0,'C');
        $this->SetXY(142,116);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position9 "),1,0,'C');

        $this->SetXY(30,123); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form10 - $until10 "),1,0,'C');
        $this->SetXY(82,123);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local10 "),1,0,'C');
        $this->SetXY(142,123);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position10 "),1,0,'C');

        $this->SetXY(30,130); 
        $this->Cell(52,7,iconv('UTF-8','cp874' ," $form11 - $until11 "),1,0,'C');
        $this->SetXY(82,130);
        $this->Cell(60,7,iconv('UTF-8','cp874' ," $local11 "),1,0,'C');
        $this->SetXY(142,130);
        $this->Cell(50,7,iconv('UTF-8','cp874', " $used_position11 "),1,0,'C');
        


    }

    function LanguagesAbility($other,$lavel1_1,$lavel1_2,$lavel1_3,$lavel2_1,$lavel2_2,$lavel2_3,$lavel3_1,$lavel3_2,$lavel3_3,$lavel4_1,$lavel4_2,$lavel4_3)
    {
        $this->SetFont('THSarabun Bold','',16);
        $this->SetXY(30,215);  
        $this->Cell(50,6,iconv('UTF-8','cp874' ,'ภาษา (Languages)'),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,'ฟัง (Listen)'),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,'พูด (Speaking)'),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874', 'เขียน (Writing)'),1,0,'C');
        $this->SetFont('THSarabun','',16);

        $this->SetXY(30,221); 
        $this->Cell(50,6,iconv('UTF-8','cp874' ,'อังกฤษ (English)'),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel1_1"),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel1_2"),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel1_3"),1,0,'C');
        $this->SetXY(30,227); 
        $this->Cell(50,6,iconv('UTF-8','cp874', 'ญี่ปุ่น (Japan)'),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel2_1"),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel2_2"),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel2_3"),1,0,'C');
        $this->SetXY(30,233); 
        $this->Cell(50,6, iconv('UTF-8','cp874' ,'จีน (China)'),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel3_1"),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel3_2"),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel3_3"),1,0,'C');
        $this->SetXY(30,239); 
        $this->Cell(50,6, iconv('UTF-8','cp874' ,"$other"),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel4_1"),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel4_2"),1,0,'C');
        $this->Cell(30,6,iconv('UTF-8','cp874' ,"$lavel4_3"),1,0,'C');
        
      
    }

    function License($std_fullname,$date)
    {
        $this->SetXY(130,250);   
        $this->Write( 1  , iconv( 'UTF-8','cp874' , "ลงชื่อ $std_fullname   " )  ); 
        $this->SetXY(140,255);   
        $this->Write( 1  , iconv( 'UTF-8','cp874' , " ($std_fullname)" )  ); 
        $this->SetXY(140,260);   
        $this->Write( 1  , iconv( 'UTF-8','cp874' , " วันที่ $date" )  );   
    }
 
    
}



if($input = $_POST)
{

$std_fullname = $_POST['std_fullname'];
$date = $_POST['date'];
$title_std = $_POST['title_std'];
{
    if ($_POST['title_std'] == 1)
    {
        $title_name  = "นาย";
        
    }
    else if ($_POST['title_std'] == 2)
    {
        $title_name  = "นาง"; 
    }
    else if ($_POST['title_std'] == 3)
    {
        $title_name  = "นางสาว"; 
    }
}
$major = $_POST['major']; 
$class = ISSET($_POST['class']) ? ISSET($_POST['class']) : '';
{
    if (ISSET($_POST['class']) == 1)
    {
        $start = " 2019/12/03";
        $until = " 2020/03/22 ";
    }
    else 
    {
        $start = $_POST['start'];
        $until = $_POST['until'];
    }
}
$company_name = $_POST['company_name'];
$wantposition = $_POST['wantposition'];
$work_number = $_POST['work_number'];

$eng_std_fullname = $_POST['eng_std_fullname'];
$std_id = $_POST['std_id'];
$fatory = $_POST['fatory'];
$faculty = $_POST['faculty'];
$std_year = $_POST['std_year'];
$teac_name = $_POST['teac_name'];

$gpa = $_POST['gpa'];
$gpax = $_POST['gpax'];
$id_card = $_POST['id_card'];
$isa = $_POST['isa'];
$isd = $_POST['isd'];
$exd = $_POST['exd'];
$race = $_POST['race'];
$nation = $_POST['nation'];
$religion = $_POST['religion'];
$dob = $_POST['dob'];
$pob = $_POST['pob'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$hight = $_POST['hight'];

$weight = $_POST['weight'];
$cds = $_POST['cds'];
$id_card = $_POST['id_card'];
$address = $_POST['address'];
$call = $_POST['call'];
$phone = $_POST['phone'];
$fax = $_POST['fax'];
$email = $_POST['email'];

//// Old Address

$old_address = $_POST['old_address'];


if ($old_address == 2)
    {
        $address_2 = $address;
        $call_2 = $call;
        $phone_2 = $phone;
        $fax_2 = $fax ;
    }
else  if($old_address == 1)
    {
        $address_2 = $_POST['address_2'];
        $call_2 = $_POST['call_2'];
        $phone_2 = $_POST['phone_2'];
        $fax_2 = $_POST['fax_2'];
    }


// Page2

$contact = $_POST['contact'];
$rela = $_POST['rela'];
$ct_work = $_POST['ct_work'];
$ct_place = $_POST['ct_place'];
$ct_address = $_POST['ct_address'];
$ct_call = $_POST['ct_call'];
$ct_phone = $_POST['ct_phone'];
$ct_fax = $_POST['ct_fax'];
$dad_work = $_POST['dad_work'];
$dad_fullname = $_POST['dad_fullname'];

$mom_fullname = $_POST['mom_fullname'];
$mom_work = $_POST['mom_work'];
$pr_address = $_POST['pr_address'];
$pr_call = $_POST['pr_call'];
$pr_phone = $_POST['pr_phone'];
$pr_fax = $_POST['pr_fax'];
$allbro = $_POST['allbro'];
$ambro = $_POST['ambro'];


// FamilyTable

$bro_name1 = $_POST['bro_name1'];
$bro_age1 = $_POST['bro_age1'];
$bro_sex1 = $_POST['bro_sex1'];
$bro_type1 = $_POST['bro_type1'];
$bro_work1 = $_POST['bro_work1'];
$bro_name2 = $_POST['bro_name2'];
$bro_age2 = $_POST['bro_age2'];
$bro_sex2 = $_POST['bro_sex2'];
$bro_type2 = $_POST['bro_type2'];
$bro_work2 = $_POST['bro_work2'];
$bro_name3 = $_POST['bro_name3'];
$bro_age3 = $_POST['bro_age3'];
$bro_sex3 = $_POST['bro_sex3'];
$bro_type3 = $_POST['bro_type3'];
$bro_work3 = $_POST['bro_work3'];
$bro_name4 = $_POST['bro_name4'];
$bro_age4 = $_POST['bro_age4'];
$bro_sex4 = $_POST['bro_sex4'];
$bro_type4 = $_POST['bro_type4'];
$bro_work4 = $_POST['bro_work4'];
$bro_name5 = $_POST['bro_name5'];
$bro_age5 = $_POST['bro_age5'];
$bro_sex5 = $_POST['bro_sex5'];
$bro_type5 = $_POST['bro_type5'];
$bro_work5 = $_POST['bro_work5'];
$bro_name6 = $_POST['bro_name6'];
$bro_age6 = $_POST['bro_age6'];
$bro_sex6 = $_POST['bro_sex6'];
$bro_type6 = $_POST['bro_type6'];
$bro_work6 = $_POST['bro_work6'];


// EducationTable 

$school_1 = $_POST['school_1'];
$yeas_s1 = $_POST['yeas_s1'];
$year_d1 = $_POST['year_d1'];
$s_gpa1 = $_POST['s_gpa1'];
$s_type1 = $_POST['s_type1'];
$school_2 = $_POST['school_2'];
$yeas_s2 = $_POST['yeas_s2'];
$year_d2 = $_POST['year_d2'];
$s_gpa2 = $_POST['s_gpa2'];
$s_type2 = $_POST['s_type2'];
$school_3 = $_POST['school_3'];
$yeas_s3 = $_POST['yeas_s3'];
$year_d3 = $_POST['year_d3'];
$s_gpa3 = $_POST['s_gpa3'];
$s_type3 = $_POST['s_type3'];
$school_4 = $_POST['school_4'];
$yeas_s4 = $_POST['yeas_s4'];
$year_d4 = $_POST['year_d4'];
$s_gpa4 = $_POST['s_gpa4'];
$s_type4 = $_POST['s_type4'];
$school_5 = $_POST['school_5'];
$yeas_s5 = $_POST['yeas_s5'];
$year_d5 = $_POST['year_d5'];
$s_gpa5 = $_POST['s_gpa5'];
$s_type5 = $_POST['s_type5'];
$school_6 = $_POST['school_6'];
$yeas_s6 = $_POST['yeas_s6'];
$year_d6 = $_POST['year_d6'];
$s_gpa6 = $_POST['s_gpa6'];
$s_type6 = $_POST['s_type6'];


//PreviousTraining


$form1 = $_POST['form1'];
$until1 = $_POST['until1'];
$local1 = $_POST['local1'];
$used_position1 = $_POST['used_position1'];

$form2 = $_POST['form2'];
$until2 = $_POST['until2'];
$local2 = $_POST['local2'];
$used_position2 = $_POST['used_position2'];

$form3 = $_POST['form3'];
$until3 = $_POST['until3'];
$local3 = $_POST['local3'];
$used_position3 = $_POST['used_position3'];

$form4 = $_POST['form4'];
$until4 = $_POST['until4'];
$local4 = $_POST['local4'];
$used_position4 = $_POST['used_position4'];

$form5 = $_POST['form5'];
$until5 = $_POST['until5'];
$local5 = $_POST['local5'];
$used_position5 = $_POST['used_position5'];

$form6 = $_POST['form6'];
$until6 = $_POST['until6'];
$local6 = $_POST['local6'];
$used_position6 = $_POST['used_position6'];

$form7 = $_POST['form7'];
$until7 = $_POST['until7'];
$local7 = $_POST['local7'];
$used_position7 = $_POST['used_position7'];

$form8 = $_POST['form8'];
$until8 = $_POST['until8'];
$local8 = $_POST['local8'];
$used_position8 = $_POST['used_position8'];

$form9 = $_POST['form9'];
$until9 = $_POST['until9'];
$local9 = $_POST['local9'];
$used_position9 = $_POST['used_position9'];

$form10= $_POST['form10'];
$until10 = $_POST['until10'];
$local10 = $_POST['local10'];
$used_position10 = $_POST['used_position10'];

$form11 = $_POST['form11'];
$until11 = $_POST['until11'];
$local11 = $_POST['local11'];
$used_position11 = $_POST['used_position11'];

// StartPage3


$job_in1 = $_POST['job_in1'];
$job_in2 = $_POST['job_in2'];
$job_in3 = $_POST['job_in3'];
$job_in4 = $_POST['job_in4'];

$work_out_plan1 = $_POST['work_out_plan1'];
$work_out_plan2 = $_POST['work_out_plan2'];
$work_out_plan3 = $_POST['work_out_plan3'];
$work_out_plan4 = $_POST['work_out_plan4'];

// LanguagesAbility 
$other = $_POST['other'];
$lavel1_1 = $_POST['lavel1_1'];
$lavel1_2 = $_POST['lavel1_2'];
$lavel1_3 = $_POST['lavel1_3'];
$lavel2_1 = $_POST['lavel2_1'];
$lavel2_2 = $_POST['lavel2_2'];
$lavel2_3 = $_POST['lavel2_3'];
$lavel3_1 = $_POST['lavel3_1'];
$lavel3_2 = $_POST['lavel3_2'];
$lavel3_3 = $_POST['lavel3_3'];
$lavel4_1 = $_POST['lavel4_1'];
$lavel4_2 = $_POST['lavel4_2'];
$lavel4_3 = $_POST['lavel4_3'];

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

function DateThai2($date, $type = 'date')
{

    $date = date('Y-n-d H:i:s', strtotime($date));
    $TH_Month = array(null, "ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
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
        return $day . '' . $monthThai . ' พ.ศ. ' . $yearThai . ' ' . $dateTime;
            break;
    }

}
//เรียกใช้งาน เราจะเรียกใช้คลาสใหม่ของเราแทน
$pdf=new PDF();


if(isset($_FILES['profile']['name'])) {
	// foreach ($_FILES['profile']['name'] as $index=>$file) {
    $file = $_FILES['profile']['name'];
    // $ext = pathinfo($file, PATHINFO_EXTENSION);
    // $newFileName = md5(time() . $file) . '.' . $ext;
    if(move_uploaded_file($_FILES["profile"]["tmp_name"],"uploads/".$file)) // Upload/Copy
    {
        // echo "<pre>" ; print_r ($newFileName) ;"</pre>";
        $pdf->setImageHeader($file);
        
    }
	// }
}

$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->SetLineWidth(0.5);
$pdf->Line(30,64,180,64);
$pdf->Header();

$pdf->Body($title_name,
$company_name,$wantposition,$work_number,DateThai2($start),DateThai2($until),$std_fullname,$eng_std_fullname,$std_id,$fatory,
$faculty,$major,$std_year,$teac_name,$gpa,$gpax,$id_card,$isa,DateThai2($isd),DateThai2($exd),$race,$nation,$religion,
DateThai2($dob),$pob,$age,$sex,$hight,$weight,$cds,$address,$call,$phone,$fax,$email,$address_2,$call_2,$phone_2,$fax_2 );
// Page 2 
$pdf->AddPage('P','A4');
$pdf->Page2($contact ,$rela,$ct_work,$ct_place,$ct_address ,$ct_call,$ct_phone,$ct_fax,$dad_work,$dad_fullname,$mom_fullname ,$mom_work ,$pr_address,$pr_call,$pr_phone,$pr_fax,$allbro,$ambro);
$pdf->SetLineWidth(0.1);
$pdf->FamilyTable($bro_name1,$bro_age1,$bro_sex1,$bro_type1,$bro_work1,$bro_name2,$bro_age2,$bro_sex2,$bro_type2,$bro_work2,
$bro_name3,$bro_age3,$bro_sex3,$bro_type3,$bro_work3,$bro_name4,$bro_age4,$bro_sex4,$bro_type4,$bro_work4,
 $bro_name5,$bro_age5,$bro_sex5,$bro_type5,$bro_work5,$bro_name6,$bro_age6,$bro_sex6,$bro_type6,$bro_work6);

$pdf->EducationTable($school_1,$yeas_s1,$year_d1,$s_gpa1,$s_type1,$school_2,$yeas_s2,$year_d2,$s_gpa2,$s_type2
,$school_3,$yeas_s3,$year_d3,$s_gpa3,$s_type3,$school_4,$yeas_s4,$year_d4,$s_gpa4,$s_type4
,$school_5,$yeas_s5,$year_d5,$s_gpa5,$s_type5,$school_6,$yeas_s6,$year_d6,$s_gpa6,$s_type6);
$pdf->Footer();
//Page 3
$pdf->AddPage('P','A4');
$pdf->PreviousTraining($form1,$until1,$local1,$used_position1 ,$form2,$until2,$local2,$used_position2 , $form3,$until3,$local3,$used_position3,
$form4,$until4,$local4,$used_position4 ,$form5,$until5,$local5,$used_position5 , $form6,$until6,$local6,$used_position6,
$form7,$until7,$local7,$used_position7 ,$form8,$until8,$local8,$used_position8 , $form9,$until9,$local9,$used_position9,
$form10,$until10,$local10,$used_position10 , $form11,$until11,$local11,$used_position11);
$pdf->StartPage3($job_in1,$job_in2,$job_in3,$job_in4,$work_out_plan1,$work_out_plan2,$work_out_plan3,$work_out_plan4);
//$pdf->StartPage3();
$pdf->LanguagesAbility($other,$lavel1_1,$lavel1_2,$lavel1_3,$lavel2_1,$lavel2_2,$lavel2_3,$lavel3_1,$lavel3_2,$lavel3_3,$lavel4_1,$lavel4_2,$lavel4_3);
$pdf->License($std_fullname,DateThai($date));


$pdf->Output();
// กรณีต้องการ ดาวโหลดให้เปิดใช้ด้านล่าง
// $pdf->Output( 'tmp/report.pdf' , 'D' );

}
?>