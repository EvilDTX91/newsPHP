<?php

namespace newsphp\classes;

use NewsPHP\classes\Database\Connect;

class ArticleUploader extends Connect
{
    private $AUTHORID;
    private $ARTICLE;
    private $TITLE;

    public function setArticleData($authorID, $article, $title)
    {
        if (isset($authorID)) {
            $this->AUTHORID = mysqli_real_escape_string(Connect::getConnection(),$authorID);
        }
        if (isset($article)) {
            $this->ARTICLE = mysqli_real_escape_string(Connect::getConncetion(),$article);
        }
        if (isset($title)) {
            $this->TITLE = mysqli_real_escape_string(Connect::getConncetion(),$title);
        }

        self::uploadArticle();
    }

    private function uploadArticle()
    {
        $sql = "INSERT INTO articles(authorID, article, title)
VALUES ('$this->AUTHORID','$this->ARTICLE','$this->TITLE')";
        Connect::getConncetion()->query($sql);
    }
}