<?php

// 先ほど作成したPDOインスタンス作成をそのまま使用します
require_once 'connect_pdo.php';
// include_once './connect_pdo.php';

# クラス作成方法
class ItemPdo {

    private ConnectPdo $connectPdo;

    function __construct() {
        if (!empty($connectPdo)) {
            return;
        }

        $this->connectPdo = new ConnectPdo();
    }

    function get_items() {

        $order_by = "order by item_id asc, create_date desc";
        $limit  = "limit 20";

        // SQL文を準備します。「:keyword」がプレースホルダーです。
        $sql = "SELECT * FROM item_info $order_by $limit";

        // TODO $dbh 変数を'connect_pdo.php'から取得する
        // $dbh = $this->connectPdo->get_connect_info();
        $result = $this->connectPdo->get_connect_info();
        // if ($dbh instanceof string) {
        //     return $dbh;
        // }

        // if (empty($dbh)) {
        //     print("$dbh 接続先できない");
        // }

        // $dbh->prepare($sql);

        // // PDOStatementクラスのインスタンスを生成します。
        // $prepare = $dbh->prepare($sql);
                    
        // // プリペアドステートメントを実行する
        // $prepare->execute();
        
        // // PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
        // $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        
        // // 結果を出力
        // // var_dump($result);

        return $result;
    }

    function get_items_bind_keyword($keywords, $order_select = [], $page_number = 1) {

        # 型が配列かどうかチェック、要素数が１以上かチェック
        if ($keywords) {
            return "";
        # チェック違反の場合、エラーメッセージを返す
        }

        $where_sql = 'WHERE name like :keyword0';

        $where_bind_map = array(":keyword0" => $keywords[0]);

        # 要素数チェック
        for ($index = 1; $index < $keywords; $index++) {
            $where_sql += ' or name like :keyword'.$index;

            $where_bind_array[":keyword".$index] = $keywords[$index];
        }

        $order_by = "";
        if ($order_select) {
            $order_by = "order by ".$order_select['order'];

            if ($order_select['ascFlg']) {
                $order_by += $order_by."asc";
            } else {
                $order_by += $order_by."desc";
            }
        }

        $limit  = "limit 20";
        if ($page_number > 1) {
            $row_min = ($page_number - 1) * 20;
            $row_max = $page_number * 20;
            $limit = "limit $row_min, $row_max";
        }

        // SQL文を準備します。「:keyword」がプレースホルダーです。
        $sql = "SELECT * FROM item $where_sql $order_by $limit";

        // TODO $dbh 変数を'connect_pdo.php'から取得する
        $dbh = $this->connectPdo->get_connect_info();

        if ($dbh instanceof string) {
            return $dbh;
        }

        // PDOStatementクラスのインスタンスを生成します。
        $prepare = $dbh->prepare($sql);

        // 値のbind設定
        foreach ($where_bind_array as $key -> $value) {
            // PDO::PARAM_STRは、SQL 文字列 データ型を表します。
            $prepare->bindValue($key, '%'. $value .'%', PDO::PARAM_STR);
        }
                    
        // プリペアドステートメントを実行する
        $prepare->execute();
        
        // PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        
        // 結果を出力
        // var_dump($result);

        return $result;
    }
}
?>