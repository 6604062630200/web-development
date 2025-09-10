<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop 2</title>
</head>
<body>
    <?php 
        $members = $pdo->prepare("SELECT * FROM member");
        $members->execute();
    ?>
    <?php while($row = $members->fetch()): ?>
        ชื่อสมาชิก: <?=$row["name"]?> <br>
        ที่อยู่: <?=$row["address"]?> <br>
        อีเมล์: <?=$row["email"]?> <br>
        <hr>
    <?php endwhile;?>
</body>
</html>