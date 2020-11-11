<?php

    class Home extends Controller{

        function Welcome(){
            $this->view('Welcome');
        }
        function Chui($name){
            $this->view("Chui",["name"=>$name]);
        }
    }