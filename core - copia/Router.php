<?php

    class Router{

        private static $routes = [];

        public static function get($uri, $callback){
            $uri = trim($uri, '/');
            self::$routes['GET'][$uri] = $callback;
        }

        public static function post($uri, $callback){
            $uri = trim($uri, '/');
            self::$routes['POST'][$uri] = $callback;
        }

        public static function dispatch(){
            $uri = $_SERVER['REQUEST_URI'];
            $uri = trim($uri, '/');
            $method = $_SERVER['REQUEST_METHOD'];
            foreach (self::$routes[$method] as $route => $callback){
                /*if($route == $uri){
                    $callback();
                    return;
                }*/
                if(strpos($route, ':') !== false){
                    $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z]+)', $route);
                }
                if(preg_match("#^$route$#",$uri, $matches)){
                    $paramsF = array_slice($matches, 1);
                    if(is_callable($callback)){
                        $response = $callback(...$paramsF);
                    }

                    if(is_array($callback)){
                        $controller = new $callback[0];
                        $response = $controller->{$callback[1]}($paramsF);
                    }

                    
                    if(is_array($response) || is_object($response)) {
                       // header('Content-Type', 'application/json');
                        echo json_encode($response);
                    }
                    else{
                        echo $response;
                    }
                    return;

                }
            }
  
            echo '404 not found';
        }

        /*public static function httpRequest($method, $uri, $callback){
            $uri = trim($uri, '/');
            self::$routes[$method][$uri] = $callback;
        }

        public static function dispatch2($method, $uri){
            foreach (self::$routes[$method] as $route => $callback){
                if($route == $uri){
                    $callback();
                    return;
                }
            }
  
            echo '404 not found';
        }*/


    }