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
$turn   = htmlspecialchars($_POST['turn']);
$answer = htmlspecialchars($_POST['answer']);
$record = htmlspecialchars($_POST['record']) . func32($answer);

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
  while($i < strlen($input)-1)
  {
    echo inv32($input[$i]) . "→";
    $i = $i+1;
  }
  echo inv32($input[$i]) ;
}
?>
<body>
<h1>結果発表</h1>
<h2>回答</h2>
<blockquote>
<?php 
if($turn==0)echo "<p>あなたは<b>「" . $answer . "」</b>を選びました．<p>";
else if($turn==1)echo "<p>あいては<b>「" . $answer . "」</b>を選びました．</p>";
?>
<center>
<img src="wait3_3.jpg" alt="13は・・・" class="space"><br>
<img src="wait2.jpg" alt="どっちかな" class="space"><br>
<img src="saa_2.jpg" alt="さぁ・・・" class="space"><br>
<?php
//当たりの処理
if($answer==$myNum+$enNum)
{
  echo "<img src='wait_2i.jpg' alt='コロコロ' class='space'><br>
        <img src='success_2.jpg' alt='当たり画像'>";
}
else
{
  echo "<img src='wait_2.jpg' alt='ピロロ' class='space'><br>
        <img src='failure_3.jpg' alt='外れ画像'>";
}
?>
</center>
</blockquote>
<?php
//正解
if($answer==$myNum+$enNum)
{ //自分
  if($turn==0)
  {
    echo "<h2>ゲーム終了</h2><blockquote><p>あなたは勝利しました．</p>";
    //先攻
    if(strlen($record)%2==1)
      echo "<p>◯あなた：".$myNum."　あいて：".$enNum."　回答：";
    //後攻
    else
      echo "<p>あいて：".$enNum."　◯あなた：".$myNum."　回答：";
    readRec($record);
    echo "</p><a href='index.php' class='inv'>トップに戻る<a></blockquote>";
  }
  else if($turn==1)
  {
    echo "<h2>ゲーム終了</h2><blockquote><p>あなたは敗北しました．</p>";
    //先攻
    if(strlen($record)%2==1)
      echo "<p>あなた：".$myNum."　◯あいて：".$enNum."　回答：";
    //後攻
    else
      echo "<p>◯あいて：".$enNum."　あなた：".$myNum."　回答：";
    readRec($record);
    echo "</p><a href='index.php' class='inv'>トップに戻る<a></blockquote>";
  }
}
//外れ
else
{ //自分
  echo "<h2>ゲーム続行</h2>";
  if($turn==0)
  {
?>
  <blockquote>
  <form action="enTurn.php" method="post">
    <input type="hidden" name="myNum" value='<?php echo $myNum ?>'>
    <input type="hidden" name="enNum" value='<?php echo $enNum ?>'>
    <input type="hidden" name="record" value='<?php echo $record ?>'>
    <input type="submit">
  </form>
  </blockquote>
<?php
  }
  //相手
  else if($turn==1)
  {
?>
  <blockquote>
  <form action="myTurn.php" method="post">
    <input type="hidden" name="myNum" value='<?php echo $myNum ?>'>
    <input type="hidden" name="enNum" value='<?php echo $enNum ?>'>
    <input type="hidden" name="record" value='<?php echo $record ?>'>
    <input type="submit">
  </form>
  </blockquote>
<?php
  }
}    
?>
</div>

<hr>
<p>最終更新：<?php echo date("Y.m.d.H:i:s", filemtime("result.php")); ?></p>
</body>
</html>
