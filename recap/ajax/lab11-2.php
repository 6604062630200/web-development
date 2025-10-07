<?php
    $takenUsername = array("bill", "ted");
    $takenEmail = array("test@email.com");

    sleep(1);

    if(!empty($_GET)){
        if($_GET["username"] && !in_array($_GET["username"], $takenUsername)){
            echo "okay";
        }else if($_GET["email"] && !in_array($_GET["email"], $takenEmail)){
            echo "okay";
        }else{
            echo "denied";
        }
    }
?>