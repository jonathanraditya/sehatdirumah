<?php


$view=$_GET['v'];
$dateOffset=$_GET['o'];
include('display-function.php');


$tableList=array('jarak1pasienpositifcorona','bebanrumahsakit','waktumenujurs','dokterper1pasienaktif','perawatper1pasienaktif','totalkasus','pertambahankasusharian','totalkematian','pertambahankematian','totalsembuh','pertambahankesembuhan','tingkatkesembuhan','tingkatkematian','kasusper1jutapenduduk','persenpertambahankematian','persenpertambahankesembuhan','persenpertambahankasus','persenkasusaktif','kesembuhanperkematian','jumlahpenduduk','luaswilayah','jumlahdokter','jumlahperawat','jumlahrumahsakit','rasiotempattidur','jumlahtempattidur','rasioketerisiantempattidur');

$dynamicList=array('jarak1pasienpositifcorona','bebanrumahsakit','dokterper1pasienaktif','perawatper1pasienaktif','totalkasus','pertambahankasusharian','totalkematian','pertambahankematian','totalsembuh','pertambahankesembuhan','tingkatkesembuhan','tingkatkematian','kasusper1jutapenduduk','persenpertambahankematian','persenpertambahankesembuhan','persenpertambahankasus','persenkasusaktif','kesembuhanperkematian');

$tableDynamic=array('rank_jarak1pasien','rank_bebanrs','rank_dokterpasien','rank_perawatpasien','rank_totalkasus','rank_pertambahankasus','rank_kematian','rank_pertambahankematian','rank_sembuh','rank_pertambahansembuh','rank_tingkatsembuh','rank_tingkatkematian','rank_kasusper1juta','rank_perstambahkematian','rank_perstambahsembuh','rank_perstambahkasus','rank_perskasusaktif','rank_sembuhmeninggal');

$staticList=array('jumlahpenduduk','luaswilayah','jumlahdokter','jumlahperawat','jumlahrumahsakit','rasiotempattidur','jumlahtempattidur','rasioketerisiantempattidur','waktumenujurs');

$tableStatic=array('jml_penduduk','luas_wilayah','jumlah_dokter','jumlah_perawat','jumlah_rs','rasio_tempat_tidur','jumlah_tempat_tidur','bor','waktu_rs');


if(in_array($view, $tableList)){
    //Static
    if(in_array($view, $staticList)){
        
        $tableArray=array();
        $i=0;
        foreach($tableStatic as $table){
            $tableArray+=array($table => $staticList[$i]);
            $i++;
        }
        $table=array_search($view, $tableArray);
        //echo $table;
        $dateview='<span></span>';
        $link=rankv_link($table, 'st');
        $datestatus='<span></span>';
        $img=rankv_image($table, 'st');
        $headline=rankv_headline($table, 'st');
        $tablefetch=rankv_tablefetch($table, 'st', 0);
        $footnotes=help_footnotes_rankview($table, 'st');
        
        require('reg-rank-view.php');
    }else if(in_array($view, $dynamicList)){
        
        $tableArray=array();
        $i=0;
        foreach($tableDynamic as $table){
            $tableArray+=array($table => $dynamicList[$i]);
            $i++;
        }
        $table=array_search($view, $tableArray);
        
        if(!isset($_GET['o']) or $_GET['o']>=10){
            $dateOffset=0;
        }
        //echo $table;
        $dateview=rankv_dateview($dateOffset);
        $link=rankv_link($table, 'dy');
        $datestatus=rankv_datestatus($dateOffset, $link);
        $img=rankv_image($table, 'dy');
        $headline=rankv_headline($table, 'dy');
        $tablefetch=rankv_tablefetch($table, 'dy', $dateOffset);
        $footnotes=help_footnotes_rankview($table, 'dy');
        
        
        require('reg-rank-view.php');
    }else{
        
    }
}else{
    require('regional-rank.php');
}





?>