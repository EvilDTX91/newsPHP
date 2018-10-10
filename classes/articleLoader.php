<?php

namespace newsphp\classes;

use NewsPHP\classes\Database\Connect;

class ArticleLoader extends Connect
{
    public function loadAllArticle()
    {
        $sql = "SELECT * FROM articles";
        $result = Connect::getConnection()->query($sql);
        /*if(isset($result))
        {
            while($row = $result->fetch_assoc())
            {
                $author = self::getAuthorName($row['authorID']);

                echo "newsID :" . $row['newsID'] . "</br>";
                echo "authorID: " . $row['authorID'] . "</br>";
                echo "authorName: " . $author . "</br>";
                echo "article: " . $row['article'] . "</br>";
                echo "title: " . $row['title'] . "</br>";
                echo "category: " . $row['category'] . "</br>";
                echo "readed: " . $row['readed'] . "</br>";
                echo "released: " . $row['released'] . "</br></br></br>";
            }
        }*/
        return $result;
    }

    private function loadSelectedArticle($selectedAuthor)
    {
        $sql = "SELECT * FROM articles WHERE authorID='$selectedAuthor'";
        $result = Connect::getConnection()->query($sql);
        return $result;
    }

    private function getAuthorName($authorID)
    {
        $sql = "SELECT username FROM users WHERE id='$authorID'";
        $result = Connect::getConnection()->query($sql);
        $authorName = $result->fetch_assoc();
        return $authorName['username'];
    }

    private function getAuthorID($authorName)
    {
        $sql = "SELECT id FROM users WHERE username='$authorName'";
        $result = Connect::getConnection()->query($sql);
        $authorID = $result->fetch_assoc();
        return $authorID['id'];
    }
}