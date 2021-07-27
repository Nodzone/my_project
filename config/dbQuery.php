<?php
    interface iDbQuery
    {
        public function insert();
        public function select($columns);
        public function where($firstValue, $compare, $secondValue);
        public function delete();
        public function execute();
        public function update($fields = array());
        public function clear();
    }
    class DbQuery implements iDbQuery
    {
        public $tableName;
        private $sqlQuery;
        private $isAllowedExecute = FALSE;
        private $compareArray = array('=', '>', '<'); // TODO: need add more operators
        public static function table($tableName)
        {
            return new self($tableName);
        }
        public function __construct($tableName)
        {
            $this->tableName = $tableName;
        }
        public function insert()
        {
            // in progress
        }
   
        public function update($fields = array())
        {
           
            $query = 'UPDATE `' . $this->tableName . '` SET';
            if (is_array($fields)) {
                $nr = 0;
                foreach ($fields as $k => $v) {
                    if (is_object($v) || is_array($v) || is_bool($v)) {
                        $v = serialize($v);
                    }
                    if($v === null) {
                        $query .= ' `' . $k . "`=NULL";
                    } else {
                        $query .= ' `' . $k . "`='" . $v . "'";
                    }
                    $nr++;
                    if ($nr != count($fields)) {
                        $query .= ',';
                    }
                }
            } else {
                $query .= ' ' . $fields;
            }
          
            $this->sqlQuery = $query;
            $this->isAllowedExecute = TRUE;
            return $this; 
        }
        public function select($columns)
        {
            $this->sqlQuery = 'SELECT '.$columns.' FROM '.$this->tableName.' ';
            $this->isAllowedExecute = TRUE;
            return $this;
        }
        public function where($firstValue, $compare, $secondValue)
        {
            if (in_array($compare, $this->compareArray))
            {
                $this->sqlQuery .= ' WHERE '.$firstValue.' '.$compare.' '.$secondValue.'';
            }
            else
            {
                $this->isAllowedExecute = FALSE;
            }
            return $this;
        }
        public function delete()
        {
            // in progress
        }
        public function execute($type = '')
        {
            if ($this->isAllowedExecute)
            {
                $result = Configuration::make()
                        ->provideSettings()
                        ->runQuery($this->sqlQuery, $type);
                return $result;
            }
            else
            {
                return 'SQL query error, check the code!';
            }
        }
        public function clear(){
            $this->sqlQuery = '';
            $result = Configuration::make()
                        ->provideSettings()
                        ->closeConnect();
        }
    }