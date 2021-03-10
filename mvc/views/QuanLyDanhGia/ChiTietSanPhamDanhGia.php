<?php
    $list = $params["list"];
    $info = $params["info"];
    // var_dump($info);
    $id_dg = $params["id_dg"];
    // echo "<pre>";
    // var_dump([$id_dg,$info,$list]);
    // echo "</pre>";
?>
<link rel="stylesheet" href="./themes/trang_quan_ly_danh_gia/css/chi-tiet-sp-dg.css">
<div class="main-div">
        <h2 class="title">Kết quả đánh giá sản phẩm <?php echo $info["id"]?></h2>
        <a class="back-button" href="javascript: history.back()">&LeftTriangle; Back</a>
        <div class="info">
            <div class="line"><span>Đợt đánh giá:</span><span class="value"><?php echo $id_dg ?></span></div>
            <div class="line"><span>Mã sản phẩm:</span><span class="value"><?php echo $info["id"] ?></span></div>
            <div class="line"><span>Tên sản phẩm:</span><span class="value"><?php echo $info["ten"] ?></span></div>
            <div class="line"><span>Phân nhóm:</span><span class="value"><?php echo $info["ten_phan_nhom"] ?></span></div>
            <div class="line"><span>Nhóm:</span><span class="value"><?php echo $info["nhom"] ?></span></div>
            <div class="line"><span>Ngành:</span><span class="value"><?php echo $info["nganh"] ?></span></div>
            <div class="line"><span>Bộ chủ trì quản lý: </span><span class="value"><?php echo $info["bo"] ?></span></div>
            <div class="line"><span>Chủ thể sản xuất:</span><span class="value"><?php echo $info["chu_the"] ?></span></div>
            <div class="line"><span>Địa chỉ: </span><span class="value"><?php echo $info["dia_chi"] ?></span></div>
        </div>
        <div class="list-kq">
            <h2>Kết quả: </h2>
            <table border="1">
                <tr>
                    <th>Người Đánh giá</th>
                    <th>Phần A</th>
                    <th>Phần B</th>
                    <th>Phần C</th>
                    <th>Tổng điểm</th>
                </tr>
                <?php
                    $tong=0;
                    $status=$params["status"];
                    foreach($list as $item){
                ?>
                <tr>
                    <td><?php echo $item["ho_ten"] ?></td>
                    <td><?php echo $item["phan_a"] ?></td>
                    <td><?php echo $item["phan_b"] ?></td>
                    <td><?php echo $item["phan_c"] ?></td>
                    <td><?php echo $item["tong"] ?></td>
                </tr>
                <?php
                        if($item["tong"]!=""){
                            $tong+=$item["tong"];
                        }

                    }

                    if(!$status){
                        $diem_tb = "Chưa có";
                    }else{
                        $diem_tb = $tong/count($list);
                        $sao = round($diem_tb/20);
                        // echo $sao;
                    }

                ?>
            </table>
            <div class="line"><span>Điểm trung bình: </span><span class="value"><?php echo $diem_tb ?></span></div>
                <div class="line"><span>Xếp hạng: </span>
                <span class="value">
                    <?php
                        for($i=1;$i<=5;$i++) echo $i<=$sao?'<span class="star solid">&starf;</span>':'<span class="star">&star;</span>';

                    ?>
                </span>
            </div>
        </div>
    </div>