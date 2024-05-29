<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="e provision styles/e_pro_checkout_header.css">
  <link rel="stylesheet" href="e provision styles/e_pro_checkout_body.css">
  <title>checkout</title>
</head>
<body>
  <div class="checkout-header">
    <div class="checkout-h-link">
      <a href="index.html">Home</a>
    </div>
    <div class="checkout-h-title">
      Checkout(
      <span class="js-chck-h-title-num">3</span>
      items
      )
    </div>
  </div>
  <div class="checkout-body">
    <div class="list-header">
      <div class="chk-l-h" id="chl-product-image">Image</div>
      <div class="chk-l-h" id="zw">Item Name</div>
      <div class="chk-l-h" id="desktop-778">Description</div>
      <div class="chk-l-h" id="mobile001-776">
        Content
      </div>
      <div class="chk-l-h" id="desktop-778">Quantity</div>
      <div class="chk-l-h" id="mobile001-776">
        Qnty
      </div>
      <div class="chk-l-h" id="zw"> Unit</div>
      <div class="chk-l-h" id="zw">Amount</div>
      <div class="chk-l-h" id="zw">Options</div>
    </div>
    <div class="list-body js-list-body">
    </div>
    <div class="order-summary">
    <div class="summary-header">Order summary</div>
    <hr>
    <div>
      <div class="items-chk-holder">
        <span>Total Number of items</span>
        <span class="js-summary-chk-num"></span>
      </div> 
      <div class="total-chck-price">
        <span>Grand Total</span>
        <span>
          <span class="js-summary-chk-amount"></span>frs
        </span>
      </div>
    </div>
    <hr>
    <div class="order-submit-holder">
      <a href="registration.php">
        <button class="Submit-cart">Place your order</button>
      </a>
      
    </div>
  </div>
  </div> 
  
  <script src="https://unpkg.com/dayjs@1.11.10/dayjs.min.js"></script>
  <script type="module" src="e provision scripte/e_pro_checkout.js"></script>  
</body>
</html>