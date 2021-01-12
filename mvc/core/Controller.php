<?php
class Controller{
    function __construct()
    {
        // if(!isset($_SESSION['username'])) header('Location: index.php');
    }
    function model($name,$params =[]){
        $filePath = "./mvc/models/".$name.".php";
        if(file_exists($filePath)){
            require_once $filePath;
            $model = new $name;
            return $model;
        }
        return null;
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
            header("Location: index.php");
         }
    }
    function checkAdmin(){
        if($_SESSION['user']['role']!=1){
            header('Location: ?url=ChuyenGia');
        }
    }
}