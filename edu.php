<?php

// define the path and name of cached file
	$cachefile = 'caching/edu'.date('M-d-Y').'.php';
	// define how long we want to keep the file in seconds. I set mine to 5 hours.
	$cachetime = 18000;
	// Check if the cached file is still fresh. If it is, serve it up and exit.
	if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
   	include($cachefile);
    	exit;
	}
	// if there is either no file OR the file to too old, render the page and capture the HTML.
	ob_start();

$pos='edukasi';


?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <?php include_once('def-top-header.html') ?>
        <meta name="description" content="<?php metadesc() ?>">
        <meta name="viewport" content="width=810px, user-scalable=no">
        <title><?php metatitle() ?></title>
        <link rel="stylesheet" href="style-edu.min.css">
        <link rel="stylesheet" href="style-mobile-responsive.min.css">
        <style>
            .loader{
                position:fixed;
                z-index:9999;
                top:0;
                left:0;
                width:100%;
                height:100%;
                background:rgba(255,255,255,0.95);
                display:flex;
                flex-wrap:nowrap;
                justify-content:center;
                align-items:center;
            }
            .loader > img{
                
            }
            .loader.hidden{
                animation: fadeOut 0.4s;
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
        <img width="35px;" src="img/asset/loader.gif" alt="Loading...">
        <img style="margin-left:20px;" src="img/asset/logosehatdirumah.svg" alt="Logo Sehat di Rumah">
    </div>
    <!-- Modal -->
        <div class="modal fade" id="footnotesModal" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body pl15 pr15">
                        
                        
                    </div>
            
                </div>
            </div>
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
    
    <div class="container-fluid">
        <div>
            <!--Branding education sehatdirumah.com-->
            <div class="row mt70 ed-z-header mr20 ml20">
                <div class="col">
                    <h1 class="font-weight-bold"><span class="f150 cl-heliotrope">Kenali</span> <span class="f80 cl-robin-egg-blue">siapa yang<br>sedang kita lawan</span></h1>
                </div>
            </div>

            <!--hotlink to page section-->
            <!--For smaller page-->
            <div class="d-xl-none ed-z-hl mr20 ml20">
                <div class="d-flex flex-wrap mt70 justify-content-around text-center">
                    <a href="#tentangCOVID19" class="a-none"><div class="mr40">
                        <div style="height:85px;">
                            <img  class='lazyload' data-src="img/asset/edu/virus.svg" alt="ilustrasi coronavirus yang menyebabkan COVID-19">
                        </div>
                        <div class="cl-heliotrope f24 mt15">Apa itu COVID-19?</div>
                    </div></a>
                    <a href="#gejalaCOVID19" class="a-none"><div class="mr40">
                        <div style="height:85px;">
                            <img  class='lazyload' data-src="img/asset/edu/cough.svg" alt="ilustrasi batuk, gejala coronavirus">
                        </div>
                        <div class="cl-heliotrope f24 mt15">Gejala</div>
                    </div></a>
                    <a href="#pencegahanCOVID19" class="a-none"><div class="mr40">
                        <div style="height:85px;">
                            <img  class='lazyload' data-src="img/asset/edu/handwash.svg" alt="ilustrasi cuci tangan, pencegahan coronavirus">
                        </div>
                        <div class="cl-heliotrope f24 mt15">Pencegahan</div>
                    </div></a>
                    <a href="#penangananCOVID19" class="a-none"><div class="mr40">
                        <div style="height:85px;">
                            <img  class='lazyload' data-src="img/asset/edu/medicine.svg" alt="ilustrasi obat coronavirus">
                        </div>
                        <div class="cl-heliotrope f24 mt15">Penanganan</div>
                    </div></a>
                </div>
            </div>
            <div class="row d-xl-none mt90 mb40 mr20 ml20" style="height:803px;">

                <div class="col-xl-3 col-lg-3 col-md-2 col-1">

                </div>
                <div class="col-xl-9 col-lg-9 col-md-10 col-11 ed-banner"></div>
            </div>

            <!--For XL Page-->
            <div class="row d-none d-xl-flex mr20 ml20" style="height:803px;">
                <div class="col-xl-3 col-lg-4 col-5">
                    <div class="d-flex flex-wrap mt50">
                        <div class="d-flex flex-nowrap text-center flex-column mr40">
                            <a href="#tentangCOVID19" class="a-none"><div>
                                <div style="height:85px;">
                                    <img class='lazyload'  data-src="img/asset/edu/virus.svg" alt="ilustrasi coronavirus yang menyebabkan COVID-19">
                                </div>
                                <div class="cl-heliotrope f20 mt15">Apa itu COVID-19?</div>
                            </div></a>
                            <a href="#gejalaCOVID19" class="a-none"><div>
                                <div style="height:85px;" class="mt85">
                                    <img class='lazyload'  data-src="img/asset/edu/cough.svg" alt="ilustrasi batuk, gejala coronavirus">
                                </div>
                                <div class="cl-heliotrope f20 mt15">Gejala</div>
                            </div></a>

                        </div>
                        <div class="d-flex flex-nowrap text-center flex-column">
                            <a href="#pencegahanCOVID19" class="a-none"><div>
                                <div style="height:85px;">
                                    <img class='lazyload'  data-src="img/asset/edu/handwash.svg" alt="ilustrasi cuci tangan, pencegahan coronavirus">
                                </div>
                                <div class="cl-heliotrope f20 mt15">Pencegahan</div>
                            </div></a>
                            <a href="#penangananCOVID19" class="a-none"><div>
                                <div style="height:85px;" class="mt85">
                                    <img class='lazyload'  data-src="img/asset/edu/medicine.svg" alt="ilustrasi obat coronavirus">
                                </div>
                                <div class="cl-heliotrope f20 mt15">Penanganan</div>
                            </div></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-7 ed-banner"></div>

            </div>


            <!--brand sehatdirumah.com-->
            <div class="ed-branding ml50 mr20 ml20">
                <img class='lazyload'  data-src="img/asset/edu/logo%20sehat%20dirumah.svg" alt="Logo Sehatdirumah.com, pahami, mengerti, antisipasi coronavirus">
            </div>

            <!--Education content-->
            <!--Apa itu COVID 19-->
            <div class="row justify-content-center mt200" id="tentangCOVID19">
                <div class="col-xl-3 offset-xl-1 col-lg-3 offset-lg-1 col-4 text-center">
                    <img data-src="img/asset/edu/question%20mark.svg" alt="question mark" class="mw186 lazyload ">
                </div>
                <div class="col-7 flex-column justify-content-center d-flex">
                    <div>
                        <div>
                            <h2 class="f70 font-weight-bold"><span class="cl-heliotrope">Apa itu</span><br><span class="cl-robin-egg-blue">COVID-19?</span></h2>
                        </div>
                        <div class="cl-logan f32 align-items-center">adalah penyakit menular akibat virus corona yang baru ditemukan</div>
                    </div>
                </div>
            </div>

            <!--Media penularan-->
            <div class="row justify-content-center mt200">
                <div class="col-xl-3 offset-xl-1 col-lg-3 offset-lg-1 col-4 text-center justify-content-center">
                    <img data-src="img/asset/edu/people%20cough.svg" alt="People cough" class="mw318 lazyload ">
                </div>
                <div class="col-7 flex-column justify-content-center d-flex">
                    <h2 class="f70 font-weight-bold"><span class="cl-heliotrope">Menular </span><span class="cl-robin-egg-blue">melalui<br>tetesan air liur<a class="a-none a-inh-sup click-point" data-id="81"><sup>[81]</sup></a></span></h2>
                    <div class="cl-logan f32">yang keluar dari hidung atau mulut ketika orang yang terinfeksi batuk atau bersin</div>
                </div>
            </div>

            <!--maskerku melindungimu, maskermu melindungiku-->
            <div class="row justify-content-center mt200">
                <div class="col-xl-7 offset-xl-1 col-lg-7 offset-lg-1 col-7 offset-1 flex-column justify-content-center d-flex">
                    <div class="d-flex align-self-center">
                        <h2 class="f70 font-weight-bold"><span class="cl-heliotrope">Maskerku melindungimu,</span><br><span class="cl-robin-egg-blue">maskermu melindungiku</span></h2>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-4 flex-column justify-content-center d-flex">
                    <img data-src="img/asset/edu/medical-mask.svg" alt="people wearing mask" class="mw294 lazyload ">
                </div>
            </div>

            <!--tips saling melindungi-->
            <div class="row justify-content-center text-center mt200" id="pencegahanCOVID19">
                <div class="col-xl-10 col-lg-11 col-11">
                    <h3 class="f48 font-weight-bold"><span class="cl-heliotrope">Mari saling melindungi dengan menerapkan pola hidup sehat</span><span class="cl-robin-egg-blue"> dimulai #DariSaya<a class="a-none a-inh-sup click-point" data-id="80"><sup>[80]</sup></a></span></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="text-center mt80 pr45 pl45">
                            <div>
                                <img  class='lazyload' data-src="img/asset/edu/handwash+soap.svg" alt="handwash and soap">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Cuci tangan<br>dengan sabun</div>
                        </div>
                        <div class="text-center mt80 pr45 pl45">
                            <div>
                                <img class='lazyload'  data-src="img/asset/edu/maintain%20distance.svg" alt="maintain 1 meter distance to avoid coronavirus transmission during coronavirus pandemic">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Jaga jarak<br>1 meter</div>
                        </div>
                        <div class="text-center mt80 pr45 pl45">
                            <div>
                                <img class='lazyload'  data-src="img/asset/edu/dont%20touch%20face.svg" alt="dont touch your face before washing your hands">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Hindari<br>menyentuh wajah</div>
                        </div>
                        <div class="text-center mt80 pr45 pl45">
                            <div>
                                <img class='lazyload'  data-src="img/asset/edu/avoid%20crowd.svg" alt="avoid crowd in coronavirus situation">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Jauhi<br>kelompok orang</div>
                        </div>
                        <div class="text-center mt80 pr45 pl45">
                            <div>
                                <img class='lazyload'  data-src="img/asset/edu/stayhome.svg" alt="stayhome icon">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Tetap<br>di rumah</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Virus corona mempengaruhi orang dengan cara yang berbeda-beda-->
            <div class="row justify-content-center mt200">
                <div class="c-md-margin-virusspread col-xl-3 offset-xl-1 col-lg-3 offset-lg-1 col-12 text-center flex-column justify-content-center d-flex">
                    <img data-src="img/asset/edu/Virus%20Spread.svg" alt="Coronavirus spread through human" class="mw427 mx-auto lazyload ">
                </div>
                <div class="col-xl-6 col-lg-6 col-10 offset-1 offset-xl-1 offset-lg-1 flex-column justify-content-center d-flex">
                    <h2 class="f60 font-weight-bold"><span class="cl-heliotrope">Virus Corona mempengaruhi orang </span><span class="cl-robin-egg-blue">dengan cara yang berbeda-beda<a class="a-none a-inh-sup click-point" data-id="84"><sup>[84]</sup></a></span></h2>
                    <div class="cl-logan f32 mt40">Sebagai penyakit yang menyerang pernapasan, sebagian orang akan sembuh tanpa memerlukan perawatan khusus, tetapi kondisi medis yang mendasari seperti tekanan darah tinggi, diabetes, akan memperparah kondisi.</div>
                </div>
            </div>

            <!--14 Gejala umum COVID-19-->
            <div class="row mt200" id="gejalaCOVID19">
                <div class="c-md-margin-virusspread text-center text-lg-left col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-10 offset-1">
                    <div>
                        <img class='lazyload'  data-src="img/asset/edu/Sick-Fever-Thermometure-Temperature-Avatar.svg" alt="sick high temperature COVID-19 symptoms">
                    </div>
                    <h2 class="font-weight-bold f60"><span class="cl-heliotrope">14 Gejala umum</span><span class="cl-robin-egg-blue"> COVID-19</span></h2>
                    <div class="cl-logan f32 mt40">Dikutip dalam laporan WHO, gejala paling umum dalam 56.000 kasus yang dikonfirmasi adalah demam.<a class="a-none a-inh-sup click-point" data-id="75"><sup>[75]</sup></a></div>
                </div>
                <div class="col-lg-6 offset-1 col-10 flex-column justify-content-center d-flex text-center">
                    <div class="text-center text-xl-left">
                        <img class="mw700 lazyload " data-src="img/asset/edu/COVID-19%20symptoms.svg" alt="COVID-19 symptoms, 14 (fourteen) that very general">
                    </div>
                </div>
            </div>

            <!--Angka kematian dan kondisi kesehatan-->
            <div class="row mt200">
                <div class="c-md-margin-virusspread text-center text-lg-left col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-10 offset-1">
                    <div>
                        <img class='lazyload'  data-src="img/asset/edu/flower.svg" alt="death rate and correlation with underlying conditions">
                    </div>
                    <h2 class="font-weight-bold f60"><span class="cl-heliotrope">Angka kematian dan</span><span class="cl-robin-egg-blue"> kondisi kesehatan</span></h2>
                    <div class="cl-logan f32 mt40">X% orang yang memiliki penyakit yang mendasari, kemudian didiagnosis dengan COVID-19 berakhir dengan kematian.<a class="a-none a-inh-sup click-point" data-id="76"><sup>[76]</sup></a></div>
                </div>
                <div class="col-lg-6 offset-1 col-10 flex-column justify-content-center d-flex text-center">
                    <div class="text-center text-xl-left">
                        <img class="mw555 lazyload " data-src="img/asset/edu/undelying%20cond.svg" alt="Coronavirus death and correlation with the underlying conditions">
                    </div>
                </div>
            </div>

            <!--infected people that need medication-->
            <div class="row justify-content-center mt300">
                <div class="col-xl-6 col-lg-7 offset-lg-1 col-7 offset-1 flex-column justify-content-center d-flex">
                    <div class="d-flex align-self-center">
                        <h2 class="f60 font-weight-bold"><span class="cl-heliotrope">Hanya 20% orang terinfeksi </span><span class="cl-robin-egg-blue">yang membutuhkan perawatan (CDC)<a class="a-none a-inh-sup click-point" data-id="77"><sup>[77]</sup></a></span></h2>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-3 col-4 flex-column justify-content-center d-flex">
                    <img data-src="img/asset/edu/hospital%20bed.svg" alt="hospital bed filled by coronavirus patients" class="mw294 lazyload ">
                </div>
            </div>

            <!--Tanda anda membutuhkan perawatan-->
            <div class="row justify-content-center text-center mt200" id="penangananCOVID19">
                <div class="col-xl-10 col-lg-11 col-11">
                    <h3 class="f48 font-weight-bold"><span class="cl-heliotrope">Tanda anda</span><span class="cl-robin-egg-blue"> membutuhkan perawatan<a class="a-none a-inh-sup click-point" data-id="78"><sup>[78]</sup></a></span></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="text-center mt60 pr45 pl45">
                            <div>
                                <img class='lazyload'  data-src="img/asset/edu/Corona%20Virus%20Symptoms%20Shortness%20of%20breath.svg" alt="Coronavirus symptoms shortness of breath">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Kesulitan<br>bernapas</div>
                        </div>
                        <div class="text-center mt60 pr45 pl45">
                            <div>
                                <img class='lazyload'  data-src="img/asset/edu/High%20fever.svg" alt="High and uncontrolled fever">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Demam<br>tinggi</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Menangani sendiri gejala coronavirus di rumah-->
            <div class="row justify-content-center text-center mt150">
                <div class="col-xl-10 col-lg-11 col-11">
                    <h3 class="f48 font-weight-bold"><span class="cl-heliotrope">Menangani sendiri di rumah, </span><span class="cl-robin-egg-blue">tips meredakan gejala<a class="a-none a-inh-sup click-point" data-id="79"><sup>[79]</sup></a></span></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="text-center mt60 pr45 pl45">
                            <div>
                                <img class='lazyload'  data-src="img/asset/edu/sleep.svg" alt="Sleep well to control Coronavirus Symptoms">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Istirahat dan<br>tidur cukup</div>
                        </div>
                        <div class="text-center mt60 pr45 pl45">
                            <div>
                                <img class='lazyload'  data-src="img/asset/edu/drink%20water.svg" alt="Drink a lot a water to control Coronavirus Symptoms">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Minum<br>banyak cairan</div>
                        </div>
                        <div class="text-center mt60 pr45 pl45">
                            <div>
                                <img class='lazyload'  data-src="img/asset/edu/warm%20shower.svg" alt="showering with warm water to control Coronavirus Symptoms">
                            </div>
                            <div class="f24 font-weight-bold cl-robin-egg-blue mt30">Mandi<br>air hangat</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Last tips during coronavirus pandemic-->
            <div class="row justify-content-center text-center mt200">
                <div class="col-xl-10 col-lg-11 col-11">
                    <h3 class="f48 font-weight-bold"><span class="cl-heliotrope">"Tidak semua </span><span class="cl-robin-egg-blue">orang yang sehat</span><span class="cl-heliotrope"> bebas dari virus"</span></h3>
                </div>
            </div>
            <div class="row justify-content-center text-center mt40">
                <div class="col-xl-10 col-lg-11 col-11">
                    <div class="f32 font-weight-bold text-center cl-logan">Oleh sebab itu tetaplah berada di rumah untuk menghentikan penyebaran</div>
                </div>
            </div>

            <div class="row justify-content-center text-center mt150">
                <div class="col-xl-10 col-lg-11 col-11">
                    <h3 class="f48 font-weight-bold"><span class="cl-heliotrope">"Tetapi, </span><span class="cl-robin-egg-blue">tidak semua orang yang terlihat sakit,</span><span class="cl-heliotrope"> disebabkan oleh corona"</span></h3>
                </div>
            </div>
            <div class="row justify-content-center text-center mt40 pb100 mb100">
                <div class="col-xl-10 col-lg-11 col-11">
                    <div class="f32 font-weight-bold text-center cl-logan">Berpikirlah positif, jangan justifikasi orang hanya dari yang terlihat. Tetap hargai sesama manusia, seperti kita ingin tetap dihargai ketika sakit</div>
                </div>
            </div>
            

            <!--sehatdirumah branding-->
            <div class="row justify-content-center text-center mt130">
                <div class="col justify-content-center text-center">
                    <img class='lazyload'  data-src="img/asset/edu/logo%20sehat%20dirumah.svg" alt="Sehatdirumah.com logo">
                </div>

            </div>
            <!--Informasi Lainnya-->
            <?php include_once('end-link-anotherinformation.php') ?>
        </div>
    </div>
    <?php include_once('footer.html') ?>
    <?php include_once('def-bottom-header.html') ?>
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