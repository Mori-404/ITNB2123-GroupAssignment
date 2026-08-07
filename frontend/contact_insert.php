<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];

if (!empty($name) && !empty($email) && !empty($phone_number) && !empty($subject) && !empty($msg)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "bytheway_cafe";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From contact Where email = ? Limit 1";
        $INSERT = "INSERT Into contact (full_name, email, phone_number, subject, message) values(?, ?, ?, ?, ?)";

        //prepare statement
        $stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $email);
$stmt->execute();

$existingEmail = "";
$stmt->bind_result($existingEmail);
$stmt->store_result();

$rnum = $stmt->num_rows;

        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssss", $name, $email, $phone_number, $subject, $msg);
            $stmt->execute();
            echo "New record inserted successfully";
        } else {
            echo "Someone already register using this email";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All field are required";
    die();
}
?>