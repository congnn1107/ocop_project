<?php
    class QuanLyDanhGia extends Controller {
        function __construct()
        {
            $this->auth();
            $this->checkAdmin();
        }
        function Welcome(){
            $model = $this->model("DanhGiaModel");
            $ds = $model->getList();
            $this->view("Admin/Home",["view"=>"QuanLyDanhGia/Welcome","data"=>$ds]);
        }
        function Create($flag=[]){
            
            $model = $this->model("DanhGiaModel");
            $ds = $model->create();
            header("Location: ?url=Admin/QuanLyDanhGia");
        }
        function Delete($id){
            
            $model = $this->model("DanhGiaModel");
            $ds = $model->delete($id);
            header("Location: ?url=Admin/QuanLyDanhGia");
        }
        function Detail($id){
            
            $model = $this->model("DanhGiaModel");
            $data = $model->detail($id);
            $this->view("Admin/Home",["view"=>"QuanLyDanhGia/Detail","data"=>$data,"id_dg"=>$id]);
        }
        
        function detailSanPhamDG($id_dg,$id_sp){
            $info = $this->model("ChuyenGiaModel")->thongTinSanPham($id_sp);
            $list = $this->model("DanhGiaModel")->ketQuaSanPham($id_dg,$id_sp);
            $status = $this->model("DanhGiaModel")->trangThaiSanPham($id_dg,$id_sp);
            $this->view("Admin/Home",["view"=>"QuanLyDanhGia/ChiTietSanPhamDanhGia","info"=>$info,"list"=>$list,"id_dg"=>$id_dg,"status"=>$status]);
        }
        function Update($id){
            $model = $this->model("DanhGiaModel");
            if(isset($_POST["save"])){
                $result = $model->update($id);
                header("Location: ?url=Admin/QuanLyDanhGia");
            }

            $ds_phan_nhom = $this->model("SanPhamModel")->getDSPhanNhom();
            $ds_sp = $this->model("SanPhamModel")->locTheoPhanNhom(1);
            $ds_cg = $this->model("ChuyenGiaModel")->locTheoPhanNhom(1);
            $ds_sp_dg =[];
            $this->view("Admin/Home",[
                    "view"=>"QuanLyDanhGia/Update",
                    "id_dg" =>$id,
                    "ds_phan_nhom"=>$ds_phan_nhom,
                    "ds_sp"=>$ds_sp,
                    "ds_cg"=>$ds_cg,
                    "ds_sp_dg"=>$ds_sp_dg
                ]);
        }
    }