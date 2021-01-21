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
                $hinh_sp = $_FILES["picture-file"];
                $hinh_sp = uploadHinhSP($hinh_sp);
                $sp = new SanPhamEntity(
                    $_POST["id"],
                    $_POST["ten_sp"],
                    $_POST["chu_the_sx"],
                    $_POST["dia_chi"],
                    $_POST["phan_nhom"],
                    $hinh_sp,
                    $_POST["link_ho_so"]
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
        function Delete($id){
            /**
             * TODO: xóa sản phẩm theo id từ các bảng: kq_danh_gia, ct_danh_gia, san_pham
             */
            echo "Xóa sản phẩm $id";
        }
        function Update($id){
            echo "Update sản phẩm $id";
        }
        function getListAPI($id_phan_nhom){
            $result = $this->model("SanPhamModel")->locTheoPhanNhom($id_phan_nhom);
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }
    }