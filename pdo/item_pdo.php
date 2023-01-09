<?php

// 先ほど作成したPDOインスタンス作成をそのまま使用します
require_once 'connect_pdo.php';
// include_once './connect_pdo.php';

# クラス作成方法
class ItemPdo {

    private ConnectPdo $connectPdo;

    private string $count_table = "SELECT count(*)
        FROM item_info";

    private string $select_table = "SELECT item_info.item_id AS item_id
        , item_detail.item_name AS item_name
        , category.category_name AS category_name
        , item_detail.price AS price
        , item_info.create_date AS create_date
        FROM item_info";

    private string $inner_join_category = "INNER JOIN category
        ON item_info.category_id = category.category_id";

    private string $inner_join_item_detail = "INNER JOIN item_detail
        ON item_info.item_id = item_detail.item_id";
    
    // private string $order_by = "ORDER BY item_id asc, create_date desc";

    private string $limit  = "LIMIT 20";

    function __construct() {
        if (!empty($connectPdo)) {
            return;
        }

        $this->connectPdo = new ConnectPdo();
    }

    function get_count_items() {

        // SQL文を準備
        $count_sql = "$this->count_table
                $this->inner_join_category
                $this->inner_join_item_detail";

        $dbh = $this->connectPdo->get_connect_info();
        // if ($dbh instanceof string) {
        //     return $dbh;
        // }

        // if (empty($dbh)) {
        //     print("$dbh 接続先できない");
        // }

        // PDOStatementクラスのインスタンスを生成します。
        $prepare = $dbh->query($count_sql);
        
        // クエリを実行する
        $count = $prepare->fetchColumn();

        return $count;
    }

    function get_items() {

        // SQL文を準備
        $sql = "$this->select_table
                $this->inner_join_category
                $this->inner_join_item_detail
                $this->limit";

        $dbh = $this->connectPdo->get_connect_info();
        // if ($dbh instanceof string) {
        //     return $dbh;
        // }

        // if (empty($dbh)) {
        //     print("$dbh 接続先できない");
        // }


        // PDOStatementクラスのインスタンスを生成します。
        $prepare = $dbh->prepare($sql);
                    
        // プリペアドステートメントを実行する
        $prepare->execute();
        
        // PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function get_item_count_and_items($keywords = null, $select_category = null, $order_select = [], $page_number = 1) {
        $where_bind_array = array();
        $where_sql = '';
        $where_category_cd = '';

        if (!is_null($keywords)) {
            $keyword_array = create_sql_where_keyword($keywords);
            $where_bind_array = array_merge($where_bind_array, $keyword_array['where_bind_array']);
            $where_sql = $keyword_array['where_sql'];
        }

        if (!is_null($select_category)) {
            $where_bind_array[":category_cd"] = $select_category;
            $where_category_cd = $this->create_sql_where_category($select_category);
        }

        // SQL文の一部を準備
        $where_count_sql = "$this->inner_join_category
            $where_category_cd
            $this->inner_join_item_detail
            $where_sql";

        $dbh = $this->connectPdo->get_connect_info();

        if ($dbh instanceof string) {
            return $dbh;
        }
        
        $count = $this->get_items_bind_count($dbh, $where_count_sql, $where_bind_array);

        $order_by = "";
        if (is_array($order_select) && $order_select) {
            $order_by = "order by ".$order_select['order'];

            if ($order_select['ascFlg']) {
                $order_by += $order_by." asc";
            } else {
                $order_by += $order_by." desc";
            }
        }

        $offset_start = "";
        $offset_index = ($page_number - 1) * 20;
        if ($offset_index > 0) {
            // $where_bind_array[":offset_index"] = $offset_index;
            // $offset_start = "OFFSET :offset_index";
            $offset_start = "OFFSET $offset_index";
        }

        // SQL文の一部を準備
        $where_items_sql = "$where_count_sql
            $order_by
            $this->limit
            $offset_start";

        $items = $this->get_items_bind_keyword($dbh, $where_items_sql, $where_bind_array);

        return array(
            'count' => $count
            ,'item_list' => $items
        );
    }

    private function get_items_bind_count($dbh, $where_count_sql, $where_bind_array) {

        // SQL文を準備
        $count_sql = "$this->count_table
                $where_count_sql";

        // PDOStatementクラスのインスタンスを生成します。
        $prepare = $dbh->prepare($count_sql);

        $this->prepare_bind_value($prepare, $where_bind_array);
        // // 値のbind設定
        // foreach ($where_bind_array as $key -> $value) {
        //     $bind_value = $value;
        //     if (strpos($key,'keyword') !== false) {
        //         // PDO::PARAM_STRは、SQL 文字列 データ型を表します。
        //         $bind_value = '%'. $bind_value .'%';
        //     }
            
        //     $prepare->bindValue($key, $bind_value, PDO::PARAM_STR);
        // }
                    
        // プリペアドステートメントを実行する
        $prepare->execute();
        
        return $prepare->fetchColumn();
    }

    private function get_items_bind_keyword($dbh, $where_items_sql, $where_bind_array) {

        // SQL文を準備
        $sql = "$this->select_table
            $where_items_sql";

        // PDOStatementクラスのインスタンスを生成します。
        $prepare = $dbh->prepare($sql);

        $this->prepare_bind_value($prepare, $where_bind_array);

        // プリペアドステートメントを実行する
        $prepare->execute();
        
        // PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    private function create_sql_where_keyword($keywords) {
        $where_bind_array = array();
        $where_sql = 'WHERE name like :keyword0';

        # 要素数チェック
        for ($index = 1; $index < $keywords; $index++) {
            $where_sql += ' or name like :keyword'.$index;

            $where_bind_array[":keyword".$index] = $keywords[$index];
        }

        return array(
            'where_sql' => $where_sql
            , 'where_bind_array' => $where_bind_array
        );
    }

    private function create_sql_where_category($select_category) {
        if (4 == mb_strlen($select_category)) {
            return "AND category.small_category_cd = :category_cd";
        } else if (3 == mb_strlen($select_category)) {
            return "AND category.middle_category_cd = :category_cd";
        } else {
            return "AND category.big_category_cd = :category_cd";
        }
    }

    private function prepare_bind_value($prepare, $where_bind_array) {
        // 値のbind設定
        foreach ($where_bind_array as $key => $value) {
            $bind_value = $value;
            if (strpos($key,'keyword') !== false) {
                // PDO::PARAM_STRは、SQL 文字列 データ型を表します。
                $bind_value = '%'. $value .'%';
            }
            
            $prepare->bindValue($key, $bind_value, PDO::PARAM_STR);
        }
    }
}
?>