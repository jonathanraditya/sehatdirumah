<?php
session_start();

if (isset($_SESSION['email']) and isset($_SESSION['nama']) and isset($_SESSION['inisial'])){
    
} else{
    header('refresh:0; url =../');
}
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
?>

<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Head-->
        <?php require 'html-head.php';?>
        <style>

        </style>
        <script>
            function copyText1(qwertyuiop){
                let target = document.getElementById(qwertyuiop);
                target.select();
                target.setSelectionRange(0, 99999);
                document.execCommand("copy");
                alert("Text copied");
            }
        </script> 
    </head>
    <body>
        
    <?php require 'sd-navbar.php'; ?>

    <!--BODY-->
    <div class="container margint40">

        <?php require 'sd-mobile-nav.php'; ?>

        <div class="row">
            <?php require 'sd-sidenav.php'; ?>

            <!--Edit Site Component-->
            <div class="col-xl-7 col-lg-9 col-md-12 <?php require 'sd-sitesettings.php'?>">
                <h4>Edit Site Component</h4>
                <p>Use this section to make adjustments to the language display component</p>
                <div class="font-alegreya font24-36 marginb25">
                    <span>General</span>
                    <span class="info1 font-lato font16-24 font-weight-bold cl-white marginl15">Bahasa</span>
                    <span class="info2 font-lato font16-24 font-weight-bold cl-white marginl10">English</span>
                </div>

                <!--PHP Loop Database-->
                <?php require 'sd-db-displayfetch.php' ?>

            </div>
        </div>
    </div>
    </body>
</html>
