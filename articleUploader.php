<?php
if($_GET["userSendNews"])
{
    echo "<form method='get'>";
    echo "Title: <input type='text' name='userWriteTitle'></br>";
    echo "Article: <input type='text' name='userWriteNews'></br>";
    echo "<input type='reset' name='reset' value='Cancel'>";
    echo "<input type='Submit' name='userSendNews' value='Send'>";
    echo "</form>";
    echo "<a href = index.php> <button>Back!</button>";
}
?>

<?php
include ("Settings/connect.php");
if($_GET["userSendNews"])
{
    $title= $_GET['userWriteTitle'];
    $article = $_GET['userWriteNews'];

    $sql = "INSERT INTO articles (authorID,article,title)
    VALUES ('1','$title','$article')";

    if($connect->query($sql))
    {
        echo "Upload completed!";
    }
}
?>
