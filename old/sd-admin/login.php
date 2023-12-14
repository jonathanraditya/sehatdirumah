<?php
session_start();
require 'connect.php';

$password=$_POST['pass'];
$email=$_POST['email'];
$ec=$_POST['uid'];

if($ec=='_8B@yu-P??' or $ec=='43*_spL&bE'){
    $user = mysqli_query($con,"select * from admin where email='$email' and password='$password'");
    $chek = mysqli_num_rows($user);
    
    if($chek > 0){
        while($row=$user->fetch_assoc()){
            $nama=$row['nama'];
            $inisial=$row['inisial'];
        }
        $_SESSION['email'] = $email;
        $_SESSION['nama'] = $nama;
        $_SESSION['inisial'] = $inisial;
        //echo $_SESSION['inisial'];
        //echo $_SESSION['nama'];
        //echo $_SESSION['email'];
        header("refresh:0 url=manage.php");
    } else {
         header("refresh:0 url=../");
    }
}else{
    header("refresh:0 url=../");
}

?>