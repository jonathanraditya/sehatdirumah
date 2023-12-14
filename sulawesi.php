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
                background-color:#29409D;
                padding:0;
                color:#E9EEFF;
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
                    <div class="d-flex sul-provlogo-bg">
                        <!--left stripped-->
                        <div class="sul-provlogo-strip"></div>
                        <!--Logo provinsi-->
                        <div style="height:55px; width:55px;" class="align-self-center d-flex flex-column justify-content-center pt12 pb12 pl5 pr10">
                            <img class="img-fluid" src="img/asset/regview/logo/<?php echo $logo ?>" alt="<?php echo $logoalt ?> - Indonesia">
                        </div>
                        <!--Tulisan Provinsi + nama provinsinya-->
                        <div class="d-flex flex-column flex-nowrap pt12 pb12 pl7 pr15">
                            <h1 class="f24c font-weight-bold cl-sul1 mb0">Provinsi<br><?php echo $namaprov ?></h1>
                        </div>
                    </div>
                </div>
                <!--Peta-->
                <div  class="align-self-center d-flex flex-column justify-content-center"  style="height:375px;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 251.121 364">
                        <defs>
                            <style><?php echo $maphsl ?>
                            </style>
                        </defs>
                        <g transform="translate(-407.396 -48.978)">
                            <g transform="translate(541.295 48.978)" class="click-point" onclick="window.location='region?r=sulawesiutara'">
                                <path class="id-sa"
                                      d="M545.242,144.5l-1.584,2.207-1.37,4.5-1.8,3.257-2.741,3.773-2.349,1.015-2.705,2.029-2.136,2.082-2.705,4.539-.73,1.993-3.435,4.147-3.72,1.9-2.3.552-1.8.018-7.458,1.157-5.251,1.246-3.987.463-1.815-.552-3.951.036h0l.481-1.744,1.459-2.545-.142-1.8.285-1.922-.552-1.513-.961-1.032-3.6-.623-2.154-1.584-1.1-.961-.481-1.513.071-.819-1.246-1.246-1.531-.409-.961-.694-.356-1.442h0l4.147-.2,4.076.854,5.34,1.78.552.071,1.05-.605,6.835,1.62,2.812-.107,2.207-1.3,9.487-4.2.748-.943,1.477-3.827,1.762-.712,4.77.3.409-.231.748-1.032-.018-1.086-.961-.57-1.121.053-.463-.8-.053-.641.819-1.388,2.011-1.459,1.744.641,1.264-.089,3.6-2.029.374-.961-.961-1.869.089-.516,4.663-3.649,1.9-.16,3.044.872,1.21.979-.3.961.16.854,2.563,2.171-.57,1.513-1.068.623-1.157.107Zm8.437-37-.374.125-.836-.356-.676-2.634.8-2.1.943-.427.979.587.214.463-.142.605-1.335,1.513.053.8.676,1-.3.427Zm5.375-30.222-.391,1,1.8,2.3.3-.2.748.463.214,2.243-1.139,1.709-.356-.249-.3.142-.16,1.1-.285-.2.036-.552-.587-1-.89.036-.391-.516-.73-.214-.107-.516-.5.089-.534-1.246-.053-.837.836-1.851-.142-.285h-.481l-.2-.694.587-.214-.142-.249-.605.142-2.082-1.3-.391-.641.16-1.637,1.3-.463,1.833.338Zm34.565-5.607-.516.089-.374-.534-2.26-4.984-.231-1.833.481-.036.73.534,2.474,3.328.107.819Zm1.513-5.731-1.922-.267-.285-2.278,1.281-1.086,1.744-3.293v-.73l-.374-.338-1.78-.427-.3-.285-.516-1.709-.071-1.032.961-4.4.623-1.121,2.26.409,1.388,1.246,1.709,6.443-1.388,2.082-2.278,5.749-1.05,1.032Z"
                                      transform="translate(-482.626 -48.978)"/>
                            </g>
                            <g transform="translate(472.254 272.529)" class="click-point" onclick="window.location='region?r=sulawesitenggara'">
                                <path class="id-sg"
                                      d="M449.336,174.578l2.9.748,1.032.463.8.961.694.249,1.246-1.015,1.282-.374.712.142,1.05,2.4-.552,1.032v.587l.3.534,1.94.979,2.136.285.783-.427,1.976-2.029,2.688-1.032h0l4.717,1.922,3.524,1,1.139-.587,1.317.249,1.851-.089.783.409.908,1.21,1.922.374.285.587-.2,1.566.765.32.783,1.086.979-.178.748,1.851.943-.053.3.267-.2.374.231.765h0l-1.566,2.171.338,1.371,2.349.712.623.641.908.356,1.264,2.065-.267.73-.641.267-3.239-3.239-1.086-.641-1.335-.018,1.281,2.3-.748,2.243-2.1.837-.053.694,1.477,2.349,2.955,2.136,3.933,2.171-.089.409,1,1.264.178.89.819.534,2.794-.249,1.086.178.178.712-.89.641-.285,1.726,1.175.605.2.641-.587.765,1.015,2.314.3.231,4.361-.32-.2-.748-1.5-1.086-.338-.748.374-.2,1.121.071,1.228.872,1.21,2.794.3,1.9-.231,4.912-2.136,1.709-1.406-.872-2.99-2.616-.534.089-.285.267.374.73,2.065,1.8.641.979.142.765-.5.605-.641.267-.534-.73-1,.463-1.175-2.349-1.353-.89-2.349,1.353-1.353.445-1.459-.178-4.877,1.353-1.335-.249-2.367,1.317-1.655.3-1.1,2.065-.623,2.51.587,1.922,1.531,1.406.036.57-2.225,2.314-2.99.071-2.723-1.246-3.667-.392-1,.481-.73-.178-.356-.73-.819-.534-2.794-1.086-.908-.89-.356-.908-1-1-.356-.8.445-3.239.3-.249,1.032-3.809-.16-2.527.73-2.065.908-.445,1.175-2.527-.107-2.51-.445-1-2.349-.908-4.254-.623-.8-.623-1.993-2.883-.819-.356-.356-.641v-.89l-.908-.178-1.086.178-1.815-2.421-5.571-4.841-1.1-1.406-.765-.356-.409-1.21-.053-1.46.641-1.637,2.866-3.9,1.246-.623,1.086-2.741-.089-4.129.267-.979.623-.8.036-2.1-.338-.142.231-.676-.481.267-.427-.32-.214-1.406h-.231l-.249.783-1.015-.231.231.516.374.089-.071.409-.552-.053-.16-1.264-.516-.374-.036-.374.837.267.837-1.317Z"
                                      transform="translate(-443.836 -174.578)"/>
                            </g>
                            <g transform="translate(425.675 245.493)" class="click-point" onclick="window.location='region?r=sulawesiselatan'">
                                <path class="id-sn"
                                      d="M466.256,325.254l1.976-.089,2.083.659-.587.837-1.37.214-5.642-.926-.765-.5-.018-.427.73-.481,1.727.552,1.869.16Zm-7.6-7.386,1.993.979.819-.5.267.837-.445,1.442-2.972.392-1.086-.765-.392-1.139.267-2.118.748.2.8.676ZM453.1,298.858l-.748,1.691-.605-3.2.356-2.26-.819-4.414L451.145,283l.694-3.72.338-.605.409-.053.249.534-.036,1.157.819,1.477,1.246,4.77-.8,6.977-.961,5.322Zm-19.65-135.448.712.961.605-.587,1.05-.231,1.637-1.637.587.3,2.616-.231.231,1.032,1.5.676h3.2l2.385,1.032,1.424-4.378V159.6l.516-.214,2.26,2.581.3.819,2.616,3.631,2.011,1.922,2.314,1.193,1.353.587h1.5l.142-.587.819-.231,1.8.267.409.374,1.37.178,8.365,3.56,3.061.516,1.709,1.032,1.531-.125,1.21.214,2.26,1.744,1.1.374,1.477.107,1.193,1.78.8-.107,1.139.89,2.243,4.539-1.1.3-.481.481-1.37,2.652-.73.409-.445,1.353h0l-2.705,1.032-1.958,2.029-.783.427-2.136-.267-1.94-.979-.3-.552v-.587l.552-1.015-1.068-2.4-.694-.142-1.281.356-1.246,1.015-.694-.249-.8-.943-1.032-.481-2.919-.748h0l.748-.819-1.37-1.976-6.55-1.726-1.228-.089-2.919,1.086-3.257,1.94-6.1,4.432-5.268,3.275,2.029,5.34,2.367,1.726,1.032.427.926,1.566-.267,1.513-.142,6.23,1.015,2.367.57,3.969-.231.961-2.065,3.311-.605,1.8-.32,5.963,1.37,1.887-.908,6.657,1.193,3.257.819,5.7-.961,3.239-1.6,1.6-.926.57-.018,4.218-1.3,4.966,3.631,6.176,2.438,8.17-.231.356-1.477-.5-1.8-2.848-.641-.3-3.328.926-2.367,1.21-1.477.427-5.179-1.032-2.314,1.94-.445,1.335-1.638,1.086-3.435-.089-.552-.392-.427-.943.089-.5-.587-.676-4.912-1.709-3.382-5.019-.089-1.958.819-4.752.676-1.424,2.136-2.777,1.548-3.88.142-1.37-.676-1.691-.338-2.492,3.186-5.251.872-7.315.089-4.183-.872-6.621-1.887-3.044-2.723-5.322.979-2.527,1.1-1.531-.819-2.474h0L421.3,205.4l-.89-2.082-.142-1.637L419,200.485v-.748l.676-.516.676-.071.374.516,1.566-.445.445-.374.374-1.032,1.193-.445,1.869.071.071-.676-1.05-1.193-.89-2.082.516-1.246-.178-1.1-.463-.587.356-1.566v-1.815l.57-1.335,1.335.516,1.869-.748h.89l1.264-1.406.374-1.3,2.225-1.637.409-1.05-.178-1.406-.356-.641-1-.587-1.638-.285-.285-.356-.463-.926V174.5l-.534-.587-2.705-1.3.071-2.314,3.168-2.278.819-.765.231-.641,1.281-.178.231-.587-.481-1.584,1.815-.854Z"
                                      transform="translate(-417.666 -159.388)"/>
                            </g>
                            <g transform="translate(407.396 213.544)" class="click-point" onclick="window.location='region?r=sulawesibarat'">
                                <path class="id-sr"
                                      d="M432.154,141.438l.2,1.6-.392,1,.018,1.691.445,1.584.285,2.474.16.445.676-.142.053.908-.979,2.154.089.979-.338.676-2.759.338-.338.659.979-.338.2.427-1.015.587-1.157.142.018.463.872,1.121.57.374.623-.107.676,1,1.139-.125,1.015-.819h.641l1.353.783,1.015.979-.142.481-.979,1,.516,1.513,1.851,1.744-.142,1.121.694.231.783,1.353-.587.712-.2.961.712.481,1.1-.16.979.427.552-.214.089,4.912.249.605-.641.374.427,1.584h0l-1.815.819.463,1.6-.231.587-1.281.16-.231.641-.837.765-3.15,2.278-.071,2.314,2.705,1.3.516.57v1.513l.481.943.285.338,1.638.3,1,.587.356.641.178,1.388-.409,1.05-2.225,1.637-.374,1.3-1.281,1.406h-.89l-1.869.748-1.335-.516-.587,1.335v1.815l-.356,1.566.481.587.178,1.1-.534,1.246.89,2.082,1.05,1.175-.089.676-1.869-.071-1.193.445-.374,1.032-.445.374-1.566.445-.374-.516-.676.071-.659.516v.748l1.264,1.193.142,1.637.908,2.082.605,3.328h0l-4.254-1.637-1.8-.249-2.243,1.958-.89.16-1.744-.267-2.545.516-2.723,1.21-.819,1.05-.338-.16-2.492-5.7-.231-1.37-.071-8.187.463-.445,1.193-5.144-.16-.676-.534-.516L409,202.9l-1.264.587-.338-2.723.676-2.937.641-1.246.659-.409,1.246,1h1.264l3.1-2.047,4.254-4.2v-1.78l-.641-1.887.071-1.442.427-2.207,2.1-5.891.8-1.086.819-.445,1.3-.427,1.032.481.57-1.139.481-2.919-.249-.534-.908-.5-.214-.427-.837-3.061.036-.908.765-1.9-.819-3.916-.178-2.26.053-.445,1.175-.872-.356-1.691-.409-.57.071-.516,1.317-2.652,3.115-2.688.783-3.542.943-2.438.5-.961Z"
                                      transform="translate(-407.396 -141.438)"/>
                            </g>
                            <g transform="translate(428.202 147.155)" class="click-point" onclick="window.location='region?r=sulawesitengah'">
                                <path class="id-st"
                                      d="M548.34,309.552l-2.082-.16L545.1,307.2l-.142-1.424,2.332.267.872.712.3.641Zm-49.676,3.079-1.78.107-2.99-3.6-1.744-2.777.125-1.442,1.513-4,1.513-1.015,1.833.374.356.3,2.421,4.628-.2,5.927-.3,1.086Zm21.519-25.683,1.068,7.1.374.676-.142,1.8-3.969,3.435-1.424,3.1.125.837.837.659.783,1.815-.427,2.349-1.264,2.154-1.673.463-2.9-1.032-4.4-.356-.836-.32L506,307.968l1.5-5.357.463-1.086,1.548-.926.267-.605-.231-2.6-1.8-4.129,1.317-2.866.676-.374,1.833-.089,2.029-.57,2.545-1.993,2.9-1.406ZM535.4,288.8l.071,3.809-.356,1.513-1.086-1.175.267-1.815-1.3-1.958-.712.374.285,3.684-.641.445-1.086-.445-.267-.445.089-.73.641-.908-.089-.623-.249-.267-.748.392-.961,2.385-.765,3.417-.32,4.93,1.3,1.1.659-.142,5.215,4.111.053.659-2.207,2.83-2.866,1.246-.605-.16-1.015-.8-2.972,1.353-.8.765-.409,1.228,1.21.089.409.587-.374,1.032-2.26,3.578-.783.481-4.556-.214-1.6-2.688-1.086-2.794,5.108-7.76,1.424-3.827,2.225-9.789-.285-4.984.623-2.314,1.548-3.115,3.631-2.563.819-.231.641.231-.534.926.427,1.353,1.8,1,1.78,2.492.712,3.738Zm-4.094-20.771.641.107,2.634-.623,1.282,1.228.623,1.281-.16,1.282-2.794,3.667-.445.231-2.421-.142-1.566-1.584-1.566-2.136-.32-.837-.036-1.3,1.673-1.851,1.175-.249,1.282.926Zm3.844-87.142.854,1.762-1.246,2.029,1.513,2.812.783-.125.73-1.762.854-.659.32-.854,1.05-1.175,1.442-.659,4.468,2.1-.783,4.912-1.193.712-1.05,1.513-.926.071-2.1-.979-.463-1.05-1.193-1.175-.926.392-.463.854-.32,1.05-.2,3.008-.32.516H535.4l-.854.587-.925-.463h-.783l-.587-.267-.125-.712.32-.463.659-.071,1.442-1.637-.534-1.9-.463-3.862-.338-.587-.73.463-2.1,2.349-.463,1.9-1.317,1.637-.071.516-2.1,1.9-.73.32-.979-.2-1.246-2.883-.979-.392-.32-.587v-1.513l.854-3.275,1.78-2.154.463-.908.587-.712.783-.071,1.317.783.659-.463,3.489-1.05,1.121,1.246.783-1.566h.534l.605.73Zm-60.426-73.633.748.107,3.613-.552,1.673-1.459h.534l.57.392v.748l-.356.516-1.05.036-.427.267.374.2.3,1.246,1.05,1.5,1.638,1.709,1.015.463,1.175.3,10.216-1.388.338.2,1.032,2.118.57.231.623-.142,1.548-1.281.854.036,3.257,1.317h0L500,115.316l-.463-.053-.925,1.068h-.676l-.231,1.157-.534.481-.748-.3-.872-.926-.854-1.424-1.513.249-1.406,1.086-1.976.516-3.684,1.709h-2.581l-.854.748-2.367-.089-1.584-.908-.623.73-.036,1.709-.925.178-1.727-.676-1.887.676-.623.605-.107,1.887-.57.3.463.765,1.032.57.872,1.388,1.9.605,1.228.053.3,2.6-.516.89h0l-2.438-.73-3.079.783-1.1,1.46-3.56-.427-2.723.623-1.05-.338-.748-.8-3.417-1.032-1.442-.926-6.034-.338-2.029,1.157-2.99,1.032-3.026,3.044-3.773,5.518.623.587L439.768,142l-.356,3.755-1.05,1.121-.872-.125.125,2.385-.819,1.78-.089,2.421.659,1,.089,1.513,1.086,2.6-.481,1.513-.231,3.934.516,1.281,2.154,3.2,4.236,4.7.338.819.854.5.641-.053,1.353-.926.587-.125,1.032.765.409,1,1.958.2,2.563,4.165-.8,2.688.125,1.05.5.819.926.392,1.833,3.845.908.107,1.46-.765.445-1,.908-.392,1.21.018v1.281l.356.605.908.32,2.1-.285,4.325.534.765-.516,1.691-2.207,1.922-3.862L478,177.095l.694-.214.516-.837,1.531-1.193,1.175-2.118,1.1-.623,2.047-.516.374-1.655.89-.267.605-.036.587.516-.587,2.634.445.659h.445l2.011,1.157,3.88.445,1.62.694,2.349-1.566,1.335-.249,1.228.5.872.036.908-.908.694-3.506,2.67-1.032,1.726.765,4.77-1.78,6.639.943,3.026-.018,4.645-.463,1.246-.641-.125-.463-2.563-.908-3.542-.356-.837-.534.053-.481,2.634-1.121,2.705-.374,3.239.053.89-.267.623-1.157.409-.018,4.734.2,2.741,1.05,3.008,1.62,1.335,3.417-.249,2.207-1.406,1.637-.605,3.453-.89,1.21-.57.374-2.047-.32-.694-.356-2.243-2.6-.587-1.6-2.6-.605L523.19,173l-.712.961-.2,1.281-.872,1.637-2.314,2.527-1.78,3.079-2.1,1.673-3.684,3.951-1.993,2.527-6.621,3.7-4.663.605-1.8,1.175-3.56.694-1.175.89L490,201.959l-1.513,1.531-.854.463-1.922.338-1.976-.107-.587-1.068-2.26-2.314-3.471-1.5-.908.463-.3,1.78,1.548,4.485.676-.534,1.922-.107,1.62,1.78,2.723,3.969,1.513.605,1.62-.285,1.388.409,3.755,3.862,4.04,6.888,1.388,4.521,3.613,2.937,5.429,3.809.036,1.21-1.282,1.976-.036.659,3.4,3.044.445.267.979-.445,1.655,1.21-1.94,2.3-1.744-.481-.587.57h0l-.214-.765.2-.356-.3-.267-.943.036-.748-1.851-.979.178-.765-1.086-.765-.32.2-1.566-.285-.57-1.922-.374-.908-1.228-.765-.392-1.869.089-1.317-.249-1.157.587-3.524-.979-4.717-1.922h0l.445-1.353.73-.409,1.37-2.652.481-.481,1.1-.3-2.243-4.539-1.139-.89-.8.107-1.193-1.78-1.477-.107-1.1-.374-2.26-1.744-1.21-.214-1.531.125-1.709-1.032L473.977,217l-8.365-3.56-1.37-.178-.409-.374-1.8-.267-.819.231-.142.587h-1.5l-1.353-.587-2.314-1.193-2.011-1.922-2.616-3.631-.3-.819-2.26-2.581-.516.214v.748l-1.424,4.378-2.385-1.032h-3.2l-1.5-.676-.231-1.032-2.616.231-.587-.3-1.638,1.637-1.05.231-.605.587-.712-.961h0l-.427-1.584.641-.374-.267-.605-.089-4.895-.552.2-1-.427-1.1.16-.712-.481.2-.961.587-.712-.783-1.37-.694-.214.142-1.121-1.851-1.744-.5-1.513.979-1,.142-.481-1.015-.979-1.353-.783h-.641l-1.015.819-1.121.142-.676-1.015-.623.107-.57-.374-.872-1.121v-.463l1.157-.142,1.015-.587-.2-.445-.979.356.338-.676,2.759-.338.338-.676-.089-.979.979-2.154-.053-.89-.676.142-.16-.445-.267-2.474-.463-1.6v-1.673l.392-1-.2-1.6h0l3.417-2.777.267-1.762,1.086-1.032.552-.036,1.6,3.435.374,1.726,1.015,1.6.374.053.516-.943.125-.926-.534-3.239-1.46-1.9-1.5-5,.249-4.574h.285l.267-1.335,1.139-2.937-.587-2.118-2.421.748-.57-.267-1.264-.872-1.744-3.239,1.958.338-.142-1.032,1.531.783.908.73-.089.73.908.605.356.943,1.264.3,1.21-1.388.694-1.78-.071-2.9-.587-1.086-2.385-2.456-.214-.659.748-.481,1.46.516,1.62.053.125-.463-.516-1.726-1.05-1.264-.053-.409.926-1.442.071-1.157.783-1.21,1.157-.748,1.691-.2.979-.712.249-1.388-.641-2.937.036-.908.338-.623,1.317-1.1h1.335l3.115-1.726.5-.89.071-2.688.409-1.282,1.1-.8,1.068-.018.57.374.142.89-.392,2.029.231.712,2.474,1.655,4.77.872.837-2.082.231-1.37,1.121-1.815,1.246-1.3,1.993-.694,1.459-1.548.89-4.04-.32-2.492.356-1.37,3.755-.57,4.414.552,1.5.605,3.1,1.958Z"
                                      transform="translate(-419.086 -104.138)"/>
                            </g>
                            <g transform="translate(481.402 156.838)" class="click-point" onclick="window.location='region?r=gorontalo'">
                                <path class="id-go"
                                      d="M480.729,109.578l1.05.356,4.289-.089,2.972.32,6.069,1.762.427.623,5.268,3.257,1.976-1.228,1.513-2.171,4.539-.659h0l.374,1.459.961.694,1.531.409,1.246,1.228-.071.837.481,1.513,1.1.961,2.154,1.584,3.613.623.961,1.032.552,1.513-.267,1.922.125,1.8-1.442,2.545-.5,1.744h0l-3.809.053-2.67-.712-2.278-2.1-1.442-2.136-1.833-1.584-.908.676-2.456.249-15-.552h-3.239l-5.446.552-4.218-.089-.908.231-1.068.926-2.9.57-3.115.107-2.634-2.972-5.215-.57-.427.214-.356,1.21-.516.445-4.93.57h0l.5-.89-.3-2.616-1.228-.053-1.9-.605-.89-1.388-1.015-.552-.463-.765.552-.3.107-1.9.605-.605,1.887-.676,1.726.676.926-.178.036-1.709.623-.73,1.584.908,2.367.089.854-.73,2.581-.018,3.684-1.691,1.976-.534,1.406-1.086,1.513-.249.872,1.424.872.926.748.3.534-.481.231-1.157h.659l.926-1.068.463.053Z"
                                      transform="translate(-448.976 -109.578)"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <!--legend total kasus-->
                <div class="row">
                    <div class="mf35-f30 font-weight-bold cl-sul2">Total Kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                </div>
                <!--stripped bar-->
                <div class="d-flex flex-nowrap align-items-center">
                    <span class="f11 font-weight-bold cl-sul1 mr5"><?php echo $mincase ?></span>
                    <span class="sul-totalcasebar"></span>
                    <span class="f11 font-weight-bold cl-sul1 ml5"><?php echo $maxcase ?></span>
                </div>
                <!--Simple Table-->
                <table class="table table-hover text-center cl-sul2 mt20c sul-table rgview-tcustom">
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

                <hr class="sul-hr-helpseparator mt50 d-block d-sm-block d-md-none">

                <!--Call for help for mobile screens-->
                <div class="cl-sul1 mt50 d-block d-sm-block d-md-none">
                    <div style="width:60px; height:60px;" class="d-flex justify-content-center flex-column">
                        <img style="width:60px;" src="img/asset/regview/sul-phone.svg" alt="Bantuan untuk kasus coronavirus di wilayah ini">
                    </div>
                    <div class="mt20">
                        <span class="f32 font-weight-bold">Pusat bantuan</span>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel1'] ?>" class="a-none">
                            <span class="f24 cl-sul1"><?php echo $help['tel1'] ?></span>
                        </a>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel2'] ?>" class="a-none">
                            <span class="f24 cl-sul1"><?php echo $help['tel2'] ?></span>
                        </a>
                    </div>
                    <a href="<?php echo $help['web'] ?>" class="a-none" target="_blank" rel="noreferrer">
                        <div class="f20 cl-sul1 mt15" ><span class="sul-call"><?php echo $help['web'] ?></span></div>
                    </a>
                </div>
            </div>

            <!--statistik angka & grafik-->
            <div class="col-8 col-md-9">
                <div class="row text-center">
                    <div class="col-12 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/sul-virus-lg.svg" alt="Total orang yang terinfeksi oleh virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-sul1 mt10">Total kasus</h2>
                        <div class="f80 font-weight-bold cl-sul3 nmt30"><?php echo $maininfo['t'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-sul1 nmt20"><?php echo $maininfo['t_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2 nmt5">
                            <a href="peringkat?v=persenpertambahankasus" class="a-none">
                                <img src="img/asset/regview/sul-<?php echo $maininfo['t_rank_status'] ?>" alt="<?php echo $maininfo['t_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-sul2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-sul2"><?php echo $maininfo['t_rank'] ?></span>
                                <span class="mf16-f12 cl-sul2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="9"><sup>[9]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2">
                            <a href="peringkat?v=totalkasus" class="a-none">
                                <img src="img/asset/regview/sul-<?php echo $maininfo['t_per_id_status'] ?>" alt="<?php echo $maininfo['t_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-sul2"><?php echo $maininfo['t_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-sul2"><?php echo $maininfo['t_per_id'] ?></span>
                                <span class="mf16-f12 cl-sul2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/sul-recovery-lg.svg" alt="Total orang yang sembuh dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-sul1 mt10">Sembuh</h2>
                        <div class="f80 font-weight-bold cl-sul3 nmt30"><?php echo $maininfo['tr'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-sul1 nmt20"><?php echo $maininfo['tr_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2 nmt5">
                            <a href="peringkat?v=persenpertambahankesembuhan" class="a-none">
                                <img src="img/asset/regview/sul-<?php echo $maininfo['tr_rank_status'] ?>" alt="<?php echo $maininfo['tr_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-sul2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-sul2"><?php echo $maininfo['tr_rank'] ?></span>
                                <span class="mf16-f12 cl-sul2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="13"><sup>[13]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2">
                            <a href="peringkat?v=totalsembuh" class="a-none">
                                <img src="img/asset/regview/sul-<?php echo $maininfo['tr_per_id_status'] ?>" alt="<?php echo $maininfo['tr_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-sul2"><?php echo $maininfo['tr_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-sul2"><?php echo $maininfo['tr_per_id'] ?></span>
                                <span class="mf16-f12 cl-sul2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="5"><sup>[5]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/sul-death-lg.svg" alt="Total orang yang meninggal dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-sul1 mt10">Meninggal</h2>
                        <div class="f80 font-weight-bold cl-sul3 nmt30"><?php echo $maininfo['td'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-sul1 nmt20"><?php echo $maininfo['td_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2 nmt5">
                            <a href="peringkat?v=persenpertambahankematian" class="a-none">
                                <img src="img/asset/regview/sul-<?php echo $maininfo['td_rank_status'] ?>" alt="<?php echo $maininfo['td_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-sul2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-sul2"><?php echo $maininfo['td_rank'] ?></span>
                                <span class="mf16-f12 cl-sul2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="12"><sup>[12]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2">
                            <a href="peringkat?v=totalkematian" class="a-none">
                                <img src="img/asset/regview/sul-<?php echo $maininfo['td_per_id_status'] ?>" alt="<?php echo $maininfo['td_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-sul2"><?php echo $maininfo['td_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-sul2"><?php echo $maininfo['td_per_id'] ?></span>
                                <span class="mf16-f12 cl-sul2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!--Fakta Menarik-->
                <div class="row justify-content-center mt70">
                    <div class="col-md-12 col-lg-10 col-xl-8 justify-content-center">
                        <div class="row justify-content-center text-center">
                            <div class="col justify-content-center">
                                <div class="mf40-f32 font-weight-bold cl-sul2">Fakta <?php echo $namaprov ?></div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-around text-center">

                                <!--Kasus / 1 Juta Penduduk-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/sul-virus-sm.svg" alt="Total kasus per 1 juta penduduk di region ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-sul3"><?php echo $faktamenarik['kasus1jt'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-sul1 mb0 nmt5">Kasus / 1 Juta Penduduk<a class="a-none a-inh-sup click-point" data-id="51"><sup>[51]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2 nmt5">
                                        <a href="peringkat?v=kasusper1jutapenduduk" class="a-none">
                                            <img src="img/asset/regview/sul-<?php echo $faktamenarik['kasus1jt_st'] ?>" alt="<?php echo $faktamenarik['kasus1jt_st_alt'] ?>">
                                            <span class="mf16-f12 cl-sul2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-sul2"><?php echo $faktamenarik['kasus1jt_rank'] ?></span>
                                            <span class="mf16-f12 cl-sul2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="52"><sup>[52]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Kapasitas Rumah Sakit-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/sul-hospitalcapacity-sm.svg" alt="Kapasitas rumah sakit di region ini pada saat ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-sul3"><?php echo $faktamenarik['kapasitasrs'] ?><span class="f20">%</span></div>
                                    <h3 class="f16 font-weight-bold cl-sul1 mb0 nmt5">Kapasitas Rumah Sakit<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2 nmt5">
                                        <a href="peringkat?v=bebanrumahsakit" class="a-none">
                                            <img src="img/asset/regview/sul-<?php echo $faktamenarik['kapasitasrs_st'] ?>" alt="<?php echo $faktamenarik['kapasitasrs_st_alt'] ?>">
                                            <span class="mf16-f12 cl-sul2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-sul2"><?php echo $faktamenarik['kapasitasrs_rank'] ?></span>
                                            <span class="mf16-f12 cl-sul2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="53"><sup>[53]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Rata-rata waktu menuju RS-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/sul-timetohospital-sm.svg" alt="Perkiraan rata-rata waktu yang dibutuhkan untuk menuju rumah sakit di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-sul3"><?php echo $faktamenarik['wakturs'] ?><span class="f20">mnt</span></div>
                                    <h3 class="f16 font-weight-bold cl-sul1 mb0 nmt5">Rata-Rata Waktu Menuju RS<a class="a-none a-inh-sup click-point" data-id="39"><sup>[39]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2 nmt5">
                                        <a href="peringkat?v=waktumenujurs" class="a-none">
                                            <span class="mf16-f12 cl-sul2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-sul2"><?php echo $faktamenarik['wakturs_rank'] ?></span>
                                            <span class="mf16-f12 cl-sul2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="54"><sup>[54]</sup></a></span>
                                        </a>
                                    </div>
                                </div>

                                <!--Jarak 1 Pasien dari Lokasi Anda-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/sul-keepdistance-sm.svg" alt="Rata-rata jarak orang sehat dengan 1 orang terinfeksi corona di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-sul3"><?php echo $faktamenarik['jarak1pasien'] ?><span class="f20">km</span></div>
                                    <h3 class="f16 font-weight-bold cl-sul1 mb0 nmt5">Jarak 1 Pasien dari Lokasi Anda<a class="a-none a-inh-sup click-point" data-id="37"><sup>[37]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2 nmt5">
                                        <a href="peringkat?v=jarak1pasienpositifcorona" class="a-none">
                                            <img src="img/asset/regview/sul-<?php echo $faktamenarik['jarak1pasien_st'] ?>" alt="<?php echo $faktamenarik['jarak1pasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-sul2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-sul2"><?php echo $faktamenarik['jarak1pasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-sul2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="55"><sup>[55]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Dokter per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/sul-doctor-sm.svg" alt="Setiap 1 pasien corona rata-rata ditangani oleh sejumlah dokter di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-sul3"><?php echo $faktamenarik['dokterpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-sul1 mb0 nmt5">Dokter Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="40"><sup>[40]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2 nmt5">
                                        <a href="peringkat?v=dokterper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/sul-<?php echo $faktamenarik['dokterpasien_st'] ?>" alt="<?php echo $faktamenarik['dokterpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-sul2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-sul2"><?php echo $faktamenarik['dokterpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-sul2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="56"><sup>[56]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Perawat per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/sul-nurse-sm.svg" alt="Setiap 1 pasien corona rata-rata dirawat oleh sejumlah perawat di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-sul3"><?php echo $faktamenarik['perawatpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-sul1 mb0 nmt5">Perawat Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="41"><sup>[41]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-sul2 nmt5">
                                        <a href="peringkat?v=perawatper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/sul-<?php echo $faktamenarik['perawatpasien_st'] ?>" alt="<?php echo $faktamenarik['perawatpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-sul2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-sul2"><?php echo $faktamenarik['perawatpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-sul2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="57"><sup>[57]</sup></a></span>
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
                                    <h5 class="f24 font-weight-bold cl-sul2">Pertambahan & Kasus Aktif</h5>
                                </div>
                            </div>

                            <!--Legend-->
                            <div class="row justify-content-center mb10">
                                <div class="col-12 justify-content-center sm-mw1">
                                    <div class="d-flex flex-nowrap justify-content-center f12">
                                        <div>
                                            <span class="sul-c0-legend1 align-self-center"></span>
                                            <span class="cl-sul1">Pertambahan kasus per hari<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                        </div>
                                        <div class="ml30">
                                            <span class="sul-c0-legend2 align-self-center"></span>
                                            <span class="cl-sul1">Persen kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></span>
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
    <nav class="sul-addbg mt20" style="position:sticky; top:3px; z-index:997">
        <div class="container">

            <div class="d-flex flex-wrap justify-content-center">
                <div class="d-flex flex-wrap pt10 pb10 pr10">
                    <div class="text-center justify-content-center d-flex flex-column">
                        <div class="f16 cl-sul6 font-weight-bold mr10">Region<a class="a-none a-inh-sup click-point" data-id="59"><sup>[59]</sup></a> lainnya</div>
                    </div>
                    <div class="row text-center justify-content-center f16">
                        <a href="region#sumatera" class="a-none"><span class="sul-region-block cl-white">Sumatera</span></a>
                        <a href="region#jawa " class="a-none"><span class="sul-region-block cl-white">Jawa</span></a>
                        <a href="region#kalimantan" class="a-none"><span class="sul-region-block cl-white">Kalimantan</span></a>
                        <a href="region#sulawesi" class="a-none"><span class="sul-region-block cl-white">Sulawesi</span></a>
                        <a href="region#balinusatenggara" class="a-none"><span class="sul-region-block cl-white">Bali & Nusa Tenggara</span></a>
                        <a href="region#malukupapua" class="a-none"><span class="sul-region-block cl-white">Maluku & Papua</span></a>
                    </div>
                </div>

                <div class="d-none flex-wrap pt10 pb10 pl10">
                    <div class="text-center justify-content-center d-flex flex-column mr10">
                        <span class="sul-survey-tag-block cl-sul2">SURVEI</span>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div>
                            <span class="cl-sul6 font-weight-bold">Saya </span>
                            <span class="cl-sul6">berasal </span>
                            <span class="cl-sul6 font-weight-bold">dari Aceh</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn sul-btn-send">
                                    <span class="sul-survey-selection cl-sul6">
                                        Ya
                                        <img src="img/asset/regview/sul-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn sul-btn-send">
                                    <span class="sul-survey-selection cl-sul6">
                                        Tidak
                                        <img src="img/asset/regview/sul-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>

                        </div>
                        <div class="ml10">
                            <span class="cl-sul6 font-weight-bold">Informasi </span>
                            <span class="cl-sul6">yang disajikan </span>
                            <span class="cl-sul6 font-weight-bold">membantu</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn sul-btn-send">
                                    <span class="sul-survey-selection cl-sul6">
                                        Ya
                                        <img src="img/asset/regview/sul-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn sul-btn-send">
                                    <span class="sul-survey-selection cl-sul6">
                                        Tidak
                                        <img src="img/asset/regview/sul-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!--Total Kasus-->
    <div class="container sul-container-case rgview-details-spacing">
        <div class="row mt50">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-sul1 rgview-breakword">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a> </span>
                    <span class="mf36-f24 cl-sul1">(Kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-sul3"><?php echo $activecase ?></span>
                    <span class="mf36-f24 font-weight-bold cl-sul1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-sul3"><?php echo $activecase_id ?>%</span>
                    <span class="mf36-f24 cl-sul1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-sul1">Pertambahan dan total kasus</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="sul-c1-legend1 align-self-center"></span>
                                    <span class="cl-sul1 mf24-f16">Pertambahan kasus<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="sul-c1-legend2 align-self-center"></span>
                                    <span class="cl-sul1 mf24-f16">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Data visualization-->
                    <div class="row justify-content-center">
                        <div class="col-12 lg-secdata">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="lg-linechart">
                                <g id="Line_chart" data-name="Line chart" transform="translate(-253.026 0)">
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
                <h4 class="mf36-f24 font-weight-bold cl-sul1">Kecepatan pertumbuhan kasus per hari<a class="a-none a-inh-sup click-point" data-id="42"><sup>[42]</sup></a></h4>
                <div class="mf24-f16 cl-sul1">Mengukur seberapa besar pertambahan kasus setiap harinya terhadap jumlah kasus di hari
                    sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap1 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-sul1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="43"><sup>[43]</sup></a></span>
                            <span class="sul-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-sul1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="44"><sup>[44]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-sul1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/sul-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-sul1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kesembuhan-->
    <div class="container sul-container-recover rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-sul1 rgview-breakword">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a> </span>
                    <span class="mf36-f24 cl-sul1">(Tingkat kesembuhan<a class="a-none a-inh-sup click-point" data-id="58"><sup>[58]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-sul3"><?php echo $recoveryrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-sul1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-sul3"><?php echo $recoveryrate_id ?>%</span>
                    <span class="mf36-f24 cl-sul1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-sul1">Pertambahan dan total kesembuhan</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="sul-c2-legend1 align-self-center"></span>
                                    <span class="cl-sul1 mf24-f16">Pertambahan kesembuhan<a class="a-none a-inh-sup click-point" data-id="12"><sup>[12]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="sul-c2-legend2 align-self-center"></span>
                                    <span class="cl-sul1 mf24-f16">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></span>
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
                <h4 class="mf36-f24 font-weight-bold cl-sul1">Kecepatan pertumbuhan kesembuhan per hari<a class="a-none a-inh-sup click-point" data-id="45"><sup>[45]</sup></a></h4>
                <div class="mf24-f16 cl-sul1">Mengukur seberapa besar pertambahan kesembuhan setiap harinya terhadap jumlah kesembuhan di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap2 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-sul1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="46"><sup>[46]</sup></a></span>
                            <span class="sul-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-sul1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="47"><sup>[47]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-sul1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/sul-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-sul1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kematian-->
    <div class="container sul-container-death rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-sul1 rgview-breakword">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a> </span>
                    <span class="mf36-f24 cl-sul1">(Tingkat kematian<a class="a-none a-inh-sup click-point" data-id="15"><sup>[15]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-sul3"><?php echo $deathrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-sul1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-sul3"><?php echo $deathrate_id ?>%</span>
                    <span class="mf36-f24 cl-sul1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-sul1">Pertambahan dan total kematian</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="sul-c3-legend1 align-self-center"></span>
                                    <span class="cl-sul1 mf24-f16">Pertambahan kematian<a class="a-none a-inh-sup click-point" data-id="10"><sup>[10]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="sul-c3-legend2 align-self-center"></span>
                                    <span class="cl-sul1 mf24-f16">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></span>
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
                <h4 class="mf36-f24 font-weight-bold cl-sul1">Kecepatan pertumbuhan kematian per hari<a class="a-none a-inh-sup click-point" data-id="48"><sup>[48]</sup></a></h4>
                <div class="mf24-f16 cl-sul1">Mengukur seberapa besar pertambahan kematian setiap harinya terhadap jumlah kematian di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap3 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-sul1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="49"><sup>[49]</sup></a></span>
                            <span class="sul-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-sul1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="50"><sup>[50]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-sul1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/sul-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-sul1">Mulai dari kiri atas lalu ke kanan</div>
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
                <h4 class="f24 font-weight-bold cl-sul1">Komentar</h4>
                <div class="f16 cl-sul1">Bagikan informasi, keresahan, dan semangat kepada Indonesia karena #SendiriKitaBisa #BersamaKitaKuat</div>

                <!--input-->
                <form class="mt30">
                    <div class="mr40">
                        <div class="form-group marginb1">
                            <input type="text" class="form-control font-weight-bold f12 cl-sul1 sul-c-f-input" value="Tanpa_nama0028">
                        </div>
                        <div class="form-group marginb3">
                            <input type="text" class="form-control f14 cl-sul1 sul-c-f-input" placeholder="katakan sesuatu...">
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="cl-sul1">0/120</span>
                        <button type="submit" class="btn btn-send">
                            <img src="img/asset/regview/sul-send.svg" alt="send button">
                        </button>
                    </div>
                </form>
                <hr class="sul-hr-comment">
                <!--Chat Content-->
                <div class="mt25">
                    <div class="f14 cl-sul1">13:10 2 April 2020</div>
                    <div class="mt5">
                        <span class="cl-sul2 font-weight-bold f16">Jonathan Raditya</span><br>
                        <span class="cl-sul1 f16">Semoga kita semua dalam keadaan sehat ya, jangan lupa #JagaKebersihan dan #diRumahAja !</span>
                    </div>
                    <div class="">
                        <img src="img/asset/regview/sul-likes.svg" alt="likes button">
                        <span class="f15 font-weight-bold cl-sul2">128</span>
                    </div>
                </div>


            </div>

            <!--Catatan Kaki-->
            <div class="col-xl-5 col-lg-5 col-md-8 col-11 mt100 d-none">
                <a href="bantuan?h=catatankaki" class="a-none"><h4 class="font-weight-bold f24 cl-sul1">Catatan kaki</h4></a>

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