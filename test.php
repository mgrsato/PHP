<HTML>
<HEAD><TITLE>おつり</TITLE></HEAD>
<BODY>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$p = $_POST['price'];
$m = $_POST['money'];
$r = $m - $p;
$kouka = array(10000,5000,1000,500,100,50,10,5,1,0);

if($r < 0){
	print "お金が足りません。<BR>\n";
}elseif($m > 100000){
	print "100000円以内のお金を入れてください。<BR>\n";
}elseif($r == 0){
	print "ありがとうございました。おつりはありません。<BR>\n";
}else{
	print "ありがとうございました。おつりは $r 円です。<BR><BR>\n ";
	print "紙幣と硬貨の枚数は次のとおりです。<BR>\n";
	$n=0;
	while($kouka[$n] > 0){
		//print $kouka[$n]. "円玉".(int)($r / $kouka[$n])."枚\n";


		$num = (int)($r / $kouka[$n]);
		if($kouka[$n] == 10000){
			for ($i = 1; $i <= $num; $i++) {
				print "<img src=10000yen.png>";
			}
		}elseif($kouka[$n] == 5000){
			for ($i = 1; $i <= $num; $i++) {
				print "<img src=5000yen.png>";
			}
		}elseif($kouka[$n] == 1000){
			for ($i = 1; $i <= $num; $i++) {
				print "<img src=1000yen.png>";
			}
		}elseif($kouka[$n] == 500){
			for ($i = 1; $i <= $num; $i++) {
				print "<img src=500yen.png>";
			}
		}elseif($kouka[$n] == 100){
			for ($i = 1; $i <= $num; $i++) {
				print "<img src=100yen.png>";
			}
		}elseif($kouka[$n] == 50){
			for ($i = 1; $i <= $num; $i++) {
				print "<img src=50yen.png>";
			}
		}elseif($kouka[$n] == 10){
			for ($i = 1; $i <= $num; $i++) {
				print "<img src=10yen.png>";
			}
		}elseif($kouka[$n] == 5){
			for ($i = 1; $i <= $num; $i++) {
				print "<img src=5yen.png>";
			}
		}elseif($kouka[$n] == 1){
			for ($i = 1; $i <= $num; $i++) {
				print "<img src=1yen.png>";
			}
		}
		//print "<BR>";


		$r = $r % $kouka[$n];
		$n++;
	}
}
?>
<BR><A HREF="konyu2.html">お金を入れ直す</A>
</BODY>
</HTML>
