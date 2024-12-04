CREATE DATABASE IF NOT EXISTS tlunews;

USE tlunews;

-- Bảng người dùng (users)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role INT CHECK (role IN (0,1)) -- 0: Người dùng, 1: Quản trị viên
);

-- Bảng danh mục (categories)
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Bảng tin tức (news)
CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO users (username, password, role) VALUES
('admin', 'admin123', 1),
('user1', 'password1', 0),
('user2', 'password2', 0);

INSERT INTO categories (name) VALUES
('Technology'),
('Health'),
('Education'),
('Sports');

INSERT INTO news (title, content, image, category_id) VALUES
('New AI breakthrough', 'Content about AI...', 'hoacucdai.jpg', 1),
('Health benefits of yoga', 'Content about yoga...', 'hoasen.jpg', 2),
('University rankings 2024', 'Content about rankings...', 'ranking_image.jpg', 3),
('Football World Cup', 'Content about football...', 'football_image.jpg', 4);
