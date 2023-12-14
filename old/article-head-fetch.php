<?php

require 'connect.php';
require 'lang_assign.php';

$where_pid=$_GET['pid'];

//Assigning article data
if(isset($where_pid)){
    $art_db="select * from article where pid='$where_pid'";
}else{
    $art_db="select * from article";
}
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
    $writer="writer";
    $body=$lang."_body";
    $tag1=$lang."_tag1";
    $tag2=$lang."_tag2";
    $tag3=$lang."_tag3";
    $tag4=$lang."_tag4";
    
    $title=$row_art[$title];
    $img_hd_link=$row_art[$img_hd_link];
    $img_hd_caption=$row_art[$img_hd_caption];
    $headline=$row_art[$headline];
    $writer=$row_art[$writer];
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
    
    if($status=='1' and !isset($where_pid)){
    //echo $cc;
    echo "<a href='view.php?pid=".$cc."&view=1' style='text-decoration:none; color:inherit;'><div>";
    echo "<img class='img-fluid' src='".$img_hd_link."' alt='".$img_hd_caption."'>";
    echo "<h5 class='font-weight-bold margint20'>".$title."</h5>";
    echo "<p class='marginb5'>".$headline."</p>";
    echo "<div class='font-istok font10-15 cl-dusty-gray font-weight-bold'>".$dt_last_update." - ".$writer."</div>";
    echo "</div></a>";
    }
    
    if($_GET['view']=='1'){
        echo "<h5 class='font-weight-bold marginb3'>".$title."</h5>";
        echo "<div class='font-istok cl-dusty-gray font10-15'>".$dt_last_update." - ".$writer."</div>";
        echo "<img class='img-fluid margint15' src='".$img_hd_link."' alt='".$img_hd_caption."'>";
        echo "<div class='font-istok font13-20 cl-scorpion margint5 marginb20'>".$img_hd_caption."</div>";
        echo "<div class='font-istok font16-24 cl-dusty-gray'><hr><em>".$headline."</em><hr></div>";
        echo $body;
        
    }
}






















?>