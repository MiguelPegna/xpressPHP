<?php
    class DB_connection{
        public $connect;

        public function __construct(){
            //$connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
            $connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
            
            try{
                $this->connect = new PDO($connectionString, DB_USER, DB_PASS);
			    $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connect->exec('set names utf8mb4');
                //echo 'Flipa en colores bien mogollón a todo gas chaval.. se ha hecho la conexión';
            }
            catch (Exception $e){
                $this->connect = 'Error vale verdi la vida mejor matate';
                echo "ERROR: ". $e->getMessage();
            }
        }

        public function connectPDO(){
            return $this->connect;
        }
    }

    //$prueba = new DB_conection();
?>