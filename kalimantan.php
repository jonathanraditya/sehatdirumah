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
                background-color:#CE372C;
                padding:0;
                color:#FFF3F2;
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
                    <div class="d-flex kal-provlogo-bg">
                        <!--left stripped-->
                        <div class="kal-provlogo-strip"></div>
                        <!--Logo provinsi-->
                        <div style="height:55px; width:55px;" class="align-self-center d-flex flex-column justify-content-center pt12 pb12 pl5 pr10">
                            <img class="img-fluid" src="img/asset/regview/logo/<?php echo $logo ?>" alt="<?php echo $logoalt ?> - Indonesia">
                        </div>
                        <!--Tulisan Provinsi + nama provinsinya-->
                        <div class="d-flex flex-column flex-nowrap pt12 pb12 pl7 pr15">
                            <h1 class="f24c font-weight-bold cl-kal1 mb0">Provinsi<br><?php echo $namaprov ?></h1>
                        </div>
                    </div>
                </div>
                <!--Peta-->
                <div  class="align-self-center d-flex flex-column justify-content-center"  style="height:375px;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.074 254.951">
                        <defs>
                            <style><?php echo $maphsl ?></style>
                        </defs>
                        <g transform="translate(-250.132 -51.388)">
                            <g transform="translate(181.206 57.448)" class="click-point" onclick="window.location='region?r=kalimantanbarat'">
                                <path class="id-kb"
                                      d="M275.824,229.078l-.673-.121-1-2.5.259-.518,2.745-.811,1.07.242.95,1.053.034.449-.552,1.088-2.832,1.122Zm20.391-19.925.932.1.725-.57,1.088.069.794.811.691.207.587-.242.57-.691.811.414.535.915.328,1.485-.121.915.4.432v.432l-8.65,4.99-2.262-.742-.76-.777.967-1.053.311-.881.725-3.8-.069-.742,1.295-1.813,1.105.535Zm3.35-91.1-.863,2.383-.656.38-.518,1.295-1.036.121-.086.829.294,1.122.777.553.691,1.07,2.072.518.259.6-.725,3.695.518,1.122,3.142,3.125.6.259,1.433,2.227,2.193.086.863.345.432.518.294,2.4,2.573,1.278.6,1.5.742.6,1.036-.121,1.26.259.777,1.157.259.9.829.691.725,1.243.553,1.675H320.3l1.675.432,1.554,2.365.6.466,2.072.725,1.26.121.95-.207.691-1.157.777.777.777-.035.656-.553,1.329-.432,1.64-.95,1.243-.207,1.088-.95.466-1.036,6.647-.863,3.367-.984.553.518,3.022.984.863.553.863-.035,1.209-.518,1.329.207,1.209,2.02.4-.035.173-.9.9-.121,1.951-1.416.466-.035,1.727.9,1-.294,2.935.6.552-1.329,2.331-2.4,5.56-.38-.052-1.122.432-1.036.259-2.573,1.468-1.45.086-1.122-.725-1.122.863-.95h.725L379.386,135l2.711-.6.95-.466.138-.518,1.761-.639,5.007.639,2.849-.207.95.691.6.035.984-.518.6-.812.345-.086,1.416.38,1.588-.121,1.088.207.9.518.224.691-.294.086-.863,1.709-.863.294-.518.518-.259.777,1.295.121,2.331-.777.639.086.656,1.157,1.295.38,2.763-.259,1.329.345,1.243.863.294.6,1.036.639.518.639.691.035.57-.518.984-.38,1.416-.086,1.157.518,1.295,2.314.553.173h.518l.6-.38.656-.777,3.281-1.329.483-1.45-.224-.345.121-.294,3.315-1.364.691-.777,5.266-.553,1.675,1.122.345.483h0l-.052.017h0l-1.416.725-.207,2.97.363.311-.57.725V143.7l-.363,1.191-.518.518-.9-.155-.95.622-.518-.259-1.209.1-.9.725-.155,1.14-.518.414-1.157.259-.155.622.57.518.207.725-.311.881-.9.881-.155.466.466,1.191,1,.829v.518l-.9,1.088.1,1.4-.311.622-1.157.466-.311.932.207.414h0l-.881.5-.4,1.226-.622.414-.328.76-.639.276-.328.725h-.691l-1.174.725-.466,1.882-2.262,1.312-.276.535-1.657,1.416-.086.4-.915.708-1.588.967L410.1,171.2l-1.278.345-1.088.656-.052.328,1.778,1.744,2.676,1.416-.259,2.314.328.6.622.432-.449.656-.311,1.312.639.086.121.38-.622,1.364-.76.449.587.345-.138.57-.622.121-.466.984-.967.9-1.468.311-.725,1.036-.915.639-.328,1.036-.5.38,1.347,1.226.328,1.347-1.14,1.381-.276.846-.207.138-.259-.242-.5-.863-.846-.017-.242-.6-.656.207-.466.9h-.639l-.57.4-2.3-.242-.57.535-2.486.725-1.157,1.088-1.209.207-1-.311-1,.259-.138,1.485-1.278.052-.432.725-1.537.052-1.036.6v.345l-1.589.138-.173.328-1.468-.276-.138.794-.4.4-.639-.449-.017-1.053-.639-.242-.846.76-1.468.535-.708-.311-.622.76-.708-.829-1.105-2.089-.587-.5-.95-.052-1.416,1.968.4,1.243-.173.121h-.656l-1.329-.535-1.865-.19-.328.311.535,1.934-.121.535-2.089.587-.639-.259-.846-.915-.242,1.485.5,1.312-1.157-.259-.259.121-.276.984-.794.449-1.744-.121-1.329.466-.38.518-1.606.967-1.019.069-.518.639.311,1.191-.812.829-.829.259-.466.932.535,1.105-.449.829.57.5-.207.518-2.055.345-.535.449-1.917.017-.38.311-.207.932h-.518l-.622,1.295-1.088.57-.276,1.036-.725.829-.363.069.069.5-1.917-.38-.207.915-.656-.242.242,1.364-.138,1.122-.535-.242-.069-.846-.466-.276-1.416.846.449.673.121.777-1.4.38-.639-.725-.829.259-.518.518-.846-.673-.76.932-1.519.38-.5.725-.95.656.069,1.347.76.19.311.76.449.328.725-.173.311-.242.19-.777.725-.311.5.276.38.9.207,2.072-.259.656-.639.587-.19.76-.052,1.105.57.708-.069.639-.587.725.259.725.587.4.9-.242,1.537.207.069.259-.259.691.121.725-1.209,1.019,1.174,2.227-.069.4-.328.4.052.5-1.07,1.243,1.191,1.951.9,3.142.138,2.262.915,3.557-.57,1.416.777.466.587-.017.259.777-.9,1.571-1.554.777-2.5.639-.259.984-1.07.9-2.037.345-1.347.829-2.089.708-.656.5-.587,1.623h0l-2.3,1.433-.587-.242.138-.518L329,267.875l.138-1.45-.639-1.5-.812-.984-1.105-.121-1.865.57-2.262,1.088-3.367,2.763-.345-.466-.811-.173-.294-1.623-.587-.984.932-1.847.173-1.036-.587-.812-.708-.328-.311-2.866-2.176-.639,1.157-1.381.432-2.176-1.8-6.561-1.26-1.5.069-1.917.846-2.521.017-1.174-1.209-3.108-1.191-.863-2.883-1.226-1.347-1.295.328-1.588,2.314-1.364,1.191-2.072,1.122-5.75.017-2.624-.38-1.278-.363-.656-1.14-.9-1.381-.311-1.5-1.9.9-2.417L305,211.795l-2.02-2.78-1.157-.708-1.26.846-1.951-1.295-.708-1.312-.518-.466-3.419-.95-.5-.466-.829.207.345,1.45-.449.708-.449.138-2.97-.984-.967-.984-.794-1.537.345-4.489.794.207.622.639,1.986.587,1.364.069,1.813,1.088.035-.881-1.675-1.26-1.5-.052-.4-.794.466-.794.069-1.14-2.452.052-.691.224-2.9-1.036-1.243-1.4-.742-3.332L281.54,186.9l.587-1.019,1.105-.224-.294-1.4,1.951-3.091.656-2.78-.345-2.037-1.45-3.263-1.9-2-1.416-.414-2.124-.086-.483-.449.052-1.088.777-1.623v-.9l-1.226-1.45.812-3.66-.466-1.588-1.26-1.364.432-1.5-1.295-1.537.259-.742,1.191-.95.9-.086,1.157-1.191.673-1.968-.742-2.452-.846-.725-.812-2.348.224-.345,1.26.294v-1.312l1.036-1.934,1.26-1.26.4-1.364-.345-2.176.224-1.537.639-1.191,1.278-1.191,3.833-2.314.932-1.019v-.777l.863-1.882,1.209-1.658.1-1.813-.449-1.053.121-.449.812-.294,2.383-.052.535-.76.812-.345,2.918-.052,2.089-2.417ZM275.444,94.973l-.294.1L273.476,93.8l1.588-1.329.535-1.813.829-.294.466.138.311.6-.311,2.573ZM259.68,70.4l-3.954.829-2.521-1.4,1.036-1.45,2.158-1.571-1.088-.639-3.091-1.019-1.692-3.194-.4-1.934,1.019-1.226,1.278-.363,3.384-3.54,2.089.483.19,1.45.38.846,3.8,3.747.276,3.091-.38,1.347L259.68,70.4Z"
                                      transform="translate(-181.206 -54.898)"/>
                            </g>
                            <g transform="translate(424.726 104.118)" class="click-point" onclick="window.location='region?r=kalimantantimur'">
                                <path class="id-ki"
                                      d="M445.733,86.745l2.486,2.711L449.5,91.58l-.035.742-1.053,1.588-4.679,4.23L442,97.416l-.518.017.811.76.363,1.226-.155,3.747.259,1.036,1.381,1.571,3.971,2.745,2.5,2.521,8.512,5.007.915,2.331,2.279,1.053,1.019-.155,1.036.311,5.352,4.593.6,1.588,1.312,1.537,2.02.812.466-.052,2.158.708.311.276.121,1.64-.967,1.381-1.26,1.191-4.178,2.883-3.522-1.329-5.128.483-4.817-.432-5.318-1-2.814-1.278-1.209-1.243-1.157-3.108-1.157-.984-1.4-.691-.414.155-.052.76,4.144,7.079.155,1.278-.4.639-.656.121-.587-.173-1.295-1.209-1-.173-2.745.881-2.072,2.02-.622,1.329-.017,1.571-2.952,6.095-1.571,1.14-1.4,2.987-1.226,3.626-.414,2.124.76,2.124.811.725.259,1.191-.328.742-1.088,1.157-1.364,4.265.017.812,1.036,2.21L430,175.424l4.437-2.883.777-.242.363.155.121.466-1.83,6.2,1.416,3.056.052.76-.242.38-4.817,2.141-3.695-.207-1.209-1.433-.725.449-.242,1.381-3.367,4.058-3.54,5.767-.656.57-2.417,1.07-3.177.57-2.279-5.128.535-1.934-.138-.345-.414.1-.829,2.227.017.932,1.209,1.209,1.019,2.262-.95,3.453-3.885,1.347-2.59,1.813-.224.276.155,1.312.846,1.364-.19.829-.57.691-4.092,1.623-2.866,1.4-2.469,1.554.207.535.915.466,1.209-.259,1.019-.812,1.416-.311,1.243.138.6.363.449,3.868-.069,3.919-.673.846-1.882.656-.432.483,2.279.483h1.4l.708-.691.587,1.278-.086.587,2.452.656-.19,2.4-1.209,4.265h0l-2.3-1.053-1.9-.5-4.662-.052-2.21-.725-4.714-.259-.673-.121-.915-.846-.932.846-1.347.5-.173.535-.673.622-.932.294-.483-.915.052-1.761-1.226-2.987.311-2.624.622-.967-.259-.432-1.036-.432-.863.242-.6-.483-.311.069.363-1.036-.483-.553v-.725l.553-1.226.121-1.226-.242-3.229-.622-1.278-.846-.967-.19-.863.242-.535-1.226-.984-.242-.553.242-1.209-.483-.673-1.053-.19-1.036.432-.311-.6.121-.6,1.105-.984.742-1.157,1.416-1.209.553.121-.259,1.329.432.121L379,200.494l.432-1.709h0l-.017.017h0l.4-2.245.777-.915,1.571-1.14.052-.449-1.312-1.14-.552.121-.587.57-.4-.242-.328-1.191-.587-.242-.691-.76-.725.086-.363-1.64-.4-.5-2.279-1.45-1.036-1.692-1.364-1.191-2.9-.518-.708-1.744.052-2.055-.483-3.281-.863-.742-.673-1.778-1.243-1.278-.4-.1.363-1.882-.639-.173-.328-2.521.725-.138.069-.829-.5-.777.95-1.64v-1.157l.76-.449.725-1-.622-1.934L361.7,162.8l-.5,1.14-.812.017-.812.4-1.312,1.14-1.554-.414-1.761.328v-.915l-.363-.812.138-1.105-.777-1.468-.173-2.486-.414-.535-.639.035-.553-.6-1.019.19-.5-.863.639-1.519-.138-.725.742-.829.035-.6.673-.121.328-.345.915-1.951,1.157-.742.466.1.19.363.535-.276,1.26-.086.294.035.587.829.259-.553,2.055-1.433.345-.673.086-1.226-1.122-.984-.552-1.122-1.26-1.485-.967-2-.5-2.78L356,137.507l-.777-.639-.881-.242-1.381,1.295-.069.4.518.829-.812-.207-.345-.725-.915-.57-.673.414-.863-.121-1.416,1.036-.553-.242-.95.173-.846,1.122-1.537,1.105-1.364.052v1.088l-.363.673-1.727.052-1.157.777.1,1.157-.363.1-1.209-.207-.881-.742-1.26-.311-2.676.311-.725-.311-.173-.725-1.088-.57v-.363l.57-.57-.57-1.675-1.26-.777-.518.207-.622-.155-2.21,1.14-.932-.155-1.209.414-.414-.1-.432.311-.725-.57h-.846l-.207-.414.311-.932,1.157-.466.311-.622-.1-1.416.9-1.088v-.518l-1-.829-.466-1.209.155-.466.9-.881.311-.881-.207-.742-.587-.518.155-.622,1.157-.259.518-.414.173-1.14.881-.742,1.209-.1.518.259.95-.622.881.155.535-.518.363-1.191v-1.191l.57-.742-.363-.311.207-2.97,1.416-.725h0l.639-.259h0l.414-.777,1.209-.155,2.728-1.157.984-.932,4.455,2.607.691-.207.363-.742h0l1.364.725.432.794,1.07.881,2.745.794,1.347,1.5.345,1.761.363.449,1.416-.794,1.243.173.9.363.535.691.259,1.07.708.794.794.345,1.157.086,1.519-1.675h2.314l.967.449,1.329.173,1.433-1.588,1.778.345,1.329-1.588.881-.432.449-2.745.708-.708,3.384.1,3.988-1.5,4.006-.086,1.778-1.5.967-2.037,1.519-1.329,2.745-3.695,2.227-4.247-.535-2.02.173-1.157.812-.967,1.865-.967.432-1.157,1.157-.708.276-1.416.086-3.8.345-1.226,1.433-2.383.622-.449.535-2.3.432-.535.9-.086.967.984,1.347.518.518.535v.708l1.07.535,1.243-.1,1.778-.518,3.022-1.951,3.9-1.329,3.471-2.02,2.227-.086,2.486.518,2.745-.708H427.4l.881,1.951,1.07.794,2.227,1.053.881.19,1.865-.449.794.535,1.968,2.383,2.383.881.639.086,2.21-1.329,2.227-.259"
                                      transform="translate(-322.246 -81.928)"/>
                            </g>
                            <g transform="translate(439.99 220.975)" class="click-point" onclick="window.location='region?r=kalimantanselatan'">
                                <path class="id-ks"
                                      d="M392.087,218.551l-.293.345-1.9-3.073,1.122-2.849,1.485-1.882.4-.1.345.777v1.019l-1.157,5.767Zm-8.132,12-.967.276-.915-.086-.121-.363.1-1.33.673-2.21-.1-3.091-1.554-2.158-.432-1.4.034-1.14,3.281-9.6,4.23-3.022.4.1.1.6-.622,3.954.466,4.575,1.416,6.872-.414,4.2-4.334,3.246-1.243.57Zm-10.947-80.943-.432,1.709-1.83,2.193-.432-.121.242-1.347-.552-.121-1.416,1.226-.742,1.157-1.105.967-.121.6.311.6,1.036-.432,1.036.19.483.673-.242,1.226.242.553,1.226.967-.242.553.19.846.863.967.6,1.278.242,3.229-.121,1.226-.553,1.226v.725l.483.553-.363,1.036.311-.069.6.483.863-.242,1.036.432.242.432-.6.967-.311,2.624,1.226,2.987-.069,1.761.483.915.915-.311.673-.6.19-.553,1.347-.483.915-.846.915.846.673.121,4.714.242,2.21.725,4.662.069,1.9.483,2.3,1.07h0l-.673,3.229-.9,1.14-.691.035-.276-.276-.207-1.053-1.312-.691-3.419.691-.086,2.8,1.744,1.571.345,5.37-.57,1.468-2.4,3.108-.881.449-.4-.086-.414-.6-.363-2.072-1.64-2.849-.345-.328-.225.242-.656,2.97.328,1.537,1.692,2.417.984.863.173,1.692-1.329.673-2.158,2.953-2.624,4.955-.656,4.23-.414.811-.656.38-3.419.5-1.986,1.9-1.122.725-5.594,2.383-7.822,2.814-10.7,4.472-6.544,3.937-2.141.276-.622-.673-.224-.984-.017-12.639-.19-1.45-.6-1.209-1.761-2.314-1.226-1.14-1.26.138-2.659-1.519h0V211.61l1.347-4.092,2.521-3.954.673-3.9,2.642-5.18,1.709-.483.6-.483.311-.363-.242-.432.363-.673.622.19,1.468-.553.794-1.036.553-3.108,1.209-.95.863-1.347-.069-1.105.363-.553.984.069,10.187-7.373.673.483.553-.069.363-2.262.673-1.4-1.226-2.676v-.673l1.658-1.278.432-1.4-1.157-1.589-.19-1.347,1.226-3.833,1.537-6.7.242-.311,3.194-.242,3.125-1.157.673-.553.863.19,1.709-1.347h0l.673-.518Z"
                                      transform="translate(-331.086 -149.608)"/>
                            </g>
                            <g transform="translate(332.129 158.818)" class="click-point" onclick="window.location='region?r=kalimantantengah'">
                                <path class="id-kt"
                                      d="M268.616,225.734l.6-1.606.656-.5,2.072-.708,1.347-.812,2.037-.363,1.07-.9.259-.984,2.5-.639,1.571-.777.9-1.571-.276-.777-.587.035-.777-.483.57-1.4-.915-3.574-.155-2.245-.9-3.16-1.174-1.951,1.053-1.243-.035-.5.328-.4.069-.4-1.191-2.227,1.209-1.019-.121-.725.276-.673-.086-.259-1.537-.224-.9.242-.587-.4-.259-.725.587-.742.069-.622-.553-.708.035-1.105.19-.76.639-.587.259-.656-.207-2.072-.38-.9-.5-.276-.725.311-.19.777-.311.224-.725.173-.449-.328-.311-.76-.76-.19-.069-1.329.95-.656.483-.742,1.519-.363.76-.95.846.691.518-.518.829-.259.639.725,1.4-.38-.121-.777-.449-.673,1.416-.846.483.276.069.846.535.242.155-1.14-.242-1.364.656.242.225-.915,1.916.38-.086-.5.363-.069.725-.829.294-1.019,1.088-.57.622-1.295h.518l.207-.932.38-.311,1.916-.017.535-.449,2.072-.363.207-.518-.57-.483.449-.829L293,169.757l.483-.932.829-.259.794-.829-.294-1.191.518-.639,1.019-.069,1.606-.967.38-.5,1.312-.483,1.761.121.794-.449.276-.984.259-.121,1.174.259-.5-1.312.242-1.485.846.915.639.259,2.072-.587.121-.535-.535-1.917.328-.311,1.865.19,1.329.535h.656l.173-.121-.414-1.243,1.433-1.968.932.052.6.483,1.105,2.089.708.829.622-.76.708.311,1.468-.535.846-.76.639.242.017,1.053.639.449.414-.4.138-.811,1.468.294.155-.328,1.588-.138v-.363l1.036-.6,1.537-.052.432-.725,1.278-.052.138-1.468,1-.259.984.294,1.209-.207,1.157-1.088,2.486-.725.57-.535,2.3.242.57-.414h.639l.466-.881.673-.207.225.6.863.017.483.881.259.224.224-.138.276-.846,1.14-1.381-.328-1.347-1.347-1.226.483-.363.345-1.036.915-.639.725-1.036,1.485-.311.967-.881.466-.984.622-.121.138-.57-.587-.345.76-.449.6-1.364-.121-.38-.639-.086.311-1.329.449-.656-.6-.414-.345-.6.276-2.331-2.676-1.4-1.778-1.744.052-.328,1.088-.656,1.278-.345,2.383.432,1.589-.95.915-.708.1-.4,1.658-1.416.276-.535,2.279-1.312.466-1.882,1.174-.725h.691l.328-.725.639-.294.328-.742.622-.432.4-1.226.881-.5h.846l.725.57.432-.311.414.1,1.209-.414.932.155,2.21-1.14.622.155.518-.207,1.26.777.57,1.675-.57.57v.363l1.088.57.173.725.725.311,2.676-.311,1.26.311.881.742,1.209.207.363-.1-.1-1.157,1.157-.777,1.727-.052.363-.673v-1.088l1.364-.052,1.537-1.105.846-1.122.95-.173.553.242,1.416-1.036.863.121.673-.414.915.57.345.725.812.207-.518-.829.069-.4,1.381-1.295.881.242.777.639.673,1.209.5,2.78.967,2,1.26,1.485.552,1.122,1.122.984-.086,1.226-.345.673-2.055,1.433-.259.553-.587-.829-.294-.035-1.26.086-.535.276-.19-.363-.466-.1-1.157.742-.915,1.951-.328.345-.673.121-.034.6-.742.829.138.725-.639,1.519.5.863,1.019-.19.553.6.639-.035.414.535.173,2.486.777,1.468-.138,1.105.363.811v.915l1.761-.328,1.554.414,1.312-1.14.812-.4.812-.017.5-1.14,4.178-2.02.622,1.934-.725,1-.76.449V142.3l-.95,1.64.5.777-.069.829-.725.138.328,2.521.639.173-.363,1.882.4.1,1.243,1.278.673,1.778.863.742.483,3.281-.052,2.055.708,1.744,2.9.518,1.364,1.191,1.036,1.692,2.279,1.45.4.5.363,1.64.725-.086.691.76.587.242.328,1.191.4.242.587-.57.552-.121,1.312,1.14-.052.449-1.571,1.14-.777.915-.4,2.245h0l-.6.535h0l-1.709,1.347-.863-.19-.673.553-3.125,1.157-3.194.242-.242.311-1.537,6.7-1.226,3.833.19,1.347,1.157,1.588-.432,1.4-1.658,1.278v.673l1.226,2.676-.673,1.4-.363,2.262-.553.052-.673-.483-10.17,7.373-.984-.052-.38.553.069,1.088-.863,1.347-1.209.95-.553,3.108-.794,1.036-1.468.535-.622-.173-.363.673.242.414-.311.38-.6.483-1.727.483-2.624,5.18-.673,3.9-2.521,3.971-1.347,4.075v1.571h0l-4.178-1.986-3.211-.863-2.106.155-6.2,2.97-3.194.483-1.381-.052-1.848-1.122.846-2.694.121-2.728-.449-1.571-.622-.915-3.9.242-.777.846-.294,1.036-2.193.5-3.609-2.3-5.387-5.629-.9-.121-2.538,2.763-.19.984.76.984-.518,1.727-5.715,3.5-2.037,1.433-1.209,1.243-3.022.932-.552-.052-3.419-2.711-3.332-1.157-1.8-.035-2.5.967-6.371,6.078-1.053.587-.708.1-2.5-1.036,1.122-3.937-.812-6.319v-1.416l.483-1.865-.052-1.243-2.348-4.2-.691-2.763-.829-.121.121,1.381-.984,1.45.742.6-.173.777-1.623.294-.518.57-2.141,1.329-.294-.811-1.571-1.381L289.7,223.3l-.742-.121H286.4l-5.266,3.022-2.106.915-1.675.518-2.555.345-3.764-2.659Z"
                                      transform="translate(-268.616 -113.608)"/>
                            </g>
                            <g transform="translate(447.069 51.388)" class="click-point" onclick="window.location='region?r=kalimantanutara'">
                                <path class="id-ku"
                                      d="M427.145,84.591l-.967.742-2.227-1.761-.812-2.141.052-.708.276-.38,2.521-.207,1.416.432.259.553Zm-8.167-8.27,3.8,2.245-.017.345-.932.812-2.918-1.278-3.332-.173-1.105-.535-.691-.932.138-.742,1.571-.656,3.488.915ZM428.8,63.543l-1.347.5-2.055-1.5-.311-1.537.121-.38,1.347-1.468.846.086,2.158,1.744.173.812Zm4.8-5.715.742.328.725,3.47-.967.76-.881.138-1.053-.535-6.078-4.869.1-.449,1.554-1.278.881-.052,1.727.6.328.656,1,.725,1.917.5Zm-65.542,2.486.069-1.606.57-1.157.639.052,1.364-1.571.691.1.242.57.708-.19.224-.984L373.81,54.5l-.242-.725.207-1.8.915-.328.57.984,2.607.518.466.345.19.846,1.122.863.345-.224.673-1.312,1.468-.57.224-1.105.259-.19,2.434.363.518.311,2.624-.6,2.02,1.675.345,1.105,1.019-.242.4-.932.639.276.812-.138-.086-1.07.932-1.157.708.777.656.207.432,1.053,1.329-.414.915.276.535-.173.483-.276.449-.863.708.432.656.829.449-.19.846.483,1.191-.345.915-.708,1.26.311.5.4,1.122.1.483.518.587-.673,1.917.259,1.122-.294,1.019.19,1.105-.276.155-.328.915-.363,5.214,3.712.691,1.485.414.259,2.089.587,1.537-.449.414.294h0l-1.4.863-1.571.483-2.693-.777-.294.328v.967l.673.553,1.658.4,4.558,3.833L423,65.3l2.866,1.64,2.693.294,2.193,2.314.069.449-.432,1.105,1.83.553-.138.432-2.072,1.934-1.847.363-5.473.4-4.61-.656-3.108.518-.829.5-.76,1.122.052.708.967,1.5,2.555,1.606,2.176-.259,1.381.363.034,1.45-.483.9,3.039,1.588-.294.483-2.176.294-1.485.587-.5.794-1.675.294-.294.587.932.553,3.471.6,4.679,2.037,2.106,3.591-.483,2.78L427.37,98.9l1.761.311,1.381.846.363.57.242,2.314.4,1.243,4.8,4.731h0l-1.191,1.019-2.227.259-2.227,1.329-.622-.086-2.4-.881-1.951-2.383-.794-.535-1.865.449-.881-.173-2.227-1.053-1.07-.794-.881-1.951h-1.5l-2.763.708-2.486-.535-2.227.086-3.471,2.037-3.9,1.329L398.6,109.7l-1.778.535-1.243.086-1.07-.535v-.708l-.5-.535L392.682,108l-.984-.967-.881.086-.449.535-.535,2.3-.622.449-1.416,2.383-.363,1.243-.086,3.8-.259,1.416-1.157.708-.449,1.14-1.865.967-.794.967-.173,1.157.535,2.037-2.227,4.23-2.763,3.712-1.5,1.329-.984,2.037-1.778,1.5-4.006.086-3.988,1.5-3.384-.086-.708.708-.449,2.728-.881.449-1.329,1.588-1.778-.345-1.416,1.588-1.329-.173-.984-.449h-2.314l-1.5,1.675-1.157-.086-.794-.345-.708-.794-.259-1.053-.535-.708-.881-.345-1.243-.173-1.416.794-.363-.449-.363-1.761-1.329-1.5-2.745-.794L337,140.2l-.449-.794-1.364-.725h0l.846-1.4-.311-.518.207-1.295,1.381-.811.9-1.588.656-.535.224-1.709-.19-2.055-.224-.224.846-1.14-.121-.466.967-.276.932.432.777-1.105,1.157-.19.622-.587-.691-1.4.086-.4,1.191-.9-.035-.38-.881-.432-1.312.587-.345-.777.276-1.658-.6-.328-.276-.5-.035-1.416.587-2.262,3.177-.345,1.347-.846.069-.4-.57-.742.535-1.088,1.157.19.742-.4.881-1.019h1.157l.345-1.019.777-.708,1-.311,1.347.035,1.036-.863.121-.535-.811-.587-.19-.587-1.157-1.364-1.709.535-.535-.812.535-.656.155-.708v-.846l-.4-.242v-.656l1.036-.9V99.75l.311-.587-.311-.466-.881-.224-.069-.311,1.658-1.329L353,95l2.745-1.83.587-1.433,1.053,1.122.069.708,2.124-.155,1.4-1.329,1.778-.242.311-.587v-1.45l.224-.432,1.4-1.157v-.345l-1.226-.9-.086-.311.725-4.852,1.088-2.176.587.035.691,1.088.691-1-1-1.744-.224-1.9-.656-.812L365,73.817l.086-2.676.242-1.226.9-1.8.069-.967-.086-.311-1.347-.967-.224-.535,1.468-.4.777-.708,1.157-3.591h0l.017-.328Z"
                                      transform="translate(-335.186 -51.388)"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <!--legend total kasus-->
                <div class="row">
                    <div class="mf35-f30 font-weight-bold cl-kal2">Total Kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></div>
                </div>
                <!--stripped bar-->
                <div class="d-flex flex-nowrap align-items-center">
                    <span class="f11 font-weight-bold cl-kal1 mr5"><?php echo $mincase ?></span>
                    <span class="kal-totalcasebar"></span>
                    <span class="f11 font-weight-bold cl-kal1 ml5"><?php echo $maxcase ?></span>
                </div>
                <!--Simple Table-->
                <table class="table table-hover text-center cl-kal2 mt20c kal-table rgview-tcustom">
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

                <hr class="kal-hr-helpseparator mt50 d-block d-sm-block d-md-none">

                <!--Call for help for mobile screens-->
                <div class="cl-kal1 mt50 d-block d-sm-block d-md-none mb90">
                    <div style="width:60px; height:60px;" class="d-flex justify-content-center flex-column">
                        <img style="width:60px;" src="img/asset/regview/kal-phone.svg" alt="Bantuan untuk kasus coronavirus di wilayah ini">
                    </div>
                    <div class="mt20">
                        <span class="f32 font-weight-bold">Pusat bantuan</span>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel1'] ?>" class="a-none">
                            <span class="f24 cl-kal1"><?php echo $help['tel1'] ?></span>
                        </a>
                    </div>
                    <div class='mt10'>
                        <a href="tel:<?php echo $help['tel2'] ?>" class="a-none">
                            <span class="f24 cl-kal1"><?php echo $help['tel2'] ?></span>
                        </a>
                    </div>
                    <a href="<?php echo $help['web'] ?>" class="a-none" target="_blank" rel="noreferrer">
                        <div class="f20 cl-kal1 mt15" ><span class="kal-call"><?php echo $help['web'] ?></span></div>
                    </a>
                </div>
            </div>

            <!--statistik angka & grafik-->
            <div class="col-8 col-md-9">
                <div class="row text-center">
                    <div class="col-12 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/kal-virus-lg.svg" alt="Total orang yang terinfeksi oleh virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-kal1 mt10">Total kasus</h2>
                        <div class="f80 font-weight-bold cl-kal3 nmt30"><?php echo $maininfo['t'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-kal1 nmt20"><?php echo $maininfo['t_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2 nmt5">
                            <a href="peringkat?v=persenpertambahankasus" class="a-none">
                                <img src="img/asset/regview/kal-<?php echo $maininfo['t_rank_status'] ?>" alt="
                                    <?php echo $maininfo['t_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-kal2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-kal2"><?php echo $maininfo['t_rank'] ?></span>
                                <span class="mf16-f12 cl-kal2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="9"><sup>[9]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2">
                            <a href="peringkat?v=totalkasus" class="a-none">
                                <img src="img/asset/regview/kal-<?php echo $maininfo['t_per_id_status'] ?>" alt="<?php echo $maininfo['t_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-kal2"><?php echo $maininfo['t_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-kal2"><?php echo $maininfo['t_per_id'] ?></span>
                                <span class="mf16-f12 cl-kal2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/kal-recovery-lg.svg" alt="Total orang yang sembuh dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-kal1 mt10">Sembuh</h2>
                        <div class="f80 font-weight-bold cl-kal3 nmt30"><?php echo $maininfo['tr'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-kal1 nmt20"><?php echo $maininfo['tr_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2 nmt5">
                            <a href="peringkat?v=persenpertambahankesembuhan" class="a-none">
                                <img src="img/asset/regview/kal-<?php echo $maininfo['tr_rank_status'] ?>" alt="<?php echo $maininfo['tr_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-kal2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-kal2"><?php echo $maininfo['tr_rank'] ?></span>
                                <span class="mf16-f12 cl-kal2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="13"><sup>[13]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2">
                            <a href="peringkat?v=totalsembuh" class="a-none">
                                <img src="img/asset/regview/kal-<?php echo $maininfo['tr_per_id_status'] ?>" alt="<?php echo $maininfo['tr_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-kal2"><?php echo $maininfo['tr_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-kal2"><?php echo $maininfo['tr_per_id'] ?></span>
                                <span class="mf16-f12 cl-kal2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 rgview-highlight-pd">
                        <div style="height:84px;" class="d-flex flex-column justify-content-center">
                            <img src="img/asset/regview/kal-death-lg.svg" alt="Total orang yang meninggal dari virus corona di region ini">
                        </div>
                        <h2 class="f40 font-weight-bold cl-kal1 mt10">Meninggal</h2>
                        <div class="f80 font-weight-bold cl-kal3 nmt30"><?php echo $maininfo['td'] ?></div>
                        <div class="mf36-f24 font-weight-bold cl-kal1 nmt20"><?php echo $maininfo['td_inc'] ?></div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2 nmt5">
                            <a href="peringkat?v=persenpertambahankematian" class="a-none">
                                <img src="img/asset/regview/kal-<?php echo $maininfo['td_rank_status'] ?>" alt="<?php echo $maininfo['td_rank_status_alt'] ?>">
                                <span class="mf16-f12 cl-kal2">Peringkat </span>
                                <span class="mf24-f16 font-weight-bold cl-kal2"><?php echo $maininfo['td_rank'] ?></span>
                                <span class="mf16-f12 cl-kal2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="11"><sup>[11]</sup></a></span>
                            </a>
                        </div>
                        <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2">
                            <a href="peringkat?v=totalkematian" class="a-none">
                                <img src="img/asset/regview/kal-<?php echo $maininfo['td_per_id_status'] ?>" alt="<?php echo $maininfo['td_per_id_status_alt'] ?>">
                                <span class="mf16-f12 cl-kal2"><?php echo $maininfo['td_id'] ?> </span>
                                <span class="mf24-f16 font-weight-bold cl-kal2"><?php echo $maininfo['td_per_id'] ?></span>
                                <span class="mf16-f12 cl-kal2"> Indonesia<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></span>
                            </a>
                        </div>
                    </div>
                </div>

                <!--Fakta Menarik-->
                <div class="row justify-content-center mt70">
                    <div class="col-md-12 col-lg-10 col-xl-8 justify-content-center">
                        <div class="row justify-content-center text-center">
                            <div class="col justify-content-center">
                                <div class="f32 font-weight-bold cl-kal2">Fakta <?php echo $namaprov ?></div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-around text-center">

                                <!--Kasus / 1 Juta Penduduk-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/kal-virus-sm.svg" alt="Total kasus per 1 juta penduduk di region ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-kal3"><?php echo $faktamenarik['kasus1jt'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-kal1 mb0 nmt5">Kasus / 1 Juta Penduduk<a class="a-none a-inh-sup click-point" data-id="51"><sup>[51]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2 nmt5">
                                        <a href="peringkat?v=kasusper1jutapenduduk" class="a-none">
                                            <img src="img/asset/regview/kal-<?php echo $faktamenarik['kasus1jt_st'] ?>" alt="<?php echo $faktamenarik['kasus1jt_st_alt'] ?>">
                                            <span class="mf16-f12 cl-kal2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-kal2"><?php echo $faktamenarik['kasus1jt_rank'] ?></span>
                                            <span class="mf16-f12 cl-kal2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="52"><sup>[52]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Kapasitas Rumah Sakit-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/kal-hospitalcapacity-sm.svg" alt="Kapasitas rumah sakit di region ini pada saat ini">
                                    </div>
                                    <div class="f40c font-weight-bold cl-kal3"><?php echo $faktamenarik['kapasitasrs'] ?><span class="f20">%</span></div>
                                    <h3 class="f16 font-weight-bold cl-kal1 mb0 nmt5">Kapasitas Rumah Sakit<a class="a-none a-inh-sup click-point" data-id="38"><sup>[38]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2 nmt5">
                                        <a href="peringkat?v=bebanrumahsakit" class="a-none">
                                            <img src="img/asset/regview/kal-<?php echo $faktamenarik['kapasitasrs_st'] ?>" alt="<?php echo $faktamenarik['kapasitasrs_st_alt'] ?>">
                                            <span class="mf16-f12 cl-kal2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-kal2"><?php echo $faktamenarik['kapasitasrs_rank'] ?></span>
                                            <span class="mf16-f12 cl-kal2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="53"><sup>[53]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Rata-rata waktu menuju RS-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/kal-timetohospital-sm.svg" alt="Perkiraan rata-rata waktu yang dibutuhkan untuk menuju rumah sakit di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-kal3"><?php echo $faktamenarik['wakturs'] ?><span class="f20">mnt</span></div>
                                    <h3 class="f16 font-weight-bold cl-kal1 mb0 nmt5">Rata-Rata Waktu Menuju RS<a class="a-none a-inh-sup click-point" data-id="39"><sup>[39]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2 nmt5">
                                        <a href="peringkat?v=waktumenujurs" class="a-none">
                                            <span class="mf16-f12 cl-kal2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-kal2"><?php echo $faktamenarik['wakturs_rank'] ?></span>
                                            <span class="mf16-f12 cl-kal2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="54"><sup>[54]</sup></a></span>
                                        </a>
                                    </div>
                                </div>

                                <!--Jarak 1 Pasien dari Lokasi Anda-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/kal-keepdistance-sm.svg" alt="Rata-rata jarak orang sehat dengan 1 orang terinfeksi corona di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-kal3"><?php echo $faktamenarik['jarak1pasien'] ?><span class="f20">km</span></div>
                                    <h3 class="f16 font-weight-bold cl-kal1 mb0 nmt5">Jarak 1 Pasien dari Lokasi Anda<a class="a-none a-inh-sup click-point" data-id="37"><sup>[37]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2 nmt5">
                                        <a href="peringkat?v=jarak1pasienpositifcorona" class="a-none">
                                            <img src="img/asset/regview/kal-<?php echo $faktamenarik['jarak1pasien_st'] ?>" alt="<?php echo $faktamenarik['jarak1pasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-kal2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-kal2"><?php echo $faktamenarik['jarak1pasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-kal2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="55"><sup>[55]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Dokter per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/kal-doctor-sm.svg" alt="Setiap 1 pasien corona rata-rata ditangani oleh sejumlah dokter di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-kal3"><?php echo $faktamenarik['dokterpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-kal1 mb0 nmt5">Dokter Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="40"><sup>[40]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2 nmt5">
                                        <a href="peringkat?v=dokterper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/kal-<?php echo $faktamenarik['dokterpasien_st'] ?>" alt="<?php echo $faktamenarik['dokterpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-kal2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-kal2"><?php echo $faktamenarik['dokterpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-kal2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="56"><sup>[56]</sup></a></span>
                                        </a>
                                    </div>
                                </div>
                                <!--Perawat per 1 Pasien Aktif-->
                                <div class="rgview-fact-pd">
                                    <div style="height:51px;" class="d-flex flex-column justify-content-center">
                                        <img src="img/asset/regview/kal-nurse-sm.svg" alt="Setiap 1 pasien corona rata-rata dirawat oleh sejumlah perawat di region terkait">
                                    </div>
                                    <div class="f40c font-weight-bold cl-kal3"><?php echo $faktamenarik['perawatpasien'] ?></div>
                                    <h3 class="f16 font-weight-bold cl-kal1 mb0 nmt5">Perawat Per 1 Pasien Aktif<a class="a-none a-inh-sup click-point" data-id="41"><sup>[41]</sup></a></h3>
                                    <div class="d-flex flex-nowrap align-items-center justify-content-center cl-kal2 nmt5">
                                        <a href="peringkat?v=perawatper1pasienaktif" class="a-none">
                                            <img src="img/asset/regview/kal-<?php echo $faktamenarik['perawatpasien_st'] ?>" alt="<?php echo $faktamenarik['perawatpasien_st_alt'] ?>">
                                            <span class="mf16-f12 cl-kal2">Peringkat </span>
                                            <span class="f16 font-weight-bold cl-kal2"><?php echo $faktamenarik['perawatpasien_rank'] ?></span>
                                            <span class="mf16-f12 cl-kal2"> di Indonesia<a class="a-none a-inh-sup click-point" data-id="57"><sup>[57]</sup></a></span>
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
                                    <h5 class="f24 font-weight-bold cl-kal2">Pertambahan & Kasus Aktif</h5>
                                </div>
                            </div>

                            <!--Legend-->
                            <div class="row justify-content-center mb10">
                                <div class="col-12 justify-content-center sm-mw1">
                                    <div class="d-flex flex-nowrap justify-content-center f12">
                                        <div>
                                            <span class="kal-c0-legend1 align-self-center"></span>
                                            <span class="cl-kal1">Pertambahan kasus per hari<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                        </div>
                                        <div class="ml30">
                                            <span class="kal-c0-legend2 align-self-center"></span>
                                            <span class="cl-kal1">Persen kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a></span>
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
    <nav class="kal-addbg mt20" style="position:sticky; top:3px; z-index:997">
        <div class="container">

            <div class="d-flex flex-wrap justify-content-center">
                <div class="d-flex flex-wrap pt10 pb10 pr10">
                    <div class="text-center justify-content-center d-flex flex-column">
                        <div class="f16 cl-kal6 font-weight-bold mr10">Region<a class="a-none a-inh-sup click-point" data-id="59"><sup>[59]</sup></a> lainnya</div>
                    </div>
                    <div class="row text-center justify-content-center f16">
                        <a href="region#sumatera" class="a-none"><span class="kal-region-block cl-white">Sumatera</span></a>
                        <a href="region#jawa " class="a-none"><span class="kal-region-block cl-white">Jawa</span></a>
                        <a href="region#kalimantan" class="a-none"><span class="kal-region-block cl-white">Kalimantan</span></a>
                        <a href="region#sulawesi" class="a-none"><span class="kal-region-block cl-white">Sulawesi</span></a>
                        <a href="region#balinusatenggara" class="a-none"><span class="kal-region-block cl-white">Bali & Nusa Tenggara</span></a>
                        <a href="region#malukupapua" class="a-none"><span class="kal-region-block cl-white">Maluku & Papua</span></a>
                    </div>
                </div>

                <div class="d-none flex-wrap pt10 pb10 pl10">
                    <div class="text-center justify-content-center d-flex flex-column mr10">
                        <span class="kal-survey-tag-block cl-kal2">SURVEI</span>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div>
                            <span class="cl-kal6 font-weight-bold">Saya </span>
                            <span class="cl-kal6">berasal </span>
                            <span class="cl-kal6 font-weight-bold">dari Aceh</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn kal-btn-send">
                                    <span class="kal-survey-selection cl-kal6">
                                        Ya
                                        <img src="img/asset/regview/kal-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn kal-btn-send">
                                    <span class="kal-survey-selection cl-kal6">
                                        Tidak
                                        <img src="img/asset/regview/kal-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>

                        </div>
                        <div class="ml10">
                            <span class="cl-kal6 font-weight-bold">Informasi </span>
                            <span class="cl-kal6">yang disajikan </span>
                            <span class="cl-kal6 font-weight-bold">membantu</span>
                            <input type="text" value="1" class="d-none">
                            <button type="submit" class="btn kal-btn-send">
                                    <span class="kal-survey-selection cl-kal6">
                                        Ya
                                        <img src="img/asset/regview/kal-smile-emot.svg" alt="emoticon senyum (ya)">
                                    </span>
                            </button>
                            <input type="text" value="0" class="d-none">
                            <button type="submit" class="btn kal-btn-send">
                                    <span class="kal-survey-selection cl-kal6">
                                        Tidak
                                        <img src="img/asset/regview/kal-sad-emot.svg" alt="emoticon sedih (tidak)">
                                    </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!--Total Kasus-->
    <div class="container kal-container-case rgview-details-spacing">
        <div class="row mt50">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-kal1 rgview-breakword">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a> </span>
                    <span class="mf36-f24 cl-kal1">(Kasus aktif<a class="a-none a-inh-sup click-point" data-id="6"><sup>[6]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-kal3"><?php echo $activecase ?></span>
                    <span class="mf36-f24 font-weight-bold cl-kal1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-kal3"><?php echo $activecase_id ?>%</span>
                    <span class="mf36-f24 cl-kal1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-kal1">Pertambahan dan total kasus</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="kal-c1-legend1 align-self-center"></span>
                                    <span class="cl-kal1 mf24-f16">Pertambahan kasus<a class="a-none a-inh-sup click-point" data-id="8"><sup>[8]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="kal-c1-legend2 align-self-center"></span>
                                    <span class="cl-kal1 mf24-f16">Total kasus<a class="a-none a-inh-sup click-point" data-id="2"><sup>[2]</sup></a></span>
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
                <h4 class="mf36-f24 font-weight-bold cl-kal1">Kecepatan pertumbuhan kasus per hari<a class="a-none a-inh-sup click-point" data-id="42"><sup>[42]</sup></a></h4>
                <div class="mf24-f16 cl-kal1">Mengukur seberapa besar pertambahan kasus setiap harinya terhadap jumlah kasus di hari
                    sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap1 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="f11 font-weight-bold cl-kal1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="43"><sup>[43]</sup></a></span>
                            <span class="kal-totalcasebar"></span>
                            <span class="f11 font-weight-bold cl-kal1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="44"><sup>[44]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-kal1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/kal-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-kal1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kesembuhan-->
    <div class="container kal-container-recover rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-kal1 rgview-breakword">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a> </span>
                    <span class="mf36-f24 cl-kal1">(Tingkat kesembuhan<a class="a-none a-inh-sup click-point" data-id="58"><sup>[58]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-kal3"><?php echo $recoveryrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-kal1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-kal3"><?php echo $recoveryrate_id ?>%</span>
                    <span class="mf36-f24 cl-kal1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-kal1">Pertambahan dan total kesembuhan</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="kal-c2-legend1 align-self-center"></span>
                                    <span class="cl-kal1 mf24-f16">Pertambahan kesembuhan<a class="a-none a-inh-sup click-point" data-id="12"><sup>[12]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="kal-c2-legend2 align-self-center"></span>
                                    <span class="cl-kal1 mf24-f16">Total kesembuhan<a class="a-none a-inh-sup click-point" data-id="4"><sup>[4]</sup></a></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Data visualization-->
                    <div class="row justify-content-center">
                        <div class="col-12 lg-secdata">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="lg-linechart">
                                <g  transform="translate(-253.026 0)">
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
                <h4 class="mf36-f24 font-weight-bold cl-kal1">Kecepatan pertumbuhan kesembuhan per hari<a class="a-none a-inh-sup click-point" data-id="45"><sup>[45]</sup></a></h4>
                <div class="mf24-f16 cl-kal1">Mengukur seberapa besar pertambahan kesembuhan setiap harinya terhadap jumlah kesembuhan di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap2 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="f11 font-weight-bold cl-kal1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="46"><sup>[46]</sup></a></span>
                            <span class="kal-totalcasebar"></span>
                            <span class="f11 font-weight-bold cl-kal1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="47"><sup>[47]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-kal1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/kal-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-kal1">Mulai dari kiri atas lalu ke kanan</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Total Kematian-->
    <div class="container kal-container-death rgview-details-spacing">
        <div class="row mt100">
            <div class="col">
                <h3 class="text-center">
                    <span class="mf60-f40 font-weight-bold cl-kal1 rgview-breakword">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a> </span>
                    <span class="mf36-f24 cl-kal1">(Tingkat kematian<a class="a-none a-inh-sup click-point" data-id="15"><sup>[15]</sup></a> </span>
                    <span class="mf36-f24 font-weight-bold cl-kal3"><?php echo $deathrate ?></span>
                    <span class="mf36-f24 font-weight-bold cl-kal1">, Indonesia</span>
                    <span class="mf36-f24 font-weight-bold cl-kal3"><?php echo $deathrate_id ?>%</span>
                    <span class="mf36-f24 cl-kal1">)</span>
                </h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-12 mt50">
                <div class="container-fluid">
                    <!--Title-->
                    <div class="row justify-content-center mb20">
                        <div class="col-12 text-center lg-mw1">
                            <h4 class="mf36-f24 font-weight-bold cl-kal1">Pertambahan dan total kematian</h4>
                        </div>
                    </div>

                    <!--Legend-->
                    <div class="row justify-content-center mb10">
                        <div class="col-12 justify-content-center lg-mw1">
                            <div class="d-flex flex-nowrap justify-content-center">
                                <div>
                                    <span class="kal-c3-legend1 align-self-center"></span>
                                    <span class="cl-kal1 mf24-f16">Pertambahan kematian<a class="a-none a-inh-sup click-point" data-id="10"><sup>[10]</sup></a></span>
                                </div>
                                <div class="ml30">
                                    <span class="kal-c3-legend2 align-self-center"></span>
                                    <span class="cl-kal1 mf24-f16">Total kematian<a class="a-none a-inh-sup click-point" data-id="3"><sup>[3]</sup></a></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--Data visualization-->
                    <div class="row justify-content-center">
                        <div class="col-12 lg-secdata">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 580 400" class="lg-linechart">
                                <g id="Line_chart" data-name="Line chart" transform="translate(-253.026 0)">
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
                <h4 class="mf36-f24 font-weight-bold cl-kal1">Kecepatan pertumbuhan kematian per hari<a class="a-none a-inh-sup click-point" data-id="48"><sup>[48]</sup></a></h4>
                <div class="mf24-f16 cl-kal1">Mengukur seberapa besar pertambahan kematian setiap harinya terhadap jumlah kematian di hari sebelumnya. Parameter dinyatakan dalam persen.</div>
                <div class="d-flex flex-wrap">
                    <div class="d-flex flex-wrap flex-column rgview-heatmapscale">
                        <?php echo $heatmap3 ?>

                        <!--stripped bar-->
                        <div class="d-flex flex-nowrap align-items-center mt15">
                            <span class="f11 font-weight-bold cl-kal1 mr5">Melambat<a class="a-none a-inh-sup click-point" data-id="49"><sup>[49]</sup></a></span>
                            <span class="kal-totalcasebar"></span>
                            <span class="f11 font-weight-bold cl-kal1 ml5">Lebih cepat<a class="a-none a-inh-sup click-point" data-id="50"><sup>[50]</sup></a></span>
                        </div>

                    </div>
                    <div class="mt30">
                        <div class="mf24-f16 cl-kal1 font-weight-bold">Tips membaca</div>
                        <img class="rgview-tips-scale" src="img/asset/regview/kal-readingtips.svg" alt="Tips cara membaca kecepatan pertumbuhan kasus corona per harinya di sehatdirumah.com">
                        <div class="mf16-f12 cl-kal1">Mulai dari kiri atas lalu ke kanan</div>
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
                <h4 class="f24 font-weight-bold cl-kal1">Komentar</h4>
                <div class="f16 cl-kal1">Bagikan informasi, keresahan, dan semangat kepada Indonesia karena #SendiriKitaBisa #BersamaKitaKuat</div>

                <!--input-->
                <form class="mt30">
                    <div class="mr40">
                        <div class="form-group marginb1">
                            <input type="text" class="form-control font-weight-bold f12 cl-kal1 kal-c-f-input" value="Tanpa_nama0028">
                        </div>
                        <div class="form-group marginb3">
                            <input type="text" class="form-control f14 cl-kal1 kal-c-f-input" placeholder="katakan sesuatu...">
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="cl-kal1">0/120</span>
                        <button type="submit" class="btn btn-send">
                            <img src="img/asset/regview/kal-send.svg" alt="send button">
                        </button>
                    </div>
                </form>
                <hr class="kal-hr-comment">
                <!--Chat Content-->
                <div class="mt25">
                    <div class="f14 cl-kal1">13:10 2 April 2020</div>
                    <div class="mt5">
                        <span class="cl-kal2 font-weight-bold f16">Jonathan Raditya</span><br>
                        <span class="cl-kal1 f16">Semoga kita semua dalam keadaan sehat ya, jangan lupa #JagaKebersihan dan #diRumahAja !</span>
                    </div>
                    <div class="">
                        <img src="img/asset/regview/kal-likes.svg" alt="likes button">
                        <span class="f15 font-weight-bold cl-kal2">128</span>
                    </div>
                </div>


            </div>

            <!--Catatan Kaki-->
            <div class="col-xl-5 col-lg-5 col-md-8 col-11 mt100 d-none">
                <a href="bantuan?h=catatankaki" class="a-none"><h4 class="font-weight-bold mf36-f24 cl-kal1">Catatan kaki</h4></a>

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