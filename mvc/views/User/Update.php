<?php //var_dump($params['data']);
    $user = $params['data'];
?>
<style>
.avatar{
    width: 300px;
    height: 300px;
}
.avatar img{
    display: block; 
    width:inherit;
    height: inherit;
}
</style>


<?php
    if($user!=null){
?>
<div class="avatar">
    <img src="<?php echo $user->avatar==""?"./asset/image/upload/default-avatar.jpeg":$user->avatar?>" alt="">
</div>
<form action="?url=Admin/updateUser/<?php echo $user->username?>" method="POST" enctype="multipart/form-data" class="main-form">

<div class="form-button">
    <div class="form-label">
        <span>Username:</span><span><?php echo $user->username?></span>
    </div>
    <div class="form-control"><span>Mật khẩu: </span><input name="password" type="password" value="<?php echo $user->password?>" required></div>
    <div class="form-control"><span>Họ tên: </span><input name="ho_ten" type="text" value="<?php echo $user->ho_ten?>" required></div>
    <div class="form-control"><span>Ngày sinh:</span><input name="ngay_sinh" type="date" value="<?php echo $user->ngay_sinh?>" required></div>
    <div class="form-control"><span>Địa chỉ:</span><input name="dia_chi" type="text" value="<?php echo $user->dia_chi?>" required></div>
    <div class="form-control"><span>Email:</span><input type="text" name="email" value="<?php echo $user->email?>" required></div>
    <div class="form-control"><span>SDT:</span><input type="text" name ="sdt" value="<?php echo $user->sdt ?>" required></div>
    <div class="form-control"><span>Avatar:</span><input name="avatar-file" type="file"></div>
    <div class="form-control">
        <span>Giới tính:</span>
        <div class="option"><span>Nam</span><input type="radio" name="gioi_tinh" value="1" id="" <?php echo $user->gioi_tinh==1?"checked":""?>></div>
        <div class="option"><span>Nữ</span><input type="radio" name="gioi_tinh" value="0" id="" <?php echo $user->gioi_tinh==0?"checked":""?>></div>
    </div>
    <div class="form-control">
        <span>Vai trò :</span>
        <select name="role" id="">
            <option value="1" <?php echo $user->role==1?"selected":""?>>Admin</option>
            <option value="2" <?php echo $user->role==2?"selected":""?>>Chuyên Gia</option>
        </select>
    </div>
    <div class="form-control">
        <span>Trạng thái: </span>
        <select name="user_status" id="">
            <option value="0" <?php echo $user->user_status==0?"selected":""?>>Ngừng hoạt động</option>
            <option value="1" <?php echo $user->user_status==1?"selected":""?>>Hoạt động</option>
        </select>
    </div>

    <button type="submit" name="save" value="ok">Save</button>
</div>
</form>
<?php
    }
    else{
?>
    <p>Không thấy user này!</p>
<?php }?>