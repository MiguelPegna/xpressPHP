<?php
    
    namespace App\Controllers;

    use App\Models\Player;


    class HomeController extends Controller{
    //class HomeController {
    
        public function index(){

            $playerModel = new Player();
            return $playerModel->query("SELECT * FROM players")->select();
            //dd($DB_response);
            return $this->view('home', [
                'title' => 'Home',
                'description' => 'Hola amingo',
                'scripts' => ''
            ]);
            
        }
    }
?>