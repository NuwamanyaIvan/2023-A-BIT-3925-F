<?php
// Database connection
$servername = "localhost";
$username = "root"; // your DB username
$password = ""; // your DB password
$dbname = "student_registration_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Prepare SQL query
    $sql = "INSERT INTO students (name, email, phone, address) 
            VALUES ('$name', '$email', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success text-center mt-3'>Student registered successfully!</div>";
    } else {
        echo "<div class='alert alert-danger text-center mt-3'>Error: " . $conn->error . "</div>";
    }
    
    // Close connection
    $conn->close();
}
?>
