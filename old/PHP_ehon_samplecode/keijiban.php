<?php
  // データファイルの読み込み
  $data_file = 'keijiban.txt';
  $ext = file_exists($data_file);
  $lines = $ext ? file($data_file) : array();
  
  // [書き込む]ボタンが押されたとき
  if($_POST['submit']) {
    // エラーならメッセージを設定
    if(!$_POST['name']){
      $errMsg = '名前を入力してください<BR>';
    }
    elseif(!$_POST['free']){
      $errMsg .= '記事を入力してください';
    }
    
    //エラーメッセージが設定されなかったら新規データを追加
    if(!$errMsg){
      //タグなどを適用させない関数
      function convert_str($str){
        $str = htmlspecialchars($str);
        $str = ereg_replace("\n|\r|\r\n","<BR>",$str);
        return $str;
      }
      
      $ln = explode(",", $lines[0]);
      $no = $ext ? sprintf("%03d", $ln[0]+1) : "001";
      $name = convert_str($_POST['name']);
      $free = convert_str($_POST['free']);
      $delkey = $_POST['delkey'] ? convert_str($_POST['delkey']) : '#####';
      
      $time = date("Y/m/d H:i:s");
      
      // 新規データをカンマ区切りテキストとし、配列の先頭に追加
      $data = "$no,$name,$free,$delkey,$time\n";
      array_unshift($lines, $data);      
    }
  }

 // [削除]ボタンが押されたら、指定のNoと削除キーが
  // 既存データとそれぞれ一致したものを探して削除
  if($_POST['delbtn'] && $ext) {
    for($i = 0; $i < count($lines); $i++) {
        $ln = explode(",", $lines[$i]);
        if($ln[0] == $_POST['no'] && $ln[3] == $_POST['Rdkey']) {
          array_splice($lines, $i, 1);
          break;
        }
    }
  }
 
// [書き込む]または[削除]いずれかのボタンが押されていたら、
  // 上記配列をファイルに書き込む
  if($_POST['submit'] || $_POST['delbtn']) {
    $fk = fopen($data_file, 'w');
      foreach($lines as $line)
        fputs($fk, $line);
    fclose($fk);
  }
?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE>絵本の掲示板</TITLE></HEAD>
<BODY>
<FORM METHOD="POST" ACTION="keijiban.php">
<CENTER>
<H1>絵本の掲示板</H1>
No：<INPUT TYPE="TEXT" NAME="no" SIZE="5">
削除キー: <INPUT TYPE="TEXT" NAME="Rdkey" SIZE="27">
<INPUT TYPE="SUBMIT" NAME="delbtn" VALUE="削除"><BR>
 
<?php
  //エラーメッセージが設定されたとき表示
  if($errMsg)
    echo "<FONT COLOR = 'RED'>".$errMsg."</FONT>";
?>

<TABLE BORDER = "1" ALIGN = "CENTER"><TR><TD>
名前：<INPUT TYPE="TEXT" NAME="name" SIZE="27">
削除キー：<INPUT TYPE="TEXT" NAME="delkey" SIZE="27"><BR>
記事<BR>
<TEXTAREA NAME="free" COLS="60" ROWS="8"></TEXTAREA><BR>
<BR><CENTER>
<INPUT TYPE="SUBMIT" NAME="submit" VALUE="書き込む">
<INPUT TYPE="RESET" VALUE="取り消す">
</CENTER></TD></TR></TABLE>
<BR><HR><BR>
 
<?php
  //ファイルから一行ずつ読み込みテーブルにセットしていく
  foreach($lines as $line) {
    $ln = explode(",", $line);
    echo "<TABLE CELLSPACING=3 RULES='ROWS' WIDTH='500'><TR>";
    echo "<TH ALIGN='LEFT'>[No.".$ln[0]."]名前：".$ln[1]."</TH>";
    echo "<TH ALIGN='RIGHT'>書込み日付：".$ln[4]."</TH>";
    echo "</TR><TR>";
    echo "<TD ALIGN='LEFT' COLSPAN='2'>".$ln[2]."</TD>";
    echo "</TR></TABLE><BR>";
  }
?>
 
</CENTER>
</FORM>
</BODY>
</HTML>
