<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu đánh giá sản phẩm</title>
    <style>
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
    </style>
</head>
<body>
    <form action="./TestLinhTinh/recieve.php" method="post">
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
                            echo '<input type="radio" name="tieuchi['.$phan['id'].']['.$nhom['id'].']['.$tc['id'].']" value = "'.$choice['id'].'-'.$choice['score'].'" id="">';
                            echo '<span>'.$choice['content'].'('.$choice['score'].' điểm)</span>';
                            echo '</div>';
                        }
                    }
                }
            }
        ?>
        <button type="submit">Hoàn Thành</button>
    </form>

</body>
</html>