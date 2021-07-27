<?php

class Edit_Profile
{
    private $db;
    private $user_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
        
    public function find_profile()
    {
        $sql = "SELECT * FROM user_coop INNER JOIN user_coop_detail 
        ON user_coop.user_id = user_coop_detail.user_id 
        WHERE user_coop.user_id = ? ";
        $params = [$this->user_id]; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_row($result);
        
        return $fetch;
    }
    public function find_profile_user()
    {
        $sql = "SELECT * FROM user_coop LEFT JOIN user_coop_detail ON user_coop.user_id = user_coop_detail.user_id WHERE user_coop.user_id = ?";
        $params = [$this->user_id]; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        return $fetch;
    }

    public function check_user_coop_detail()
    {
        $sql = "SELECT user_id FROM user_coop_detail WHERE user_coop_detail.user_id = ?";
        $params = [$this->user_id]; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_row($result);
        return $fetch;
    }

    public function select_sub_major()
    {
        $sql = "SELECT * FROM major";
        $params = []; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_all($result);
        
        return $fetch;
    }

    public function insert_profile($table, $data = array())
    {
        $this->db->insert($table, $data);
    }
    public function update_profile($table, $data = array())
    {
        $this->db->update($table, $data, ['user_id'=>$this->user_id]);
    }

    public function update_user_coop($table, $data = array())
    {
        $this->db->update($table, $data, ['user_id'=>$this->user_id]);
    }
/*  public function delete_profile()
        {
            $sql = "UPDATE INTO user_coop_detail (doc_name,doc_infor,doc_file) VALUES (?,?,?)";
        } */

}



?>