<?php
    class ChuyenGia extends Controller{
        function __construct()
        {
            $this->auth();
        }
        function Welcome(){
            $model = $this->model("ChuyenGiaModel");
            $ds = $model->danhSachSanPham();
            $this->view("ChuyenGia/Home",["view"=>"ChuyenGia/Welcome","data" => $ds]);
        }
        function about(){
            $this->view("ChuyenGia/Home",["view"=>"ChuyenGia/About"]);
        }
        function DanhGiaSanPham($id_dg="",$id_sp=""){
            $model = $this->model("ChuyenGiaModel");
            // echo $id_dg.";".$id_sp;
            $san_pham = $model->thongTinSanPham($id_sp);
            $id_phieu = 0;
            $phieu =[];
            // var_dump($san_pham);
            if(!empty($san_pham)){
                $id_phieu = $san_pham["phan_nhom"];
                $phieu = $this->model("PhieuDanhGia")->get($id_phieu);
            }
            // var_dump($phieu);

            $this->view("ChuyenGia/Home",["view"=>"ChuyenGia/DanhGiaSanPham","san_pham"=>$san_pham,"phieu"=>$phieu, "id_dg"=>$id_dg]);
        }
        function LuuDiem($id_dg="",$id_sp=""){
            $message = "";
            if(isset($_POST["done"])){
                $model = $model = $this->model("ChuyenGiaModel");
                var_dump($_POST);
                $result = $model->chamDiem($id_dg,$id_sp);
                /**
                 * TODO: xử lí thông báo lưu điểm thành công hay thất bại
                 * Chuyển hướng về trang home
                 */
                if($result){
                    $message = "Đã chấm điểm sản phẩm $id_sp!";
                }
                else{
                    $message =" Có lỗi xảy ra, không thể đánh giá sản phẩm $id_sp!";
                }
            }
            $_SESSION["err_mess"]=$message;
            header("Location: ?url=ChuyenGia");
        }
    }