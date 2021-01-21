<?php //var_dump($params['data']);
    $user = $params['data'];
?>
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
.avatar{
    width: 300px;
    height: 300px;
}
.avatar img{
    display: block; 
    width:inherit;
    height: inherit;
}
        .content > a{
            text-decoration: none;
            color: orangered;
            margin: 2rem;
            display: block;
            box-shadow: 1px 1px 2px gray;
            width: fit-content;
            padding: 0.4rem 0.3rem;
        }
        .main-form{
            width: 90%;
            margin: 1rem auto;
            padding: 0.5rem;
            box-shadow: 1px 1px 2px gray , 1px -1px 2px gray;
        }
        .main-form form{
            width: 100%;
            height: 100%;
        }
        .main-form form > div{
            width: 100%;
            margin: 0.5rem 0;
            display: flex;
            align-items: center;
        }
        .main-form form > div > *{
            width: 100%;
        }
        .main-form form > div > span{
            width: 100%;
            flex-shrink: 2;
        }
        .main-form form > .form-button {
            display: block;
            text-align: center;
        }
        .main-form form > .form-button button{
            width: 100px;
            background-color: green;
            color: white;
            border-radius: 3px;
            border: none;
            outline: none;
            padding: 0.3rem;
            box-shadow: 1px 1px 2px gray , 1px -1px 2px gray;
            cursor: pointer;
        }
        .main-form form > .form-btn button:hover{
            background-color: orangered;
        }
        .form-select{
            display: flex;
        }
        .form-select > *{
            margin: 0 1rem;
        }
</style>


<?php
    if($user!=null){
?>
<div class="avatar">
    <img src="<?php echo $user->avatar==""?"./asset/image/upload/default-avatar.jpeg":$user->avatar?>" alt="">
</div>


<div class="main-form">
    <form action="?url=Admin/updateUser/<?php echo $user->username?>" method="POST" enctype="multipart/form-data">

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
            <div class="form-select">
            <div class="option"><span>Nam</span><input type="radio" name="gioi_tinh" value="1" id="" <?php echo $user->gioi_tinh==1?"checked":""?>></div>
            <div class="option"><span>Nữ</span><input type="radio" name="gioi_tinh" value="0" id="" <?php echo $user->gioi_tinh==0?"checked":""?>></div>
            </div>
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
        <div class="form-button">
            <button type="submit" name="save" value="ok">Save</button>
        </div>
    </form>
</div>

<?php
    }
    else{
?>
    <p>Không thấy user này!</p>
<?php }?>