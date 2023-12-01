<?php
// Get form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];
$crFile = $_FILES['crFile'];

// Database connection configuration
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a MySQLi object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to insert the form data into the database
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, mobile, password, role, cr_file) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $firstName, $lastName, $email, $mobile, $password, $role, $role === "vendor" ? $crFile['name'] : null);
if ($stmt->execute()) {
    // Insert successful
    echo "Data inserted into database successfully";
} else {
    // Insert failed
    echo "Error inserting data into database: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
