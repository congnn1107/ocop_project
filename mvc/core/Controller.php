<?php
class Controller{
    function __construct()
    {
        // if(!isset($_SESSION['username'])) header('Location: index.php');
    }
    function model($name,$params =[]){
        $model = null;
        $filePath = "./mvc/models/".$name.".php";
        if(!class_exists($name)){
            if(file_exists($filePath)){
                require_once $filePath;
            }else{
                return $model;
            } 
        }
        $model = new $name;

        return $model;
    }

    function view($view, $params = []){
        $filePath = './mvc/views/'.$view.'.php'; 
        if(file_exists($filePath)){
            require_once $filePath;
        }

    }
    /**
     * Kiểm tra đăng nhập
     * @return void
     */
    function auth(){
        if(!isset($_SESSION['user'])){
            header("Location: index.php?url=Validate");
         }
    }
    function checkAdmin(){
        if($_SESSION['user']['role']!=1){
            header('Location: ?url=ChuyenGia');
        }
    }
}