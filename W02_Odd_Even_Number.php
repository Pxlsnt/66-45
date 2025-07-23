<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odd_Even-Number</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center">Odd_Even-Number checker</h1>
    <hr>
    <p class="text-center">กรุณาตรวจสอบตัวเลขเพื่อทำการตรวจสอบว่าเป็นเลขคู่เลขคี่</p>

    <form action="" method="post" class="text-center">
        <div class="form-group">
            <input type="number" name="number" id="number" class="form-control w-50 mx-auto" placeholder="Enter-Number" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4">check</button>
    </form>
</div>

<?php 

    $get_number = $_POST['number'] ??null
    ;

    if ($get_number % 2 == 0) {
        echo "<h3 class='text-center text-success mt-3'> เลข $get_number เป็นเลขคู่</h3>";
    } else {
        echo "<h3 class='text-center text-danger mt-3'> เลข $get_number เป็นเลขคี่</h3>";
    }

?>

<a href="index.php">Back</a>
</body>
</html>