<?php


namespace App\Service;


use App\Entity\Article;

interface ArticleService
{
    function getArticles();
    function getArticleById($id): Article;
}