<HTML>
<HEAD><TITLE>���t�̃t�H�[�}�b�g�ϊ�</TITLE></HEAD>
<BODY>
<?php
$olddate = "2007/ 3/ 1 "; 
if(ereg("^[ 0-9]+/[ 0-9]+/[ 0-9]+$", $olddate)){ 
  //���t�ł���΁A�������Ĕz��Ɋi�[����
  list($year, $month, $day) = split('/', $olddate);
  //4��-2��-2���̃t�H�[�}�b�g�ŕ\������
  $newdate = sprintf("%04d-%02d-%02d", $year, $month, $day);
  print $newdate;
}else{
  print "���t�͂���܂���ł����B<BR>\n";     
}
?>
</BODY>
</HTML>
