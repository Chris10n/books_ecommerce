<?php
session_start();
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total_price = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Shopping Cart</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <h1>Wattpad</h1>
</header>

<div class="container">
  <h2>Your Shopping Cart <i class="fas fa-shopping-cart"></i></h2>

  <?php if (empty($cart_items)): ?>
    <div class="cart-empty-message">
        <p>Your shopping cart is empty.</p>
        <a href="index.php">Return to Store</a>
    </div>
  <?php else: ?>
    <table class="cart-table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart_items as $id => $item): ?>
          <?php
            $item_total = $item['price'] * $item['quantity'];
            $total_price += $item_total;
          ?>
          <tr>
            <td>
              <img src="<?php echo $item['image']; ?>" alt="">
              <?php echo htmlspecialchars($item['title']); ?>
            </td>
            <td>₱<?php echo number_format($item['price'], 2); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>₱<?php echo number_format($item_total, 2); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="cart-total">
      Grand Total: ₱<?php echo number_format($total_price, 2); ?>
    </div>
    <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
  <?php endif; ?>
</div>

</body>
</html>