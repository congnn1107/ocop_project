<?php
    $ds_pnhom = $params["data"];
?>
<a href="?url=Admin/QuanLySanPham">Back</a>
<div class="main-form">
    <form action="?url=Admin/CreateSanPham" method="post" enctype="multipart/form-data">
        <div class="form-control">
            <label for="">Mã sản phẩm: </label>
            <input type="text" name="id" required>
        </div>
        <div class="form-control">
            <label for="">Tên sản phẩm: </label>
            <input type="text" name="ten_sp" required>
        </div>
        <div class="form-control">
            <label for="">Tên chủ thể sx: </label>
            <input type="text" name="chu_the_sx" required>
        </div>
        
        <div class="form-control">
            <label for="">Địa chỉ: </label>
            <input type="text" name="dia_chi" required>
        </div>
        <div class="form-control">
            <label for="">Hình sản phẩm: </label>
            <input type="file" name="picture-file" accept="image/*">
        </div>
        <div class="form-control">
            <label for="">Link hồ sơ: </label>
            <input type="text" name="link_ho_so">
        </div>
        <div class="form-control">
            <label for="">Phân nhóm sp: </label>
            <select name="phan_nhom" id="">
               <?php
                    while($row = $ds_pnhom->fetch_assoc()){
               ?>
                <option value="<?php echo $row["id_phan_nhom"] ?>"><?php echo $row["ten_phan_nhom"]?></option>
               <?php } ?>
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
