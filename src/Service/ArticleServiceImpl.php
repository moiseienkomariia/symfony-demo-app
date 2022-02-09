<?php


namespace App\Service;


use App\Entity\Article;

class ArticleServiceImpl implements ArticleService
{

    function getArticles()
    {
        return $this->init();
    }

    function getArticleById($id): Article
    {
        $arr = $this->init();
        foreach ($arr as $article)
        {
            if($id == $article->getId())
            {
                return $article;
            }
        }
        return null;
    }

    function init(): array
    {
        $a1 = new Article(1, 'article nr 1');
        $a2 = new Article(2, 'next article nr 2');
        return array($a1, $a2);
    }
}
