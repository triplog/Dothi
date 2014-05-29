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
$myNum  = htmlspecialchars($_POST['myNum']);
$enNum  = htmlspecialchars($_POST['enNum']);
$record  = htmlspecialchars($_POST['record']);

function func32($input)
{
  if($input<10) return chr(ord('0') + $input);
  else return chr(ord('a') + ($input-10));
}
function inv32($input)
{
  if($input>='a') return ord($input)-ord('a')+10;
  else return $input;  
}
function readRec($input)
{
  $i = 0;
  while($i < strlen($input))
  {
    echo inv32($input[$i]) . "→";
    $i = $i+1;
  }
}
?>

<body>
<h1>あなたのターン</h1>

<div id="main">
<?php
echo "<h2>自分</h2>" . "<q>$myNum</q>";
//  echo "<h2>相手</h2>" . "<q>$enNum</q>";

echo "<h2>ここまでの選択</h2>開始";
echo "<blockquote>";
readRec($record);
echo "</blockquote>";
?>
<h2>回答</h2>
<blockquote>
<p>合計を予想し，送信を押してください．</p>
<form action="result.php" method="post">
  <input type="hidden" name="myNum" value='<?php echo $myNum ?>'>
  <input type="hidden" name="enNum" value='<?php echo $enNum ?>'>
  <input type="hidden" name="turn" value=0>
  <select name="answer">
<!--
    <option selected><?php echo $myNum+1 ?></option>
    <option><?php echo $myNum+2 ?></option>
    <option><?php echo $myNum+3 ?></option>
    <option><?php echo $myNum+4 ?></option>
    <option><?php echo $myNum+5 ?></option>
    <option><?php echo $myNum+6 ?></option>
    <option><?php echo $myNum+7 ?></option>
    <option><?php echo $myNum+8 ?></option>
    <option><?php echo $myNum+9 ?></option>
    <option><?php echo $myNum+10?></option>
-->
<?php
    $answer=$myNum+1;
    while($answer<=$myNum+10)
    {
      if(strpos($record,func32($answer))===false)
        echo    "<option selected>$answer</option>";
      $answer = $answer+1;
    }
?>
  </select>
  <input type="hidden" name="record" value='<?php echo $record?>'>
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
<p>最終更新：<?php echo date("Y.m.d.H:i:s", filemtime("myTurn.php")); ?></p>
</body>
</html>
