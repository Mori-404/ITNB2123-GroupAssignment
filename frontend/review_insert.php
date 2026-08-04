<?php

$name = trim($_POST['name']);
$rating = $_POST['rating'];
$comment = trim($_POST['comment']);

if (!empty($name) && !empty($rating) && !empty($comment)) {

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "bytheway_cafe";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4");

    $INSERT = "INSERT INTO review (full_name, rating, comment) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($INSERT);

    $stmt->bind_param("sis", $name, $rating, $comment);

    if ($stmt->execute()) {
        echo "Review submitted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "All fields are required";
}

?>