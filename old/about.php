<?php require 'lang_assign.php'; ?>

<!doctype html>
<html <?php require 'html_lang_id.php'; ?>>
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
                <!--BANNER-->
                <?php require 'banner.php';?>

                <div class="row margint30">
                    <!--Tentang kami-->
                    <div class="col marginb50">
                        <h5 class="font-weight-bold marginb10"><?php echo $dp['abt_aboutus'] ?></h5>
                        <?php echo $dp['abt_content'] ?>
                    </div>

                    <!--Tim kami-->
                    <!--<div class="col">
                        <h5 class="font-weight-bold"><?php echo $dp['abt_teams'] ?></h5>

                        <div class="row">
                            <div class="col margint30">
                                <!--Ito--
                                <div class="text-center">
                                    <div class="col-10 offset-1">
                                        <img class="img-fluid" src="<?php echo $dp['abt_teams_1_img'] ?>" alt="Jonathan Raditya Valerian Front-end developer, analis. Mahasiswa yang menginginkan dunia yang lebih baik melalui teknologi (Students who want a better world through technology)">
                                    </div>
                                    <div class="font-lato font-weight-bold font20-30 margint15"><?php echo $dp['abt_teams_1_name'] ?></div>
                                    <div class="font-istok cl-dusty-gray font16-24 margint5 marginb5"><?php echo $dp['abt_teams_1_desc'] ?></div>
                                    <a class="font-lato font14-18 cl-curious-blue" href="<?php echo $dp['abt_teams_1_contact_link'] ?>"><?php echo $dp['abt_teams_1_contact'] ?></a>
                                </div>
                            </div>
                            <div class="col margint30">
                                <!--Rico--
                                <div class="text-center">
                                    <div class="col-10 offset-1">
                                        <img class="img-fluid" src="<?php echo $dp['abt_teams_2_img'] ?>" alt="Rafael Federico Atantya. Back-end developer. Siswa yang penuh rasa penasaran dan berkeingintahuan tinggi (Students who are full of curiosity and have high curiosity)">
                                    </div>
                                    <div class="font-lato font-weight-bold font20-30 margint15"><?php echo $dp['abt_teams_2_name'] ?></div>
                                    <div class="font-istok cl-dusty-gray font16-24 margint5 marginb5"><?php echo $dp['abt_teams_2_desc'] ?></div>
                                    <a class="font-lato font14-18 cl-curious-blue" href="<?php echo $dp['abt_teams_2_contact_link'] ?>"><?php echo $dp['abt_teams_2_contact'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>



			

			
		</div>
        <!--FOOTER-->
        <?php require 'footer.php';?>
        <?php require 'html-head-end.php'; ?>
	</body>
</html>
