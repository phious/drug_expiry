<?php
include('core.inc.php');
require('connect.php'); // Explicitly include connect.php for safety

if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    die("Error: Database connection failed.");
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Error: Invalid request method.");
}

if (!isset($_SESSION['id'])) {
    error_log("Session ID not set");
    die("Error: Admin session not found. Please log in.");
}

$batch = check_input($_POST['batch'] ?? '');
$name = check_input($_POST['name'] ?? '');
$desc = check_input($_POST['desc'] ?? '');
$pro_date = check_input($_POST['pro_date'] ?? '');
$ex_date = check_input($_POST['ex_date'] ?? '');
$qty = check_input($_POST['qty'] ?? '');
$price = check_input($_POST['price'] ?? '');
$status = 2;

if (empty($batch) || $batch == "choose a Batch") {
    error_log("Invalid batch selected");
    die("Error: Please select a valid batch.");
}

$insert = "INSERT INTO `drug_table` (`admin_id`, `batch_id`, `drug_name`, `description`, `prod_date`, `expiry_date`, `qty`, `price`, `status`, `evaluation`) 
           VALUES ('".$_SESSION['id']."', '$batch', '$name', '$desc', '$pro_date', '$ex_date', '$qty', '$price', '$status', 'normal')";

$query = mysqli_query($conn, $insert);
if ($query) {
    $pid = mysqli_insert_id($conn);
    mysqli_query($conn, "INSERT INTO `activity_log` (admin_id, action, activity_date) VALUES ('".$_SESSION['id']."', 'Added new drug', NOW())");
    header("Location: ../admin/product.php?success=Drug+added+successfully");
    exit();
} else {
    error_log("Drug insertion failed: " . mysqli_error($conn));
    die("Error: Failed to add drug. " . mysqli_error($conn));
}
?>