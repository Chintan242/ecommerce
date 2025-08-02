<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<p>You need to <a href='login.html'>login</a> to add items to your cart.</p>";
} else {
    echo "<button onclick='addToCart()'>Add to Cart</button>";
}

// If there is no cart in the session, check for the cart cookie
if (!isset($_SESSION['cart']) && isset($_COOKIE['cart'])) {
    // If the cookie exists, unserialize it to get the cart data
    $_SESSION['cart'] = unserialize($_COOKIE['cart']);
}

?>

<script>
function addToCart() {
    // JS function to handle cart actions
}
</script>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K-MART</title>
    <link rel="icon" type="image/icon" href="assets/shopping-basket.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    

</head>
<body>
<header class="header">
    <a href="#" class="logo"><i class="fa fa-shopping-basket"></i> K-MART</a>

    <nav class="navbar">
        <a href="#home">HOME</a>
        <a href="#features">FEATURES</a>
        <a href="#products">PRODUCTS</a>
        <a href="#categories">CATEGORIES</a>
        <a href="#review">REVIEWS</a>
        <a href="#blog">BLOGS</a>
    </nav>

    <div class="icons">
        <div class="fa fa-bars" id="menu-btn"></div>
        <div class="fa fa-search" id="search"></div>
        <div class="fa fa-shopping-cart" id="cart"></div>
        
        <?php 

        if (isset($_SESSION['uname'])) { // Check if the user is logged in
            // Display the username in the navbar and a logout button
            echo '<h2><a href="profile.php" class="user-name">Hello, ' . $_SESSION['uname'] . '</a></h2>';
            echo '<h3><a href="logout.php" class="logout-btn">Logout</a></h3>';
        } else {
            // If user is not logged in, show the login icon
            echo '<div class="fa fa-user" id="user-btn"></div>';
        }
        ?>
    </div>

    <form class="search-form">
        <input type="search" id="search-box" placeholder="Search Here">
        <label for="search-box" class="fa fa-search"></label>
    </form>

    <!-- Cart Dropdown -->
    <div class="cart-dropdown">
        <form action="cart.php" method="post">
            <button type="submit" class="btn btn-primary">
                Checkout Your Cart
            </button>
        </form>
    </div>

    <!-- Login Form (this form will only display if the user is not logged in) -->
    <?php
    if (!isset($_SESSION['uname'])) {  // Only show login form if the user is not logged in
    ?>
    <div class="login-form">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control" name="uname" id="" placeholder="" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" id="" placeholder="" />
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <?php } ?>
</header>

<center>
<section class="home" id="home">
    <div class="content">
        <b><h2>Fresh And <span>Organic</span> Products For You</h2></b>
        <p>Have your groceries delivered in just a few taps</p>
        <a href="#" class="btn">Shop Now</a>
    </div>
</section>
</center>
<center>    
<section class="features" id="features">
    <h1 class="heading">OUR <sapn>FEATURES</sapn></h1>
    <div class="box-container">
        <div class="box">
            <img src="assets/prod1.jpg">
            <h2>Fresh and Organic</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi saepe odit dolorum, cupiditate, molestiae harum quisquam officia ab excepturi quod aperiam quae laborum non ipsam magnam. Cum perspiciatis debitis expedita.</p>
            
            
            <a href="#" class="btn">Read More</a>
        </div>
        <div class="box">
            <img src="assets/prod2.jpg">
            <h2>Fresh and Organic</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi saepe odit dolorum, cupiditate, molestiae harum quisquam officia ab excepturi quod aperiam quae laborum non ipsam magnam. Cum perspiciatis debitis expedita.</p>
            
            
            <a href="#" class="btn">Read More</a>
        </div>
        <div class="box">
            <img src="assets/prod3.jpg">
            <h2>Fresh and Organic</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi saepe odit dolorum, cupiditate, molestiae harum quisquam officia ab excepturi quod aperiam quae laborum non ipsam magnam. Cum perspiciatis debitis expedita.</p>
            
            
            <a href="#" class="btn">Read More</a>
        </div>
    </div>
</section>
</center>


<center>
    <section class="products" id="products">
        <h1 class="heading">OUR PRODUCTS</h1>
        <div class="product-slider">
            <div class="wrapper">
                <div class="box">
                    <img src="assets/brinjal.jpg">
                    <h1>Fresh Brinjal</h1>
                    <div class="price">₹35</div>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                    <!-- <a href="" class="btn" >Add to Cart</a> -->

                    <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="1">
        <input type="hidden" name="product_name" value="Fresh Brinjal">
        <input type="hidden" name="product_img" value="assets/brinjal.jpg">
        <input type="hidden" name="product_price" value="35">
        <input type="hidden" name="product_quantity" value="1">
        <button type="submit" class="btn">Add to Cart</button>
    </form>
                </div>

                <div class="box">
                    <img src="assets/lady finger.jpg">
                    <h1>Fresh Lady-Finger</h1>
                    <div class="price">₹50</div>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <!-- <a href="" class="btn">Add to Cart</a> -->
                    <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="2">
        <input type="hidden" name="product_name" value="Fresh Lady-Finger">
        <input type="hidden" name="product_img" value="assets/lady finger.jpg">
        <input type="hidden" name="product_price" value="50">
        <input type="hidden" name="product_quantity" value="1">
        <button type="submit" class="btn">Add to Cart</button>
    </form>

                </div>

                <div class="box">
                    <img src="assets/pea.jpg">
                    <h1>Fresh Peas</h1>
                    <div class="price">₹55</div>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                      
                    </div>
                    <!-- <a href="" class="btn">Add to Cart</a> -->

                    <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="3">
        <input type="hidden" name="product_name" value="Fresh Peas">
        <input type="hidden" name="product_img" value="assets/pea.jpg">
        <input type="hidden" name="product_price" value="55">
        <input type="hidden" name="product_quantity" value="1">
        <button type="submit" class="btn">Add to Cart</button>
    </form>
                </div>

                <div class="box">
                    <img src="assets/cabbage.jpg">
                    <h1>Fresh Cabbage</h1>
                    <div class="price">₹25</div>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        
                    </div>
                    <!-- <a href="" class="btn">Add to Cart</a> -->

                    <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="4">
        <input type="hidden" name="product_name" value="Fresh Cabbage">
        <input type="hidden" name="product_img" value="assets/cabbage.jpg">
        <input type="hidden" name="product_price" value="25">
        <input type="hidden" name="product_quantity" value="1">
        <button type="submit" class="btn">Add to Cart</button>
    </form>
                </div>
            </div>
        </div>


        <div class="product-slider">
            <div class="wrapper">
                <div class="box">
                    <img src="assets/chana.jpg">
                    <h1>Chana Dal</h1>
                    <div class="price">₹72</div>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                    <!-- <a href="" class="btn">Add to Cart</a> -->

                    <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="5">
        <input type="hidden" name="product_name" value="Chana Dal">
        <input type="hidden" name="product_img" value="assets/chana.jpg">
        <input type="hidden" name="product_price" value="72">
        <input type="hidden" name="product_quantity" value="1">
        <button type="submit" class="btn">Add to Cart</button>
    </form>
                </div>

                <div class="box">
                    <img src="assets/GIMINI.JPG">
                    <h1>Gemini Oil</h1>
                    <div class="price">₹110</div>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <!-- <a href="" class="btn">Add to Cart</a> -->

                    <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="6">
        <input type="hidden" name="product_name" value="Gemini Oil">
        <input type="hidden" name="product_img" value="assets/GIMINI.JPG">
        <input type="hidden" name="product_price" value="110">
        <input type="hidden" name="product_quantity" value="1">
        <button type="submit" class="btn">Add to Cart</button>
    </form>
                </div>

                <div class="box">
                    <img src="assets/tur.png">
                    <h1>Tur Dal</h1>
                    <div class="price">₹239</div>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                      
                    </div>
                    <!-- <a href="" class="btn">Add to Cart</a> -->

                    <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="7">
        <input type="hidden" name="product_name" value="Tur Dal">
        <input type="hidden" name="product_img" value="assets/tur.png">
        <input type="hidden" name="product_price" value="239">
        <input type="hidden" name="product_quantity" value="1">
        <button type="submit" class="btn">Add to Cart</button>
    </form>
                </div>

                <div class="box">
                    <img src="assets/fortune.jpg">
                    <h1>Fortune Oil</h1>
                    <div class="price">₹115</div>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        
                    </div>
                    <!-- <a href="" class="btn">Add to Cart</a> -->

                    <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="8">
        <input type="hidden" name="product_name" value="Fortune Oil">
        <input type="hidden" name="product_img" value="assets/fortune.jpg">
        <input type="hidden" name="product_price" value="115">
        <input type="hidden" name="product_quantity" value="1">
        <button type="submit" class="btn">Add to Cart</button>
    </form>
                </div>
            </div>
        </div>
    </section>
</center>

<center>
<section class="categories" id="categories">
    <h1 class="heading">PRODUCT CATEGORIES</h1>

    <div class="box-container">
        <div class="box">
            <img src="assets/vegcat.jpg">
            <h3> Fresh Vegetables</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">Shop now</a>
        </div>
 

   
        <div class="box">
            <img src="assets/dals cat.jpg">
            <h3> Dals and Oils</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">Shop now</a>
        </div>
    

        <div class="box">
            <img src="assets/milkcat.jpg">
            <h3>Dairy Products</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">Shop now</a>
        </div>
  

    
        <div class="box">
            <img src="assets/grains cat.png">
            <h3> Flours and Grains</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">Shop now</a>
        </div>
    </div>
    

    
</section>
</center>

<center>
    <section class="review" id="review">
        <h1 class="heading">Customer's Review</h1>

        <div class="review-slider">
            <div class="wrapper">
                <div class="box">
                    <img src="assets/pic1.jpg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, doloremque corporis suscipit totam repudiandae enim consequatur aut doloribus eaque commodi, nulla non sint id aliquid ullam nihil, libero incidunt dolore?</p>
                    <h3>Karan Jangam</h3>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>

                <div class="box">
                    <img src="assets/pic2.jpg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, doloremque corporis suscipit totam repudiandae enim consequatur aut doloribus eaque commodi, nulla non sint id aliquid ullam nihil, libero incidunt dolore?</p>
                    <h3>Rince Mathew</h3>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>

                <div class="box">
                    <img src="assets/pic3.jpg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, doloremque corporis suscipit totam repudiandae enim consequatur aut doloribus eaque commodi, nulla non sint id aliquid ullam nihil, libero incidunt dolore?</p>
                    <h3>Danish Shah</h3>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>

                <div class="box">
                    <img src="assets/pic4.jpg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, doloremque corporis suscipit totam repudiandae enim consequatur aut doloribus eaque commodi, nulla non sint id aliquid ullam nihil, libero incidunt dolore?</p>
                    <h3>Praisein Nadar</h3>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>

                <div class="box">
                    <img src="assets/pic 5.jpg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, doloremque corporis suscipit totam repudiandae enim consequatur aut doloribus eaque commodi, nulla non sint id aliquid ullam nihil, libero incidunt dolore?</p>
                    <h3>Vedant Jangam</h3>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

</center>

<center>
    <section class="blog" id="blog">
        <h1 class="heading"> Our Blogs</h1>
    
        <div class="box-container">
            <div class="box">
                <img src="assets/blo1.jpeg">
                <div class="content">
                    <a href="#"><i class="fa fa-user"></i>By User</a>
                    <a href="#"><i class="fa fa-calendar"></i>1st May, 2021</a>
                </div>
                <h3>Fresh and organic vegetables and Fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed possimus, repellat sunt non pariatur, eveniet voluptates dolor suscipit eius ratione nesciunt enim ut, fugiat consectetur nisi hic sequi similique iusto.</p>
                <a href="#" class="btn">Read more</a>
            </div>

            <div class="box">
                <img src="assets/blo2.jpeg">
                <div class="content">
                    <a href="#"><i class="fa fa-user"></i>By User</a>
                    <a href="#"><i class="fa fa-calendar"></i>1st May, 2021</a>
                </div>
                <h3>Fresh and organic vegetables and Fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed possimus, repellat sunt non pariatur, eveniet voluptates dolor suscipit eius ratione nesciunt enim ut, fugiat consectetur nisi hic sequi similique iusto.</p>
                <a href="#" class="btn">Read more</a>
            </div>

            <div class="box">
                <img src="assets/blo2.jpeg">
                <div class="content">
                    <a href="#"><i class="fa fa-user"></i>By User</a>
                    <a href="#"><i class="fa fa-calendar"></i>1st May, 2021</a>
                </div>
                <h3>Fresh and organic vegetables and Fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed possimus, repellat sunt non pariatur, eveniet voluptates dolor suscipit eius ratione nesciunt enim ut, fugiat consectetur nisi hic sequi similique iusto.</p>
                <a href="#" class="btn">Read more</a>
            </div>
        </div>
    </section>
</center>


<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Groco<i class="fa fa-shopping-basket"></i></h3>
            <p>feel Free to Follow Us On Our Social Media Handlers All The Links are Given Below.</p>

            <div class="share">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="#" class="links"><i class="fa fa-phone"></i> +91 9875468514</a>
            <a href="#" class="links"><i class="fa fa-phone"></i> +91 9856268514</a>
            <a href="#" class="links"><i class="fa fa-envelope"></i> info@kmart.com</a>
            <a href="#" class="links"><i class="fa fa-map-marker"></i> Mumbai, India</a>  
        </div>

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#" class="links"><i class="fa fa-arrow-right"></i> Home </a>
            <a href="#" class="links"><i class="fa fa-arrow-right"></i> Features </a>
            <a href="#" class="links"><i class="fa fa-arrow-right"></i> Products </a>
            <a href="#" class="links"><i class="fa fa-arrow-right"></i> Categories </a>
            <a href="#" class="links"><i class="fa fa-arrow-right"></i> Review </a>
            <a href="#" class="links"><i class="fa fa-arrow-right"></i> Blogs </a>
        </div>
        
        <div class="box">
            <h3>Newsletter</h3>
            <p>Subscribe for Latest Updates</p>
            <input type="email" placeholder="Your Email" class="email">
            <input type="submit" value="Subsribe" class="btn">
            <img src="assets/pay.jpg" class="payment">
            
        </div>
    </div>

    <div class="credit"> Created By <span>K Developers</span> | All Rights Reserved</div>
</section>

<script src="script.js"></script>
</body>
</html>