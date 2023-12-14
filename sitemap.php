<?php

include_once('function.php');

//Get Last Date
$date=getLastDate();

$SitemapFile=fopen('sitemap.xml','w');

$fetch='';

$fetch=$fetch. '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;

$fetch=$fetch. '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

$fullColumn=getFullColumnData(meta, no);

foreach($fullColumn as $no){
    $getURL=getData(meta, $no, no, full_link);
    //$escapeURL=str_replace("?", "",$getURL);
    $fetch=$fetch. '<url>'.PHP_EOL;
    $fetch=$fetch. '<loc>'.$getURL.'</loc>'.PHP_EOL;
    $fetch=$fetch. '<lastmod>'.$date.'</lastmod>'.PHP_EOL;
    $fetch=$fetch. '<changefreq>daily</changefreq>'.PHP_EOL;
    $fetch=$fetch. '</url>'.PHP_EOL;
}


$fetch=$fetch. '</urlset>' . PHP_EOL;

fwrite($SitemapFile,$fetch);
fclose($SitemapFile);


//Robots.txt Allow/disallow

$robotsFile=fopen('robots.txt','w');

$fetchRobot='sitemap: https://sehatdirumah.com/sitemap.xml'.PHP_EOL;
$fetchRobot=$fetchRobot.'User-agent: *'.PHP_EOL;

$fullColumnDatasource=getFullColumnData(sumber_data, no);

foreach ($fullColumnDatasource as $no){
    if($no=='1' || $no=='37' || $no=='38' || $no=='39'){
        continue;
    }
    $getURL=getData(sumber_data, $no, no, link);
    $removeURI=str_replace("https://sehatdirumah.com", "",$getURL);
    $fetchRobot=$fetchRobot.'Disallow : '.$removeURI.'/'.PHP_EOL;
}



fwrite($robotsFile, $fetchRobot);
fclose($robotsFile);


?>

