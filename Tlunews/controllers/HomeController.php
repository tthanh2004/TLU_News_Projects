<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'models/News.php';
require_once 'models/Category.php';

class HomeController
{
    public function index()
    {
        $newsModel = new News();
        $categoryModel = new Category();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 5;
        $totalNews = $newsModel->getTotalNews();
        $totalPages = ceil($totalNews / $perPage);

        $offset = ($page - 1) * $perPage;
        $newsList = isset($_GET['category']) ? $newsModel->getNewsByPage($_GET['category']) : $newsModel->getNewsByPage();

        // 2. Lấy danh sách danh mục
        $categories = $categoryModel->getAllCategories();
        // 3. Truyền dữ liệu vào view
        require_once('views/home/index.php');
    }
}
