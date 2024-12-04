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
        $stmt = $this->pdo->query("SELECT n.id AS news_id, n.title, c.name AS category_name, n.image, n.created_at 
          FROM news n
          INNER JOIN categories c ON n.category_id = c.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchNews($keyword)
    {
        $stmt = $this->pdo->prepare(
            "SELECT n.id AS news_id, 
            n.title, 
            c.name AS category_name, 
            n.image, 
            n.content,
            n.created_at
        FROM news n
        INNER JOIN categories c ON n.category_id = c.id
        WHERE n.title LIKE :keyword 
        OR n.content LIKE :keyword"
        );

        $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Trả về kết quả dưới dạng mảng kết hợp
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsByPage($category = null)
    {
        if ($category != null) {
            $stmt = $this->pdo->prepare("SELECT * FROM news where category_id = " . $category);
        } else {
            $stmt = $this->pdo->prepare("SELECT * FROM news");
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tin tức theo ID
    public function getNewsById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy tổng số tin tức
    public function getTotalNews()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) AS total FROM news");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
}
