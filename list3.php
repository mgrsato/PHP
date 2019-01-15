<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">table, td, th {border: solid 1px #000000; border-collapse: collapse;}</style>
    <title>list3</title>
</head>
<body>
<?php
    $db_username  = "artsuser"; //DB user name
    $db_password = "artspass";  //DB password
    $db_name = "arts";          //database name
    $db_tablename = "usertable2017";
    $db_host  = "localhost";

    $search_key = htmlspecialchars($_GET['search_key']);

    $db = mysql_connect($db_host, $db_username, $db_password);  
    mysql_select_db($db_name, $db); 
    $strsql = "SET CHARACTER SET UTF8";
    mysql_query($strsql,$db);
    $str_sql = "select * from " . $db_tablename . " where username = '" . $search_key . "'";
    $rs = mysql_query($str_sql,$db);
    $num = mysql_num_fields($rs);

    print("<table>");
    echo("
    ");
    print("<tr>");
    for ($i=0;$i<$num;$i++){
        print("<td>".mysql_field_name($rs,$i)."</td>");
    }
    print("</tr>");
    while($row=mysql_fetch_array($rs)){
        echo("
        ");
        print("<tr>");
        for($j=0;$j<$num;$j++){
            print("<td>".$row[$j]."</td>");
        }
        print("</tr>");
    }
    print("</table>");

    mysql_free_result($rs);
    mysql_close($db);
?>
</body>
</html>