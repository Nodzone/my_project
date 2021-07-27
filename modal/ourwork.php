<?PHP

class Ourwork_Show
    
 {
    private $db;
    public $ourwork_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $ourwork = $_GET['ourwork'];
        $this->ourwork_id = $ourwork;
    }
     
    public function find_Ourwork()
     {
        $sql = "SELECT * FROM ourwork_coop WHERE ourwork_id = $this->ourwork_id ORDER BY ourwork_id DESC";
        $params = []; 
        $result = $this->db->query($sql,[]);
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
    
     public function update_ourwork($table, $data = array())
            {
                $this->db->update($table, $data, ['ourwork_id']);
            }
    public function delete_ourwork($table, $delete_ourwork_id)
            {
                $where = 'ourwork_id = ' . $delete_ourwork_id;
                
                $this->db->delete($table, $where);
            }

 }
?>