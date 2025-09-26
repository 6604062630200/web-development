<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hw14 FORM</title>
    <script>
        function confirmDel(username) {
            let ans = confirm("ต้องการลบสมาชิก" + username)
            if(ans == true){
                document.location = "workshop6-backend.php?username=" + username
            }
        }
    </script>
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
        <?php
            $imgExt = ["jpg", "png", "jpeg"];
            $username = $row["username"];
            $imgPath = "";

            foreach($imgExt as $ext){
                $testPath = "member_images/" . $username . "." . $ext;
                if(file_exists($testPath)){
                    $imgPath = $testPath;
                    break;
                }
            }
        ?>
        <img src="<?=$imgPath?>" width="100"> <br>
        <!-- link to detail page(workshop5) -->
        <div style="display:flex">
            <a href="workshop5.php?username=<?=$row["username"]?>">
            รายละเอียด  
            </a>
            <button type="submit" onclick="confirmDel('<?=$row["username"]?>')">ลบ</button>
            <a href="hw14-editform.php?username=<?=$row["username"]?>">แก้ไข</a>
        </div>
        <hr>
    <?php endwhile;?>
</body>
</html>