<?php
session_start();
$pdo = new PDO('mysql:dbname=pbl;host=localhost;','root','126ta1SKR');
$error_message = "";
if(isset($_POST["user_login"])) {
    $user = $_POST["user_id"];
    $stmt = $pdo->prepare('SELECT password FROM login WHERE name = :user LIMIT 1');
    $stmt->bindValue(':user', $user, PDO::PARAM_STR);
    $stmt->execute();
    $pass = $stmt->fetch();
    if($pass != false){
        if($_POST["user_password"] == $pass[0]) {
        $login_success_url = "PBL_SubjectSelect.html";
        header("Location: {$login_success_url}");
        exit;
        }
    }
    $error_message = "※IDもしくはパスワードが間違っています。<br>もう一度入力してください。";
}
unset($pdo);
?>

<!DOCTYPE html>

<html lang = "ja">
    <head>
        <meta charset = "UTF-8">
        <title>高専生用知恵袋</title>
        <link rel = "stylesheet" type = "text/css"  href = "login_form.css">
    </head>
    <body>
        <section class = "top">
            <h1>高専生用知恵袋</h1>
        </section>
        <section class = "middle">
            <form action = "login_form.php" method = "POST">
                <p class = "text">共通認証IDのユーザ名<br><input type = "text" class = "forms" name = "user_id" required></p><br>
                <p class = "text">共通認証IDのパスワード<br><input type = "password" class = "forms" name = "user_password" required></p><br><br>
                <?php
                echo "<font color = \"red\">$error_message</font>";
                ?>
                <div class = "login"><input type = "submit" name = "user_login" value = "ログイン"></div>
            </form>
        </section>
        <section class = "bottom">
            <a href = https://www.sendai-nct.ac.jp>仙台高専</a>
            <a href = https://www.sendai-nct.ac.jp/sclife/kyuko/ku_hirose>休講情報</a>
            <a href = https://bb.kosen-ac.jp>ブラックボード</a>
        </section>
    </body>
</html>