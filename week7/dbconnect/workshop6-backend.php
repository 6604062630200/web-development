<?php include "connect.php"?>
<?php
    $member = $pdo->prepare("DELETE FROM member WHERE username=?");
    $member->bindParam(1,$_GET["username"]);
    if($member->execute())
        header("location:workshop3.php");
?>