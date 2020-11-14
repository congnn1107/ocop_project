<?php
    class Product extends Controller{
        function Welcome(){

        }
        function DanhGia($id){
            $model = $this->model('PhieuDanhGia');
            $object = $model->get($id);
            // print_r($object);
            $this->view("Product/PhieuDanhGia",["data" => $object]);
        }
    }