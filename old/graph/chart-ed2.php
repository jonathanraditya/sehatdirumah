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
?>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    </head>
    <body>
        <canvas id="line-chart"></canvas>
        <script>
        new Chart(document.getElementById("line-chart"), {
          type: <?php echo "'$chartType'" ?> , //see chart configs
          data: {
            labels: [ 
                
                <?php
                $result1 = mysqli_query($con , "select * from cases");
                while($row1 = mysqli_fetch_array($result1)){
                    $date1 = date_create($row1['tanggal']);
                    $echonya1 = $date1->format('d/m/Y');
                    echo "'$echonya1'";
                ?> ,

                
                ],
            datasets: [
                
                <?php
                    $fori = 1+($sctdcity*3);
                    for($i=$fori; $i<$fori+3; $i+=1){
                ?>
                
                {
                data: [
                    
                    <?php
                        $result2 = mysqli_query($con , "select * from cases");
                        while($row2 = mysqli_fetch_array($result2)){
                        echo $row2[$i];?> , 
                    <?php } ?>
                    
                    ],
                    
                label: <?php  
                        $idx = ($i-1) / 3 ;
                        $typadv = $i-($sctdcity*3) - 1; //city code type (adaptive)  ||==atau==||  adaptive index type => echo [0],[1],[2]
                        echo "'$isocode_stcode[$sctdcity] $arraycity[$typadv]'" ?> ,
                        
                borderColor: <?php echo "'$warnaBorder[$typadv]'" ?>, //see chart configs
                backgroundColor: <?php echo "'$warnaBackground[$typadv]'" ?>, //see chart configs
                fill: <?php echo $bgFill; ?> //see chart configs
                
              }
              , 
              <?php  
                } ?>
            ]
          },
          options: {
            scales: {
                xAxes: [{
                    scaleLabel: {
                       display: <?php echo "'$labelDisplayX'"; ?> ,//see chart configs
                       labelString: <?php echo "'$labelTitleX'"; ?> ,//see chart configs
                       fontColor : <?php echo "'$labelColorX'"; ?> ,//see chart configs
                       fontSize : <?php echo "'$labelSizeX'"; ?>//see chart configs
                    },
                    ticks: {
                        autoSkip: true,
                        maxTicksLimit: 100 //max displayed x axis information (tanggal)
                    }
                }],
                
                yAxes: [{
                    scaleLabel: {
                       display: <?php echo "'$labelDisplayY'"; ?> ,//see chart configs
                       labelString: <?php echo "'$labelTitleY'"; ?> ,//see chart configs
                       fontColor : <?php echo "'$labelColorY'"; ?> ,//see chart configs
                       fontSize : <?php echo "'$labelSizeY'"; ?>//see chart configs
                    }
                }]
            },
            tooltips: {
                mode: <?php echo "'$tooltipsMode'"; ?>
            },
            title: {
                display: <?php echo "'$titleVisibility'"; ?> ,//see chart configs
                text: <?php echo "'$chartTitle'"; ?> ,//see chart configs
                fontSize : <?php echo "'$titleFontSize'"; ?> ,//see chart configs
                fontColor: <?php echo "'$titleColor'" ?>
            }
        }
        });
        </script>
        <?php mkgraph(); ?>
    </body>
</html>