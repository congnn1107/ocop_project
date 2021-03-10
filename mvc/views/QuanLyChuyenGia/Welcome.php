<?php
    $cg_list=$params["ds_chuyen_gia"];
    $pn_list=$params["ds_phan_nhom"];
    // var_dump($cg_list);
    // var_dump($pn_list);
?>
<style>
    .content table{
          border-collapse: collapse;
     }
     .content *{
          padding: 0.3rem 0.5rem;
     }
     .content h1{
          text-align: center;
          color: tomato;
     }
     .content select{
         border: none;
         background-color: white;
         outline-color: green;
         width: 100%;
     }
     .form-btn{
         text-align: center;
     }
     .table-header{
        color: white;
        background-color: green;
    }
</style>
<h1>
    Danh Sách chuyên Gia
</h1>
<form action="" method="post">
    <table border="1">
        <tr class="table-header">
            <th>Chuyên gia</th>
            <th>Phân nhóm</th>
        </tr>
<?php
    $count=-1;
    while($row = $cg_list->fetch_assoc()){
        $count++;
?>
    <tr>
        <input type="hidden" name="cg[<?php echo $count?>][]" value="<?php echo $row["username"]?>">
        <td><?php echo $row["ho_ten"] ?></td>
        <td>
            <select name="cg[<?php echo $count?>][]" id="">
                <?php foreach($pn_list as $row2){ ?>
                    <option value="<?php echo $row2["id_phan_nhom"]?>" <?php echo $row["phan_nhom"]==$row2["id_phan_nhom"]?"selected":"" ?> ><?php echo $row2["ten_phan_nhom"]?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
<?php
    }
?>
    </table>
    <div class="form-btn">
        <button type="submit" name="save">Lưu lại</button>
    </div>
</form>
<div class="info">
    <p><?php echo $params["message"]?></p>
</div>
