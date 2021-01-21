<?php
    $ds_phan_nhom = $params["ds_phan_nhom"];
    $ds_sp=$params["ds_sp"];
    $ds_cg=$params["ds_cg"];
    $ds_sp_dg=$params["ds_sp_dg"];
    $count = 1;
?>
<div class="main-div">
        <div class="back-button">
            <a href="?url=Admin/QuanLyDanhGia">Back</a>
        </div>

        <link rel="stylesheet" href="./themes/trang_quan_ly_danh_gia/css/style.css">
        <!-- mẫu dòng cho danh sách sản phẩm tham gia đánh giá, dùng làm mẫu để copy mỗi khi nhấn nút thêm sản phẩm, phần này sẽ được ẩn đi -->
        <table class="hidden">
            <tr class="table-row hidden">
                <td>
                    <select onchange="getProfessorList(this)" name="" id="">
                        <?php
                            while($row = $ds_phan_nhom->fetch_assoc()){
                        ?>
                            <option value="<?php echo $row["id_phan_nhom"] ?>" <?php echo $count++==1?"selected":"" ?>><?php echo $row["ten_phan_nhom"]?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <select name="san_pham[]" >
                        <?php
                            $count=1;
                         foreach($ds_sp as $row){ ?>
                            <option value="<?php echo $row["id"] ?>" <?php echo $count++==1?"selected":"" ?>><?php echo $row["ten_sp"] ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <select name="chuyen_gia[]">
                        <?php
                         $count=1;
                         foreach($ds_cg as $row){ ?>
                            <option value="<?php echo $row["username"] ?>" <?php echo $count++==1?"selected":"" ?>><?php echo $row["ho_ten"] ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><span onclick="deleteRow(this)">Xóa</span></td>
            </tr>
        </table>
        <!-- Khu vực hiển thị danh sách sản phẩm tham gia đánh giá -->
        <div class="left">
            <button onclick="add_sp()">Thêm sản phẩm</button>
            <div class="title">
                <!-- Form được submit về ?url=Admin/QuanLyDanhGia/Update/{id của đợt đánh giá} -->
                <!-- Back-end giải quyết vấn đề trùng lặp dữ liệu (nhiều record sản phẩm giống nhau được đánh giá bởi cùng một người) -->
                <!-- Update bằng cách xóa hết các record có cùng id đợt đánh giá đi và insert lại dữ liệu post từ form -->
                <form action="?url=Admin/QuanLyDanhGia/Update/<?php echo $params["id_dg"]?>" method="post">
                    <table id="list-sp">
                        <tr>
                            <th>Phân nhóm sản phẩm</th>
                            <th>Sản phẩm</th>
                            <th>Người đánh giá</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </table>
                    <button type="submit" name="save">Lưu lại</button>
                    <!-- <a style="display: block; width: fit-content; text-decoration: none; color: black; border:1px solid gray; background-color: rgb(230, 226, 226); padding:0.2rem 0.3rem; border-radius: 3px; " href="../quan-ly-danh-gia.html">Lưu lại</a> -->
                </form>
            </div>
        </div>
    </div>
    <script src="./themes/trang_quan_ly_danh_gia/js/add_sp.js"></script>