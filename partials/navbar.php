<?php
// filepath: partials/navbar.php
// Main navigation bar with active page detection

// Get current page filename without extension
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$current_page_html = basename($_SERVER['PHP_SELF'], '.html');
?>

<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container-fluid mt-2 mb-1">
        <!-- Logo aligned to the left -->
        <a class="navbar-brand ms-3" href="/index.php">
            <img src="/site-images/logo.png" alt="English with Gaven Logo" class="img-fluid" style="max-width: 100px" />
        </a>

        <!-- Navbar Toggler for Mobile Views -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav links aligned to the right -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-3">
                    <a class="nav-link text-dark <?php echo ($current_page == 'index') ? 'text-decoration-underline' : 'text-decoration-none'; ?>" href="/index.php">Home</a>
                </li>

                <?php include __DIR__ . '/grammar-nav.php'; ?>

                <li class="nav-item me-3">
                    <a class="nav-link text-dark <?php echo ($current_page == 'about') ? 'text-decoration-underline' : 'text-decoration-none'; ?>" href="/about.php">About</a>
                </li>

                <li class="nav-item me-3">
                    <a class="nav-link text-dark <?php echo ($current_page == 'contact') ? 'text-decoration-underline' : 'text-decoration-none'; ?>" href="/contact.php">Contact</a>
                </li>

                <li class="nav-item me-3">
                    <a class="nav-link text-dark <?php echo ($current_page == 'login') ? 'text-decoration-underline' : 'text-decoration-none'; ?>" href="/php/login.php">Login</a>
                </li>

                <li class="nav-item me-3">
                    <a class="nav-link text-dark <?php echo ($current_page == 'signup') ? 'text-decoration-underline' : 'text-decoration-none'; ?>" href="/signup.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
