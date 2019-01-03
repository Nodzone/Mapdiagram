<?php
        /*
        |--------------------------------------------------------------------------
        | File location
        |--------------------------------------------------------------------------
        | Please provide below correct file location IF needed.
        */
        require_once(''.__DIR__.'/config/database.php');
        require_once(''.__DIR__.'/config/dbQuery.php');
        require_once(''.__DIR__.'/app/ap.php');
    class Configuration
    {
        /*
        |--------------------------------------------------------------------------
        | Database Connections
        |--------------------------------------------------------------------------
        | Please provide below correct data.
        */
        const DATABASE_HOST = 'localhost';
        const DATABASE_USER = 'root';
        const DATABASE_PASS = '';
        const DATABASE_SCHEMA = 'map';
        /*
        |--------------------------------------------------------------------------
        | Configuration work logic
        |--------------------------------------------------------------------------
        | Below is provided work logic that does not need to be changed.
        |
        |
        */
        private $db;
        public static function make()
        {
            return new self;
        }
        public function __construct()
        {
        }
        public function provideSettings()
        {
            $this->db = new Database(array(
                'host' => self::DATABASE_HOST,
                'user' => self::DATABASE_USER,
                'password' => self::DATABASE_PASS,
                'schema' => self::DATABASE_SCHEMA,
                ));
            return $this;
        }
        public function runQuery($query)
        {
            return $this->db->connect($query);
        }

        public function returnJson($array, $status = 200)
        {
            $code = $status;
            $text = 'OK';
            $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
            header($protocol . ' ' . $code . ' ' . $text);
            $GLOBALS['http_response_code'] = $code;

            return ['data'=> json_encode($array, JSON_UNESCAPED_SLASHES), 'status' => 'SUCCESS'];
        }
    }