<?php
session_start();

if (isset($_SESSION['email']) and isset($_SESSION['nama']) and isset($_SESSION['inisial'])){
    
} else{
    header('refresh:0; url =../');
}
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

<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Head-->
        <?php require 'html-head.php';?>

        <style>

        </style>
    </head>
    <body>
    <?php require 'sd-navbar.php'; ?>

    <!--BODY-->
    <div class="container margint40">

        <?php require 'sd-mobile-nav.php'; ?>

        <div class="row">
            <?php require 'sd-sidenav.php'; ?>

            <!--Add and Manage Data-->
            <div class="col-lg-9 col-md-12">
                <h4>Add and Manage Data</h4>
                <p>Use this section to add and edit case data</p>

                <div class="col-xl-5 col-lg-9 col-md-12">
                    <h5>Add Data</h5>
                    <form class="marginb20">
                        <div class="form-group">
                            <label for="add-data">Date</label>
                            <input type="date" id="date" name="date" data-date="" data-date-format="YYYY DD MM" class="form-control form-box-custom3">
                        </div>
                        <div class="form-group">
                            <label for="iso-code">Regional ISO Code</label>
                            <input type="text" id="code" name="code" class="form-control form-box-custom3">
                        </div>
                        <div class="form-group">
                            <label for="total-case">Current Total Coronavirus Case</label>
                            <input type="text" id="tcase" name="tcase" class="form-control form-box-custom3">
                        </div>
                        <div class="form-group">
                            <label for="recovered-case">Current Total Recovered Case</label>
                            <input type="text" id="recovery" name="recovery" class="form-control form-box-custom3">
                        </div>
                        <div class="form-group">
                            <label for="death-case">Current Total Death Case</label>
                            <input type="text" id="death" name="death" class="form-control form-box-custom3">
                        </div>
                        <button name="submit" id="btn-submit" type="submit" class="btn btn-dark">Input</button>
                    </form>

                    <div class="font-istok font16-24" id="dataLoader">Input Status : </div>
                </div>
                
                <div style="overflow: scroll;" id="tableLoader"></div>
                
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
                                    console.log("kekirim");
                                 }
                            });
                        });
                    setInterval(function(){
                        $.ajax({    //create an ajax request to display.php
                            type: "POST",
                            url: "display.php",
                            dataType: "html",   //expect html to be returned
                            success: function(response){
                                $("#tableLoader").html(response);
                                //alert(response);
                            }
                        });
                    },500);
                </script>
                

            </div>


        </div>
    </div>
    </body>
</html>
