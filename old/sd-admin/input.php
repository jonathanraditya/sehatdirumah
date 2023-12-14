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

<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>example</title>
        <meta name='theme-color' content='#000000'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    </head>
    <body>
            tanggal : <input type="date" id="date" name="date" data-date="" data-date-format="YYYY DD MM" ><br>
            kode : <input type="text" id="code" name="code"><br><br>
            case : <input type="text" id="tcase" name="tcase"><br>
            recovery : <input type="text" id="recovery" name="recovery"><br>
            death : <input type="text" id="death" name="death"><br>
            <button name="submit" id="btn-submit" type="submit">send</button><br><br>
            current status : <span id="status"></span><br>
            current date : <span id="cDate"></span>
            <br><br>
            <div id="dataLoader">
                
            </div>
            <br><br>
            <div id="tableLoader">
                
            </div>
            
            <script>
            $("#date").on('change' , () => {
                $("#cDate").html($("#date").val());
            });
                    $("#btn-submit").click(() => {
                        
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            url: "process-input.php",
                            data: {
                              tanggal : $('#date').val(),
                              code :  $('#code').val(),
                              tcase :  $('#tcase').val(),
                              recovery :  $('#recovery').val(),
                              death :  $('#death').val()
                            },
                             
                             success: (data) => {
                                /*let dTanggal = tanggal;
                                let dCode = code;
                                let dTcase = tcase;
                                let dRecovery = recovery;
                                let dDeath = death;*/
                                //alert(data);
                                var hasilnya = "";
                                document.getElementById('status').innerHTML = "success - " + data[0];
                                for(i=0; i<data.length; i++){
                                    hasilnya += "data[" + i + "] : " + data[i] + "<br>";
                                };
                                document.getElementById('dataLoader').innerHTML = hasilnya;
                                console.log("kekirimm");
                             }
                        });
                    });
                setInterval(function(){
                    $.ajax({    //create an ajax request to display.php
                        type: "GET",
                        url: "display.php",
                        dataType: "html",   //expect html to be returned
                        success: function(response){
                            $("#tableLoader").html(response);
                            //alert(response);
                        }
                    });
                },99);
            </script>
    </body>
</html>