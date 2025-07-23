<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Calculate Money</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .result-box {
            background: #f9f9f9;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: all 0.3s ease;
        }
        .result-header {
            background: linear-gradient(to right, #00bfff, #0099cc);
            color: white;
            font-size: 20px;
            font-weight: bold;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 20px;
            text-align: center;
        }
        .result-box p {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">PHP Calculate Money</h1>
    <hr>
    <p class="text-center">กรุณากรอกข้อมูลเพื่อทำการคำนวณยอดเงิน</p>

    <form method="post" class="row justify-content-center">
        <div class="col-md-3 mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" required value="<?= $_POST['price'] ?? '' ?>">
        </div>
        <div class="col-md-3 mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required value="<?= $_POST['amount'] ?? '' ?>">
        </div>
        <div class="col-12 mb-3 text-center">
            <label class="form-label">Membership?</label><br>
            <div class="form-check form-check-inline">
                <input type="radio" name="member" id="member_yes" value="yes" class="form-check-input" required <?= (($_POST['member'] ?? '') === 'yes') ? 'checked' : '' ?>>
                <label for="member_yes" class="form-check-label">Member (10% Discount)</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="member" id="member_no" value="no" class="form-check-input" <?= (($_POST['member'] ?? '') === 'no') ? 'checked' : '' ?>>
                <label for="member_no" class="form-check-label">Not Member</label>
            </div>
        </div>
        <div class="col-12 text-center mb-4">
            <button type="submit" name="calculate" class="btn btn-primary me-2">Calculate</button>
            <a href="" class="btn btn-dark">Reset All</a>
        </div>
    </form>

    <div class="row justify-content-center">
        <div class="col-md-6 result-box">
            <div class="result-header">Show Result</div>

            <?php
            $price = isset($_POST['price']) ? floatval($_POST['price']) : null;
            $amount = isset($_POST['amount']) ? intval($_POST['amount']) : null;
            $isMember = $_POST['member'] ?? 'no';

            if ($price > 0 && $amount > 0):
                $total = $price * $amount;
                $discount = ($isMember === 'yes') ? $total * 0.10 : 0;
                $final = $total - $discount;
                ?>
                <p><strong>ราคาสินค้า:</strong> <?= number_format($price, 2) ?> บาท</p>
                <p><strong>จำนวนสินค้า:</strong> <?= $amount ?> ชิ้น</p>
                <p><strong>รวมเป็นเงิน:</strong> <?= number_format($total, 2) ?> บาท</p>
                <?php if ($isMember === 'yes'): ?>
                    <p><strong>ส่วนลดสมาชิก (10%):</strong> <?= number_format($discount, 2) ?> บาท</p>
                <?php endif; ?>
                <p><strong>ยอดที่ต้องชำระ:</strong> 
                    <span class="<?= $discount > 0 ? 'text-success' : 'text-danger' ?>">
                        <?= number_format($final, 2) ?> บาท
                    </span>
                </p>
                <?php if ($isMember === 'no'): ?>
                    <div class="alert alert-info mt-3 text-center">
                        คุณไม่ได้เป็นสมาชิก
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="text-center text-muted">Please input for Price and Amount.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- ปุ่ม back -->
    <a href="index.php" class="btn btn-outline-secondary mt-4">← Back to Home</a>
</div>
</body>
</html>
