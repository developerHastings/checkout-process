<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DigPegEx Payments</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      display: flex; 
      justify-content: center; 
      min-height: 100vh; 
    }

    h1 {
      text-align: center;
    }

    .nav-links {
      display: flex;
     
      flex-wrap: wrap;
      justify-content: space-between; 
      margin-bottom: 20px;
    }

    .nav-link {
      text-decoration: none;
      padding: 10px 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      color: #000;
     
      width: calc(50% - 10px);
      
     
     
    }

    .nav-link:hover {
      background-color: #f2f2f2;
    }

    .container {
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 5px;
      margin-bottom: 20px;
      max-width: 600px; 
    }

    .payment-form {
      margin-bottom: 20px;
    }

    .payment-form label {
      display: block;
      margin-bottom: 5px;
    }

    .payment-form input[type="text"],
    .payment-form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .payment-details {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .payment-details label {
      display: block;
      margin-bottom: 5px;
    }

    .payment-method {
      flex: 1;
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>DigPeg Payments</h1>

    <nav class="nav-links">
      <a class="nav-link" href="digpegdpc.php">DPC Calculator</a>
      <br>
      <a class="nav-link" href="digpegsoftwarecheckout.php">Software Verification Checkout</a>
      <br>
      <a class="nav-link" href="index.php">Home</a>
    </nav>

   
   

    
  </div>

</body>
</html>
