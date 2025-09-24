<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW 10</title>
</head>
<?php
    $pid = $_GET["pid"];
    $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
    $stmt->bindParam(1, $pid);
    $stmt->execute();
    $row = $stmt->fetch();
?>
<body>
    <div style="display:flex">
        <img src="<?=$row["image_path"]?>">
        <div>
            <?php
                echo "<div>";
                echo "รหัสสินค้า" . $row["pid"] . "<br>";
                echo "ชื่อสินค้า" . $row["pname"] . "<br>";
                echo "รายละเอียดสินค้า" . $row["pdetail"] . "<br>";
                echo "ราคา" . $row["price"]. "<br>";
            ?> 
        </div>
    </div>
</body>
</html>