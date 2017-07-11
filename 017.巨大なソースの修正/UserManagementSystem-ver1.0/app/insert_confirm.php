<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/defineUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
    // POSTされた情報をセッションに格納
    session_start();
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }

    if(!empty($_POST['name']) && ctype_digit($_POST['year']) && ctype_digit($_POST['month']) && ctype_digit($_POST['day']) && !empty($_POST['type']) 
            && !empty($_POST['tell']) && !empty($_POST['comment'])){
        
        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];
        // birthdayのみdate型に変換したものをセッションに格納
        $_SESSION['birthday'] = $post_birthday;
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="hidden" name="hidden" value="hidden">
          <input type="submit" name="yes" value="はい">
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
        
    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        再度入力を行ってください<br>
        次の項目が未入力です<br>
        <?php
            if (empty($_POST['name'])){
                echo "・名前<br>";
            }
            if (!ctype_digit($_POST['year']) || !ctype_digit($_POST['month']) || !ctype_digit($_POST['day'])){
                echo "・生年月日<br>";
            }
            if (empty($_POST['type'])){
                echo "・種別<br>";
            }
            if (empty($_POST['tell'])){
                echo "・電話番号<br>";
            }
            if (empty($_POST['comment'])){
                echo "・自己紹介<br>";
            }
        ?>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php }?>
    <?php echo return_top(); ?>
</body>
</html>
