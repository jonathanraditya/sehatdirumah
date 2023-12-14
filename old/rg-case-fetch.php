<?php

//Initial Value
$database_iso_select='rg';
$date_accuracy_select='pr';

//Changing value based on input parameter
if ($database_iso_select=='gl'){
    $iso_database='isocode';
} else if($database_iso_select=='rg'){
    $iso_database='isocode_rg';
} else {
    echo 'Fill the requirement!';
}

require 'lang_assign.php';

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

//Assigning iso data
$isocode="select * from $iso_database";
$result_isocode=$con->query($isocode);

//Extract data from isocode
$isocode_id=array('ex'=>0);
$isocode_en=array('ex'=>0);
$isocode_stcode=array('ex'=>0);
while($row_isocode=$result_isocode->fetch_assoc()){
    $isocode_id+=array($row_isocode['iscode'] => $row_isocode['idname']);
    $isocode_en+=array($row_isocode['iscode'] => $row_isocode['enname']);
    array_push($isocode_stcode, $row_isocode['iscode']);
}

//Loop for every region
$allcase="select * from cases";
$result_allcase = $con->query($allcase);

//Extract data from cases
//[PENTING!] Extract Tanggal!
$tanggal=array('ex'=>0);
while($row_case1=$result_allcase->fetch_assoc()){
    array_push($tanggal, $row_case1['tanggal']);
}

//echo max($tanggal);
$last_date=max($tanggal);

if($date_accuracy_select=='td'){
    $today=new DateTime($last_date);
}else if($date_accuracy_select=='pr'){
    $today=new DateTime($last_date);
    $today->modify('-1 day');
    $last_date=$today->format('Y-m-d');
} else if($date_accuracy_select=='2pr'){
    $today=new DateTime($last_date);
    $today->modify('-2 day');
    $last_date=$today->format('Y-m-d');
} else{
    echo 'Fill the requirement!';
}

//echo $last_date;

//Previous Day
$prev_day=new DateTime($last_date);
$prev_day->modify('-1 day');
$prev_day_format=$prev_day->format('Y-m-d');
//Two Previous Day
$twoprev_day=new DateTime($last_date);
$twoprev_day->modify('-2 day');
$twoprev_day_format=$twoprev_day->format('Y-m-d');
//Past 7 Days
$sevenprev_day=new DateTime($last_date);
$sevenprev_day->modify('-7 day');
$sevenprev_day_format=$sevenprev_day->format('Y-m-d');

//echo $last_date;
//echo $prev_day_format;
//echo $twoprev_day_format;
//echo $sevenprev_day_format;

//Last Update Assign
//$today=new DateTime($last_date);
$bulan=$prev_day->format('m');
if($bulan<'10'){
    $bulan=$bulan[1];
}

$year=$prev_day->format('Y');
$day=$prev_day->modify('+1 day');
$day=$day->format('d');

if($dp['lang']=='1'){
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
} else if($dp['lang']=='0'){
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

if($dp['lang']=='1'){
    $dt_last_update='Update '. $day." ".$month_spell." ".$year;
} else{
    $dt_last_update='Update '. $month_spell." ".$day." ".$year;
}

//[PENTING!]Total Cases Array!!!!!
$total_case=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    //echo "kode : $rg_code<br>";
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_t';
    $cache_data="select * from cases where tanggal='$last_date'";
    $cache_data_result=$con->query($cache_data);
    while($row=$cache_data_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    $total_case+=array($rg_code => $last_data);
    //print_r($total_case);
    //echo $tcase_iso;
}

//[PENTING!]Case Increment Array!!!!!
$ld_caseinc=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    //echo "kode : $rg_code<br>";
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_t';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    $increment_case=$last_data-$prev_data;
    if($increment_case>=0){
        $increment_case='+'.$increment_case;
    }
    $ld_caseinc+=array($rg_code => $increment_case);
    //echo $tcase_iso;
}

//[PENTING!]Case Increment Array FPD!!!!!
$ld_caseinc_fpd=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    //echo "kode : $rg_code<br>";
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_t';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    //two previous case
    $cache_tpdata="select * from cases where tanggal='$twoprev_day_format'";
    $cache_tpdata_result=$con->query($cache_tpdata);
    while($rowp=$cache_tpdata_result->fetch_assoc()){
        $tprev_data=$rowp[$tcase_iso];
    }
    
    $pd_increment_case=$prev_data-$tprev_data;
    $increment_case=$last_data-$prev_data;
    $inc_fpd=$increment_case-$pd_increment_case;
    if($inc_fpd>=0){
        $inc_fpd='+'.$inc_fpd;
    }
    $ld_caseinc_fpd+=array($rg_code => $inc_fpd);

}

//[PENTING!]Total Death Array!!!!!
$total_death=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_td';
    $cache_data="select * from cases where tanggal='$last_date'";
    $cache_data_result=$con->query($cache_data);
    while($row=$cache_data_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    $total_death+=array($rg_code => $last_data);
}

//[PENTING!]Death Increment Array!!!!!
$ld_deathinc=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_td';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    $increment_case=$last_data-$prev_data;
    if($increment_case>=0){
        $increment_case='+'.$increment_case;
    }
    $ld_deathinc+=array($rg_code => $increment_case);
}

//[PENTING!]Death Increment Array FPD!!!!!
$ld_deathinc_fpd=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_td';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    //two previous case
    $cache_tpdata="select * from cases where tanggal='$twoprev_day_format'";
    $cache_tpdata_result=$con->query($cache_tpdata);
    while($rowp=$cache_tpdata_result->fetch_assoc()){
        $tprev_data=$rowp[$tcase_iso];
    }
    $pd_increment_case=$prev_data-$tprev_data;
    $increment_case=$last_data-$prev_data;
    $inc_fpd=$increment_case-$pd_increment_case;
    if($inc_fpd>=0){
        $inc_fpd='+'.$inc_fpd;
    }
    $ld_deathinc_fpd+=array($rg_code => $inc_fpd);
}

//[PENTING!]Total Recovery Array!!!!!
$total_recovery=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_tr';
    $cache_data="select * from cases where tanggal='$last_date'";
    $cache_data_result=$con->query($cache_data);
    while($row=$cache_data_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    $total_recovery+=array($rg_code => $last_data);
}

//[PENTING!]Recovery Increment Array!!!!!
$ld_recoveryinc=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_tr';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    $increment_case=$last_data-$prev_data;
    if($increment_case>=0){
        $increment_case='+'.$increment_case;
    }
    $ld_recoveryinc+=array($rg_code => $increment_case);
}

//[PENTING!]Recovery Increment Array FPD!!!!!
$ld_recoveryinc_fpd=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_tr';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    //two previous case
    $cache_tpdata="select * from cases where tanggal='$twoprev_day_format'";
    $cache_tpdata_result=$con->query($cache_tpdata);
    while($rowp=$cache_tpdata_result->fetch_assoc()){
        $tprev_data=$rowp[$tcase_iso];
    }
    $pd_increment_case=$prev_data-$tprev_data;
    $increment_case=$last_data-$prev_data;
    $inc_fpd=$increment_case-$pd_increment_case;
    if($inc_fpd>=0){
        $inc_fpd='+'.$inc_fpd;
    }
    $ld_recoveryinc_fpd+=array($rg_code => $inc_fpd);
}

//[PENTING!]Percent Increase Case Array!!!!!
$perc_caseinc=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_t';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    $increment_case=round(($last_data-$prev_data)/$prev_data,4)*100;
    if($increment_case>=0){
        $increment_case='+'.$increment_case;
    }
    $perc_caseinc+=array($rg_code => $increment_case);
}

//[PENTING!]Percent Increase (increment) Case Array!!!!!
$ldperc_caseinc=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_t';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    //two previous case
    $cache_tpdata="select * from cases where tanggal='$twoprev_day_format'";
    $cache_tpdata_result=$con->query($cache_tpdata);
    while($rowp=$cache_tpdata_result->fetch_assoc()){
        $twoprev_data=$rowp[$tcase_iso];
    }
    $last_increment_case=round(($prev_data-$twoprev_data)/$twoprev_data,4)*100;
    $increment_case=round(($last_data-$prev_data)/$prev_data,4)*100;
    $prev_increment=$increment_case-$last_increment_case;
    if($prev_increment>=0){
        $prev_increment='+'.$prev_increment;
    }
    $ldperc_caseinc+=array($rg_code => $prev_increment);
}

//[PENTING!]Percent Increase Death Array!!!!!
$perc_deathinc=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_td';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    $increment_case=round(($last_data-$prev_data)/$prev_data,4)*100;
    if($increment_case>=0){
        $increment_case='+'.$increment_case;
    }
    $perc_deathinc+=array($rg_code => $increment_case);
}

//[PENTING!]Percent Increase (increment) Death Array!!!!!
$ldperc_deathinc=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_td';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    //two previous case
    $cache_tpdata="select * from cases where tanggal='$twoprev_day_format'";
    $cache_tpdata_result=$con->query($cache_tpdata);
    while($rowp=$cache_tpdata_result->fetch_assoc()){
        $twoprev_data=$rowp[$tcase_iso];
    }
    $last_increment_case=round(($prev_data-$twoprev_data)/$twoprev_data,4)*100;
    $increment_case=round(($last_data-$prev_data)/$prev_data,4)*100;
    $prev_increment=$increment_case-$last_increment_case;
    if($prev_increment>=0){
        $prev_increment='+'.$prev_increment;
    }
    $ldperc_deathinc+=array($rg_code => $prev_increment);
}

//[PENTING!]Percent Increase Recovery Array!!!!!
$perc_recoveryinc=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_tr';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    $increment_case=round(($last_data-$prev_data)/$prev_data,4)*100;
    if($increment_case>=0){
        $increment_case='+'.$increment_case;
    }
    $perc_recoveryinc+=array($rg_code => $increment_case);
}

//[PENTING!]Percent Increase (increment) Recovery Array!!!!!
$ldperc_recoveryinc=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_tr';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$prev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    //two previous case
    $cache_tpdata="select * from cases where tanggal='$twoprev_day_format'";
    $cache_tpdata_result=$con->query($cache_tpdata);
    while($rowp=$cache_tpdata_result->fetch_assoc()){
        $twoprev_data=$rowp[$tcase_iso];
    }
    $last_increment_case=round(($prev_data-$twoprev_data)/$twoprev_data,4)*100;
    $increment_case=round(($last_data-$prev_data)/$prev_data,4)*100;
    $prev_increment=$increment_case-$last_increment_case;
    if($prev_increment>=0){
        $prev_increment='+'.$prev_increment;
    }
    $ldperc_recoveryinc+=array($rg_code => $prev_increment);
}

//[PENTING!]Kesembuhan/kematian!!!!!
$total_recdeath=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $trcase_iso=$rg_code.'_tr';
    $tdcase_iso=$rg_code.'_td';
    $trdcase_iso=$rg_code.'_trd';
    //Recovery case
    $cache_rdata="select * from cases where tanggal='$last_date'";
    $cache_rdata_result=$con->query($cache_rdata);
    while($row=$cache_rdata_result->fetch_assoc()){
        $recovery_data=$row[$trcase_iso];
    }
    //Death
    $cache_ddata="select * from cases where tanggal='$last_date'";
    $cache_ddata_result=$con->query($cache_ddata);
    while($rowp=$cache_ddata_result->fetch_assoc()){
        $death_data=$rowp[$tdcase_iso];
    }
    $recdeath_case=round($recovery_data/($death_data+$recovery_data),4)*100;
    $total_recdeath+=array($rg_code => $recdeath_case);
}

//[PENTING!]Kesembuhan/kematian Increment!!!!!
$ld_recdeath=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $trcase_iso=$rg_code.'_tr';
    $tdcase_iso=$rg_code.'_td';
    $trdcase_iso=$rg_code.'_trd';
    //Recovery case
    $cache_rdata="select * from cases where tanggal='$last_date'";
    $cache_rdata_result=$con->query($cache_rdata);
    while($row=$cache_rdata_result->fetch_assoc()){
        $recovery_data=$row[$trcase_iso];
    }
    //Death
    $cache_ddata="select * from cases where tanggal='$last_date'";
    $cache_ddata_result=$con->query($cache_ddata);
    while($rowp=$cache_ddata_result->fetch_assoc()){
        $death_data=$rowp[$tdcase_iso];
    }
    //Previous Recovery case
    $cache_prdata="select * from cases where tanggal='$prev_day_format'";
    $cache_prdata_result=$con->query($cache_prdata);
    while($row=$cache_prdata_result->fetch_assoc()){
        $prev_recovery_data=$row[$trcase_iso];
    }
    //Previous Death case
    $cache_pddata="select * from cases where tanggal='$prev_day_format'";
    $cache_pddata_result=$con->query($cache_pddata);
    while($rowp=$cache_pddata_result->fetch_assoc()){
        $prev_death_data=$rowp[$tdcase_iso];
    }
    $prev_recdeath_case=round($prev_recovery_data/($prev_recovery_data+$prev_death_data),4)*100;
    $recdeath_case=round($recovery_data/($death_data+$recovery_data),4)*100;
    $prev_increment=round($recdeath_case-$prev_recdeath_case,2);
    if($prev_increment>=0){
        $prev_increment='+'.$prev_increment;
    }
    $ld_recdeath+=array($rg_code => $prev_increment);
}

//[PENTING!]Death Rate!!!!!
$total_deathrate=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_t';
    $tdcase_iso=$rg_code.'_td';
    $tdrcase_iso=$rg_code.'_tdr';
    //Total Case
    $cache_tdata="select * from cases where tanggal='$last_date'";
    $cache_tdata_result=$con->query($cache_tdata);
    while($row=$cache_tdata_result->fetch_assoc()){
        $total_data=$row[$tcase_iso];
    }
    //Death
    $cache_ddata="select * from cases where tanggal='$last_date'";
    $cache_ddata_result=$con->query($cache_ddata);
    while($rowp=$cache_ddata_result->fetch_assoc()){
        $death_data=$rowp[$tdcase_iso];
    }
    $deathrate_case=round($death_data/($total_data),4)*100;
    $total_deathrate+=array($rg_code => $deathrate_case);
}

//[PENTING!]Death Rate Increment!!!!!
$ld_deathrate=array('ex'=>0);
foreach($isocode_stcode as $rg_code){
    $cache_tcase=array('ex'=>0);
    $tcase_iso=$rg_code.'_t';
    $tdcase_iso=$rg_code.'_td';
    $tdrcase_iso=$rg_code.'_tdr';
    //Total Case
    $cache_tdata="select * from cases where tanggal='$last_date'";
    $cache_tdata_result=$con->query($cache_tdata);
    while($row=$cache_tdata_result->fetch_assoc()){
        $total_data=$row[$tcase_iso];
    }
    //Death
    $cache_ddata="select * from cases where tanggal='$last_date'";
    $cache_ddata_result=$con->query($cache_ddata);
    while($rowp=$cache_ddata_result->fetch_assoc()){
        $death_data=$rowp[$tdcase_iso];
    }
    //Previous Total Case
    $cache_ptdata="select * from cases where tanggal='$prev_day_format'";
    $cache_ptdata_result=$con->query($cache_ptdata);
    while($row=$cache_ptdata_result->fetch_assoc()){
        $ptotal_data=$row[$tcase_iso];
    }
    //Previous Death
    $cache_pddata="select * from cases where tanggal='$prev_day_format'";
    $cache_pddata_result=$con->query($cache_pddata);
    while($rowp=$cache_pddata_result->fetch_assoc()){
        $pdeath_data=$rowp[$tdcase_iso];
    }
    $pdeathrate_case=round($pdeath_data/($ptotal_data),4)*100;
    $deathrate_case=round($death_data/($total_data),4)*100;
    $prev_increment=round($deathrate_case-$pdeathrate_case,2);
    if($prev_increment>=0){
        $prev_increment='+'.$prev_increment;
    }
    $ld_deathrate+=array($rg_code => $prev_increment);
}

//Total closed case
$closed_case=array(ex=>0);
foreach($isocode_stcode as $rg_code){
    $cc_data=$total_death[$rg_code]+$total_recovery[$rg_code];
    $closed_case+=array($rg_code=>$cc_data);
}
//Total active case
$active_case=array(ex=>0);
foreach($isocode_stcode as $rg_code){
    $ac_data=$total_case[$rg_code]-$closed_case[$rg_code];
    $active_case+=array($rg_code=>$ac_data);
}
//Total active case increment
$ld_active_case_inc=array(ex=>0);
foreach($isocode_stcode as $rg_code){
    $ld_closed_case=($total_death[$rg_code]-$ld_deathinc[$rg_code])+($total_recovery[$rg_code]-$ld_recoveryinc[$rg_code]);
    $ld_active_case=($total_case[$rg_code]-$ld_caseinc[$rg_code])-$ld_closed_case;
    $ldaci_data=$active_case[$rg_code]-$ld_active_case;
    if($ldaci_data>=0){
        $ldaci_data='+'.$ldaci_data;
    }
    $ld_active_case_inc+=array($rg_code=>$ldaci_data);
}
//Total closed case increment
$ld_closed_case_inc=array(ex=>0);
foreach($isocode_stcode as $rg_code){
    $ld_closed_case=($total_death[$rg_code]-$ld_deathinc[$rg_code])+($total_recovery[$rg_code]-$ld_recoveryinc[$rg_code]);
    $ldcci_data=$closed_case[$rg_code]-$ld_closed_case;
    if($ldcci_data>=0){
        $ldcci_data='+'.$ldcci_data;
    }
    $ld_closed_case_inc+=array($rg_code=>$ldcci_data);
}

//Language Select
if($dp['lang']==1){
    $sl_lang='idname';
} else if($dp['lang']==0){
    $sl_lang='enname';
}

//RG Highest Daily
$hg_input=$perc_caseinc;
$hg_val = max($hg_input);
$hg_key=array_search($hg_val, $hg_input);

//Loop for every region
$rg_select="select * from $iso_database where iscode='$hg_key'";
$result_rg_select= $con->query($rg_select);

//Extract data
while($row=$result_rg_select->fetch_assoc()){
    $hg_daily=$row[$sl_lang];
}

//RG Lowest Daily
$lw_input=$perc_caseinc;
//Array Filter Parameter
function NoZero($array){
    if($array<='0'||is_nan($array)){
        return FALSE;
    } else {
        return TRUE;
    }
}
$lw_val_nz=array_filter($lw_input, "NoZero");
$lw_val=min($lw_val_nz);
$lw_key=array_search($lw_val, $lw_input);

//Loop for every region
$lw_select="select * from $iso_database where iscode='$lw_key'";
$result_lw_select= $con->query($lw_select);

//Extract data
while($row=$result_lw_select->fetch_assoc()){
    $lw_daily=$row[$sl_lang];
}

//[PENTING!]Percent Increase Case Array Past 7 Days!!!!!
$perc_caseinc_psd=array('ex'=>'-9999');
foreach($isocode_stcode as $rg_code){
    //$cache_tcase=array('ex'=>'-9999');
    $tcase_iso=$rg_code.'_t';
    //last case
    $cache_ldata="select * from cases where tanggal='$last_date'";
    $cache_ldata_result=$con->query($cache_ldata);
    while($row=$cache_ldata_result->fetch_assoc()){
        $last_data=$row[$tcase_iso];
    }
    //previous case
    $cache_pdata="select * from cases where tanggal='$sevenprev_day_format'";
    $cache_pdata_result=$con->query($cache_pdata);
    while($rowp=$cache_pdata_result->fetch_assoc()){
        $prev_data=$rowp[$tcase_iso];
    }
    $increment_case=round(($last_data-$prev_data)/$prev_data,4)*100;
    if($increment_case>=0){
        $increment_case='+'.$increment_case;
    }
    $perc_caseinc_psd+=array($rg_code => $increment_case);
}

//RG Highest Weekly
$hg_input=$perc_caseinc_psd;
$hgw_val = max($hg_input);
$hg_key=array_search($hgw_val, $hg_input);

//Loop for every region
$rg_select="select * from $iso_database where iscode='$hg_key'";
$result_rg_select= $con->query($rg_select);

//Extract data
while($row=$result_rg_select->fetch_assoc()){
    $hg_weekly=$row[$sl_lang];
}

//RG Lowest Weekly
$lw_input=$perc_caseinc_psd;
$lw_val_nz=array_filter($lw_input, "NoZero");
$lww_val=min($lw_val_nz);
$lw_key=array_search($lww_val, $lw_input);

//Loop for every region
$lw_select="select * from $iso_database where iscode='$lw_key'";
$result_lw_select= $con->query($lw_select);

//Extract data
while($row=$result_lw_select->fetch_assoc()){
    $lw_weekly=$row[$sl_lang];
}

//No Daily Increment
function OnlyZero($array){
    if($array<='0'||is_nan($array)){
        return TRUE;
    } else {
        return FALSE;
    }
}

//RG No Weekly
$no_input=$perc_caseinc_psd;
//Remove Array Element
function remove_element($array,$value) {
  return array_diff($array, (is_array($value) ? $value : array($value)));
}
$as=remove_element($no_input, '-9999');
unset($as[0]);
$no_val_nz=array_keys(array_filter($as, "OnlyZero"));
//$no_weekly=array('ez'=>0);
foreach($no_val_nz as $val){
    $no_select="select * from $iso_database where iscode='$val'";
    $result_no_select= $con->query($no_select);
    //Extract data
    while($row=$result_no_select->fetch_assoc()){
        $no_weekly=$no_weekly.$row[$sl_lang].", ";
    }
}
//echo $no_weekly;
//echo "<br>";

//RG No Daily
$no_input=$perc_caseinc;
//Remove Array Element
$as=remove_element($no_input, '-9999');
unset($as[0]);
$no_val_nz=array_keys(array_filter($as, "OnlyZero"));
//$no_weekly=array('ez'=>0);
foreach($no_val_nz as $val){
    $no_select="select * from $iso_database where iscode='$val'";
    $result_no_select= $con->query($no_select);
    //Extract data
    while($row=$result_no_select->fetch_assoc()){
        $no_daily=$no_daily.$row[$sl_lang].", ";
    }
}

//echo $no_daily;

//[!Array of Data!]

//[General Data]
//Total Case
$total_case;
//Total Case Increment
$ld_caseinc;
//Total Death
$total_death;
//Total death increment
$ld_deathinc;
//Total recovery
$total_recovery;
//Total recovery increment
$ld_recoveryinc;
//Total active case
$active_case;
//Total active case increment
$ld_active_case_inc;
//Total closed case
$closed_case;
//Total closed case increment
$ld_closed_case_inc;

//[Statistics]
//Total Case increment
$ld_caseinc;
//Total case increment from last day
$ld_caseinc_fpd;
//Total death increment
$ld_deathinc;
//Total death increment from last day
$ld_deathinc_fpd;
//Total recovery increment
$ld_recoveryinc;
//Total recovery increment from last day
$ld_recoveryinc_fpd;
//Recovery/death rate
$total_recdeath;
//Recovery/death rate increment
$ld_recdeath;
//Case increment percentage
$perc_caseinc;
//Case increment percentage from last day
$ldperc_caseinc;
//Death increment percentage
$perc_deathinc;
//Death increment percentage from last day
$ldperc_deathinc;
//Recovery increment percentage
$perc_recoveryinc;
//Recovery increment percentage from last day
$ldperc_recoveryinc;
//Death rate percentage
$total_deathrate;
//Death rate percentage increment
$ld_deathrate;

//[Regional Statistics]
//Highest Daily
$hg_daily;
//Highest daily value
$hg_val;
//Highest weekly
$hg_weekly;
//Highest weekly value
$hgw_val;
//Lowest Daily
$lw_daily;
//Lowest daily valye
$lw_val;
//Lowest weekly
$lw_weekly;
//Lowest weekly value
$lww_val;
//No Daily Increment
$no_daily;
//No Weekly Increment
$no_weekly;


?>