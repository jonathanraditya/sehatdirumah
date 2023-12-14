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
                background-color:#4231C5;
                padding:0;
                color:#F3F2FF;
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
                    <div class="d-flex map-provlogo-bg">
                        <!--left stripped-->
                        <div class="map-provlogo-strip"></div>
                        <!--Logo provinsi-->
                        <div style="height:55px; width:55px;" class="align-self-center d-flex flex-column justify-content-center pt12 pb12 pl5 pr10">
                            <img class="img-fluid" src="img/asset/regview/logo/<?php echo $logo ?>" alt="<?php echo $logoalt ?> - Indonesia">
                        </div>
                        <!--Tulisan Provinsi + nama provinsinya-->
                        <div class="d-flex flex-column flex-nowrap pt12 pb12 pl7 pr15">
                            <h1 class="f24c font-weight-bold cl-map1 mb0">Provinsi<br><?php echo $namaprov ?></h1>
                        </div>
                    </div>
                </div>
                <!--Peta-->
                <div  class="align-self-center d-flex flex-column justify-content-center"  style="height:375px;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 387.766 272.44">
                        <defs>
                            <style><?php echo $maphsl ?></style>
                        </defs>
                        <g transform="translate(-503.706 -81.828)">
                            <g transform="translate(619.072 141.58)" class="click-point" onclick="window.location='region?r=papuabarat'">
                                <path class="id-pb"
                                      d="M689.091,225.527l1.021,1.209-6.718-3.01-.215-1.545.685.255,1.666,1.276,3.561,1.814Zm-78.564-50.521-1.653.054-4.851-1.438-4.071-2.11-.443-.564.779-.726,4.743-1.693,1.908-.967,7.269-1.411.107.7L616.1,169.5l.081,3.453-1.263.833Zm-6.06-19.711-2.3.739-2.123-.726.081-.443.5-.457,2.419-.672,2.083.7-.658.86Zm22.506-7.363.793,1.035,1.465-.2.887-.349.927,1.4-.067,2.566-.779,3.588-.967,2.2-.282.349-.537.161L626.4,158.3l-2.741-2.271-.47-1.344-1.008-1.424.47-.726-.363-.981-.511-.86-.752-.282-.094-.3.094-.336.484-.269,4.555-1.491Zm.417-2.325-.6,1.035-2.2.941-2.983.632-1.962.2-2.472-.134-.793.134-.739.376-.323-.107,1.182-1.357.887-.7,5.6-.161,1.787-.4.846-.941h1.061l.712.484Zm-7.229-5.764-3.279-.363-.215-1.3.564-.417,3.117-.927,1.075.376.766.6.027.349-.6,1.008-1.451.672Zm69,4.9,4.085.067.107-.752,5.254.134,3.01,2.432-1.894,3.037,2.271,4.286,1.814,1.6,1.76,3.211L704.5,159.93l-.322,3.373-3.09,2.781.793,4.757.524,1.156-.282,2.714.618,6.181,1.465,2.513.712.242,1.545,1.532,3.319,8.237.739.027.726-.618-1.209-4.8-.067-1.586.336-.779,1.263-1.29.712.148,1.653,1.048.349,1.223.134,5.8h0l-3.332,3.05L709,196.732v1.532l-.323,1.088-2.19,1.3-1.317,1.639-1.532,3.386,1.868.551,2.634,1.3,8.667,2.513,4.058,1.639,3.843,1.2,1.639.766h.658l1.209.551-3.077,3.816-1.424,2.19-.873,1.854-1.424,1.088-2.2,3.184h0l-1.559-.658-3.6-3.023-.108-.3.981-3.789.578-.3,3.359.417,1.4.6.43-.04.873-.645-.04-.228-1.559-.269-5.294-.336-1.29.994-.457,1.209-1.76.376L709.9,218.54l-.806-.793-1.559-.376-.6,2.19-.86.443-2.11-1.182-.685-.591-.47-.967.081-.712.551-.4.067-.376-.39-.833-.793-.793L701.99,214l-2.338,1.223-2.351-1.263-2.15-3.735-.752.376-.094.215.188,1.317-.591.134-1.653-1.048L690.77,208.3l-.188-.752.108-.3,1.223-.779.148-.322.067-1.424-.336-1.72.591-1.948,1.626-1.384,1.8-1.156.04-1.733-.779-1.061-2.271,2.056-1.68,1.989-.43,3.547.054,2.795-.873.175-1.424.967.524.5.551,1.223-.094.779-2.257,1.747-2.069,2.056-.094.4.269,1.209.806.7.228.86L683.1,220.1l-1.747,1.424-.873.081-3.52-.4-.457.255-.873,1.021-1.827-.457-1.5-2.029-.739-1.706.269-.215-.215-.82-1.559-4.018.752-1.975,2.459-.887.712-.551.161-.363-1.035-1.935-.363-.107-.39.2-.631-.511-.5-1.881.47-1.142-.067-.39-.524-.672-.7-.175-.806.322-.027,1.209-.2.2-.309.081-1.061-.5-1.559-2.1-.107-1.142-.833-1.585-2.123-1.666-3.48-2.163-.994-.282h-1.935l-2.553.658-2.875-4.165.242-.282,3.977-1.881,1.612-.336,2.566.081,4.488.417,1.424.39,1.612,1.008.551.712,1.317.6,2.781-2,4.1-5.4,2.029-1.169,1.209-.376,2.042-.282,1.478.712,1.774,1.706,2.795,1.021.954-.054,1.33-.578,1.021.121.685.981-.134,1.223.148,1.827.336-.457.43-3.386-.134-.82.322-.067.484.228,1.451,2.97.3.175.094-2.714-.39-1.075-.524-.322,1.371-1.3,1.72-.82.954-1.4.067-2.177-.269-.564-.537,1.411-1.975.658-.417-.04-.752-.967.161-.282,2.728-1.061.779-.645-.269-1.545-1.357.228-5.348,2.849-2.392.2-2.432-.161-.887-.47-2.392-.417-2.244.3-5.522,1.72-1.465-.094-1.935-.833-.806.228-2.163,1.169-1.182-.578-.255-.3-.282-1.061-.551-.712-.4-.094-2.754.7-1.465.914-1.29.3-.9-.108-3.319-2.7-1.129-.43-1.532-1.1-1.612-2.728-.941-2.123-.094-1.5,1.021-1.115-.336-1.25-1.72-1.518-3.708-1.4-.443-.511.027-.363-2.66-1.236-7.363-2.459.228.537,1.1.726.054.511-1.048.873-1.854.672-.7-1.142-1.545-.6-1.438.081-1.989-1.209,1.115-1.572.551-1.384.564-.726,2.768-.564,1.626-2.822.86-4.125-.712-2.2L641.2,144.3l.5.067.081.282.914.3,4.582-.846,2.284-.739,1.048-1.639,4.367-3.614,1.653-1.035,2.15-.873,3.816-.914,6.49.524,2.472,1.263,6.866,2.66,1.357.121,4.676,4.085,1.29.39,3.413.417Zm-62.695-16.957,3.829,1.088,2.257.215,3.722,2.123.309.806.2,1.639-.591,1.276-.954,1.357-2-1.115-1.478-.134-1.653.632-1.33.067-.712-.43-1.666-2.163-1.962-.779-1.881-2.781-.5-.39-1.733.2.3,1.115L622.969,133l2.271,1.048,1.357.215.793.484.591.994-.631,1.021-1.572.739-2.069.282-.766-.269-.4-.537-.672-2.634-2.123.47-1.075.981-.712-2.58-1.948.484-1.6-.188-2.7-.914-.564-.376.47-.3.564.282,2.835.242,1.008-.551-.645-1.1-1.438.04.148.833-1.142-.255-.47-.86.175-.752,1.774-.43h1.962l4.9-.793,1.008-.39.484.349,1.129-.094-.39-.363.752-.457.954-.094,1.236.255Zm-30.743,4.488-.43.2-1.156-1.4-4.528-4.474-.04-.269.336-.04.779.511,4.757,3.829.524.914.054.417-.3.309Z"
                                      transform="translate(-589.566 -126.298)"/>
                            </g>
                            <g transform="translate(537.338 206.895)" class="click-point" onclick="window.location='region?r=maluku'">
                                <path class="id-ma"
                                      d="M604.088,302.179l-2.1-.094-1.975-.967-.215-.443,1.411-.511,1.827.094,1.384.685.081.7-.417.537Zm-27.236-3.87,2.472.873,2.338.2,1.169-.2.591.363.04.336-2.123,2.244-.255.067-4.542-1.5-.645-.4-.914-1.76,1.868-.215Zm68.809,5.858-.9.067-.013-.309,2.136-2.311,1.653-.9.793-1.33,1.209-1.33.443-.121,3.386,1.088-.847.833-4.246,1.639-1.451,1.035-.2.591-1.545.994-.417.054Zm-24.105-6.8-1.693-.4-2.566-3.144-.188-.524.2-.981.134-.511.376-.417,2.19-.3,2.755.739.524.43.457,1.935-2.19,3.171Zm-70.838-9.07,1.088.013.578,1.8-1.895.081-2.257.685-1.209.86-1.3,1.6-1.975,1.048-3.265-.376-3.668-.726-1.344.027-3.09.645-3,2.405-.4.081-.242-.336.941-3.588L533.385,288l4.958,1.465,3.561-.618,1.666-1.438,1.733-.806,3.09-.779.282.2.107.9,1.935,1.371Zm15.68-.47-.349.175-.457-.094-.322-.551.5-2.687.484-.309,2.271.739.081.349-.175.941-2.029,1.438Zm85.51-3.265-1.8-.564-.309-.712.417-.645.7-.255,3.131-.323.282.188-.994,1.209-1.424,1.1Zm15.506-7.041-.981.417-.511-.094-.82.672.9,4.394v.954l-1.142,3.44-1.344,1.747-3.977,2.929-1.33,2.15-.081,1.693-.269.457-.618.322-3.87-.376-.645-.322-.564-3.09,2.445-4.219-.309-.685,1.411-3.829,1.612-1.344.631-.242,1.223-1.156,1.653-2,1.827-3.225,1.021-.551,1.747-.188,1.317.658.672,1.491Zm4.353-2.365,1.209,1.8.2.86-.363.7-.242.067-1.129-.779-.551-1.2-1.33-.242-1.572.349-.685-.134-.188-.3.134-.645.39-.269ZM595.7,277.51l-.658.228-2.029-1.263-.309-.551.081-.282.43-.484,1.639-.994,1.868,1.021.108.269-.538,1.33-.591.726Zm145.2-19.926-.4.443-.846,1.948-.134.887-.846,1.639-.349-.309-.618.094-.094.537.228.618.4.228v.537H737.8l-.443.269-.175.927-.887,1.371-.712.672h-.4l-.752-.578.094-.618.672-.618.443-1.061.094-1.115.537-.793-.4.04-.309-.4-.443-1.2.134-.672.887-.618.981-.349-.04-.981.228-.309.927-.443.4-.712,1.33-1.062.712.04.4.4-.175,1.182Zm-49.433-9.647-.82.336-1.1-.349-.591-.591.067-1.666-.309-2.889-.645-1.841.148-.43,1.5-.43,2.432,4.636v1.518Zm45.483-5.9.134,1.371.538,1.465-.846.175v.4l1.774.887-.04.443-.228.349-.538.134-1.021-.443-.04.672.537.349.094.309-.094.578-.349.175-.484-.094-.846-.672-.228.175v.4l1.25.887.269.484.752.443.484.793-.484,3.1-.4,1.236-.887,1.5-1.693.887-.672-.134-.309.269.484,1.33.712.443-.094.672-1.465,1.33-1.2-.349-.443.228-.309.752.134.443.672-.228-.04.672-.847,1.371-.927.618-1.774,2.042-.04.887-.672.847-2.755,1.2-.4.443-.618-.067-.484-1.2-.443-.4h-.927l-1.021-1.774v-.484l.309-.269.484-2.042.309-4.179.4-1.021-.04-.578.4-1.33-.175-2.351-.578-2.042.887-.094-.578-1.6.309-.752v-.672l.578-.484.228.228v.443l.349.04.672-.4h.672l.134.887.269.228.443-.134.618-.618.712-1.774v-.269l-.672-.4.04-.4.228-.4.712-.537.094-.443.537-.443.349-.847-.094-.309-.4-.175-.672.4-.981-.793-1.115-.134-.672-.712.094-.443.847-.927,1.33.846.484.04,1.733-1.33.846-2.217,1.021-.672.094-.846-.269-1.156.228-.618,1.2-1.639.847-.228.484.269,1.29,2.217.672.578.04.443.578.887.04,1.5,1.115,1.424-.094.672-.551.255Zm-41.291,4.273-2.459,3.2-.228-.067-.013-.417,2.163-6.718.457-.806.793-.752,2.983-7.5.551-.228.766.107.443.941-1.814,5.9-.712.873-1.142.672-1.572,2.15-.376,1.357ZM592.64,194.2l-2.795.551-.175-.175.349-.779-.013-1.317.712-.524,1.626.161,1.236,1.223-.027.269Zm2.338-2.217,1.1.39.484-.873.349.04.39,1.048v1.6l-1.935.3-.3-.121-1.612-2.257-.04-.417.3-.282.349-.027.914.6Zm-6.7,2.419-.86,1.559-1.344,1.129-2.835.82-.511-.054,2.432-2.3.3-.6-.376-.161-4.918,3.064-1.008-.067-.564-.712-.04-1.129,1.209-1.33,1.451-.927,3.641-.7,1.035-1.276.954-.39.739.175.766.443.2.322-.269,2.136Zm-16.326-6.02-2.607-.752-.927-.914,1.008-.806,1.048.134,1.263,1.182.618.887-.4.269Zm3.265-2.566-2.338-.013-.806-.672,1.626-1.478,1.115-.175.779.618-.054,1.518-.322.2ZM557.1,183.292l2.513,1.585.282,1.3-1.384-.067-.3.484.269.994,1.008.914.712-.269.417-.443,2.687.887-.551,5.549-.457.847-.726.215-.887-.242-.967.242-2.083.86-3.467,1.854-4.031,1.25-4.3-1.532-2.929-1.357-3.252-2.19-4.609-4.367-.631-1.747-.188-3.856.363-.752,1.653-1.129.551.121.578.806.766.632.82.04.739-1.008.914-.511,3.077-.806,7.457-.3,2.083.349,3.87,1.639Zm65.127-5.482,5.2,2.069,1.639.081,5.751-.511.887.228,4.945,3.507.954,2.432v1.841l.363,1.223.6.7,1.626-.054,1.115.269.86.86,1.1,3.211-.094.833-.806,1.142-.336,3.413.2,1.088-4.972-1.948-1.357-1.424-3.708-2.163-6.141-2.069-3.319-1.693-.752-.994-.04-1.142-1.061-.847-.537-.175-5.5-.417-3.158-.443-.39.43.161.726.981,1.156.255.752-.336.766-.631.161-4.918-1.223-1.411-.107-2.19-.833-1.008-.618-3.87.161-.43-.349.215-.524.927-.833.054-.9-.927-.658L601,184.757l-2.58,1.626-1.975,1.841-.336.632-1.371,1.156-2.687.591-.632-.027-.873-.363-.658-.564-2.365-3.507-1.975-1.33-.833-3.171-.927.027-1.048,1.061-.833,2.029-.443,3-.618.86-.578.148L579.016,191l-.443,1.868-.215-.336-.336-1.4.7-1.545.161-1.68-1.169-1.814-.6-1.841,2.969-2.311,4.38-5.321,5.334.134,3.8-.175,6.651.242,2.862-.645,1.182-.954.484.04.43.255.175.47-.04,1.814.712.82.739.43,1.854-.39,3.1-1.975.443-.363.242-.941.645-.282,2.862-.2,2.392.726L621.623,177l.6.806Z"
                                      transform="translate(-528.736 -174.908)"/>
                            </g>
                            <g transform="translate(503.706 81.828)" class="click-point" onclick="window.location='region?r=malukuutara'">
                                <path class="id-mu"
                                      d="M544.217,199.788l-.685.107-.712-.4-.631-.793-.47-.967-.336-2.217-1.2-1.733-.833-3.332.591-1.465.336-.537.484-.309.793.107,1.061.927.027.578-.712,1.975-.04.82,2.741,6.006-.417,1.236Zm-14.74-15.452,5.066.43,1.76-.228.726-.43,5.294-.161,8.371.712-.336.511-1.895.806-6.315.712-11.945.739-2.768-1.3-.175-.3-.013-1.115.846-.981.793-.121.242.511.349.215ZM518.312,181.9l1.3.457,2.486-.672,4,.954.645,1.317.04,2.244-.511-.175-3.211-.107-2.419.363-.6.309-.188.779-.511.161-3.373-1.1-1.586.363-2.2,1.3-2.741.766-1.169.242-2.755.081-1.787-3.09-.027-1.438.941-2.889.645-.739,3.144-.618,2.432-.013,7.444,1.5Zm67.976-6.329,5.361,3.117.712.6.39.685.04.578-.484,1.021-1.129.618-.712.081-8.2-.645-1.532.887-2.23.336-2.607-1.2-.873-.712-.363-.591.376-1.4-.094-.672.3-1.411.5-.981.4-.457.43.336,3.91-2.419,2.163.417,3.641,1.8Zm-6.154-3.91-2.768.255-.9-.6v-.242l1.156-1.061.941-.322,2.419.967-.846,1.008Zm-6.893-10.7-.941.322-2.714-.618-.175-.255.027-.658.779-2.472.322-.322.564-.134.6.134.873,1.639.658,2.365Zm5.885-10.924,2.607,3.373-.417,1.276-.941.9-.511,1.088.081.645.981,1.532.726.417.846-.511,1.653-.242,1.478.658,1.035,1.371-.081.685-1.8,1.478-1.424.39-1.827-.779-1.626-1.975-2.849,1.209-.591-.2-.457-.806-.82-3.588-2.311-2.445-.309-1.357.712-2.647,1.169-.3.967.86,1.6-.349,1.182-.954.927.269Zm-9.029,4.8-1.545-.094-.215-.591-.027-4.73.873-.632,2.15-.228.538.618.511,2.244-.618,2.687-1.666.726Zm15.99-53.934.631.228.443-.121.564.161,1.29,1.169.363.672.578,4.488-1.1,4-1.895,3.319-1.706,1.411-4.246,2.9-.524.793.067,1.371.564.954,2.257,1.6.927.39,1.156-.175,1.693-1.276.269-3.05,1.061-1.787,1.491-1.142,1.182-.148,1.048.188.766-.39.658-1.384-.2-.632-.443-.363-.578-.067-.282-1.1,1.344-2.136,4.327-3,1.572-.658,2.472-.685,1.827-.269,1.371.04.524.107.349.322-.631,10.507-.779.9-5.079,2.969-3.413.994-2,1.989-.013.591.564,1.142,1.451,1.25,1.169.672,5.549,2,1.008-.04,1.008.215.43,3.332-.228,1.182.887.645,2.513.672,1.048.86.712,1.371-1.2-.887-.9-.336-6.3-1.478-2.11-1.774-2.163-.013-1.854.269-1.532-.4-.793-.457-.457-.658-2.016-.349-2.7-.242-.847.511-.349.443-.631,3.131.645.511.4,3.184-.927,1.518.054,1.814,3.507,9.191,1.33,2.486,1.021,1.357,1.76,3,4.38,4.353-2.781-.148-.685-.228-.511-.484.175-.47-2.325-1.774-2-.82-.726-.591-1.827-4.031-1.935-3.225-3.252-1.827-1.276-1.962.86-6.49-.3-3.01L581.1,134.7l-.873-.484-1.115-1.182-1.021-3.117L578,128.641l.524-2.634.981-1.021.726-1.451-.108-.7-2.486-.739-.269-.4.349-1.317-.632-2.2-1.881.349-.175-.524.148-3.48,2.9-5.254.175-1.344-.2-.511,1.008-5.052,2.875-4.286,5.066-5.4.887-.752,2.486-.013-.322,1.5-2.163,3.279-.564.672-.631.2-.927.739-.121,2.1.443.511Zm14.579-5.616-2.58.121-2.566.632-.726-1.908-.43-3.373.134-1.4,1.384-2.58,1.276-1.586,2.016-1.962,2.983-1.411.336.067,2.526,3.453.2,1.061-1.72,5.039-1.2,2.15-1.317,1.5-.322.188Z"
                                      transform="translate(-503.706 -81.828)"/>
                            </g>
                            <g transform="translate(733.121 157.328)" class="click-point" onclick="window.location='region?r=papua'">
                                <path class="id-pa"
                                      d="M783.43,318.256l-3.373-.188-3.776-.658-.484-.242-.282-.766.108-.282,3.668-3.211,2.3-.645.309.067.363,1.182,1.72,3.641.027.457-.578.645Zm-6.57-3.668-3.493,2.862-1.706.766-1.854.376-.631-.067-.524-.43-.873-.242-8.008-.537-3.829.927-.685.47-.672.081-.323-.564.081-.7,2.177-5.684,4.125-7.968,2.634-3.977.712-.766,4-2.822,3.279-1.29,6.423-1.2,2.849.148,1.061.3.5.443,1.451,2.432.793.833,1.774.336.833,1.317-1.29,3.628-1.586,2.54-.726,3.668-.766.981-1.545,1.424-2.674.591-1.5,2.123Zm.591-35.62.82.672,1.747.323,1.1,1.626-1.33.833-1.008-.376-1.559-2.056-.175-.685.4-.336ZM723.18,162.311l3.843.766,8.008.591,2.136.9.121.215-.578.618-4.327.739-3.413,1.115-7.538-.672-5.4-1.29-1.2-.873-1.384-.6-3.426-1.035-1.371-.269-1.518.107-2.808-.457-1.451-1.72,1.25-.376,1.572.511,14.888,1.061,2.593.672Zm59.752,6.275,1.612.013,2.634.887,8.4,3.843,8.68,4.515,2.405.349,3.426-.417,1.72-.82,1.33.081.228.726.927,1.142,2.566,1.182,1.236-.228.134-.363,2.23.04,3.588.524,2.109.752.457.349.161.551-.336.847-.631.658-.148.47.618.511,2.244-.632,3.332-.134.82.067.081.161V269.8l-.914.094-.9,2.647.537.685-.094.457-1.236,2.351-.712.712-.094,1.088.282,2.513.739,1.612,1.088,1.115.739.067.578-.309.027,52.12-1.465-.914-1.572-.43-.806-.564-1.962-2.486-3.453-3.211-2.445-3.991-6.382-5.455-4.125-3.023-1.545-1.76-.242-.39.161-.914,1.854-1.545,1.68-3.077.322-1.25-2.19.954-.376,1.572.067,1.411-1.733.994-1.156.417-4.73-.013-2.136.255-2.123,1.223-2.58.618-1.209.067-.941-.107-1.169-.739-1.344-1.881-3.117,1.182-2.566,1.881-.806,1.733-.672.081-1.438-2.754-.269-1.169,1.572-2.163.161-2.9.269-.3,1.612-.766.322-1.1-.054-1.4,1.2-3,.887-.941.027-.685-.591-.591-1.451-.537-1.68-1.169-.847-1.948-.82-1.008-2.3-1.518-2.163-1.1-.2-.537.282-.188,6.047.228,1.4.846,1.29.3,2.916-.3,1.088-1.774-1.088.484-.336.457-2.768.255-4.528-1.384-2.3-1.048-3.883-3.426-.417-.537-.027-.739.82-.658,1.075-.027,1.276.443.981.027,1.478-.954,2.419-.3,1.72.591,1.5,1.5,1.371.86.685.188,1.156-.255-1.344-.309-.941-.5-1.666-1.5-.712-.4-1.142-.443-1.276-.161-4.662-2.445-.349-1.465.887-.255-.658-.887-4.542-4.353L773,270.529,772.318,269l-.43-1.478.067-1.142-.645-1.935L769.7,261.46l.027-2.714-1.989-.551-1.021-.887.551-.806,3.722-1.814-.242-.2-.631-.013-2.163.336-1.33.766-1.814.511-.336-.2-.43-2.419.484-4.38-.188-.672-.672,1.182-2.042-.766-3.964-2.607L757,245.43l-2.029-1.317-1.263-.336-.779-.484-.108-.269.538-.484-1.747-.013-2.539-1.142-2.432-1.76-.833-.994-1.344.591-4.81-1.357-4.206-.551-.551-.564-3.9-1.8-6.315-3.359-2.365.027-5.187-2.1-.631-.564-.833-1.236-1.021-.417-2.956-.148-1.787.215-6.947-1.5-2.23.188-2.257.511-1.29-.457-4.971-2.835-2.19-.927h0l2.2-3.184,1.424-1.088.873-1.854,1.424-2.19,3.077-3.816-1.209-.551h-.658l-1.639-.766-3.843-1.2-4.058-1.639-8.667-2.513-2.634-1.3-1.868-.551,1.532-3.386,1.317-1.639,2.19-1.3.322-1.088v-1.532l2.083-1.088,3.332-3.05h0l.82,3.346.631.484.954-.2.9-.645.121-.672.417-.5.6.054.161.873-.242,1.626-.658.6L688.7,195.5l1.491,2.889,2.754,2.029,2.862.739,5.012.578,2.983-.564,1.276-.632.9-.86.349-.806-.04-.537.86-1.048.658-.457,1.841-.537,1.236-.981-.04-.349-.564-.43.538-.685,3.332-1.438.685-1.061.43-3.668,1.653-1.962.537-.067,3.1-1.451,1.68-1.357.578-1.008,1.465-3.829.067-.887-.255-1.061.524-.658,1.223-.847,1.706-.134,1.169.067.081.39.242.161,1.29.322,1.532.134,2-.175,1.962-1.115,3.561-1.572,1.76-.551,1.075.148,1.747-.3,1.048-.7.054-.39-.86-2.419-.847-.39-1.223-1.4.255-1.653,1.639-.86,1.68-.417,1.881-.82,3.359-1.774.591-.712,2.083-1.008,5.6-1.975.7-.027,1.29.376,1.088,1.236,1.921,1.478,8.2,2.9,5.63,1.344,2.056,1.29,1.021,1.371,1.29,1.1.511.094ZM691.309,149.6l-1.3-.013-1.518-2.23.255-1.344.672-.9,1.088-.067.981.47,1.451,1.491-.108,1.4-.658.927Zm12.939-10.763,2.405.054,2.042.322,2.177,1.438,1.3-1.008.726-.094.887.511,4.071,3.426,3,4.34,1.68-.3,2.311,1.035.484.484-1.088.967-1.733.967-2.486.537-1.4-.027-1.169-.873-.645-.2-1.344.067-1.008.363-.793-.161-1.182-1.169-1.048-4.246.04-1.236-.766-1.653-.672-.067-2.432,1.156-2.405-2.042-.887-.2.108.726-.564-.215-1.344-1.276-.833-1.787.349-.658,2.217.82Z"
                                      transform="translate(-674.446 -138.018)"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <!--legend total kasus-->
                <div class="row">
                    <div class="mf35-f30 font-weight-bold cl-map2">Total Kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                </div>
                <!--stripped bar-->
                <div class="d-flex flex-nowrap align-items-center">
                    <span class="f11 font-weight-bold cl-map1 mr5"><?php echo $mincase ?></span>
                    <span class="map-totalcasebar"></span>
                    <span class="f11 font-weight-bold cl-map1 ml5"><?php echo $maxcase ?></span>
                </div>
                <!--Simple Table-->
                <table class="table table-hover text-center cl-map2 mt20c map-table rgview-tcustom">
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

                <hr class="map-hr-helpseparator mt50 d-block d-sm-block d-md-none">

                <!--Call for help for mobile screens-->
                <div class="cl-map1 mt50 d-block d-sm-block d-md-none">
                    <div style="width:60px; height:60px;" class="d-flex justify-content-center flex-column">
                        <img style="width:60px;" src="img/asset/regview/map-phone.svg" alt="Bantuan untuk kasus coronavirus di wilayah ini">
                    </div>
                    <div class="mt20">
                        <span class="f32 font-weight-bold">Pusat bantuan</span>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel1'] ?>" class="a-none">
                            <span class="f24 cl-map1"><?php echo $help['tel1'] ?></span>
                        </a>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel2'] ?>" class="a-none">
                            <span class="f24 cl-map1"><?php echo $help['tel2'] ?></span>
                        </a>
                    </div>
                    <a href="<?php echo $help['web'] ?>" class="a-none" target="_blank" rel="noreferrer">
                        <div class="f20 cl-map1 mt15" ><span class="map-call"><?php echo $help['web'] ?></span></div>
                    </a>
                </div>
            </div>

            <!--statistik angka & grafik-->
            <div class="col-8 col-md-9">
                <div class="row text-center">
                    <div class="col-12 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/map-virus-lg.svg" alt="Total orang yang terinfeksi oleh virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-map1 mt10">Total kasus</h2>
                        <div class="f80 font-weight-bold cl-map3 nmt30"><?php echo $maininfo['t'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-map1 nmt20"><?php echo $maininfo['t_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2 nmt5">
                            <a href="peringkat?v=persenpertambahankasus" class="a-none">
                                <img src="img/asset/regview/map-<?php echo $maininfo['t_rank_status'] ?>" alt="<?php echo $maininfo['t_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-map2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-map2"><?php echo $maininfo['t_rank'] ?></span>
                                <span class="mf16-f12 cl-map2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="9"><sup>[9]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2">
                            <a href="peringkat?v=totalkasus" class="a-none">
                                <img src="img/asset/regview/map-<?php echo $maininfo['t_per_id_status'] ?>" alt="<?php echo $maininfo['t_per_id_status_alt'] ?>">
                                <span class="f12 cl-map2"><?php echo $maininfo['t_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-map2"><?php echo $maininfo['t_per_id'] ?></span>
                                <span class="f12 cl-map2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/map-recovery-lg.svg" alt="Total orang yang sembuh dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-map1 mt10">Sembuh</h2>
                        <div class="f80 font-weight-bold cl-map3 nmt30"><?php echo $maininfo['tr'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-map1 nmt20"><?php echo $maininfo['tr_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2 nmt5">
                            <a href="peringkat?v=persenpertambahankesembuhan" class="a-none">
                                <img src="img/asset/regview/map-<?php echo $maininfo['tr_rank_status'] ?>" alt="<?php echo $maininfo['tr_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-map2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-map2"><?php echo $maininfo['tr_rank'] ?></span>
                                <span class="mf16-f12 cl-map2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="13"><sup>[13]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2">
                            <a href="peringkat?v=totalsembuh" class="a-none">
                                <img src="img/asset/regview/map-<?php echo $maininfo['tr_per_id_status'] ?>" alt="<?php echo $maininfo['tr_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-map2"><?php echo $maininfo['tr_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-map2"><?php echo $maininfo['tr_per_id'] ?></span>
                                <span class="mf16-f12 cl-map2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/map-death-lg.svg" alt="Total orang yang meninggal dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-map1 mt10">Meninggal</h2>
                        <div class="f80 font-weight-bold cl-map3 nmt30"><?php echo $maininfo['td'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-map1 nmt20"><?php echo $maininfo['td_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2 nmt5">
                            <a href="peringkat?v=persenpertambahankematian" class="a-none">
                                <img src="img/asset/regview/map-<?php echo $maininfo['td_rank_status'] ?>" alt="<?php echo $maininfo['td_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-map2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-map2"><?php echo $maininfo['td_rank'] ?></span>
                                <span class="mf16-f12 cl-map2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="11"><sup>[11]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2">
                            <a href="peringkat?v=totalkematian" class="a-none">
                                <img src="img/asset/regview/map-<?php echo $maininfo['td_per_id_status'] ?>" alt="<?php echo $maininfo['td_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-map2"><?php echo $maininfo['td_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-map2"><?php echo $maininfo['td_per_id'] ?></span>
                                <span class="mf16-f12 cl-map2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="13"><sup>[3]</sup></a></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!--Fakta Menarik-->
                <div class="row justify-content-center mt70">
                    <div class="col-md-12 col-lg-10 col-xl-8 justify-content-center">
                        <div class="row justify-content-center text-center">
                            <div class="col justify-content-center">
                                <div class="mf40-f32 font-weight-bold cl-map2">Fakta <?php echo $namaprov ?></div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-around text-center">

                                <!--Kasus / 1 Juta Penduduk-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/map-virus-sm.svg" alt="Total kasus per 1 juta penduduk di region ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-map3"><?php echo $faktamenarik['kasus1jt'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-map1 mb0 nmt5">Kasus / 1 Juta Penduduk<a class="a-none a-inh-sup click-point" data-id="51"><sup>[51]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2 nmt5">
                                        <a href="peringkat?v=kasusper1jutapenduduk" class="a-none">
                                            <img src="img/asset/regview/map-<?php echo $faktamenarik['kasus1jt_st'] ?>" alt="<?php echo $faktamenarik['kasus1jt_st_alt'] ?>">
                                            <span class="mf16-f12 cl-map2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-map2"><?php echo $faktamenarik['kasus1jt_rank'] ?></span>
                                            <span class="mf16-f12 cl-map2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="52"><sup>[52]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Kapasitas Rumah Sakit-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/map-hospitalcapacity-sm.svg" alt="Kapasitas rumah sakit di region ini pada saat ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-map3"><?php echo $faktamenarik['kapasitasrs'] ?><span class="f20">%</span></div>
                                    <h3 class="f16 font-weight-bold cl-map1 mb0 nmt5">Kapasitas Rumah Sakit<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2 nmt5">
                                        <a href="peringkat?v=bebanrumahsakit" class="a-none">
                                            <img src="img/asset/regview/map-<?php echo $faktamenarik['kapasitasrs_st'] ?>" alt="<?php echo $faktamenarik['kapasitasrs_st_alt'] ?>">
                                            <span class="mf16-f12 cl-map2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-map2"><?php echo $faktamenarik['kapasitasrs_rank'] ?></span>
                                            <span class="mf16-f12 cl-map2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="53"><sup>[53]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Rata-rata waktu menuju RS-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/map-timetohospital-sm.svg" alt="Perkiraan rata-rata waktu yang dibutuhkan untuk menuju rumah sakit di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-map3"><?php echo $faktamenarik['wakturs'] ?><span class="f20">mnt</span></div>
                                    <h3 class="f16 font-weight-bold cl-map1 mb0 nmt5">Rata-Rata Waktu Menuju RS<a class="a-none a-inh-sup click-point" data-id="39"><sup>[39]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2 nmt5">
                                        <a href="peringkat?v=waktumenujurs" class="a-none">
                                            <span class="mf16-f12 cl-map2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-map2"><?php echo $faktamenarik['wakturs_rank'] ?></span>
                                            <span class="mf16-f12 cl-map2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="54"><sup>[54]</sup></a></span>
                                        </a>
                                    </div>
                                </div>

                                <!--Jarak 1 Pasien dari Lokasi Anda-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/map-keepdistance-sm.svg" alt="Rata-rata jarak orang sehat dengan 1 orang terinfeksi corona di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-map3"><?php echo $faktamenarik['jarak1pasien'] ?><span class="f20">km</span></div>
                                    <h3 class="f16 font-weight-bold cl-map1 mb0 nmt5">Jarak 1 Pasien dari Lokasi Anda<a class="a-none a-inh-sup click-point" data-id="37"><sup>[37]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2 nmt5">
                                        <a href="peringkat?v=jarak1pasienpositifcorona" class="a-none">
                                            <img src="img/asset/regview/map-<?php echo $faktamenarik['jarak1pasien_st'] ?>" alt="<?php echo $faktamenarik['jarak1pasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-map2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-map2"><?php echo $faktamenarik['jarak1pasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-map2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="55"><sup>[55]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Dokter per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/map-doctor-sm.svg" alt="Setiap 1 pasien corona rata-rata ditangani oleh sejumlah dokter di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-map3"><?php echo $faktamenarik['dokterpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-map1 mb0 nmt5">Dokter Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="40"><sup>[40]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2 nmt5">
                                        <a href="peringkat?v=dokterper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/map-<?php echo $faktamenarik['dokterpasien_st'] ?>" alt="<?php echo $faktamenarik['dokterpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-map2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-map2"><?php echo $faktamenarik['dokterpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-map2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="56"><sup>[56]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Perawat per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/map-nurse-sm.svg" alt="Setiap 1 pasien corona rata-rata dirawat oleh sejumlah perawat di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-map3"><?php echo $faktamenarik['perawatpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-map1 mb0 nmt5">Perawat Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="41"><sup>[41]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-map2 nmt5">
                                        <a href="peringkat?v=perawatper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/map-<?php echo $faktamenarik['perawatpasien_st'] ?>" alt="<?php echo $faktamenarik['perawatpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-map2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-map2"><?php echo $faktamenarik['perawatpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-map2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="57"><sup>[57]</sup></a></span>
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
                                    <h5 class="f24 font-weight-bold cl-map2">Pertambahan & Kasus Aktif</h5>
                                </div>
                            </div>

                            <!--Legend-->
                            <div class="row justify-content-center mb10">
                                <div class="col-12 justify-content-center sm-mw1">
                                    <div class="d-flex flex-nowrap justify-content-center f12">
                                        <div>
                                            <span class="map-c0-legend1 align-self-center"></span>
                                            <span class="cl-map1">Pertambahan kasus per hari<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                        </div>
                                        <div class="ml30">
                                            <span class="map-c0-legend2 align-self-center"></span>
                                            <span class="cl-map1">Persen kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></span>
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
    <nav class="map-addbg mt20" style="position:sticky; top:3px; z-index:997">
        <div class="container">

            <div class="d-flex flex-wrap justify-content-center">
                <div class="d-flex flex-wrap pt10 pb10 pr10">
                    <div class="text-center justify-content-center d-flex flex-column">
                        <div class="f16 cl-map6 font-weight-bold mr10">Region<a class="a-none a-inh-sup click-point" data-id="59"><sup>[59]</sup></a> lainnya</div>
                    </div>
                    <div class="row text-center justify-content-center f16">
                        <a href="region#sumatera" class="a-none"><span class="map-region-block cl-white">Sumatera</span></a>
                        <a href="region#jawa" class="a-none"><span class="map-region-block cl-white">Jawa</span></a>
                        <a href="region#kalimantan" class="a-none"><span class="map-region-block cl-white">Kalimantan</span></a>
                        <a href="region#sulawesi" class="a-none"><span class="map-region-block cl-white">Sulawesi</span></a>
                        <a href="region#balinusatenggara" class="a-none"><span class="map-region-block cl-white">Bali & Nusa Tenggara</span></a>
                        <a href="region#malukupapua" class="a-none"><span class="map-region-block cl-white">Maluku & Papua</span></a>
                    </div>
                </div>

                <div class="d-none flex-wrap pt10 pb10 pl10">
                    <div class="text-center justify-content-center d-flex flex-column mr10">
                        <span class="map-survey-tag-block cl-map2">SURVEI</span>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div>
                            <span class="cl-map6 font-weight-bold">Saya </span>
                            <span class="cl-map6">berasal </span>
                            <span class="cl-map6 font-weight-bold">dari Aceh</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn map-btn-send">
                                    <span class="map-survey-selection cl-map6">
                                        Ya
                                        <img src="img/asset/regview/map-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn map-btn-send">
                                    <span class="map-survey-selection cl-map6">
                                        Tidak
                                        <img src="img/asset/regview/map-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>

                        </div>
                        <div class="ml10">
                            <span class="cl-map6 font-weight-bold">Informasi </span>
                            <span class="cl-map6">yang disajikan </span>
                            <span class="cl-map6 font-weight-bold">membantu</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn map-btn-send">
                                    <span class="map-survey-selection cl-map6">
                                        Ya
                                        <img src="img/asset/regview/map-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn map-btn-send">
                                    <span class="map-survey-selection cl-map6">
                                        Tidak
                                        <img src="img/asset/regview/map-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!--Total Kasus-->
    <div class="container map-container-case rgview-details-spacing">
        <div class="row mt50">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-map1 rgview-breakword">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a> </span>
                    <span class="mf36-f24 cl-map1">(Kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-map3"><?php echo $activecase ?></span>
                    <span class="mf36-f24 font-weight-bold cl-map1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-map3"><?php echo $activecase_id ?>%</span>
                    <span class="mf36-f24 cl-map1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-map1">Pertambahan dan total kasus</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="map-c1-legend1 align-self-center"></span>
                                    <span class="cl-map1 mf24-f16">Pertambahan kasus<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="map-c1-legend2 align-self-center"></span>
                                    <span class="cl-map1 mf24-f16">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
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
                <h4 class="mf36-f24 font-weight-bold cl-map1">Kecepatan pertumbuhan kasus per hari<a class="a-none a-inh-sup click-point" data-id="42"><sup>[42]</sup></a></h4>
                <div class="mf24-f16 cl-map1">Mengukur seberapa besar pertambahan kasus setiap harinya terhadap jumlah kasus di hari
                    sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap1 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-map1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="43"><sup>[43]</sup></a></span>
                            <span class="map-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-map1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="44"><sup>[44]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-map1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/map-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-map1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kesembuhan-->
    <div class="container map-container-recover rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-map1 rgview-breakword">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="5"><sup>[5]</sup></a> </span>
                    <span class="mf36-f24 cl-map1">(Tingkat kesembuhan<a class="a-none a-inh-sup click-point" data-id="58"><sup>[58]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-map3"><?php echo $recoveryrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-map1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-map3"><?php echo $recoveryrate_id ?>%</span>
                    <span class="mf36-f24 cl-map1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-map1">Pertambahan dan total kesembuhan</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="map-c2-legend1 align-self-center"></span>
                                    <span class="cl-map1 mf24-f16">Pertambahan kesembuhan<a class="a-none a-inh-sup click-point" data-id="12"><sup>[12]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="map-c2-legend2 align-self-center"></span>
                                    <span class="cl-map1 mf24-f16">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="5"><sup>[5]</sup></a></span>
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
                <h4 class="mf36-f24 font-weight-bold cl-map1">Kecepatan pertumbuhan kesembuhan per hari<a class="a-none a-inh-sup click-point" data-id="45"><sup>[45]</sup></a></h4>
                <div class="mf24-f16 cl-map1">Mengukur seberapa besar pertambahan kesembuhan setiap harinya terhadap jumlah kesembuhan di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap2 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-map1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="46"><sup>[46]</sup></a></span>
                            <span class="map-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-map1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="47"><sup>[47]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-map1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/map-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-map1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kematian-->
    <div class="container map-container-death rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-map1 rgview-breakword">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a> </span>
                    <span class="mf36-f24 cl-map1">(Tingkat kematian<a class="a-none a-inh-sup click-point" data-id="15"><sup>[15]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-map3"><?php echo $deathrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-map1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-map3"><?php echo $deathrate_id ?>%</span>
                    <span class="mf36-f24 cl-map1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-map1">Pertambahan dan total kematian</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="map-c3-legend1 align-self-center"></span>
                                    <span class="cl-map1 mf24-f16">Pertambahan kematian<a class="a-none a-inh-sup click-point" data-id="10"><sup>[10]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="map-c3-legend2 align-self-center"></span>
                                    <span class="cl-map1 mf24-f16">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></span>
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
                <h4 class="mf36-f24 font-weight-bold cl-map1">Kecepatan pertumbuhan kematian per hari<a class="a-none a-inh-sup click-point" data-id="48"><sup>[48]</sup></a></h4>
                <div class="mf24-f16 cl-map1">Mengukur seberapa besar pertambahan kematian setiap harinya terhadap jumlah kematian di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap3 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="mf15-f11 font-weight-bold cl-map1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="49"><sup>[49]</sup></a></span>
                            <span class="map-totalcasebar"></span>
                            <span class="mf15-f11 font-weight-bold cl-map1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="50"><sup>[50]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-map1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/map-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-map1">Mulai dari kiri atas lalu ke kanan</div>
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
                <h4 class="f24 font-weight-bold cl-map1">Komentar</h4>
                <div class="f16 cl-map1">Bagikan informasi, keresahan, dan semangat kepada Indonesia karena #SendiriKitaBisa #BersamaKitaKuat</div>

                <!--input-->
                <form class="mt30">
                    <div class="mr40">
                        <div class="form-group marginb1">
                            <input type="text" class="form-control font-weight-bold f12 cl-map1 map-c-f-input" value="Tanpa_nama0028">
                        </div>
                        <div class="form-group marginb3">
                            <input type="text" class="form-control f14 cl-map1 map-c-f-input" placeholder="katakan sesuatu...">
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="cl-map1">0/120</span>
                        <button type="submit" class="btn btn-send">
                            <img src="img/asset/regview/map-send.svg" alt="send button">
                        </button>
                    </div>
                </form>
                <hr class="map-hr-comment">
                <!--Chat Content-->
                <div class="mt25">
                    <div class="f14 cl-map1">13:10 2 April 2020</div>
                    <div class="mt5">
                        <span class="cl-map2 font-weight-bold f16">Jonathan Raditya</span><br>
                        <span class="cl-map1 f16">Semoga kita semua dalam keadaan sehat ya, jangan lupa #JagaKebersihan dan #diRumahAja !</span>
                    </div>
                    <div class="">
                        <img src="img/asset/regview/map-likes.svg" alt="likes button">
                        <span class="f15 font-weight-bold cl-map2">128</span>
                    </div>
                </div>


            </div>

            <!--Catatan Kaki-->
            <div class="col-xl-5 col-lg-5 col-md-8 col-11 mt100 d-none">
                <a href="bantuan?h=catatankaki" class="a-none"><h4 class="font-weight-bold f24 cl-map1">Catatan kaki</h4></a>

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