<?php

include('display-function.php');
//Region Landing Statistics
$sumStat=rglandingstatistics_sum();
$jawStat=rglandingstatistics_jaw();
$kalStat=rglandingstatistics_kal();
$sulStat=rglandingstatistics_sul();
$basStat=rglandingstatistics_bas();
$mapStat=rglandingstatistics_map();




$region_id=$_GET['r'];
$_GET['pos']='region';

$rgCodeList=array('aceh','sumaterautara','sumaterabarat','bengkulu','jambi','riau','kepulauanriau','sumateraselatan','bangkabelitung','lampung','banten','jawabarat','jakarta','jawatengah','jawatimur','yogyakarta','kalimantanbarat','kalimantantengah','kalimantanselatan','kalimantantimur','kalimantanutara','sulawesiutara','gorontalo','sulawesitengah','sulawesibarat','sulawesitenggara','sulawesiselatan','malukuutara','maluku','papuabarat','papua','bali','nusatenggarabarat','nusatenggaratimur');
$rgCode=array('ac','su','sb','be','ja','ri','kr','ss','bb','la','bt','jb','jk','jt','ji','yo','kb','kt','ks','ki','ku','sa','go','st','sr','sg','sn','mu','ma','pb','pa','ba','nb','nt');

if(in_array($region_id, $rgCodeList)){
    $i=0;
    $codeArray=array();
    foreach($rgCode as $code){
        $linkcode=$rgCodeList[$i];
        $codeArray+=array($code => $linkcode);
        $i++;
    }
    //Return isocode
    $isocode=array_search($region_id, $codeArray);
    
    $logoalt=rgview_logoalt($isocode);
    $logo=rgview_logo($isocode);
    $namaprov=rgview_namaprov($isocode);
    $tablefetch=rgview_tablefetch($isocode);
    $maininfo=rgview_maininfo($isocode);
    $faktamenarik=rgview_faktamenarik($isocode);
    $activecase=rgview_activecase($isocode);
    $activecase_id=rgview_activecase_id($isocode);
    $recoveryrate=rgview_recoveryrate($isocode);
    $recoveryrate_id=rgview_recoveryrate_id($isocode);
    $deathrate=rgview_deathrate($isocode);
    $deathrate_id=rgview_deathrate_id($isocode);
    $lchart0=rgview_lchart_sm($isocode,c0);
    $lcharts0=rgview_lcharts_sm($isocode,c0);
    $bchart0=rgview_bchart_sm($isocode,c0);
    $bcharts0=rgview_bcharts_sm($isocode,c0);
    $cdate0=rgview_cdate_sm($isocode,c0);
    $lchart1=rgview_lchart_lg($isocode,c1);
    $lcharts1=rgview_lcharts_lg($isocode,c1);
    $bchart1=rgview_bchart_lg($isocode,c1);
    $bcharts1=rgview_bcharts_lg($isocode,c1);
    $cdate1=rgview_cdate_lg($isocode,c1);
    $heatmap1=rgview_heatmap($isocode,c1);
    $lchart2=rgview_lchart_lg($isocode,c2);
    $lcharts2=rgview_lcharts_lg($isocode,c2);
    $bchart2=rgview_bchart_lg($isocode,c2);
    $bcharts2=rgview_bcharts_lg($isocode,c2);
    $cdate2=rgview_cdate_lg($isocode,c2);
    $heatmap2=rgview_heatmap($isocode,c2);
    $lchart3=rgview_lchart_lg($isocode,c3);
    $lcharts3=rgview_lcharts_lg($isocode,c3);
    $bchart3=rgview_bchart_lg($isocode,c3);
    $bcharts3=rgview_bcharts_lg($isocode,c3);
    $cdate3=rgview_cdate_lg($isocode,c3);
    $heatmap3=rgview_heatmap($isocode,c3);
    //$footnotesrg=help_footnotes_regview($isocode);
    $help=rgview_help($isocode);
    $mincase=rgview_mincase($isocode);
    $maxcase=rgview_maxcase($isocode);
    $maphsl=rgview_mapshsl($isocode);

    $desc=metadesccustom($maininfo['t'], $maininfo['td'], $maininfo['tr']);
}


if($region_id=='aceh'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='sumaterautara'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='sumaterabarat'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='bengkulu'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='jambi'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='riau'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='kepulauanriau'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='sumateraselatan'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='bangkabelitung'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='lampung'){
    $path='sumatera.php';
    require($path);
}else if($region_id=='banten'){
    $path='jawa.php';
    require($path);
}else if($region_id=='jawabarat'){
    $path='jawa.php';
    require($path);
}else if($region_id=='jakarta'){
    $path='jawa.php';
    require($path);
}else if($region_id=='jawatengah'){
    $path='jawa.php';
    require($path);
}else if($region_id=='jawatimur'){
    $path='jawa.php';
    require($path);
}else if($region_id=='yogyakarta'){
    $path='jawa.php';
    require($path);
}else if($region_id=='kalimantanbarat'){
    $path='kalimantan.php';
    require($path);
}else if($region_id=='kalimantantengah'){
    $path='kalimantan.php';
    require($path);
}else if($region_id=='kalimantanselatan'){
    $path='kalimantan.php';
    require($path);
}else if($region_id=='kalimantantimur'){
    $path='kalimantan.php';
    require($path);
}else if($region_id=='kalimantanutara'){
    $path='kalimantan.php';
    require($path);
}else if($region_id=='sulawesiutara'){
    $path='sulawesi.php';
    require($path);
}else if($region_id=='gorontalo'){
    $path='sulawesi.php';
    require($path);
}else if($region_id=='sulawesitengah'){
    $path='sulawesi.php';
    require($path);
}else if($region_id=='sulawesibarat'){
    $path='sulawesi.php';
    require($path);
}else if($region_id=='sulawesitenggara'){
    $path='sulawesi.php';
    require($path);
}else if($region_id=='sulawesiselatan'){
    $path='sulawesi.php';
    require($path);
}else if($region_id=='malukuutara'){
    $path='malukupapua.php';
    require($path);
}else if($region_id=='maluku'){
    $path='malukupapua.php';
    require($path);
}else if($region_id=='papuabarat'){
    $path='malukupapua.php';
    require($path);
}else if($region_id=='papua'){
    $path='malukupapua.php';
    require($path);
}else if($region_id=='bali'){
    $path='balinusatenggara.php';
    require($path);
}else if($region_id=='nusatenggarabarat'){
    $path='balinusatenggara.php';
    require($path);
}else if($region_id=='nusatenggaratimur'){
    $path='balinusatenggara.php';
    require($path);
}else{
    require('regional-view.php');
}


?>
