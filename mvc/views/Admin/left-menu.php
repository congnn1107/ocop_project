<aside>
        <div class="info">
            <div class="avt">
                <img src="<?php echo $_SESSION['user']['avatar']==""?"./asset/image/upload/default-avatar.jpeg":$_SESSION['user']['avatar'];?>" title="avatar" alt="avt" srcset="">
            </div>
            <a href="?url=Admin"><?php echo $_SESSION['user']['username'];?></a>
        </div>
        <div class="nav">
            <div class="title">
                <span>Menu chính</span>
            </div>
            <hr>
            <div class="nav-items">
                <div class="nav-item">
                    <span>Quản lý</span>
                    <div class="nav-sub-items">
                        <a href="?url=Admin/QuanLyUser">Quản lý Users</a>
                        <!-- <div class="nav-sub-item">Quản lý</div> -->
                    </div>
                    <div class="nav-sub-items">
                        <a href="?url=Admin/QuanLyChuyenGia">Quản lý Chuyên Gia</a>
                        <!-- <div class="nav-sub-item">Quản lý</div> -->
                    </div>
                    <div class="nav-sub-items">
                        <a href="?url=Admin/QuanLySanPham">Quản lý về sản phẩm</a>
                        <!-- <div class="nav-sub-item"></div> -->
                    </div>
                    <div class="nav-sub-items">
                        <a href="?url=Admin/QuanLyTieuChi">Quản lý bộ tiêu chí</a>
                        <!-- <div class="nav-sub-item"></div> -->
                    </div>
                    <div class="nav-sub-items">
                        <a href="?url=Admin/QuanLyDanhGia">Quản lý Đánh Giá</a>
                        <!-- <div class="nav-sub-item"></div> -->
                    </div>
                </div>
                <!-- <div class="nav-item">
                    <p>Thống kê</p>
                    <div class="nav-sub-items">
                        <a href="">Thống kê điểm</a>
                        <div class="nav-sub-item"></div>
                    </div>
                </div> -->
            </div>

        </div>
</aside>