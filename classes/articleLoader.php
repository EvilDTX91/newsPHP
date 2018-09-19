<?php

namespace newsphp\classes;

use NewsPHP\classes\Database\Connect;

class ArticleLoader extends Connect
{
    private function loadAllArticle()
    {
        $sql = "SELECT * FROM articles";
        $result = Connect::getConnection()->msqli($sql);
        return $result;
    }

    private function loadSelectedArticle($selectedAuthor)
    {
        $sql = "SELECT * FROM articles WHERE authorID='$selectedAuthor'";
        $result = Connect::getConnection()->msqli($sql);
        return $result;
    }

    private function getAuthorName($authorID)
    {
        $sql = "SELECT username FROM users WHERE id='$authorID'";
        $result = Connect::getConnection()->mysqli($sql);
        return $result;
    }

    private function getAuthorID($authorName)
    {
        $sql = "SELECT id FROM users WHERE username='$authorName'";
        $result = Connect::getConnection()->mysqli($sql);
        return $result;
    }
}