<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ファイルのアップロード</title>
</head>
<body>
        <form enctype="multipart/form-data" action="./result.php" method="post">
        ファイル：<input type="file" name="userfile">
        <input type="submit" value="送信">
        </form>
</body>
</html>