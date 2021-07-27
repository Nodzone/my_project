<?PHP

class News_Page
    
 {
    private $db;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
     
    public function find_news()
    {
    $sql = "SELECT * FROM news_coop";
    $params = []; //$params is array
    $result = $this->db->query($sql,$params);
    $fetch = $this->db->fetch_all($result);
    return $fetch;
    }

    public function find_news_by_id($id)
    {
        $sql = "SELECT * FROM news_coop WHERE news_id = ?";
        $params = [$id]; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_row($result);
        return $fetch;
    }

    public function find_news_last()
    {
    $sql = "SELECT * FROM news_coop ORDER BY news_id limit 1";
    $params = []; //$params is array
    $result = $this->db->query($sql,$params);
    $fetch = $this->db->fetch_row($result);
    return $fetch;
    //echo "<pre>"; print_r($fetch); echo "</pre>";
    }

    public function insert_news($table, $data = array())
            {
                $this->db->insert($table, $data);
            }

    public function update_news($table, $data = array())
    {
        $this->db->update($table, $data, ['news_id' => $data['news_id']]);
    }

    public function delete_news($table, $id)
    {
        $this->db->delete($table, 'news_id = ' . $id);
    }

 }

 class News_Show 
 {
    
        private $db;
        public $news_id;
        function __construct()
        {
            $this->db = new PHPMySQLi();
            $news = $_GET['news'];
            $this->news_id = $news;
        }
         
        public function find_News()
         {
            $sql = "SELECT * FROM 	news_coop WHERE news_id = $this->news_id  ORDER BY 	news_id  DESC";
            $params = []; 
            $result = $this->db->query($sql,[]);
            $fetch = $this->db->fetch_all($result);
            return $fetch;
            // echo "<pre>"; print_r($fetch); echo "</pre>";   
         }
        
        
    
     
 }
?>