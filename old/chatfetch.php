<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <?php
                        
    require 'connect.php';
    
    //Assigning iso data
    $commentdb="select * from comment ORDER BY date DESC LIMIT 0, 10";
    $result_comment=$con->query($commentdb);
    
    //Extract data from isocode
    while($row=$result_comment->fetch_assoc()){
        echo "<div class='marginb12'>";
        echo     "<div class='font-istok font9-12 cl-dove-gray c-bal1'>".$row['date']."</div>";
        echo     "<div class='c-bal2'>";
        echo         "<span class='font-istok cl-azure-radiance font-weight-bolder font11-15'>".$row['name']."</span><br>";
        echo         "<span class='font-istok cl-dove-gray font11-15'  style='overflow-wrap: break-word;'>   ".$row['content']."</span>";
        echo     "</div>";
        echo     "<form class='c-bal3' action='' method='post'><input id='cid_".$row['cid']."' type='text' value='".$row['likes']."' name='cr_likes' style='display:none;'><input type='text' value='".$row['cid']."' name='cid' style='display:none'>"; ?>
                      <button onclick="fnlike('cid_<?php echo $row['cid'] ?>' , '<?php echo $row['cid'] ?>')" class='btn btn-customdrop  paddingl1 paddingt1 paddingb1'> <?php
        echo         "<img src='img/asset/smile.svg' alt='likes button'>";
        echo         "<span class='cl-curious-blue font-istok font11-15 font-weight-bold'>  ".$row['likes']."</span>";
        echo        "</button>";
        echo     "</form>";
        echo "</div>";
    }

?>
    </body>
</html>