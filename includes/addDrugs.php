<?php
include('core.inc.php');
require('connect.php');

header('Content-Type: application/json'); // Set JSON response header

if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

if (!isset($_SESSION['id'])) {
    error_log("Session ID not set");
    echo json_encode(['success' => false, 'message' => 'Admin session not found. Please log in']);
    exit;
}

$batch = check_input($_POST['batch'] ?? '');
$name = check_input($_POST['name'] ?? '');
$desc = check_input($_POST['desc'] ?? '');
$pro_date = check_input($_POST['pro_date'] ?? '');
$ex_date = check_input($_POST['ex_date'] ?? '');
$qty = check_input($_POST['qty'] ?? '');
$price = check_input($_POST['price'] ?? '');
$status = 2;

// Validate inputs
if (empty($batch) || $batch == "choose a Batch" || empty($name) || empty($pro_date) || empty($ex_date)) {
    error_log("Invalid input data");
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields and select a valid batch']);
    exit;
}

// Validate batch exists
$batchCheck = mysqli_query($conn, "SELECT b_id FROM batch WHERE b_id = '$batch'");
if (mysqli_num_rows($batchCheck) == 0) {
    error_log("Invalid batch ID: $batch");
    echo json_encode(['success' => false, 'message' => 'Selected batch does not exist']);
    exit;
}

$insert = "INSERT INTO drug_table (admin_id, batch_id, drug_name, description, prod_date, expiry_date, qty, price, status, evaluation) 
           VALUES ('".$_SESSION['id']."', '$batch', '$name', '$desc', '$pro_date', '$ex_date', '$qty', '$price', '$status', 'normal')";

$query = mysqli_query($conn, $insert);
if ($query) {
    $pid = mysqli_insert_id($conn);
    mysqli_query($conn, "INSERT INTO activity_log (admin_id, action, activity_date) VALUES ('".$_SESSION['id']."', 'Added new drug', NOW())");
    echo json_encode(['success' => true, 'message' => 'Drug added successfully']);
} else {
    error_log("Drug insertion failed: " . mysqli_error($conn));
    echo json_encode(['success' => false, 'message' => 'Failed to add drug: ' . mysqli_error($conn)]);
}
exit;
?>