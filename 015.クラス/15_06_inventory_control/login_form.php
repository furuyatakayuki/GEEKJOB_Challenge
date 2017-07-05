<?php
// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

session_start();

// ログインが押されたら
if (isset($_POST["btnsubmit"])) {
    if (!empty($_POST["name"]) && !empty($_POST["pass"])) {
        $sql = 'select * from i_user where name = :name;';
    
        $pdo_obj = mysql_acces();
        $pdo_st = $pdo_obj->prepare($sql);
        $pdo_st->bindValue(':name', $_POST["name"]);
        $pdo_st->execute();

        $datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);
        $pdo_obj = null;

        if ($datas != null) {
            foreach ($datas as $i) {}
            if ($_POST["pass"] == $i["pass"]) {
                session_regenerate_id(true);
                $_SESSION["name"] = $i["name"];
                header("Location: list_form.php");
                exit();
            } else {
                echo "ユーザ名かパスワードが間違っています<br>";
            }
        } else {
            echo "ユーザ名かパスワードが間違っています<br>";
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>ログインフォーム</title>
</head>
<body>
    <form action="" method="post">
        ユーザ名<br>
        <input type="text" name="name" required><br>
        パスワード<br>
        <input type="text" name="pass" autocomplete="off" required><br><br>
        <input type="submit" name="btnsubmit" value="ログイン">
    </form>
</body>
</html>
