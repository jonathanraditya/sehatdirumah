<?php

require 'lang_assign.php';

echo        "<!--Dropdown Navbar-->";
echo        "<!--Navbar-->";
echo        "<div class='dropdown-main-navbar' id='main-navbar'>";
echo        "<div class='container paddingrl4'>";
echo            "<div class='col-lg-8 offset-lg-2 col-md-10 offset-md-1 paddingrl1'>";
echo                "<nav class='navbar navbar-dark  dropdown-main-navbar justify-content-between'>";
echo                    "<!-- Navbar brand -->";
echo                    "<div class='justify-content-center'>";
echo                        "<a class='navbar-brand' href='landing.php'><h6 class='marginb0 font-weight-bold font19-28'>".$dp['nav_brand']."</h6></a>";
echo                    "</div>";
echo                    "<!-- Collapse button -->";
echo                    "<button class='navbar-toggler third-button navbar-edit-border' type='button' data-toggle='collapse' data-target='#navbarSupportedContent22'
echo                            aria-controls='navbarSupportedContent22' aria-expanded='false' aria-label='Toggle navigation'>";
echo                        "<div class='animated-icon3'><span></span><span></span><span></span></div>";
echo                    "</button>";
echo                    "<!-- Collapsible content -->";
echo                    "<div class='collapse navbar-collapse' id='navbarSupportedContent22'>";
echo                        "<!-- Links -->";
echo                        "<ul class='navbar-nav mr-auto'>";
echo                            "<li class='nav-item active'>";
echo                               "<a class='nav-link font-alegreya font16-24' href='article.php'>".$dp['nav_dailyanalysis']."<span class='sr-only'>(current)</span></a>";
echo                           "</li>";
echo                           "<li class='nav-item'>";
echo                                "<a class='nav-link font-alegreya font16-24' href='comment.php'>".$dp['nav_publiccomment']."</a>";
echo                            "</li>";
echo                            "<li class='nav-item'>";
echo                                "<a class='nav-link font-alegreya font16-24' href='edu.php'>".$dp['nav_education']."</a>";
echo                            "</li>";
echo                            "<li class='nav-item'>";
echo                                "<a class='nav-link font-alegreya font16-24' href='about.php'>".$dp['nav_about']."</a>";
echo                            "</li>";
echo                            "<li class='nav-item'>";
echo                                "<a class='nav-link font-alegreya font16-24' href='copyrightattribute.php'>".$dp['nav_copyright']."</a>";
echo                            "</li>";
echo                        "</ul>";
echo                        "<!-- Links -->";
echo                    "</div>";
echo                    "<!-- Collapsible content -->";
echo                "</nav>";
echo                "<!--/.Navbar-->";
echo            "</div>";
echo        "</div>";
echo        "</div>";

?>
