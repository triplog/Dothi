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
?>
<body>
<h1>ゲームスタート</h1>
<center>
<img src="start_2.jpg" alt="開始画像">
</center>
<h2>あなたの番号</h2>
<blockquote>
<?php echo "<p>あなたは<b>「" . $myNum . "」</b>を選びました．</p>"; ?>
</blockquote>
<h2>開始準備</h2>
<blockquote>
<?php
$enNum = rand(1, 10);
$turn  = rand(0,  1);
$record= "";

if($turn==0) echo "<p>あなたは<b>「先　攻」</b>です．</p>";
else echo "<p>あなたは<b>「後　攻」</b>です．</p>";
//echo "<p>あいては<b>「" . $enNum . "」</b>を選びました．</p>";
?>
</blockquote>
<h2>開始</h2>
<blockquote>
<p>送信をクリック</p>
<?php
if($turn==0)
{
?>
  <form action="myTurn.php" method="post">
    <input type="hidden" name="myNum" value='<?php echo $myNum ?>'>
    <input type="hidden" name="enNum" value='<?php echo $enNum ?>'>
    <input type="hidden" name="record" value='<?php echo $record ?>'>
    <input type="submit">
  </form>
<?php
}
else
{
?>
  <form action="enTurn.php" method="post">
    <input type="hidden" name="myNum" value='<?php echo $myNum ?>'>
    <input type="hidden" name="enNum" value='<?php echo $enNum ?>'>
    <input type="hidden" name="record" value='<?php echo $record ?>'>
    <input type="submit">
  </form>
<?php
}
?>
</blockquote>
</div>

<hr>
<p>最終更新：<?php echo date("Y.m.d.H:i:s", filemtime("gameStart.php")); ?></p>
</body>
</html>
