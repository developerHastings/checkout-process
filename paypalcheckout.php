<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>DigPeg Software Verification PayPal Checkout</title>
  <a class="nav-link" href="digpegsoftwarecheckout.php">Back</a>

  <style>
    
    .interactive-input {
      color: gray;
    }

    .interactive-input:focus {
      color: black;
    }

   
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      min-height: 100vh;
      justify-content: center;
      align-items: center;
    }

    
    .container {
      max-width: 400px;
      margin: 0 auto;
      background-color: #f1f1f1;
      padding: 30px;
      border-radius: 5px;
      min-height: calc(100vh - 10cm); 
    }

    
    legend {
      font-family: 'Rubik', sans-serif;
      font-weight: 500;
    }

    .form-group {
      margin-bottom: 15px;
      text-align: center;
    }

    .form-group label {
      font-family: 'Rubik', sans-serif;
    }

    .form-group input[type="text"],
    .form-group textarea {
      width: 100%;
      display: block;
      height: 40px;
      box-sizing: border-box;
      padding: 5px;
    }

    .radio-group {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .radio-group input[type="radio"] {
      margin-right: 10px;
    }

    #paypal-button-container {
      text-align: center;
      margin-top: 20px;
    }

   
    .nav-link {
      position: fixed; 
      bottom: 20px; 
      text-decoration: none; 
      color: white; 
      background-color: black; 
      padding: 10px 20px; 
      border: none; 
      border-radius: 50px;
      cursor: pointer; 
      font-family: Arial, sans-serif;
      
      left: 50%;
      transform: translateX(-50%);
    }
  </style>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap">
</head>

<body>
  <div class="container">
    <h1 class="rubik-font">Software Verification PayPal Checkout</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="software_name">Software Name:</label>
        <input type="text" name="software_name" id="software_name" class="interactive-input" required>
      </div>

      <div class="form-group">
        <label for="software_description">Software Description:</label>
        <textarea name="software_description" id="software_description" class="interactive-input" required></textarea>
      </div>

      <div class="form-group">
        <fieldset>
            <legend>Package Type:</legend>
            <div class="radio-group">
              <input type="radio" id="package_listing" name="package_type" value="listing" checked>
              <label for="package_listing">Listing Package ($299)</label>
            </div>
            <div class="radio-group">
              <input type="radio" id="package_dedicated" name="package_type" value="dedicated">
              <label for="package_dedicated">Dedicated Package ($1000)</label>
            </div>
          </fieldset>
        </div>
  
        <div id="paypal-button-container"></div>
      </form>
    </div>
  
    <script src="https://www.paypal.com/sdk/js?client-id=Adjb7f1NH4okJNxHGRYj9MYizfiVYB28gpXWIP7lpDOiOBVtUmmcSzXrMFuVJDTky1xlJnEACBOeBZK8"></script>
  
    <script>
      // Render the PayPal button into #paypal-button-container
      paypal.Buttons({
        style: {
          color: 'blue',
          shape: 'pill',
          label: 'pay',
          height: 40
        
      },
        // Call your server to set up the transaction (modify based on server-side logic)
        createOrder: function(data, actions) {
          var selectedPackage = document.querySelector('input[name="package_type"]:checked').value;
          var packagePrice;
          if (selectedPackage === 'listing') {
            packagePrice = 299.00;
          } else if (selectedPackage === 'dedicated') {
            packagePrice = 1000.00;
          }
  
          // Replace with your server-side API call to create the order
          return fetch('/your-server-side-endpoint', {
            method: 'post',
            body: JSON.stringify({
              intent: "capture",
              application_context: {
                shipping_preference: "NO_SHIPPING"
              },
              purchase_units: [
                {
                  amount: {
                    currency_code: "USD",
                    value: packagePrice
                  },
                  description: "Software Verification Package - " + selectedPackage
                }
              ]
            })
          }).then(function(res) {
            return res.json();
          }).then(function(orderData) {
            return orderData.id;
          });
        },
  
        // Call your server to finalize the transaction (modify based on server-side logic)
        onApprove: function(data, actions) {
          // Replace with your server-side API call to capture the payment
          return fetch('/your-server-side-endpoint/' + data.orderID + '/capture', {
            method: 'post'
          }).then(function(res) {
            return res.json();
          }).then(function(orderData) {
                      // Three cases to handle:
                      //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                      //   (2) Other non-recoverable errors -> Show a failure message
                      //   (3) Successful transaction -> Show confirmation or thank you
  
                      // This example reads a v2/checkout/orders capture response, propagated from the server
                      // You could use a different API or structure for your 'orderData'
                      var errorDetail = Array.isArray(orderData.details) && orderData.details[0];
  
                      if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                          return actions.restart(); // Recoverable state, per:
                          // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                      }
  
                      if (errorDetail) {
                          var msg = 'Sorry, your transaction could not be processed.';
                          if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                          if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                          return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                      }
  
                      // Successful capture! For demo purposes:
                      console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                      var transaction = orderData.purchase_units[0].payments.captures[0];
                      alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
  
                      // Replace the above to show a success message within this page, e.g.
                      // const element = document.getElementById('paypal-button-container');
                      // element.innerHTML = '';
                      // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                      // Or go to another URL:  actions.redirect('thank_you.html');
                  });
              }
  
          }).render('#paypal-button-container');
      </script>
  </body>
  
  </html>
