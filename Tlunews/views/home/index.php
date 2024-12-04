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
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <!-- Header with Navbar -->
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-4">Trang Chủ</h1>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=home">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=category">Thể loại</a>
                        </li>
                        <?php if ($_SESSION['user']['role'] === 1): ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=log-out">Đăng xuất</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=log-out">Đăng nhập</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2>Danh sách tin tức</h2>
        <!-- Form Tìm Kiếm -->
        <form action="index.php?action=search" method="get" class="form-inline mb-3">
            <input type="text" name="keyword" class="form-control mr-2" placeholder="Tìm kiếm tin tức..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" required>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <!-- Hiển thị kết quả tìm kiếm -->
        <?php if (isset($_GET['keyword'])): ?>
            <h3 class="mt-4">Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($_GET['keyword']); ?>"</h3>
        <?php endif; ?>

        <!-- Hiển thị thông báo nếu không tìm thấy kết quả -->
        <?php if (isset($noResultsMessage)): ?>
            <div class="alert alert-warning mt-4"><?php echo htmlspecialchars($noResultsMessage); ?></div>
        <?php endif; ?>

        <?php if (!empty($results)): ?>
            <ul class="list-group mt-4">
                <?php foreach ($results as $news): ?>
                    <li class="list-group-item">
                        <h4><?php echo htmlspecialchars($news['title']); ?></h4>
                        <p><?php echo htmlspecialchars($news['content']); ?></p>
                        <img src="assets/image/<?php echo $news['image']; ?>" style="width: 200px;" alt="Tin tức hình ảnh">
                        <a href="index.php?controller=news&action=detail&id=<?php echo $news['news_id']; ?>" class="btn btn-info">Chi tiết</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif (!isset($_GET['keyword'])): ?>
            <?php if (!empty($newsList)): ?>
                <ul class="list-group mt-4">
                    <?php foreach ($newsList as $news): ?>
                        <li class="list-group-item">
                            <h4><?php echo htmlspecialchars($news['title']); ?></h4>
                            <p><?php echo htmlspecialchars($news['content']); ?></p>
                            <img src="assets/image/<?php echo $news['image'] ?>" style="width: 200px;" alt="">
                            <a href="index.php?controller=news&action=detail&id=<?php echo $news['id']; ?>" class="btn btn-info">Chi tiết</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 Tin tức</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>