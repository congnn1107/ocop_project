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
        function checkId($id){
            $sql = "select count(id) as count from san_pham where id='$id'";
            $result = $this->executeQuery($sql);
            $result = $result->fetch_assoc()["count"];
            return $result>0;
        }
        function delete($id){
            $sql = "delete from kq_danh_gia where san_pham = '$id'; ";
            $sql.= "delete from ct_danh_gia where san_pham = '$id'; ";
            $sql.= "delete from san_pham where id = '$id'; ";
            $result = $this->executeMultiQuery($sql);
            return $result;
        }
        function get($id){
            if(!class_exists("SanPhamEntity")) include "./mvc/bean/SanPhamEntity.php";
            $sql = "select * from san_pham where id='$id' limit 0,1";
            $result = $this->executeQuery($sql);
            $sp=null;
            if($result){
                if($result->num_rows>0){
                    $row = $result->fetch_row();
                    $sp = new SanPhamEntity($row[0],
                        $row[1],
                        $row[2],
                        $row[3],
                        $row[6],
                        $row[4],
                        $row[5]
                    );
                }
            }
            return $sp;
        }
        function update($sp){
            $sql = "update san_pham set ten_sp = '$sp->ten_sp', chu_the_sx='$sp->chu_the_sx', dia_chi='$sp->dia_chi',
                  hinh_sp='$sp->hinh_sp',link_ho_so='$sp->link_ho_so',phan_nhom ='$sp->phan_nhom' where id='$sp->id'";
            $result = $this->executeQuery($sql);
            return $result;
        }
    }