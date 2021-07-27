<?PHP

class Dairy_Student
    
 {
    private $db;
    public $user_id;
    private $dairy_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
     
    public function find_Dairy()
     {
        $sql = "SELECT * FROM user_diary WHERE user_id = $this->user_id  ORDER BY user_id DESC ";
        $params = [$this->user_id]; 
        $result = $this->db->query($sql,[]);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     public function find_Dairy_Student($user_partner1_id)
     {
        $this->user_id = $user_partner1_id;
        $sql = "SELECT * FROM user_diary WHERE user_id = $this->user_id  ";
        $params = [$this->user_id]; 
        $result = $this->db->query($sql,[]);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
    public function update_Dairy_STD($diary_id)
    {
      $this->db->update('user_diary', ['diary_status' => 2], ['diary_id'=>$diary_id]);
      $sql = "SELECT * FROM user_diary WHERE diary_id = ?";
      $params = [$diary_id]; 
      $result = $this->db->query($sql,$params);
      $fetch = $this->db->fetch_row($result);
      return $fetch;
     
    }

 }
?>