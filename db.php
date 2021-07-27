<?php

session_start();

class PHPMySQLi

{

    private $db;

    private $hostname = 'localhost'; //ชื่อ Host

    private $username = 'id12099921_admincoopbru'; //ชื่อผู้ใช้งาน ฐานข้อมูล

    private $password = 'nodzero@25390905'; // password สำหรับเข้าจัดการฐานข้อมูล

    private $database = 'id12099921_bru_coop'; //ชื่อ ฐานข้อมูล



    function __construct()

    {

        $this->db = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        if ($this->db->connect_errno) {

            die("Failed to connect to MySQL: (" . $this->db->connect_errno . ") " . $mysqli->connect_error);

        }

        $this->db->query("set names utf8");

    }

    public function query($sql, $arg = [])

    {

        if (is_array($arg) && $arg != []) {

            $result = $this->prepared($sql, $arg);

            return $result;

        } else {

            if (!$result = $this->db->query($sql)) {

                echo "Error message: " . mysqli_error($this->db);

            }

            return $result;

        }

    }

    public function fetch_row($result)

    {

        return mysqli_fetch_array($result, MYSQLI_ASSOC);

    }

    public function fetch_all($result)

    {

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    public function escape($data)

    {

        return $this->db->real_escape_string($data);

    }

    public function prepared($sql, array $args)

    {

        $stmt = $this->db->prepare($sql);

        $params = [];

        $types = array_reduce($args, function ($string, &$arg) use (&$params) {

            $params[] = &$arg;

            if (is_float($arg)) $string .= 'd';

            elseif (is_integer($arg)) $string .= 'i';

            elseif (is_string($arg)) $string .= 's';

            else $string .= 'b';

            return $string;

        }, '');

        array_unshift($params, $types);

        call_user_func_array([$stmt, 'bind_param'], $params);

        $result = $stmt->execute() ? $stmt->get_result() : false;

        $stmt->close();

        return $result;

    }



    public function insert($table, $fields = array(), $appendix = false, $ret = false)

    {

        

        $query = 'INSERT INTO';

        $query .= ' `' . $this->escape($table) . "`";

        if (is_array($fields)) {

            $query .= ' (';

            $num = 0;

            foreach ($fields as $key => $value) {

                $query .= ' `' . $key . '`';

                $num++;

                if ($num != count($fields)) {

                    $query .= ',';

                }

            }

            $query .= ' ) VALUES ( ' . $this->join_array($fields) . ' )';

        } else {

            $query .= ' ' . $fields;

        }

        if ($appendix) {

            $query .= ' ' . $appendix;

        }

        if ($ret) {

            return $query;

        }

     

        //echo $query;

        $ins=$this->db->query($query);

		if($ins){

			return true;

		}else{

			return false;

		}

    }



    private function join_array($array)

    {

        $nr = 0;

        $query = '';

        foreach ($array as $key => $value) {

            if (is_object($value) || is_array($value) || is_bool($value)) {

                $value = serialize($value);

            }

            if($value === null) {

                $query .= ' NULL';

            } else {

                $query .= ' \'' . $this->escape($value) . '\'';

            }

            $nr++;

            if ($nr != count($array)) {

                $query .= ',';

            }

        }

        return trim($query);

    }



    public function process_where($where, $where_mode = 'AND')

    {

        $query = '';

        if (is_array($where)) {

            $num = 0;

            $where_count = count($where);

            foreach ($where as $k => $v) {

                if (is_array($v)) {

                    $w = array_keys($v);

                    if (reset($w) != 0) {

                        throw new Exception('Can not handle associative arrays');

                    }

                    $query .= " `" . $k . "` IN (" . $this->join_array($v) . ")";

                } elseif (!is_integer($k)) {

                    $query .= ' `' . $k . "`='" . $this->escape($v) . "'";

                } else {

                    $query .= ' ' . $v;

                }

                $num++;

                if ($num != $where_count) {

                    $query .= ' ' . $where_mode;

                }

            }

        } else {

            $query .= ' ' . $where;

        }

        return $query;

    }

    // public function insert($table,$value,$row=null){

	// 	$insert= " INSERT INTO ".$table;

	// 	if($row!=null){

	// 		$insert.=" (". $row." ) ";

	// 	}

	// 	for($i=0; $i<count($value); $i++){

	// 		if(is_string($value[$i])){

	// 			$value[$i]= '"'. $value[$i] . '"';

	// 		}

	// 	}

	// 	$value=implode(',',$value);

	// 	$insert.=' VALUES ('.$value.')';

	// 	$ins=$this->db->query($insert);

	// 	if($ins){

	// 		return true;

	// 	}else{

	// 		return false;

	// 	}

	// }

	public function delete($table,$where=null){

		if($where == null)

        {

            $delete = "DELETE ".$table;

        }

        else

        {

            $delete = "DELETE  FROM ".$table." WHERE ".$where;

        }

        $del=$this->db->query($delete);

        if($del){

            return true;

        }else{

            return false;

        }

    }

    

	function update($table, $fields = array(), $where = array(), $limit = false, $order = false)

    {

        if (empty($where)) {

            throw new DatabaseException('Where clause is empty for update method');

        }

        $this->result = null;

        $this->sql = null;

        $query = 'UPDATE `' . $table . '` SET';

        if (is_array($fields)) {

            $nr = 0;

            foreach ($fields as $k => $v) {

                if (is_object($v) || is_array($v) || is_bool($v)) {

                    $v = serialize($v);

                }

                if($v === null) {

                    $query .= ' `' . $k . "`=NULL";

                } else {

                    $query .= ' `' . $k . "`='" . $this->escape($v) . "'";

                }

                $nr++;

                if ($nr != count($fields)) {

                    $query .= ',';

                }

            }

        } else {

            $query .= ' ' . $fields;

        }

        if (!empty($where)) {

            $query .= ' WHERE' . $this->process_where($where);

        }

        if ($order) {

            $query .= ' ORDER BY ' . $order;

        }

        if ($limit) {

            $query .= ' LIMIT ' . $limit;

        }

        

        $ins=$this->db->query($query);

		if($ins){

			return true;

		}else{

			return false;

		}

    }

   

}