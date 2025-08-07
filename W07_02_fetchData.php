<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .floating-btn {
        position: fixed;
        bottom: 24px;
        right: 24px;
        padding: 14px 28px;
        font-size: 15px;
        font-weight: 600;
        color: #fff;
        background: rgba(255, 255, 255, 0.1); /* ARGB Glass effect */
        border: 2px solid transparent;
        border-radius: 50px;
        backdrop-filter: blur(10px);
        cursor: pointer;
        z-index: 1000;
        transition: transform 0.3s ease;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
    }

    .floating-btn::before {
        content: "";
        position: absolute;
        top: -3px;
        left: -3px;
        right: -3px;
        bottom: -3px;
        background: conic-gradient(
            from 0deg,
            red,
            orange,
            yellow,
            lime,
            cyan,
            blue,
            magenta,
            red
        );
        animation: spin 4s linear infinite;
        z-index: -2;
        border-radius: 60px;
        filter: blur(2px);
    }

    .floating-btn::after {
        content: "";
        position: absolute;
        top: 2px;
        left: 2px;
        right: 2px;
        bottom: 2px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50px;
        z-index: -1;
        backdrop-filter: blur(6px);
    }

    .floating-btn:hover {
        transform: scale(1.08);
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    /* Optional: font & body styling */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #fff;
        color: #222;
        margin: 0;
        padding: 0;
    }
</style>

</head>
<body>
    <?php
    require_once 'W07_01_connectDB.php';
    
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if($result->rowCount() > 0){
        echo "<h2> พบ ข้อมูลในตาราง Product </h2>";
//=================================================================================================
        //$data = $result->fetchAll(PDO::FETCH_NUM);
        //$data = $result->fetchAll(PDO::FETCH_ASSOC);
        //$data = $result->fetchAll(PDO::FETCH_BOTH);
        //print_r($data);

//=================================================================================================        
        //ใช้ prepared statemant เพื่อป้องกัน SQL injection
        //ใช้ execute() เพื่อรันคำสั่ง SQL
        //ใช้ fetch() เพื่อดึงข้อมูลทั้งหมดในรูปแบบ array
        //ใช้ print_r() เพื่อแสดข้อมูลทั้งหมดในรูปแบบ array


    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll(PDO::FETCH_NUM);
    echo "<pre>";
    print_r(value: $data);
    echo "</pre>";    

    echo "--------------------------------------------------------------------------------------------------------------------------------------";

    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $data = $stmt -> fetchAll(PDO::FETCH_NUM);
    //echo "<pre>";
    //print_r(value: $data);
    //echo "</pre>";


    // แสดงผลข้อมูลที่ดึงมา ด้วย JSON
    //header('Content-Type: application/json'); // ระบุ Content-Type เป็น JSON
    //echo json_encode($arr1, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); // แปลงข้อมูลใน $arr เป็น JSON และแสดงผล

    }else {
        echo "<h2> ไม่พบข้อมูลในตาราง Product </h2>";
    }





?>


















    <div class="mt-4">
        <a href="index.php"><button class="floating-btn">Back</button></a>
    </div>
</body>
</html>