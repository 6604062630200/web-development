<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop 8 DETAIL</title>
</head>
<body>
    <?php
        $member = $pdo->prepare("SELECT * FROM member WHERE username=?");
        $member->bindParam(1,$_GET["username"]);
        $member->execute();
        $row = $member->fetch();
    ?>
        
    <div style="display:flex">
        <div>
            <img src="img/<?=$row["username"]?>.jpg" width="200" alt="<?=$row["username"]?>">
        </div>
        <div style="padding:15px">
                <h2><?=$row["name"]?></h2><br>
                ที่อยู่ <?=$row["address"]?><br>
                อีเมลล์: <?=$row["email"]?><br>
                เบอร์โทร: <?=$row["mobile"]?><br>
        </div>
    </div>
</body>
</html>