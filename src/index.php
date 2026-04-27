<?php
// docker-compose.yml のデフォルト設定に合わせた値
$host     = 'db';          // サービス名
$dbname   = 'db_mydb';  // MYSQL_DATABASE: ${DB_NAME:-mydatabase}
$user     = 'db_user';        // MYSQL_USER: ${DB_USER:-user}
$password = 'password';    // MYSQL_PASSWORD: ${DB_PASSWORD:-password}

try {
    // データソース名 (DSN) を構築。スペースを入れないのがコツです
    $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
    
    // PDOで接続
    $db = new PDO($dsn, $user, $password);
    
    // エラーが起きたら例外を投げる設定（デバッグしやすくなります）
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 接続テスト用（画面に何も出なければ成功です）
    // echo "DBに接続できました！";

} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サンプル</title>
</head>
<body>
    <ul>
        <li><a href="../admin/login.php">管理者ページ</a></li>
        <li><a href="/user/application_form/index.php">申し込みページ</a></li>
        <li><a href="/html/index.html">メールの送信テスト</a></li>
        <li><a href="../user/top.php">ユーザートップ画面</a></li>
    </ul>
</body>
</html>
