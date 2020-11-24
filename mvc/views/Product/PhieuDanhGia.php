<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu đánh giá sản phẩm</title>
    <style>
        body{
            margin: 0 auto;
            width: 70%;
        }
        h2{
            text-align:center;
        }
        h4{
            margin-left: 1rem;
        }
        h5{
            margin-left: 2rem;
        }
        div{
            margin-left: 3rem;
        }
        form button{
            display: block;
            margin: 2rem auto;
        }
        #name {
            color: tomato;
        }
    </style>
</head>
<body>
    <h3>Bộ sản phẩm: <span id="name"><?php echo $params['name']?></span></h3>
    <form id="form" action="./TestLinhTinh/recieve.php" method="post">
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
        <button id="btnOK" type="submit">Hoàn Thành</button>
    </form>
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

</body>
</html>