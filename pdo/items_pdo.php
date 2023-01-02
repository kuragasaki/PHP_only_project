<?php

// 先ほど作成したPDOインスタンス作成をそのまま使用します
require_once 'connect_pdo.php';

# クラス作成方法
class ItemsPdo {

    public static function get_items_bind_keyword($keywords[]) {

        # 型が配列かどうかチェック、要素数が１以上かチェック
        if ($keywords) {

        # チェック違反の場合、エラーメッセージを返す
        }

        $where_sql = 'WHERE name like :keyword0';

        $where_bind_map = new array(":keyword0" => $keywords[0]);

        # 要素数チェック
        for ($index = 1; $index < $keywords; $index++) {
        $where_sql += ' or name like :keyword'.$index;

        $where_bind_array[":keyword".$index] = $keywords[$index];
        }

        // SQL文を準備します。「:keyword」がプレースホルダーです。
        $sql = 'SELECT * FROM item '.$where_sql;

        // TODO $dbh 変数を'connect_pdo.php'から取得する
        $dbh = ConnectPdo.get_connect_info();

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