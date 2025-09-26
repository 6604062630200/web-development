<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM orders where username=?");
    $stmt->bindParam(1, $_GET["username"]);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders ของ <?=$_GET["username"]?></title>
</head>
<body>
    <h1>Order ทั้งหมดของ <?=$_GET["username"]?></h1>
        <table>
        <thead>
            <tr>
                <th>รหัสออเดอร์</th>
                <th>วันที่สั่งซื้อ</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $stmt->fetch()) :?>
                <tr>
                    <td><?=$row["ord_id"]?></td>
                    <td><?=$row["ord_date"]?></td>
                    <td><?=$row["status"]?></td>
                </tr>    
            <?php endwhile; ?>    
        </tbody>
    </table>
</body>
</html>