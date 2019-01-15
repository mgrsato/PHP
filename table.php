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
	print("<tr>");
	print("<td>01</td>");
	print("<td>02</td>");
	print("<td>03</td>");
	print("<td>04</td>");
	print("<td>05</td>");
	print("</tr>");
	print("</table>");

	print("<hr>");

	print("<table>");
	print("<tr>");
	print("<td>01</td>");
	print("</tr>");
	print("<tr>");
	print("<td>11</td>");
	print("</tr>");
	print("<tr>");
	print("<td>21</td>");
	print("</tr>");
	print("<tr>");
	print("<td>31</td>");
	print("</tr>");
	print("<tr>");
	print("<td>41</td>");
	print("</tr>");
	print("<tr>");
	print("<td>51</td>");
	print("</tr>");
	print("</table>");

	print("<hr>");

	print("<table>");
	print("<tr>");
	print("<td>01</td><td>02</td><td>03</td><td>04</td><td>05</td>");
	print("</tr>");
	print("<tr>");
	print("<td>11</td><td>12</td><td>13</td><td>14</td><td>15</td>");
	print("</tr>");
	print("</table>");

	print("<hr>");

	print("<table>");
	print("<tr>");
	for( $i = 0; $i < 5; $i++) {
		print("<td>01</td>");
	}
	print("</tr>");
	print("</table>");

	print("<hr>");

	print("<table>");
	for( $i = 0; $i < 5; $i++) {
		print("<tr>");
		print("<td>01</td>");
		print("</tr>");
	}
	print("</table>");

	print("<hr>");

	print("<table>");
	for( $i = 0; $i < 2; $i++) {
		print("<tr>");
		print("<td>01</td><td>02</td><td>03</td><td>04</td><td>05</td>");
		print("</tr>");
	}
	print("</table>");

	print("<hr>");

	print("<table>");
	for( $i = 0; $i < 2; $i++) {
		print("<tr>");
		for( $j = 0; $j < 5; $j++) {
			print("<td>01</td>");
		}
		print("</tr>");
	}
	print("</table>");

	print("<hr>");

	print("<table>");
	for( $i = 0; $i < 2; $i++) {
		print("<tr>");
		for( $j = 0; $j < 5; $j++) {
			print("<td>" . $i . $j . "</td>");
		}
		print("</tr>");
	}
	print("</table>");

?>

</body>
</html>