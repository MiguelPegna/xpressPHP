<?php
    namespace App\Controllers;
    
    class Controller{

        public function view($view, $data=[]){
            //$viewFile = 'views/'.$view.'.php';
            extract($data);
            $viewFile = 'views/'.str_replace('.', '/', $view).'.php';
            if(file_exists($viewFile)){
                ob_start();
                include ($viewFile);
                $content = ob_get_clean();
                return $content;
            }
        }

        //Se carga el modelo del controlador
        /*public function loadModel(){
            $mainClass = get_class($this);  //obtiene el nombre principal de la clase del controlador
            $model = get_class($this). 'Model';  //A la clase principal se le agrega la cadena Model
            $model = str_replace('Controller', '', $model);   //Removemos la palabra Controller del nombre de clase principal
            $modelFileName =  str_replace('Controller', 'Model', $mainClass);  //Reemplazamos la palabra controller por model para poder trabajar con el Modelo del controlador
            $routClass = 'app/models/'. $modelFileName. '.php';  //de declara la ruta del archivo del modelo

            //Se instancian los metodos del modelo
            if(file_exists($routClass)){
                require_once($routClass);
                $this->model = new $model();
                //print_r($modelo);
            }
        }*/

    }
?>