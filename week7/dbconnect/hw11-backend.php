<?php include "connect.php"?>

<?php
    $targetDir = "member_images/";
    if(!is_dir($targetDir)){
        mkdir($targetDir, 0755, true);
    }
    $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $imgPath = $_POST["username"] . "." . $ext;
    $targetFile = $targetDir . $imgPath;

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
        $newMember = $pdo->prepare("INSERT INTO member (username,password,name,address,email,mobile) VALUES(?,?,?,?,?,?)");
        $newMember->bindParam(1, $_POST["username"]);
        $newMember->bindParam(2, $_POST["password"]);
        $newMember->bindParam(3, $_POST["name"]);
        $newMember->bindParam(4, $_POST["address"]);
        $newMember->bindParam(5, $_POST["email"]);
        $newMember->bindParam(6, $_POST["mobile"]);

        $newMember->execute();
        $success = true;
    }else{
        echo "อัปโหลดรูปผู้ใช้ไม่สำเร็จ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADDED SUCCESS</title>
</head>
<body>
    <?php if(isset($success)): ?>
        เพิ่มสมาชิกสำเร็จ
    <div>
        <a href="hw12-member-detail.php?username=<?=$_POST['username']?>">ดูรายละเอียดสมาชิก</a>
    </div>
    <?php endif; ?>
</body>
</html>