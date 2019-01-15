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
for( $i = 1; $i <= 100; $i++) {
print("<tr>");
for( $j = 1; $j <= 50; $j++) {
print("<td>" . $i * $j . "</td>");
}
print("</tr>");
}
print("</table>");
?>

</body>
</html>