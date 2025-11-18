<?php
// filepath: partials/footer.php
// Main footer with navigation links
?>

<footer class="bg-light mb-5">
  <div class="container">
    <div class="row text-center text-md-center">
      <!-- Logo Section -->
      <div class="col-12 col-md-4 mb-4 mb-md-0">
        <div class="footer-logo">
          <img src="/site-images/logo.png" alt="English with Gaven Logo" class="img-fluid mb-3" style="max-width: 100px;">
        </div>
        <p>English with Gaven &copy; 2025</p>
      </div>

      <!-- Footer Links Section -->
      <div class="col-12 col-md-8">
        <div class="row">
          <!-- Account Links Column -->
          <div class="col-6 col-md-4">
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="/php/login.php" class="nav-link text-dark text-decoration-none">Login</a></li>
              <li class="nav-item mb-2"><a href="/signup.php" class="nav-link text-dark text-decoration-none">Sign Up</a></li>
              <li class="nav-item mb-2"><a href="/contact.php" class="nav-link text-dark text-decoration-none">Contact</a></li>
            </ul>
          </div>

          <!-- Navigation Links Column -->
          <div class="col-6 col-md-4">
            <ul class="nav flex-column">
              <?php include __DIR__ . '/grammar-nav.php'; ?>
              <li class="nav-item mb-2"><a href="/index.php" class="nav-link text-dark text-decoration-none">Home</a></li>
              <li class="nav-item mb-2"><a href="/about.php" class="nav-link text-dark text-decoration-none">About</a></li>
            </ul>
          </div>

          <!-- Legal Links Column -->
          <div class="col-6 col-md-4 mt-4 mt-md-0">
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="/faq.php" class="nav-link text-dark text-decoration-none">FAQ</a></li>
              <li class="nav-item mb-2"><a href="/terms.php" class="nav-link text-dark text-decoration-none">Terms of Service</a></li>
              <li class="nav-item mb-2"><a href="/privacy.php" class="nav-link text-dark text-decoration-none">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
