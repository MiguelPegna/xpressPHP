<?php

    use Core\Router;
    use App\Controllers\HomeController;

    Router::get('/', [HomeController::class, 'index']);

    Router::get('/account', function (){
        return 'hola chaval';
    });

    Router::get('/nombres/:slug', function ($param){
        return 'hola desde aqui '. $param;
    });


    Router::refer();
   

    /*
    Router::httpRequest('/', function (){
        return 'hola amingo';
    }, $params);

    Router::httpRequest('/account', function (){
        return 'hola chaval';
    }, $params);

    Router::dispatch2($method, $uri);*/
    //refer en vez de dispatch