<?php

$allow = array("167.205.23.115"); //allowed IPs

if(!in_array($_SERVER['REMOTE_ADDR'], $allow) && !in_array($_SERVER["HTTP_X_FORWARDED_FOR"], $allow)) {
    
    // Set a response code
    //var_dump(http_response_code(403));
    //header("HTTP/1.1 403 Forbidden" );
    //header("Location: https://sehatdirumah.com"); //redirect
    //header("Refresh: 5; url=https://sehatdirumah.com");
    
    
    //exit();

}

?>

<!doctype html>
<html>
    <head>
        
    </head>
    <body>
        <h1>Update Data Sehatdirumah.com</h1>
        
        <h2>External Link Update (initial)</h2>
        <a href="_sys_?u=whodata" target="_blank"><div>WHO CSV Data Update</div></a>
        
        <h2>Database Update</h2>
        <a href="_sys_?u=rdu" target="_blank"><div>Rank Dynamic Update</div></a>
        <a href="_sys_?u=rsu" target="_blank"><div>Rank Static Update</div></a>
        <a href="_sys_?u=ltu" target="_blank"><div>Landing Table Update</div></a>
        <a href="_sys_?u=rvu" target="_blank"><div>Region View Update</div></a>
        <a href="_sys_?u=rruu" target="_blank"><div>Region Rank Urutan Update</div></a>
        <a href="_sys_?u=rlu" target="_blank"><div>Region Landing Update</div></a>
        <a href="_sys_?u=rdvu" target="_blank"><div>Region Data Visualization Update</div></a>
        <a href="_sys_?u=lmu" target="_blank"><div>Landing Maps Update</div></a>
        <a href="_sys_?u=lm2u" target="_blank"><div>Landing Maps 2 Update</div></a>

        <h2>Update Pre-Redered Data Sehatdirumah.com</h2>
        <a href="_sys_?u=clmisu" target="_blank"><div>Cache Landing Maps Info Script Update</div></a>
        <a href="_sys_?u=clmdsu" target="_blank"><div>Cache Landing Maps Display Script Update</div></a>
        <a href="_sys_?u=cltu" target="_blank"><div>Cache Landing Table Update</div></a>
        <a href="_sys_?u=cljau" target="_blank"><div>Cache Landing Jarak Aman Update</div></a>
        <a href="_sys_?u=clbrcu" target="_blank"><div>Cache Landing Beban RS CSS Update</div></a>
        <a href="_sys_?u=clksju" target="_blank"><div>Cache Landing Kasus Satu Juta Update</div></a>
        
        <h2>Update robots.txt & sitemap.xml</h2>
        <a href="_sys_?u=sru" target="_blank"><div>Sitemap & robots.txt Update</div></a>
        
        <h2>Clear Cache</h2>
        <a href="_sys_?u=cc" target="_blank"><div>Clear cache after update</div></a>
        <br><br><br><br><br>
        
        <a href="/">HOME</a>
    </body>
</html>