<?php

    $user = "u5256001_admin";
    $password = "12345678901324354657687980";
    $database = "u5256001_sehat_dirumah";
    $con = mysqli_connect('localhost', $user, $password);
    
     if(!$con){
         echo 'gak berhasil konek ke server :(';
     }
     
     
    if(!mysqli_select_db($con,$database)){
        echo 'Database Tidak Ada';
    }

$id_title=$_POST['id-title'];
$id_img_headline=$_POST['id-img-headline'];
$id_img_head_caption=$_POST['id-img-head-caption'];
$id_headline=$_POST['id-headline'];
$id_body=$_POST['id-body'];
$id_tag1=$_POST['id-tag1'];
$id_tag2=$_POST['id-tag2'];
$id_tag3=$_POST['id-tag3'];
$id_tag4=$_POST['id-tag4'];
$en_title=$_POST['en-title'];
$en_img_headline=$_POST['en-img-headline'];
$en_img_head_caption=$_POST['en-img-head-caption'];
$en_headline=$_POST['en-headline'];
$en_body=$_POST['en-body'];
$en_tag1=$_POST['en-tag1'];
$en_tag2=$_POST['en-tag2'];
$en_tag3=$_POST['en-tag3'];
$en_tag4=$_POST['en-tag4'];
$current_date=date('Y-m-d');
$post_id=(rand(10000, 99999));
$admin_id='Jonathan Raditya Valerian';

//$pid='pid' ;
//$post_date='post_date' ;
//$writer='writer' ;
//$id_title='id_title' ;
//$id_img_hd_link='id_img_hd_link' ;
//$id_img_hd_caption='id_img_hd_caption' ;
//$id_headline='id_headline' ;
//$id_body='id_body' ;
//$id_tag1='id_tag1' ;
//$id_tag2='id_tag2' ;
//$id_tag3='id_tag3' ;
//$id_tag4='id_tag4' ;
//$en_title='en_title' ;
//$en_img_hd_link='en_img_hd_link' ;
//$en_img_hd_caption='en_img_hd_caption' ;
//$en_headline='en_headline' ;
//$en_body='en_body' ;
//$en_tag1='en_tag1' ;
//$en_tag2='en_tag2' ;
//$en_tag3='en_tag3' ;
//$en_tag4='en_tag4';

$insert_data = "INSERT INTO article ( 
                                pid, 
                                post_date, 
                                writer, 
                                id_title, 
                                id_img_hd_link, 
                                id_img_hd_caption, 
                                id_headline, id_body, 
                                id_tag1, id_tag2, 
                                id_tag3, id_tag4, 
                                en_title, 
                                en_img_hd_link, 
                                en_img_hd_caption, 
                                en_headline, 
                                en_body, 
                                en_tag1, 
                                en_tag2, 
                                en_tag3, 
                                en_tag4) VALUES (
                                
                                '$post_id', 
                                '$current_date',
                                '$admin_id',
                                '$id_title',
                                '$id_img_headline',
                                '$id_img_head_caption',
                                '$id_headline',
                                '$id_body',
                                '$id_tag1',
                                '$id_tag2',
                                '$id_tag3',
                                '$id_tag4', 
                                '$en_title', 
                                '$en_img_headline',
                                '$en_img_head_caption',
                                '$en_headline',
                                '$en_body',
                                '$en_tag1',
                                '$en_tag2',
                                '$en_tag3',
                                '$en_tag4')";
                                    
//echo 'mantap';

//echo $id_title;

//$sql_add_data=$con->query($insert_data);
//header('refresh:0; url=manage1.php');

if(!mysqli_query($con,$insert_data)){
    header('refresh:0; url=sd-failed.php');
} else{
    header('refresh:0; url=manage1.php');
}
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

?>