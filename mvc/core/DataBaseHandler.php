<?php
    class DB{
        var $host;
        var $user;
        var $pass;
        var $dbName;
        var $conn;

        function __construct(){
            $this->dbName = Config::$dbName;
            $this->host = Config::$dbHost;
            $this->user = Config::$dbUser;
            $this->pass = Config::$dbPass;
            $this->conn = null;
        }

        function __destruct(){
            $this->closeConnection();
        }
        function getConnection(){
            if($this->conn == null){
                $this->conn = new mysqli($this->host,$this->user,$this->pass, $this->dbName);
                $this->conn->set_charset("UTF8");
            }
            return $this->conn;
        }

        function executeQuery($sql){
            $result = null;
            $this->getConnection();
            if($this->conn){
                $result = $this->conn->query($sql);
            }
            // $this->closeConnection();
            return $result;
        }

        function closeConnection(){
            if($this->conn){
                $this->conn->close();
                $this->conn = null;
            }
        }

    }