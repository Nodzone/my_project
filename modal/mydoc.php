<?PHP

class Manage_File 
 {
    private $db;
    private $user_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
     
    public function find_myfile()
     {
        $sql = "SELECT * FROM file_coop WHERE file_type = 1";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
     
    public function insert_user($table, $data = array())
    {
        $this->db->insert($table, $data);
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