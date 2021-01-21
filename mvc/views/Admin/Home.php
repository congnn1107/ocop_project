<?php include "./mvc/views/Admin/head.php"?>
<body>
    <?php include "./mvc/views/Admin/left-menu.php"?>
    <!-- Main Block -->
    <div class="wrapper">
        <?php include "./mvc/views/Admin/top-bar.php"?>
        <!-- Content -->
        <div class="content">
           <!-- Phần hiển thị nội dung chính -->
           <?php
                $view = $params['view'];
           ?>
           <?php include "./mvc/views/$view.php"?>
        </div>
       <?php include "./mvc/views/Admin/footer.php"?>
    </div>
    <script src="./themes/admin/js/script.js"></script>
</body>
</html>