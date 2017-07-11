<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/dbaccesUtil.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>
    <?php
    if (isset($_POST['hidden'])) {
        session_start();
        $name = $_SESSION['name'];
        $birthday = $_SESSION['birthday'];
        $type = $_SESSION['type'];
        $tell = $_SESSION['tell'];
        $comment = $_SESSION['comment'];

        //db接続を確立
        $insert_db = connect2MySQL();

        // 必要な情報を渡し、登録する関数  
        $result = all_registration($insert_db, $name, $birthday, $tell, $type, $comment);

        if ($result === 0) {
            // 正しく登録されたのでセッションの情報を全て破棄
            $_SESSION = array();
            session_destroy();
            ?>

            <h1>登録結果画面</h1><br>
            名前:<?php echo $name;?><br>
            生年月日:<?php echo $birthday;?><br>
            種別:<?php echo $type?><br>
            電話番号:<?php echo $tell;?><br>
            自己紹介:<?php echo $comment;?><br>
            以上の内容で登録しました。<br>

            <?php
        } else {
            echo "データの挿入に失敗しました：<br>" . $result . "<br>";
        }
    } else {
        echo "正しい手順で入力してください<br>";
    }
    echo return_top();
    ?>
    
</body>

</html>
