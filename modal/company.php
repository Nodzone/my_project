<?php

class Edit_Company
{
    private $db;
    private $user_id;

    public function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }

    public function find_company()
    {
        $sql = 'SELECT * FROM user_coop_company';
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function insert_company($table, $data = array())
    {
        $this->db->insert($table, $data);
    }

    public function update_company($table, $data = array())
    {
        $this->db->update($table, $data, ['user_company_id' => $data['user_company_id']]);
    }

    public function delete_company($table, $id)
    {
        $this->db->delete('user_coop_company', 'user_company_id = '.$id);
    }

    /*  public function delete_profile()
            {
                $sql = "UPDATE INTO user_coop_detail (doc_name,doc_infor,doc_file) VALUES (?,?,?)";
            } */
}
