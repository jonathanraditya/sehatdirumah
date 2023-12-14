<?php

if ($_GET['id'] == '1') {
    echo 'displaynone'; //add post panel
} else if ($_GET['id'] == '2') {
    echo ''; //add data panel
} else {
    echo 'displaynone'; //edit site component
            }

?>
