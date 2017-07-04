<table border="1" cellpadding="5">
<?php


// データベース接続用。ユーザ定義関数のmysql_acces()によりpdoオブジェクトを取得。
require_once './00_mysql_acces.php';

// base クラス
abstract class base{
    abstract protected function load();
    public function show($datas){
        if($datas == null){
            echo "<tr><td>一致するデータがありません</td></tr>";
            return 0;
        }

        echo "<tr>";
        foreach ($datas[0] as $key => $value) {
            echo "<td>" . $key . "</td>";
        }
        echo "</tr>";
        foreach ($datas as $info) {
            echo "<tr>";
            foreach ($info as $key => $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
    }
}

class human extends base{
    private $table = '';
    function __construct(){
        $this->table = 'i_human';
    }

    function load(){
        $sql = 'select * from ' . $this->table . ";";
        $pdo_obj = mysql_acces();
        $pdo_st = $pdo_obj->prepare($sql);
        $pdo_st->execute();

        $datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);

        $pdo_obj = null;

        return $datas;
    }
}

class station extends base{
    private $table = '';
    function __construct(){
        $this->table = 'i_station';
    }

    function load(){
        $sql = 'select * from ' . $this->table . ";";
        $pdo_obj = mysql_acces();
        $pdo_st = $pdo_obj->prepare($sql);
        $pdo_st->execute();

        $datas = $pdo_st->fetchAll(PDO::FETCH_ASSOC);

        $pdo_obj = null;

        return $datas;
    }
}


$test_human = new human();
$test_station = new station();

$test_human->show($test_human->load());

$test_station->show($test_station->load());

?>
</table>