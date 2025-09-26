<html>
<head><meta charset="UTF-8"></head>
<body>
    <form action="hw10-backend.php" method="post" enctype="multipart/form-data">
        ชื่อสินค้า: <input type="text" name="pname" ><br>

        รายละเอียดสินค้า: <br> <textarea name="pdetail" rows="3" cols="40"></textarea><br>

        ราคา: <input type="number" name="price"><br>
        <input type="file" name="image">
        <input type="submit" value="เพิ่มสินค้า" accept="image/*">
    </form>
</body>
</html>