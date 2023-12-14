<?php
    $kode = array("ac","be","ja","bb","kr","la","ri","sb","ss","su","bt","gr","jk","jb","jt","ji","yo","kb","ks","kt","ki","ku","ma","mu","ba","nb","nt","pa","pb","sr","sn","st","sg","sa","id","wl");
    
    $hasil = "";
    for($i=0; $i< count($kode); $i++){
        $hasil .= " ADD COLUMN $kode[$i]_t INT(11), <br>"; //total cases
        $hasil .= " ADD COLUMN $kode[$i]_tr INT(11), <br>"; //total recovery
        if($i == count($kode)-1){
            $hasil .= " ADD COLUMN $kode[$i]_td INT(11); <br>"; //total death
        } else {
            $hasil .= " ADD COLUMN $kode[$i]_td INT(11), <br>"; //total death
        }
    }
     echo $hasil;          
?>