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

			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <!--Pengantar-->
                <div>
                    <h5 class="font-weight-bold"><?php echo $dp['ca_about'] ?></h5>
                    <?php echo $dp['ca_content'] ?>
                </div>

                <!--Terkhusus untuk-->
                <div class="margint35">
                    <h5 class="font-weight-bold"><?php echo $dp['ca_list'] ?></h5>
                    <div class="marginb10" >
                        <a href="#">Becris dari FlatIcon</a>
                    </div>
                    <div class="marginb10">
                        <a href="#">Freepik dari FlatIcon</a>
                    </div>
                    <div class="marginb10">
                        <a href="#">Seattle Times Graphics Staff dari Seattle Times</a>
                    </div>
                    <div class="marginb10">
                        <a href="#">Centers for Disease Control and Prevention (CDC) dari Unsplash</a>
                    </div>

                </div>
            </div>

			
			
		</div>
        <!--FOOTER-->
        <?php require 'footer.php';?>
        <?php require 'html-head-end.php'; ?>
	</body>
</html>
