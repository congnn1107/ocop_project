<?php
    class SanPham extends Controller{
        function Welcome(){
            $listsp = $this->model("SanPhamModel")->getList();
            $this->view("Admin/Home",["view"=>"Product/Welcome","data"=>$listsp]);
        }
        function Create(){
            $model = $this->model("SanPhamModel");
            $ds_pnhom = $model->getDSPhanNhom();
            $message="";
            if(isset($_POST["create"])){
                if(!class_exists("SanPhamEntity")){
                    require_once "./mvc/bean/SanPhamEntity.php";
                }
                $sp = new SanPhamEntity(
                    $_POST["id"],
                    $_POST["ten_sp"],
                    $_POST["chu_the_sx"],
                    $_POST["dia_chi"],
                    $_POST["phan_nhom"]
                );
                if($model->create($sp)){
                    $message = "Đã lưu sản phẩm $sp->ten_sp với mã $sp->id";
                }
                else{
                    $message="Không thể lưu sản phẩm";
                }
            }
            $this->view("Admin/Home",["view"=>"Product/Create", "data"=>$ds_pnhom,"message"=>$message]);
        }
    }