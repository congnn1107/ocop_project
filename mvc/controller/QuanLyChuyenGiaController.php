<?php
    class QuanLyChuyenGia extends Controller{
        function __construct()
        {
            $this->auth();
            $this->checkAdmin();
        }
        function Welcome(){
            
            $cg_model = $this->model("ChuyenGiaModel");
            $pn_list=$this->model("SanPhamModel")->getDSPhanNhom();
            $message="";
            if(isset($_POST["save"])){
                $result = $cg_model->setVaiTro();
                if($result){
                    $message="Đã lưu thành công!";

                }
                else{
                    $message="Có lỗi xảy ra khi lưu!";
                }
            }

            $cg_list = $cg_model->getList();
            $this->view("Admin/Home",["view"=>"QuanLyChuyenGia/Welcome","ds_chuyen_gia"=>$cg_list,"ds_phan_nhom"=>$pn_list,"message"=>$message]);
        }
        function getListAPI($id_phan_nhom){
            $ds = $this->model("ChuyenGiaModel")->locTheoPhanNhom($id_phan_nhom);
            echo json_encode($ds,JSON_UNESCAPED_UNICODE);
        }
    }