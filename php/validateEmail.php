<?php
// filepath: /Users/gaven/Documents/CS1/Web-Dev/Web-Dev-My-Projects/EnglishwithGaven/english-with-gaven/php/validateEmail.php

/**
 * Email Availability Check (AJAX endpoint)
 * Used by signup form to validate if email is already registered
 * Returns JSON response for client-side validation
 */

// Set JSON header first
header("Content-Type: application/json");

// Only allow GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['isEmailAvailable' => false, 'error' => 'Method not allowed']);
    exit;
}

// Validate email parameter exists
if (!isset($_GET['email']) || empty($_GET['email'])) {
    http_response_code(400);
    echo json_encode(['isEmailAvailable' => false, 'error' => 'Email parameter required']);
    exit;
}

// Validate email format
$email = filter_var(trim($_GET['email']), FILTER_VALIDATE_EMAIL);
if ($email === false) {
    http_response_code(400);
    echo json_encode(['isEmailAvailable' => false, 'error' => 'Invalid email format']);
    exit;
}

// Get secure PDO connection
try {
    $pdo = require __DIR__ . "/database.php";
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['isEmailAvailable' => false, 'error' => 'Database connection failed']);
    exit;
}

// Check if email exists using prepared statement (prevents SQL injection)
try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();
    
    // Email is available if count is 0
    $is_available = ($count === 0);
    
    // Return response matching what newvalidation.js expects
    echo json_encode(['isEmailAvailable' => $is_available]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['isEmailAvailable' => false, 'error' => 'Database query failed']);
    exit;
}
?>
