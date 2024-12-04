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
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?action=dashboard">Dashboard</a>
                        </li>
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

    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 Tin tức</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>