<?php
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("laravel", $conn);

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

/*mysql_query("TRUNCATE tabella1");
mysql_query("TRUNCATE tabella2");*/

/*$end = rand(1000000,10000000);
$end = 2000000;

$query1 = "INSERT INTO `tabella1`(`k1`, `k2`) VALUES ";
$query2 = "INSERT INTO `tabella2`(`k1`, `k2`) VALUES ";
for($i=0;$i<$end; $i++){

	$k1 = $i;
	$k2 = rand(1,99999999);
	
	if(mysql_query($query2.(" ('".$k1."','".$k2."')"))){
		mysql_query($query1.(" ('".$k1."','".$k2."')")) or die(mysql_error()."\n");
	}

	echo $i."/".$end."\n";
}*/

$q = mysql_query("SELECT * FROM tabella1 WHERE k1 > 0 AND k2 > 0");
while($r = mysql_fetch_assoc($q)){
	$array = $r;
}


$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo "\n\nPage generated in ".$total_time.' seconds.';
?>