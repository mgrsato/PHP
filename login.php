<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">table, td, th {border: solid 1px #000000; border-collapse: collapse;}</style>
    <title>login</title>
</head>
<body>
<?php
    $db_username  = "artsuser"; //DB user name
    $db_password = "artspass";  //DB password
    $db_name = "arts";          //database name
    $db_tablename = "usertable2017";
    $db_host  = "localhost";

    $search_key1 = htmlspecialchars($_GET['search_key1']);
    $search_key2 = htmlspecialchars($_GET['search_key2']);

    $db = mysql_connect($db_host, $db_username, $db_password);  
    mysql_select_db($db_name, $db); 
    $strsql = "SET CHARACTER SET UTF8";
    mysql_query($strsql,$db);
    $str_sql = "select * from " . $db_tablename . " where username = '" . $search_key1 . "'";
    $rs = mysql_query($str_sql,$db);
    $row=mysql_fetch_array($rs);

    print("\$row[0] = " . $row[0] . "<br>");
    print("\$row[1] = " . $row[1] . "<br>");
    print("\$row[2] = " . $row[2] . "<br>");
    print("\$row[3] = " . $row[3] . "<br>");
    print("\$row[4] = " . $row[4] . "<br>");
    print("<br>");
    
    if($search_key2 == $row[2]){
        print("<p>ログイン成功</p>");
        print("<b>" . $row[3] . "</b>さん、こんにちは");
    }else{
        print("<p>ログイン失敗</p>");
        print("ユーザー名かパスワードが違っているようです");
    }

    mysql_free_result($rs);
    mysql_close($db);
?>
</body>
</html>