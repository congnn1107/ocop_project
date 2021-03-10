<?php
    $ds = $params["data"];
?>
<style>
    .content table{
          border-collapse: collapse;
     }
     .content > *, .main-div > *{
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
     table a img{
        display: inline-block;
        vertical-align: bottom;
        width: 20px;
        height: 20px;
    }
    td,th{
        padding: 0.2rem 0.5rem;
    }
    .table-header{
        color: white;
        background-color: green;
    }
    #create-button{
        margin: 1rem;
        float: right;
        display: block;
        padding: 2px 5px;
        min-width: 100px;
        border:none;
        background-color: blue;
        opacity: 0.8;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        transition: opacity 0.2s ease;
    }
    #create-button:hover{
        opacity: 0.7;
    }
</style>
<div class="main-div">
        <!-- Link này gửi yêu cầu tạo mới đến url=Admin/QuanLyDanhGia/Create; trong method Create sau khi tạo thành công thì redirect về trang quản lý đánh giá -->
        <a id="create-button" href="?url=Admin/QuanLyDanhGia/Create">Thêm đợt đánh giá</a>
        
        <div class="title">
            <h1>Danh sách đợt đánh giá</h1>
        </div>
        <div class="list-ky">
            <table border="1">
                <tr class="table-header">
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
                    <td><a href="?url=Admin/QuanLyDanhGia/Detail/<?php echo $row["id"]?>"><img src="https://img.icons8.com/nolan/64/view-details.png"/> Xem chi tiết</a></td>
                    <td><a onclick="return confirm('Việc này sẽ xóa những sản phẩm trước đó, bạn có muốn tiếp tục?')" href="?url=Admin/QuanLyDanhGia/Update/<?php echo $row["id"]?>"><img src="https://img.icons8.com/nolan/64/add-property.png"/>Thêm sản phẩm</a></td>

                    <!-- Link này gửi yêu cầu tạo mới đến url=Admin/QuanLyDanhGia/Delete; trong method Delete sau khi xóa thành công thì redirect về trang quản lý đánh giá -->
                    <td><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="?url=Admin/QuanLyDanhGia/Delete/<?php echo $row["id"]?>"><img src="https://img.icons8.com/dusk/64/000000/trash.png"/>Xóa</a></td>
                </tr>
<?php           }    ?>
            </table>
        </div>


    </div>