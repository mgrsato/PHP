<HTML>
<HEAD><TITLE>����</TITLE></HEAD>
<BODY>


<?php
$m = $_POST['money'];
$r = $m - 120;
$kouka = array(500,100,50,10,5,1,0);

if($r < 0){
	print "����������܂���B<BR>\n";

}elseif($m > 1000){
	print "1000�~�ȓ��̂��������Ă��������B<BR>\n";

}elseif($r == 0){
	print "���肪�Ƃ��������܂����B����͂���܂���B<BR>\n";

}else{
	print "���肪�Ƃ��������܂����B����� $r �~�ł��B<BR><BR>\n ";
	print "�d�݂̖����͎��̂Ƃ���ł��B<BR>\n";
	$n=0;
	while($kouka[$n] > 0){
		print $kouka[$n]. "�~��".(int)($r / $kouka[$n])."��<BR>\n";
		$r = $r % $kouka[$n];
		$n++;
	}
}
?>


<BR><A HREF="konyu.html">��������꒼��</A>
</BODY>
</HTML>
