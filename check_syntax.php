<?php
//$filename = 'temp/test.txt';
$filename = chmod('/var/www/html/temp/test.txt', 0666);
if (is_writable($filename)) {
    echo 'このファイルは書き込み可能です';
} else {
    echo 'このファイルは書き込みできません';
}
?>