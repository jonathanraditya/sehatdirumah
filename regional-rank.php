<?php

// define the path and name of cached file
	$cachefile = 'caching/ranklanding'.date('M-d-Y').'.php';
	// define how long we want to keep the file in seconds. I set mine to 5 hours.
	$cachetime = 18000;
	// Check if the cached file is still fresh. If it is, serve it up and exit.
	if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
   	include($cachefile);
    	exit;
	}
	// if there is either no file OR the file to too old, render the page and capture the HTML.
	ob_start();

$pos='peringkat';

?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <?php include_once('def-top-header.html') ?>
        <meta name="description" content="<?php metadesc() ?>">
        <meta name="viewport" content="width=860px, user-scalable=no">
        <title><?php metatitle() ?></title>
        <link rel="stylesheet" href="style-reg-rank.min.css">
        
        <style>
            .loader{
                position:fixed;
                z-index:9999;
                top:0;
                left:0;
                width:100%;
                height:100%;
                background:rgba(255,255,255,0.25);
                display:flex;
                flex-wrap:nowrap;
                justify-content:center;
                align-items:center;
            }
            .loader > img{
                
            }
            .loader.hidden{
                animation: fadeOut 0.2s;
                animation-fill-mode:forwards;
            }
            
            @keyframes fadeOut{
                100%{
                    opacity:0;
                    visibility:hidden;
                }
            }
        </style>
        
    </head>
<body>
    <div class="loader">
        <img width="35px;"src="img/asset/loader.gif" alt="Loading...">
        <img style="margin-left:20px;" src="img/asset/logosehatdirumah.svg" alt="Logo Sehat di Rumah">
    </div>
    <!-- Sharelink Modal -->
        <div class="modal fade" id="shareModal" role="dialog">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="pl15 pr15 sharelink-body" style="padding:60px 50px;">
                        <button type="button" class="close" data-dismiss="modal">X</button>
                        <img padding="margin-top:50px;" src="img/asset/sharinglove.svg" alt="bagikan cinta dan kehangatan kepada Indonesia di tengah pandemi ini">
                        
                        <h1 style="margin-top:35px;" class="mf32-f24 font-weight-bold"><span class="cl-aqua-forest">Bagikan </span><span class="cl-tangerine">Tautan</span></h1>
                        
                        <div class="mf24-f16">Agar semakin banyak orang yang percaya bahwa kita sebagai 1 bangsa mampu melewati pandemi ini</div>
                        
                        <div class="mf24-f16" style="margin-top:40px;"><b>Halaman saat ini :</b></div>
                        <div class="font-weight-bold mf24-f16"><u><i><?php metatitle() ?></i></u></div>
                        <div class="mf24-f16"><?php metadesc() ?></div>
                        
                        <er style="display:none;" id="sehatdirumahcomcaption">*<?php metatitle() ?>* &#10;&#13;<?php metadesc() ?> &#10;&#13;Kunjungi : <?php echo currentUrl($_SERVER) ?>&#10;&#13;#SehatdiRumah #KitaBisa</er>
                        
                        <div style="margin:30px 0px;" onclick="shareClicked('copylink','sharesalintautan');copyToClipboard('er#sehatdirumahcomcaption')" class="click-point">
                        <span>
                        <span class="align-items-center" style="padding:15px 25px; border-radius:10px; border:2px solid #979797;">
                        <img src="img/asset/sharelink.svg" alt="salin tautan pada halaman ini">
                        <span style="margin-left:5px; color:#979797;" class="mf24-f16 font-weight-bold" id="sharesalintautan">Salin tautan halaman ini</span>
                        </span>
                        </span>
                        </div>
                        
                        
                        
                        <div style="padding:30px 0px;"onclick="shareClicked('sharewa','sharebagikankewa');copyToClipboard('er#sehatdirumahcomcaption')" class="click-point">
                        <a href="whatsapp://send?text=*<?php metatitle() ?>* %0a%0a<?php metadesc() ?> %0a%0aKunjungi : <?php echo currentUrl($_SERVER) ?>%0a%0a#SehatdiRumah #KitaBisa" class="a-none">
                        <span class="align-items-center" style="padding:15px 25px; border-radius:10px; border:2px solid #6BAB79;">
                        <img src="img/asset/shareonwa.svg" alt="bagikan tautan di platform whatsapp">
                        <span class="mf24-f16 cl-aqua-forest font-weight-bold" style="margin-left:5px;" id="sharebagikankewa">Bagikan ke WhatsApp</span>
                        </span>
                        </a>
                        </div>
                        
                    </div>
            
                </div>
            </div>
        </div>
        <!--Sharelink Button-->
        <div class="share-button">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60"><g transform="translate(37 -30)"><path d="M127.981,113.63a6.321,6.321,0,1,0-6.146-4.87l-10.049,5.583a6.315,6.315,0,1,0,0,8.909l10.049,5.583a6.324,6.324,0,1,0,1.675-3.01l-10.049-5.583a6.269,6.269,0,0,0,0-2.889l10.049-5.583A6.3,6.3,0,0,0,127.981,113.63Zm0,13.778a2.87,2.87,0,1,1-2.87,2.87A2.874,2.874,0,0,1,127.981,127.407Zm-20.666-5.741a2.87,2.87,0,1,1,2.87-2.87A2.874,2.874,0,0,1,107.315,121.666Zm20.666-17.222a2.87,2.87,0,1,1-2.87,2.87A2.874,2.874,0,0,1,127.981,104.444Z" transform="translate(-127.018 -59.018)" fill="#fff"/></g></svg>
        </div>
    <?php include_once('progressbar.html') ?>
    <?php include_once('navigation.php') ?>
    <?php include_once('_sys_announcement.php') ?>
    <div class="container">
        <!--Navigation Bar-->
        <?php include_once('static-navigation.html') ?>
    </div>
    <div class="rr-coverbg">
        <div class="container">
            <div class="row mt100">
                <div class="col">
                    <h1 class="cl-tangerine mfc-f72 font-weight-bold">Peringkat regional</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="cl-aqua-forest mf40-f32 font-weight-bold">Ketahui apa yang sedang bertumbuh</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-9 col-12">
                    <div class="d-flex flex-wrap justify-content-between text-center">
                        <div class="m-mt40-mt70 m-mb40-mb70 pr25 pl25 click-point" onclick="window.location='peringkat?v=tingkatkematian'">
                            <div style="height:50px;" class="justify-content-center d-flex flex-column">
                                <img  class='lazyload' data-src="img/asset/regrank/landing-death.svg" alt="Peringkat tingkat kematian tertinggi akibat virus corona">
                            </div>
                            <h4 class="mf24-f16 cl-aqua-forest">Tingkat Kematian<a href="bantuan?h=catatankaki#tingkatkematian" class="a-none a-inh-sup"><sup>[15]</sup></a></h4>
                            <?php rankld_head_deathrate() ?>
                            <a href="bantuan?h=catatankaki#tingkatkematian" class="a-none">
                                <span class="cl-aqua-forest mf16-f10 font-underline">apa artinya?</span>
                            </a>
                        </div>
                        <div class="m-mt40-mt70 m-mb40-mb70 pr25 pl25 click-point d-none d-lg-inline-block d-xl-inline-block" onclick="window.location='peringkat?v=jarak1pasienpositifcorona'">
                            <div style="height:50px;" class="justify-content-center d-flex flex-column">
                                <img  class='lazyload' data-src="img/asset/regrank/landing-keepdistance.svg" alt="Provinsi dengan jarak terdekat antara pasien positif corona">
                            </div>
                            <h4 class="mf24-f16 cl-aqua-forest">Jarak Antara Pasien Corona<a href="bantuan?h=catatankaki#jarak1pasienpositifcoronadarianda" class="a-none a-inh-sup"><sup>[37]</sup></a></h4>
                            <?php rankld_head_jarak1pasien() ?>
                            <a href="bantuan?h=catatankaki#jarak1pasienpositifcoronadarianda" class="a-none">
                                <span class="cl-aqua-forest mf16-f10 font-underline">apa artinya?</span>
                            </a>
                        </div>
                        <div class="m-mt40-mt70 m-mb40-mb70 pr25 pl25 click-point" onclick="window.location='peringkat?v=persenpertambahankasus'">
                            <div style="height:50px;" class="justify-content-center d-flex flex-column">
                                <img  class='lazyload' data-src="img/asset/regrank/landing-growth.svg" alt="Peringkat pertumbuhan kasus harian tertinggi akibat virus corona">
                            </div>
                            <h4 class="mf24-f16 cl-aqua-forest">Pertumbuhan Kasus Harian<a href="bantuan?h=catatankaki#%pertambahankasus" class="a-none a-inh-sup"><sup>[9]</sup></a></h4>
                            <?php rankld_head_pertumbuhankasus() ?>
                            <a href="bantuan?h=catatankaki#%pertambahankasus" class="a-none">
                                <span class="cl-aqua-forest mf16-f10 font-underline">apa artinya?</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="cl-tangerine mf36-f24">
                        Tersedia <a href="#semuaperingkat" class="a-none"><span class="font-weight-bold cl-tangerine">27 kategori</span></a> pemeringkatan untuk setiap provinsi
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="cl-aqua-forest mf36-f24 font-italic">pahami, mengerti, antisipasi.</div>
                </div>
            </div>

            <div class="row mt100">
                <div class="col">
                    <a href="#semuaperingkat" class="a-none">
                        <span class="font-weight-bold mf24-f16 font-underline cl-aqua-forest">lihat statistik lainnya</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--Case rank view-->
    <style>
        .cr-padding-custom{
            padding:72px 0px;
            margin:0px 20px;
        }
        @media (min-width: 985px){
            .cr-padding-custom{
                padding:72px 40px;
                margin:0px 0px;
            }
        }
    </style>
    <div class="container" style="max-width:99%;">
        <div class="row justify-content-center mt100 pb100" id="semuaperingkat">
            <div class="col justify-content-center">
                <h2 class="font-weight-bold mf72-f48 text-center">
                    <span class="cl-aqua-forest">#Tetap</span>
                    <span class="cl-tangerine">diRumah</span>
                </h2>
                <div class="text-center mt70 click-point" onclick="window.location='peringkat?v=jarak1pasienpositifcorona'">
                    <img  class='lazyload' data-src="img/asset/regrank/tdr-keepdistance.svg" alt="Tetap di rumah, apabila terpaksa keluar rumah, pastikan menjaga jarak untuk menghindari infeksi virus corona. Perhatikan jarak aman antara anda dengan 1 orang positif corona di wilayah anda">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point"  onclick="window.location='peringkat?v=jarak1pasienpositifcorona'">Jarak 1 Pasien Positif Corona dari Anda<a href="bantuan?h=catatankaki#jarak1pasienpositifcoronadarianda" class="a-none a-inh-sup"><sup>[37]</sup></a></h3>
                <div class="justify-content-center d-flex click-point" onclick="window.location='peringkat?v=jarak1pasienpositifcorona'">
                    <table class="pr-tablestyle">
                        <?php rankld_jarak1pasien() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=jarak1pasienpositifcorona'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
                

            </div>
        </div>
        
        
        
        <!--Kasus Virus Corona-->
        <div class="row justify-content-center mt100 pb25">
            <div class="col justify-content-center">
                <h2 class="font-weight-bold mf72-f48 text-center">
                    <span class="cl-aqua-forest">Kasus </span>
                    <span class="cl-tangerine">Virus Corona</span>
                </h2>
            </div>
        </div>
        <!--Kasus Virus Corona Fetch-->
        <div class="d-flex justify-content-center flex-wrap">
            <!-- Total Kasus-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=totalkasus'">
                    <img  class='lazyload' data-src="img/asset/regrank/kv-totalcase.svg" alt="Peringkat total kasus di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=totalkasus'">Total Kasus<a href="bantuan?h=catatankaki#totalkasus" class="a-none a-inh-sup"><sup>[2]</sup></a></h3>
                <div class="justify-content-center d-flex  click-point" onclick="window.location='peringkat?v=totalkasus'">
                    <table class="pr-tablestyle">
                        <?php rankld_totalkasus() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=totalkasus'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Pertambahan Kasus Harian-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=pertambahankasusharian'">
                    <img  class='lazyload' data-src="img/asset/regrank/kv-totalcaseup.svg" alt="Peringkat pertambahan total kasus di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=pertambahankasusharian'">Pertambahan Kasus Harian<a href="bantuan?h=catatankaki#pertambahankasus" class="a-none a-inh-sup"><sup>[8]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=pertambahankasusharian'">
                    <table class="pr-tablestyle">
                        <?php rankld_pertambahankasus() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=pertambahankasusharian'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Total Kematian-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=totalkematian'">
                    <img  class='lazyload' data-src="img/asset/regrank/kv-totaldeath.svg" alt="Peringkat total kematian di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=totalkematian'">Total Kematian<a href="bantuan?h=catatankaki#totalmeninggal" class="a-none a-inh-sup"><sup>[3]</sup></a></h3>
                <div class="justify-content-center d-flex  click-point" onclick="window.location='peringkat?v=totalkematian'">
                    <table class="pr-tablestyle">
                        <?php rankld_kematian() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=totalkematian'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Pertambahan Total Kematian-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=pertambahankematian'">
                    <img  class='lazyload' data-src="img/asset/regrank/kv-totaldeathup.svg" alt="Peringkat pertambahan total kematian di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=pertambahankematian'">Pertambahan Total Kematian<a href="bantuan?h=catatankaki#pertambahankematian" class="a-none a-inh-sup"><sup>[10]</sup></a></h3>
                <div class="justify-content-center d-flex  click-point" onclick="window.location='peringkat?v=pertambahankematian'">
                    <table class="pr-tablestyle">
                        <?php rankld_pertambahankematian() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=pertambahankematian'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Total Kesembuhan-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=totalsembuh'">
                    <img  class='lazyload' data-src="img/asset/regrank/kv-totalrecovery.svg" alt="Peringkat total kesembuhan di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=totalsembuh'">Total Kesembuhan<a href="bantuan?h=catatankaki#totalsembuh" class="a-none a-inh-sup"><sup>[4]</sup></a></h3>
                <div class="justify-content-center d-flex  click-point" onclick="window.location='peringkat?v=totalsembuh'">
                    <table class="pr-tablestyle">
                        <?php rankld_sembuh() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=totalsembuh'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Pertambahan Total Kesembuhan-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=pertambahankesembuhan'">
                    <img  class='lazyload' data-src="img/asset/regrank/kv-totalrecoveryup.svg" alt="Peringkat pertambahan total kesembuhan di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=pertambahankesembuhan'">Pertambahan Total Kesembuhan<a href="bantuan?h=catatankaki#pertambahankesembuhan" class="a-none a-inh-sup"><sup>[12]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=pertambahankesembuhan'">
                    <table class="pr-tablestyle">
                        <?php rankld_pertambahansembuh() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=pertambahankesembuhan'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>
        
        </div>
        <!--Pertolongan Pertama-->
        <div class="row justify-content-center mt100">
            <div class="col justify-content-center">
                <h2 class="font-weight-bold mf72-f48 text-center">
                    <span class="cl-aqua-forest">Pertolongan </span>
                    <span class="cl-tangerine">Pertama</span>
                </h2>
            </div>
        </div>
        <!--Pertolongan Pertama Case Fetch-->
        <div class="d-flex justify-content-center flex-wrap">
            <!-- Beban Rumah Sakit-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=bebanrumahsakit'">
                    <img  class='lazyload' data-src="img/asset/regrank/pp-hospitalload.svg" alt="Peringkat beban rumah sakit di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=bebanrumahsakit'">Beban Rumah Sakit<a href="bantuan?h=catatankaki#bebanrumahsakit" class="a-none a-inh-sup"><sup>[38]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=bebanrumahsakit'">
                    <table class="pr-tablestyle">
                        <?php rankld_bebanrs() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=bebanrumahsakit'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!--Waktu Menuju Rumah Sakit-->
            <div class="cr-padding-custom">
                <div class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=waktumenujurs'">
                    <img  class='lazyload' data-src="img/asset/regrank/pp-timetohospital.svg" alt="peringkat region mengenai waktu yang dibutuhkan untuk menuju rumah sakit">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=waktumenujurs'">Waktu Menuju Rumah Sakit<a href="bantuan?h=catatankaki#waktumenujurs" class="a-none a-inh-sup"><sup>[39]</sup></a></h3>
                <div class="justify-content-center d-flex  click-point" onclick="window.location='peringkat?v=waktumenujurs'">
                    <table class="pr-tablestyle">
                        <?php rankld_waktu_rs() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=waktumenujurs'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Dokter per 1 Pasien Aktif-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=dokterper1pasienaktif'">
                    <img  class='lazyload' data-src="img/asset/regrank/pp-doctor.svg" alt="Peringkat Tingkat pelayanan dokter region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=dokterper1pasienaktif'">Dokter per 1 Pasien Aktif<a href="bantuan?h=catatankaki#dokterper1pasienaktif" class="a-none a-inh-sup"><sup>[40]</sup></a></h3>
                <div class="justify-content-center d-flex  click-point" onclick="window.location='peringkat?v=dokterper1pasienaktif'">
                    <table class="pr-tablestyle">
                        <?php rankld_dokterpasien() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=dokterper1pasienaktif'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!--Perawat per 1 Pasien Aktif-->
            <div class="cr-padding-custom">
                <div class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=perawatper1pasienaktif'">
                    <img  class='lazyload' data-src="img/asset/regrank/pp-nurse.svg" alt="Peringkat tingkat pelayanan perawat per 1 pasien aktif">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=perawatper1pasienaktif'">Perawat per 1 Pasien Aktif<a href="bantuan?h=catatankaki#perawatper1pasienaktif" class="a-none a-inh-sup"><sup>[41]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=perawatper1pasienaktif'">
                    <table class="pr-tablestyle">
                        <?php rankld_perawatpasien() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=perawatper1pasienaktif'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>


        </div>

        <!--Persentase Kasus-->
        <div class="row justify-content-center mt100 pb25">
            <div class="col justify-content-center">
                <h2 class="font-weight-bold mf72-f48 text-center">
                    <span class="cl-aqua-forest">Persentase </span>
                    <span class="cl-tangerine">Kasus</span>
                </h2>
            </div>
        </div>
        <!--Persentase Kasus Fetch-->
        <div class="d-flex justify-content-center flex-wrap">
            <!-- Tingkat Kesembuhan-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=tingkatkesembuhan'">
                    <img  class='lazyload' data-src="img/asset/regrank/pk-recoveryrate.svg" alt="Peringkat tingkat kesembuhan di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=tingkatkesembuhan'">Tingkat Kesembuhan<a href="bantuan?h=catatankaki#tingkatkesembuhan" class="a-none a-inh-sup"><sup>[58]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=tingkatkesembuhan'">
                    <table class="pr-tablestyle">
                        <?php rankld_tingkatsembuh() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=tingkatkesembuhan'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Tingkat Kematian-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=tingkatkematian'">
                    <img  class='lazyload' data-src="img/asset/regrank/pk-deathrate.svg" alt="Peringkat tingkat kematian di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=tingkatkematian'">Tingkat Kematian<a href="bantuan?h=catatankaki#tingkatkematian" class="a-none a-inh-sup"><sup>[15]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=tingkatkematian'">
                    <table class="pr-tablestyle">
                        <?php rankld_tingkatkematian() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=tingkatkematian'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Kasus per 1 Juta Penduduk-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=kasusper1jutapenduduk'">
                    <img  class='lazyload' data-src="img/asset/regrank/pk-caseper1mil.svg" alt="Peringkat kasus per 1 juta penduduk di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=kasusper1jutapenduduk'">Kasus per 1 Juta Penduduk<a href="bantuan?h=catatankaki#kasuspersatujutapenduduk" class="a-none a-inh-sup"><sup>[51]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=kasusper1jutapenduduk'">
                    <table class="pr-tablestyle">
                        <?php rankld_kasusper1juta() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=kasusper1jutapenduduk'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- % Pertambahan Kematian-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=persenpertambahankematian'">
                    <img  class='lazyload' data-src="img/asset/regrank/pk-percdeathup.svg" alt="Peringkat persentase pertambahan kematian di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=persenpertambahankematian'">% Pertambahan Kematian<a href="bantuan?h=catatankaki#%pertambahankematian" class="a-none a-inh-sup"><sup>[11]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=persenpertambahankematian'">
                    <table class="pr-tablestyle">
                        <?php rankld_perstambahkematian() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=persenpertambahankematian'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- % Pertambahan Kesembuhan-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=persenpertambahankesembuhan'">
                    <img  class='lazyload' data-src="img/asset/regrank/pk-percrecoveryup.svg" alt="Peringkat persentase pertambahan kesembuhan di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=persenpertambahankesembuhan'">% Petambahan Kesembuhan<a href="bantuan?h=catatankaki#%pertambahankesembuhan" class="a-none a-inh-sup"><sup>[13]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=persenpertambahankesembuhan'">
                    <table class="pr-tablestyle">
                        <?php rankld_perstambahsembuh() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=persenpertambahankesembuhan'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- % Pertambahan kasus-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=persenpertambahankasus'">
                    <img  class='lazyload' data-src="img/asset/regrank/pk-perccaseup.svg" alt="Peringkat persentase pertambahan kasus di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=persenpertambahankasus'">% Pertambahan Kasus<a href="bantuan?h=catatankaki#%pertambahankasus" class="a-none a-inh-sup"><sup>[9]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=persenpertambahankasus'">
                    <table class="pr-tablestyle">
                        <?php rankld_perstambahkasus() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=persenpertambahankasus'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- % Kasus Aktif-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=persenkasusaktif'">
                    <img  class='lazyload' data-src="img/asset/regrank/pk-percactivecase.svg" alt="Peringkat persentase kasus aktif di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=persenkasusaktif'">% Kasus Aktif<a href="bantuan?h=catatankaki#kasusaktif(dalampersentase)" class="a-none a-inh-sup"><sup>[6]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=persenkasusaktif'">
                    <table class="pr-tablestyle">
                        <?php rankld_perskasusaktif() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=persenkasusaktif'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Kesembuhan/Kematian-->
            <div class="cr-padding-custom">
                <div style="height:140px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=kesembuhanperkematian'">
                    <img  class='lazyload' data-src="img/asset/regrank/pk-recoveryperdeath.svg" alt="Peringkat kasus selesai yang sembuh dan yang meninggal di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=kesembuhanperkematian'">Kesembuhan/Kematian<a href="bantuan?h=catatankaki#kesembuhan/kematian" class="a-none a-inh-sup"><sup>[14]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=kesembuhanperkematian'">
                    <table class="pr-tablestyle">
                        <?php rankld_sembuhmeninggal() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=kesembuhanperkematian'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>




        </div>

        <!--Kesehatan & Demografi-->
        <div class="row justify-content-center mt100 pb25">
            <div class="col justify-content-center">
                <h2 class="font-weight-bold mf72-f48 text-center">
                    <span class="cl-aqua-forest">Kesehatan & </span>
                    <span class="cl-tangerine">Demografi</span>
                </h2>
            </div>
        </div>
        <!--Kesehatan & Demografi Fetch-->
        <div class="d-flex justify-content-center flex-wrap">
            <!-- Jumlah Penduduk-->
            <div class="cr-padding-custom">
                <div style="height:145px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=jumlahpenduduk'">
                    <img  class='lazyload' data-src="img/asset/regrank/kd-totalpopulation.svg" alt="Peringkat total populasi di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=jumlahpenduduk'">Jumlah Penduduk<a href="bantuan?h=catatankaki#jumlahpenduduk" class="a-none a-inh-sup"><sup>[29]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=jumlahpenduduk'">
                    <table class="pr-tablestyle">
                        <?php rankld_jml_penduduk() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=jumlahpenduduk'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Luas Wilayah-->
            <div class="cr-padding-custom">
                <div style="height:145px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=luaswilayah'">
                    <img  class='lazyload' data-src="img/asset/regrank/kd-provincearea.svg" alt="Peringkat luas wilayah di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=luaswilayah'">Luas Wilayah<a href="bantuan?h=catatankaki#luaswilayah" class="a-none a-inh-sup"><sup>[30]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=luaswilayah'">
                    <table class="pr-tablestyle">
                        <?php rankld_luas_wilayah() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=luaswilayah'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Jumlah Dokter-->
            <div class="cr-padding-custom">
                <div style="height:145px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=jumlahdokter'">
                    <img  class='lazyload' data-src="img/asset/regrank/kd-totaldoctor.svg" alt="Peringkat jumlah dokter di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=jumlahdokter'">Jumlah Dokter<a href="bantuan?h=catatankaki#jumlahdokter" class="a-none a-inh-sup"><sup>[31]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=jumlahdokter'">
                    <table class="pr-tablestyle">
                        <?php rankld_jumlah_dokter() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=jumlahdokter'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Jumlah Perawat-->
            <div class="cr-padding-custom">
                <div style="height:145px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=jumlahperawat'">
                    <img  class='lazyload' data-src="img/asset/regrank/kd-totalnurse.svg" alt="Peringkat jumlah perawat di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=jumlahperawat'">Jumlah Perawat<a href="bantuan?h=catatankaki#jumlahperawat" class="a-none a-inh-sup"><sup>[32]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=jumlahperawat'">
                    <table class="pr-tablestyle">
                        <?php rankld_jumlah_perawat() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=jumlahperawat'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Jumlah Rumah Sakit-->
            <div class="cr-padding-custom">
                <div style="height:145px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=jumlahrumahsakit'">
                    <img  class='lazyload' data-src="img/asset/regrank/kd-totalhospital.svg" alt="Peringkat jumlah rumah sakit di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=jumlahrumahsakit'">Jumlah Rumah Sakit<a href="bantuan?h=catatankaki#jumlahrumahsakit" class="a-none a-inh-sup"><sup>[33]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=jumlahrumahsakit'">
                    <table class="pr-tablestyle">
                        <?php rankld_jumlah_rs() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=jumlahrumahsakit'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Rasio Tempat Tidur-->
            <div class="cr-padding-custom">
                <div style="height:145px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=rasiotempattidur'">
                    <img  class='lazyload' data-src="img/asset/regrank/kd-bedratio.svg" alt="Peringkat rasio tempat tidur rumah sakit di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=rasiotempattidur'">Tempat Tidur per 1000 Penduduk<a href="bantuan?h=catatankaki#rasiotempattidur" class="a-none a-inh-sup"><sup>[34]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=rasiotempattidur'">
                    <table class="pr-tablestyle">
                        <?php rankld_rasio_tempat_tidur() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=rasiotempattidur'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Jumlah Tempat Tidur-->
            <div class="cr-padding-custom">
                <div style="height:145px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=jumlahtempattidur'">
                    <img  class='lazyload' data-src="img/asset/regrank/kd-totalbed.svg" alt="Peringkat jumlah tempat tidur rumah sakit yang tersedia di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=jumlahtempattidur'">Jumlah Tempat Tidur<a href="bantuan?h=catatankaki#jumlahtempattidur" class="a-none a-inh-sup"><sup>[35]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=jumlahtempattidur'">
                    <table class="pr-tablestyle">
                        <?php rankld_jumlah_tempat_tidur() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location='peringkat?v=jumlahtempattidur'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>

            <!-- Rasio Keterisian Tempat Tidur-->
            <div class="cr-padding-custom">
                <div style="height:145px;" class="text-center d-flex flex-column justify-content-center click-point" onclick="window.location='peringkat?v=rasioketerisiantempattidur'">
                    <img  class='lazyload' data-src="img/asset/regrank/kd-bedoccupancyratio.svg" alt="Peringkat rasio keterisian tempat tidur (BOR) di setiap region di Indonesia">
                </div>
                <h3 class="font-weight-bold cl-aqua-forest f24 text-center mt20 click-point" onclick="window.location='peringkat?v=rasioketerisiantempattidur'">Rasio Keterisian Tempat Tidur<a href="bantuan?h=catatankaki#rasioketerisiantempattidur" class="a-none a-inh-sup"><sup>[36]</sup></a></h3>
                <div class="justify-content-center d-flex click-point " onclick="window.location='peringkat?v=rasioketerisiantempattidur'">
                    <table class="pr-tablestyle">
                        <?php rankld_bor() ?>
                    </table>
                </div>
                <div class="text-center mt30 ">
                    <span onclick="window.location=''peringkat?v=rasioketerisiantempattidur'" class="click-point text-center mf20-f16 font-weight-bold pt6 pb6 pl15 pr15 cl-aqua-forest" style="border-radius:5px; border:2px solid #6BAB79;">Lihat semua data</span>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.html') ?>
    <?php include_once('def-bottom-header.html') ?>
    <link rel="stylesheet" href="style-mobile-responsive.min.css">
        <script>
            window.addEventListener("load", function(){
                const loader=document.querySelector(".loader");
                loader.className += " hidden"; // class="loader hidden"
            })
        </script>
        <!--Sharelink Script-->
        <script>
            //Sharelink Popup
            $(document).ready(function(){
             $('.share-button').click(function(){
                $('#shareModal').modal('show');   
             });
            });
            function shareClicked(buttontype,buttonid){
                var targetbt=document.getElementById(buttonid);
                var datatype=buttontype;
                if(datatype==="copylink"){
                    targetbt.innerHTML="<i>Tautan disalin!</i>";
                }else{
                    targetbt.innerHTML="<i>Membuka WhatsApp...</i>";
                }
            }
            function copyToClipboard(element){
                var $temp=$("<textarea>");
                var brRegex=/<br\s*[\/]?>/gi;
                $("body").append($temp);
                $temp.val($(element).html().replace(brRegex,"\r\n")).select();
                document.execCommand("copy");
                $temp.remove();
            }
        </script>
</body>
</html>

<?php


// We're done! Save the cached content to a file
	$fp = fopen($cachefile, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);
	// finally send browser output
	ob_end_flush();

?>