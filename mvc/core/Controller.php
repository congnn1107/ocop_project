<?php
class Controller{
    function model($name,$params =[]){

    }

    function view($view, $params = []){
        $filePath = './mvc/views/'.$view.'.php'; 
        if(file_exists($filePath)){
            require_once $filePath;
        }

    }
}