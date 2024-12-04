<?php
session_start();
$action = $_GET['action'] ?? 'login';
require_once './controllers/HomeController.php';
require_once './controllers/AdminController.php';
require_once './controllers/NewsController.php';

try {
    switch ($action) {
        case 'home':
            $controller = new HomeController();
            break;
        case 'login':
            $controller = new AdminController();
            $controller->login();
            break;
        case 'log-out':
            $controller = new AdminController();
            $controller->logout();
            break;
        case 'dashboard':
            if (!isset($_SESSION['user'])) {
                header('Location: ?action=login');
                exit();
            }
            $controller = new AdminController();
            $controller->dashboard();
            break;
        
    }
} catch (Exception $e) {
    echo "Đã có lỗi xảy ra: " . $e->getMessage();
}