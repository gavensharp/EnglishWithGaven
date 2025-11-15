<?php
// filepath: /Users/gaven/Documents/CS1/Web-Dev/Web-Dev-My-Projects/EnglishwithGaven/english-with-gaven/php/upload_photo.php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: profile.php');
    exit;
}

// Check if file was uploaded
if (!isset($_FILES['profile_photo']) || $_FILES['profile_photo']['error'] !== UPLOAD_ERR_OK) {
    $_SESSION['upload_error'] = 'Please select a photo to upload.';
    header('Location: profile.php');
    exit;
}

$file = $_FILES['profile_photo'];

// Validate file type (only images)
$allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
$file_type = mime_content_type($file['tmp_name']);

if (!in_array($file_type, $allowed_types)) {
    $_SESSION['upload_error'] = 'Please upload a valid image file (JPG, PNG, GIF, or WebP).';
    header('Location: profile.php');
    exit;
}

// Validate file size (max 5MB)
$max_size = 5 * 1024 * 1024; // 5MB in bytes
if ($file['size'] > $max_size) {
    $_SESSION['upload_error'] = 'File is too large. Maximum size is 5MB.';
    header('Location: profile.php');
    exit;
}

// Get file extension
$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

// Create unique filename: user_[id]_[timestamp].[ext]
$new_filename = 'user_' . $_SESSION['user_id'] . '_' . time() . '.' . $extension;

// Set upload directory (relative to project root)
$upload_dir = __DIR__ . '/../uploads/profile_photos/';
$upload_path = $upload_dir . $new_filename;

// Create directory if it doesn't exist
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

// Move uploaded file
if (!move_uploaded_file($file['tmp_name'], $upload_path)) {
    $_SESSION['upload_error'] = 'Failed to upload photo. Please try again.';
    header('Location: profile.php');
    exit;
}

// Get PDO connection
try {
    $pdo = require __DIR__ . '/database.php';
} catch (Exception $e) {
    $_SESSION['upload_error'] = 'Database connection failed.';
    header('Location: profile.php');
    exit;
}

// Get old photo path to delete it
try {
    $stmt = $pdo->prepare("SELECT profile_photo FROM user WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $old_photo = $stmt->fetchColumn();
    
    // Delete old photo if it exists and is not default
    if ($old_photo && $old_photo !== 'default-photo.jpg' && file_exists(__DIR__ . '/../' . $old_photo)) {
        unlink(__DIR__ . '/../' . $old_photo);
    }
} catch (PDOException $e) {
    error_log($e->getMessage());
}

// Update database with new photo path (relative to project root)
$db_path = 'uploads/profile_photos/' . $new_filename;

try {
    $stmt = $pdo->prepare("UPDATE user SET profile_photo = ? WHERE id = ?");
    $stmt->execute([$db_path, $_SESSION['user_id']]);
    
    $_SESSION['photo_uploaded'] = true;
    header('Location: profile.php');
    exit;
    
} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['upload_error'] = 'Failed to update profile. Please try again.';
    
    // Delete uploaded file since DB update failed
    if (file_exists($upload_path)) {
        unlink($upload_path);
    }
    
    header('Location: profile.php');
    exit;
}
?>


