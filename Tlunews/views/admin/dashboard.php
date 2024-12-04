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
    <?php
    if (isset($_SESSION['user']) && !isset($_SESSION['success'])) {
        $_SESSION['success'] = 1;
    ?>
        <script>
            Swal.fire({
                icon: "success",
                title: "Đăng nhập thành công",
                text: "Something went wrong!",
                footer: '<a href="#">Why do I have this issue?</a>'
            });
        </script>
    <?php
    }
    ?>
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
                <?php if (isset($news)): ?>
                    <?php foreach ($news as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['news_id']) ?></td>
                            <td><?= htmlspecialchars($item['title']) ?></td>
                            <td><?= htmlspecialchars($item['category_name']) ?></td>
                            <td><img src="assets/image/<?php echo $item['image'] ?>" style="width: 100px;" alt=""> </td>
                            <td><?= date('d/m/Y', strtotime($item['created_at'])) ?></td>
                            <td>
                                <a href="index.php?action=edit_news&id=<?= $item['news_id'] ?>" class="btn btn-primary">Sửa</a>
                                <a href="index.php?action=delete_news&id=<?= $item['news_id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này không?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Không có tin tức nào</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>