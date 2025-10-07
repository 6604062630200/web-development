<?php
    include "connect.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product-card {
            border: 1px solid #ccc;
            padding: 15px;
            text-align: center;
            width: 150px;
        }
        .promotion-section {
            margin-top: 20px;
            padding: 15px;
            background-color: #f0f0f0;
        }
        .selected-product {
            background-color: #e8f5e9;
        }
    </style>
    <script>
        let selectedProduct = null
        let isMember = <?=isset($_SESSION["username"]) ? 'true' : 'false' ?>

        function selectMainProduct(pid, pname,price) {
            selectedProduct = {pid:pid, pname:pname, price:price}
            document.getElementById('promotion-section').style.display = 'block';

            // อัพเดทข้อมูลสินค้าที่เลือก
            document.getElementById('selected-product-name').innerHTML = pname;
            document.getElementById('selected-product-price').innerHTML = price;

            // แสดงเงื่อนไข
            if(isMember) {
                document.getElementById('promo-condition').innerHTML = 
                    'สมาชิก: เลือกสินค้าฟรี 1 ชิ้น ที่ราคาเท่ากันหรือน้อยกว่า ' + price + ' บาท';
            } else {
                document.getElementById('promo-condition').innerHTML = 
                    'ลูกค้าทั่วไป: ซื้อสินค้ารวม 500 บาทขึ้นไป เลือกสินค้าฟรี 1 ชิ้น ที่ราคาน้อยกว่า 500 บาท';
            }

            // เปิดการใช้งานปุ่มเลือกสินค้าฟรี
            enableFreeProductButtons();
        }

        function enableFreeProductButtons() {
            let buttons = document.getElementsByClassName('free-product-btn');
            for(let btn of buttons) {
                let productPrice = parseFloat(btn.getAttribute('data-price'));
                
                if(isMember) {
                    // สมาชิก: เลือกได้ถ้าราคาเท่ากันหรือน้อยกว่า
                    if(productPrice <= selectedProduct.price) {
                        btn.disabled = false;
                        btn.parentElement.classList.remove('disabled');
                    } else {
                        btn.disabled = true;
                        btn.parentElement.classList.add('disabled');
                    }
                } else {
                    // ไม่เป็นสมาชิก: เลือกได้ถ้าราคาน้อยกว่า 500
                    if(productPrice < 500) {
                        btn.disabled = false;
                        btn.parentElement.classList.remove('disabled');
                    } else {
                        btn.disabled = true;
                        btn.parentElement.classList.add('disabled');
                    }
                }
            }
        }
        
        function selectFreeProduct(pid, pname, price) {
            if(confirm('คุณต้องการเลือก ' + pname + ' เป็นสินค้าฟรีใช่หรือไม่?')) {
                // ส่งข้อมูลไปยัง backend หรือ cart
                document.getElementById('main-pid').value = selectedProduct.pid;
                document.getElementById('free-pid').value = pid;
                document.getElementById('checkout-form').submit();
            }
        }
        
        function skipPromotion() {
            if(confirm('คุณต้องการข้ามสิทธิ์นี้ใช่หรือไม่?')) {
                document.getElementById('main-pid').value = selectedProduct.pid;
                document.getElementById('free-pid').value = '';
                document.getElementById('checkout-form').submit();
            }
        }
    </script>
</head>
<body>
    <h1>โปรโมชั่นพิเศษ - Blue shop</h1>

    <?php if(isset($_SESSION["username"])): ?>
        <p>สวัสดี คุณ<?=$_SESSION["username"]?> (สมาชิก)</p>
        <p><strong>โปรโมชั่น</strong> ซื้อ 1 แถม 1 (เลือกสินค้าที่ราคาเท่ากันหรือน้อยกว่า)</p>
    <?php else: ?>
        <p>สวัสดี ลูกค้าทั่วไป</p>
        <p><strong>โปรโมชั่น:</strong> ซื้อครบ 500 บาท แถมสินค้า 1 ชิ้น (ราคาน้อยกว่า 500 บาท)</p>
    <?php endif; ?>

    <h2>1. เลือกสินค้าที่ต้องการซื้อ</h2>
    <div class="product-grid">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product");
            $stmt->execute();
            while($row = $stmt->fetch()):
        ?>
            <div class="product-card">
                <img src="img/<?=$row['pid']?>.jpg" width="100"><br>
                <strong><?=$row['pname']?></strong><br>
                ราคา: <?=$row['price']?> บาท<br>
                <button onclick="selectMainProduct(<?=$row['pid']?>, '<?=$row['pname']?>', <?=$row['price']?>)">
                    เลือกซื้อ
                </button>
            </div>
        <?php endwhile; ?>
            <div id="promotion-section" class="promotion-section" style="display:none;">
        <h2>2. สินค้าที่คุณเลือก</h2>
        <p>สินค้า: <strong id="selected-product-name"></strong></p>
        <p>ราคา: <strong id="selected-product-price"></strong> บาท</p>
        <p id="promo-condition" style="color: green;"></p>
        
        <h2>3. เลือกสินค้าฟรี (หรือข้ามสิทธิ์)</h2>
        <div class="product-grid">
            <?php
                $stmt2 = $pdo->prepare("SELECT * FROM product");
                $stmt2->execute();
                while($row2 = $stmt2->fetch()):
            ?>
                <div class="product-card">
                    <img src="img/<?=$row2['pid']?>.jpg" width="100" alt="<?=$row2['pname']?>"><br>
                    <strong><?=$row2['pname']?></strong><br>
                    ราคา: <?=$row2['price']?> บาท<br>
                    <button class="free-product-btn" 
                            data-price="<?=$row2['price']?>"
                            onclick="selectFreeProduct(<?=$row2['pid']?>, '<?=$row2['pname']?>', <?=$row2['price']?>)"
                            disabled>
                        เลือกฟรี
                    </button>
                </div>
            <?php endwhile; ?>
        </div>
        
        <button onclick="skipPromotion()" style="margin-top: 20px;">ข้ามสิทธิ์</button>
    </div>
    </div>
    <!-- Form สำหรับส่งข้อมูล -->
    <form id="checkout-form" method="POST" action="quiz3-q1-backend.php" style="display:none;">
        <input type="hidden" id="main-pid" name="main_pid">
        <input type="hidden" id="free-pid" name="free_pid">
    </form>
</body>
</html>