<?php
session_start();

// Check if an order was just placed, so we can show the success modal
$show_success_modal = false;
if (isset($_SESSION['order_placed']) && $_SESSION['order_placed']) {
    $show_success_modal = true;
    unset($_SESSION['order_placed']);
}

// Check if the cart is empty
$is_cart_empty = empty($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header>
  <h1>Wattpad</h1>
</header>

<div class="container">
  <h2>Checkout</h2>

  <?php if ($is_cart_empty && !$show_success_modal): ?>
    
    <div class="cart-empty-message">
        <p>Your shopping cart is empty.</p>
        <a href="index.php">Return to Store</a>
    </div>

  <?php else: ?>

    <form action="process_order.php" method="post" class="checkout-form">
      <h3>Shipping Information</h3>
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" required>
      </div>
      <button type="submit" class="checkout-btn" style="float: none; width: 100%; margin-top: 10px;">Place Order</button>
    </form>
    
  <?php endif; ?>

</div>

<?php if ($show_success_modal): ?>
<div class="modal-overlay" id="successModal">
    <div class="modal-content">
        <h3><i class="fas fa-check-circle" style="color: #2a9d8f;"></i> Order Placed!</h3>
        <p style="margin: 20px 0;">Thank you for your purchase. We'll process your order shortly.</p>
        <a href="index.php" class="btn-view-cart">Return to Store</a>
    </div>
</div>
<?php endif; ?>

<script>
  // Script for the success modal
  const successModal = document.getElementById('successModal');
  if (successModal) {
      // The modal is shown by default if its HTML exists
  }
</script>

</body>
</html>