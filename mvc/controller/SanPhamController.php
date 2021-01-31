<?php
    class SanPham extends Controller{
        function Welcome(){
            $this->checkAdmin();

            $listsp = $this->model("SanPhamModel")->getList();
            $this->view("Admin/Home",["view"=>"Product/Welcome","data"=>$listsp]);
        }
        function Create(){
            $this->checkAdmin();

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
            $this->checkAdmin();
            /**
             * TODO: xóa sản phẩm theo id từ các bảng: kq_danh_gia, ct_danh_gia, san_pham
             */
            $result = $this->model("SanPhamModel")->delete($id);
            header("Location: ?url=Admin/QuanLySanPham");
        }
        function Update($id){
            $this->checkAdmin();
            $model = $this->model("SanPhamModel");
            $message="";
            $hinh_sp = $model->get($id)->hinh_sp;

            //Xử lí lưu
            if(isset($_POST["save"])){
                if($_FILES["picture-file"]["name"]!=""){
                    if($hinh_sp!="") deleteFile($hinh_sp);
                    $hinh_sp = uploadHinhSP($_FILES["picture-file"]);
                }
                $sp = new SanPhamEntity(
                    $id,
                    $_POST["ten_sp"],
                    $_POST["chu_the_sx"],
                    $_POST["dia_chi"],
                    $_POST["phan_nhom"],
                    $hinh_sp,
                    $_POST["link_ho_so"]
                );
                $result = $model->update($sp);
                if($result){
                    $message ="Đã cập nhật thành công!";
                }
                else{
                    $message = "Có lỗi xảy ra!";
                }
            }
            //show dữ liệu
            $sp = $model->get($id);
            $dspn = $model->getDSPhanNhom();//lấy danh sách phân nhóm
            $this->view("Admin/Home",["view"=>"Product/Update","sp"=>$sp,"dspn"=>$dspn,"message"=>$message]);
        }
        function getListAPI($id_phan_nhom){
            $result = $this->model("SanPhamModel")->locTheoPhanNhom($id_phan_nhom);
            echo json_encode($result,JSON_UNESCAPED_UNICODE);
        }
        function checkIdAPI($id){
            $result = $this->model("SanPhamModel")->checkId($id);
            echo $result?"true":"false";
        }
    }