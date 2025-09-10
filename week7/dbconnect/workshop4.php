<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop 3</title>
</head>
<body>
    <form >
        <input type="text" name="keyword" >
        <input type="submit" value="ค้นหา">
    </form>
    <?php 
        $members = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");

        if(!empty($_GET))
            $value = "%" . $_GET["keyword"] . "%";

        $members->bindParam(1, $value);
        $members->execute();
        $i = 1;
    ?>
    <?php while($row = $members->fetch()): ?>
        ชื่อสมาชิก: <?=$row["name"]?> <br>
        ที่อยู่: <?=$row["address"]?> <br>
        อีเมล์: <?=$row["email"]?> <br>
        <img src="img/<?=$i ?>.jpg" width="100"> <br>
        <hr>
        <?php $i++;?>
    <?php endwhile;?>
</body>
</html>