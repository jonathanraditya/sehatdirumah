<?php


require 'lang_assign.php';
require 'rg-case-fetch.php';

//Initial Value
//HSL1
$hue1="133";
$sa1='28';
$li1='55';
//HSL2
$hue2='33';
$sa2='100';
$li2='48';

function phsl($hue1,$sa1,$li1,$hue2,$sa2,$li2,$coloridx){
    //for hue
    $hueRange=($hue2-$hue1)/100; //biar bisa jadi persen
    $hueHasil=array('ex'=>'-9999');
    for($i=0; $i<=100; $i++){
        $hue3=$hue1+($i*$hueRange);
        $roundedHue=round($hue3,0);
        array_push($hueHasil,$roundedHue);
    }
    $hueHasil=remove_element($hueHasil, '-9999');
    //for saturation
    $saRange=($sa2-$sa1)/100; //biar bisa jadi persen
    $saHasil=array('ex'=>'-9999');
    for($j=0; $j<=100; $j++){
        $sa3=$sa1+($j*$saRange);
        $roundedSa=round($sa3,0);
        array_push($saHasil,$roundedSa);
    }
    $saHasil=remove_element($saHasil, '-9999');

    //for lightness
    $liRange=($li2-$li1)/100; //biar bisa jadi persen
    $liHasil=array('ex'=>'-9999');
    for($k=0; $k<=100; $k++){
        $li3=$li1+($k*$liRange);
        $roundedLi=round($li3,0);
        array_push($liHasil,$roundedLi);
    }
    $liHasil=remove_element($liHasil, '-9999');

    //Hasil
    $hslHasil=array('ex'=>'-9999');
    for($l=0;$l<=100; $l++){
        $hasilAkhir='hsl('.$hueHasil[$l].','.$saHasil[$l].'%,'.$liHasil[$l].'%)';
        array_push($hslHasil,$hasilAkhir);
    }
    $hslHasil=remove_element($hslHasil, '-9999');
    return $hslHasil[$coloridx];
}

$total_case['ex']='-9999';
$total_case=remove_element($total_case, '-9999');
unset($total_case[0]);
$isocode_stcode['ex']='-9999';
$isocode_stcode=remove_element($isocode_stcode, '-9999');
//unset($isocode_stcode[0]);

$max_id_value=max($total_case);
$min_id_value=min($total_case);
$delta_val=$max_id_value-$min_id_value;

//$arr=$total_case;
//$count_below=array_reduce($arr, function ($a, $b) {
//    return ($b < 79) ? ++$a : $a;
//}); 


//print_r($total_case);

//Assign Value Daerah
//$tcv_ac=($total_case['ac']/$delta_val)*100;

$id_rg_case=$total_case;

//print_r($id_rg_case);
$id_hsl=array('ex'=>'-9999');
foreach($isocode_stcode as $rg_code){
    //count below current value
    $minVal = $id_rg_case[$rg_code];
    $counter_below = count(
        array_filter(
            $id_rg_case,
            function($value) use ($minVal) {
                return $value <= $minVal;
            }
        )
    );
    
    //percentile rank
    $id_rank=round(($counter_below/34)*100,0);
    //make rank 0-100
    //$norm_rank=round($id_rank*100/34,0);
    $return_val=phsl($hue1,$sa1,$li1,$hue2,$sa2,$li2,$id_rank);
    $id_hsl+=array($rg_code => $return_val);
    //echo $id_rank;
    ////echo $counter_below.' ';
    //echo $id_rank.' ';
    //echo $norm_rank.'<br>';
}
$id_hsl=remove_element($id_hsl, '-9999');




echo "<style>";
foreach($isocode_stcode as $rg_code){
    echo "#id-".$rg_code."{fill:".$id_hsl[$rg_code].";}";
    echo "#id-".$rg_code.":hover{transform:scale(1.01,1.01);transition:0.3s;fill:".$id_hsl[$rg_code].";}";
}
echo "</style>";



?>
