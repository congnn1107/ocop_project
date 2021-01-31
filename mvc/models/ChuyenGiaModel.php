<?php
    class ChuyenGiaModel extends DB{
        
        function getList(){
            $sql = "select *from v_chuyen_gia_phan_nhom";
            $result = $this->executeQuery($sql);
            return $result;
        }
        function setVaiTro(){
            $sql = "set FOREIGN_KEY_CHECKS=0; ";
            $sql .="truncate table chuyen_gia; ";
            $sql .= "set FOREIGN_KEY_CHECKS=1";
            $this->executeMultiQuery($sql);
            $sql ="insert into chuyen_gia values";
            foreach($_POST["cg"] as $row){

                $sql.="('$row[0]',$row[1]),";
                // echo "<br>";
            }
            $sql=substr($sql,0,strlen($sql)-1);
            // echo $sql;

            $result= $this->executeQuery($sql);
            // echo $this->conn->error;
            // var_dump($result);
            return $result;
            // return true;
        }
        function locTheoPhanNhom($id_phan_nhom){
            $sql = "select user.username, user.ho_ten from user join chuyen_gia on user.username = chuyen_gia.username WHERE chuyen_gia.phan_nhom=$id_phan_nhom";
            $result = $this->executeQuery($sql);
            $arr=[];
            while($row = $result->fetch_assoc()){
                $arr[] = [
                    "username"=>$row["username"],
                    "ho_ten"=>$row["ho_ten"]
                ];
            }
            return $arr;
        }
        function kiemTraSanPhamHopLe($id_dg, $id_sp){
            $chuyen_gia = $_SESSION['user']['username'];
            $sql = "select count(san_pham) as count from ct_danh_gia where id_dg='$id_dg' and san_pham='$id_sp' and nguoi_cham='$chuyen_gia'";
            $result = $this->executeQuery($sql);
            return $result->fetch_assoc()["count"]!=0;

        }
        function danhSachSanPham(){
            $chuyen_gia = $_SESSION["user"]["username"];
            //Có thể giới hạn danh sách sản phẩm theo id_dg gần nhất
            $sql = "SELECT ct_danh_gia.id_dg, san_pham.id,san_pham.ten_sp,san_pham.chu_the_sx,san_pham.dia_chi,ct_danh_gia.status, (select kq_danh_gia.phan_a+kq_danh_gia.phan_b+kq_danh_gia.phan_c from kq_danh_gia WHERE kq_danh_gia.id_dg = ct_danh_gia.id_dg and kq_danh_gia.san_pham=ct_danh_gia.san_pham and kq_danh_gia.nguoi_cham=ct_danh_gia.nguoi_cham) as diem FROM san_pham JOIN ct_danh_gia ON san_pham.id = ct_danh_gia.san_pham WHERE ct_danh_gia.nguoi_cham = '$chuyen_gia' order by ct_danh_gia.status";
            $arr=[];
            $result = $this->executeQuery($sql);
            while($row = $result->fetch_assoc()){
                $arr[] = [
                    "id_dg"=>$row["id_dg"],
                    "id_sp"=>$row["id"],
                    "ten_sp"=>$row["ten_sp"],
                    "chu_the" => $row["chu_the_sx"],
                    "dia_chi" => $row["dia_chi"],
                    "status" => $row["status"],
                    "diem" => $row["diem"]
                ];
            }
            return $arr;
        }
        function chamDiem($id_dg,$id_sp){

            //TODO:
            /**
             * Kiểm tra tính hợp lệ của mã sản phẩm và mã đợt đánh giá
             * Kiểm tra tính đầy đủ của tập dữ liệu gửi lên// done
             * Xóa dữ liệu cũ trùng lặp nếu có//done
             */
            
            $kq = $_POST['tieuchi'];
            //tính điểm cho 3 phần
            $total =[];
            foreach($kq as $i){
                $sum_i = 0;
                foreach($i as $j){
                    foreach($j as $k){
                        echo $k[2]."\t";
                        $sum_i+= $k[2];
                    }
                }
                $total[] = $sum_i;    
            }
            //Đưa điểm vào bảng
            $result = false;
            if(count($total)==3){
                $nguoi_cham = $_SESSION["user"]["username"];
                $sql = "delete from kq_danh_gia where id_dg=$id_dg and nguoi_cham='$nguoi_cham' and san_pham='$id_sp'";
                $result = $this->executeQuery($sql);
                if($result){
                    $sql = "insert into kq_danh_gia values($id_dg,'$nguoi_cham','$id_sp',$total[0],$total[1],$total[2])";
                    $result = $this->executeQuery($sql);
                    if($result){
                        $sql = "update ct_danh_gia set status=1 where id_dg=$id_dg and nguoi_cham='$nguoi_cham' and san_pham='$id_sp'";
                        $result = $this->executeQuery($sql);
                    }
                }
                
            }
            return $result;
        }
        function thongTinSanPham($id_sp){
            $sql = "select san_pham.id, san_pham.ten_sp, san_pham.chu_the_sx, san_pham.dia_chi,san_pham.hinh_sp,
            san_pham.link_ho_so, san_pham.phan_nhom,tb_phan_nhom_sp.ten_phan_nhom, tb_nhom_sp.ten_nhom_sp,
            tb_nganh_sp.ten_nganh,tb_bo_ql.ten_bo
            from san_pham join tb_phan_nhom_sp on san_pham.phan_nhom = tb_phan_nhom_sp.id_phan_nhom
            JOIN tb_nhom_sp ON tb_phan_nhom_sp.nhom = tb_nhom_sp.id_nhom_sp
            join tb_nganh_sp on tb_nhom_sp.id_nhom_sp = tb_nganh_sp.id_nganh
            JOIN tb_pnhom_bo on tb_phan_nhom_sp.id_phan_nhom = tb_pnhom_bo.phan_nhom_sp
            JOIN tb_bo_ql on tb_bo_ql.id_bo = tb_pnhom_bo.bo_ql
            WHERE san_pham.id = '$id_sp'";

            $arr=[];
            $result = $this->executeQuery($sql);
            while($row = $result->fetch_assoc()){
                $arr= [
                    "id" => $row["id"],
                    "ten" => $row["ten_sp"],
                    "chu_the" => $row["chu_the_sx"],
                    "dia_chi" => $row["dia_chi"],
                    "hinh" => $row["hinh_sp"],
                    "ho_so" => $row["link_ho_so"],
                    "phan_nhom" => $row["phan_nhom"],
                    "ten_phan_nhom" => $row["ten_phan_nhom"],
                    "nhom" => $row["ten_nhom_sp"],
                    "nganh" => $row["ten_nganh"],
                    "bo" => $row["ten_bo"]
                ];
            }
            return $arr;
        }
    }