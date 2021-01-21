<?php
    //echo "\napp required";
    class App{

        var $controller;
        var $action;
        var $params=[];
        private $defaultController = "Home";
        private $defaultAction = "Welcome";

        function __construct(){
            $url = $this->getProcess();
            $temp = array_shift($url);
            if(file_exists('./mvc/controller/'.$temp.'Controller.php')){
                 $this->controller= $temp;
                 $temp = array_shift($url);
                 require_once './mvc/controller/'.$this->controller.'Controller.php';
                 if(method_exists($this->controller,$temp)){
                    $this->action = $temp;

                    $this->params = array_values($url);
                 }
                 else{
                     $this->action = $this->defaultAction;
                 }
            }else{
                 $this->controller = $this->defaultController;
                 $this->action=$this->defaultAction;
                 require_once './mvc/controller/'.$this->controller.'Controller.php';
            }

            $obj = new $this->controller;
            call_user_func_array([$obj,$this->action],$this->params);

        }

        function getProcess(){
            $url = explode('/',filter_var(trim($_GET['url'])));

            return $url;   
        }
    }