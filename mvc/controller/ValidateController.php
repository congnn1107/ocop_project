<?php
    class Validate extends Controller{
        function Welcome(){
            if(isset($_SESSION['user'])) header("Location: ?url=Admin");
            $this->view("Login");
        }
        function login(){
            if(isset($_SESSION['user']))
            {
                if($_SESSION['user']['role']==1) header("Location: ?url=Admin");
                else header("Location: ?url=ChuyenGia");
            }
            $errMess="";
            if(isset($_POST["login"])){
                $user = $_POST['txtUser'];
                $pass = $_POST['txtPass'];
                $model = $this->model("UserModel");
                $user_login = $model->get($user);
                
                if($user_login!=null){
                    // var_dump($user_login);
                    if($user==$user_login->username && $user_login->password==$pass){
                        $model->markLogin($user,1);
                        $_SESSION['user'] = (array)$user_login;
                        if($user_login->role==1) header("Location: ?url=Admin");
                        else header("Location: ?url=ChuyenGia");
                    }else{
                        $errMess = "*Tài khoản hoặc mật khẩu không chính xác!";
                        $this->view("Login",['errMess'=>$errMess]);
                    }
                }else{
                    $errMess = "*Tài khoản hoặc mật khẩu không chính xác!";
                        
                }

                //xử lí nút nhớ mật khẩu
                if($_POST["remember"]=="on"){
                    setcookie("user",$user,time()+(3600*24*15));
                    setcookie("pass",$pass,time()+(3600*24*15));
                    setcookie("remember-pass","true",time()+(3600*24*15));
                }else{
                    setcookie("remember-pass","off",time()+(3600*24*15));
                }
            }

            $this->view("Login",['errMess'=>$errMess]);

        }
        function logout(){
            $this->auth();
            $this->model("UserModel")->markLogin($_SESSION['user']['username'],0);
            unset($_SESSION['user']);
            header("Location: index.php");
        }
    }