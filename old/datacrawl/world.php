<?php
//ambil data worldometers.info country => indonesia
    $url = 'https://www.worldometers.info/coronavirus/';
    $content = file_get_contents($url);

    //world case
    $wrcase = explode('<span style="color:#aaa">', $content);//tag yang memuat konten yg bakal diambil
    $wrcase = explode('</span>', $wrcase[1]);
    $cnumberCase = intval(str_replace(",", "", $wrcase[0]));

    //world recovered
    $wrrecover = explode('<span>', $content);//tag yang memuat konten yg bakal diambil
    $wrrecover = explode('</span>', $wrrecover[1]);
    $cnumberRecover = intval(str_replace(",", "", $wrrecover[0]));

    //world deaths
    $wrdeaths = explode('<span>', $content);//tag yang memuat konten yg bakal diambil
    $wrdeaths = explode('</span>', $wrdeaths[2]);
    $cnumberDeaths = intval(str_replace(",", "", $wrdeaths[0]));

    echo "Total world case : $cnumberCase <br>";
    echo "Total world recovered : $cnumberRecover <br>";
    echo "Total world deaths : $cnumberDeaths <br>";
    //echo "Total world => recovery : $cnumberRecovery <br>";
    //echo json_encode($cnumber);
    //thx to worldometer.info
?>