<?php

// define the path and name of cached file
	$cachefile = 'caching/region-'.$isocode.date('M-d-Y').'.php';
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
        <meta name="description" content="<?php echo $desc ?>">
        <meta name="viewport" content="width=870px, user-scalable=no">
        <title><?php metatitle() ?></title>
        <link rel="stylesheet" href="style-reg-view.min.css">
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
            .rg-heatmap-val-bg{
                background-color:#C20035;
                padding:0;
                color:#FFEEF2;
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
                        <div class="mf24-f16"><?php echo $desc ?></div>
                        
                        <er style="display:none;" id="sehatdirumahcomcaption">*<?php metatitle() ?>* &#10;&#13;<?php echo $desc ?> &#10;&#13;Kunjungi : <?php echo currentUrl($_SERVER) ?>&#10;&#13;#SehatdiRumah #KitaBisa</er>
                        
                        <div style="margin:30px 0px;" onclick="shareClicked('copylink','sharesalintautan');copyToClipboard('er#sehatdirumahcomcaption')" class="click-point">
                        <span>
                        <span class="align-items-center" style="padding:15px 25px; border-radius:10px; border:2px solid #979797;">
                        <img src="img/asset/sharelink.svg" alt="salin tautan pada halaman ini">
                        <span style="margin-left:5px; color:#979797;" class="mf24-f16 font-weight-bold" id="sharesalintautan">Salin tautan halaman ini</span>
                        </span>
                        </span>
                        </div>
                        
                        
                        
                        <div style="padding:30px 0px;"onclick="shareClicked('sharewa','sharebagikankewa');copyToClipboard('er#sehatdirumahcomcaption')" class="click-point">
                        <a href="whatsapp://send?text=*<?php metatitle() ?>* %0a%0a<?php echo $desc ?> %0a%0aKunjungi : <?php echo currentUrl($_SERVER) ?>%0a%0a#SehatdiRumah #KitaBisa" class="a-none">
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
    <style>
        <?php echo $bchart0 ?>
    </style>
    <style>
        <?php echo $bchart1 ?>
    </style>
    <style>
        <?php echo $bchart2 ?>
    </style>
    <style>
        <?php echo $bchart3 ?>
    </style>
    <?php include_once('progressbar.html') ?>
    <?php include_once('navigation.php') ?>
    <?php include_once('_sys_announcement.php') ?>
    
    <div class="container">
        <!--Navigation Bar-->
        <?php include_once('static-navigation.html') ?>
        <hr class="cregview mt30">
        
        <div class="row justify-content-center mf16-f12 sticky-top" style="background-color:white; padding:20px; width:100%; top:3px;">
            <span class="cl-tangerine font-weight-bold">petunjuk :&nbsp;&nbsp;</span>
            <span class="cl-aqua-forest"><i><b>klik nama provinsi pada tabel</b> untuk menuju ke provinsi lain pada region yang sama </i></span>
        </div>

        <div class="row mt20">
            <!--branding provinsi, peta, dan tabel singkat-->
            <div class="col-4 col-md-3 col-lg-3 mt10">
                <div class="row">
                    <div class="d-flex bas-provlogo-bg">
                        <!--left stripped-->
                        <div class="bas-provlogo-strip"></div>
                        <!--Logo provinsi-->
                        <div style="height:55px; width:55px;" class="align-self-center d-flex flex-column justify-content-center pt12 pb12 pl5 pr10">
                            <img class="img-fluid" src="img/asset/regview/logo/<?php echo $logo ?>" alt="<?php echo $logoalt ?> - Indonesia">
                        </div>
                        <!--Tulisan Provinsi + nama provinsinya-->
                        <div class="d-flex flex-column flex-nowrap pt12 pb12 pl7 pr15">
                            <h1 class="f24c font-weight-bold cl-bas1 mb0">Provinsi<br><?php echo $namaprov ?></h1>
                        </div>
                    </div>
                </div>
                <!--Peta-->
                <div  class="align-self-center d-flex flex-column justify-content-center"  style="height:375px;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 398 107.544">
                        <defs>
                            <style><?php echo $maphsl ?></style>
                        </defs>
                        <g transform="translate(-332.516 -266.018)">
                            <g transform="translate(332.516 266.018)" class="click-point" onclick="window.location='region?r=bali'">
                                <path class="id-ba"
                                      d="M375.409,293.786l-1.112-.15-2.268-1.262-1.776-1.433.278-.792,1.348-1.219.6-.171H374.6l.6.342,1.326,2.46-.021.6Zm-41.118-26.613.834.385.706,1.219.706.214,1.433-.792,7.017,2.011,4.086.706,3.722-.364,1.433-.492,3.573-3.145,1.968-.9.727.171,9.755,3.637,4,2.5,2.717,3.509,2.781,1.5.3.77-.15.727-.642.877-2.867,2.439-4.172,2.118-2.075.706-2.011.171-2.567,1.219-2.139,2.011.086,1.6-2.867,1.69,1.134,1.433.257-.813.471,1.519-.77,1.091-2.289.642-2.054-.257-.406-.727,1.711-1.369,1.3-.556-.513-.963.6-1.348-.749-1.07-3-3.145-5.5-4.792-1.54-.877-3.423-1.326-3.038-.578-4.557.257-5.2-6.589-.578-4,.278-.92Z"
                                      transform="translate(-332.516 -266.018)"/>
                            </g>
                            <g transform="translate(384.052 266.874)" class="click-point" onclick="window.location='region?r=nusatenggarabarat'">
                                <path class="id-nb"
                                      d="M484.388,278.27l.257.685,1.433-.642-.086.342.62.727-.578.877-.706-.492-.3.685-.406.15-.321-.342-.321-2.032.406-.235v.278Zm-94.473-1.3.107.856-.385.642-.15,1.5-1.219,1.091-.9,3.658-3.423,5.092-.471,1.241-1.647,2.1-.214,1.241,1.391.043,1.07.749.792.171-1.005,1.348-1.326.428-.214-.385-.492.064-.963.642-1.326-.043,1.005-3.166-1.818.385-.856.813.214,1.134-.214,2.2-.856-.064-.364-.749-2.5-.856-.792.278-2.4-.385-.578.492-.856-.214-.321-1.6-.642-.107-1.861.385-.535.492-.856-.171-.578-.492-.471.107-.278.813-.642.171-1.284-.92-1.177-1.391-.813.171-.963-.428h-1.326l-.749-.856-.428-1.348.856-1.6.749-.171.15.813,1.647.92h.642l1.219-1.241.9-.107.963.535.578-.428v-.385l.685.043.535-.535.321-3.444-.107-3.38-1.177-1.155-.364-1.669.963-1.391,1.754-1.027.214-1.07.642.214.107-.321,2.075-.92,1.07-1.669,1.925-1.5,3.53-1.284,2.4.214,1.711.535.963.642,5.134,1.177,3,2.417.235.663Zm32.2-7.873,2.46-.15.941.535.193.449-2.7,1.968-1.8,3.936-1.5,2.032-2.139-1.348,1.3-2.653-.406-.813-.513-.021.214-1.219-.193-1.412,1.241-1.005,1.583-.685,1.3.385Zm54.617,3.829h-1.476l-1.048-.856-.086-1.925.685-1.177,1.091-.792,1.69.171.834.856.321,1.134-.556,1.5-.877.984-.578.107Zm-41.182-5.691,2.4-.278.856.428.963-.171,2.781,1.07.107,1.818.685,2.2,1.112,1.177.471.107.813,2.032,2.567,1.348.685.043.813-.749,1.433-.428.642-1.391,2.289-1.883h1.5l.6.6,1.861.064,3.316,1.027,1.112,1.818.171,1.134-.278,3.337-.856,1.284.171.92,1.326-.428.471-.856.278-1.711-.578-.856.107-.92.963-1.818.706-.856,2.182-1.562h.9l.364.492,2.182-.171,3.423.856-.364,1.455.171.963,2.032,3.059.107,2.032-1.155.535.128.792-.342.449.834,1.326-.064,1.69.6.385h.877l.856-.6,1.155-.214-.77-1.2.834.107.535-.321.171-.749.685-.428.706,1.07-.278,1.455-.706.963.321,2.417-1.391,1.134-.749-.214-.706.278-1.925-.642-2.567.492-1.112-1.391-1.284-.856-1.005.428-.321.749-.535.107-1.711-.535-1.326.107-.364-.385-.813.428-.428.813-1.134.535.214.278,1.112.492,5.883-.043,1.711.963.364.963-.856.706-2.931.385-1.005-.278-1.647-1.07-1.818-.428-2.61.492-4.749,2.2-2.289.535-2.674-1.027-.706-1.562.235-1.369,1.391-1.711.171-.749-.321-.6.535-.92-.364-1.027-.6-.856h-.321l-.214.385.15,1.177.321.214-.278.6-.642.428-.9-.278-.813,1.241-1.391.642-.278,1.134-1.005.235-2.931,2.952-1.968.813-1.754-1.284h-.642l-.578.492-1.562.107-.685,1.284-1.07.535h-.749l-2.289,1.348-1.326-.492-.385-.428v-.642l-1.391.428-.321.6-1.112.064-.642-.535h-.642l-1.005.278-5.134,2.909-5.07,1.711-2.781.171-3.53-1.177-2.139.107-2.075,2.161-3.573.856-2.139-.749-.685-.856-1.391-.278-.792.535-4.108-1.562-1.69-1.027-.642-1.07.492-.642.107-.813-.278-.492.364-1.818.706-.107.471-.492-.171-.856,1.647-.321-.321-1.177-1.391-2.1.578-.492-.9-2.139,1.433-3.016,1.005-.278.214-.428-.471-1.776,1.005.706,3.38-.535,4.963-3.38,1.433-1.883,1.07-.321h.642l2.075,1.284.492-.107,6.311,2.567.428-1.027.963-.856,1.326-.492.963.321,2.5-.278.535.6.856.043,1.005,1.027,1.326-.107.685,2.032-.321.535-1.326.385-.171.385.385.535,1.005.492,1.925-.171-.685-2.781.856-.278.792,2.032,1.177.043.107.963-1.711.171.685.813-.214,1.284.685,2.589.642.963,3.209-.642,2.781,1.177h.749l3.145-2.589,2.931-.642,1.433.171.792.749,3.359-1.348-.428-1.6-.813-.214-.278-.749-1.219-.321-.321.535-.749-1.241-1.326-.813-.642-1.07-.792.214-1.07-1.562-3.573.428-6.247-3.979-1.711-2.2-1.968-1.776-.364-.749.685-2.139,2.46-1.776,1.5.107,3.637-1.711,1.177.813Z"
                                      transform="translate(-356.606 -266.418)"/>
                            </g>
                            <g transform="translate(498.763 266.339)" class="click-point" onclick="window.location='region?r=nusatenggaratimur'">
                                <path class="id-nt"
                                      d="M575.638,356.64l1.519-.171.257.342-2.546,3-.792.278.278.385,2.139.3.449,1.754-1.027,1.262-2.011-.064-1.262.62-.62.77-1.647.62-.385.727.15.77-.792,1.84-.556-.193-.792.513-1.027-.706-.834-.107-1.07.6-.749,1.048-3.765.193-1.219.877.727.727-.62,1.134-.813.021-.257-.642-.984.086-.171-.342-1.284.321-.257.792-1.07-.642-.193-1.048.3-1.711-.984-1.883.278-.792,1.818-.792,1.391-.086,1.348-.706,1.562.235.792-.471,1.669-.193,3.016-2.931,1.091.086,1.027-.685.471-1.391.941.064-.15-.856,1.776-1.883,3.7-1.669.428-1.776,1.3,1.348-.706.513.15.513Zm-53.162-2.225,1.519.257.342.385-.406,2.824-.642.749-1.241.385-1.219,1.284-1.583.984-1.3.214-1.091-.535-2.118.193-2.353-1.433,5.584-3.123.471-1.776.877-.535,1.433-.471,1.733.6Zm55.986-10.269,1.134-.235.193.963-1.669.556-.257.813-.856.471-.364-.021-.021-.706-.941-.086.021.877.6.3.3.727-.193.62.278.727-.92-.128.235.6.428.15-.235.9-.856-.021-.3-1.005-.406-.107-.813.15-.535,1.027-.321.043-.535-.941.15-1.134-.321-.556.92-1.241,1.112-.578,1.112-1.861.321-1.241,2.118-.834.471.706.15,1.07Zm-127.675-28.8.792.535,1.005,1.861.9.792,1.048.321,2.161-.471.578.257.834,1.284.257,1.005.15,2.589.834,1.07,1.476.107.792.963h.428l1.519-.856,3.68-.9,1.005,1.177.15.9,3.637,1.861.642,1.861,2.524,4.728,2.161.749,2.268,1.326,1.048,1.5.727,2.289-.471,1.711-1.476,1.284-1.005.15-1.326,2.011-1.84,1.219-1.326.043-.9.749-2.2-.428-1.048.257-1.947,1.005-.15.749-.535.578-.685.043-1.69-.963-1.219-1.177-3.1.107-1.519-.257-.9.214-2.375-1.07-1.583-1.54-.792-.257-1.583-1.925-.941-.214-.321-.321.364-.749-.535-1.326-2.225-2.546-1.433-.428-.15-.685h-1.005l-.107-1.005-2.738-.428-.578.15-.642-.963-2.61-1.733-.535-.642-.535-1.6h-.685l-.663.492-.471-.792-1.048-.428-2.589-.364-1.8-.642-2.011.856-.578,1.07-2.161-1.112-.792.214-.471-.749-3.316-.257-1.219.214-.257-.321-4.279-1.433-.9-.642-2.161-2.931-1.433-1.07-.685-1.177L411.6,318.9l1.219-1.177,1.433-.856,3.1-.749,2.417-1.433.62.15.535.578,2.161-1.07,1.048-.15,1.626.685h2.268l1.947-.642,2.7.685,1.69-1.112,2.2-.043,1.583,1.112,2.139.471.727-.15,1.262.535,1.262-1.177,2.524-1.54,1.219-1.8.428-.107,1.155,2.182,1.925,2.054Zm182.078-16.088.428.171-.642,1.348-.021,1.112.492.77,1.091.535.963-.021,1.433-1.112,1.3-.364.685-.727.6-1.348.877.963.556.107,1.3,1.091.043,1.818-.556,1.9.321,1.6-1.476.171-1.369.813-.064.3-1.54-1.2-2.225.043-.6,1.219-.107.834.556,2.31,2.075,1.433.086,1.241,1.027,1.2.342,2.546h0l-1.947,1.391-1.647,1.84-.364,3.508-1.134,1.2-2.375.984-1.091.963-3.123,3.979-1.3,2.182-1.433.535-1.711,1.69-4.043,2.353-1.391,2.974-3.038,2.289-1.219.556-1.027.021-7.317-.62-1.027.193-.984.406-1.091,1.091-.342.941-1.669,1.005-.6.792-2.161.278-2.546,1.155-.535.663-2.76.856h-1.647l-1.925.471-1.155-.556-.642.021-1.519.749-.578-.749-2.075-.813-2.909,1.091.086-1.134.492-.406.813-1.754-.278-1.476,1.241-.471.15-1.412,3.188-1.348,1.3-.086,1.177-.813,2.139-.813,1.048-1.84-.428-.6-2.161-.749-.642.257-1.262-.214-.9.385-.492.749-.642-.193-.257-.406-.021-3.872.77-1.005.6-.214.706.193.856-1.027.235-2.289-.963-1.412,1.048-.428.406-.749.086-1.369-.492-2.482,2.567-2.653,1.647-.663.321-1.284.642-.556.406.043,1.027-.834,1.326-.428.706-1.284,1.155-.385.193-.727.834-.6.406-.92.706-.578,1.861-.128h0l1.883,2.546.984-.043.556.685.877-.235.428-1.027,1.5-.9.449.086,1.776,1.733.535,1.3-.3,1.84,2.589-.6.492-1.07-.471-.963,1.177-1.455-.257-.535.235-.642.364.043.663-.856,1.048-.15.3-.92.642-.321-.257-1.2.428-.92.086-1.262.406-.513-.064-.663h0l.963.257,1.818-.193,1.883-.663,3.23-2.589.171-1.2,1.69-.193,2.054-1.5,2.289-.513L631,299.9l1.861-.642Zm-190.293-5.027-.9-.043-.021-.578.556-.578.535.3-.171.9Zm-4.728-.6-.107.321-1.284-.513.941-.471Zm-2.353-5.626-.513.321-.321-.278-.663.107-.321.6.578.6-.428.021-.877-.877,2.268-1.455.321.15Zm1.5-1.669.62.021-.021,1.3.406,1.476.214-.449,1.005-.086.043-.513-.706-.749.856.321.364-.984.792.257.749-.406,1.091-.021.492.385-.257,1.241-1.5.278-.257.813-.471.364h-.406l-.086-.492-.428.021-.492.792-.171.792,1.027.385.321.642-.107.6-1.284,1.433-.578-.021-.086-.727-.556-.556-1.583.663-.449-1.433.578-1.84.513-.257.877.235-.321-1.07-.492.449-.321-.171.385-.235.086-.77-.92-1.711.685-.278.385.3Zm101.019-6.76,1.241.706.235-.428.235.385-.3,1.134-.92.77-1.219-.342-.77-.941.107-1.112,1.391-.171Zm-107.437.877-.021,1.005.385.235,2.46.449.813-.406-.086,1.391.321.556-.3.043-.471-.642-.193.406.364.556v1.476l.471.214-1.947.278v-1.027l-.792-.171-.107.62-.727.706-.792.064.385.749.535-.064.428-.492.107.278-.342.535-.086.321-.278.449-.834-.128-.706.984.813.963-.3.792.877.492-1.112.535-1.3-1.027-1.112.471.193-1.07.834-.706.193-1.3-.086-.449-.77-.6-.428.193.513-1.07-.535-.535.6-1.027.428.107.813-.428v-.834l.406-.086-.043-.492-.685-.278.9-.642-.064-.428-.428-.214-.107-1.005,1.07.257.128-.941.62.941Zm136.489-.877.171.685-.706.6-2.845,1.07-.984-.043-.77-.449-1.54,1.3-1.669,3.1-.984.578-.877-.086-.6-1.005.535-2.182,2.31-1.241.128-1.07.92-.941.834-.064.834.492.685-.492h2.931l.834-.449.792.193ZM513.769,274.7l.428.064.471,1.048-.214.727-.556.321-1.647-.535-.364.278-.171-.214.406-.3.471-1.284.663-.3.513.193Zm55.194-2.225.278.193.449-.556.471-.086.77.663,1.326.107,1.262.685-.62,1.005-.492.171.128,2.182-.6,1.284-2.054.257L567.637,278l-4,.941-.877-.342-1.647.321-.107-1.54,1.3-2.268,2.567-1.476,1.455-1.262,1.412.193.92-.556.3.086v.385Zm38.872,4.214-1.8,2.246-.321,2.289-2.867,2.653-2.2.321-.492-.342.428-1.733-1.177-2.781-1.711-.086-1.455,1.07-.021.364-1.2-.342L595,279.9l1.027-1.155.706-2.1,3.487-1.99,1.091.642.086,1.433.364.321.834-.235,1.369-1.433.406-.984,1.412-.813,1.54-2.61.9-.749,1.369-.021.492.406.193.834-.941,1.754.171,2.1-.406.749-1.262.642Zm-15.553-5.284,2.139.257.941,1.348-3.145,1.177-1.348-.342-1.54.6-.813,1.027-.15,1.005-1.262,1.284-.15.685-.856,1.027-.77-.086.064-.535-.321-.171-.92.021L583,279.945l-1.005.513-.321.813.813,1.027.235,1.07-1.134,1.326-1.241-.086-.6-1.5-.449-.193-1.54.685-1.005,1.562-.834.235-1.669-.663-.428-.856-1.112-.6-.877.749-1.883-.278-.406.513-.749-.642.064-.9.813-.021,2.738-2.289.92-1.818,1.754-.578.449-.492,1.669-.278,1.262-.9-1.583-1.6-.9-.15-2.1.364,1.284-1.562.963-.428.6.513,1.369.171,1.027-1.027,1.241-.235,1.348.193.257.193-.513.535-.257,1.005-1.6,1.84-.086.578,2.011.685,1.519-1.2-.021-.685-.663-.321-.021-.92h1.07l-.15.749.171.342,1.241-1.07-.364-1.5-.813-.278v-.685l1.5-.193.492.257-.086.856,1.519.321.278-.321-.257-.984,3.252-1.99,2.1,1.6Zm25.051-3.252,3.081.214-.385.706-.043,1.476.535.342,1.776-1.07,3.594-.685,2.845.556,3.123.064,1.647-.77,1.8.385,1.369-.321,1.99.107,1.5,2.974-.171,2.439.257,1.091-.813.706-1.968.535-6.418.257-3.359,1.3-2.311.15-2.909-.342-2.289,1.476-1.883.428-.556-.663-1.2-.278-2.589,1.519-.342-.064-.15-.663-1.883.214-.834-.813.064-.749.214-.663,2.032-2.439.107-.813.877-.278,1.69-1.369,1.369-.171,1.155-.706-.342-.278-1.412.257-3.4,1.69.171-1.027-.364-.813,2.054-2.76.749-.792,1.626-.364Zm-58.9-.556,1.669,1.091.064.941-.428,1.2.6.706.107,1.284L561.9,274.3l.043.877-1.519,1.455-.62.107-1.433-.813-.449.15-1.241,1.818.492,1.219-.257,1.284-.984.15-1.112-.77-1.326-.364-.342.321.235,1.861,1.883,1.99.107,1.284-.449.792-1.883.727-1.8-.021-.235.877-.449-.342H548.79l-1.8,1.112-.578-.171-.513.428-1.027.15L543.634,290l-4.214,1.391-1.626.171-1.134-.428-2.31.556-1.519-.492-1.476.257-.749-.685-2.246.086-.941.278-.642.92-.471.086-1.07,1.07-4.043,1.433-2.054.043-.471.642-2.546,1.027-1.861-.15-1.112-.877-1.112-.15-.407.3.128.963-.321.749-.535.15-.663-.3.685-2.2-1.284-.513-1.048-.856-1.583.321-5.391-.685-.513.086-.364,1.284.128,1.818-.92.9-1.219.364-1.519-.834-2.909.3-.62-.321-3.38,1.284-1.968,1.3-.92-.043-3.145-1.048-1.968-1.6-.6-1.711-.513-.193-1.733.385-.727,1.6-.984.257-2.032-.834-1.733-.128-1.9-1.925-5.562.043-1.669.3-.513-.278-2.631,1.348-.642-.385-.62.342-2.46-.642-1.733-1.8-.706-.107-4.771,1.3-1.861.257-.9-.193-.77.813v.685l-.449.15-.9-.278.278-.578-.342-.193.021-.984-1.711-.15-.321-.663L442.7,292.1l-.128-.792.021-.535.193-.749-.214-.492.492-.984.021-2.4-.471-.214.193-.706,1.027-1.112-.107-.321,1.07-.364.685-.792.171-1.177-.727-.941-.15-.834.9-.086.086,1.241.642.128.235.364,1.027-.685.513.021.856-.9,1.07,1.005.513-.77-.535-.3.043-.513.749-1.2,1.091.086.513-.364.449.021.3.92.471.385-.385.77.813.086.449-.834.021-2.139,1.348.62.535-.92h.321l.706-1.583.513.086,1.048-.321.513-.535,1.048-.086,1.519-.064,1.669.428,1.519-.535.15-1.005.406-.364.984.813-.021.706.856.513,1.818-.706,1.091.62,1.54.021.364-.471-.513-.578.235-.428,1.6.749,1.562,1.9,1.048-.086.92.813,2.5-.321,1.925.62,2.46-.021,1.134-.385,1.07.15-.064.749.278.278,1.07-.064v.77l.449.834,1.519-.214,1.391.6,1.348.086.813.556.92-.171,1.6.984,1.669.214,1.048.449,1.6,2.589,2.61,1.2,1.818-.963.535.663.706.278.449,1.134,1.091-1.284,1.3-.428-.535-.471-.021-.749.364-.128,1.391.9-.471-.92.214-1.754.449-.471.941.235-.064.77.856-.235.513.685,1.84-.663,1.9.193.6.406,1.091-.428.62-.663.6.471,1.9.086.6-.364,1.155-1.583-.128,1.07,1.091-.941,1.048-.257.492.128-.578,1.733.193,1.433,1.968-.235.62.77.663-.535,2.054.963,2.589,2.589,2.46.6,1.284-.813,1.134-.214,3.209-.342.9.214,1.626-2.246-.086-.834-1.305-1.155.471-.727,2.4-.685.642-1.005.685-.193.3-1.177.578.15.62-.578,1.134.321,2.567-1.155,1.177.214,1.626-2.375,2.375-.257.77-.492.77-2.4.92-.556-1.3-.727-1.348-.021-2.011.663-.877,1.455-2.1-.406-.064-.278,1.005-.856.9-1.583v-1.647l1.754-.449,1.326-1.134,2.31,1.433Z"
                                      transform="translate(-410.226 -266.168)"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <!--legend total kasus-->
                <div class="row">
                    <div class="mf35-f30 font-weight-bold cl-bas2">Total Kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                </div>
                <!--stripped bar-->
                <div class="d-flex flex-nowrap align-items-center">
                    <span class="f11 font-weight-bold cl-bas1 mr5"><?php echo $mincase ?></span>
                    <span class="bas-totalcasebar"></span>
                    <span class="f11 font-weight-bold cl-bas1 ml5"><?php echo $maxcase ?></span>
                </div>
                <!--Simple Table-->
                <table class="table table-hover text-center cl-bas2 mt20c bas-table rgview-tcustom">
                    <thead>
                        <tr>
                            <th class="ntb nlb"></th>
                            <th class="ntb">Total<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></th>
                            <th class="ntb">Meninggal<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></th>
                            <th class="ntb nrb">Sembuh<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $tablefetch ?>

                    </tbody>
                </table>

                <hr class="bas-hr-helpseparator mt50 d-block d-sm-block d-md-none">

                <!--Call for help for mobile screens-->
                <div class="cl-bas1 mt50 d-block d-sm-block d-md-none">
                    <div style="width:60px; height:60px;" class="d-flex justify-content-center flex-column">
                        <img style="width:60px;" src="img/asset/regview/bas-phone.svg" alt="Bantuan untuk kasus coronavirus di wilayah ini">
                    </div>
                    <div class="mt20">
                        <span class="f32 font-weight-bold">Pusat bantuan</span>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel1'] ?>" class="a-none">
                            <span class="f24 cl-bas1"><?php echo $help['tel1'] ?></span>
                        </a>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel2'] ?>" class="a-none">
                            <span class="f24 cl-bas1"><?php echo $help['tel2'] ?></span>
                        </a>
                    </div>
                    <a href="<?php echo $help['web'] ?>" class="a-none" target="_blank" rel="noreferrer">
                        <div class="f20 cl-bas1 mt15" ><span class="bas-call"><?php echo $help['web'] ?></span></div>
                    </a>
                </div>
            </div>

            <!--statistik angka & grafik-->
            <div class="col-8 col-md-9">
                <div class="row text-center">
                    <div class="col-12 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/bas-virus-lg.svg" alt="Total orang yang terinfeksi oleh virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-bas1 mt10">Total kasus</h2>
                        <div class="f80 font-weight-bold cl-bas3 nmt30"><?php echo $maininfo['t'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-bas1 nmt20"><?php echo $maininfo['t_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2 nmt5">
                            <a href="peringkat?v=persenpertambahankasus" class="a-none">
                                <img src="img/asset/regview/bas-<?php echo $maininfo['t_rank_status'] ?>" alt="<?php echo $maininfo['t_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-bas2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-bas2"><?php echo $maininfo['t_rank'] ?></span>
                                <span class="mf16-f12 cl-bas2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="9"><sup>[9]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2">
                            <a href="peringkat?v=totalkasus" class="a-none">
                                <img src="img/asset/regview/bas-<?php echo $maininfo['t_per_id_status'] ?>" alt="<?php echo $maininfo['t_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-bas2"><?php echo $maininfo['t_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-bas2"><?php echo $maininfo['t_per_id'] ?></span>
                                <span class="mf16-f12 cl-bas2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/bas-recovery-lg.svg" alt="Total orang yang sembuh dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-bas1 mt10">Sembuh</h2>
                        <div class="f80 font-weight-bold cl-bas3 nmt30"><?php echo $maininfo['tr'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-bas1 nmt20"><?php echo $maininfo['tr_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2 nmt5">
                            <a href="peringkat?v=persenpertambahankesembuhan" class="a-none">
                                <img src="img/asset/regview/bas-<?php echo $maininfo['tr_rank_status'] ?>" alt="<?php echo $maininfo['tr_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-bas2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-bas2"><?php echo $maininfo['tr_rank'] ?></span>
                                <span class="mf16-f12 cl-bas2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="13"><sup>[13]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2">
                            <a href="peringkat?v=totalsembuh" class="a-none">
                                <img src="img/asset/regview/bas-<?php echo $maininfo['tr_per_id_status'] ?>" alt="<?php echo $maininfo['tr_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-bas2"><?php echo $maininfo['tr_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-bas2"><?php echo $maininfo['tr_per_id'] ?></span>
                                <span class="mf16-f12 cl-bas2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/bas-death-lg.svg" alt="Total orang yang meninggal dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-bas1 mt10">Meninggal</h2>
                        <div class="f80 font-weight-bold cl-bas3 nmt30"><?php echo $maininfo['td'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-bas1 nmt20"><?php echo $maininfo['td_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2 nmt5">
                            <a href="peringkat?v=persenpertambahankematian" class="a-none">
                                <img src="img/asset/regview/bas-<?php echo $maininfo['td_rank_status'] ?>" alt="<?php echo $maininfo['td_rank_status_alt'] ?>">
                                <span class="f12 cl-bas2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-bas2"><?php echo $maininfo['td_rank'] ?></span>
                                <span class="f12 cl-bas2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="11"><sup>[11]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2">
                            <a href="peringkat?v=totalkematian" class="a-none">
                                <img src="img/asset/regview/bas-<?php echo $maininfo['td_per_id_status'] ?>" alt="<?php echo $maininfo['td_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-bas2"><?php echo $maininfo['td_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-bas2"><?php echo $maininfo['td_per_id'] ?></span>
                                <span class="mf16-f12 cl-bas2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!--Fakta Menarik-->
                <div class="row justify-content-center mt70">
                    <div class="col-md-12 col-lg-10 col-xl-8 justify-content-center">
                        <div class="row justify-content-center text-center">
                            <div class="col justify-content-center">
                                <div class="mf40-f32 font-weight-bold cl-bas2">Fakta <?php echo $namaprov ?></div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-around text-center">

                                <!--Kasus / 1 Juta Penduduk-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/bas-virus-sm.svg" alt="Total kasus per 1 juta penduduk di region ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-bas3"><?php echo $faktamenarik['kasus1jt'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-bas1 mb0 nmt5">Kasus / 1 Juta Penduduk<a class="a-none a-inh-sup click-point" data-id="51"><sup>[51]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2 nmt5">
                                        <a href="peringkat?v=kasusper1jutapenduduk" class="a-none">
                                            <img src="img/asset/regview/bas-<?php echo $faktamenarik['kasus1jt_st'] ?>" alt="<?php echo $faktamenarik['kasus1jt_st_alt'] ?>">
                                            <span class="mf16-f12 cl-bas2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-bas2"><?php echo $faktamenarik['kasus1jt_rank'] ?></span>
                                            <span class="mf16-f12 cl-bas2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="52"><sup>[52]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Kapasitas Rumah Sakit-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/bas-hospitalcapacity-sm.svg" alt="Kapasitas rumah sakit di region ini pada saat ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-bas3"><?php echo $faktamenarik['kapasitasrs'] ?><span class="f20">%</span></div>
                                    <h3 class="f16 font-weight-bold cl-bas1 mb0 nmt5">Kapasitas Rumah Sakit<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2 nmt5">
                                        <a href="peringkat?v=bebanrumahsakit" class="a-none">
                                            <img src="img/asset/regview/bas-<?php echo $faktamenarik['kapasitasrs_st'] ?>" alt="<?php echo $faktamenarik['kapasitasrs_st_alt'] ?>">
                                            <span class="mf16-f12 cl-bas2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-bas2"><?php echo $faktamenarik['kapasitasrs_rank'] ?></span>
                                            <span class="mf16-f12 cl-bas2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="53"><sup>[53]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Rata-rata waktu menuju RS-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/bas-timetohospital-sm.svg" alt="Perkiraan rata-rata waktu yang dibutuhkan untuk menuju rumah sakit di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-bas3"><?php echo $faktamenarik['wakturs'] ?><span class="f20">mnt</span></div>
                                    <h3 class="f16 font-weight-bold cl-bas1 mb0 nmt5">Rata-Rata Waktu Menuju RS<a class="a-none a-inh-sup click-point" data-id="39"><sup>[39]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2 nmt5">
                                        <a href="peringkat?v=waktumenujurs" class="a-none">
                                            <span class="mf16-f12 cl-bas2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-bas2"><?php echo $faktamenarik['wakturs_rank'] ?></span>
                                            <span class="mf16-f12 cl-bas2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="54"><sup>[54]</sup></a></span>
                                        </a>
                                    </div>
                                </div>

                                <!--Jarak 1 Pasien dari Lokasi Anda-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/bas-keepdistance-sm.svg" alt="Rata-rata jarak orang sehat dengan 1 orang terinfeksi corona di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-bas3"><?php echo $faktamenarik['jarak1pasien'] ?><span class="f20">km</span></div>
                                    <h3 class="f16 font-weight-bold cl-bas1 mb0 nmt5">Jarak 1 Pasien dari Lokasi Anda<a class="a-none a-inh-sup click-point" data-id="37"><sup>[37]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2 nmt5">
                                        <a href="peringkat?v=jarak1pasienpositifcorona" class="a-none">
                                            <img src="img/asset/regview/bas-<?php echo $faktamenarik['jarak1pasien_st'] ?>" alt="<?php echo $faktamenarik['jarak1pasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-bas2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-bas2"><?php echo $faktamenarik['jarak1pasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-bas2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="55"><sup>[55]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Dokter per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/bas-doctor-sm.svg" alt="Setiap 1 pasien corona rata-rata ditangani oleh sejumlah dokter di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-bas3"><?php echo $faktamenarik['dokterpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-bas1 mb0 nmt5">Dokter Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="40"><sup>[40]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2 nmt5">
                                        <a href="peringkat?v=dokterper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/bas-<?php echo $faktamenarik['dokterpasien_st'] ?>" alt="<?php echo $faktamenarik['dokterpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-bas2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-bas2"><?php echo $faktamenarik['dokterpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-bas2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="56"><sup>[56]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Perawat per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/bas-nurse-sm.svg" alt="Setiap 1 pasien corona rata-rata dirawat oleh sejumlah perawat di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-bas3"><?php echo $faktamenarik['perawatpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-bas1 mb0 nmt5">Perawat Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="41"><sup>[41]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-bas2 nmt5">
                                        <a href="peringkat?v=perawatper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/bas-<?php echo $faktamenarik['perawatpasien_st'] ?>" alt="<?php echo $faktamenarik['perawatpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-bas2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-bas2"><?php echo $faktamenarik['perawatpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-bas2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="57"><sup>[57]</sup></a></span>
                                        </a>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <!--Graph for extra large screens-->
                    <div class="col-xl-4 d-xl-inline-block d-none">
                        <!--Graph Content-->
                        <div class="container-fluid">
                            <!--Title-->
                            <div class="row justify-content-center">
                                <div class="col-12 text-center sm-mwheading">
                                    <h5 class="f24 font-weight-bold cl-bas2">Pertambahan & Kasus Aktif</h5>
                                </div>
                            </div>

                            <!--Legend-->
                            <div class="row justify-content-center mb10">
                                <div class="col-12 justify-content-center sm-mw1">
                                    <div class="d-flex flex-nowrap justify-content-center f12">
                                        <div>
                                            <span class="bas-c0-legend1 align-self-center"></span>
                                            <span class="cl-bas1">Pertambahan kasus per hari<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                        </div>
                                        <div class="ml30">
                                            <span class="bas-c0-legend2 align-self-center"></span>
                                            <span class="cl-bas1">Persen kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Data visualization-->
                            <div class="row justify-content-center">
                                <div class="col-12 sm-secdata">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 305 320" class="sm-linechart">
                                        <g transform="translate(-253.026 0)">
                                            <?php echo $lchart0 ?>
                                        </g>
                                    </svg>

                                </div>
                            </div>
                            <div class="row justify-content-center sm-negmargin1">
                                <div class="col-12 sm-mw1">
                                    <div class="d-flex">

                                        <!--left axis label-->
                                        <div class="f12 d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                            <?php echo $bcharts0 ?>
                                        </div>

                                        <!--Center data render-->
                                        <div class="d-flex flex-nowrap sm-bottom-x-ax justify-content-between">
                                            <span class="sm-left-y-ax"></span>
                                            <span class='c0-bardata1 align-self-end'></span>
                                            <span class='c0-bardata2 align-self-end'></span>
                                            <span class='c0-bardata3 align-self-end'></span>
                                            <span class='c0-bardata4 align-self-end'></span>
                                            <span class='c0-bardata5 align-self-end'></span>
                                            <span class='c0-bardata6 align-self-end'></span>
                                            <span class='c0-bardata7 align-self-end'></span>
                                            <span class='c0-bardata8 align-self-end'></span>
                                            <span class='c0-bardata9 align-self-end'></span>
                                            <span class='c0-bardata10 align-self-end'></span>
                                            <span class='c0-bardata11 align-self-end'></span>
                                            <span class='c0-bardata12 align-self-end'></span>
                                            <span class='c0-bardata13 align-self-end'></span>
                                            <span class='c0-bardata14 align-self-end'></span>
                                            <span class='c0-bardata15 align-self-end'></span>
                                            <span class='c0-bardata16 align-self-end'></span>
                                            <span class='c0-bardata17 align-self-end'></span>
                                            <span class='c0-bardata18 align-self-end'></span>
                                            <span class='c0-bardata19 align-self-end'></span>
                                            <span class='c0-bardata20 align-self-end'></span>
                                            <span class='c0-bardata21 align-self-end'></span>
                                            <span class='c0-bardata22 align-self-end'></span>
                                            <span class='c0-bardata23 align-self-end'></span>
                                            <span class='c0-bardata24 align-self-end'></span>
                                            <span class='c0-bardata25 align-self-end'></span>
                                            <span class='c0-bardata26 align-self-end'></span>
                                            <span class='c0-bardata27 align-self-end'></span>
                                            <span class='c0-bardata28 align-self-end'></span>
                                            <span class='c0-bardata29 align-self-end'></span>
                                            <span class='c0-bardata30 align-self-end'></span>
                                            <span class="sm-right-y-ax"></span>
                                        </div>

                                        <!--right data label-->
                                        <div class="f12 d-flex flex-column flex-nowrap justify-content-between ml5">
                                            <?php echo $lcharts0 ?>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <!--X data labels-->
                            <div class="row justify-content-center">
                                <div class="col-12 text-center sm-mw2">
                                    <div class="d-flex flex-nowrap justify-content-between">
                                        <?php echo $cdate0 ?>
                                    </div>
                                </div>
                            </div>

                            <!--X Axis title-->
                            <div class="row justify-content-center mb20">
                                <div class="col-8 text-center sm-mw1">
                                    <div class="f16 font-weight-bold">Tanggal</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Middle navigation and quick survey-->
    <nav class="bas-addbg mt20" style="position:sticky; top:3px; z-index:997">
        <div class="container">

            <div class="d-flex flex-wrap justify-content-center">
                <div class="d-flex flex-wrap pt10 pb10 pr10">
                    <div class="text-center justify-content-center d-flex flex-column">
                        <div class="f16 cl-bas6 font-weight-bold mr10">Region<a class="a-none a-inh-sup click-point" data-id="59"><sup>[59]</sup></a> lainnya</div>
                    </div>
                    <div class="row text-center justify-content-center f16">
                        <a href="region#sumatera" class="a-none"><span class="bas-region-block cl-white">Sumatera</span></a>
                        <a href="region#jawa" class="a-none"><span class="bas-region-block cl-white">Jawa</span></a>
                        <a href="region#kalimantan" class="a-none"><span class="bas-region-block cl-white">Kalimantan</span></a>
                        <a href="region#sulawesi" class="a-none"><span class="bas-region-block cl-white">Sulawesi</span></a>
                        <a href="region#balinusatenggara" class="a-none"><span class="bas-region-block cl-white">Bali & Nusa Tenggara</span></a>
                        <a href="region#malukupapua" class="a-none"><span class="bas-region-block cl-white">Maluku & Papua</span></a>
                    </div>
                </div>

                <div class="d-none flex-wrap pt10 pb10 pl10">
                    <div class="text-center justify-content-center d-flex flex-column mr10">
                        <span class="bas-survey-tag-block cl-bas2">SURVEI</span>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div>
                            <span class="cl-bas6 font-weight-bold">Saya </span>
                            <span class="cl-bas6">berasal </span>
                            <span class="cl-bas6 font-weight-bold">dari Aceh</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn bas-btn-send">
                                    <span class="bas-survey-selection cl-bas6">
                                        Ya
                                        <img src="img/asset/regview/bas-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn bas-btn-send">
                                    <span class="bas-survey-selection cl-bas6">
                                        Tidak
                                        <img src="img/asset/regview/bas-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>

                        </div>
                        <div class="ml10">
                            <span class="cl-bas6 font-weight-bold">Informasi </span>
                            <span class="cl-bas6">yang disajikan </span>
                            <span class="cl-bas6 font-weight-bold">membantu</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn bas-btn-send">
                                    <span class="bas-survey-selection cl-bas6">
                                        Ya
                                        <img src="img/asset/regview/bas-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn bas-btn-send">
                                    <span class="bas-survey-selection cl-bas6">
                                        Tidak
                                        <img src="img/asset/regview/bas-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!--Total Kasus-->
    <div class="container bas-container-case rgview-details-spacing">
        <div class="row mt50">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-bas1 rgview-breakword">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a> </span>
                    <span class="mf36-f24 cl-bas1">(Kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-bas3"><?php echo $activecase ?></span>
                    <span class="mf36-f24 font-weight-bold cl-bas1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-bas3"><?php echo $activecase_id ?>%</span>
                    <span class="mf36-f24 cl-bas1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-bas1">Pertambahan dan total kasus</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="bas-c1-legend1 align-self-center"></span>
                                    <span class="cl-bas1 mf24-f16">Pertambahan kasus<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="bas-c1-legend2 align-self-center"></span>
                                    <span class="cl-bas1 mf24-f16">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Data visualization-->
                    <div class="row justify-content-center">
                        <div class="col-12 lg-secdata">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="lg-linechart">
                                <g transform="translate(-253.026 0)">
                                    <?php echo $lchart1 ?>
                                </g>
                            </svg>

                        </div>
                    </div>
                    <div class="row justify-content-center lg-negmargin1">
                        <div class="col-12 lg-mw1">
                            <div class="d-flex">

                                <!--left axis label-->
                                <div class="d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                    <?php echo $bcharts1 ?>
                                </div>

                                <!--Center data render-->
                                <div class="d-flex flex-nowrap lg-bottom-x-ax justify-content-between">
                                    <span class="lg-left-y-ax"></span>
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
                                    <span class="lg-right-y-ax"></span>
                                </div>

                                <!--right data label-->
                                <div class="d-flex flex-column flex-nowrap justify-content-between ml5">
                                    <?php echo $lcharts1 ?>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!--X data labels-->
                    <div class="row justify-content-center">
                        <div class="col-12 text-center lg-mw2">
                            <div class="d-flex flex-nowrap justify-content-between">
                                <?php echo $cdate1 ?>
                            </div>
                        </div>
                    </div>

                    <!--X Axis title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <div class="mf24-f20 font-weight-bold">Tanggal</div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-xl-5 col-lg-5 col-md-7 col-11 mt50">
                <h4 class="mf36-f24 font-weight-bold cl-bas1">Kecepatan pertumbuhan kasus per hari<a class="a-none a-inh-sup click-point" data-id="42"><sup>[42]</sup></a></h4>
                <div class="mf24-f16 cl-bas1">Mengukur seberapa besar pertambahan kasus setiap harinya terhadap jumlah kasus di hari
                    sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap1 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-bas1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="43"><sup>[43]</sup></a></span>
                            <span class="bas-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-bas1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="44"><sup>[44]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-bas1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/bas-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-bas1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kesembuhan-->
    <div class="container bas-container-recover rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-bas1 rgview-breakword">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a> </span>
                    <span class="mf36-f24 cl-bas1">(Tingkat kesembuhan<a class="a-none a-inh-sup click-point" data-id="58"><sup>[58]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-bas3"><?php echo $recoveryrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-bas1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-bas3"><?php echo $recoveryrate_id ?>%</span>
                    <span class="mf36-f24 cl-bas1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-bas1">Pertambahan dan total kesembuhan</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="bas-c2-legend1 align-self-center"></span>
                                    <span class="cl-bas1 mf24-f16">Pertambahan kesembuhan<a class="a-none a-inh-sup click-point" data-id="12"><sup>[12]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="bas-c2-legend2 align-self-center"></span>
                                    <span class="cl-bas1 mf24-f16">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Data visualization-->
                    <div class="row justify-content-center">
                        <div class="col-12 lg-secdata">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="lg-linechart">
                                <g transform="translate(-253.026 0)">
                                    <?php echo $lchart2 ?>
                                </g>
                            </svg>

                        </div>
                    </div>
                    <div class="row justify-content-center lg-negmargin1">
                        <div class="col-12 lg-mw1">
                            <div class="d-flex">

                                <!--left axis label-->
                                <div class="d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                    <?php echo $bcharts2 ?>
                                </div>

                                <!--Center data render-->
                                <div class="d-flex flex-nowrap lg-bottom-x-ax justify-content-between">
                                    <span class="lg-left-y-ax"></span>
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
                                    <span class="lg-right-y-ax"></span>
                                </div>

                                <!--right data label-->
                                <div class="d-flex flex-column flex-nowrap justify-content-between ml5">
                                    <?php echo $lcharts2 ?>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!--X data labels-->
                    <div class="row justify-content-center">
                        <div class="col-12 text-center lg-mw2">
                            <div class="d-flex flex-nowrap justify-content-between">
                                <?php echo $cdate2 ?>
                            </div>
                        </div>
                    </div>

                    <!--X Axis title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <div class="mf24-f20 font-weight-bold">Tanggal</div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-xl-5 col-lg-5 col-md-7 col-11 mt50">
                <h4 class="mf36-f24 font-weight-bold cl-bas1">Kecepatan pertumbuhan kesembuhan per hari<a class="a-none a-inh-sup click-point" data-id="45"><sup>[45]</sup></a></h4>
                <div class="mf24-f16 cl-bas1">Mengukur seberapa besar pertambahan kesembuhan setiap harinya terhadap jumlah kesembuhan di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap2 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-bas1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="46"><sup>[46]</sup></a></span>
                            <span class="bas-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-bas1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="47"><sup>[47]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-bas1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/bas-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-bas1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kematian-->
    <div class="container bas-container-death rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-bas1 rgview-breakword">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a> </span>
                    <span class="mf36-f24 cl-bas1">(Tingkat kematian<a class="a-none a-inh-sup click-point" data-id="15"><sup>[15]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-bas3"><?php echo $deathrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-bas1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-bas3"><?php echo $deathrate_id ?>%</span>
                    <span class="mf36-f24 cl-bas1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-bas1">Pertambahan dan total kematian</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="bas-c3-legend1 align-self-center"></span>
                                    <span class="cl-bas1 mf24-f16">Pertambahan kematian<a class="a-none a-inh-sup click-point" data-id="10"><sup>[10]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="bas-c3-legend2 align-self-center"></span>
                                    <span class="cl-bas1 mf24-f16">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Data visualization-->
                    <div class="row justify-content-center">
                        <div class="col-12 lg-secdata">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="lg-linechart">
                                <g transform="translate(-253.026 0)">
                                    <?php echo $lchart3 ?>
                                </g>
                            </svg>

                        </div>
                    </div>
                    <div class="row justify-content-center lg-negmargin1">
                        <div class="col-12 lg-mw1">
                            <div class="d-flex">

                                <!--left axis label-->
                                <div class="d-flex flex-column flex-nowrap justify-content-between text-left mr5">
                                    <?php echo $bcharts3 ?>
                                </div>

                                <!--Center data render-->
                                <div class="d-flex flex-nowrap lg-bottom-x-ax justify-content-between">
                                    <span class="lg-left-y-ax"></span>
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
                                    <span class="lg-right-y-ax"></span>
                                </div>

                                <!--right data label-->
                                <div class="d-flex flex-column flex-nowrap justify-content-between ml5">
                                    <?php echo $lcharts3 ?>
                                </div>
                            </div>


                        </div>
                    </div>

                    <!--X data labels-->
                    <div class="row justify-content-center">
                        <div class="col-12 text-center lg-mw2">
                            <div class="d-flex flex-nowrap justify-content-between">
                                <?php echo $cdate3 ?>
                            </div>
                        </div>
                    </div>

                    <!--X Axis title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <div class="mf24-f20 font-weight-bold">Tanggal</div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-xl-5 col-lg-5 col-md-7 col-11 mt50">
                <h4 class="mf36-f24 font-weight-bold cl-bas1">Kecepatan pertumbuhan kematian per hari<a class="a-none a-inh-sup click-point" data-id="48"><sup>[48]</sup></a></h4>
                <div class="mf24-f16 cl-bas1">Mengukur seberapa besar pertambahan kematian setiap harinya terhadap jumlah kematian di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap3 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-bas1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="49"><sup>[49]</sup></a></span>
                            <span class="bas-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-bas1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="50"><sup>[50]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-bas1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/bas-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-bas1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!--Internal Navigation-->
    <div class="row justify-content-center text-center mt120 pt100">
        <div class="col">
            <h3 class="f48 font-weight-bold"><span class="cl-aqua-forest">Provinsi </span><span class="cl-tangerine">Lainnya</span></h2>
        </div>
    </div>
    <div class="row justify-content-center text-center mt25 mb25">
        <?php rgview_internallink($_GET['r']) ?>
    </div>

    <!--Komentar dan Catatan Kaki-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-none col-xl-6 col-lg-6 col-md-8 col-10 justify-content-center mt100">
                <h4 class="f24 font-weight-bold cl-bas1">Komentar</h4>
                <div class="f16 cl-bas1">Bagikan informasi, keresahan, dan semangat kepada Indonesia karena #SendiriKitaBisa #BersamaKitaKuat</div>

                <!--input-->
                <form class="mt30">
                    <div class="mr40">
                        <div class="form-group marginb1">
                            <input type="text" class="form-control font-weight-bold f12 cl-bas1 bas-c-f-input" value="Tanpa_nama0028">
                        </div>
                        <div class="form-group marginb3">
                            <input type="text" class="form-control f14 cl-bas1 bas-c-f-input" placeholder="katakan sesuatu...">
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="cl-bas1">0/120</span>
                        <button type="submit" class="btn btn-send">
                            <img src="img/asset/regview/bas-send.svg" alt="send button">
                        </button>
                    </div>
                </form>
                <hr class="bas-hr-comment">
                <!--Chat Content-->
                <div class="mt25">
                    <div class="f14 cl-bas1">13:10 2 April 2020</div>
                    <div class="mt5">
                        <span class="cl-bas2 font-weight-bold f16">Jonathan Raditya</span><br>
                        <span class="cl-bas1 f16">Semoga kita semua dalam keadaan sehat ya, jangan lupa #JagaKebersihan dan #diRumahAja !</span>
                    </div>
                    <div class="">
                        <img src="img/asset/regview/bas-likes.svg" alt="likes button">
                        <span class="f15 font-weight-bold cl-bas2">128</span>
                    </div>
                </div>


            </div>

            <!--Catatan Kaki-->
            <div class="col-xl-5 col-lg-5 col-md-8 col-11 mt100 d-none">
                <a href="bantuan?h=catatankaki" class="a-none"><h4 class="font-weight-bold f24 cl-bas1">Catatan kaki</h4></a>

            </div>
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
