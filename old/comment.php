<?php

require 'connect.php';
require 'lang_assign.php';

if(!isset($_COOKIE['vid'])){
    $vid=(rand(100000, 999999));
    setcookie('vid', $vid, time()+(86400*30));
    $gname=$dp['cr_anon'].$vid;
    setcookie('gname', $gname, time()+(86400*30));
} else if(isset($_COOKIE['vid'])){
    $vid=$_COOKIE['vid'];
    $gname=$dp['cr_anon'].$vid;
    if($_COOKIE['gname']==$gname){
        $gname=$dp['cr_anon'].$vid;
    } else{
        $gname=$_COOKIE['gname'];
    }
    
}

?>

<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
    <?php require 'html-head-end.php'; ?>
        <!--Head-->
        <?php require 'html-head.php';?>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script>    
            let getRandomInt = (min, max) => {
                min = Math.ceil(min);
                max = Math.floor(max);
                return Math.floor(Math.random() * (max - min + 1)) + min;
            };
        
            let setTimeForCookies = (minutes) => {
            	var now = new Date();
            	var time = now.getTime();
             
            	time += minutes * 60 * 1000;
            	now.setTime(time);
            	return now;
            };
            
            let setCookie = (cname, cvalue, exdays) => {
              var d = new Date();
              d.setTime(d.getTime() + (exdays*24*60*60*1000));
              var expires = "expires="+ d.toUTCString();
              document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            };
            
            let getCookie = (cname) => {
              var name = cname + "=";
              var decodedCookie = decodeURIComponent(document.cookie);
              var ca = decodedCookie.split(';');
              for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                  c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                  return c.substring(name.length, c.length);
                }
              }
              return "";
            };
            
            let checkCookie = (cookiename) => {
              var scookie = getCookie(cookiename);
              if(scookie == "" || scookie == null){
                  //alert("NO ANY COOKIE NAMED : " + cookiename);
                  return "";
              } else {
                  //alert("COOKIE EXIST");
                  return scookie;
              }
            };
            
        </script>
    </head>
    <body>
        <!--Main Navbar-->
        <?php require 'main-navbar-sc.php';?>
        <div class="container">
            <!--Welcome navbar-->
            <?php require 'top-navbar.php';?>

            <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <h6 class="font-weight-bold"><?php echo $dp['cr_title'] ?></h6>
                <p class="font10-15"><?php echo $dp['cr_text'] ?></p>
                <div class="c-frame">
                    <div class="c-topframe">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle btn-customdrop" type="button" id="chatselect" data-toggle="dropdown" aria-hashpopup="true" aria-expanded="false">
                                <span class="font-istok font12-18 cl-dove-gray">Pesan terpopuler</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="chatselect">
                                <a href="#" class="dropdown-item">
                                    <div class="font-istok font-weight-bold font12-18 cl-dove-gray c-ddm-c1">Pesan terpopuler</div>
                                    <div class="font-istok font9-12 cl-dove-gray">Hanya pesan-pesan dengan like terbanyak yang ditampilkan</div>
                                </a>
                                <hr class="margintb5">
                                <a href="#" class="dropdown-item">
                                    <div class="font-istok font12-18 cl-dove-gray">Pesan terbaru</div>
                                    <div class="font-istok font9-12 cl-dove-gray">Menampilkan semua pesan-pesan terbaru yang dikirimkan</div>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!--content-->
                    <div id="chatboxContain" class="container c-chatroom" style='overflow-y:auto; overflow-x:hidden;'>
                        <!--Chat Content-->
                        
                        <?php
                        /*
                        require 'connect.php';
                        
                        //Assigning iso data
                        $commentdb="select * from comment";
                        $result_comment=$con->query($commentdb);
                        
                        //Extract data from isocode
                        while($row=$result_comment->fetch_assoc()){
                            echo "<div class='marginb12'>";
                            echo     "<div class='font-istok font9-12 cl-dove-gray c-bal1'>".$row['date']."</div>";
                            echo     "<div class='c-bal2'>";
                            echo         "<span class='font-istok cl-azure-radiance font-weight-bolder font11-15'>".$row['name']."</span><br>";
                            echo         "<span class='font-istok cl-dove-gray font11-15'  style='overflow-wrap: break-word;'>   ".$row['content']."</span>";
                            echo     "</div>";
                            echo     "<form class='c-bal3' action='' method='post'><input id='cid_".$row['cid']."' type='text' value='".$row['likes']."' name='cr_likes' style='display:none;'><input type='text' value='".$row['cid']."' name='cid' style='display:none'>"; ?>
                                          <button onclick="fnlike('cid_<?php echo $row['cid'] ?>' , '<?php echo $row['cid'] ?>')" class='btn btn-customdrop  paddingl1 paddingt1 paddingb1'> <?php
                            echo         "<img src='img/asset/smile.svg' alt='likes button'>";
                            echo         "<span class='cl-curious-blue font-istok font11-15 font-weight-bold'>  ".$row['likes']."</span>";
                            echo        "</button>";
                            echo     "</form>";
                            echo "</div>";
                        }
                        */
                        ?>

                    </div>

                    <script>
                        function countChars(obj){
                            var maxLength = 120;
                            var strLength = obj.value.length;
                            const button=document.getElementById('sendbutton');
                            const sbutton=document.getElementById('svg-send');
                            if(strLength > maxLength){
                                document.getElementById("charNum").innerHTML = '<span style="color: #B04C4C;">'+strLength+'/'+maxLength+'</span>';
                                button.disabled=true;
                            }else{
                                document.getElementById("charNum").innerHTML = '<span style="color: #00A8FF;">'+strLength+'/'+maxLength+'</span>';
                                button.disabled=false;
                                sbutton.style.fill='blue';
                            }
                        }

                    </script>

                    <!--input-->
                    <div class="c-input">
                        <form action='' id='form-send' name='form-send' method='post'>
                            <div class="marginr40">
                                <div class="form-group marginb1">
                                    <input type="text" id="nama-user" class="form-control font-istok font10-15 font-weight-bold cl-dove-gray c-f-input" value="" name='name2'>
                                </div>
                                <div class="form-group marginb3">
                                    <input id="comment-user" type="text" class="form-control font-istok font12-18 cl-dove-gray c-f-input" placeholder="<?php echo $dp['cr_typeplace'] ?>" name='comment' onkeyup="countChars(this);">
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="font-istok font12-18 cl-dove-gray" id='charNum'>0/120</span>
                                <button type="submit" class="btn" id='sendbutton'>
                                    <img src="img/asset/Send.svg" alt="send button" id='svg-send'>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <script>
        
            //check cookie 
            $(document).ready(() => {
                //setInterval(() => {
                    if(checkCookie('gname') != "" || checkCookie('gname') != null){
                        $("#nama-user").val(checkCookie('gname'));
                    } else {
                        console.log("BELUM ADA NAMA");
                    }
                //}, 100);
            });
            
            $("#sendbutton").click(() => {
                $.ajax({
                    type: 'post',
                    url: 'chatpost.php',
                    dataType: 'json',
                    data: {
                        namaUser : $("#nama-user").val(),
                        commentUser : $("#comment-user").val(),
                    },
                    success: (data) => {
                        document.cookie = "gname="+ data[1] +"; expires=" + setTimeForCookies(43200)/* 1 bulan*/ + "; path=/";
                        $("#nama-user").val(data[1]);
                        console.log("kekirim");
                    },
                    
                    failed: (data) => {
                        $("#nama-user").val(data[1]);
                    },
                });
            });
            
            let fnlike = (inputid ,cid) => {
                $.ajax({
                    type: 'post',
                    url: 'likepost.php',
                    dataType: 'json',
                    data: {
                        beforeLike: $('#' + inputid).val(),
                        cid : cid
                    },
                    success: () => {
                        alert("like confirmed");
                    }
                });
            };
            
            setInterval(function(){
                $.ajax({    //create an ajax request to display.php
                    type: "GET",
                    url: "chatfetch.php",
                    dataType: "html",   //expect html to be returned
                    success: (response) => {
                        $("#chatboxContain").html(response);
                        //alert(response);
                    }
                });
            }, 3000);
        </script>
        <!--FOOTER-->
        <?php require 'footer.php';?>
    </body>
</html>