<?php
$time_start = microtime(true); 

include_once('display-function.php');


$correct=casesWhoCorrection();
echo $correct;


$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start)*1000;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' ms';
// if you get weird results, use number_format((float) $execution_time, 10)

?>