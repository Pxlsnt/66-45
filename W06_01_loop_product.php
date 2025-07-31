<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Filter Product by Price</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">

    <style>
        .container {
            max-width: 800px;
        }
    </style>
</head>

<body>

    <?php

    $products = [
        ['id' => 2001, 'name' => 'Avocado', 'price' => 95, 'quantity' => 40],
        ['id' => 2002, 'name' => 'Blueberry', 'price' => 110, 'quantity' => 30],
        ['id' => 2003, 'name' => 'Blackberry', 'price' => 100, 'quantity' => 35],
        ['id' => 2004, 'name' => 'Dragonfruit', 'price' => 120, 'quantity' => 20],
        ['id' => 2005, 'name' => 'Fig', 'price' => 85, 'quantity' => 50],
        ['id' => 2006, 'name' => 'Jackfruit', 'price' => 60, 'quantity' => 25],
        ['id' => 2007, 'name' => 'Mulberry', 'price' => 90, 'quantity' => 45],
        ['id' => 2008, 'name' => 'Raspberry', 'price' => 105, 'quantity' => 28],
        ['id' => 2009, 'name' => 'Passionfruit', 'price' => 95, 'quantity' => 22],
        ['id' => 2010, 'name' => 'Pomegranate', 'price' => 88, 'quantity' => 33],
        ['id' => 2011, 'name' => 'Tamarind', 'price' => 50, 'quantity' => 60],
        ['id' => 2012, 'name' => 'Coconut', 'price' => 70, 'quantity' => 55],
        ['id' => 2013, 'name' => 'Durian', 'price' => 150, 'quantity' => 10],
        ['id' => 2014, 'name' => 'Starfruit', 'price' => 65, 'quantity' => 48],
        ['id' => 2015, 'name' => 'Longan', 'price' => 75, 'quantity' => 58]
    ];


    if (isset($_POST['price']) && $_POST['price'] !== '') {
        $filterPrice = $_POST['price'];
        $filteredProduct = array_filter($products, function ($product) use ($filterPrice) {
            return $product['price'] == $filterPrice;
        });

        $filteredProduct = array_values($filteredProduct);
    } else {
        $filteredProduct = $products;
    }
    ?>

    <div class="container mt-5">
        <h2 class="mb-4">Product List</h2>

        <form method="post" class="mb-3">
            <input type="number" name="price" class="form-control mb-2" placeholder="Enter price"
                value="<?= isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '' ?>">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="" class="btn btn-secondary">Reset</a>
        </form>

        <table id="productTable" class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price (Baht)</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredProduct as $index => $product): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['quantity'] ?></td>
                    </tr>
                <?php endforeach; ?>
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