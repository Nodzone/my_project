<?php

class Select_Doc
{
    private $db;
    private $user_id;

    public function __construct()
    {
        $this->db = new PHPMySQLi();
        $user = $_SESSION['user'];
        $this->user_id = $user['user_id'];
    }

    public function find_faculty()
    {
        $sql = 'SELECT * FROM faculty';
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function find_major()
    {
        $sql = 'SELECT * FROM major';
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function find_company()
    {
        $sql = "SELECT DISTINCT 
        user_coop_company.user_company_name AS C_NAME 
        FROM user_coop_company Inner join user_coop_detail 
        Where user_coop_detail.user_company = user_coop_company.user_company_id
        AND user_coop_detail.user_id = $this->user_id";
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function company_coop()
    {
        $sql = 'SELECT user_company_id AS ID, user_company_name AS Company FROM user_coop_company';
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function find_studentinmajor()
    {
        $sql = "SELECT * FROM user_coop RIGHT JOIN user_coop_detail Where user_coop_detail.user_major = $this->user_major AND user_coop.user_id = $this->user_id ";
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    // Select For Emp Part
    public function select_co9()
    {
        $sql = " SELECT user_coop_company.user_company_name AS COMPANY,
        user_coop_company.user_company_address AS ADDRESS,
        user_coop_company.user_company_phone AS C_PHONE,
        user_coop_company.user_company_fax AS C_FAX
        FROM user_coop_company INNER JOIN user_coop_detail
        WHERE user_coop_detail.user_company = user_coop_company.user_company_id
        AND user_coop_detail.user_id = $this->user_id ";
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function select_co13()
    {
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function select_co14()
    {
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    // Select For Emp Part
    public function std_infor()
    {
        $sql = "SELECT user_coop.user_title AS STD_TITLE, 
        user_coop.user_name AS STD_NAME, 
        user_coop.user_surname AS STD_SURNAME, 
        user_coop_detail.user_std_id AS STD_ID, 
        user_coop_detail.user_major AS STD_ID_MAJOR, 
        major.major_name AS STD_MAJOR, 
        user_coop_detail.user_faculty AS STD_ID_FACULTY, 
        faculty.faculty_name AS STD_FACULTY, 
        user_coop_detail.user_coop_intership_name AS STD_ID_INTERSHIP, 
        user_coop_company.user_company_name AS STD_NAME_INTERSHIP 
        
        FROM user_coop 
        INNER JOIN user_coop_detail 
        INNER JOIN major 
        INNER JOIN faculty 
        INNER JOIN user_coop_company 
        WHERE user_coop.user_id = user_coop_detail.user_id 
        AND user_coop_detail.user_major = major.major_id 
        AND user_coop_detail.user_faculty = faculty.faculty_id 
        AND user_coop_detail.user_coop_intership_name = user_coop_company.user_company_id 
        AND user_coop.user_id = $this->user_id ";
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function find_partner_student_infor() // for student
    {
        $sql = "SELECT DISTINCT
        user_coop.user_title AS TITLE,
        user_coop.user_name AS NAME,
        user_coop.user_surname AS SURNAME,
        user_coop.user_type AS TYPE,
        user_coop_detail.user_major AS U_MAJOR,
        user_coop_detail.user_faculty AS U_Faculty,
        user_coop_partner.user_partner1_fullname AS PART1,
        user_coop_partner.user_partner2_fullname AS PART2
        FROM
            user_coop
        INNER JOIN user_coop_partner 
        INNER JOIN user_coop_detail 
        WHERE user_coop.user_id = user_coop_detail.user_id  AND user_coop.user_id = user_coop_partner.user_id AND user_coop.user_id = $this->user_id ";
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function find_partner_infor() //for teacher and emp
    {
        $sql = 'SELECT DISTINCT user_coop.user_title AS TITLE_S,
		user_coop.user_name AS NAME_S,
		user_coop.user_surname AS LASTNAME_S,
        user_coop_detail.user_std_id AS ID_STD,
		faculty.faculty_name AS FACULTY_S,
		major.major_name AS MAJOR_S,
		user_coop_company.user_company_name  AS INTERSHIP_S,
		user_coop_partner.user_partner1_fullname AS STD_PASTNER
        FROM user_coop
        INNER JOIN major 
        INNER JOIN user_coop_detail 
        INNER JOIN faculty
        INNER JOIN user_coop_partner
		INNER JOIN user_coop_company
        WHERE user_coop_partner.user_id = user_coop.user_id 
        AND user_coop_detail.user_major = major.major_id 
        AND user_coop_detail.user_faculty = faculty.faculty_id
		AND user_coop_detail.user_coop_intership_name = user_coop_company.user_company_id
        AND user_coop.user_type = 1  ';
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function select_teacher_infor()
    {
        $sql = " SELECT DISTINCT user_coop.user_title AS TITLE_T,
		user_coop.user_name AS NAME_T,
		user_coop.user_surname AS LASTNAME_T,
		faculty.faculty_name AS FACULTY_T,
		major.major_name AS MAJOR_T,
		user_coop_partner.user_partner1_fullname AS STD_PASTNER
        FROM user_coop
        INNER JOIN major 
        INNER JOIN user_coop_detail 
        INNER JOIN faculty
        INNER JOIN user_coop_partner
        WHERE user_coop_partner.user_id = user_coop.user_id 
        AND user_coop_detail.user_major = major.major_id 
        AND user_coop_detail.user_faculty = faculty.faculty_id
        AND user_coop.user_type = 2 AND user_coop.user_id = $this->user_id  ";
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function select_majorandfaculty()
    {
        $sql = 'SELECT major.major_name AS MAJOR, faculty.faculty_name AS FACULTY FROM faculty INNER JOIN major WHERE faculty.faculty_id = major.faculty_id';
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function select_std_emp()
    {
        $sql = "SELECT user_coop.user_id AS STD_ID,
        user_coop.user_title AS STD_TITLE, 
        user_coop.user_name AS STD_NAME,
        user_coop.user_surname AS STD_SURNAME,
         major.major_id AS STD_IDMAJOR,
        major.major_name AS STD_MAJOR 
        FROM user_coop INNER JOIN user_coop_detail INNER JOIN major
        WHERE user_coop.user_id = user_coop_detail.user_id 
        AND user_coop_detail.user_major = major.major_id
        AND user_coop.user_type = '1'";
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }

    public function select_address()
    {
        $sql = 'SELECT 	amphur.AMPHUR_ID AS AP_ID,
		amphur.AMPHUR_NAME AS AP_NAME,
		district.DISTRICT_ID AS DS_ID,
		district.DISTRICT_NAME AS DS_NAME,
		province.PROVINCE_ID AS PR_ID,
		province.PROVINCE_NAME AS PR_NAME
        FROM district INNER JOIN amphur INNER JOIN province
        WHERE amphur.PROVINCE_ID = province.PROVINCE_ID AND district.PROVINCE_ID = province.PROVINCE_ID
        AND amphur.AMPHUR_ID = district.AMPHUR_ID
        AND province.PROVINCE_ID = ';
        $params = []; //$params is array
        $result = $this->db->query($sql, $params);
        $fetch = $this->db->fetch_all($result);

        return $fetch;
    }
}
