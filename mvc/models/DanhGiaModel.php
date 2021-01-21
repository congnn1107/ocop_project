<?php
 class DanhGiaModel extends DB{
     function getList(){
         $sql = "SELECT danh_gia.id,date(danh_gia.ngay_them) as ngay_them,(SELECT count( DISTINCT ct_danh_gia.san_pham) from ct_danh_gia where danh_gia.id=ct_danh_gia.id_dg) as so_sp FROM danh_gia";
         $result = $this->executeQuery($sql);
         $arr = [];
         while($row =$result->fetch_assoc()){
             $arr[]=["id"=>$row["id"],"ngay_them"=>$row["ngay_them"],"so_sp"=>$row["so_sp"]];
         }
         return $arr;
     }
     function create(){
        $sql = "INSERT INTO `danh_gia` (`id`, `ngay_them`) VALUES (NULL, CURRENT_TIMESTAMP);";
        $result = $this->executeQuery($sql);
        return $result;
     }
     function detail($id){
         $sql = "SELECT id_dg, count(DISTINCT san_pham) as so_sp, count(DISTINCT nguoi_cham) as so_cg FROM `ct_danh_gia` WHERE id_dg=$id";
         $result = $this->executeQuery($sql);
         $arr1 = [];
         $arr2 = [];
         if($result!=false){
            while($row=$result->fetch_row()){
                $arr1=[$row[1],$row[2]];
            }
            $sql = "select san_pham.id, san_pham.ten_sp,san_pham.hinh_sp,count(DISTINCT ct_danh_gia.nguoi_cham) as so_nguoi_dg
            from san_pham join ct_danh_gia on san_pham.id = ct_danh_gia.san_pham where ct_danh_gia.id_dg=$id GROUP by ct_danh_gia.san_pham";
            $result = $this->executeQuery($sql);
            if($result!=false){
                while($row = $result->fetch_assoc()){
                    $arr2[]= $row;
                }
            }
         }
         return ["info"=>$arr1,"list"=>$arr2];
     }
     function ketQuaSanPham($id_dg,$id_sp){
         $sql = "select user.ho_ten, kq_danh_gia.phan_a, kq_danh_gia.phan_b, kq_danh_gia.phan_c,kq_danh_gia.phan_a+kq_danh_gia.phan_b+kq_danh_gia.phan_c as tong
         from san_pham
         join kq_danh_gia on san_pham.id = kq_danh_gia.san_pham
         join user on user.username = kq_danh_gia.nguoi_cham
         WHERE kq_danh_gia.id_dg = $id_dg and san_pham = '$id_sp'";
         $result = $this->executeQuery($sql);
         $arr=[];
         if($result!=false){
             while($row=$result->fetch_assoc()){
                 $arr[]=$row;
             }
         }
         return $arr;
     }
     function delete($id){
        $sql = " delete from kq_danh_gia where id_dg=$id";
        $result = $this->executeQuery($sql);
        if($result){
            $sql ="delete from ct_danh_gia where id_dg=$id";
            $result = $this->executeQuery($sql);
            if($result){
                $sql = "delete from danh_gia where id=$id";
                $result = $this->executeQuery($sql);
            }
        }
        return $result;
     }
     function update($id){

        $arr = [];
        $sp = $_POST["san_pham"];
        $cg = $_POST["chuyen_gia"];
        for($i=0;$i<count($sp);$i++){
            $arr[] =[
                $sp[$i],
                $cg[$i]
            ];
        }
        // var_dump($arr);

        $sql = " delete from kq_danh_gia where id_dg=$id";
        $result = $this->executeQuery($sql);
        if($result){
            $sql ="delete from ct_danh_gia where id_dg=$id";
            $result = $this->executeQuery($sql);
            if($result){
                for($i=0;$i<count($arr);$i++){
                    $sp = $arr[$i][0];
                    $cg=$arr[$i][1];
                   $sql = "insert ignore into ct_danh_gia(id_dg,san_pham,nguoi_cham) values($id,'$sp','$cg')";
                //    echo $sql."<br>";
                    // echo $this->conn->error;
                    $result=$this->executeQuery($sql); 
                }
            }
        } 
        return $result;
        
     }
 }