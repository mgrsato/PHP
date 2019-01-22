<html>
<head>
<title>テーブルの練習</title>
<style type="text/css">
table, td, th {
border: solid 1px #000000;
border-collapse: collapse;
}
</style>
</head>
<body>

<?php
print("<table>");
for( $i = 0; $i < 2; $i++) {
print("<tr>");
print("<td>01</td><td>02</td><td>03</td><td>04</td><td>05</td>");
print("</tr>");
}
print("</table>");
?>

</body>
</html>