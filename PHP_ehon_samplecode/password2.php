<HTML>
<HEAD><TITLE>パスワード確認画面</TITLE></HEAD>
<BODY>
<?php
$password = $_POST['pass'];
if(eregi("^[a-z][a-z0-9_]{2,7}$", $password)){
   print "パスワードは正しい形式です。<BR>\n";
}else{
   print "パスワードは正しい形式ではありません。<BR>\n";
}
?>
</BODY>
</HTML>
