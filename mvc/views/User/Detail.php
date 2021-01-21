<style>
.content .avatar{
    width: 200px;
    height: 200px;
    margin: auto
}
.content .avatar img{
    display: block;
    width: inherit;
    height: inherit;
}
.main-div{
    width: 60%;
    margin: auto;
    box-shadow: 1px 1px 2px gray , 1px -1px 2px gray;
    padding: 1rem;

}
.content > a, .main-div > a{
        text-decoration: none;
        color: orangered;
        margin: 0.5rem 2rem;
        display: block;
        box-shadow: 1px 1px 2px gray;
        width: fit-content;
        padding: 0.4rem 0.3rem;
}
.main-div > a{
    margin: auto;
    background-color: green;
    color: white;
    border-radius: 3px;
}
.main-div > a:hover{
    background-color: orange;
}
.line{
    display: flex;
    align-items: center;
    margin: 0.5rem 0;
}
.line > span{
    width: 100%;
}
.line .title{
    flex-shrink: 2;
    color: gray;
}
.line .value{
    color: orangered;
}

</style>
<!-- Nút back -->
<a href="?url=Admin/QuanLyUser">Back</a>
<!-- Hiển thị nội dung -->
<?php
    $user = $params['data'];
    // var_dump($user);
?>
<?php
if($user!=null){?>
<div class="main-div">
<div class="avatar">
    <img src="<?php echo $user->avatar==""?"./asset/image/upload/default-avatar.jpeg":$user->avatar?>" alt="">
</div>

<div class="info">
    <div class="line"><span class="title">Họ tên: </span><span class="value"><?php echo $user->ho_ten ?></span></div>
    <div class="line"><span class="title">Giới tính: </span><span class="value"><?php echo $user->gioi_tinh==1?"Nam":"Nữ" ?></span></div>
    <div class="line"><span class="title">Ngày sinh: </span><span class="value"><?php echo $user->ngay_sinh ?></span></div>
    <div class="line"><span class="title">Địa chỉ: </span><span class="value"><?php echo $user->dia_chi ?></span></div>
    <div class="line"><span class="title">SDT: </span><span class="value"><a href="tel:<?php echo $user->sdt?>"> <?php echo $user->sdt ?></a></span></div>
    <div class="line"><span class="title">Email: </span><span class="value"><a href="mailto:<?php echo $user->email?>"><?php echo $user->email?></a></span></div>
    <div class="line"><span class="title">Vị trí: </span><span class="value"><?php echo $user->role==1?"Admin":"Chuyên gia"?></span></div>
    <div class="line"><span class="title">Trạng thái: </span><span class="value"><?php echo $user->user_status==1?"Active":"Inactive" ?></span></div>
    <div class="line"><span class="title">Ngày thêm: </span><span class="value"><?php echo $user->ngay_them ?></span></div>
    <div class="line"><span class="title">Lần đăng nhập cuối: </span><span class="value"><?php echo $user->last_login ?></span></div>

</div>
<a href="?url=Admin/updateUser/<?php echo $user->username ?>">Cập nhật</a>
</div>
<?php
}else{?>
    <p>Không tìm thấy User này</p>
<?php    
}

?>