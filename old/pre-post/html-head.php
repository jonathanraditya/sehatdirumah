<?php
/*function absolute_include($file) {
     /*
     $file is the file url relative to the root of your site.
     Yourdomain.com/folder/file.inc would be passed as
     "folder/file.inc"
     */

     /*$folder_depth = substr_count($_SERVER["PHP_SELF"] , "/");

     if($folder_depth == false)
        $folder_depth = 1;
    
    
}*/

function fdreal($url){
    $hasil ="";
    $jmlback = substr_count($_SERVER["PHP_SELF"] , "/");
    $minus = intval($jmlback);
    for($i=1; $i<$minus; $i++){
        $hasil .=  "../";
    }
    $hasil .= "$url";
    return strval($hasil);
}

$lang_assign = strval(fdreal("main-nav-scrolldown.js"));

//include(fdreal("main-nav-scrolldown.js"));

$mainNavScrolldown = fdreal("main-nav-scrolldown.js");
$navStyleCss = fdreal('nav-style.css');
$navscript = fdreal("navscript.js");
$stylesheetbeta = fdreal('stylesheetbeta.css');

echo "";
echo "<title>".$dp['title']."</title>";
echo "<link rel='icon' type='image/ico' href='".$dp['nav_t_icon']."'>";
echo "<link href='https://fonts.googleapis.com/css?family=Alegreya:400,700|Istok+Web:400,700|Lato:400,700&display=swap' rel='stylesheet'>";
echo "<meta name='theme-color' content='#000000'>";
echo "<!--BOOTSTRAP COMPONENT-->";
echo "<!-- Latest compiled and minified CSS -->";
echo "<link rel=stylesheet href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>";
echo "<!-- jQuery library -->";
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>";
echo "<!-- Popper JS -->";
echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>";
echo "<!-- Latest compiled JavaScript -->";
echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>";
echo "<!--END OF BOOTSTRAP COMPONENT-->";
echo "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
echo "<link href='$stylesheetbeta' rel='stylesheet'>";
echo "<link rel='stylesheet' href='$navStyleCss'>";
echo  "<script src='$navscript'></script>";
echo  "<script src='$mainNavScrolldown'></script>";

?>
