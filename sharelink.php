<?php

//include_once('connect.php');
//include_once('function.php');

$url=$_GET['currentURL'];
$title=$_GET['title'];
$description=$_GET['desc'];

//$get=&$url;
//$getTitle=getData(meta,$url, full_link, title);
//$getDesc=getData(meta,$url, full_link, description);
//if($getTitle==null){
//    $trim=substr($get, 0, -3);
//    $uniq=&$trim;
//    $trimR=str_replace('&amp;', "", $uniq);
//    $getTitle=getData(meta,$trimR, full_link, title);
    //$getDesc=getData(meta,$url, full_link, description);
//}

$plainText='*'.$title.'* %0a%0a'.$description.' %0a%0aKunjungi : '.$url.'%0a%0a#SehatdiRumah #KitaBisa';
$encodedText=$plainText;




echo '

<script>
        //function changeText(){
        //    var elem=document.getElementById("sharebagikankewa");
        //    elem.innerHTML="Membuka WhatsApp...1";
        //}
        
        
        function shareClicked(buttontype,buttonid){
            var targetbt=document.getElementById(buttonid);
            var datatype=buttontype;
            if(datatype==="copylink"){
                targetbt.innerHTML="<i>Tautan disalin!</i>";
            }else{
                targetbt.innerHTML="<i>Membuka WhatsApp...</i>";
            }
        }
        //function copyBtn(){
            //var copyText=document.getElementById("copy-sharevalue");
            //var copyText=document.getElementById("copy-sharevalue");
            //var whatsappMessage=window.encodeURIComponent(copyText);
            //copyText.select();
            //copyText.setSelectionRange(0,99999);
            //document.execCommand("copy");
        //}

        function copyToClipboard(element){
            var $temp=$("<textarea>");
            var brRegex=/<br\s*[\/]?>/gi;
            $("body").append($temp);
            $temp.val($(element).html().replace(brRegex,"\r\n")).select();
            document.execCommand("copy");
            $temp.remove();
        }
        

</script>
<button type="button" class="close" data-dismiss="modal">X</button>
<img padding="margin-top:50px;" src="img/asset/sharinglove.svg" alt="bagikan cinta dan kehangatan kepada Indonesia di tengah pandemi ini">

<h1 style="margin-top:35px;" class="mf32-f24 font-weight-bold"><span class="cl-aqua-forest">Bagikan </span><span class="cl-tangerine">Tautan</span></h1>

<div class="mf24-f16">Agar semakin banyak orang yang percaya bahwa kita sebagai 1 bangsa mampu melewati pandemi ini</div>

<div class="mf24-f16" style="margin-top:40px;"><b>Halaman saat ini :</b></div>
<div class="font-weight-bold mf24-f16"><u><i>'.$title.'</i></u></div>
<div class="mf24-f16">'.$description.'</div>

<er style="display:none;" id="sehatdirumahcomcaption">*'.$title.'* &#10;&#13;'.$description.' &#10;&#13;Kunjungi : '.$url.'&#10;&#13;#SehatdiRumah #KitaBisa</er>

<div style="margin:30px 0px;" onclick="shareClicked(\'copylink\',\'sharesalintautan\');copyToClipboard(\'er#sehatdirumahcomcaption\')" class="click-point">
<span>
<span class="align-items-center" style="padding:15px 25px; border-radius:10px; border:2px solid #979797;">
<img src="img/asset/sharelink.svg" alt="salin tautan pada halaman ini">
<span style="margin-left:5px; color:#979797;" class="mf24-f16 font-weight-bold" id="sharesalintautan">Salin tautan halaman ini</span>
</span>
</span>
</div>



<div style="padding:30px 0px;"onclick="shareClicked(\'sharewa\',\'sharebagikankewa\');copyToClipboard(\'er#sehatdirumahcomcaption\')" class="click-point">
<a href="whatsapp://send?text='.$encodedText.'" class="a-none">
<span class="align-items-center" style="padding:15px 25px; border-radius:10px; border:2px solid #6BAB79;">
<img src="img/asset/shareonwa.svg" alt="bagikan tautan di platform whatsapp">
<span class="mf24-f16 cl-aqua-forest font-weight-bold" style="margin-left:5px;" id="sharebagikankewa">Bagikan ke WhatsApp</span>
</span>
</a>
</div>

<!--<div onclick="changeText()">Ganti di atas</div>
<div onclick="shareClicked(\'sharewa\',\'sharebagikankewa\');copyBtn()">WA</div>
<div onclick="shareClicked(\'copylink\',\'sharesalintautan\');copyBtn()">Copy</div>
<button onclick="copyBtn()">Copy Text</button>
<a onclick="copyBtn()">Copy Text</a>-->

';


?>

