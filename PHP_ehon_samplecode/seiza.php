<HTML>
<HEAD><TITLE>12星座調べ</TITLE></HEAD>
<BODY>
<!--誕生日の入力フォーム-->
<FORM ACTION="seiza.php" METHOD="POST">
星座を調べます。<BR>半角数字で誕生日を入力してください。<BR>
<INPUT TYPE="TEXT" NAME="month">月
<INPUT TYPE="TEXT" NAME="day">日
<INPUT TYPE="SUBMIT" VALUE="調べる">
<INPUT TYPE="RESET" VALUE="リセット"><BR>
 
<?php
//誕生日から星座を調べる
//引数：誕生日($a=月、$b=日)
//戻り値：星座
function seiza($a, $b){
   if((($a == 3) && (21 <= $b && $b <= 31)) ||
         (($a == 4) && (1 <= $b && $b <= 20))){
      return "牡羊座";
   }elseif((($a == 4) && (21 <= $b && $b <= 30)) ||
         (($a == 5) && (1 <= $b && $b <= 21))){
      return "牡牛座";
   }elseif((($a == 5) && (22 <= $b && $b <= 31)) ||
         (($a == 6) && (1 <= $b && $b <= 21))){
      return "双子座";
   }elseif((($a == 6) && (22 <= $b && $b <= 30)) ||
         (($a == 7) && (1 <= $b && $b <= 22))){
      return "蟹座";
   }elseif((($a == 7) && (23 <= $b && $b <= 31)) ||
         (($a == 8) && (1 <= $b && $b <= 22))){
      return "獅子座";
   }elseif((($a == 8) && (23 <= $b && $b <= 31)) ||
         (($a == 9) && (1 <= $b && $b <= 23))){
      return "乙女座";
   }elseif((($a == 9) && (24 <= $b && $b <= 30)) ||
          (($a == 10) && (1 <= $b && $b <= 23))){
      return "天秤座";
   }elseif((($a == 10) && (24 <= $b && $b <= 31)) ||
         (($a == 11) && (1 <= $b && $b <= 22))){
      return "蠍座";
   }elseif((($a == 11) && (23 <= $b && $b <= 30)) ||
           (($a == 12) && (1 <= $b && $b <= 21))){
      return "射手座";
   }elseif((($a == 12) && (22 <= $b && $b <= 31)) ||
           (($a == 1) && (1 <= $b && $b <= 19))){
      return "山羊座";
   }elseif((($a == 1) && (20 <= $b && $b <= 31)) ||
           (($a == 2) && (1<= $b && $b <= 18))){
      return "水瓶座";
   }elseif((($a == 2) && (19 <= $b && $b <= 29)) ||
           (($a == 3) && (1 <= $b && $b <= 20))){
      return "魚座";
   }else{
      //該当の星座がないとき
      return "不明";
   }
}
 
//入力フォームからのデータの受け取り
$m = $_POST['month'];
$d = $_POST['day'];
 
//データを受け取ったとき
if($m && $d){
   $s = seiza($m, $d);
   print "$m 月 $d 日生まれは $s です。";
}
?>
</FORM>
</BODY>
</HTML>
