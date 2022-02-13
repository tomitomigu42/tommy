<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>"mission2-1"</title>
    </head>
    <body>
        <form action="" method=post>
            <input type=text name="num" value="" placeholder="コメント">
            <input type=submit value="送信">
        </form>
    </body>
</html>

<?php
$str=$_POST["num"];
$date=date("Y年m月d日h時i分s秒");
$filename="mission2_1.txt";
$fp=fopen($filename,"a");
fwrite($fp,$str.PHP_EOL);
fclose($fp);
if(!empty($str)){
    echo "ご入力ありがとうございます。 <br>".$date."に".$str."を受け付けました";
}
?>


