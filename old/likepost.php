<?php

require 'connect.php';

$likes=$_POST['beforeLike'];
$inclikes= $likes+1;
$cid=$_POST['cid'];


$sql = mysqli_query($con, "update comment set likes='$inclikes' where cid='$cid'");
//header("refresh:0 url=comment.php");



                
?>