<?php include "connect.php"; ?>

<?php
    $targetDir = "product_images/";
    if(!is_dir($targetDir)){
        mkdir($targetDir, 0755, true);
    }

    $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $imagePath = $_POST["pname"] . "." . $ext;
    $targetFile = $targetDir . $imagePath;

    // upload file
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
        $stmt = $pdo->prepare("UPDATE product SET pname=?, pdetail=?, price=? WHERE pid=?");
        $stmt->bindParam(1, $_POST["pname"]);
        $stmt->bindParam(2, $_POST["pdetail"]);
        $stmt->bindParam(3, $_POST["price"]);
        $stmt->bindParam(4, $_POST["pid"]);

        $stmt->execute();
        $pid = $_POST["pid"];

        // redirect
        header("Location: hw13-update-success.php?pid=$pid&img=" . urlencode($targetFile));
        exit;
    }else{
        echo "อัปโหลดรูปสินค้าไม่สำเร็จ";
    }

?>