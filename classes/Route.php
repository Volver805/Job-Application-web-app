<?php
    class Route {
        public static $routes = array();
        
        public static function set($route, $function) {
            
            // $function defines the controller method we want to excute once a certain route is called
            
            self::$routes[] = $route;

            if($_GET['url'] == $route) {    
                $function->__invoke();
                return true;
            }

        }

        public static function validateUrl() {
            if(!in_array($_GET['url'],self::$routes)) {
                die("404 not found");
            }
        }
    }
?>