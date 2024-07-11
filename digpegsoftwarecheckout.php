<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Methods</title>
  <style>
   
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0; 
      font-family: sans-serif; 
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 20px auto;
      max-width: 400px;
      padding: 20px;
      border-radius: 5px;
      background-color: #f5f5f5;
    }
    
    .checkout-button {
      text-decoration: none; 
      display: inline-block;
      padding: 12px 20px; 
      border: none;
      border-radius: 50px; 
      font-size: 16px;
      color: white;
      cursor: pointer;
      margin-bottom: 10px;
      background-color: black; 
      font-family: 'Rubik', sans-serif; 
      text-align: center; 
    }
    
    .checkout-button:hover {
      background-color: #333; 
    }
    
    /* Added style for h1 */
    h1 {
      font-family: 'Rubik', sans-serif; 
      font-weight: bold; 
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
