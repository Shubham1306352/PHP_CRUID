<?php
// Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "t2trial";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve customer ID from URL parameter
$customer_id = $_GET['id'];

// Delete customer from database
$sql = "DELETE FROM customers WHERE customer_id='$customer_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
