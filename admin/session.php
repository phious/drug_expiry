<?php
// Start session only if none is active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    ob_start();
}

include('../includes/connect.php');

// Check if session ID is set and not empty
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}

// Sanitize session ID
$admin_id = mysqli_real_escape_string($conn, $_SESSION['id']);

// Query the admin table
$sq = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$admin_id'");

if (!$sq) {
    error_log("Database query failed: " . mysqli_error($conn));
    session_destroy();
    header("Location: ../index.php?error=db_error");
    exit();
}

if (mysqli_num_rows($sq) > 0) {
    $srow = mysqli_fetch_assoc($sq);
    // Store only necessary user data
    $user = isset($srow['Username']) ? $srow['Username'] : '';
    $firstname = isset($srow['firstname']) ? $srow['firstname'] : '';
    $lastname = isset($srow['lastname']) ? $srow['lastname'] : '';
    $phone_number = isset($srow['phone_number']) ? $srow['phone_number'] : '';
} else {
    session_destroy();
    header("Location: ../index.php?error=invalid_user");
    exit();
}
?>
