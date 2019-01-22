<HTML>
<HEAD>
      <TITLE>12星座調べ</TITLE>
</HEAD>
<BODY>
      <!--誕生日の入力フォーム-->
      <FORM ACTION="seiza2.php" METHOD="POST">
            星座を調べます。<BR>誕生日を選択してください。<BR>
            <select name="month">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
            </select>
            月

            <select name="day">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
            </select>
            日

            <INPUT TYPE="SUBMIT" VALUE="調べる">
            <BR>
      </FORM>

      <?php
      //誕生日から星座を調べる
      //引数：誕生日($a=月、$b=日)
      //戻り値：星座
      function seiza($a, $b){
            if((($a == 3) && (21 <= $b && $b <= 31)) ||
            (($a == 4) && (1 <= $b && $b <= 20))){
                  return array("牡羊座", 1);
            }elseif((($a == 4) && (21 <= $b && $b <= 30)) ||
            (($a == 5) && (1 <= $b && $b <= 21))){
                  return array("牡牛座", 2);
            }elseif((($a == 5) && (22 <= $b && $b <= 31)) ||
            (($a == 6) && (1 <= $b && $b <= 21))){
                  return array("双子座", 3);
            }elseif((($a == 6) && (22 <= $b && $b <= 30)) ||
            (($a == 7) && (1 <= $b && $b <= 22))){
                 return array("蟹座", 4);
            }elseif((($a == 7) && (23 <= $b && $b <= 31)) ||
            (($a == 8) && (1 <= $b && $b <= 22))){
                  return array("獅子座", 5);
            }elseif((($a == 8) && (23 <= $b && $b <= 31)) ||
            (($a == 9) && (1 <= $b && $b <= 23))){
                  return array("乙女座", 6);
            }elseif((($a == 9) && (24 <= $b && $b <= 30)) ||
            (($a == 10) && (1 <= $b && $b <= 23))){
                  return array("天秤座", 7);
            }elseif((($a == 10) && (24 <= $b && $b <= 31)) ||
            (($a == 11) && (1 <= $b && $b <= 22))){
                  return array("蠍座", 8);
            }elseif((($a == 11) && (23 <= $b && $b <= 30)) ||
            (($a == 12) && (1 <= $b && $b <= 21))){
                  return array("射手座", 9);
            }elseif((($a == 12) && (22 <= $b && $b <= 31)) ||
            (($a == 1) && (1 <= $b && $b <= 19))){
                  return array("山羊座", 10);
            }elseif((($a == 1) && (20 <= $b && $b <= 31)) ||
            (($a == 2) && (1<= $b && $b <= 18))){
                  return array("水瓶座", 11);
            }elseif((($a == 2) && (19 <= $b && $b <= 29)) ||
            (($a == 3) && (1 <= $b && $b <= 20))){
                  return array("魚座", 12);
            }else{
            //該当の星座がないとき
                  return array("不明", 0);
            }
      }

      //入力フォームからのデータの受け取り
      $m = $_POST['month'];
      $d = $_POST['day'];

      //データを受け取ったとき
      if($m && $d){
            list($s, $num) = seiza($m, $d);
            print "$m 月 $d 日生まれは $s です。";
            print "<br><img src='" . $num . ".png' width='25%' height='25%'>";
      }
      ?>
</BODY>
</HTML>
