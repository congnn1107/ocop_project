<h1>Quản lý User</h1>
<div class="add-user">
    <a href="?url=Admin/CreateUser">Thêm User</a>
</div>
<hr>
<h1>Danh sách User</h1>
<style>
    .list-user table{
        border-collapse: collapse;
    }
    .list-user table, .list-user table tr, .list-user table tr > *{
        border-color: lightgray;
    }
    .list-user table td, .list-user table th{
        padding: 0.3rem;
    }
    .list-user table img{
        width: 100px;
        height: 100px;
    }
    h1, .list-user, .add-user{
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
    .list-user a{
        color: tomato;
    }
    .list-user a:visited{
        color: tomato;
    }

</style>
<!-- Danh sách User -->
<div class="list-user">
<table border="1">
    <tr class="table-header">
        <th>ID</th>
        <th>Avatar</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Ngày thêm</th>
        <th>Vị trí</th>
        <th colspan="2">Hành động</th>
    </tr>
<?php
    $list = $params["data"];
    if($list->num_rows!=0){
        while($row = $list->fetch_assoc()){
?>
    <tr>
        <td><?php echo $row['username']?></td>
        <td><img src= "<?php echo $row['avatar']==""?'./asset/image/upload/default-avatar.jpeg':$row['avatar']?>" alt="avatar"> </td>
        <td><?php echo $row['ho_ten']?></td>
        <td><?php echo $row['gioi_tinh']>0?"Nam":"Nữ"?></td>
        <td><?php echo $row['ngay_them']?></td>
        <td><?php echo $row['role']?></td>
        <td><a href="?url=Admin/ChiTietUser/<?php echo $row['username'] ?>">Xem chi tiết</a></td>
        <td>
            <?php if($row["username"]!=$_SESSION["user"]["username"]){?>
            <a href="?url=Admin/XoaUser/<?php echo $row['username'] ?>" onclick="return confirm('Bạn có chắc muốn xóa user <?php echo $row['ho_ten']?>')">Xóa</a>
            <?php } ?>
        </td>
    </tr>

<?php
        }
    }
?>
</table>
</div>