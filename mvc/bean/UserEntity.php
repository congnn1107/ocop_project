<?php
    class UserEntity{
        public $username;
        public $password;
        public $ho_ten;
        public $gioi_tinh;
        public $ngay_sinh;
        public $dia_chi;
        public $sdt;
        public $email;
        public $avatar;
        public $ngay_them;
        public $login_status;
        public $last_login;
        public $user_status;
        public $role;
        
        function __construct($username,$password, $ho_ten, $gioi_tinh,$ngay_sinh, $dia_chi,$sdt,$email,$avatar,$role,$ngay_them="CURRENT_TIMESTAMP",$login_status ="0",$last_login="null",$user_status=1){
            $this->username = $username;
            $this->password = $password;
            $this->ho_ten = $ho_ten;
            $this->gioi_tinh = $gioi_tinh;
            $this->ngay_sinh = $ngay_sinh;
            $this->dia_chi = $dia_chi;
            $this->sdt = $sdt;
            $this->email = $email;
            $this->avatar = $avatar;
            $this->role = $role;
            $this->ngay_them = $ngay_them;
            $this->login_status=$login_status;
            $this->last_login=$last_login;
            $this->user_status=$user_status;
        }
    }