<?php include "connect.php"; session_start(); ?>

<html>
<head>
    <title>Default Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>สวัสดี <?=$_SESSION["fullname"]?></h1>
หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a>

<?php
    $role = $_SESSION["role"];
    if($role == "user"): ?>
    <h2>รายการสั่งซื้อของคุณ</h2>
    <?php 
        $stmt = $pdo->prepare("SELECT * FROM orders WHERE username = ?");
        $stmt->bindParam(1, $_SESSION["username"]);
        $stmt->execute();
    ?>
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
    <?php elseif($role == "admin"):?>
    <?php
        $stmt = $pdo->prepare("SELECT username, COUNT(*) as order_count FROM orders GROUP BY username");
        $stmt->execute();
    ?>
    <table>
        <thead>
            <tr>
                <th>ชื่อผู้ใช้</th>
                <th>จำนวน order</th>
                <th>ดูรายละเอียด</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $stmt->fetch()) :?>
                <tr>
                    <td><?=$row["username"]?></td>
                    <td><?=$row["order_count"]?></td>
                    <td><a href="lab10_4-admin_orders.php?username=<?=$row['username']?>">ดูรายการ order</a></td>
                </tr>    
            <?php endwhile; ?>    
        </tbody>
    </table>
    <?php endif; ?>

</body>
</html>
