<?php

session_start();

function old_check($sub){
    foreach ($_SESSION as $key => $value) {
        if ($key == $sub){
            return $value;
        }
    }
    return "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HTMLの入力データの取得と表示</title>
</head>
<body>
    <form action="./11_7_session_input.php" method="post">
        名前<br>
        <?php $value = old_check("textName");?>
        <input type="text" name="textName" value=<?= $value ?>><br>
        性別<br>
        <?php $value = old_check("gender");
        if($value == "男"){
            $value = "checked";
        }else{
            $value = "";
        }
        ?>
        <input type="radio" name="gender" value="男" <?= $value ?>>男
        <?php $value = old_check("gender");
        if($value == "女"){
            $value = "checked";
        }else{
            $value = "";
        }
        ?>
        <input type="radio" name="gender" value="女" <?= $value ?>>女<br>
        趣味<br>
        <?php $value = old_check("mulText");?>
        <textarea name="mulText"><?= $value ?></textarea><br>
        <input type="submit" name="btnSubmit">
    </form>
</body>
</html>