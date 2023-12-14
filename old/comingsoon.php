<?php

$valg=$_GET['f'];

switch($valg){
    case "jn":$val="Jonathan";break;
    case "by":$val="Bobby";break;
    case "hi":$val="Juki";break;
    case "ie":$val="Ibe";break;
    case "af":$val="Afif";break;
    case "il":$val="Ismail";break;
    case "pl":$val="Pascal";break;
    case "bd":$val="Bernard";break;
    case "aq":$val="Attariq";break;
    case "fi":$val="Fahmi";break;
    case "ay":$val="Apay";break;
    case "li":$val="Luthfi";break;
    case "sk":$val="Sidik";break;
    case "as":$val="Azels";break;
    case "kn":$val="Keylin";break;
    case "sm":$val="Syam";break;
    case "kh":$val="Kenneth";break;
    case "ma":$val="Malaka";break;
    case "ee":$val="Eze";break;
    case "af":$val="Alif";break;
    case "rd":$val="Ronald";break;
    case "cn":$val="Christin";break;
    case "rs":$val="Raras";break;
    case "gn":$val="Gian";break;
    case "ga":$val="Gita";break;
    default:
        $val='Anonim';
        $valg=NULL;
}


if(isset($valg)){
    $display='1';
    $vid=(rand(100000, 999999));
    setcookie('vid', $vid, time()+(86400*30));
    $gname=$val;
    setcookie('gname', $gname, time()+(86400*30));
} else{
    $display='0';
}


//if($display=='1'){ echo 'display:none';}else if($display!=1){echo ' ';}


?>


<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Head-->
        <?php require 'html-head.php';?>
        <style>
            .bgadd{
                background: rgb(107,171,121);
                background: linear-gradient(139deg, rgba(107,171,121,0.07) 0%, rgba(243,133,0,0.07) 100%);
            }
        </style>
    </head>

    <body>
    <div class="container-fluid bgadd" style="<?php if($display=='1'){ echo 'display:none;';}else if($display!=1){echo ' ';} ?>">
        <br><br>
        <div class="col-xl-2 offset-xl-5 col-lg-2 offset-lg-5 col-md-4 offset-md-4 col-sm-6 offset-sm-3 col-8 offset-2 justify-content-center text-center">
            <img class="img-fluid" src="img/asset/logo%20color.png" alt="Dukung Indonesia Tetap Sehat dengan Di Rumah Aja (help Indonesia Healthy by Staying At Home)">
            <br>
            <div class='text-center font-alegreya font20-30 font-weight-bold'>
                <span>#<span>di</span><span class='cl-aqua-forest'>Rumah</span><span class='cl-tangerine'>Aja</span></span>
            </div>
        </div>
        <br><br>

        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 text-center marginb69">
            <h3 class="font-weight-bold">Akan datang</h3>
            <p>Laman data dan informasi terbaru mengenai virus corona (COVID-19) di Indonesia.</p>
            <p>Dilengkapi <strong>rekap data 34 provinsi, statistik, fakta menarik, dan analisis mengenai kondisi terkini</strong>.</p>
            <p>Misi kami adalah memberikan informasi terbaru dan terakurat mengenai kondisi terkini pandemi di Indonesia, langkah penanganan yang tepat, akses data bebas dan terbuka yang mudah diakses oleh semua orang.</p>
            <p>Tidak ada cara yang lebih baik untuk membantu, selain <strong>#diRumahAja</strong></p>
            <p>Biarkan kami yang melakukannya untuk anda, dukung Indonesia tetap sehat dengan menjaga kebersihan dimulai <strong>#DariSaya</strong>.</p>
            <br><br>
            <h6>Ikuti kami untuk informasi terbaru</h6>
            <a href="https://www.instagram.com/jonathanvalerian/">@jonathanraditya</a>
            <a href="https://www.instagram.com/rafael.atantya/">@rafaelatantya</a>
            <br><br><br>
            <div class="font-weight-bold font20-30 font-lato">sehatdirumah.com</div>
        </div>
        <br><br><br><br><br><br><br>
    </div>
    
            <style>
            .modal-dialog {
                position: absolute;
                top: 13%;

            }
            .btn-custom6{
                border-radius:0;
                border:1px solid #F38500;
                padding:4px 7px;
                color:#F38500;
            }
        </style>
    <div class="container"  style="<?php if($display=='1'){ echo ' ';}else if($display!=1){echo 'display:none;';} ?>">
                            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                                <br><br><br>
                                <?php include_once 'banner.php';?>
                                <h5 class="margint25 marginb25">Halo <span class="cl-aqua-forest"><?php echo $val ?></span>!</h5>
                                <p class='marginb20' style='overflow-wrap: break-word;'>Terima kasih telah datang!<br>Dalam kesempatan ini aku membutuhkanmu untuk memberikan masukan terkait fitur dan tampilan website ini.</p>
                                    <button onclick="location.href='landing.php'" type="button" class="btn btn-custom6" data-dismiss="modal" aria-label="Close">Let's Go!</button>
                                <hr>
                                <div class="font-lato font12-18 font-weight-bold"><span class="cl-aqua-forest">sehat</span><span class="cl-tangerine">dirumah</span>.com</div>
                                <div class="font11-15 font-lato">Informasi, analisis, edukasi COVID-19.</div>
                                <div class="font11-15 font-lato">Cegah virus corona dengan tetap bersih</div>
                                <div class="font11-15 font-lato">dimulai <strong>#DariSaya</strong></div>
                            </div>

                        </div>
    
    </body>
</html>
