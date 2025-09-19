<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop 9 FORM</title>
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
        $i = 1;
    ?>
    <?php while($row = $members->fetch()): ?>
        ชื่อสมาชิก: <?=$row["name"]?> <br>
        ที่อยู่: <?=$row["address"]?> <br>
        อีเมล์: <?=$row["email"]?> <br>
        <img src="img/<?=$i ?>.jpg" width="100"> <br>
        <!-- link to detail page(workshop5) -->
        <div className="display:flex">
            <a href="workshop5.php?username=<?=$row["username"]?>">
            รายละเอียด  
            </a>
            <button type="submit" onclick="confirmDel('<?=$row["username"]?>')">ลบ</button>
            <a href="workshop9-editform.php?username=<?=$row["username"]?>">แก้ไข</a>
        </div>
        <hr>
        <?php $i++;?>
    <?php endwhile;?>
</body>
</html>