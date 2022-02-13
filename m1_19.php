<?php
for($num=0;$num<100; $num=$num+1){
    if($num%3==0&&$num%5==0){
        echo "FizzBuzz <br>";
    }elseif($num%3==0){
        echo "Fiz <br>";
    }elseif($num%5==0){
        echo "Buzz <br>";
    }else{
    echo $num."<br>";
    }
}
?>

