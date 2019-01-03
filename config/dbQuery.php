<?php
    interface iDbQuery
    {
        public function insert();
        public function select($columns);
        public function where($firstValue, $compare, $secondValue);
        public function delete();
        public function execute();
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
        public function execute()
        {
            if ($this->isAllowedExecute)
            {
                $result = Configuration::make()
                        ->provideSettings()
                        ->runQuery($this->sqlQuery);
                return $result;
            }
            else
            {
                return 'SQL query error, check the code!';
            }
        }
    }