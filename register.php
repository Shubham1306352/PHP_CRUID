<?php
// Field Validation
function validateInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Get form data and validate
$first_name = validateInput($_POST['first_name']);
$last_name = validateInput($_POST['last_name']);
$email = validateInput($_POST['email']);
$nationality = validateInput($_POST['nationality']);
$dob = validateInput($_POST['dob']);

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

// Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "t2trial";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into database
$sql = "INSERT INTO customers (first_name, last_name, email, nationality, dob)
        VALUES ('$first_name', '$last_name', '$email', '$nationality', '$dob')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
