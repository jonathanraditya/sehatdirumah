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
    
    $cityCode = array("ac","be","ja","bb","kr","la","ri","sb","ss","su","bt","gr","jk","jb","jt","ji","yo","kb","ks","kt","ki","ku","ma","mu","ba","nb","nt","pa","pb","sr","sn","st","sg","sa","id","wl");
?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <style>
        .table-div{
             max-width: 100%;
             /*overflow-x: scroll;*/
             width: 100%;
        }
        </style>
        
        <script>
        $(document).ready(function(){
            //$("table").preventDefault();
            $("table").mousewheel(function(e, delta) {
                this.scrollLeft -= (delta * 40);
                e.preventDefault();
            });
        });
        
            function drop(nomor,vary){
               // var inputs = document.getElementsByTagName("input");
                //$("#selected-ipt").html(nomor);
                //for (var i = 0; i < inputs.length; i++) {
                 // let input = inputs[i].id;
                //}
                let tanggal = document.getElementById("ipt" + nomor + "-" + vary).value;
                //document.getElementById('dataLoader').innerHTML += tanggal;
                
                var nomorplus = nomor+1;
                var cth = $('table tr').find('td:nth-child('+nomorplus+'),th:nth-child('+nomorplus+')').html();
                //document.getElementById('dataLoader').innerHTML = cth;
                
                    $.ajax({
                            type: "post",
                            dataType: "json",
                            url: "drop.php",
                            data: {
                              tanggal : tanggal,
                              cth : cth,
                              nomor : nomor,
                              vary : vary
                            },
                             
                             success: (hasil) => {
                               /* var hasilnya = "<br>";
                               for(i=0; i<hasil.length; i++){
                                    hasilnya += "data[" + i + "] : " + hasil[i] + "<br>";
                                }
                                document.getElementById('dataLoader').innerHTML += hasilnya;*/
                                
                             }
                        });
            }
        </script>
        <title>display</title>
    </head>
    <body>
        <!--<div id="dataLoader">
                
            </div>
            <br><br>
        <span id='selected-ipt'>
            
        </span>
        <br><br>-->
        <div id="table-div" class="table-div">
            <table border="2px" contenteditable="true" class='tabel'>
                <?php
                    $result = mysqli_query($con,"select * from cases");
                    $hasilnya = array();
                    $i = 0;
                    
                    echo "<tr>";
                    echo "<th align='center'> tanggal </th>";
                    foreach($cityCode as $value){
                        echo"<th align='center'> $value"."_t </th>";
                        echo"<th align='center'> $value"."_tr </th>";
                        echo"<th align='center'> $value"."_td </th>";
                    }
                    echo "</tr>";
                    
                    $vary = 0;
                    while($row = mysqli_fetch_array($result)){
                        /*array_push($hasilnya , "\$row['tanggal']");
                        foreach($cityCode as $value){
                            array_push($hasilnya , "\$row['$value"."_t']");
                            array_push($hasilnya , "\$row['$value"."_tr']");
                            array_push($hasilnya , "\$row['$value"."_td']");
                            //echo "$hasilnya[$i] <br>";
                            $i += 1;
                        }*/
                        
                        echo "<tr>";
                        $j = 0;
                        for($j=0; $j<111; $j++){
                            if($row[$j]==""){
                                echo"<td align='center' style='background-color:rgba(255, 51, 119,0.4)'> $row[$j] </td>";
                            } else {
                                echo"<td align='center' style='background-color:rgba(0, 255, 0, 0.4)'><button 
                                onclick='drop($j,$vary)'
                                onmousedown='drop($j,$vary)'
                                onmouseup='drop($j,$vary)'
                                >$row[$j]</button></td>";
                                echo "<input type='text' id='ipt$j-$vary' style='display:none' value='".$row[0]."'>";
                            }
                                
                        }
                        echo "</tr>";
                        $vary += 1;
                    }
                
                ?>
            </table>
        </div>
    </body>
</html>