<?php
// filepath: /Users/gaven/Documents/CS1/Web-Dev/Web-Dev-My-Projects/EnglishwithGaven/english-with-gaven/php/database.php

/**
 * Secure Database Connection using PDO
 * Loads credentials from .env file to keep passwords out of code
 */

// Function to load environment variables from .env file
function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception('.env file not found. Please check your configuration.');
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        // Parse KEY=VALUE
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            // Set environment variable
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

// Load .env file from project root (one level up from /php/)
$envPath = __DIR__ . '/../.env';
loadEnv($envPath);

// Get database credentials from environment variables
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');
$charset = getenv('DB_CHARSET') ?: 'utf8mb4';

// Create DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// PDO options for security
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,     // Throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,           // Return associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                      // Use real prepared statements
];

try {
    // Create PDO connection
    $pdo = new PDO($dsn, $username, $password, $options);
    
    // Return the PDO object
    return $pdo;
    
} catch (PDOException $e) {
    // In development, show error details
    if (getenv('ENVIRONMENT') === 'development') {
        die('Database connection failed: ' . $e->getMessage());
    } else {
        // In production, hide details
        die('Database connection failed. Please contact support.');
    }
}
?>
