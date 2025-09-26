<?php
include "connect.php";
session_start();

if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
    echo "<h2>ไม่มีสิทธ์เข้าถึง</h2>";
    echo "<เข้าสู่ระบบ href='login-form.php'>เข้าสู่ระบบ</a>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการ stock</title>
</head>
<body>
    <h1>จัดการสินค้าคงเหลือ (Admin)</h1>
    <p><a href="user-home.php">กลับหน้าหลัก</a></p>

    <?php
        $stmt = $pdo->prepare("SELECT * FROM product ORDER BY stock ASC");
        $stmt->execute();
    ?>

    <table>
        <thead>
            <tr>
                <th>รหัสสินค้า</th>
                <th>รูปสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>จำนวนสินค้าคงเหลือ</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $stmt->fetch()): ?>
            <tr>
                <td><?=$row["pid"]?></td>
                <td><img src="img/<?=$row['pid']?>.jpg" width="50" alt="<?= $row['pname'] ?>"></td>
                <td><?=$row["pname"]?></td>
                <td><?=$row["price"]?> บาท</td>
                <td><?= $row["stock"] == 0 ? "ไม่มี" : $row["stock"]." ชิ้น" ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>