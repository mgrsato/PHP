<HTML>
<HEAD><TITLE>12��������</TITLE></HEAD>
<BODY>
<!--�a�����̓��̓t�H�[��-->
<FORM ACTION="seiza.php" METHOD="POST">
�����𒲂ׂ܂��B<BR>���p�����Œa��������͂��Ă��������B<BR>
<INPUT TYPE="TEXT" NAME="month">��
<INPUT TYPE="TEXT" NAME="day">��
<INPUT TYPE="SUBMIT" VALUE="���ׂ�">
<INPUT TYPE="RESET" VALUE="���Z�b�g"><BR>
 
<?php
//�a�������琯���𒲂ׂ�
//�����F�a����($a=���A$b=��)
//�߂�l�F����
function seiza($a, $b){
   if((($a == 3) && (21 <= $b && $b <= 31)) ||
         (($a == 4) && (1 <= $b && $b <= 20))){
      return "���r��";
   }elseif((($a == 4) && (21 <= $b && $b <= 30)) ||
         (($a == 5) && (1 <= $b && $b <= 21))){
      return "������";
   }elseif((($a == 5) && (22 <= $b && $b <= 31)) ||
         (($a == 6) && (1 <= $b && $b <= 21))){
      return "�o�q��";
   }elseif((($a == 6) && (22 <= $b && $b <= 30)) ||
         (($a == 7) && (1 <= $b && $b <= 22))){
      return "�I��";
   }elseif((($a == 7) && (23 <= $b && $b <= 31)) ||
         (($a == 8) && (1 <= $b && $b <= 22))){
      return "���q��";
   }elseif((($a == 8) && (23 <= $b && $b <= 31)) ||
         (($a == 9) && (1 <= $b && $b <= 23))){
      return "������";
   }elseif((($a == 9) && (24 <= $b && $b <= 30)) ||
          (($a == 10) && (1 <= $b && $b <= 23))){
      return "�V����";
   }elseif((($a == 10) && (24 <= $b && $b <= 31)) ||
         (($a == 11) && (1 <= $b && $b <= 22))){
      return "嶍�";
   }elseif((($a == 11) && (23 <= $b && $b <= 30)) ||
           (($a == 12) && (1 <= $b && $b <= 21))){
      return "�ˎ��";
   }elseif((($a == 12) && (22 <= $b && $b <= 31)) ||
           (($a == 1) && (1 <= $b && $b <= 19))){
      return "�R�r��";
   }elseif((($a == 1) && (20 <= $b && $b <= 31)) ||
           (($a == 2) && (1<= $b && $b <= 18))){
      return "���r��";
   }elseif((($a == 2) && (19 <= $b && $b <= 29)) ||
           (($a == 3) && (1 <= $b && $b <= 20))){
      return "����";
   }else{
      //�Y���̐������Ȃ��Ƃ�
      return "�s��";
   }
}
 
//���̓t�H�[������̃f�[�^�̎󂯎��
$m = $_POST['month'];
$d = $_POST['day'];
 
//�f�[�^���󂯎�����Ƃ�
if($m && $d){
   $s = seiza($m, $d);
   print "$m �� $d �����܂�� $s �ł��B";
}
?>
</FORM>
</BODY>
</HTML>
