<?php
session_start();

// This simulates a successful order processing.
// In a real application, you would save the order to a database here.

// Clear the shopping cart.
unset($_SESSION['cart']);

// Set a "flash" session variable to tell the next page that the order was successful.
$_SESSION['order_placed'] = true;

// Redirect the user back to the checkout page to see the success modal.
header('Location: checkout.php');
exit();

?>