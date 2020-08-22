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
                    $_SESSION["email"] = $row['email'];
                    header("Location: index.php");  // メイン画面へ遷移
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

require './vendor/autoload.php';
$smarty = new Smarty();
$smarty->display('head.tpl');

?>




    <body>
        <h3 class="fh5co-logo">ログイン画面にようこそ</h3>
        <div class="overlay">
            <div class="container">
                <div class="row">    
                    <form id="loginForm" name="loginForm" action="" method="POST">
                            <fieldsettable>
                                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                                <label for="email">Email</label><input type="text" id="email" name="email" placeholder="Emailを入力" value="<?php if (!empty($_POST["email"])) {echo htmlspecialchars($_POST["email"], ENT_QUOTES);} ?>">
                                <br>
                                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                                <br>
                                <div class="loginbtn"><input type="submit" id="login" name="login" value="ログイン"></div>
                            </fieldset>
                    </form>
                </div>
            </div>
            <div class="loginbtn"><a href="register.php" class="btn">はじめての方はこちらへ</a></div>
        </div>
    </body>
</html>