<?php

require 'connect.php';
require 'lang_assign.php';

//Lang Assign
    if($dp['lang']=='1'){
    $lang='id';
    } else{
    $lang='en';
    }

function remove_element($array,$value) {
  return array_diff($array, (is_array($value) ? $value : array($value)));
}

$tag_db="select * from article";
$result_tagdb=$con->query($tag_db);
$ar_tag=array('ex'=>'-9999');
$tag1=$lang."_tag1";
$tag2=$lang."_tag2";
$tag3=$lang."_tag3";
$tag4=$lang."_tag4";
while($row_tag=$result_tagdb->fetch_assoc()){
    array_push($ar_tag,$row_tag[$tag1],$row_tag[$tag2],$row_tag[$tag3],$row_tag[$tag4]);
    $tag_array=array_unique($ar_tag);
}

$tag_array=remove_element($tag_array, '-9999');

echo "<h6>".$dp['tag_search']."</h6>";
echo "<div class='cl-curious-blue font-lato font12-18'>";
foreach($tag_array as $tag){
    echo "<a href='tag.php?search=".$tag."'>#<span>".$tag."</span></a>  ";
}
echo "</div>";


?>
