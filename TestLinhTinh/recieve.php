<?php
    echo var_dump($_POST)."<hr>";
    $kq = $_POST['tieuchi'];

    //tính điểm cho 3 phần
    $total =[];
    foreach($kq as $i){
        $sum_i = 0;
        foreach($i as $j){
            foreach($j as $k){
                echo $k[2]."\t";
                $sum_i+= $k[2];
            }
        }
        $total[] = $sum_i;    
    }
    echo "<hr>";
    //in điểm 3 phần và in tổng điểm
    for($i =0;$i<count($total);$i++){
        echo "<br>Tổng điểm phần ".($i+1).": $total[$i]<br>";
    }
    echo "<hr>Total: ".array_sum($total);