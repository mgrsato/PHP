<?php
	$db_name = 'enq.db'; //データベース名

	//配列を作成する
	$enq1 = array('有名だから', '家から近いから', '興味があったから',
		'尊敬する人がいるから', 'その他');
	$enq2 = array('雰囲気', '給料', '会社の人たち', 'オフィス環境', 'その他');
	$enq3 = array('秘密', '男性', '女性');
	
	//ファイルが存在するか確認する
	$ext = file_exists($db_name);
	
	//送信ボタンが押されたとき
	if($_POST['submit'] && isset($_POST['ques1']) && isset($_POST['ques2'])) {
		$db = sqlite_open($db_name); // データベースを開く

		//ファイルが無ければ、データベース・テーブルを作成する
		if(!$ext) {
			$query = "CREATE TABLE enq(ans11 int, ans21 int, ans22 int, "
				."ans23 int, ans24 int, ans25 int, ans31 int)";
			$result = sqlite_query($query, $db);
		}

		//問1の入力内容を変数に格納する
		for($i=0; $i<count($enq1); $i++) {
			if($_POST['ques1']['value'] == $i) {
				$ans11 = $i;
				break;
			}
		}
		//問2の入力内容を配列に格納する
        for($i=0; $i<count($enq2); $i++)
			$ans2[$i] = 0;
      for($i=0; $i<count($_POST['ques2']);$i++)
            $ans2[$_POST['ques2'][$i]] =1 ;
		//問3の入力内容を変数に格納する
		for($i=0; $i<count($enq3); $i++) {
			if($_POST['sex']['option value'] == $i) {
				$ans31 = $i;
				break;
			}
		}
		//入力内容をデータベースに書き込む
		$query = "INSERT INTO enq VALUES ($ans11, {$ans2[0]}, {$ans2[1]}, "
			."{$ans2[2]}, {$ans2[3]}, {$ans2[4]}, $ans31)";
		$result = sqlite_query($query, $db);
		
		//データベースを閉じる
		sqlite_close($db);
	}
	
	//ヘッダー出力
	header("Content-Type: text/html;charset=EUC-JP");

function show_result() {
	global $enq1, $enq2, $enq3, $ext, $db_name; //グローバル配列

//データベースが存在しないとき
	if(!$ext) {
		print "<FONT COLOR='RED'>回答がありません</FONT>";
		return;
	}
	//変数の初期化
	for($i=0; $i<count($enq1); $i++)
		$res1[$i] = 0;
	for($i=0; $i<count($enq2); $i++)
		$res2[$i] = 0;
	for($i=0; $i<count($enq3); $i++)
		$res3[$i] = 0;

	//データベースを開いて表を読み込み、集計する
	$db = sqlite_open($db_name);
	$result = sqlite_query("SELECT * FROM enq", $db);
	while($cols = sqlite_fetch_array($result, SQLITE_ASSOC)){
		$res1[$cols['ans11']]++;
		$res2[0] += $cols['ans21'];
		$res2[1] += $cols['ans22'];
		$res2[2] += $cols['ans23'];
		$res2[3] += $cols['ans24'];
		$res2[4] += $cols['ans25'];
		$res3[$cols['ans31']]++;
	}

	//集計表を作成する
	print "<TABLE BORDER='5' WIDTH='30%'>";
	print "<TR><TD>問1</TD><TD WIDTH='20%'>結果</TD></TR>";
	for($i = 0; $i < count($enq1); $i++)
		print "<TR><TD>{$enq1[$i]}</TD><TD>{$res1[$i]}</TD></TR>";
	print "</TABLE><BR>\n";
	print "<TABLE BORDER='5' WIDTH='30%'>";
	print "<TR><TD>問2</TD><TD WIDTH='20%'>結果</TD></TR>";
	for($i = 0; $i < count($enq2); $i++)
		print "<TR><TD>{$enq2[$i]}</TD><TD>{$res2[$i]}</TD></TR>";
	print "</TABLE><BR>\n";
	print "<TABLE BORDER='5' WIDTH='30%'>";
	print "<TR><TD>問3</TD><TD WIDTH='20%'>結果</TD></TR>";
	for($i = 0; $i < count($enq3); $i++)
		print "<TR><TD>{$enq3[$i]}</TD><TD>{$res3[$i]}</TD></TR>";
	print "</TABLE><BR>\n";

	sqlite_close($db); //データベースを閉じる
}
?> 

<HTML><HEAD><TITLE>アンケートサンプル</TITLE></HEAD>
<BODY><CENTER><FORM ACTION="enqlite.php" METHOD="POST" >
<?php
	//条件により表示する画面を変更する
	if($_POST['submit'] && isset($_POST['ques1']) && isset($_POST['ques2'])) {
		print "ご協力ありがとうございました。<BR><BR>\n";
		print "<INPUT TYPE=\"SUBMIT\" NAME=\"back\" VALUE=\"前に戻る\"><BR>\n";
		print "</FORM></CENTER></BODY></HTML>";
		exit;
	} elseif(isset($_GET['show_result'])) {
		show_result();
		print "</FORM></CENTER></BODY></HTML>";
		exit;
	}
?>
簡単なアンケートです。ぜひご協力ください。<BR>
<FONT COLOR="RED">注：問1、問2は必須項目です</FONT><BR><BR>
問1．当社を見学したいと思ったのはなぜですか？<TABLE>
<?php
	for($i = 0; $i < count($enq1); $i++){
		print "<INPUT TYPE=\"RADIO\" NAME=\"ques1\" VALUE=\"$i\">"
			."$enq1[$i]<BR>\n";
	}
?>
</TABLE><BR>
問2．当社で気に入った点は何ですか？（複数選択可）<TABLE>
<?php
	for($i = 0; $i < count($enq2); $i++){
		print "<INPUT TYPE=\"CHECKBOX\" NAME=\"ques2[]\" VALUE=\"$i\">"
			."$enq2[$i]<BR>\n";
	}
?>
</TABLE><BR>
問3．あなたの性別を教えてください<TABLE><SELECT NAME="sex">
<?php
	print "<OPTION VALUE=\"0\" SELECTED>{$enq3['0']}</OPTION>";
	print "<OPTION VALUE=\"1\">{$enq3['1']}</OPTION>";
	print "<OPTION VALUE=\"2\">{$enq3['2']}</OPTION>";
?>
</SELECT></TABLE><BR>
<INPUT TYPE="SUBMIT" NAME="submit" VALUE="送信"> <INPUT TYPE="RESET">
</FORM></CENTER></BODY></HTML>    
