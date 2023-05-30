<?php
    require_once("/var/www/html/SkylAb-147/supermarket-master/db.php");

    abstract class Connect{

        protected $dbCnx;

        public function __construct(){

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        }
    
?>