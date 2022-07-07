<?php
    $name = $_POST['name']; //ここ前ページから受け取る
    $dsn = 'mysql:host=127.0.0.1;dbname=kosen;charset=utf8';
    $db_user = 'root';
    $db_pass = 's1901037';//基本空白
    $driver_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $db_user, $db_pass, $driver_options);
    } catch (PDOException $e) {
        exit('データベース接続失敗。' . $e->getMessage());
    }

    //教科のテーブル
    $SQL_sub="SELECT * FROM SubGrade WHERE Grade = 0";
    $stmt_sub = $pdo->query($SQL_sub);
    $row_sub = $stmt_sub->fetchAll(PDO::FETCH_ASSOC);

    //教科テーブルのレコード長取得
    $SQL_length = "SELECT COUNT(*) FROM SubGrade WHERE Grade = 0";
    $length = $pdo->query($SQL_length);
    $length_i = ($length->fetch(PDO::FETCH_BOTH))['COUNT(*)'];

    unset($pdo);
?>

<!DOCTYPE html>
<html lang = " ja ">
    <head>
        <title>教科選択[全学年]</title>
        <meta charset="UTF-8">
        <!--CSS-->
        <style>
            *{
                margin:0;
                padding:0;
            }
            #Face{
                background: rgb(92, 92,177);
            }
            body{
                background: lightblue;
            }
            a{
                text-decoration: none;
            }
            ul{
                list-style: none;
            }
            #subList{
                margin:20px 50% 0px 10px;
            }
            .SubjectSelect{
                margin:20px 0% 50px 60%;
                padding: 0.5em 1em;
                width: 100%;
                background: rgb(241, 230, 230);
                border-top: solid 5px #5d627b;
                box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
            }
            nav{
                float: left;
                margin:20px 0  0 0.5%; 
                padding: 0.5em 1em;
                width: 20%;
                font-size: 20px;
                background: rgb(241, 230, 230);
                border-top: solid 5px #5d627b;
                box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
            }
            nav a:hover,.SubjectSelect ul a:hover{
                color: #F66496;
	            font-size: 22px;
	            font-weight: bold;
            }
            nav a,.SubjectSelect ul a{
                color: #E66496;
                font-size: 20px;
                margin: 10pt;
            }
            .UnderLine{
                border-bottom: 1px solid #F68496;
                width: 100%;
                margin: 5px auto;
            }
            footer{
                padding: 0.5em 1em;
                background: white;
            }
            footer.a{
                float: left;
            }
        </style>
        <!--CSS　ここまで-->
    </head>

    <body>
        <div id="Face">
            <h1 style="margin: 0 10px">教科選択[全学年]</h1>
        </div>
        <nav><!--左側-->
            <div style="margin: 0 10pt 0;">全学年版</div><div class="UnderLine"></div>
            <form name="fGC" method="POST" action="PBL_SubjectSelect_SameGrade.php">
                <input type=hidden name=name value=<?php echo $name;?>>
            </form>
            <div id="GradeChange"><a href=javascript:document.fGC.submit()>➣同学年版</a></div>
        </nav>
        
        <div id="subList"><!--右側-->
        <div class="SubjectSelect">
            <ul>
                <?php
                    for($i = 0;$i < $length_i - 1;$i++){
                        $kamoku = $row_sub[$i]['Subject'];
                        echo("<form name='f". $i ."' method='POST' action='test.php'>");//////////action部分変更
                            echo("<input type=hidden name=kamoku value=". $kamoku .">");
                            echo("<input type=hidden name=name value=". $name .">");
                        echo("</form>");
                        echo("<li><a href='javascript:document.f". $i .".submit()'>".($row_sub[$i]['Subject'])."</a></li><div class='UnderLine'></div>");
                    }
                    $i+1;
                    $kamoku = $row_sub[$i]['Subject'];
                    echo("<form name='f". $i ."' method='POST' action='test.php'>");//////////action部分変更
                            echo("<input type=hidden name=kamoku value=". $kamoku .">");
                            echo("<input type=hidden name=name value=". $name .">");
                    echo("</form>");
                    echo("<li><a href='javascript:document.f". $i .".submit()'>".($row_sub[$length_i-1]['Subject'])."</a></li>");
                ?>
            </ul>
        </div>
        </div>
    </body>

    <footer>
        <a href="https://www.sendai-nct.ac.jp/">>学校ホームページ</a>
        <a href="https://www.sendai-nct.ac.jp/sclife/kyuko/ku_hirose/">>休講情報</a>
        <a href="https://bb.kosen-ac.jp/">>ブラックボード</a>
        <p style="text-align: center">© 2022 総合型PBL G1-1</p>
    </footer>
</html> 