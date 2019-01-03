<?php
    interface iAp
    {
        function getApAll();
        function checkRouterStatus($ip);
    }
    class Ap implements iAp
    {
        protected $title;
        protected $price;
        public function __construct($attributes = array())
        {
            if ($attributes)
            {
                // Need to code
            }
            else
            {
                // Need to code
            }
        }
        public function getApAll()
        {
            $query = dbQuery::table('ap');
            $result = $query->select('*')
                    ->execute();

            foreach($result as $index=>$item)
            {
                $ip = isset($item['ip']) ? $item['ip'] : '';
                $result[$index]['img'] = self::checkRouterStatus($ip);
            }

            return $result;
        }
        public function checkRouterStatus($ip)
        {
            $img = '';
            exec("ping -c 4 " . $ip, $output, $result);
            //if (!$socket = @fsockopen($ip, 1, $errno, $errstr, 30))   // don't forget loop check ip address only
            
            if($result == 0){ 
                $img = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
            }
            else
            {
            
                $img = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
            
                //fclose($socket);
            }
    
            return $img;
        }
  
    }