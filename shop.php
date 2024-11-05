<?php
session_start();
if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true) {
    // $message = "Please log in to access the shopping page.";
    $error = "Please log in to access the Shopping page.";
    header("location: login.html?error=".urlencode($error));
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="position-relative">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="Backend/Images/logo.png" alt="" width="100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-shopping-cart"></i> Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_cart.php"><i class="fa-solid fa-cart-arrow-down"></i>
                    View Cart 
                    <span class="badge badge-light">
                        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                    </span> 
                </a>
                </li>
                
                <!-- User Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-user"></i> <?php echo $_SESSION['user_name']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="orders.php"><i class="fas fa-box"></i> Orders</a>
                        <a class="dropdown-item" href="profile.php"><i class="fas fa-user-circle"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Backend/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>


        <!-- Product Section -->
        <div class="Tshirt-section">
            <div class="text-center mt-4">
                <h1 class="text-center mt-4">T-Shirts</h1>
                <p>New Modern Design Collection</p>
            </div>
            <section id="product-list-tshirt" class="d-flex flex-row flex-wrap row">
            </section>
        </div>

        <div class="Shorts-section">
            <div class="text-center mt-4">
                <h1 class="text-center mt-4">Shorts</h1>
                <p>New Modern Design Collection</p>
            </div>
            <section id="product-list-shorts" class="d-flex flex-row flex-wrap row">
            </section>
        </div>

        <div class="Trousers-section">
            <div class="text-center mt-4">
                <h1 class="text-center mt-4">Trousers</h1>
                <p>New Modern Design Collection</p>
            </div>
            <section id="product-list-Trousers" class="d-flex flex-row flex-wrap row">
            </section>
        </div>

        <div class="Jacket - Section">
            <div class="text-center mt-4">
                <h1 class="text-center mt-4">Jackets</h1>
                <p>New Modern Design Collection</p>
            </div>
            <section id="product-list-Jacket" class="d-flex flex-row flex-wrap row">
            </section>
        </div>

        <div class="Blouse - Section">
            <div class="text-center mt-4">
                <h1 class="text-center mt-4">Blouse</h1>
                <p>New Modern Design Collection</p>
            </div>
            <section id="product-list-Blouse" class="d-flex flex-row flex-wrap row">
            </section>
        </div>

        <!-- Reapire service banner -->
        <div id="off-banner">
            <h4>Repair Service</h4>
            <h2>Up to 70% Off - All T-Shirts & Accessories</h2>
            <button class="normal">Explore More</button>
        </div>
        <!-- Offer Banners -->
        <div id="banners" class="section-p1">
            <div class="big-banners">
                <div class="big-banner" style="background-image: url('Backend/Images/banner/b17.jpg');">
                    <h4>Crazy deals</h4>
                    <h2>Buy 1 Get 1 Free</h2>
                    <span>The best classic dress is on sale at Abhiroux Wears</span>
                    <button class="banner-btn">Collection</button>
                </div>
                <div class="big-banner" style="background-image: url('Backend/Images/banner/b10.jpg');">
                    <h4>Spring/Summer</h4>
                    <h2>Buy 1 Get 1 Free</h2>
                    <span>The best classic dress is on sale at Abhiroux Wears</span>
                    <button class="banner-btn">Collection</button>
                </div>
            </div>

            <div class="small-banners">
                <div class="small-banner" style="background-image: url('Backend/Images/banner/b7.jpg');">
                    <h2>Seasonal Sale</h2>
                    <h5>Winter Collection 50% Off</h5>
                </div>
                <div class="small-banner" style="background-image: url('Backend/Images/banner/b4.jpg');">
                    <h2>New Footwear Collection</h2>
                    <h5>50% Off</h5>
                </div>
                <div class="small-banner" style="background-image: url('Backend/Images/banner/b18.jpg');">
                    <h2>T-Shirts</h2>
                    <h5>Trendy Collection 40% Off</h5>
                </div>
            </div>
        </div>

        <!-- New Letters -->
        <div class="letter-banner">
            <div class="text-box">
                <h4>Sign Up For Newsletters</h4>
                <p>
                    get e-mail updates about latest shop and
                    <a href="#">special offers</a>
                </p>
            </div>
            <div class="form-field">
                <input type="text" placeholder="Your email address" />
                <button class="form-btn">Sign Up</button>
            </div>

        </div>
        <!-- Footer -->
        <div id="footer" class="container-fluid">
            <div class="row">
                <div class="col-md-3 footer-list-1">
                    <img src="Backend/Images/logo.png" alt="Abhiroux Wear">
                    <ul class="list-unstyled">
                        <li class="list-head bold-item">Contact</li>
                        <li class="list-item">
                            <i class="bold-item">Address: </i>
                            <span>Wellington Road, Street 32, San Francisco</span>
                        </li>
                        <li class="list-item">
                            <i class="bold-item">Phone: </i>
                            <span>+61 4758399388</span>
                        </li>
                        <li class="list-item">
                            <i class="bold-item">Hours: </i>
                            <span>10:00 - 18:00. Mon - Sat</span>
                        </li>
                        <li class="list-item">
                            <i class="bold-item list-head">Follow Us</i>
                            <div class="social-icons">
                                <i class="fab fa-facebook-square"></i>
                                <i class="fab fa-youtube"></i>
                                <i class="fab fa-telegram"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-twitter"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 footer-list-2">
                    <ul class="list-unstyled">
                        <li class="list-head bold-item">About</li>
                        <li class="list-item"><a href="#">About Us</a></li>
                        <li class="list-item"><a href="#">Delivery Information</a></li>
                        <li class="list-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-item"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-list-3">
                    <ul class="list-unstyled">
                        <li class="list-head bold-item">My Account</li>
                        <li class="list-item"><a href="#">Sign In</a></li>
                        <li class="list-item"><a href="#">View Cart</a></li>
                        <li class="list-item"><a href="#">My Wishlist</a></li>
                        <li class="list-item"><a href="#">Track My Order</a></li>
                        <li class="list-item"><a href="#">Help</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-list-4">
                    <ul class="list-unstyled">
                        <li class="list-head bold-item">Install App</li>
                        <li class="list-item">From App Store or Google Play</li>
                        <li>
                            <div class="app-store">
                                <a href="#"><img src="Backend/Images/pay/app.jpg" alt="App Store"></a>
                                <a href="#"><img src="Backend/Images/pay/play.jpg" alt="Google Play"></a>
                            </div>
                        </li>
                        <li class="list-item">Secured Payment Gateways</li>
                        <li>
                            <img src="Backend/Images/pay/pay.png" alt="Payment Icons">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="js/shop.js"></script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>