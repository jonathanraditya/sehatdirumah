<?php
// At start of script
//$time_start = microtime(true); 

//include('connect.php');
function getLastDate(){
    include('connect.php');
    $cases_query=$con->query("select * from cases");
    $tanggal=array();
    while($row=$cases_query->fetch_assoc()){
        array_push($tanggal, $row['tanggal']);
    }
    $last_date=max($tanggal);
    return $last_date;
}
function getLastDateWHO(){
    include('connect.php');
    $cases_query=$con->query("select * from cases_who");
    $tanggal=array();
    while($row=$cases_query->fetch_assoc()){
        array_push($tanggal, $row['Date_reported']);
    }
    $last_date=max($tanggal);
    return $last_date;
}
function connect(){
    $user = "u5256001_admin";
    $password = "12345678901324354657687980";
    $database = "u5256001_sehat_dirumah";
    $con = mysqli_connect('localhost', $user, $password);
        
    if(!$con){
        echo 'gak berhasil konek ke server :(';
    }
    if(!mysqli_select_db($con,"u5256001_sehat_dirumah")){
        echo 'Database Tidak Ada';
    }
}
function dateEdit($current, $offset){
    $date_offset="-".$offset." day";
    $dateTime=new DateTime($current);
    $dateTime->modify($date_offset);
    $modified=$dateTime->format('Y-m-d');
    return $modified;
}
function dateMD($date){
    $dateTime=new DateTime($date);
    return $dateTime->format('j/n');
}
function noZero($array){
    if($array<='0'||is_nan($array)){
        return FALSE;
    } else{
        return TRUE;
    }
}
function deleteZeroNeg($array){
    return array_filter($array, "noZero");
}
function onlyZeroFilter($array){
    if($array=='0'){
        return TRUE;
    } else{
        return FALSE;
    }
}
function onlyZero($array){
    return array_filter($array, "onlyZeroFilter");
}
//Function caseVal
//Required function: dateEdit Function
//Input : 
//isoCode (id,wl,ac,etc)
//dataParam (0=total case, 1=recovered, 2=death)
//lastDate (in Y-m-d, result YYYY-mm-dd)
function caseVal($isoCode_, $dataParam_, $lastDate_, $dateOffset_){
    include ('connect.php');
    if($dataParam_=='t'){
        $icode=$isoCode_."_t";
    } else if($dataParam_=='tr'){
        $icode=$isoCode_."_tr";
    } else if($dataParam_=='td'){
        $icode=$isoCode_."_td";
    }
    $dateEdit=dateEdit($lastDate_, $dateOffset_);
    $cases_query=$con->query("select * from cases where tanggal='$dateEdit'");
    while($row=$cases_query->fetch_assoc()){
        $result=$row[$icode];
    }
    return $result;
}
function hslVal($hue1,$sa1,$li1,$hue2,$sa2,$li2,$coloridx){
    //for hue
    $hueRange=($hue2-$hue1)/100; //biar bisa jadi persen
    $hueHasil=array();
    for($i=0; $i<=100; $i++){
        $hue3=$hue1+($i*$hueRange);
        $roundedHue=round($hue3,0);
        array_push($hueHasil,$roundedHue);
    }
    //for saturation
    $saRange=($sa2-$sa1)/100; //biar bisa jadi persen
    $saHasil=array();
    for($j=0; $j<=100; $j++){
        $sa3=$sa1+($j*$saRange);
        $roundedSa=round($sa3,0);
        array_push($saHasil,$roundedSa);
    }
    //for lightness
    $liRange=($li2-$li1)/100; //biar bisa jadi persen
    $liHasil=array();
    for($k=0; $k<=100; $k++){
        $li3=$li1+($k*$liRange);
        $roundedLi=round($li3,0);
        array_push($liHasil,$roundedLi);
    }
    //Hasil
    $hslHasil=array();
    for($l=0;$l<=100; $l++){
        $hasilAkhir='hsl('.$hueHasil[$l].','.$saHasil[$l].'%,'.$liHasil[$l].'%)';
        array_push($hslHasil,$hasilAkhir);
    }
    return $hslHasil[$coloridx];
}
function percRank($array, $currentValue){
    $counter_below = count(
        array_filter(
            $array, function($value) use ($currentValue) {
                return $value <= $currentValue;
            }
        )
    );
    $count=count($array);
    $rank=round(($counter_below/$count)*100,0);
    return $rank;
}
function hslGradientSpecificData($isoCode,$dataParam,$lastDate,$dateOffset,$dayRange,$hue1,$sa1,$li1,$hue2,$sa2,$li2){
    $resultArray=array();
    $resultHsl=array();
    for($i=1; $i<=$dayRange; $i++){
        $dateLoop_day=$dayRange+$dateOffset-$i;
        $dateLoop_prev=$dayRange+$dateOffset-$i+1;
        $result_day=caseVal($isoCode, $dataParam, $lastDate, $dateLoop_day);
        $result_prev=caseVal($isoCode, $dataParam, $lastDate, $dateLoop_prev);
        $increment=round(($result_day-$result_prev)/$result_prev*100,2);
        array_push($resultArray, $increment);
    }
    $loop=$resultArray;
    foreach($resultArray as $data){
        $percentile=percRank($loop, $data);
        $hslValue=hslVal($hue1,$sa1,$li1,$hue2,$sa2,$li2,$percentile);
        array_push($resultHsl, $hslValue);
    }    
    return $resultHsl;
}
function getCode($param){
    $result=array();
    include('connect.php');
    if($param=='rg'){
        $database='isocode_rg';
    } else if($param=='gl'){
        $database='isocode';
    }
    $isocode_query=$con->query("select * from $database");
    while($row=$isocode_query->fetch_assoc()){
        array_push($result,$row['iscode']);
    }
    return $result;
}
function hslGradientSpecificDate($scope,$dataParam,$lastDate,$dateOffset,$hue1,$sa1,$li1,$hue2,$sa2,$li2){
    $resultArray=array();
    $resultHsl=array();
    $resultCode=array();
    $isocode=getCode($scope);
    foreach($isocode as $code){
        $result=caseVal($code, $dataParam, $lastDate,$dateOffset);
        $resultArray+=array($code => $result);
        //array_push($resultArray,$result);
    }
    foreach($resultArray as $cd => $data){
        $percentile=percRank($resultArray, $data);
        $hslValue=hslVal($hue1,$sa1,$li1,$hue2,$sa2,$li2,$percentile);
        //array_push($resultHsl, $hslValue);
        //array_push($resultCode, $cd);
        $rs=$rs.'#id-'.$cd.'{fill:'.$hslValue.';}';
    }    
    return $rs;
}
function minValue($scope,$dataParam,$lastDate,$dateOffset){
    $resultArray=array();
    $isocode=getCode($scope);
    foreach($isocode as $code){
        $result=caseVal($code, $dataParam, $lastDate,$dateOffset);
        array_push($resultArray,$result);
    }
    $minValue=min($resultArray);
    return $minValue;
}
function maxValue($scope,$dataParam,$lastDate,$dateOffset){
    $resultArray=array();
    $isocode=getCode($scope);
    foreach($isocode as $code){
        $result=caseVal($code, $dataParam, $lastDate,$dateOffset);
        array_push($resultArray,$result);
    }
    $maxValue=max($resultArray);
    return $maxValue;
}
function landingMapsUpdate(){
    $result='Update landing_maps';
    $scope='rg';
    $dataParam='t';
    $realtimeDate=getLastDate();
    $lastDate=dateEdit($realtimeDate,1);
    $dateOffset=0;
    //HSL1
    $hue1="133";
    $sa1='28';
    $li1='55';
    //HSL2
    $hue2='33';
    $sa2='100';
    $li2='48';
    
    //FetchingData
    $fetchHsl=hslGradientSpecificDate($scope,$dataParam,$lastDate,$dateOffset,$hue1,$sa1,$li1,$hue2,$sa2,$li2);
    $fetchMinValue=minValue($scope,$dataParam,$lastDate,$dateOffset);
    $fetchMaxValue=maxValue($scope,$dataParam,$lastDate,$dateOffset);
    
    //Updating Data
    $update=updateData(landing_maps, rg,isocode, $fetchHsl, hsl_array);
    $result=$result.'<br>HSL '.$update;
    $update=updateData(landing_maps, rg,isocode, $fetchMinValue, min_val);
    $result=$result.'<br>Min Value '.$update;
    $update=updateData(landing_maps, rg,isocode, $fetchMaxValue, max_val);
    $result=$result.'<br>Max Value '.$update;
    return $result;
}
function arrayEncodeDelimiter($array){
    $result=implode("|",$array);
    return $result;
}
function arrayDecodeDelimiter($array){
    $result=explode("|",$array);
    return $result;
}
function arrayEncodeDelimiter2($string){
    $result=str_replace("'","$",$string);
    return $result;
}
function arrayDecodeDelimiter2($string){
    $result=str_replace("$","'",$string);
    return $result;
}
function getData($tableName, $key, $columnKey, $column){
    include ('connect.php');
    $cases_query=$con->query("select * from $tableName where $columnKey='$key'");
    while($row=$cases_query->fetch_assoc()){
        $result=$row[$column];
    }
    return $result;
}
function jarakSatuPasien($isocode, $date){
    //Getting Data
    $luasWilayah=getData(kes_demografi, $isocode, isocode, luas_wilayah);
    $cases=$isocode."_t";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $jaraksatupasien=round(($luasWilayah/(3.14*$kasusTerakhir))**(0.5),2);
    return $jaraksatupasien;
}
function dokterPasien($isocode, $date){
    $jumlahDokter=getData(kes_demografi, $isocode, isocode, jumlah_dokter);
    $bor=getData(kes_demografi, $isocode, isocode, bor);
    $jml_tempattidur=getData(kes_demografi, $isocode, isocode, jumlah_tempat_tidur);
    $cases=$isocode."_t";
    $recovery=$isocode."_tr";
    $death=$isocode."_td";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $kasusAktif=$kasusTerakhir-$recoveryTerakhir-$deathTerakhir;
    $kapasitasRS=((100-$bor)/100)*$jml_tempattidur-$kasusAktif;
    $dokterPerPasien=round($jumlahDokter/($jml_tempattidur-$kapasitasRS),2);
    return $dokterPerPasien;
}
function perawatPasien($isocode, $date){
    $jumlahPerawat=getData(kes_demografi, $isocode, isocode, jumlah_perawat);
    $bor=getData(kes_demografi, $isocode, isocode, bor);
    $jml_tempattidur=getData(kes_demografi, $isocode, isocode, jumlah_tempat_tidur);
    $cases=$isocode."_t";
    $recovery=$isocode."_tr";
    $death=$isocode."_td";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $kasusAktif=$kasusTerakhir-$recoveryTerakhir-$deathTerakhir;
    $kapasitasRS=((100-$bor)/100)*$jml_tempattidur-$kasusAktif;
    $dokterPerPerawat=round($jumlahPerawat/($jml_tempattidur-$kapasitasRS),2);
    return $dokterPerPerawat;
}
function totalKasus($isocode, $date){
    $cases=$isocode."_t";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    return $kasusTerakhir;
}
function totalKasusWHO($isocode, $date){
    $cases=$isocode."_t";
    $kasusTerakhir=getData(cases_who, $date, Date_reported, $cases);
    return $kasusTerakhir;
}
function pertambahanKasus($isocode, $date){
    $cases=$isocode."_t";
    $datePrev=dateEdit($date, 1);
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $kasusSebelumnya=getData(cases, $datePrev, tanggal, $cases);
    $pertambahanKasus=$kasusTerakhir-$kasusSebelumnya;
    return $pertambahanKasus;
}
function pertambahanKasusWHO($isocode, $date){
    $cases=$isocode."_t";
    $datePrev=dateEdit($date, 1);
    $kasusTerakhir=getData(cases_who, $date, Date_reported, $cases);
    $kasusSebelumnya=getData(cases_who, $datePrev, Date_reported, $cases);
    $pertambahanKasus=$kasusTerakhir-$kasusSebelumnya;
    return $pertambahanKasus;
}
function kematian($isocode, $date){
    $death=$isocode."_td";
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    return $deathTerakhir;
}
function kematianWHO($isocode, $date){
    $death=$isocode."_td";
    $deathTerakhir=getData(cases_who, $date, Date_reported, $death);
    return $deathTerakhir;
}
function pertambahanKematian($isocode, $date){
    $death=$isocode."_td";
    $datePrev=dateEdit($date, 1);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $deathSebelumnya=getData(cases,$datePrev,tanggal,$death);
    $pertambahanKematian=$deathTerakhir-$deathSebelumnya;
    return $pertambahanKematian;
}
function pertambahanKematianWHO($isocode, $date){
    $death=$isocode."_td";
    $datePrev=dateEdit($date, 1);
    $deathTerakhir=getData(cases_who, $date, Date_reported, $death);
    $deathSebelumnya=getData(cases_who,$datePrev,Date_reported,$death);
    $pertambahanKematian=$deathTerakhir-$deathSebelumnya;
    return $pertambahanKematian;
}
function sembuh($isocode, $date){
    $recovery=$isocode."_tr";
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    return $recoveryTerakhir;
}
function sembuhWHO($isocode, $date){
    $recovery=$isocode."_tr";
    $recoveryTerakhir=getData(cases_who, $date, Date_reported, $recovery);
    return $recoveryTerakhir;
}
function pertambahanSembuh($isocode, $date){
    $recovery=$isocode."_tr";
    $datePrev=dateEdit($date, 1);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $recoverySebelumnya=getData(cases, $datePrev, tanggal, $recovery);
    $pertambahanSembuh=$recoveryTerakhir-$recoverySebelumnya;
    return $pertambahanSembuh;
}
function pertambahanSembuhWHO($isocode, $date){
    $recovery=$isocode."_tr";
    $datePrev=dateEdit($date, 1);
    $recoveryTerakhir=getData(cases_who, $date, Date_reported, $recovery);
    $recoverySebelumnya=getData(cases_who, $datePrev, Date_reported, $recovery);
    $pertambahanSembuh=$recoveryTerakhir-$recoverySebelumnya;
    return $pertambahanSembuh;
}
function tingkatSembuh($isocode, $date){
    $cases=$isocode."_t";
    $recovery=$isocode."_tr";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $tingkatSembuh=round($recoveryTerakhir/$kasusTerakhir*100,2);
    return $tingkatSembuh;
}
function tingkatKematian($isocode, $date){
    $cases=$isocode."_t";
    $death=$isocode."_td";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $tingkatKematian=round($deathTerakhir/$kasusTerakhir*100,2);
    return $tingkatKematian;
}
function kasusSatuJuta($isocode, $date){
    $cases=$isocode."_t";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $jumlahPenduduk=getData(kes_demografi, $isocode, isocode, jml_penduduk);
    $kasusPerSatuJuta=round($kasusTerakhir/$jumlahPenduduk*1000000,2);
    return $kasusPerSatuJuta;
}
function persenTambahKematian($isocode, $date){
    $death=$isocode."_td";
    $datePrev=dateEdit($date, 1);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $deathSebelumnya=getData(cases,$datePrev,tanggal,$death);
    $persenTambahKematian=round(($deathTerakhir-$deathSebelumnya)/$deathSebelumnya*100,2);
    if(is_nan($persenTambahKematian) or is_infinite($persenTambahKematian)){
        $persenTambahKematian=0;
    }
    return $persenTambahKematian;
}
function persenTambahSembuh($isocode, $date){
    $recovery=$isocode."_tr";
    $datePrev=dateEdit($date, 1);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $recoverySebelumnya=getData(cases, $datePrev, tanggal, $recovery);
    $persenTambahSembuh=round(($recoveryTerakhir-$recoverySebelumnya)/$recoverySebelumnya*100,2);
    if(is_nan($persenTambahSembuh) or is_infinite($persenTambahSembuh)){
        $persenTambahSembuh=0;
    }
    return $persenTambahSembuh;
}
function persenTambahKasus($isocode, $date){
    $cases=$isocode."_t";
    $datePrev=dateEdit($date, 1);
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $kasusSebelumnya=getData(cases, $datePrev, tanggal, $cases);
    $persenTambahKasus=round(($kasusTerakhir-$kasusSebelumnya)/$kasusSebelumnya*100,2);
    return $persenTambahKasus;
}
function persenKasusAktif($isocode, $date){
    $cases=$isocode."_t";
    $recovery=$isocode."_tr";
    $death=$isocode."_td";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $persenKasusAktif=round(($kasusTerakhir-$recoveryTerakhir-$deathTerakhir)/$kasusTerakhir*100,2);
    return $persenKasusAktif;
}
function sembuhMeninggal($isocode, $date){
    $recovery=$isocode."_tr";
    $death=$isocode."_td";
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $sembuhMeninggal=round($recoveryTerakhir/$deathTerakhir*100,2);
    if(is_nan($sembuhMeninggal) or is_infinite($sembuhMeninggal)){
        $sembuhMeninggal=0;
    }
    return $sembuhMeninggal;
}
function bebanRS($isocode, $date){
    //Getting data
    $bor=getData(kes_demografi, $isocode, isocode, bor);
    $jml_tempattidur=getData(kes_demografi, $isocode, isocode, jumlah_tempat_tidur);
    $cases=$isocode."_t";
    $recovery=$isocode."_tr";
    $death=$isocode."_td";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $kasusAktif=$kasusTerakhir-$recoveryTerakhir-$deathTerakhir;
    $kapasitasRS=((100-$bor)/100)*$jml_tempattidur-$kasusAktif;
    $loadFactor=round((1-($kapasitasRS/$jml_tempattidur))*100,2);
    return $loadFactor;
}
function kasusAktif($isocode, $date){
    $cases=$isocode."_t";
    $recovery=$isocode."_tr";
    $death=$isocode."_td";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $kasusAktif=$kasusTerakhir-$recoveryTerakhir-$deathTerakhir;
    return $kasusAktif;
}
function perIndonesia($isocode, $date, $function){
    $kasusIndonesia=$function(id,$date);
    $compare=$function($isocode, $date);
    $per=$compare."/".$kasusIndonesia;
    return $per;
}
function bedTerisi($isocode, $date){
    $bor=getData(kes_demografi, $isocode, isocode, bor);
    $jml_tempattidur=getData(kes_demografi, $isocode, isocode, jumlah_tempat_tidur);
    $kasusAktif=kasusAktif($isocode, $date);
    $kapasitasRS=((100-$bor)/100)*$jml_tempattidur-$kasusAktif;
    $bedTerisi=$jml_tempattidur-$kapasitasRS;
    return $bedTerisi;
}
function totalBed($isocode){
    $jml_tempattidur=getData(kes_demografi, $isocode, isocode, jumlah_tempat_tidur);
    return $jml_tempattidur;
}
function bedKosong($isocode, $date){
    $bor=getData(kes_demografi, $isocode, isocode, bor);
    $jml_tempattidur=getData(kes_demografi, $isocode, isocode, jumlah_tempat_tidur);
    $kasusAktif=kasusAktif($isocode, $date);
    $kapasitasRS=((100-$bor)/100)*$jml_tempattidur-$kasusAktif;
    return $kapasitasRS;
}
function kasusPersenIndonesia($isocode,$date){
    $kasusIndonesia=totalKasus(id,$date);
    $compare=totalKasus($isocode, $date);
    $per=$compare/$kasusIndonesia*100;
    return $per;
}
function kematianPersenIndonesia($isocode,$date){
    $kasusIndonesia=kematian(id,$date);
    $compare=kematian($isocode, $date);
    $per=$compare/$kasusIndonesia*100;
    return $per;
}
function sembuhPersenIndonesia($isocode,$date){
    $kasusIndonesia=sembuh(id,$date);
    $compare=sembuh($isocode, $date);
    $per=$compare/$kasusIndonesia*100;
    return $per;
}
function isocodeDynamicRanking($isocode, $date, $function){
    $code=getCode(rg);
    $arrayLast=array();
    foreach($code as $cd){
        $data=$function($cd, $date);
        $arrayLast+=array($cd => $data);
    }
    arsort($arrayLast);
    $keysLast=array_keys($arrayLast);
    $rankLast=array_search($isocode, $keysLast);
    return $rankLast+1;
}
function isocodeDynamicRankingASC($isocode, $date, $function){
    $code=getCode(rg);
    $arrayLast=array();
    foreach($code as $cd){
        $data=$function($cd, $date);
        $arrayLast+=array($cd => $data);
    }
    asort($arrayLast);
    $keysLast=array_keys($arrayLast);
    $rankLast=array_search($isocode, $keysLast);
    return $rankLast+1;
}
function isocodeStaticRanking($isocode, $column){
    $code=getCode(rg);
    $arrayLast=array();
    foreach($code as $cd){
        $data=getData(kes_demografi, $cd, isocode, $column);
        $arrayLast+=array($cd => $data);
    }
    asort($arrayLast);
    $keysLast=array_keys($arrayLast);
    $rankLast=array_search($isocode, $keysLast);
    return $rankLast+1;
}
function isocodeRankingStatus($isocode, $date, $function){
    $code=getCode(rg);
    $datePrev=dateEdit($date, 1);
    $arrayLast=array();
    $arrayPrev=array();
    foreach($code as $cd){
        $dataLast=$function($cd, $date);
        $dataPrev=$function($cd, $datePrev);
        $arrayLast+=array($cd => $dataLast);
        $arrayPrev+=array($cd => $dataPrev);
    }
    arsort($arrayLast);
    arsort($arrayPrev);
    $keysLast=array_keys($arrayLast);
    $keysPrev=array_keys($arrayPrev);
    $rankLast=array_search($isocode, $keysLast);
    $rankPrev=array_search($isocode, $keysPrev);
    $compare=comparison($rankLast, $rankPrev);
    return $compare;
}
function isocodeRankingStatusASC($isocode, $date, $function){
    $code=getCode(rg);
    $datePrev=dateEdit($date, 1);
    $arrayLast=array();
    $arrayPrev=array();
    foreach($code as $cd){
        $dataLast=$function($cd, $date);
        $dataPrev=$function($cd, $datePrev);
        $arrayLast+=array($cd => $dataLast);
        $arrayPrev+=array($cd => $dataPrev);
    }
    asort($arrayLast);
    asort($arrayPrev);
    $keysLast=array_keys($arrayLast);
    $keysPrev=array_keys($arrayPrev);
    $rankLast=array_search($isocode, $keysLast);
    $rankPrev=array_search($isocode, $keysPrev);
    $compare=comparison($rankLast, $rankPrev);
    return $compare;
}
function lgLine($isocode, $date, $colorHEX, $function){
    $x2=20;
    $bench=400;
    $normVal=100;
    $baseX=250;
    $data=array();
    $normalizedData=array();
    $yTrans=array();
    $yLine=array();
    $result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    $maxValue=max($data);
    $normalizeFactor=$maxValue/$normVal;
    //Converting to Normalized Value and Normalized Height
    foreach($data as $dt){
        $normalizedHeight=($dt/$normalizeFactor)/$normVal*$bench;
        array_push($normalizedData, $normalizedHeight);
    }
    //Calculating y Transformation axis
    for($i=0; $i<30; $i++){
        array_push($yTrans, $bench-$normalizedData[$i]);
    }
    //Calculating y line axis
    for($i=0; $i<29; $i++){
        array_push($yLine, $yTrans[$i+1]-$yTrans[$i]);
    }
    for($i=0; $i<29; $i++){
        $transX=$baseX+$x2*$i;
        $dataValue=$data[$i+1];
        $title='Total '.$dataValue;
        $lineFetch="<line x2='".$x2."' y2='".$yLine[$i]."' style='fill:none;stroke:#".$colorHEX."' transform='translate(".$transX." ".$yTrans[$i].")'></line>";
        $encode1=arrayEncodeDelimiter2($lineFetch);
        array_push($result,$encode1);
        //echo $encode1."<br>";
    }
    //Encode Result to storeable Data
    $encodedArray=arrayEncodeDelimiter($result);
    return $encodedArray;
}
function lgBar($isocode, $date, $colorHEX, $function, $chartNumber){
    $x2=20;
    $bench=400;
    $normVal=100;
    $baseX=250;
    $data=array();
    $normalizedData=array();
    $result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    $maxValue=max($data);
    $normalizeFactor=$maxValue/$normVal;
    //Converting to Normalized Value and Normalized Height
    foreach($data as $dt){
        $normalizedHeight=($dt/$normalizeFactor)/$normVal*$bench;
        array_push($normalizedData, $normalizedHeight);
    }
    for($i=0; $i<30; $i++){
        $countOffset=$i+1;
        $dataValue=$data[$i];
        $title='Pertambahan '.$dataValue;
        $style="height:".$normalizedData[$i]."px;max-width:31px;min-width:15px;background-color:#".$colorHEX.";margin-left:2px;margin-right:2px;";
        $barFetch=".".$chartNumber."-bardata".$countOffset."{".$style."}";
        //$encode1=arrayEncodeDelimiter2($lineFetch);
        array_push($result,$barFetch);
        //echo $barFetch."<br>";
    }
    //Encode Result to storeable Data
    $encodedArray=arrayEncodeDelimiter($result);
    return $encodedArray;
}
function chartScale($isocode, $date, $function){
    $data=array();
    //$result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    $maxValue=max($data);
    $minValue=0;
    for($i=1; $i<=6; $i++){
        $count=6-$i;
        $calculate=round($maxValue*($count/5),0);
        $spanning="<span>".$calculate."</span>";
        $result=$result.$spanning;
        //array_push($result,$spanning);
    }
    //Encode Result to storeable Data
    //$encodedArray=arrayEncodeDelimiter($result);
    return $result;
}
function chartScaleSE($isocode, $date, $function){
    $data=array();
    //$result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    $maxValue=max($data);
    $minValue=0;
    for($i=1; $i<=6; $i++){
        $count=6-$i;
        $calculate=round($maxValue*($count/5),0);
        $spanning="<span class=\"align-self-end\">".$calculate."</span>";
        $result=$result.$spanning;
        //array_push($result,$spanning);
    }
    //Encode Result to storeable Data
    //$encodedArray=arrayEncodeDelimiter($result);
    return $result;
}
function lgLineRGL($isocodeArray, $date, $colorHEX){
    $x2=20;
    $bench=400;
    $normVal=100;
    $baseX=250;
    $data=array();
    $normalizedData=array();
    $yTrans=array();
    $yLine=array();
    $result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $accumulation1=0;
        $accumulation2=0;
        foreach($isocodeArray as $code){
            $fetch=kasusAktif($code, $dateOffset);
            $accumulation1+=$fetch;
        }
        foreach($isocodeArray as $code){
            $fetch=totalKasus($code, $dateOffset);
            $accumulation2+=$fetch;
        }
        $calculation=$accumulation1/$accumulation2*100;
        array_push($data,$calculation);
    }
    $maxValue=max($data);
    $normalizeFactor=$maxValue/$normVal;
    //Converting to Normalized Value and Normalized Height
    foreach($data as $dt){
        $normalizedHeight=($dt/$normalizeFactor)/$normVal*$bench;
        array_push($normalizedData, $normalizedHeight);
    }
    //Calculating y Transformation axis
    for($i=0; $i<30; $i++){
        array_push($yTrans, $bench-$normalizedData[$i]);
    }
    //Calculating y line axis
    for($i=0; $i<29; $i++){
        array_push($yLine, $yTrans[$i+1]-$yTrans[$i]);
    }
    for($i=0; $i<29; $i++){
        $transX=$baseX+$x2*$i;
        $dataValue=$data[$i+1];
        $title='Total '.$dataValue;
        $lineFetch="<line x2='".$x2."' y2='".$yLine[$i]."' style='fill:none;stroke:#".$colorHEX."' transform='translate(".$transX." ".$yTrans[$i].")'></line>";
        $encode1=arrayEncodeDelimiter2($lineFetch);
        array_push($result,$encode1);
        //echo $encode1."<br>";
    }
    //Encode Result to storeable Data
    $encodedArray=arrayEncodeDelimiter($result);
    return $encodedArray;
}
function lineChartScaleRGL($isocodeArray, $date){
    $data=array();
    //$result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $accumulation1=0;
        $accumulation2=0;
        foreach($isocodeArray as $code){
            $fetch=kasusAktif($code, $dateOffset);
            $accumulation1+=$fetch;
        }
        foreach($isocodeArray as $code){
            $fetch=totalKasus($code, $dateOffset);
            $accumulation2+=$fetch;
        }
        $calculation=$accumulation1/$accumulation2*100;
        array_push($data,$calculation);
    }
    $maxValue=max($data);
    $minValue=0;
    for($i=1; $i<=6; $i++){
        $count=6-$i;
        $calculate=round($maxValue*($count/5),0);
        $spanning="<span>".$calculate."%</span>";
        $result=$result.$spanning;
        //array_push($result,$spanning);
    }
    //Encode Result to storeable Data
    $encodedArray=arrayEncodeDelimiter($result);
    return $result;
}
function lgBarRGL($isocodeArray, $date, $colorHEX, $chartNumber){
    $x2=20;
    $bench=400;
    $normVal=100;
    $baseX=250;
    $data=array();
    $normalizedData=array();
    $result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $accumulation=0;
        foreach($isocodeArray as $code){
            $fetch=pertambahanKasus($code, $dateOffset);
            $accumulation+=$fetch;
        }
        array_push($data,$accumulation);
    }
    $maxValue=max($data);
    $normalizeFactor=$maxValue/$normVal;
    //Converting to Normalized Value and Normalized Height
    foreach($data as $dt){
        $normalizedHeight=($dt/$normalizeFactor)/$normVal*$bench;
        array_push($normalizedData, $normalizedHeight);
    }
    for($i=0; $i<30; $i++){
        $countOffset=$i+1;
        $dataValue=$data[$i];
        $title='Pertambahan '.$dataValue;
        $style="height:".$normalizedData[$i]."px;max-width:31px;min-width:15px;background-color:#".$colorHEX.";margin-left:2px;margin-right:2px;";
        $barFetch=".".$chartNumber."-bardata".$countOffset."{".$style."}";
        //$encode1=arrayEncodeDelimiter2($lineFetch);
        array_push($result,$barFetch);
        //echo $barFetch."<br>";
    }
    //Encode Result to storeable Data
    $encodedArray=arrayEncodeDelimiter($result);
    return $encodedArray;
}
function barChartScaleRGL($isocodeArray, $date){
    $data=array();
    //$result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $accumulation=0;
        foreach($isocodeArray as $code){
            $fetch=pertambahanKasus($code, $dateOffset);
            $accumulation+=$fetch;
        }
        array_push($data,$accumulation);
    }
    $maxValue=max($data);
    $minValue=0;
    for($i=1; $i<=6; $i++){
        $count=6-$i;
        $calculate=round($maxValue*($count/5),0);
        $spanning="<span>".$calculate."</span>";
        $result=$result.$spanning;
        //array_push($result,$spanning);
    }
    //Encode Result to storeable Data
    $encodedArray=arrayEncodeDelimiter($result);
    return $result;
}
function dateSpell($date, $lang){
    $dateTime=new DateTime($date);
    $dateTransform=$dateTime;
    $dateTransform2=$dateTime;
    $dateTransform3=$dateTime;
    $bulan=$dateTransform->format('m');
    if($bulan<'10'){
        $bulan=$bulan[1];
    }
    $year=$dateTransform2->format('Y');
    $day=$dateTransform3->format('d');
    if($lang=='id'){
        switch ($bulan){
            case '1':
                $month_spell= "Januari";
                break;
            case '2':
                $month_spell= 'Februari';
                break;
            case '3':
                $month_spell= 'Maret';
                break;
            case '4':
                $month_spell= 'April';
                break;
            case '5':
                $month_spell= 'Mei';
                break;
            case '6':
                $month_spell= 'Juni';
                break;
            case '7':
                $month_spell= 'Juli';
                break;
            case '8':
                $month_spell= 'Agustus';
                break;
            case '9':
                $month_spell= 'September';
                break;
            case '10':
                $month_spell= 'Oktober';
                break;
            case '11':
                $month_spell= 'November';
                break;
            case '12':
                $month_spell= 'Desember';
                break;
            default:
                $month_spell= 'Tidak Terdaftar';
        }
    } else if($lang=='en'){
        switch ($bulan){
            case '1':
                $month_spell= 'January';
                break;
            case '2':
                $month_spell= 'February';
                break;
            case '3':
                $month_spell= 'March';
                break;
            case '4':
                $month_spell= 'April';
                break;
            case '5':
                $month_spell= 'May';
                break;
            case '6':
                $month_spell= 'June';
                break;
            case '7':
                $month_spell= 'July';
                break;
            case '8':
                $month_spell= 'August';
                break;
            case '9':
                $month_spell= 'September';
                break;
            case '10':
                $month_spell= 'October';
                break;
            case '11':
                $month_spell= 'November';
                break;
            case '12':
                $month_spell= 'December';
                break;
            default:
                $month_spell= 'Unregistered';
        }
    }
    if($lang=='id'){
        $result=$day." ".$month_spell;
    } else if($lang=='en'){
        $result=$month_spell." ".$day;
    }
    return $result;
}
function dateSpellYear($date, $lang){
    $dateTime=new DateTime($date);
    $dateTransform=$dateTime;
    $dateTransform2=$dateTime;
    $dateTransform3=$dateTime;
    $bulan=$dateTransform->format('m');
    if($bulan<'10'){
        $bulan=$bulan[1];
    }
    $year=$dateTransform2->format('Y');
    $day=$dateTransform3->format('d');
    if($lang=='id'){
        switch ($bulan){
            case '1':
                $month_spell= "Januari";
                break;
            case '2':
                $month_spell= 'Februari';
                break;
            case '3':
                $month_spell= 'Maret';
                break;
            case '4':
                $month_spell= 'April';
                break;
            case '5':
                $month_spell= 'Mei';
                break;
            case '6':
                $month_spell= 'Juni';
                break;
            case '7':
                $month_spell= 'Juli';
                break;
            case '8':
                $month_spell= 'Agustus';
                break;
            case '9':
                $month_spell= 'September';
                break;
            case '10':
                $month_spell= 'Oktober';
                break;
            case '11':
                $month_spell= 'November';
                break;
            case '12':
                $month_spell= 'Desember';
                break;
            default:
                $month_spell= 'Tidak Terdaftar';
        }
    } else if($lang=='en'){
        switch ($bulan){
            case '1':
                $month_spell= 'January';
                break;
            case '2':
                $month_spell= 'February';
                break;
            case '3':
                $month_spell= 'March';
                break;
            case '4':
                $month_spell= 'April';
                break;
            case '5':
                $month_spell= 'May';
                break;
            case '6':
                $month_spell= 'June';
                break;
            case '7':
                $month_spell= 'July';
                break;
            case '8':
                $month_spell= 'August';
                break;
            case '9':
                $month_spell= 'September';
                break;
            case '10':
                $month_spell= 'October';
                break;
            case '11':
                $month_spell= 'November';
                break;
            case '12':
                $month_spell= 'December';
                break;
            default:
                $month_spell= 'Unregistered';
        }
    }
    if($lang=='id'){
        $result=$day." ".$month_spell." ".$year;
    } else if($lang=='en'){
        $result=$month_spell." ".$day." ".$year;
    }
    return $result;
}
function dateFormatDay($date){
    $dateTime=new DateTime($date);
    $dateTransform3=$dateTime;
    $day=$dateTransform3->format('d');
    return $day;
}
function chartDate($date, $lang){
    $lastDate=getLastDate();
    //$result=array();
    $dateOffset=dateEdit($lastDate,1);
    $offsetValue=array(29,19,9,0);
    for($i=0; $i<4; $i++){
        $dateCache=dateEdit($dateOffset,$offsetValue[$i]);
        $spell=dateSpell($dateCache, $lang);
        $htmlCode="<div>".$spell."</div>";
        $result=$result.$htmlCode;
        //array_push($result,$htmlCode);
    }
    $encode=arrayEncodeDelimiter($result);
    return $result;
}
function smLine($isocode, $date, $colorHEX, $function){
    $x2=10.5;
    $bench=320;
    $normVal=100;
    $baseX=250;
    $data=array();
    $normalizedData=array();
    $yTrans=array();
    $yLine=array();
    $result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    $maxValue=max($data);
    $normalizeFactor=$maxValue/$normVal;
    //Converting to Normalized Value and Normalized Height
    foreach($data as $dt){
        $normalizedHeight=($dt/$normalizeFactor)/$normVal*$bench;
        array_push($normalizedData, $normalizedHeight);
    }
    //Calculating y Transformation axis
    for($i=0; $i<30; $i++){
        array_push($yTrans, $bench-$normalizedData[$i]);
    }
    //Calculating y line axis
    for($i=0; $i<29; $i++){
        array_push($yLine, $yTrans[$i+1]-$yTrans[$i]);
    }
    for($i=0; $i<29; $i++){
        $transX=$baseX+$x2*$i;
        $dataValue=$data[$i+1];
        $title='Total '.$dataValue;
        $lineFetch="<line x2='".$x2."' y2='".$yLine[$i]."' style='fill:none;stroke:#".$colorHEX."' transform='translate(".$transX." ".$yTrans[$i].")'></line>";
        $encode1=arrayEncodeDelimiter2($lineFetch);
        array_push($result,$encode1);
        //echo $encode1."<br>";
    }
    //Encode Result to storeable Data
    $encodedArray=arrayEncodeDelimiter($result);
    return $encodedArray;
}
function smBar($isocode, $date, $colorHEX, $function, $chartNumber){
    $x2=10.5;
    $bench=320;
    $normVal=100;
    $baseX=250;
    $data=array();
    $normalizedData=array();
    $result=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=30;
    //Fetching Data
    for($i=1; $i<=30; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    $maxValue=max($data);
    $normalizeFactor=$maxValue/$normVal;
    //Converting to Normalized Value and Normalized Height
    foreach($data as $dt){
        $normalizedHeight=($dt/$normalizeFactor)/$normVal*$bench;
        array_push($normalizedData, $normalizedHeight);
    }
    for($i=0; $i<30; $i++){
        $countOffset=$i+1;
        $dataValue=$data[$i];
        $title='Pertambahan '.$dataValue;
        $style="height:".$normalizedData[$i]."px;max-width:31px;min-width:8px;background-color:#".$colorHEX.";margin-left:1px;margin-right:1px;";
        $barFetch=".".$chartNumber."-bardata".$countOffset."{".$style."}";
        //$encode1=arrayEncodeDelimiter2($lineFetch);
        array_push($result,$barFetch);
        //echo $barFetch."<br>";
    }
    //Encode Result to storeable Data
    $encodedArray=arrayEncodeDelimiter($result);
    return $encodedArray;
}
function heatmapHSL($isocode, $date, $function,$hue1,$sa1,$li1,$hue2,$sa2,$li2){
    $resultHsl=array();
    $data=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=28;
    //Fetching Data
    for($i=1; $i<=28; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    foreach($data as $dt){
        $percentile=percRank($data, $dt);
        $hslValue=hslVal($hue1,$sa1,$li1,$hue2,$sa2,$li2,$percentile);
        array_push($resultHsl, $hslValue);
    }
    //Encode Result to storeable Data
    $encodedArray=arrayEncodeDelimiter($resultHsl);
    return $encodedArray;
}
function heatmapValue($isocode, $date, $function){
    $resultHsl=array();
    $data=array();
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=28;
    //Fetching Data
    for($i=1; $i<=28; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    $encodedArray=arrayEncodeDelimiter($data);
    return $encodedArray;
}
function heatmapDate($date, $lang){
    $lastDate=getLastDate();
    $dateOffset=dateEdit($lastDate,1);
    $result=array();
    $offsetValue=array(21,14,7,0);
    for($i=0; $i<4; $i++){
        $dateCache=dateEdit($dateOffset,$offsetValue[$i]);
        $spell=dateSpell($dateCache, $lang);
        array_push($result,$spell);
    }
    $encode=arrayEncodeDelimiter($result);
    return $encode;
}
function gbrKasusAktifSatuJuta($isocode, $date){
    $split=20;
    $cases=$isocode."_t";
    $recovery=$isocode."_tr";
    $death=$isocode."_td";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $jumlahPenduduk=getData(kes_demografi, $isocode, isocode, jml_penduduk);
    $kasusPerSatuJuta=round($kasusTerakhir/$jumlahPenduduk*1000000,2);
    $kematianPerSatuJuta=round($deathTerakhir/$jumlahPenduduk*1000000,2);
    $sehatPerSatuJuta=round($recoveryTerakhir/$jumlahPenduduk*1000000,2);
    $splitKasusPerSatuJuta=$kasusPerSatuJuta/$split;
    $splitKematianPerSatuJuta=$kematianPerSatuJuta/$split;
    $splitSehatPerSatuJuta=$sehatPerSatuJuta/$split;
    $roundKasus=round($splitKasusPerSatuJuta,0);
    $roundKematian=round($splitKematianPerSatuJuta,0);
    $roundSehat=round($splitSehatPerSatuJuta,0);
    $gbrKasusAktif=$roundKasus-$roundKematian-$roundSehat;
    return $gbrKasusAktif;
}
function gbrSembuhSatuJuta($isocode, $date){
    $split=20;
    $recovery=$isocode."_tr";
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $jumlahPenduduk=getData(kes_demografi, $isocode, isocode, jml_penduduk);
    $sehatPerSatuJuta=round($recoveryTerakhir/$jumlahPenduduk*1000000,2);
    $splitSehatPerSatuJuta=$sehatPerSatuJuta/$split;
    $roundSehat=round($splitSehatPerSatuJuta,0);
    $gbrSehat=$roundSehat;
    return $gbrSehat;
}
function gbrMeninggalSatuJuta($isocode, $date){
    $split=20;
    $cases=$isocode."_t";
    $recovery=$isocode."_tr";
    $death=$isocode."_td";
    $kasusTerakhir=getData(cases, $date, tanggal, $cases);
    $recoveryTerakhir=getData(cases, $date, tanggal, $recovery);
    $deathTerakhir=getData(cases, $date, tanggal, $death);
    $jumlahPenduduk=getData(kes_demografi, $isocode, isocode, jml_penduduk);
    $kasusPerSatuJuta=round($kasusTerakhir/$jumlahPenduduk*1000000,2);
    $kematianPerSatuJuta=round($deathTerakhir/$jumlahPenduduk*1000000,2);
    $sehatPerSatuJuta=round($recoveryTerakhir/$jumlahPenduduk*1000000,2);
    $splitKasusPerSatuJuta=$kasusPerSatuJuta/$split;
    $splitKematianPerSatuJuta=$kematianPerSatuJuta/$split;
    $splitSehatPerSatuJuta=$sehatPerSatuJuta/$split;
    $roundKasus=round($splitKasusPerSatuJuta,0);
    $roundKematian=round($splitKematianPerSatuJuta,0);
    $roundSehat=round($splitSehatPerSatuJuta,0);
    $gbrKasusAktif=$roundKasus-$roundKematian-$roundSehat;
    $gbrSehat=$roundSehat;
    $gbrMeninggal=$roundKasus-$gbrKasusAktif-$gbrSehat;
    return $gbrMeninggal;
}
function hslBebanRS($isocode, $date){
    $hue1='157';
    $sa1='84';
    $li1='83';
    $hue2='157';
    $sa2='80';
    $li2='39';
    $bebanRS_tinjau=bebanRS($isocode, $date);
    $isocode=getCode(rg);
    $hasilBebanRS=array();
    foreach($isocode as $code){
        $fetch=bebanRS($code,$date);
        $hasilBebanRS+=array($code => $fetch);
    }
    $percentile=percRank($hasilBebanRS, $bebanRS_tinjau);
    $hslValue=hslVal($hue1,$sa1,$li1,$hue2,$sa2,$li2,$percentile);
    return $hslValue;
}
function landingGrowthSpeed($isocode, $date){
    $hue1='133';
    $sa1='28';
    $li1='55';
    $hue2='33';
    $sa2='100';
    $li2='48';
    $getHSL=hslGradientSpecificData($isocode,0,$date,0,60,$hue1,$sa1,$li1,$hue2,$sa2,$li2);
    $encode=arrayEncodeDelimiter($getHSL);
    return $encode;
}
function landingCaseMovAvg($isocode, $date){
    $movAvg=5; //days
    $result="";
    for($i=0; $i<$movAvg; $i++){
        $dateEdit=dateEdit($date,$i);
        $fetch=pertambahanKasus($isocode, $dateEdit);
        $result+=$fetch;
    }
    $caseMovAvg=$result/$movAvg;
    return $caseMovAvg;
}
function landingCaseMovAvgWHO($isocode, $date){
    $movAvg=5; //days
    $result="";
    for($i=0; $i<$movAvg; $i++){
        $dateEdit=dateEdit($date,$i);
        $fetch=pertambahanKasusWHO($isocode, $dateEdit);
        $result+=$fetch;
    }
    $caseMovAvg=$result/$movAvg;
    return $caseMovAvg;
}
function landingCaseIncreaseTrend($isocode, $date){
    //Data Initiation
    $x2=3;
    $bench=45;
    $normVal=100;
    $baseX=0;
    $colorHEX='6BAB79';
    $function='landingCaseMovAvg';
    
    $data=array();
    $normalizedData=array();
    $yTrans=array();
    $yLine=array();
    $result=array();
    $resultUncode='';
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=90;
    $countOffsetDecrement=$totalCountOffset-1;
    //Fetching Data
    for($i=1; $i<=$totalCountOffset; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    $maxValue=max($data);
    $normalizeFactor=$maxValue/$normVal;
    //Converting to Normalized Value and Normalized Height
    foreach($data as $dt){
        $normalizedHeight=round(($dt/$normalizeFactor)/$normVal*$bench,2);
        array_push($normalizedData, $normalizedHeight);
    }
    //Calculating y Transformation axis
    for($i=0; $i<$totalCountOffset; $i++){
        array_push($yTrans, $bench-$normalizedData[$i]);
    }
    //Calculating y line axis
    for($i=0; $i<$countOffsetDecrement; $i++){
        array_push($yLine, $yTrans[$i+1]-$yTrans[$i]);
    }
    for($i=0; $i<$countOffsetDecrement; $i++){
        $transX=$baseX+$x2*$i;
        $dataValue=$data[$i+1];
        $title='Total '.$dataValue;
        $lineFetch="<line x2='".$x2."' y2='".$yLine[$i]."' style='fill:none;stroke:#".$colorHEX."' transform='translate(".$transX." ".$yTrans[$i].")'></line>";
        $encode1=arrayEncodeDelimiter2($lineFetch);
        //array_push($result,$encode1);
        //echo $encode1."<br>";
        $resultUncode=$resultUncode.$encode1;
    }
    //Encode Result to storeable Data
    //$encodedArray=arrayEncodeDelimiter($result);
    return $resultUncode;
}
function landingCaseIncreaseTrendWHO($isocode, $date){
    //Data Initiation
    $x2=3;
    $bench=45;
    $normVal=100;
    $baseX=0;
    $colorHEX='6BAB79';
    $function='landingCaseMovAvgWHO';
    
    $data=array();
    $normalizedData=array();
    $yTrans=array();
    $yLine=array();
    $result=array();
    $resultUncode='';
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate, 1);
    $totalCountOffset=90;
    $countOffsetDecrement=$totalCountOffset-1;
    //Fetching Data
    for($i=1; $i<=$totalCountOffset; $i++){
        $count=$totalCountOffset-$i;
        $dateOffset=dateEdit($date, $count);
        $fetch=$function($isocode, $dateOffset);
        array_push($data,$fetch);
    }
    $maxValue=max($data);
    $normalizeFactor=$maxValue/$normVal;
    //Converting to Normalized Value and Normalized Height
    foreach($data as $dt){
        $normalizedHeight=round(($dt/$normalizeFactor)/$normVal*$bench,2);
        array_push($normalizedData, $normalizedHeight);
    }
    //Calculating y Transformation axis
    for($i=0; $i<$totalCountOffset; $i++){
        array_push($yTrans, $bench-$normalizedData[$i]);
    }
    //Calculating y line axis
    for($i=0; $i<$countOffsetDecrement; $i++){
        array_push($yLine, $yTrans[$i+1]-$yTrans[$i]);
    }
    for($i=0; $i<$countOffsetDecrement; $i++){
        $transX=$baseX+$x2*$i;
        $dataValue=$data[$i+1];
        $title='Total '.$dataValue;
        $lineFetch="<line x2='".$x2."' y2='".$yLine[$i]."' style='fill:none;stroke:#".$colorHEX."' transform='translate(".$transX." ".$yTrans[$i].")'></line>";
        $encode1=arrayEncodeDelimiter2($lineFetch);
        //array_push($result,$encode1);
        //echo $encode1."<br>";
        $resultUncode=$resultUncode.$encode1;
    }
    //Encode Result to storeable Data
    //$encodedArray=arrayEncodeDelimiter($result);
    return $resultUncode;
}
function comparison($valNew, $valOld){
    if($valNew<$valOld){
        $result=2;
    } else if($valNew==$valOld){
        $result=1;
    } else if($valNew>$valOld){
        $result=0;
    }
    return $result;
}
function updateData($tableName, $key, $columnKey, $input, $columnInput){
    include ('connect.php');
    $cases_query="update $tableName set $columnInput='$input' where $columnKey='$key'";
    if($con->query($cases_query)==TRUE){
        $result="data berhasil dimasukkan";
    } else {
        $result="Cek lagi ".$con->error;
    }
    $con->close();
    return $result;
}

function rankFunction($tabel,$function,$sortF,$frontUnit,$rearUnit){
    //TABEL!!
    //$tabel="rank_jarak1pasien";
    //$function='jarakSatuPasien';
    if($sortF=="asc"){
        $sort='asort';
    } else if($sortF=="desc"){
        $sort='arsort';
    }
    $column=array('zero','one','two','three','four','five','six','seven','eight','nine');
    $column_s=array('zero_s','one_s','two_s','three_s','four_s','five_s','six_s','seven_s','eight_s','nine_s');
    $isocode=getCode(rg);
    $date=dateEdit(getLastDate(),1);
    $result="<h1>Update Status $tabel</h1> <br>";
    $tambah=1;
    for($i=0; $i<10; $i++){
        $datetoday=dateEdit($date,$i);
        $datecount=$i+$tambah;
        $dateprevday=dateEdit($date,$datecount);
        $columnData=$column[$i];
        $columnStatus=$column_s[$i];
        $result_today=array();
        $result_prevday=array();
        //Calculation
        foreach($isocode as $code){
            $today=$function($code, $datetoday);
            $prevday=$function($code, $dateprevday);
            $result_today+=array($code => $today);
            $result_prevday+=array($code => $prevday);
            $today_unit=$frontUnit.$today.$rearUnit;
            $prevday_unit=$frontUnit.$today.$rearUnit;
            //Perform cross update for landing page data
            if($function=='jarakSatuPasien'){
                updateData(landing_table, $code, isocode, $today_unit, jarak);
            }
            $u_result=updateData($tabel, $code, isocode, $today_unit, $columnData);
            $result=$result."<br>".$code.$columnData.$u_result." nilai today".$today_unit." nilai prev ".$prevday_unit;
        }
        //Ranking Compare
        $sort($result_today);
        $sort($result_prevday);
        $keys_today=array_keys($result_today);
        $keys_prevday=array_keys($result_prevday);
        foreach($isocode as $code){
            $rank_today=array_search($code, $keys_today);
            $rank_prevday=array_search($code, $keys_prevday);
            $compare=comparison($rank_today, $rank_prevday);
            $u_result=updateData($tabel, $code, isocode, $compare, $columnStatus);
            $result=$result."<br>".$code.$columnStatus.$u_result." nilai ".$compare;
        }
        //Storing Ranking
        $rank_store=arrayEncodeDelimiter($keys_today);
        $u_result=updateData(rank_urutan_dynamic, $tabel, nama_tabel, $rank_store, $columnData);
    }
    return $result;
}
function getFullColumnData($tableName,$columnName){
    $result=array();
    include('connect.php');
    $query=$con->query("select * from $tableName");
    while($row=$query->fetch_assoc()){
        array_push($result,$row[$columnName]);
    }
    return $result;
}
function rankDynamicUpdate(){
    $result="<h1>Hasil Rank Dynamic Update Below</h1><br><br>";
    $rank_table=getFullColumnData(rank_urutan_dynamic,nama_tabel);
    foreach($rank_table as $rk){
        $nama_fungsi=getData(rank_function,$rk, nama_tabel, nama_fungsi);
        $sort_dir=getData(rank_function,$rk,nama_tabel,sort_direction);
        $front_unit=getData(rank_function,$rk,nama_tabel,front_unit);
        $rear_unit=getData(rank_function,$rk,nama_tabel,rear_unit);
        $result_rf=rankFunction($rk,$nama_fungsi,$sort_dir,$front_unit,$rear_unit);
        $result=$result.$result_rf;
    }
    return $result;
}
function rankStaticFunction($column,$sortF){
    if($sortF=="asc"){
        $sort='asort';
    } else if($sortF=="desc"){
        $sort='arsort';
    }
    $isocode=getCode(rg);
    $result=array();
    //Calculation
    foreach($isocode as $code){
        $data=getData(kes_demografi, $code, isocode, $column);
        $result+=array($code => $data);
        $result_u1=$result."<br>".$code." data ".$data;
    }
    $sort($result);
    $keys=array_keys($result);
    //Storing Ranking
    $rank_store=arrayEncodeDelimiter($keys);
    $result_u2=updateData(rank_urutan_static, $column, nama_tabel, $rank_store, urutan);
    $result_u=$result_u1.$result_u2;
    return $result_u;
}
function rankStaticUpdate(){
    $result="<h1>Hasil Rank Static Update Below</h1><br><br>";
    $rank_table=getFullColumnData(rank_urutan_static,nama_tabel);
    foreach($rank_table as $rk){
        $sort_dir=getData(rank_static_function,$rk,nama_tabel,sort_direction);
        $result_rf=rankStaticFunction($rk,$sort_dir);
        $result=$result.$result_rf;
    }
    return $result;
}
function landingTableUpdate(){
    $result="<h1>Hasil Update Tabel Landing</h1><br><br>";
    $iso_whoreg=array('wl','EMRO','EURO','AFRO','AMRO','WPRO','SEARO');
    $iso_realtime=array(id);
    $iso_lagged=getCode(rg);
    $date_who=getLastDateWHO();
    $date_realtime=getLastDate();
    $date_lagged=dateEdit($date_realtime,1);
    $function_code_date_gl=array('totalKasus','pertambahanKasus','sembuh','pertambahanSembuh','kematian','pertambahanKematian','landingGrowthSpeed','landingCaseIncreaseTrend');
    $function_code_date_WHO=array('totalKasusWHO','pertambahanKasusWHO','sembuhWHO','pertambahanSembuhWHO','kematianWHO','pertambahanKematianWHO','landingCaseIncreaseTrendWHO');
    $column_code_array_gl=array('t','t_inc','tr','tr_inc','td','td_inc','ld_gspeed','tren_pertambahan');
    $column_code_array_WHO=array('t','t_inc','tr','tr_inc','td','td_inc','tren_pertambahan');
    $column_date=array('ld_sd','ld_ed');
    $column_date_offset_gl=array(59,0);
    $column_date_offset_rg=array(60,1);
    $function_code_date_rg=array('kasusSatuJuta','gbrKasusAktifSatuJuta','gbrMeninggalSatuJuta','gbrSembuhSatuJuta','bebanRS','hslBebanRS');
    $column_code_array_rg=array('t_1jt','t_1jt_gbr','td_1jt_gbr','tr_1jt_gbr','beban_rs','hsl_beban_rs');
    //Table Update
    //WHO Region Update
    foreach($iso_whoreg as $code){
        //Data Update
        for($i=0;$i<7;$i++){
            $function=$function_code_date_WHO[$i];
            $column=$column_code_array_WHO[$i];
            $calculate=$function($code, $date_who);
            if($column=='t_inc'||$column=='tr_inc'||$column=='td_inc'){
                $calculate='+'.$calculate;
            }
            $updateData=updateData(landing_table, $code, isocode, $calculate, $column);
            $result=$result.$code.$function.$calculate.$updateData."<br><br>";
        }
    }
    //Global Update
    foreach($iso_realtime as $code){
        //Data Update
        for($i=0;$i<8;$i++){
            $function=$function_code_date_gl[$i];
            $column=$column_code_array_gl[$i];
            $calculate=$function($code, $date_realtime);
            if($column=='t_inc'||$column=='tr_inc'||$column=='td_inc'){
                $calculate='+'.$calculate;
            }
            $updateData=updateData(landing_table, $code, isocode, $calculate, $column);
            $result=$result.$code.$function.$calculate.$updateData."<br><br>";
        }
        //Date Update
        for($i=0;$i<2;$i++){
            $data=$column_date_offset_gl[$i];
            $column=$column_date[$i];
            $calculate=dateEdit($date_realtime, $data);
            $updateData=updateData(landing_table, $code, isocode, $calculate, $column);
            $result=$result.$code.$data.$calculate.$updateData."<br><br>";
        }
    }
    //Region Update
    //Table
    foreach($iso_lagged as $code){
        //Data Update
        for($i=0;$i<8;$i++){
            $function=$function_code_date_gl[$i];
            $column=$column_code_array_gl[$i];
            $calculate=$function($code, $date_lagged);
            if($column=='t_inc'||$column=='tr_inc'||$column=='td_inc'){
                $calculate='+'.$calculate;
            }
            $updateData=updateData(landing_table, $code, isocode, $calculate, $column);
            $result=$result.$code.$function.$calculate.$updateData."<br><br>";
        }
        //Date Update
        for($i=0;$i<2;$i++){
            $data=$column_date_offset_rg[$i];
            $column=$column_date[$i];
            $calculate=dateEdit($date_realtime, $data);
            $updateData=updateData(landing_table, $code, isocode, $calculate, $column);
            $result=$result.$code.$data.$calculate.$updateData."<br><br>";
        }
    }
    //Additional Data
    foreach($iso_lagged as $code){
        //Data Update
        for($i=0;$i<6;$i++){
            $function=$function_code_date_rg[$i];
            $column=$column_code_array_rg[$i];
            $calculate=$function($code, $date_lagged);
            if($column=='beban_rs'){
                $calculate=$calculate.'%';
            }
            $updateData=updateData(landing_table, $code, isocode, $calculate, $column);
            $result=$result.$code.$function.$calculate.$updateData."<br><br>";
        }
    }
    return $result;
}
function rgViewUpdate(){
    $columnOne=array('t','tr','td','t_inc','tr_inc','td_inc','t_per_id','tr_per_id','td_per_id');
    $columnTwo=array('t_rank','tr_rank','td_rank','t_rank_status','tr_rank_status','td_rank_status','t_id','tr_id','td_id','t_per_id_status','tr_per_id_status','td_per_id_status');
    $dataFunctionOne=array('totalKasus','sembuh','kematian','pertambahanKasus','pertambahanSembuh','pertambahanKematian','kasusPersenIndonesia','sembuhPersenIndonesia','kematianPersenIndonesia');
    $dataFunctionTwo=array('persenTambahKasus','persenTambahSembuh','persenTambahKematian','persenTambahKasus','persenTambahSembuh','persenTambahKematian','totalKasus','sembuh','kematian','kasusPersenIndonesia','sembuhPersenIndonesia','kematianPersenIndonesia');
    $processFunctionTwo=array('isocodeDynamicRanking','isocodeDynamicRanking','isocodeDynamicRanking','isocodeRankingStatus','isocodeRankingStatus','isocodeRankingStatus','perIndonesia','perIndonesia','perIndonesia','isocodeRankingStatus','isocodeRankingStatus','isocodeRankingStatus');
    $isocode=getCode(rg);
    $realtimeDate=getLastDate();
    $date=dateEdit(getLastDate(),1);
    $result=0;
    foreach($isocode as $code){
        //Process One
        for($i=0; $i<9; $i++){
            $column=$columnOne[$i];
            $dataFunction=$dataFunctionOne[$i];
            $fetch=$dataFunction($code, $date);
            $update=updateData(rg_view, $code, isocode, $fetch, $column);
            $result=$result.$date."<br>".$code.$column.$update;
        }
        //Process Two
        for($i=0; $i<12; $i++){
            $column=$columnTwo[$i];
            $dataFunction=$dataFunctionTwo[$i];
            $processFunction=$processFunctionTwo[$i];
            $fetch=$processFunction($code, $date,$dataFunction);
            $update=updateData(rg_view, $code, isocode, $fetch, $column);
            $result=$result.$date."<br>".$code.$column.$update;
        }
    }
    return $result;
}
function rgRankUrutanUpdate(){
    $columnOne=array('kasus1jt','kapasitasrs','wakturs','jarak1pasien','dokterpasien','perawatpasien');
    $columnTwo=array('kasus1jt_rank','kapasitasrs_rank','jarak1pasien_rank','dokterpasien_rank','perawatpasien_rank','wakturs_rank','kasus1jt_st','kapasitasrs_st','jarak1pasien_st','dokterpasien_st','perawatpasien_st');
    $dataFunctionOne=array('kasusSatuJuta','bebanRS','waktuRS','jarakSatuPasien','dokterPasien','perawatPasien');
    $dataFunctionTwo=array('kasusSatuJuta','bebanRS','jarakSatuPasien','dokterPasien','perawatPasien','waktuRS','kasusSatuJuta','bebanRS','jarakSatuPasien','dokterPasien','perawatPasien');
    $processFunctionTwo=array('isocodeDynamicRanking','isocodeDynamicRanking','isocodeDynamicRankingASC','isocodeDynamicRankingASC','isocodeDynamicRankingASC','isocodeStaticRanking','isocodeRankingStatus','isocodeRankingStatus','isocodeRankingStatusASC','isocodeRankingStatus','isocodeRankingStatusASC');
    $isocode=getCode(rg);
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate,1);
    $result=0;
    foreach($isocode as $code){
        //Process One
        for($i=0; $i<6; $i++){
            $column=$columnOne[$i];
            $dataFunction=$dataFunctionOne[$i];
            if($column==wakturs){
                $fetch=getData(kes_demografi,$code, isocode, waktu_rs);
                $update=updateData(rg_rank_urutan, $code, isocode, $fetch, $column);
                $result=$result."<br>".$code.$column.$update;
            } else{
                $fetch=$dataFunction($code, $date);
                $update=updateData(rg_rank_urutan, $code, isocode, $fetch, $column);
                $result=$result."<br>".$code.$column.$update;
            }
            
        }
        //Process Two
        for($i=0; $i<11; $i++){
            $column=$columnTwo[$i];
            $dataFunction=$dataFunctionTwo[$i];
            $processFunction=$processFunctionTwo[$i];
            if($column=='wakturs_rank'){
                $fetch=$processFunction($code, waktu_rs);
                $update=updateData(rg_rank_urutan, $code, isocode, $fetch, $column);
                $result=$result."<br>".$code.$column.$update;
            } else{
                $fetch=$processFunction($code, $date,$dataFunction);
                $update=updateData(rg_rank_urutan, $code, isocode, $fetch, $column);
                $result=$result."<br>".$code.$column.$update;
            }
        }
        
    }
    return $result;
}
function rgLandingUpdate(){
    $region=array(
        'sumatera' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jawa' => 'bt|jb|jk|jt|ji|yo',
        'kalimantan' => 'kb|kt|ks|ki|ku',
        'sulawesi' => 'sa|st|sr|sg|sn|go',
        'malukupapua' => 'mu|ma|pb|pa',
        'balinusatenggara' => 'ba|nt|nb');
    
    $colorDark=array(
        'sumatera' => '369270',
        'jawa' => '8E543A',
        'kalimantan' => '8F4141',
        'sulawesi' => '2E3D75',
        'malukupapua' => '332B6D',
        'balinusatenggara' => '924066');
        
    $colorLight=array(
        'sumatera' => '5BE5B1',
        'jawa' => 'FF9253',
        'kalimantan' => 'FE8279',
        'sulawesi' => 'FF87A8',
        'malukupapua' => '9B90F1',
        'balinusatenggara' => '839CFE');
        
    $chartNumber=array(
        'sumatera' => 'c1',
        'jawa' => 'c2',
        'kalimantan' => 'c3',
        'sulawesi' => 'c4',
        'malukupapua' => 'c5',
        'balinusatenggara' => 'c6');
        
    $ah2=array(
        'sumatera' => '157',
        'jawa' => '22',
        'kalimantan' => '4',
        'sulawesi' => '228',
        'malukupapua' => '247',
        'balinusatenggara' => '344');
        
    $ah1=array(
        'sumatera' => '157',
        'jawa' => '23',
        'kalimantan' => '5',
        'sulawesi' => '228',
        'malukupapua' => '248',
        'balinusatenggara' => '343');
        
    $as2=array(
        'sumatera' => '80',
        'jawa' => '100',
        'kalimantan' => '65',
        'sulawesi' => '59',
        'malukupapua' => '60',
        'balinusatenggara' => '100');
        
    $as1=array(
        'sumatera' => '84',
        'jawa' => '100',
        'kalimantan' => '100',
        'sulawesi' => '100',
        'malukupapua' => '100',
        'balinusatenggara' => '90');
        
    $al2=array(
        'sumatera' => '39',
        'jawa' => '46',
        'kalimantan' => '49',
        'sulawesi' => '39',
        'malukupapua' => '48',
        'balinusatenggara' => '38');
        
    $al1=array(
        'sumatera' => '83',
        'jawa' => '85',
        'kalimantan' => '87',
        'sulawesi' => '87',
        'malukupapua' => '89',
        'balinusatenggara' => '88');
    
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate,1);
    $hasilUpdate=0;
    //Perbandingan Indonesia
    $totalKasusID=totalKasus(id, $date);
    $kasusAktifID=kasusAktif(id, $date);
    //Total Bed Indonesia
    $isocode=getCode(rg);
    $totalBedKosongID=0;
    foreach($isocode as $cd){
        $fetch=bedKosong($cd, $date);
        $totalBedKosongID+=$fetch;
    }
    foreach($region as $rg => $val){
        //Chart Number Fetch
        $chartNo=$chartNumber[$rg];
        //Color Fetch
        $dark=$colorDark[$rg];
        $light=$colorLight[$rg];
        $h1=$ah1[$rg];
        $s1=$as1[$rg];
        $l1=$al1[$rg];
        $h2=$ah2[$rg];
        $s2=$as2[$rg];
        $l2=$al2[$rg];
        
        //Decode isocode array from database
        $decode=arrayDecodeDelimiter($val);
        //Fetching Data
        $totalKasus=0;
        $kasusAktif=0;
        $bedTerisi=0;
        $totalBed=0;
        $bedKosong=0;
        $totalKasusArray=array();
        foreach($decode as $code){
            $fetchTotalkasus=totalKasus($code, $date);
            $fetchKasusAktif=kasusAktif($code, $date);
            $fetchBedTerisi=bedTerisi($code, $date);
            $fetchJumlahTempatTidur=totalBed($code);
            $fetchBedKosong=bedKosong($code, $date);
            $totalKasus+=$fetchTotalkasus;
            $kasusAktif+=$fetchKasusAktif;
            $bedTerisi+=$fetchBedTerisi;
            $totalBed+=$fetchJumlahTempatTidur;
            $bedKosong+=$fetchBedKosong;
            //Maps Visualization
            $totalKasusArray+=array($code => $fetchTotalkasus);
        }
        
        //Calculation
        $persen_aktif=round($kasusAktif/$totalKasus*100,1);
        $kapasitas_rs=round((1-($bedKosong/$totalBed))*100,1);
        $t_id=$totalKasus."/".$totalKasusID;
        $persen_aktif_id=$kasusAktif."/".$totalKasus;
        $kapasitas_rs_id=round($bedTerisi,0)."/".round($totalBed,0);
        $t_per_id=round($totalKasus/$totalKasusID*100,0);
        $persen_aktif_per_id=round($kasusAktif/$kasusAktifID*100,0);
        $kapasitas_rs_per_id=round($bedKosong/$totalBedKosongID*100,0);
        
        //Update Database
        $update=updateData(rg_landing,$rg,region,$totalKasus,t);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$persen_aktif,persen_aktif);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$kapasitas_rs,kapasitas_rs);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$t_id,t_id);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$persen_aktif_id, persen_aktif_id);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$kapasitas_rs_id, kapasitas_rs_id);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$t_per_id, t_per_id);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$persen_aktif_per_id, persen_aktif_per_id);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$kapasitas_rs_per_id, kapasitas_rs_per_id);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        
        //Line Chart
        $fetchLine=lgLineRGL($decode,$date,$dark);
        $fetchLineScale=lineChartScaleRGL($decode,$date);
        $fetchBar=lgBarRGL($decode,$date,$light,$chartNo);
        $fetchBarScale=barChartScaleRGL($decode,$date);
        $fetchDateID=chartDate($date,id);
        $fetchDateEN=chartDate($date,en);
        
        //Chart Database Fetching
        $update=updateData(rg_landing,$rg,region,$fetchLine, line_chart);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$fetchLineScale, line_chart_scale);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$fetchBar, bar_chart);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$fetchBarScale, bar_chart_scale);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$fetchDateID, chart_date_id);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$fetchDateEN, chart_date_en);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        
        //Maps Visualization
        $minCaseVal=min($totalKasusArray);
        $maxCaseval=max($totalKasusArray);
        $regHslCSS="";
        foreach($totalKasusArray as $code => $case){
            $rank=percRank($totalKasusArray, $case);
            $hsl=hslVal($h1,$s1,$l1,$h2,$s2,$l2,$rank);
            $regHslCSS=$regHslCSS.".id-".$code."{fill:".$hsl."}";
        }
        //Update Maps Visualization Data
        $update=updateData(rg_landing,$rg,region,$regHslCSS, reg_casehsl);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$minCaseVal, min_caseval);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
        $update=updateData(rg_landing,$rg,region,$maxCaseval, max_caseval);
        $hasilUpdate=$hasilUpdate.'<br>'.$update.$rg;
    }
    return $hasilUpdate;
}
function rgDatavisUpdate(){
    $region=array(
        'sumatera' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jawa' => 'bt|jb|jk|jt|ji|yo',
        'kalimantan' => 'kb|kt|ks|ki|ku',
        'sulawesi' => 'sa|st|sr|sg|sn|go',
        'malukupapua' => 'mu|ma|pb|pa',
        'balinusatenggara' => 'ba|nt|nb');
    
    $colorDark=array(
        'sumatera' => '4C8B73',
        'jawa' => 'A53D00',
        'kalimantan' => 'AF625D',
        'sulawesi' => '4A5581',
        'malukupapua' => '555081',
        'balinusatenggara' => '975265');
        
    $colorLight=array(
        'sumatera' => '19EB9C',
        'jawa' => 'FF7B2E',
        'kalimantan' => 'FF3426',
        'sulawesi' => '0034FF',
        'malukupapua' => '503AFF',
        'balinusatenggara' => 'FF0046');
    
    $ah1=array(
        'sumatera' => '157',
        'jawa' => '22',
        'kalimantan' => '4',
        'sulawesi' => '228',
        'malukupapua' => '247',
        'balinusatenggara' => '344');
        
    $ah2=array(
        'sumatera' => '157',
        'jawa' => '23',
        'kalimantan' => '5',
        'sulawesi' => '228',
        'malukupapua' => '248',
        'balinusatenggara' => '343');
        
    $as1=array(
        'sumatera' => '80',
        'jawa' => '100',
        'kalimantan' => '65',
        'sulawesi' => '59',
        'malukupapua' => '60',
        'balinusatenggara' => '100');
        
    $as2=array(
        'sumatera' => '84',
        'jawa' => '100',
        'kalimantan' => '100',
        'sulawesi' => '100',
        'malukupapua' => '100',
        'balinusatenggara' => '90');
        
    $al1=array(
        'sumatera' => '39',
        'jawa' => '46',
        'kalimantan' => '49',
        'sulawesi' => '39',
        'malukupapua' => '48',
        'balinusatenggara' => '38');
        
    $al2=array(
        'sumatera' => '83',
        'jawa' => '85',
        'kalimantan' => '87',
        'sulawesi' => '87',
        'malukupapua' => '89',
        'balinusatenggara' => '88');
        
    $chartNumber=array('c1','c2','c3');
    $functionChart1=array('totalKasus','totalKasus','pertambahanKasus','pertambahanKasus','persenTambahKasus');
    $functionChart2=array('sembuh','sembuh','pertambahanSembuh','pertambahanSembuh','persenTambahSembuh');
    $functionChart3=array('kematian','kematian','pertambahanKematian','pertambahanKematian','persenTambahKematian');

    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate,1);
    $hasilUpdate=0;
    
    foreach($region as $rg => $val){
        //Color Fetch
        $dark=$colorDark[$rg];
        $light=$colorLight[$rg];
        $cl2=$color2[$rg];
        $cl5=$color5[$rg];
        $h1=$ah1[$rg];
        $s1=$as1[$rg];
        $l1=$al1[$rg];
        $h2=$ah2[$rg];
        $s2=$as2[$rg];
        $l2=$al2[$rg];
        //Decode isocode array from database
        $decode=arrayDecodeDelimiter($val);
        //Fetching Data
        foreach($decode as $code){
            //chart 0
            $c0_line=smLine($code, $date, $dark, persenKasusAktif);
            $update=updateData(rg_datavis, $code, isocode, $c0_line, c0_line);
            $hasilUpdate=$hasilUpdate.$update.'<br>';
            
            $c0_line_scale=chartScale($code, $date, persenKasusAktif);
            $update=updateData(rg_datavis, $code, isocode, $c0_line_scale, c0_line_scale);
            $hasilUpdate=$hasilUpdate.$update.'<br>'; 
            
            $c0_bar=smBar($code, $date, $light, pertambahanKasus, c0);
            $update=updateData(rg_datavis, $code, isocode, $c0_bar, c0_bar);
            $hasilUpdate=$hasilUpdate.$update.'<br>';
            
            $c0_bar_scale=chartScaleSE($code, $date, pertambahanKasus);
            $update=updateData(rg_datavis, $code, isocode, $c0_bar_scale, c0_bar_scale);
            $hasilUpdate=$hasilUpdate.$update.'<br>'; 
            
            $c0_chart_date_id=chartDate($date,id);
            $update=updateData(rg_datavis, $code, isocode, $c0_chart_date_id, c0_chart_date_id);
            $hasilUpdate=$hasilUpdate.$update.'<br>'; 
            
            $c0_chart_date_en=chartDate($date,en);
            $update=updateData(rg_datavis, $code, isocode, $c0_chart_date_en, c0_chart_date_en);
            $hasilUpdate=$hasilUpdate.$update.'<br>'; 
            
            //chart x 
            $k=1;
            foreach($chartNumber as $charnum){
                if($k==1){
                    $process1=$functionChart1[0];
                    $process2=$functionChart1[1];
                    $process3=$functionChart1[2];
                    $process4=$functionChart1[3];
                    $process5=$functionChart1[4];
                    
                }else if($k==2){
                    $process1=$functionChart2[0];
                    $process2=$functionChart2[1];
                    $process3=$functionChart2[2];
                    $process4=$functionChart2[3];
                    $process5=$functionChart2[4];
                } else if($k==3){
                    $process1=$functionChart3[0];
                    $process2=$functionChart3[1];
                    $process3=$functionChart3[2];
                    $process4=$functionChart3[3];
                    $process5=$functionChart3[4];
                }
                //$pname=$charnum.'c0_line';
                $_line=lgLine($code, $date, $dark, $process1);
                $update=updateData(rg_datavis, $code, isocode, $_line, $charnum.'_line');
                $hasilUpdate=$hasilUpdate.$update.'<br>';
                
                $_line_scale=chartScale($code, $date, $process2);
                $update=updateData(rg_datavis, $code, isocode, $_line_scale, $charnum.'_line_scale');
                $hasilUpdate=$hasilUpdate.$update.'<br>'; 
                
                $_bar=lgBar($code, $date, $light, $process3, $charnum);
                $update=updateData(rg_datavis, $code, isocode, $_bar, $charnum.'_bar');
                $hasilUpdate=$hasilUpdate.$update.'<br>';
                
                $_bar_scale=chartScale($code, $date, $process4);
                $update=updateData(rg_datavis, $code, isocode, $_bar_scale, $charnum.'_bar_scale');
                $hasilUpdate=$hasilUpdate.$update.'<br>'; 
                
                $_chart_date_id=chartDate($date,id);
                $update=updateData(rg_datavis, $code, isocode, $_chart_date_id, $charnum.'_chart_date_id');
                $hasilUpdate=$hasilUpdate.$update.'<br>'; 
                
                $_chart_date_en=chartDate($date,en);
                $update=updateData(rg_datavis, $code, isocode, $_chart_date_en, $charnum.'_chart_date_en');
                $hasilUpdate=$hasilUpdate.$update.'<br>'; 
                
                //'heatmapHSL','heatmapValue'
                
                //echo '<br><br>'.$h1.'<br>'.$s1.'<br>'.$l1.'<br>'.$h2.'<br>'.$s2.'<br>'.$l2;
                $_heatmap_hsl=heatmapHSL($code, $date, $process5, $h2,$s2,$l2,$h1,$s1,$l1);
                $update=updateData(rg_datavis, $code, isocode, $_heatmap_hsl, $charnum.'_heatmap_hsl');
                $hasilUpdate=$hasilUpdate.$update.'<br>';
                
                $_heatmap_val=heatmapValue($code, $date, $process5);
                $update=updateData(rg_datavis, $code, isocode, $_heatmap_val, $charnum.'_heatmap_val');
                $hasilUpdate=$hasilUpdate.$update.'<br>'; 
                
                $_heatmap_date_id=heatmapDate($date,id);
                $update=updateData(rg_datavis, $code, isocode, $_heatmap_date_id, $charnum.'_heatmap_date_id');
                $hasilUpdate=$hasilUpdate.$update.'<br>'; 
                
                $_heatmap_date_en=heatmapDate($date,en);
                $update=updateData(rg_datavis, $code, isocode, $_heatmap_date_en, $charnum.'_heatmap_date_en');
                $hasilUpdate=$hasilUpdate.$update.'<br>';

                $k++;
            }
        }
    }
    return $hasilUpdate;
    
}
function rankOffsetSpell($offset){
    switch ($offset){
        case '0':
            $spell= "zero";
            break;
        case '1':
            $spell= 'one';
            break;
        case '2':
            $spell= 'two';
            break;
        case '3':
            $spell= 'three';
            break;
        case '4':
            $spell= 'four';
            break;
        case '5':
            $spell= 'five';
            break;
        case '6':
            $spell= 'six';
            break;
        case '7':
            $spell= 'seven';
            break;
        case '8':
            $spell= 'eight';
            break;
        case '9':
            $spell= 'nine';
            break;
        default:
            $spell= 'Tidak Terdaftar';
    }
    return $spell;
}
function rankOffsetSpellStatus($offset){
    switch ($offset){
        case '0':
            $spell= "zero_s";
            break;
        case '1':
            $spell= 'one_s';
            break;
        case '2':
            $spell= 'two_s';
            break;
        case '3':
            $spell= 'three_s';
            break;
        case '4':
            $spell= 'four_s';
            break;
        case '5':
            $spell= 'five_s';
            break;
        case '6':
            $spell= 'six_s';
            break;
        case '7':
            $spell= 'seven_s';
            break;
        case '8':
            $spell= 'eight_s';
            break;
        case '9':
            $spell= 'nine_s';
            break;
        default:
            $spell= 'Tidak Terdaftar';
    }
    return $spell;
}
function landingMaps2Update(){
    include_once('connect.php');
    $region=array(
        'sumatera' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jawa' => 'bt|jb|jk|jt|ji|yo',
        'kalimantan' => 'kb|kt|ks|ki|ku',
        'sulawesi' => 'sa|st|sr|sg|sn|go',
        'malukupapua' => 'mu|ma|pb|pa',
        'balinusatenggara' => 'ba|nt|nb');
    $offsetDate=array('0','14','28','42','56');
    $cname=array('minval','maxval','hsl');
    $dataProcessor=array('totalKasus','kasusSatuJuta','tingkatKematian','tingkatSembuh','kematian','sembuh','persenKasusAktif','bebanRS');
    $satuan=array('','','%','%','','','%','%');
    $sortDir=array('arsort','arsort','arsort','asort','arsort','asort','arsort','arsort');
    $row=array('totalkasus','kasus1juta','tingkatkematian','tingkatkesembuhan','totalkematian','totalkesembuhan','dalamperawatan','bebanrumahsakit');
    $hsl1=array('133','28','55','33','100','48');
    $hsl2=array('33','100','48','133','28','55');
    $realtimeDate=getLastDate();
    $date=dateEdit($realtimeDate,1);
    $isocode=getCode(rg);
    $i=0;
    $updateResult='';
    foreach($row as $table){
        $process=$dataProcessor[$i];
        $sort=$sortDir[$i];
        $satuanSelect=$satuan[$i];
        if($sort=='arsort'){
            $h1=$hsl1[0];
            $s1=$hsl1[1];
            $l1=$hsl1[2];
            $h2=$hsl1[3];
            $s2=$hsl1[4];
            $l2=$hsl1[5];
        }else if ($sort=='asort'){
            $h1=$hsl2[0];
            $s1=$hsl2[1];
            $l1=$hsl2[2];
            $h2=$hsl2[3];
            $s2=$hsl2[4];
            $l2=$hsl2[5];
        }
        
        foreach($offsetDate as $offset){
            $offsetDateL=dateEdit($date, $offset);
            $resultArray=array();
            $result='';
            //Getting Data
            foreach($isocode as $code){
                $data=$process($code, $offsetDateL);
                $resultArray+=array($code => $data);
            }
            //Comparing and Fetching HSL
            foreach($resultArray as $code => $resultf){
                $rank=percRank($resultArray, $resultf);
                $hsl=hslVal($h1,$s1,$l1,$h2,$s2,$l2,$rank);
                $result=$result.'#id-'.$code.'{fill:'.$hsl.'}';
            }
            //Calculate Min Max Value
            if($sort=='arsort'){
                $minVal=min($resultArray).$satuanSelect;
                $maxVal=max($resultArray).$satuanSelect;
            }else if ($sort=='asort'){
                $minVal=max($resultArray).$satuanSelect;
                $maxVal=min($resultArray).$satuanSelect;
            }
            //Updating Database
            $update=updateData(landing_maps, $table, datatype, $minVal,'minval'.$offset);
            $updateResult=$updateResult.$offset.$minVal.$process.'<br>';
            $update=updateData(landing_maps, $table, datatype, $maxVal,'maxval'.$offset);
            $updateResult=$updateResult.$offset.$maxVal.$process.'<br>';
            $update=updateData(landing_maps, $table, datatype, $result,'hsl'.$offset);
            $updateResult=$updateResult.$offset.$result.$process.'<br>';
            
        }
        $i++;
        echo $process.'<br>';
        echo $table.'<br>';
    }
    return $updateResult;
    
    
    
}

//Caching Pre Rendered Content
function cacheLandingMapsInfoScript(){
include_once('connect.php');
$parse='';
$parse=$parse."function popUp(obj){";
$parse=$parse.    "var object = document.getElementById(obj);";
$parse=$parse.    "var target = document.getElementById('popupnamaprovinsi');";
$parse=$parse.    "var namaProv;";
$parse=$parse.    "var isocodeInput=obj;";
$parse=$parse.    "var isocodeSlice=isocodeInput.slice(3,5);";
$parse=$parse.    "var name;";
$parse=$parse.    "var cases;";
$parse=$parse.    "var death;";
$parse=$parse.    "var recover;";
$parse=$parse.    "var onemil;";
$parse=$parse.    "var deathrate;";
$parse=$parse.    "var recrate;";
$parse=$parse.    "var activecase;";
$parse=$parse.    "var hlload;";
$parse=$parse.    "switch(isocodeSlice){";
$parse=$parse.        "case 'ac':";
$parse=$parse.            "namaProv='Aceh';";
$parse=$parse.            "name = '". getData(landing_table, ac, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ac, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ac, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ac, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ac, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ac, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ac, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ac, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ac, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'su':";
$parse=$parse.            "namaProv='Sumatera Utara';";
$parse=$parse.            "name = '". getData(landing_table, su, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, su, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, su, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, su, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, su, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, su, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, su, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, su, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, su, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'sb':";
$parse=$parse.            "namaProv='Sumatera Barat';";
$parse=$parse.            "name = '". getData(landing_table, sb, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, sb, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, sb, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, sb, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, sb, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, sb, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, sb, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, sb, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, sb, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'ri':";
$parse=$parse.            "namaProv='Riau';";
$parse=$parse.            "name = '". getData(landing_table, ri, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ri, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ri, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ri, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ri, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ri, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ri, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ri, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ri, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'kr':";
$parse=$parse.            "namaProv='Kepulauan Riau';";
$parse=$parse.            "name = '". getData(landing_table, kr, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, kr, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, kr, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, kr, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, kr, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, kr, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, kr, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, kr, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, kr, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'be':";
$parse=$parse.            "namaProv='Bengkulu';";
$parse=$parse.            "name = '". getData(landing_table, be, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, be, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, be, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, be, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, be, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, be, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, be, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, be, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, be, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'ja':";
$parse=$parse.            "namaProv='Jambi';";
$parse=$parse.            "name = '". getData(landing_table, ja, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ja, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ja, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ja, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ja, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ja, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ja, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ja, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ja, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'ss':";
$parse=$parse.            "namaProv='Sumatera Selatan';";
$parse=$parse.            "name = '". getData(landing_table, ss, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ss, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ss, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ss, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ss, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ss, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ss, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ss, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ss, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'bb':";
$parse=$parse.            "namaProv='Bangka Belitung';";
$parse=$parse.            "name = '". getData(landing_table, bb, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, bb, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, bb, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, bb, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, bb, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, bb, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, bb, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, bb, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, bb, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'la':";
$parse=$parse.            "namaProv='Lampung';";
$parse=$parse.            "name = '". getData(landing_table, la, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, la, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, la, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, la, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, la, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, la, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, la, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, la, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, la, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'jk':";
$parse=$parse.            "namaProv='Jakarta';";
$parse=$parse.            "name = '". getData(landing_table, jk, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, jk, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, jk, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, jk, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, jk, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, jk, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, jk, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, jk, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, jk, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'bt':";
$parse=$parse.            "namaProv='Banten';";
$parse=$parse.            "name = '". getData(landing_table, bt, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, bt, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, bt, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, bt, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, bt, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, bt, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, bt, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, bt, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, bt, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'jb':";
$parse=$parse.            "namaProv='Jawa Barat';";
$parse=$parse.            "name = '". getData(landing_table, jb, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, jb, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, jb, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, jb, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, jb, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, jb, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, jb, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, jb, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, jb, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'jt':";
$parse=$parse.            "namaProv='Jawa Tengah';";
$parse=$parse.            "name = '". getData(landing_table, jt, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, jt, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, jt, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, jt, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, jt, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, jt, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, jt, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, jt, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, jt, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'ji':";
$parse=$parse.            "namaProv='Jawa Timur';";
$parse=$parse.            "name = '". getData(landing_table, ji, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ji, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ji, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ji, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ji, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ji, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ji, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ji, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ji, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'yo':";
$parse=$parse.            "namaProv='Yogyakarta';";
$parse=$parse.            "name = '". getData(landing_table, yo, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, yo, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, yo, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, yo, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, yo, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, yo, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, yo, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, yo, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, yo, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'ba':";
$parse=$parse.            "namaProv='Bali';";
$parse=$parse.            "name = '". getData(landing_table, ba, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ba, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ba, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ba, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ba, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ba, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ba, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ba, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ba, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'nt':";
$parse=$parse.            "namaProv='Nusa Tenggara Timur';";
$parse=$parse.            "name = '". getData(landing_table, nt, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, nt, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, nt, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, nt, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, nt, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, nt, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, nt, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, nt, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, nt, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'nb':";
$parse=$parse.            "namaProv='Nusa Tenggara Barat';";
$parse=$parse.            "name = '". getData(landing_table, nb, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, nb, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, nb, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, nb, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, nb, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, nb, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, nb, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, nb, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, nb, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'kb':";
$parse=$parse.            "namaProv='Kalimantan Barat';";
$parse=$parse.            "name = '". getData(landing_table, kb, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, kb, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, kb, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, kb, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, kb, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, kb, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, kb, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, kb, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, kb, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'kt':";
$parse=$parse.            "namaProv='Kalimantan Tengah';";
$parse=$parse.            "name = '". getData(landing_table, kt, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, kt, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, kt, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, kt, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, kt, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, kt, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, kt, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, kt, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, kt, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'ks':";
$parse=$parse.            "namaProv='Kalimantan Selatan';";
$parse=$parse.            "name = '". getData(landing_table, ks, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ks, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ks, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ks, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ks, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ks, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ks, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ks, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ks, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'ku':";
$parse=$parse.            "namaProv='Kalimantan Utara';";
$parse=$parse.            "name = '". getData(landing_table, ku, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ku, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ku, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ku, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ku, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ku, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ku, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ku, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ku, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'ki':";
$parse=$parse.            "namaProv='Kalimantan Timur';";
$parse=$parse.            "name = '". getData(landing_table, ki, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ki, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ki, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ki, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ki, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ki, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ki, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ki, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ki, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'sa':";
$parse=$parse.            "namaProv='Sulawesi Utara';";
$parse=$parse.            "name = '". getData(landing_table, sa, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, sa, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, sa, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, sa, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, sa, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, sa, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, sa, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, sa, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, sa, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'go':";
$parse=$parse.            "namaProv='Gorontalo';";
$parse=$parse.            "name = '". getData(landing_table, go, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, go, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, go, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, go, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, go, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, go, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, go, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, go, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, go, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'st':";
$parse=$parse.            "namaProv='Sulawesi Tengah';";
$parse=$parse.            "name = '". getData(landing_table, st, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, st, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, st, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, st, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, st, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, st, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, st, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, st, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, st, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'sr':";
$parse=$parse.            "namaProv='Sulawesi Barat';";
$parse=$parse.            "name = '". getData(landing_table, sr, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, sr, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, sr, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, sr, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, sr, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, sr, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, sr, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, sr, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, sr, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'sg':";
$parse=$parse.            "namaProv='Sulawesi Tenggara';";
$parse=$parse.            "name = '". getData(landing_table, sg, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, sg, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, sg, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, sg, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, sg, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, sg, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, sg, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, sg, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, sg, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'sn':";
$parse=$parse.            "namaProv='Sulawesi Selatan';";
$parse=$parse.            "name = '". getData(landing_table, sn, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, sn, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, sn, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, sn, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, sn, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, sn, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, sn, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, sn, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, sn, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'ma':";
$parse=$parse.            "namaProv='Maluku';";
$parse=$parse.            "name = '". getData(landing_table, ma, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, ma, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, ma, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, ma, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, ma, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, ma, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, ma, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, ma, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, ma, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'mu':";
$parse=$parse.            "namaProv='Maluku Utara';";
$parse=$parse.            "name = '". getData(landing_table, mu, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, mu, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, mu, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, mu, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, mu, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, mu, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, mu, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, mu, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, mu, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'pa':";
$parse=$parse.            "namaProv='Papua';";
$parse=$parse.            "name = '". getData(landing_table, pa, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, pa, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, pa, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, pa, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, pa, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, pa, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, pa, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, pa, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, pa, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.        "case 'pb':";
$parse=$parse.            "namaProv='Papua Barat';";
$parse=$parse.            "name = '". getData(landing_table, pb, isocode, nama_daerah) ."';";
$parse=$parse.            "cases = '". getData(landing_table, pb, isocode, t) ."';";
$parse=$parse.            "death = '". getData(landing_table, pb, isocode, td) ."';";
$parse=$parse.            "recover = '". getData(landing_table, pb, isocode, tr) ."';";
$parse=$parse.            "onemil = '". getData(landing_table, pb, isocode, t_1jt) ."';";
$parse=$parse.            "deathrate = '". getData(rank_tingkatkematian, pb, isocode, zero) ."';";
$parse=$parse.            "recrate = '". getData(rank_tingkatsembuh, pb, isocode, zero) ."';";
$parse=$parse.            "activecase = '". getData(rank_perskasusaktif, pb, isocode, zero) ."';";
$parse=$parse.            "hlload = '". getData(landing_table, pb, isocode, beban_rs) ."';";
$parse=$parse.            "break;";
$parse=$parse.    "}";
$parse=$parse.    "target.innerHTML=namaProv;";
$parse=$parse.    "object.addEventListener('mouseover', showPopup);";
$parse=$parse.    "object.addEventListener('mouseout', hidePopup);";
$parse=$parse.    "function showPopup() {";
$parse=$parse.        "var iconPos = object.getBoundingClientRect();";
$parse=$parse.        "target.style.left = ((iconPos.left )) + 'px';";
$parse=$parse.        "target.style.top = (window.scrollY + iconPos.top - 40 ) + 'px';";
$parse=$parse.        "target.style.display = 'block';";
$parse=$parse.    "}";
$parse=$parse.    "function hidePopup() {";
$parse=$parse.        "target.style.display = 'none';";
$parse=$parse.    "}";
$parse=$parse.    "var elname = document.getElementById('mapinfo_name');";
$parse=$parse.    "var elcases = document.getElementById('mapinfo_case');";
$parse=$parse.    "var eldeath = document.getElementById('mapinfo_death');";
$parse=$parse.    "var elrecover = document.getElementById('mapinfo_recover');";
$parse=$parse.    "var elonemil = document.getElementById('mapinfo_onemil');";
$parse=$parse.    "var eldeathrate = document.getElementById('mapinfo_deathrate');";
$parse=$parse.    "var elrecrate = document.getElementById('mapinfo_recrate');";
$parse=$parse.    "var elactivecase = document.getElementById('mapinfo_activecase');";
$parse=$parse.    "var elhlload = document.getElementById('mapinfo_hlload');";
$parse=$parse.    "elname.innerHTML=name;";
$parse=$parse.    "elcases.innerHTML=cases;";
$parse=$parse.    "eldeath.innerHTML=death;";
$parse=$parse.    "elrecover.innerHTML=recover;";
$parse=$parse.    "elonemil.innerHTML=onemil;";
$parse=$parse.    "eldeathrate.innerHTML=deathrate;";
$parse=$parse.    "elrecrate.innerHTML=recrate;";
$parse=$parse.    "elactivecase.innerHTML=activecase;";
$parse=$parse.    "elhlload.innerHTML=hlload;";
$parse=$parse."}";

return $parse;

}
function cacheLandingMapsDisplayScript(){
    include_once('connect.php');
    $fetch='';
    
    $fetch=$fetch."var sample=document.getElementById('testdate');function dateSpell(a,i){var e=a;var c=e.charAt(0)+e.charAt(1)+e.charAt(2)+e.charAt(3);var b=e.charAt(5)+e.charAt(6);var k=e.charAt(8)+e.charAt(9);var j=new Date(c,b-1,k);var g=j.getFullYear();var f=j.getMonth();var h=j.getDate();var d;switch(f){case 0:d='Januari';break;case 1:d='Februari';break;case 2:d='Maret';break;case 3:d='April';break;case 4:d='Mei';break;case 5:d='Juni';break;case 6:d='Juli';break;case 7:d='Agustus';break;case 8:d='September';break;case 9:d='Oktober';break;case 10:d='November';break;case 11:d='Desember';break}if(i==='y'){return(h+' '+d+' '+g)}else{if(i==='n'){return(h+' '+d)}}}function changeInnerHTML(c,b){var a=document.getElementById(c);a.innerHTML(b)}var minval0='". getData(landing_maps, totalkasus, datatype, minval0) ."';var maxval0='". getData(landing_maps, totalkasus, datatype, maxval0) ."';var minval14='". getData(landing_maps, totalkasus, datatype, minval14) ."';var maxval14='". getData(landing_maps, totalkasus, datatype, maxval14) ."';var minval28='". getData(landing_maps, totalkasus, datatype, minval28) ."';var maxval28='". getData(landing_maps, totalkasus, datatype, maxval28) ."';var minval42='". getData(landing_maps, totalkasus, datatype, minval42) ."';var maxval42='". getData(landing_maps, totalkasus, datatype, maxval42) ."';var minval56='". getData(landing_maps, totalkasus, datatype, minval56) ."';var maxval56='". getData(landing_maps, totalkasus, datatype, maxval56) ."';var offset0='". getData(landing_maps, totalkasus, datatype, hsl0) ."';var offset14='". getData(landing_maps, totalkasus, datatype, hsl14) ."';var offset28='". getData(landing_maps, totalkasus, datatype, hsl28) ."';var offset42='". getData(landing_maps, totalkasus, datatype, hsl42) ."';var offset56='". getData(landing_maps, totalkasus, datatype, hsl56) ."';function highlightReset(){document.querySelector('#doffset0').className='date-sw-active';document.querySelector('#doffset14').className='date-sw';document.querySelector('#doffset28').className='date-sw';document.querySelector('#doffset42').className='date-sw';document.querySelector('#doffset56').className='date-sw'}function dataSw(d){var a=document.getElementById('minval');var c=document.getElementById('maxval');var b=document.getElementById('currentdata');var e=document.getElementById('mapstyle');if(d==='totalkasus'){highlightReset();b.innerHTML='Total Kasus';document.querySelector('#totalkasus').className='data-sw-active';document.querySelector('#kasus1juta').className='data-sw';document.querySelector('#tingkatkematian').className='data-sw';document.querySelector('#tingkatkesembuhan').className='data-sw';document.querySelector('#totalkematian').className='data-sw';document.querySelector('#totalkesembuhan').className='data-sw';document.querySelector('#dalamperawatan').className='data-sw';document.querySelector('#bebanrumahsakit').className='data-sw';offset0='". getData(landing_maps, totalkasus, datatype, hsl0) ."';offset14='". getData(landing_maps, totalkasus, datatype, hsl14) ."';offset28='". getData(landing_maps, totalkasus, datatype, hsl28) ."';offset42='". getData(landing_maps, totalkasus, datatype, hsl42) ."';offset56='". getData(landing_maps, totalkasus, datatype, hsl56) ."';minval0='". getData(landing_maps, totalkasus, datatype, minval0) ."';maxval0='". getData(landing_maps, totalkasus, datatype, maxval0) ."';minval14='". getData(landing_maps, totalkasus, datatype, minval14) ."';maxval14='". getData(landing_maps, totalkasus, datatype, maxval14) ."';minval28='". getData(landing_maps, totalkasus, datatype, minval28) ."';maxval28='". getData(landing_maps, totalkasus, datatype, maxval28) ."';minval42='". getData(landing_maps, totalkasus, datatype, minval42) ."';maxval42='". getData(landing_maps, totalkasus, datatype, maxval42) ."';minval56='". getData(landing_maps, totalkasus, datatype, minval56) ."';maxval56='". getData(landing_maps, totalkasus, datatype, maxval56) ."';e.innerHTML=offset0;a.innerHTML=minval0;c.innerHTML=maxval0}else{if(d==='kasus1juta'){highlightReset();b.innerHTML='Kasus /1 Juta';document.querySelector('#totalkasus').className='data-sw';document.querySelector('#kasus1juta').className='data-sw-active';document.querySelector('#tingkatkematian').className='data-sw';document.querySelector('#tingkatkesembuhan').className='data-sw';document.querySelector('#totalkematian').className='data-sw';document.querySelector('#totalkesembuhan').className='data-sw';document.querySelector('#dalamperawatan').className='data-sw';document.querySelector('#bebanrumahsakit').className='data-sw';offset0='". getData(landing_maps, kasus1juta, datatype, hsl0) ."';offset14='". getData(landing_maps, kasus1juta, datatype, hsl14) ."';offset28='". getData(landing_maps, kasus1juta, datatype, hsl28) ."';offset42='". getData(landing_maps, kasus1juta, datatype, hsl42) ."';offset56='". getData(landing_maps, kasus1juta, datatype, hsl56) ."';minval0='". getData(landing_maps, kasus1juta, datatype, minval0) ."';maxval0='". getData(landing_maps, kasus1juta, datatype, maxval0) ."';minval14='". getData(landing_maps, kasus1juta, datatype, minval14) ."';maxval14='". getData(landing_maps, kasus1juta, datatype, maxval14) ."';minval28='". getData(landing_maps, kasus1juta, datatype, minval28) ."';maxval28='". getData(landing_maps, kasus1juta, datatype, maxval28) ."';minval42='". getData(landing_maps, kasus1juta, datatype, minval42) ."';maxval42='". getData(landing_maps, kasus1juta, datatype, maxval42) ."';minval56='". getData(landing_maps, kasus1juta, datatype, minval56) ."';maxval56='". getData(landing_maps, kasus1juta, datatype, maxval56) ."';e.innerHTML=offset0;a.innerHTML=minval0;c.innerHTML=maxval0}else{if(d==='tingkatkematian'){highlightReset();b.innerHTML='Tingkat Kematian';document.querySelector('#totalkasus').className='data-sw';document.querySelector('#kasus1juta').className='data-sw';document.querySelector('#tingkatkematian').className='data-sw-active';document.querySelector('#tingkatkesembuhan').className='data-sw';document.querySelector('#totalkematian').className='data-sw';document.querySelector('#totalkesembuhan').className='data-sw';document.querySelector('#dalamperawatan').className='data-sw';document.querySelector('#bebanrumahsakit').className='data-sw';offset0='". getData(landing_maps, tingkatkematian, datatype, hsl0) ."';offset14='". getData(landing_maps, tingkatkematian, datatype, hsl14) ."';offset28='". getData(landing_maps, tingkatkematian, datatype, hsl28) ."';offset42='". getData(landing_maps, tingkatkematian, datatype, hsl42) ."';offset56='". getData(landing_maps, tingkatkematian, datatype, hsl56) ."';minval0='". getData(landing_maps, tingkatkematian, datatype, minval0) ."';maxval0='". getData(landing_maps, tingkatkematian, datatype, maxval0) ."';minval14='". getData(landing_maps, tingkatkematian, datatype, minval14) ."';maxval14='". getData(landing_maps, tingkatkematian, datatype, maxval14) ."';minval28='". getData(landing_maps, tingkatkematian, datatype, minval28) ."';maxval28='". getData(landing_maps, tingkatkematian, datatype, maxval28) ."';minval42='". getData(landing_maps, tingkatkematian, datatype, minval42) ."';maxval42='". getData(landing_maps, tingkatkematian, datatype, maxval42) ."';minval56='". getData(landing_maps, tingkatkematian, datatype, minval56) ."';maxval56='". getData(landing_maps, tingkatkematian, datatype, maxval56) ."';e.innerHTML=offset0;a.innerHTML=minval0;c.innerHTML=maxval0}else{if(d==='tingkatkesembuhan'){highlightReset();b.innerHTML='Tingkat Kesembuhan';document.querySelector('#totalkasus').className='data-sw';document.querySelector('#kasus1juta').className='data-sw';document.querySelector('#tingkatkematian').className='data-sw';document.querySelector('#tingkatkesembuhan').className='data-sw-active';document.querySelector('#totalkematian').className='data-sw';document.querySelector('#totalkesembuhan').className='data-sw';document.querySelector('#dalamperawatan').className='data-sw';document.querySelector('#bebanrumahsakit').className='data-sw';offset0='". getData(landing_maps, tingkatkesembuhan, datatype, hsl0) ."';offset14='". getData(landing_maps, tingkatkesembuhan, datatype, hsl14) ."';offset28='". getData(landing_maps, tingkatkesembuhan, datatype, hsl28) ."';offset42='". getData(landing_maps, tingkatkesembuhan, datatype, hsl42) ."';offset56='". getData(landing_maps, tingkatkesembuhan, datatype, hsl56) ."';minval0='". getData(landing_maps, tingkatkesembuhan, datatype, minval0) ."';maxval0='". getData(landing_maps, tingkatkesembuhan, datatype, maxval0) ."';minval14='". getData(landing_maps, tingkatkesembuhan, datatype, minval14) ."';maxval14='". getData(landing_maps, tingkatkesembuhan, datatype, maxval14) ."';minval28='". getData(landing_maps, tingkatkesembuhan, datatype, minval28) ."';maxval28='". getData(landing_maps, tingkatkesembuhan, datatype, maxval28) ."';minval42='". getData(landing_maps, tingkatkesembuhan, datatype, minval42) ."';maxval42='". getData(landing_maps, tingkatkesembuhan, datatype, maxval42) ."';minval56='". getData(landing_maps, tingkatkesembuhan, datatype, minval56) ."';maxval56='". getData(landing_maps, tingkatkesembuhan, datatype, maxval56) ."';e.innerHTML=offset0;a.innerHTML=minval0;c.innerHTML=maxval0}else{if(d==='totalkematian'){highlightReset();b.innerHTML='Total Kematian';document.querySelector('#totalkasus').className='data-sw';document.querySelector('#kasus1juta').className='data-sw';document.querySelector('#tingkatkematian').className='data-sw';document.querySelector('#tingkatkesembuhan').className='data-sw';document.querySelector('#totalkematian').className='data-sw-active';document.querySelector('#totalkesembuhan').className='data-sw';document.querySelector('#dalamperawatan').className='data-sw';document.querySelector('#bebanrumahsakit').className='data-sw';offset0='". getData(landing_maps, totalkematian, datatype, hsl0) ."';offset14='". getData(landing_maps, totalkematian, datatype, hsl14) ."';offset28='". getData(landing_maps, totalkematian, datatype, hsl28) ."';offset42='". getData(landing_maps, totalkematian, datatype, hsl42) ."';offset56='". getData(landing_maps, totalkematian, datatype, hsl56) ."';minval0='". getData(landing_maps, totalkematian, datatype, minval0) ."';maxval0='". getData(landing_maps, totalkematian, datatype, maxval0) ."';minval14='". getData(landing_maps, totalkematian, datatype, minval14) ."';maxval14='". getData(landing_maps, totalkematian, datatype, maxval14) ."';minval28='". getData(landing_maps, totalkematian, datatype, minval28) ."';maxval28='". getData(landing_maps, totalkematian, datatype, maxval28) ."';minval42='". getData(landing_maps, totalkematian, datatype, minval42) ."';maxval42='". getData(landing_maps, totalkematian, datatype, maxval42) ."';minval56='". getData(landing_maps, totalkematian, datatype, minval56) ."';maxval56='". getData(landing_maps, totalkematian, datatype, maxval56) ."';e.innerHTML=offset0;a.innerHTML=minval0;c.innerHTML=maxval0}else{if(d==='totalkesembuhan'){highlightReset();b.innerHTML='Total Kesembuhan';document.querySelector('#totalkasus').className='data-sw';document.querySelector('#kasus1juta').className='data-sw';document.querySelector('#tingkatkematian').className='data-sw';document.querySelector('#tingkatkesembuhan').className='data-sw';document.querySelector('#totalkematian').className='data-sw';document.querySelector('#totalkesembuhan').className='data-sw-active';document.querySelector('#dalamperawatan').className='data-sw';document.querySelector('#bebanrumahsakit').className='data-sw';offset0='". getData(landing_maps, totalkesembuhan, datatype, hsl0) ."';offset14='". getData(landing_maps, totalkesembuhan, datatype, hsl14) ."';offset28='". getData(landing_maps, totalkesembuhan, datatype, hsl28) ."';offset42='". getData(landing_maps, totalkesembuhan, datatype, hsl42) ."';offset56='". getData(landing_maps, totalkesembuhan, datatype, hsl56) ."';minval0='". getData(landing_maps, totalkesembuhan, datatype, minval0) ."';maxval0='". getData(landing_maps, totalkesembuhan, datatype, maxval0) ."';minval14='". getData(landing_maps, totalkesembuhan, datatype, minval14) ."';maxval14='". getData(landing_maps, totalkesembuhan, datatype, maxval14) ."';minval28='". getData(landing_maps, totalkesembuhan, datatype, minval28) ."';maxval28='". getData(landing_maps, totalkesembuhan, datatype, maxval28) ."';minval42='". getData(landing_maps, totalkesembuhan, datatype, minval42) ."';maxval42='". getData(landing_maps, totalkesembuhan, datatype, maxval42) ."';minval56='". getData(landing_maps, totalkesembuhan, datatype, minval56) ."';maxval56='". getData(landing_maps, totalkesembuhan, datatype, maxval56) ."';e.innerHTML=offset0;a.innerHTML=minval0;c.innerHTML=maxval0}else{if(d==='dalamperawatan'){highlightReset();b.innerHTML='Dalam Perawatan';document.querySelector('#totalkasus').className='data-sw';document.querySelector('#kasus1juta').className='data-sw';document.querySelector('#tingkatkematian').className='data-sw';document.querySelector('#tingkatkesembuhan').className='data-sw';document.querySelector('#totalkematian').className='data-sw';document.querySelector('#totalkesembuhan').className='data-sw';document.querySelector('#dalamperawatan').className='data-sw-active';document.querySelector('#bebanrumahsakit').className='data-sw';offset0='". getData(landing_maps, dalamperawatan, datatype, hsl0) ."';offset14='". getData(landing_maps, dalamperawatan, datatype, hsl14) ."';offset28='". getData(landing_maps, dalamperawatan, datatype, hsl28) ."';offset42='". getData(landing_maps, dalamperawatan, datatype, hsl42) ."';offset56='". getData(landing_maps, dalamperawatan, datatype, hsl56) ."';minval0='". getData(landing_maps, dalamperawatan, datatype, minval0) ."';maxval0='". getData(landing_maps, dalamperawatan, datatype, maxval0) ."';minval14='". getData(landing_maps, dalamperawatan, datatype, minval14) ."';maxval14='". getData(landing_maps, dalamperawatan, datatype, maxval14) ."';minval28='". getData(landing_maps, dalamperawatan, datatype, minval28) ."';maxval28='". getData(landing_maps, dalamperawatan, datatype, maxval28) ."';minval42='". getData(landing_maps, dalamperawatan, datatype, minval42) ."';maxval42='". getData(landing_maps, dalamperawatan, datatype, maxval42) ."';minval56='". getData(landing_maps, dalamperawatan, datatype, minval56) ."';maxval56='". getData(landing_maps, dalamperawatan, datatype, maxval56) ."';e.innerHTML=offset0;a.innerHTML=minval0;c.innerHTML=maxval0}else{if(d==='bebanrumahsakit'){highlightReset();b.innerHTML='Beban Rumah Sakit';document.querySelector('#totalkasus').className='data-sw';document.querySelector('#kasus1juta').className='data-sw';document.querySelector('#tingkatkematian').className='data-sw';document.querySelector('#tingkatkesembuhan').className='data-sw';document.querySelector('#totalkematian').className='data-sw';document.querySelector('#totalkesembuhan').className='data-sw';document.querySelector('#dalamperawatan').className='data-sw';document.querySelector('#bebanrumahsakit').className='data-sw-active';offset0='". getData(landing_maps, bebanrumahsakit, datatype, hsl0) ."';offset14='". getData(landing_maps, bebanrumahsakit, datatype, hsl14) ."';offset28='". getData(landing_maps, bebanrumahsakit, datatype, hsl28) ."';offset42='". getData(landing_maps, bebanrumahsakit, datatype, hsl42) ."';offset56='". getData(landing_maps, bebanrumahsakit, datatype, hsl56) ."';minval0='". getData(landing_maps, bebanrumahsakit, datatype, minval0) ."';maxval0='". getData(landing_maps, bebanrumahsakit, datatype, maxval0) ."';minval14='". getData(landing_maps, bebanrumahsakit, datatype, minval14) ."';maxval14='". getData(landing_maps, bebanrumahsakit, datatype, maxval14) ."';minval28='". getData(landing_maps, bebanrumahsakit, datatype, minval28) ."';maxval28='". getData(landing_maps, bebanrumahsakit, datatype, maxval28) ."';minval42='". getData(landing_maps, bebanrumahsakit, datatype, minval42) ."';maxval42='". getData(landing_maps, bebanrumahsakit, datatype, maxval42) ."';minval56='". getData(landing_maps, bebanrumahsakit, datatype, minval56) ."';maxval56='". getData(landing_maps, bebanrumahsakit, datatype, maxval56) ."';e.innerHTML=offset0;a.innerHTML=minval0;c.innerHTML=maxval0}}}}}}}}}function dateSw(e){var a=document.getElementById('minval');var b=document.getElementById('maxval');var c=document.getElementById('mapstyle');var d=document.getElementById('currentdate');if(e===0){a.innerHTML=minval0;b.innerHTML=maxval0;c.innerHTML=offset0;d.innerHTML=dateSpell('". dateEdit(getLastDate(),1) ."','y');document.querySelector('#doffset0').className='date-sw-active';document.querySelector('#doffset14').className='date-sw';document.querySelector('#doffset28').className='date-sw';document.querySelector('#doffset42').className='date-sw';document.querySelector('#doffset56').className='date-sw'}else{if(e===14){a.innerHTML=minval14;b.innerHTML=maxval14;c.innerHTML=offset14;d.innerHTML=dateSpell('". dateEdit(getLastDate(),15) ."','y');document.querySelector('#doffset0').className='date-sw';document.querySelector('#doffset14').className='date-sw-active';document.querySelector('#doffset28').className='date-sw';document.querySelector('#doffset42').className='date-sw';document.querySelector('#doffset56').className='date-sw'}else{if(e===28){a.innerHTML=minval28;b.innerHTML=maxval28;c.innerHTML=offset28;d.innerHTML=dateSpell('". dateEdit(getLastDate(),29) ."','y');document.querySelector('#doffset0').className='date-sw';document.querySelector('#doffset14').className='date-sw';document.querySelector('#doffset28').className='date-sw-active';document.querySelector('#doffset42').className='date-sw';document.querySelector('#doffset56').className='date-sw'}else{if(e===42){a.innerHTML=minval42;b.innerHTML=maxval42;c.innerHTML=offset42;d.innerHTML=dateSpell('". dateEdit(getLastDate(),43) ."','y');document.querySelector('#doffset0').className='date-sw';document.querySelector('#doffset14').className='date-sw';document.querySelector('#doffset28').className='date-sw';document.querySelector('#doffset42').className='date-sw-active';document.querySelector('#doffset56').className='date-sw'}else{if(e===56){a.innerHTML=minval56;b.innerHTML=maxval56;c.innerHTML=offset56;d.innerHTML=dateSpell('". dateEdit(getLastDate(),57) ."','y');document.querySelector('#doffset0').className='date-sw';document.querySelector('#doffset14').className='date-sw';document.querySelector('#doffset28').className='date-sw';document.querySelector('#doffset42').className='date-sw';document.querySelector('#doffset56').className='date-sw-active'}else{d.innerHTML='Terjadi kesalahan, silakan muat ulang halaman'}}}}}};";
    
    return $fetch;
}
function cacheLandingTable(){
    include_once('connect.php');
    $global=array('wl','AMRO','EURO','EMRO','SEARO','AFRO','WPRO');
    $region=array(
        'sumatera' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jawa' => 'bt|jb|jk|jt|ji|yo',
        'kalimantan' => 'kb|kt|ks|ki|ku',
        'sulawesi' => 'sa|st|sr|sg|sn|go',
        'malukupapua' => 'mu|ma|pb|pa',
        'balinusatenggara' => 'ba|nt|nb');
    $inputColumnRG=array('landingtable3','landingtable4','landingtable5','landingtable6','landingtable7','landingtable8','landingtable9');
    $combinedResult='';
    $updateResult='';
    foreach($global as $code){
        $fetchResult='';
        $internalLink=getData(landing_table, $code, isocode, internal_link);
        $namaDaerah=getData(landing_table, $code, isocode, nama_daerah);
        $t=getData(landing_table, $code, isocode, t);
        $t_inc=getData(landing_table, $code, isocode, t_inc);
        $tr=getData(landing_table, $code, isocode, tr);
        $tr_inc=getData(landing_table, $code, isocode, tr_inc);
        $td=getData(landing_table, $code, isocode, td);
        $td_inc=getData(landing_table, $code, isocode, td_inc);
        $ld_sd=dateMD(getData(landing_table, $code, isocode, ld_sd));
        $ld_ed=dateMD(getData(landing_table, $code, isocode, ld_ed));
        $ld_inctrend=getData(landing_table, $code, isocode, tren_pertambahan);
        $dc_inctrend=arrayDecodeDelimiter2($ld_inctrend);
        $fetchResult=$fetchResult."<tr class='click-point' onclick=\"window.location='".$internalLink."'\">";
        $fetchResult=$fetchResult."<td class='ld-trend-cell ld-nlb text-center'><svg xmlns='http://www.w3.org/2000/svg' height='45' width='255' viewBox='0 0 255 45' style='background-color:#EDF5EE'><g transform='translate(0 0)' stroke-width='2.5px'>".$dc_inctrend."</g></svg></td>";
        $fetchResult=$fetchResult."<td>".$namaDaerah."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$t."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$t_inc."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$tr."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$tr_inc."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$td."</td>";
        $fetchResult=$fetchResult."<td class='ld-nrb text-right'>".$td_inc."</td>";
        $fetchResult=$fetchResult."</tr>";
        $combinedResult=$combinedResult.$fetchResult;
        
    }

    
    $encode=arrayEncodeDelimiter2($combinedResult);
    //Update Data Table 1
    $update=updateData(display_cache, landingtable1, display, $encode, data);
    $updateResult=$updateResult.$update;
    
    

    $fetchResult='';
    
        $internalLink=getData(landing_table, id, isocode, internal_link);
        $namaDaerah=getData(landing_table, id, isocode, nama_daerah);
        $t=getData(landing_table, id, isocode, t);
        $t_inc=getData(landing_table, id, isocode, t_inc);
        $tr=getData(landing_table, id, isocode, tr);
        $tr_inc=getData(landing_table, id, isocode, tr_inc);
        $td=getData(landing_table, id, isocode, td);
        $td_inc=getData(landing_table, id, isocode, td_inc);
        $ld_sd=dateMD(getData(landing_table, id, isocode, ld_sd));
        $ld_ed=dateMD(getData(landing_table, id, isocode, ld_ed));
        $ld_inctrend=getData(landing_table, id, isocode, tren_pertambahan);
        $dc_inctrend=arrayDecodeDelimiter2($ld_inctrend);
        $fetchResult=$fetchResult."<tr class='click-point' onclick=\"window.location='".$internalLink."'\">";
        $fetchResult=$fetchResult."<td class='ld-trend-cell ld-nlb text-center'><svg xmlns='http://www.w3.org/2000/svg' height='45' width='255' viewBox='0 0 255 45' style='background-color:#EDF5EE'><g transform='translate(0 0)' stroke-width='2.5px'>".$dc_inctrend."</g></svg></td>";
        $fetchResult=$fetchResult."<td>".$namaDaerah."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$t."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$t_inc."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$tr."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$tr_inc."</td>";
        $fetchResult=$fetchResult."<td class='text-right'>".$td."</td>";
        $fetchResult=$fetchResult."<td class='ld-nrb text-right'>".$td_inc."</td>";
        $fetchResult=$fetchResult."</tr>";
    
    
    $encode=arrayEncodeDelimiter2($fetchResult);
    //Update Data Table 2
    $update=updateData(display_cache, landingtable2, display, $encode, data);
    $updateResult=$updateResult.$update;
    
    
    //Tampilkan Data Berdasarkan Urutan Tertinggi ke Rendah
    $totalKasusTertinggi=getData(rank_urutan_dynamic, rank_totalkasus, nama_tabel, zero);
    $decodeKasusTertinggi=arrayDecodeDelimiter($totalKasusTertinggi);
    $arrayKasus1=array();
    $arrayKasus2=array();
    $arrayKasus3=array();
    $arrayKasus4=array();
    $arrayKasus5=array();
    $arrayKasus6=array();
    $arrayKasus7=array();
    for($i=0; $i<5;$i++){
        array_push($arrayKasus1, $decodeKasusTertinggi[$i]);
    }
    for($i=5; $i<10;$i++){
        array_push($arrayKasus2, $decodeKasusTertinggi[$i]);
    }
    for($i=10; $i<15;$i++){
        array_push($arrayKasus3, $decodeKasusTertinggi[$i]);
    }
    for($i=15; $i<20;$i++){
        array_push($arrayKasus4, $decodeKasusTertinggi[$i]);
    }
    for($i=20; $i<25;$i++){
        array_push($arrayKasus5, $decodeKasusTertinggi[$i]);
    }
    for($i=25; $i<30;$i++){
        array_push($arrayKasus6, $decodeKasusTertinggi[$i]);
    }
    for($i=30; $i<34;$i++){
        array_push($arrayKasus7, $decodeKasusTertinggi[$i]);
    }
    $arrayCaseGroupByRank=array();
    array_push($arrayCaseGroupByRank, $arrayKasus1);
    array_push($arrayCaseGroupByRank, $arrayKasus2);
    array_push($arrayCaseGroupByRank, $arrayKasus3);
    array_push($arrayCaseGroupByRank, $arrayKasus4);
    array_push($arrayCaseGroupByRank, $arrayKasus5);
    array_push($arrayCaseGroupByRank, $arrayKasus6);
    array_push($arrayCaseGroupByRank, $arrayKasus7);
    
    //Fetch & Update Data Table 3-9
    $i=0;
    foreach($arrayCaseGroupByRank as $list){
        //$isocode=arrayDecodeDelimiter($list);
        $column=$inputColumnRG[$i];
        $fetchResult='';
        foreach($list as $code){
            //if(in_array($code, $arrayKasusTertinggi)){
            //    continue;
            //}
            $internalLink=getData(landing_table, $code, isocode, internal_link);
            $namaDaerah=getData(landing_table, $code, isocode, nama_daerah);
            $t=getData(landing_table, $code, isocode, t);
            $t_inc=getData(landing_table, $code, isocode, t_inc);
            $tr=getData(landing_table, $code, isocode, tr);
            $tr_inc=getData(landing_table, $code, isocode, tr_inc);
            $td=getData(landing_table, $code, isocode, td);
            $td_inc=getData(landing_table, $code, isocode, td_inc);
            $ld_sd=dateMD(getData(landing_table, $code, isocode, ld_sd));
            $ld_ed=dateMD(getData(landing_table, $code, isocode, ld_ed));
            $ld_inctrend=getData(landing_table, $code, isocode, tren_pertambahan);
            $dc_inctrend=arrayDecodeDelimiter2($ld_inctrend);
            $fetchResult=$fetchResult."<tr class='click-point' onclick=\"window.location='".$internalLink."'\">";
            $fetchResult=$fetchResult."<td class='ld-trend-cell ld-nlb text-center'><svg xmlns='http://www.w3.org/2000/svg' height='45' width='255' viewBox='0 0 255 45' style='background-color:#EDF5EE'><g transform='translate(0 0)' stroke-width='2.5px'>".$dc_inctrend."</g></svg></td>";
            $fetchResult=$fetchResult."<td>".$namaDaerah."</td>";
            $fetchResult=$fetchResult."<td class='text-right'>".$t."</td>";
            $fetchResult=$fetchResult."<td class='text-right'>".$t_inc."</td>";
            $fetchResult=$fetchResult."<td class='text-right'>".$tr."</td>";
            $fetchResult=$fetchResult."<td class='text-right'>".$tr_inc."</td>";
            $fetchResult=$fetchResult."<td class='text-right'>".$td."</td>";
            $fetchResult=$fetchResult."<td class='ld-nrb text-right'>".$td_inc."</td>";
            $fetchResult=$fetchResult."</tr>";
        }
        
        //$combinedResult=$combinedResult.$fetchResult;
        $encode=arrayEncodeDelimiter2($fetchResult);
        $update=updateData(display_cache, $column, display, $encode, data);
        $updateResult=$updateResult.$update;
        $i++;
        //echo $column;
    }
    //echo $combinedResult;
    return $updateResult;
}
function storeCachedData($fname,$columCache){
    include_once('connect.php');
    //Fetching Data
    $fetch=$fname();
    //Delimiting Data
    $delim=arrayEncodeDelimiter2($fetch);
    //Storing Data
    $store=updateData(display_cache, $columCache, display, $delim,data);
    return $store;
    
}
function cacheLandingKasusSatuJuta(){
    include_once('connect.php');
    $getOrder=getData(rank_urutan_dynamic, rank_kasusper1juta, nama_tabel, zero);
    $decode=arrayDecodeDelimiter($getOrder);
    $active="<img style='padding:6px 1px 9px 0px' src='img/asset/landing/casemil/man%20orange%20xxs.svg' alt='active illustration'>";
    $recovered="<img style='padding:6px 1px 9px 0px' src='img/asset/landing/casemil/man%20green%20xxs.svg' alt='recovered illustration'>";
    $death="<img style='padding:6px 1px 9px 0px' src='img/asset/landing/casemil/man%20black%20xxs.svg' alt='death illustration'>";
    $result='';
    $ic=0;
    foreach($decode as $code){
        $namaDaerah=getData(landing_table, $code, isocode, nama_daerah);
        $link=getData(landing_table, $code, isocode, internal_link);
        $t_1jt=getData(landing_table, $code, isocode, t_1jt);
        $t_1jt_gbr=getData(landing_table, $code, isocode, t_1jt_gbr);
        $td_1jt_gbr=getData(landing_table, $code, isocode, td_1jt_gbr);
        $tr_1jt_gbr=getData(landing_table, $code, isocode, tr_1jt_gbr);
        $status=getData(rank_kasusper1juta, $code, isocode, zero_s);
            if($status==0){
                $status='lower.svg';
                $status_alt='peringkat lebih kecil dari kemarin';
            }else if($status==1){
                $status='equal.svg';
                $status_alt='peringkat sama dengan kemarin';
            }else if($status==2){
                $status='bigger.svg';
                $status_alt='peringkat lebih besar daripada kemarin';
            }
        $result=$result. "<div>";
        $result=$result.     "<a href='".$link."' class='a-none'><span class='cl-aqua-forest' style='font-size:18px; margin-right:7px; display:inline-block; width:200px;'><img style='margin-right:8px;' src='img/asset/regrank/".$status."' alt='".$status_alt."'>".$namaDaerah."</span>";
        //$result=$result.     "<div>";
        //Active Case Loop
        for($i=0; $i<$t_1jt_gbr; $i++){
            $result=$result. $active;
        }
        //Recovered Case Loop
        for($i=0; $i<$tr_1jt_gbr; $i++){
            $result=$result. $recovered;
        }
        //Dead Case Loop
        for($i=0; $i<$td_1jt_gbr; $i++){
            $result=$result. $death;
        }
        //echo $resA.$resR.$resD;
        $result=$result.         "<span class='ml10' style='font-size:18px; color:#979797'>".$t_1jt."</span>";
        //$result=$result.     "</div>";
        $result=$result. "</a></div>";
        $ic++;
        if($ic==8){
            $resultDelim=arrayEncodeDelimiter2($result);
            $update=updateData(display_cache, landingkasussatujuta1, display, $resultDelim, data);
            $result='';
        }else if($ic>=33){
            $resultDelim=arrayEncodeDelimiter2($result);
            $update=updateData(display_cache, landingkasussatujuta2, display, $resultDelim, data);
        }
    }
    
    return $update;
}
function cacheLandingBebasRsCss(){
    include_once('connect.php');
    $isocode=getCode(rg);
    $result='';
    foreach($isocode as $code){
        $hsl=getData(landing_table, $code, isocode, hsl_beban_rs);
        $result=$result. ".hl-".$code."{background-color:".$hsl."}";
    }
    $resultDelim=arrayEncodeDelimiter2($result);
    $update=updateData(display_cache, landingbebasrscss, display, $resultDelim, data);
    return $update;
}
function cacheLandingJarakAman(){
    include_once('connect.php');
    $getOrder=getData(rank_urutan_dynamic, rank_jarak1pasien, nama_tabel, zero);
    $decode=arrayDecodeDelimiter($getOrder);
    $result='';
    foreach($decode as $code){
        $namaDaerah=getData(landing_table, $code, isocode, nama_daerah);
        $link=getData(landing_table, $code, isocode, internal_link);
        $jarak=getData(rank_jarak1pasien, $code, isocode, zero);
        $result=$result. "<a href='".$link."' class='a-none'><div class='ld-rpd2'>";
        $result=$result.      "<div class='mfr-f32 font-weight-bold cl-aqua-forest'><span class='cl-aqua-forest'>".$jarak."</span></div>";
        $result=$result.      "<div class='mfr-f16 cl-tangerine'><span class='cl-tangerine'>".$namaDaerah."</span></div>";
        $result=$result.      "<div><img src='img/asset/landing/next.svg' alt='safe radius'></div>";
        $result=$result.  "</a></div>";
    }
    $resultDelim=arrayEncodeDelimiter2($result);
    $update=updateData(display_cache, landingjarakaman, display, $resultDelim, data);
    return $update;
}
function casesWhoCorrection(){
    include_once('connect.php');
    $global=array('AMRO','EURO','EMRO','SEARO','AFRO','WPRO');
    $lastDate=getLastDateWHO();
    //Cases check
    foreach($global as $code){
        $complete=$code.'_t';
        $getValue=getData(cases_who, $lastDate, Date_reported, $complete);
        if($getValue==0){
            $editDate=dateEdit($lastDate,1);
            $getPastValue=getData(cases_who, $editDate, Date_reported, $complete);
            $update=updateData(cases_who, $lastDate, Date_reported, $getPastValue, $complete);
            $result=$result.$update;
        }
    }
    //Death check
    foreach($global as $code){
        $complete=$code.'_td';
        $getValue=getData(cases_who, $lastDate, Date_reported, $complete);
        if($getValue==0){
            $editDate=dateEdit($lastDate,1);
            $getPastValue=getData(cases_who, $editDate, Date_reported, $complete);
            $update=updateData(cases_who, $lastDate, Date_reported, $getPastValue, $complete);
            $result=$result.$update;
        }
    }
    //World cases correction
    $wlcase='';
    foreach($global as $code){
        $complete=$code.'_t';
        $getValue=getData(cases_who, $lastDate, Date_reported, $complete);
        $wlcase+=$getValue;
    }
    $update=updateData(cases_who, $lastDate, Date_reported, $wlcase, wl_t);
    $result=$result.$update;
    //World death correction
    $wlcase='';
    foreach($global as $code){
        $complete=$code.'_td';
        $getValue=getData(cases_who, $lastDate, Date_reported, $complete);
        $wlcase+=$getValue;
    }
    $update=updateData(cases_who, $lastDate, Date_reported, $wlcase, wl_td);
    $result=$result.$update;
    
    
    
    return $result;
}

































/*


$tableDynamic=array('rank_jarak1pasien','rank_bebanrs','rank_dokterpasien','rank_perawatpasien','rank_totalkasus','rank_pertambahankasus','rank_kematian','rank_pertambahankematian','rank_sembuh','rank_pertambahansembuh','rank_tingkatsembuh','rank_tingkatkematian','rank_kasusper1juta','rank_perstambahkematian','rank_perstambahsembuh','rank_perstambahkasus','rank_perskasusaktif','rank_sembuhmeninggal');

$tableStatic=array('jml_penduduk','luas_wilayah','jumlah_dokter','jumlah_perawat','jumlah_rs','rasio_tempat_tidur','jumlah_tempat_tidur','bor','waktu_rs');

$imageDynamic=array('tdr-keepdistance.svg','pp-hospitalload.svg','pp-doctor.svg','pp-nurse.svg','kv-totalcase.svg','kv-totalcaseup.svg','kv-totaldeath.svg','kv-totaldeathup.svg','kv-totalrecovery.svg','kv-totalrecoveryup.svg','pk-recoveryrate.svg','pk-deathrate.svg','pk-caseper1mil.svg','pk-percdeathup.svg','pk-percrecoveryup.svg','pk-perccaseup.svg','pk-percactivecase.svg','pk-recoveryperdeath.svg');
$imageStatic=array('kd-totalpopulation.svg','kd-provincearea.svg','kd-totaldoctor.svg','kd-totalnurse.svg','kd-totalhospital.svg','kd-bedratio.svg','kd-totalbed.svg','kd-bedoccupancyratio.svg','pp-timetohospital.svg');

$linkDynamic=array('peringkat?v=jarak1pasienpositifcorona','peringkat?v=bebanrumahsakit','peringkat?v=dokterper1pasienaktif','peringkat?v=perawatper1pasienaktif','peringkat?v=totalkasus','peringkat?v=pertambahankasusharian','peringkat?v=totalkematian','peringkat?v=pertambahankematian','peringkat?v=totalsembuh','peringkat?v=pertambahankesembuhan','peringkat?v=tingkatkesembuhan','peringkat?v=tingkatkematian','peringkat?v=kasusper1jutapenduduk','peringkat?v=persenpertambahankematian','peringkat?v=persenpertambahankesembuhan','peringkat?v=persenpertambahankasus','peringkat?v=persenkasusaktif','peringkat?v=kesembuhanperkematian');
$linkStatic=array('peringkat?v=jumlahpenduduk','peringkat?v=luaswilayah','peringkat?v=jumlahdokter','peringkat?v=jumlahperawat','peringkat?v=jumlahrumahsakit','peringkat?v=rasiotempattidur','peringkat?v=jumlahtempattidur','peringkat?v=rasioketerisiantempattidur','peringkat?v=waktumenujurs');

$descDynamic=array('Jarak 1 Pasien Positif Corona dari Anda','Beban Rumah Sakit','Dokter per 1 Pasien Aktif','Perawat per 1 Pasien Aktif','Total Kasus','Pertambahan Kasus Harian','Total Kematian','Pertambahan Kematian','Total Sembuh','Pertambahan Kesembuhan','Tingkat Kesembuhan','Tingkat Kematian','Kasus per 1 Juta Penduduk','% Pertambahan Kematian','% Pertambahan Kesembuhan','% Pertambahan Kasus','% Kasus Aktif','Kesembuhan/Kematian');
$descStatic=array('Jumlah Penduduk','Luas Wilayah','Jumlah Dokter','Jumlah Perawat','Jumlah Rumah Sakit','Rasio Tempat Tidur','Jumlah Tempat Tidur','Rasio Keterisian Tempat Tidur','Waktu Menuju RS');

$satDynamic=array('Jarak (km)','Beban (%)','Dokter/orang','Perawat/orang','Orang','Orang','Orang','Orang','Orang','Orang','Persen (%)','Persen (%)','Infeksi/1 Juta','Penambahan (%)','Penambahan (%)','Penambahan (%)','Persen (%)','Persen (%)');
$satStatic=array('Jiwa','km','Dokter','Perawat','Buah','Per 1000 orang','Tempat Tidur','Persen (%)','Waktu (menit)');

$i=0;
foreach($tableStatic as $table){
    updateData(rank_urutan_static,$table, nama_tabel, $satStatic[$i] ,satuan);
    updateData(rank_urutan_static,$table, nama_tabel, $imageStatic[$i] ,image);
    updateData(rank_urutan_static,$table, nama_tabel, $descStatic[$i] ,headline);
    updateData(rank_urutan_static,$table, nama_tabel, $linkStatic[$i] ,link);
    $i++;
}


*/







//$rg_landing_u=rgLandingUpdate();
//echo $rg_landing_u;

//$rg_view_u=rgViewUpdate();
//echo $rg_view_u;

//$rg_datavis_u=rgDatavisUpdate();
//echo $rg_datavis_u;


// Anywhere else in the script
//echo '<br><br><br>Total execution time in seconds: ' . (microtime(true) - $time_start);

?>