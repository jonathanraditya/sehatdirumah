<?php require 'lang_assign.php'; ?>

<!doctype html>
<html<?php require 'html_lang_id.php'; ?>>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Head-->
        <?php require 'html-head.php';?>
	</head>

	<body>
        <style>.font19-28{font-size:19px;}</style>
        <!--Main Navbar-->
        <?php require 'main-navbar-sc.php';?>
		<div class="container">
            <!--Welcome navbar-->
            <?php require 'top-navbar.php';?>

			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div>
                    <?php require 'article-head-fetch.php' ?>
                </div>

                <hr>

                <!--Loop Hasil search article-->
                <?php require 'article-fetch.php' ?>


                <!--Loop all tag-->
                <?php require 'tagviewall.php';?>
            </div>

		</div>
        <!--FOOTER-->
        <?php require 'footer.php';?>
        <?php require 'html-head-end.php'; ?>
	</body>
</html>
