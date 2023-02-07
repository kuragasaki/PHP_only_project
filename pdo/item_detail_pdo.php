<?php

// 先ほど作成したPDOインスタンス作成をそのまま使用します
require_once 'connect_pdo.php';
// include_once './connect_pdo.php';

# クラス作成方法
class CategoryPdo {

    private ConnectPdo $connectPdo;

    private string $select_table = "SELECT 
        item_id
        , item_name
        , price
        , color
        , size
        , maker
        FROM item_detail";

    function __construct() {
        if (!empty($connectPdo)) {
            return;
        }

        $this->connectPdo = new ConnectPdo();
    }

    function get_item_details($item_ids = []) {

        $sql_where_items = $this->create_sql_where_items_and_bind_value($item_ids);

        $where_items = $sql_where_items["where_items"];
        $bind_keys = $sql_where_items["bind"];

        // SQL文を準備
        $sql = "$this->select_table
            $where_items";

        $dbh = $this->connectPdo->get_connect_info();
        // if ($dbh instanceof string) {
        //     return $dbh;
        // }

        // if (empty($dbh)) {
        //     print("$dbh 接続先できない");
        // }

        // PDOStatementクラスのインスタンスを生成します。

        if (empty($bind_keys)) {
            $this->prepare_bind_value($prepare, $bind_keys);

                    // PDOStatementクラスのインスタンスを生成します。
        $prepare = $dbh->query($count_sql);
        
        // クエリを実行する
        $count = $prepare->fetchColumn();
        } else {
            $prepare = $dbh->prepare($sql);

            $this->prepare_bind_value($prepare, $bind_keys);
        }

        // プリペアドステートメントを実行する
        $prepare->execute();
        
        // PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        return $result;




    }

    private function create_sql_where_items_and_bind_value($select_items) {
        $result_array = array(
            "bind" => []
            , "where_items" => ""
        );

        if (empty($select_items)) {
            return result_array;
        }

        $bind_key[":item_id0"] = $select_items[0];
        $sql_where_items = ":item_id0";

        for ($index = 1; $index < count($select_items); $index++) {
            result_array[":item_id".$index] = $select_items[$index];
            $sql_where_items = $sql_where_items.",".":item_id".$index;
        }

        result_array["bind"] = $bind_key;
        result_array["where_items"] = "item_id in (".$sql_where_items.")";
    }
}
?>