<?php

require 'connect.php';
require 'lang_assign.php';

$search=$_GET['search'];

//$search='Indonesia';

//Lang Assign
    if($dp['lang']=='1'){
    $lang='id';
    } else{
    $lang='en';
    }

function remove_element($array,$value) {
  return array_diff($array, (is_array($value) ? $value : array($value)));
}

$tag1=$lang.'_tag1';
$tag2=$lang.'_tag2';
$tag3=$lang.'_tag3';
$tag4=$lang.'_tag4';

$tag1_db="select * from article where $tag1='$search'";
$result_tagdb1=$con->query($tag1_db);
$tag2_db="select * from article where $tag2='$search'";
$result_tagdb2=$con->query($tag2_db);
$tag3_db="select * from article where $tag3='$search'";
$result_tagdb3=$con->query($tag3_db);
$tag4_db="select * from article where $tag4='$search'";
$result_tagdb4=$con->query($tag4_db);
$ar_search=array('ex'=>'-9999');

while($row_tag=$result_tagdb1->fetch_assoc()){
    array_push($ar_search, $row_tag['pid']);
}
while($row_tag=$result_tagdb2->fetch_assoc()){
    array_push($ar_search, $row_tag['pid']);
}
while($row_tag=$result_tagdb3->fetch_assoc()){
    array_push($ar_search, $row_tag['pid']);
}
while($row_tag=$result_tagdb4->fetch_assoc()){
    array_push($ar_search, $row_tag['pid']);
}

$search_array=remove_element($ar_search, '-9999');

foreach($search_array as $pid_s){
    $art_db="select * from article where pid='$pid_s'";
    $result_artdb=$con->query($art_db);
    
    //Extract data from article
    $ar_art=array('ex'=>0);
    while($row_art=$result_artdb->fetch_assoc()){
        $cc=$row_art['pid'];
        $status=$row_art['hd_status'];
        
        //Lang Assign
        if($dp['lang']=='1'){
        $lang='id';
        } else{
        $lang='en';
        }
    
        //Data Fetch
        $title=$lang."_title";
        $img_hd_link=$lang."_img_hd_link";
        $img_hd_caption=$lang."_img_hd_caption";
        $headline=$lang."_headline";
        $body=$lang."_body";
        $tag1=$lang."_tag1";
        $tag2=$lang."_tag2";
        $tag3=$lang."_tag3";
        $tag4=$lang."_tag4";
        
        $title=$row_art[$title];
        $img_hd_link=$row_art[$img_hd_link];
        $img_hd_caption=$row_art[$img_hd_caption];
        $headline=$row_art[$headline];
        $body=$row_art[$body];
        $tag1=$row_art[$tag1];
        $tag2=$row_art[$tag2];
        $tag3=$row_art[$tag3];
        $tag4=$row_art[$tag4];
    
        //Date Fetch
        $date_c=$row_art['post_date'];
        $date_c=new DateTime($date_c);
        //Date Format
        $bulan=$date_c->format('m');
        if($bulan<'10'){
            $bulan=$bulan[1];
        }
        
        $year=$date_c->format('Y');
        $day=$date_c->format('d');
        
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
            } else {
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
        $dt_last_update=$day." ".$month_spell." ".$year;
        } else{
        $dt_last_update=$month_spell." ".$day." ".$year;
        }
        
        echo "<a href='view.php?pid=".$cc."&view=1' style='text-decoration:none; color:inherit;'><div class='box-shadow-art'>";
        echo "<div>";
        echo "<div class='font-istok font-weight-bold font10-15 cl-dusty-gray'>".$dt_last_update."</div>";
        echo "<h5 class='font-weight-bold'>".$title."</h5>";
        echo "<p class='marginb5'>".$headline."</p>";
        echo "<div class='cl-curious-blue font-lato font12-18'><a href='tag.php?search=".$tag1."'>#<span>$tag1</span></a>  <a href='".$tag2."'>#<span>$tag2</span></a>  <a href='".$tag3."'>#<span>$tag3</span></a> <a href='".$tag4."'>#<span>$tag4</span></a></div>";
        echo "<hr>";
        echo "</div>";
        echo "</div></a>";
        
    }
    
}



?>