<?php

    class DB {
        

        private static function conn() {
            $host = "localhost";
            $user = "root"; 
            $pass = "";
            $db = "dot";
            
            $connection = new mysqli($host,$user,$pass,$db); 
            return $connection;       
        }
    
        public static function insert($data) {
            $sql = "INSERT INTO `records`(first_name,last_name,email,profile_picture,marks,status) VALUES('".$data['first_name']."','".$data['last_name']."','".$data['email']."','".$data['profile_picture']."','".$data['marks']."',".$data['status'].")";
            if(!self::conn() -> query($sql)) {
                echo self::conn()->error;   
            }
        }

        public static function edit($data) {
            $sql = "UPDATE `records` SET first_name = '".$data['first_name']."',last_name = '".$data['last_name']."',email = '".$data['email']."',marks = '".$data['marks']."',status = ".$data['status']." WHERE id = ".$data['id'];
            self::conn() -> query($sql);
        }

        public static function delete($id) {
            self::conn() -> query("DELETE FROM `records` WHERE id = ".$id);
        }

        public static function showActive() {
            $results = self::conn() -> query("SELECT * FROM `records` WHERE status= 1");
            return $results;
        }

        public static function showAll() {
            $results = self::conn() -> query("SELECT * FROM `records`");
            return  $results;
        }

    }


?>