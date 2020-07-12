<?php
session_start();

require_once'DSN.php';

// 接続先DBリンク
$connect = "mysql:host={$dsn['host']};dbname={$dsn['dbnm']}";

// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {

    if (empty($_POST["email"])) {  // emptyは値が空のとき
        $errorMessage = 'Emailが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }else {
        $userid = $_POST["email"];

        try {
            $pdo = new PDO($connect, $dsn['user'], $dsn['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $pdo->prepare('SELECT * FROM userData WHERE email = ?');
            $stmt->execute(array($userid));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($_POST["password"] == $row['password']) {

                    $_SESSION["NAME"] = $row['nickname'];
                    header("Location: Home.php");  // メイン画面へ遷移
                    exit();  // 処理終了

                } else {
                    // 認証失敗
                    $errorMessage = 'ログインに失敗しました。';
                }
            
            } catch (PDOException $e) {
                $errorMessage = 'データベースエラー';
                //$errorMessage = $sql;
                // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
                // echo $e->getMessage();
                }
    }
}
?>



<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログイン|Funsehold</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="面倒くさがりな私のための家事ノート。レシピも日記も家計簿も一つのアプリにまとめちゃう" />
        <meta name="keywords" content="家事, レシピ, 献立, 家計簿, 日記, 家事ノート, 買い物リスト" />


        
            <style>
            label {
                display:block;
                float:left;
                width:100px;
            }</style>
    </head>
    <body>
        <h3>ログイン画面にようこそ</h3>
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <label for="email">Email</label><input type="text" id="email" name="email" placeholder="Emailを入力" value="<?php if (!empty($_POST["email"])) {echo htmlspecialchars($_POST["email"], ENT_QUOTES);} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <input type="submit" id="login" name="login" value="ログイン">
            </fieldset>
        </form>
        <div class="loginbtn"><a href="register.php" class="btn">はじめての方はこちらへ</a></div>
    </body>
</html>