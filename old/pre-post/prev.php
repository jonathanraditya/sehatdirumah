<?php 
/*function absolute_include($file) {
     /*
     $file is the file url relative to the root of your site.
     Yourdomain.com/folder/file.inc would be passed as
     "folder/file.inc"
     */

     /*$folder_depth = substr_count($_SERVER["PHP_SELF"] , "/");

     if($folder_depth == false)
        $folder_depth = 1;

     include(str_repeat("../", $folder_depth - 1) . $file);
}*/

include($_SERVER['DOCUMENT_ROOT'].'/lang_assign.php');

$title = $_POST["ipt-prev-title"];
$tanggal = $_POST["ipt-prev-tgl"];
$isinya = $_POST["txt-prev"];

//echo"halo";
//echo "$title";
?>

<!doctype html>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Head-->
        <?php include("html-head.php");?>
        <title><?php echo $title;?></title>
	</head>

	<body>
        <!--Main Navbar-->
        <?php include($_SERVER['DOCUMENT_ROOT'].'/main-navbar-sc.php');?>
        <div class="container">
            <!--Welcome navbar-->
            <?php include($_SERVER['DOCUMENT_ROOT'].'/top-navbar.php');?>

			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <!--Navigation-back-->
                <div class="font14-18 cl-curious-blue margint20 marginb20">
                    <a href="article.php">&lt; <?php echo $dp['vw_back'] ?></a>
                </div>

                <!--Article view-->
                <div>
                    <h5 class="font-weight-bold marginb3"><?php echo $title;?></h5>
                    <div class="font-istok cl-dusty-gray font10-15"><?php echo $tanggal;?></div>
                    <img class="img-fluid margint15" src="img/Coronaimg.jpg" alt="Ilustrasi COVID-19 (CDC-Unsplash 2020)">
                    <div class="font-istok font13-20 cl-scorpion margint5 marginb20">Ilustrasi COVID-19 (CDC-Unsplash 2020)</div>
                    <div><?php echo $isinya;?></div>
                </div>
            </div>
			
		</div>
        <!--FOOTER-->
        <?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php');?>
	</body>
</html>
