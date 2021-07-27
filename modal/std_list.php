<?PHP

class List_Student
 {
    private $db;
    private $user_submajor;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
        
    }

     public function find_our_student()
     {
        
        $sql = " SELECT
        user_coop.user_id AS STD_USERID,
        user_coop.user_title AS STD_TITLE,
        user_coop.user_name AS STD_NAME,
        user_coop.user_surname AS STD_SURNAME,
        user_coop_detail.user_std_id AS STD_ID,
        major.major_name AS STD_MAJOR,
        faculty.faculty_name AS STD_FACULTY,
        user_coop_company.user_company_name AS STD_COMPANY
        FROM
            user_coop
        INNER JOIN user_coop_detail 
        INNER JOIN user_coop_company
        INNER JOIN major
        INNER JOIN faculty
        WHERE user_coop.user_id = user_coop_detail.user_id 
        AND user_coop.user_type = '1' 
        AND user_coop_company.user_company_id = user_coop_detail.user_coop_intership_name
        AND user_coop_detail.user_major = major.major_id 
        AND user_coop_detail.user_faculty = faculty.faculty_id  ";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
        // echo "<pre>"; print_r($fetch); echo "</pre>";
     }

     

    //  public function find_file_student($user_id_std)
    //  {
    //      $this->user_id = $user_id_std;
    //      $sql = "SELECT * FROM user_coop LEFT JOIN file_coop ON user_coop.user_id = file_coop.user_id WHERE user_coop.user_id = $this->user_id  ";
    //      $params = []; //$params is array
    //      $result = $this->db->query($sql,$params);
    //      $fetch = $this->db->fetch_all($result);
    //      return $fetch;
    //  }

    //  public function insert_ourwork($table, $data = array())
    //  {
    //     $this->db->insert($table, $data);
    //  }
    // public function delete_ourwork($table, $data = array())
    //  {
    //     $this->db->delete($table, $data);
    //  }
 }