<?php
$time_start = microtime(true); 
include ('connect.php');
//include('function.php');


//$data = file_get_contents("data/WHO-COVID-19-global-data.csv");
$data = file_get_contents("https://covid19.who.int/WHO-COVID-19-global-data.csv");
$rows=explode("\n", $data);
$s=array();
foreach($rows as $row){
    $s[]=str_getcsv($row);
}

//print_r($s[0]);

$databaseColumn=array('Date_reported','Country_code','Country','WHO_region','New_cases','Cumulative_cases','New_deaths','Cumulative_deaths');



function dateEditWHO($whoDate){
    $dateTime=substr_replace($whoDate,"",10);
    return $dateTime;
}

//Fetching Array of Date
$date=array();
foreach($s as $row){
    if(!in_array($row[0], $date)){
        array_push($date, $row[0]);
    }
}
echo '<br><br>';
sort($date);
print_r($date);
echo '<br><br>';

//Fetching Header (Isocode_t & isocode_td)
$header=array();
foreach($s as $row){
    $isocode=$row[1];
    $totalColumn=$isocode."_t";
    $deathColumn=$isocode."_td";
    if(!in_array($totalColumn, $header)){
        array_push($header, $totalColumn);
    }
    if(!in_array($deathColumn, $header)){
        array_push($header, $deathColumn);
    }
    
}
sort($header);
//print_r($header);

//Fetching Region Group List
$regionList=array();
foreach($s as $row){
    $region=$row[3];
    if(!in_array($region, $regionList)){
        array_push($regionList, $region);
    }
}
unset($regionList[0]);
unset($regionList[7]);

//print_r($regionList);

//Fetching Region Group
$regionClusterList=array();
foreach($regionList as $list){
    $fetchArray=array();
    foreach($s as $row){
        $region=$row[3];
        $isocode=$row[1];
        
        if($list == $region and !in_array($isocode, $fetchArray)){
            array_push($fetchArray, $isocode);
            //echo $isocode;
        }
    }
    $regionClusterList+=array($list => $fetchArray);
    //print_r($fetchArray);
    //echo $list;
}

//print_r($regionClusterList);

//Fetching Full Table Data
$dataArray=array();
foreach($date as $dt){
    $fetchArray=array();
    foreach($s as $row){
        $dateReported=$row[0];
        $isocode=$row[1];
        $cname=$row[2];
        $region=$row[3];
        $t=$row[5];
        $td=$row[7];
        $totalColumn=$isocode."_t";
        $deathColumn=$isocode."_td";
        $columnNumberT=array_search($totalColumn, $header);
        $columnNumberTD=array_search($deathColumn, $header);
        if($dt == $dateReported){
            //$fetchArray+=array($columnNumberT => $t);
            //$fetchArray+=array($columnNumberTD => $td);
            $fetchArray+=array($totalColumn => $t);
            $fetchArray+=array($deathColumn => $td);
        }
        
    }
    ksort($fetchArray);
    $dataArray+=array($dt => $fetchArray);
}

//echo $header[82].$header[83];

//echo '<br><br>';
echo '<br><br>';

ksort($dataArray);
//print_r($dataArray);

echo '<br><br>';

//Fetching Timeseries For Every Region
foreach($regionClusterList as $rgcode => $rglistarray){
    
    foreach($s as $row){
        $isocode=$row[1];
        $region=$row[3];
        $t=$row[5];
        $td=$row[7];
        //if()
    }
}

$regionTimeseries=array();
foreach($date as $dt){
    $selectedData=$dataArray[$dt];
    $fetchRegionData=array();
    foreach($regionClusterList as $rgcode => $rglistarray){
        $combinedTdata='';
        $combinedTDdata='';
        $rgTidentifier=$rgcode."_t";
        $rgTDidentifier=$rgcode."_td";
        foreach($rglistarray as $icodecache){
            $tcomb=$icodecache."_t";
            $tdcomb=$icodecache."_td";
            $getdatat=$selectedData[$tcomb];
            $getdatatd=$selectedData[$tdcomb];
            $combinedTdata+=$getdatat;
            $combinedTDdata+=$getdatatd;
        }
        $fetchRegionData+=array($rgTidentifier => $combinedTdata);
        $fetchRegionData+=array($rgTDidentifier => $combinedTDdata);
    }
    $regionTimeseries+=array($dt => $fetchRegionData);
}

echo '<br><br>';


print_r($regionTimeseries);

echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';
echo '<br><br>';

//$test=$dataArray['2020-06-09T00:00:00Z'];
//print_r($test);



//Insert Data into Database
foreach($regionTimeseries as $dateTs => $arDataTs){
    if($dateTs==='Date_reported'){
        continue;
    }
    $normalizeDate=dateEditWHO($dateTs);
    if($normalizeDate==='0000-00-00'){
        continue;
    }
    
    //World Data Cache
    $worldT='';
    $worldTD='';
    
    foreach($arDataTs as $tsDataKey => $explodeTsData){
        
        //Collecting Data for World Reported Cases & Deaths
        if(strpos($tsDataKey, '_td')){
            $worldTD+=$explodeTsData;
        }else{
            $worldT+=$explodeTsData;
        }   
        
        $select="select Date_reported from cases_who where Date_reported='$normalizeDate'";
        echo "UPDATE PENDING";
        $fresult=$con->query($select);
        if($fresult->num_rows > 0){
            $insertData=updateData(cases_who, $normalizeDate, Date_reported, $explodeTsData, $tsDataKey);
            echo $insertData;
            echo "UPDATE SUCCESS";
        } else {
            $query="insert into cases_who (Date_reported) values ('$normalizeDate')";
            echo "INSERT PENDING";
            if($con->query($query)==TRUE){
                $result="data berhasil dimasukkan";
                echo $result;
                echo "INSERT SUCCESS";
            } else {
                $result="Cek lagi ".$con->error;
                echo "INSERT ERROR";
                echo $result;
            }
            $insertData=updateData(cases_who, $normalizeDate, Date_reported, $explodeTsData, $tsDataKey);
            echo $insertData;
            echo "UPDATE SUCCESS";
            
        }

    }
    
    
    $select="select Date_reported from cases_who where Date_reported='$normalizeDate'";
    echo "UPDATE PENDING";
    $fresult=$con->query($select);
    if($fresult->num_rows > 0){
        $insertData=updateData(cases_who, $normalizeDate, Date_reported, $worldT, wl_t);
        echo $insertData;
        $insertData=updateData(cases_who, $normalizeDate, Date_reported, $worldTD, wl_td);
        echo $insertData;
        echo "UPDATE SUCCESS";
    } else{
        echo "UPDATE ERROR";
    }
    
    
    
}


$correction=casesWhoCorrection();
echo $correction;




//$testA=array('as','ab');
//$testB=array('asds','asab');
//array_push($testA, $testB);
//$testA[0][0]='tambah as';

//print_r($testA);

//sort($date);

//print_r($date);



















$time_end = microtime(true);

//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start)*1000;

//execution time of the script
echo '<b>Total Execution Time:</b> '.$execution_time.' ms';
// if you get weird results, use number_format((float) $execution_time, 10)

?>