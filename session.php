<?php
// Start session only if none is active
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        
        'cookie_httponly' => true,
        'use_strict_mode' => true,
    ]);
}

// Check for valid session
if (!isset($_SESSION['id']) || trim($_SESSION['id']) === '') {
    session_destroy(); // Clean up invalid session
    header('Location: index.php'); // Root-level redirect
    exit();
}

// Include database connection
require_once 'includes/connect.php';

// Query admin table with sanitized input
$admin_id = mysqli_real_escape_string($conn, $_SESSION['id']);
$sq = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$admin_id'");

if (!$sq) {
    error_log("Database query failed in session.php: " . mysqli_error($conn));
    session_destroy();
    header('Location: index.php?error=db_error');
    exit();
}

if (mysqli_num_rows($sq) > 0) {
    $srow = mysqli_fetch_assoc($sq);
    // Safely assign user data
    $user = isset($srow['Username']) ? $srow['Username'] : '';
    $fullname = isset($srow['firstname']) ? $srow['firstname'] : '';
} else {
    session_destroy();
    header('Location: index.php?error=invalid_user');
    exit();
}
?>
