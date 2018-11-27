<?php

namespace NewsPhp\Article;


class ArticleUploader
{
    private $AUTHORID = "";
    private $ARTICLE = "";
    private $TITLE = "";

    public function setArticleData($authorID, $article, $title)
    {
        if (isset($authorID)) {
            $this->AUTHORID = $authorID;
        } else {
            echo "(" . $authorID . ") is missing...";
        }
        if (isset($article)) {
            $this->ARTICLE = $article;
        } else {
            echo "(" . $article . ") is missing...";
        }
        if (isset($title)) {
            $this->TITLE = $title;
        } else {
            echo "(" . $title . ") is missing...";
        }

        self::uploadArticle();
    }

    private function uploadArticle()
    {
        $sql = "INSERT INTO articles(authorID, article, title)
VALUES ('" . $this->AUTHORID . "','" . $this->ARTICLE . "','" . $this->TITLE . "')";
        Connect::getConnection()->query($sql);
    }
}