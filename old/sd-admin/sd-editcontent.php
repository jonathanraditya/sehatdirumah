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

$reg_dkey=$_POST['display-key'];
$d_change=$_POST['data-change'];
$language=$_POST['lang'];

$change_data="update display set $language='$d_change' where dkey='$reg_dkey'";

if(!mysqli_query($con,$change_data)){
    header('refresh:0; url=sd-failed.php');
} else{
    header('refresh:0; url=manage.php');
}


?>