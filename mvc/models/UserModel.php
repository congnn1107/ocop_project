<?php
    class UserModel extends DB
    {
        function __construct(){
            parent::__construct();
        }
        function get($username){

            if(!class_exists("UserEntity")) include "./mvc/bean/UserEntity.php";

            $sql = "select * from user where username = '$username' limit 0,1";
            $result = $this->executeQuery($sql);
            $user=null;
            if($result){
                if($result->num_rows>0){
                    $row = $result->fetch_assoc();
                    $user = new UserEntity($row[
                        'username'],
                        $row['password'],
                        $row['ho_ten'],
                        $row['gioi_tinh'],
                        $row['ngay_sinh'],
                        $row['dia_chi'],
                        $row['sdt'],
                        $row['email'],
                        $row['avatar'],
                        $row['role'],
                        $row['ngay_them'],
                        $row['login_status'],
                        $row['last_login'],
                        $row['user_status']
                    );
                }
            }
            
            return $user;
        }
        function checkUsername($username){
            $sql = "select count(ho_ten) as count from user where username = '$username'";
            $result = $this->executeQuery($sql);
            $result = $result->fetch_assoc()['count'];
            return $result > 0;
        }
        function markLogin($username,$status){

            $sql = "update user set login_status = '$status'";

            if($status==1) $sql.=", last_login = CURRENT_TIMESTAMP";

            $sql.=" where username = '$username'";
            $result = $this->executeQuery($sql);
            return $result;
        }
       
        function getList(){
            $sql = "select * from v_list_user";
            $result = $this->executeQuery($sql);
            return $result;
        }
        function getID($name){
            $sql = "select username from user where ho_ten='$name' limit 0,1";
            $result = $this->executeQuery($sql);

            return $result;
        }
        function create($user){
            $sql = "insert into user values('$user->username','$user->password','$user->ho_ten','$user->gioi_tinh','$user->ngay_sinh','$user->dia_chi','$user->sdt','$user->email','$user->avatar',$user->ngay_them,'$user->login_status',$user->last_login,'$user->user_status','$user->role')";
            $result = $this->executeQuery($sql);
            //  echo $this->conn->error;
            return $result;
        }
        function delete($username){
            $sql = "delete from user where username = '$username'";
            $result = $this->executeQuery($sql);
            return $result;
        }

        function update($user){
            $sql = "update user set password='$user->password',ho_ten='$user->ho_ten',gioi_tinh=$user->gioi_tinh,ngay_sinh='$user->ngay_sinh',dia_chi='$user->dia_chi',sdt='$user->sdt',email='$user->email',role=$user->role,avatar='$user->avatar',user_status='$user->user_status' where username='$user->username'";
            $result = $this->executeQuery($sql);
            // echo $this->conn->error;
            return $result;
        }
    }