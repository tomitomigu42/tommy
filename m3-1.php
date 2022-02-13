<!Doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title mission3-1></title>
    </head>
    <body>
        <form action="" method="post">
            名前：<input type="text" value="" name="name" pleceholder=""> <br>
            コメント：<input type="text" value="" name="comment" placeholder=""> <br>
            <input type="submit" value="送信">
        </form>
    </body>
</html>

<?php
$filename="m3-1.txt";
$date=date("Y年m月d日h時i分s秒");
if(!empty($_POST["name"])&&!empty($_POST["comment"])){
    $na=$_POST["name"];
    $com=$_POST["comment"];
        if(file_exists($filename)) {
            $num = count(file($filename))+1;
        } else {
            $num = 1;
        }
    $row=$num."<>".$na."<>".$com."<>".$date;
    $fp=fopen($filename,"a");
    fwrite($fp,$row.PHP_EOL);
    fclose($fp);
}
?>