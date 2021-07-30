<?php
	// $upass = "jols";
	// echo(sha1($upass));

	echo $df = strtotime('2020/03/25');
	echo '<br>';
	echo $dt = strtotime('2020/03/28');
	echo '<br>';
	echo $df = floor($df/(60*60*24));
	echo '<br>';
	echo $dt = floor($dt/(60*60*24));
	echo '<br>';
	date_default_timezone_set('Hongkong');
	echo date('h:i a');
?>