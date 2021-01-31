<?php
    $sp = $params["sp"];
    $dspn = $params["dspn"];
    // var_dump($sp);
?>
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

<a href="?url=Admin/QuanLySanPham">Back</a>
<?php if($sp!=null){ ?>
<div class="main-form">
    <form action="?url=Admin/UpdateSanPham/<?php echo $sp->id ?>" method="post" enctype="multipart/form-data">
        <div class="form-control">
            <label for="">Mã sản phẩm: <?php echo $sp->id?></label>
        </div>
        <div class="form-control">
            <label for="">Tên sản phẩm: </label>
            <input type="text" name="ten_sp" value="<?php echo $sp->ten_sp ?>" required>
        </div>
        <div class="form-control">
            <label for="">Tên chủ thể sx: </label>
            <input type="text" name="chu_the_sx" value="<?php echo $sp->chu_the_sx ?>"  required>
        </div>
        
        <div class="form-control">
            <label for="">Địa chỉ: </label>
            <input type="text" name="dia_chi" value="<?php echo $sp->dia_chi ?>" required>
        </div>
        <div class="form-control">
            <label for="">Hình sản phẩm: </label>
            <input type="file" name="picture-file" accept="image/*">
        </div>
        <div class="form-control">
            <label for="">Link hồ sơ: </label>
            <input type="text" name="link_ho_so"value="<?php echo $sp->link_ho_so ?>" >
        </div>
        <div class="form-control">
            <label for="">Phân nhóm sp: </label>
            <select name="phan_nhom" id="">
               <?php
                    while($row = $dspn->fetch_assoc()){
               ?>
                <option value="<?php echo $row["id_phan_nhom"] ?>" <?php echo $row["id_phan_nhom"]==$sp->phan_nhom?"selected":""?>><?php echo $row["ten_phan_nhom"]?></option>
               <?php } ?>
            </select>
        </div>

        <div class="form-btn">
            <button type="submit" id="btn-ok" name="save">Lưu</button>
        </div>
    </form>
</div>
<div class="message">
    <p style="color:red"><?php echo $params["message"]?></p>
</div>
<?php
}else{

?>
    <h2 style="color: red;text-align:center"> Không tìm thấy sản phẩm này!</h2>
<?php } ?>