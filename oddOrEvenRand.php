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

	$a = rand(1,1000);
	checkNum($a);
?>
</body>
</html>
