<HTML>
<HEAD>
	<TITLE>平均点</TITLE>
</HEAD>
<BODY>
<?php
#$s = 65;
$s = $_GET['score'];

print "あなたの得点は $s 点です．<br>\n";

if($s < 70){
	print "平均まであと" . (70 - $s) . "点<br>\n";
	print "がんばりましょう！<br>\n";
}else{
	print "よくできました！<br>\n";
}
?>
</BODY>
</HTML>