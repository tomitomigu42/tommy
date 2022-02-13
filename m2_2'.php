<!Doctype html>
<html lang="ja">
    <head>
       <meta charset="UTF-8">
       <title mission2-2></title>
    </head>
    <body>
        <form ation="" method="post"> 
            <input type="type="text" name="num" value="" placeholder="コメント">
            <inputsubmit" value="送信">
        </form>
    </body>
</html>

<?php
$date=date("Y年m月d日h時i分s秒");

if(!empty($_POST["num"])){
    $str=$_POST["num"];
    $filename="mission2-2.txt";
    $fp=fopen($filename,"a");
    fwrite($fp,$str.PHP_EOL);
    fclose($fp);
    if($str=="完成"){
        echo "おめでとう";
    }else{
    echo "ご入力ありがとうございます。 <br>".$date."に".$str."を受け付けました";
    }
}
?>