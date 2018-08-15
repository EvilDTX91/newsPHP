<?php session_start();?>
<?php
if(isset($_GET["userSendNews"]))
{
    if($_SESSION["userLoggedIn"])
    {
        $content = null;
        $content .= "<form action='articleUploaderSend.php' method='post'>
                Title: <input type='text' name='userWriteTitle'></br>
                Article: <input type='text' name='userWriteNews'></br>
                <input type='reset' name='reset' value='Cancel'>
                <input type='submit' name='userUploadNews' value='Send'>
                </form>
                <a href = index.php> <button>Back!</button>";
        echo $content;
    }
    else
    {
        echo "Kérem jelentkezzen be a tartalom eléréséhez.(Cikk feltöltése)</br>";
        echo "<a href = index.php> <button>Back!</button>";
    }
    /*
    echo "<form action='articleUploaderSend.php' method='get'>";
    echo "Title: <input type='text' name='userWriteTitle'></br>";
    echo "Article: <input type='text' name='userWriteNews'></br>";
    echo "<input type='reset' name='reset' value='Cancel'>";
    echo "<input type='Submit' name='userSendNews' value='Send'>";
    echo "</form>";
    echo "<a href = index.php> <button>Back!</button>";
    */
}
else
{
    echo "<a href = index.php> <button>Back!</button>";
}
?>