<?php
    //autoload load the files from classes that call the controllers, models, views and routes
    //Controllers
    //Models
    //Views
    //Router
    spl_autoload_register(function($class){
        if(file_exists($class. '.php')){
            require_once($class. '.php');
        }
    });
    
?>