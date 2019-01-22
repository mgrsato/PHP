<html>
<head>
	<title>タイトル</title>
</head>
<body>
<hr>
<h1>PHPの基本</h1>
<hr>
<h2>1.1.ルール</h2>
<h3>(1)プログラムの範囲</h3>
echo 'あいうえお';
<br>
<?php
	echo 'かきくけこ';
?>
<br>
echo 'さしすせそ';



<h3>(2)HTMLとPHPを混ぜて書く</h3>
<?php
	echo 'たちつてと';
?>
<b>なにぬねの</b>
<?php echo 'はひふへほ'; ?>


<hr>
<h2>1.2.for　ループ，繰り返し</h2>
<h3>(3)繰り返し</h3>
<?php
	for ($i = 1; $i <= 10; $i++) {
		echo 'あいうえお';
	}
?>


<h3>(4)添え字も出力</h3>
<?php
	for ($i = 1; $i <= 10; $i++) {
		echo 'かきくけこ（' . $i . '）';
	}
?>


<hr>
<h2>1.3.if　分岐（ぶんき），分かれ道</h2>
<h3>(5)分岐</h3>
<?php
	$a = 10;
	$b = 5;
 
	if ($a > $b){
		echo 'aはbより大きい';
	}
?>


<h3>(6)条件に当てはまらない場合の処理</h3>
<?php
	$c = 10;
	$d = 5;
 
	if ($c == $d){
		echo 'cとdは同じ';
	}else{
		echo 'cとdは同じではない';
	}
?>


<h3>(7)文字列の比較</h3>
<?php
	$e = 'あいうえお';
	$f = 'あいうえお';
 
	if ($e === $f){
		echo 'eとfは同じ';
	}else{
		echo 'eとfは同じではない';
	}
?>


<hr>
<h2>1.4.if　変数（へんすう）</h2>
<h3>(8)変数</h3>
<?php
	$param01 = 'あいうえお';
	echo $param01;
 
	$param02 = 100;
	echo $param02;
?>


<hr>
<h2>1.5.配列（はいれつ）</h2>
<h3>(9)配列</h3>
<?php
	$param03[0] = 'あいうえお'; 
	$param03[1] = 'かきくけこ';
 
	echo $param03[0];
	echo $param03[1];
?>


<h3>(10)配列（array関数）</h3>
<?php
	$param04 = array('さしすせそ', 'たちつてと', 'なにぬねの');
 
	echo $param04[0];
	echo $param04[1];
	echo $param04[2];
?>


<hr>
<h2>1.6.配列の使い方</h2>
<h3>(11)セレクトボックス（HTML）</h3>
<select name="都道府県">
	<option value="青森県">青森県</option>
	<option value="岩手県">岩手県</option>
	<option value="秋田県">秋田県</option>
	<option value="宮城県">宮城県</option>
	<option value="山形県">山形県</option>
	<option value="福島県">福島県</option>
</select>


<h3>(12)セレクトボックス（変数）</h3>
<?php
	$aomori = '青森県'; 
	$iwate = '岩手県';
	$akita = '秋田県'; 
	$miyagi = '宮城県'; 
	$yamagata = '山形県'; 
	$hukusima = '福島県'; 
?> 
 
<select name="都道府県">
	<option value="<?php echo $aomori;?>"><?php echo $aomori;?></option>
	<option value="<?php echo $iwate;?>"><?php echo $iwate;?></option>
	<option value="<?php echo $akita;?>"><?php echo $akita;?></option>
	<option value="<?php echo $miyagi;?>"><?php echo $miyagi;?></option>
	<option value="<?php echo $yamagata ;?>"><?php echo $yamagata;?></option>
	<option value="<?php echo $hukusima;?>"><?php echo $hukusima;?></option>
</select>


<h3>(13)セレクトボックス（配列）</h3>
<select name="都道府県">
<?php
	$kenmei = array('青森県','岩手県','秋田県','宮城県','山形県','福島県');
	for($i = 0; $i < count($kenmei); $i++) {
		//echo "<option value='” . $kenmei[$i] . “'>” . $kenmei[$i] . “</option>";
		echo "<option value=\"{$kenmei[$i]}\">{$kenmei[$i]}</option>";
	}
?>
</select>


<hr>
<h2>1.7.//　と　/* ... */</h2>
<h3>(14)コメント</h3>
<?php
	echo 'あいうえお';
	//echo 'かきくけこ';
	echo 'さしすせそ';
	/*
	echo 'たちつてと';
	echo 'なにぬねの';
	*/
	echo 'はひふへほ';
?>


</body>
</html>