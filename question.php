<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>質問</title>
        <link rel="stylesheet" href="question.css">
    </head>
    <body>
        <h1>高専生用知恵袋</h1>
        <h2>質問一覧</h2>
        <p2><a href="kakiko.php"><button type="button">書き込む</button></p2></a>
        <p>
        <?php

        session_start();

        $pdo = new PDO('mysql:host=localhost;dbname=Kakikomi;','root','password');
        
        $error_message = "";
        
        $table= "SELECT * FROM name/*テーブル名*/";
        
        $sql = $pdo->query($table);
        
        foreach($sql as $row){
            echo "名前:" . $row['user_name'/*列名*/] .'<br>' . '書き込み<br>' . $row['kakikomi'/*列名*/].'<br>'.'<br>';
        }
        $sql->execute();
            
        ?>
        </p>
        <a href="branch.html">掲示板トップへ戻る</a>
    </body>
    <footer>
    <a href = https://www.sendai-nct.ac.jp>仙台高専</a><br>
            <a href = https://www.sendai-nct.ac.jp/sclife/kyuko/ku_hirose>休講情報</a><br>
            <a href = https://bb.kosen-ac.jp>ブラックボード</a>
    </footer>
</html>