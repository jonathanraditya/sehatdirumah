<?php
include_once('display-function.php');

$fnNumber = $_GET['footnotesNumber'];

$fnHead=getData(catatan_kaki, $fnNumber, no, head);
$fnContent=getData(catatan_kaki, $fnNumber, no, content);

//Headline 2 custom color
$wcountArray=str_word_count($fnHead,1);
$count=count($wcountArray);
$split=ceil($count/2);
$hdresult="";
for($i=0;$i<$count;$i++){
    if($i<$split){
        $hdresult=$hdresult."<span class='cl-aqua-forest'>".$wcountArray[$i]." </span>";
    }else{
        $hdresult=$hdresult."<span class='cl-tangerine'>".$wcountArray[$i]." </span>";
    }
}






$result=$result."<button type='button' class='close' data-dismiss='modal'>&times;</button>";
$result=$result."<h4 class='mf36-f24 mb20 text-xl-center text-lg-center text-md-center text-center'>Tentang<br><b>".$hdresult."</b></h4>";
$result=$result."<div class='mf24-f16'>".$fnContent."</div>";
$result=$result."<br><br><br><a href='bantuan?h=catatankaki' class='a-none'><div class='f16 font-weight-bold text-center'><i><u><span class='cl-aqua-forest'>Kunjungi Laman </span><span class='cl-tangerine'>Catatan Kaki</span></u></i></div></a>";


echo $result;

//echo "TESTT!!";



exit;

?>