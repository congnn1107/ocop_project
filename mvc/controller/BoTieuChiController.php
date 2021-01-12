<?php
    class BoTieuChi extends Controller{

        function __construct(){
            $this->auth();
            $this->checkAdmin();
        }
        function Welcome(){
            $this->view("Admin/Home",['view'=>"BoTieuChi/Welcome"]);
        }
        function DanhGia($id){
            $model = $this->model('PhieuDanhGia');
            $object = $model->get($id);
            $name = $model->getName($id);
            // print_r($object);
            // $this->view("Product/PhieuDanhGia",["data" => $object, "name"=>$name]);
            $this->view("Admin/Home",["data" => $object, "name"=>$name,'view'=>"BoTieuChi/PhieuDanhGia"]);
        }
        function DanhSach(){
            $model = $this->model("PhieuDanhGia");
            $data = $model->layDS();
            $this->view("Admin/Home",["data" => $data,'view'=>"BoTieuChi/DSPhieuDanhGia"]);
        }
    }