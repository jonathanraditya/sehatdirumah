<?php require 'lang_assign.php'; ?>

<!doctype html>
<html<?php require 'html_lang_id.php'; ?>>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Head-->
        <?php require 'html-head.php';?>
        <style>
            .hr-ar{
                border-color: #00A8FF;
                margin-top:2px;
                margin-bottom:0px;
            }
            .ed-gradient-1{
                background: rgb(255,255,255);
                background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(0,168,255,0.1) 90%, rgba(0,168,255,0.15) 100%);
                margin-top:20px;
            }
            .ed-margin{
                margin-left:7px;
            }
            .ed-bg-tx-1{
                background: rgba(1,168,255,0.04);
                margin-top:0px;
                padding-top:10px;
                padding-bottom:15px;
                padding-right:7px;
                padding-left:7px;
            }
            .hr-c{
                border-color: #B04C4C;
                margin-top:2px;
                margin-bottom:0px;
            }
            .ed-gradient-2{
                background: rgb(255,255,255);
                background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(176,76,76,0.1) 90%, rgba(176,76,76,0.15) 100%);
                margin-top:20px;
            }
            .ed-bg-tx-2{
                background: rgba(176,76,76,0.04);
                margin-top:0px;
                padding-top:10px;
                padding-bottom:15px;
                padding-right:7px;
                padding-left:7px;
            }
            .hr-cg{
                border-color: #4CB05F;
                margin-top:2px;
                margin-bottom:0px;
            }
            .ed-gradient-3{
                background: rgb(255,255,255);
                background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(76,176,95,0.1) 90%, rgba(76,176,95,0.15) 100%);
                margin-top:20px;
            }
            .ed-bg-tx-3{
                background: rgba(76,176,95,0.04);
                margin-top:0px;
                padding-top:10px;
                padding-bottom:15px;
                padding-right:7px;
                padding-left:7px;
            }
        </style>
	</head>

	<body>
        <!--Main Navbar-->
        <?php require 'main-navbar-sc.php';?>
		<div class="container">
            <!--Welcome navbar-->
            <?php require 'top-navbar.php';?>

			<div id="tentang" class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <!--BANNER-->
                <?php require 'banner.php';?>
                <!--Tentang COVID-19-->
                <div>
                    <!--Heading-->
                    <div class="ed-gradient-1">
                        <div class="font-lato font14-18 cl-azure-radiance font-weight-bold ed-margin"><?php echo $dp['edu_about'] ?></div>
                        <hr class="hr-ar">
                    </div>

                    <!--Body-->
                    <div class="ed-bg-tx-1">
                        <?php echo $dp['edu_about_content'] ?>
                        <a id="pencegahan" class="font12-18 cl-curious-blue font-lato" target="_blank" href="<?php echo $dp['edu_about_learnmore_link'] ?>"><?php echo $dp['edu_about_learnmore'] ?></a>
                    </div>
                </div>

                <!--Pencegahan-->
                <div>
                    <!--Heading-->
                    <div class="ed-gradient-1">
                        <div class="font-lato font14-18 cl-azure-radiance font-weight-bold ed-margin"><?php echo $dp['edu_prevention'] ?></div>
                        <hr class="hr-ar">
                    </div>

                    <!--Body-->
                    <div class="ed-bg-tx-1">
                        <?php echo $dp['edu_prevention_content'] ?>
                        <a id="gejala" class="font12-18 cl-curious-blue font-lato"  target="_blank" href="<?php echo $dp['edu_prevention_learnmore_link'] ?>"><?php echo $dp['edu_prevention_learnmore'] ?></a>
                    </div>
                </div>

                <!--Gejala-->
                <div>
                    <!--Heading-->
                    <div class="ed-gradient-2">
                        <div class="font-lato font14-18 cl-chestnut font-weight-bold ed-margin"><?php echo $dp['edu_symptoms'] ?></div>
                        <hr class="hr-c">
                    </div>

                    <!--Body-->
                    <div class="ed-bg-tx-2">
                        <?php echo $dp['edu_symptoms_content'] ?>
                        <a id="penanganan" class="font12-18 cl-curious-blue font-lato" target="_blank" href="<?php echo $dp['edu_symptoms_learnmore_link'] ?>"><?php echo $dp['edu_symptoms_learnmore'] ?></a>
                    </div>
                </div>

                <!--Penanganan-->
                <div>
                    <!--Heading-->
                    <div class="ed-gradient-3">
                        <div class="font-lato font14-18 cl-chateau-green font-weight-bold ed-margin"><?php echo $dp['edu_handling'] ?></div>
                        <hr class="hr-cg">
                    </div>

                    <!--Body-->
                    <div class="ed-bg-tx-3">
                        <?php echo $dp['edu_handling_content'] ?>
                        <a class="font12-18 cl-curious-blue font-lato" target="_blank" href="<?php echo $dp['edu_handling_learnmore_link'] ?>"><?php echo $dp['edu_handling_learnmore'] ?></a>
                    </div>
                </div>
            </div>
		</div>
        <!--FOOTER-->
        <?php require 'footer.php';?>
        <?php require 'html-head-end.php'; ?>
	</body>
</html>
