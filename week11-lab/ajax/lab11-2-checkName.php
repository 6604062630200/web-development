<?php
    $takenUsernames = array("bill", "ted");
    $takenEmails = array("bill@email.com", "ted@email.com");

    sleep(1);

    if(!empty($_GET)){
        if( $_GET["username"] && !in_array($_GET["username"], $takenUsernames)){
            echo "okay";
        }else if($_GET["email"] && !in_array($_GET["email"], $takenEmails)){
            echo "okay";
        }else{
            echo "denied";
        }
    }
?>