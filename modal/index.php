<?PHP

class Manage_Index
 {
    private $db;
    function __construct()
    {
        $this->db = new PHPMySQLi();
      //   $user = $_SESSION['user'];
      //   $this->user_id = $user['user_id'];
    }

     public function find_ourwork()
     {
        $sql = "SELECT * FROM ourwork_coop WHERE ourwork_id = 1";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }

     public function all_ourwork_coop()
     {
        $sql = "SELECT * FROM ourwork_coop ";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     public function find_ourwork_coop()
     {
        $sql = "SELECT * FROM ourwork_coop WHERE ourwork_id != 1";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }

     public function find_news()
     {
        $sql = "SELECT * FROM news_coop LIMIT 5";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     public function find_ourwork_last()
     {
     $sql = "SELECT * FROM ourwork_coop ORDER BY ourwork_id desc limit 1";
     $params = []; //$params is array
     $result = $this->db->query($sql,$params);
     $fetch = $this->db->fetch_row($result);
     return $fetch;
     //echo "<pre>"; print_r($fetch); echo "</pre>";
     }

     public function find_ourworl_by_id($id)
    {
        $sql = "SELECT * FROM ourwork_coop WHERE ourwork_id = ?";
        $params = [$id]; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_row($result);
        return $fetch;
    }

     public function insert_ourwork($table, $data = array())
     {
        $this->db->insert($table, $data);
     }
     public function update_ourwork($table,$data = array())
     {
      $this->db->update($table, $data, ['ourwork_id' => $data['ourwork_id']]);
     }
    public function delete_ourwork($table, $data = array())
     {
        $this->db->delete($table, $data);
     }
 }