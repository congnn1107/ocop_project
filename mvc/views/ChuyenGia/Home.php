<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $params['page_title'] ?> - OCOP</title>
    <link rel="stylesheet" href="./themes/trang-chuyen-gia/css/style.css">
</head>
<body>
    <div class="container">
        <!-- Khối header -->
        <?php
            include "./mvc/views/ChuyenGia/header.php";
        ?>
        <!-- Khối content -->
        <div class="content">
            <?php

                    $view = $params['view'];
                    include "./mvc/views/$view.php"
            
            ?>
        </div>
        <!-- Khối footer -->
        <?php
            include "./mvc/views/ChuyenGia/footer.php";
        ?>
    </div>
</body>
<script src="./themes/trang-chuyen-gia/js/script.js"></script>
</html>