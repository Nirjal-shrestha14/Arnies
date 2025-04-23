<header>
<link rel="icon" type="image/x-icon" href="images/fav.png">
    <nav class="navbar-unique">
        <div class="logo-unique">
            <a href="index.php"><img src="images/logo.png" alt="Logo"></a>
        </div>
        <ul class="nav-links-unique">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <?php if (isset($_SESSION['Username'])) { ?>
                <li><a href="cart.php">Cart</a></li><?php } ?>
            <li class="profile-dropdown">
                <a href="#">Profile</a>
                <div class="dropdown-content">
                    <a href="registration.php">Register</a>
                    <?php if (!isset($_SESSION['Username'])) { ?><a href="login.php">Login</a><?php } ?>
                    <?php if (isset($_SESSION['Username'])) { ?><a href="logout.php">Logout</a><?php } ?>
                </div>
            </li>
        </ul>
    </nav>
</header>