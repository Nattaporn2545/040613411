<?php
	$m = $_GET["m"];
	$o = $_GET["o"];
    $n = $_GET["n"];
	echo "<b>ยอดขาย</b> คือ ";
	echo $m*30+ $o*70 +$n*30;
?>