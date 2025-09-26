<?php include "connect.php" ?>
<?php
    $targetDir = "member_images/";
    if(!is_dir($targetDir)){
        mkdir($targetDir, 0777, true);
    }

    $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $imagePath = $_POST["username"] . "." . $ext;
    $targetFile = $targetDir . $imagePath;

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
        $member = $pdo->prepare("UPDATE member SET username=?,password=?,name=?,address=?,email=?,mobile=? WHERE username=?");
        $member->bindParam(1, $_POST["username"]);
        $member->bindParam(2, $_POST["password"]);
        $member->bindParam(3, $_POST["name"]);
        $member->bindParam(4, $_POST["address"]);
        $member->bindParam(5, $_POST["email"]);
        $member->bindParam(6, $_POST["mobile"]);
        $member->bindParam(7, $_POST["original_username"]);

    if($member->execute())
        echo "แก้ไขข้อมูลสำเร็จ";
    
    }else{
        echo "อัปโหลดไม่สำเร็จ";
    }
?>