<?php
    class User extends Controller{
        function __construct(){
            $this->auth();
        }
        function Welcome(){
            $model = $this->model("UserModel");
            $data = $model->getList();
            $this->view("Admin/Home",["view"=>"User/Welcome","data"=>$data]);
        }
        function Create(){
            // $message="";
            if(isset($_POST['create'])){
                // $message="* Thông báo ở đây!";
                include "./mvc/bean/UserEntity.php";
                $model = $this->model("UserModel");
                $user = new UserEntity(
                    $_POST['username'],
                    $_POST['password'],
                    $_POST['ho_ten'],
                    $_POST['gioi_tinh'],
                    $_POST["ngay_sinh"],
                    $_POST['dia_chi'],
                    $_POST['sdt'],
                    $_POST['email'],
                    uploadImage($_FILES['avatar-file']),
                    $_POST['role']
                );
                // print "<pre>";
                // var_dump($user);
                // print "</pre>";
                $result = $model->create($user);
                if($result == true){
                    $message = "Đã thêm thành công tài khoản $user->username cho $user->ho_ten!";
                }else{
                    $message ="Có lỗi xảy ra!";
                }
                // var_dump($result);
                
                // var_dump( $user_id);

                
            }
            // echo "<hr>";
            // include "./mvc/views/User/Create.php";
            $this->view("Admin/Home",["view"=>"User/Create","message"=>$message]);
        }
        function deleteUser($username){
            $model = $this->model("UserModel");
            //xóa avatar nếu có
            $avatar = $model->get($username)->avatar;
            if($avatar!=""){
                if(deleteFile($avatar)){
                    echo("File đã xoá thành công");
                }else{
                    echo("Lỗi khi xóa file");
                    die();
                }
            }
            //xóa user
            $result = $model->delete($username);
            header('Location: ?url=Admin/QuanLyUser');
        }
        function detail($username){
            $model = $this->model("UserModel");
            $user = $model->get($username);
            return $user;
        }

        function checkUsernameAPI(){
            $username = $_POST['username'];
            $model = $this->model("UserModel");
            $result = $model->checkUsername($username);
            echo json_encode($result);
        }
        function update($username){
            $userEntity=null;
            if(isset($_POST['save'])){
                $model = $this->model("UserModel");
                $avatar = $this->detail($username)->avatar;
                // var_dump($_FILES["avatar-file"]);
                if($_FILES["avatar-file"]["name"]!=""){
                    if($avatar!="") deleteFile($avatar);

                    $avatar = uploadImage($_FILES["avatar-file"]);
                }
                $userEntity = new UserEntity(
                    $username,
                    $_POST['password'],
                    $_POST['ho_ten'],
                    $_POST['gioi_tinh'],
                    $_POST["ngay_sinh"],
                    $_POST['dia_chi'],
                    $_POST['sdt'],
                    $_POST['email'],
                    $avatar,
                    $_POST['role'],
                    "","0","null",
                    $_POST['user_status']
                );
                $result = $model->update($userEntity);
            }
            $userEntity=$this->detail($username);

            $this->view("Admin/Home",["view"=>"User/Update","data"=>$userEntity,"message"=>$message]);
        }
    }