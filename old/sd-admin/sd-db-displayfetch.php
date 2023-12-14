<html>
    <head>
    </head>
    <body>
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

//Assign Language
$dkey="select * from display";
$result_dkey = $con->query($dkey);

//Database Display Language
$english=array('ex'=>0);
$bahasa=array('ex'=>0);
while($row_dkey=$result_dkey->fetch_assoc()){
    echo "<div>";
    echo     "<form action='sd-editcontent.php' method='post'>";
    echo         "<div class='form-group'>";
    echo             "<label for='id_".$row_dkey['dkey']."' class='font-lato font-weight-bold font16-24'>".$row_dkey['dkey']."</label>";
    echo             "<!--Copy function-->"; ?>
                        <input style='display:none;' type='text' id="ctext_id_<?php echo $row_dkey['dkey'] ?>" value=" <?php echo $row_dkey['bahasa'] ?> "> <?php
    echo             "<input style='display:none;' type='text' id='ctext_en_".$row_dkey['dkey']."' value='".$row_dkey['english']."'>";
    echo             "<span class='float-right'>"; ?>
                                         <button class='btn btn-custom1' id="ctextb_id_<?php echo $row_dkey['dkey'] ?>" onclick="copyText('ctext_id_<?php echo $row_dkey['dkey'] ?>')">copy bahasa</button> <?php
    echo                                 "<button class='btn btn-custom1' id='ctextb_en_".$row_dkey['dkey']."' onclick='copyText('ctext_en_".$row_dkey['dkey']."','ctextb_en_".$row_dkey['dkey']."')'>copy english</button>";
    echo                             "</span>";
    echo             "<!--<script type='text/javascript' src='copy-func.js'></script>-->";
    echo             "<input type='text' class='form-control form-box-custom1' id='id_".$row_dkey['dkey']."'  value='".$row_dkey['bahasa']."' name='data-change'>";
    echo             "<input type='text' style='display:none;' value='".$row_dkey['dkey']."' name='display-key'>";
    echo             "<input type='text' style='display:none;' value='bahasa' name='lang'>";
    echo         "</div>";
    echo         "<div class='float-right'>";
    echo             "<button type='submit' class='btn btn-custom2'>Edit bahasa</button>";
    echo         "</div>";
    echo     "</form>";
    echo     "<form action='sd-editcontent.php' method='post'>";
    echo         "<div class='form-group'>";
    echo             "<input type='text' class='form-control form-box-custom2' id='en_".$row_dkey['dkey']."'  value='".$row_dkey['english']."' name='data-change'>";
    echo             "<input type='text' style='display:none;' value='".$row_dkey['dkey']."' name='display-key'>";
    echo             "<input type='text' style='display:none;' value='english' name='lang'>";
    echo         "</div>";
    echo         "<div class='float-right'>";
    echo             "<button type='submit' class='btn btn-custom3'>Edit english</button>";
    echo         "</div>";
    echo     "</form>";
    echo     "<hr class='margint50'>";
    echo "</div>";
}

?>
</body>
</html>