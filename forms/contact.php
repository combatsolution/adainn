<?php
// Database connection
$host = "localhost";
$user = "root"; // default XAMPP user
$pass = "";     // default XAMPP password
$db   = "contact_form";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn-> connect_error);
}

// Get form data
$name    = $conn->real_escape_string($_POST['name']);
$email   = $conn->real_escape_string($_POST['email']);
$subject = $conn->real_escape_string($_POST['subject']);
$message = $conn->real_escape_string($_POST['message']);

// Insert into database
$sql = "INSERT INTO submissions (name, email, subject, message)   
        VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "success"; // You can return a JSON or custom message
} else {
  echo "Error: " .$conn->error;
}

$conn->close();
?>
