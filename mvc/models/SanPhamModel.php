<?php
    class SanPhamModel extends DB{
        function getList(){
            $sql = "select * from v_tt_sp";
            $result = $this->executeQuery($sql);
            return $result;
        }
        function create($sp){
            $sql = "insert san_pham values('$sp->id','$sp->ten_sp','$sp->chu_the_sx','$sp->dia_chi','$sp->hinh_sp','$sp->link_ho_so','$sp->phan_nhom')";
            $result = $this->executeQuery($sql);
            return $result;
        }
        function getDSPhanNhom(){
            $sql = "select * from tb_phan_nhom_sp";
            $result = $this->executeQuery($sql);
            return $result;
        }
        function locTheoPhanNhom($id_phan_nhom){
            $sql = "select id,ten_sp from san_pham where phan_nhom=$id_phan_nhom";
            $result = $this->executeQuery($sql);
            $arr = [];
            while($row=$result->fetch_assoc()){
                $arr[] = [
                    "id"=>$row["id"],
                    "ten_sp" =>$row["ten_sp"]
                ];
            }
            return $arr;
        }
    }