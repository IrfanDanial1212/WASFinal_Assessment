<?php
session_start();

// Set error reporting to hide warnings
error_reporting(0);

$conn = mysqli_connect("localhost", "root", "", "webappsecfinal");

// Display token if needed
/* if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    echo "Session Token: " . $token;
 else {
    echo "Session Token not set.";
} */

if (mysqli_connect_errno()) {
    die("Failed to connect to database: " . mysqli_connect_error());
}

// Set the session timeout period in seconds (2 minutes)
$sessionTimeout = 120;

// Check if the session variable for the last activity timestamp exists
if (isset($_SESSION['lastActivityTimestamp'])) {
    // Get the current timestamp
    $currentTime = time();
    // Calculate the time elapsed since the last activity
    $elapsedTime = $currentTime - $_SESSION['lastActivityTimestamp'];

    // Check if the elapsed time exceeds the session timeout period
    if ($elapsedTime >= $sessionTimeout) {
        // Session has timed out, destroy the session and redirect to the login page
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

// Update the last activity timestamp to the current time
$_SESSION['lastActivityTimestamp'] = time();

// Generate a unique token if it doesn't exist in the session
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// Verify token on subsequent requests
if (isset($_POST['submit'])) {
    // Check if the submitted token matches the one stored in the session
    if (isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {
        // Token is valid, perform the necessary actions
        // ...
    } else {
        // Token is invalid, handle the error appropriately
        // ...
    }
}