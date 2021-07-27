<?PHP

class Manage_Partnet  
 {
    private $db;
    public $user_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
     
    public function find_mypartner()
     {
        $sql = "SELECT * FROM user_coop LEFT JOIN user_coop_partner ON user_coop.user_id = user_coop_partner.user_id WHERE user_coop.user_id = ?";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     
    public function find_student_part()
    {
        $sql = "SELECT * FROM user_coop LEFT JOIN user_coop_partner ON user_coop.user_id = user_coop_partner.user_id WHERE user_coop_partner.user_id = $this->user_id  ";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
    } 
   


    public function insert_partner($table, $data = array())
    {
        $this->db->insert($table, $data);
    }

    public function update_partner($table, $data = array())
    {
        $this->db->update($table, $data, ['user_id'=>$this->user_id]);
    }
 }
?>