<?php
require_once 'W07_01_connectDB.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    echo "<h2>พบ ข้อมูลในตาราง Product"<br>;

    $data = $result -> fetchAll(PDO::FETCH_NUM);

    print_r($data);

} else {
    echo "<h2>ไม่พบ ข้อมูลในตาราง Product";
}

?>