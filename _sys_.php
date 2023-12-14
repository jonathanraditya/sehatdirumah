<?php


set_time_limit(0);

$link=$_GET['u'];

require('function.php');

if($link=='rdu'){
    echo rankDynamicUpdate();
}else if($link=='rsu'){
    echo rankStaticUpdate();
}else if($link=='ltu'){
    echo landingTableUpdate();
}else if($link=='rvu'){
    echo rgViewUpdate();
}else if($link=='rruu'){
    echo rgRankUrutanUpdate();
}else if($link=='rlu'){
    echo rgLandingUpdate();
}else if($link=='rdvu'){
    echo rgDatavisUpdate();
}else if($link=='lmu'){
    echo landingMapsUpdate();
}else if($link=='lm2u'){
    echo landingMaps2Update();
}else if($link=='clmisu'){//
    echo storeCachedData(cacheLandingMapsInfoScript, mapsinfoscript);
}else if($link=='clmdsu'){
    echo storeCachedData(cacheLandingMapsDisplayScript, mapsdisplayscript);
}else if($link=='cltu'){
    echo cacheLandingTable();
}else if($link=='sru'){
    include_once('sitemap.php');
}else if($link=='whodata'){
    include_once('_sys_whodata.php');
}else if($link=='cljau'){
    echo cacheLandingJarakAman();
}else if($link=='clbrcu'){
    echo cacheLandingBebasRsCss();
}else if($link=='clksju'){
    echo cacheLandingKasusSatuJuta();
}else if($link=='cc'){
    //The name of the folder
    $folder='/caching/*.php';
    //Get a list of all the file names in the folder
    $files=glob('caching/*.php');
    //Loop through the file in the list
    foreach($files as $file){
        //Make sure that this is a file and not a directory
        if(is_file($file)){
            //Use the unlink function to delete the file
            unlink($file);
        }
    }
}

?>