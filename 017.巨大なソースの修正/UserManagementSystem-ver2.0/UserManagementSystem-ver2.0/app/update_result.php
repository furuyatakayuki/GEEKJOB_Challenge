<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    if (!$_POST['mode'] == "RESULT"){
        echo 'アクセスルートが不正です。もう一度やり直してください。<br>';
    } else {
        $name = $_POST['name'];
        $birthday = $_POST['year'] . '-' . sprintf('%02d',$_POST['month']) . '-' . sprintf('%02d',$_POST['day']);
        $type = $_POST['type'];
        $tell = $_POST['tell'];
        $comment = $_POST['comment'];

        // 値を渡してデータを更新
        $result = update_profile($_GET['id'], $name, $birthday, $tell, $type, $comment);
        //エラーが発生しなければ表示を行う
        if(!isset($result)){
        ?>
        <h1>更新確認</h1>
        名前:<?php echo $name ;?><br>
        生年月日:<?php echo $birthday ;?><br>
        種別:<?php echo ex_typenum($type) ;?><br>
        電話番号:<?php echo $tell ;?><br>
        自己紹介:<?php echo $comment ;?><br>
        <br>
        以上の内容で更新しました。<br>
        <?php
        }else{
            echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result."<br>";
        }
    }
    ?>
    <form action="<?php echo RESULT_DETAIL; ?>?id=<?php echo $_GET['id']; ?>" method="POST">
      <input type="submit" name="NO" value="詳細画面に戻る">
    </form>
    <?php echo return_top(); ?>
  </body>
</html>
