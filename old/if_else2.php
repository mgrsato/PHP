<HTML>
<HEAD>
	<TITLE>平均点</TITLE>
</HEAD>
<BODY>
<?php
#$s = 65;
$s = $_GET['score'];
$a = $_GET['average'];

print "あなたの得点は $s 点です．<br>\n";
print "平均点は $a 点です．<br>\n";

if($s < $a){
	print "平均まであと" . ($a - $s) . "点<br>\n";
	print "がんばりましょう！<br>\n";
}else{
	print "よくできました！<br>\n";
}
?>
</BODY>
</HTML>