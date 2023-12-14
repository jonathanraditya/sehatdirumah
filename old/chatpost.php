<?php

require 'connect.php';
date_default_timezone_set("Asia/Jakarta");

$name=$_POST['namaUser'];
$comment=$_POST['commentUser'];

//date("Y-m-d h:i:s");
$datefor = new \DateTime();
$date= date_format($datefor , "Y-m-d G:i:s");

$cid=(rand(100000, 999999));

if($comment!=NULL){
    $sql = mysqli_query($con, "insert into comment (date, name, content, cid) VALUES ('$date','$name','$comment','$cid')");
    setcookie('gname', $name, time()+(86400*30));
    $callback = array("status |=> success" , "$name");
    echo json_encode($callback);
} else{
    $callback = array("status |=> failed" , "$name");
    echo json_encode($callback);
}
                
?>