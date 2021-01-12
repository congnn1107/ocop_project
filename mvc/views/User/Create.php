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
    <p style="color:red"><?php echo $params["message"]?></p>
</div>
<script src="./public/create-user/validate-username.js"></script>
