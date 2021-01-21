<style>
        .main-div{
            height: 400px;
        }
        .main-div a{
            text-decoration: none;
            color: white;
            display: block;
            width: 30%;
            height: 60%;
            margin: 0.3rem;
            box-shadow: 1px 1px 2px gray;
            display: flex;
            align-items: center;
            border-radius: 15px;
            transition: all ease-in-out 0.3s;
        }
        .main-div a:hover span{
            font-size: 25px;
            transform: rotateZ(-10deg);
        }
        .main-div a:hover{
            box-shadow: 3px 5px 5px gray;
        }
        .main-div a span{
            display: block;
            text-align: center;
            width: 100%;
            font-weight: bolder;
            transition: all ease-in-out 0.3s;
        }
        .main-div .row{
            display: flex;
            width: 100%;
            height: 40%;
        }
        .green{
            background-color: rgba(30, 214, 30, 0.748);
        }
        .red{
            background-color: rgba(255, 0, 0, 0.734);
        }
        .violet{
            background-color: rgba(211, 77, 211, 0.823);
        }
        .yellow{
            background-color: rgba(232, 196, 53, 0.912);
        }
        .blue{
            background-color: rgba(28, 133, 232, 0.837);
        }
    </style>
    <div class="main-div">
        <div class="row">
            <a href="?url=Admin/QuanLyUser" class="col green"><span>Quản lý User</span></a>
            <a href="?url=Admin/QuanLyChuyenGia" class="col red"><span>Quản lý Chuyên gia</span></a>
            <a href="?url=Admin/QuanLySanPham" class="col violet"><span>Quản lý Sản Phẩm</span></a>
        </div>
        <div class="row">
            <a href="?url=Admin/QuanLyTieuChi" class="col yellow"><span>Quản lý Bộ Tiêu Chí</span></a>
            <a href="?url=Admin/QuanLyDanhGia" class="col blue"><span>Quản lý Đánh giá</span></a>
        </div>
    </div>