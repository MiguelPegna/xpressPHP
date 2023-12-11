<?php
    namespace App\Models;
    use mysqli;

    class Model{

        protected $host = DB_HOST;
        protected $user = DB_USER;
        protected $pass = DB_PASS;
        protected $db = DB_NAME;
        protected $mysqliConn;
        protected $table;
        protected $query;
        protected $id;

        public function __construct(){
            $this->DB_mysqli();
        }
        //Conexion a DB
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

        public function query($sql){
            $this->query = $this->mysqliConn->query($sql);
            return $this;
        }

        public function select(){
            return $this->query->fetch_assoc();
        }

        public function select_all(){
            return $this->query->fetch_all(MYSQLI_ASSOC);
        }

        //Consultas Base
        public function all(){
            $sql= "SELECT * FROM {$this->table}";
            return $this->query($sql)->select_all();
        }

        public function find($id){
            $sql= "SELECT FROM {$this->table} WHERE id={$this->id}";
            return $this->query($sql)->select();
        }

        public function where($column, $value){
            $sql= "SELECT * FROM {$this->table} WHERE {$column} id={$this->id}";
            return $this->query($sql);
            return $this;
        }


    }
?>