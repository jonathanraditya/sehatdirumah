<?php
session_start();

if (isset($_SESSION['email']) and isset($_SESSION['nama']) and isset($_SESSION['inisial'])){
    
} else{
    header('refresh:0; url =../');
}
    $user = "u5256001_admin";
    $password = "12345678901324354657687980";
    $database = "u5256001_sehat_dirumah";
    $con = mysqli_connect('localhost', $user, $password);
    
     if(!$con){
         echo 'gak berhasil konek ke server :(';
     }
     
     
    if(!mysqli_select_db($con,"u5256001_sehat_dirumah")){
        echo 'Database Tidak Ada';
    }
    
    $cityCode = array("ac","be","ja","bb","kr","la","ri","sb","ss","su","bt","gr","jk","jb","jt","ji","yo","kb","ks","kt","ki","ku","ma","mu","ba","nb","nt","pa","pb","sr","sn","st","sg","sa","id","wl");
?>

<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Head-->
        <?php require 'html-head.php';?>

        <style>

        </style>
    </head>
    <body>
    <?php require 'sd-navbar.php'; ?>

    <!--BODY-->
    <div class="container margint40">

        <?php require 'sd-mobile-nav.php'; ?>

        <div class="row">
            <?php require 'sd-sidenav.php'; ?>

            <!--Add New Article Post-->
            <div class="col-xl-6 col-lg-9 col-md-12">
                <h4>Add New Article Post</h4>
                <p>Use this section to add new articles</p>
                <form action='sd-post-process.php' method='post'>
                    <div class="row margint15 marginb20">
                        <div class="col">
                        <span class="float-left">
                            <span class="info1 font-lato font16-24 font-weight-bold cl-white marginl15">Bahasa</span>
                            <span class="info2 font-lato font16-24 font-weight-bold cl-white marginl10">English</span>
                        </span>
                            <span class="float-right">
                            <button type="submit" class="btn btn-custom4">Preview</button>
                            <button type="submit" class="btn btn-custom5">Post</button>
                        </span>
                        </div>
                    </div>

                    <div class="col formg-id">
                        <div class="form-group margint15">
                            <label for="id-title">Title</label>
                            <input type="text" class="form-control form-box-custom3" id="id-title" name="id-title">
                        </div>
                        <div class="form-group">
                            <label for="id-img-headline">Image Headline Link</label>
                            <input type="text" class="form-control form-box-custom3" id="id-img-headline" name="id-img-headline">
                        </div>
                        <div class="form-group">
                            <label for="id-img-head-caption">Image Headline Caption</label>
                            <input type="text" class="form-control form-box-custom3" id="id-img-head-caption" name="id-img-head-caption">
                        </div>
                        <div class="form-group">
                            <label for="id-headline">Article Headline</label>
                            <textarea class="form-control form-box-custom3" id="id-headline" rows="3" name="id-headline"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="id-body">Body</label>
                            <textarea class="form-control form-box-custom3" id="id-body" rows="30" name="id-body"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="id-tag1">Tag 1</label>
                            <input type="text" class="form-control form-box-custom3" id="id-tag1" name="id-tag1">
                        </div>
                        <div class="form-group">
                            <label for="id-tag2">Tag 2</label>
                            <input type="text" class="form-control form-box-custom3" id="id-tag2" name="id-tag2">
                        </div>
                        <div class="form-group">
                            <label for="id-tag3">Tag 3</label>
                            <input type="text" class="form-control form-box-custom3" id="id-tag3" name="id-tag3">
                        </div>
                        <div class="form-group">
                            <label for="id-tag4">Tag 4</label>
                            <input type="text" class="form-control form-box-custom3" id="id-tag4" name="id-tag4">
                        </div>
                    </div>
                    <div class="col formg-en margint40">
                        <div class="form-group margint15">
                            <label for="en-title">Title</label>
                            <input type="text" class="form-control form-box-custom3" id="en-title" name="en-title">
                        </div>
                        <div class="form-group">
                            <label for="en-img-headline">Image Headline Link</label>
                            <input type="text" class="form-control form-box-custom3" id="en-img-headline" name="en-img-headline">
                        </div>
                        <div class="form-group">
                            <label for="en-img-head-caption">Image Headline Caption</label>
                            <input type="text" class="form-control form-box-custom3" id="en-img-head-caption" name="en-img-head-caption">
                        </div>
                        <div class="form-group">
                            <label for="en-headline">Article Headline</label>
                            <textarea class="form-control form-box-custom3" id="en-headline" rows="3" name="en-headline"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="en-body">Body</label>
                            <textarea class="form-control form-box-custom3" id="en-body" rows="30" name="en-body"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="en-tag1">Tag 1</label>
                            <input type="text" class="form-control form-box-custom3" id="en-tag1" name="en-tag1">
                        </div>
                        <div class="form-group">
                            <label for="en-tag2">Tag 2</label>
                            <input type="text" class="form-control form-box-custom3" id="en-tag2" name="en-tag2">
                        </div>
                        <div class="form-group">
                            <label for="en-tag3">Tag 3</label>
                            <input type="text" class="form-control form-box-custom3" id="en-tag3" name="en-tag3">
                        </div>
                        <div class="form-group">
                            <label for="en-tag4">Tag 4</label>
                            <input type="text" class="form-control form-box-custom3" id="en-tag4" name="en-tag4">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-custom5">Post</button>
                </form>

            </div>

            <!--Text Styling Cheatsheet-->
            <div class="col-xl-3 d-none d-xl-block">
                <h5>Code Cheatsheet</h5>
                <div>HTML Component</div>
                <div class="col">
                    <figure>
                        <figcaption>Header</figcaption>
                        <code>
                            &lt;header&gt;&lt;/header&gt;
                        </code>
                    </figure>
                    <figure>
                        <figcaption>Article</figcaption>
                        <code>
                            &lt;article&gt;&lt;/article&gt;
                        </code>
                    </figure>
                    <figure>
                        <figcaption>Footer</figcaption>
                        <code>
                            &lt;footer&gt;&lt;/footer&gt;
                        </code>
                    </figure>
                </div>

                <div>Heading</div>
                <div class="col">
                    <figure>
                        <figcaption>h1, h2, h3, h4, h5, h6</figcaption>
                        <code>
                            &lt;h1&gt;&lt;/h1&gt;<br>
                            &lt;h2&gt;&lt;/h2&gt;<br>
                            &lt;h3&gt;&lt;/h3&gt;<br>
                            &lt;h4&gt;&lt;/h4&gt;<br>
                            &lt;h5&gt;&lt;/h5&gt;<br>
                            &lt;h6&gt;&lt;/h6&gt;<br>
                        </code>
                    </figure>
                </div>
                <div>Text formatting</div>
                <div class="col">
                    <figure>
                        <figcaption>Hightlight, Deleted, Strikethrough, Addition (insert), Underline, Small, Strong, Italic</figcaption>
                        <code>
                            &lt;mark&gt;&lt;/mark&gt;<br>
                            &lt;del&gt;&lt;/del&gt;<br>
                            &lt;s&gt;&lt;s&gt;<br>
                            &lt;ins&gt;&lt;/ins&gt;<br>
                            &lt;u&gt;&lt;/u&gt;<br>
                            &lt;small&gt;&lt;/small&gt;<br>
                            &lt;strong&gt;&lt;strong&gt;<br>
                            &lt;em&gt;&lt;/em&gt;<br>
                        </code>
                    </figure>
                </div>
                <div>Image insert</div>
                <div class="col">
                    <figure>
                        <figcaption>Image with BS4 fluid</figcaption>
                        <code>
                            &lt;img class="img-fluid" src="imagesource" alt="imagedescription" &gt;
                        </code>
                    </figure>
                </div>
                <div>Paragraph</div>
                <div class="col">
                    <figure>
                        <figcaption>Default p tag</figcaption>
                        <code>
                            &lt;p&gt;&lt;/p&gt;
                        </code>
                    </figure>
                </div>
                <div>Add external link</div>
                <div class="col">
                    <figure>
                        <figcaption>Open in new tab</figcaption>
                        <code>
                            &lt;a href="linksource" target="_blank"&gt;&lt;/a&gt;
                        </code>
                    </figure>
                    <figure>
                        <figcaption>Open in same window</figcaption>
                        <code>
                            &lt;a href="linksource"&gt;&lt;/a&gt;
                        </code>
                    </figure>
                    <figure>
                        <figcaption>Download link</figcaption>
                        <code>
                            &lt;a href="linksource" download&gt;&lt;/a&gt;
                        </code>
                    </figure>
                </div>
                <div>Table</div>
                <div class="col">
                    <figure>
                        <figcaption>BS4 Table Structure</figcaption>
                        <code>
                            &lt;table class="table table-hover"&gt;<br>
                            &nbsp;&nbsp;&lt;caption&gt;List of users&lt;/caption&gt;<br>
                            &nbsp;&nbsp;&lt;thead&gt;<br>
                            &nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope="col"&gt;&lt;/th&gt;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope="col"&gt;&lt;/th&gt;<br>
                            &nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                            &nbsp;&nbsp;&lt;/thead&gt;<br>
                            &nbsp;&nbsp;&lt;tbody&gt;<br>
                            &nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp; &lt;th scope="row"&gt;1&lt;/th&gt;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;Mark&lt;/td&gt;<br>
                            &nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                            &nbsp;&nbsp;&lt;/tbody&gt;<br>
                            &lt;/table&gt;<br>
                        </code>
                    </figure>
                    <figure>
                        <figcaption>BS4 Class</figcaption>
                        <code>
                            .table<br>
                            .table-dark<br>
                            .table-stripped<br>
                            .table-bordered<br>
                            .table-borderless<br>
                            .table-hover<br><br>
                            .thead-light<br>
                            .thead-dark<br><br>
                            .table-active<br>
                            .table-primary<br>
                            .table-secondary<br>
                            .table-success<br>
                            .table-danger<br>
                            .table-warning<br>
                            .table-info<br>
                            .table-light<br>
                            .table-dark<br><br>
                            .bg-primary<br>
                            .bg-success<br>
                            .bg-warning<br>
                            .bg-danger<br>
                            .bg-info<br>
                        </code>
                    </figure>
                </div>
                <div>Lists</div>
                <figure>
                    <figcaption>Apply Class</figcaption>
                    <code>
                        .list-style<br>
                        .list-unstyled<br>
                        &lt;ul&gt;&lt;/ul&gt;<br>
                        &lt;ol&gt;&lt;/ol&gt;<br>
                        &lt;li&gt;&lt;/li&gt;<br>
                    </code>
                </figure>
                <div>Blockquote</div>
                <figure>
                    <figcaption>Structure</figcaption>
                    <code>
                        &lt;blockquote class="blockquote"&gt;<br>
                        &nbsp;&nbsp;&lt;p class="mb-0">content&lt;/p&gt;<br>
                        &nbsp;&nbsp;&lt;footer class="blockquote-footer"&gt;Thanks &lt;cite title="Source Title"&gt;Source&lt;/cite&gt;&lt;/footer&gt;<br>
                        &lt;/blockquote&gt;<br>
                    </code>
                </figure>
                <figure>
                    <figcaption>Text Align</figcaption>
                    <code>
                        .text-center<br>
                        .text-right<br>
                        .text-left<br>
                    </code>
                </figure>
            </div>
        </div>
    </div>
    </body>
</html>
