<?php

header("Location: https://sehatdirumah.com/");

$art=$_GET['a'];
include('display-function.php');

if(isset($art)){
    require('article-view.php');
}else{
    require('article-landing.php');
}



?>