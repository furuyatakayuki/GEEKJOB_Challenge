<?php

session_start();

if (!isset($_SESSION["name"])) {
    $message = "セッションがタイムアウトしました";
} else {
    $message = "ログアウトしました";
}

$_SESSION = array();

session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
    <title>ログアウトフォーム</title>
</head>
<body>
    <?php echo $message . "<br>"; ?>

    <a href="login_form.php">ログイン画面</a>

</body>
</html>