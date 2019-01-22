<?php
//クッキー情報を格納する
   $counter = $_COOKIE['visittimes'];
   //もし変数$counterがあれば値に1増やし、なければ1を代入する
   if(isset($counter)){ //isset()関数で変数があるか調べる
       $counter++;
   }else{
       $counter = 1;
   }
   //もし変数$couterの値が3より大きければクッキーを削除する
   if($counter > 3){
       setcookie('visittimes', $counter, time() - 60);
   }else{
       setcookie('visittimes', $counter);
   }
?>
 
<HTML>
<HEAD><TITLE>訪問回数カウンタ</TITLE></HEAD>
<BODY>
 
<?php
   if($counter == 1){
       //初めてのアクセス
       print "初めまして！<BR>\n";
   }elseif($counter == 2){
       //2回目にアクセスしたときはクライアントのIPアドレスを表示する
       print  $counter . "回目のご訪問ですね。<BR>\n";
       print "あなたのIPアドレスは
          \"".$_SERVER['REMOTE_ADDR']."\"ですね。<BR>\n";
   }elseif($counter == 3){
       //3回目にアクセスしたときはブラウザの種類を表示する
       print  $counter . "回目のご訪問ですね。<BR>\n";
       print "あなたのブラウザは
          \"".$_SERVER['HTTP_USER_AGENT']."\"ですね。<BR>\n";
   }else{
             //4回目にアクセスしたとき 
      print  $counter . "回目のご訪問ですね。<BR>\n";
      print "次回訪問時に訪問回数がリセットされます。<BR>\n";
   }
?>
</BODY>
</HTML>
