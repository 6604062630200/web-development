<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $stmt = $pdo->prepare("SELECT * FROM product");
        $stmt->execute();
        while($row = $stmt->fetch()){
            echo "<pre>";
            print_r($row);
            echo "/<pre>";
        }
    ?>
</body>
</html>