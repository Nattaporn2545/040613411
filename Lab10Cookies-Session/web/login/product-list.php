<?php
	include "connect.php";
    session_start();
    // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
    if (empty($_SESSION["username"]) ) { 
        header("location:login-form.php");
    }
  
?>

<html>
<head><meta charset="utf-8"></head>
<body>
<?php
   $stmt = $pdo->prepare("SELECT username,ord_date,pname FROM item JOIN orders ON item.ord_id=orders.ord_id 
   JOIN product ON product.pid=item.pid  WHERE username =  '{$_SESSION["username"]}'");
   $stmt->execute();
   
   while ($row = $stmt->fetch()) {
       echo "ชื่อผู้ใช้: " . $row ["username"] . "<br>";
       echo "วันที่สั่งซื้อ: " . $row ["ord_date"] . " <br>";
       echo "ชื่อสินค้า: " . $row ["pname"] . " บาท <br>";
       echo "<hr>\n";
   }

?>
</body>
</html>
