<?php
    namespace App\Controllers;

    class Errors extends Controller{

        public function notFound (){
            return $this->view('Errors.error');
            //echo '404';
        }
    }
    $Err404 = new Errors();
    $Err404 ->notFound();
?>