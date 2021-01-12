<style>
   table{
       width: 90%;
       border-collapse: collapse;
       margin: 1rem auto;
   }
   td,th{
       padding: 0.2rem 2rem;
       list-style: none;
   }
   td:last-child{
       text-align: center;
   }
   table a{
       text-decoration: none;
   }
   table a:visited{
       color: blue;
   }
</style>
<table border="1">
    <tr >
        <th>Tên phân nhóm</th>
        <th>Hành động</th>
    </tr>
    <?php while($row = $params['data']->fetch_assoc()){?>
    <tr>
        <td><?php echo $row['ten_phan_nhom'] ;?></td>
        <td><a href="?url=Admin/ChiTietTieuChi/<?php echo $row['id_phan_nhom']?>">Xem</a></li></td>
    </tr>
    <?php }?>
</table>