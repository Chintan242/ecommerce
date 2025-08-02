<?php
session_start();

// Save cart to a cookie before destroying the session
if (isset($_SESSION['cart'])) {
    // Serialize the cart data (convert it into a string) and save it as a cookie
    setcookie('cart', serialize($_SESSION['cart']), time() + (3600 * 24 * 30), "/");  // 30 days expiration
}

// Unset all session variables
session_unset();  
session_destroy();  // Destroy the session

// Redirect the user back to the home page or login page
header("Location: index.php");
exit();
?>
