<!Doctype html>
<html lang="ja">
    <head>
       <meta charset="UTF-8">
       <title mission2-2></title>
    </head>
    <body>
        <form ation="" method="post"> 
            <input type="text" name="num" value="" placeholder="コメント">
            <input type="submit" value="送信">
        </form>
    </body>
</html>

<?php
$date=date("Y年m月d日h時i分s秒");
$filename="mission2-4.txt";

if(!empty($_POST["num"])){
    $str=$_POST["num"];
    $fp=fopen($filename,"a");
    fwrite($fp,$str.PHP_EOL);
    fclose($fp);
    if($str=="完成"){
        echo "おめでとう <br>";
    }else{
    echo "ご入力ありがとうございます。 <br>".$date."に".$str."を受け付けました <br>";
    }
}
if(file_exists($filename)){
$lines =file($filename,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach($lines as $line){
echo $line."<br>";
}
}
?>