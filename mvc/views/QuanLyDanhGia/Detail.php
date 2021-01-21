<?php
    $info = $params["data"]["info"];
    $list = $params["data"]["list"];
?>
<link rel="stylesheet" href="./themes/trang_quan_ly_danh_gia/css/chi-tiet-sp-dg.css">
<link rel="stylesheet" href="./themes/trang_quan_ly_danh_gia/css/chi-tiet-dot.css">
<div class="main-div">
        <h2 class="title">Danh sách các sản phẩm trong đợt đánh giá <?php echo $params["id_dg"] ?></h2>
        <a href="javascript: history.back()" class="back-button">&LeftTriangle; Back</a>
        <div class="info">
            <div class="line">
                <span>Đợt đánh giá:</span><span class="value"><?php echo $params["id_dg"]?></span>
            </div>
            <div class="line"><span>Số sản phẩm:</span><span class="value"><?php echo $info[0]?></span></div>
            <div class="line"><span>Số chuyên gia:</span><span class="value"><?php echo $info[1]?></span></div>
        </div>
        <div class="list">
            <h1>Danh sách sản phẩm</h1>
            <table border="1">
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số người đánh giá</th>
                    <th>Tùy chọn</th>
                </tr>

                <?php 
                    foreach($list as $row){
                ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><img src="<?php echo $row["hinh_sp"] ?>" alt="ảnh"></td>
                    <td><?php echo $row["ten_sp"] ?></td>
                    <td><?php echo $row["so_nguoi_dg"] ?></td>
                    <td><a href="?url=Admin/ChiTietSanPhamDanhGia/<?php echo $params["id_dg"].'/'.$row['id'] ?>">Xem chi tiết</a></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
</div>