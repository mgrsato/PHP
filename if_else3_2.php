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


print "得点1 $s1 点 ";
for ($i = 1; $i <= $s1; $i++) {
    print "<img src=star.png>";
}
print "<br>\n";

print "得点2 $s2 点 ";
for ($i = 1; $i <= $s2; $i++) {
    print "<img src=star.png>";
}
print "<br>\n";

print "得点3 $s3 点 ";
for ($i = 1; $i <= $s3; $i++) {
    print "<img src=star.png>";
}
print "<br>\n";

print "得点4 $s4 点 ";
for ($i = 1; $i <= $s4; $i++) {
    print "<img src=star.png>";
}
print "<br>\n";

print "得点5 $s5 点 ";
for ($i = 1; $i <= $s5; $i++) {
    print "<img src=star.png>";
}
print "<br>\n";


$a = ($s1 + $s2 + $s3 + $s4 + $s5)/5;

print "平均点は $a 点です．<br>\n";

if($s1 < $a){
	print "国語は全教科の平均まであと" . ($a - $s1) . "点<br>\n";
	print "がんばりましょう！<br>\n";
}else{
	print "よくできました！<br>\n";
}
?>
</BODY>
</HTML>