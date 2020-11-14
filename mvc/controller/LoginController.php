<?php
    class Login extends Controller{
        function Welcome(){
            $this->view("Login");
        }
        function process(){
            
            $user = $_POST['txtUser'];
            if($user != "nncpro"){
                 $errMess = "Tài khoản không chính xác!";
                 $this->view("Login",['errMess'=>$errMess]);
            }else{
                echo var_dump($_POST);
            }
        }
    }