<?php
  // �f�[�^�t�@�C���̓ǂݍ���
  $data_file = 'keijiban.txt';
  $ext = file_exists($data_file);
  $lines = $ext ? file($data_file) : array();
  
  // [��������]�{�^���������ꂽ�Ƃ�
  if($_POST['submit']) {
    // �G���[�Ȃ烁�b�Z�[�W��ݒ�
    if(!$_POST['name']){
      $errMsg = '���O����͂��Ă�������<BR>';
    }
    elseif(!$_POST['free']){
      $errMsg .= '�L������͂��Ă�������';
    }
    
    //�G���[���b�Z�[�W���ݒ肳��Ȃ�������V�K�f�[�^��ǉ�
    if(!$errMsg){
      //�^�O�Ȃǂ�K�p�����Ȃ��֐�
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
      
      // �V�K�f�[�^���J���}��؂�e�L�X�g�Ƃ��A�z��̐擪�ɒǉ�
      $data = "$no,$name,$free,$delkey,$time\n";
      array_unshift($lines, $data);      
    }
  }

 // [�폜]�{�^���������ꂽ��A�w���No�ƍ폜�L�[��
  // �����f�[�^�Ƃ��ꂼ���v�������̂�T���č폜
  if($_POST['delbtn'] && $ext) {
    for($i = 0; $i < count($lines); $i++) {
        $ln = explode(",", $lines[$i]);
        if($ln[0] == $_POST['no'] && $ln[3] == $_POST['Rdkey']) {
          array_splice($lines, $i, 1);
          break;
        }
    }
  }
 
// [��������]�܂���[�폜]�����ꂩ�̃{�^����������Ă�����A
  // ��L�z����t�@�C���ɏ�������
  if($_POST['submit'] || $_POST['delbtn']) {
    $fk = fopen($data_file, 'w');
      foreach($lines as $line)
        fputs($fk, $line);
    fclose($fk);
  }
?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD><TITLE>�G�{�̌f����</TITLE></HEAD>
<BODY>
<FORM METHOD="POST" ACTION="keijiban.php">
<CENTER>
<H1>�G�{�̌f����</H1>
No�F<INPUT TYPE="TEXT" NAME="no" SIZE="5">
�폜�L�[: <INPUT TYPE="TEXT" NAME="Rdkey" SIZE="27">
<INPUT TYPE="SUBMIT" NAME="delbtn" VALUE="�폜"><BR>
 
<?php
  //�G���[���b�Z�[�W���ݒ肳�ꂽ�Ƃ��\��
  if($errMsg)
    echo "<FONT COLOR = 'RED'>".$errMsg."</FONT>";
?>

<TABLE BORDER = "1" ALIGN = "CENTER"><TR><TD>
���O�F<INPUT TYPE="TEXT" NAME="name" SIZE="27">
�폜�L�[�F<INPUT TYPE="TEXT" NAME="delkey" SIZE="27"><BR>
�L��<BR>
<TEXTAREA NAME="free" COLS="60" ROWS="8"></TEXTAREA><BR>
<BR><CENTER>
<INPUT TYPE="SUBMIT" NAME="submit" VALUE="��������">
<INPUT TYPE="RESET" VALUE="������">
</CENTER></TD></TR></TABLE>
<BR><HR><BR>
 
<?php
  //�t�@�C�������s���ǂݍ��݃e�[�u���ɃZ�b�g���Ă���
  foreach($lines as $line) {
    $ln = explode(",", $line);
    echo "<TABLE CELLSPACING=3 RULES='ROWS' WIDTH='500'><TR>";
    echo "<TH ALIGN='LEFT'>[No.".$ln[0]."]���O�F".$ln[1]."</TH>";
    echo "<TH ALIGN='RIGHT'>�����ݓ��t�F".$ln[4]."</TH>";
    echo "</TR><TR>";
    echo "<TD ALIGN='LEFT' COLSPAN='2'>".$ln[2]."</TD>";
    echo "</TR></TABLE><BR>";
  }
?>
 
</CENTER>
</FORM>
</BODY>
</HTML>
