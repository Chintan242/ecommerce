<?php
session_start();

// Check if the user is logged in, if not, redirect to login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Get the user ID and cart items for the current user
$user_id = $_SESSION['user_id'];
$cart_items = isset($_SESSION['cart'][$user_id]) ? $_SESSION['cart'][$user_id] : [];

if (empty($cart_items)) {
    echo "<p>Your cart is empty. Please add items to the cart before checking out.</p>";
    echo '<a href="cart.php">Go back to Cart</a>';
    exit();
}

// Calculate total price of items in the cart
$total_price = 0;
foreach ($cart_items as $item) {
    $total_price += $item['price'] * $item['quantity'];
}

// Process the order (this is a placeholder; add database storage here if needed)
$order_success = true;  // Simulate a successful order for now

// Clear the cart after successful checkout
if ($order_success) {
    unset($_SESSION['cart'][$user_id]);
    echo "<h2>Thank you for your purchase!</h2>";
    echo "<p>Your order has been placed successfully.</p>";
    echo "<p>Total Amount Paid: ₹" . number_format($total_price, 2) . "</p>";
    echo '<a href="index.php">Continue Shopping</a>';
} else {
    echo "<h2>There was a problem with your order.</h2>";
    echo "<p>Please try again or contact support.</p>";
    echo '<a href="cart.php">Go back to Cart</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            text-align: center;
            padding: 20px;
        }
        h2 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
        a:hover {
            background-color: #005f75;
        }
    </style>
</head>
<body>

</body>
</html>
