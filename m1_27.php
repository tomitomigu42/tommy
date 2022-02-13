<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-27</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="num" value="" placeholder="数字を入力してください">
        <input type="submit" value="送信">
    </form>
    
</body>
</html>
            
<?php
$str=$_POST["num"];
$filename="mission_1-27.txt";
$fp=fopen($filename,"a");
if(!empty($str)){
fwrite($fp, $str.PHP_EOL);
fclose($fp);

echo "書き込み成功！<br>";
}

if(file_exists($filename)){
$lines =file($filename,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach($lines as $line){
$num=intval($line);
if($num%3==0&&$num %5==0){
echo "FizzBuzz <br>";
}elseif($num % 3 == 0){
echo "Fizz <br>";
}elseif($num%5==0){
echo "Buzz <br>";
} else{
echo $num."<br>";
}
        
}
}
?>