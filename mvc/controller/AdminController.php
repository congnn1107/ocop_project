<?php
    class Admin extends Controller
    {
        function __construct()
        {
            //kiểm tra xem đã đăng nhập hay chưa
            $this->auth();
            $this->checkAdmin();

        }
        function Welcome()
        {
            $this->view("Admin/Home",['view'=>"Admin/Welcome"]);
        }
        function QuanLyTieuChi(){
            include "./mvc/controller/BoTieuChiController.php";
            $pr = new BoTieuChi();
            $pr->Welcome();
        }
        function DanhSachTieuChi()
        {
            include "./mvc/controller/BoTieuChiController.php";
            $pr = new BoTieuChi();
            $pr->DanhSach();
        }
        
        function ChiTietTieuChi($id)
        {
            include "./mvc/controller/BoTieuChiController.php";
            $pr = new BoTieuChi();
            $pr->DanhGia($id);
        }
        function QuanLyUser(){
            include "./mvc/controller/UserController.php";
            $user = new User();
            $user->Welcome();
        }
        function CreateUser(){
            include "./mvc/controller/UserController.php";
            $user = new User();
            $user->Create();
        }
        function XoaUser($username){
            include "./mvc/controller/UserController.php";
            $user = new User();
            $user->deleteUser($username);
        }
        function ChiTietUser($username){
            include "./mvc/controller/UserController.php";
            $user = new User();
            $userEntity=$user->detail($username);
            $this->view("Admin/Home",["view"=>"User/Detail","data"=>$userEntity]);
        }
        function updateUser($username){
            include "./mvc/controller/UserController.php";
            $user = new User();
            $user->update($username);
        }
        
        function QuanLySanPham(){
            include "./mvc/controller/SanPhamController.php";
            $sp =new SanPham();
            $sp->Welcome();
        }
        function CreateSanPham(){
            include "./mvc/controller/SanPhamController.php";
            $sp =new SanPham();
            $sp->Create();
        }
        function DeleteSanPham($id){
            include "./mvc/controller/SanPhamController.php";
            $sp =new SanPham();
            $sp->Delete($id);
        }
        function UpdateSanPham($id){
            include "./mvc/controller/SanPhamController.php";
            $sp =new SanPham();
            $sp->Update($id);
        }
        // Phần này thử code kiểu khác
        function QuanLyDanhGia($hoat_dong="",$tham_so=[]){
            include "./mvc/controller/QuanLyDanhGiaController.php";
            $dg =new QuanLyDanhGia();
            // echo $hoat_dong;
            if(method_exists($dg,$hoat_dong)){
                $dg->$hoat_dong($tham_so);
            }else{
                $dg->Welcome();
            }
        }
        function ChiTietSanPhamDanhGia($id_dg,$id_sp){
            include "./mvc/controller/QuanLyDanhGiaController.php";
            $dg =new QuanLyDanhGia();
            $dg->detailSanPhamDG($id_dg,$id_sp);
        }
        function QuanLyChuyenGia(){
            include "./mvc/controller/QuanLyChuyenGiaController.php";
            $cg =new QuanLyChuyenGia();
            $cg->Welcome();

        }
    }