<?php
    $mango = $_GET["mango"];
    $orange = $_GET["orange"];
    $banana = $_GET["banana"];

    echo "<b>ยอดขาย ";
    echo ($mango*30) + ($orange*70) + ($banana*30);
    echo " บาท<b>";
?>