<?php
    $mango = $_GET["mango"];
    $orange = $_GET["orange"];
    $banana = $_GET["banana"];

    $total = ($mango * 30) + ($orange * 70) + ($banana * 30);
    echo "รวม " . $total . " บาท";
?>