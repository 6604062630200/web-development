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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADDED SUCCESS</title>
</head>
<body>
    เพิ่มสมาชิกสำเร็จ 
</body>
</html>