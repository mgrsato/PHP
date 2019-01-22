<?php
	$db_name = 'enq.db'; //�f�[�^�x�[�X��

	//�z����쐬����
	$enq1 = array('�L��������', '�Ƃ���߂�����', '����������������',
		'���h����l�����邩��', '���̑�');
	$enq2 = array('���͋C', '����', '��Ђ̐l����', '�I�t�B�X��', '���̑�');
	$enq3 = array('�閧', '�j��', '����');
	
	//�t�@�C�������݂��邩�m�F����
	$ext = file_exists($db_name);
	
	//���M�{�^���������ꂽ�Ƃ�
	if($_POST['submit'] && isset($_POST['ques1']) && isset($_POST['ques2'])) {
		$db = sqlite_open($db_name); // �f�[�^�x�[�X���J��

		//�t�@�C����������΁A�f�[�^�x�[�X�E�e�[�u�����쐬����
		if(!$ext) {
			$query = "CREATE TABLE enq(ans11 int, ans21 int, ans22 int, "
				."ans23 int, ans24 int, ans25 int, ans31 int)";
			$result = sqlite_query($query, $db);
		}

		//��1�̓��͓��e��ϐ��Ɋi�[����
		for($i=0; $i<count($enq1); $i++) {
			if($_POST['ques1']['value'] == $i) {
				$ans11 = $i;
				break;
			}
		}
		//��2�̓��͓��e��z��Ɋi�[����
        for($i=0; $i<count($enq2); $i++)
			$ans2[$i] = 0;
      for($i=0; $i<count($_POST['ques2']);$i++)
            $ans2[$_POST['ques2'][$i]] =1 ;
		//��3�̓��͓��e��ϐ��Ɋi�[����
		for($i=0; $i<count($enq3); $i++) {
			if($_POST['sex']['option value'] == $i) {
				$ans31 = $i;
				break;
			}
		}
		//���͓��e���f�[�^�x�[�X�ɏ�������
		$query = "INSERT INTO enq VALUES ($ans11, {$ans2[0]}, {$ans2[1]}, "
			."{$ans2[2]}, {$ans2[3]}, {$ans2[4]}, $ans31)";
		$result = sqlite_query($query, $db);
		
		//�f�[�^�x�[�X�����
		sqlite_close($db);
	}
	
	//�w�b�_�[�o��
	header("Content-Type: text/html;charset=EUC-JP");

function show_result() {
	global $enq1, $enq2, $enq3, $ext, $db_name; //�O���[�o���z��

//�f�[�^�x�[�X�����݂��Ȃ��Ƃ�
	if(!$ext) {
		print "<FONT COLOR='RED'>�񓚂�����܂���</FONT>";
		return;
	}
	//�ϐ��̏�����
	for($i=0; $i<count($enq1); $i++)
		$res1[$i] = 0;
	for($i=0; $i<count($enq2); $i++)
		$res2[$i] = 0;
	for($i=0; $i<count($enq3); $i++)
		$res3[$i] = 0;

	//�f�[�^�x�[�X���J���ĕ\��ǂݍ��݁A�W�v����
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

	//�W�v�\���쐬����
	print "<TABLE BORDER='5' WIDTH='30%'>";
	print "<TR><TD>��1</TD><TD WIDTH='20%'>����</TD></TR>";
	for($i = 0; $i < count($enq1); $i++)
		print "<TR><TD>{$enq1[$i]}</TD><TD>{$res1[$i]}</TD></TR>";
	print "</TABLE><BR>\n";
	print "<TABLE BORDER='5' WIDTH='30%'>";
	print "<TR><TD>��2</TD><TD WIDTH='20%'>����</TD></TR>";
	for($i = 0; $i < count($enq2); $i++)
		print "<TR><TD>{$enq2[$i]}</TD><TD>{$res2[$i]}</TD></TR>";
	print "</TABLE><BR>\n";
	print "<TABLE BORDER='5' WIDTH='30%'>";
	print "<TR><TD>��3</TD><TD WIDTH='20%'>����</TD></TR>";
	for($i = 0; $i < count($enq3); $i++)
		print "<TR><TD>{$enq3[$i]}</TD><TD>{$res3[$i]}</TD></TR>";
	print "</TABLE><BR>\n";

	sqlite_close($db); //�f�[�^�x�[�X�����
}
?> 

<HTML><HEAD><TITLE>�A���P�[�g�T���v��</TITLE></HEAD>
<BODY><CENTER><FORM ACTION="enqlite.php" METHOD="POST" >
<?php
	//�����ɂ��\�������ʂ�ύX����
	if($_POST['submit'] && isset($_POST['ques1']) && isset($_POST['ques2'])) {
		print "�����͂��肪�Ƃ��������܂����B<BR><BR>\n";
		print "<INPUT TYPE=\"SUBMIT\" NAME=\"back\" VALUE=\"�O�ɖ߂�\"><BR>\n";
		print "</FORM></CENTER></BODY></HTML>";
		exit;
	} elseif(isset($_GET['show_result'])) {
		show_result();
		print "</FORM></CENTER></BODY></HTML>";
		exit;
	}
?>
�ȒP�ȃA���P�[�g�ł��B���Ђ����͂��������B<BR>
<FONT COLOR="RED">���F��1�A��2�͕K�{���ڂł�</FONT><BR><BR>
��1�D���Ђ����w�������Ǝv�����̂͂Ȃ��ł����H<TABLE>
<?php
	for($i = 0; $i < count($enq1); $i++){
		print "<INPUT TYPE=\"RADIO\" NAME=\"ques1\" VALUE=\"$i\">"
			."$enq1[$i]<BR>\n";
	}
?>
</TABLE><BR>
��2�D���ЂŋC�ɓ������_�͉��ł����H�i�����I���j<TABLE>
<?php
	for($i = 0; $i < count($enq2); $i++){
		print "<INPUT TYPE=\"CHECKBOX\" NAME=\"ques2[]\" VALUE=\"$i\">"
			."$enq2[$i]<BR>\n";
	}
?>
</TABLE><BR>
��3�D���Ȃ��̐��ʂ������Ă�������<TABLE><SELECT NAME="sex">
<?php
	print "<OPTION VALUE=\"0\" SELECTED>{$enq3['0']}</OPTION>";
	print "<OPTION VALUE=\"1\">{$enq3['1']}</OPTION>";
	print "<OPTION VALUE=\"2\">{$enq3['2']}</OPTION>";
?>
</SELECT></TABLE><BR>
<INPUT TYPE="SUBMIT" NAME="submit" VALUE="���M"> <INPUT TYPE="RESET">
</FORM></CENTER></BODY></HTML>    
