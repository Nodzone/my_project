<?php

class Show_Profile
{
    private $db;
    private $user_id;
    function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }
        
    public function find_profile_user()
    {
        $sql = "SELECT * FROM user_coop LEFT JOIN user_coop_detail ON user_coop.user_id = user_coop_detail.user_id WHERE user_coop.user_id = ?";
        $params = [$this->user_id]; //$params is array
        $result = $this->db->query($sql,$params);
        $fetch = $this->db->fetch_row($result);
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



}



?>