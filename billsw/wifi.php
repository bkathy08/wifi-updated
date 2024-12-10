<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $provider = $_POST['provider'];
    $amount = $_POST['amount'];
    $fee = $_POST['fee'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $service = $_POST['service'];
    $payment_date = $_POST['paymentDate'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Payment</title>
    <style>
       
         {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
        }

       
        header {
            background-color: #f8c8d3;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        header h1 {
            color: #ff4f7e;
            font-size: 2rem;
            font-weight: 600;
        }

       
        .container {
            width: 60%;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ff4f7e;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            background-color: #ff4f7e; 
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        .form-group button:hover {
            background-color: #e14266; 
        }

        .summary {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .summary h3 {
            color: #ff4f7e;
        }

        .summary p {
            margin: 10px 0;
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #ff4f7e; 
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            font-size: 1rem;
        }

        /* Logos  hehe cutie*/
        .logo-container {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 100px;
            height: 50px;
        }

        /* Verification checkbox paka check mo bap */
        .verification-container {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .verification-container label {
            font-size: 1.2rem;
        }

    </style>
</head>
<body>

<header>
    <!-- Logo inside the header -->
    <img src="img/l.png" alt="Logo" class="logo">
    <h1></h1>
</header>

<div class="container">
    <h2>Pay Your Bill</h2>

    <!-- 3 Internet Providers Logos -->
    <div class="logo-container">
        <img src="img/skylink.png" alt="PLDT Logo">
        <img src="https://via.placeholder.com/100x50?text=Converge" alt="Converge Logo">
        <img src="https://via.placeholder.com/100x50?text=Globe" alt="Globe Logo">
    </div>

    <!-- Form for Bill Payment -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="provider">Select Provider:</label>
            <select id="provider" name="provider" required>
                <option value="PLDT" <?php echo (isset($provider) && $provider == 'PLDT') ? 'selected' : ''; ?>>PLDT</option>
                <option value="Converge" <?php echo (isset($provider) && $provider == 'Converge') ? 'selected' : ''; ?>>Converge</option>
                <option value="Globe" <?php echo (isset($provider) && $provider == 'Globe') ? 'selected' : ''; ?>>Globe</option>
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Amount Paid (₱):</label>
            <input type="number" id="amount" name="amount" required value="<?php echo isset($amount) ? $amount : ''; ?>" step="0.01">
        </div>

        <div class="form-group">
            <label for="fee">Fee (₱):</label>
            <input type="number" id="fee" name="fee" required value="<?php echo isset($fee) ? $fee : ''; ?>" step="0.01">
        </div>

        <div class="form-group">
            <label for="service">Service:</label>
            <input type="text" id="service" name="service" required value="<?php echo isset($service) ? $service : ''; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required value="<?php echo isset($email) ? $email : ''; ?>">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required value="<?php echo isset($phone_number) ? $phone_number : ''; ?>">
        </div>

        <div class="form-group">
            <label for="paymentDate">Date of Payment:</label>
            <input type="date" id="paymentDate" name="paymentDate" required value="<?php echo isset($payment_date) ? $payment_date : ''; ?>">
        </div>

        <!-- Verification checkbox -->
        <div class="verification-container">
            <input type="checkbox" id="verify" name="verify" required>
            <label for="verify">I verify that all the details entered are correct.</label>
        </div>

        <div class="form-group">
            <button type="submit">Pay Bill</button>
        </div>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    <div class="summary">
        <h3>Payment Summary</h3>
        <p><strong>Provider:</strong> <?php echo htmlspecialchars($provider); ?></p> required
        <p><strong>Amount Paid:</strong> ₱<?php echo number_format($amount, 2); ?></p> required
        <p><strong>Fee:</strong> ₱<?php echo number_format($fee, 2); ?></p>required
        <p><strong>Total Paid:</strong> ₱<?php echo number_format($amount + $fee, 2); ?></p>required
        <p><strong>Service:</strong> <?php echo htmlspecialchars($service); ?></p>required
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>required
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone_number); ?></p>required
        <p><strong>Date of Payment:</strong> <?php echo htmlspecialchars($payment_date); ?></p>required
    </div>
    <?php endif; ?>
</div>

<footer class="footer">
    <p>&copy; 2024 Bill Payment Portal. All rights reserved.</p>
</footer>

</body>
</html>
