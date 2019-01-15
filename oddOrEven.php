<html>
<head>
<title>タイトル（さとう）</title>
</head>

<body>
<?php
	function checkNum($num){
		if($num % 2 == 0){
			print "$num はぐうすうです";
		}else{
			print "$num はきすうです";
		}
	}

	checkNum(5);
?>
</body>
</html>
