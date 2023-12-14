<?php


include('display-function.php');
$helpOption=$_GET['h'];


if($helpOption=='sumberdata'){
    require('datasource.php');
}else if($helpOption=='catatankaki'){
    require('footnotes.php');
}else if($helpOption=='menjadimitra'){
    require('becomeapartner.php');
}else if($helpOption=='berikoreksi'){
    require('correction.php');
}else if($helpOption=='tentangkami'){
    require('aboutus.php');
}else if($helpOption=='atributhakcipta'){
    require('copyrightattribute.php');
}else{
    header("Location : https://sehatdirumah.com/");;
}


?>