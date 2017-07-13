<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報詳細画面</title>
</head>
  <body>
    <?php
    $result = profile_detail($_GET['id']);
    //エラーが発生しなければ表示を行う
    if(is_array($result)){
        // 検索結果に戻る用
        session_start();
        $search_name = "";
        $search_year = "";
        $search_type = "";
        if (isset($_SESSION['search_name'])) { $search_name = $_SESSION['search_name']; }
        if (isset($_SESSION['search_year'])) { $search_year = $_SESSION['search_year']; }
        if (isset($_SESSION['search_type'])) { $search_type = $_SESSION['search_type']; }
    ?>
      
    <h1>詳細情報</h1>
    名前:<?php echo $result[0]['name'];?><br>
    生年月日:<?php echo $result[0]['birthday'];?><br>
    種別:<?php echo ex_typenum($result[0]['type']);?><br>
    電話番号:<?php echo $result[0]['tell'];?><br>
    自己紹介:<?php echo $result[0]['comment'];?><br>
    登録日時:<?php echo date('Y年n月j日　G時i分s秒', strtotime($result[0]['newDate'])); ?><br>
    
    <form action="<?php echo UPDATE; ?>?id=<?php echo $_GET['id']; ?>" method="POST">
        <input type="submit" name="update" value="変更" style="width:100px">
    </form>
    <form action="<?php echo DELETE; ?>?id=<?php echo $_GET['id']; ?>" method="POST">
        <input type="submit" name="delete" value="削除" style="width:100px">
    </form>
    <form action="<?php echo SEARCH_RESULT ?>" method="GET">
        <input type="hidden" name="name" value="<?php echo $search_name;?>">
        <input type="hidden" name="year" value="<?php echo $search_year;?>">
        <!-- typeのみ""のままでは文字列でDBを検索してしまうため分岐 -->
        <?php if ($search_type !== "") { ?>
        <input type="hidden" name="type" value="<?php echo $search_type;?>">
        <?php } ?>
        <input type="submit" name="btnSubmit" value="検索結果へ戻る">
    </form>
    <form action="<?php echo SEARCH ?>" method="POST">
        <input type="submit" name="search" value="検索へ戻る">
    </form>
    
    <?php
    }else{
        echo 'データの検索に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
    echo return_top(); 
    ?>
  </body>
</html>
