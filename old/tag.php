<?php require 'lang_assign.php'; ?>

<!doctype html>
<html<?php require 'html_lang_id.php'; ?>>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Head-->
        <?php require 'html-head.php';?>
	</head>

	<body>
        <!--Main Navbar-->
        <?php require 'main-navbar-sc.php';?>
		<div class="container">
			<!--Welcome navbar-->
            <?php require 'top-navbar.php';?>

			<div  class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <!--Navigation-back-->
                <div class="font14-18 cl-curious-blue margint20 marginb20">
                    <a href="article.php">&lt; <?php echo $dp['vw_back'] ?></a>
                </div>
                <h6><?php echo $dp['tag_search'] ?></h6>
                <span class="border-azr cl-azure-radiance font-lato font12-18">#<?php echo $_GET['search']?></span>
                <hr>

                <!--Hasil search tag-->
                <?php require 'tag_search.php' ?>

                <!--Loop all tag-->
                <?php require 'tagviewall.php';?>
            </div>
		</div>
        <!--FOOTER-->
        <?php require 'footer.php';?>
	</body>
</html>
