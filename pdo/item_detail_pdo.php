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

    function get_item_details($item_id) {

        // $sql_where_category = $this->create_sql_where_category($category_cd);

        // SQL文を準備
        $sql = "$this->select_table
            $sql_where_category";

        $dbh = $this->connectPdo->get_connect_info();
        // if ($dbh instanceof string) {
        //     return $dbh;
        // }

        // if (empty($dbh)) {
        //     print("$dbh 接続先できない");
        // }

        // PDOStatementクラスのインスタンスを生成します。
        $prepare = $dbh->prepare($sql);

        $this->prepare_bind_value($prepare, array(":category_cd", $category_cd));

        // プリペアドステートメントを実行する
        $prepare->execute();
        
        // PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        return $result;




    }

    // private function create_sql_where_category($select_category) {
    //     if (4 == mb_strlen($select_category)) {
    //         return "small_category_cd = :category_cd";
    //     } else if (3 == mb_strlen($select_category)) {
    //         return "middle_category_cd = :category_cd AND small_category_cd is Null";
    //     } else {
    //         return "big_category_cd = :category_cd AND middle_category_cd is Null";
    //     }
    // }
}
?>