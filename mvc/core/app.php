<?php
    //echo "\napp required";
    class App{
        var $controller = 'Home';
        var $action ='Welcome';
        var $params=[];

        function __construct(){
            if(isset($_GET)){
               $url = $this->getProcess();
               $temp = array_shift($url);
               if(file_exists('./mvc/controller/'.$temp.'Controller.php')){
                   require_once './mvc/controller/'.$this->controller.'Controller.php';
                   $this->controller= $temp;
                   $temp = array_shift($url);
                   $obj = new $this->controller;
                   if(method_exists($this->controller,$temp)){
                       $this->action = $temp;

                       $this->params = array_values($url);

                       call_user_func_array([$obj,$this->action],$this->params);
                    }
                    else{
                        require_once "./mvc/views/404.php";   
                    }
               }else{
                   require_once "./mvc/views/404.php";
               }
            }
            

        }

        function getProcess(){
            $url = explode('/',filter_var(trim($_GET['url'])));

            return $url;
            
        }
    }