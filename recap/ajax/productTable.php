<?php
    $keyword = $_GET["keyword"];
    $conn = mysql_connect("localhost", "root", "1234");

    if($conn){
        mysql_select_db("blueshop");
        mysql_query("SET NAMES utf8");
    }else{
        echo mysql_errno();
    }

    $sql = "SELECT * FROM product WHERE product_name LIKE '%$keyword%'";
    $objQuery = mysql_query($sql);
?>

<table border="1" >
    <?php while($row = mysql_fetch_array($objQuery)): ?>
    <tr>
        <td>
            <a href="productDetail.php?pid=<?php echo $row["product_id"]?>"><?php echo $row["product_name"]?></a>
        </td>
        <td><?php echo $row["product_detail"] ?></td>
        <td><img src="img/<?php echo $row["product_id"]?>.png" width="100"></td>
        <td><?php echo $row["product_price"] ?> บาท</td>
        <td><a href="cart.php?productId=<?php echo $row["product_id"]?>&action=add">สั่งซื้อ</a></td>
    </tr>
    <?php endwhile;?>
</table>