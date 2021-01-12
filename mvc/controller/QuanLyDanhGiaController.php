<?php
    class QuanLyDanhGia extends Controller {
        function Welcome(){
            $this->view("Admin/Home",["view"=>"QuanLyDanhGia/Welcome"]);
        }
    }