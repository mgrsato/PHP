<HTML>
<HEAD>
	<TITLE>平均点</TITLE>
</HEAD>
<BODY>
<?php
$s1 = $_GET['score1'];
$s2 = $_GET['score2'];
$s3 = $_GET['score3'];
$s4 = $_GET['score4'];
$s5 = $_GET['score5'];

print "得点１は $s1 点です．<br>\n";
print "得点２は $s2 点です．<br>\n";
print "得点３は $s3 点です．<br>\n";
print "得点４は $s4 点です．<br>\n";
print "得点５は $s5 点です．<br>\n";

$a = ($s1 + $s2 + $s3 + $s4 + $s5)/5;

print "平均点は $a 点です．<br>\n";

if($s1 < $a){
	print "得点１は平均まであと" . ($a - $s1) . "点<br>\n";
	print "がんばりましょう！<br>\n";
}else{
	print "よくできました！<br>\n";
}
?>
</BODY>
</HTML>