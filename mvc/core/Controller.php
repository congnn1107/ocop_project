<?php
class Controller{
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
}