<?php include "connect.php"; ?>

<?php
    $targetDir = "images/";
    if(!is_dir($targetDir)){
        mkdir($targetDir,0777, true);
    }

    $imageName = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . time() . "_" . $imageName;

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
        $stmt = $pdo->prepare("INSERT INTO product (pname, pdetail, price, image_path) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $_POST["pname"]);
        $stmt->bindParam(2, $_POST["pdetail"]);
        $stmt->bindParam(3, $_POST["price"]);
        $stmt->bindParam(4, $targetFile);

        $stmt->execute();
        $pid = $pdo->lastInsertId();
        echo "เพิ่มสินค้าสำเร็จ <a href='hw10-insert-success.php?pid=$pid'>ดูสินค้า</a>"; 
        // ถ้าอยาก redirect ให้ใช้ head(location:hw10-insert-success) ใช่มั้ย
    }else{
        echo "upload รูปสินค้าไม่สำเร็จ";
    }
?>