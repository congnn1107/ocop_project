<?php
    $ds = $params["data"];
    // var_dump($ds);
?>
<style>
     .content table{
          border-collapse: collapse;
     }
     .content *{
          padding: 0.3rem 0.5rem;
     }
     .content h2{
          text-align: center;
          color: tomato;
     }
</style>
<h2>Danh sách sản phẩm</h2>
<table border="1">
               <tr>
                    <th>Đợt đánh giá</th>
                   <th>Mã sản phẩm</th>
                   <th>Tên sản phẩm</th>
                   <th>Chủ thể</th>
                   <th>Địa chỉ</th>
                   <th>Trạng thái</th>
                   <th>Điểm</th>
                   <th>Hành động</th>
               </tr>
               <?php
                    foreach($ds as $row){
               ?>
               <tr>
                    <td><?php echo $row["id_dg"]?></td>
                   <td><?php echo $row["id_sp"]?></td>
                   <td><?php echo $row["ten_sp"]?></td>
                    <td><?php echo $row["chu_the"]?></td>
                    <td><?php echo $row["dia_chi"]?></td>
                    <td><?php echo $row["status"] == 0?"Chưa đánh giá":"Đã đánh giá"?></td>
                    <td><?php echo $row["diem"]?></td>
                    <td><a onclick= "<?php echo $row["status"] == 1?"return confirm('Đánh giá lại sẽ xóa điểm cũ, bạn muốn tiếp tục?')":"" ?>" href="?url=ChuyenGia/DanhGiaSanPham/<?php echo $row["id_dg"]."/".$row["id_sp"]?>"><?php echo $row["status"] == 0?"Đánh giá":"Đánh giá lại"?></a></td>
               </tr>
               <?php } ?>
           </table>
<?php
     if(isset($_SESSION["err_mess"]) && $_SESSION["err_mess"]!=""){
          $mess = $_SESSION["err_mess"];
          echo "<script> alert('$mess')</script>";
          unset($_SESSION["err_mess"]);
     }
?>