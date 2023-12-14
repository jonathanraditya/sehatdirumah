<?php

// define the path and name of cached file
	$cachefile = 'caching/regionlanding'.date('M-d-Y').'.php';
	// define how long we want to keep the file in seconds. I set mine to 5 hours.
	$cachetime = 18000;
	// Check if the cached file is still fresh. If it is, serve it up and exit.
	if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
   	include($cachefile);
    	exit;
	}
	// if there is either no file OR the file to too old, render the page and capture the HTML.
	ob_start();

$pos='region';

?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <?php include_once('def-top-header.html') ?>
        <meta name="description" content="<?php metadesc() ?>">
        <meta name="viewport" content="width=760px, user-scalable=no">
        <title><?php metatitle() ?></title>
        <link rel="stylesheet" href="style-reg.min.css?ver=190620201154">
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
        <script>
            window.addEventListener("load", function(){
                const loader=document.querySelector(".loader");
                loader.className += " hidden"; // class="loader hidden"
            })
        </script>
    </head>
<body>
    <div class="loader">
        <img width="35px;" src="img/asset/loader.gif" alt="Loading...">
        <img style="margin-left:20px;"src="img/asset/logosehatdirumah.svg" alt="Logo Sehat di Rumah">
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
    

    <div class="container">
        <!--Navigation Bar-->
        <?php include_once('static-navigation.html') ?>

        <!--h1 Heading-->
        <div class="row justify-content-center mt35">
            <div class="col text-center">
                <h1 class="f120c font-weight-bold"><span class="cl-aqua-forest">Tinjauan </span><span class="cl-tangerine">Regional</span></h1>
            </div>
        </div>

    </div>

    <div class="rv-coverbg"></div>

    <div class="rv-navbg d-flex flex-column justify-content-center">
        <div class="container">
            <div class="d-flex justify-content-center flex-wrap">
                <a href='#sumatera' class="a-none">
                    <div class="d-flex flex-column flex-nowrap text-center pl40 pr40 pt45 pb45">
                        <div style="height:128px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/Sumatera.svg" alt="Indonesia, Sumatera, Icon">
                        </div>
                        <div class="cl-white f24 font-weight-bold"><span class='cl-white'>Sumatera</span><a class="a-none a-inh-sup click-point" data-id="23"><sup>[23]</sup></a></div>
                    </div>
                </a>
                
                <a href='#jawa' class="a-none">
                    <div class="d-flex flex-column flex-nowrap text-center pl40 pr40 pt45 pb45">
                        <div style="height:128px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/Jawa.svg" alt="Indonesia, Java, Icon">
                        </div>
                        <div class="cl-white f24 font-weight-bold"><span class='cl-white'>Jawa</span><a class="a-none a-inh-sup click-point" data-id="24"><sup>[24]</sup></a></div>
                    </div>
                </a>
                
                <a href='#kalimantan' class="a-none">
                    <div class="d-flex flex-column flex-nowrap text-center pl40 pr40 pt45 pb45">
                        <div style="height:128px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/Kalimantan.svg" alt="Indonesia, Kalimantan, Icon">
                        </div>
                        <div class="cl-white f24 font-weight-bold"><span class='cl-white'>Kalimantan</span><a class="a-none a-inh-sup click-point" data-id="25"><sup>[25]</sup></a></div>
                    </div>
                </a>
                
                <a href='#balinusatenggara' class="a-none">
                    <div class="d-flex flex-column flex-nowrap text-center pl40 pr40 pt45 pb45">
                        <div style="height:128px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/Balnus.svg" alt="Indonesia, Bali & Nusa Tenggara, Icon">
                        </div>
                        <div class="cl-white f24 font-weight-bold"><span class='cl-white'>Bali, Nusa Tenggara</span><a class="a-none a-inh-sup click-point" data-id="26"><sup>[26]</sup></a></div>
                    </div>
                </a>
                
                <a href='#malukupapua' class="a-none">
                    <div class="d-flex flex-column flex-nowrap text-center pl40 pr40 pt45 pb45">
                        <div style="height:128px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/bhinbhin.svg" alt="Indonesia, Maluku & Papua, Icon">
                        </div>
                        <div class="cl-white f24 font-weight-bold"><span class='cl-white'>Maluku, Papua</span><a class="a-none a-inh-sup click-point" data-id="27"><sup>[27]</sup></a></div>
                    </div>
                </a>
                
                <a href='#sulawesi' class="a-none">
                    <div class="d-flex flex-column flex-nowrap text-center pl40 pr40 pt45 pb45">
                        <div style="height:128px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/Sulawesi.svg" alt="Indonesia, Sulawesi, Icon">
                        </div>
                        <div class="cl-white f24 font-weight-bold"><span class='cl-white'>Sulawesi</span><a class="a-none a-inh-sup click-point" data-id="28"><sup>[28]</sup></a></div>
                    </div>
                </a>
                
            </div>
        </div>
    </div>

    <div class="rv-navbg2 d-none">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 text-center pt30 pb30">
                    <div class="f70 cl-white font-weight-bold">Jambi</div>
                    <a class="a-none"><div class="cl-white f14 font-weight-bold font-underline">Lihat statistik lengkap
                    <img  class='lazyload' data-src="img/asset/reg/next.svg" alt="next icon">
                    </div></a>
                </div>
                <div class="col-xl-9 justify-content-center cl-white">
                    <div class="d-flex flex-wrap justify-content-center text-center">
                        <div class="pl30 pr30 pt40 pb40">
                            <div style="height:50px" class="d-flex flex-column justify-content-center">
                                <img  class='lazyload' data-src="img/asset/reg/virus%20(1).svg" alt="Coronavirus infection icon">
                            </div>
                            <div class="f48 font-weight-bold">8</div>
                            <div class="f16 font-weight-bold">Terinfeksi</div>
                        </div>
                        <div class="pl30 pr30 pt40 pb40">
                            <div style="height:50px" class="d-flex flex-column justify-content-center">
                                <img  class='lazyload' data-src="img/asset/reg/battery.svg" alt="Hospital Capacity during coronavirus pandemic">
                            </div>
                            <div class="f48 font-weight-bold">49.2<span class="f24">%</span></div>
                            <div class="f16 font-weight-bold">Kapasitas Rumah Sakit</div>
                        </div>
                        <div class="pl30 pr30 pt40 pb40">
                            <div style="height:50px" class="d-flex flex-column justify-content-center">
                                <img  class='lazyload' data-src="img/asset/reg/distance.svg" alt="Maintain distance during coronavirus pandemic ensure that everyone is safe">
                            </div>
                            <div class="f48 font-weight-bold">44.6<span class="f24">km</span></div>
                            <div class="f16 font-weight-bold">Jarak 1 Pasien dari Lokasi Anda</div>
                        </div>
                        <div class="pl30 pr30 pt40 pb40">
                            <div style="height:50px" class="d-flex flex-column justify-content-center">
                                <img  class='lazyload' data-src="img/asset/reg/doctor.svg" alt="Coronavirus patients served by doctor">
                            </div>
                            <div class="f48 font-weight-bold">227</div>
                            <div class="f16 font-weight-bold">Dokter Per 1 Pasien Aktif</div>
                        </div>
                        <div class="pl30 pr30 pt40 pb40">
                            <div style="height:50px" class="d-flex flex-column justify-content-center">
                                <img  class='lazyload' data-src="img/asset/reg/ambulance.svg" alt="Time needed to go to hospital from average location in the province">
                            </div>
                            <div class="f48 font-weight-bold">39<span class="f24">mnt</span></div>
                            <div class="f16 font-weight-bold">Rata-Rata Waktu Menuju RS</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Region Sumatera-->
    <div class="container rv-container-regview" id='sumatera'>
        <div class="row justify-content-center mt60">
            <h2 class="f70 font-weight-bold cl-turquoise-blue">Regional Sumatera</h2>
        </div>
        <div class="row mt60">
            <div class="col-xl-4 col-lg-4 col-md-5 col-5 rv-sumatera-bg flex-column justify-content-center d-flex align-self-center">
                <img  class='lazyload' data-src="img/asset/reg/Sumateramaps.svg" alt="Peta Pulau sumatera saat Corona">
                <div class="f50 font-weight-bold cl-white mt15 text-lg-center text-left">Pulau Sumatera</div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7 col-7 flex-column justify-content-center d-flex">
                <div class="d-flex justify-content-around text-center flex-wrap">
                    <div class="rv-sumatera-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/virus-s.svg" alt="Coronavirus infection">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $sumStat['t'] ?></div>
                        <div class="f24 font-weight-bold">Terinfeksi<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                        <div><span class="f12"><?php echo $sumStat['t_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $sumStat['t_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-sumatera-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/heart-s.svg" alt="Coronavirus Patients currently in the hospital">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $sumStat['persen_aktif'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Dalam perawatan<a  class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></div>
                        <div><span class="f12"><?php echo $sumStat['persen_aktif_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $sumStat['persen_aktif_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-sumatera-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/battery-s.svg" alt="Current hospital load during coronavirus pandemic in the specific region of Indonesia">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $sumStat['kapasitas_rs'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Kapasitas RS<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></div>
                        <div><span class="f12"><?php echo $sumStat['kapasitas_rs_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $sumStat['kapasitas_rs_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                </div>
                <div>
                    <div class="container-fluid rv-width-chart rv-chart-dnone-main">
                        <!--Title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                            </div>
                        </div>

                        <!--Legend-->
                        <div class="row justify-content-center mb10">
                            <div class="col-12 justify-content-center c1-mw1">
                                <div class="d-flex flex-nowrap justify-content-center">
                                    <div>
                                        <span class="c1-legend1 align-self-center"></span>
                                        <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                                    </div>
                                    <div class="ml30">
                                        <span class="c1-legend2 align-self-center"></span>
                                        <span>Persen kasus aktif</span><a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Data visualization-->
                        <div class="row justify-content-center">
                            <div class="col-12 c1-secdata">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: none;
                                                stroke: #369270;
                                            }
                                        </style>
                                    </defs>
                                    <g transform="translate(-253.026 0)">
                                        <?php rglanding_lchart_sum() ?>
                                    </g>
                                    
                                    
                                </svg>

                            </div>
                        </div>
                        <div class="row justify-content-center c1-negmargin1">
                            <div class="col-12 c1-mw1">
                                <div class="d-flex">

                                    <!--left axis label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                        <?php rglanding_bcharts_sum() ?>
                                    </div>

                                    <!--Center data render-->
                                    <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                        <span class="c1-left-y-ax"></span>
                                        <span class='c1-bardata1 align-self-end'></span>
                                        <span class='c1-bardata2 align-self-end'></span>
                                        <span class='c1-bardata3 align-self-end'></span>
                                        <span class='c1-bardata4 align-self-end'></span>
                                        <span class='c1-bardata5 align-self-end'></span>
                                        <span class='c1-bardata6 align-self-end'></span>
                                        <span class='c1-bardata7 align-self-end'></span>
                                        <span class='c1-bardata8 align-self-end'></span>
                                        <span class='c1-bardata9 align-self-end'></span>
                                        <span class='c1-bardata10 align-self-end'></span>
                                        <span class='c1-bardata11 align-self-end'></span>
                                        <span class='c1-bardata12 align-self-end'></span>
                                        <span class='c1-bardata13 align-self-end'></span>
                                        <span class='c1-bardata14 align-self-end'></span>
                                        <span class='c1-bardata15 align-self-end'></span>
                                        <span class='c1-bardata16 align-self-end'></span>
                                        <span class='c1-bardata17 align-self-end'></span>
                                        <span class='c1-bardata18 align-self-end'></span>
                                        <span class='c1-bardata19 align-self-end'></span>
                                        <span class='c1-bardata20 align-self-end'></span>
                                        <span class='c1-bardata21 align-self-end'></span>
                                        <span class='c1-bardata22 align-self-end'></span>
                                        <span class='c1-bardata23 align-self-end'></span>
                                        <span class='c1-bardata24 align-self-end'></span>
                                        <span class='c1-bardata25 align-self-end'></span>
                                        <span class='c1-bardata26 align-self-end'></span>
                                        <span class='c1-bardata27 align-self-end'></span>
                                        <span class='c1-bardata28 align-self-end'></span>
                                        <span class='c1-bardata29 align-self-end'></span>
                                        <span class='c1-bardata30 align-self-end'></span>
                                        <span class="c1-right-y-ax"></span>
                                    </div>

                                    <!--right data label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                        <?php rglanding_lcharts_sum() ?>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!--X data labels-->
                        <div class="row justify-content-center">
                            <div class="col-12 text-center c1-mw2">
                                <div class="d-flex flex-nowrap justify-content-between">
                                    <?php rglanding_cdate_sum() ?>
                                </div>
                            </div>
                        </div>

                        <!--X Axis title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <div class="f20 font-weight-bold">Tanggal</div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!--chart view on mobile view-->
        <div class="row justify-content-center mt50">
            <div class="container-fluid rv-width-chart rv-chart-dnone-mobile">
                <!--Title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                    </div>
                </div>

                <!--Legend-->
                <div class="row justify-content-center mb10">
                    <div class="col-12 justify-content-center c1-mw1">
                        <div class="d-flex flex-nowrap justify-content-center">
                            <div>
                                <span class="c1-legend1 align-self-center"></span>
                                <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                            </div>
                            <div class="ml30">
                                <span class="c1-legend2 align-self-center"></span>
                                <span>Persen kasus aktif</span><a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Data visualization-->
                <div class="row justify-content-center">
                    <div class="col-12 c1-secdata">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                            <g transform="translate(-253.026 0)">
                                <?php rglanding_lchart_sum() ?>
                            </g>
                        </svg>

                    </div>
                </div>
                <div class="row justify-content-center c1-negmargin1">
                    <div class="col-12 c1-mw1">
                        <div class="d-flex">

                            <!--left axis label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                <?php rglanding_bcharts_sum() ?>
                            </div>

                            <!--Center data render-->
                            <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                <span class="c1-left-y-ax"></span>
                                <span class='c1-bardata1 align-self-end'></span>
                                <span class='c1-bardata2 align-self-end'></span>
                                <span class='c1-bardata3 align-self-end'></span>
                                <span class='c1-bardata4 align-self-end'></span>
                                <span class='c1-bardata5 align-self-end'></span>
                                <span class='c1-bardata6 align-self-end'></span>
                                <span class='c1-bardata7 align-self-end'></span>
                                <span class='c1-bardata8 align-self-end'></span>
                                <span class='c1-bardata9 align-self-end'></span>
                                <span class='c1-bardata10 align-self-end'></span>
                                <span class='c1-bardata11 align-self-end'></span>
                                <span class='c1-bardata12 align-self-end'></span>
                                <span class='c1-bardata13 align-self-end'></span>
                                <span class='c1-bardata14 align-self-end'></span>
                                <span class='c1-bardata15 align-self-end'></span>
                                <span class='c1-bardata16 align-self-end'></span>
                                <span class='c1-bardata17 align-self-end'></span>
                                <span class='c1-bardata18 align-self-end'></span>
                                <span class='c1-bardata19 align-self-end'></span>
                                <span class='c1-bardata20 align-self-end'></span>
                                <span class='c1-bardata21 align-self-end'></span>
                                <span class='c1-bardata22 align-self-end'></span>
                                <span class='c1-bardata23 align-self-end'></span>
                                <span class='c1-bardata24 align-self-end'></span>
                                <span class='c1-bardata25 align-self-end'></span>
                                <span class='c1-bardata26 align-self-end'></span>
                                <span class='c1-bardata27 align-self-end'></span>
                                <span class='c1-bardata28 align-self-end'></span>
                                <span class='c1-bardata29 align-self-end'></span>
                                <span class='c1-bardata30 align-self-end'></span>
                                <span class="c1-right-y-ax"></span>
                            </div>

                            <!--right data label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                <?php rglanding_lcharts_sum() ?>
                            </div>
                        </div>


                    </div>
                </div>

                <!--X data labels-->
                <div class="row justify-content-center">
                    <div class="col-12 text-center c1-mw2">
                        <div class="d-flex flex-nowrap justify-content-between">
                            <?php rglanding_cdate_sum() ?>
                        </div>
                    </div>
                </div>

                <!--X Axis title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <div class="f20 font-weight-bold">Tanggal</div>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <!--Footer - Sumatera-->
    <div class="rv-sumatera-footerbg mt60">
        <div class="container cl-white">
            <div class="row justify-content-center pt30">
                <div class="d-flex justify-content-center">
                    <span class="f50 font-weight-bold mr15">Lihat statistik provinsi</span>
                    <img  class='lazyload' data-src="img/asset/reg/next-lg.svg" alt="go to specific region section">
                </div>
            </div>
            <div class="row justify-content-center pt25 pb25">
                <div class="d-flex justify-content-center flex-wrap f-footercustom">
                    <a href="region?r=aceh" class="a-none"><span class="cl-white rv-footer-navbutton">Aceh</span></a>
                    <a href="region?r=bengkulu" class="a-none"><span class="cl-white rv-footer-navbutton">Bengkulu</span></a>
                    <a href="region?r=jambi" class="a-none"><span class="cl-white rv-footer-navbutton">Jambi</span></a>
                    <a href="region?r=bangkabelitung" class="a-none"><span class="cl-white rv-footer-navbutton">Kep. Bangka Belitung</span></a>
                    <a href="region?r=kepulauanriau" class="a-none"><span class="cl-white rv-footer-navbutton">Kep. Riau</span></a>
                    <a href="region?r=lampung" class="a-none"><span class="cl-white rv-footer-navbutton">Lampung</span></a>
                    <a href="region?r=riau" class="a-none"><span class="cl-white rv-footer-navbutton">Riau</span></a>
                    <a href="region?r=sumaterabarat" class="a-none"><span class="cl-white rv-footer-navbutton">Sumatera Barat</span></a>
                    <a href="region?r=sumateraselatan" class="a-none"><span class="cl-white rv-footer-navbutton">Sumatera Selatan</span></a>
                    <a href="region?r=sumaterautara" class="a-none"><span class="cl-white rv-footer-navbutton">Sumatera Utara</span></a>
                </div>
            </div>
        </div>
    </div>












    <!--Region Jawa-->
    <div class="container rv-container-regview" id='jawa'>
        <div class="row justify-content-center mt60">
            <h2 class="f70 font-weight-bold cl-coral">Regional Jawa</h2>
        </div>
        <div class="row mt60">
            <div class="col-xl-4 col-lg-4 col-md-5 col-5 rv-jawa-bg flex-column justify-content-center d-flex align-self-center">
                <img  class='lazyload' data-src="img/asset/reg/Jawamaps.svg" alt="Peta Pulau jawa saat Corona">
                <div class="f50 font-weight-bold cl-white mt15 text-center">Pulau Jawa</div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7 col-7 flex-column justify-content-center d-flex">
                <div class="d-flex justify-content-around text-center flex-wrap">
                    <div class="rv-jawa-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/virus-s.svg" alt="Coronavirus infection">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $jawStat['t'] ?></div>
                        <div class="f24 font-weight-bold">Terinfeksi<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                        <div><span class="f12"><?php echo $jawStat['t_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $jawStat['t_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-jawa-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/heart-s.svg" alt="Coronavirus Patients currently in the hospital">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $jawStat['persen_aktif'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Dalam perawatan<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></div>
                        <div><span class="f12"><?php echo $jawStat['persen_aktif_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $jawStat['persen_aktif_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-jawa-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/battery-s.svg" alt="Current hospital load during coronavirus pandemic in the specific region of Indonesia">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $jawStat['kapasitas_rs'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Kapasitas RS<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></div>
                        <div><span class="f12"><?php echo $jawStat['kapasitas_rs_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $jawStat['kapasitas_rs_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                </div>
                <div>
                    <div class="container-fluid rv-width-chart rv-chart-dnone-main">
                        <!--Title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                            </div>
                        </div>

                        <!--Legend-->
                        <div class="row justify-content-center mb10">
                            <div class="col-12 justify-content-center c1-mw1">
                                <div class="d-flex flex-nowrap justify-content-center">
                                    <div>
                                        <span class="c2-legend1 align-self-center"></span>
                                        <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                                    </div>
                                    <div class="ml30">
                                        <span class="c2-legend2 align-self-center"></span>
                                        <span>Persen kasus aktif</span><a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Data visualization-->
                        <div class="row justify-content-center">
                            <div class="col-12 c1-secdata">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                                    <g  transform="translate(-253.026 0)">
                                        <?php rglanding_lchart_jaw() ?>
                                    </g>
                                </svg>

                            </div>
                        </div>
                        <div class="row justify-content-center c1-negmargin1">
                            <div class="col-12 c1-mw1">
                                <div class="d-flex">

                                    <!--left axis label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                        <?php rglanding_bcharts_jaw() ?>
                                    </div>

                                    <!--Center data render-->
                                    <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                        <span class="c1-left-y-ax"></span>
                                        <span class='c2-bardata1 align-self-end'></span>
                                        <span class='c2-bardata2 align-self-end'></span>
                                        <span class='c2-bardata3 align-self-end'></span>
                                        <span class='c2-bardata4 align-self-end'></span>
                                        <span class='c2-bardata5 align-self-end'></span>
                                        <span class='c2-bardata6 align-self-end'></span>
                                        <span class='c2-bardata7 align-self-end'></span>
                                        <span class='c2-bardata8 align-self-end'></span>
                                        <span class='c2-bardata9 align-self-end'></span>
                                        <span class='c2-bardata10 align-self-end'></span>
                                        <span class='c2-bardata11 align-self-end'></span>
                                        <span class='c2-bardata12 align-self-end'></span>
                                        <span class='c2-bardata13 align-self-end'></span>
                                        <span class='c2-bardata14 align-self-end'></span>
                                        <span class='c2-bardata15 align-self-end'></span>
                                        <span class='c2-bardata16 align-self-end'></span>
                                        <span class='c2-bardata17 align-self-end'></span>
                                        <span class='c2-bardata18 align-self-end'></span>
                                        <span class='c2-bardata19 align-self-end'></span>
                                        <span class='c2-bardata20 align-self-end'></span>
                                        <span class='c2-bardata21 align-self-end'></span>
                                        <span class='c2-bardata22 align-self-end'></span>
                                        <span class='c2-bardata23 align-self-end'></span>
                                        <span class='c2-bardata24 align-self-end'></span>
                                        <span class='c2-bardata25 align-self-end'></span>
                                        <span class='c2-bardata26 align-self-end'></span>
                                        <span class='c2-bardata27 align-self-end'></span>
                                        <span class='c2-bardata28 align-self-end'></span>
                                        <span class='c2-bardata29 align-self-end'></span>
                                        <span class='c2-bardata30 align-self-end'></span>
                                        <span class="c1-right-y-ax"></span>
                                    </div>

                                    <!--right data label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                        <?php rglanding_lcharts_jaw() ?>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!--X data labels-->
                        <div class="row justify-content-center">
                            <div class="col-12 text-center c1-mw2">
                                <div class="d-flex flex-nowrap justify-content-between">
                                    <?php rglanding_cdate_jaw() ?>
                                </div>
                            </div>
                        </div>

                        <!--X Axis title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <div class="f20 font-weight-bold">Tanggal</div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!--chart view on mobile view-->
        <div class="row justify-content-center mt50">
            <div class="container-fluid rv-width-chart rv-chart-dnone-mobile">
                <!--Title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                    </div>
                </div>

                <!--Legend-->
                <div class="row justify-content-center mb10">
                    <div class="col-12 justify-content-center c1-mw1">
                        <div class="d-flex flex-nowrap justify-content-center">
                            <div>
                                <span class="c2-legend1 align-self-center"></span>
                                <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                            </div>
                            <div class="ml30">
                                <span class="c2-legend2 align-self-center"></span>
                                <span>Persen kasus aktif</span><a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Data visualization-->
                <div class="row justify-content-center">
                    <div class="col-12 c1-secdata">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                            <g  transform="translate(-253.026 0)">
                                <?php rglanding_lchart_jaw() ?>
                            </g>
                        </svg>

                    </div>
                </div>
                <div class="row justify-content-center c1-negmargin1">
                    <div class="col-12 c1-mw1">
                        <div class="d-flex">

                            <!--left axis label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                <?php rglanding_bcharts_jaw() ?>
                            </div>

                            <!--Center data render-->
                            <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                <span class="c1-left-y-ax"></span>
                                <span class='c2-bardata1 align-self-end'></span>
                                <span class='c2-bardata2 align-self-end'></span>
                                <span class='c2-bardata3 align-self-end'></span>
                                <span class='c2-bardata4 align-self-end'></span>
                                <span class='c2-bardata5 align-self-end'></span>
                                <span class='c2-bardata6 align-self-end'></span>
                                <span class='c2-bardata7 align-self-end'></span>
                                <span class='c2-bardata8 align-self-end'></span>
                                <span class='c2-bardata9 align-self-end'></span>
                                <span class='c2-bardata10 align-self-end'></span>
                                <span class='c2-bardata11 align-self-end'></span>
                                <span class='c2-bardata12 align-self-end'></span>
                                <span class='c2-bardata13 align-self-end'></span>
                                <span class='c2-bardata14 align-self-end'></span>
                                <span class='c2-bardata15 align-self-end'></span>
                                <span class='c2-bardata16 align-self-end'></span>
                                <span class='c2-bardata17 align-self-end'></span>
                                <span class='c2-bardata18 align-self-end'></span>
                                <span class='c2-bardata19 align-self-end'></span>
                                <span class='c2-bardata20 align-self-end'></span>
                                <span class='c2-bardata21 align-self-end'></span>
                                <span class='c2-bardata22 align-self-end'></span>
                                <span class='c2-bardata23 align-self-end'></span>
                                <span class='c2-bardata24 align-self-end'></span>
                                <span class='c2-bardata25 align-self-end'></span>
                                <span class='c2-bardata26 align-self-end'></span>
                                <span class='c2-bardata27 align-self-end'></span>
                                <span class='c2-bardata28 align-self-end'></span>
                                <span class='c2-bardata29 align-self-end'></span>
                                <span class='c2-bardata30 align-self-end'></span>
                                <span class="c1-right-y-ax"></span>
                            </div>

                            <!--right data label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                <?php rglanding_lcharts_jaw() ?>
                            </div>
                        </div>


                    </div>
                </div>

                <!--X data labels-->
                <div class="row justify-content-center">
                    <div class="col-12 text-center c1-mw2">
                        <div class="d-flex flex-nowrap justify-content-between">
                            <?php rglanding_cdate_jaw() ?>
                        </div>
                    </div>
                </div>

                <!--X Axis title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <div class="f20 font-weight-bold">Tanggal</div>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <!--Footer - Jawa-->
    <div class="rv-jawa-footerbg mt60">
        <div class="container cl-white">
            <div class="row justify-content-center pt30">
                <div class="d-flex justify-content-center">
                    <span class="f50 font-weight-bold mr15">Lihat statistik provinsi</span>
                    <img  class='lazyload' data-src="img/asset/reg/next-lg.svg" alt="go to specific region section">
                </div>
            </div>
            <div class="row justify-content-center pt25 pb25">
                <div class="d-flex justify-content-center flex-wrap f-footercustom">
                    <a href="region?r=banten" class="a-none"><span class="cl-white rv-footer-navbutton">Banten</span></a>
                    <a href="region?r=jakarta" class="a-none"><span class="cl-white rv-footer-navbutton">DKI Jakarta</span></a>
                    <a href="region?r=jawabarat" class="a-none"><span class="cl-white rv-footer-navbutton">Jawa Barat</span></a>
                    <a href="region?r=jawatengah" class="a-none"><span class="cl-white rv-footer-navbutton">Jawa Tengah</span></a>
                    <a href="region?r=yogyakarta" class="a-none"><span class="cl-white rv-footer-navbutton">DI Yogyakarta</span></a>
                    <a href="region?r=jawatimur" class="a-none"><span class="cl-white rv-footer-navbutton">Jawa Timur</span></a>
                </div>
            </div>
        </div>
    </div>






    <!--Region Kalimantan-->
    <div class="container rv-container-regview" id='kalimantan'>
        <div class="row justify-content-center mt60">
            <h2 class="f70 font-weight-bold cl-salmon">Regional Kalimantan</h2>
        </div>
        <div class="row mt60">
            <div class="col-xl-4 col-lg-4 col-md-5 col-5 rv-kalimantan-bg flex-column justify-content-center d-flex align-self-center">
                <img  class='lazyload' data-src="img/asset/reg/Kalimantanmaps.svg" alt="Peta Pulau Kalimantan saat Corona">
                <div class="f50 font-weight-bold cl-white mt15 text-xl-center text-left">Pulau Kalimantan</div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7 col-7 flex-column justify-content-center d-flex">
                <div class="d-flex justify-content-around text-center flex-wrap">
                    <div class="rv-kalimantan-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/virus-s.svg" alt="Coronavirus infection">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $kalStat['t'] ?></div>
                        <div class="f24 font-weight-bold">Terinfeksi<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                        <div><span class="f12"><?php echo $kalStat['t_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $kalStat['t_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-kalimantan-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/heart-s.svg" alt="Coronavirus Patients currently in the hospital">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $kalStat['persen_aktif'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Dalam perawatan<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></div>
                        <div><span class="f12"><?php echo $kalStat['persen_aktif_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $kalStat['persen_aktif_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-kalimantan-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/battery-s.svg" alt="Current hospital load during coronavirus pandemic in the specific region of Indonesia">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $kalStat['kapasitas_rs'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Kapasitas RS<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></div>
                        <div><span class="f12"><?php echo $kalStat['kapasitas_rs_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $kalStat['kapasitas_rs_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                </div>
                <div>
                    <div class="container-fluid rv-width-chart rv-chart-dnone-main">
                        <!--Title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                            </div>
                        </div>

                        <!--Legend-->
                        <div class="row justify-content-center mb10">
                            <div class="col-12 justify-content-center c1-mw1">
                                <div class="d-flex flex-nowrap justify-content-center">
                                    <div>
                                        <span class="c3-legend1 align-self-center"></span>
                                        <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                                    </div>
                                    <div class="ml30">
                                        <span class="c3-legend2 align-self-center"></span>
                                        <span>Persen kasus aktif</span><a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Data visualization-->
                        <div class="row justify-content-center">
                            <div class="col-12 c1-secdata">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                                    <g transform="translate(-253.026 0)">
                                        <?php rglanding_lchart_kal() ?>
                                    </g>
                                </svg>

                            </div>
                        </div>
                        <div class="row justify-content-center c1-negmargin1">
                            <div class="col-12 c1-mw1">
                                <div class="d-flex">

                                    <!--left axis label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                        <?php rglanding_bcharts_kal() ?>
                                    </div>

                                    <!--Center data render-->
                                    <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                        <span class="c1-left-y-ax"></span>
                                        <span class='c3-bardata1 align-self-end'></span>
                                        <span class='c3-bardata2 align-self-end'></span>
                                        <span class='c3-bardata3 align-self-end'></span>
                                        <span class='c3-bardata4 align-self-end'></span>
                                        <span class='c3-bardata5 align-self-end'></span>
                                        <span class='c3-bardata6 align-self-end'></span>
                                        <span class='c3-bardata7 align-self-end'></span>
                                        <span class='c3-bardata8 align-self-end'></span>
                                        <span class='c3-bardata9 align-self-end'></span>
                                        <span class='c3-bardata10 align-self-end'></span>
                                        <span class='c3-bardata11 align-self-end'></span>
                                        <span class='c3-bardata12 align-self-end'></span>
                                        <span class='c3-bardata13 align-self-end'></span>
                                        <span class='c3-bardata14 align-self-end'></span>
                                        <span class='c3-bardata15 align-self-end'></span>
                                        <span class='c3-bardata16 align-self-end'></span>
                                        <span class='c3-bardata17 align-self-end'></span>
                                        <span class='c3-bardata18 align-self-end'></span>
                                        <span class='c3-bardata19 align-self-end'></span>
                                        <span class='c3-bardata20 align-self-end'></span>
                                        <span class='c3-bardata21 align-self-end'></span>
                                        <span class='c3-bardata22 align-self-end'></span>
                                        <span class='c3-bardata23 align-self-end'></span>
                                        <span class='c3-bardata24 align-self-end'></span>
                                        <span class='c3-bardata25 align-self-end'></span>
                                        <span class='c3-bardata26 align-self-end'></span>
                                        <span class='c3-bardata27 align-self-end'></span>
                                        <span class='c3-bardata28 align-self-end'></span>
                                        <span class='c3-bardata29 align-self-end'></span>
                                        <span class='c3-bardata30 align-self-end'></span>
                                        <span class="c1-right-y-ax"></span>
                                    </div>

                                    <!--right data label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                        <?php rglanding_lcharts_kal() ?>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!--X data labels-->
                        <div class="row justify-content-center">
                            <div class="col-12 text-center c1-mw2">
                                <div class="d-flex flex-nowrap justify-content-between">
                                    <?php rglanding_cdate_kal() ?>
                                </div>
                            </div>
                        </div>

                        <!--X Axis title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <div class="f20 font-weight-bold">Tanggal</div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!--chart view on mobile view-->
        <div class="row justify-content-center mt50">
            <div class="container-fluid rv-width-chart rv-chart-dnone-mobile">
                <!--Title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                    </div>
                </div>

                <!--Legend-->
                <div class="row justify-content-center mb10">
                    <div class="col-12 justify-content-center c1-mw1">
                        <div class="d-flex flex-nowrap justify-content-center">
                            <div>
                                <span class="c3-legend1 align-self-center"></span>
                                <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                            </div>
                            <div class="ml30">
                                <span class="c3-legend2 align-self-center"></span>
                                <span>Persen kasus aktif</span><a  class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Data visualization-->
                <div class="row justify-content-center">
                    <div class="col-12 c1-secdata">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                            <g  transform="translate(-253.026 0)">
                                <?php rglanding_lchart_kal() ?>
                            </g>
                        </svg>

                    </div>
                </div>
                <div class="row justify-content-center c1-negmargin1">
                    <div class="col-12 c1-mw1">
                        <div class="d-flex">

                            <!--left axis label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                <?php rglanding_bcharts_kal() ?>
                            </div>

                            <!--Center data render-->
                            <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                <span class="c1-left-y-ax"></span>
                                <span class='c3-bardata1 align-self-end'></span>
                                <span class='c3-bardata2 align-self-end'></span>
                                <span class='c3-bardata3 align-self-end'></span>
                                <span class='c3-bardata4 align-self-end'></span>
                                <span class='c3-bardata5 align-self-end'></span>
                                <span class='c3-bardata6 align-self-end'></span>
                                <span class='c3-bardata7 align-self-end'></span>
                                <span class='c3-bardata8 align-self-end'></span>
                                <span class='c3-bardata9 align-self-end'></span>
                                <span class='c3-bardata10 align-self-end'></span>
                                <span class='c3-bardata11 align-self-end'></span>
                                <span class='c3-bardata12 align-self-end'></span>
                                <span class='c3-bardata13 align-self-end'></span>
                                <span class='c3-bardata14 align-self-end'></span>
                                <span class='c3-bardata15 align-self-end'></span>
                                <span class='c3-bardata16 align-self-end'></span>
                                <span class='c3-bardata17 align-self-end'></span>
                                <span class='c3-bardata18 align-self-end'></span>
                                <span class='c3-bardata19 align-self-end'></span>
                                <span class='c3-bardata20 align-self-end'></span>
                                <span class='c3-bardata21 align-self-end'></span>
                                <span class='c3-bardata22 align-self-end'></span>
                                <span class='c3-bardata23 align-self-end'></span>
                                <span class='c3-bardata24 align-self-end'></span>
                                <span class='c3-bardata25 align-self-end'></span>
                                <span class='c3-bardata26 align-self-end'></span>
                                <span class='c3-bardata27 align-self-end'></span>
                                <span class='c3-bardata28 align-self-end'></span>
                                <span class='c3-bardata29 align-self-end'></span>
                                <span class='c3-bardata30 align-self-end'></span>
                                <span class="c1-right-y-ax"></span>
                            </div>

                            <!--right data label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                <?php rglanding_lcharts_kal() ?>
                            </div>
                        </div>


                    </div>
                </div>

                <!--X data labels-->
                <div class="row justify-content-center">
                    <div class="col-12 text-center c1-mw2">
                        <div class="d-flex flex-nowrap justify-content-between">
                            <?php rglanding_cdate_kal() ?>
                        </div>
                    </div>
                </div>

                <!--X Axis title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <div class="f20 font-weight-bold">Tanggal</div>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <!--Footer - Kalimantan-->
    <div class="rv-kalimantan-footerbg mt60">
        <div class="container cl-white">
            <div class="row justify-content-center pt30">
                <div class="d-flex justify-content-center">
                    <span class="f50 font-weight-bold mr15">Lihat statistik provinsi</span>
                    <img  class='lazyload' data-src="img/asset/reg/next-lg.svg" alt="go to specific region section">
                </div>
            </div>
            <div class="row justify-content-center pt25 pb25">
                <div class="d-flex justify-content-center flex-wrap f-footercustom">
                    <a href="region?r=kalimantanbarat" class="a-none"><span class="cl-white rv-footer-navbutton">Kalimantan Barat</span></a>
                    <a href="region?r=kalimantanselatan" class="a-none"><span class="cl-white rv-footer-navbutton">Kalimantan Selatan</span></a>
                    <a href="region?r=kalimantantengah" class="a-none"><span class="cl-white rv-footer-navbutton">Kalimantan Tengah</span></a>
                    <a href="region?r=kalimantantimur" class="a-none"><span class="cl-white rv-footer-navbutton">Kalimantan Timur</span></a>
                    <a href="region?r=kalimantanutara" class="a-none"><span class="cl-white rv-footer-navbutton">Kalimantan Utara</span></a>
                </div>
            </div>
        </div>
    </div>





    <!--Region Bali & Nusa Tenggara-->
    <div class="container rv-container-regview" id='balinusatenggara'>
        <div class="row justify-content-center mt60">
            <h2 class="f70 font-weight-bold cl-pink-salmon text-center">Regional Bali & Nusa Tenggara</h2>
        </div>
        <div class="row mt60">
            <div class="col-xl-4 col-lg-4 col-md-5 col-5 rv-balnus-bg flex-column justify-content-center d-flex align-self-center">
                <img  class='lazyload' data-src="img/asset/reg/BaliNTTNTBmaps.svg" alt="Peta Pulau Bali & Nusa Tenggara saat Corona">
                <div class="f50 font-weight-bold cl-white mt15 text-xl-center text-left">Bali &amp; Nusa Tenggara</div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7 col-7 flex-column justify-content-center d-flex">
                <div class="d-flex justify-content-around text-center flex-wrap">
                    <div class="rv-balnus-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/virus-s.svg" alt="Coronavirus infection">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $basStat['t'] ?></div>
                        <div class="f24 font-weight-bold">Terinfeksi<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                        <div><span class="f12"><?php echo $basStat['t_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $basStat['t_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-balnus-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/heart-s.svg" alt="Coronavirus Patients currently in the hospital">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $basStat['persen_aktif'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Dalam perawatan<a  class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></div>
                        <div><span class="f12"><?php echo $basStat['persen_aktif_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $basStat['persen_aktif_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-balnus-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/battery-s.svg" alt="Current hospital load during coronavirus pandemic in the specific region of Indonesia">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $basStat['kapasitas_rs'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Kapasitas RS<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></div>
                        <div><span class="f12"><?php echo $basStat['kapasitas_rs_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $basStat['kapasitas_rs_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                </div>
                <div>
                    <div class="container-fluid rv-width-chart rv-chart-dnone-main">
                        <!--Title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                            </div>
                        </div>

                        <!--Legend-->
                        <div class="row justify-content-center mb10">
                            <div class="col-12 justify-content-center c1-mw1">
                                <div class="d-flex flex-nowrap justify-content-center">
                                    <div>
                                        <span class="c4-legend1 align-self-center"></span>
                                        <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                                    </div>
                                    <div class="ml30">
                                        <span class="c4-legend2 align-self-center"></span>
                                        <span>Persen kasus aktif</span><a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Data visualization-->
                        <div class="row justify-content-center">
                            <div class="col-12 c1-secdata">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                                    <g transform="translate(-253.026 0)">
                                        <?php rglanding_lchart_bas() ?>
                                    </g>
                                </svg>

                            </div>
                        </div>
                        <div class="row justify-content-center c1-negmargin1">
                            <div class="col-12 c1-mw1">
                                <div class="d-flex">

                                    <!--left axis label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                        <?php rglanding_bcharts_bas() ?>
                                    </div>

                                    <!--Center data render-->
                                    <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                        <span class="c1-left-y-ax"></span>
                                        <span class='c4-bardata1 align-self-end'></span>
                                        <span class='c4-bardata2 align-self-end'></span>
                                        <span class='c4-bardata3 align-self-end'></span>
                                        <span class='c4-bardata4 align-self-end'></span>
                                        <span class='c4-bardata5 align-self-end'></span>
                                        <span class='c4-bardata6 align-self-end'></span>
                                        <span class='c4-bardata7 align-self-end'></span>
                                        <span class='c4-bardata8 align-self-end'></span>
                                        <span class='c4-bardata9 align-self-end'></span>
                                        <span class='c4-bardata10 align-self-end'></span>
                                        <span class='c4-bardata11 align-self-end'></span>
                                        <span class='c4-bardata12 align-self-end'></span>
                                        <span class='c4-bardata13 align-self-end'></span>
                                        <span class='c4-bardata14 align-self-end'></span>
                                        <span class='c4-bardata15 align-self-end'></span>
                                        <span class='c4-bardata16 align-self-end'></span>
                                        <span class='c4-bardata17 align-self-end'></span>
                                        <span class='c4-bardata18 align-self-end'></span>
                                        <span class='c4-bardata19 align-self-end'></span>
                                        <span class='c4-bardata20 align-self-end'></span>
                                        <span class='c4-bardata21 align-self-end'></span>
                                        <span class='c4-bardata22 align-self-end'></span>
                                        <span class='c4-bardata23 align-self-end'></span>
                                        <span class='c4-bardata24 align-self-end'></span>
                                        <span class='c4-bardata25 align-self-end'></span>
                                        <span class='c4-bardata26 align-self-end'></span>
                                        <span class='c4-bardata27 align-self-end'></span>
                                        <span class='c4-bardata28 align-self-end'></span>
                                        <span class='c4-bardata29 align-self-end'></span>
                                        <span class='c4-bardata30 align-self-end'></span>
                                        <span class="c1-right-y-ax"></span>
                                    </div>

                                    <!--right data label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                        <?php rglanding_lcharts_bas() ?>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!--X data labels-->
                        <div class="row justify-content-center">
                            <div class="col-12 text-center c1-mw2">
                                <div class="d-flex flex-nowrap justify-content-between">
                                    <?php rglanding_cdate_bas() ?>
                                </div>
                            </div>
                        </div>

                        <!--X Axis title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <div class="f20 font-weight-bold">Tanggal</div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!--chart view on mobile view-->
        <div class="row justify-content-center mt50">
            <div class="container-fluid rv-width-chart rv-chart-dnone-mobile">
                <!--Title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                    </div>
                </div>

                <!--Legend-->
                <div class="row justify-content-center mb10">
                    <div class="col-12 justify-content-center c1-mw1">
                        <div class="d-flex flex-nowrap justify-content-center">
                            <div>
                                <span class="c4-legend1 align-self-center"></span>
                                <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                            </div>
                            <div class="ml30">
                                <span class="c4-legend2 align-self-center"></span>
                                <span>Persen kasus aktif</span><a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Data visualization-->
                <div class="row justify-content-center">
                    <div class="col-12 c1-secdata">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                            <g id="Line_chart" data-name="Line chart" transform="translate(-253.026 0)">
                                <?php rglanding_lchart_bas() ?>
                            </g>
                        </svg>

                    </div>
                </div>
                <div class="row justify-content-center c1-negmargin1">
                    <div class="col-12 c1-mw1">
                        <div class="d-flex">

                            <!--left axis label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                <?php rglanding_bcharts_bas() ?>
                            </div>

                            <!--Center data render-->
                            <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                <span class="c1-left-y-ax"></span>
                                <span class='c4-bardata1 align-self-end'></span>
                                <span class='c4-bardata2 align-self-end'></span>
                                <span class='c4-bardata3 align-self-end'></span>
                                <span class='c4-bardata4 align-self-end'></span>
                                <span class='c4-bardata5 align-self-end'></span>
                                <span class='c4-bardata6 align-self-end'></span>
                                <span class='c4-bardata7 align-self-end'></span>
                                <span class='c4-bardata8 align-self-end'></span>
                                <span class='c4-bardata9 align-self-end'></span>
                                <span class='c4-bardata10 align-self-end'></span>
                                <span class='c4-bardata11 align-self-end'></span>
                                <span class='c4-bardata12 align-self-end'></span>
                                <span class='c4-bardata13 align-self-end'></span>
                                <span class='c4-bardata14 align-self-end'></span>
                                <span class='c4-bardata15 align-self-end'></span>
                                <span class='c4-bardata16 align-self-end'></span>
                                <span class='c4-bardata17 align-self-end'></span>
                                <span class='c4-bardata18 align-self-end'></span>
                                <span class='c4-bardata19 align-self-end'></span>
                                <span class='c4-bardata20 align-self-end'></span>
                                <span class='c4-bardata21 align-self-end'></span>
                                <span class='c4-bardata22 align-self-end'></span>
                                <span class='c4-bardata23 align-self-end'></span>
                                <span class='c4-bardata24 align-self-end'></span>
                                <span class='c4-bardata25 align-self-end'></span>
                                <span class='c4-bardata26 align-self-end'></span>
                                <span class='c4-bardata27 align-self-end'></span>
                                <span class='c4-bardata28 align-self-end'></span>
                                <span class='c4-bardata29 align-self-end'></span>
                                <span class='c4-bardata30 align-self-end'></span>
                                <span class="c1-right-y-ax"></span>
                            </div>

                            <!--right data label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                <?php rglanding_lcharts_bas() ?>
                            </div>
                        </div>


                    </div>
                </div>

                <!--X data labels-->
                <div class="row justify-content-center">
                    <div class="col-12 text-center c1-mw2">
                        <div class="d-flex flex-nowrap justify-content-between">
                            <?php rglanding_cdate_bas() ?>
                        </div>
                    </div>
                </div>

                <!--X Axis title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <div class="f20 font-weight-bold">Tanggal</div>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <!--Footer - Bali & Nusa Tenggara-->
    <div class="rv-balnus-footerbg mt60">
        <div class="container cl-white">
            <div class="row justify-content-center pt30">
                <div class="d-flex justify-content-center">
                    <span class="f50 font-weight-bold mr15">Lihat statistik provinsi</span>
                    <img  class='lazyload' data-src="img/asset/reg/next-lg.svg" alt="go to specific region section">
                </div>
            </div>
            <div class="row justify-content-center pt25 pb25">
                <div class="d-flex justify-content-center flex-wrap f-footercustom">
                    <a href="region?r=bali" class="a-none"><span class="cl-white rv-footer-navbutton">Bali</span></a>
                    <a href="region?r=nusatenggarabarat" class="a-none"><span class="cl-white rv-footer-navbutton">Nusa Tenggara Barat</span></a>
                    <a href="region?r=nusatenggaratimur" class="a-none"><span class="cl-white rv-footer-navbutton">Nusa Tenggara Timur</span></a>
                </div>
            </div>
        </div>
    </div>




    <!--Region Maluku & Papua-->
    <div class="container rv-container-regview" id='malukupapua'>
        <div class="row justify-content-center mt60">
            <h2 class="f70 font-weight-bold cl-portage text-center">Regional Maluku & Papua</h2>
        </div>
        <div class="row mt60">
            <div class="col-xl-4 col-lg-4 col-md-5 col-5 rv-malpap-bg flex-column justify-content-center d-flex align-self-center">
                <img  class='lazyload' data-src="img/asset/reg/MalukuPapuamaps.svg" alt="Peta Pulau Maluku & Papua saat Corona">
                <div class="f50 font-weight-bold cl-white mt15 text-xl-center text-left">Maluku & Papua</div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7 col-7 flex-column justify-content-center d-flex">
                <div class="d-flex justify-content-around text-center flex-wrap">
                    <div class="rv-malpap-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/virus-s.svg" alt="Coronavirus infection">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $mapStat['t'] ?></div>
                        <div class="f24 font-weight-bold">Terinfeksi<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                        <div><span class="f12"><?php echo $mapStat['t_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $mapStat['t_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-malpap-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/heart-s.svg" alt="Coronavirus Patients currently in the hospital">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $mapStat['persen_aktif'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Dalam perawatan<a  class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></div>
                        <div><span class="f12"><?php echo $mapStat['persen_aktif_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $mapStat['persen_aktif_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-malpap-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/battery-s.svg" alt="Current hospital load during coronavirus pandemic in the specific region of Indonesia">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $mapStat['kapasitas_rs'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Kapasitas RS<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></div>
                        <div><span class="f12"><?php echo $mapStat['kapasitas_rs_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $mapStat['kapasitas_rs_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                </div>
                <div>
                    <div class="container-fluid rv-width-chart rv-chart-dnone-main">
                        <!--Title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                            </div>
                        </div>

                        <!--Legend-->
                        <div class="row justify-content-center mb10">
                            <div class="col-12 justify-content-center c1-mw1">
                                <div class="d-flex flex-nowrap justify-content-center">
                                    <div>
                                        <span class="c5-legend1 align-self-center"></span>
                                        <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                                    </div>
                                    <div class="ml30">
                                        <span class="c5-legend2 align-self-center"></span>
                                        <span>Persen kasus aktif</span><a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Data visualization-->
                        <div class="row justify-content-center">
                            <div class="col-12 c1-secdata">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                                    <g transform="translate(-253.026 0)">
                                        <?php rglanding_lchart_map() ?>
                                    </g>
                                </svg>

                            </div>
                        </div>
                        <div class="row justify-content-center c1-negmargin1">
                            <div class="col-12 c1-mw1">
                                <div class="d-flex">

                                    <!--left axis label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                        <?php rglanding_bcharts_map() ?>
                                    </div>

                                    <!--Center data render-->
                                    <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                        <span class="c1-left-y-ax"></span>
                                        <span class='c5-bardata1 align-self-end'></span>
                                        <span class='c5-bardata2 align-self-end'></span>
                                        <span class='c5-bardata3 align-self-end'></span>
                                        <span class='c5-bardata4 align-self-end'></span>
                                        <span class='c5-bardata5 align-self-end'></span>
                                        <span class='c5-bardata6 align-self-end'></span>
                                        <span class='c5-bardata7 align-self-end'></span>
                                        <span class='c5-bardata8 align-self-end'></span>
                                        <span class='c5-bardata9 align-self-end'></span>
                                        <span class='c5-bardata10 align-self-end'></span>
                                        <span class='c5-bardata11 align-self-end'></span>
                                        <span class='c5-bardata12 align-self-end'></span>
                                        <span class='c5-bardata13 align-self-end'></span>
                                        <span class='c5-bardata14 align-self-end'></span>
                                        <span class='c5-bardata15 align-self-end'></span>
                                        <span class='c5-bardata16 align-self-end'></span>
                                        <span class='c5-bardata17 align-self-end'></span>
                                        <span class='c5-bardata18 align-self-end'></span>
                                        <span class='c5-bardata19 align-self-end'></span>
                                        <span class='c5-bardata20 align-self-end'></span>
                                        <span class='c5-bardata21 align-self-end'></span>
                                        <span class='c5-bardata22 align-self-end'></span>
                                        <span class='c5-bardata23 align-self-end'></span>
                                        <span class='c5-bardata24 align-self-end'></span>
                                        <span class='c5-bardata25 align-self-end'></span>
                                        <span class='c5-bardata26 align-self-end'></span>
                                        <span class='c5-bardata27 align-self-end'></span>
                                        <span class='c5-bardata28 align-self-end'></span>
                                        <span class='c5-bardata29 align-self-end'></span>
                                        <span class='c5-bardata30 align-self-end'></span>
                                        <span class="c1-right-y-ax"></span>
                                    </div>

                                    <!--right data label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                        <?php rglanding_lcharts_map() ?>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!--X data labels-->
                        <div class="row justify-content-center">
                            <div class="col-12 text-center c1-mw2">
                                <div class="d-flex flex-nowrap justify-content-between">
                                    <?php rglanding_cdate_map() ?>
                                </div>
                            </div>
                        </div>

                        <!--X Axis title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <div class="f20 font-weight-bold">Tanggal</div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!--chart view on mobile view-->
        <div class="row justify-content-center mt50">
            <div class="container-fluid rv-width-chart rv-chart-dnone-mobile">
                <!--Title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                    </div>
                </div>

                <!--Legend-->
                <div class="row justify-content-center mb10">
                    <div class="col-12 justify-content-center c1-mw1">
                        <div class="d-flex flex-nowrap justify-content-center">
                            <div>
                                <span class="c5-legend1 align-self-center"></span>
                                <span>Pertambahan kasus per hari</span><a  class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                            </div>
                            <div class="ml30">
                                <span class="c5-legend2 align-self-center"></span>
                                <span>Persen kasus aktif</span><a  class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Data visualization-->
                <div class="row justify-content-center">
                    <div class="col-12 c1-secdata">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                            <g transform="translate(-253.026 0)">
                                <?php rglanding_lchart_map() ?>
                            </g>
                        </svg>

                    </div>
                </div>
                <div class="row justify-content-center c1-negmargin1">
                    <div class="col-12 c1-mw1">
                        <div class="d-flex">

                            <!--left axis label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                <?php rglanding_bcharts_map() ?>
                            </div>

                            <!--Center data render-->
                            <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                <span class="c1-left-y-ax"></span>
                                <span class='c5-bardata1 align-self-end'></span>
                                <span class='c5-bardata2 align-self-end'></span>
                                <span class='c5-bardata3 align-self-end'></span>
                                <span class='c5-bardata4 align-self-end'></span>
                                <span class='c5-bardata5 align-self-end'></span>
                                <span class='c5-bardata6 align-self-end'></span>
                                <span class='c5-bardata7 align-self-end'></span>
                                <span class='c5-bardata8 align-self-end'></span>
                                <span class='c5-bardata9 align-self-end'></span>
                                <span class='c5-bardata10 align-self-end'></span>
                                <span class='c5-bardata11 align-self-end'></span>
                                <span class='c5-bardata12 align-self-end'></span>
                                <span class='c5-bardata13 align-self-end'></span>
                                <span class='c5-bardata14 align-self-end'></span>
                                <span class='c5-bardata15 align-self-end'></span>
                                <span class='c5-bardata16 align-self-end'></span>
                                <span class='c5-bardata17 align-self-end'></span>
                                <span class='c5-bardata18 align-self-end'></span>
                                <span class='c5-bardata19 align-self-end'></span>
                                <span class='c5-bardata20 align-self-end'></span>
                                <span class='c5-bardata21 align-self-end'></span>
                                <span class='c5-bardata22 align-self-end'></span>
                                <span class='c5-bardata23 align-self-end'></span>
                                <span class='c5-bardata24 align-self-end'></span>
                                <span class='c5-bardata25 align-self-end'></span>
                                <span class='c5-bardata26 align-self-end'></span>
                                <span class='c5-bardata27 align-self-end'></span>
                                <span class='c5-bardata28 align-self-end'></span>
                                <span class='c5-bardata29 align-self-end'></span>
                                <span class='c5-bardata30 align-self-end'></span>
                                <span class="c1-right-y-ax"></span>
                            </div>

                            <!--right data label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                <?php rglanding_lcharts_map() ?>
                            </div>
                        </div>


                    </div>
                </div>

                <!--X data labels-->
                <div class="row justify-content-center">
                    <div class="col-12 text-center c1-mw2">
                        <div class="d-flex flex-nowrap justify-content-between">
                            <?php rglanding_cdate_map() ?>
                        </div>
                    </div>
                </div>

                <!--X Axis title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <div class="f20 font-weight-bold">Tanggal</div>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <!--Footer - Maluku & Papua-->
    <div class="rv-malpap-footerbg mt60">
        <div class="container cl-white">
            <div class="row justify-content-center pt30">
                <div class="d-flex justify-content-center">
                    <span class="f50 font-weight-bold mr15">Lihat statistik provinsi</span>
                    <img  class='lazyload' data-src="img/asset/reg/next-lg.svg" alt="go to specific region section">
                </div>
            </div>
            <div class="row justify-content-center pt25 pb25">
                <div class="d-flex justify-content-center flex-wrap f-footercustom">
                    <a href="region?r=maluku" class="a-none"><span class="cl-white rv-footer-navbutton">Maluku</span></a>
                    <a href="region?r=malukuutara" class="a-none"><span class="cl-white rv-footer-navbutton">Maluku Utara</span></a>
                    <a href="region?r=papuabarat" class="a-none"><span class="cl-white rv-footer-navbutton">Papua Barat</span></a>
                    <a href="region?r=papua" class="a-none"><span class="cl-white rv-footer-navbutton">Papua</span></a>
                </div>
            </div>
        </div>
    </div>


    <!--Region Sulawesi-->
    <div class="container rv-container-regview" id='sulawesi'>
        <div class="row justify-content-center mt60">
            <h2 class="f70 font-weight-bold cl-malibu text-center">Regional Sulawesi</h2>
        </div>
        <div class="row mt60">
            <div class="col-xl-4 col-lg-4 col-md-5 col-5 rv-sulawesi-bg flex-column justify-content-center d-flex align-self-center">
                <img  class='lazyload' data-src="img/asset/reg/Sulawesimaps.svg" alt="Peta Pulau Sulawesi saat Corona">
                <div class="f50 font-weight-bold cl-white mt15 text-xl-center text-left">Pulau Sulawesi</div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7 col-7 flex-column justify-content-center d-flex">
                <div class="d-flex justify-content-around text-center flex-wrap">
                    <div class="rv-sulawesi-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/virus-s.svg" alt="Coronavirus infection">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $sulStat['t'] ?></div>
                        <div class="f24 font-weight-bold">Terinfeksi<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                        <div><span class="f12"><?php echo $sulStat['t_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $sulStat['t_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-sulawesi-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/heart-s.svg" alt="Coronavirus Patients currently in the hospital">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $sulStat['persen_aktif'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Dalam perawatan<a  class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></div>
                        <div><span class="f12"><?php echo $sulStat['persen_aktif_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $sulStat['persen_aktif_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                    <div class="rv-sulawesi-scircle cl-white flex-column justify-content-center d-flex pt40 pb40 mt40 mb40">
                        <div style="height:70px" class="d-flex flex-column justify-content-center">
                            <img  class='lazyload' data-src="img/asset/reg/battery-s.svg" alt="Current hospital load during coronavirus pandemic in the specific region of Indonesia">
                        </div>
                        <div class="f64 font-weight-bold"><?php echo $sulStat['kapasitas_rs'] ?><span class="f32">%</span></div>
                        <div class="f24 font-weight-bold">Kapasitas RS<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></div>
                        <div><span class="f12"><?php echo $sulStat['kapasitas_rs_id'] ?></span> <span class="f16 font-weight-bold"><?php echo $sulStat['kapasitas_rs_per_id'] ?>%</span> <span class="f12">Indonesia</span></div>
                    </div>
                </div>
                <div>
                    <div class="container-fluid rv-width-chart rv-chart-dnone-main">
                        <!--Title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                            </div>
                        </div>

                        <!--Legend-->
                        <div class="row justify-content-center mb10">
                            <div class="col-12 justify-content-center c1-mw1">
                                <div class="d-flex flex-nowrap justify-content-center">
                                    <div>
                                        <span class="c6-legend1 align-self-center"></span>
                                        <span>Pertambahan kasus per hari</span><a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                                    </div>
                                    <div class="ml30">
                                        <span class="c6-legend2 align-self-center"></span>
                                        <span>Persen kasus aktif</span><a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Data visualization-->
                        <div class="row justify-content-center">
                            <div class="col-12 c1-secdata">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                                    <g transform="translate(-253.026 0)">
                                        <?php rglanding_lchart_sul() ?>
                                    </g>
                                </svg>

                            </div>
                        </div>
                        <div class="row justify-content-center c1-negmargin1">
                            <div class="col-12 c1-mw1">
                                <div class="d-flex">

                                    <!--left axis label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                        <?php rglanding_bcharts_sul() ?>
                                    </div>

                                    <!--Center data render-->
                                    <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                        <span class="c1-left-y-ax"></span>
                                        <span class='c6-bardata1 align-self-end'></span>
                                        <span class='c6-bardata2 align-self-end'></span>
                                        <span class='c6-bardata3 align-self-end'></span>
                                        <span class='c6-bardata4 align-self-end'></span>
                                        <span class='c6-bardata5 align-self-end'></span>
                                        <span class='c6-bardata6 align-self-end'></span>
                                        <span class='c6-bardata7 align-self-end'></span>
                                        <span class='c6-bardata8 align-self-end'></span>
                                        <span class='c6-bardata9 align-self-end'></span>
                                        <span class='c6-bardata10 align-self-end'></span>
                                        <span class='c6-bardata11 align-self-end'></span>
                                        <span class='c6-bardata12 align-self-end'></span>
                                        <span class='c6-bardata13 align-self-end'></span>
                                        <span class='c6-bardata14 align-self-end'></span>
                                        <span class='c6-bardata15 align-self-end'></span>
                                        <span class='c6-bardata16 align-self-end'></span>
                                        <span class='c6-bardata17 align-self-end'></span>
                                        <span class='c6-bardata18 align-self-end'></span>
                                        <span class='c6-bardata19 align-self-end'></span>
                                        <span class='c6-bardata20 align-self-end'></span>
                                        <span class='c6-bardata21 align-self-end'></span>
                                        <span class='c6-bardata22 align-self-end'></span>
                                        <span class='c6-bardata23 align-self-end'></span>
                                        <span class='c6-bardata24 align-self-end'></span>
                                        <span class='c6-bardata25 align-self-end'></span>
                                        <span class='c6-bardata26 align-self-end'></span>
                                        <span class='c6-bardata27 align-self-end'></span>
                                        <span class='c6-bardata28 align-self-end'></span>
                                        <span class='c6-bardata29 align-self-end'></span>
                                        <span class='c6-bardata30 align-self-end'></span>
                                        <span class="c1-right-y-ax"></span>
                                    </div>

                                    <!--right data label-->
                                    <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                        <?php rglanding_lcharts_sul() ?>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!--X data labels-->
                        <div class="row justify-content-center">
                            <div class="col-12 text-center c1-mw2">
                                <div class="d-flex flex-nowrap justify-content-between">
                                    <?php rglanding_cdate_sul() ?>
                                </div>
                            </div>
                        </div>

                        <!--X Axis title-->
                        <div class="row justify-content-center mb20">
                            <div class="col-12 text-center c1-mw1">
                                <div class="f20 font-weight-bold">Tanggal</div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
        <!--chart view on mobile view-->
        <div class="row justify-content-center mt50">
            <div class="container-fluid rv-width-chart rv-chart-dnone-mobile">
                <!--Title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <h3 class="f32 font-weight-bold">Pertambahan dan Persentase Kasus Aktif</h3>
                    </div>
                </div>

                <!--Legend-->
                <div class="row justify-content-center mb10">
                    <div class="col-12 justify-content-center c1-mw1">
                        <div class="d-flex flex-nowrap justify-content-center">
                            <div>
                                <span class="c6-legend1 align-self-center"></span>
                                <span>Pertambahan kasus per hari</span><a  class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a>
                            </div>
                            <div class="ml30">
                                <span class="c6-legend2 align-self-center"></span>
                                <span>Persen kasus aktif</span><a  class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Data visualization-->
                <div class="row justify-content-center">
                    <div class="col-12 c1-secdata">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="c1-linechart">
                            <g transform="translate(-253.026 0)">
                                <?php rglanding_lchart_sul() ?>
                            </g>
                        </svg>

                    </div>
                </div>
                <div class="row justify-content-center c1-negmargin1">
                    <div class="col-12 c1-mw1">
                        <div class="d-flex">

                            <!--left axis label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                <?php rglanding_bcharts_sul() ?>
                            </div>

                            <!--Center data render-->
                            <div class="d-flex flex-nowrap c1-bottom-x-ax justify-content-between">
                                <span class="c1-left-y-ax"></span>
                                <span class='c6-bardata1 align-self-end'></span>
                                <span class='c6-bardata2 align-self-end'></span>
                                <span class='c6-bardata3 align-self-end'></span>
                                <span class='c6-bardata4 align-self-end'></span>
                                <span class='c6-bardata5 align-self-end'></span>
                                <span class='c6-bardata6 align-self-end'></span>
                                <span class='c6-bardata7 align-self-end'></span>
                                <span class='c6-bardata8 align-self-end'></span>
                                <span class='c6-bardata9 align-self-end'></span>
                                <span class='c6-bardata10 align-self-end'></span>
                                <span class='c6-bardata11 align-self-end'></span>
                                <span class='c6-bardata12 align-self-end'></span>
                                <span class='c6-bardata13 align-self-end'></span>
                                <span class='c6-bardata14 align-self-end'></span>
                                <span class='c6-bardata15 align-self-end'></span>
                                <span class='c6-bardata16 align-self-end'></span>
                                <span class='c6-bardata17 align-self-end'></span>
                                <span class='c6-bardata18 align-self-end'></span>
                                <span class='c6-bardata19 align-self-end'></span>
                                <span class='c6-bardata20 align-self-end'></span>
                                <span class='c6-bardata21 align-self-end'></span>
                                <span class='c6-bardata22 align-self-end'></span>
                                <span class='c6-bardata23 align-self-end'></span>
                                <span class='c6-bardata24 align-self-end'></span>
                                <span class='c6-bardata25 align-self-end'></span>
                                <span class='c6-bardata26 align-self-end'></span>
                                <span class='c6-bardata27 align-self-end'></span>
                                <span class='c6-bardata28 align-self-end'></span>
                                <span class='c6-bardata29 align-self-end'></span>
                                <span class='c6-bardata30 align-self-end'></span>
                                <span class="c1-right-y-ax"></span>
                            </div>

                            <!--right data label-->
                            <div class="c1-right-y-ax-unit d-flex flex-column flex-nowrap justify-content-between ml5">
                                <?php rglanding_lcharts_sul() ?>
                            </div>
                        </div>


                    </div>
                </div>

                <!--X data labels-->
                <div class="row justify-content-center">
                    <div class="col-12 text-center c1-mw2">
                        <div class="d-flex flex-nowrap justify-content-between">
                            <?php rglanding_cdate_sul() ?>
                        </div>
                    </div>
                </div>

                <!--X Axis title-->
                <div class="row justify-content-center mb20">
                    <div class="col-12 text-center c1-mw1">
                        <div class="f20 font-weight-bold">Tanggal</div>
                    </div>
                </div>




            </div>
        </div>
    </div>
    <!--Footer - Sulawesi-->
    <div class="rv-sulawesi-footerbg mt60">
        <div class="container cl-white">
            <div class="row justify-content-center pt30">
                <div class="d-flex justify-content-center">
                    <span class="f50 font-weight-bold mr15">Lihat statistik provinsi</span>
                    <img  class='lazyload' data-src="img/asset/reg/next-lg.svg" alt="go to specific region section">
                </div>
            </div>
            <div class="row justify-content-center pt25 pb25">
                <div class="d-flex justify-content-center flex-wrap f-footercustom">
                    <a href="region?r=gorontalo" class="a-none"><span class="cl-white rv-footer-navbutton">Gorontalo</span></a>
                    <a href="region?r=sulawesibarat" class="a-none"><span class="cl-white rv-footer-navbutton">Sulawesi Barat</span></a>
                    <a href="region?r=sulawesiselatan" class="a-none"><span class="cl-white rv-footer-navbutton">Sulawesi Selatan</span></a>
                    <a href="region?r=sulawesitengah" class="a-none"><span class="cl-white rv-footer-navbutton">Sulawesi Tengah</span></a>
                    <a href="region?r=sulawesitenggara" class="a-none"><span class="cl-white rv-footer-navbutton">Sulawesi Tenggara</span></a>
                    <a href="region?r=sulawesiutara" class="a-none"><span class="cl-white rv-footer-navbutton">Sulawesi Utara</span></a>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        <?php rglanding_bchart_sum() ?>
        <?php rglanding_bchart_jaw() ?>
        <?php rglanding_bchart_kal() ?>
        <?php rglanding_bchart_bas() ?>
        <?php rglanding_bchart_map() ?>
        <?php rglanding_bchart_sul() ?>
    </style>

    <?php include_once('footer.html') ?>
    <?php include_once('def-bottom-header.html') ?>

        <script>
            window.addEventListener("load", function(){
                const loader=document.querySelector(".loader");
                loader.className += " hidden"; // class="loader hidden"
            })
        </script>
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