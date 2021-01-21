<style>
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
        margin: auto;
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
    .main-form form > div > label{
        width: 100%;
        flex-shrink: 2;
    }
    .main-form form > .form-btn {
        display: block;
        text-align: center;
    }
    .main-form form > .form-btn button{
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
    .form-control #info{
       text-align: center;
    }
</style>
<a href="?url=Admin/QuanLyUser">Back</a>
<div class="main-form">
    <form action="?url=Admin/CreateUser" method="post" enctype="multipart/form-data">
        <div class="form-control">
            <label for="">Họ tên: </label>
            <input type="text" name="ho_ten" required>
        </div>
        <div class="form-control">
            <label for="">Giới Tính: </label>
            <div class="group">
                <div class="choice">
                    <input type="radio" name="gioi_tinh" id="" value="1" checked>
                    <span>Nam</span>
                </div>
                <div class="choice">
                    <input type="radio" name="gioi_tinh" value="0" id="">
                    <span>Nữ</span>
                </div>
            </div>
        </div>
        <div class="form-control">
            <label for="">Ngày sinh: </label>
            <input type="date" name="ngay_sinh" required>
        </div>
        <div class="form-control">
            <label for="">Địa chỉ: </label>
            <input type="text" name="dia_chi" required>
        </div>
        <div class="form-control">
            <label for="">SDT: </label>
            <input type="text" name="sdt" required>
        </div>
        <div class="form-control">
            <label for="">Email: </label>
            <input type="text" name="email" required>
        </div>
        <div class="form-control">
            <label for="">Hình đại diện: </label>
            <input type="file" name="avatar-file" accept="image/*">
        </div>
        <div class="form-control">
            <label for="">Username: </label>
            <input type="text" id="username" name="username" minlength="5" maxlength="32" required>
        </div>
        <div class="form-control">
            <span id="info"></span>
        </div>
        <div class="form-control">
            <label for="">Mật khẩu: </label>
            <input type="password" name="password" required>
        </div>
        <div class="form-control">
            <label for="">Vai trò: </label>
            <select name="role" id="">
                <option value="1">Admin</option>
                <option value="2">Chuyên gia</option>
            </select>
        </div>

        <div class="form-btn">
            <button type="submit" id="btn-ok" name="create">OK</button>
        </div>
    </form>
</div>
<div class="message">
    <p style="color:red;"><?php echo $params["message"]?></p>
</div>
<script src="./themes/create-user/validate-username.js"></script>
