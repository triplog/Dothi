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
</nav>


<body>
<h1>血の教誨師ドティ</h1>
<img src="dothi_2.jpg" alt="嘘喰い20巻" height="240" class="migi">
<h2>ルール</h2>
<ol>
  <li>お互いに1～10の番号を選びます．</li>
  <li>2～20を交互に回答し合計数を先に当てた方の勝ちです．</li>
  <li>但し自分の番号から有り得ない数を回答することは<b>不可能</b>です．<br>
    <u>(すなわち，「自分の番号+1～10」しか選べません．)</u></li>
</ol>
<h2>練習</h2>
<blockquote>
<h3>自分　　　※本来は自分で番号を選びます</h3>
<?php
  if(!@$_POST["myNum"])
    $myNum = rand(1, 10);
  else
    $myNum = htmlspecialchars($_POST["myNum"]);
  echo "<q>$myNum</q>";
?>
<h3>相手　　　※本来は相手の番号は見えません</h3>
<?php
  if(!@$_POST["enNum"])
    $enNum = rand(1, 10);
  else
    $enNum = htmlspecialchars($_POST["enNum"]);
  echo "<q>$enNum</q>";
?>
<h3>回答</h3>
<form action="index.php" method="post">
  <input type="hidden" name="myNum" value='<?php echo $myNum ?>'>
  <input type="hidden" name="enNum" value='<?php echo $enNum ?>'>
  <select name="answer">
    <option>2</option>    <option>3</option>    <option>4</option>
    <option>5</option>    <option>6</option>    <option>7</option>
    <option>8</option>    <option>9</option>    <option>10</option>
    <option selected>11</option>
    <option>12</option>    <option>13</option>    <option>14</option>
    <option>15</option>    <option>16</option>    <option>17</option>
    <option>18</option>    <option>19</option>    <option>20</option>
  </select>
  <input type="submit" value="決定">
</form>
<?php
  if(@$_POST['answer']==$enNum+$myNum)
//  echo htmlspecialchars($_GET['answer']);
    echo "<br>".htmlspecialchars($_POST['answer'])." --- 正解！";
  else if((@$_POST['answer']>0 && @$_POST['answer']<=$myNum+1) || @$_POST['answer']>$myNum+10)
    echo "<br>".htmlspecialchars($_POST['answer'])." --- 不適切な回答です！（ゲーム中は選択不可）";
  else if(@$_POST['answer'])
    echo "<br>".htmlspecialchars($_POST['answer'])." --- 外れ！";
  else
    echo "<br>合計をリストから選択し決定を押してください．";
?>
</blockquote>

<h2>ゲームスタート</h2>
<blockquote>
<p>自分の番号を選択</p>
<form action="gameStart.php" method="post">
  <select name="myNum">
    <option selected>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
  </select>
  <input type="submit">
</form>
</blockquote>

</body>

<hr>
<p>最終更新：<?php echo date("Y.m.d.H:i:s", filemtime("index.php")); ?></p>
</body>
</html>
