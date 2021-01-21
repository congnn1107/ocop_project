<?php

    if(session_id()===""){
         session_start();
    }
    require_once "./mvc/bridge.php";
    $app = new App();
    
?>