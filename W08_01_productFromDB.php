<?php
    require_once 'W07_01_connectDB.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop-For-show-product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <style>
    .container {
        max-width: 800px;
    }
    </style>
</head>

<body>
    <?php
    $sql = "SELECT*FROM products";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
?>
    <div class="container mt-5">
        <h1>Product list</h1>

        <form action="" method="post" class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <input type="number" name="price" placeholder="Enter Price" class="form-control mb-2">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <table id="productTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
        if (isset($_POST['price']) && !empty($_POST['price'])) {
            $filterPrice = $_POST['price'];
            $filterProducts = array_filter($products, function($product) use ($filterPrice) {
                return $product['price'] == $filterPrice;
            });

            //คืนค่า ให้เริ่มที่ 0
            $filterProducts = array_values($filterProducts);
        } else {
            $filterProducts = $data;
        }

        foreach ($filterProducts as $index => $product) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . $product['product_id'] . "</td>";
            echo "<td>" . $product['product_name'] . "</td>";
            echo "<td>" . $product['category'] . "</td>";
            echo "<td>" . $product['pice'] . "</td>";
            echo "</tr>";
        }
        ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <script>
    new DataTable('#productTable');
    </script>
    <div class="mt-4">
        <a href="index.php"><button class="floating-btn">Back</button></a>
    </div>
</body>

</html>