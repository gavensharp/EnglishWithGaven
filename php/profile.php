<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

// Get secure PDO connection
try {
  $pdo = require __DIR__ . '/database.php';
} catch (Exception $e) {
  die("Database connection failed. Please try again later.");
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $english_level = $_POST['english_level'] ?? null;

  // Validate required fields
  if ($english_level) {
    try {
      // Update the database with the new values using prepared statement
      $stmt = $pdo->prepare("UPDATE user SET english_level = ? WHERE id = ?");
      $stmt->execute([$english_level, $_SESSION['user_id']]);

      $message = "Your profile has been updated successfully.";
    } catch (PDOException $e) {
      $message = "Error updating profile. Please try again.";
      error_log($e->getMessage());
    }
  } else {
    $message = "Please fill in all required fields.";
  }
}

// Retrieve the current values from the database
try {
  $stmt = $pdo->prepare("SELECT name, dob, country, profile_photo, english_level FROM user WHERE id = ?");
  $stmt->execute([$_SESSION['user_id']]);
  $user = $stmt->fetch();

  if (!$user) {
    die("User not found.");
  }
} catch (PDOException $e) {
  die("Error retrieving profile. Please try again later.");
  error_log($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/main.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <title>Profile - English with Gaven</title>
  <meta name="description" content="Manage your English with Gaven profile, update your English level, and schedule lessons.">
</head>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
      <div class="container-fluid mt-3">
        <!-- Logo -->
        <a class="navbar-brand ms-3" href="../index.php">
          <img src="../site-images/logo.png"
            alt="English with Gaven Logo"
            class="img-fluid"
            style="max-width: 100px" />
        </a>

        <!-- Navbar Toggler for Mobile -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Simplified Navigation - Logout Only -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item me-3">
              <a class="nav-link fw-bold text-dark" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Welcome Banner with Instructions-->
  <div class="container mt-4">
    <div class="alert" style="background-color: #fff3e0; border: 1px solid #ffcc80; border-left: 4px solid #ff9800;" role="alert">
      <h4 class="alert-heading">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-circle-fill me-2" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </svg>
        Welcome to Your Profile, <?php echo htmlspecialchars($user['name'] ?? ''); ?>
      </h4>
      <p class="mb-2">📝 <strong>Update your profile details below</strong> - Set your English level, upload a photo, and view your schedule.</p>
      <p class="mb-0">🏠 <strong>When you're done</strong> - Click "Logout" above to return home and continue exploring English with Gaven!</p>
    </div>
  </div>

  <div class="container mt-4">
    <div class="row">
      <!-- Profile Photo Section -->
      <div class="col-12 col-sm-8 col-md-4 mb-4 mx-auto mx-md-0">
        <div class="card">
          <div class="card-body bg-accent py-3">
            <h3 class="fs-4 mb-4 card-title text-center">Your Photo</h3>
            <img src="<?php
                      $photo_path = $user['profile_photo'] ?? 'site-images/default-photo.jpg';
                      // If path doesn't start with http or /, add ../
                      if (!str_starts_with($photo_path, 'http') && !str_starts_with($photo_path, '/')) {
                        $photo_path = '../' . $photo_path;
                      }
                      echo htmlspecialchars($photo_path);
                      ?>"
              alt="Profile Photo"
              class="img-fluid rounded"
              style="border-radius: 6%; max-height: 300px; object-fit: cover;">
            <form method="post" enctype="multipart/form-data" action="upload_photo.php" class="mt-3">
              <label for="profile_photo" class="form-label">Upload New Photo</label>
              <input type="file"
                name="profile_photo"
                id="profile_photo"
                accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                class="form-control"
                required>
              <small class="form-text text-muted">Max size: 5MB. Formats: JPG, PNG, GIF, WebP</small>
              <button type="submit" class="btn btn-primary mt-2 w-100">📤 Upload Photo</button>
            </form>

            <?php if (isset($_SESSION['photo_uploaded'])): ?>
              <div class="alert alert-success mt-3" role="alert">
                ✅ Photo uploaded successfully!
              </div>
              <?php unset($_SESSION['photo_uploaded']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['upload_error'])): ?>
              <div class="alert alert-danger mt-3" role="alert">
                ❌ <?= htmlspecialchars($_SESSION['upload_error']) ?>
              </div>
              <?php unset($_SESSION['upload_error']); ?>
            <?php endif; ?>

          </div>
        </div>
      </div>

      <!-- User Profile Section -->
      <div class="col-12 col-md-8 mb-4">
        <div class="card h-100">
          <div class="card-body bg-accent">
            <h3 class="fs-4 card-title text-center mb-4">Your Profile Details</h3>

            <div class="row">
              <div class="col-md-6">
                <p class="card-text mt-3 fs-5">
                  <strong>Name:</strong> <?= htmlspecialchars($user['name'] ?? '') ?>
                </p>
              </div>
              <div class="col-md-6">
                <p class="card-text mt-3 fs-5">
                  <strong>Age:</strong>
                  <?php
                  $dob = new DateTime($user['dob'] ?? '1970-01-01');
                  $now = new DateTime();
                  $age = $now->diff($dob)->y;
                  echo $age;
                  ?>
                </p>
              </div>
              <div class="col-md-6">
                <p class="card-text mt-3 fs-5">
                  <strong>Nationality:</strong> <?= htmlspecialchars($user['country'] ?? '') ?>
                </p>
              </div>
            </div>

            <form method="post" action="" class="mt-4">
              <div class="mb-3">
                <label for="english_level" class="form-label fs-5">
                  <strong>Current English Level:</strong>
                </label>
                <select id="english_level" name="english_level" class="form-select">
                  <option value="A1" <?= ($user['english_level'] ?? '') == 'A1' ? 'selected' : '' ?>>A1 (Beginner)</option>
                  <option value="A2" <?= ($user['english_level'] ?? '') == 'A2' ? 'selected' : '' ?>>A2 (Elementary)</option>
                  <option value="B1" <?= ($user['english_level'] ?? '') == 'B1' ? 'selected' : '' ?>>B1 (Intermediate)</option>
                  <option value="B2" <?= ($user['english_level'] ?? '') == 'B2' ? 'selected' : '' ?>>B2 (Upper-Intermediate)</option>
                  <option value="C1" <?= ($user['english_level'] ?? '') == 'C1' ? 'selected' : '' ?>>C1 (Advanced)</option>
                  <option value="C2" <?= ($user['english_level'] ?? '') == 'C2' ? 'selected' : '' ?>>C2 (Proficient)</option>
                  <option value="Not sure" <?= ($user['english_level'] ?? '') == 'Not sure' ? 'selected' : '' ?>>Not sure</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary w-100">💾 Save English Level</button>
            </form>

            <?php if (!empty($message)): ?>
              <div class="alert alert-success mt-3" role="alert">
                ✅ <?= htmlspecialchars($message) ?>
              </div>
            <?php endif; ?>

            <hr class="my-4">

            <h4 class="fs-5 mb-3"><strong>📅 Your Lesson Schedule</strong></h4>
            <p class="text-muted">No lessons scheduled for this month.</p>

            <!-- Action Buttons -->
            <div class="d-grid gap-2 mt-4">
              <a href="https://calendar.google.com/calendar/embed?src=englishwithgaven%40gmail.com&ctz=Asia%2FJakarta"
                target="_blank"
                class="btn btn-primary">
                📅 View Available Lesson Times
              </a>
              <a href="https://www.paypal.com/cgi-bin/webscr?business=97DKP326AXSAA&cmd=_xclick&item_name=Monthly+Subscription&currency_code=USD&no_shipping=2&button_subtype=services&undefined_quantity=1&bn=97DKP326AXSAA%3APP-BuyNowBF_S&no_note=0"
                target="_blank"
                class="btn btn-warning text-white">
                💳 Pay with PayPal
              </a>
              <a href="logout.php" class="btn btn-outline-danger">
                🚪 Logout & Return Home
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-light mt-5 py-4">
    <div class="container">
      <div class="row text-center justify-content-center">
        <div class="col-12 col-md-4">
          <div class="footer-logo">
            <img src="../site-images/logo.png" alt="English with Gaven Logo" class="img-fluid mb-3" style="max-width: 100px;">
          </div>
          <p class="text-muted">English with Gaven &copy; 2025</p>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>