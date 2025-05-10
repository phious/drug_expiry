<?php
session_start();
ob_start();
include('../includes/connect.php');

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    // redirect if session ID is missing
    header("Location: ../index.php");
    exit();
}

$id = mysqli_real_escape_string($conn, $_SESSION['id']);
$sq = mysqli_query($conn, "SELECT * FROM `admin` WHERE id='$id'");

if ($sq && mysqli_num_rows($sq) > 0) {
    $srow = mysqli_fetch_array($sq);
    $user = $srow['Username'];
    $password = $srow['Password'];
    $firstname = $srow['firstname'];
    $lastname = $srow['lastname'];
    $phone_number = $srow['phone_number'];
} else {
    // destroy session and redirect if user not found
    session_destroy();
    header("Location: ../index.php");
    exit();
}
?>
