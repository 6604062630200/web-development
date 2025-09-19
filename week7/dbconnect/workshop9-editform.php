<?php include "connect.php" ?>
<?php
    $member = $pdo->prepare("SELECT * FROM member WHERE username=?");
    $member->bindParam(1, $_GET["username"]);
    $member->execute();
    $data = $member->fetch()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>workshop 9 Edit form</title>
</head>
<body>
    <h1>แก้ไขข้อมูล</h1>
    <form action="workshop9-backend.php" method="POST">
        <input type="hidden" name="original_username" value="<?=$data["username"]?>">
        ชื่อผู้ใช้ : <input type="text" name="username" value="<?=$data["username"]?>"><br>
        รหัสผ่าน : <input type="password" name="password" value="<?=$data["password"]?>">
        ชื่อสมาชิก : <input type="text" name="name" value="<?=$data["name"]?>"><br>
        ที่อยู่ : <textarea name="address" rows="3" cols="10"><?=$data["address"]?></textarea><br>
        email : <input type="email" name="email" value="<?=$data["email"]?>"><br>
        เบอร์โทร : <input type="text" name="mobile" value="<?=$data["mobile"]?>"><br>

        <input type="submit" value="แก้ไขข้อมูล">
    </form>
</body>
</html>