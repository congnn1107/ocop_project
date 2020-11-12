<?php
    class Product extends Controller{
        function Welcome(){

        }
        function DanhGia($id){
            $model = $this->model('PhieuDanhGia');
            $object = $model->get($id);
            $this->view("Product/PhieuDanhGia",["data" => $object]);
        }
    }