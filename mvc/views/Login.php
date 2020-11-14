<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <form action="?url=Login/process" method="post">
        <input type="text" name="txtUser" placeholder="Nhập username"><br>
        <input type="password" name="txtPass" placeholder="Nhập password" required><br>
        <span style="color:red"><?php echo $params['errMess']?></span><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>