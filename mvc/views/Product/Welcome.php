<h1>Quản lý Sản phẩm</h1>
<div class="add-san-pham">
    <a href="?url=Admin/CreateSanPham">Thêm Sản Phẩm mới</a>
</div>
<hr>
<h1>Danh sách Sản phẩm</h1>
<style>
    .list-san-pham table{
        border-collapse: collapse;
    }
    .list-san-pham table, .list-san-pham table tr, .list-san-pham table tr > *{
        border-color: lightgray;
    }
    .list-san-pham table td, .list-san-pham table th{
        padding: 0.3rem;
    }
    .list-san-pham table img{
        width: 100px;
        height: 100px;
    }
    h1, .list-san-pham, .add-san-pham{
        margin-left: 0.5rem;
        margin-top: 1rem;
    }
    h1{

        color: tomato;
    }
    .table-header{
        color: white;
        background-color: green;
    }
    .content a {
        text-decoration: none;
        color: blue;
    }
    .content a:visited{
        color: blue;
    }
    .list-san-pham a{
        color: tomato;
    }
    .list-san-pham a:visited{
        color: tomato;
    }

</style>
<!-- Danh sách Sản phẩm -->
<div class="list-san-pham">
<table border="1">
    <tr class="table-header">
        <th>Mã SP</th>
        <th>Hình Sản Phẩm</th>
        <th>Tên Sản Phẩm</th>
        <th>Chủ Thể SX</th>
        <th>Địa chỉ</th>
        <th>Phân Nhóm</th>
        <th colspan="2">Hành động</th>
    </tr>
<?php
    $list = $params["data"];
    if($list->num_rows!=0){
        while($row = $list->fetch_assoc()){
?>
    <tr>
        <td><?php echo $row['id']?></td>
        <td><img src= "<?php echo $row['hinh_sp']?>" alt="hình"> </td>
        <td><?php echo $row['ten_sp']?></td>
        <td><?php echo $row['chu_the_sx']?></td>
        <td><?php echo $row['dia_chi']?></td>
        <td><?php echo $row['phan_nhom']?></td>
        <td><a href="?url=Admin/UpdateSanPham/<?php echo $row['id'] ?>">Cập nhật</a></td>
        <td><a href="?url=Admin/DeleteSanPham/<?php echo $row['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm <?php echo $row['ten_sp']?>')">Xóa</a></td>
    </tr>

<?php
        }
    }
?>
</table>
</div>