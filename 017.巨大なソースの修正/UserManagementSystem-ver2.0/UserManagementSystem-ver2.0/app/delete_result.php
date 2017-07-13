<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除結果画面</title>
</head>
<body>
    <?php
    if (!$_POST['mode'] == "RESULT"){
        echo 'アクセスルートが不正です。もう一度やり直してください。<br>';
    } else {
        $result = delete_profile($_GET['id']);
        //エラーが発生しなければ表示を行う
        if(!isset($result)){
        ?>
        <h1>削除確認</h1>
        削除しました。<br>
        <?php
        }else{
            echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result."<br>";
        }

        // 検索結果に戻る用
        session_start();
        $search_name = "";
        $search_year = "";
        $search_type = "";
        if (isset($_SESSION['search_name'])) { $search_name = $_SESSION['search_name']; }
        if (isset($_SESSION['search_year'])) { $search_year = $_SESSION['search_year']; }
        if (isset($_SESSION['search_type'])) { $search_type = $_SESSION['search_type']; }

        ?>

        <form action="<?php echo SEARCH_RESULT ?>" method="GET">
            <input type="hidden" name="name" value="<?php echo $search_name;?>">
            <input type="hidden" name="year" value="<?php echo $search_year;?>">
            <!-- typeのみ""のままでは文字列でDBを検索してしまうため分岐 -->
            <?php if ($search_type !== "") { ?>
            <input type="hidden" name="type" value="<?php echo $search_type;?>">
            <?php } ?>
            <input type="submit" name="btnSubmit" value="検索結果へ戻る">
        </form>

    <?php } ?>
    <?php echo return_top(); ?>
   </body> 
</body>
</html>
