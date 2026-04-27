<?php
echo "<h1>Docker ネットワーク＆同期チェック</h1>";

// 1. ファイル同期の確認
echo "<p>① この画面が見えているなら、ファイルの同期は正常です。</p>";

// 2. 名前解決（DNS）の確認
$host = 'db';
$ip = gethostbyname($host);
echo "<p>② 'db' のIPアドレス変換結果: <b>" . htmlspecialchars($ip) . "</b></p>";

if ($ip === $host) {
    echo "<h2 style='color:red;'>【判定】Dockerのネットワークが壊れています！</h2>";
    echo "<p>PHPが 'db' という名前のコンテナを見つけられていません。</p>";
} else {
    echo "<h2 style='color:green;'>【判定】ネットワークは正常です（IPが見つかりました）！</h2>";
    
    // 3. 念のための接続テスト
    try {
        $pdo = new PDO("mysql:host=db;dbname=db_mydb;charset=utf8mb4", 'db_user', 'password');
        echo "<h2 style='color:blue;'>★なんとDB接続にも成功しました！</h2>";
        echo "<p>元の dbconnect.php の中の文字（見えない全角スペースなど）がおかしい可能性が高いです。</p>";
    } catch (PDOException $e) {
        echo "<h3>★IPは分かったけどDB接続は失敗:</h3><p>" . $e->getMessage() . "</p>";
    }
}
