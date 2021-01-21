<?php
    $ds = $params["data"];
?>
<style>
    .content table{
          border-collapse: collapse;
     }
     .content *{
          padding: 0.3rem 0.5rem;
     }
     .content h1{
          text-align: center;
          color: tomato;
     }
     .content .main-div a{
         text-decoration: none;
         color: blue;
     }

</style>
<div class="main-div">
        <!-- Link này gửi yêu cầu tạo mới đến url=Admin/QuanLyDanhGia/Create; trong method Create sau khi tạo thành công thì redirect về trang quản lý đánh giá -->
        <a style="display: block; width: fit-content; text-decoration: none; color: black; border:1px solid gray; background-color: rgb(230, 226, 226); padding:0.2rem 0.3rem; border-radius: 3px; " href="?url=Admin/QuanLyDanhGia/Create">Thêm đợt đánh giá</a>
        
        <div class="title">
            <h1>Danh sách đợt đánh giá</h1>
        </div>
        <div class="list-ky">
            <table border="1">
                <tr>
                    <th>Mã Đợt</th>
                    <th>Số sản phẩm</th>
                    
                    <th>Ngày thêm</th>
                    <th colspan="3">Tùy chọn</th>
                </tr>
<?php           foreach($ds as $row){  ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["so_sp"] ?></td>
                    <td><?php echo $row["ngay_them"] ?></td>
                    <td><a href="?url=Admin/QuanLyDanhGia/Detail/<?php echo $row["id"]?>">Xem chi tiết</a></td>
                    <td><a onclick="return confirm('Việc này sẽ xóa những sản phẩm trước đó, bạn có muốn tiếp tục?')" href="?url=Admin/QuanLyDanhGia/Update/<?php echo $row["id"]?>">Thêm sản phẩm</a></td>

                    <!-- Link này gửi yêu cầu tạo mới đến url=Admin/QuanLyDanhGia/Delete; trong method Delete sau khi xóa thành công thì redirect về trang quản lý đánh giá -->
                    <td><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="?url=Admin/QuanLyDanhGia/Delete/<?php echo $row["id"]?>">Xóa</a></td>
                </tr>
<?php           }    ?>
            </table>
        </div>


    </div>