﻿<html>
<head>
<title>タイトル（さとう）</title>
</head>

<body>
<?php
	function addnum($a, $b){
		$c = $a + $b;
		return $c;
	}

	$x = 2;
	$y = 3;
	$z = addnum($x, $y);

	print "$x + $y = $z";
?>
</body>
</html>