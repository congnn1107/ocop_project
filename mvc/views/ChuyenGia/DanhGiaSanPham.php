<style>
        .content{
            margin: 1rem auto;
            display: flex;
            height: calc(100vh - 75px - 50px) ;
            width: 90%;
        }
        .content > div{
            width: 100%;
        }
        .content > .phieu-dg{
            height: 100%;
            overflow: scroll;
            box-shadow: 1px 1px 3px gray;
        }
        .content .tt-sp{
            flex-shrink: 2;
        }
        .line {
            margin: 0.5rem 1rem;
            color: #28282A;
        }
        .line span{
            color: tomato;
        }
        .line a{
            color: violet;
        }
        .article {
            margin-top: 1rem;
        }
        .phieu-dg h2{
            text-align:center;
        }
        .phieu-dg h4{
            margin-left: 1rem;
        }
        .phieu-dg h5{
            margin-left: 2rem;
        }
        .phieu-dg div{
            margin-left: 3rem;
        }
        .phieu-dg #btnOK{
            display: block;
            margin: 2rem auto;
        }
        .phieu-dg #name {
            color: tomato;
        }
        .phieu-dg form input{
            margin: 0.3rem 0;
        }
        .phieu-dg form span{
            color: #220000;
        }
        .phieu-dg form h5{
            color: #222222;
        }
        .phieu-dg form h4{
            color: #000022;
        }
        .phieu-dg form h2{
            color: red;
        }
</style>

<?php
    $san_pham = $params["san_pham"];
    // var_dump($san_pham);
?>
<div class="tt-sp">
    <div class="line">
        <p>Ảnh sản phẩm:</p>
        <div class="picture">
            <img src="<?php echo $san_pham["hinh"]?>" alt="Ảnh sản phẩm">
        </div>
    </div>
    <div class="line">
        Tên sản phẩm: <span><?php echo $san_pham["ten"] ?></span>
    </div>
    <div class="line">Mã sản phẩm:<span><?php echo $san_pham["id"] ?></span></div>
    <div class="line">Chủ thể: <span><?php echo $san_pham["chu_the"] ?></span></div>
    <div class="line">Địa chỉ: <span><?php echo $san_pham["dia_chi"] ?></span></div>
    <div class="line">Phân nhóm sản phẩm: <span><?php echo $san_pham["ten_phan_nhom"] ?></span> </div>
    <div class="line">Nhóm sản phẩm: <span><?php echo $san_pham["nhom"] ?></span> </div>
    <div class="line">Ngành sản phẩm: <span><?php echo $san_pham["nganh"] ?></span> </div>
    <div class="line">Bộ chủ trì quản lý <span><?php echo $san_pham["bo"] ?></span></div>
    <div class="line"><a href="<?php echo $san_pham["ho_so"] ?>" target="_blank">Xem hồ sơ sản phẩm</a></div>
</div>
<div class="phieu-dg">
    <h3 class="title">Phiếu Đánh Giá</h3>

    <div class="article">
        <form id="form" action="?url=ChuyenGia/LuuDiem/<?php echo $params["id_dg"]."/".$san_pham["id"] ?>" method="post">
            <?php 
                $phieu = $params['phieu'];

                //print_r($phieu);
                foreach($phieu as $phan){
                    echo '<h2>'.$phan['content'].'</h2>';
                    $nhomTC = $phan['children'];
                    foreach($nhomTC as $nhom){
                        echo '<h4>'.$nhom['content'].'</h4>';
                        $cacTC = $nhom['children'];
                        foreach($cacTC as $tc){
                            echo "<h5>".$tc['content']."</h5>";
                            $choices = $tc['choices'];
                            foreach($choices as $choice){
                                echo '<div>';
                                echo '<input type="radio" name="tieuchi['.$phan['id'].']['.$nhom['id'].']['.$tc['id'].']" value = "'.$choice['id'].'-'.$choice['score'].'"';
                                // echo $choice['id']==1?"checked ":"";
                                echo 'id="" required>';
                                echo '<span>'.$choice['content'].'('.$choice['score'].' điểm)</span>';
                                echo '</div>';
                            }
                        }
                    }
                }
            ?>
            <button id="btnOK" name="done" type="submit">Hoàn Thành</button>
        </form>

    </div>
</div>
<script>
    var enter = false;
    document.getElementById("form").onkeydown= function(event){
        if(event.key=="Enter"){
            enter = true;
        }
    }
    document.getElementById("form").onkeyup= function(event){
        if(event.key=="Enter"){
            enter = false;
        }
    }
    document.getElementById("btnOK").onclick=function(event){
        if(enter){
            event.preventDefault();
            return false;
        }
    }
</script>