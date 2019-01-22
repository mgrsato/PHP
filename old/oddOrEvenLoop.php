<html>
<head>
<title>タイトル（さとう）</title>
</head>

<body>
<?php
	function checkNum($num){
		if($num % 2 == 0){
			print "$num は<font color=red>ぐうすう</font>です<BR>\n";
		}else{
			print "$num は<font color=blue>きすう</font>です<BR>\n";
		}
	}

	for( $i = 0; $i < 1000; $i++){
		checkNum($i);
	}
?>
</body>
</html>
