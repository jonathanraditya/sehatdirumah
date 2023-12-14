<?php

include('function.php');

/**
 * Get the HTTP(S) URL of the current page.
 *
 * @param $server The $_SERVER superglobals array.
 * @return string The URL.
 */
function currentUrl($server){
    //Figure out whether we are using http or https.
    $http = 'http';
    //If HTTPS is present in our $_SERVER array, the URL should
    //start with https:// instead of http://
    if(isset($server['HTTPS'])){
        $http = 'https';
    }
    //Get the HTTP_HOST.
    $host = $server['HTTP_HOST'];
    //Get the REQUEST_URI. i.e. The Uniform Resource Identifier.
    $requestUri = $server['REQUEST_URI'];
    //Finally, construct the full URL.
    //Use the function htmlentities to prevent XSS attacks.
    return $http.'://'.htmlentities($host).htmlentities($requestUri);
}
 
//$url = currentUrl($_SERVER);
//echo $url;

function footnotes(){
    include_once('connect.php');
    $columnData=getFullColumnData(catatan_kaki, no);
    asort($columnData);
    foreach($columnData as $no){
        $head=getData(catatan_kaki, $no, no, head);
        $content=getData(catatan_kaki, $no, no, content);
        $makeID=strtolower(str_replace(" ", "", $head));
        echo "<div class='mt20 mbfn-c' id='".$makeID."'>";
        echo "<div class='mffn-c'>";
        echo "<span class='font-weight-bold cl-tangerine'>[".$no."] </span>";
        echo "<span class='cl-aqua-forest font-weight-bold'>".$head."</span>";
        echo "</div>";
        echo "<p class='mt12 mffn-c'>".$content."</p>";
        echo "</div>";
    }
}
function datasource(){
    include_once('connect.php');
    $columnData=getFullColumnData(sumber_data, no);
    asort($columnData);
    foreach($columnData as $no){
        $head=getData(sumber_data, $no, no, head);
        $link=getData(sumber_data, $no, no, link);
        echo "<a href='".$link."' class='a-none' target='_blank'><div class='mf24-f16 mt10c'>";
        echo "<span class='font-weight-bold cl-tangerine'>[".$no."] </span>";
        echo "<span class='cl-black'>".$head."</span>";
        echo "<img class='pb8 pl3 datasource-goto' src='img/asset/endnotes/gotodatasource.svg' alt='menuju ke sumber data'></div></a>";
    }
}
function copyrightattribute(){
    include_once('connect.php');
    $columnData=getFullColumnData(atribut_hak_cipta, no);
    asort($columnData);
    foreach($columnData as $no){
        $type=getdata(atribut_hak_cipta, $no, no, type);
        $author=getdata(atribut_hak_cipta, $no, no, author);
        $link=getdata(atribut_hak_cipta, $no, no, link);
        echo "<div class='ca-border mt25c'>";
        echo     "<div class='mf16-f12 cl-dusty-gray'>".$type."</div>";
        echo     "<div class='mf30-f20 font-weight-bold cl-aqua-forest'>".$author."</div>";
        echo     "<div class='font-italic mf24-f16 cl-curious-blue'>";
        echo         "<a href='".$link."' class='a-none'><span class='cl-curious-blue'>".$link."</span></a>";
        echo     "</div>";
        echo "</div>";
    }
}
function landingtable(){
    include_once('connect.php');
    $global=array('wl','id');
    $region=getCode(rg);
    asort($region);
    foreach($global as $code){
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
        //$ld_gspeed=getData(landing_table, $code, isocode, ld_gspeed);
        //$dc_ldgspeed=arrayDecodeDelimiter($ld_gspeed);
        
        echo "<tr class='click-point' onclick=\"window.location='".$internalLink."'\">";
        echo "<td class='ld-trend-cell ld-nlb text-center'><svg xmlns='http://www.w3.org/2000/svg' height='45' width='170' viewBox='0 0 170 45' style='background-color:#EDF5EE'><g transform='translate(0 0)' stroke-width='2.5px'>".$dc_inctrend."</g></svg></td>";
        echo "<td>".$namaDaerah."</td>";
        echo "<td>".$t."</td>";
        echo "<td>".$t_inc."</td>";
        echo "<td>".$tr."</td>";
        echo "<td>".$tr_inc."</td>";
        echo "<td>".$td."</td>";
        echo "<td class='ld-nrb'>".$td_inc."</td>";
        //echo "<td class='ld-nrb'>";
        //echo "<div class='row flex-nowrap' style='white-space:nowrap;'>";
        //echo "<span class='mf16-f12 font-weight-bold cl-dusty-gray mt4 mr6'>".$ld_sd."</span>";
        //foreach($dc_ldgspeed as $gspeed){
        //    echo "<span style='background-color:".$gspeed.";' class='td-gs'></span>";
        //}
        //echo "<span class='mf16-f12 font-weight-bold cl-dusty-gray mt4 ml6'>".$ld_ed."</span>";
        //echo "</div>";
        //echo "</td>";
        echo "</tr>";
    }
    foreach($region as $code){
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
        //$ld_gspeed=getData(landing_table, $code, isocode, ld_gspeed);
        //$dc_ldgspeed=arrayDecodeDelimiter($ld_gspeed);
        
        echo "<tr class='click-point' onclick=\"window.location='".$internalLink."'\">";
        echo "<td class='ld-trend-cell ld-nlb text-center'><svg xmlns='http://www.w3.org/2000/svg' height='45' width='170' viewBox='0 0 170 45' style='background-color:#EDF5EE'><g transform='translate(0 0)' stroke-width='2.5px'>".$dc_inctrend."</g></svg></td>";
        echo "<td>".$namaDaerah."</td>";
        echo "<td>".$t."</td>";
        echo "<td>".$t_inc."</td>";
        echo "<td>".$tr."</td>";
        echo "<td>".$tr_inc."</td>";
        echo "<td>".$td."</td>";
        echo "<td class='ld-nrb'>".$td_inc."</td>";
        //echo "<td class='ld-nrb'>";
        //echo "<div class='row flex-nowrap' style='white-space:nowrap;'>";
        //echo "<span class='mf16-f12 font-weight-bold cl-dusty-gray mt4 mr6'>".$ld_sd."</span>";
        //foreach($dc_ldgspeed as $gspeed){
        //    echo "<span style='background-color:".$gspeed.";' class='td-gs'></span>";
        //}
        //echo "<span class='mf16-f12 font-weight-bold cl-dusty-gray mt4 ml6'>".$ld_ed."</span>";
        //echo "</div>";
        //echo "</td>";
        echo "</tr>";
    }
}
function landingindonesiacase(){
    include_once('connect.php');
    $code='id';
    $namaDaerah=getData(landing_table, $code, isocode, nama_daerah);
    $t=getData(landing_table, $code, isocode, t);
    $t_inc=getData(landing_table, $code, isocode, t_inc);
    $tr=getData(landing_table, $code, isocode, tr);
    $tr_inc=getData(landing_table, $code, isocode, tr_inc);
    $td=getData(landing_table, $code, isocode, td);
    $td_inc=getData(landing_table, $code, isocode, td_inc);
    $ld_ed=getData(landing_table, $code, isocode, ld_ed);
    $dateSpell=dateSpellYear($ld_ed,id);
    $aktif=$t-$tr-$td;
    $aktif_inc=$t_inc-$tr_inc-$td_inc;
    if($aktif_inc>=0){
        $aktif_inc='+'.$aktif_inc;
    }
    $selesai=$t-$aktif;
    $selesai_inc=$td_inc+$tr_inc;
    if($selesai_inc>=0){
        $selesai_inc='+'.$selesai_inc;
    }

    echo "<div class='col-md-12 col-lg-2 align-self-center ptb20 plr20'>";
    echo     "<div class='f48 font-weight-bold'>".$namaDaerah."</div>";
    echo     "<div class='f16 font-weight-bold'><em>Update ".$dateSpell."</em></div>";
    echo "</div>";
    echo "<div class='col landing-id-ov-items'>";
    echo     "<div style='height:80px'>";
    echo         "<img src='img/asset/landing/virus%20(1).svg' alt='Ilustrasi infeksi virus (virus infection illustration)'>";
    echo     "</div>";
    echo     "<div class='f48 font-weight-bold'>".$t."</div>";
    echo     "<div class='f16 font-weight-bold'>".$t_inc."</div>";
    echo     "<div class='f20 font-weight-bold'>Total kasus<a class='a-none a-inh-sup click-point' data-id='2'><sup>[2]</sup></a></div>";
    echo "</div>";
    echo "<div class='col landing-id-ov-items'>";
    echo     "<div style='height:80px'>";
    echo         "<img src='img/asset/landing/Recovery.svg' alt='Ilustrasi sembuh dari corona (recovery from corona illustration)'>";
    echo     "</div>";
    echo     "<div class='f48 font-weight-bold'>".$tr."</div>";
    echo     "<div class='f16 font-weight-bold'>".$tr_inc."</div>";
    echo     "<div class='f20 font-weight-bold'>Sembuh<a class='a-none a-inh-sup click-point' data-id='4'><sup>[4]</sup></a></div>";
    echo "</div>";
    echo "<div class='col landing-id-ov-items'>";
    echo     "<div style='height:80px'>";
    echo         "<img src='img/asset/landing/flower.svg' alt='Ilustrasi meninggal (death illustration)'>";
    echo     "</div>";
    echo     "<div class='f48 font-weight-bold'>".$td."</div>";
    echo     "<div class='f16 font-weight-bold'>".$td_inc."</div>";
    echo     "<div class='f20 font-weight-bold'>Meninggal<a class='a-none a-inh-sup click-point' data-id='3'><sup>[3]</sup></a></div>";
    echo "</div>";
    echo "<div class='col landing-id-ov-items'>";
    echo      "<div style='height:80px'>";
    echo      "<img class='mt10' src='img/asset/landing/heart.svg' alt='Ilustrasi dalam perawatan corona (Hospitalized corona illustration)'>";
    echo     "</div>";
    echo     "<div class='f48 font-weight-bold'>".$aktif."</div>";
    echo     "<div class='f16 font-weight-bold'>".$aktif_inc."</div>";
    echo     "<div class='f20 font-weight-bold'>Kasus aktif<a class='a-none a-inh-sup click-point' data-id='5'><sup>[5]</sup></a></div>";
    echo "</div>";
    echo "<div class='col landing-id-ov-items'>";
    echo     "<div style='height:80px'>";
    echo         "<img src='img/asset/landing/per%201%20mil.svg' alt='Ilustrasi kasus selesai (closed case illustration)'>";
    echo     "</div>";
    echo     "<div class='f48 font-weight-bold'>".$selesai."</div>";
    echo     "<div class='f16 font-weight-bold'>".$selesai_inc."</div>";
    echo     "<div class='f20 font-weight-bold'>Kasus selesai<a class='a-none a-inh-sup click-point' data-id='7'><sup>[7]</sup></a></div>";
    echo "</div>";

}
function landingmapsstyle(){
    include_once('connect.php');
    $get=getData(landing_maps, rg, isocode, hsl_array);
    echo $get;
}
function landingmapsmin(){
    include_once('connect.php');
    $get=getData(landing_maps, rg, isocode, min_val);
    echo $get;
}
function landingmapsmax(){
    include_once('connect.php');
    $get=getData(landing_maps, rg, isocode, max_val);
    echo $get;
}
function landingkasussatujuta(){
    include_once('connect.php');
    $getOrder=getData(rank_urutan_dynamic, rank_kasusper1juta, nama_tabel, zero);
    $decode=arrayDecodeDelimiter($getOrder);
    $active="<img class='pt6 pb6 pl2 pr2' src='img/asset/landing/casemil/man%20orange%20xs.svg' alt='active illustration'>";
    $recovered="<img class='pt6 pb6 pl2 pr2' src='img/asset/landing/casemil/man%20green%20xs.svg' alt='recovered illustration'>";
    $death="<img class='pt6 pb6 pl2 pr2' src='img/asset/landing/casemil/man%20black%20xs.svg' alt='death illustration'>";
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
        echo "<div class='mb22'>";
        echo     "<a href='".$link."' class='a-none'><div class='cl-aqua-forest f24'>".$namaDaerah."<img style='margin-left:8px;' src='img/asset/regrank/".$status."' alt='".$status_alt."'></div></a>";
        echo     "<div>";
        //Active Case Loop
        for($i=0; $i<$t_1jt_gbr; $i++){
            echo $active;
        }
        //Recovered Case Loop
        for($i=0; $i<$tr_1jt_gbr; $i++){
            echo $recovered;
        }
        //Dead Case Loop
        for($i=0; $i<$td_1jt_gbr; $i++){
            echo $death;
        }
        //echo $resA.$resR.$resD;
        echo         "<span class='ml10'>".$t_1jt."</span>";
        echo     "</div>";
        echo "</div>";
    }
    
    
}
function landingjarakaman(){
    include_once('connect.php');
    $getOrder=getData(rank_urutan_dynamic, rank_jarak1pasien, nama_tabel, zero);
    $decode=arrayDecodeDelimiter($getOrder);
    foreach($decode as $code){
        $namaDaerah=getData(landing_table, $code, isocode, nama_daerah);
        $link=getData(landing_table, $code, isocode, internal_link);
        $jarak=getData(rank_jarak1pasien, $code, isocode, zero);
        echo "<a href='".$link."' class='a-none'><div class='ld-rpd2'>";
        echo     "<div class='mfr-f32 font-weight-bold cl-aqua-forest'><span class='cl-aqua-forest'>".$jarak."</span></div>";
        echo     "<div class='mfr-f16 cl-tangerine'><span class='cl-tangerine'>".$namaDaerah."</span></div>";
        echo     "<div><img src='img/asset/landing/next.svg' alt='safe radius'></div>";
        echo "</a></div>";
    }
    
}
function landingbebanrscss(){
    include_once('connect.php');
    $isocode=getCode(rg);
    foreach($isocode as $code){
        $hsl=getData(landing_table, $code, isocode, hsl_beban_rs);
        echo ".hl-".$code."{background-color:".$hsl."}";
    }
}
function landingbebanrsvalue(){
    include_once('connect.php');
    $isocode=getCode(rg);
    $result=array();
    foreach($isocode as $code){
        $value=getData(landing_table, $code, isocode, beban_rs);
        $result+=array($code => $value);
    }
    return $result;
}
function navigationidcases(){
    include_once('connect.php');
    $code='id';
    $t=getData(landing_table, $code, isocode, t);
    $tr=getData(landing_table, $code, isocode, tr);
    $td=getData(landing_table, $code, isocode, td);
    $aktif=$t-$tr-$td;
    $result=array(
        'case' => $t,
        'death' => $td,
        'recovery' => $tr,
        'active' =>$aktif);
    return $result;
}
function rglandingstatistics_sum(){
    include_once('connect.php');
    $region='sumatera';
    $t=getData(rg_landing, $region, region, t);
    $persen_aktif=getData(rg_landing, $region, region, persen_aktif);
    $kapasitas_rs=getData(rg_landing, $region, region, kapasitas_rs);
    $t_id=getData(rg_landing, $region, region, t_id);
    $persen_aktif_id=getData(rg_landing, $region, region, persen_aktif_id);
    $kapasitas_rs_id=getData(rg_landing, $region, region, kapasitas_rs_id);
    $t_per_id=getData(rg_landing, $region, region, t_per_id);
    $persen_aktif_per_id=getData(rg_landing, $region, region, persen_aktif_per_id);
    $kapasitas_rs_per_id=getData(rg_landing, $region, region, kapasitas_rs_per_id);
    $result=array(
        't' => $t,
        'persen_aktif' => $persen_aktif,
        'kapasitas_rs' => $kapasitas_rs,
        't_id' => $t_id,
        'persen_aktif_id' => $persen_aktif_id,
        'kapasitas_rs_id' => $kapasitas_rs_id,
        't_per_id' => $t_per_id,
        'persen_aktif_per_id' => $persen_aktif_per_id,
        'kapasitas_rs_per_id' => $kapasitas_rs_per_id);
    return $result;
}
function rglandingstatistics_jaw(){
    include_once('connect.php');
    $region='jawa';
    $t=getData(rg_landing, $region, region, t);
    $persen_aktif=getData(rg_landing, $region, region, persen_aktif);
    $kapasitas_rs=getData(rg_landing, $region, region, kapasitas_rs);
    $t_id=getData(rg_landing, $region, region, t_id);
    $persen_aktif_id=getData(rg_landing, $region, region, persen_aktif_id);
    $kapasitas_rs_id=getData(rg_landing, $region, region, kapasitas_rs_id);
    $t_per_id=getData(rg_landing, $region, region, t_per_id);
    $persen_aktif_per_id=getData(rg_landing, $region, region, persen_aktif_per_id);
    $kapasitas_rs_per_id=getData(rg_landing, $region, region, kapasitas_rs_per_id);
    $result=array(
        't' => $t,
        'persen_aktif' => $persen_aktif,
        'kapasitas_rs' => $kapasitas_rs,
        't_id' => $t_id,
        'persen_aktif_id' => $persen_aktif_id,
        'kapasitas_rs_id' => $kapasitas_rs_id,
        't_per_id' => $t_per_id,
        'persen_aktif_per_id' => $persen_aktif_per_id,
        'kapasitas_rs_per_id' => $kapasitas_rs_per_id);
    return $result;
}
function rglandingstatistics_kal(){
    include_once('connect.php');
    $region='kalimantan';
    $t=getData(rg_landing, $region, region, t);
    $persen_aktif=getData(rg_landing, $region, region, persen_aktif);
    $kapasitas_rs=getData(rg_landing, $region, region, kapasitas_rs);
    $t_id=getData(rg_landing, $region, region, t_id);
    $persen_aktif_id=getData(rg_landing, $region, region, persen_aktif_id);
    $kapasitas_rs_id=getData(rg_landing, $region, region, kapasitas_rs_id);
    $t_per_id=getData(rg_landing, $region, region, t_per_id);
    $persen_aktif_per_id=getData(rg_landing, $region, region, persen_aktif_per_id);
    $kapasitas_rs_per_id=getData(rg_landing, $region, region, kapasitas_rs_per_id);
    $result=array(
        't' => $t,
        'persen_aktif' => $persen_aktif,
        'kapasitas_rs' => $kapasitas_rs,
        't_id' => $t_id,
        'persen_aktif_id' => $persen_aktif_id,
        'kapasitas_rs_id' => $kapasitas_rs_id,
        't_per_id' => $t_per_id,
        'persen_aktif_per_id' => $persen_aktif_per_id,
        'kapasitas_rs_per_id' => $kapasitas_rs_per_id);
    return $result;
}
function rglandingstatistics_sul(){
    include_once('connect.php');
    $region='sulawesi';
    $t=getData(rg_landing, $region, region, t);
    $persen_aktif=getData(rg_landing, $region, region, persen_aktif);
    $kapasitas_rs=getData(rg_landing, $region, region, kapasitas_rs);
    $t_id=getData(rg_landing, $region, region, t_id);
    $persen_aktif_id=getData(rg_landing, $region, region, persen_aktif_id);
    $kapasitas_rs_id=getData(rg_landing, $region, region, kapasitas_rs_id);
    $t_per_id=getData(rg_landing, $region, region, t_per_id);
    $persen_aktif_per_id=getData(rg_landing, $region, region, persen_aktif_per_id);
    $kapasitas_rs_per_id=getData(rg_landing, $region, region, kapasitas_rs_per_id);
    $result=array(
        't' => $t,
        'persen_aktif' => $persen_aktif,
        'kapasitas_rs' => $kapasitas_rs,
        't_id' => $t_id,
        'persen_aktif_id' => $persen_aktif_id,
        'kapasitas_rs_id' => $kapasitas_rs_id,
        't_per_id' => $t_per_id,
        'persen_aktif_per_id' => $persen_aktif_per_id,
        'kapasitas_rs_per_id' => $kapasitas_rs_per_id);
    return $result;
}
function rglandingstatistics_map(){
    include_once('connect.php');
    $region='malukupapua';
    $t=getData(rg_landing, $region, region, t);
    $persen_aktif=getData(rg_landing, $region, region, persen_aktif);
    $kapasitas_rs=getData(rg_landing, $region, region, kapasitas_rs);
    $t_id=getData(rg_landing, $region, region, t_id);
    $persen_aktif_id=getData(rg_landing, $region, region, persen_aktif_id);
    $kapasitas_rs_id=getData(rg_landing, $region, region, kapasitas_rs_id);
    $t_per_id=getData(rg_landing, $region, region, t_per_id);
    $persen_aktif_per_id=getData(rg_landing, $region, region, persen_aktif_per_id);
    $kapasitas_rs_per_id=getData(rg_landing, $region, region, kapasitas_rs_per_id);
    $result=array(
        't' => $t,
        'persen_aktif' => $persen_aktif,
        'kapasitas_rs' => $kapasitas_rs,
        't_id' => $t_id,
        'persen_aktif_id' => $persen_aktif_id,
        'kapasitas_rs_id' => $kapasitas_rs_id,
        't_per_id' => $t_per_id,
        'persen_aktif_per_id' => $persen_aktif_per_id,
        'kapasitas_rs_per_id' => $kapasitas_rs_per_id);
    return $result;
}
function rglandingstatistics_bas(){
    include_once('connect.php');
    $region='balinusatenggara';
    $t=getData(rg_landing, $region, region, t);
    $persen_aktif=getData(rg_landing, $region, region, persen_aktif);
    $kapasitas_rs=getData(rg_landing, $region, region, kapasitas_rs);
    $t_id=getData(rg_landing, $region, region, t_id);
    $persen_aktif_id=getData(rg_landing, $region, region, persen_aktif_id);
    $kapasitas_rs_id=getData(rg_landing, $region, region, kapasitas_rs_id);
    $t_per_id=getData(rg_landing, $region, region, t_per_id);
    $persen_aktif_per_id=getData(rg_landing, $region, region, persen_aktif_per_id);
    $kapasitas_rs_per_id=getData(rg_landing, $region, region, kapasitas_rs_per_id);
    $result=array(
        't' => $t,
        'persen_aktif' => $persen_aktif,
        'kapasitas_rs' => $kapasitas_rs,
        't_id' => $t_id,
        'persen_aktif_id' => $persen_aktif_id,
        'kapasitas_rs_id' => $kapasitas_rs_id,
        't_per_id' => $t_per_id,
        'persen_aktif_per_id' => $persen_aktif_per_id,
        'kapasitas_rs_per_id' => $kapasitas_rs_per_id);
    return $result;
}
function rglanding_lchart_sum(){
    include_once('connect.php');
    $region='sumatera';
    $column='line_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode2=arrayDecodeDelimiter2($fetch);
    $decode=arrayDecodeDelimiter($decode2);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_lcharts_sum(){
    include_once('connect.php');
    $region='sumatera';
    $column='line_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_bchart_sum(){
    include_once('connect.php');
    $region='sumatera';
    $column='bar_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode=arrayDecodeDelimiter($fetch);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_bcharts_sum(){
    include_once('connect.php');
    $region='sumatera';
    $column='bar_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_cdate_sum(){
    include_once('connect.php');
    $region='sumatera';
    $column='chart_date_id';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_lchart_jaw(){
    include_once('connect.php');
    $region='jawa';
    $column='line_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode2=arrayDecodeDelimiter2($fetch);
    $decode=arrayDecodeDelimiter($decode2);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_lcharts_jaw(){
    include_once('connect.php');
    $region='jawa';
    $column='line_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_bchart_jaw(){
    include_once('connect.php');
    $region='jawa';
    $column='bar_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode=arrayDecodeDelimiter($fetch);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_bcharts_jaw(){
    include_once('connect.php');
    $region='jawa';
    $column='bar_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_cdate_jaw(){
    include_once('connect.php');
    $region='jawa';
    $column='chart_date_id';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_lchart_kal(){
    include_once('connect.php');
    $region='kalimantan';
    $column='line_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode2=arrayDecodeDelimiter2($fetch);
    $decode=arrayDecodeDelimiter($decode2);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_lcharts_kal(){
    include_once('connect.php');
    $region='kalimantan';
    $column='line_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_bchart_kal(){
    include_once('connect.php');
    $region='kalimantan';
    $column='bar_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode=arrayDecodeDelimiter($fetch);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_bcharts_kal(){
    include_once('connect.php');
    $region='kalimantan';
    $column='bar_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_cdate_kal(){
    include_once('connect.php');
    $region='kalimantan';
    $column='chart_date_id';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_lchart_bas(){
    include_once('connect.php');
    $region='balinusatenggara';
    $column='line_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode2=arrayDecodeDelimiter2($fetch);
    $decode=arrayDecodeDelimiter($decode2);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_lcharts_bas(){
    include_once('connect.php');
    $region='balinusatenggara';
    $column='line_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_bchart_bas(){
    include_once('connect.php');
    $region='balinusatenggara';
    $column='bar_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode=arrayDecodeDelimiter($fetch);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_bcharts_bas(){
    include_once('connect.php');
    $region='balinusatenggara';
    $column='bar_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_cdate_bas(){
    include_once('connect.php');
    $region='balinusatenggara';
    $column='chart_date_id';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_lchart_map(){
    include_once('connect.php');
    $region='malukupapua';
    $column='line_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode2=arrayDecodeDelimiter2($fetch);
    $decode=arrayDecodeDelimiter($decode2);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_lcharts_map(){
    include_once('connect.php');
    $region='malukupapua';
    $column='line_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_bchart_map(){
    include_once('connect.php');
    $region='malukupapua';
    $column='bar_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode=arrayDecodeDelimiter($fetch);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_bcharts_map(){
    include_once('connect.php');
    $region='malukupapua';
    $column='bar_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_cdate_map(){
    include_once('connect.php');
    $region='malukupapua';
    $column='chart_date_id';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_lchart_sul(){
    include_once('connect.php');
    $region='sulawesi';
    $column='line_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode2=arrayDecodeDelimiter2($fetch);
    $decode=arrayDecodeDelimiter($decode2);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_lcharts_sul(){
    include_once('connect.php');
    $region='sulawesi';
    $column='line_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_bchart_sul(){
    include_once('connect.php');
    $region='sulawesi';
    $column='bar_chart';
    $fetch=getData(rg_landing, $region, region, $column);
    $decode=arrayDecodeDelimiter($fetch);
    foreach($decode as $echo){
        echo $echo;
    }
}
function rglanding_bcharts_sul(){
    include_once('connect.php');
    $region='sulawesi';
    $column='bar_chart_scale';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
function rglanding_cdate_sul(){
    include_once('connect.php');
    $region='sulawesi';
    $column='chart_date_id';
    $fetch=getData(rg_landing, $region, region, $column);
    echo $fetch;
}
//Regional View
function rgview_logo($isocode){
    include_once('connect.php');
    $fetch=getData(rg_logo, $isocode, isocode, link);
    return $fetch;
}
function rgview_logoalt($isocode){
    include_once('connect.php');
    $fetch=getData(rg_logo, $isocode, isocode, alt);
    return $fetch;
}
function rgview_namaprov($isocode){
    include_once('connect.php');
    $fetch=getData(landing_table, $isocode, isocode, nama_daerah);
    return $fetch;
}
function rgview_mincase($isocode){
    include_once('connect.php');
    $region=array(
        'sumatera' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jawa' => 'bt|jb|jk|jt|ji|yo',
        'kalimantan' => 'kb|kt|ks|ki|ku',
        'sulawesi' => 'sa|st|sr|sg|sn|go',
        'malukupapua' => 'mu|ma|pb|pa',
        'balinusatenggara' => 'ba|nt|nb');
        
    //Decode
    foreach($region as $rg => $list){
        $rgDecode=arrayDecodeDelimiter($list);
        if(in_array($isocode, $rgDecode)){
            $rgAssign=$rg;
        }
    }
    $getData=getData(rg_landing, $rgAssign, region, min_caseval);
    return $getData;
}
function rgview_maxcase($isocode){
    include_once('connect.php');
    $region=array(
        'sumatera' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jawa' => 'bt|jb|jk|jt|ji|yo',
        'kalimantan' => 'kb|kt|ks|ki|ku',
        'sulawesi' => 'sa|st|sr|sg|sn|go',
        'malukupapua' => 'mu|ma|pb|pa',
        'balinusatenggara' => 'ba|nt|nb');
        
    //Decode
    foreach($region as $rg => $list){
        $rgDecode=arrayDecodeDelimiter($list);
        if(in_array($isocode, $rgDecode)){
            $rgAssign=$rg;
        }
    }
    $getData=getData(rg_landing, $rgAssign, region, max_caseval);
    return $getData;
}
function rgview_mapshsl($isocode){
    include_once('connect.php');
    $region=array(
        'sumatera' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jawa' => 'bt|jb|jk|jt|ji|yo',
        'kalimantan' => 'kb|kt|ks|ki|ku',
        'sulawesi' => 'sa|st|sr|sg|sn|go',
        'malukupapua' => 'mu|ma|pb|pa',
        'balinusatenggara' => 'ba|nt|nb');
        
    //Decode
    foreach($region as $rg => $list){
        $rgDecode=arrayDecodeDelimiter($list);
        if(in_array($isocode, $rgDecode)){
            $rgAssign=$rg;
        }
    }
    $getData=getData(rg_landing, $rgAssign, region, reg_casehsl);
    return $getData;
}
function rgview_tablefetch($isocode){
    include_once('connect.php');
    $regionList=array(
        'sumatera' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jawa' => 'bt|jb|jk|jt|ji|yo',
        'kalimantan' => 'kb|kt|ks|ki|ku',
        'sulawesi' => 'sa|st|sr|sg|sn|go',
        'malukupapua' => 'mu|ma|pb|pa',
        'balinusatenggara' => 'ba|nt|nb');
    //Checking region
    foreach($regionList as $rg => $encCode){
        $decode=arrayDecodeDelimiter($encCode);
        if(in_array($isocode, $decode)){
            $region=$rg;
        }
    }
    $isocodeInRegion=$regionList[$region];
    $decodeCode=arrayDecodeDelimiter($isocodeInRegion);
    //$decodeCode=array('ac','su','sb','ja','be','ri','kr','bb','ss','la');
    $result="<span></span>";
    foreach($decodeCode as $code){
        $namaDaerah=getData(landing_table, $code, isocode, nama_daerah);
        $t=getData(landing_table, $code, isocode, t);
        $tr=getData(landing_table, $code, isocode, tr);
        $td=getData(landing_table, $code, isocode, td);
        $internalLink=getData(landing_table, $code, isocode, internal_link);
        $result=$result."<tr class='click-point' onclick=\"window.location='".$internalLink."'\">";
        $result=$result."<td class='table-prov-align nlb'>".$namaDaerah."</td>";
        $result=$result."<td>".$t."</td>";
        $result=$result."<td>".$td."</td>";
        $result=$result."<td class='nrb'>".$tr."</td>";
        $result=$result."</tr>";
    }
    return $result;
}
function rgview_maininfo($isocode){
    include_once('connect.php');
    $t=getData(rg_view, $isocode, isocode, t);
    $tr=getData(rg_view, $isocode, isocode, tr);
    $td=getData(rg_view, $isocode, isocode, td);
    $t_inc="+".getData(rg_view, $isocode, isocode, t_inc);
    $tr_inc="+".getData(rg_view, $isocode, isocode, tr_inc);
    $td_inc="+".getData(rg_view, $isocode, isocode, td_inc);
    $t_rank=getData(rg_view, $isocode, isocode, t_rank);
    $tr_rank=getData(rg_view, $isocode, isocode, tr_rank);
    $td_rank=getData(rg_view, $isocode, isocode, td_rank);
    $t_id=getData(rg_view, $isocode, isocode, t_id);
    $tr_id=getData(rg_view, $isocode, isocode, tr_id);
    $td_id=getData(rg_view, $isocode, isocode, td_id);
    $t_per_id=round(getData(rg_view, $isocode, isocode, t_per_id),1)."%";
    $tr_per_id=round(getData(rg_view, $isocode, isocode, tr_per_id),1)."%";
    $td_per_id=round(getData(rg_view, $isocode, isocode, td_per_id),1)."%";
    $t_rank_status=getData(rg_view, $isocode, isocode, t_rank_status);
    if($t_rank_status==0){
        $t_rank_status='down.svg';
        $t_rank_status_alt='peringkat lebih kecil dari kemarin';
    }else if($t_rank_status==1){
        $t_rank_status='equal.svg';
        $t_rank_status_alt='peringkat sama dengan kemarin';
    }else if($t_rank_status==2){
        $t_rank_status='bigger.svg';
        $t_rank_status_alt='peringkat lebih besar daripada kemarin';
    }
    $tr_rank_status=getData(rg_view, $isocode, isocode, tr_rank_status);
    if($tr_rank_status==0){
        $tr_rank_status='down.svg';
        $tr_rank_status_alt='peringkat lebih kecil dari kemarin';
    }else if($tr_rank_status==1){
        $tr_rank_status='equal.svg';
        $tr_rank_status_alt='peringkat sama dengan kemarin';
    }else if($tr_rank_status==2){
        $tr_rank_status='bigger.svg';
        $tr_rank_status_alt='peringkat lebih besar daripada kemarin';
    }
    $td_rank_status=getData(rg_view, $isocode, isocode, td_rank_status);
    if($td_rank_status==0){
        $td_rank_status='down.svg';
        $td_rank_status_alt='peringkat lebih kecil dari kemarin';
    }else if($td_rank_status==1){
        $td_rank_status='equal.svg';
        $td_rank_status_alt='peringkat sama dengan kemarin';
    }else if($td_rank_status==2){
        $td_rank_status='bigger.svg';
        $td_rank_status_alt='peringkat lebih besar daripada kemarin';
    }
    $t_per_id_status=getData(rg_view, $isocode, isocode, t_per_id_status);
    if($t_per_id_status==0){
        $t_per_id_status='down.svg';
        $t_per_id_status_alt='peringkat lebih kecil dari kemarin';
    }else if($t_per_id_status==1){
        $t_per_id_status='equal.svg';
        $t_per_id_status_alt='peringkat sama dengan kemarin';
    }else if($t_per_id_status==2){
        $t_per_id_status='bigger.svg';
        $t_per_id_status_alt='peringkat lebih besar daripada kemarin';
    }
    $tr_per_id_status=getData(rg_view, $isocode, isocode, tr_per_id_status);
    if($tr_per_id_status==0){
        $tr_per_id_status='down.svg';
        $tr_per_id_status_alt='peringkat lebih kecil dari kemarin';
    }else if($tr_per_id_status==1){
        $tr_per_id_status='equal.svg';
        $tr_per_id_status_alt='peringkat sama dengan kemarin';
    }else if($tr_per_id_status==2){
        $tr_per_id_status='bigger.svg';
        $tr_per_id_status_alt='peringkat lebih besar daripada kemarin';
    }
    $td_per_id_status=getData(rg_view, $isocode, isocode, td_per_id_status);
    if($td_per_id_status==0){
        $td_per_id_status='down.svg';
        $td_per_id_status_alt='peringkat lebih kecil dari kemarin';
    }else if($td_per_id_status==1){
        $td_per_id_status='equal.svg';
        $td_per_id_status_alt='peringkat sama dengan kemarin';
    }else if($td_per_id_status==2){
        $td_per_id_status='bigger.svg';
        $td_per_id_status_alt='peringkat lebih besar daripada kemarin';
    }
    
    $result=array(
        't' => $t,
        'tr' => $tr,
        'td' => $td,
        't_inc' => $t_inc,
        'tr_inc' => $tr_inc,
        'td_inc' => $td_inc,
        't_rank' => $t_rank,
        'tr_rank' => $tr_rank,
        'td_rank' => $td_rank,
        't_id' => $t_id,
        'tr_id' => $tr_id,
        'td_id' => $td_id,
        't_per_id' => $t_per_id,
        'tr_per_id' => $tr_per_id,
        'td_per_id' => $td_per_id,
        't_rank_status' => $t_rank_status,
        'tr_rank_status' => $tr_rank_status,
        'td_rank_status' => $td_rank_status,
        't_per_id_status' => $t_per_id_status,
        'tr_per_id_status' => $tr_per_id_status,
        'td_per_id_status' => $td_per_id_status,
        't_rank_status_alt' => $t_rank_status_alt,
        'tr_rank_status_alt' => $tr_rank_status_alt,
        'td_rank_status_alt' => $td_rank_status_alt,
        't_per_id_status_alt' => $t_per_id_status_alt,
        'tr_per_id_status_alt' => $tr_per_id_status_alt,
        'td_per_id_status_alt' => $td_per_id_status_alt);
    return $result;
}
function rgview_faktamenarik($isocode){
    include_once('connect.php');
    $kasus1jt=round(getData(rg_rank_urutan, $isocode, isocode, kasus1jt),0);
    $kasus1jt_st=getData(rg_rank_urutan, $isocode, isocode, kasus1jt_st);
    if($kasus1jt_st==0){
        $kasus1jt_st='down.svg';
        $kasus1jt_st_alt='peringkat lebih kecil dari kemarin';
    }else if($kasus1jt_st==1){
        $kasus1jt_st='equal.svg';
        $kasus1jt_st_alt='peringkat sama dengan kemarin';
    }else if($kasus1jt_st==2){
        $kasus1jt_st='bigger.svg';
        $kasus1jt_st_alt='peringkat lebih besar daripada kemarin';
    }
    $kapasitasrs=round(getData(rg_rank_urutan, $isocode, isocode, kapasitasrs),1);
    $kapasitasrs_st=getData(rg_rank_urutan, $isocode, isocode, kapasitasrs_st);
    if($kapasitasrs_st==0){
        $kapasitasrs_st='down.svg';
        $kapasitasrs_st_alt='peringkat lebih kecil dari kemarin';
    }else if($kapasitasrs_st==1){
        $kapasitasrs_st='equal.svg';
        $kapasitasrs_st_alt='peringkat sama dengan kemarin';
    }else if($kapasitasrs_st==2){
        $kapasitasrs_st='bigger.svg';
        $kapasitasrs_st_alt='peringkat lebih besar daripada kemarin';
    }
    $wakturs=round(getData(rg_rank_urutan, $isocode, isocode, wakturs),0);
    $jarak1pasien=round(getData(rg_rank_urutan, $isocode, isocode, jarak1pasien),1);
    $jarak1pasien_st=getData(rg_rank_urutan, $isocode, isocode, jarak1pasien_st);
    if($jarak1pasien_st==0){
        $jarak1pasien_st='down.svg';
        $jarak1pasien_st_alt='peringkat lebih kecil dari kemarin';
    }else if($jarak1pasien_st==1){
        $jarak1pasien_st='equal.svg';
        $jarak1pasien_st_alt='peringkat sama dengan kemarin';
    }else if($jarak1pasien_st==2){
        $jarak1pasien_st='bigger.svg';
        $jarak1pasien_st_alt='peringkat lebih besar daripada kemarin';
    }
    $dokterpasien=getData(rg_rank_urutan, $isocode, isocode, dokterpasien);
    $dokterpasien_st=getData(rg_rank_urutan, $isocode, isocode, dokterpasien_st);
    if($dokterpasien_st==0){
        $dokterpasien_st='down.svg';
        $dokterpasien_st_alt='peringkat lebih kecil dari kemarin';
    }else if($dokterpasien_st==1){
        $dokterpasien_st='equal.svg';
        $dokterpasien_st_alt='peringkat sama dengan kemarin';
    }else if($dokterpasien_st==2){
        $dokterpasien_st='bigger.svg';
        $dokterpasien_st_alt='peringkat lebih besar daripada kemarin';
    }
    $perawatpasien=getData(rg_rank_urutan, $isocode, isocode, perawatpasien);
    $perawatpasien_st=getData(rg_rank_urutan, $isocode, isocode, perawatpasien_st);
    if($perawatpasien_st==0){
        $perawatpasien_st='down.svg';
        $perawatpasien_st_alt='peringkat lebih kecil dari kemarin';
    }else if($perawatpasien_st==1){
        $perawatpasien_st='equal.svg';
        $perawatpasien_st_alt='peringkat sama dengan kemarin';
    }else if($perawatpasien_st==2){
        $perawatpasien_st='bigger.svg';
        $perawatpasien_st_alt='peringkat lebih besar daripada kemarin';
    }
    $kasus1jt_rank=getData(rg_rank_urutan, $isocode, isocode, kasus1jt_rank);
    $kapasitasrs_rank=getData(rg_rank_urutan, $isocode, isocode, kapasitasrs_rank);
    $wakturs_rank=getData(rg_rank_urutan, $isocode, isocode, wakturs_rank);
    $jarak1pasien_rank=getData(rg_rank_urutan, $isocode, isocode, jarak1pasien_rank);
    $dokterpasien_rank=getData(rg_rank_urutan, $isocode, isocode, dokterpasien_rank);
    $perawatpasien_rank=getData(rg_rank_urutan, $isocode, isocode, perawatpasien_rank);
    $result=array(
        'kasus1jt' => $kasus1jt,
        'kasus1jt_st' => $kasus1jt_st,
        'kasus1jt_st_alt' => $kasus1jt_st_alt,
        'kapasitasrs' => $kapasitasrs,
        'kapasitasrs_st' => $kapasitasrs_st,
        'kapasitasrs_st_alt' => $kapasitasrs_st_alt,
        'wakturs' => $wakturs,
        'jarak1pasien' => $jarak1pasien,
        'jarak1pasien_st' => $jarak1pasien_st,
        'jarak1pasien_st_alt' => $jarak1pasien_st_alt,
        'dokterpasien' => $dokterpasien,
        'dokterpasien_st' => $dokterpasien_st,
        'dokterpasien_st_alt' => $dokterpasien_st_alt,
        'perawatpasien' => $perawatpasien,
        'perawatpasien_st' => $perawatpasien_st,
        'perawatpasien_st_alt' => $perawatpasien_st_alt,
        'kasus1jt_rank' => $kasus1jt_rank,
        'kapasitasrs_rank' => $kapasitasrs_rank,
        'wakturs_rank' => $wakturs_rank,
        'jarak1pasien_rank' => $jarak1pasien_rank,
        'dokterpasien_rank' => $dokterpasien_rank,
        'perawatpasien_rank' => $perawatpasien_rank);
    return $result;

}
function rgview_help($isocode){
    include_once('connect.php');
    $getTel1=getData(rg_view, $isocode, isocode, telp1);
    $getTel2=getData(rg_view, $isocode, isocode, telp2);
    $getWeb=getData(rg_view, $isocode, isocode, web);
    $result=array(
        'tel1' => $getTel1,
        'tel2' => $getTel2,
        'web' => $getWeb);
    return $result;
}
//Down headline
function rgview_activecase($isocode){
    include_once('connect.php');
    $fetch=getData(rank_perskasusaktif, $isocode, isocode, zero);
    return $fetch;
    
}
function rgview_activecase_id(){
    include_once('connect.php');
    $fetch=persenKasusAktif(id, getLastDate());
    return $fetch;
}
function rgview_recoveryrate($isocode){
    include_once('connect.php');
    $fetch=getData(rank_tingkatsembuh, $isocode, isocode, zero);
    return $fetch;
}
function rgview_recoveryrate_id(){
    include_once('connect.php');
    $fetch=tingkatSembuh(id, getLastDate());
    return $fetch;
}
function rgview_deathrate($isocode){
    include_once('connect.php');
    $fetch=getData(rank_tingkatkematian, $isocode, isocode, zero);
    return $fetch;
}
function rgview_deathrate_id(){
    include_once('connect.php');
    $fetch=tingkatKematian(id, getLastDate());
    return $fetch;
}
//Charting Small
function rgview_lchart_sm($isocode){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, c0_line);
    $decode2=arrayDecodeDelimiter2($fetch);
    $decode=arrayDecodeDelimiter($decode2);
    foreach($decode as $echo){
        $result=$result.$echo;
    }
    return $result;
}
function rgview_lcharts_sm($isocode){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, c0_line_scale);
    return $fetch;
}
function rgview_bchart_sm($isocode){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, c0_bar);
    $decode=arrayDecodeDelimiter($fetch);
    foreach($decode as $echo){
        $result=$result.$echo;
    }
    return $result;
}
function rgview_bcharts_sm($isocode){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, c0_bar_scale);
    return $fetch;
}
function rgview_cdate_sm($isocode){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, c0_chart_date_id);
    return $fetch;
}
//Charting Large
function rgview_lchart_lg($isocode,$chartno){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, $chartno.'_line');
    $decode2=arrayDecodeDelimiter2($fetch);
    $decode=arrayDecodeDelimiter($decode2);
    foreach($decode as $echo){
        $result=$result.$echo;
    }
    return $result;
}
function rgview_lcharts_lg($isocode,$chartno){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, $chartno.'_line_scale');
    return $fetch;
}
function rgview_bchart_lg($isocode,$chartno){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, $chartno.'_bar');
    $decode=arrayDecodeDelimiter($fetch);
    foreach($decode as $echo){
        $result=$result.$echo;
    }
    return $result;
}
function rgview_bcharts_lg($isocode,$chartno){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, $chartno.'_bar_scale');
    return $fetch;
}
function rgview_cdate_lg($isocode,$chartno){
    include_once('connect.php');
    $fetch=getData(rg_datavis, $isocode, isocode, $chartno.'_chart_date_id');
    return $fetch;
}
//Heatmap
function rgview_heatmap($isocode,$chartno){
    include_once('connect.php');
    //name initiation based on chart number
    $regionList=array(
        'sum' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jaw' => 'bt|jb|jk|jt|ji|yo',
        'kal' => 'kb|kt|ks|ki|ku',
        'sul' => 'sa|st|sr|sg|sn|go',
        'map' => 'mu|ma|pb|pa',
        'bas' => 'ba|nt|nb');
    //Checking region
    foreach($regionList as $rg => $encCode){
        $decode=arrayDecodeDelimiter($encCode);
        if(in_array($isocode, $decode)){
            $region=$rg;
        }
    }
    $hsl=getData(rg_datavis, $isocode, isocode, $chartno.'_heatmap_hsl');
    $value=getData(rg_datavis, $isocode, isocode, $chartno.'_heatmap_val');
    $date=getData(rg_datavis, $isocode, isocode, $chartno.'_heatmap_date_id');
    $decodeHsl=arrayDecodeDelimiter($hsl);
    $decodeValue=arrayDecodeDelimiter($value);
    $decodeDate=arrayDecodeDelimiter($date);
    $color1='cl-'.$region.'1';
    $color2='cl-'.$region.'2';
    //Heatmap value
    $style="height: 50px;width: 50px;display: flex;flex-direction: column;justify-content: flex-end;";
    //Result Fetch
    $ct=0;
    for($i=0; $i<4; $i++){
        $top="<div class='row f14 ".$color1."'>";
        $result=$result.$top;
        
        for($j=0;$j<7;$j++){
            $data="<div class='case-g-param' style='background-color:".$decodeHsl[$ct].";".$style."'><div><span class='rg-heatmap-val-bg'>".$decodeValue[$ct]."%</span></div></div>";
            $result=$result.$data;
            $ct++;
        }
        $date="<div class='g-label ".$color2."'>".$decodeDate[$i]."</div>";
        $bottom="</div>";
        $result=$result.$date.$bottom;
    }
    return $result;
}
//Region View Internal Navigation Link
function rgview_internallink($pos){
    include_once('connect.php');
    $list=getFullColumnData(rg_logo, isocode);
    foreach($list as $isocode){
        $link=getData(rg_logo, $isocode, isocode, internal_link);
        $image=getData(rg_logo, $isocode, isocode, link);
        $imageAlt=getData(rg_logo, $isocode, isocode, alt);
        $namaProv=getData(landing_table, $isocode, isocode, nama_daerah);
        $linkslice=str_replace('region?r=',"",$link);
        if($linkslice==$pos){
            $borderstyle=' bc-tangerine ';
        }else{
            $borderstyle=' bc-aqua-forest ';
        }
        
        echo "<a href='".$link."' class='a-none'>";
        echo     "<div class='".$borderstyle." bw2 br10 plr10 b-solid align-items-center d-flex ml25 mr25 mt25 mb25'>";
        echo         "<div class='pt15 pb15 pl15 pr15' style='width:150px;'>";
        echo             "<div class='d-flex justify-content-center flex-column' style='height:70px;'><div class='align-items-center'>";
        echo                 "<img height='70px;' class='lazyload ' data-src='img/asset/regview/logo/".$image."' alt='".$imageAlt."'>";
        echo             "</div></div>";
        echo             "<div style='height:80px;' class='d-flex justify-content-center flex-column ' ><div class='mf20-f16 cl-aqua-forest font-weight-bold align-items-center' ><span>".$namaProv."</span></div>";
        echo         "</div></div>";
        echo     "</div>";
        echo "</a>";
        
    }


}

//Dynamic Rank Landing
function rankld_jarak1pasien(){
    include_once('connect.php');
    $kolomData='rank_jarak1pasien';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_bebanrs(){
    include_once('connect.php');
    $kolomData='rank_bebanrs';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_dokterpasien(){
    include_once('connect.php');
    $kolomData='rank_dokterpasien';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_perawatpasien(){
    include_once('connect.php');
    $kolomData='rank_perawatpasien';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_totalkasus(){
    include_once('connect.php');
    $kolomData='rank_totalkasus';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_pertambahankasus(){
    include_once('connect.php');
    $kolomData='rank_pertambahankasus';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_kematian(){
    include_once('connect.php');
    $kolomData='rank_kematian';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_pertambahankematian(){
    include_once('connect.php');
    $kolomData='rank_pertambahankematian';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_sembuh(){
    include_once('connect.php');
    $kolomData='rank_sembuh';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_pertambahansembuh(){
    include_once('connect.php');
    $kolomData='rank_pertambahansembuh';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_tingkatsembuh(){
    include_once('connect.php');
    $kolomData='rank_tingkatsembuh';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_tingkatkematian(){
    include_once('connect.php');
    $kolomData='rank_tingkatkematian';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_kasusper1juta(){
    include_once('connect.php');
    $kolomData='rank_kasusper1juta';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_perstambahkematian(){
    include_once('connect.php');
    $kolomData='rank_perstambahkematian';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_perstambahsembuh(){
    include_once('connect.php');
    $kolomData='rank_perstambahsembuh';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_perstambahkasus(){
    include_once('connect.php');
    $kolomData='rank_perstambahkasus';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_perskasusaktif(){
    include_once('connect.php');
    $kolomData='rank_perskasusaktif';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
function rankld_sembuhmeninggal(){
    include_once('connect.php');
    $kolomData='rank_sembuhmeninggal';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData($kolomData, $isocode, isocode, zero);
        $status=getData($kolomData, $isocode, isocode, zero_s);
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
        
        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo     "<td>";
        echo         "<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
        echo     "</td>";
        echo "</tr>";

    }
}
//Static Rank Landing
function rankld_jml_penduduk(){
    include_once('connect.php');
    $kolomData='jml_penduduk';
    $urutan=getData(rank_urutan_static, $kolomData, nama_tabel, urutan);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=number_format(getData(kes_demografi, $isocode, isocode, $kolomData),0,",",".");

        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data." jiwa</td>";
        echo "</tr>";

    }
}
function rankld_luas_wilayah(){
    include_once('connect.php');
    $kolomData='luas_wilayah';
    $urutan=getData(rank_urutan_static, $kolomData, nama_tabel, urutan);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=number_format(getData(kes_demografi, $isocode, isocode, $kolomData),0,",",".");

        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data." km</td>";
        echo "</tr>";

    }
}
function rankld_jumlah_dokter(){
    include_once('connect.php');
    $kolomData='jumlah_dokter';
    $urutan=getData(rank_urutan_static, $kolomData, nama_tabel, urutan);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=number_format(getData(kes_demografi, $isocode, isocode, $kolomData),0,",",".");

        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data." dokter</td>";
        echo "</tr>";

    }
}
function rankld_jumlah_perawat(){
    include_once('connect.php');
    $kolomData='jumlah_perawat';
    $urutan=getData(rank_urutan_static, $kolomData, nama_tabel, urutan);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=number_format(getData(kes_demografi, $isocode, isocode, $kolomData),0,",",".");

        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data." perawat</td>";
        echo "</tr>";

    }
}
function rankld_jumlah_rs(){
    include_once('connect.php');
    $kolomData='jumlah_rs';
    $urutan=getData(rank_urutan_static, $kolomData, nama_tabel, urutan);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData(kes_demografi, $isocode, isocode, $kolomData);

        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo "</tr>";

    }
}
function rankld_rasio_tempat_tidur(){
    include_once('connect.php');
    $kolomData='rasio_tempat_tidur';
    $urutan=getData(rank_urutan_static, $kolomData, nama_tabel, urutan);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData(kes_demografi, $isocode, isocode, $kolomData);

        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."</td>";
        echo "</tr>";

    }
}
function rankld_jumlah_tempat_tidur(){
    include_once('connect.php');
    $kolomData='jumlah_tempat_tidur';
    $urutan=getData(rank_urutan_static, $kolomData, nama_tabel, urutan);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=number_format(getData(kes_demografi, $isocode, isocode, $kolomData),0,",",".");

        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data." bed</td>";
        echo "</tr>";

    }
}
function rankld_bor(){
    include_once('connect.php');
    $kolomData='bor';
    $urutan=getData(rank_urutan_static, $kolomData, nama_tabel, urutan);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=getData(kes_demografi, $isocode, isocode, $kolomData);

        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data."%</td>";
        echo "</tr>";

    }
}
function rankld_waktu_rs(){
    include_once('connect.php');
    $kolomData='waktu_rs';
    $urutan=getData(rank_urutan_static, $kolomData, nama_tabel, urutan);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
    for($i=0; $i<3; $i++){
        $isocode=$decodeUrutan[$i];
        $count=$i+1;
        $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
        $data=round(getData(kes_demografi, $isocode, isocode, $kolomData),0);

        //Printing Results
        echo "<tr>";
        echo     "<td>".$count."</td>";
        echo     "<td>".$namaProvinsi."</td>";
        echo     "<td>".$data." menit</td>";
        echo "</tr>";

    }
}
//Rank Landing Headline
function rankld_head_deathrate(){
    include_once('connect.php');
    $kolomData='rank_tingkatkematian';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
        
    $isocode=$decodeUrutan[0];
    $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
    $data=getData($kolomData, $isocode, isocode, zero);

    //Printing Results
    echo "<div class='mf36-f24 font-weight-bold cl-tangerine'>".$data."</div>";
    echo "<div class='mf36-f24 cl-aqua-forest'>".$namaProvinsi."</div>";
}
function rankld_head_jarak1pasien(){
    include_once('connect.php');
    $kolomData='rank_jarak1pasien';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
        
    $isocode=$decodeUrutan[0];
    $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
    $data=getData($kolomData, $isocode, isocode, zero);

    //Printing Results
    echo "<div class='mf36-f24 font-weight-bold cl-tangerine'>".$data."</div>";
    echo "<div class='mf36-f24 cl-aqua-forest'>".$namaProvinsi."</div>";
}
function rankld_head_pertumbuhankasus(){
    include_once('connect.php');
    $kolomData='rank_perstambahkasus';
    $urutan=getData(rank_urutan_dynamic, $kolomData, nama_tabel, zero);
    $decodeUrutan=arrayDecodeDelimiter($urutan);
        
    $isocode=$decodeUrutan[0];
    $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
    $data=getData($kolomData, $isocode, isocode, zero);

    //Printing Results
    echo "<div class='mf36-f24 font-weight-bold cl-tangerine'>".$data."</div>";
    echo "<div class='mf36-f24 cl-aqua-forest'>".$namaProvinsi."</div>";
}

//Rank View
function rankv_dateview($offset){
    include_once('connect.php');
    $date=dateEdit(getLastDate(),1);
    $dateEdit=dateEdit($date,$offset);
    $spell=dateSpellYear($dateEdit, id);
    return $spell;
}
function rankv_datestatus($offset,$link){
    include_once('connect.php');
    $date=dateEdit(getLastDate(),1);
    for($i=0;$i<10;$i++){
        //Count from beginning
        $loop=9-$i;
        $dateEdit=dateEdit($date,$loop);
        $day=dateFormatDay($dateEdit);
        if($i==9){
            $linkOffset="";
        }else{
            $linkOffset="&o=".$loop;
        }
        
        if($loop==$offset){
            $status='rr-dateview-current';
        }else{
            $status='rr-dateview-select';
        }
        $result=$result."<a href='".$link.$linkOffset."' class='a-none'><div class='".$status." mf20-f16 font-weight-bold cl-white'>".$day."</div></a>";
    }
    return $result;
}
function rankv_image($table,$type){
    include_once('connect.php');
    if($type=='st'){
        $image=getData(rank_urutan_static, $table, nama_tabel, image);
    }else if($type=='dy'){
        $image=getData(rank_urutan_dynamic, $table, nama_tabel, image);
    }
    return $image;
}
function rankv_link($table, $type){
    include_once('connect.php');
    if($type=='st'){
        $link=getData(rank_urutan_static, $table, nama_tabel, link);
    }else if($type=='dy'){
        $link=getData(rank_urutan_dynamic, $table, nama_tabel, link);
    }
    return $link;
}
function rankv_headline($table, $type){
    include_once('connect.php');
    if($type=='st'){
        $headline=getData(rank_urutan_static, $table, nama_tabel, headline);
        $wcountArray=str_word_count($headline,1);
        $count=count($wcountArray);
        $split=ceil($count/2);
        $result="";
        for($i=0;$i<$count;$i++){
            if($i<$split){
                $result=$result."<span class='cl-aqua-forest'>".$wcountArray[$i]." </span>";
            }else{
                $result=$result."<span class='cl-tangerine'>".$wcountArray[$i]." </span>";
            }
        }
        

    }else if($type=='dy'){
        $headline=getData(rank_urutan_dynamic, $table, nama_tabel, headline);
        $wcountArray=str_word_count($headline,1);
        $count=count($wcountArray);
        $split=ceil($count/2);
        for($i=0;$i<$count;$i++){
            if($i<$split){
                $result=$result."<span class='cl-aqua-forest'>".$wcountArray[$i]." </span>";
            }else{
                $result=$result."<span class='cl-tangerine'>".$wcountArray[$i]." </span>";
            }
        }
    }
    return $result;
}
function rankv_tablefetch($table, $type, $offset){
    include_once('connect.php');
    $namaKolom=rankOffsetSpell($offset);
    $kolomStatus=rankOffsetSpellStatus($offset);
    
    
    if($type=='st'){
        $urutan=getData(rank_urutan_static, $table, nama_tabel, urutan);
        $decodeUrutan=arrayDecodeDelimiter($urutan);
        $satuan=getData(rank_urutan_static, $table, nama_tabel, satuan);
        
        $result=$result."<thead>";
        $result=$result."<tr class='text-center'>";
        $result=$result."<th class='ntb nlb cl-tangerine'>Rank</th>";
        $result=$result."<th class='ntb text-left cl-tangerine text-center'>Provinsi</th>";
        $result=$result."<th class='ntb cl-tangerine'>".$satuan."</th>";
        $result=$result."</tr>";
        $result=$result."</thead>";
        $result=$result."<tbody>";
        
        for($i=0; $i<34; $i++){
            $isocode=$decodeUrutan[$i];
            $count=$i+1;
            $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
            $linkProvinsi=getData(landing_table, $isocode, isocode, internal_link);
            $data=getData(kes_demografi, $isocode, isocode, $table);
            //Printing Result
            $result=$result."<tr class='click-point' onclick=\"window.location='".$linkProvinsi."'\">";
            $result=$result."<td class='nlb'>".$count."</td>";
            $result=$result."<td class='text-left'>".$namaProvinsi."</td>";
            $result=$result."<td class='nrb'>".$data."</td>";
            $result=$result."</tr>";
        }
        $result=$result."</tbody>";
        
    } else if($type=='dy'){
        $urutan=getData(rank_urutan_dynamic, $table, nama_tabel, $namaKolom);
        $decodeUrutan=arrayDecodeDelimiter($urutan);
        $satuan=getData(rank_urutan_dynamic, $table, nama_tabel, satuan);
        
        $result=$result."<thead>";
        $result=$result."<tr class='text-center'>";
        $result=$result."<th class='ntb nlb cl-tangerine'>Rank</th>";
        $result=$result."<th class='ntb text-left cl-tangerine text-center'>Provinsi</th>";
        $result=$result."<th class='ntb cl-tangerine'>".$satuan."</th>";
        $result=$result."<th class='ntb nrb cl-tangerine'></th>";
        $result=$result."</tr>";
        $result=$result."</thead>";
        $result=$result."<tbody>";
        
        for($i=0; $i<34; $i++){
            $isocode=$decodeUrutan[$i];
            $count=$i+1;
            $namaProvinsi=getData(landing_table, $isocode, isocode, nama_daerah);
            $linkProvinsi=getData(landing_table, $isocode, isocode, internal_link);
            $data=getData($table, $isocode, isocode, $namaKolom);
            $status=getData($table, $isocode, isocode, $kolomStatus);
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
            //Printing Result
            $result=$result."<tr class='click-point' onclick=\"window.location='".$linkProvinsi."'\">";
            $result=$result."<td class='nlb'>".$count."</td>";
            $result=$result."<td class='text-left'>".$namaProvinsi."</td>";
            $result=$result."<td>".$data."</td>";
            $result=$result."<td class='nrb'>";
            $result=$result."<img src='img/asset/regrank/".$status."' alt='".$status_alt."'>";
            $result=$result."</td>";
            $result=$result."</tr>";
        }
        $result=$result."</tbody>";
        
    }
    return $result;
}

//Rank Internal Links
function rankv_internallink($pos){
    include_once('connect.php');
    $listS=getFullColumnData(rank_urutan_static, nama_tabel);
    $listD=getFullColumnData(rank_urutan_dynamic, nama_tabel);
    foreach($listD as $table){
        $linkD=getData(rank_urutan_dynamic, $table, nama_tabel, link);
        $imageD=getData(rank_urutan_dynamic, $table, nama_tabel, image);
        $headlineD=getData(rank_urutan_dynamic, $table, nama_tabel, headline);
        $linkslice=str_replace('peringkat?v=',"",$linkD);
        if($linkslice==$pos){
            $borderstyle=' bc-tangerine ';
        }else{
            $borderstyle=' bc-aqua-forest ';
        }
        
        echo "<a href='".$linkD."' class='a-none'>";
        echo     "<div class='".$borderstyle." bw2 br10 plr10 b-solid align-items-center d-flex ml25 mr25 mt25 mb25'>";
        echo         "<div class='pt15 pb15 pl15 pr15' style='width:150px;'>";
        echo             "<div class='d-flex justify-content-center flex-column' style='height:70px;'><div class='align-items-center'>";
        echo                 "<img class='m-img-ilink lazyload ' data-src='img/asset/regrank/".$imageD."' alt='Ilustrasi ".$headlineD."'>";
        echo             "</div></div>";
        echo             "<div class='d-flex justify-content-center flex-column m-tx-ilink' ><div class='mf20-f16 cl-aqua-forest font-weight-bold align-items-center' ><span>".$headlineD."</span></div>";
        echo         "</div></div>";
        echo     "</div>";
        echo "</a>";
        
    }
    foreach($listS as $table){
        $linkS=getData(rank_urutan_static, $table, nama_tabel, link);
        $imageS=getData(rank_urutan_static, $table, nama_tabel, image);
        $headlineS=getData(rank_urutan_static, $table, nama_tabel, headline);
        $linkslice=str_replace('peringkat?v=',"",$linkS);
        if($linkslice==$pos){
            $borderstyle=' bc-tangerine ';
        }else{
            $borderstyle=' bc-aqua-forest ';
        }
        
        echo "<a href='".$linkS."' class='a-none'>";
        echo     "<div class='".$borderstyle." bw2 br10 plr10 b-solid align-items-center d-flex ml25 mr25 mt25 mb25'>";
        echo         "<div class='pt15 pb15 pl15 pr15' style='width:150px;'>";
        echo             "<div class='d-flex justify-content-center flex-column' style='height:70px;'><div class='align-items-center'>";
        echo                 "<img class='m-img-ilink lazyload ' data-src='img/asset/regrank/".$imageS."' alt='Ilustrasi ".$headlineS."'>";
        echo             "</div></div>";
        echo             "<div class='d-flex justify-content-center flex-column m-tx-ilink' ><div class='mf20-f16 cl-aqua-forest font-weight-bold align-items-center' ><span>".$headlineS."</span></div>";
        echo         "</div></div>";
        echo     "</div>";
        echo "</a>";
        
    }
    
    
    
}

//Footnotes Assign
function help_footnotes_regview($isocode){
    include_once('connect.php');
    $regionList=array(
        'sumatera' => 'ac|su|sb|ja|be|ri|kr|bb|ss|la',
        'jawa' => 'bt|jb|jk|jt|ji|yo',
        'kalimantan' => 'kb|kt|ks|ki|ku',
        'sulawesi' => 'sa|st|sr|sg|sn|go',
        'malukupapua' => 'mu|ma|pb|pa',
        'balinusatenggara' => 'ba|nt|nb');
    //Checking region
    foreach($regionList as $rg => $encCode){
        $decode=arrayDecodeDelimiter($encCode);
        if(in_array($isocode, $decode)){
            $region=$rg;
        }
    }
    $getFnList=getData(rg_view,$isocode, isocode, catatan_kaki);
    $decodeFn=arrayDecodeDelimiter($getFnList);
    asort($decodeFn);
    $cl3="";
    $cl1="";
    if($region=='sumatera'){
        $cl3='cl-sum3';
        $cl1='cl-sum1';
    }else if($region=='jawa'){
        $cl3='cl-jaw3';
        $cl1='cl-jaw1';
    }else if($region=='kalimantan'){
        $cl3='cl-kal3';
        $cl1='cl-kal1';
    }else if($region=='sulawesi'){
        $cl3='cl-sul3';
        $cl1='cl-sul1';
    }else if($region=='malukupapua'){
        $cl3='cl-map3';
        $cl1='cl-map1';
    }else if($region=='balinusatenggara'){
        $cl3='cl-bas3';
        $cl1='cl-bas1';
    }
    
    foreach($decodeFn as $fn){
        $head=getData(catatan_kaki, $fn, no, head);
        $content=getData(catatan_kaki, $fn, no, content);
        $makeID=strtolower(str_replace(" ", "", $head));
        $linktofootnotes='bantuan?h=catatankaki#'.$makeID;
        $result=$result."<div class='fnotes mf24-f16 mb25c'>";
        $result=$result.    "<a href='".$linktofootnotes."' class='a-none'>";
        $result=$result.        "<div class='font-weight-bold'>";
        $result=$result.            "<span class='".$cl3."'>[".$fn."]</span>";
        $result=$result.            "<span class='".$cl1."'> ".$head."</span>";
        $result=$result.        "</div>";
        $result=$result.    "</a>";
        $result=$result.    "<div>".$content."</div>";
        $result=$result."</div> "  ; 
    }
    return $result;
}
function help_footnotes_edu(){
    include_once('connect.php');
    $footnotes=array('75','76','77','78','79','80','81','84');
    foreach($footnotes as $fn){
        $head=getData(catatan_kaki, $fn, no, head);
        $content=getData(catatan_kaki, $fn, no, content);
        $makeID=strtolower(str_replace(" ", "", $head));
        $linktofootnotes='bantuan?h=catatankaki#'.$makeID;
        $result=$result."<div class='fnotes mf24-f20 mb45'>";
        $result=$result.    "<a href='".$linktofootnotes."' class='a-none'>";
        $result=$result.        "<div class='font-weight-bold'>";
        $result=$result.            "<span style='color:#BF71F9;'>[".$fn."]</span>";
        $result=$result.            "<span style='color:#00C3BB;'> ".$head."</span>";
        $result=$result.        "</div>";
        $result=$result.    "</a>";
        $result=$result.    "<div>".$content."</div>";
        $result=$result."</div> "  ; 
    }
    return $result;
}
function help_footnotes_rankview($table, $type){
    include_once('connect.php');
    if($type=='st'){
        $number=getData(rank_urutan_static, $table, nama_tabel, catatan_kaki);
        $data=getData(catatan_kaki, $number, no, content);
    }else if($type=='dy'){
        $number=getData(rank_urutan_dynamic, $table, nama_tabel, catatan_kaki);
        $data=getData(catatan_kaki, $number, no, content);
    }
    return $data;
}

//Meta
function metatitle(){
    $url = currentUrl($_SERVER);
    $get=&$url;
    $getTitle=getData(meta,$url, full_link, title);
    if($getTitle==null){
        $trim=substr($get, 0, -3);
        $uniq=&$trim;
        $trimR=str_replace('&amp;', "", $uniq);
        $getTitle=getData(meta,$trimR, full_link, title);
    }
    echo $getTitle;
}
function metadesccustom($cases, $death, $recovery){
    $url = currentUrl($_SERVER);
    $getDesc=getData(meta, $url, full_link, description);
    $decode=arrayDecodeDelimiter($getDesc);
    $decode[1]=$cases;
    $decode[3]=$death;
    $decode[5]=$recovery;
    foreach($decode as $fetch){
        $result=$result.$fetch;
    }
    return $result;
}
function metadesc(){
    $url = currentUrl($_SERVER);
    $get=&$url;
    $getDesc=getData(meta, $url, full_link, description);
    if($getDesc==null){

        $trim=substr($get, 0, -3);
        $uniq=&$trim;
        $trimR=str_replace('&amp;', "", $uniq);
        //echo "KELUAR!";
        $getDesc=getData(meta,$trimR, full_link, description);
    }
    echo $getDesc;
}

//Fetching Cached Data
function fcMapsInfoScript(){
    include_once('connect.php');
    $getData=getData(display_cache, mapsinfoscript, display, data);
    $decode=arrayDecodeDelimiter2($getData);
    echo $decode;
}
function fcMapsDisplayScript(){
    include_once('connect.php');
    $getData=getData(display_cache, mapsdisplayscript, display, data);
    $decode=arrayDecodeDelimiter2($getData);
    echo $decode;
}
function fcLandingTable(){
    include_once('connect.php');
    $table=array('landingtable1','landingtable2');
    $fetchResult='';
    foreach($table as $column){
        $getData=getData(display_cache, $column, display, data);
        $decode=arrayDecodeDelimiter2($getData);
        $fetchResult=$fetchResult.$decode;
    }
    echo $fetchResult;
}
function fcLandingTableDetail(){
    include_once('connect.php');
    $table=array('landingtable3','landingtable4','landingtable5','landingtable6','landingtable7','landingtable8','landingtable9');
    $fetchResult='';
    foreach($table as $column){
        $getData=getData(display_cache, $column, display, data);
        $decode=arrayDecodeDelimiter2($getData);
        $fetchResult=$fetchResult.$decode;
    }
    echo $fetchResult;
}
function fcLandingBebanRsCss(){
    include_once('connect.php');
    $getData=getData(display_cache, landingbebasrscss, display, data);
    $decode=arrayDecodeDelimiter2($getData);
    echo $decode;
}
function fcLandingJarakAman(){
    include_once('connect.php');
    $getData=getData(display_cache, landingjarakaman, display, data);
    $decode=arrayDecodeDelimiter2($getData);
    echo $decode;
}
function fcLandingKasusSatuJuta1(){
    include_once('connect.php');
    $getData=getData(display_cache, landingkasussatujuta1, display, data);
    $decode=arrayDecodeDelimiter2($getData);
    echo $decode;
}
function fcLandingKasusSatuJuta2(){
    include_once('connect.php');
    $getData=getData(display_cache, landingkasussatujuta2, display, data);
    $decode=arrayDecodeDelimiter2($getData);
    echo $decode;
}

//Compression
//if (substr_count($_SERVER[‘HTTP_ACCEPT_ENCODING’], ‘gzip’)) ob_start(“ob_gzhandler”); else ob_start();






/*
$arrayIsocode=array('wl','id','ac','su','sb','be','ja','ri','kr','ss','bb','la','bt','jb','jk','jt','ji','yo','kb','kt','ks','ki','ku','sa','go','st','sr','sg','sn','mu','ma','pb','pa','ba','nb','nt');
$arrayData=array('https://www.worldometers.info/coronavirus/','https://covid19.go.id/','region?r=aceh','region?r=sumaterautara','region?r=sumaterabarat','region?r=bengkulu','region?r=jambi','region?r=riau','region?r=kepulauanriau','region?r=sumateraselatan','region?r=bangkabelitung','region?r=lampung','region?r=banten','region?r=jawabarat','region?r=jakarta','region?r=jawatengah','region?r=jawatimur','region?r=yogyakarta','region?r=kalimantanbarat','region?r=kalimantantengah','region?r=kalimantanselatan','region?r=kalimantantimur','region?r=kalimantanutara','region?r=sulawesiutara','region?r=gorontalo','region?r=sulawesitengah','region?r=sulawesibarat','region?r=sulawesitenggara','region?r=sulawesiselatan','region?r=malukuutara','region?r=maluku','region?r=papuabarat','region?r=papua','region?r=bali','region?r=nusatenggarabarat','region?r=nusatenggaratimur');
$arrayNama=array('Aceh','Sumatera Utara','Sumatera Barat','Bengkulu','Jambi','Riau','Kepulauan Riau','Sumatera Selatan','Bangka Belitung','Lampung','Banten','Jawa Barat','DKI Jakarta','Jawa Tengah','Jawa Timur','DI Yogyakarta','Kalimantan Barat','Kalimantan Tengah','Kalimantan Selatan','Kalimantan Timur','Kalimantan Utara','Sulawesi Utara','Gorontalo','Sulawesi Tengah','Sulawesi Barat','Sulawesi Tenggara','Sulawesi Selatan','Maluku Utara','Maluku','Papua Barat','Papua','Bali','Nusa Tenggara Barat','Nusa Tenggara Timur');
$i=0;
foreach($arrayIsocode as $code){
    $insert=$arrayData[$i];
    $update=updateData(landing_table, $code, isocode, $insert, internal_link);
    echo $update;
    $i++;
}
*/

//$sfd=landingTableUpdate();
//echo $sfd;

//$as='+20';
//$kg='+21';
//$jl=$as+$kg;
//echo $jl;




?>

