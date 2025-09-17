<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>workshop 7 form</title>
</head>
<body>
    <h1>เพิ่มสมาชิก</h1>
    <form action="workshop7-backend.php" method="POST">
        ชื่อผู้ใช้ : <input type="text" name="username"><br>
        รหัสผ่าน : <input type="password" name="password">
        ชื่อสมาชิก : <input type="text" name="name"><br>
        ที่อยู่ : <textarea name="address" rows="3" cols="10"></textarea><br>
        email : <input type="email" name="email"><br>
        เบอร์โทร : <input type="text" name="mobile"><br>

        <input type="submit" value="เพิ่มสมาชิก">
    </form>
</body>
</html>