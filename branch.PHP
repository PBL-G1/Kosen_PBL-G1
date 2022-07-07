<?php
    $kamoku_mei = array( '国語', '算数', '理科');
    $age = 1;
?>
<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset = "UTF-8">
        <title>高専生用知恵袋</title>
        <link rel = "stylesheet"  href = "branch.css">
    </head>
    <body>
        <h1>
            <?PHP
                print( $kamoku_mei[ $_GET['kamoku']]);
            ?>
        </h1>
        <nav class = "sidebar">
            <ul>
                <li><a href="q">化学</a></li>
                <li><a href="a">国語</a></li>
                <li><a href="w">電気回路(基礎)・電子回路</a></li>
                <li><a href="s">物理</a></li>    
            </ul>
            </nav>
        <div class = "main">
            <nav class = "Past_paper">
                <h2>過去問置き場</h2>
                <h3>2020年</h3>
                <ul>
                    <li><a href="<?php print($age);?>">前期中間試験</a></li><div class="UnderLine"></div>
                    <li><a href="2">前期期末試験</a></li><div class="UnderLine"></div>
                    <li><a href="3">後期中間試験</a></li><div class="UnderLine"></div>
                    <li><a href="4">後期期末試験</a></li><div class="UnderLine"></div>
                </ul>
                <br>
                <h3>2020年</h3>
                <ul>
                    <li><a href="5">前期中間試験</a></li><div class="UnderLine"></div>
                    <li><a href="6">前期期末試験</a></li><div class="UnderLine"></div>
                    <li><a href="7">後期中間試験</a></li><div class="UnderLine"></div>
                    <li>後期期末試験(まだありません)</li><div class="UnderLine"></div>
                </ul>
            </nav>
            <nav class = "Bulletin_board">
                <h2>質問用掲示板</h2>
                <ul>
                    <li><a href="8" target="_blank" rel="noopener noreferrer">質問1</a></li><div class="UnderLine"></div>
                    <li><a href="9" target="_blank" rel="noopener noreferrer">質問2</a></li><div class="UnderLine"></div>
                </ul>
            </nav>
        </div>
    </body>
</html>