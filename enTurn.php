<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ドティ見習い</title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="./../../../main.css">
<link rel="stylesheet" href="./../../pg.css">
<link rel="stylesheet" href="dothi.css">
<?php   date_default_timezone_set('Asia/Tokyo'); ?>
</head>
<nav id="breadcrumbs">
<a href="./../../../">ホーム</a> &gt;
<a href="./../../">プログラミング</a> &gt;
<a href="./../">月1</a> &gt;
<a href="./">ドティ</a> &gt;
</nav>


<?php //入力
$myNum  = htmlspecialchars(@$_POST['myNum']);
$enNum  = htmlspecialchars(@$_POST['enNum']);
$record  = htmlspecialchars(@$_POST['record']);

if($record!=""){ //リジェクトしないと無限ループにハマってしまう．
  $min = ((maxStr(readPRec($record))>11)?maxStr(readPRec($record))-10:1);
  $max = ((minStr(readPRec($record))<11)?minStr(readPRec($record))-1:10);
}
else{
  $min = 1;
  $max = 10;
}

function func32($input){
  if($input<10)
    return chr(ord('0') + $input);
  else
    return chr(ord('a') + ($input-10));
}
function inv32($input){
  if($input>='a')
    return ord($input) - ord('a')+10;
  else
    return $input;  
}
function readRec($input){
  $i = 0;
  while($i < strlen($input)){
    echo inv32($input[$i]) . "→";
    $i = $i+1;
  }
}
function readPRec($input){
  $i = 0;
  $temp = "";
  while($i < strlen($input)/2 ){
    $temp = $input[strlen($input)-1-$i*2] . $temp ;
    $i = $i+1;
  }
  return $temp;
}
function minStr($input){
  $temp = ($input[0]>='a')?inv32($input[0]):$input[0];
  $i = 1;
  while($i < strlen($input)){
    if($temp > (($input[$i]>='a')?inv32($input[$i]):$input[$i]))
      $temp = ($input[$i]>='a')?inv32($input[$i]):$input[$i];
    $i = $i+1 ;
  }
  return $temp;
}
function maxStr($input){
  $temp = ($input[0]>='a')?inv32($input[0]):$input[0];
  $i = 1;
  while($i < strlen($input)){
    if($temp < (($input[$i]>='a')?inv32($input[$i]):$input[$i]))
      $temp = ($input[$i]>='a')?inv32($input[$i]):$input[$i];
    $i = $i+1 ;
  }
  return $temp;
}
?>
<body>
<h1>あいてのターン</h1>
<div id="main">
<?php
echo "<h2>自分</h2>" . "<q>$myNum</q>";
//echo "<h2>相手</h2>" . "<q>$enNum</q>";

echo "<h2>ここまでの選択</h2>";
echo "<blockquote>開始→";
readRec($record);
echo "</blockquote>";
//echo <p>readPRec($record);<p>

echo "<h2>回答</h2>";
echo "<blockquote><p>相手が選択</p>";

$answer = 0;
//弱い
//  $answer = rand($enNum+1, $enNum+10);
//普通
//while(($answer<$enNum+1)||($enNum+10<$answer)||(strpos($record, func32($answer))!==false))
//    $answer = rand(1, 10) + rand(1, 10);
//強い
while(($answer<$enNum+$min)||($enNum+$max<$answer)||(strpos($record, func32($answer))!==false))
  $answer = rand(1, 10) + rand(1, 10);
//ズル
//$min = ($enNum+$myNum>11)?11:$enNum+$myNum;
//$max = ($enNum+$myNum<11)?11:$enNum+$myNum;
//while(($answer<$min)||($max<$answer)||(strpos($record, func32($answer))!==false))
//    $answer = rand(1, 10);
/*
  while(($answer<$enNum+1)||($enNum+10<$answer)||(strpos($record, func32($answer))!==false))
  $answer = (rand(1, 10)+rand(1, 10)+rand(1,10)+rand(1,10)) / 2; //←小数点以下考慮要るかも．
*/
?>
<form action="result.php" method="post">
  <input type="hidden" name="myNum" value='<?php echo $myNum ?>'>
  <input type="hidden" name="enNum" value='<?php echo $enNum ?>'>
  <input type="hidden" name="turn" value=1>
  <input type="hidden" name="answer" value='<?php echo $answer ?>'>
  <input type="hidden" name="record" value='<?php echo $record ?>'>
  <input type="submit">
</form>
</blockquote>
</div>

<div id="sidebar">
<img src="thinking_2.jpg" alt="考え中" class="migi" height="240">
</div>

<div id="footer">
</div>

<hr>
<p>最終更新：<?php echo date("Y.m.d.H:i:s", filemtime("enTurn.php")); ?></p>
</body>
</html>
