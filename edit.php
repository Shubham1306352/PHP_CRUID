
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $customer_id = $_POST['customer_id'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Update data in the database
    $sql = "UPDATE customers SET first_name='$first_name', last_name='$last_name', email='$email', nationality='$nationality', dob='$dob' WHERE customer_id='$customer_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Retrieve customer data from the database
    $customer_id = $_GET['id'];
    $sql = "SELECT * FROM customers WHERE customer_id='$customer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $nationality = $row['nationality'];
        $dob = $row['dob'];
    } else {
        echo "Customer not found.";
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
  
  <link rel="stylesheet" type="text/css" href="style3.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
    <h1>Edit Customer</h1>
    <br> <br> <br>

    <div class='box'>
        <br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
    <input type="hidden"  name="customer_id" value="<?php echo $customer_id; ?>">
      
        <input type="text"   name="first_name" value="<?php echo $first_name; ?>" placeholder="First Name" required>
        <br>
        <br>
          
        <input type="text"    name="last_name" value="<?php echo $last_name; ?>" placeholder="Last Name" required>
        <br>
        <br>

        <input type="email"   name="email" value="<?php echo $email; ?>" placeholder="Email" required>
        <br>
        <br>

        <input type="text"   name="nationality" value="<?php echo $nationality; ?>" placeholder="Nationality">
        <br>
        <br> 

        <input type="date" class='dob'   name="dob" value="<?php echo $dob; ?>" placeholder="Date of Birth" required>
        <br>
        <br>

        <input type="submit" class='update' value="Update">

        


    </form>

    

</div>

    


 
    

</body>
</html>
