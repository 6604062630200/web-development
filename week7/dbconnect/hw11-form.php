<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW 11 form</title>
</head>
<body>
    <h1>เพิ่มสมาชิก</h1>
    <form action="hw11-backend.php" method="POST" enctype="multipart/form-data">
        ชื่อผู้ใช้ : <input type="text" name="username"><br>
        รหัสผ่าน : <input type="password" name="password"><br>
        ชื่อสมาชิก : <input type="text" name="name"><br>
        ที่อยู่ : <textarea name="address" rows="3" cols="10"></textarea><br>
        email : <input type="email" name="email"><br>
        เบอร์โทร : <input type="text" name="mobile"><br>
        <input type="file" name="image">

        <input type="submit" value="เพิ่มสมาชิก">
    </form>
</body>
</html>