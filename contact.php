<?php
// Database connection settings
$host = "localhost";
$db = "hctfdyrn_printkabazaar";
$user = "hctfdyrn_admiin";
$pass = "LxH4D+~xmeyl";

// Connect to database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize form data
$name = $conn->real_escape_string(trim($_POST['name']));
$email = $conn->real_escape_string(trim($_POST['email']));
$message = $conn->real_escape_string(trim($_POST['comment']));

// Simple validation
if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $message) {
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=error");
    }
} else {
    header("Location: index.php?status=error");
}
$conn->close();
exit;
?>