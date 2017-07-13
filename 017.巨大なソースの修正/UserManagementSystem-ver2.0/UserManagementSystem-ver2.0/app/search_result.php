<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
        <?php
        $result = null;
        // typeのみ入力なしの可能性があるので未定義を回避するためにnullを挿入
        if (!isset($_GET['type'])) { $_GET['type'] = null; }

        // 検索条件をsessionに保存
        session_start();
        $_SESSION['search_name'] = $_GET['name'];
        $_SESSION['search_year'] = $_GET['year'];
        $_SESSION['search_type'] = $_GET['type'];

        if(empty($_GET['name']) && empty($_GET['year']) && empty($_GET['type'])){
            $result = search_all_profiles();
        }else{
            $result = search_profiles($_GET['name'],$_GET['year'],$_GET['type']);
        }

        // 検索結果$resultが配列かどうかと要素数の確認。違った場合は該当結果なし。
        if (is_array($result) && (count($result)) > 0) {
            foreach($result as $value){
            ?>
                <tr>
                    <td><a href="<?php echo RESULT_DETAIL ?>?id=<?php echo $value['userID']?>"><?php echo $value['name']; ?></a></td>
                    <td><?php echo $value['birthday']; ?></td>
                    <td><?php echo ex_typenum($value['type']); ?></td>
                    <td><?php echo date('Y年n月j日　G時i分s秒', strtotime($value['newDate'])); ?></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr><td colspan="4">一致するデータがありませんでした</td></tr>
            <?php
        }
        ?>
        </table>
        <form action="<?php echo SEARCH ?>" method="POST">
            <input type="submit" name="no" value="検索画面に戻る">
        </form>
        <?php echo return_top(); ?>
</body>
</html>
