<?php
session_start();

function old_check($sub){
    if (isset($_POST['no'])){
        foreach ($_SESSION as $key => $value) {
            if ($key == $sub){
                return $value;
            }
        }
    }
    return "";
}
?>

<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/defineUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <?php $value = old_check("name"); ?>
    <input type="text" name="name" value=<?php echo $value; ?>>
    <br><br>
    
    生年月日:　
    <?php
    $value = old_check("year");
    if (!ctype_digit($value)) { $value = "----"; }
    if ($value == "----") { $select = "selected"; }
    else { $select = ""; }
    ?>
    <select name="year">
        <option value="----" <?php echo $select; ?>>----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ 
            if ($value == $i) { $select = "selected"; }
            else { $select = ""; }
        ?>
            <option value="<?php echo $i;?>" <?php echo $select; ?>><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <?php
    $value = old_check("month");
    if (!ctype_digit($value)) { $value = "--"; }
    if ($value == "--") { $select = "selected"; }
    else { $select = ""; }
    ?>
    <select name="month">
        <option value="--" <?php echo $select; ?>>--</option>
        <?php
        for($i = 1; $i<=12; $i++){
            if ($value == $i) { $select = "selected"; }
            else { $select = ""; }
        ?>
            <option value="<?php echo $i;?>" <?php echo $select; ?>><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <?php
    $value = old_check("day");
    if (!ctype_digit($value)) { $value = "--"; }
    if ($value == "--") { $select = "selected"; }
    else { $select = ""; }
    ?>
    <select name="day">
        <option value="--" <?php echo $select; ?>>--</option>
        <?php
        for($i = 1; $i<=31; $i++){
            if ($value == $i) { $select = "selected"; }
            else { $select = ""; }
            ?>
            <option value="<?php echo $i; ?>" <?php echo $select; ?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <?php $value = old_check("type");
    if ($value == "エンジニア") { $value = "checked"; }
    else { $value = ""; }
    ?>
    <input type="radio" name="type" value="エンジニア" <?php echo $value; ?>>エンジニア<br>
    <?php $value = old_check("type");
    if ($value == "営業") { $value = "checked"; }
    else { $value = ""; }
    ?>
    <input type="radio" name="type" value="営業" <?php echo $value; ?>>営業<br>
    <?php $value = old_check("type");
    if ($value == "その他") { $value = "checked"; }
    else { $value = ""; }
    ?>
    <input type="radio" name="type" value="その他" <?php echo $value; ?>>その他<br>
    <br>
    
    電話番号:
    <?php $value = old_check("tell");?>
    <input type="text" name="tell" value=<?php echo $value; ?>>
    <br><br>

    自己紹介文
    <br>
    <?php $value = old_check("comment");?>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $value; ?></textarea><br><br>
    
    <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>
    <?php echo return_top(); ?>
</body>
</html>
