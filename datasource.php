<?php

// define the path and name of cached file
	$cachefile = 'caching/sumberdata'.date('M-d-Y').'.php';
	// define how long we want to keep the file in seconds. I set mine to 5 hours.
	$cachetime = 18000;
	// Check if the cached file is still fresh. If it is, serve it up and exit.
	if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
   	include($cachefile);
    	exit;
	}
	// if there is either no file OR the file to too old, render the page and capture the HTML.
	ob_start();

//$pos='region';
//include('display-function.php');

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <?php include_once('def-top-header.html') ?>
    <meta name="description" content="<?php metadesc() ?>">
    <meta name="viewport" content="width=800px, user-scalable=no">
    <title><?php metatitle() ?></title>
    <link rel="stylesheet" href="style-endnotes.min.css">
    <link rel="stylesheet" href="style-mobile-responsive.min.css">
    <style>
        .loader{
            position:fixed;
            z-index:9999;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(255,255,255,0.9);
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
    <div class="container container95">
        <!--Navigation Bar-->
        <?php include_once('static-navigation.html') ?>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-5 mt100">
                <img src="img/asset/endnotes/datasource.svg" alt="sumber data situs sehatdirumah.com">
                <h1 class="mf72-f48 font-weight-bold mb30 mt30">
                    <span class="cl-aqua-forest">Sumber </span>
                    <span class="cl-tangerine">Data</span>
                </h1>
                <p>Dalam upaya kami menyampaikan data ke publik, kami selalu menggunakan prinsip kehati-hatian dan kepercayaan, tak terkecuali dalam hal sumber informasi.</p>
                <p>Kami berterima kasih atas segala semangat dan misi yang ingin disampaikan oleh internet, yakni keterbukaan, yang diikuti oleh semua pihak, khususnya sumber-sumber terpercaya yang dengan senang hati memberikan hasil publikasinya di internet, dan dapat digunakan secara bebas bertanggung jawab.</p>
                <p>Semoga keterbukaan ini memberi manfaat untuk kita semua.</p>
                <footer>
                    <div class="font-weight-bold mf26-f18">
                        <span class="cl-aqua-forest">sehat</span>
                        <span class="cl-tangerine">dirumah</span>
                        <span>.com</span>
                    </div>
                    <div class="font-italic mf26-f18">
                        <span class="cl-aqua-forest">pahami, mengerti, </span>
                        <span class="cl-tangerine">antisipasi.</span>
                    </div>
                </footer>
                <div class="row justify-content-left mt40">
                    <style>
                        .about-item-active{
                            padding:10px 15px;
                            background-color:#f38500;
                            color:white;
                            font-weight:bold;
                            display:block;
                            margin:5px 0px;
                        }
                        .about-item-passive{
                            padding:10px 15px;
                            background-color:#6bab79;
                            color:white;
                            display:block;
                            margin:5px 0px;
                        }
                        .about-item-passive:hover{
                            padding:10px 15px;
                            background-color:#55815F;
                            color:white;
                        }
                        .about-item-active:hover{
                            padding:10px 15px;
                            background-color:#D27300;
                            color:white;
                        }
                    </style>
                    <div class="row">
                        <a href="bantuan?h=catatankaki" class="f16 about-item-passive a-none">Catatan Kaki</a>
                        <a href="bantuan?h=sumberdata" class="f16 about-item-active a-none">Sumber Data</a>
                        <a href="bantuan?h=menjadimitra" class="f16 about-item-passive a-none">Menjadi Mitra</a>
                        <a href="bantuan?h=berikoreksi" class="f16 about-item-passive a-none">Beri Koreksi</a>
                        <a href="bantuan?h=tentangkami" class="f16 about-item-passive a-none">Tentang Kami</a>
                        <a href="bantuan?h=atributhakcipta" class="f16 about-item-passive a-none">Atribut Hak Cipta</a>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-5 mt100">
                <h2 class="font-weight-bold mf48-f32">
                    <span class="cl-aqua-forest">Daftar </span>
                    <span class="cl-tangerine">Sumber Data</span>
                </h2>
                <!--Datasource list-->
                <?php datasource() ?>
                

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