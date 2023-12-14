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



?>