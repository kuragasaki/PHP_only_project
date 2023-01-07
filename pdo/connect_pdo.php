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
            // $dbh = new PDO($this->dsn, $this->user, $this->password);
            return new PDO("mysql:dbname=mysql;host=localhost;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "接続失敗: " . $e->getMessage() . "\n";
        }
    }
}
?>
