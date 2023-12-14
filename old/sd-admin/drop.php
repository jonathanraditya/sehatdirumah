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
    
    $tanggal = $_POST["tanggal"];
    $extrow = $_POST["cth"];
    $nomor = $_POST["nomor"];
    $vary = $_POST["vary"];
    
    $result= mysqli_query($con, "select $extrow from cases where tanggal='$tanggal'");
        while($row = mysqli_fetch_array($result)){
            
     }
      
    if(mysqli_query($con, "update cases set $extrow='0' where tanggal='$tanggal'")){
             $status = "berhasil";
             $semua = array($status , $extrow, $tanggal , $row[$nomor]);
             echo json_encode($semua);
         } else {
             $status = "gagal";
             $semua = array($status , $extrow, $tanggal , $row[$nomor]);
             echo json_encode($semua);
         }
?>