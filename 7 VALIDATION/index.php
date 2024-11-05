<?php
// Define regex patterns
$name_pattern = "/^[a-zA-Z ]+$/";
$email_pattern = "/^[\w\-\.]+@([\w\-]+\.)+[\w]{2,4}$/";
$phone_pattern = "/^[0-9]{10}$/";

// Initialize error messages
$name_error = $email_error = $phone_error = "";

// Check if form data is posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    
    // Validate name
    if (!preg_match($name_pattern, $name)) {
        $name_error = "Invalid name. Only letters and spaces are allowed.";
    }

    // Validate email
    if (!preg_match($email_pattern, $email)) {
        $email_error = "Invalid email format.";
    }

    // Validate phone number
    if (!preg_match($phone_pattern, $phone)) {
        $phone_error = "Invalid phone number. Only 10 digits are allowed.";
    }

    // Check if there are any errors
    if ($name_error || $email_error || $phone_error) {
        echo "<h3>Errors:</h3>";
        echo "<p>$name_error</p>";
        echo "<p>$email_error</p>";
        echo "<p>$phone_error</p>";
    } else {
        // If no errors, display success message
        echo "<h3>Form submitted successfully!</h3>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Phone: $phone</p>";
    }
}
?>