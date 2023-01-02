<?php
class ConnectPdo {


    public static function get_connect_info() {
        try {
            $dbh = new PDO($dsn, $user, $password);
            echo "接続成功\n";
        } catch (PDOException $e) {
            echo "接続失敗: " . $e->getMessage() . "\n";
            exit();
        }

        return $dbh;
    }
}


?>