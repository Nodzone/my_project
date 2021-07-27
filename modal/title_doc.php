<?PHP

class Manage_TitilDoc   
 {
    private $db;
    private $user_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
     
    public function find_tdoc()
     {
        $sql = "SELECT * FROM title_doc";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }


     public function check_tdoc()
    {
        $sql = "SELECT user_id FROM title_doc WHERE title_doc.user_id = ?";
        $params = [$this->user_id]; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_row($result);
        return $fetch;
    }
     
    public function insert_tdoc($table, $data = array())
    {
        $this->db->insert($table, $data);
    }
    public function update_tdoc($table, $data = array())
    {
        $this->db->update($table, $data, ['user_id'=>$this->user_id]);
    }
    
    function  show_tdate($date_in) // กำหนดชื่อของฟังชั่น show_tdate และสร้างตัวแปล $date_in ในการรับค่าที่ส่งมา
        {
        $month_arr = array("มกราคม" , "กุมภาพันธ์" , "มีนาคม" , "เมษายน" , "พฤษภาคม" , "มิถุนายน" , "กรกฏาคม" , "สิงหาคม" , "กันยายน" , "ตุลาคม" ,"พฤศจิกายน" , "ธันวาคม" ) ; //กำหนด อาร์เรย์ $month_arr  เพื่อเก็บ ชื่อเดือน ของไทย

        // ใช้ฟังชั่น strtok เพื่อแยก ปี เดือน วัน
        // โดยเริ่มจาก ปีก่อน
        $tok = strtok($date_in, "-"); //สร้างตัวแปล $tok เพื่อเก็บค่าแยกของปี ออกมา
        $year = $tok ; //กำหนดค่าให้ ตัวแปล $year มีค่าเท่ากับ ปีที่ ถูกแยกออกมาจาก ตัวแปล $tok

        //ต่อไปคือส่วนของ เดือน
        $tok  = strtok("-");// ส่วนนี้เราจะมีไว้เพื่อทำการแยกเดือน
        $month = $tok ;//สร้างตัวแปล$monthเพื่อเก็บค่าแยกของเดือน ออกมา
        //

        //ต่อไปส่วนสุดท้ายคือ ส่วนของวันที่
        $tok = strtok("-");//ส่วนนี้เราจะมีไว้เพื่อทำการแยกเดือน
        $day = $tok ;//สร้างตัวแปล $$dayเพื่อเก็บค่าแยกของเดือน ออกมา

        //เมื่อได้ส่วนแยกของ วัน เดือน ปี มาแล้วว แต่ ปี ยังเป็นรูปแบบของ ค.ศ. ดังนั้นเราต้องแปล เป็น พ.ศ.  ก่อนด้ววิธีกรนนี้

        $year_out = $year + 543 ;// สร้างตัวแแปลขึ้นมาเพื่อเก็บค่าที่ได้จากการนำปี ค.ศ. มาบวกกับ 543  ก็จะได้ปีที่เป็น  พ.ศ. ออกมา

        $cnt = $month-1 ;// เราตัองสร้างตัวแปล มาเพื่อเก็บค่าเดือน โดยจะต้องเอาเดือนที่ได้มา ลบ 1 เพราะว่า เราจะต้องใช้ในการเทียบกับ ค่าที่อยู่ได้อาร์เรย์ เนื่องจาก อาร์เรย์จะมีค่า เริ่มจาก 0
        $month_out = $month_arr[$cnt] ;// ทำการเทียบค่าเดือนที่ได้กับเดือนที่เก็บไว้ในอาร์เรย์ แล้วเก็บลงใน ตัวแปล


        $t_date = $day." ".$month_out." ".$year_out ; 

        return $t_date ;// ส่งค่ากลับไปยังส่วนที่ส่งมา
        }

        function thainumDigit($num){
            return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
            array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
            $num);
        } 
 }
?>