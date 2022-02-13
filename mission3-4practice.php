<?php
//テキストファイルの作成
$filename1="m3-4-1pra.txt";
$filename2="m3-4-2pra.txt";
$filename3="m3-4-3pra.txt";

//日付
$date=date("Y年m月d日h時i分s秒");

//1工程目：新規フォーム（削除フォームが空白、名前とコメントが空白でない時)
if(empty($_POST["preedit"])&&empty($_POST["delete"])&&!empty($_POST["name"])&&!empty($_POST["comment"])){
    $na=$_POST["name"];
    $com=$_POST["comment"];
    
    //ファイルが存在する場合
    if(file_exists($filename1)) {
        $num=count(file($filename1))+1; //投稿番号をつける（数えた行数＋1）
        
    //ファイルが存在しない場合（投稿番号1について）
        } else {
        $num=1;
    }
    $row="$num<>$na<>$com<>$date"; //結合
    $fp1=fopen($filename1,"a"); //ファイルを開く
    fwrite($fp1,$row.PHP_EOL); //ファイルの書き込み
    fclose($fp1); //ファイルを閉じる
    
    //ファイルが存在する場合
    if(file_exists($filename1)) {
        $lines1=file($filename1,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //ファイル1読み込んで配列にする
        
        //配列の要素を変数として繰り返し処理
        foreach($lines1 as $line1){
            $ex1=explode("<>",$line1); //区切り文字を指定して配列に置き換える
             echo $ex1[0]." ".$ex1[1]." ".$ex1[2]." ".$ex1[3]."<br>"; //スペースを入れて表示
        }
    }
}

//2工程目：削除フォーム（新規フォームが空、削除フォームがからでない場合）
if(empty($_POST["name"])&&empty($_POST["comment"])&&!empty($_POST["delete"])){
    $lines2_1=file($filename1,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //ファイル1を読み込んで配列にする
    $del=$_POST["delete"];
    $fp2_1=fopen($filename2,"w"); //ファイルをwで開く
    
    //1から入力済みの投稿番号まで繰り返す
    for ($j = 0; $j < count($lines2_1); $j++) { 
                    $ex2_1=explode("<>", $lines2_1[$j]); //投稿番号ごとの行の区切り文字を指定する
                    
                    //投稿番号が削除フォームの値と異なる時
                    if ($ex2_1[0]!=$del) { 
                        fwrite($fp2_1,$lines2_1[$j]."\n") ; //ファイルに書き込む
                        
                    //投稿番号が削除フォームの値と同じとき
                    } else { 
                    }
    }                

    fclose($fp2_1); //ファイルを閉じる
    
    //ファイルが存在する場合
    if(file_exists($filename2)) {
        $lines2_2=file($filename2,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //ファイル2を読み込んで配列にする
        
        //配列の要素を変数として繰り返し処理
        foreach($lines2_2 as $line2_2){
            $ex2_2=explode("<>",$line2_2); //区切り文字を指定して配列に置き換える
            echo $ex2_2[0]." ".$ex2_2[1]." ".$ex2_2[2]." ".$ex2_2[3]."<br>"; //スペースを入れて表示
            
        }
    }
}

//3工程目：編集フォーム選択（編集フォームがからでない場合）
if(!empty($_POST["edit"])){
    $edit=$_POST["edit"];
    $lines3=file($filename1,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //ファイル1を読み込んで配列にする
    //ここまではあってるはず
    $lines3_edit=$lines3[$edit-1]; //編集番号と同じ投稿番号の行を変数にする
    $ex3=explode("<>",$lines3_edit);//投稿番号ごとの行の区切り文字を指定する
    $edit_name=$ex3[1]; //編集する名前を取得
    $edit_comment=$ex3[2]; //編集するコメントを取得
}

//4工程目：編集フォーム実行（$preeditがからでないとき）
if(!empty($_POST["preedit"])&&!empty($_POST["name"])&&!empty($_POST["comment"])){
    $preedit=$_POST["preedit"];
    $na=$_POST["name"];
    $com=$_POST["comment"];
    $lines4_1=file($filename1,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //ファイル1を読み込んで配列にする
    
    $fp4=fopen($filename3,"w"); //ファイルを開く

    for($j = 0; $j < count($lines4_1); $j++) { 
        $ex4_1=explode("<>",$lines4_1[$j]); //区切り文字を指定して配列に置き換える
        if($ex4_1[0]==$preedit){
            $ex4_1[1]=$na;
            $ex4_1[2]=$com;
            fwrite($fp4,$ex4_1[0].$ex4_1[1].$ex4_1[2].$ex4_1[3].PHP_EOL); //ファイルの書き込み
        }else{
            fwrite($fp4,$ex4_1[0].$ex4_1[1].$ex4_1[2].$ex4_1[3].PHP_EOL); //ファイルの書き込み
            
        }
            
        
            
   // $lines4_1_preedit=$lines4_1[$preedit-1]; //$preeditと同じ投稿番号の行を変数にする
   // $ex4=explode("<>",$lines4_1_preedit);//投稿番号ごとの行の区切り文字を指定する
    
  
        
    }
    fclose($fp4); //ファイルを閉じる
    
    //ファイルが存在する場合
    if(file_exists($filename3)) {
        $lines4_2=file($filename3,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //ファイル2を読み込んで配列にする
        //配列の要素を変数として繰り返し処理
        foreach($lines4_2 as $line4_2){
            echo $line4_2."<br>"; //スペースを入れて表示
        }
    }
}


?>
<!Doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title mission3-1></title>
    </head>
    <body>
        <!--フォームの作成-->
        <form action="" method="post">
            <input type="text" name="name"  placeholder="名前" value=<?php if(!empty($edit_name)){echo $edit_name;}else{echo "";}?> > <br>
            <input type="text" name="comment" placeholder="コメント" value=<?php if(!empty($edit_comment)){echo $edit_comment;}else{echo "";}?> > <br> 
            <input type="number" name="preedit" placeholder="" value=<?php if(!empty($edit)){echo $edit;}else{echo "";}?> > 
            <input type="submit" value="送信"> <br>
            <input type="number" value="" name="delete" placeholder="削除対象番号">
            <input type="submit" value="削除"> <br>
            <input type="number" value="" name="edit" placeholder="編集対象番号">
            <input type="submit" value="編集"> <br>
        </form>
    </body>
</html>