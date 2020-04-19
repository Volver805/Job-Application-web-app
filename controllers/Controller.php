<?php
    class Controller extends Db{

        public function view($file, $variables = array()) {
            extract($variables);
    
            ob_start();
            include "./views/".$file.".php";
            $renderedView = ob_get_clean();
    
            echo $renderedView;
        }
    }

?>

