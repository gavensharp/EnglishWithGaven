<?php
// filepath: /Users/gaven/Documents/CS1/Web-Dev/Web-Dev-My-Projects/EnglishwithGaven/english-with-gaven/php/login.php

session_start();

// Variable to track invalid login
$is_invalid = false;

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Validate inputs exist
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $is_invalid = true;
    } else {
        
        // Get secure PDO connection
        try {
            $pdo = require __DIR__ . '/database.php';
            
            // Use prepared statement to prevent SQL injection
            $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->execute([$_POST['email']]);
            $user = $stmt->fetch();
            
            // Check if user exists and password is correct
            if ($user && password_verify($_POST['password'], $user['password_hash'])) {
                
                // Regenerate session ID to prevent session fixation
                session_regenerate_id(true);
                
                // Store user ID in session
                $_SESSION['user_id'] = $user['id'];
                
                // Redirect to profile
                header('Location: profile.php');
                exit;
            }
            
            // User not found or password incorrect
            $is_invalid = true;
            
        } catch (Exception $e) {
            // Log error in production, show generic message
            error_log($e->getMessage());
            $is_invalid = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - English with Gaven</title>
    <meta name="description" content="Login to your English with Gaven account to access your profile and continue your English learning journey.">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

    <!-- Home link -->
    <div class="text-left mt-5 ms-5">
        <a href="../index.php" class="btn btn-primary">Home</a>
    </div>

    <div class="container">
        <h1 class="text-center mt-5">Login</h1>
        <p class="text-center">Please login to continue</p>

        <?php if ($is_invalid): ?>
            <div class="alert alert-danger text-center mx-auto w-50" role="alert">
                Invalid login credentials
            </div>
        <?php endif; ?>

        <form method="post" class="mx-auto w-50">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" 
                    class="form-control"
                    required
                    autocomplete="email"
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control"
                    required
                    autocomplete="current-password"
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>
</html>
