<?php
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_id'])) {

    // Get book data from the form
    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];
    $book_image = $_POST['book_image'];
    $quantity = 1; // Add one item at a time

    // Initialize cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the book is already in the cart
    if (isset($_SESSION['cart'][$book_id])) {
        // If yes, increment the quantity
        $_SESSION['cart'][$book_id]['quantity']++;
    } else {
        // If no, add it as a new item
        $_SESSION['cart'][$book_id] = [
            'title' => $book_title,
            'price' => $book_price,
            'image' => $book_image,
            'quantity' => $quantity
        ];
    }

    // --- NEW ---
    // Store the last added item's info to show in the pop-up
    $_SESSION['last_added_item'] = [
        'title' => $book_title,
        'image' => $book_image
    ];
    // --- END NEW ---
}

// Redirect back to the index page
header('Location: index.php');
exit();
?>