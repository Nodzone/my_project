<?PHP

class Select_File  
 {
    private $db;
    private $user_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
     
    public function find_file_co1()
     {
        $sql = "SELECT * FROM file_coop WHERE file_type = 'BRU_CO1' ";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }
  }

?>