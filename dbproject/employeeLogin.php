<?php
// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "software";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the employee with the provided email and password exists
    $query = "SELECT * FROM employee WHERE email='$email' AND pass='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // emp credentials are correct, store email in a session variable and redirect to employeePage.php
        session_start();
        $_SESSION["emp_email"] = $email;
        header("Location: employeePage.php");
        exit();
    } else {
        echo "Invalid email or password. Please try again.";
    }
}

$conn->close();
?>
