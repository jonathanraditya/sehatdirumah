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
    
    $cityCode = array("ac","be","ja","bb","kr","la","ri","sb","ss","su","bt","gr","jk","jb","jt","ji","yo","kb","ks","kt","ki","ku","ma","mu","ba","nb","nt","pa","pb","sr","sn","st","sg","sa","id","wl");
    
    $tanggal = $_POST["tanggal"];
    $code = $_POST["code"];
    $case = $_POST["tcase"];
    $recovery = $_POST["recovery"];
    $death = $_POST["death"];
    
    if($case=='' || $case==null){
        $hcase = '';
    } else {
        $hcase = intval($case);
    }
    
    if($recovery=='' || $recovery==null){
        $hrecovery = '';
    } else {
        $hrecovery = intval($recovery);
    }
    
    if($death=='' || $death==null){
        $hdeath = '';
    } else {
        $hdeath = intval($death);
    }
    
    
    //$sql = mysqli_query($con , "insert into cases (tanggal , ".$code."_t , ".$code."_tr , ".$code."_td) values ('$tanggal' ,  '$hcase' , '$hrecovery' , '$hdeath')");
    //check overwrite => yes / no
    //$code = "ac";
    //$case = 10;
   // $recovery = 10;
    //$death = 10;
    //$result = mysqli_query($con, "select * from cases where tanggal='$tanggal'and ($code"."_t='$case' or $code"."_tr='$recovery' or $code"."_td='$death')");
    //$jml = mysqli_num_rows($result);
    
    /*if($jml=="1" || $jml==1){
        mysqli_query($con, "update cases set tanggal=$tanggal , ".$code."_t='$case' , ".$code."_tr='$recovery' , ".$code."_td='$death'
                            where tanggal='$tanggal' and ($code"."_t='$case' or $code"."_tr='$recovery' or $code"."_td='$death')");
        $typ = "overwrite";
    } else {
        mysqli_query($con , "insert into cases (tanggal , ".$code."_t , ".$code."_tr , ".$code."_td) values ('$tanggal' ,  '$hcase' , '$hrecovery' , '$hdeath')");
        $typ = "input";
    }*/
    
    
    if($hcase==null || $hcase==''){
        $case1 = mysqli_query($con , "select $code"."_t from cases where tanggal='$tanggal'");
        while($row1 = mysqli_fetch_array($case1)){
            $isinya1 = $row1[0];
        }
    } else {
        $isinya1 = $hcase;
    }
    
    if($hrecovery==null || $hrecovery==''){
        $case2 = mysqli_query($con , "select $code"."_te from cases where tanggal='$tanggal'");
        while($row2 = mysqli_fetch_array($case2)){
            $isinya2 = $row2[0];
        }
    } else {
        $isinya2 = $hrecovery;
    }
    
    if($hdeath==null || $hdeath==''){
        $case3 = mysqli_query($con , "select $code"."_td from cases where tanggal='$tanggal'");
        while($row3 = mysqli_fetch_array($case3)){
            $isinya3 = $row3[0];
        }
    } else {
        $isinya3 = $hdeath;
    }
    
    
    $query = mysqli_query($con, "select * from cases where tanggal='$tanggal'");
    $check = mysqli_num_rows($query);
    
    if($check=="1" || $check==1){
        $stsnya = "overwrite";
        mysqli_query($con, "update cases set ".$code."_t='$isinya1' , ".$code."_tr='$isinya2' , ".$code."_td='$isinya3' where tanggal='$tanggal'");
    } else {
        $stsnya = "input new";
        mysqli_query($con , "insert into cases (tanggal , ".$code."_t , ".$code."_tr , ".$code."_td) values ('$tanggal' ,  '$isinya1' , '$isinya2' , '$isinya3')");
    }
    
    $semuanya = array($stsnya , $tanggal , $code , $case , $recovery , $death);
    
    echo json_encode($semuanya);
    /*if($sql){
    }*/
?>