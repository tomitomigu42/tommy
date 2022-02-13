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
$filename="m3-2.txt";
$date=date("Y年m月d日h時i分s秒");
if(!empty($_POST["name"])&&!empty($_POST["comment"])){
    $na=$_POST["name"];
    $com=$_POST["comment"];
        if(file_exists($filename)) {
            $num = count(file($filename))+1;
        } else {
            $num=1;
        }
    $rows="$num <>　$na <> $com <> $date";
    $fp=fopen($filename,"a");
    fwrite($fp,$rows.PHP_EOL);
    fclose($fp);
    if(file_exists($filename)) {
        $lines =file($filename,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach($lines as $line){
            $row=explode("<>",$line);
            echo $row[0],$row[1],$row[2],$row[3]."<br>";
        }
    }
}
?>