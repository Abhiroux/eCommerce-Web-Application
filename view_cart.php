<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $msg = "Your cart is empty";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="Backend/Images/logo.png" alt="" width="100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php"><i class="fas fa-shopping-cart"></i> Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="view_cart.php"><i class="fa-solid fa-cart-arrow-down"></i> View Cart
                        <span class="badge badge-light"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<div class="container my-5">
    <h1 class="text-center mb-4">Your Shopping Cart</h1>

    <?php if (isset($msg)): ?>
        <div class="alert alert-warning text-center"><?php echo $msg; ?></div>
    <?php else: ?>
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col" colspan="2">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $key => $item):
                    $item_total = $item['price'] * $item['quantity'];
                    $total += $item_total;
                ?>
                <tr>
                
                    <td class="d-flex justify-content-center">
                        <img src="<?php echo htmlentities($item['Image']);?>" alt="" width="100px"></td>
                    
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>Rs. <?php echo number_format($item['price'], 2); ?></td>
                    <td>
                        <form action="update_cart.php" method="POST" class="d-flex align-items-center">
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" class="form-control form-control-sm mr-2" style="width: 70px;">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </td>
                    <td>Rs. <?php echo number_format($item_total, 2); ?></td>
                    <td>
                        <form action="remove_from_cart.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-right">
            <h4><strong>Total: Rs. <?php echo number_format($total, 2); ?></strong></h4>
        </div>
        <div class="text-center mt-4">
            <a href="checkout.php" class="btn btn-success btn-lg">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
