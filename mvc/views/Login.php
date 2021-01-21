
<?php
    // var_dump($_COOKIE["remember-pass"]);
    //Xử lý cookie
    if(isset($_COOKIE["remember-pass"]) && $_COOKIE["remember-pass"]=="true"){
        $checked = true;
    }else{
        $checked = false;
    }
    // var_dump($_COOKIE);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - OCOP</title>
    <link rel="stylesheet" href="themes/login/css/login-style.css">
</head>
<body>
    <div class="background">
            
    </div>
    <div class="container">
        <div class="box">
            <a title="Về trang chủ" href="./index.php"><span>&times;</span></a>
            <form action="?url=Validate/login" method="post">
                <div class="form-control">
                    <label for="#txtUser">Tài khoản: </label><input name="txtUser" id="txtUser" type="text" value="<?php echo $checked?$_COOKIE["user"]:"" ?>" autocomplete="off" required>
                </div>
                <div class="form-control">
                    <label for="#txtPass">Mật khẩu: </label><input name="txtPass" id="txtPass" value="<?php echo $checked?$_COOKIE["pass"]:"" ?>" type="password"" required>
                </div>
                <p id="error-message"><?php echo $params['errMess']?></p>
                <div class="form-check"><input type="checkbox" name="remember" id="remember" <?php  echo $checked?"checked":"" ?>><span>Nhớ mật khẩu?</span></div>
                <div class="form-btn"><button name="login" type="submit">Đăng nhập</button></div>
                <a href="">Quên mật khẩu?</a>
            </form>
        </div>
    </div>
</body>

</html>