<?php include "connect.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW 13 all product</title>
</head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT * from product");
        $stmt->execute();

        while($row = $stmt->fetch()){
            echo "<div style='display:flex;'>";
            $imgExt = ["jpg", "png", "jpeg"];
            $productName = $row["pname"];
            $imgPath = "";

            foreach($imgExt as $ext) {
                $testPath = "product_images/" . $productName . "." . $ext;
                if(file_exists($testPath)){
                    $imgPath = $testPath;
                    break;
                }
            }
            echo "<div>" . "<img src='$imgPath'>" . "</div>";
    ?>
    <div>
            <?php
            echo "รหัสสินค้า: " . $row["pid"] . "<br>";
            echo "ชื่อสินค้า: " . $row["pname"] . "<br>"; 
            echo "ราคา: " . $row["price"] . "<br>"; 
            echo "<a href='hw13-editform.php?pid=" . $row["pid"] . "'>แก้ไข</a>";
            ?>
    </div>
        
        <?php
            echo "</div><hr>\n";
        }
    ?>
</body>
</html>