<?php

    class RecordController extends Controller {

        public function index() {
            
            $records = self::showActive();
            Controller::view("records",["records" => $records]);

        }

        public function add() {

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }

            if(!isset($_POST['status'])) {
                $_POST['status'] = 0;
            }
            else {
                $_POST['status'] = 1;
            }

            $_POST['first_name'] = test_input($_POST["first_name"]);
            $_POST['last_name'] = test_input($_POST["last_name"]);
            $_POST['email'] = test_input($_POST["email"]);
            $_POST['marks'] = test_input($_POST["marks"]);

            //Validate record has name and email 
             if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty(['email'])) {
                echo('<script>alert("fill empty sections")</script>');
                self::manage();
                return;
            } 

                $image = $_FILES['image']['name'];
                $dir = "images/";
                $target_image = $dir . basename($image);
                $imageExt = strtolower(pathinfo($target_image,PATHINFO_EXTENSION));
                $extensions = array("jpg","jpeg","png");

                if(in_array($imageExt,$extensions)) {
                    $_POST['profile_picture'] = $image;
                    move_uploaded_file($_FILES['image']['tmp_name'],$target_image);            

                }

            
            self::insert($_POST);
            header('location: manage');   
        }

        public function update() {
            self::edit($_POST);
            header('location: manage');   
        }

        public function remove() {
            self::delete($_POST['id']);    
            header('location: manage');   
        
        }
    
        public function manage() {
            $records = self::showAll();
            Controller::view("manage",["records" => $records]);
        }
    }

?>