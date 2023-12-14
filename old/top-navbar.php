<?php

    require 'lang_assign.php';
    
    echo "<!--Welcome navbar-->";
	echo "<nav class='navbar navbar-top-custom text-center container justify-content-center col-lg-8 offset-lg-2 col-md-10 offset-md-1'>";
        echo "<a href='landing.php'>";
            echo "<img class='nav-top-icon' src='".$dp['nav_t_icon']."' alt='Tetap di rumah (stay at home) icon'>";
        echo "</a>";
        echo "<span class='font-alegreya font24-36 nav-top-text'>".$dp['nav_t_text']."</span>";
	echo "</nav>";
	echo "<hr class='hr-top-custom'>"

?>