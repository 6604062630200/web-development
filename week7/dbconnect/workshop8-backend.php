<?php include "connect.php"?>

<?php
    $newMember = $pdo->prepare("INSERT INTO member (username,password,name,address,email,mobile) VALUES(?,?,?,?,?,?)");
    $newMember->bindParam(1, $_POST["username"]);
    $newMember->bindParam(2, $_POST["password"]);
    $newMember->bindParam(3, $_POST["name"]);
    $newMember->bindParam(4, $_POST["address"]);
    $newMember->bindParam(5, $_POST["email"]);
    $newMember->bindParam(6, $_POST["mobile"]);

    $newMember->execute();

    header("location:workshop8-detail.php?username=". $_POST["username"])
?>
