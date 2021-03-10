<style>
    .form {
        width: fit-content;
        box-shadow: 1px 1px 5px gray, -1px 1px 5px gray;
        padding: 1rem 2rem;
        margin: 1rem auto;
        color: gray;
    }
    .form>*{
        margin: 1rem 0;
    }
    .links a{
        text-decoration: none;
        padding: 5px;
        color: green;
    }
    form button{
        margin: 1rem 0;
        display: inline-block;
        padding: 2px 5px;
        min-width: 100px;
        border:none;
        background-color: blue;
        opacity: 0.8;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        transition: opacity 0.2s ease;
    }
    form button:hover{
        opacity: 0.7;
    }
</style>

<div class="form"> 
    <p class='message'><?php
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?></p>
    <form action="?url=BoTieuChi/Update" enctype="multipart/form-data" method="post">
        <div class="form-control">
            <span>Chọn file Excel: </span>
            <input type="file" name="file-upload" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required id="">
        </div>
        <div class="form-button">
            <button title="Upload excel file..." type="submit">OK</button>
        </div>
    </form>
    <div class="links">
    <a title="Xem danh sách bộ tiêu chí" href="?url=Admin/DanhSachTieuChi">Xem danh sách bộ tiêu chí</a>
    </div>
</div>

