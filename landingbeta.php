<?php

// define the path and name of cached file
	//$cachefile = 'caching/landing'.date('M-d-Y').'.php';
	// define how long we want to keep the file in seconds. I set mine to 5 hours.
	//$cachetime = 18000;
	// Check if the cached file is still fresh. If it is, serve it up and exit.
	//if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
   	//include($cachefile);
    //	exit;
	//}
	// if there is either no file OR the file to too old, render the page and capture the HTML.
	//ob_start();

$pos='home';
include('display-function.php');

$caseID=getData(cases, getLastDate(), tanggal, id_t);
$recoveryID=getData(cases, getLastDate(), tanggal, id_tr);
$deathID=getData(cases, getLastDate(), tanggal, id_td);
$desc=metadesccustom($caseID, $deathID, $recoveryID);

?>

<!doctype html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html">
        <meta name="theme-color" content="#ffffff">
        <link rel="icon" href="img/asset/logo%20color.svg">
        <!--Bootstrap-->
        <link rel="stylesheet" href="bootstrap-light.min.css">
        

        <!--end of bootstrap-->
        <link rel="stylesheet" href="style-landing.min.css">
        <link rel="stylesheet" href="style-nav.min.css">
        <meta name="description" content="<?php echo $desc ?>">
        <meta name="viewport" content="width=780px, user-scalable=no">
        <title><?php metatitle() ?></title>
        <link rel="stylesheet" href="style-mobile-responsive.min.css">
        
        <style>
            .loader{
                position:fixed;
                z-index:9999;
                top:0;
                left:0;
                width:100%;
                height:100%;
                background:rgba(255,255,255,0.3);
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
            .progress-bar{
                z-index:9999 !important;
            }
        </style>
    </head>
    <body class="content">
        <span id="popupnamaprovinsi">Jawa Barat</span>
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
        <?php include_once('progressbar.html') ?>
        <?php include_once('navigation.php') ?>
        <?php include_once('_sys_announcement.php') ?>

        <!--First view landing-->
        <div class="container-fluid mt100">
            <div class="row f120 font-weight-bold justify-content-center">
                <span class="cl-aqua-forest">#Sehat</span>
                <span class="cl-tangerine">diRumah</span>
            </div>
            <div class="row justify-content-center text-center mt35 mb25">
                <h1 class="f48"><a href="#statistik-indonesia" class="a-none"><span class="cl-aqua-forest">Statistik </span><span class="cl-tangerine">virus corona Indonesia</span><br><span class="cl-aqua-forest">langsung di genggaman tangan anda.</span></a></h1>
            </div>
            <a href="edukasi" class="a-none"><div class="f24 row justify-content-center text-center mt25 mb25"><em><span class="cl-aqua-forest">pahami, mengerti, </span><span class="cl-tangerine">antisipasi.</span></em></div></a>

            <!--Navigation Link-->
            <?php include_once('navigation-link.html') ?>

            <div class="row justify-content-center text-center">
                <div class="f24">
                    <span class="cl-aqua-forest">Kunci dari keberhasilan kita menghadapi pandemi ini adalah </span>
                    <a href="edukasi" class="a-none"><span class="cl-tangerine">memahami apa yang sedang terjadi</span></a>
                </div>
            </div>
            <div class="row justify-content-center mt30 mb30">
                <img class='lazyload'  data-src="img/asset/landing/logo%20sehat%20dirumah.svg" alt="sehatdirumah.com logo">
            </div>
        </div>

        <!--indonesia overview banner-->
        <style>
            .landing-id-ov-items{
                margin:50px 30px;
            }
            @media (min-width: 985px){
                .landing-id-ov-items{
                    margin:40px;
                }   
            }
            .showondesktop{
                display:none;
            }
            @media (min-width:985px){
                .showondesktop{
                    display:flex;
                }
            }
            
        </style>
        <div class="ld-bannerbg1">
            <div class="container-fluid ptb20">
                <div class="row cl-white text-center">
                    <?php landingindonesiacase() ?>
                </div>
            </div>
        </div>

        <!--Kondisi Regional-->
        <div class="container-fluid">
            <div class="row justify-content-center text-center mt90">
                <h2 class="f56 font-weight-bold cl-tangerine"><a href="#statistik-indonesia" class="a-none"><span class="cl-aqua-forest">Kondisi</span><span class="cl-tangerine"> regional<a class="a-none a-inh-sup click-point" data-id="67"><sup>[67]</sup></a></span></a></h2>
            </div>
            <div class="row cl-aqua-forest mf16-f12 justify-content-center mb50">
                
                
                <div><img src="img/asset/landing/information.svg" alt="petunjuk penggunaan peta interaktif Coronavirus Indonesia di Sehatdirumah.com"></div>
                <div>
                    <!--<span class="cl-tangerine font-weight-bold">petunjuk :&nbsp;&nbsp;</span>-->
                    <span class="cl-aqua-forest ml7"><i>untuk mengganti tampilan peta gunakan </i></span>
                    <span style="padding:0px 7px; background-color:#6BAB79; color:white; margin-left:5px;">tombol di bawah</span>
                </div>
                
            </div>

            <style>
                <?php echo getData(landing_maps, totalkasus, datatype, hsl0) ?>
                #id-ac:hover,#id-be:hover,#id-ja:hover,#id-bb:hover,#id-kr:hover,#id-la:hover,#id-ri:hover,#id-sb:hover,#id-ss:hover,#id-su:hover,#id-bt:hover,#id-go:hover,#id-jk:hover,#id-jb:hover,#id-jt:hover,#id-ji:hover,#id-yo:hover,#id-kb:hover,#id-ks:hover,#id-kt:hover,#id-ki:hover,#id-ku:hover,#id-ma:hover,#id-mu:hover,#id-ba:hover,#id-nb:hover,#id-nt:hover,#id-pa:hover,#id-pb:hover,#id-sr:hover,#id-sn:hover,#id-st:hover,#id-sg:hover,#id-sa:hover{
                             fill:#45644C; stroke:#6D6D6D;
                         }
                #popupnamaprovinsi {
                  padding: 5px 8px;
                  font-family: Arial, sans-serif;
                  font-size: 10pt;
                  background-color: white;
                  border:1px solid #45644C;
                  border-radius: 6px;
                  position: absolute;
                  display: none;
                  color:#45644C;
                  font-weight:bold;
                  z-index:99;
                }
                
                #popupnamaprovinsi::before {
                  content: "";
                  width: 12px;
                  height: 12px;
                  transform: rotate(45deg);
                  background-color: white;
                  border-right:1px solid #45644C;
                  border-bottom:1px solid #45644C;
                  position: absolute;
                    left:40%;
                    top:24px;
                }
                table.table-ld-mapinfo tr th, table.table-ld-mapinfo tr td {
                    padding:1px 12.5px;
                }
                table.table-ld-mapinfo tr th{
                    font-size:14px;
                    color:#6BAB79;
                    font-weight:bold;
                }
                table.table-ld-mapinfo tr td {
                    color:#F38500;
                    font-weight:bold;
                    font-size:16px;
                }
            </style>
            <div class="row justify-content-center mt25 showondesktop">
                <table class="text-center table-ld-mapinfo">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Kasus</th>
                            <th>Meninggal</th>
                            <th>Sembuh</th>
                            <th>Kasus /1 Juta</th>
                            <th>Tingkat Kematian</th>
                            <th>Tingkat Kesembuhan</th>
                            <th>Kasus Aktif</th>
                            <th>Beban RS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width:200px; text-align:right;"><span id="mapinfo_name"><?php echo getData(landing_table, nb, isocode, nama_daerah) ?></span></td>
                            <td><span id="mapinfo_case"><?php echo getData(landing_table, nb, isocode, t) ?></span></td>
                            <td><span id="mapinfo_death"><?php echo getData(landing_table, nb, isocode, td) ?></span></td>
                            <td><span id="mapinfo_recover"><?php echo getData(landing_table, nb, isocode, tr) ?></span></td>
                            <td><span id="mapinfo_onemil"><?php echo getData(landing_table, nb, isocode, t_1jt) ?></span></td>
                            <td><span id="mapinfo_deathrate"><?php echo getData(rank_tingkatkematian, nb, isocode, zero) ?></span></td>
                            <td><span id="mapinfo_recrate"><?php echo getData(rank_tingkatsembuh, nb, isocode, zero) ?></span></td>
                            <td><span id="mapinfo_activecase"><?php echo getData(rank_perskasusaktif, nb, isocode, zero) ?></span></td>
                            <td><span id="mapinfo_hlload"><?php echo getData(landing_table, nb, isocode, beban_rs) ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="row justify-content-center pb25">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <svg version="1.2" baseProfile="tiny"
                    	 id="Layer_1" mapsvg:geoViewBox="95.220250 7.356505 141.009728 -10.946766" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:mapsvg="http://mapsvg.com" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"
                    	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 792.5 316.7"
                    	 xml:space="preserve">
                        <g id="id-ac" class="click-point" onclick="window.location='region?r=aceh'" onmouseover="popUp('id-ac')">
                        	<path d="M36.7,92.1l-0.2,0.1l-0.7-1.1l-1.3-1.3l-1-0.5L33,89.2L32.8,89l0.1-0.2l1-0.2l2.1,0.1l0.7,1.1l0.3,1l0,0.9
                        		C36.9,91.7,36.7,92.1,36.7,92.1z M9.2,30.9l2.6,1.4l0.1,0.7l0.3,0.5l1,1l1.8,1.4l0.9,0.3l3.9,1l4,0.3l1.9-0.3l2.2-0.9h0.4l0.9,0.5
                        		l1.5-0.4l1.1,0.1l1.4,0.5l0.4,0.3l0.3,0.9l0.6,0.2l1-0.2l3.9-1.5l0.5,0l0.9,0.9l1.1,1.5l2.2,2.3l1.6,1.3l1.2,0.3l0.9,1.8l0.2,1.5
                        		l0.4,1l0.4,0.6l-0.1,0.9l0.8-0.1l1,0.4l0.6,0.3l2.1,1.6l0.1,1.3l-0.4,0.9l0,0l-0.4,0.1l-0.8-0.2l-0.8,0.2l-0.1,0.3l-0.3,0.1
                        		L50,53.9l-0.4-0.1L49.5,54l0.3,0.5l0,0.4l-0.4,0.2l0.2,0.5l-0.5,0.7l0,1l-0.2,0.3l-0.2,1.3l-1.2,0.7l0.1,0.4l-0.2,0.3l-0.6-0.4
                        		l-0.2,0l-0.1,0.3l0.4,0.7l-0.1,0.3l-1.5,1.2L44.9,63l0.3,0.8l0.5,0.5v0.3l0.3,0.2l0,0.7l0.7,0.3l0.2,0.9l0.6,0.4l-0.3,0.5l0.3,0.6
                        		l0,0.4l0.7,0.4l0.3-0.1l0.4,0.7l-0.2,0.8l-2.4,0.7l0.1,0.2l0.6,0.1l0.5,0.5l0.1,0.7l0.6,0.7l-0.1,1l-0.6-0.1l-0.2,0.1l0.2,0.3
                        		l0,0.5l0.3,0.9v1.1l0.9,0.2l0.6,1.1l1,0.1l0,0.3l0.2,0.3l-0.3,0.5L49.8,80l0.2,0.7l0.5,0.5l0,0.3l-0.6,0.2l-0.2,1.4l0.2,1l0.4,0.6
                        		l-0.1,0.7l0.8,0.3l0.5,1.6l-0.6,2.8l0,0l-3.5-2H47L46,88.6L43.9,88l-1.7-2.3l-0.1-4l-0.3-2.2l-0.6-1.8l-0.2-0.2l-0.8,0L38.7,77
                        		l-0.5-0.2l-0.7-0.6l-1.2-1.7l-0.5-2l-0.5-0.8l-1.5-0.5l-1.6-2.5l-1.2-2.3l-1.4-0.8L29.2,65l-0.3-1.1l-1.6-1.1l-2.6-0.2l-1.3,0.2
                        		l-0.7-0.1l-0.5-0.3l-1.7-1.6L18.6,58l-1.7-1.8l-0.8-0.2l-1.3-1l-1-0.4l-1.2-1l-2-2.4l-2.8-2.6l-2.3-1.9l-1.9-2.8L1.3,39l0.3-0.7
                        		L1.6,38l-1.2-1.9l0.4-2.1l-0.6-1.3l0.2-1.6l0.9,0l2.2-1.4l0.4-0.1l2.9,0.4L9.2,30.9L9.2,30.9z"/>
                        </g>
                        <g id="id-ba" class="click-point" onclick="window.location='region?r=bali'" onmouseover="popUp('id-ba')">
                        	<path d="M352.6,279l-0.5-0.1l-1.1-0.6l-0.8-0.7l0.1-0.4l0.6-0.6l0.3-0.1h1l0.3,0.2l0.6,1.1l0,0.3L352.6,279z M333.3,266.6l0.4,0.2
                        		l0.3,0.6l0.3,0.1l0.7-0.4l3.3,0.9l1.9,0.3l1.7-0.2l0.7-0.2l1.7-1.5l0.9-0.4l0.3,0.1l4.6,1.7l1.9,1.2l1.3,1.6l1.3,0.7l0.1,0.4
                        		l-0.1,0.3l-0.3,0.4l-1.3,1.1l-2,1l-1,0.3l-0.9,0.1l-1.2,0.6l-1,0.9l0,0.8l-1.3,0.8l0.5,0.7l0.1-0.4l0.2,0.7l-0.4,0.5l-1.1,0.3
                        		l-1-0.1l-0.2-0.3l0.8-0.6l0.6-0.3l-0.2-0.5l0.3-0.6l-0.4-0.5l-1.4-1.5l-2.6-2.2l-0.7-0.4l-1.6-0.6l-1.4-0.3l-2.1,0.1l-2.4-3.1
                        		l-0.3-1.9l0.1-0.4L333.3,266.6z"/>
                        </g>
                        <g id="id-bb" class="click-point" onclick="window.location='region?r=bangkabelitung'" onmouseover="popUp('id-bb')">
                        	<path d="M202.1,179.1l-0.6,0.2l-0.6-0.2l-1.7-1l0.3-0.8l1.1-0.5l1.7,0.7l0.1,0.3L202.1,179.1L202.1,179.1z M218.4,170.6l4.4,1.2
                        		l3.1,2.5l0.5,1.8l-1.5,2.6l-0.1,1.9l-1.6,0.7l-0.5,1.1l-1.6,0.4l-0.2-0.3l-0.1-1.1l-1.7-1.9l-0.4,0.1l-0.5,0.5l0.3,0.4l-0.1,0.8
                        		l-0.4,0.3l-2.9,0.9l-0.6-0.2l-0.6-3.5l0.6-1.6l0.1-2.3l0.4-0.4l0-0.9l0.3-1.9l0.3-0.4l0.7-0.1l1.1,0.1L218.4,170.6L218.4,170.6z
                        		 M188.2,157.5l0.8,1.3l0.5,1.4l0,1.8l0.4,1.9l0.9,2.8l0.5,1.1l0.8,1l0.7,0.7l0.5,0.2l4,0.7l2.9,1.1l-0.7,0.4l-1.1,1.2l-1.3,3.3
                        		l-0.1,0.8l0.1,0.4l0.8,0.5l0.3-0.1l1.2,0.6v1.2l-0.4,0.4l-3.4,0.1l-1.3-2.1l-2.8-1.3l-2.3-0.7l-0.9-0.4l-1.7-0.2l-0.4-0.3l-0.9-1.6
                        		l-0.3-1.3V172l0.6-1.5l-0.1-0.9l-0.6-0.5l-0.7-0.2l-0.6-0.7l-0.4-3.5l-0.1-0.3l-0.8-0.6l-4.6-0.5l-1.1,0.3l-1.3,0.1l-3.6-0.9
                        		l-0.3-0.9l0.4-1.3l0.6-0.4l1.9-0.7l1.7-1.2l0.2-0.4l0.1-0.5l-0.2-0.5l-0.9-0.6l0.2-0.9l0.8-0.9l1.1-0.7l2.1-0.7l0.5,0.1l0.7,1.8
                        		l0.1,1.7l0.9,0.7l1.2,0.3l0.5,0l-1.7-4.2l0.6-0.3l2.5-0.7l0.4,0.1l2,1.4l0.3,0.4l-0.3,0.8l0.1,0.6L188.2,157.5L188.2,157.5z"/>
                        </g>
                        <g id="id-be" class="click-point" onclick="window.location='region?r=bengkulu'" onmouseover="popUp('id-be')">
                        	<path d="M118.5,174.6l0.2,0.6l0.8,0.5l0.1,0.7l0.9,0.5l0.1,0.3l0.4,0.1l0.3,1.2l0.4,0.6l0.6,0.1l0.5,0.4l1.2-0.4l1,0.2l0.6,0.6
                        		l0.3,0.7l-0.1,1.2l0.2,0.1l-0.2,0.5l1.7,1.5l0.6,0.1l0.3,0.3l0.8-0.6l0.9,0l0.9-0.6l0.3,0.1l0,0.3l0.3,0.5l0.3-0.1l0.6,0.3l0.6-0.3
                        		l-0.2,0.1l0.1,0.6l0.2,0.2l0.8-0.3l0.8,0.1l0.2,0.4l-0.2,0.4l0,0.8l-0.1,0.9l0,0.1l-0.3,0.1l-0.3,0.7l-0.7,0.7l-0.2-0.1l-0.4-0.6
                        		l-0.5-0.6l-0.5-0.3l-0.2,0l-0.1,1.4l-0.5,0.3l-0.6,0.8l-0.1,1.1l-1.3,0.5l-0.2,0.4l-0.5,0.2l0.7,0.2l0.4,0.4l0.2,0.4l0.9,0.5
                        		l0.9,1.1l0.7,0.4l0.8,0.2l0.6-0.3l0.4,0.2l0.3,0.5l0.2,0.1l1.3,0.1l0.9-0.1l0.3,0.2l0.4,0.1l0.5,1.4l0.5,0.7l0,1.6l1.9,0.3l0.5,0.6
                        		l0.7,0.4l0.7,0l0.6,0.2l0.4-0.1l0.3,0.6l0.6,0.3l1-0.4l0.6,0.2l0.3,0.6l0,0.6l-0.6,0.5l-0.3,0.5l1.1,1l-0.7,0.6l0.8,0l0.6,0.5
                        		l0.3,0.4l0.2,0.9l-0.4,0.5l0.4-0.1l0.6,0.3l0.4,0l0.4,0.6l-0.1,0.3l0,0l-0.1,0.1l0,0l-0.1,0.1l-0.8-0.1l-0.1,0.5l-0.5,0.4l-0.4,0.1
                        		l-0.6,0.5l-0.3,0.1l-0.2,0.5l0,0l-0.8-0.1l-0.5-0.6l-0.5-0.2l-0.9-0.2l-0.3,0.2l-0.3-0.1l-0.1-0.2l0.2-0.2l-0.3-0.4l-0.5-0.4
                        		l-0.3,0l-0.3,0.3l-0.4-0.3l-0.1-0.2l0.2-0.3l-1.6-1.7l-3.1-2.1l-2.6-1l0.1-0.3l-0.6-0.8l-1-0.7l-0.1-0.3l-3.6-2.7l-0.8-0.7
                        		l-4.6-3.3l-0.2-0.2l0-1.1l0.4-0.1l0-0.3l-0.9-1.7l-0.3-1.6l-2.2-1.8l-2-1.2l-1.2-0.5l0.1-0.3l-5.6-4l-1.5-1.9l0.1-0.2l-0.2-0.5
                        		l-0.4-0.3l-0.2-0.7l-0.3-0.2l-1.2-1.8l-1.2-2.9l-3.2-1.8l-1.1-1.6l-0.8-0.8l0,0l1.6-1.1l0.4-0.4l1.1-0.4l0.7-0.6l0.8-1l0,0l0,0l0,0
                        		l4.7,3l-0.3,2l0.2,0.1l0.3-0.5l0.4-0.1l0.3,0.2l0.6-0.2l0.1-0.3l0.4,0l0.4,0.7l1.5,1.6l0.4,0.2l0.2,0.4l0.3,0.1l0.5,0.5l0.7,0.2
                        		l1.3-0.2l0.8,0.5L118.5,174.6L118.5,174.6L118.5,174.6z"/>
                        </g>
                        <g id="id-bt" class="click-point" onclick="window.location='region?r=banten'" onmouseover="popUp('id-bt')">
                        	<path d="M199.2,231.9l-0.6,0.3l0,1.1l0.6,0.3l0,0.7l0.4,0.1l0.2,0.7l0.4,0.8l0,0l0,0.1l0,0l-0.2,0.6l-2.9,0l-0.3-0.4l-1-0.3
                        		l-0.1,0.1l0.3,0.2l0,0.3l-0.5,0l-0.2-0.6l-0.3-0.1l-0.7,0.6l0.4,1.4l-0.3,0.3l-0.6,0.1l-0.1,1l0.6,1.2l-0.1,1.7l0.1,0.3h0.2
                        		l0.4,0.5l0.2,0l0.6,0.7l-0.4,0.3l0,0.3l-0.9,0.4l-0.1,0.7l-0.6,0.7l0.1,0.4l-0.2,0.2l0.2,0.8l0,0l-0.5,0.2l-1,0.1l-0.1-0.3l-0.7,0
                        		l-0.1-0.2l-0.4-0.1l0-0.4l-0.9-0.4l-0.6,0l-0.5-0.4l-0.5-0.1l-0.7-0.8l-0.5-0.2l-1.4-0.1l-2.9,0.6l-1.5-0.2l-2.1,0.3l-0.4,0.3
                        		l-0.7-0.2l-0.3,0.1l-0.6-0.6l-0.3-0.1l-0.1,0.3l-0.2,0l0.1-0.3l-0.6-0.4l-1.1-0.2l-0.3,0.1l-0.2,0.4L174,245l-0.4-0.1l-0.1-1
                        		l-0.2-0.3H173l-0.1-0.3l1,0.1l0.3-0.4l0.8-0.6L175,242l0.8-0.4l0.6,1.3l-0.2,0.1l-0.1,0.2l0.5,0.3l0.3,0.5l0.1,0.4l0.3,0.3l0.2,0
                        		l0.5-0.6l0.1-1l1.1-0.9l0.1-0.4l0.4-0.1l0.3-0.4l0.2-0.7l-0.1-0.8l0.5-0.9l0.4-0.3l0.1,0.5l-0.2,0.2l0.4,0.3l0.3,0.1l1-0.2l0.7-1
                        		l0.2-0.6l0.1-3.1l0.6-2.3l0.4-0.2l0-0.6l0.8-0.5l0.3-0.4l0.8-0.6l0.2-0.9l-0.3,0.1l0.9-0.8l0.7-0.1l0.6,0.6l0,1.3l1,0.6l0.3,0
                        		l0.8-0.4l0.3-0.3l0.1-0.5l0.2-0.2l0.9,0.3l0.1,0.2l0.3,0.1l0.4-0.4l0.3,0.3l0.3,0l-0.1,0.1l0.2,0.5l0.5,0.3l0.4-0.1l0.7,0.2
                        		l0.7-0.5l0.5,0.3l0.9-0.2l0.2-0.2l0.4,0.3l0.5-0.1l0.5,0.5l-0.1,0.1L199.2,231.9z"/>
                        </g>
                        <g id="id-go" class="click-point" onclick="window.location='region?r=gorontalo'" onmouseover="popUp('id-go')">
                        	<path d="M466.8,109.6l0.6,0.2l2.4-0.1l1.7,0.2l3.4,1l0.2,0.3l3,1.8l1.1-0.7l0.9-1.2l2.5-0.4l0,0l0.2,0.8l0.5,0.4l0.9,0.2l0.7,0.7
                        		l0,0.5l0.3,0.8l0.6,0.5l1.2,0.9l2,0.3l0.5,0.6l0.3,0.8l-0.1,1.1l0.1,1L489,121l-0.3,1l0,0l-2.1,0l-1.5-0.4l-1.3-1.2l-0.8-1.2
                        		l-1-0.9l-0.5,0.4l-1.4,0.1l-8.4-0.3h-1.8l-3.1,0.3l-2.4-0.1l-0.5,0.1l-0.6,0.5l-1.6,0.3l-1.8,0.1l-1.5-1.7l-2.9-0.3l-0.2,0.1
                        		l-0.2,0.7l-0.3,0.3l-2.8,0.3l0,0l0.3-0.5l-0.2-1.5l-0.7,0l-1.1-0.3l-0.5-0.8l-0.6-0.3l-0.3-0.4l0.3-0.2l0.1-1.1l0.3-0.3l1.1-0.4
                        		l1,0.4l0.5-0.1l0-1l0.4-0.4l0.9,0.5l1.3,0.1l0.5-0.4l1.5,0l2.1-0.9l1.1-0.3l0.8-0.6l0.9-0.1l0.5,0.8l0.5,0.5l0.4,0.2l0.3-0.3
                        		l0.1-0.7h0.4l0.5-0.6l0.3,0L466.8,109.6z"/>
                        </g>
                        <g id="id-ja" class="click-point" onclick="window.location='region?r=jambi'" onmouseover="popUp('id-ja')">
                        	<path d="M160.6,155.6l-1.3-0.5l-0.5,0.1l-0.3,0.2l-0.2,0.3l0.1,0.8l-0.3,0.4l-1,0.3l-1-0.1l-0.9,0.4l-1.4,0.3l-1.1-0.3H152
                        		l-0.5,0.2l-1-0.5l-0.4-0.1l-0.7,0.4l-0.3,0.5l-1.7,0.1l-2.2,0.8l-1.1,1v0.8l-0.2,0.8l0.1,0.3l-0.2,0.4v1.3l0.6,0.5l-0.7,0.5
                        		l-1.1,0.3l-0.1,0.4l0.2,1.6l-0.2,0.2l0.1,0.8l-0.2,0l-0.2-0.4l-0.5-0.1l-0.4-0.6l-0.8-0.4l-0.2-0.4l-0.6-0.6l-0.1-0.8l-0.3-0.4
                        		l-0.5-0.1l-0.3,0.2l-0.2,0.4l-0.3,0.1l-0.2,0.3l-0.2,0.6l0.7,0.7l0.2,0.7l-1.5,0.6l-1.1-0.4l-0.1-0.2l-0.2,0l-0.3,0.5l-1.9-0.3
                        		l-0.7-0.3l-0.6,0.8l0.6,1l-0.5,0.4l-1.1,1.8l-0.4,0.4l-0.3,0l-0.3-0.2l-0.9,0.8l-0.8,0.3l-0.2,0.2v0.3l-0.6,0.6l-0.5-0.2l-0.4,0.1
                        		l-0.6,0.4l-0.1-0.2h-0.8l-0.7-0.2l-0.6-0.6l-0.5-0.3l-0.2,0.2H123l-0.8-0.5l-0.6,0.2l-0.1,0.7l-0.4,0.4l-0.8,0.1l-0.2,0.2l-0.6,0.2
                        		l-0.4,0.7l0,0l-0.6-0.2l0,0l-0.5-0.1l-0.8-0.5l-1.3,0.2l-0.7-0.2l-0.5-0.5l-0.3-0.1l-0.2-0.4l-0.4-0.2l-1.5-1.6l-0.4-0.7l-0.4,0
                        		l-0.1,0.3l-0.6,0.2l-0.3-0.2l-0.4,0.1l-0.3,0.5l-0.2-0.1l0.3-2l-4.7-3l0,0l0.2-0.5l0,0l-0.2-1.6l-0.6-1.7l-0.4-0.7l-0.7-0.3
                        		l-0.3-0.4l-0.2-0.5l-0.5-0.5l-0.2-0.4l-0.2-3.6l0.2,0l0.5,0.4l0.2-0.4l0.2,0l0.7,0.7l0.6-0.4l1.1,0l0.5-0.3l0.6,0l0.6-0.2l0.4,0.4
                        		l1-0.3l1.2-1.8l2-1.2l0.6-1.1v-0.2l-0.4-0.4V151l0.4-0.5l-0.4-1.6l0.6-0.6l0.6,0l0.3-0.2l0.6-0.1l0.8-1l0.3-0.9l-0.1-0.1l-0.3,0.3
                        		l-0.5-0.4l0.1-0.8l-0.1-0.1l0-1l0,0l0,0l0,0l0.6,0.1l0-0.3l0.8-0.2l0.2-0.6l0.6-0.3l0.2,0.2l0.1-0.4l0.5-0.3l0.4,0.1l0.4,0.3
                        		l0.4-0.2l0.9,0.4l0.4-0.3l0.4,0l0.4,0.4v0.3l0.2,0.1l0.4,0l0.9-0.5l0.6,0l0.3,0.8l1,0.5l0,0.6l1.2,0.1l0.5,0.8l0.8,0l0.8,0.3
                        		l0.7-0.1l0.6,0.4l0.3-0.1l0.5-0.6l0.7-0.1l0.5-0.9l0.5-0.4l0.1-0.4l2.1-1.5l0.9-1l0.9-1.4l1.2,0.1l0.9-0.2l3.6,0.6l0.4,0.3l0.9-0.5
                        		l1.2-0.1l0,0l0.4,0.4l0.8,0.4l0.9,1.1l0.9,0.7l1,0.4l0.6,0.5l1.1,0.3l0.5,0.4l0.8-0.4l0,0.1l1.2-0.3l2.6,0.8l1.9,0.7l2.2-0.8
                        		l0.4,0.1l0.8,1.7l-0.3,1.4l0.3,0.8l0.7,1.2l0.1,1.1l-0.3,1.9l0.4,1.9L160.6,155.6z"/>
                        </g>
                        <g id="id-jb" class="click-point" onclick="window.location='region?r=jawabarat'" onmouseover="popUp('id-jb')">
                        	<path d="M205.7,229.3l0.8,0.8l0.4,0.1l2.2-0.5l0.9,0.3l0.9,0.9l1.2,2.1l1.6,0.6l1.1,0.1l0.9,0.9l0.4-0.3l0.2,0.1l0.5,0l1.3-0.8
                        		l0.6,0l0.1,0.4l0.6-0.3l0.1,0.3l-0.3,0l0.1,0.5l1.1,0.4l1.4,0.8l1.6,0.5l1-0.6l0.4-0.5l-0.1-0.4l-0.4-0.3l0.4,0.1l0.3,0.3l1.3,0
                        		l0.6,0.4l0.1-0.5l0.1-0.1l0.3,0.4l0.2,0.5l-0.1,0.2l0.3,0.8l1.3,1.5l1.4,0.8l0.1,1.2l-0.1,0.6l0.4,1.9l0.6,1.1l0.6,0.1l0.3-0.3
                        		l0.5,0.3l0.1,0.6l1.2,0.3l0.9-0.5l0.1-0.4l-0.3-0.1l0.2-0.3l0.5,0l0,0l-0.1,1.5l-0.6,0.9l-0.3,0.1l-0.4,0.6l0.2,0.5l-0.1,0.6
                        		l0.6,0.4l0,0.4l-0.3,0.2l0.1,0.3l-0.2,0.4l0.1,0.4l-0.3,0.3l-0.7,0.1l-0.5,0.6l-0.6,0.1l-0.3-0.3l-0.3,0l-1,0.5l0,0.6l0.3,0.3v0.5
                        		l-0.5,0.8l0.1,0.8l0.2,0l0.2,0.2l1.2-0.1l0.5,0.5l0.1,0.5l0.6,0.6l-0.1,0.5l0.1,0.4l0.3,0.4l0.3,0.9l-0.1,0.5l-0.3,0.4l0.7,0.7
                        		l0.5,0.3l0,0l-0.7,0.4l-0.5-0.3l-0.7-0.1l-0.5,0.3l0,0.1l0.3,0.4l-0.1,0.1l-0.4-0.2l-0.1-0.5l-1.1,0l-0.9,0.2l-0.4,0.4l-0.1,1.1
                        		l-0.4,0.3l-0.6,0.2h-1.7l-4.5-0.8l-1.5-0.5l-1.5-0.2l-1,0.1l-0.2-0.1l-0.1-0.5l-0.4-0.3l-0.5-0.2l-1.5-0.2l-0.3-0.7l-1.2-0.9
                        		l-2.2-0.8l-0.4-0.3l-1.3-0.3l-2.6-0.2l-2-0.5l-9.5-0.7l-0.9-0.3l-0.5-0.5l-0.9-0.3l-0.6,0.2l0-0.4l-0.5-1.1l0-0.8l0.6-0.9l0.9-0.2
                        		l-0.2-0.5l0.1-0.4l0.5-0.4l0.4-0.2l0.6-0.9l-0.1-0.9l-0.5-0.5l-1.2-0.1l-0.5,0.2l-0.3,0.3l0,0l-0.2-0.8l0.2-0.2l-0.1-0.4l0.6-0.7
                        		l0.1-0.7l0.9-0.4l0-0.3l0.4-0.3L195,243l-0.2,0l-0.4-0.5h-0.2l-0.1-0.3l0.1-1.7l-0.6-1.2l0.1-1l0.6-0.1l0.3-0.3l-0.4-1.4l0.7-0.6
                        		l0.3,0.1l0.2,0.6l0.5,0l0-0.3l-0.3-0.2l0.1-0.1l1,0.3l0.3,0.4l2.9,0l0.2-0.6l0,0l0-0.1l0,0l0.5-0.1l-0.2,0.7l0.1,0.1l0.9-0.3
                        		l0.9,0.5l0.2-0.1l0.2-0.9l-0.2-0.4l-0.1-0.6l0.6-0.2l0.4-0.9l0.1-2l0,0l0.4-0.1l0.2-0.3l-0.3-0.4l0.4-0.3l-0.2-0.2l-0.2,0.1
                        		l-0.1-0.3l0.3-0.3l0.1-0.7l-0.2-0.2l-0.3,0.1v-0.1l0.6-0.4L205.7,229.3z"/>
                        </g>
                        <g id="id-ji" class="click-point" onclick="window.location='region?r=jawatimur'" onmouseover="popUp('id-ji')">
                        	<path d="M313,272.8l0.6,0.1l0.9,0l0.5,0.3l-0.2,0.4l-1,0.2l-1,0l-0.5-0.2l0-0.5l0.4-0.1l0.1-0.3L313,272.8L313,272.8z M355.7,249.6
                        		l0.5,0.2l-0.1,0.3l0.2,0.2l0.5,0.1l0.1,0.2h0.3l0.2-0.1V250l0.4-0.2l0-0.2l0.3-0.1l-0.3,1.6l-0.3,0.2l-0.8,0.1l-1.3-0.6l-0.2-0.3
                        		l0.3-0.4l-0.2-0.4l0.1-0.2L355.7,249.6L355.7,249.6z M331.9,250.8l-0.3,0.1l-0.7-0.2l-0.8-0.6l-0.3-0.6l0.2-0.6l0.9-0.3l0.5,0.3
                        		l0.7,1.5L331.9,250.8L331.9,250.8z M353.5,247.1l0.6,0.3l0.2,0.4l-0.5-0.2l-0.6,0.1l-0.5-0.2l-0.1-0.3l-0.3,0l-0.1-0.3l0.3-0.3
                        		L353.5,247.1L353.5,247.1z M325.1,245.7l1.8,0.9l0.3,0.8l-0.6,0l-0.4,0.3l-0.5,0.2l-1.2,0.1l-0.3,0.3l-0.5-0.2l-0.2,0.1l0.6,0.3
                        		l0.4,0.5l1.4,0.1l0.2,0.7l-1.6-0.2l-0.6-0.5l0.1-0.3l-0.4-0.2l-0.6,0.4l-0.1,0.3l0,0.2l0.3,0.1l0.1,0.3l-0.1,0.2l-3.6-0.4l-0.6,0.4
                        		l-0.2-0.1l-0.6,0.1l-0.4,0.5l-0.4,1.2l-0.7,0.4l-0.2-0.2l0.1-0.1l-0.1-0.2l-0.8-0.1l-3.1-0.1l-0.3,0.2l-1.3,0l-0.3-0.5l-0.3,0.1
                        		l0-0.2l0.2-0.3l-0.3-0.3l-0.4,0.4l0.2,0.4l0.4,0.3l-0.9,0.1l-3.5-0.9l-0.5-0.3l-1.5-0.1l-0.4,0.3l-0.7,0l-0.5-0.4l0.2-0.9h-0.3
                        		l-0.3-0.7l0.2-0.5l0.6,0.1l1.2-1l0.6-0.9l0-0.3l1.1-0.4l1.6,0l0.7-0.1l1.6,0.2l5.6-0.1l1.2,0.2l3.5-0.3l1.1,0.1l2.6-0.4
                        		L325.1,245.7L325.1,245.7z M347.4,244.7l2.2,0.2l1,0.3l1.5,0.8l0.2,0.4l-0.4,0.6l-0.4-0.3l-0.5,0l-0.4-0.4l-1,0.2l-0.3-0.4
                        		l-0.4,0.1l-0.1,0.1l-0.5-0.1l0.1,0.2l0.7,0.3l0.4,0.6l-1.2,0.1l-0.3-0.4l-0.2,0l-0.2,0.1l0,0.4l-0.3,0.1l-0.7-0.6l0.5-0.5l-0.3,0.1
                        		l-0.8-0.1l-0.1-0.3l0.2-0.6l0.5-0.1l0.2-0.3l0-0.2l-0.4-0.2l0.1-0.1l0.3-0.2L347.4,244.7L347.4,244.7z M286,243.7l0.5,0.1l0.8,0.4
                        		l0.6,0l0.9-0.2l0.7-0.4l0.4,0.1l1.1,1.9l0.4,0.3l0.9,0.1l0.9-0.1l1-0.4l0.5,0.1l1.3-0.3l1.3,0.2l0.3-0.1l0.5,0.1l0.6,0.4l0.7,0.1
                        		l0.4-0.5l-0.2-0.3l0.3-0.2l0-0.3l0.4,0.3l0.1-0.1l0,0.3l0.3,0.4l0.3,0l0.2,0.3l-0.1,0.3l-0.2-0.1l0,0.3l0.3,1l0.6,0.4l0.1,0.6
                        		l-0.4,0.4l-0.1,0.8l0.8,0.7l0,0.4l-0.3,0.2v0.3l0.3,0.2l0.6,0l0.2-0.4l0.8-0.1l0.4,0.3l0.4,0.7l0.7,0.6l0,0.5l-0.2,0.3l0.2,0.1
                        		l-0.2,1.2l0.1,1.3l-0.4,0.1l0.3,0.6l0.5,0.1l0.1,0.2l-0.1,0.9l0.2,0l0.3,0.5l0.8,0.3l0.2-0.2l0.4,0.4l0.5,0.2l0.4-0.2l0.5,0.1
                        		l0.7,0.8l1.4,0.7l0.7-0.1l0.7,0.1l0.6,0.7l0.4-0.2l0.3,0.1l0.5-0.2l0.4-0.4l0.6-0.1l1.6-0.7l0.8,0.2l0.5-0.1l1.5,0.4l0.8-0.4
                        		l0.7,0.5l0.2,0l0.5-0.1l0.4-0.5l0.6-0.3l1.3,0.3l1.1-1.1l0.9-0.4l0.6,0.4l0.6,1.2l0.2,0.1l1.6,0.1l0.6-0.3l0.9,0.8l1.5,0.3l1,0.6
                        		l0.5,0.6v0.9l-0.8,0.7l0.2,1.3l0,1.1l-0.4,0.8l-0.1,0.8l-0.3,0.7l0.1,0.7l-0.4,0.8L331,272l0,0.6l0.4,0.8l-0.2,0.7l0.2,0.2l0.2-0.1
                        		l0.2-0.9l-0.1-0.5l0.1-0.1l0.2,0.2l0,0.5l0.2,0.5l-0.1,0.6l0.4,1l0.5,0.6l0.5-0.4l0.6,0.6l1,0.2l0.6,0.9l-0.3,0.8l-0.3,0.3
                        		l-0.7,0.2l-1.6-0.5l-1.1,0l-0.5-0.1l-0.1-0.2l0.5-0.2l0.1-0.3l-0.2-0.6l-0.6-0.6l-1.2-0.5l-0.5,0l-0.1,0.2l0,0.5l-0.2,0.1l-1.9-0.5
                        		l-1.1,0.3l-0.3-0.2v-0.5l-0.3-0.1l-0.3,0.2l0,0.2l-0.6,0l-0.2-0.3l0.4-0.1l0-0.3l-0.3-0.3h-0.3l-0.3,0.3l-0.6-0.3l-0.8-0.1l0-0.4
                        		l-0.3,0.3l-0.2,0l0-0.9l-0.2-0.1l-0.7,0.2l-0.2,0.3l-0.2,0.1l-0.2-0.1l-0.1,0.1l-0.1-0.1l0.2-0.4l-0.1-0.3l-0.4,0.3l-0.2-0.2
                        		l-0.2,0.1l-0.8-0.9l-0.4-0.2l-0.4,0.1l0.1-0.1l-0.2-0.1l-0.3,0.1l-0.5-0.1l-0.8-0.4l0-0.4l-0.4-0.2l-0.6,0.1l-0.6,0.4l-0.6-1.1
                        		l-0.3-0.3l-0.8-0.5l-0.9-0.2l-0.9-0.1l-2.7,0.5l-1,0.6l-0.3,0.6l-0.5,0.4l-3.6,0.5l0.1,0.5l-0.4,0.1l-1.2-0.6l-1.1-0.3l-2-0.2
                        		l-0.5-0.3h-0.5l-0.8-0.6l-0.8-0.2l-0.6,0.3l-0.6-0.1l-0.6-0.3l-2.5-0.1l-0.5-0.1l-0.3-0.3l-0.5-0.2l-0.6-0.1l-0.1,0.1l0.1,0.2h-0.8
                        		l-0.7-0.6l-0.2,0l-0.1,0.3l-0.6-0.2l0-0.2l-0.4,0.1l0.1,1.1l-0.3,0.2l-0.3,0l0.1-0.3l-0.2-0.4l-0.3,0l-0.1,0.2l0.2,0.4l-0.4,0
                        		l-0.1,0.2l0.4,0.3l0.1,0.2l-0.5,0.1l-0.3,0l-0.2-0.3l-0.8-0.1l0.1-0.2l-0.1-0.3h-0.2l0,0.1l-0.3-0.1l-0.1,0.2l-0.3-0.1l0-0.4
                        		l-0.3-0.1l-0.2,0.5l-1.3-0.3l-0.2-0.8l-0.3-0.2l-0.7,0.4l-2.5-0.5l-0.5,0.4l-1.2,0.1l-0.8-0.6l0-0.3l-0.3,0l-0.1,0.5l-1,0.1l-2-0.6
                        		l0,0l-0.1-0.8l0.3-0.9l0.7-0.9l1.3,0.3l0.8-0.6l0.5,0.3l0.4-0.7l-0.1-1.1l0.3-0.2l0-0.3l0.2-0.2l0.6-0.2l0.1,0.3l0.4-0.1l0.3,0.3
                        		l0.3-0.1l0.6-0.7l0.2-0.7l0.3-0.2l-0.6-1.3l0.1-0.6l-1,0l-0.8-0.7l0.1-0.4l-0.1-0.8l0.2-0.6l-0.6-0.4l-0.2-0.8l0-0.6l-0.3-0.3
                        		l-0.3-1l0.5-1l-0.1-0.5l0.1-0.4l-0.2-0.1l0.2-0.7l0.1-0.1l0.3,0.1l0.4-0.1l0.1-0.2l0.2,0l0.5,0.6l1.2,0.4l0.7,0.5l1.1,0.3l0.3,0.3
                        		l0.4,0.1l0.1-0.3l-0.3-0.1l0.2-0.6h-0.5l0.4-0.9l0.2-0.2l0.1,0.1l0.2-0.2l0.1,0.1l1-0.5l0.7-0.7l0.6-1.3l-0.1-0.5l0.2-0.3l-0.2-0.9
                        		l0.2-0.4l-1-0.7l0.3-0.5l0.4-0.2l0.2-1.4l0.7-0.1l0.1-0.2l0-0.6l0.2-0.2l0.2,0.1l0.2-0.3l0,0l0.4,0.3L286,243.7L286,243.7z
                        		 M302.7,225.7l0.4,0.1l0,0.3l0.3,0.5l-0.2,0.8l-0.8,0.4l-0.6-0.1l-0.2-0.1l-0.4,0.2h-0.5l-0.3-0.5l0.3-0.9l0.3-0.1l0.1-0.4l0.4-0.2
                        		l0.3-0.1l0.4,0.1l0.2-0.3L302.7,225.7L302.7,225.7z"/>
                        </g>
                        <g id="id-jk" class="click-point" onclick="window.location='region?r=jakarta'" onmouseover="popUp('id-jk')">
                        	<path d="M174,239.5l-0.3,0.5l0.2,0.7l-0.3,0.6l-0.6,0.2l-0.4,0.6l-0.2-0.3l0.4-0.4l0-0.4l-0.3-0.3l0-0.4l-0.3,0l-0.5,0.5l-0.1,0.3
                        		l-0.3-0.2l0.3-0.6l1-0.8l0.5,0.1v-0.3l0.5,0l0.3-0.2L174,239.5L174,239.5z M199.6,232.1l1.8,0.3l0.7-0.4l1.4-0.1l0,0l-0.1,2
                        		l-0.4,0.9l-0.6,0.2l0.1,0.6l0.2,0.4l-0.2,0.9l-0.2,0.1l-0.9-0.5l-0.9,0.3l-0.1-0.2l0.2-0.7l-0.5,0.1l0,0l0,0l0,0l-0.4-0.8l-0.2-0.7
                        		l-0.4-0.1l0-0.7l-0.6-0.3l0-1.1l0.6-0.3l0,0L199.6,232.1L199.6,232.1z"/>
                        </g>
                        <g id="id-jt" class="click-point" onclick="window.location='region?r=jawatengah'" onmouseover="popUp('id-jt')">
                        	<path d="M285.2,243.4l-0.2,0.3l-0.2-0.1l-0.2,0.2l0,0.6l-0.1,0.2l-0.7,0.1l-0.2,1.4l-0.4,0.2l-0.3,0.5l1,0.7l-0.2,0.4l0.2,0.9
                        		l-0.2,0.3l0.1,0.5l-0.6,1.3l-0.7,0.7l-1,0.5l-0.1-0.1l-0.2,0.2L281,252l-0.2,0.2l-0.4,0.9h0.5l-0.2,0.6l0.3,0.1l-0.1,0.3l-0.4-0.1
                        		l-0.3-0.3l-1.1-0.3l-0.7-0.5l-1.2-0.4l-0.5-0.6l-0.2,0l-0.1,0.2l-0.4,0.1l-0.3-0.1l-0.1,0.1l-0.2,0.7l0.2,0.1l-0.1,0.4l0.1,0.5
                        		l-0.5,1l0.3,1l0.3,0.3l0,0.6l0.2,0.8l0.6,0.4l-0.2,0.6l0.1,0.8l-0.1,0.4l0.8,0.7l1,0l-0.1,0.6l0.6,1.3l-0.3,0.2l-0.2,0.7l-0.6,0.7
                        		l-0.3,0.1l-0.3-0.3l-0.4,0.1l-0.1-0.3l-0.6,0.2l-0.2,0.2l0,0.3l-0.3,0.2l0.1,1l-0.5,0.7l-0.5-0.3l-0.8,0.6l-1.3-0.3l-0.7,0.9
                        		l-0.3,0.9l0.1,0.8l0,0l-1.2-0.3l0,0l0-0.5l-0.1,0l-0.2,0.2L270,268l0.2-0.6l-0.2,0l-0.3,0.4l-0.2-0.2l0-0.8l-0.6-1.6l0.2-0.5l0-1.1
                        		l0.3-0.8l0-0.9l-0.3-0.2L269,262l-0.4-0.5l-0.3-0.1l-0.2,0.2l-0.4,0l-0.2-0.3l-0.2,0.2l-0.1-0.1l-1.1,0.2l-0.2-0.3l-0.2-0.1
                        		l-0.4,0.2l-0.4-0.4l-0.3-0.1l-0.8-3.9l-2.4,1.9l-0.6,0.8l-0.3-0.1l0-0.6l-0.2-0.2L260,259l-1.3-0.1l-0.6,0.2l-0.2,0.4l0.3,0.3
                        		l-0.1,0.9l-0.3,0.5l-0.3,0.1l-0.2,0.4l-0.4,0.2l-0.3,1.3l-0.6,0l0,0l-1.7-0.6l-3.6-1l-3.3-0.5l-0.5-0.2l-1.2,0.3l-0.5-0.3l0.2-0.5
                        		l-1.9-0.4l-3.1-0.2l-0.8,0.1l-0.6,0.4l-0.2,0.3l-0.1,0.4l0.2,0.2l0.3-0.1l0.1,0.2l-0.2,0.2l-3.7-0.8l-0.5,0.1l-0.2-0.3l0.2-0.3
                        		l-0.3-0.1l0.3-0.3l0.5-0.1l0.2-0.2h0.4v-0.1L236,259l-0.8,0.3l0,0l-0.5-0.3l-0.7-0.7l0.3-0.4l0.1-0.5l-0.3-0.9l-0.3-0.4l-0.1-0.4
                        		l0.1-0.5l-0.6-0.6l-0.1-0.5l-0.5-0.5l-1.2,0.1l-0.2-0.2l-0.2,0l-0.1-0.8l0.5-0.8v-0.5l-0.3-0.3l0-0.6l1-0.5l0.3,0l0.3,0.3l0.6-0.1
                        		l0.5-0.6l0.7-0.1l0.3-0.3l-0.1-0.4l0.2-0.4l-0.1-0.3l0.3-0.2l0-0.4l-0.6-0.4l0.1-0.6l-0.2-0.5l0.4-0.6l0.3-0.1l0.6-0.9l0.1-1.5l0,0
                        		l0.1,0.2l-0.1,0.3l0.3,0.1l0.3,0.4l1.6,0.5l0.2-0.4l0.4,0l0.7-0.5l0.3,0.1l0.3-0.4l0.1,0.9l0.7,0.6h0.9l0.5,0.3l1.2,0.2l0.8,0
                        		l0.6-0.2l0.4,0.1l1-0.3l1-0.6l0.7-0.6l1,1l1.5,0.2l3.8,1.2l0.9-0.1l0.6,0.2l0.8-0.1l2.3-0.8l0.4-0.3l0.1-0.3l0.8,0.2l0.5,0.8
                        		l0.9,0.3l0.3,0.3l1,0.3l1.1-0.3l0.1,0.2l0.6-0.2l0-0.4l0.5-0.7l0.2-0.7l0.6-0.5l0.4-0.8l-0.5,0l-0.1-0.2l0.4,0.1l-0.3-0.5l0.4-0.1
                        		l0.3,0.2l0.4-0.3l0.6-0.8l-0.1-0.8l0.2-0.1l0.1-0.8l-0.1-0.2l0.5-0.6l-0.3-0.3l0.3-0.1l0.7-0.9l1.1-0.4h0.5l0.4-0.3l1.2-0.1
                        		l0.9,0.2l0.5-0.2l1.1,0.4l1,3.1l0.6,0.9l1,0.2l0.7,0.4l2.3,0.2l1.4-0.6l0.2-0.5l0.5-0.3l0.3,0.2l0.4-0.1l0.7,0.3L285.2,243.4z"/>
                        </g>
                        <g id="id-kb" class="click-point" onclick="window.location='region?r=kalimantanbarat'" onmouseover="popUp('id-kb')">
                        	<path d="M236,155.8l-0.4-0.1l-0.6-1.4l0.1-0.3l1.6-0.5l0.6,0.1l0.6,0.6l0,0.3l-0.3,0.6L236,155.8L236,155.8z M247.8,144.2l0.5,0.1
                        		l0.4-0.3l0.6,0l0.5,0.5l0.4,0.1l0.3-0.1l0.3-0.4l0.5,0.2l0.3,0.5l0.2,0.9l-0.1,0.5l0.2,0.3v0.3l-5,2.9l-1.3-0.4l-0.4-0.4l0.6-0.6
                        		l0.2-0.5l0.4-2.2l0-0.4l0.8-1.1L247.8,144.2L247.8,144.2z M249.8,91.5l-0.5,1.4l-0.4,0.2l-0.3,0.8l-0.6,0.1l-0.1,0.5l0.2,0.7
                        		l0.4,0.3l0.4,0.6l1.2,0.3l0.1,0.3l-0.4,2.1l0.3,0.7l1.8,1.8l0.4,0.2l0.8,1.3l1.3,0.1l0.5,0.2l0.3,0.3l0.2,1.4l1.5,0.7l0.4,0.9
                        		l0.4,0.3l0.6-0.1l0.7,0.2l0.5,0.7l0.1,0.5l0.5,0.4l0.4,0.7l0.3,1h1l1,0.3l0.9,1.4l0.4,0.3l1.2,0.4l0.7,0.1l0.5-0.1l0.4-0.7l0.5,0.4
                        		l0.5,0l0.4-0.3l0.8-0.3l1-0.6l0.7-0.1l0.6-0.6l0.3-0.6l3.9-0.5l2-0.6l0.3,0.3l1.8,0.6l0.5,0.3l0.5,0l0.7-0.3l0.8,0.1l0.7,1.2l0.2,0
                        		l0.1-0.5l0.5-0.1l1.1-0.8l0.3,0l1,0.5l0.6-0.2l1.7,0.3l0.3-0.8l1.4-1.4l3.2-0.2l0-0.7l0.3-0.6l0.1-1.5l0.9-0.8l0-0.7l-0.4-0.7
                        		l0.5-0.6h0.4l1.3-0.8l1.6-0.3l0.5-0.3l0.1-0.3l1-0.4l2.9,0.4l1.6-0.1l0.5,0.4l0.4,0l0.6-0.3l0.4-0.5l0.2-0.1l0.8,0.2l0.9-0.1
                        		l0.6,0.1l0.5,0.3l0.1,0.4l-0.2,0.1l-0.5,1l-0.5,0.2l-0.3,0.3l-0.1,0.4l0.8,0.1l1.4-0.4l0.4,0.1l0.4,0.7l0.8,0.2l1.6-0.2l0.8,0.2
                        		l0.7,0.5l0.2,0.3l0.6,0.4l0.3,0.4l0.4,0l0.3-0.3l0.6-0.2l0.8-0.1l0.7,0.3l0.8,1.3l0.3,0.1h0.3l0.4-0.2l0.4-0.4l1.9-0.8l0.3-0.8
                        		l-0.1-0.2l0.1-0.2l1.9-0.8l0.4-0.4l3-0.3l1,0.7l0.2,0.3l0,0l0,0l0,0l-0.8,0.4l-0.1,1.7l0.2,0.2l-0.3,0.4v0.7l-0.2,0.7l-0.3,0.3
                        		l-0.5-0.1l-0.5,0.4l-0.3-0.2l-0.7,0.1l-0.5,0.4l-0.1,0.7l-0.3,0.2l-0.7,0.2l-0.1,0.4l0.3,0.3l0.1,0.4l-0.2,0.5l-0.5,0.5l-0.1,0.3
                        		l0.3,0.7l0.6,0.5v0.3l-0.5,0.6l0.1,0.8l-0.2,0.4l-0.7,0.3l-0.2,0.5l0.1,0.2l0,0l-0.5,0.3l-0.2,0.7l-0.4,0.2l-0.2,0.4l-0.4,0.2
                        		l-0.2,0.4H320l-0.7,0.4l-0.3,1.1l-1.3,0.8l-0.2,0.3l-1,0.8l0,0.2l-0.5,0.4l-0.9,0.6l-1.4-0.3l-0.7,0.2l-0.6,0.4l0,0.2l1,1l1.5,0.8
                        		l-0.1,1.3l0.2,0.3l0.4,0.3l-0.3,0.4l-0.2,0.8l0.4,0.1l0.1,0.2L315,129l-0.4,0.3l0.3,0.2l-0.1,0.3l-0.4,0.1l-0.3,0.6l-0.6,0.5
                        		l-0.9,0.2l-0.4,0.6l-0.5,0.4l-0.2,0.6l-0.3,0.2l0.8,0.7l0.2,0.8l-0.7,0.8l-0.2,0.5l-0.1,0.1l-0.1-0.1l-0.3-0.5l-0.5,0l-0.1-0.4
                        		l-0.4,0.1l-0.3,0.5h-0.4l-0.3,0.2l-1.3-0.1l-0.3,0.3l-1.4,0.4l-0.7,0.6l-0.7,0.1l-0.6-0.2l-0.6,0.1l-0.1,0.9l-0.7,0l-0.3,0.4
                        		l-0.9,0l-0.6,0.4v0.2l-0.9,0.1l-0.1,0.2l-0.9-0.2l-0.1,0.5l-0.2,0.2l-0.4-0.3l0-0.6l-0.4-0.1l-0.5,0.4l-0.9,0.3l-0.4-0.2l-0.4,0.4
                        		l-0.4-0.5l-0.6-1.2l-0.3-0.3l-0.5,0l-0.8,1.1l0.2,0.7l-0.1,0.1h-0.4l-0.8-0.3l-1.1-0.1l-0.2,0.2l0.3,1.1l-0.1,0.3l-1.2,0.3
                        		l-0.4-0.1l-0.5-0.5l-0.1,0.9l0.3,0.8l-0.7-0.1l-0.1,0.1l-0.2,0.6l-0.5,0.3l-1-0.1l-0.8,0.3l-0.2,0.3l-0.9,0.6l-0.6,0l-0.3,0.4
                        		l0.2,0.7l-0.5,0.5l-0.5,0.1l-0.3,0.5l0.3,0.6l-0.3,0.5l0.3,0.3l-0.1,0.3l-1.2,0.2l-0.3,0.3l-1.1,0l-0.2,0.2L280,149h-0.3l-0.4,0.8
                        		l-0.6,0.3l-0.2,0.6l-0.4,0.5l-0.2,0l0,0.3l-1.1-0.2l-0.1,0.5l-0.4-0.1l0.1,0.8l-0.1,0.6l-0.3-0.1l0-0.5l-0.3-0.2l-0.8,0.5l0.3,0.4
                        		l0.1,0.4l-0.8,0.2l-0.4-0.4l-0.5,0.1l-0.3,0.3l-0.5-0.4l-0.4,0.5l-0.9,0.2l-0.3,0.4l-0.5,0.4l0,0.8l0.4,0.1l0.2,0.4l0.3,0.2
                        		l0.4-0.1l0.2-0.1l0.1-0.4l0.4-0.2l0.3,0.2l0.2,0.5l0.1,1.2l-0.1,0.4l-0.4,0.3l-0.1,0.4l0,0.6l0.3,0.4l0,0.4l-0.3,0.4l0.1,0.4
                        		l0.3,0.2l0.5-0.1l0.9,0.1l0,0.1l-0.1,0.4l0.1,0.4l-0.7,0.6l0.7,1.3l0,0.2l-0.2,0.2l0,0.3l-0.6,0.7l0.7,1.1l0.5,1.8l0.1,1.3l0.5,2.1
                        		l-0.3,0.8l0.5,0.3l0.3,0l0.1,0.4l-0.5,0.9l-0.9,0.4l-1.5,0.4l-0.1,0.6l-0.6,0.5l-1.2,0.2l-0.8,0.5l-1.2,0.4l-0.4,0.3l-0.3,0.9l0,0
                        		l-1.3,0.8l-0.3-0.1l0.1-0.3l-0.2-0.7l0.1-0.8l-0.4-0.9L266,176l-0.6-0.1l-1.1,0.3l-1.3,0.6l-2,1.6l-0.2-0.3l-0.5-0.1l-0.2-0.9
                        		l-0.3-0.6l0.5-1.1l0.1-0.6l-0.3-0.5l-0.4-0.2l-0.2-1.7l-1.3-0.4l0.7-0.8l0.3-1.3l-1-3.8l-0.7-0.9l0-1.1l0.5-1.5l0-0.7l-0.7-1.8
                        		l-0.7-0.5l-1.7-0.7l-0.8-0.8l0.2-0.9l1.3-0.8l0.7-1.2l0.6-3.3l0-1.5l-0.2-0.7l-0.2-0.4l-0.7-0.5l-0.8-0.2l-0.9-1.1l0.5-1.4
                        		l-1.9-0.6l-1.2-1.6l-0.7-0.4l-0.7,0.5l-1.1-0.8l-0.4-0.8l-0.3-0.3l-2-0.6l-0.3-0.3l-0.5,0.1l0.2,0.8l-0.3,0.4l-0.3,0.1l-1.7-0.6
                        		l-0.6-0.6l-0.5-0.9l0.2-2.6l0.5,0.1l0.4,0.4l1.1,0.3l0.8,0l1.1,0.6l0-0.5l-1-0.7l-0.9,0l-0.2-0.5l0.3-0.5l0-0.7l-1.4,0l-0.4,0.1
                        		l-1.7-0.6l-0.7-0.8l-0.4-1.9l-1-2.6l0.3-0.6l0.6-0.1l-0.2-0.8l1.1-1.8l0.4-1.6l-0.2-1.2l-0.8-1.9l-1.1-1.2l-0.8-0.2l-1.2-0.1
                        		l-0.3-0.3l0-0.6l0.4-0.9v-0.5l-0.7-0.8l0.5-2.1l-0.3-0.9l-0.7-0.8l0.3-0.9l-0.8-0.9l0.1-0.4l0.7-0.6l0.5-0.1l0.7-0.7l0.4-1.1
                        		l-0.4-1.4l-0.5-0.4l-0.5-1.4l0.1-0.2l0.7,0.2v-0.8l0.6-1.1l0.7-0.7l0.2-0.8l-0.2-1.3l0.1-0.9l0.4-0.7l0.7-0.7l2.2-1.3l0.5-0.6v-0.4
                        		l0.5-1.1l0.7-1l0.1-1.1l-0.3-0.6l0.1-0.3l0.5-0.2l1.4,0l0.3-0.4l0.5-0.2l1.7,0L249.8,91.5L249.8,91.5z M235.8,78.1l-0.2,0.1l-1-0.7
                        		l0.9-0.8l0.3-1.1l0.5-0.2l0.3,0.1l0.2,0.3l-0.2,1.5L235.8,78.1z M182.2,78.3l-0.4,0l-0.3-0.3l-0.3-2.7l0.1-0.9l0.2,0l2.6,1.4
                        		l-0.6,1.3l-0.9,0.9C182.6,78.1,182.2,78.3,182.2,78.3z M226.7,63.9l-2.3,0.5l-1.5-0.8l0.6-0.8l1.3-0.9l-0.6-0.4l-1.8-0.6l-1-1.8
                        		l-0.2-1.1l0.6-0.7l0.7-0.2l2-2l1.2,0.3l0.1,0.8l0.2,0.5l2.2,2.2l0.2,1.8l-0.2,0.8L226.7,63.9L226.7,63.9z"/>
                        </g>
                        <g id="id-ki" class="click-point" onclick="window.location='region?r=kalimantantimur'" onmouseover="popUp('id-ki')">
                        	<path d="M393.8,84.7l1.4,1.6l0.7,1.2l0,0.4l-0.6,0.9l-2.7,2.4l-1-0.4l-0.3,0l0.5,0.4l0.2,0.7l-0.1,2.2l0.1,0.6l0.8,0.9l2.3,1.6
                        		l1.5,1.5l4.9,2.9l0.5,1.3l1.3,0.6l0.6-0.1l0.6,0.2l3.1,2.7l0.4,0.9l0.8,0.9l1.2,0.5l0.3,0l1.3,0.4l0.2,0.2l0.1,0.9l-0.6,0.8
                        		l-0.7,0.7l-2.4,1.7l-2-0.8l-3,0.3l-2.8-0.3l-3.1-0.6l-1.6-0.7l-0.7-0.7l-0.7-1.8l-0.7-0.6l-0.8-0.4l-0.2,0.1l0,0.4l2.4,4.1l0.1,0.7
                        		l-0.2,0.4l-0.4,0.1l-0.3-0.1l-0.8-0.7l-0.6-0.1l-1.6,0.5l-1.2,1.2l-0.4,0.8l0,0.9l-1.7,3.5l-0.9,0.7L386,122l-0.7,2.1l-0.2,1.2
                        		l0.4,1.2l0.5,0.4l0.1,0.7l-0.2,0.4l-0.6,0.7l-0.8,2.5l0,0.5l0.6,1.3l-0.5,3.1l2.6-1.7l0.5-0.1l0.2,0.1l0.1,0.3l-1.1,3.6l0.8,1.8
                        		l0,0.4l-0.1,0.2l-2.8,1.2l-2.1-0.1l-0.7-0.8l-0.4,0.3l-0.1,0.8l-2,2.4l-2,3.3L377,148l-1.4,0.6l-1.8,0.3l-1.3-3l0.3-1.1l-0.1-0.2
                        		l-0.2,0.1L372,146l0,0.5l0.7,0.7l0.6,1.3l-0.5,2l-2.3,0.8l-1.5,1.1l-0.1,0.2l0.1,0.8l0.5,0.8l-0.1,0.5L369,155l-2.4,0.9l-1.7,0.8
                        		l-1.4,0.9l0.1,0.3l0.5,0.3l0.7-0.1l0.6-0.5l0.8-0.2l0.7,0.1l0.4,0.2l0.3,2.2l0,2.3l-0.4,0.5l-1.1,0.4l-0.3,0.3l1.3,0.3h0.8l0.4-0.4
                        		l0.3,0.7l0,0.3l1.4,0.4l-0.1,1.4l-0.7,2.5l0,0L368,168l-1.1-0.3l-2.7,0l-1.3-0.4l-2.7-0.1l-0.4-0.1l-0.5-0.5l-0.5,0.5l-0.8,0.3
                        		l-0.1,0.3l-0.4,0.4l-0.5,0.2l-0.3-0.5l0-1l-0.7-1.7l0.2-1.5l0.4-0.6l-0.1-0.3l-0.6-0.3l-0.5,0.1l-0.4-0.3l-0.2,0l0.2-0.6l-0.3-0.3
                        		v-0.4l0.3-0.7l0.1-0.7l-0.1-1.9l-0.4-0.7l-0.5-0.6l-0.1-0.5l0.1-0.3l-0.7-0.6l-0.1-0.3l0.1-0.7l-0.3-0.4l-0.6-0.1l-0.6,0.3
                        		l-0.2-0.4l0.1-0.4l0.6-0.6l0.4-0.7l0.8-0.7l0.3,0.1l-0.1,0.8l0.3,0.1l1.1-1.3l0.3-1l0,0l0,0l0,0l0.2-1.3l0.5-0.5l0.9-0.7l0-0.3
                        		l-0.8-0.7l-0.3,0.1l-0.3,0.3l-0.2-0.1l-0.2-0.7l-0.3-0.1l-0.4-0.4l-0.4,0.1l-0.2-0.9l-0.2-0.3l-1.3-0.8l-0.6-1l-0.8-0.7l-1.7-0.3
                        		l-0.4-1l0-1.2l-0.3-1.9l-0.5-0.4l-0.4-1l-0.7-0.7l-0.2-0.1l0.2-1.1l-0.4-0.1l-0.2-1.5l0.4-0.1l0-0.5l-0.3-0.4l0.5-0.9v-0.7l0.4-0.3
                        		l0.4-0.6l-0.4-1.1l-2.4,1.2l-0.3,0.7l-0.5,0l-0.5,0.2l-0.8,0.7l-0.9-0.2l-1,0.2v-0.5l-0.2-0.5l0.1-0.6l-0.5-0.8l-0.1-1.4l-0.2-0.3
                        		l-0.4,0l-0.3-0.3l-0.6,0.1l-0.3-0.5l0.4-0.9L339,124l0.4-0.5l0-0.3l0.4-0.1l0.2-0.2l0.5-1.1l0.7-0.4l0.3,0.1l0.1,0.2l0.3-0.2
                        		l0.7-0.1l0.2,0l0.3,0.5l0.1-0.3l1.2-0.8l0.2-0.4l0-0.7l-0.6-0.6l-0.3-0.7l-0.7-0.9l-0.6-1.2l-0.3-1.6l-0.4-0.7l-0.5-0.4l-0.5-0.1
                        		l-0.8,0.8l0,0.2l0.3,0.5l-0.5-0.1l-0.2-0.4l-0.5-0.3l-0.4,0.2l-0.5-0.1l-0.8,0.6l-0.3-0.1l-0.5,0.1l-0.5,0.7l-0.9,0.6l-0.8,0v0.6
                        		l-0.2,0.4l-1,0l-0.7,0.4l0.1,0.7l-0.2,0.1l-0.7-0.1l-0.5-0.4l-0.7-0.2l-1.5,0.2l-0.4-0.2l-0.1-0.4l-0.6-0.3v-0.2l0.3-0.3l-0.3-1
                        		l-0.7-0.4l-0.3,0.1l-0.4-0.1l-1.3,0.7l-0.5-0.1l-0.7,0.2l-0.2-0.1l-0.3,0.2l-0.4-0.3h-0.5l0,0l-0.1-0.2l0.2-0.5l0.7-0.3l0.2-0.4
                        		l-0.1-0.8l0.5-0.6v-0.3l-0.6-0.5l-0.3-0.7l0.1-0.3l0.5-0.5l0.2-0.5l-0.1-0.4l-0.3-0.3l0.1-0.4l0.7-0.2l0.3-0.2l0.1-0.7l0.5-0.4
                        		l0.7-0.1l0.3,0.2l0.5-0.4l0.5,0.1l0.3-0.3l0.2-0.7v-0.7l0.3-0.4l-0.2-0.2l0.1-1.7l0.8-0.4l0,0l0.4-0.2l0,0l0.2-0.4l0.7-0.1l1.6-0.7
                        		l0.6-0.5l2.6,1.5l0.4-0.1l0.2-0.4l0,0l0.8,0.4l0.3,0.5l0.6,0.5l1.6,0.5l0.8,0.9l0.2,1l0.2,0.3l0.8-0.5l0.7,0.1l0.5,0.2l0.3,0.4
                        		l0.1,0.6l0.4,0.5l0.5,0.2l0.7,0.1l0.9-1h1.3l0.6,0.3l0.8,0.1l0.8-0.9l1,0.2l0.8-0.9l0.5-0.3l0.3-1.6l0.4-0.4l2,0.1l2.3-0.9l2.3-0.1
                        		l1-0.9l0.6-1.2l0.9-0.8l1.6-2.1l1.3-2.5l-0.3-1.2l0.1-0.7l0.5-0.6l1.1-0.6l0.3-0.7l0.7-0.4l0.2-0.8l0-2.2l0.2-0.7l0.8-1.4l0.4-0.3
                        		l0.3-1.3l0.3-0.3l0.5-0.1l0.6,0.6l0.8,0.3l0.3,0.3v0.4l0.6,0.3l0.7-0.1l1-0.3l1.8-1.1l2.3-0.8l2-1.2l1.3-0.1l1.4,0.3l1.6-0.4h0.9
                        		l0.5,1.1l0.6,0.5l1.3,0.6l0.5,0.1l1.1-0.3l0.5,0.3l1.1,1.4l1.4,0.5l0.4,0.1l1.3-0.8l1.3-0.2"/>
                        </g>
                        <g id="id-kr" class="click-point" onclick="window.location='region?r=kepulauanriau'" onmouseover="popUp('id-kr')">
                        	<path d="M160.4,132.9l0.1,0.3l0.8,0.2l0.1,0.4l0.6,0.9l0.4,0.3l-0.1,0.2l-1,0.8L161,137l-0.1,1.1l-0.1,0.1l-0.4-0.1l-0.7-0.9h-0.2
                        		l-0.5,0.2l-0.1,1.3l-0.5,0.2l-0.2-0.3l-0.1-1l-0.4-1.2l-0.6-0.3l-0.5-0.6l0.2-0.9l0.3-0.3l0-0.3l0.6-0.1l0.1-0.1l0.1-0.8l0.2,0.8
                        		l-0.4,0.4l0.4,0.6l0.2-0.1l0-0.7l0.1-0.1l0.3,0.3l0.6,0.1l0.5-0.3v-0.6l0.2-0.2l0.6-0.2L160.4,132.9L160.4,132.9z M165.7,130.6
                        		l0.1,0.1l0.4-0.1l0-0.9l0.3-0.2l1.2,1.6l0.9,0.8l0.8,0.1l0.1,0.4l-0.3,0.1l-1.2-0.5l-0.3,0.3l0.4,0.5l-0.1,0.2l-0.9-0.5l-0.4,0.1
                        		l-0.9-0.7l0.1-0.2l-0.1-0.1l-0.4,0.1l-0.3-0.5l-0.8-0.4l-0.9,0.1l-0.9,0.6l-0.5-0.1l-0.7,0.5l-0.4-0.1l-0.1-0.4l-0.7,0.1l-0.5-0.2
                        		l-0.1-0.2l0-0.6l0.7-0.5l0.1-0.2l0.6-0.2l-0.2-2.3l0.8-0.4l1,0.5l0.6,0.6l0.5,0.8l0.3,0l0.3,0.5l0.6,0.5l0,0.4l0.2,0.3L165.7,130.6
                        		L165.7,130.6z M158.8,124.6l0.2,0.2l0.1-0.4l0.3,0.1l0.3-0.1l1.9,2.1l-0.4,0.2l-0.1-0.1l-0.4,0.4l-0.5-0.3l-1.3-1.4l-0.9-1.6
                        		l0.2,0.1L158.8,124.6L158.8,124.6z M161.2,123l1.8,2.2l0.8,0.8l0.6,0.3l0.1,0.3l-0.2,0.3l-0.7-0.3l-0.6-0.6l-0.9-0.6l-0.9-1.2
                        		l-0.7-0.6l0-0.5l0.6,0.2l0.1-0.2L161.2,123z M159.2,121.4l0.6,0.4l-0.1,0.1l-0.4-0.1l-0.1,0.2l0.3,0.1l0.1,0.3l-0.3,0.1l-0.6-0.4
                        		l0.1,0.3l-0.2,0.1l-0.3,0.4l-0.3-0.1l-0.5-0.8l-0.2,0.1l-0.1-0.6l0.1-0.2l0.5,0.4l0.2-0.1l0.1-0.4l-0.4-0.2l-0.2-0.3l0.3,0.1
                        		L159.2,121.4L159.2,121.4z M156.8,113.5l-0.2,0.4l0,0.4l0.7,0.5l-0.3,0.1l-0.5,0.3l0.9,0.2l0.1-0.3l0.4,0.3l-0.2,0.3l-0.6-0.2v0.9
                        		l-0.1,0.1l-0.6-0.5l-1.3-2.2l0-0.2l0.5-0.1l0.3,0l0.6-0.2C156.5,113.4,156.8,113.5,156.8,113.5z M150.8,113.9l-0.1,0.2l-0.5-0.6
                        		l-1.1-0.9l-0.2-0.4l-0.1-0.6l1,0.4l0.7,0.6l0.1,0.4l0.4,0.5l-0.1,0.3L150.8,113.9L150.8,113.9z M149.3,113.7l-0.2,0.5l-0.2-0.4
                        		l-0.4-0.1l-0.8-0.6l-0.5-0.8v-0.4l0.3,0l0.3-0.4l1.1,1.3L149.3,113.7L149.3,113.7z M143.1,111.8l0.1,0.6l1.1,1.3l-0.2,0.3l-1-0.8
                        		l0.4,0.7l-0.2,0.8l0.3,0.4l-0.4,1l-0.2,0.2l-0.4,0l-0.2-0.4l-0.1,0.1l-0.6-0.2l-0.3-0.6l-0.6-0.7l-0.2-1.8l0.3-0.5l0-0.7l0.5,0.1
                        		l0.2,0.3l-0.1-0.6l0.1-0.4l-0.1-0.1l0.6-0.4l0.5,0.1l0.2,0.3L143.1,111.8L143.1,111.8z M154.2,110.8l0.3,0.1l0.1-0.4l0.4-0.1
                        		l0.3,0.4l-0.1,0.5l-0.3,0.1l0.1,0.5l0.4,0.2l0.4-0.1l0.8,0.3v0.2l-0.3,0.4l-1,0.7l-0.4,0l-0.4-1.2l-0.7-0.3l-0.3,0.1l0-0.9
                        		l-0.2-0.2l-0.3,0.3l-0.3-0.2l0.2-0.7l0.5-0.1l0.6,0.3L154.2,110.8L154.2,110.8z M148.7,110.5h-0.2l-0.7-0.8v-0.3l0.4-0.3l0.5,0.5
                        		V110.5z M149.9,108.6l-0.1,0.3l0.3,0.4l0.3,0.2l0.3,0.3l1.2,0.7l0.1,0.5l-0.3-0.1l-0.1,0.2l-0.1,0.2l0.1,0.4l-0.1,0.2h-0.2
                        		l-0.5-0.6l-0.7-0.2l-0.7-0.5v-0.6l0.2-0.2l-0.6-0.6l0.1-0.3l0.3,0.2l0.4-0.2v-0.5l0.2,0.1C149.8,108.2,149.9,108.6,149.9,108.6z
                        		 M141.8,107.4l0.1,0.2l-0.1,0.1l-0.4-0.1l-0.1,0.8l0.3,0.6l0.4,0.1l0.5,1.1l-0.9,0l-0.1-0.2l-0.6-0.1l-0.7-0.5l0-0.8l0.2-0.1
                        		l0.1-0.5l0.7-0.2l0.3-0.6L141.8,107.4z M154.6,107.4l0.1,0.5l-0.2,0.2v1.2l-0.7,0.1l-0.2,0.4l0.2,0.4l-0.8-0.2l-0.3,0.2l-0.5-0.2
                        		l-0.1-0.2l-0.8-0.1l-0.7-0.5l-0.3-1l0.1-0.3l0.4-0.1l-0.1,0.6l0.4,0l-0.1-0.7l-0.2-0.1l0-0.3l1.2,0.1l0.2-0.8l0.4-0.1l0.6,0.7
                        		l0.3,0.1l0.2-0.2l-0.3-0.2v-0.3l0.6-0.2l0.4,0.4L154.6,107.4L154.6,107.4z M162.1,106.9l0.1,0.7l0.7,0.4l0.5,1.2l-0.3,1.2l0.1,0.4
                        		l0.2,0.2v0.4l-0.3,0.1v0.2l0.3,0.1l0.6-0.1l-0.1,0.5l-0.8,1l-0.6-0.2l-1,0l-0.6-0.2l-0.8-0.7l-0.3,0.1l-0.7-0.2l0-0.2l0.7-0.2
                        		l-0.5-0.4l0.1-0.3l-0.1-0.2l-0.4-0.4l0.2-0.3l0.6,0.1l-0.2-0.4l0.4-0.5l-0.4-0.4l-0.8,0.4l0,0.6l-0.2,0.2h-0.3l0.1-0.4l-0.5-0.2
                        		l-0.2,0.4l-0.2,0.1l-1.2-0.1l-0.4-0.3l-0.3-0.6l-0.1-0.4l0.5-0.8l1.5-0.2l-0.3-0.8l0.4-0.2l0.7,0.2l0.1-0.2l0.4-0.2l1.1,0.5l0.6,0
                        		l0.6-0.4l0.2-0.5l0.4-0.1l0.1,0.1L162.1,106.9L162.1,106.9z"/>
                        </g>
                        <g id="id-ks" class="click-point" onclick="window.location='region?r=kalimantanselatan'" onmouseover="popUp('id-ks')">
                        	<path d="M366.4,189.5l-0.2,0.2l-1.1-1.8l0.6-1.6l0.9-1.1l0.2-0.1l0.2,0.4v0.6L366.4,189.5L366.4,189.5z M361.7,196.5l-0.6,0.2
                        		l-0.5-0.1l-0.1-0.2l0.1-0.8l0.4-1.3l-0.1-1.8l-0.9-1.3l-0.3-0.8l0-0.7l1.9-5.6l2.5-1.8l0.2,0.1l0.1,0.4l-0.4,2.3l0.3,2.6l0.8,4
                        		l-0.2,2.4l-2.5,1.9L361.7,196.5L361.7,196.5z M355.4,149.6l-0.3,1l-1.1,1.3l-0.3-0.1l0.1-0.8l-0.3-0.1l-0.8,0.7l-0.4,0.7l-0.6,0.6
                        		l-0.1,0.4l0.2,0.4l0.6-0.3l0.6,0.1l0.3,0.4l-0.1,0.7l0.1,0.3l0.7,0.6l-0.1,0.3l0.1,0.5l0.5,0.6l0.4,0.7l0.1,1.9l-0.1,0.7l-0.3,0.7
                        		v0.4l0.3,0.3l-0.2,0.6l0.2,0l0.4,0.3l0.5-0.1l0.6,0.3l0.1,0.3l-0.4,0.6l-0.2,1.5l0.7,1.7l0,1l0.3,0.5l0.5-0.2l0.4-0.4l0.1-0.3
                        		l0.8-0.3l0.5-0.5l0.5,0.5l0.4,0.1l2.7,0.1l1.3,0.4l2.7,0l1.1,0.3l1.3,0.6l0,0l-0.4,1.9l-0.5,0.7l-0.4,0l-0.2-0.2l-0.1-0.6l-0.8-0.4
                        		l-2,0.4l0,1.6l1,0.9l0.2,3.1l-0.3,0.9l-1.4,1.8l-0.5,0.3l-0.2-0.1l-0.2-0.4l-0.2-1.2l-1-1.6l-0.2-0.2l-0.1,0.1l-0.4,1.7l0.2,0.9
                        		l1,1.4l0.6,0.5l0.1,1l-0.8,0.4l-1.3,1.7l-1.5,2.9l-0.4,2.4l-0.2,0.5l-0.4,0.2l-2,0.3l-1.1,1.1L355,191l-3.2,1.4l-4.5,1.6l-6.2,2.6
                        		l-3.8,2.3L336,199l-0.4-0.4l-0.1-0.6l0-7.3l-0.1-0.8l-0.4-0.7l-1-1.3l-0.7-0.7l-0.7,0.1l-1.5-0.9l0,0v-0.9l0.8-2.4l1.5-2.3l0.4-2.3
                        		l1.5-3l1-0.3l0.4-0.3l0.2-0.2l-0.1-0.3l0.2-0.4l0.4,0.1l0.9-0.3l0.5-0.6l0.3-1.8l0.7-0.6l0.5-0.8l0-0.6l0.2-0.3l0.6,0l5.9-4.3
                        		l0.4,0.3l0.3,0l0.2-1.3l0.4-0.8l-0.7-1.6v-0.4l1-0.7l0.3-0.8l-0.7-0.9l-0.1-0.8l0.7-2.2l0.9-3.9l0.1-0.2l1.9-0.1l1.8-0.7l0.4-0.3
                        		l0.5,0.1l1-0.8l0,0L355.4,149.6L355.4,149.6z"/>
                        </g>
                        <g id="id-kt" class="click-point" onclick="window.location='region?r=kalimantantengah'" onmouseover="popUp('id-kt')">
                        	<path d="M268.6,178.5l0.4-0.9l0.4-0.3l1.2-0.4l0.8-0.5l1.2-0.2l0.6-0.5l0.1-0.6l1.5-0.4l0.9-0.4l0.5-0.9L276,173l-0.3,0l-0.5-0.3
                        		l0.3-0.8l-0.5-2.1l-0.1-1.3l-0.5-1.8l-0.7-1.1l0.6-0.7l0-0.3l0.2-0.2l0-0.2l-0.7-1.3l0.7-0.6l-0.1-0.4l0.2-0.4l0-0.1l-0.9-0.1
                        		l-0.5,0.1l-0.3-0.2l-0.1-0.4l0.3-0.4l0-0.4l-0.3-0.4l0-0.6l0.1-0.4l0.4-0.3l0.1-0.4l-0.1-1.2l-0.2-0.5l-0.3-0.2l-0.4,0.2l-0.1,0.4
                        		l-0.2,0.1l-0.4,0.1l-0.3-0.2l-0.2-0.4l-0.4-0.1l0-0.8l0.5-0.4l0.3-0.4l0.9-0.2l0.4-0.6l0.5,0.4l0.3-0.3l0.5-0.1l0.4,0.4l0.8-0.2
                        		l-0.1-0.4l-0.3-0.4l0.8-0.5l0.3,0.2l0,0.5l0.3,0.1l0.1-0.7l-0.1-0.8l0.4,0.1l0.1-0.5l1.1,0.2l0-0.3l0.2,0l0.4-0.5l0.2-0.6l0.6-0.3
                        		l0.4-0.8h0.3l0.1-0.5l0.2-0.2l1.1,0l0.3-0.3l1.2-0.2l0.1-0.3l-0.3-0.3l0.3-0.5l-0.3-0.6l0.3-0.5l0.5-0.1l0.5-0.5l-0.2-0.7l0.3-0.4
                        		l0.6,0l0.9-0.6l0.2-0.3l0.8-0.3l1,0.1l0.5-0.3l0.2-0.6l0.1-0.1l0.7,0.1l-0.3-0.8l0.1-0.9l0.5,0.5l0.4,0.1l1.2-0.3l0.1-0.3l-0.3-1.1
                        		l0.2-0.2l1.1,0.1l0.8,0.3h0.4l0.1-0.1l-0.2-0.7l0.8-1.1l0.5,0l0.4,0.3l0.6,1.2l0.4,0.5l0.4-0.4l0.4,0.2l0.9-0.3l0.5-0.4l0.4,0.1
                        		l0,0.6l0.4,0.3l0.2-0.2l0.1-0.5l0.9,0.2l0.1-0.2l0.9-0.1v-0.2l0.6-0.4l0.9,0l0.3-0.4l0.7,0l0.1-0.9l0.6-0.1l0.6,0.2l0.7-0.1
                        		l0.7-0.6l1.4-0.4l0.3-0.3l1.3,0.1l0.3-0.2h0.4l0.3-0.5l0.4-0.1l0.1,0.4l0.5,0l0.3,0.5l0.1,0.1l0.1-0.1l0.2-0.5l0.7-0.8l-0.2-0.8
                        		l-0.8-0.7l0.3-0.2l0.2-0.6l0.5-0.4l0.4-0.6l0.9-0.2l0.6-0.5l0.3-0.6l0.4-0.1l0.1-0.3l-0.3-0.2l0.4-0.3l0.4-0.8l-0.1-0.2L315,128
                        		l0.2-0.8l0.3-0.4l-0.4-0.2l-0.2-0.3l0.2-1.3l-1.5-0.8l-1-1l0-0.2l0.6-0.4l0.7-0.2l1.4,0.3l0.9-0.6l0.5-0.4l0.1-0.2l1-0.8l0.2-0.3
                        		l1.3-0.8l0.3-1.1l0.7-0.4h0.4l0.2-0.4l0.4-0.2l0.2-0.4l0.4-0.3l0.2-0.7l0.5-0.3l0,0h0.5l0.4,0.3l0.3-0.2l0.2,0.1l0.7-0.2l0.5,0.1
                        		l1.3-0.7l0.4,0.1l0.3-0.1l0.7,0.4l0.3,1l-0.3,0.3v0.2l0.6,0.3l0.1,0.4l0.4,0.2l1.5-0.2l0.7,0.2l0.5,0.4l0.7,0.1l0.2-0.1l-0.1-0.7
                        		l0.7-0.4l1,0l0.2-0.4v-0.6l0.8,0l0.9-0.6l0.5-0.7l0.5-0.1l0.3,0.1l0.8-0.6l0.5,0.1l0.4-0.2l0.5,0.3l0.2,0.4l0.5,0.1l-0.3-0.5l0-0.2
                        		l0.8-0.8l0.5,0.1l0.5,0.4l0.4,0.7l0.3,1.6l0.6,1.2l0.7,0.9l0.3,0.7l0.6,0.6l0,0.7l-0.2,0.4l-1.2,0.8l-0.1,0.3l-0.3-0.5l-0.2,0
                        		l-0.7,0.1l-0.3,0.2l-0.1-0.2l-0.3-0.1l-0.7,0.4l-0.5,1.1l-0.2,0.2l-0.4,0.1l0,0.3L339,124l0.1,0.4l-0.4,0.9l0.3,0.5l0.6-0.1
                        		l0.3,0.3l0.4,0l0.2,0.3l0.1,1.4l0.5,0.8l-0.1,0.6l0.2,0.5v0.5l1-0.2l0.9,0.2l0.8-0.7l0.5-0.2l0.5,0l0.3-0.7l2.4-1.2l0.4,1.1
                        		l-0.4,0.6l-0.4,0.3v0.7l-0.5,0.9l0.3,0.4l0,0.5l-0.4,0.1l0.2,1.5l0.4,0.1l-0.2,1.1l0.2,0.1l0.7,0.7l0.4,1l0.5,0.4l0.3,1.9l0,1.2
                        		l0.4,1l1.7,0.3l0.8,0.7l0.6,1l1.3,0.8l0.2,0.3l0.2,0.9l0.4-0.1l0.4,0.4l0.3,0.1l0.2,0.7l0.2,0.1l0.3-0.3l0.3-0.1l0.8,0.7l0,0.3
                        		l-0.9,0.7l-0.5,0.5l-0.2,1.3l0,0l-0.4,0.3l0,0l-1,0.8l-0.5-0.1l-0.4,0.3l-1.8,0.7l-1.9,0.1l-0.1,0.2l-0.9,3.9l-0.7,2.2l0.1,0.8
                        		l0.7,0.9l-0.3,0.8l-1,0.7v0.4l0.7,1.6l-0.4,0.8l-0.2,1.3l-0.3,0l-0.4-0.3l-5.9,4.3l-0.6,0l-0.2,0.3l0,0.6l-0.5,0.8l-0.7,0.6
                        		l-0.3,1.8l-0.5,0.6l-0.9,0.3l-0.4-0.1l-0.2,0.4l0.1,0.2l-0.2,0.2l-0.4,0.3l-1,0.3l-1.5,3l-0.4,2.3l-1.5,2.3l-0.8,2.4v0.9l0,0
                        		l-2.4-1.1l-1.9-0.5l-1.2,0.1l-3.6,1.7l-1.9,0.3l-0.8,0l-1.1-0.6l0.5-1.6l0.1-1.6l-0.3-0.9l-0.4-0.5l-2.3,0.1l-0.5,0.5l-0.2,0.6
                        		l-1.3,0.3l-2.1-1.3l-3.1-3.3l-0.5-0.1l-1.5,1.6l-0.1,0.6l0.4,0.6l-0.3,1l-3.3,2l-1.2,0.8l-0.7,0.7l-1.8,0.5l-0.3,0l-2-1.6l-1.9-0.7
                        		l-1,0l-1.5,0.6l-3.7,3.5l-0.6,0.3l-0.4,0.1l-1.5-0.6l0.6-2.3l-0.5-3.7v-0.8l0.3-1.1l0-0.7l-1.4-2.4l-0.4-1.6l-0.5-0.1l0.1,0.8
                        		l-0.6,0.8l0.4,0.4l-0.1,0.4l-0.9,0.2l-0.3,0.3l-1.2,0.8l-0.2-0.5l-0.9-0.8l-0.7-0.6l-0.4-0.1h-1.5l-3,1.8l-1.2,0.5l-1,0.3l-1.5,0.2
                        		l-2.2-1.5L268.6,178.5z"/>
                        </g>
                        <g id="id-ku" class="click-point" onclick="window.location='region?r=kalimantanutara'" onmouseover="popUp('id-ku')">
                        	<path d="M388.4,70.6l-0.6,0.4l-1.3-1l-0.5-1.2l0-0.4l0.2-0.2l1.5-0.1l0.8,0.3l0.1,0.3L388.4,70.6z M383.7,65.8l2.2,1.3l0,0.2
                        		l-0.5,0.5l-1.7-0.7l-1.9-0.1l-0.6-0.3l-0.4-0.5l0.1-0.4l0.9-0.4L383.7,65.8L383.7,65.8z M389.4,58.4l-0.8,0.3l-1.2-0.9l-0.2-0.9
                        		l0.1-0.2l0.8-0.8l0.5,0l1.3,1l0.1,0.5L389.4,58.4z M392.2,55.1l0.4,0.2l0.4,2l-0.6,0.4l-0.5,0.1l-0.6-0.3l-3.5-2.8l0.1-0.3l0.9-0.7
                        		l0.5,0l1,0.3l0.2,0.4l0.6,0.4C391.1,54.8,392.2,55.1,392.2,55.1z M354.2,56.6l0-0.9l0.3-0.7l0.4,0l0.8-0.9l0.4,0.1l0.1,0.3l0.4-0.1
                        		l0.1-0.6l0.7-0.6l-0.1-0.4l0.1-1l0.5-0.2l0.3,0.6l1.5,0.3l0.3,0.2l0.1,0.5l0.6,0.5l0.2-0.1l0.4-0.8l0.9-0.3l0.1-0.6l0.1-0.1
                        		l1.4,0.2l0.3,0.2l1.5-0.3l1.2,1l0.2,0.6l0.6-0.1l0.2-0.5l0.4,0.2l0.5-0.1l0-0.6l0.5-0.7l0.4,0.5l0.4,0.1l0.3,0.6l0.8-0.2l0.5,0.2
                        		l0.3-0.1l0.3-0.2l0.3-0.5L373,52l0.4,0.5l0.3-0.1l0.5,0.3l0.7-0.2l0.5-0.4l0.7,0.2l0.3,0.2l0.6,0.1l0.3,0.3l0.3-0.4l1.1,0.2
                        		l0.6-0.2l0.6,0.1l0.6-0.2l0.1-0.2l0.5-0.2l3,2.2l0.4,0.9l0.2,0.2l1.2,0.3l0.9-0.3l0.2,0.2l0,0l-0.8,0.5l-0.9,0.3l-1.6-0.5l-0.2,0.2
                        		v0.6l0.4,0.3l1,0.2l2.6,2.2l-1.8,0.3l1.7,1l1.6,0.2l1.3,1.3l0,0.3l-0.3,0.6l1.1,0.3l-0.1,0.3l-1.2,1.1l-1.1,0.2l-3.2,0.2l-2.7-0.4
                        		l-1.8,0.3l-0.5,0.3l-0.4,0.7l0,0.4l0.6,0.9l1.5,0.9l1.3-0.2l0.8,0.2l0,0.8l-0.3,0.5l1.8,0.9l-0.2,0.3l-1.3,0.2l-0.9,0.3l-0.3,0.5
                        		l-1,0.2l-0.2,0.3l0.5,0.3l2,0.3l2.7,1.2l1.2,2.1l-0.3,1.6l0,1.3l1,0.2l0.8,0.5l0.2,0.3l0.1,1.3L391,82l2.8,2.7l0,0l-0.7,0.6
                        		l-1.3,0.2l-1.3,0.8l-0.4-0.1l-1.4-0.5l-1.1-1.4l-0.5-0.3l-1.1,0.3l-0.5-0.1l-1.3-0.6l-0.6-0.5l-0.5-1.1h-0.9l-1.6,0.4l-1.4-0.3
                        		l-1.3,0.1l-2,1.2l-2.3,0.8l-1.8,1.1l-1,0.3l-0.7,0.1l-0.6-0.3v-0.4l-0.3-0.3l-0.8-0.3l-0.6-0.6l-0.5,0.1l-0.3,0.3l-0.3,1.3
                        		l-0.4,0.3l-0.8,1.4l-0.2,0.7l0,2.2l-0.1,0.8l-0.7,0.4l-0.3,0.7l-1.1,0.6l-0.5,0.6l-0.1,0.7l0.3,1.2l-1.3,2.4l-1.6,2.2l-0.9,0.8
                        		l-0.6,1.2l-1,0.9l-2.3,0.1l-2.3,0.9l-2-0.1l-0.4,0.4l-0.3,1.6l-0.5,0.3l-0.8,0.9l-1-0.2l-0.8,0.9l-0.8-0.1l-0.6-0.3h-1.3l-0.9,1
                        		l-0.7-0.1l-0.5-0.2l-0.4-0.5l-0.1-0.6l-0.3-0.4l-0.5-0.2l-0.7-0.1l-0.8,0.5l-0.2-0.3l-0.2-1l-0.8-0.9l-1.6-0.5l-0.6-0.5l-0.3-0.5
                        		l-0.8-0.4l0,0l0.5-0.8l-0.2-0.3l0.1-0.8l0.8-0.5l0.5-0.9l0.4-0.3l0.1-1l-0.1-1.2l-0.1-0.1l0.5-0.7l-0.1-0.3l0.6-0.2l0.5,0.3
                        		l0.5-0.6l0.7-0.1l0.4-0.3l-0.4-0.8l0-0.2l0.7-0.5l0-0.2l-0.5-0.3l-0.8,0.3l-0.2-0.4l0.2-1l-0.4-0.2l-0.2-0.3l0-0.8l0.3-1.3l1.8-0.2
                        		l0.8-0.5l0-0.2l-0.3-0.4l0.3-0.6l0.7,0.1l0.4-0.2l0.5-0.6h0.7l0.2-0.6l0.5-0.4l0.6-0.2l0.8,0l0.6-0.5l0.1-0.3l-0.5-0.3l-0.1-0.3
                        		l-0.7-0.8l-1,0.3l-0.3-0.5l0.3-0.4l0.1-0.4v-0.5l-0.2-0.1v-0.4l0.6-0.5v-0.4l0.2-0.3l-0.2-0.3l-0.5-0.1l0-0.2l1-0.8l0.3-1.1
                        		l1.6-1.1l0.3-0.8l0.6,0.7l0,0.4l1.2-0.1l0.8-0.8l1-0.1l0.2-0.3v-0.8l0.1-0.3l0.8-0.7v-0.2l-0.7-0.5l0-0.2l0.4-2.8l0.6-1.3l0.3,0
                        		l0.4,0.6l0.4-0.6l-0.6-1l-0.1-1.1l-0.4-0.5l-0.2-0.9l0-1.5l0.1-0.7l0.5-1l0-0.6l0-0.2l-0.8-0.6l-0.1-0.3l0.9-0.2l0.5-0.4l0.7-2.1
                        		l0,0L354.2,56.6L354.2,56.6z"/>
                        </g>
                        <g id="id-la" class="click-point" onclick="window.location='region?r=lampung'" onmouseover="popUp('id-la')">
                        	<path d="M148.3,209.5l0.6-0.1l0.1,0.5l0.4,0l0.4,0.5v0.5l-0.4,0.4v0.2l0.4,0l0.8,0.7l0.3-0.4l0.2-0.9l0.5,0.4l1.4-0.2l0.2-0.2
                        		l0.2,0.1l0.1,0.2l0.9,0.3l1-0.5l0.1-0.4l0.4-0.1l0.5,0.3h0.4l0.3-0.2l0.4,0.4l0.4-0.1l0.7-0.9l0-0.4l-0.1-0.4l-0.7-0.6l-0.1-0.8
                        		l-0.5-0.3l0.3-0.8l0.6-0.6l-0.3-2.7l0.3-0.8l0.3-0.1l0.1-0.4l0.8-0.6l0.5-0.6l0.6,0.1l0.6-0.5l1.2-0.5l0.7-0.6l0.4,0.5l0.2,0.1
                        		l2.2,0.1l1.5-0.2l0.1-0.4l1.1-0.6l0.6-0.2l0.6,0l0.4-0.5l0.6-0.4l0.3-1l0.3-0.3l0.4-0.1l-0.3-0.4l0.4-0.4l0.3-1.1l0.2,0.1l0.2-0.1
                        		l0.1-0.5l0.5-0.3l0.7,0.2l0.7-0.6l0.2-0.5l-0.3-0.6l0.4-0.3l0.1-0.6l0.4-0.5l0.2,0.1l0.3,1.1l0.3-0.2l0.5-0.1l0.3,0.1l0.1,0.7
                        		l0.8-0.1l0.2,0.3h0.6l-0.1,0.8l0.1,0.2l0.4-0.2l0.4,0.3l-0.1,0.5l0.2,0.2l0.3-0.2l0.1,0.1l0.1,0.3h-0.4l0.5,0.4v0.2l0.3,0.3
                        		l-0.4,0.5l-0.1,0.3l0.2,0.1v-0.3l0.2,0.1l0.5-0.1l0.1,0.1l-0.3,0.3v0.2h0.6l0,0.2l0.3,0.1l-0.1,0.5l0.2,0.1l0.8,0.1l0.3-0.1
                        		l0.1-0.3l0.2-0.1l0.5,0.3l0.3,0.6l0,0l-0.2,2.7l1.5,2.4l0.1,0.3v1.3l-0.3,0.8l0,0.4l0.5,0.5l-0.6,1.2l-0.4,1.9l0.2,0.9l0.5,0.6
                        		l0.1,0.4l0,0.2l-0.5,0.3l-0.3,1.2l0.1,3.6l-0.1,0.5l-0.5,0.3l-0.1,0.5l0.1,2.2l-0.2,1.6l0.2,0.7l-0.6,2.1l0.1,1.2l-0.4,1.1
                        		l-0.8,1.1l-0.3,0.1l-0.2-1l-1.7-0.2l-0.4-0.3l-0.2-0.5l0-0.5l0.2-0.3l-0.1-0.2l-0.6-0.6h-0.5l-0.2-0.2l-1.4-0.8l-0.8-0.8l-0.3-0.7
                        		l-1.2-1.7l-0.3-0.1l-0.4,0.1l-0.2,0.3v1.8l-0.1,0.3l-0.7-0.3l-0.6,0.4l0.4,0.5l0,0.3l0.3,0l-0.5,0.3l0.2,0.2l0,0.4l0.4,0.3
                        		l-0.1,0.1l-0.6,0l-0.4,0.4l0.3,0.5l0.8-0.1l-0.5,0.5L172,227l-1.7-0.9l-1.7-0.7l-3-1.9l-0.7-0.6l-0.8-1l-0.6,0l-1-0.3l-0.9,0.4
                        		l-0.5,0.4l0.4,0.3l0.1,0.6l1,1.2l0.4,0.3l0.3,0.5l0,0.4l-0.2,0.1l1.2,1.8l-0.1,0.3l0.4,1.2l-0.1,0.2l-2.5,0.1l-0.4-0.2l-0.1-0.2
                        		l0.3-0.2l-0.2-0.7l-2.1-1.9l-0.4-0.7l-0.8-0.6l-1.2-0.6l0.3-0.5l-0.9-1.1l-3-2.1l-1.5-1.7l-0.1-1l-0.3-0.3l-1.3-0.3l0-0.4l0.5-0.6
                        		l-0.2-0.5l-0.4-0.5l-0.2-0.2l-0.4,0l-0.5-0.6l-1-0.8h-0.3l0,0.2l-0.2,0l-0.2-0.1l0.1-0.7l-0.8-0.7l-0.7,0l-0.6-0.6l-0.5-0.1l0,0
                        		l0.2-0.5l0.3-0.1l0.6-0.5l0.4-0.1l0.5-0.4l0.1-0.5l0.8,0.1l0.1-0.1l0,0L148.3,209.5L148.3,209.5z"/>
                        </g>
                        <g id="id-ma" class="click-point" onclick="window.location='region?r=malukuutara'" onmouseover="popUp('id-ma')">
                        	<path d="M584.8,269.6l-1.6-0.1l-1.5-0.7l-0.2-0.3l1-0.4l1.4,0.1l1,0.5l0.1,0.5L584.8,269.6L584.8,269.6z M564.5,266.7l1.8,0.6
                        		l1.7,0.1l0.9-0.1l0.4,0.3l0,0.3l-1.6,1.7l-0.2,0l-3.4-1.1l-0.5-0.3l-0.7-1.3L564.5,266.7L564.5,266.7z M615.8,271.1l-0.7,0l0-0.2
                        		l1.6-1.7l1.2-0.7l0.6-1l0.9-1l0.3-0.1l2.5,0.8l-0.6,0.6l-3.2,1.2l-1.1,0.8l-0.2,0.4l-1.2,0.7L615.8,271.1L615.8,271.1z M597.8,266
                        		l-1.3-0.3l-1.9-2.3l-0.1-0.4l0.2-0.7l0.1-0.4l0.3-0.3l1.6-0.2l2,0.5l0.4,0.3l0.3,1.4L597.8,266L597.8,266z M545.1,259.3l0.8,0
                        		l0.4,1.3l-1.4,0.1l-1.7,0.5l-0.9,0.6l-1,1.2l-1.5,0.8l-2.4-0.3l-2.7-0.5l-1,0l-2.3,0.5l-2.2,1.8l-0.3,0.1l-0.2-0.3l0.7-2.7l2.8-3.4
                        		l3.7,1.1l2.7-0.5l1.2-1.1l1.3-0.6l2.3-0.6l0.2,0.1l0.1,0.7L545.1,259.3L545.1,259.3z M556.8,258.9l-0.3,0.1l-0.3-0.1l-0.2-0.4
                        		l0.4-2l0.4-0.2l1.7,0.5l0.1,0.3l-0.1,0.7L556.8,258.9L556.8,258.9z M620.4,256.5l-1.3-0.4l-0.2-0.5l0.3-0.5l0.5-0.2l2.3-0.2
                        		l0.2,0.1l-0.7,0.9L620.4,256.5L620.4,256.5z M631.9,251.3l-0.7,0.3l-0.4-0.1l-0.6,0.5l0.7,3.3v0.7l-0.8,2.6l-1,1.3l-3,2.2l-1,1.6
                        		l-0.1,1.3l-0.2,0.3l-0.5,0.2l-2.9-0.3L621,265l-0.4-2.3l1.8-3.1l-0.2-0.5l1-2.9l1.2-1l0.5-0.2l0.9-0.9l1.2-1.5l1.4-2.4l0.8-0.4
                        		l1.3-0.1l1,0.5L631.9,251.3L631.9,251.3z M635.2,249.5l0.9,1.3l0.2,0.6L636,252l-0.2,0.1l-0.8-0.6l-0.4-0.9l-1-0.2l-1.2,0.3
                        		l-0.5-0.1l-0.1-0.2l0.1-0.5l0.3-0.2L635.2,249.5z M578.6,251.3l-0.5,0.2l-1.5-0.9l-0.2-0.4l0.1-0.2l0.3-0.4l1.2-0.7l1.4,0.8
                        		l0.1,0.2l-0.4,1L578.6,251.3L578.6,251.3z M686.6,236.4l-0.3,0.3l-0.6,1.4l-0.1,0.7l-0.6,1.2l-0.3-0.2l-0.5,0.1l-0.1,0.4l0.2,0.5
                        		l0.3,0.2v0.4h-0.3l-0.3,0.2l-0.1,0.7l-0.7,1l-0.5,0.5h-0.3l-0.6-0.4l0.1-0.5l0.5-0.5l0.3-0.8l0.1-0.8l0.4-0.6l-0.3,0l-0.2-0.3
                        		l-0.3-0.9l0.1-0.5l0.7-0.5l0.7-0.3l0-0.7l0.2-0.2l0.7-0.3l0.3-0.5l1-0.8l0.5,0l0.3,0.3L686.6,236.4L686.6,236.4z M649.8,229.3
                        		l-0.6,0.3l-0.8-0.3l-0.4-0.4l0-1.2l-0.2-2.1l-0.5-1.4l0.1-0.3l1.1-0.3l1.8,3.4v1.1L649.8,229.3z M683.7,224.9l0.1,1l0.4,1.1
                        		l-0.6,0.1v0.3l1.3,0.7l0,0.3l-0.2,0.3l-0.4,0.1l-0.8-0.3l0,0.5l0.4,0.3l0.1,0.2l-0.1,0.4l-0.3,0.1l-0.4-0.1l-0.6-0.5l-0.2,0.1v0.3
                        		l0.9,0.7l0.2,0.4l0.6,0.3l0.4,0.6l-0.4,2.3l-0.3,0.9l-0.7,1.1l-1.3,0.7l-0.5-0.1l-0.2,0.2l0.4,1l0.5,0.3l-0.1,0.5l-1.1,1l-0.9-0.3
                        		l-0.3,0.2l-0.2,0.6l0.1,0.3l0.5-0.2l0,0.5l-0.6,1l-0.7,0.5l-1.3,1.5l0,0.7l-0.5,0.6l-2,0.9l-0.3,0.3l-0.5-0.1l-0.4-0.9l-0.3-0.3
                        		h-0.7l-0.8-1.3v-0.4l0.2-0.2l0.4-1.5l0.2-3.1l0.3-0.8l0-0.4l0.3-1l-0.1-1.8l-0.4-1.5l0.7-0.1l-0.4-1.2l0.2-0.6v-0.5l0.4-0.4
                        		l0.2,0.2v0.3l0.3,0l0.5-0.3h0.5l0.1,0.7l0.2,0.2l0.3-0.1l0.5-0.5l0.5-1.3v-0.2l-0.5-0.3l0-0.3l0.2-0.3l0.5-0.4l0.1-0.3l0.4-0.3
                        		l0.3-0.6l-0.1-0.2l-0.3-0.1l-0.5,0.3l-0.7-0.6l-0.8-0.1l-0.5-0.5l0.1-0.3l0.6-0.7l1,0.6l0.4,0l1.3-1l0.6-1.6l0.8-0.5l0.1-0.6
                        		l-0.2-0.9l0.2-0.5l0.9-1.2l0.6-0.2l0.4,0.2l1,1.6l0.5,0.4l0,0.3l0.4,0.7l0,1.1l0.8,1.1l-0.1,0.5L683.7,224.9L683.7,224.9z M653,228
                        		l-1.8,2.4l-0.2-0.1l0-0.3l1.6-5l0.3-0.6l0.6-0.6l2.2-5.6l0.4-0.2l0.6,0.1l0.3,0.7l-1.3,4.4l-0.5,0.6l-0.8,0.5l-1.2,1.6l-0.3,1
                        		L653,228z M576.3,189.3l-2.1,0.4l-0.1-0.1l0.3-0.6l0-1l0.5-0.4l1.2,0.1l0.9,0.9l0,0.2L576.3,189.3z M578,187.6l0.8,0.3l0.4-0.6
                        		l0.3,0l0.3,0.8v1.2l-1.4,0.2l-0.2-0.1l-1.2-1.7l0-0.3l0.2-0.2l0.3,0L578,187.6L578,187.6z M573,189.4l-0.6,1.2l-1,0.8l-2.1,0.6
                        		l-0.4,0l1.8-1.7l0.2-0.4l-0.3-0.1L567,192l-0.8-0.1l-0.4-0.5l0-0.8l0.9-1l1.1-0.7l2.7-0.5l0.8-0.9l0.7-0.3l0.5,0.1l0.6,0.3l0.2,0.2
                        		L573,189.4L573,189.4z M560.9,184.9l-1.9-0.6l-0.7-0.7l0.8-0.6l0.8,0.1l0.9,0.9l0.5,0.7L560.9,184.9L560.9,184.9z M563.3,183
                        		l-1.7,0l-0.6-0.5l1.2-1.1l0.8-0.1l0.6,0.5l0,1.1L563.3,183L563.3,183z M549.8,181.1l1.9,1.2l0.2,1l-1-0.1l-0.2,0.4l0.2,0.7l0.8,0.7
                        		l0.5-0.2l0.3-0.3l2,0.7l-0.4,4.1l-0.3,0.6l-0.5,0.2l-0.7-0.2l-0.7,0.2l-1.5,0.6l-2.6,1.4l-3,0.9l-3.2-1.1l-2.2-1l-2.4-1.6l-3.4-3.3
                        		l-0.5-1.3l-0.1-2.9l0.3-0.6l1.2-0.8l0.4,0.1l0.4,0.6l0.6,0.5l0.6,0l0.5-0.8l0.7-0.4l2.3-0.6l5.5-0.2l1.5,0.3L549.8,181.1
                        		L549.8,181.1z M598.3,177.1l3.9,1.5l1.2,0.1l4.3-0.4l0.7,0.2l3.7,2.6l0.7,1.8v1.4l0.3,0.9l0.5,0.5l1.2,0l0.8,0.2l0.6,0.6l0.8,2.4
                        		l-0.1,0.6l-0.6,0.9l-0.3,2.5l0.2,0.8l-3.7-1.4l-1-1.1l-2.8-1.6l-4.6-1.5l-2.5-1.3l-0.6-0.7l0-0.9l-0.8-0.6l-0.4-0.1l-4.1-0.3
                        		l-2.3-0.3l-0.3,0.3l0.1,0.5l0.7,0.9l0.2,0.6l-0.3,0.6l-0.5,0.1l-3.7-0.9l-1-0.1l-1.6-0.6l-0.8-0.5l-2.9,0.1l-0.3-0.3l0.2-0.4
                        		l0.7-0.6l0-0.7l-0.7-0.5l-0.9-0.1l-1.9,1.2l-1.5,1.4l-0.3,0.5l-1,0.9l-2,0.4l-0.5,0l-0.7-0.3l-0.5-0.4l-1.8-2.6l-1.5-1l-0.6-2.4
                        		l-0.7,0l-0.8,0.8l-0.6,1.5l-0.3,2.2l-0.5,0.6l-0.4,0.1l-0.9,1.7l-0.3,1.4l-0.2-0.3l-0.3-1l0.5-1.1l0.1-1.3l-0.9-1.4l-0.5-1.4
                        		l2.2-1.7l3.3-4l4,0.1l2.8-0.1l5,0.2l2.1-0.5l0.9-0.7l0.4,0l0.3,0.2l0.1,0.4l0,1.4l0.5,0.6l0.5,0.3l1.4-0.3l2.3-1.5l0.3-0.3l0.2-0.7
                        		l0.5-0.2l2.1-0.1l1.8,0.5l2.5,1L598.3,177.1L598.3,177.1z"/>
                        </g>
                        <g id="id-mu" class="click-point" onclick="window.location='region?r=maluku'" onmouseover="popUp('id-mu')">
                        	<path d="M533.9,169.6l-0.5,0.1l-0.5-0.3l-0.5-0.6l-0.3-0.7l-0.3-1.6l-0.9-1.3l-0.6-2.5l0.4-1.1l0.3-0.4l0.4-0.2l0.6,0.1l0.8,0.7
                        		l0,0.4l-0.5,1.5l0,0.6l2,4.5L533.9,169.6L533.9,169.6z M522.9,158.1l3.8,0.3l1.3-0.2l0.5-0.3l3.9-0.1l6.2,0.5l-0.3,0.4l-1.4,0.6
                        		l-4.7,0.5l-8.9,0.6l-2.1-1l-0.1-0.2l0-0.8l0.6-0.7l0.6-0.1l0.2,0.4L522.9,158.1L522.9,158.1z M514.6,156.3l1,0.3l1.8-0.5l3,0.7
                        		l0.5,1l0,1.7l-0.4-0.1l-2.4-0.1l-1.8,0.3l-0.5,0.2l-0.1,0.6l-0.4,0.1l-2.5-0.8l-1.2,0.3l-1.6,1l-2,0.6l-0.9,0.2l-2,0.1l-1.3-2.3
                        		l0-1.1l0.7-2.1l0.5-0.6l2.3-0.5l1.8,0L514.6,156.3L514.6,156.3z M565.2,151.6l4,2.3l0.5,0.4l0.3,0.5l0,0.4l-0.4,0.8l-0.8,0.5
                        		l-0.5,0.1l-6.1-0.5l-1.1,0.7l-1.7,0.3l-1.9-0.9l-0.7-0.5l-0.3-0.4l0.3-1l-0.1-0.5l0.2-1.1l0.4-0.7l0.3-0.3l0.3,0.3l2.9-1.8l1.6,0.3
                        		L565.2,151.6L565.2,151.6z M560.6,148.7l-2.1,0.2l-0.7-0.4v-0.2l0.9-0.8l0.7-0.2l1.8,0.7L560.6,148.7L560.6,148.7z M555.5,140.7
                        		l-0.7,0.2l-2-0.5l-0.1-0.2l0-0.5l0.6-1.8l0.2-0.2l0.4-0.1l0.5,0.1l0.7,1.2L555.5,140.7L555.5,140.7z M559.8,132.6l1.9,2.5l-0.3,0.9
                        		l-0.7,0.7l-0.4,0.8l0.1,0.5l0.7,1.1l0.5,0.3l0.6-0.4l1.2-0.2l1.1,0.5l0.8,1l-0.1,0.5L564,142l-1.1,0.3l-1.4-0.6l-1.2-1.5l-2.1,0.9
                        		l-0.4-0.1l-0.3-0.6l-0.6-2.7l-1.7-1.8l-0.2-1l0.5-2l0.9-0.2l0.7,0.6l1.2-0.3l0.9-0.7L559.8,132.6L559.8,132.6z M553.1,136.2
                        		l-1.2-0.1l-0.2-0.4l0-3.5l0.7-0.5l1.6-0.2l0.4,0.5l0.4,1.7l-0.5,2L553.1,136.2L553.1,136.2z M565,96l0.5,0.2l0.3-0.1l0.4,0.1l1,0.9
                        		l0.3,0.5l0.4,3.3l-0.8,3l-1.4,2.5l-1.3,1.1l-3.2,2.2l-0.4,0.6l0,1l0.4,0.7l1.7,1.2l0.7,0.3l0.9-0.1l1.3-0.9l0.2-2.3l0.8-1.3
                        		l1.1-0.8l0.9-0.1l0.8,0.1l0.6-0.3l0.5-1l-0.2-0.5l-0.3-0.3l-0.4-0.1l-0.2-0.8l1-1.6l3.2-2.2l1.2-0.5l1.8-0.5l1.4-0.2l1,0l0.4,0.1
                        		l0.3,0.2l-0.5,7.8l-0.6,0.7l-3.8,2.2l-2.5,0.7l-1.5,1.5l0,0.4l0.4,0.8l1.1,0.9l0.9,0.5l4.1,1.5l0.8,0l0.8,0.2l0.3,2.5l-0.2,0.9
                        		l0.7,0.5l1.9,0.5l0.8,0.6l0.5,1l-0.9-0.7l-0.7-0.3l-4.7-1.1l-1.6-1.3l-1.6,0l-1.4,0.2l-1.1-0.3l-0.6-0.3l-0.3-0.5l-1.5-0.3l-2-0.2
                        		l-0.6,0.4l-0.3,0.3l-0.5,2.3l0.5,0.4l0.3,2.4l-0.7,1.1l0,1.3l2.6,6.8l1,1.9l0.8,1l1.3,2.2l3.3,3.2l-2.1-0.1l-0.5-0.2l-0.4-0.4
                        		l0.1-0.4l-1.7-1.3l-1.5-0.6l-0.5-0.4l-1.4-3l-1.4-2.4l-2.4-1.4l-1-1.5l0.6-4.8l-0.2-2.2l-0.5-2.5l-0.7-0.4l-0.8-0.9l-0.8-2.3
                        		l-0.1-0.9l0.4-2l0.7-0.8l0.5-1.1l-0.1-0.5l-1.8-0.6l-0.2-0.3l0.3-1l-0.5-1.6l-1.4,0.3l-0.1-0.4l0.1-2.6l2.2-3.9l0.1-1l-0.2-0.4
                        		l0.8-3.8l2.1-3.2l3.8-4l0.7-0.6l1.8,0l-0.2,1.1l-1.6,2.4l-0.4,0.5l-0.5,0.2l-0.7,0.6l-0.1,1.6L565,96L565,96z M575.9,91.8l-1.9,0.1
                        		l-1.9,0.5l-0.5-1.4l-0.3-2.5l0.1-1l1-1.9l1-1.2l1.5-1.5l2.2-1.1l0.3,0.1l1.9,2.6l0.2,0.8L578,89l-0.9,1.6l-1,1.1L575.9,91.8
                        		L575.9,91.8z"/>
                        </g>
                        <g id="id-nb" class="click-point" onclick="window.location='region?r=nusatenggarabarat'" onmouseover="popUp('id-nb')">
                        	<path d="M416.3,272l0.1,0.3l0.7-0.3l0,0.2l0.3,0.3l-0.3,0.4l-0.3-0.2l-0.1,0.3l-0.2,0.1l-0.1-0.2l-0.1-1l0.2-0.1L416.3,272
                        		L416.3,272z M372.2,271.3l0,0.4L372,272l-0.1,0.7l-0.6,0.5L371,275l-1.6,2.4l-0.2,0.6l-0.8,1l-0.1,0.6l0.6,0l0.5,0.4l0.4,0.1
                        		l-0.5,0.6l-0.6,0.2l-0.1-0.2l-0.2,0l-0.5,0.3l-0.6,0l0.5-1.5l-0.9,0.2l-0.4,0.4l0.1,0.5l-0.1,1l-0.4,0l-0.2-0.4l-1.2-0.4l-0.4,0.1
                        		l-1.1-0.2l-0.3,0.2l-0.4-0.1l-0.1-0.8l-0.3,0l-0.9,0.2l-0.3,0.2l-0.4-0.1l-0.3-0.2l-0.2,0l-0.1,0.4l-0.3,0.1l-0.6-0.4l-0.5-0.6
                        		l-0.4,0.1l-0.5-0.2h-0.6l-0.4-0.4l-0.2-0.6l0.4-0.8l0.4-0.1l0.1,0.4l0.8,0.4h0.3l0.6-0.6l0.4,0l0.5,0.3l0.3-0.2v-0.2l0.3,0l0.3-0.3
                        		l0.1-1.6l0-1.6l-0.5-0.5l-0.2-0.8l0.5-0.6l0.8-0.5l0.1-0.5l0.3,0.1l0-0.1l1-0.4l0.5-0.8l0.9-0.7l1.6-0.6l1.1,0.1l0.8,0.3l0.5,0.3
                        		l2.4,0.5l1.4,1.1L372.2,271.3L372.2,271.3z M387.2,267.7l1.1-0.1l0.4,0.3l0.1,0.2l-1.3,0.9l-0.8,1.8l-0.7,1l-1-0.6l0.6-1.2
                        		l-0.2-0.4l-0.2,0l0.1-0.6l-0.1-0.7l0.6-0.5l0.7-0.3L387.2,267.7L387.2,267.7z M412.8,269.5h-0.7l-0.5-0.4l0-0.9l0.3-0.5l0.5-0.4
                        		l0.8,0.1l0.4,0.4l0.1,0.5l-0.3,0.7l-0.4,0.5L412.8,269.5L412.8,269.5z M393.5,266.8l1.1-0.1l0.4,0.2l0.5-0.1l1.3,0.5l0,0.9l0.3,1
                        		l0.5,0.5l0.2,0l0.4,1l1.2,0.6l0.3,0l0.4-0.4l0.7-0.2l0.3-0.6l1.1-0.9h0.7l0.3,0.3l0.9,0l1.5,0.5l0.5,0.9l0.1,0.5l-0.1,1.6l-0.4,0.6
                        		l0.1,0.4l0.6-0.2l0.2-0.4l0.1-0.8l-0.3-0.4l0-0.4l0.5-0.9l0.3-0.4l1-0.7h0.4l0.2,0.2l1-0.1l1.6,0.4l-0.2,0.7l0.1,0.5l1,1.4l0,1
                        		l-0.5,0.3l0.1,0.4l-0.2,0.2l0.4,0.6l0,0.8l0.3,0.2h0.4l0.4-0.3l0.5-0.1l-0.4-0.6l0.4,0l0.3-0.1l0.1-0.4l0.3-0.2l0.3,0.5l-0.1,0.7
                        		l-0.3,0.5l0.1,1.1l-0.6,0.5l-0.4-0.1l-0.3,0.1l-0.9-0.3L411,278l-0.5-0.6l-0.6-0.4l-0.5,0.2l-0.1,0.4l-0.3,0l-0.8-0.3l-0.6,0
                        		l-0.2-0.2l-0.4,0.2l-0.2,0.4l-0.5,0.3l0.1,0.1l0.5,0.2l2.8,0l0.8,0.5l0.2,0.5l-0.4,0.3l-1.4,0.2l-0.5-0.1l-0.8-0.5l-0.9-0.2
                        		l-1.2,0.2l-2.2,1l-1.1,0.3l-1.3-0.5l-0.3-0.7l0.1-0.6l0.6-0.8l0.1-0.4l-0.1-0.3l0.3-0.4l-0.2-0.5l-0.3-0.4h-0.1L401,276l0.1,0.5
                        		l0.1,0.1l-0.1,0.3l-0.3,0.2l-0.4-0.1l-0.4,0.6l-0.6,0.3l-0.1,0.5l-0.5,0.1l-1.4,1.4l-0.9,0.4l-0.8-0.6h-0.3l-0.3,0.2l-0.7,0
                        		l-0.3,0.6l-0.5,0.3h-0.4l-1.1,0.6l-0.6-0.2l-0.2-0.2v-0.3l-0.6,0.2l-0.1,0.3l-0.5,0l-0.3-0.3h-0.3l-0.5,0.1l-2.4,1.4l-2.4,0.8
                        		l-1.3,0.1l-1.6-0.5l-1,0l-1,1l-1.7,0.4l-1-0.4l-0.3-0.4l-0.6-0.1l-0.4,0.3l-1.9-0.7l-0.8-0.5l-0.3-0.5l0.2-0.3l0-0.4l-0.1-0.2
                        		l0.2-0.9l0.3,0l0.2-0.2l-0.1-0.4l0.8-0.1l-0.1-0.5l-0.6-1l0.3-0.2l-0.4-1l0.7-1.4l0.5-0.1l0.1-0.2l-0.2-0.8l0.5,0.3l1.6-0.3
                        		l2.3-1.6l0.7-0.9l0.5-0.1h0.3l1,0.6l0.2,0l3,1.2l0.2-0.5l0.5-0.4l0.6-0.2l0.5,0.1l1.2-0.1l0.3,0.3l0.4,0l0.5,0.5l0.6,0l0.3,1
                        		l-0.1,0.3l-0.6,0.2l-0.1,0.2l0.2,0.3l0.5,0.2l0.9-0.1l-0.3-1.3l0.4-0.1l0.4,1l0.5,0l0,0.5l-0.8,0.1l0.3,0.4l-0.1,0.6l0.3,1.2
                        		l0.3,0.5l1.5-0.3l1.3,0.5h0.4l1.5-1.2l1.4-0.3l0.7,0.1l0.4,0.4l1.6-0.6l-0.2-0.8l-0.4-0.1l-0.1-0.4l-0.6-0.1l-0.1,0.3l-0.4-0.6
                        		l-0.6-0.4l-0.3-0.5l-0.4,0.1l-0.5-0.7l-1.7,0.2l-2.9-1.9l-0.8-1l-0.9-0.8l-0.2-0.4l0.3-1l1.1-0.8l0.7,0l1.7-0.8L393.5,266.8
                        		L393.5,266.8z"/>
                        </g>
                        <g id="id-nt" class="click-point" onclick="window.location='region?r=nusatenggaratimur'" onmouseover="popUp('id-nt')">
                        	<path d="M487.5,308.5l0.7-0.1l0.1,0.2l-1.2,1.4l-0.4,0.1l0.1,0.2l1,0.1l0.2,0.8l-0.5,0.6l-0.9,0l-0.6,0.3l-0.3,0.4l-0.8,0.3
                        		l-0.2,0.3l0.1,0.4l-0.4,0.9l-0.3-0.1l-0.4,0.2l-0.5-0.3l-0.4,0l-0.5,0.3l-0.4,0.5l-1.8,0.1l-0.6,0.4l0.3,0.3l-0.3,0.5l-0.4,0
                        		l-0.1-0.3l-0.5,0l-0.1-0.2l-0.6,0.1l-0.1,0.4l-0.5-0.3l-0.1-0.5l0.1-0.8l-0.5-0.9l0.1-0.4l0.9-0.4l0.6,0l0.6-0.3l0.7,0.1l0.4-0.2
                        		l0.8-0.1l1.4-1.4l0.5,0l0.5-0.3l0.2-0.6l0.4,0l-0.1-0.4l0.8-0.9l1.7-0.8l0.2-0.8l0.6,0.6l-0.3,0.2L487.5,308.5L487.5,308.5z
                        		 M462.7,307.4l0.7,0.1l0.2,0.2l-0.2,1.3l-0.3,0.4l-0.6,0.2l-0.6,0.6l-0.7,0.5l-0.6,0.1l-0.5-0.3l-1,0.1l-1.1-0.7l2.6-1.5l0.2-0.8
                        		l0.4-0.3l0.7-0.2L462.7,307.4L462.7,307.4z M488.9,302.6l0.5-0.1l0.1,0.5l-0.8,0.3l-0.1,0.4l-0.4,0.2l-0.2,0l0-0.3l-0.4,0l0,0.4
                        		l0.3,0.1l0.1,0.3l-0.1,0.3l0.1,0.3l-0.4-0.1l0.1,0.3l0.2,0.1l-0.1,0.4l-0.4,0l-0.1-0.5l-0.2,0l-0.4,0.1l-0.3,0.5l-0.1,0l-0.3-0.4
                        		l0.1-0.5l-0.1-0.3l0.4-0.6l0.5-0.3l0.5-0.9l0.1-0.6l1-0.4l0.2,0.3L488.9,302.6L488.9,302.6z M429.2,289.2l0.4,0.3l0.5,0.9l0.4,0.4
                        		l0.5,0.1l1-0.2l0.3,0.1l0.4,0.6l0.1,0.5l0.1,1.2l0.4,0.5l0.7,0l0.4,0.5h0.2l0.7-0.4l1.7-0.4l0.5,0.5l0.1,0.4l1.7,0.9l0.3,0.9
                        		l1.2,2.2l1,0.4l1.1,0.6l0.5,0.7l0.3,1.1l-0.2,0.8l-0.7,0.6l-0.5,0.1l-0.6,0.9l-0.9,0.6l-0.6,0l-0.4,0.4l-1-0.2l-0.5,0.1l-0.9,0.5
                        		l-0.1,0.4l-0.3,0.3l-0.3,0l-0.8-0.5l-0.6-0.5l-1.5,0l-0.7-0.1l-0.4,0.1l-1.1-0.5l-0.7-0.7l-0.4-0.1l-0.7-0.9l-0.4-0.1l-0.1-0.1
                        		l0.2-0.4l-0.3-0.6l-1-1.2l-0.7-0.2l-0.1-0.3h-0.5l0-0.5l-1.3-0.2l-0.3,0.1l-0.3-0.5l-1.2-0.8l-0.3-0.3l-0.3-0.8h-0.3l-0.3,0.2
                        		l-0.2-0.4l-0.5-0.2l-1.2-0.2l-0.8-0.3l-0.9,0.4l-0.3,0.5l-1-0.5l-0.4,0.1l-0.2-0.4l-1.5-0.1l-0.6,0.1l-0.1-0.1l-2-0.7l-0.4-0.3
                        		l-1-1.4l-0.7-0.5l-0.3-0.5l0.6-1.1l0.6-0.5l0.7-0.4l1.5-0.4l1.1-0.7l0.3,0.1l0.3,0.3l1-0.5l0.5-0.1l0.8,0.3h1.1l0.9-0.3l1.3,0.3
                        		l0.8-0.5l1,0l0.7,0.5l1,0.2l0.3-0.1l0.6,0.3l0.6-0.5l1.2-0.7l0.6-0.8l0.2,0l0.5,1L429.2,289.2L429.2,289.2z M514.3,281.6l0.2,0.1
                        		l-0.3,0.6l0,0.5l0.2,0.4l0.5,0.3l0.5,0l0.7-0.5l0.6-0.2l0.3-0.3l0.3-0.6l0.4,0.5l0.3,0l0.6,0.5l0,0.9l-0.3,0.9l0.2,0.8l-0.7,0.1
                        		l-0.6,0.4l0,0.1l-0.7-0.6l-1,0l-0.3,0.6l0,0.4l0.3,1.1l1,0.7l0,0.6l0.5,0.6l0.2,1.2l0,0l-0.9,0.6l-0.8,0.9l-0.2,1.6l-0.5,0.6
                        		l-1.1,0.5l-0.5,0.5l-1.5,1.9l-0.6,1l-0.7,0.3l-0.8,0.8l-1.9,1.1l-0.6,1.4l-1.4,1.1l-0.6,0.3l-0.5,0l-3.4-0.3l-0.5,0.1l-0.5,0.2
                        		l-0.5,0.5l-0.2,0.4l-0.8,0.5l-0.3,0.4l-1,0.1l-1.2,0.5l-0.3,0.3l-1.3,0.4h-0.8l-0.9,0.2l-0.5-0.3l-0.3,0l-0.7,0.4l-0.3-0.4l-1-0.4
                        		l-1.4,0.5l0-0.5l0.2-0.2l0.4-0.8l-0.1-0.7l0.6-0.2l0.1-0.7l1.5-0.6l0.6,0l0.5-0.4l1-0.4l0.5-0.9l-0.2-0.3l-1-0.4l-0.3,0.1l-0.6-0.1
                        		l-0.4,0.2l-0.2,0.4l-0.3-0.1l-0.1-0.2l0-1.8l0.4-0.5l0.3-0.1l0.3,0.1l0.4-0.5l0.1-1.1l-0.5-0.7l0.5-0.2l0.2-0.4l0-0.6l-0.2-1.2
                        		l1.2-1.2l0.8-0.3l0.1-0.6l0.3-0.3l0.2,0l0.5-0.4l0.6-0.2l0.3-0.6l0.5-0.2l0.1-0.3l0.4-0.3l0.2-0.4l0.3-0.3l0.9-0.1l0,0l0.9,1.2
                        		l0.5,0l0.3,0.3l0.4-0.1l0.2-0.5l0.7-0.4l0.2,0l0.8,0.8l0.3,0.6l-0.1,0.9l1.2-0.3l0.2-0.5l-0.2-0.5l0.5-0.7l-0.1-0.3l0.1-0.3l0.2,0
                        		l0.3-0.4l0.5-0.1l0.1-0.4l0.3-0.1l-0.1-0.6l0.2-0.4l0-0.6l0.2-0.2l0-0.3l0,0l0.5,0.1l0.9-0.1l0.9-0.3l1.5-1.2l0.1-0.6l0.8-0.1
                        		l1-0.7l1.1-0.2l0.5-0.5L514.3,281.6L514.3,281.6z M425.3,279.3l-0.4,0l0-0.3l0.3-0.3l0.3,0.1L425.3,279.3L425.3,279.3z M423.1,279
                        		l0,0.1l-0.6-0.2l0.4-0.2L423.1,279z M422,276.4l-0.2,0.1l-0.1-0.1l-0.3,0l-0.1,0.3l0.3,0.3l-0.2,0l-0.4-0.4l1.1-0.7l0.1,0.1
                        		L422,276.4z M422.7,275.6l0.3,0l0,0.6l0.2,0.7l0.1-0.2l0.5,0l0-0.2l-0.3-0.4l0.4,0.1l0.2-0.5l0.4,0.1l0.4-0.2l0.5,0l0.2,0.2
                        		l-0.1,0.6l-0.7,0.1l-0.1,0.4l-0.2,0.2h-0.2l0-0.2l-0.2,0l-0.2,0.4l-0.1,0.4l0.5,0.2l0.1,0.3l0,0.3l-0.6,0.7l-0.3,0l0-0.3l-0.3-0.3
                        		l-0.7,0.3l-0.2-0.7l0.3-0.9l0.2-0.1l0.4,0.1l-0.1-0.5l-0.2,0.2l-0.1-0.1l0.2-0.1l0-0.4l-0.4-0.8l0.3-0.1L422.7,275.6L422.7,275.6z
                        		 M470,272.4l0.6,0.3l0.1-0.2l0.1,0.2l-0.1,0.5l-0.4,0.4l-0.6-0.2l-0.4-0.4l0-0.5L470,272.4L470,272.4z M419.7,272.8l0,0.5l0.2,0.1
                        		l1.1,0.2l0.4-0.2l0,0.6l0.1,0.3l-0.1,0l-0.2-0.3l-0.1,0.2l0.2,0.3v0.7l0.2,0.1l-0.9,0.1V275l-0.4-0.1l0,0.3l-0.3,0.3l-0.4,0
                        		l0.2,0.4l0.3,0l0.2-0.2l0,0.1L420,276l0,0.1l-0.1,0.2l-0.4-0.1l-0.3,0.5l0.4,0.5l-0.1,0.4l0.4,0.2l-0.5,0.3l-0.6-0.5l-0.5,0.2
                        		l0.1-0.5l0.4-0.3l0.1-0.6l0-0.2l-0.4-0.3L418,276l0.2-0.5l-0.3-0.3l0.3-0.5l0.2,0l0.4-0.2v-0.4l0.2,0l0-0.2l-0.3-0.1l0.4-0.3l0-0.2
                        		l-0.2-0.1l0-0.5l0.5,0.1l0.1-0.4L419.7,272.8L419.7,272.8z M483.5,272.4l0.1,0.3l-0.3,0.3l-1.3,0.5l-0.5,0l-0.4-0.2l-0.7,0.6
                        		l-0.8,1.5l-0.5,0.3l-0.4,0l-0.3-0.5l0.3-1l1.1-0.6l0.1-0.5l0.4-0.4l0.4,0l0.4,0.2l0.3-0.2h1.4l0.4-0.2L483.5,272.4L483.5,272.4z
                        		 M458.6,270.2l0.2,0l0.2,0.5l-0.1,0.3l-0.3,0.1l-0.8-0.3l-0.2,0.1l-0.1-0.1l0.2-0.1l0.2-0.6l0.3-0.1L458.6,270.2L458.6,270.2z
                        		 M484.4,269.1l0.1,0.1l0.2-0.3l0.2,0l0.4,0.3l0.6,0l0.6,0.3l-0.3,0.5l-0.2,0.1l0.1,1l-0.3,0.6l-1,0.1l-1-0.2l-1.9,0.4l-0.4-0.2
                        		l-0.8,0.1l0-0.7l0.6-1.1l1.2-0.7l0.7-0.6l0.7,0.1l0.4-0.3l0.1,0V269.1L484.4,269.1z M502.6,271.1l-0.8,1l-0.1,1.1l-1.3,1.2l-1,0.1
                        		l-0.2-0.2l0.2-0.8l-0.5-1.3l-0.8,0l-0.7,0.5l0,0.2l-0.6-0.2l0-0.2l0.5-0.5l0.3-1l1.6-0.9l0.5,0.3l0,0.7l0.2,0.1l0.4-0.1l0.6-0.7
                        		l0.2-0.5l0.7-0.4l0.7-1.2l0.4-0.4l0.6,0l0.2,0.2l0.1,0.4l-0.4,0.8l0.1,1l-0.2,0.4L502.6,271.1L502.6,271.1z M495.3,268.6l1,0.1
                        		l0.4,0.6l-1.5,0.5l-0.6-0.2l-0.7,0.3l-0.4,0.5l-0.1,0.5l-0.6,0.6l-0.1,0.3l-0.4,0.5l-0.4,0l0-0.3L492,272l-0.4,0l-0.5,0.6l-0.5,0.2
                        		l-0.1,0.4l0.4,0.5l0.1,0.5l-0.5,0.6l-0.6,0l-0.3-0.7l-0.2-0.1l-0.7,0.3l-0.5,0.7l-0.4,0.1l-0.8-0.3l-0.2-0.4l-0.5-0.3l-0.4,0.4
                        		l-0.9-0.1l-0.2,0.2l-0.4-0.3l0-0.4l0.4,0l1.3-1.1l0.4-0.9l0.8-0.3l0.2-0.2l0.8-0.1l0.6-0.4l-0.7-0.8l-0.4-0.1l-1,0.2l0.6-0.7
                        		l0.5-0.2l0.3,0.2l0.6,0.1l0.5-0.5l0.6-0.1l0.6,0.1l0.1,0.1l-0.2,0.3l-0.1,0.5l-0.8,0.9l0,0.3l0.9,0.3l0.7-0.6l0-0.3l-0.3-0.1l0-0.4
                        		h0.5l-0.1,0.4l0.1,0.2l0.6-0.5l-0.2-0.7l-0.4-0.1v-0.3l0.7-0.1l0.2,0.1l0,0.4l0.7,0.1l0.1-0.1l-0.1-0.5l1.5-0.9L495.3,268.6
                        		L495.3,268.6z M507,267.1l1.4,0.1l-0.2,0.3l0,0.7l0.3,0.2l0.8-0.5l1.7-0.3l1.3,0.3l1.5,0l0.8-0.4l0.8,0.2l0.6-0.1l0.9,0l0.7,1.4
                        		l-0.1,1.1l0.1,0.5l-0.4,0.3l-0.9,0.3l-3,0.1l-1.6,0.6l-1.1,0.1l-1.4-0.2l-1.1,0.7l-0.9,0.2l-0.3-0.3l-0.6-0.1l-1.2,0.7l-0.2,0
                        		l-0.1-0.3l-0.9,0.1l-0.4-0.4l0-0.4l0.1-0.3l1-1.1l0-0.4l0.4-0.1l0.8-0.6l0.6-0.1l0.5-0.3l-0.2-0.1l-0.7,0.1l-1.6,0.8l0.1-0.5
                        		l-0.2-0.4l1-1.3l0.4-0.4L507,267.1L507,267.1z M479.5,266.8l0.8,0.5l0,0.4l-0.2,0.6l0.3,0.3l0,0.6l0.7,0.7l0,0.4l-0.7,0.7l-0.3,0
                        		l-0.7-0.4l-0.2,0.1l-0.6,0.9l0.2,0.6l-0.1,0.6l-0.5,0.1l-0.5-0.4l-0.6-0.2l-0.2,0.1l0.1,0.9l0.9,0.9l0,0.6l-0.2,0.4l-0.9,0.3
                        		l-0.8,0L476,276l-0.2-0.2H475l-0.8,0.5l-0.3-0.1l-0.2,0.2l-0.5,0.1l-0.6,0.7l-2,0.6l-0.8,0.1l-0.5-0.2l-1.1,0.3l-0.7-0.2l-0.7,0.1
                        		l-0.4-0.3l-1,0l-0.4,0.1l-0.3,0.4l-0.2,0l-0.5,0.5l-1.9,0.7l-1,0l-0.2,0.3l-1.2,0.5l-0.9-0.1l-0.5-0.4l-0.5-0.1l-0.2,0.1l0.1,0.5
                        		l-0.1,0.4l-0.3,0.1l-0.3-0.1l0.3-1l-0.6-0.2l-0.5-0.4l-0.7,0.1l-2.5-0.3l-0.2,0l-0.2,0.6l0.1,0.9l-0.4,0.4l-0.6,0.2l-0.7-0.4
                        		l-1.4,0.1l-0.3-0.1l-1.6,0.6l-0.9,0.6l-0.4,0l-1.5-0.5l-0.9-0.8l-0.3-0.8l-0.2-0.1l-0.8,0.2l-0.3,0.8l-0.5,0.1l-1-0.4l-0.8-0.1
                        		l-0.9-0.9l-2.6,0l-0.8,0.1l-0.2-0.1l-1.2,0.6l-0.3-0.2l-0.3,0.2l-1.1-0.3l-0.8-0.8l-0.3,0l-2.2,0.6l-0.9,0.1l-0.4-0.1l-0.4,0.4v0.3
                        		l-0.2,0.1l-0.4-0.1l0.1-0.3l-0.2-0.1l0-0.5l-0.8-0.1l-0.1-0.3l-0.5-0.4l-0.1-0.4l0-0.3l0.1-0.4l-0.1-0.2l0.2-0.5l0-1.1l-0.2-0.1
                        		l0.1-0.3l0.5-0.5l0-0.1l0.5-0.2l0.3-0.4l0.1-0.5l-0.3-0.4l-0.1-0.4l0.4,0l0,0.6l0.3,0.1l0.1,0.2l0.5-0.3l0.2,0l0.4-0.4l0.5,0.5
                        		l0.2-0.4l-0.3-0.1l0-0.2l0.4-0.6l0.5,0l0.2-0.2l0.2,0l0.1,0.4l0.2,0.2l-0.2,0.4l0.4,0l0.2-0.4l0-1l0.6,0.3l0.3-0.4h0.1l0.3-0.7
                        		l0.2,0l0.5-0.1l0.2-0.3l0.5,0l0.7,0l0.8,0.2l0.7-0.3l0.1-0.5l0.2-0.2l0.5,0.4l0,0.3l0.4,0.2l0.9-0.3l0.5,0.3l0.7,0l0.2-0.2
                        		l-0.2-0.3l0.1-0.2l0.8,0.4l0.7,0.9l0.5,0l0.4,0.4l1.2-0.1l0.9,0.3l1.1,0l0.5-0.2l0.5,0.1l0,0.4l0.1,0.1l0.5,0v0.4l0.2,0.4l0.7-0.1
                        		l0.6,0.3l0.6,0l0.4,0.3l0.4-0.1l0.8,0.5l0.8,0.1l0.5,0.2l0.8,1.2l1.2,0.6l0.9-0.5l0.3,0.3l0.3,0.1l0.2,0.5l0.5-0.6l0.6-0.2
                        		l-0.3-0.2l0-0.4l0.2-0.1l0.6,0.4l-0.2-0.4l0.1-0.8l0.2-0.2l0.4,0.1l0,0.4l0.4-0.1l0.2,0.3l0.9-0.3l0.9,0.1l0.3,0.2l0.5-0.2l0.3-0.3
                        		l0.3,0.2l0.9,0l0.3-0.2l0.5-0.7l-0.1,0.5l0.5-0.4l0.5-0.1l0.2,0.1l-0.3,0.8l0.1,0.7l0.9-0.1l0.3,0.4l0.3-0.3l1,0.5l1.2,1.2l1.1,0.3
                        		l0.6-0.4l0.5-0.1l1.5-0.2l0.4,0.1l0.8-1l0-0.4l-0.6-0.5l0.2-0.3l1.1-0.3l0.3-0.5l0.3-0.1l0.1-0.5l0.3,0.1l0.3-0.3l0.5,0.1l1.2-0.5
                        		l0.5,0.1l0.8-1.1l1.1-0.1l0.4-0.2l0.4-1.1l0.4-0.3l-0.6-0.3l-0.6,0l-0.9,0.3l-0.4,0.7l-1-0.2l0-0.1l0.5-0.4l0.4-0.7v-0.8l0.8-0.2
                        		l0.6-0.5L479.5,266.8L479.5,266.8z"/>
                        </g>
                        <g id="id-pa" class="click-point" onclick="window.location='region?r=papua'" onmouseover="popUp('id-pa')">
                        	<path d="M755.6,272.2L753,272l-2.8-0.5l-0.4-0.2l-0.2-0.6l0.1-0.2l2.7-2.4l1.7-0.5l0.2,0l0.3,0.9l1.3,2.7l0,0.3L755.6,272.2
                        		L755.6,272.2z M750.7,269.4l-2.6,2.1l-1.3,0.6l-1.4,0.3l-0.5,0l-0.4-0.3l-0.7-0.2l-6-0.4l-2.8,0.7l-0.5,0.4l-0.5,0.1l-0.2-0.4
                        		l0.1-0.5l1.6-4.2l3.1-5.9l2-3l0.5-0.6l3-2.1l2.4-1l4.8-0.9l2.1,0.1l0.8,0.2l0.4,0.3l1.1,1.8l0.6,0.6l1.3,0.3l0.6,1l-1,2.7l-1.2,1.9
                        		l-0.5,2.7l-0.6,0.7l-1.2,1.1l-2,0.4L750.7,269.4L750.7,269.4z M751.1,242.9l0.6,0.5l1.3,0.2l0.8,1.2l-1,0.6l-0.8-0.3l-1.2-1.5
                        		l-0.1-0.5L751.1,242.9L751.1,242.9z M710.7,156.1l2.9,0.6l6,0.4l1.6,0.7l0.1,0.2l-0.4,0.5l-3.2,0.6l-2.5,0.8l-5.6-0.5l-4-1
                        		l-0.9-0.6l-1-0.4l-2.5-0.8l-1-0.2l-1.1,0.1l-2.1-0.3l-1.1-1.3l0.9-0.3l1.2,0.4l11.1,0.8L710.7,156.1L710.7,156.1z M755.2,160.8
                        		l1.2,0l2,0.7l6.3,2.9l6.5,3.4l1.8,0.3l2.5-0.3l1.3-0.6l1,0.1l0.2,0.5l0.7,0.9l1.9,0.9l0.9-0.2l0.1-0.3l1.7,0l2.7,0.4l1.6,0.6
                        		l0.3,0.3l0.1,0.4l-0.3,0.6l-0.5,0.5L787,172l0.5,0.4l1.7-0.5l2.5-0.1l0.6,0.1l0.1,0.1v64.1l-0.7,0.1l-0.7,2l0.4,0.5l-0.1,0.3
                        		l-0.9,1.8l-0.5,0.5l-0.1,0.8l0.2,1.9l0.5,1.2l0.8,0.8l0.5,0.1l0.4-0.2l0,38.8l-1.1-0.7l-1.2-0.3l-0.6-0.4l-1.5-1.9l-2.6-2.4l-1.8-3
                        		l-4.8-4.1l-3.1-2.3l-1.2-1.3l-0.2-0.3l0.1-0.7l1.4-1.1l1.3-2.3l0.2-0.9l-1.6,0.7l-0.3,1.2l0,1l-1.3,0.7l-0.9,0.3l-3.5,0l-1.6,0.2
                        		l-1.6,0.9l-1.9,0.5l-0.9,0l-0.7-0.1l-0.9-0.5l-1-1.4l-2.3,0.9l-1.9,1.4l-0.6,1.3l-0.5,0.1l-1.1-2l-0.2-0.9l1.2-1.6l0.1-2.2l0.2-0.2
                        		l1.2-0.6l0.2-0.8l0-1l0.9-2.2l0.7-0.7l0-0.5l-0.4-0.4l-1.1-0.4l-1.3-0.9l-0.6-1.4l-0.6-0.8l-1.7-1.1l-1.6-0.8l-0.2-0.4l0.2-0.1
                        		l4.5,0.2l1,0.6l1,0.2l2.2-0.2l0.8-1.3l-0.8,0.4l-0.3,0.3l-2.1,0.2l-3.4-1l-1.7-0.8l-2.9-2.6l-0.3-0.4l0-0.6l0.6-0.5l0.8,0l1,0.3
                        		l0.7,0l1.1-0.7l1.8-0.2l1.3,0.4l1.1,1.1l1,0.6l0.5,0.1l0.9-0.2l-1-0.2l-0.7-0.4l-1.2-1.1l-0.5-0.3l-0.8-0.3l-1-0.1l-3.5-1.8
                        		l-0.3-1.1l0.7-0.2l-0.5-0.7l-3.4-3.2l-0.8-1l-0.5-1.1l-0.3-1.1l0-0.9l-0.5-1.4l-1.2-2.2l0-2l-1.5-0.4l-0.8-0.7l0.4-0.6l2.8-1.4
                        		l-0.2-0.1l-0.5,0l-1.6,0.3l-1,0.6l-1.3,0.4l-0.3-0.1l-0.3-1.8l0.4-3.3l-0.1-0.5l-0.5,0.9l-1.5-0.6l-3-1.9l-0.5-0.6l-1.5-1l-0.9-0.3
                        		l-0.6-0.4l-0.1-0.2l0.4-0.4l-1.3,0l-1.9-0.9l-1.8-1.3l-0.6-0.7l-1,0.4l-3.6-1l-3.1-0.4l-0.4-0.4l-2.9-1.3l-4.7-2.5l-1.8,0l-3.9-1.6
                        		l-0.5-0.4l-0.6-0.9l-0.8-0.3l-2.2-0.1l-1.3,0.2l-5.2-1.1l-1.7,0.1l-1.7,0.4l-1-0.3l-3.7-2.1l-1.6-0.7l0,0l1.6-2.4l1.1-0.8l0.7-1.4
                        		l1.1-1.6l2.3-2.8l-0.9-0.4h-0.5l-1.2-0.6l-2.9-0.9l-3-1.2l-6.5-1.9l-2-1l-1.4-0.4l1.1-2.5l1-1.2l1.6-1l0.2-0.8v-1.1l1.5-0.8
                        		l2.5-2.3l0,0l0.6,2.5l0.5,0.4l0.7-0.1l0.7-0.5l0.1-0.5l0.3-0.4l0.5,0l0.1,0.6l-0.2,1.2l-0.5,0.4l-0.2,1.4l1.1,2.1l2,1.5l2.1,0.6
                        		l3.7,0.4l2.2-0.4l1-0.5l0.7-0.6l0.3-0.6l0-0.4l0.6-0.8l0.5-0.3l1.4-0.4l0.9-0.7l0-0.3l-0.4-0.3l0.4-0.5l2.5-1.1l0.5-0.8l0.3-2.7
                        		l1.2-1.5l0.4-0.1l2.3-1.1l1.3-1l0.4-0.8l1.1-2.9l0-0.7l-0.2-0.8l0.4-0.5l0.9-0.6l1.3-0.1l0.9,0.1l0.1,0.3l0.2,0.1l1,0.2l1.1,0.1
                        		l1.5-0.1l1.5-0.8l2.7-1.2l1.3-0.4l0.8,0.1l1.3-0.2l0.8-0.5l0-0.3l-0.6-1.8l-0.6-0.3l-0.9-1l0.2-1.2l1.2-0.6l1.3-0.3l1.4-0.6
                        		l2.5-1.3l0.4-0.5l1.5-0.8l4.2-1.5l0.5,0l1,0.3l0.8,0.9l1.4,1.1l6.1,2.2l4.2,1l1.5,1l0.8,1l1,0.8L755.2,160.8L755.2,160.8z
                        		 M687,146.6l-1,0l-1.1-1.7l0.2-1l0.5-0.7l0.8-0.1l0.7,0.4l1.1,1.1l-0.1,1l-0.5,0.7L687,146.6z M696.6,138.6l1.8,0l1.5,0.2l1.6,1.1
                        		l1-0.8l0.5-0.1l0.7,0.4l3,2.6l2.2,3.2l1.3-0.2l1.7,0.8l0.4,0.4l-0.8,0.7l-1.3,0.7l-1.8,0.4l-1,0l-0.9-0.6l-0.5-0.1l-1,0.1l-0.8,0.3
                        		l-0.6-0.1l-0.9-0.9l-0.8-3.2l0-0.9l-0.6-1.2l-0.5-0.1l-1.8,0.9l-1.8-1.5l-0.7-0.1l0.1,0.5l-0.4-0.2l-1-0.9l-0.6-1.3l0.3-0.5
                        		L696.6,138.6L696.6,138.6z"/>
                        </g>
                        <g id="id-pb" class="click-point" onclick="window.location='region?r=papuabarat'" onmouseover="popUp('id-pb')">
                        	<path d="M663.6,200.1l0.8,0.9l-5-2.2l-0.2-1.1l0.5,0.2l1.2,0.9L663.6,200.1L663.6,200.1z M605.2,162.5l-1.2,0l-3.6-1.1l-3-1.6
                        		l-0.3-0.4l0.6-0.5l3.5-1.3l1.4-0.7l5.4-1.1l0.1,0.5l1.3,2l0.1,2.6l-0.9,0.6L605.2,162.5z M600.7,147.9l-1.7,0.6l-1.6-0.5l0.1-0.3
                        		l0.4-0.3l1.8-0.5l1.5,0.5L600.7,147.9L600.7,147.9z M617.4,142.4l0.6,0.8l1.1-0.1l0.7-0.3l0.7,1l0,1.9l-0.6,2.7l-0.7,1.6l-0.2,0.3
                        		l-0.4,0.1l-1.5-0.3l-2-1.7l-0.3-1l-0.8-1.1l0.3-0.5l-0.3-0.7l-0.4-0.6l-0.6-0.2l-0.1-0.2l0.1-0.3l0.4-0.2l3.4-1.1L617.4,142.4z
                        		 M617.7,140.7l-0.5,0.8l-1.6,0.7l-2.2,0.5l-1.5,0.1l-1.8-0.1l-0.6,0.1L609,143l-0.2-0.1l0.9-1l0.7-0.5l4.2-0.1l1.3-0.3l0.6-0.7h0.8
                        		L617.7,140.7L617.7,140.7z M612.3,136.4l-2.4-0.3l-0.2-1l0.4-0.3l2.3-0.7l0.8,0.3l0.6,0.4l0,0.3l-0.5,0.8L612.3,136.4L612.3,136.4z
                        		 M663.7,140l3,0.1l0.1-0.6l3.9,0.1l2.2,1.8l-1.4,2.3l1.7,3.2l1.3,1.2l1.3,2.4l-0.8,0.9l-0.2,2.5l-2.3,2.1l0.6,3.5l0.4,0.9l-0.2,2
                        		l0.5,4.6l1.1,1.9l0.5,0.2l1.2,1.1l2.5,6.1l0.5,0l0.5-0.5l-0.9-3.6l0-1.2l0.3-0.6l0.9-1l0.5,0.1l1.2,0.8l0.3,0.9l0.1,4.3l0,0
                        		l-2.5,2.3l-1.5,0.8v1.1l-0.2,0.8l-1.6,1l-1,1.2l-1.1,2.5l1.4,0.4l2,1l6.5,1.9l3,1.2l2.9,0.9l1.2,0.6h0.5l0.9,0.4l-2.3,2.8l-1.1,1.6
                        		l-0.7,1.4l-1.1,0.8l-1.6,2.4l0,0l-1.2-0.5l-2.7-2.3l-0.1-0.2l0.7-2.8l0.4-0.2l2.5,0.3l1,0.4l0.3,0l0.7-0.5l0-0.2l-1.2-0.2l-3.9-0.3
                        		l-1,0.7l-0.3,0.9l-1.3,0.3l-0.9-1.4l-0.6-0.6l-1.2-0.3l-0.5,1.6l-0.6,0.3l-1.6-0.9l-0.5-0.4l-0.3-0.7l0.1-0.5l0.4-0.3l0-0.3
                        		l-0.3-0.6l-0.6-0.6l-0.3-0.1l-1.7,0.9l-1.8-0.9l-1.6-2.8l-0.6,0.3l-0.1,0.2l0.1,1l-0.4,0.1l-1.2-0.8l-1.1-2.2l-0.1-0.6l0.1-0.2
                        		l0.9-0.6l0.1-0.2l0-1.1l-0.3-1.3l0.4-1.4l1.2-1l1.3-0.9l0-1.3l-0.6-0.8l-1.7,1.5l-1.3,1.5l-0.3,2.6l0,2.1l-0.7,0.1l-1.1,0.7
                        		l0.4,0.4l0.4,0.9l-0.1,0.6l-1.7,1.3l-1.5,1.5l-0.1,0.3l0.2,0.9l0.6,0.5l0.2,0.6l-2.4,2.5l-1.3,1.1l-0.7,0.1l-2.6-0.3l-0.3,0.2
                        		l-0.7,0.8l-1.4-0.3l-1.1-1.5l-0.5-1.3l0.2-0.2l-0.2-0.6l-1.2-3l0.6-1.5l1.8-0.7l0.5-0.4l0.1-0.3l-0.8-1.4l-0.3-0.1l-0.3,0.1
                        		l-0.5-0.4l-0.4-1.4l0.3-0.9l0-0.3l-0.4-0.5l-0.5-0.1l-0.6,0.2l0,0.9l-0.2,0.1l-0.2,0.1l-0.8-0.4l-1.2-1.6l-0.1-0.9l-0.6-1.2
                        		l-1.6-1.2l-2.6-1.6l-0.7-0.2h-1.4l-1.9,0.5l-2.1-3.1l0.2-0.2l3-1.4l1.2-0.3l1.9,0.1l3.3,0.3l1.1,0.3l1.2,0.8l0.4,0.5l1,0.4l2.1-1.5
                        		l3-4l1.5-0.9l0.9-0.3l1.5-0.2l1.1,0.5l1.3,1.3l2.1,0.8l0.7,0l1-0.4l0.8,0.1l0.5,0.7l-0.1,0.9l0.1,1.4l0.3-0.3l0.3-2.5l-0.1-0.6
                        		l0.2-0.1l0.4,0.2l1.1,2.2l0.2,0.1l0.1-2l-0.3-0.8l-0.4-0.2l1-1l1.3-0.6l0.7-1l0-1.6l-0.2-0.4l-0.4,1.1l-1.5,0.5l-0.3,0l-0.6-0.7
                        		l0.1-0.2l2-0.8l0.6-0.5l-0.2-1.1l-1,0.2l-4,2.1l-1.8,0.1l-1.8-0.1l-0.7-0.4l-1.8-0.3l-1.7,0.2l-4.1,1.3l-1.1-0.1l-1.4-0.6l-0.6,0.2
                        		l-1.6,0.9l-0.9-0.4l-0.2-0.2l-0.2-0.8l-0.4-0.5l-0.3-0.1l-2,0.5l-1.1,0.7l-1,0.2l-0.7-0.1l-2.5-2l-0.8-0.3l-1.1-0.8l-1.2-2
                        		l-0.7-1.6l-0.1-1.1l0.8-0.8l-0.3-0.9l-1.3-1.1l-2.8-1l-0.3-0.4l0-0.3l-2-0.9l-5.5-1.8l0.2,0.4l0.8,0.5l0,0.4l-0.8,0.6l-1.4,0.5
                        		l-0.5-0.9L621,152l-1.1,0.1l-1.5-0.9l0.8-1.2l0.4-1l0.4-0.5l2.1-0.4l1.2-2.1l0.6-3.1l-0.5-1.6l4.5-1.5l0.4,0.1l0.1,0.2l0.7,0.2
                        		l3.4-0.6l1.7-0.6l0.8-1.2l3.3-2.7l1.2-0.8l1.6-0.6l2.8-0.7l4.8,0.4l1.8,0.9l5.1,2l1,0.1l3.5,3l1,0.3L663.7,140L663.7,140z
                        		 M617,127.4l2.8,0.8l1.7,0.2l2.8,1.6l0.2,0.6l0.2,1.2l-0.4,0.9l-0.7,1l-1.5-0.8l-1.1-0.1l-1.2,0.5l-1,0.1l-0.5-0.3l-1.2-1.6
                        		l-1.5-0.6l-1.4-2.1l-0.4-0.3l-1.3,0.1l0.2,0.8l1.8,1.9l1.7,0.8l1,0.2l0.6,0.4l0.4,0.7l-0.5,0.8l-1.2,0.6l-1.5,0.2l-0.6-0.2
                        		l-0.3-0.4l-0.5-2l-1.6,0.4l-0.8,0.7l-0.5-1.9l-1.5,0.4l-1.2-0.1l-2-0.7l-0.4-0.3l0.3-0.2l0.4,0.2l2.1,0.2l0.8-0.4l-0.5-0.8l-1.1,0
                        		l0.1,0.6l-0.8-0.2l-0.3-0.6l0.1-0.6l1.3-0.3h1.5l3.7-0.6l0.8-0.3l0.4,0.3l0.8-0.1l-0.3-0.3l0.6-0.3l0.7-0.1L617,127.4L617,127.4z
                        		 M594.1,130.7l-0.3,0.1l-0.9-1l-3.4-3.3l0-0.2l0.3,0l0.6,0.4l3.5,2.8l0.4,0.7l0,0.3L594.1,130.7L594.1,130.7z"/>
                        </g>
                        <g id="id-ri" class="click-point" onclick="window.location='region?r=riau'" onmouseover="popUp('id-ri')">
                        	<path d="M138,118.3l-0.6-0.2l-0.3-0.8l0.5-1.7l0.5-0.5l0.5-0.1l0.8,0.7l0.4,0.6l0.1,1.4l-0.4,0.4L138,118.3L138,118.3z M128.3,110
                        		l0.4,0.1l1.2-0.4l0.8,0.1l2.8,1.7l1.8,1.4l0.2,0.3l0.2,0.8l-0.3,1.1l-0.6,0.3l-1.2-1.2l-1.1-0.5l-3.5-0.1l-1.7,0.4l-0.5,0l-1.1-0.6
                        		l-1.3-1.2l0.5-0.8l0.9-0.1l0.2-0.2v-0.7l-0.5-1.1l0.1-1l0.3-0.4l0.6-0.1l0.6,0.3l1,1.3l-0.2,0.5C127.9,109.6,128.3,110,128.3,110z
                        		 M135.4,109.2l2.2,2.5l0.1,0.5l-0.4,0.4l-0.6,0.2l-0.5-0.1l-2.4-1.7l-3.2-1.6l-0.6-0.1l-0.6,0.2l-0.6-0.5l0.9-1.7l0.5-0.2h0.7
                        		l1.5,0.4l1.5,0.7L135.4,109.2L135.4,109.2z M124.4,111.2h-0.4l-1.5-1.4l-0.4-0.3l-0.4-0.8l-0.7-3.5l0-1.9l0.1-0.2l0.8-0.2l0.5,0.1
                        		l3,2.7l0.3,0.5l0,0.3l-0.6,1.7l0.1,1.1l0.3,1.1l-0.1,0.3C125.5,110.5,124.4,111.2,124.4,111.2z M126,102.2l0.2,2.9l-0.2,0.3
                        		l-0.5-0.2l-2.6-2.5l-0.8-0.3l-2-0.2l-0.8-0.4l-1-0.9l-0.9-1.5l0.3-0.2l0.8,0l1.8,0.8l2.9,0.4l1.8,0.5l0.8,0.4
                        		C125.8,101.2,126,102.2,126,102.2z M110.6,97.7l-0.8,0l-1.1-0.3l-0.4-0.2l-0.4-0.5l-0.9-2.5l0.1-1.3l0.2-0.7l0.6-0.5l3.5-1l0.7,0.2
                        		l0.3,0.3l1.3,1.7l0.1,0.9l-0.8,1l0,1.3l-0.2,0.5l-1.3,1L110.6,97.7L110.6,97.7z M93.7,90.6l0.8-0.1l0.9,0.6l0.8,0.2l0.5-0.4
                        		l-1.1-0.7l-0.3-0.6l-0.1-0.8l0.2-0.4l0.9-0.6l2.4-0.3l2.5,0.3l-0.1,0.5l0.3,0.8l3.4,2.3l0.7,0.8l0.3,0.8l0,1.3l0.7,2.1l0.7,1.1
                        		l2.3,1.1l0.8,0.1l1.7-0.4l1.2,0.3l4.5,3.8l2,1.1l1.1,3.1l-0.2,1.7l0.4,1.4l0.4,0.6l3.3,3.1l0.7,0.5l1.4,0.6l0.5,0.1l2.4-0.2
                        		l2.6,0.2l0.7,0.3l0.5,0.4l2.6,3.1l0.2,0.5l-0.1,0.7l-8.8,4.6l-0.7-0.4l-0.7-0.8l-1,0l1.9,1.3l0.8,0.2l1.2-1.1l4.2-0.8l4.5-2.5
                        		l0.3-0.2l0.7-1.1l2.3-0.8l0.6,0.1l1.2,0.6l5,3.8l0.3,0.6l1,4.3l-0.6,0.2l-3,0.2l-0.3,0.4l-0.1,0.9l-2.7,1.8l0.2,0.3l0.3-0.1
                        		l0.7-0.6l0.7-0.2l0.6,0.1l0.1,0.2l-0.4,0.5l1.6,0.2l0.1,0.2l1.6,0.5l0.9,1.3l-0.6-0.1l-0.9,0.2l-1.7,0.7l-0.2,0.2l0.2,0.3l-0.3,0.7
                        		l-2.6,1.8l-0.4,2.1l0.1,0.4l1,1l0,0l-1.2,0.1l-0.8,0.5l-0.4-0.3l-3.6-0.6l-0.8,0.2l-1.2-0.1l-0.9,1.4l-0.8,1l-2.1,1.5l-0.1,0.4
                        		l-0.5,0.4l-0.5,0.9l-0.7,0.1l-0.5,0.6l-0.3,0.1l-0.6-0.4l-0.7,0.1l-0.8-0.3l-0.8,0l-0.5-0.8l-1.2-0.1l0-0.6l-1-0.5l-0.3-0.8l-0.6,0
                        		l-0.9,0.5l-0.4,0l-0.2-0.1v-0.3l-0.4-0.4l-0.4,0l-0.4,0.3l-0.9-0.4l-0.4,0.2l-0.4-0.3l-0.4-0.1l-0.5,0.3l-0.1,0.4l-0.2-0.2
                        		l-0.6,0.3l-0.2,0.6l-0.8,0.2l0,0.3l-0.6-0.1l0,0l-0.2-0.1l0,0h-0.9l-0.5-0.3l-1.3-0.4l0-0.3l-0.3-0.2l-0.7-0.9l-1.1-0.7l-0.4,0
                        		l-0.2-0.4l-1.4-0.9l-0.1-0.6l-0.5-0.1l-0.4-0.3l0.2-0.3l-0.1-0.1l-1.7-0.6l-0.4-0.6l-0.7-0.3l-0.1-0.4l-1.1-0.5l-0.3-0.4l-0.2,0.1
                        		l-0.3-0.1l-0.7-1.5l0.2-0.4l0-0.7l-0.8-0.6l-0.4-0.1l-0.9,0.3l-0.1,0.1l0.2,0.1l-0.3,0.5l-0.6-0.4l-0.5,0l-0.2-0.3l-0.1-0.6
                        		l-0.5-0.3l-0.3-0.5l0,0l-0.1-0.4l0.1-0.4l0,0l-0.5-0.9l0-0.2l0.2-0.2l-0.3-0.9l0-0.3l0.5-0.4l0.2,0l0.3,0.5l0.6-1l0.1-0.8l-0.4-0.9
                        		v-0.5l0.3-0.8l-0.4-1l-0.2-0.2l-0.3-0.1l-0.7,0.2l-1.1,0.9l-0.2,0.4l-1.1,0l-2.8-0.8l-0.8-1.7l-0.4-0.3l-0.4-0.2l-0.9,0.5h-0.3
                        		l-0.2-0.4v-1.2l-1.3-2.6l0.1-0.9l0.8-1.3l-0.5-0.7l-1.1-0.4l0,0l-0.9-1l0.3-0.2l-0.1-0.2l0.1-0.9l-0.4,0l-0.4-0.5v-0.2l0.8,0
                        		l0.2-0.3l0.2-0.6l-0.3-1l-0.4-0.2l0-0.4l0.6-0.3l0.6-0.1l-0.1-0.3l-0.6-0.4l-0.3-0.5l-0.2-1.6l-0.5-0.9l-0.2,0l-0.2-0.2l0-0.4
                        		l0.4-0.3l3-0.2v-0.3l0.5-0.1l0.6,0.1l0.3-0.2l0-0.4h0.8l0.8-0.7l0.1-0.5l-0.2-0.2l0.1-0.4l0.4-0.7l0.1-0.5l-0.2-0.3l0.1-0.4
                        		l-0.1-0.3L90,98.1l0-0.4l0.3-0.3l-0.2-0.8l-1.9-0.3l-0.3-0.3v-0.4l0.5-1.3l0.2-3l0.5-1.7L89,88.7l-0.7-1.6l-0.2-1.3l0-0.7l0.3-1.3
                        		l0.8,2.5l0.6,1.2l1.3,1.4l1.5,1.2L93.7,90.6L93.7,90.6z"/>
                        </g>
                        <g id="id-sa" class="click-point" onclick="window.location='region?r=sulawesiutara'" onmouseover="popUp('id-sa')">
                        	<path d="M517.8,102.6l-0.9,1.2l-0.8,2.5l-1,1.8l-1.5,2.1l-1.3,0.6l-1.5,1.1l-1.2,1.2l-1.5,2.6l-0.4,1.1l-1.9,2.3l-2.1,1.1l-1.3,0.3
                        		l-1,0l-4.2,0.7l-3,0.7l-2.2,0.3l-1-0.3l-2.2,0l0,0l0.3-1l0.8-1.4l-0.1-1l0.2-1.1l-0.3-0.8L489,116l-2-0.3l-1.2-0.9l-0.6-0.5
                        		l-0.3-0.8l0-0.5l-0.7-0.7l-0.9-0.2l-0.5-0.4l-0.2-0.8l0,0l2.3-0.1l2.3,0.5l3,1l0.3,0l0.6-0.3l3.8,0.9l1.6-0.1l1.2-0.7l5.3-2.4
                        		l0.4-0.5l0.8-2.2l1-0.4l2.7,0.2l0.2-0.1l0.4-0.6l0-0.6l-0.5-0.3l-0.6,0l-0.3-0.4l0-0.4l0.5-0.8l1.1-0.8l1,0.4l0.7-0.1l2-1.1
                        		l0.2-0.5l-0.5-1.1l0-0.3l2.6-2.1l1.1-0.1l1.7,0.5l0.7,0.6l-0.2,0.5l0.1,0.5l1.4,1.2l-0.3,0.8l-0.6,0.3l-0.7,0.1L517.8,102.6z
                        		 M522.5,81.9l-0.2,0.1l-0.5-0.2l-0.4-1.5l0.5-1.2l0.5-0.2l0.5,0.3l0.1,0.3l-0.1,0.3l-0.8,0.8l0,0.4l0.4,0.6L522.5,81.9L522.5,81.9z
                        		 M525.6,64.9l-0.2,0.6l1,1.3l0.2-0.1l0.4,0.3l0.1,1.3l-0.6,1l-0.2-0.1l-0.2,0.1l-0.1,0.6l-0.2-0.1l0-0.3l-0.3-0.6l-0.5,0l-0.2-0.3
                        		l-0.4-0.1l-0.1-0.3L524,68l-0.3-0.7l0-0.5l0.5-1l-0.1-0.2h-0.3l-0.1-0.4l0.3-0.1L524,65l-0.3,0.1l-1.2-0.7l-0.2-0.4l0.1-0.9
                        		l0.7-0.3l1,0.2L525.6,64.9z M545,61.7l-0.3,0l-0.2-0.3l-1.3-2.8l-0.1-1l0.3,0l0.4,0.3l1.4,1.9l0.1,0.5L545,61.7z M545.8,58.5
                        		l-1.1-0.2l-0.2-1.3l0.7-0.6l1-1.8v-0.4l-0.2-0.2l-1-0.2l-0.2-0.2l-0.3-1l0-0.6l0.5-2.5l0.3-0.6l1.3,0.2l0.8,0.7l1,3.6l-0.8,1.2
                        		l-1.3,3.2L545.8,58.5L545.8,58.5z"/>
                        </g>
                        <g id="id-sb" class="click-point" onclick="window.location='region?r=sulawesibarat'" onmouseover="popUp('id-sb')">
                        	<path d="M90.9,179.9l0,0.6l0.3,0.5l-0.1,0.2l-1,0.1l-0.5,0.2l1.4,2.7l0,0.2l-0.4,0.3l-0.3-0.2l-0.3-0.7l-0.2,0l-0.4-0.3l0.2-0.2
                        		l-0.2-0.3l-0.8-0.3l0.2-0.7l-0.2-0.5l0.1-0.6l-0.6-0.8l-0.6,0.1l-0.7-0.8l-0.7-1.2l0-0.2l0.3-0.6l-0.5-1.9l0.1-0.3l1-0.4l1.4,1.7
                        		l0.9,0.5l1.2,1.5L91,179L90.9,179.9L90.9,179.9z M85.4,175.4l0,0.4h-1l-0.1,0.2l-0.5-0.5l-0.2,0.5l-0.2,0.1l-0.4-0.4l0.1-0.3
                        		l-0.4-0.4l0.3-1v-0.9l-0.4-0.8l0-0.6l-0.5-0.3l0.3-0.3l-0.1-0.8l0.2-0.3l0.5,0.1l0.7,1l1,0.6l0.3,0.4l0.7,0.3l0.5,1.1l0.4,0.4
                        		l-0.2,0.8l-0.6,0.2L85.4,175.4L85.4,175.4z M77.9,164l0.7,1.4l0.5,0.5l0.1,0.4l0.6,0.3l0.4,0.7l0.3,0.7v0.2l-0.2,0.1l-0.2-0.1
                        		l0-0.4l-0.2-0.3l-0.2,0.2h-0.4l-0.2-0.5h-0.8l-1-0.8l-0.5-0.2l-0.9,0.1l-0.3-0.8l-0.3-0.1l-0.7-1.2l0-0.2l0.2-0.2l0.4,0.2l0.1-0.1
                        		l-0.3-0.4l-0.1-0.9l0.2-0.4l0.5-0.4h0.6l1.3,1.1C77.7,163,77.9,164,77.9,164z M64.4,143.5l0.3,1l-0.2,0.1l-0.2-0.5l-0.1,0.1
                        		l0.4,1.3l1,0.8l0.1,0.8l0.6,0.8l0,0.4l0.4,0.7l-0.1,0.3l0.6,0.7l0,0.6l1,1l0.1,0.3l0.1,0.7l-0.3-0.2l-0.3,0l0.4,0.5l0.7,0.3
                        		l0.1,0.3l-0.1,0.4l0.4,1l0.7-0.2l0.5,0.7l0.1,1.5l-0.3,0.5l-0.6-1.2l-0.1,0l0.2,1l0.3,0.6l-0.4,0.4l-0.4-0.3l-0.8,0l-0.4,0.1
                        		l-0.1,0.3l-0.6,0.1l-4.1-2.2l-0.2-0.6l-0.6-0.5l0.2-0.1v-0.2l-0.6-1.2l-2.7-3.9l-0.2-0.7l-0.4-0.2l-0.2-0.3l-0.1-0.4l0.4-0.4
                        		l0.8-2.1l0-1.1l0.6-0.7l0.4-0.1l0.4,0.2l1.1-0.1l0.8-0.3l0.7-0.5l0.2,0L64.4,143.5L64.4,143.5z M80.9,111.5l0.4,0.3l0.7-0.1
                        		l0.3,0.7l1.3,0.5l0.3,0.3L86,114l-0.2-0.2l0,0l1.1,0.4l0.5,0.7l-0.8,1.3l-0.1,0.9l1.3,2.6v1.2l0.2,0.4h0.3L89,121l0.4,0.2l0.4,0.3
                        		l0.8,1.7l2.8,0.8l1.1,0l0.2-0.4l1.1-0.9l0.7-0.2l0.3,0.1l0.2,0.2l0.4,1l-0.3,0.8v0.5l0.4,0.9l-0.1,0.8l-0.6,1l-0.3-0.5l-0.2,0
                        		l-0.5,0.4l0,0.3l0.3,0.9l-0.2,0.2l0,0.2l0.5,0.9l0,0l-0.1,0.3l0.1,0.5l0,0l0.3,0.5l0.5,0.3l0.1,0.6l0.2,0.3l0.5,0l0.6,0.4l0.3-0.5
                        		l-0.2-0.1l0.1-0.1l0.9-0.3l0.4,0.1l0.8,0.6l0,0.7l-0.2,0.4l0.7,1.5l0.3,0.1l0.2-0.1l0.3,0.4l1.1,0.5l0.1,0.4l0.7,0.3l0.4,0.6
                        		l1.7,0.6l0.1,0.1l-0.2,0.3l0.4,0.3l0.5,0.1l0.1,0.6l1.4,0.9l0.2,0.4l0.4,0l1.1,0.7l0.7,0.9l0.3,0.2l0,0.3l1.3,0.4l0.5,0.3h0.9l0,0
                        		l0.2,0.1l0,0l0,1l0.2,0.1l-0.1,0.8l0.5,0.4l0.3-0.3l0.1,0.1l-0.3,0.9l-0.8,1l-0.6,0.1l-0.3,0.2l-0.6,0l-0.6,0.6l0.1,0.6l0.3,0.8
                        		v0.2L112,151v0.2l0.4,0.4v0.2l-0.6,1.1l-2,1.2l-1.2,1.8l-1,0.3l-0.4-0.4l-0.6,0.2l-0.6,0l-0.5,0.3l-1.1,0l-0.6,0.4l-0.7-0.7l-0.2,0
                        		l-0.2,0.4l-0.5-0.4l-0.2,0l0.2,3.6l0.2,0.4l0.5,0.5l0.2,0.5l0.3,0.4l0.7,0.3l0.4,0.7l0.6,1.7l0.2,1.6l0,0l-0.2,0.5l0,0l-0.8,1
                        		l-0.7,0.6l-1.1,0.4l-0.4,0.4l-1.6,1.1l0,0l-0.3-0.5l-2-2.2l-0.4-1.6l-0.8-1.2l0-0.5l0.7-0.7l0.3-0.6l0-1.2l-0.4-1.7l-2-2.9
                        		l-1.4-1.8l-0.9-2.4l-0.8-0.8l0.4-0.6l0.1-0.6l-0.4-1l-0.4-0.3l-0.8-0.1l-0.8-0.8l-0.4,0.3l-0.4-0.1l0.1-0.6l0.4,0.1l-0.3-0.7
                        		l-0.4-0.1l-0.6-0.8l0-0.3l0.3,0l-0.3-0.7l0.3-0.4V145l-0.6-1.6l-0.3-1.4l-0.3-0.5l-0.4-0.6l-2.8-2.8l-0.7-1.4l-0.7-0.9l-2.3-1.9
                        		v-0.2l-0.5-0.7l-1.1-0.7l-0.4-0.8v-0.5l-0.7-1.2l-0.2-0.1l0.2-0.7l-0.1-0.4l0.2-0.3l-0.6-0.9l-0.9-0.6l-0.6-0.6l-1.3-0.7l-2.3-0.9
                        		l-0.7-0.2l-0.4-0.9l-0.4-0.3l-0.8-0.1l-1.1,0.4l-1.2-0.4l0.9-1.4l0.8-0.3l0.8-0.1l0.6-0.8l0.9-1.6l0.5-0.1l1.2-0.8l1.1,0.4l1.5-0.5
                        		l0.5,0.7l0.1,0.4l0.6,0.5l0.8-0.4l0.3,0l0.5,0.1l0.1,0.2l0.6,0l0.7-0.1l0.5-0.3l0.7-0.8v-0.7l-0.7-0.5l-0.1-1.2l-0.6-0.2h-0.6
                        		l-0.3-0.8v-0.3l0.3-0.3l-0.1-2.1l0.6-0.3L80.9,111.5L80.9,111.5z"/>
                        </g>
                        <g id="id-sg" class="click-point" onclick="window.location='region?r=sulawesitenggara'" onmouseover="popUp('id-sg')">
                        	<path d="M446.9,174.6l1.6,0.4l0.6,0.3l0.5,0.5l0.4,0.1l0.7-0.6l0.7-0.2l0.4,0.1l0.6,1.4l-0.3,0.6v0.3l0.2,0.3l1.1,0.6l1.2,0.2
                        		l0.4-0.2l1.1-1.1l1.5-0.6l0,0l2.6,1.1l2,0.6l0.6-0.3l0.7,0.1l1-0.1l0.4,0.2l0.5,0.7l1.1,0.2l0.2,0.3l-0.1,0.9l0.4,0.2l0.4,0.6
                        		l0.5-0.1l0.4,1l0.5,0l0.2,0.1l-0.1,0.2l0.1,0.4l0,0l-0.9,1.2l0.2,0.8l1.3,0.4l0.4,0.4l0.5,0.2l0.7,1.2l-0.1,0.4l-0.4,0.1l-1.8-1.8
                        		l-0.6-0.4l-0.8,0l0.7,1.3l-0.4,1.3l-1.2,0.5l0,0.4l0.8,1.3l1.7,1.2l2.2,1.2l0,0.2l0.6,0.7l0.1,0.5l0.5,0.3l1.6-0.1l0.6,0.1l0.1,0.4
                        		l-0.5,0.4l-0.2,1l0.7,0.3l0.1,0.4l-0.3,0.4l0.6,1.3l0.2,0.1l2.5-0.2l-0.1-0.4l-0.8-0.6l-0.2-0.4l0.2-0.1l0.6,0l0.7,0.5l0.7,1.6
                        		l0.2,1.1l-0.1,2.8l-1.2,1L477,203l-1.7-1.5l-0.3,0.1l-0.2,0.1l0.2,0.4l1.2,1l0.4,0.6l0.1,0.4l-0.3,0.3l-0.4,0.1l-0.3-0.4l-0.6,0.3
                        		l-0.7-1.3l-0.8-0.5l-1.3,0.8l-0.8,0.3l-0.8-0.1l-2.7,0.8l-0.8-0.1l-1.3,0.7l-0.9,0.2l-0.6,1.2l-0.4,1.4l0.3,1.1l0.9,0.8l0,0.3
                        		l-1.3,1.3l-1.7,0l-1.5-0.7l-2.1-0.2l-0.6,0.3l-0.4-0.1l-0.2-0.4l-0.5-0.3l-1.6-0.6l-0.5-0.5l-0.2-0.5l-0.6-0.6l-0.2-0.4l0.3-1.8
                        		l0.2-0.1l0.6-2.1l-0.1-1.4l0.4-1.2l0.5-0.3l0.7-1.4l-0.1-1.4l-0.3-0.6l-1.3-0.5l-2.4-0.4l-0.5-0.4l-1.1-1.6l-0.5-0.2l-0.2-0.4v-0.5
                        		l-0.5-0.1l-0.6,0.1l-1-1.4l-3.1-2.7l-0.6-0.8l-0.4-0.2l-0.2-0.7l0-0.8l0.4-0.9l1.6-2.2l0.7-0.4l0.6-1.5l0-2.3l0.1-0.6l0.4-0.4
                        		l0-1.2l-0.2-0.1l0.1-0.4l-0.3,0.1l-0.2-0.2l-0.1-0.8h-0.1l-0.1,0.4l-0.6-0.1l0.1,0.3l0.2,0.1l0,0.2l-0.3,0l-0.1-0.7l-0.3-0.2l0-0.2
                        		l0.5,0.1l0.5-0.7L446.9,174.6z"/>
                        </g>
                        <g id="id-sn" class="click-point" onclick="window.location='region?r=sulawesiselatan'" onmouseover="popUp('id-sn')">
                        	<path d="M445,252.6l1.1-0.1l1.2,0.4l-0.3,0.5l-0.8,0.1L443,253l-0.4-0.3l0-0.2l0.4-0.3l1,0.3L445,252.6L445,252.6z M440.7,248.4
                        		l1.1,0.6l0.5-0.3l0.1,0.5l-0.3,0.8l-1.7,0.2l-0.6-0.4l-0.2-0.6l0.1-1.2l0.4,0.1L440.7,248.4L440.7,248.4z M437.6,237.7l-0.4,0.9
                        		l-0.3-1.8l0.2-1.3l-0.5-2.5l-0.1-4.3l0.4-2.1l0.2-0.3l0.2,0l0.1,0.3l0,0.6l0.5,0.8l0.7,2.7l-0.5,3.9L437.6,237.7L437.6,237.7z
                        		 M426.5,161.6l0.4,0.5l0.3-0.3l0.6-0.1l0.9-0.9l0.3,0.2l1.5-0.1l0.1,0.6l0.8,0.4h1.8l1.3,0.6l0.8-2.5v-0.4l0.3-0.1l1.3,1.4l0.2,0.5
                        		l1.5,2l1.1,1.1l1.3,0.7l0.8,0.3h0.8l0.1-0.3l0.5-0.1l1,0.1l0.2,0.2l0.8,0.1l4.7,2l1.7,0.3l1,0.6l0.9-0.1l0.7,0.1l1.3,1l0.6,0.2
                        		l0.8,0.1l0.7,1l0.5-0.1l0.6,0.5l1.3,2.6l-0.6,0.2L459,174l-0.8,1.5l-0.4,0.2l-0.3,0.8l0,0l-1.5,0.6l-1.1,1.1l-0.4,0.2l-1.2-0.1
                        		l-1.1-0.6l-0.2-0.3v-0.3l0.3-0.6l-0.6-1.4l-0.4-0.1l-0.7,0.2l-0.7,0.6l-0.4-0.1l-0.5-0.5l-0.6-0.3l-1.6-0.4l0,0l0.4-0.5l-0.8-1.1
                        		l-3.7-1l-0.7-0.1l-1.6,0.6l-1.8,1.1l-3.4,2.5l-3,1.8l1.1,3l1.3,1l0.6,0.2l0.5,0.9l-0.1,0.9l-0.1,3.5l0.6,1.3l0.3,2.2l-0.1,0.5
                        		l-1.2,1.9l-0.3,1l-0.2,3.4l0.8,1.1l-0.5,3.7l0.7,1.8l0.5,3.2l-0.5,1.8l-0.9,0.9l-0.5,0.3l0,2.4l-0.7,2.8l2,3.5l1.4,4.6l-0.1,0.2
                        		l-0.8-0.3l-1-1.6l-0.4-0.2l-1.9,0.5l-1.3,0.7l-0.8,0.2l-2.9-0.6l-1.3,1.1l-0.3,0.8l-0.9,0.6l-1.9-0.1l-0.3-0.2l-0.2-0.5l0-0.3
                        		l-0.3-0.4l-2.8-1l-1.9-2.8l0-1.1l0.5-2.7l0.4-0.8l1.2-1.6l0.9-2.2l0.1-0.8l-0.4-0.9l-0.2-1.4l1.8-2.9l0.5-4.1l0-2.4l-0.5-3.7
                        		l-1.1-1.7l-1.5-3l0.5-1.4l0.6-0.9l-0.5-1.4l0,0l-0.3-1.9l-0.5-1.2l-0.1-0.9l-0.7-0.7v-0.4l0.4-0.3l0.4,0l0.2,0.3l0.9-0.3l0.3-0.2
                        		l0.2-0.6l0.7-0.3l1,0l0-0.4l-0.6-0.7l-0.5-1.2l0.3-0.7l-0.1-0.6l-0.3-0.3l0.2-0.9v-1l0.3-0.8l0.8,0.3l1-0.4h0.5l0.7-0.8l0.2-0.7
                        		l1.3-0.9l0.2-0.6l-0.1-0.8l-0.2-0.4l-0.6-0.3l-0.9-0.2l-0.2-0.2l-0.3-0.5v-0.9l-0.3-0.3l-1.5-0.7l0-1.3l1.8-1.3l0.5-0.4l0.1-0.4
                        		l0.7-0.1l0.1-0.3l-0.3-0.9L426.5,161.6L426.5,161.6z"/>
                        </g>
                        <g id="id-sr" class="click-point" onclick="window.location='region?r=sulawesitenggara'" onmouseover="popUp('id-sr')">
                        	<path d="M421.3,141.4l0.1,0.9l-0.2,0.6l0,0.9l0.3,0.9l0.2,1.4l0.1,0.3l0.4-0.1l0,0.5l-0.5,1.2l0,0.6l-0.2,0.4l-1.5,0.2l-0.2,0.4
                        		l0.5-0.2l0.1,0.2l-0.6,0.3l-0.6,0.1l0,0.3l0.5,0.6l0.3,0.2l0.4-0.1l0.4,0.6l0.6-0.1l0.6-0.5h0.4l0.8,0.4l0.6,0.6l-0.1,0.3l-0.5,0.6
                        		l0.3,0.9l1,1l-0.1,0.6l0.4,0.1l0.4,0.8l-0.3,0.4l-0.1,0.5l0.4,0.3l0.6-0.1l0.5,0.2l0.3-0.1l0,2.8l0.1,0.3l-0.4,0.2l0.2,0.9l0,0
                        		l-1,0.5l0.3,0.9l-0.1,0.3l-0.7,0.1l-0.1,0.4l-0.5,0.4l-1.8,1.3l0,1.3l1.5,0.7l0.3,0.3v0.9l0.3,0.5l0.2,0.2l0.9,0.2l0.6,0.3l0.2,0.4
                        		l0.1,0.8l-0.2,0.6l-1.3,0.9l-0.2,0.7l-0.7,0.8h-0.5l-1,0.4l-0.8-0.3l-0.3,0.8v1l-0.2,0.9l0.3,0.3l0.1,0.6l-0.3,0.7l0.5,1.2l0.6,0.7
                        		l0,0.4l-1,0l-0.7,0.3l-0.2,0.6l-0.3,0.2l-0.9,0.3l-0.2-0.3l-0.4,0l-0.4,0.3v0.4l0.7,0.7l0.1,0.9l0.5,1.2l0.3,1.9l0,0l-2.4-0.9
                        		l-1-0.1l-1.3,1.1l-0.5,0.1l-1-0.1l-1.4,0.3l-1.5,0.7l-0.5,0.6l-0.2-0.1l-1.4-3.2l-0.1-0.8l0-4.6l0.3-0.3l0.7-2.9l-0.1-0.4l-0.3-0.3
                        		l-1-0.2l-0.7,0.3l-0.2-1.5l0.4-1.6l0.4-0.7l0.4-0.2l0.7,0.6h0.7l1.7-1.1l2.4-2.4v-1l-0.4-1.1l0-0.8l0.2-1.2l1.2-3.3l0.5-0.6
                        		l0.5-0.3l0.7-0.2l0.6,0.3l0.3-0.6l0.3-1.6l-0.1-0.3l-0.5-0.3l-0.1-0.2l-0.5-1.7l0-0.5l0.4-1.1l-0.5-2.2l-0.1-1.3l0-0.3l0.7-0.5
                        		l-0.2-0.9l-0.2-0.3l0-0.3l0.7-1.5l1.8-1.5l0.4-2l0.5-1.4l0.3-0.5L421.3,141.4z"/>
                        </g>
                        <g id="id-ss" class="click-point" onclick="window.location='region?r=sumateraselatan'" onmouseover="popUp('id-ss')">
                        	<path d="M148.2,209.6l0.1-0.3l-0.4-0.6l-0.4,0l-0.6-0.3l-0.4,0.1l0.4-0.5l-0.2-0.9l-0.3-0.4l-0.6-0.5l-0.8,0l0.7-0.6l-1.1-1
                        		l0.3-0.5l0.6-0.5l0-0.6l-0.3-0.6l-0.6-0.2l-1,0.4l-0.6-0.3l-0.3-0.6l-0.4,0.1l-0.6-0.2l-0.7,0l-0.7-0.4l-0.5-0.6l-1.9-0.3l0-1.6
                        		l-0.5-0.7l-0.5-1.4l-0.4-0.1l-0.3-0.2l-0.9,0.1l-1.3-0.1l-0.2-0.1l-0.3-0.5l-0.4-0.2l-0.6,0.3l-0.8-0.2l-0.7-0.4l-0.9-1.1l-0.9-0.5
                        		l-0.2-0.4l-0.4-0.4l-0.7-0.2l0.5-0.2l0.2-0.4l1.3-0.5l0.1-1.1l0.6-0.8l0.5-0.3l0.1-1.4l0.2,0l0.5,0.3l0.5,0.6l0.4,0.6l0.2,0.1
                        		l0.7-0.7l0.3-0.7l0.3-0.1l0-0.1l0.1-0.9l0-0.8l0.2-0.4l-0.2-0.4l-0.8-0.1l-0.8,0.3l-0.2-0.2l-0.1-0.6l0.2-0.1l-0.6,0.3l-0.6-0.3
                        		l-0.3,0.1l-0.3-0.5l0-0.3l-0.3-0.1l-0.9,0.6l-0.9,0l-0.8,0.6l-0.3-0.3l-0.6-0.1l-1.7-1.5l0.2-0.5l-0.2-0.1l0.1-1.2l-0.3-0.7
                        		l-0.6-0.6l-1-0.2l-1.2,0.4l-0.5-0.4l-0.6-0.1l-0.4-0.6l-0.3-1.2l-0.4-0.1l-0.1-0.3l-0.9-0.5l-0.1-0.7l-0.8-0.5l-0.2-0.6l0,0
                        		l0.5,0.1l0,0l0.4-0.7l0.6-0.2l0.2-0.2l0.8-0.1l0.4-0.4l0.1-0.7l0.6-0.2l0.8,0.5h0.3l0.2-0.2l0.5,0.3l0.6,0.6l0.7,0.2h0.8l0.1,0.2
                        		l0.6-0.4l0.4-0.1l0.5,0.2l0.6-0.6v-0.3l0.2-0.2l0.8-0.3l0.9-0.8l0.3,0.2l0.3,0l0.4-0.4l1.1-1.8l0.5-0.4l-0.6-1l0.6-0.8l0.7,0.3
                        		l1.9,0.3l0.3-0.5l0.2,0l0.1,0.2l1.1,0.4l1.5-0.6l-0.2-0.7l-0.7-0.7l0.2-0.6l0.2-0.3l0.3-0.1l0.2-0.4l0.3-0.2l0.5,0.1l0.3,0.4
                        		l0.1,0.8l0.6,0.6l0.2,0.4l0.8,0.4l0.4,0.6l0.5,0.1l0.2,0.4l0.2,0l-0.1-0.8l0.2-0.2l-0.2-1.6l0.1-0.4l1.1-0.3l0.7-0.5l-0.6-0.5v-1.3
                        		l0.2-0.4l-0.1-0.3l0.2-0.8v-0.8l1.1-1l2.2-0.8l1.7-0.1l0.3-0.5l0.7-0.4l0.4,0.1l1,0.5l0.5-0.2h0.8l1.1,0.3l1.4-0.3l0.9-0.4l1,0.1
                        		l1-0.3l0.3-0.4l-0.1-0.8l0.2-0.3l0.3-0.2l0.5-0.1l1.3,0.5l0,0l0.6,1l0.2,0.9l-0.2,0.5l-0.5,0.4l-0.3,0.7v0.7l0.2,0.4l0.2-0.1
                        		l0.5-1.2l0.4,0.1l1.3,1.1l2.1,1.3l1.4,0.1l0.7,0.7l0.2,0.5l0.3,1.6l-0.1,0.5l-0.3,0.4l-0.4,0.1l-0.4,0.6l-0.3-0.1l-0.6,0.5
                        		l-1.1,1.8l0.9,0.1l0.3-0.1l1-1.5l1.1-0.2l0.4,0.8l1.1,0.1l0.5,0.4l1.5,0.4l1.5-0.8l2.4,0.8l3.1,0.3l1.6,0l0.3,0.6l-0.5,1.7l0.3,1.4
                        		l0.2,0.4l0.7,0.6l0.7,0.2l0.8,0l0.3,0.2l0.2,0.6l-0.2,2l0.6,1.3l0.7,0.6l1,0.1l0.7-0.2l0.3,0.1l0.8,0.3l0.4,0.4l0.1,1l-0.1,1.3
                        		l0.8,1.6v0.4l-0.3,0.4l-1.7,0.9l-1.1,1.2l-1.2,2.5l-0.3,1.1l-0.1,1.1l0.2,0.9l0.4,0.5l1.3,0.7l0.4,1l-0.2,0.9l-0.9,1.4l-0.6,1.3
                        		l-0.2,1.6l-0.3,0.4l0,0l-0.3-0.6l-0.5-0.3l-0.2,0.1l-0.1,0.3l-0.3,0.1l-0.8-0.1l-0.2-0.1l0.1-0.4l-0.3-0.1l0-0.2h-0.6V197l0.3-0.3
                        		l-0.1-0.1l-0.5,0.1l-0.2-0.1v0.3l-0.2-0.1l0.1-0.3l0.4-0.5l-0.3-0.3v-0.2l-0.5-0.4h0.4l-0.1-0.3l-0.1-0.1l-0.3,0.2l-0.2-0.2
                        		l0.1-0.4l-0.4-0.3l-0.2,0.2l-0.4-0.2l0.1-0.8h-0.6l-0.2-0.3l-0.8,0.1l-0.1-0.7l-0.3-0.1l-0.5,0.1l-0.3,0.2l-0.3-1.1l-0.2-0.1
                        		l-0.4,0.4l-0.1,0.6l-0.4,0.3l0.3,0.6l-0.2,0.5l-0.7,0.6l-0.7-0.2l-0.5,0.3l-0.1,0.5l-0.2,0.1l-0.2-0.1l-0.3,1.1l-0.4,0.4l0.3,0.4
                        		l-0.4,0.1l-0.3,0.3l-0.3,1l-0.6,0.4l-0.4,0.5l-0.6,0l-0.6,0.2l-1.1,0.6L167,200l-1.5,0.3l-2.2-0.1l-0.2-0.1l-0.4-0.5l-0.7,0.6
                        		l-1.2,0.5l-0.6,0.5l-0.6-0.1l-0.5,0.6l-0.8,0.6l-0.1,0.4l-0.3,0.1l-0.3,0.8l0.3,2.7l-0.6,0.6l-0.3,0.8l0.5,0.3l0.1,0.8l0.7,0.6
                        		l0.1,0.4l0,0.4l-0.7,0.9l-0.4,0.1l-0.4-0.4l-0.3,0.2h-0.4l-0.5-0.3l-0.4,0.1l-0.1,0.4l-1,0.5l-0.9-0.3l-0.1-0.3l-0.2-0.1l-0.2,0.2
                        		l-1.4,0.2l-0.5-0.4l-0.2,0.9l-0.3,0.4l-0.8-0.7l-0.4,0v-0.2l0.4-0.4v-0.5l-0.4-0.5l-0.4,0l-0.1-0.5L148.2,209.6L148.2,209.6
                        		L148.2,209.6z"/>
                        </g>
                        <g id="id-st" class="click-point" onclick="window.location='region?r=sulawesitengah'" onmouseover="popUp('id-st')">
                        	<path d="M491.7,219.5l-1.2-0.1l-0.6-1.2l-0.1-0.8l1.3,0.1l0.5,0.4l0.2,0.4L491.7,219.5z M463.8,221.3l-1,0.1l-1.7-2l-1-1.6l0.1-0.8
                        		l0.9-2.3l0.9-0.6l1,0.2l0.2,0.2l1.4,2.6l-0.1,3.3l-0.2,0.6L463.8,221.3z M475.9,206.8l0.6,4l0.2,0.4l-0.1,1l-2.2,1.9l-0.8,1.7
                        		l0.1,0.5l0.5,0.4l0.4,1l-0.2,1.3l-0.7,1.2l-0.9,0.3L471,220l-2.5-0.2l-0.5-0.2l-0.2-0.9l0.8-3l0.3-0.6l0.9-0.5l0.1-0.3l-0.1-1.5
                        		l-1-2.3l0.7-1.6l0.4-0.2l1-0.1l1.1-0.3l1.4-1.1l1.6-0.8L475.9,206.8L475.9,206.8z M484.4,207.9l0,2.1l-0.2,0.9l-0.6-0.7l0.1-1
                        		l-0.7-1.1l-0.4,0.2l0.2,2.1l-0.4,0.3l-0.6-0.3l-0.1-0.3l0-0.4l0.4-0.5l0-0.4l-0.1-0.1l-0.4,0.2l-0.5,1.3l-0.4,1.9l-0.2,2.8l0.7,0.6
                        		l0.4-0.1l2.9,2.3l0,0.4l-1.2,1.6l-1.6,0.7l-0.3-0.1l-0.6-0.4l-1.7,0.8l-0.5,0.4l-0.2,0.7l0.7,0.1l0.2,0.3l-0.2,0.6l-1.3,2l-0.4,0.3
                        		l-2.6-0.1l-0.9-1.5l-0.6-1.6l2.9-4.4l0.8-2.1l1.3-5.5L478,207l0.4-1.3l0.9-1.8l2-1.4l0.5-0.1l0.4,0.1l-0.3,0.5l0.2,0.8l1,0.6l1,1.4
                        		L484.4,207.9L484.4,207.9z M482.1,196.2l0.4,0.1l1.5-0.4l0.7,0.7l0.4,0.7l-0.1,0.7l-1.6,2.1l-0.3,0.1l-1.4-0.1l-0.9-0.9l-0.9-1.2
                        		l-0.2-0.5l0-0.7l0.9-1l0.7-0.1L482.1,196.2L482.1,196.2z M484.3,147.3l0.5,1l-0.7,1.1l0.9,1.6l0.4-0.1l0.4-1l0.5-0.4l0.2-0.5
                        		l0.6-0.7l0.8-0.4l2.5,1.2l-0.4,2.8l-0.7,0.4l-0.6,0.9l-0.5,0l-1.2-0.6l-0.3-0.6l-0.7-0.7l-0.5,0.2l-0.3,0.5l-0.2,0.6l-0.1,1.7
                        		l-0.2,0.3h-0.3l-0.5,0.3l-0.5-0.3H483l-0.3-0.1l-0.1-0.4l0.2-0.3l0.4,0l0.8-0.9l-0.3-1.1l-0.3-2.2l-0.2-0.3l-0.4,0.3l-1.2,1.3
                        		l-0.3,1.1l-0.7,0.9l0,0.3l-1.2,1.1l-0.4,0.2l-0.5-0.1l-0.7-1.6l-0.5-0.2l-0.2-0.3v-0.9l0.5-1.8l1-1.2l0.3-0.5l0.3-0.4l0.4,0
                        		l0.7,0.4l0.4-0.3l2-0.6l0.6,0.7l0.4-0.9h0.3L484.3,147.3L484.3,147.3z M450.3,105.9l0.4,0.1l2-0.3l0.9-0.8h0.3l0.3,0.2v0.4
                        		l-0.2,0.3l-0.6,0l-0.2,0.2l0.2,0.1l0.2,0.7l0.6,0.8l0.9,1l0.6,0.3l0.7,0.2l5.7-0.8l0.2,0.1l0.6,1.2l0.3,0.1l0.4-0.1l0.9-0.7l0.5,0
                        		l1.8,0.7l0,0l-2.3,0.8l-0.3,0l-0.5,0.6h-0.4l-0.1,0.7l-0.3,0.3l-0.4-0.2l-0.5-0.5l-0.5-0.8l-0.9,0.1l-0.8,0.6l-1.1,0.3l-2.1,1h-1.5
                        		l-0.5,0.4l-1.3-0.1l-0.9-0.5l-0.4,0.4l0,1l-0.5,0.1l-1-0.4l-1.1,0.4l-0.4,0.3l-0.1,1.1l-0.3,0.2l0.3,0.4l0.6,0.3l0.5,0.8l1.1,0.3
                        		l0.7,0l0.2,1.5l-0.3,0.5l0,0l-1.4-0.4l-1.7,0.4l-0.6,0.8l-2-0.2l-1.5,0.3l-0.6-0.2l-0.4-0.4l-1.9-0.6l-0.8-0.5l-3.4-0.2l-1.1,0.7
                        		l-1.7,0.6l-1.7,1.7l-2.1,3.1l0.4,0.3l-0.5,0.8l-0.2,2.1l-0.6,0.6l-0.5-0.1l0.1,1.3l-0.5,1l0,1.4l0.4,0.6l0,0.9l0.6,1.5l-0.3,0.9
                        		l-0.1,2.2l0.3,0.7l1.2,1.8l2.4,2.6l0.2,0.5l0.5,0.3l0.4,0l0.8-0.5l0.3-0.1l0.6,0.4l0.2,0.6l1.1,0.1l1.4,2.3l-0.5,1.5l0.1,0.6
                        		l0.3,0.5l0.5,0.2l1,2.2l0.5,0.1l0.8-0.4l0.3-0.6l0.5-0.2l0.7,0v0.7l0.2,0.3l0.5,0.2l1.2-0.2l2.4,0.3l0.4-0.3l1-1.2l1.1-2.2l2.2-2.8
                        		l0.4-0.1l0.3-0.5l0.9-0.7l0.7-1.2l0.6-0.4l1.1-0.3l0.2-0.9l0.5-0.1l0.3,0l0.3,0.3l-0.3,1.5l0.3,0.4h0.3l1.1,0.6l2.2,0.3l0.9,0.4
                        		l1.3-0.9l0.8-0.1l0.7,0.3l0.5,0l0.5-0.5l0.4-2l1.5-0.6l1,0.4l2.7-1l3.7,0.5l1.7,0l2.6-0.3l0.7-0.4l-0.1-0.3l-1.4-0.5l-2-0.2
                        		l-0.5-0.3l0-0.3l1.5-0.6l1.5-0.2l1.8,0l0.5-0.1l0.4-0.6l0.2,0l2.7,0.1l1.5,0.6l1.7,0.9l0.8,1.9l-0.1,1.2l-0.8,0.9l-0.3,1.9
                        		l-0.5,0.7l-0.3,0.2l-1.1-0.2l-0.4-0.2l-1.3-1.5l-0.3-0.9l-1.5-0.3l-4.3,0.6l-0.4,0.5l-0.1,0.7l-0.5,0.9l-1.3,1.4l-1,1.7l-1.2,0.9
                        		l-2.1,2.2l-1.1,1.4l-3.7,2.1l-2.6,0.3l-1,0.7l-2,0.4l-0.7,0.5l-1,2.4l-0.9,0.9l-0.5,0.3l-1.1,0.2l-1.1-0.1l-0.3-0.6l-1.3-1.3
                        		l-2-0.8l-0.5,0.3l-0.2,1l0.9,2.5l0.4-0.3l1.1-0.1l0.9,1l1.5,2.2l0.9,0.3l0.9-0.2l0.8,0.2l2.1,2.2l2.3,3.9l0.8,2.5l2,1.6l3,2.1
                        		l0,0.7l-0.7,1.1l0,0.4l1.9,1.7l0.3,0.1l0.5-0.3l0.9,0.7l-1.1,1.3l-1-0.3l-0.3,0.3l0,0l-0.1-0.4l0.1-0.2l-0.2-0.1l-0.5,0l-0.4-1
                        		l-0.5,0.1l-0.4-0.6l-0.4-0.2l0.1-0.9l-0.2-0.3l-1.1-0.2l-0.5-0.7l-0.4-0.2l-1,0.1l-0.7-0.1l-0.6,0.3l-2-0.6l-2.6-1.1l0,0l0.3-0.8
                        		l0.4-0.2l0.8-1.5l0.3-0.3l0.6-0.2l-1.3-2.6l-0.6-0.5l-0.5,0.1l-0.7-1l-0.8-0.1l-0.6-0.2l-1.3-1l-0.7-0.1l-0.9,0.1l-1-0.6l-1.7-0.3
                        		l-4.7-2l-0.8-0.1l-0.2-0.2l-1-0.1l-0.5,0.1l-0.1,0.3h-0.8l-0.8-0.3l-1.3-0.7l-1.1-1.1l-1.5-2L437,161l-1.3-1.4l-0.3,0.1v0.4
                        		l-0.8,2.5l-1.3-0.6h-1.8l-0.8-0.4l-0.1-0.6l-1.5,0.1l-0.3-0.2l-0.9,0.9l-0.6,0.1l-0.3,0.3l-0.4-0.5l0,0l-0.2-0.9l0.4-0.2l-0.1-0.3
                        		l0-2.8l-0.3,0.1l-0.6-0.2l-0.6,0.1l-0.4-0.3l0.1-0.5l0.3-0.4l-0.4-0.8l-0.4-0.1l0.1-0.6l-1-1l-0.3-0.9l0.5-0.6l0.1-0.3l-0.6-0.6
                        		l-0.8-0.4h-0.4l-0.6,0.5l-0.6,0.1l-0.4-0.6l-0.4,0.1l-0.3-0.2l-0.5-0.6v-0.3l0.6-0.1l0.6-0.3l-0.1-0.3l-0.5,0.2l0.2-0.4l1.5-0.2
                        		l0.2-0.4l0-0.6l0.5-1.2l0-0.5l-0.4,0.1l-0.1-0.3l-0.1-1.4l-0.3-0.9V143l0.2-0.6l-0.1-0.9l0,0l1.9-1.6l0.1-1l0.6-0.6l0.3,0l0.9,1.9
                        		l0.2,1l0.6,0.9l0.2,0l0.3-0.5l0.1-0.5l-0.3-1.8l-0.8-1.1l-0.8-2.8l0.1-2.6h0.2l0.1-0.8l0.6-1.6l-0.3-1.2l-1.4,0.4l-0.3-0.1
                        		l-0.7-0.5l-1-1.8l1.1,0.2l-0.1-0.6l0.9,0.4l0.5,0.4l0,0.4l0.5,0.3l0.2,0.5l0.7,0.2l0.7-0.8l0.4-1l0-1.6l-0.3-0.6l-1.3-1.4l-0.1-0.4
                        		l0.4-0.3l0.8,0.3l0.9,0l0.1-0.3l-0.3-1l-0.6-0.7l0-0.2l0.5-0.8l0-0.7l0.4-0.7l0.6-0.4l1-0.1l0.5-0.4l0.1-0.8l-0.4-1.7l0-0.5
                        		l0.2-0.3l0.7-0.6h0.8l1.8-1l0.3-0.5l0-1.5l0.2-0.7l0.6-0.4l0.6,0l0.3,0.2l0.1,0.5l-0.2,1.1l0.1,0.4l1.4,0.9l2.7,0.5l0.5-1.2
                        		l0.1-0.8l0.6-1l0.7-0.7l1.1-0.4l0.8-0.9l0.5-2.3l-0.2-1.4l0.2-0.8l2.1-0.3l2.5,0.3l0.8,0.3L450.3,105.9L450.3,105.9z"/>
                        </g>
                        <g id="id-su" class="click-point" onclick="window.location='region?r=sumaterautara'" onmouseover="popUp('id-su')">
                        	<path d="M55.6,131.3l0.4,0l0.7,0.8l0.5,0.9l0,0.5l-0.3,0.4l0.2,0.2L57,135l0.1,0.5l-0.2,0.3l-0.3,0.1l0.4,0.8l-0.1,0.2l-0.2,0.1
                        		l-0.4,0.1l0.2-0.6l-0.1-0.1l-0.3,0.3l-0.3-0.1l-0.2,0.1l-0.2,0.4l0.2,0.3l-0.1,0.3l-0.3-0.4l-0.6-0.4l-1.4-0.5l0.6-0.3l0,0.2l0.3,0
                        		l0.2-0.8l0.3-0.2l-0.1-1.2l0.2-0.8l0.4-0.4l0.4-0.2l0.2-0.4l-0.5-0.7L55.6,131.3L55.6,131.3z M55.1,127.1l0.1,0.2l0.3-0.2v0.5
                        		l1.1,1.3l0.1,0.6l-0.1,0.4l0.3,0.5l0,0.3l1,0.7l0.4,0.6l-0.1,0.9l-0.4,0l-0.1,0.2l0.3,0.6l-0.1,0.2l-0.5-1.2l-0.3-0.2l-1-1.6
                        		l-0.3-0.1v-0.4l-1.1-1.4v-0.1l-0.3-0.9l-1-0.5l1-0.5L55.1,127.1L55.1,127.1z M59,124.1l1,0.1l0.5-0.1l0.3,0.3l1.3-0.3l1,1l-0.1,0.4
                        		l0.1,0.1l-0.4,0.1l-0.2-0.2l-0.6-0.1l-0.5,0.4l-0.4,0.1l-0.4-0.2l-0.9,0.1l-0.9-0.3l-0.9,0l-0.3-0.2l-0.1-0.7l0.8-0.5l0.7-0.1
                        		L59,124.1z M40,102.6l0.3,0.8l2.5,3.3l1.8,0.6l2.1,1.9l0.5,1.2l-0.7,1.6l-0.2,4l-0.3,0.5l-1,1.1l-1.9-0.5l-0.3-0.4l0.2-0.3
                        		l-1.3-3.4l-2.1-2.1l-1-0.1l-0.5-0.2l-0.3-1l-0.8-1.6l-1.6-2.7l-2.3-2.3l0.8-0.3l1.1,0.1l0.5-0.1l1.4-1.2l1.1-0.2l1.5,0.5L40,102.6z
                        		 M56.9,98.5l0.7,0.1l0.3-0.5l0.4,0.3l0.4,0.7L58,99.2l-1.3-0.1L56,98.9l-0.2-0.5l0.5-0.6l0.6,0.3L56.9,98.5L56.9,98.5z M21.2,86.8
                        		l-1.7-0.2l-0.3-0.2l-0.3-1l-4.1-2.7l-3.1-1.1l-1-0.2l-2-1.9l-0.2-0.6l0.1-0.3l1.6-2l1.6,0.3l2,2.4l0.6,0.3l1.2,0.2l2,2.1l2.3,1.6
                        		l1.5,0.6l0.5,0.7l0,0.5l0.4,1.1L21.2,86.8L21.2,86.8z M50.9,90.1l0.6-2.8L51,85.7l-0.8-0.3l0.1-0.7l-0.4-0.6l-0.2-1l0.2-1.4
                        		l0.6-0.2l0-0.3l-0.5-0.5L49.8,80l0.1-0.4l0.3-0.5l-0.2-0.3l0-0.3l-1-0.1l-0.6-1.1l-0.9-0.2v-1.1l-0.3-0.9l0-0.5l-0.2-0.3l0.2-0.1
                        		l0.6,0.1l0.1-1l-0.6-0.7L47.3,72l-0.5-0.5l-0.6-0.1l-0.1-0.2l2.4-0.7l0.2-0.8l-0.4-0.7l-0.3,0.1l-0.7-0.4l0-0.4l-0.3-0.6l0.3-0.5
                        		l-0.6-0.4l-0.2-0.9l-0.7-0.3l0-0.7l-0.3-0.2v-0.3l-0.5-0.5L44.9,63l0.4-0.6l1.5-1.2l0.1-0.3l-0.4-0.7l0.1-0.3l0.2,0l0.6,0.4
                        		l0.2-0.3l-0.1-0.4l1.2-0.7l0.2-1.3l0.2-0.3l0-1l0.5-0.7l-0.2-0.5l0.4-0.2l0-0.4L49.5,54l0.1-0.2l0.4,0.1l0.6-0.1l0.3-0.1l0.1-0.3
                        		l0.8-0.2l0.8,0.2l0.4-0.1l0,0l0.1,2.7l0.8,1l1.2,0l1.5,0.6l1.1,0.7l0.8,1.3l1.7,0.4l0.3,0.6L60.3,61l0.2,0.8l2.1,1.4l2.2,0.7l1.8,1
                        		l4,2.5l1.2,1.1l1.2,0.5l0.9,0.7l0.7,1.3l0.4,0.3l0.5,0.3l1.4,0.4l1.9,1.1l2.4,2.4l1.4,1.1l0.1,0.3l0.1,2.2l-0.1,0.6L82,80.4l0,0.4
                        		l1.1,1.3l-0.3,0.3l0.5-0.2l-0.3-0.8l0.2-0.5l-0.5-0.4l-0.4,0l0-0.1l0.9-0.6l0.4,0.1l0.7,0.8l-0.1,1.4l0.7,1.7l0.1,0l-0.4-1.6v-0.7
                        		l0.3-0.5l0.6-0.3l0.6,0l0.7,0.9l0.7,1.3l0.5,0.5l0.2,0.6l-0.4,1.3l0.1,2l0.7,1.6l0.2,0.9l-0.5,1.7l-0.2,3l-0.5,1.3v0.4l0.3,0.3
                        		l1.9,0.3l0.2,0.8L90,97.6l0,0.4l0.6,0.1l0.1,0.3l-0.1,0.4l0.2,0.3l-0.1,0.5l-0.4,0.7l-0.1,0.4l0.2,0.2l-0.1,0.5l-0.8,0.7h-0.8
                        		l0,0.4l-0.3,0.2l-0.6-0.1l-0.5,0.1v0.3l-3,0.2l-0.4,0.3l0,0.4l0.2,0.2l0.2,0l0.5,0.9l0.2,1.6l0.3,0.5l0.6,0.4l0.1,0.3l-0.6,0.1
                        		l-0.6,0.3l0,0.4l0.4,0.2l0.3,1l-0.2,0.6l-0.2,0.3l-0.8,0v0.2l0.4,0.5l0.4,0l-0.1,0.4l0.1,0.7l-0.3,0.2l0.5,0.7L86,114l-2.1-0.7
                        		l-0.3-0.3l-1.3-0.5l-0.3-0.7l-0.7,0.1l-0.4-0.3l-0.3,0l-0.6,0.3l0.1,2.1l-0.3,0.3v0.3l0.3,0.8h0.6l0.6,0.2l0.1,1.2l0.7,0.5v0.7
                        		l-0.7,0.8l-0.5,0.3l-0.7,0.1l-0.6,0l-0.1-0.2l-0.5-0.1l-0.3,0l-0.8,0.4l-0.6-0.5l-0.1-0.4l-0.5-0.7l-1.5,0.5l-1.1-0.4l-1.2,0.8
                        		l-0.5,0.1l-0.9,1.6l-0.6,0.8l-0.8,0.1l-0.8,0.3l-0.9,1.4l-0.2-0.1l-0.3-0.2l0.3-0.2v-0.9l-0.8-0.5l0.4-1.2l-0.6-2.9l-1.2-3.3
                        		L65,111l-2.2-6.4l-1.3-3l-0.8-1.1l0-0.3l0.2,0l0.5,0.5l0.2,0.1l0.2-0.2l0.8-1.3l0-0.8L61.6,97l-0.8-0.6l-0.3,0l-0.2,0.3l0.5,0.2
                        		l0.2,0.7l-0.4,0l-0.7-0.5l-2-2.8l-0.6-0.5l-1.5-0.9l-3.4-1.7L50.9,90.1L50.9,90.1z"/>
                        </g>
                        <g id="id-yo" class="click-point" onclick="window.location='region?r=yogyakarta'" onmouseover="popUp('id-yo')">
                        	<path d="M270.3,268.5l-2-0.1l-5.9-2.1L262,266l-0.3-0.5l-2-0.6l-2.5-1.3l-1.3-0.5l0,0l0.6,0l0.3-1.3l0.4-0.2l0.2-0.4l0.3-0.1
                        		l0.3-0.5l0.1-0.9l-0.3-0.3l0.2-0.4l0.6-0.2l1.3,0.1l0.3-0.1l0.2,0.2l0,0.6l0.3,0.1l0.6-0.8l2.4-1.9l0.8,3.9l0.3,0.1l0.4,0.4
                        		l0.4-0.2l0.2,0.1l0.2,0.3l1.1-0.2l0.1,0.1l0.2-0.2l0.2,0.3l0.4,0l0.2-0.2l0.3,0.1l0.4,0.5l0.2-0.3l0.3,0.2l0,0.9l-0.3,0.8l0,1.1
                        		l-0.2,0.5l0.6,1.6l0,0.8l0.2,0.2l0.3-0.4l0.2,0L270,268l0.1,0.1l0.2-0.2l0.1,0L270.3,268.5z"/>
                        </g>
                    </svg>

                </div>
            </div>
            
            <div class="row justify-content-center mf16-f12 mb50 cl-aqua-forest showondesktop">
                <img src="img/asset/landing/information.svg" alt="petunjuk penggunaan peta interaktif Coronavirus Indonesia di Sehatdirumah.com">
                <i class="ml7"><b class="cl-tangerine"><u>arahkan kursor </u></b>pada peta untuk melihat info, <b class="cl-tangerine"><u>klik pada peta </u></b>untuk menuju ke tinjauan provinsi</i>
                
            </div>
            
            
            
            
            <div class="row justify-content-center text-center mb10">
                <div class="col mf24-f16">
                    <span class="cl-aqua-forest mr5" id="minval"><?php echo getData(landing_maps, totalkasus, datatype, minval0) ?></span>
                    <span class="ld-scalebar1"></span>
                    <span class="cl-tangerine ml5" id="maxval"><?php echo getData(landing_maps, totalkasus, datatype, maxval0) ?></span>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col mf24-f16">
                    <span class="cl-aqua-forest">menampilkan peta tanggal : </span>
                    <span class="cl-tangerine font-weight-bold" id="currentdate"><?php echo dateSpellYear(dateEdit(getLastDate(),1),id) ?></span>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <style id="mapstyle">
                    <?php echo getData(landing_maps, totalkasus, datatype, hsl0) ?>
                </style>
                <div>
                    <a onmouseover="dateSw(56)" class="click-point"><span class="date-sw" id="doffset56"><?php echo dateSpell(dateEdit(getLastDate(),57),id) ?></span></a>
                    <a onmouseover="dateSw(42)" class="click-point"><span class="date-sw" id="doffset42"><?php echo dateSpell(dateEdit(getLastDate(),43),id) ?></span></a>
                    <a onmouseover="dateSw(28)" class="click-point"><span class="date-sw" id="doffset28"><?php echo dateSpell(dateEdit(getLastDate(),29),id) ?></span></a>
                    <a onmouseover="dateSw(14)" class="click-point"><span class="date-sw" id="doffset14"><?php echo dateSpell(dateEdit(getLastDate(),15),id) ?></span></a>
                    <a onmouseover="dateSw(0)" class="click-point"><span class="date-sw-active" id="doffset0"><?php echo dateSpell(dateEdit(getLastDate(),1),id) ?></span></a>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col mf24-f16">
                    <span class="cl-aqua-forest">menampilkan peta : </span>
                    <span class="cl-tangerine font-weight-bold" id="currentdata">Total Kasus</span>
                </div>
            </div>
            <div class="row justify-content-center text-center mb60">
                <div>
                    <a onclick="dataSw('totalkasus')" class="click-point"><span class="data-sw-active" id="totalkasus">Total Kasus</span></a>
                    <a onclick="dataSw('kasus1juta')" class="click-point"><span class="data-sw" id="kasus1juta">Kasus /1 Juta</span></a>
                    <a onclick="dataSw('tingkatkematian')" class="click-point"><span class="data-sw" id="tingkatkematian">Tingkat Kematian</span></a>
                    <a onclick="dataSw('tingkatkesembuhan')" class="click-point"><span class="data-sw" id="tingkatkesembuhan">Tingkat Kesembuhan</span></a>
                    <a onclick="dataSw('totalkematian')" class="click-point"><span class="data-sw" id="totalkematian">Total Kematian</span></a>
                    <a onclick="dataSw('totalkesembuhan')" class="click-point"><span class="data-sw" id="totalkesembuhan">Total Kesembuhan</span></a>
                    <a onclick="dataSw('dalamperawatan')" class="click-point"><span class="data-sw" id="dalamperawatan">Dalam Perawatan</span></a>
                    <a onclick="dataSw('bebanrumahsakit')" class="click-point"><span class="data-sw" id="bebanrumahsakit">Beban Rumah Sakit</span></a>
                </div>
            </div>
        </div>
        
        <div>
            <div class="row justify-content-center mf16-f12 mt100 pt25 pb25 sticky-top" style="background-color:white; padding:20px; width:100%; top:3px;">
                <img src="img/asset/landing/information.svg" alt="petunjuk penggunaan peta interaktif Coronavirus Indonesia di Sehatdirumah.com">
                <span class="cl-aqua-forest ml7"><i><b>klik nama provinsi pada tabel</b> untuk menuju ke halaman ulasan regional </i></span>
            </div>
        

        <div class="container-fluid ld-table-xov"><!--ld-table-xov-->
            <!--Tabel kasus dunia, indonesia, dan provinsi di Indonesia-->
            <div class="d-flex justify-content-center">
                <div class="p-2">
                    
                    
                    <!--Scalebar kecepatan pertumbuhan dan last update-->
                    <div class="row justify-content-start">
                        <div id="statistik-indonesia"  class="col cl-aqua-forest plr0 mb20">
                            <div class="mf24-f16 font-weight-bold"><em>Update <?php echo rankv_dateview(-1) ?><a class="a-none a-inh-sup click-point"  data-id="60"><sup>[60]</sup></a></em></div>
                            <div class="mf16-f12"><em>*Kasus daerah lebih lambat 1 hari mengikuti publikasi resmi Kemenkes<a class="a-none a-inh-sup click-point" data-id="61"><sup>[61]</sup></a></em></div>
                        </div>
                        <div class="col plr0 d-none">
                            <div class="d-flex justify-content-end">
                                <div class="p-2">
                                    <div class="row justify-content-between ld-gspeedlegend-w">
                                        <div class="col mf16-f12 font-weight-bold cl-aqua-forest pl0">Melambat<a class="a-none a-inh-sup click-point" data-id="62"><sup>[62]</sup></a></div>
                                        <div class="col mf16-f12 font-weight-bold cl-tangerine text-right pr10">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="63"><sup>[63]</sup></a></div>
                                    </div>
                                    <div class="ld-scalebar2"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-hover ltable-font">
                        <thead>
                        <tr>
                            <th class="ld-ntb ld-nlb">Tren Pertambahan Kasus 60 hari Terakhir<a class="a-none a-inh-sup click-point" data-id="85"><sup>[85]</sup></a></th>
                            <th class="ld-ntb">Region<a  class="a-none a-inh-sup click-point" data-id="68"><sup>[68]</sup></a></th>
                            <th class="ld-ntb">Total kasus<a h class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></th>
                            <th class="ld-ntb">+kasus<a  class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></th>
                            <th class="ld-ntb">Total sembuh<a  class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></th>
                            <th class="ld-ntb">+sembuh<a  class="a-none a-inh-sup click-point" data-id="12"><sup>[12]</sup></a></th>
                            <th class="ld-ntb">Total meninggal<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></th>
                            <th class="ld-ntb ld-nrb">+meninggal<a class="a-none a-inh-sup click-point" data-id="10"><sup>[10]</sup></a></th>
                            <!--<th class="ld-ntb ld-nrb">Kecepatan pertumbuhan 60 hari Terakhir (%)<a class="a-none a-inh-sup click-point" data-id="69"><sup>[69]</sup></a></th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php fcLandingTable() ?>
                        
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        </div>
        


        <div>
            <div class="row justify-content-center mf16-f12 mt100 pt25 pb25 sticky-top" style="background-color:white; padding:20px; width:100%; top:3px;">
                <img src="img/asset/landing/information.svg" alt="petunjuk penggunaan peta interaktif Coronavirus Indonesia di Sehatdirumah.com">
                <span class="cl-aqua-forest ml7"><i><b>klik nama provinsi </b> untuk menuju ke halaman ulasan regional </i></span>
            </div>
        

        <div class="container-fluid">
            <!--Kasus per 1 juta penduduk-->
            <div class="row justify-content-center text-center mt120 mb15">
                <div class="col">
                    <h2 class="f56 font-weight-bold cl-tangerine"><a class="a-none a-inh-sup click-point" data-id="51"><span class="cl-aqua-forest">Kasus per </span><span class="cl-tangerine">1 Juta Penduduk<a class="a-none a-inh-sup click-point" data-id="51"><sup>[51]</sup></a></span></a></h2>
                </div>
            </div>

            <!--Legend-->
            <div class="row font-weight-bold f24 mb70">
                <div class="col">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="p-2">
                            <div class="d-flex flex-nowrap">
                                <div class="p-2"><img  class='lazyload' data-src="img/asset/landing/legend/man%20grey%20b.svg" alt="man legend grey"></div>
                                <div class="p-2 mt20 cl-dusty-gray">&asymp;8 orang<a class="a-none a-inh-sup click-point" data-id="64"><sup>[64]</sup></a></div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="d-flex flex-nowrap">
                                <div class="p-2"><img  class='lazyload' data-src="img/asset/landing/legend/man%20orange%20b.svg" alt="man legend orang"></div>
                                <div class="p-2 mt20 cl-tangerine">Dalam perawatan<a class="a-none a-inh-sup click-point" data-id="5"><sup>[5]</sup></a></div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="d-flex flex-nowrap">
                                <div class="p-2"><img class='lazyload'  data-src="img/asset/landing/legend/man%20green%20b.svg" alt="man legend green"></div>
                                <div class="p-2 mt20 cl-aqua-forest">Sembuh<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></div>
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="d-flex flex-nowrap">
                                <div class="p-2"><img  class='lazyload' data-src="img/asset/landing/legend/man%20black%20b.svg" alt="man legend black"></div>
                                <div class="p-2 mt20">Meninggal<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--Kasus daerah per 1 juta penduduk view-->
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-12 f24 cl-dusty-gray font-weight-bold">
                    <?php landingkasussatujuta() ?>
                    
                </div>
            </div>

            <!-- Jarak Aman-->
            <div class="row justify-content-center text-center mt120 mb25">
                <div class="col">
                    <a href="peringkat?v=jarak1pasienpositifcorona" class="a-none">
                        <h2 class="f56 font-weight-bold cl-tangerine"><span class="cl-aqua-forest">Jarak 1 Pasien </span><span class="cl-tangerine">Positif Corona dari Anda<a class="a-none a-inh-sup click-point" data-id="37"><sup>[37]</sup></a></span></h2>
                    </a>
                    
                </div>
            </div>
            <div class="row justify-content-center text-center f24 mb30">
                <div class="col">
                    <div><em>Ketahui kemungkinan untuk bertemu dengan 1 pasien positif corona pada setiap wilayah. Pastikan anda berpergian dalam jarak aman.</em></div>
                </div>
            </div>

            <div class="row justify-content-center text-center mt25 mb15">
                <div class="col">
                    <img  class='lazyload' data-src="img/asset/landing/safe%20radius.svg" alt="Radius aman di setiap wilayah (safe radius for every region)">
                </div>
            </div>

            <div class="row">
                <div class="col plr0">
                    <div class="d-flex justify-content-center">
                        <div class="p-2">
                            <div class="row justify-content-between" style="width:310px;">
                                <div class="col f12 font-weight-bold cl-aqua-forest pl0">Jauh<a class="a-none a-inh-sup click-point" data-id="65"><sup>[65]</sup></a></div>
                                <div class="col f12 font-weight-bold cl-tangerine text-right pr10">Dekat<a class="a-none a-inh-sup click-point" data-id="66"><sup>[66]</sup></a></div>
                            </div>
                            <div class="ld-scalebar2"></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        </div>

        <!--Jarak aman-->
        <div>
            <div class="row justify-content-center mf16-f12 mt100 pt25 pb25 sticky-top" style="background-color:white; padding:20px; width:100%; top:3px;">
                <img src="img/asset/landing/information.svg" alt="petunjuk penggunaan peta interaktif Coronavirus Indonesia di Sehatdirumah.com">
                <span class="cl-aqua-forest ml7"><i><b>klik nama provinsi </b> untuk menuju ke halaman ulasan regional </i></span>
            </div>
            
            <div class="row justify-content-center text-center f24 font-weight-bold cl-aqua-forest mt70">
                <div class="col">
                    <div class="mb50">
                        <img  class='lazyload' data-src="img/asset/landing/scroll%20icon.svg" alt="scroll icon">
                    </div>
                    <div>
                        <img  class='lazyload' data-src="img/asset/landing/man%20you.svg" alt="man illustration your location">
                    </div>
                    <div>Anda</div>
                </div>
            </div>
        
        <div class="ld-graddownrep">
            <div class="container text-center pt23">
                <?php landingjarakaman() ?>
                
                </div>
            </div>
        </div>
        
        </div>
        
            <style>
                .bg-hospitalload-val{
                    background-color:rgba(76,139,115,0.85);
                    padding:1px 4px;
                    border-radius:4px;
                }
                @media(min-width:985px){
                    .ld-hl-container{
                        max-width:1200px;
                    }
                }
                @media(min-width:1650px){
                    .ld-hl-container{
                        max-width:93%;
                    }
                }
                
            </style>
        
        <div class="container ld-hl-container">
            <div class="row justify-content-center text-center f24 font-weight-bold cl-tangerine mt10">
                <div class="col">
                    <div>
                        <img class='lazyload'  data-src="img/asset/landing/man%20positive.svg" alt="illustration of positive people">
                    </div>
                    <div>1 Positif Corona</div>
                </div>
            </div>

            <!--Beban Rumah Sakit-->
            
            <div class="row justify-content-center text-center mt120">
                <div class="col">
                    <h2 class="f56 font-weight-bold cl-tangerine"><span class="cl-aqua-forest">Beban </span><span class="cl-tangerine">Rumah Sakit<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></span></h2>
                </div>
            </div>
            <div class="row justify-content-center text-center mf24-f16 mt20 mb90">
                <div class="col">
                    <div><em>Rasio keterisian tempat tidur dan jumlah kasus yang masih membutuhkan perawatan di rumah sakit digunakan untuk memperkirakan beban rumah sakit eksisting</em></div>
                </div>
            </div>
            <div class="row mb120">
                <div class="col">
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="p-2"><img  class='lazyload' data-src="img/asset/landing/hospital%20load.svg" alt="hospital load illustration"></div>
                        <div class="p-2 font-weight-bold mf24-f16">
                            <div class="cl-turquoise-blue pt28hl"><em>Estimasi kemampuan RS</em><a class="a-none a-inh-sup click-point" data-id="72"><sup>[72]</sup></a></div>
                            <div class="cl-crusta pt25hl"><em>Kapasitas terpakai oleh corona</em><a class="a-none a-inh-sup click-point" data-id="73"><sup>[73]</sup></a></div>
                            <div class="cl-trinidad pt33hl"><em>Bed Occupancy Ratio (BOR) rata-rata daerah</em><a class="a-none a-inh-sup click-point" data-id="74"><sup>[74]</sup></a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mf16-f12 mt100 pt25 pb25 sticky-top mb25" style="background-color:white; padding:20px; width:100%; top:3px;">
                <img src="img/asset/landing/information.svg" alt="petunjuk penggunaan peta interaktif Coronavirus Indonesia di Sehatdirumah.com">
                <span class="cl-aqua-forest ml7"><i><b>klik nama provinsi </b> untuk menuju ke halaman ulasan regional </i></span>
            </div>

            <!--Project Rumah Sakit-->
            <style>
                <?php landingbebanrscss() ?>
            </style>
            <?php $rsval=landingbebanrsvalue(); ?>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <div class="ld-rs-sign text-center">
                            <img class="mt66 lazyload" data-src="img/asset/landing/hospital%20sign.svg" alt="hospital sign">
                        </div>
                    </div>
                    <div class="d-flex flex-nowrap justify-content-center cl-white">
                        <!--left-->
                        <div class="ld-rs-borderleft d-flex flex-wrap justify-content-end ml-auto">
                            <div class="d-flex d-sm-none">
                                <a href="region?r=kepulauanriau" class="a-none">
                                    <div class="hl-kr ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['kr'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Kepulauan Riau</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-end">
                                <a href="region?r=aceh" class="a-none">
                                    <div class="hl-ac ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ac'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Aceh</span></div>
                                    </div>
                                </a>
                                <a href="region?r=bengkulu" class="a-none">
                                    <div class="hl-be ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['be'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Bengkulu</span></div>
                                    </div>
                                </a>
                                <a href="region?r=jambi" class="a-none">
                                    <div class="hl-ja ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ja'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Jambi</span></div>
                                    </div>
                                </a>
                                <a href="region?r=bangkabelitung" class="a-none">
                                    <div class="hl-bb ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['bb'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Bangka Belitung</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-end">
                                <a href="region?r=jakarta" class="a-none">
                                    <div class="hl-jk ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['jk'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">DKI Jakarta</span></div>
                                    </div>
                                </a>
                                <a href="region?r=jawabarat" class="a-none">
                                    <div class="hl-jb ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['jb'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Jawa Barat</span></div>
                                    </div>
                                </a>
                                <a href="region?r=jawatengah" class="a-none">
                                    <div class="hl-jt ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['jt'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Jawa Tengah</span></div>
                                    </div>
                                </a>
                                <a href="region?r=jawatimur" class="a-none">
                                    <div class="hl-ji ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ji'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Jawa Timur</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-end">
                                <a href="region?r=kalimantanbarat" class="a-none">
                                    <div class="hl-kb ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['kb'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Kalimantan Barat</span></div>
                                    </div>
                                </a>
                                <a href="region?r=kalimantanselatan" class="a-none">
                                    <div class="hl-ks ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ks'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Kalimantan Selatan</span></div>
                                    </div>
                                </a>
                                <a href="region?r=kalimantantengah" class="a-none">
                                    <div class="hl-kt ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['kt'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Kalimantan Tengah</span></div>
                                    </div>
                                </a>
                                <a href="region?r=kalimantantimur" class="a-none">
                                    <div class="hl-ki ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ki'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Kalimantan Timur</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-end">
                                <a href="region?r=kalimantanutara" class="a-none">
                                    <div class="hl-ku ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ku'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Kalimantan Utara</span></div>
                                    </div>
                                </a>
                                <a href="region?r=nusatenggaratimur" class="a-none">
                                    <div class="hl-nt ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['nt'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">NTT</span></div>
                                    </div>
                                </a>
                                <a href="region?r=nusatenggarabarat" class="a-none">
                                    <div class="hl-nb ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['nb'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">NTB</span></div>
                                    </div>
                                </a>
                                <a href="region?r=bali" class="a-none">
                                    <div class="hl-ba ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ba'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Bali</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--center-->
                        <div class="ld-rs-bordercenter d-sm-flex flex-column d-none">
                            <div class="d-sm-flex flex-wrap flex-md-nowrap d-none">
                                <a href="region?r=kepulauanriau" class="a-none">
                                    <div class="hl-kr ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['kr'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Kepulauan Riau</span></div>
                                    </div>
                                </a>
                                <a href="region?r=lampung" class="a-none">
                                    <div class="hl-la ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['la'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Lampung</span></div>
                                    </div>
                                </a>
                            </div>
                            <!--<div class="d-flex"></div>-->
                            <div class="ld-rs-doorframe align-content-end justify-content-center text-center mt-auto d-flex d-none">
                                <div class="d-flex flex-nowrap justify-content-center">
                                    <div class="ld-rs-leftdoor"></div>
                                    <div class="ld-rs-rightdoor"></div>
                                </div>
                            </div>
                        </div>
                        <!--right-->
                        <div class="ld-rs-borderright d-flex flex-wrap justify-content-start mr-auto">
                            <div class="d-flex d-sm-none">
                                <a href="region?r=lampung" class="a-none">
                                    <div class="hl-la ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['la'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Lampung</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-start">
                                <a href="region?r=riau" class="a-none">
                                    <div class="hl-ri ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ri'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Riau</span></div>
                                    </div>
                                </a>
                                <a href="region?r=sumaterabarat" class="a-none">
                                    <div class="hl-sb ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['sb'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Sumatera<br>Barat</span></div>
                                    </div>
                                </a>
                                <a href="region?r=sumateraselatan" class="a-none">
                                    <div class="hl-ss ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ss'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Sumatera Selatan</span></div>
                                    </div>
                                </a>
                                <a href="region?r=sumaterautara" class="a-none">
                                    <div class="hl-su ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['su'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Sumatera Utara</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-start">
                                <a href="region?r=banten" class="a-none">
                                    <div class="hl-bt ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['bt'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Banten</span></div>
                                    </div>
                                </a>
                                <a href="region?r=yogyakarta" class="a-none">
                                    <div class="hl-yo ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['yo'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">DI Yogyakarta</span></div>
                                    </div>
                                </a>
                                <a href="region?r=gorontalo" class="a-none">
                                    <div class="hl-go ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['go'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Gorontalo</span></div>
                                    </div>
                                </a>
                                <a href="region?r=sulawesibarat" class="a-none">
                                    <div class="hl-sr ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['sb'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Sulawesi<br>Barat</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-start">
                                <a href="region?r=sulawesiselatan" class="a-none">
                                    <div class="hl-sn ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['sn'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Sulawesi Selatan</span></div>
                                    </div>
                                </a>
                                <a href="region?r=sulawesitengah" class="a-none">
                                    <div class="hl-st ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['st'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Sulawesi Tengah</span></div>
                                    </div>
                                </a>
                                <a href="region?r=sulawesitenggara" class="a-none">
                                    <div class="hl-sg ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['sg'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Sulawesi Tenggara</span></div>
                                    </div>
                                </a>
                                <a href="region?r=sulawesiutara" class="a-none">
                                    <div class="hl-sa ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['sa'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Sulawesi<br>Utara</span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-wrap justify-content-start">
                                <a href="region?r=malukuutara" class="a-none">
                                    <div class="hl-mu ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['mu'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Maluku Utara</span></div>
                                    </div>
                                </a>
                                <a href="region?r=maluku" class="a-none">
                                    <div class="hl-ma ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['ma'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Maluku</span></div>
                                    </div>
                                </a>
                                  <a href="region?r=papuabarat" class="a-none">
                                    <div class="hl-pb ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['pb'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Papua Barat</span></div>
                                    </div>
                                </a>
                                <a href="region?r=papua" class="a-none">
                                    <div class="hl-pa ld-rs-obj d-flex flex-column justify-content-between text-center">
                                        <div class="font-italic f16 mt14"><span class="cl-white bg-hospitalload-val"><?php echo $rsval['pa'] ?></span></div>
                                        <div class="font-weight-bold f20 mb10"><span class="cl-white">Papua</span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center mt30">
                <div class="col mf24-f16">
                    <span class="cl-mountain-meadow font-italic">Ringan<a class="a-none a-inh-sup click-point" data-id="70"><sup>[70]</sup></a></span>
                    <span class="ld-scalebar3"></span>
                    <span class="cl-mountain-meadow font-italic">Berat<a class="a-none a-inh-sup click-point" data-id="71"><sup>[71]</sup></a></span>
                </div>
            </div>


            <!--Informasi Lainnya-->
            <?php include_once('end-link-anotherinformation.php') ?>
        </div>

        <?php include_once('footer.html') ?>
        <?php include_once('def-bottom-header.html') ?>
        <script>
            <?php fcMapsDisplayScript()  ?>
        </script>
        <script>
            window.addEventListener("load", function(){
                const loader=document.querySelector(".loader");
                loader.className += " hidden"; // class="loader hidden"
            })
        </script>
        <script>
            <?php fcMapsInfoScript() ?>
            
 

        </script>
        
    </body>
</html>


<?php


// We're done! Save the cached content to a file
	//$fp = fopen($cachefile, 'w');
	//fwrite($fp, ob_get_contents());
	//fclose($fp);
	// finally send browser output
	//ob_end_flush();

?>