<?php
if($_GET["userSendNews"])
{
    echo "<form action='articleUploaderSend.php' method='get'>";
    echo "Title: <input type='text' name='userWriteTitle'></br>";
    echo "Article: <input type='text' name='userWriteNews'></br>";
    echo "<input type='reset' name='reset' value='Cancel'>";
    echo "<input type='Submit' name='userSendNews' value='Send'>";
    echo "</form>";
    echo "<a href = index.php> <button>Back!</button>";
}
?>