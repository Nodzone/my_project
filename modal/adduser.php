<?PHP

class Manage_User   
 {
    private $db;
    private $user_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
     
    public function find_user()
     {
        $sql = "SELECT * FROM user_coop";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }

     public function find_user_last_id()
     {
        $sql = "SELECT user_coop.user_id FROM user_coop ORDER BY user_coop.user_id desc LIMIT 1";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_row($result);

        return $fetch['user_id'];
     }

    

     public function find_all_user()
     {
        $sql = "SELECT * FROM user_coop LEFT JOIN user_coop_detail ON user_coop.user_id = user_coop_detail.user_id WHERE user_coop.user_type = 1 OR user_coop.user_type = 2 OR user_coop.user_type = 3 ";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     public function find_user_admin()
     {
        $sql = "SELECT * FROM user_coop Where user_type = '5' ";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     public function find_user_std()
     {
        $sql = "SELECT * FROM user_coop Where user_type = '1'";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     public function find_user_teacher()
     {
        $sql = "SELECT * FROM user_coop Where user_type = '2'";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     public function find_user_emp()
     {
        $sql = "SELECT * FROM user_coop Where user_type = '3'";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     public function find_user_manager()
     {
        $sql = "SELECT * FROM user_coop Where user_type = '4'";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }

     public function check_user_coop()
    {
        $sql = "SELECT user_id FROM user_coop WHERE user_coop.user_id = ?";
        $params = [$this->user_id]; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_row($result);
        return $fetch;
    }
    

    public function insert_user($table, $data = array())
    {
        $this->db->insert($table, $data);
    }
    public function insert_user_detail($table_2, $data_2 = array())
    {
        $this->db->insert($table_2, $data_2);
    }

    public function update_user($table, $data = array())
    {
        $this->db->update($table, $data, ['user_id'=>$this->user_id]);
    }
    public function update_user_coop($table, $data = array())
    {
        $this->db->update($table, $data, ['user_id'=>$this->user_id]);
    }
 }
?>