<HTML>
<HEAD><TITLE>�p�X���[�h�m�F���</TITLE></HEAD>
<BODY>
<?php
$password = $_POST['pass'];
if(eregi("^[a-z][a-z0-9_]{2,7}$", $password)){
   print "�p�X���[�h�͐������`���ł��B<BR>\n";
}else{
   print "�p�X���[�h�͐������`���ł͂���܂���B<BR>\n";
}
?>
</BODY>
</HTML>
