<!-- dashboard.php -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Bảng điều khiển quản trị viên</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Bảng điều khiển</h2>
        <!-- Các nút bấm điều hướng -->
        <div class="mt-4">
            <?php
            if ($_SESSION['user']['role'] === 1) {
            ?>
                <a href="index.php?action=add_news" class="btn btn-success mb-3">Thêm tin tức</a>
            <?php
            }
            ?>
            <a href="index.php?action=home" class="btn btn-secondary mb-3">Trang chủ</a>
            <a href="index.php?action=log-out" class="btn btn-danger mb-3">Đăng xuất</a>
        </div>

        <h3 class="mt-4">Danh sách Tin tức</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Ảnh</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>