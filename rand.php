<html>
<head>
<title>タイトル（さとう）</title>
</head>

<body>
<?php
	$x = rand(0, 3);

	if($x == 0){
		print "明日の天気は晴れ<img src=sunny.png>でしょう";
	}else if($x == 1){
		print "明日の天気は曇り<img src=cloudy.png>でしょう";
	}else if($x == 2){
		print "明日の天気は雨<img src=rain.png>でしょう";
	}else{
		print "明日の天気は雪<img src=snow.png>でしょう";
	}
?>
</body>
</html>
