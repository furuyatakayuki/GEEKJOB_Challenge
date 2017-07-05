<?php
// データベース接続用。ユーザ定義関数のmysql_acces() によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

session_start();

if (!isset($_SESSION["name"])) {
    header("Location: logout_form.php");
    exit;
}

// 登録ボタンが押されたら
if (isset($_POST["btnsubmit"])){
    if (!empty($_POST["goodsname"]) && !empty($_POST["stock"])){
        $sql = 'select * from i_goods';
        
        $pdo_obj = mysql_acces();
        $pdo_st = $pdo_obj->prepare($sql);
        $pdo_st->execute();

        $datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);

        $sql_insert = 'insert into i_goods(goodsname, stock) values(:goodsname, :stock);';
        $sql_update = 'update i_goods set stock = :stock where goodsname = :goodsname;';
        $flg = true;

        foreach ($datas as $i) {
            foreach ($i as $key => $value) {
                if (($key == "goodsname") && ($value == $_POST["goodsname"])){
                    $flg = false;
                }
            }
        }
        if($flg){
            $sql = $sql_insert;
        } else {
            $sql = $sql_update;
        }

        $pdo_st = $pdo_obj->prepare($sql);
        $pdo_st->bindValue(':goodsname', $_POST["goodsname"]);
        $pdo_st->bindValue(':stock', $_POST["stock"]);
        $pdo_st->execute();

        $pdo_obj = null;

        echo "登録が完了しました";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>登録フォーム</title>
</head>
<body>
    <form action="" method="post">
        商品名<br>
        <input type="text" name="goodsname" required><br>
        在庫<br>
        <input type="number" name="stock" required><br>
        <input type="submit" name="btnsubmit" value="登録">
    </form>
    <a href="list_form.php">在庫一覧</a><br>
    <a href="logout_form.php">ログアウト画面</a><br>
</body>
</html>