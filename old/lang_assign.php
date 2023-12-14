<?php

$user = "u5256001_admin";
$password = "12345678901324354657687980";
$database = "u5256001_sehat_dirumah";
$con = mysqli_connect('localhost', $user, $password);
    
if(!$con){
    echo 'gak berhasil konek ke server :(';
}
if(!mysqli_select_db($con,"u5256001_sehat_dirumah")){
    echo 'Database Tidak Ada';
}

//Cookie Set
//setcookie('lang', 'en', time()+(86400*30));

//Assign Language
$dkey="select * from display";
$result_dkey = $con->query($dkey);

//Database Display Language
$english=array('ex'=>0);
$bahasa=array('ex'=>0);
while($row_dkey=$result_dkey->fetch_assoc()){
    $english+=array($row_dkey['dkey'] => $row_dkey['english']);
    $bahasa+=array($row_dkey['dkey'] => $row_dkey['bahasa']);
}

//Clone and assign default language
if($_COOKIE['lang']=='en'){
    $dp=$english;
} else if((!isset($_COOKIE['lang']) || $_COOKIE['lang']=='id')){
    $dp=$bahasa;
}

//$url='https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $url;
//echo $_SERVER['REQUEST_URI'];


?>
