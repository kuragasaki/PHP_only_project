<?php
class ConnectPdo {

    // ドライバ呼び出しを使用して MySQL データベースに接続します
    private string $dsn = '';
    private string $user = '';
    private string $password = '';
    // private PDO $dbh = '';

    function __construct() {
        if (!empty($this->dsn)) {
            return;
        }

        # ファイル読み込み方法
        $filePoint = fopen("../env_file/dbsetting.txt", "r");
        $line = array();
        if ($filePoint) {
            while (!feof($filePoint)) {
                $line[] = fgets($filePoint);
            }
            fclose($filePoint);
        }

        $this->dsn = $line[0];
        $this->user = $line[1];
        // $this->password = $line[2];
    }

    function get_connect_info() {

        if (empty($this->dsn)) {
            echo "接続先が未設定です。";
        }
        
        try {
            // return new PDO($this->dsn, $this->user, $this->password);
            $dbh = new PDO($this->dsn, $this->user, $this->password);

            
        } catch (PDOException $e) {
            echo "接続失敗: " . $e->getMessage() . "\n";
        }


        $order_by = "order by item_id asc, create_date desc";
        $limit  = "limit 5";

        // SQL文を準備します。「:keyword」がプレースホルダーです。
        $sql = "SELECT item_info.item_id AS item_id
                , item_info.item_name AS item_name
                , category.category_name AS category_name
                , item_detail.price AS price
                , item_info.create_date AS create_date
                FROM item_info
                INNER JOIN category
                ON item_info.category_id = category.category_id
                INNER JOIN item_detail
                ON item_info.item_id = item_detail.item_id
                $order_by $limit";

        // PDOStatementクラスのインスタンスを生成します。
        $prepare = $dbh->prepare($sql);
                    
        // プリペアドステートメントを実行する
        $prepare->execute();
        
        // PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        // for ($index = 0; count($result) > $index; $index++) {
        // foreach ($result as $value1) {
        //     // print(gettype($value1));
        //     print(var_dump($value1));
        //     // print($value1["item_id"]);
        //     // print($value1["category_id"]);
        //     // print($value1["item_name"]);
        //     print("<br>");
        //     // print($value1);
        //     // foreach ($result[$index] as $key -> $value2) {
        //     // foreach ($value1 as $value2) {
        //     //     // print(gettype($value2));
        //     //     // print(var_dump($result[$index]));
        //     //     // print($key);
        //     //     print($value2);
        //     // }
        // }


        return $result;
    }
}
?>
