<?php
class News
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connect(); // Sử dụng kết nối PDO từ class Database
    }

    // Lấy tất cả tin tức
    public function getAllNews()
    {
        $stmt = $this->pdo->query("SELECT * FROM news join categories on news.category_id = categories.id ORDER BY news.id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

  
}