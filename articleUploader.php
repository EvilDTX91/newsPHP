<?php
if (isset($_GET["userSendNews"])) {
    if ($USER) {
        $content = null;
        $content .= "<form action='articleUploaderSend.php' method='post'>
                Title: <input type='text' name='userWriteTitle'></br>
                Article: <input type='text' name='userWriteNews'></br>
                <input type='reset' name='reset' value='Cancel'>
                <input type='submit' name='userUploadNews' value='Send'>
                </form>
                <a href = index.php> <button>Back!</button></a>";
        echo $content;
    } else {
        echo "Kérem jelentkezzen be a tartalom eléréséhez.(Cikk feltöltése)</br>";
        echo "<a href = index.php> <button>Back!</button></a>";
    }
}