<?php
// filepath: /Users/gaven/Documents/CS1/Web-Dev/Web-Dev-My-Projects/EnglishwithGaven/english-with-gaven/php/signupprocess.php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Validate input
if (empty($_POST['name']) || !preg_match("/^[a-zA-Z\s]+$/", $_POST['name'])) {
    die('Name is required and can only contain letters and spaces');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die('Valid email is required');
}

if (empty($_POST['dob']) || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['dob'])) {
    die('Date of Birth is required and must be in the format YYYY-MM-DD');
}

$dob = $_POST['dob'];
$gender = !empty($_POST['gender']) ? $_POST['gender'] : 'unknown';
$country = !empty($_POST['country']) ? $_POST['country'] : 'unspecified';

// Password validation
if (strlen($_POST['password']) < 8) {
    die('Password must be at least 8 characters');
}

if (!preg_match('/[a-z]/', $_POST['password'])) {
    die('Password must contain at least one lowercase letter');
}

if (!preg_match('/[A-Z]/', $_POST['password'])) {
    die('Password must contain at least one uppercase letter');
}

if (!preg_match('/[0-9]/', $_POST['password'])) {
    die('Password must contain at least one number');
}

if (!preg_match('/[^a-zA-Z0-9]/', $_POST['password'])) {
    die('Password must contain at least one special character');
}

if ($_POST['password'] !== $_POST['password_confirmation']) {
    die('Passwords do not match');
}

// Hash the password securely
$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Get secure PDO connection
try {
    $pdo = require __DIR__ . '/database.php';
} catch (Exception $e) {
    die('Database connection failed. Please try again later.');
}

// Prepare the SQL statement with PDO
$sql = 'INSERT INTO user (name, email, dob, gender, country, password_hash) VALUES (?, ?, ?, ?, ?, ?)';

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $dob,
        $gender,
        $country,
        $password_hash
    ]);
    
    // Redirect to success page
    header('Location: ../signup-success.html');
    exit;
    
} catch (PDOException $e) {
    // Check for duplicate email error (MySQL error code 1062)
    if ($e->getCode() == 23000) {
        die('Email is already in use. Please use a different email or <a href="login.php">login</a>.');
    }
    
    // Log other errors and show generic message
    error_log($e->getMessage());
    die('An error occurred during signup. Please try again later.');
}
?>
