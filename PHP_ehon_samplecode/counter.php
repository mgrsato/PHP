<?php
//�N�b�L�[�����i�[����
   $counter = $_COOKIE['visittimes'];
   //�����ϐ�$counter������Βl��1���₵�A�Ȃ����1��������
   if(isset($counter)){ //isset()�֐��ŕϐ������邩���ׂ�
       $counter++;
   }else{
       $counter = 1;
   }
   //�����ϐ�$couter�̒l��3���傫����΃N�b�L�[���폜����
   if($counter > 3){
       setcookie('visittimes', $counter, time() - 60);
   }else{
       setcookie('visittimes', $counter);
   }
?>
 
<HTML>
<HEAD><TITLE>�K��񐔃J�E���^</TITLE></HEAD>
<BODY>
 
<?php
   if($counter == 1){
       //���߂ẴA�N�Z�X
       print "���߂܂��āI<BR>\n";
   }elseif($counter == 2){
       //2��ڂɃA�N�Z�X�����Ƃ��̓N���C�A���g��IP�A�h���X��\������
       print  $counter . "��ڂ̂��K��ł��ˁB<BR>\n";
       print "���Ȃ���IP�A�h���X��
          \"".$_SERVER['REMOTE_ADDR']."\"�ł��ˁB<BR>\n";
   }elseif($counter == 3){
       //3��ڂɃA�N�Z�X�����Ƃ��̓u���E�U�̎�ނ�\������
       print  $counter . "��ڂ̂��K��ł��ˁB<BR>\n";
       print "���Ȃ��̃u���E�U��
          \"".$_SERVER['HTTP_USER_AGENT']."\"�ł��ˁB<BR>\n";
   }else{
             //4��ڂɃA�N�Z�X�����Ƃ� 
      print  $counter . "��ڂ̂��K��ł��ˁB<BR>\n";
      print "����K�⎞�ɖK��񐔂����Z�b�g����܂��B<BR>\n";
   }
?>
</BODY>
</HTML>
