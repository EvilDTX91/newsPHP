<?php

namespace NewsPhp\Article;

use NewsPhp\Database\Connection;

class ArticleLoader extends Connection
{
    public function loadAllArticle()
    {
        $sql = "SELECT * FROM articles";
        $result = Connection::getConnection()->query($sql);

        if(isset($result))
        {
            while($row = $result->fetch_assoc())
            {
                $articles[] = $row;
            }
        }
        return $articles;
    }

    private function loadSelectedArticle($selectedAuthor)
    {
        $sql = "SELECT * FROM articles WHERE authorID='$selectedAuthor'";
        $result = Connection::getConnection()->query($sql);
        return $result;
    }

    private function getAuthorName($authorID)
    {
        $sql = "SELECT username FROM users WHERE id='$authorID'";
        $result = Connection::getConnection()->query($sql);
        $authorName = $result->fetch_assoc();
        return $authorName['username'];
    }

    private function getAuthorID($authorName)
    {
        $sql = "SELECT id FROM users WHERE username='$authorName'";
        $result = Connection::getConnection()->query($sql);
        $authorID = $result->fetch_assoc();
        return $authorID['id'];
    }
}