<?php
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
    
    /*for($i=0; $i<count($tgl); $i++){
        echo $tgl[$i] . "<br>";
    }*/
    
    
    //Assigning iso data
    $isocode="select * from isocode";
    $result_isocode=$con->query($isocode);
    
    //print_r($result_isocode);
    
    //Extract data from isocode
    $isocode_id=array('ex'=>0);
    $isocode_en=array('ex'=>0);
    $isocode_stcode=array();
    while($row_isocode=$result_isocode->fetch_assoc()){
        $isocode_id+=array($row_isocode['iscode'] => $row_isocode['idname']);
        $isocode_en+=array($row_isocode['iscode'] => $row_isocode['enname']);
        array_push($isocode_stcode, $row_isocode['iscode']);
    }
    //print_r($isocode_stcode);
    //echo "<br><br>";
    
    $plus = 3;
    $minus = 1;
    
    //===chart configs===
    $showedCityCode    = "jk"; //masukkan kode provinsi (citycode) yang ingin ditampilkan
    $chartType          = "line"; //define chart type. all available chart => https://tobiasahlin.com/blog/chartjs-charts-to-get-you-started/
    $tooltipsMode       = "index"; // ubah mode tooltip. full => https://www.chartjs.org/docs/latest/general/interactions/modes.html
    $sctdcity           = array_search($showedCityCode , $isocode_stcode); // citycode index (from db or from $showedCityCode variable)
    
    //color
    $warnaBorder        = array( "rgb(255, 255, 0)" , "rgb(64, 255, 0)" , "rgb(255, 153, 51)" ); //warna border (3 warna)
    $warnaBackground    = array( "rgba(255, 255, 0, 7%)" , "rgba(64, 255, 0, 7%)" , "rgba(255, 153, 51 , 7%)" ); //warna bg (3 warna)
    $arraycity          = array("total" , "total recovery" , "total death"); //tambahan dibelakang citycode[]
    $bgFill             = "true"; //isi dengan "true" atau "false" (!dengan double quote!)
    
    //chart title
    $chartTitle         = "Data covid 19"; //judul chart
    $titleVisibility    = "true"; //isi dengan "true" atau "false" (!dengan double quote!)
    $titleFontSize      = 25; //ISI DENGAN TYPE ANGKA (tanpa quote)
    $titleColor         = "#000";
    
    //x axes labelling
    $labelDisplayX = "true"; //isi dengan "true" atau "false" (!dengan double quote!) 
    $labelTitleX = "Tanggal"; //axes x label title
    $labelColorX = "#FF9933"; // rgb(), rgba(), #ffffff
    $labelSizeX = 15; // //ISI DENGAN TYPE ANGKA (tanpa quote)
    
    //y axes labelling
    $labelDisplayY = "true"; //isi dengan "true" atau "false" (!dengan double quote!) 
    $labelTitleY = "jumlah kasus"; //axes x label title
    $labelColorY = "#9933FF"; // rgb(), rgba(), #ffffff
    $labelSizeY = 15; // //ISI DENGAN TYPE ANGKA (tanpa quote)
    //===end chart configs===

echo "test";
echo "<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js'></script>";
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
echo        "<canvas id='line-chart'></canvas>";
echo        "<script>";
echo        "new Chart(document.getElementById('line-chart'), {";
echo          "type:'$chartType',";  //see chart configs
echo "test";
echo          data: {
echo            labels: [ 
echo                <?php
echo                $result1 = mysqli_query($con , "select * from cases");
echo                while($row1 = mysqli_fetch_array($result1)){
echo                    $date1 = date_create($row1['tanggal']);
echo                    $echonya1 = $date1->format('d/m/Y');
echo                    echo "'$echonya1'";
echo                ?> ,
echo                <?php } ?>
echo                ],
echo            datasets: [
echo                <?php
echo                    $fori = 1+($sctdcity*3);
echo                    for($i=$fori; $i<$fori+3; $i+=1){
echo                ?>
echo                {
echo                data: [
echo                    <?php
echo                        $result2 = mysqli_query($con , "select * from cases");
echo                        while($row2 = mysqli_fetch_array($result2)){
echo                        echo $row2[$i];?> , 
echo                    <?php } ?>
echo                    ],
echo                label: <?php  
echo                        $idx = ($i-1) / 3 ;
echo                        $typadv = $i-($sctdcity*3) - 1; //city code type (adaptive)  ||==atau==||  adaptive index type => echo [0],[1],[2]
echo                        echo "'$isocode_stcode[$sctdcity] $arraycity[$typadv]'" ?> ,
echo                borderColor: <?php echo "'$warnaBorder[$typadv]'" ?>, //see chart configs
echo                backgroundColor: <?php echo "'$warnaBackground[$typadv]'" ?>, //see chart configs
echo                fill: <?php echo $bgFill; ?> //see chart configs
echo              }
echo              , 
echo              <?php  
echo                } ?>
echo            ]
echo          },
echo          options: {
echo            scales: {
echo                xAxes: [{
echo                    scaleLabel: {
echo                       display: <?php echo "'$labelDisplayX'"; ?> ,//see chart configs
echo                       labelString: <?php echo "'$labelTitleX'"; ?> ,//see chart configs
echo                       fontColor : <?php echo "'$labelColorX'"; ?> ,//see chart configs
echo                       fontSize : <?php echo "'$labelSizeX'"; ?>//see chart configs
echo                    },
echo                    ticks: {
echo                        autoSkip: true,
echo                        maxTicksLimit: 100 //max displayed x axis information (tanggal)
echo                    }
echo                }],
echo                yAxes: [{
echo                    scaleLabel: {
echo                       display: <?php echo "'$labelDisplayY'"; ?> ,//see chart configs
echo                       labelString: <?php echo "'$labelTitleY'"; ?> ,//see chart configs
echo                       fontColor : <?php echo "'$labelColorY'"; ?> ,//see chart configs
echo                       fontSize : <?php echo "'$labelSizeY'"; ?>//see chart configs
echo                    }
echo                }]
echo            },
echo            tooltips: {
echo                mode: <?php echo "'$tooltipsMode'"; ?>
echo            },
echo            title: {
echo                display: <?php echo "'$titleVisibility'"; ?> ,//see chart configs
echo                text: <?php echo "'$chartTitle'"; ?> ,//see chart configs
echo                fontSize : <?php echo "'$titleFontSize'"; ?> ,//see chart configs
echo                fontColor: <?php echo "'$titleColor'" ?>
echo            }
echo        }
echo        });
echo        </script>
echo        mkgraph();

?>