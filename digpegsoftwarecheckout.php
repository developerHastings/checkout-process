<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Methods</title>
  <style>
    /* Center container horizontally and vertically */
    body {
      display: flex; /* Make body element a flex container */
      justify-content: center; /* Center content horizontally */
      align-items: center; /* Center content vertically */
      min-height: 100vh; /* Set minimum body height to viewport height */
      margin: 0; /* Remove default body margin */
      font-family: sans-serif; /* Set default font family */
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center; /* Center elements horizontally within container */
      margin: 20px auto; /* Remove unnecessary margin (inherited from previous version) */
      max-width: 400px;
      padding: 20px;
      border-radius: 5px;
      background-color: #f5f5f5;
    }
    
    .checkout-button {
      text-decoration: none; /* Remove underline from links */
      display: inline-block; /* Allow buttons to shrink to content */
      padding: 12px 20px; /* Set consistent padding for all buttons */
      border: none;
      border-radius: 50px; /* Set border-radius to 50% for pill shape */
      font-size: 16px;
      color: white; /* Text color set to white */
      cursor: pointer;
      margin-bottom: 10px;
      background-color: black; /* Button background set to black */
      font-family: 'Rubik', sans-serif; /* Set font family to Rubik */
      text-align: center; /* Center text within buttons */
    }
    
    .checkout-button:hover {
      background-color: #333; /* Change background color on hover */
    }
    
    /* Added style for h1 */
    h1 {
      font-family: 'Rubik', sans-serif; /* Inherited from container */
      font-weight: bold; /* Set font weight to bold */
    }
  </style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap">
</head>
<body>
  <div class="container">
    <h1>Choose Checkout Method</h1>
    <br>
    <br>
    
    
    
    <a href="paypalcheckout.php" class="checkout-button">PayPal</a>
    
    <a href="#" class="checkout-button">Coinbase</a>
    
    <a href="#" class="checkout-button">Visa</a>
    
    <a href="#" class="checkout-button">Pesapal</a>
    
    <a href="#" class="checkout-button">Mobile Money</a>
    
    <a href="#" class="checkout-button">USDT</a>
    <br>
    <br>
    <a href="digpegpayments.php" class="checkout-button">Back</a>
  </div>
</body>
</html>
