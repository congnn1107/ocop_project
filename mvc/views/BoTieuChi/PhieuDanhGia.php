    <style>
        .article {
            margin-top: 1rem;
        }
        .content h2{
            text-align:center;
        }
        .content h4{
            margin-left: 1rem;
        }
        .content h5{
            margin-left: 2rem;
        }
        .content div{
            margin-left: 3rem;
        }
        .content #btnOK{
            display: block;
            margin: 2rem auto;
        }
        .content #name {
            color: tomato;
        }
        .content form input{
            margin: 0.3rem 0;
        }
        .content form span{
            color: #220000;
        }
        .content form h5{
            color: #222222;
        }
        .content form h4{
            color: #000022;
        }
        .content form h2{
            color: red;
        }
    </style>
    <div class="article">
    <h3>Bộ sản phẩm: <span id="name"><?php echo $params['name']?></span></h3>
    <form id="form" action="" method="post">
        <?php 
            $phieu = $params['data'];

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
                            echo 'id="">';
                            echo '<span>'.$choice['content'].'('.$choice['score'].' điểm)</span>';
                            echo '</div>';
                        }
                    }
                }
            }
        ?>
        <!-- <button id="btnOK" type="submit">Hoàn Thành</button> -->
    </form>
    <a href="?url=Admin/DanhSachTieuChi">Trở về</a>
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
        // document.getElementById("btnOK").onclick=function(event){
        //     if(enter){
        //         event.preventDefault();
        //         return false;
        //     }
        // }
    </script>