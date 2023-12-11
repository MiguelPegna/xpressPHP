<?php
    //el autoload carga los archivos de las clases que llaman los controllers, modelos, vistas y rutas
    //Controllers
    //Models
    //Views
    //Router
    spl_autoload_register(function($class){
        if(file_exists('core/' .$class. '.php')){
            require_once('core/' .$class. '.php');
        }
    });
    
?>