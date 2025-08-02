<?php
session_start();
 
// Check if the user is logged in, if not, redirect to login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");  // Redirect to login page
    exit();
}

// Initialize the cart specific to the user if it doesn't exist
$user_id = $_SESSION['user_id'];
if (!isset($_SESSION['cart'][$user_id])) {
    $_SESSION['cart'][$user_id] = [];
}

// Function to add product to cart for a specific user
function addToCart($product_id, $product_name, $product_img, $product_price, $product_quantity) {
    global $user_id;  // Use the user's ID
    $product_price = floatval($product_price);

    if (isset($_SESSION['cart'][$user_id][$product_id])) {
        $_SESSION['cart'][$user_id][$product_id]['quantity'] += $product_quantity;
    } else {
        $_SESSION['cart'][$user_id][$product_id] = [
            'name' => $product_name,
            'img' => $product_img,
            'price' => $product_price,
            'quantity' => $product_quantity
        ];
    }
}

// Handle form submissions for cart management
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        // Handle quantity increase
        if (isset($_POST['increase_quantity'])) {
            $_SESSION['cart'][$user_id][$product_id]['quantity'] += 1;
        }

        // Handle quantity decrease
        if (isset($_POST['decrease_quantity'])) {
            if ($_SESSION['cart'][$user_id][$product_id]['quantity'] > 1) {
                $_SESSION['cart'][$user_id][$product_id]['quantity'] -= 1;
            } else {
                // Remove the product if quantity is zero or less
                unset($_SESSION['cart'][$user_id][$product_id]);
            }
        }

        // Handle product removal from cart
        if (isset($_POST['remove_product'])) {
            unset($_SESSION['cart'][$user_id][$product_id]);
        }
    }

    // Handle adding a new product to the cart
    if (isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_quantity'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_img = $_POST['product_img'];
        $product_price = $_POST['product_price'];
        $product_quantity = $_POST['product_quantity'];

        addToCart($product_id, $product_name, $product_img, $product_price, $product_quantity);

        // Redirect to the cart page to avoid form resubmission issues
        header("Location: cart.php");
        exit;
    }
}
?>

<html>
<head>
    <style>
        /* Styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f8f8;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        td img {
            width: 100px;
            height: auto;
        }
        button {
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
        }
        .button-delete {
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .button-update {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .button-go-home {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            width: 200px;
            margin: 20px auto;
            text-align: center;
            text-decoration: none;
        }
        .button-buy-now {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h2>Shopping Cart</h2>

<?php
// Display the cart contents in a table format for the logged-in user
$total_price = 0;  // Initialize total price variable
if (!empty($_SESSION['cart'][$user_id])) {
    echo '<table>';
    echo '<tr><th>Image</th><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th>Actions</th></tr>';
    
    foreach ($_SESSION['cart'][$user_id] as $id => $item) {
        // Ensure the price is treated as a float value
        $price = floatval($item['price']);
        $subtotal = $price * $item['quantity'];
        $total_price += $subtotal;  // Add subtotal to total price

        echo '<tr>';
        echo '<td><img src="' . $item['img'] . '" alt="Product Image"></td>';
        echo '<td>' . $item['name'] . '</td>';
        echo '<td>₹' . number_format($price, 2) . '</td>';
        echo '<td>' . $item['quantity'] . '</td>';
        echo '<td>₹' . number_format($subtotal, 2) . '</td>';
        echo '<td>
                <form action="cart.php" method="post" style="display:inline;">
                    <input type="hidden" name="product_id" value="' . $id . '">
                    <button type="submit" name="decrease_quantity">-</button>
                    <button type="submit" name="increase_quantity">+</button>
                    <button type="submit" name="remove_product" class="button-delete">Delete</button>
                </form>
              </td>';
        echo '</tr>';
    }

    // Display Grand Total row
    echo '<tr>';
    echo '<td colspan="4" style="text-align:right; font-weight:bold;">Grand Total</td>';
    echo '<td style="font-weight:bold;">₹' . number_format($total_price, 2) . '</td>';
    echo '<td>
            <form action="checkout.php" method="post">
                <button type="submit" class="button-buy-now">Buy Now</button>
            </form>
          </td>';
    echo '</tr>';
    
    echo '</table>';
} else {
    echo "Your cart is empty.<br><br>";
}
?>

<a href="index.php" class="button-go-home">Go Back to Home</a>

</body>
</html>
