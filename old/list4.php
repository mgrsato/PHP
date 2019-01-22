<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">table, td, th {border: solid 1px #000000; border-collapse: collapse;}</style>
    <title>list4</title>
</head>
<body>
<?php
    $db_username  = "artsuser"; //DB user name
    $db_password = "artspass";  //DB password
    $db_name = "arts";          //database name
    $db_tablename = "usertable2017";
    $db_host  = "localhost";

    $search_key = htmlspecialchars($_GET['search_key']);
    $updated_string = htmlspecialchars($_GET['updated_string']);

    $db = mysql_connect($db_host, $db_username, $db_password);  
    mysql_select_db($db_name, $db); 
    $strsql = "SET CHARACTER SET UTF8";
    mysql_query($strsql,$db);

    //before
    $str_sql = "select * from " . $db_tablename . " where username = '" . $search_key . "'";
    $rs = mysql_query($str_sql,$db);
    $row=mysql_fetch_array($rs);
    print("----------before----------<br>");
    print("\$row[0] = " . $row[0] . "<br>");
    print("\$row[1] = " . $row[1] . "<br>");
    print("\$row[2] = " . $row[2] . "<br>");
    print("\$row[3] = " . $row[3] . "<br>");
    print("\$row[4] = " . $row[4] . "<br>");
    print("\$row[5] = " . $row[5] . "<br>");
    print("<br>");

    //update
    $str_sql = "update " . $db_tablename . " set memo = '" . $updated_string . "' where username = '" . $search_key . "';";
    mysql_query($str_sql,$db);

    //after
    $str_sql = "select * from " . $db_tablename . " where username = '" . $search_key . "'";
    $rs = mysql_query($str_sql,$db);
    $row=mysql_fetch_array($rs);
    print("----------after----------<br>");
    print("\$row[0] = " . $row[0] . "<br>");
    print("\$row[1] = " . $row[1] . "<br>");
    print("\$row[2] = " . $row[2] . "<br>");
    print("\$row[3] = " . $row[3] . "<br>");
    print("\$row[4] = " . $row[4] . "<br>");
    print("\$row[5] = " . $row[5] . "<br>");
    print("<br>");

    mysql_free_result($rs);
    mysql_close($db);
?>
</body>
</html>