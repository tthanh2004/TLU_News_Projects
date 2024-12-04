<?php
require_once 'models/User.php';

class AdminController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = User::authenticate($username, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?controller=admin&action=dashboard");
                exit();
            } else {
                header("Location: ?error=1");
            }
        } else {
            include "views/admin/login.php";
        }
    }

    public function logout()
    {
       if (isset($_SESSION['user'])) {
        session_destroy();
        include "views/admin/login.php";
       }
    }

    public function dashboard()
    {
        require_once 'models/News.php';
        require_once 'models/User.php';

        $newsModel = new News();
        $userModel = new User();

        // Lấy tổng số tin tức và người dùng
        $totalUsers = $userModel->getTotalUsers();
        $news = $newsModel->getAllNews();
        // Truyền dữ liệu vào view
        include "views/admin/dashboard.php";
    }
}