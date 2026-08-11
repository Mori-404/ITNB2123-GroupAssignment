<?php
// Temporary debug: show errors while testing (remove or disable in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit("Method Not Allowed");
}

// Get form data safely
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone_number = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$msg = trim($_POST['msg'] ?? '');

// Check required fields
if (
    $name === '' ||
    $email === '' ||
    $phone_number === '' ||
    $subject === '' ||
    $msg === ''
) {
    http_response_code(400);
    exit("All fields are required.");
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit("Please enter a valid email address.");
}

// Limit input length
if (strlen($name) > 100) {
    exit("Name is too long.");
}

if (strlen($email) > 150) {
    exit("Email is too long.");
}

if (strlen($phone_number) > 30) {
    exit("Phone number is too long.");
}

if (strlen($subject) > 200) {
    exit("Subject is too long.");
}

if (strlen($msg) > 2000) {
    exit("Message is too long.");
}

// Database configuration
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "bytheway_cafe";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Handle connection failure without exposing database details
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    http_response_code(500);
    exit("Unable to process your request at this time.");
}

// Set character encoding
$conn->set_charset("utf8mb4");

// Check if email already exists
$SELECT = "SELECT email FROM contact WHERE email = ? LIMIT 1";

$stmt = $conn->prepare($SELECT);

if (!$stmt) {
    error_log("Database prepare error: " . $conn->error);
    http_response_code(500);
    exit("Unable to process your request at this time.");
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {

    $stmt->close();
    $conn->close();

    http_response_code(409);
    exit("Someone has already registered using this email.");
}

$stmt->close();

// Insert contact message
$INSERT = "INSERT INTO contact 
(full_name, email, phone_number, subject, message) 
VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($INSERT);

if (!$stmt) {
    error_log("Database prepare error: " . $conn->error);
    $conn->close();

    http_response_code(500);
    exit("Unable to process your request at this time.");
}

$stmt->bind_param(
    "sssss",
    $name,
    $email,
    $phone_number,
    $subject,
    $msg
);

if ($stmt->execute()) {
    echo "Your message has been submitted successfully.";
} else {
    error_log("Database insert error: " . $stmt->error);
    http_response_code(500);
    echo "Unable to submit your message. Please try again later.";
}

$stmt->close();
$conn->close();
?>