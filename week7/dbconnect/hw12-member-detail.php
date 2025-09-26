<?php include "connect.php" ?>
<?php
    $member = $pdo->prepare("SELECT * FROM member WHERE username=?");
    $member->bindParam(1,$_GET["username"]);
    $member->execute();
    $row = $member->fetch();

    $imgExt = ["jpg", "png", "jpeg"];
    $username = $row["username"];
    $imgPath = "";

    foreach($imgExt as $ext) {
        $testPath = "member_images/" . $username . "." . $ext;
        if(file_exists($testPath)){
            $imgPath = $testPath;
            break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW 12 - <?=$row["name"]?></title>
</head>
<body>
    
        
    <div style="display:flex">
        <div>
            <?php if($imgPath != ""): ?>
                <img src="<?=$imgPath?>" width="200" alt="<?=$row["username"]?>">
            <?php else: ?>
                ไม่มีรูปภาพ
            <?php endif; ?>
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