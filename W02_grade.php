<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>
</head>
<body>
    
<div class="container">
    <h1 class="text-center">PHP check grade A-E from score</h1>
    <hr>
    <p class="text-center">กรุณากรอกคะแนนเพื่อตรวจสอบว่าได้เกรดอะไร</p>

    <form action="" method="post" class="text-center">
        <div class="form-group">
            <input type="number" name="score" id="score" 
            value="<?php echo isset($_POST['score']) ? $_POST['score'] : ''; ?>"
        class="form-control w-50 mx-auto" placeholder="Enter a Score" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4">check</button>
        <button type="button" class="btn btn-secondary mt-4" onclick="window.location.href=window.location.href">reset</button>

    </form>


    <?php 
    if (isset($_POST['score'])) {
        $score = $_POST['score'];

        if($score < 0 || $score > 100) {
            echo "<h3 class='text-center text-danger mt-3'>กรุณากรอกคะแนนระหว่าง 0-100 เท่านั้น </h3>";
        } else {
            if ($score >= 80) {
                echo "<h3 class='text-center text-success mt-3'> คะแนน $score คุณได้เกรด A </h3>";
            } elseif ($score >= 70) {
                echo "<h3 class='text-center text-info mt-3'> คะแนน $score คุณได้เกรด B </h3>";
            } elseif ($score >= 60) {
                echo "<h3 class='text-center text-primary mt-3'> คะแนน $score คุณได้เกรด C </h3>";
            } elseif ($score >= 50) {
                echo "<h3 class='text-center text-warning mt-3'> คะแนน $score คุณได้เกรด D </h3>";
            } else {
                echo "<h3 class='text-center text-danger mt-3'> คะแนน $score คุณได้เกรด E </h3>";
            }
        }
    }
?>

<hr>
</div>

<a href="index.php">Back</a>
</body>
</html>