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
   .main-div{
       padding: 1rem;
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
   #back-button{
        margin: 1rem;
        display: block;
        padding: 2px 5px;
        width: fit-content;
        border:none;
        background-color: blue;
        opacity: 0.8;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        transition: opacity 0.2s ease;
        text-decoration: none;
    }
    #back-button:hover{
        opacity: 0.7;
    }
</style>
<div class="main-div">
        <div class="link">
        <a id="back-button" href="?url=Admin/DanhSachTieuChi">Trở về</a>
        </div>
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
</div>