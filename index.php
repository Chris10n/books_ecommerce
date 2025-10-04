<?php
// Start the session to manage cart data
session_start();

// --- Simulated Book Data ---
$books = [
    ['id' => 1, 'title' => 'Soulmate', 'price' => 599.00, 'image' => 'https://marketplace.canva.com/EAFPdZ52XSw/1/0/1024w/canva-simple-romance-story-wattpad-book-cover-G-7R6o-agkY.jpg'],
    ['id' => 2, 'title' => 'Behind the Stars', 'price' => 650.00, 'image' => 'https://images.template.net/wp-content/uploads/2018/04/Behind-the-Stars-Wattpad-Book-Cover.jpg?width=600'],
    ['id' => 3, 'title' => 'A Promise Menance', 'price' => 750.00, 'image' => 'https://i.pinimg.com/736x/01/13/46/011346da26447a8dfdcdf7cba16c84ab.jpg'],
    ['id' => 4, 'title' => 'I love you, Ara', 'price' => 550.00, 'image' => 'https://d.wattpad.com/story_parts/917848580/images/16202bf51f27a035978964706404.jpg'],
    ['id' => 5, 'title' => 'Until we meet again', 'price' => 625.00, 'image' => 'https://i.pinimg.com/originals/3d/57/bc/3d57bc006138ac926062dac3591d8728.jpg'],
    ['id' => 6, 'title' => 'He\'s into Her', 'price' => 499.00, 'image' => 'https://a.wattpad.com/cover/1965721-256-k962246.jpg'],
    ['id' => 7, 'title' => 'I love you since 1892', 'price' => 850.00, 'image' => 'https://i.pinimg.com/736x/58/af/5e/58af5ea4d36ad530a8d8ebcb3f56a615.jpg'],
    ['id' => 8, 'title' => 'More than just a bet', 'price' => 799.00, 'image' => 'https://i.pinimg.com/originals/25/85/73/25857366bcdee3aa1346f44138420273.jpg'],
    ['id' => 9, 'title' => 'Dosage of Seratonin', 'price' => 699.00, 'image' => 'https://i.pinimg.com/736x/d6/6c/17/d66c17b477e39470eb6be7d7402400ce.jpg'],
    ['id' => 10, 'title' => 'Ang Mutya ng Section E', 'price' => 550.00, 'image' => 'https://media.karousell.com/media/photos/products/2022/10/22/ang_mutya_ng_section_e_part_1__1666463323_baa83d64_progressive.jpg'],
    ['id' => 11, 'title' => 'Starborn', 'price' => 950.00, 'image' => 'https://static-cse.canva.com/blob/370263/1024w-c7GfmVBJ_so.jpg'],
    ['id' => 12, 'title' => 'Reflections', 'price' => 899.00, 'image' => 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/d90e6e01b6b14be55929d5fc31f4928a_screen.jpg?ts=1701699037'],
];

// --- SEARCH LOGIC ---
$filtered_books = $books; // Start with the full list of books
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search_term = trim($_GET['search']);
    $search_results = [];
    foreach ($books as $book) {
        if (stripos($book['title'], $search_term) !== false) {
            $search_results[] = $book;
        }
    }
    $filtered_books = $search_results;
}
// --- END SEARCH LOGIC ---

// Calculate total items in cart
$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cart_count += $item['quantity'];
    }
}

// Check for a recently added item, then clear it
$last_added_item = null;
if (isset($_SESSION['last_added_item'])) {
    $last_added_item = $_SESSION['last_added_item'];
    unset($_SESSION['last_added_item']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Wattpad Bookstore</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    .banner-image {
        width: 100%;
        height: auto;
        display: block; /* Removes bottom space under the image */
    }
  </style>
</head>
<body>

<header>
  <h1>Wattpad</h1>
  <div class="header-controls">
    <form action="index.php" method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search books..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
    <a href="cart.php" class="cart-icon">
      <i class="fas fa-shopping-cart"></i>
      <span class="cart-count"><?php echo $cart_count; ?></span>
    </a>
  </div>
</header>

<img src="https://i.pinimg.com/originals/ff/10/ee/ff10ee4eafa589570a92a478f0e51b87.png" alt="Wattpad Banner" class="banner-image">

<div class="section">
  <h2>Fall for Wattpad</h2>
  <div class="book-carousel">
    <div class="book-list">
      
      <?php if (empty($filtered_books)): ?>
        <p class="no-results">No books found matching your search.</p>
      <?php else: ?>
        <?php foreach ($filtered_books as $book): ?>
          <div class="book">
            <img src="<?php echo $book['image']; ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
            <div class="book-info">
                <div>
                    <p class="book-title"><?php echo htmlspecialchars($book['title']); ?></p>
                    <p class="book-price">₱<?php echo number_format($book['price'], 2); ?></p>
                </div>
                <form action="process_cart.php" method="post">
                  <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                  <input type="hidden" name="book_title" value="<?php echo htmlspecialchars($book['title']); ?>">
                  <input type="hidden" name="book_price" value="<?php echo $book['price']; ?>">
                  <input type="hidden" name="book_image" value="<?php echo $book['image']; ?>">
                  <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php if ($last_added_item): ?>
<div class="modal-overlay" id="cartModal">
    <div class="modal-content">
        <h3><i class="fas fa-check-circle"></i> Item Added to Cart</h3>
        <div class="modal-product">
            <img src="<?php echo htmlspecialchars($last_added_item['image']); ?>" alt="">
            <span><?php echo htmlspecialchars($last_added_item['title']); ?></span>
        </div>
        <a href="cart.php" class="btn-view-cart">View Cart</a>
    </div>
</div>
<?php endif; ?>

<script>
  const cartModal = document.getElementById('cartModal');
  if (cartModal) {
      cartModal.addEventListener('click', function(event) {
          if (event.target === cartModal) {
              cartModal.style.display = 'none';
          }
      });
  }
</script>

</body>
</html>