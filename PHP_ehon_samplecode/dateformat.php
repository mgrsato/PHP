<HTML>
<HEAD><TITLE>日付のフォーマット変換</TITLE></HEAD>
<BODY>
<?php
$olddate = "2007/ 3/ 1 "; 
if(ereg("^[ 0-9]+/[ 0-9]+/[ 0-9]+$", $olddate)){ 
  //日付であれば、分割して配列に格納する
  list($year, $month, $day) = split('/', $olddate);
  //4桁-2桁-2桁のフォーマットで表示する
  $newdate = sprintf("%04d-%02d-%02d", $year, $month, $day);
  print $newdate;
}else{
  print "日付はありませんでした。<BR>\n";     
}
?>
</BODY>
</HTML>
