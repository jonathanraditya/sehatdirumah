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
                background-color:#EB5600;
                padding:0;
                color:#FFF4EE;
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
                    <div class="d-flex jaw-provlogo-bg">
                        <!--left stripped-->
                        <div class="jaw-provlogo-strip"></div>
                        <!--Logo provinsi-->
                        <div style="height:55px; width:55px;" class="align-self-center d-flex flex-column justify-content-center pt12 pb12 pl5 pr10">
                            <img class="img-fluid" src="img/asset/regview/logo/<?php echo $logo ?>" alt="<?php echo $logoalt ?> - Indonesia">
                        </div>
                        <!--Tulisan Provinsi + nama provinsinya-->
                        <div class="d-flex flex-column flex-nowrap pt12 pb12 pl7 pr15">
                            <h1 class="f24c font-weight-bold cl-jaw1 mb0">Provinsi<br><?php echo $namaprov ?></h1>
                        </div>
                    </div>
                </div>
                <!--Peta-->
                <div  class="align-self-center d-flex flex-column justify-content-center"  style="height:375px;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 398 113.27">
                        <defs>
                            <style><?php echo $maphsl ?>
                            </style>
                        </defs>
                        <g transform="translate(-171.286 -225.438)">
                            <g transform="translate(218.034 232.789)" class="click-point" onclick="window.location='region?r=jawabarat'">
                                <path class="id-jb"
                                      d="M219.732,229.7l1.641,1.7.895.17,4.688-1.065,1.939.554,1.875,2,2.6,4.389,3.43,1.321,2.259.277,1.832,2,.895-.724.469.3,1.044-.064,2.791-1.683,1.321.043.256.895,1.3-.7.32.575-.6-.021.17,1.065,2.3.81,3.026,1.726,3.43,1.044,2.131-1.321.895-1-.149-.81-.746-.724.788.128.575.6,2.855-.064,1.342.959.171-1.044.3-.149.618.852.341,1.151-.256.362.6,1.768,2.855,3.2,2.9,1.726.32,2.557-.192,1.215.788,3.942,1.385,2.45,1.257.32.6-.724,1.023.554.17,1.215,2.493.6,1.982-.98.107-.788-.66-.234.49-.575,1-.064h0l-.149,3.132-1.193,1.811-.533.234-.916,1.236.341,1.065-.107,1.385,1.385.788-.085.767-.575.49.213.661-.362.788.107.788-.6.554-1.406.107-1.023,1.236-1.236.128-.724-.66-.724.021-2.088,1.023-.043,1.215.6.575v1.087l-1,1.726.192,1.747.384-.043.447.511,2.493-.192,1.087,1.023.234,1.023,1.172,1.257-.277.98.213.938.639.788.724,2-.17,1.108-.618.938,1.47,1.555,1.044.533h0l-1.449.916-1.108-.639-1.577-.128-1,.661-.085.3.7.746-.3.277-.767-.469-.277-1.087-2.237-.085-1.96.447-.852.831-.17,2.386-.959.682-1.321.511h-3.6l-9.524-1.641-3.281-1.108-3.111-.384-2.216.149-.384-.213-.213-1-.959-.6-1.044-.447-3.2-.341-.7-1.555-2.6-1.854-4.645-1.683-.767-.661-2.791-.533-5.476-.4-4.283-1.129-20.178-1.406-1.854-.533-1.044-1-1.832-.6-1.172.4-.043-.746-1-2.259.021-1.7,1.215-1.939,1.875-.4-.511-1.108.213-.788,1.044-.895.959-.362,1.342-1.811-.149-1.939-1.087-1.087-2.621-.32-1,.362-.661.682h0l-.341-1.619.384-.384-.213-.937,1.385-1.47.17-1.513,2-.937.064-.575.788-.533-1.172-1.406-.447.064-.937-1.023h-.341l-.234-.724.192-3.686-1.193-2.642.234-2.045,1.321-.192.533-.7-.938-2.983,1.428-1.364.7.213.447,1.385,1.151-.085-.021-.533-.639-.341.213-.128,2.173.575.639.767,6.2-.043.383-1.3h0l.085-.32h0l1.108-.107-.511,1.449.256.32,1.918-.533,1.811,1.044.383-.107.447-2.024-.447-.788-.107-1.193,1.342-.362.874-1.832.128-4.24h0l.788-.128.384-.533-.533-.874.895-.6-.341-.469-.362.192-.107-.724.661-.554.234-1.406-.362-.49-.618.149v-.192l1.278-.874Z"
                                      transform="translate(-193.226 -228.888)"/>
                            </g>
                            <g transform="translate(384.594 225.438)" class="click-point" onclick="window.location='region?r=jawatimur'">
                                <path class="id-ji"
                                      d="M360.12,326.328l1.385.277,1.832-.107,1.023.639-.362.788-2.152.511-2.088.107-.959-.4.064-1.108.746-.3.171-.575.341.17Zm90.812-49.476,1.151.383-.149.554.49.426,1.108.128.213.447h.554l.362-.3V277.7l.874-.384-.021-.49.575-.277-.575,3.3-.639.49-1.683.128-2.77-1.364-.362-.7.6-.938-.341-.959.3-.511.32.852Zm-50.711,2.536-.6.128-1.492-.4-1.683-1.172-.682-1.321.49-1.215,1.811-.554,1.044.724,1.577,3.217-.469.6Zm46.216-7.713,1.215.7.341.788-1.172-.426-1.236.3-1.023-.384-.128-.724-.6-.064-.234-.575.554-.7,2.28,1.087Zm-60.577-3.153,3.75,1.939.682,1.641-1.215-.043-.767.682-1.129.4-2.621.17-.724.6-.959-.447-.447.277,1.278.6.895,1,3.068.17.49,1.406-3.409-.4-1.364-1,.192-.682-.916-.4-1.215.959-.277.6-.085.362.533.234.234.682-.234.49-7.649-.916-1.278.81-.447-.192-1.236.234-.895,1-.895,2.578-1.449.959-.447-.362.277-.192-.17-.362-1.619-.32-6.669-.234-.639.362-2.706.085-.639-1.044-.724.128-.043-.49.447-.554-.724-.639-.81.959.362.81.81.724-1.982.192-7.564-1.854-1.044-.6-3.175-.192-.852.533-1.406.043-.959-.767.49-2h-.6L336.831,275l.447-1,1.278.32,2.621-2.173,1.278-1.9-.085-.724,2.259-.81,3.388-.043,1.449-.32,3.494.447,11.911-.128,2.536.362,7.372-.533,2.45.128,5.476-.81,3.154.7Zm47.43-1.982,4.709.341,2.045.7,3.175,1.79.511.938-.938,1.278-.916-.554-.959.064-.916-.916-2.173.341-.7-.81-.874.128-.213.3-1.065-.128.149.49,1.513.7.81,1.172-2.472.277-.575-.81-.383.021-.49.277.064.81-.554.17-1.428-1.364,1-1.151-.66.213-1.79-.17-.3-.66.384-1.321,1.065-.192.511-.7.021-.384-.916-.49.192-.213.7-.341,1.47.192Zm-130.806-2.152,1.065.107,1.768.874,1.342.043,1.982-.49,1.492-.852.938.107,2.45,4.048.831.618,1.939.256,1.9-.106,2.195-.916,1,.256,2.77-.533,2.663.362.533-.3,1.129.32,1.257.959,1.406.277.788-.98-.49-.618.6-.384-.107-.724.852.724.256-.149.043.66.6.831.618-.021.447.6-.277.575-.469-.192-.043.575.682,2.152,1.3.959.192,1.172-.81.938-.32,1.683,1.662,1.513.085.81-.618.383v.618l.575.384,1.342.085.362-.831,1.726-.192.767.575.831,1.513,1.491,1.193-.043,1.065-.469.554.426.213-.341,2.493.128,2.706-.788.128.724,1.278,1,.32.3.469-.3,1.832.426.106.533,1.044,1.683.6.511-.384.788.874,1.023.49.852-.362.959.234,1.577,1.79,3.047,1.556,1.513-.3,1.428.234,1.257,1.492.831-.469.554.149,1.087-.426.81-.831,1.257-.128,3.516-1.406,1.768.49,1.065-.128,3.3.938,1.6-.895,1.406,1,.49-.043,1.065-.32.916-1.108,1.236-.575,2.685.661,2.28-2.323,1.832-.916,1.193.831,1.257,2.621.341.149,3.409.256,1.385-.661,1.811,1.7,3.3.554,2.109,1.278.959,1.342v1.96l-1.662,1.47.426,2.77-.021,2.386-.895,1.683-.192,1.641-.66,1.406.213,1.577-.788,1.683-.895,4.73-.107,1.236.9,1.79-.469,1.406.49.447.362-.192.384-1.832-.192-1.172.256-.149.426.469-.043,1.065.426,1.108-.256,1.215.788,2.024,1.023,1.236,1.023-.81,1.321,1.278,2.088.341,1.257,1.918-.533,1.662-.724.575-1.492.341-3.473-1.172-2.28.064-1.023-.256-.128-.49.959-.469.256-.7-.341-1.214-1.3-1.321-2.6-1.172-1.151.107-.32.384.085,1-.341.213-4.134-1.087-2.259.639-.554-.384v-.98l-.618-.256-.575.341-.064.447-1.3.107-.49-.533.788-.213.043-.554-.6-.7h-.618l-.682.724-1.236-.7-1.79-.3.043-.874-.639.724-.341-.064.043-1.811-.426-.234-1.406.49-.341.575-.49.192-.469-.234-.3.277-.192-.128.362-.916-.277-.533-.788.6-.426-.362-.362.256-1.683-1.96-.916-.341-.852.128.128-.256-.362-.256-.575.32-1.108-.149-1.662-.788-.043-.874-.788-.341-1.278.128-1.278.767-1.385-2.28-.618-.533-1.7-1.129-1.982-.49L355.666,320l-5.71.959-2.173,1.278-.724,1.3-1.108.895-7.777,1.065.17,1.065-.831.277-2.578-1.342-2.28-.7-4.283-.362-.98-.6h-.98l-1.769-1.3-1.619-.469-1.257.66-1.3-.192-1.215-.66-5.391-.192-.98-.192-.6-.661-1-.426-1.342-.213-.213.256.234.469H308.3l-1.513-1.257-.469-.043-.256.533-1.385-.362-.107-.341-.874.213.192,2.259-.66.383-.7-.085.234-.7-.469-.831-.724.021-.171.341.426.746-.81.021-.213.447.831.7.149.511-1.065.277-.661-.043-.341-.6-1.6-.17.3-.426-.149-.7H297.8l-.085.277-.7-.192-.32.383-.6-.149-.042-.788-.661-.149-.511.98-2.749-.661-.362-1.662-.7-.426-1.406.788-5.327-1.129-1.108.746-2.642.234-1.768-1.236-.085-.724-.6-.043-.17.959-2.131.234-4.176-1.385h0l-.256-1.747.533-1.939,1.492-1.96,2.685.7,1.79-1.3,1.172.661L280,310.8l-.149-2.259.6-.4-.085-.639.384-.384,1.364-.341.149.6.895-.128.575.7.639-.192,1.321-1.449.383-1.492.661-.511-1.236-2.791.213-1.193-2.045.085-1.768-1.449.213-.81-.149-1.641.384-1.321-1.364-.895-.4-1.7.064-1.364-.575-.7-.639-2.173.98-2.067-.128-1.044.32-.895-.383-.256.4-1.513.192-.277.7.213.852-.277.192-.384.447.064.98,1.193,2.472.895,1.577,1.065,2.429.575.533.639.852.277.192-.575-.639-.32.341-1.172h-.98l.767-1.9.447-.447.32.213.469-.383.213.192L295,281.093l1.449-1.492,1.385-2.727-.128-1.065.447-.7-.447-1.918.4-.959-2.088-1.428.639-1.108.852-.341.511-2.876,1.428-.192.32-.447-.085-1.3.341-.384.384.32.426-.724h0l.831.575.81.064ZM338,226.077l.831.213-.021.639.575,1.129L339,229.806l-1.619.831-1.342-.107-.362-.3-.767.362h-1l-.618-1.108.575-1.9.682-.107.149-.788.746-.469.618-.256.831.192.469-.724.639.639Z"
                                      transform="translate(-271.396 -225.438)"/>
                            </g>
                            <g transform="translate(171.286 239.288)" class="click-point" onclick="window.location='region?r=jakarta'">
                                <path class="id-jk"
                                      d="M177.039,248.089l-.554,1.044.341,1.555-.639,1.3-1.364.49-.895,1.215-.447-.6.81-.959.064-.852-.7-.554.043-.895-.6.085-1.151,1.044-.107.661-.554-.341.6-1.257,2.109-1.6,1.108.256v-.554l1.044.043.554-.341.341.256ZM231.522,232.3l3.835.724,1.555-.874,2.983-.192h0l-.128,4.219-.874,1.832-1.364.362.128,1.193.447.788-.447,2.024-.384.128-1.811-1.044-1.918.533-.234-.341.511-1.449-1.129.128h0l-.938-1.619-.341-1.555-.831-.17.043-1.406-1.3-.7.064-2.386,1.278-.554h0l.852.362Z"
                                      transform="translate(-171.286 -231.938)"/>
                            </g>
                            <g transform="translate(298.278 250.773)" class="click-point" onclick="window.location='region?r=jawatengah'">
                                <path class="id-jt"
                                      d="M346.628,250.3l-.426.724-.384-.32-.341.383.085,1.3-.32.448-1.406.192-.511,2.876-.852.341-.639,1.108,2.088,1.428-.4.938.447,1.939-.447.682.128,1.087-1.385,2.706-1.47,1.513-2.024,1.065-.213-.192-.469.384-.32-.213-.447.426-.746,1.9h.98l-.362,1.172.639.32-.192.575-.852-.277-.533-.639-2.429-.575-1.577-1.065-2.472-.895-.98-1.193-.447-.064-.192.383-.852.277-.682-.213-.192.277-.4,1.513.362.256-.32.895.128,1.044-.98,2.045.639,2.195.575.682-.064,1.364.4,1.7,1.364.895-.383,1.321.149,1.662-.213.788,1.768,1.47,2.046-.107-.213,1.215,1.236,2.77-.661.511-.384,1.492-1.321,1.47-.639.17-.575-.682-.874.128-.17-.618-1.342.362-.384.383.085.618-.6.426.17,2.237-.959,1.492-1.172-.661-1.79,1.3-2.706-.7-1.47,1.96-.533,1.939.256,1.747h0l-2.536-.618h0l.085-1.065-.256-.107-.384.384-.17-.234.511-1.3-.469-.021-.682.81-.49-.383.106-1.6-1.214-3.43.49-1.172-.043-2.344.618-1.79.106-1.9-.618-.362-.511.575-.788-.98-.682-.277-.362.469-.874.107-.4-.7-.511.49-.3-.3-2.344.49-.447-.724-.49-.192-.767.49-.916-.852-.682-.128-1.726-8.289-5.093,4.006-1.215,1.641-.554-.3.064-1.257-.426-.362-.618.256-2.685-.277-1.3.341-.384.916.682.6-.256,1.875-.724,1.087-.554.213-.426.895-.852.511-.66,2.727-1.236-.064h0l-3.6-1.321-7.713-2.109-7.117-1.129-.98-.383-2.536.554-.98-.724.362-1.065-3.984-.895-6.563-.49-1.641.256-1.257.746-.341.639-.192.81.4.511.6-.192.256.341-.4.511-7.905-1.7-1.065.192-.362-.639.383-.575-.533-.17.639-.66.98-.149.383-.511h.852v-.32l-.469-.192-1.768.639h0l-1.044-.533-1.47-1.555.618-.938.17-1.108-.724-2-.639-.788-.213-.938.277-.98-1.172-1.257-.234-1.023-1.087-1.023-2.493.192-.447-.511-.383.043-.192-1.747,1-1.726v-1.087l-.6-.575.043-1.214,2.088-1.023.724-.021.724.661,1.236-.128,1.023-1.236,1.406-.107.6-.554-.107-.788.362-.788-.213-.661.575-.49.085-.767-1.385-.788.106-1.385-.341-1.065.916-1.236.533-.234,1.193-1.811.149-3.132h0l.213.511-.213.554.618.107.533.959,3.473,1,.511-.852.746-.043,1.47-1,.639.149.724-.831.3,1.9,1.406,1.321h1.854l.98.6,2.6.384,1.619-.021,1.321-.426.895.17,2.109-.554L265,252.584l1.47-1.385,2.046,2.173,3.154.362,7.99,2.578,1.875-.192,1.364.362,1.619-.128,4.965-1.641.831-.575.192-.533,1.619.511,1.065,1.747,1.854.682.7.575,2.152.661,2.408-.533.256.49,1.3-.49-.021-.916,1-1.449.49-1.577,1.257-1.023.81-1.641-1.172-.085-.32-.49.852.149-.533-.98.767-.17.554.341.874-.639,1.342-1.79-.149-1.747.511-.17.192-1.662-.234-.362,1.172-1.321-.618-.682.6-.234,1.492-1.811L313,238.2h1.044l.746-.6,2.642-.277,1.832.447,1-.341,2.323.746,2.195,6.584,1.385,1.832,2.195.49,1.492.788,4.922.49,2.983-1.3.384-1.044,1.044-.575.618.447.81-.192,1.492.618Z"
                                      transform="translate(-230.886 -237.328)"/>
                            </g>
                            <g transform="translate(351.866 292.876)" class="click-point" onclick="window.location='region?r=yogyakarta'">
                                <path class="id-yo"
                                      d="M286.484,281.421l-4.347-.192-12.465-4.538-.874-.7-.533-1.023-4.2-1.321-5.284-2.727-2.749-1.023h0l1.236.064.661-2.727.852-.511.426-.895.554-.213.724-1.087.256-1.875-.682-.6.383-.916,1.3-.341,2.685.277.618-.256.426.362-.064,1.257.554.3,1.215-1.641,5.092-4.006L274,265.377l.682.128.916.852.767-.49.49.192.447.724,2.344-.49.3.3.511-.49.4.7.874-.106.362-.469.682.277.788.98.511-.575.618.362-.107,1.9-.618,1.79.043,2.344-.49,1.172,1.214,3.43-.106,1.6.49.383.682-.81.469.021-.511,1.3.17.234.383-.383.256.107Z"
                                      transform="translate(-256.036 -257.088)"/>
                            </g>
                            <g transform="translate(174.887 231.617)" class="click-point" onclick="window.location='region?r=banten'">
                                <path class="id-bt"
                                      d="M228.78,235.987l-1.278.533-.085,2.386,1.3.7-.043,1.428.831.17.341,1.555.938,1.619h0l-.085.32h0l-.384,1.3-6.2.043-.639-.767L221.3,244.7l-.213.128.639.341.021.533-1.151.085-.447-1.385-.7-.213-1.428,1.364.938,2.983-.533.7-1.321.192-.234,2.046,1.193,2.642-.192,3.686.234.724h.341l.938,1.023.447-.064L221,260.9l-.788.533-.064.575-2,.937-.17,1.513-1.385,1.47.213.938-.384.384.341,1.619h0l-1.044.4-2.152.107-.192-.6-1.406-.064-.128-.49-.788-.213.064-.916-1.939-.916-1.172-.043-1.151-.831-.98-.213-1.492-1.726-1.151-.49-3.068-.256-6.264,1.3-3.2-.4-4.517.7-.852.618-1.492-.4-.724.256-1.3-1.172-.66-.107-.32.66-.4.021.149-.554-1.215-.81-2.45-.511-.682.149-.426.916-.7.6-.874-.213-.32-2.131-.447-.6h-.341l-.149-.554,2.088.149.7-.959,1.7-1.236-.256-.916,1.769-.852,1.215,2.706-.384.107-.149.49,1.065.7.682,1.129.107.938.661.533.448-.085,1.108-1.342.3-2.109,2.237-1.832.149-.852.767-.3.682-.895.469-1.513-.192-1.7,1.151-2,.852-.661.277,1.023-.384.511.874.682.724.128,2.173-.447,1.492-2.046.362-1.236.17-6.563,1.3-4.794.831-.511-.064-1.3,1.6-1,.575-.852,1.662-1.364.384-1.854-.575.107,1.854-1.79,1.577-.234,1.193,1.385-.043,2.749,2.173,1.172.554.064,1.619-.746.554-.618.256-1.044.49-.362,1.854.618.256.426.618.192.852-.874.575.554.682.064-.192.32.49,1.108,1.044.554.81-.149,1.555.49,1.555-1.129,1.044.66,1.982-.362.447-.341.916.533,1.044-.32,1,.98-.192.256Z"
                                      transform="translate(-172.976 -228.338)"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <!--legend total kasus-->
                <div class="row">
                    <div class="mf35-f30 font-weight-bold cl-jaw2">Total Kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                </div>
                <!--stripped bar-->
                <div class="d-flex flex-nowrap align-items-center">
                    <span class="f11 font-weight-bold cl-jaw1 mr5"><?php echo $mincase ?></span>
                    <span class="jaw-totalcasebar"></span>
                    <span class="f11 font-weight-bold cl-jaw1 ml5"><?php echo $maxcase ?></span>
                </div>
                <!--Simple Table-->
                <table class="table table-hover text-center cl-jaw2 mt20c jaw-table rgview-tcustom">
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

                <hr class="jaw-hr-helpseparator mt50 d-block d-sm-block d-md-none mb90">

                <!--Call for help for mobile screens-->
                <div class="cl-jaw1 mt50 d-block d-sm-block d-md-none">
                    <div style="width:60px; height:60px;" class="d-flex justify-content-center flex-column">
                        <img style="width:60px;" src="img/asset/regview/jaw-phone.svg" alt="Bantuan untuk kasus coronavirus di wilayah ini">
                    </div>
                    <div class="mt20">
                        <span class="f32 font-weight-bold">Pusat bantuan</span>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel1'] ?>" class="a-none">
                            <span class="f24 cl-jaw1"><?php echo $help['tel1'] ?></span>
                        </a>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel2'] ?>" class="a-none">
                            <span class="f24 cl-jaw1"><?php echo $help['tel2'] ?></span>
                        </a>
                    </div>
                    <a href="<?php echo $help['web'] ?>" class="a-none" target="_blank" rel="noreferrer">
                        <div class="f20 cl-jaw1 mt15" ><span class="jaw-call"><?php echo $help['web'] ?></span></div>
                    </a>
                </div>
            </div>

            <!--statistik angka & grafik-->
            <div class="col-8 col-md-9">
                <div class="row text-center">
                    <div class="col-12 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/jaw-virus-lg.svg" alt="Total orang yang terinfeksi oleh virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-jaw1 mt10">Total kasus</h2>
                        <div class="f80 font-weight-bold cl-jaw3 nmt30"><?php echo $maininfo['t'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-jaw1 nmt20"><?php echo $maininfo['t_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2 nmt5">
                            <a href="peringkat?v=persenpertambahankasus" class="a-none">
                                <img src="img/asset/regview/jaw-<?php echo $maininfo['t_rank_status'] ?>" alt="<?php echo $maininfo['t_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-jaw2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-jaw2"><?php echo $maininfo['t_rank'] ?></span>
                                <span class="mf16-f12 cl-jaw2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="9"><sup>[9]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2">
                            <a href="peringkat?v=totalkasus" class="a-none">
                                <img src="img/asset/regview/jaw-<?php echo $maininfo['t_per_id_status'] ?>" alt="<?php echo $maininfo['t_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-jaw2"><?php echo $maininfo['t_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-jaw2"><?php echo $maininfo['t_per_id'] ?></span>
                                <span class="mf16-f12 cl-jaw2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/jaw-recovery-lg.svg" alt="Total orang yang sembuh dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-jaw1 mt10">Sembuh</h2>
                        <div class="f80 font-weight-bold cl-jaw3 nmt30"><?php echo $maininfo['tr'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-jaw1 nmt20"><?php echo $maininfo['tr_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2 nmt5">
                            <a href="peringkat?v=persenpertambahankesembuhan" class="a-none">
                                <img src="img/asset/regview/jaw-<?php echo $maininfo['tr_rank_status'] ?>" alt="<?php echo $maininfo['tr_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-jaw2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-jaw2"><?php echo $maininfo['tr_rank'] ?></span>
                                <span class="mf16-f12 cl-jaw2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="13"><sup>[13]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2">
                            <a href="peringkat?v=totalsembuh" class="a-none">
                                <img src="img/asset/regview/jaw-<?php echo $maininfo['tr_per_id_status'] ?>" alt="<?php echo $maininfo['tr_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-jaw2"><?php echo $maininfo['tr_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-jaw2"><?php echo $maininfo['tr_per_id'] ?></span>
                                <span class="mf16-f12 cl-jaw2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/jaw-death-lg.svg" alt="Total orang yang meninggal dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-jaw1 mt10">Meninggal</h2>
                        <div class="f80 font-weight-bold cl-jaw3 nmt30"><?php echo $maininfo['td'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-jaw1 nmt20"><?php echo $maininfo['td_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2 nmt5">
                            <a href="peringkat?v=persenpertambahankematian" class="a-none">
                                <img src="img/asset/regview/jaw-<?php echo $maininfo['td_rank_status'] ?>" alt="<?php echo $maininfo['td_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-jaw2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-jaw2"><?php echo $maininfo['td_rank'] ?></span>
                                <span class="mf16-f12 cl-jaw2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="11"><sup>[11]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2">
                            <a href="peringkat?v=totalkematian" class="a-none">
                                <img src="img/asset/regview/jaw-<?php echo $maininfo['td_per_id_status'] ?>" alt="<?php echo $maininfo['td_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-jaw2"><?php echo $maininfo['td_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-jaw2"><?php echo $maininfo['td_per_id'] ?></span>
                                <span class="mf16-f12 cl-jaw2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!--Fakta Menarik-->
                <div class="row justify-content-center mt70">
                    <div class="col-md-12 col-lg-10 col-xl-8 justify-content-center">
                        <div class="row justify-content-center text-center">
                            <div class="col justify-content-center">
                                <div class="f32 font-weight-bold cl-jaw2">Fakta <?php echo $namaprov ?></div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-around text-center">

                                <!--Kasus / 1 Juta Penduduk-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/jaw-virus-sm.svg" alt="Total kasus per 1 juta penduduk di region ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-jaw3"><?php echo $faktamenarik['kasus1jt'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-jaw1 mb0 nmt5">Kasus / 1 Juta Penduduk<a class="a-none a-inh-sup click-point" data-id="51"><sup>[51]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2 nmt5">
                                        <a href="peringkat?v=kasusper1jutapenduduk" class="a-none">
                                            <img src="img/asset/regview/jaw-<?php echo $faktamenarik['kasus1jt_st'] ?>" alt="<?php echo $faktamenarik['kasus1jt_st_alt'] ?>">
                                            <span class="mf16-f12 cl-jaw2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-jaw2"><?php echo $faktamenarik['kasus1jt_rank'] ?></span>
                                            <span class="mf16-f12 cl-jaw2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="52"><sup>[52]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Kapasitas Rumah Sakit-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/jaw-hospitalcapacity-sm.svg" alt="Kapasitas rumah sakit di region ini pada saat ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-jaw3"><?php echo $faktamenarik['kapasitasrs'] ?><span class="f20">%</span></div>
                                    <h3 class="f16 font-weight-bold cl-jaw1 mb0 nmt5">Kapasitas Rumah Sakit<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2 nmt5">
                                        <a href="peringkat?v=bebanrumahsakit" class="a-none">
                                            <img src="img/asset/regview/jaw-<?php echo $faktamenarik['kapasitasrs_st'] ?>" alt="<?php echo $faktamenarik['kapasitasrs_st_alt'] ?>">
                                            <span class="mf16-f12 cl-jaw2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-jaw2"><?php echo $faktamenarik['kapasitasrs_rank'] ?></span>
                                            <span class="mf16-f12 cl-jaw2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="53"><sup>[53]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Rata-rata waktu menuju RS-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/jaw-timetohospital-sm.svg" alt="Perkiraan rata-rata waktu yang dibutuhkan untuk menuju rumah sakit di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-jaw3"><?php echo $faktamenarik['wakturs'] ?><span class="f20">mnt</span></div>
                                    <h3 class="f16 font-weight-bold cl-jaw1 mb0 nmt5">Rata-Rata Waktu Menuju RS<a class="a-none a-inh-sup click-point" data-id="39"><sup>[39]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2 nmt5">
                                        <a href="peringkat?v=waktumenujurs" class="a-none">
                                            <span class="mf16-f12 cl-jaw2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-jaw2"><?php echo $faktamenarik['wakturs_rank'] ?></span>
                                            <span class="mf16-f12 cl-jaw2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="39"><sup>[39]</sup></a></span>
                                        </a>
                                    </div>
                                </div>

                                <!--Jarak 1 Pasien dari Lokasi Anda-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/jaw-keepdistance-sm.svg" alt="Rata-rata jarak orang sehat dengan 1 orang terinfeksi corona di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-jaw3"><?php echo $faktamenarik['jarak1pasien'] ?><span class="f20">km</span></div>
                                    <h3 class="f16 font-weight-bold cl-jaw1 mb0 nmt5">Jarak 1 Pasien dari Lokasi Anda<a class="a-none a-inh-sup click-point" data-id="37"><sup>[37]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2 nmt5">
                                        <a href="peringkat?v=jarak1pasienpositifcorona" class="a-none">
                                            <img src="img/asset/regview/jaw-<?php echo $faktamenarik['jarak1pasien_st'] ?>" alt="<?php echo $faktamenarik['jarak1pasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-jaw2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-jaw2"><?php echo $faktamenarik['jarak1pasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-jaw2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="55"><sup>[55]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Dokter per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/jaw-doctor-sm.svg" alt="Setiap 1 pasien corona rata-rata ditangani oleh sejumlah dokter di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-jaw3"><?php echo $faktamenarik['dokterpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-jaw1 mb0 nmt5">Dokter Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="1"><sup>[1]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2 nmt5">
                                        <a href="peringkat?v=dokterper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/jaw-<?php echo $faktamenarik['dokterpasien_st'] ?>" alt="<?php echo $faktamenarik['dokterpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-jaw2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-jaw2"><?php echo $faktamenarik['dokterpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-jaw2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="56"><sup>[56]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Perawat per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/jaw-nurse-sm.svg" alt="Setiap 1 pasien corona rata-rata dirawat oleh sejumlah perawat di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-jaw3"><?php echo $faktamenarik['perawatpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-jaw1 mb0 nmt5">Perawat Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="41"><sup>[41]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-jaw2 nmt5">
                                        <a href="peringkat?v=perawatper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/jaw-<?php echo $faktamenarik['perawatpasien_st'] ?>" alt="<?php echo $faktamenarik['perawatpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-jaw2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-jaw2"><?php echo $faktamenarik['perawatpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-jaw2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="57"><sup>[57]</sup></a></span>
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
                                    <h5 class="f24 font-weight-bold cl-jaw2">Pertambahan & Kasus Aktif</h5>
                                </div>
                            </div>

                            <!--Legend-->
                            <div class="row justify-content-center mb10">
                                <div class="col-12 justify-content-center sm-mw1">
                                    <div class="d-flex flex-nowrap justify-content-center f12">
                                        <div>
                                            <span class="jaw-c0-legend1 align-self-center"></span>
                                            <span class="cl-jaw1">Pertambahan kasus per hari<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                        </div>
                                        <div class="ml30">
                                            <span class="jaw-c0-legend2 align-self-center"></span>
                                            <span class="cl-jaw1">Persen kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></span>
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
    <nav class="jaw-addbg mt20"  style="position:sticky; top:3px; z-index:997">
        <div class="container">

            <div class="d-flex flex-wrap justify-content-center">
                <div class="d-flex flex-wrap pt10 pb10 pr10">
                    <div class="text-center justify-content-center d-flex flex-column">
                        <div class="f16 cl-jaw6 font-weight-bold mr10">Region<a class="a-none a-inh-sup click-point" data-id="59"><sup>[59]</sup></a> lainnya</div>
                    </div>
                    <div class="row text-center justify-content-center f16">
                        <a href="region#sumatera" class="a-none"><span class="jaw-region-block cl-white">Sumatera</span></a>
                        <a href="region#jawa" class="a-none"><span class="jaw-region-block cl-white">Jawa</span></a>
                        <a href="region#kalimantan" class="a-none"><span class="jaw-region-block cl-white">Kalimantan</span></a>
                        <a href="region#sulawesi" class="a-none"><span class="jaw-region-block cl-white">Sulawesi</span></a>
                        <a href="region#balinusatenggara" class="a-none"><span class="jaw-region-block cl-white">Bali & Nusa Tenggara</span></a>
                        <a href="region#malukupapua" class="a-none"><span class="jaw-region-block cl-white">Maluku & Papua</span></a>
                    </div>
                </div>

                <div class="d-none flex-wrap pt10 pb10 pl10">
                    <div class="text-center justify-content-center d-flex flex-column mr10">
                        <span class="jaw-survey-tag-block cl-jaw2">SURVEI</span>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div>
                            <span class="cl-jaw6 font-weight-bold">Saya </span>
                            <span class="cl-jaw6">berasal </span>
                            <span class="cl-jaw6 font-weight-bold">dari Aceh</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn jaw-btn-send">
                                    <span class="jaw-survey-selection cl-jaw6">
                                        Ya
                                        <img src="img/asset/regview/jaw-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn jaw-btn-send">
                                    <span class="jaw-survey-selection cl-jaw6">
                                        Tidak
                                        <img src="img/asset/regview/jaw-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>

                        </div>
                        <div class="ml10">
                            <span class="cl-jaw6 font-weight-bold">Informasi </span>
                            <span class="cl-jaw6">yang disajikan </span>
                            <span class="cl-jaw6 font-weight-bold">membantu</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn jaw-btn-send">
                                    <span class="jaw-survey-selection cl-jaw6">
                                        Ya
                                        <img src="img/asset/regview/jaw-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn jaw-btn-send">
                                    <span class="jaw-survey-selection cl-jaw6">
                                        Tidak
                                        <img src="img/asset/regview/jaw-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!--Total Kasus-->
    <div class="container jaw-container-case rgview-details-spacing">
        <div class="row mt50">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-jaw1 rgview-breakword">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a> </span>
                    <span class="mf36-f24 cl-jaw1">(Kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-jaw3"><?php echo $activecase ?></span>
                    <span class="mf36-f24 font-weight-bold cl-jaw1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-jaw3"><?php echo $activecase_id ?>%</span>
                    <span class="mf36-f24 cl-jaw1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-jaw1">Pertambahan dan total kasus</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="jaw-c1-legend1 align-self-center"></span>
                                    <span class="cl-jaw1 mf24-f16">Pertambahan kasus<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="jaw-c1-legend2 align-self-center"></span>
                                    <span class="cl-jaw1 mf24-f16">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
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
                <h4 class="mf36-f24 font-weight-bold cl-jaw1">Kecepatan pertumbuhan kasus per hari<a class="a-none a-inh-sup click-point" data-id="42"><sup>[42]</sup></a></h4>
                <div class="mf24-f16 cl-jaw1">Mengukur seberapa besar pertambahan kasus setiap harinya terhadap jumlah kasus di hari
                    sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap1 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-jaw1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="43"><sup>[43]</sup></a></span>
                            <span class="jaw-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-jaw1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="44"><sup>[44]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-jaw1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/jaw-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-jaw1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kesembuhan-->
    <div class="container jaw-container-recover rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-jaw1 rgview-breakword">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a> </span>
                    <span class="mf36-f24 cl-jaw1">(Tingkat kesembuhan<a class="a-none a-inh-sup click-point" data-id="58"><sup>[58]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-jaw3"><?php echo $recoveryrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-jaw1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-jaw3"><?php echo $recoveryrate_id ?>%</span>
                    <span class="mf36-f24 cl-jaw1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-jaw1">Pertambahan dan total kesembuhan</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="jaw-c2-legend1 align-self-center"></span>
                                    <span class="cl-jaw1 mf24-f16">Pertambahan kesembuhan<a class="a-none a-inh-sup click-point" data-id="12"><sup>[12]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="jaw-c2-legend2 align-self-center"></span>
                                    <span class="cl-jaw1 mf24-f16">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></span>
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
                <h4 class="mf36-f24 font-weight-bold cl-jaw1">Kecepatan pertumbuhan kesembuhan per hari<a class="a-none a-inh-sup click-point" data-id="45"><sup>[45]</sup></a></h4>
                <div class="mf24-f16 cl-jaw1">Mengukur seberapa besar pertambahan kesembuhan setiap harinya terhadap jumlah kesembuhan di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap2 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-jaw1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="46"><sup>[46]</sup></a></span>
                            <span class="jaw-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-jaw1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="47"><sup>[47]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-jaw1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/jaw-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-jaw1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kematian-->
    <div class="container jaw-container-death rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-jaw1 rgview-breakword">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a> </span>
                    <span class="mf36-f24 cl-jaw1">(Tingkat kematian<a class="a-none a-inh-sup click-point" data-id="15"><sup>[15]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-jaw3"><?php echo $deathrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-jaw1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-jaw3"><?php echo $deathrate_id ?>%</span>
                    <span class="mf36-f24 cl-jaw1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-jaw1">Pertambahan dan total kematian</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="jaw-c3-legend1 align-self-center"></span>
                                    <span class="cl-jaw1 mf24-f16">Pertambahan kematian<a class="a-none a-inh-sup click-point" data-id="10"><sup>[10]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="jaw-c3-legend2 align-self-center"></span>
                                    <span class="cl-jaw1 mf24-f16">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></span>
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
                <h4 class="mf36-f24 font-weight-bold cl-jaw1">Kecepatan pertumbuhan kematian per hari<a class="a-none a-inh-sup click-point" data-id="48"><sup>[48]</sup></a></h4>
                <div class="mf24-f16 cl-jaw1">Mengukur seberapa besar pertambahan kematian setiap harinya terhadap jumlah kematian di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap3 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-jaw1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="49"><sup>[49]</sup></a></span>
                            <span class="jaw-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-jaw1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="50"><sup>[50]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-jaw1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/jaw-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-jaw1">Mulai dari kiri atas lalu ke kanan</div>
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
                <h4 class="f24 font-weight-bold cl-jaw1">Komentar</h4>
                <div class="f16 cl-jaw1">Bagikan informasi, keresahan, dan semangat kepada Indonesia karena #SendiriKitaBisa #BersamaKitaKuat</div>

                <!--input-->
                <form class="mt30">
                    <div class="mr40">
                        <div class="form-group marginb1">
                            <input type="text" class="form-control font-weight-bold f12 cl-jaw1 jaw-c-f-input" value="Tanpa_nama0028">
                        </div>
                        <div class="form-group marginb3">
                            <input type="text" class="form-control f14 cl-jaw1 jaw-c-f-input" placeholder="katakan sesuatu...">
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="cl-jaw1">0/120</span>
                        <button type="submit" class="btn btn-send">
                            <img src="img/asset/regview/jaw-send.svg" alt="send button">
                        </button>
                    </div>
                </form>
                <hr class="jaw-hr-comment">
                <!--Chat Content-->
                <div class="mt25">
                    <div class="f14 cl-jaw1">13:10 2 April 2020</div>
                    <div class="mt5">
                        <span class="cl-jaw2 font-weight-bold f16">Jonathan Raditya</span><br>
                        <span class="cl-jaw1 f16">Semoga kita semua dalam keadaan sehat ya, jangan lupa #JagaKebersihan dan #diRumahAja !</span>
                    </div>
                    <div class="">
                        <img src="img/asset/regview/jaw-likes.svg" alt="likes button">
                        <span class="f15 font-weight-bold cl-jaw2">128</span>
                    </div>
                </div>


            </div>

            <!--Catatan Kaki-->
            <div class="col-xl-5 col-lg-5 col-md-8 col-11 mt100 d-none">
                <a href="bantuan?h=catatankaki" class="a-none"><h4 class="font-weight-bold mf36-f24 cl-jaw1">Catatan kaki</h4></a>

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