<div class="header">
    <div class="logo">
        <a href="./index.php?url=ChuyenGia"><span>OCOP</span></a>
    </div>
    <div class="nav-bar">
        <!-- Cục profile -->
        <div class="user">
            <p>                    <span id="user-label">Hello <span><?php echo $_SESSION["user"]["username"]?></span></span></p>
            <div class="menu">
                <div class="info">
                    <div class="avatar">
                        <img src="<?php echo $_SESSION["user"]["avatar"]==""?"./asset/image/upload/default-avatar.jpeg":$_SESSION["user"]["avatar"]?>" alt="avatar">
                    </div>
                    <p><?php echo $_SESSION["user"]["ho_ten"]?></p>
                </div>
                <div class="option">
                    <a href="?url=ChuyenGia/about">Xem chi tiết</a>
                    <a href="?url=Validate/logout">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
</div>