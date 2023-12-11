<?php
    
    class DB_mysqliConn{
        protected $host = DB_HOST;
        protected $user = DB_USER;
        protected $pass = DB_PASS;
        protected $db = DB_NAME;
        protected $mysqliConn;
        protected $query;

        public function __construct(){
            $this->DB_mysqli();
        }

        public function DB_mysqli(){
            $this->mysqliConn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if(mysqli_connect_errno()){
                echo'Error trying to connect to DB: ', mysqli_connect_error();
                 exit();
            }
            //else{
            //    echo 'Connecting to DB';
            //}
            mysqli_query($this->mysqliConn, "SET NAMES 'utf8', lc_time_names = 'es_MX'");
        }
    }