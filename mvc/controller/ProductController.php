<?php
    class Product extends Controller{
        function Welcome(){

        }
        function DanhGia($id){
            $model = $this->model('PhieuDanhGia');
            $object = $model->get($id);
            $name = $model->getName($id);
            // print_r($object);
            $this->view("Product/PhieuDanhGia",["data" => $object, "name"=>$name]);
        }
    }