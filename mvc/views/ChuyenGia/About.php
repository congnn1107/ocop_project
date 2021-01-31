<?php
$user = $_SESSION["user"];
?>
<style>
    .main-div{
        position: relative;
        width: 80%;
        margin: auto;
        padding: 2rem 0;
        margin-top: 1rem;
        display: flex;
        align-items: center;
        box-shadow: 1px 1px 2px 1px gray, 1px -1px 2px 1px gray;
    }
    .main-div > div{
        width: 100%;

    }
    .picture{
        width: 300px;
        height: 300px;
        margin: auto;
        border-radius: 5px;
        overflow: hidden;
    }
    .picture img{
        display: block;
        width: 100%;
        height: 100%;
    }
    .user-info{
        color: gray;
    }
    .line{
        margin: 0.3rem 0;
    }
    .line .value{
        color: tomato;
        font-weight: bold;
    }
    .main-div a{
        position: absolute;
        top: 2px;
        right: 2px;
        text-decoration: none;
        display: block;
        padding: 0.1rem 0.2rem;
        box-shadow: 1px 1px 2px gray , 1px -1px 2px gray;
        color: gray;
    }
    .main-div a:hover{
        color: orangered;
    }
</style>
<div class="main-div">
    <div class="user-avatar">
        <div class="picture">
            <img src="<?php echo $user["avatar"]!=""?$user["avatar"]:"./asset/image/upload/default-avatar.jpeg"; ?>" alt="">
        </div>
    </div>
    <div class="user-info">
        <div class="line"><span class="title">Họ tên: </span><span class="value"><?php echo $user["ho_ten"] ?> </span></div>
        <div class="line"><span class="title">Giới tính: </span><span class="value"><?php echo $user["gioi_tinh"]==1?"Nam":"Nữ" ?></span></div>
        <div class="line"><span class="title">Ngày sinh: </span><span class="value"><?php echo $user["ngay_sinh"] ?></span></div>
        <div class="line"><span class="title">Địa chỉ: </span><span class="value"><?php echo $user["dia_chi"] ?></span></div>
        <div class="line"><span class="title">Email: </span><span class="value"><?php echo $user["email"] ?></span></div>
        <div class="line"><span class="title">SDT: </span><span class="value"><?php echo $user["sdt"] ?></span></div>
    </div>
    <a href="?url=ChuyenGia">&times;</a>
</div>