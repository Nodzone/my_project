<?PHP

class Upload_File   
 {
    private $db;
    private $user_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
     
    public function find_file()
     {
        $sql = "SELECT * FROM file_coop";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }

     public function find_file_user()
    {
        $sql = "SELECT * FROM user_coop LEFT JOIN file_coop ON user_coop.user_id = file_coop.user_id WHERE user_coop.user_id = $this->user_id ";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
    }
    
     public function check_file_coop()
    {
        $sql = "SELECT file_id FROM file_coop Where file_coop.user_id = ?";
        $params = [$this->user_id]; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_row($result);
        return $fetch;
    }
     
    public function insert_file($table, $data = array())
    {
        $this->db->insert($table, $data);
    }
    public function update_file($table, $data = array())
    {
        $this->db->update($table, $data, ['user_id'=>$this->user_id]);
    }
    
    
 }
?>