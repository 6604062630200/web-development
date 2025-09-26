<?php include "connect.php"?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
    $stmt->execute([
        $_GET["pid"]
    ]);
    $row = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hw 13 edit form</title>
</head>
<body>
    <form action="hw13-backend.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?=$row["pid"]?>">
        ชื่อสินค้า: <input type="text" name="pname" value="<?=$row["pname"]?>"><br>
        รายละเอียดสินค้า: <textarea name="pdetail" rows="3" cols="40"><?=$row["pdetail"]?></textarea><br>
        ราคา: <input type="number" name="price" value="<?=$row["price"]?>"><br>
        <input type="file" name="image"><br>
        <input type="submit" value="แก้ไขสินค้า">
    </form>
</body>
</html>