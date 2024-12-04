<!-- dashboard.php -->

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
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>