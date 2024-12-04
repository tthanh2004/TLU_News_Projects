<?php
require_once 'models/News.php';

class NewsController
{
    // Chi tiết tin tức
    public function detail($id)
    {
        $newsModel = new News();
        $news = $newsModel->getNewsById($id);

        include 'views/news/detail.php';
    }


    public function search($keyword = null)
    {
        $newsModel = new News();

        if ($keyword) {
            $results = $newsModel->searchNews($keyword);
            if (empty($results)) {
                $noResultsMessage = 'Không có kết quả nào phù hợp với từ khóa.';
            }
        } else {
            $results = $newsModel->getAllNews();
        }

        include 'views/home/index.php';
    }
}
