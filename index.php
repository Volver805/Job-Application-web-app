<?php
    require_once("routes.php");

    function __autoload($className) {
        if(file_exists("./Classes/".$className.".php"))
            require_once "./Classes/".$className.".php";
        else if(file_exists("./Controllers/".$className.".php"))
            require_once "./Controllers/".$className.".php";
        
        }   


?>