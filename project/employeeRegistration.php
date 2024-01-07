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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];

    // Check if email already exists
    $emailCheckQuery = "SELECT COUNT(*) as count FROM employee WHERE email = '$email'";
    $emailCheckResult = $conn->query($emailCheckQuery);

    if ($emailCheckResult && $emailCheckResult->num_rows > 0) {
        $emailCount = $emailCheckResult->fetch_assoc()['count'];

        if ($emailCount > 0) {
            echo "Email already exists. Please choose a different email.";
        } else {
            // Insert data into the employee table
            $employeeQuery = "INSERT INTO employee (email, pass) VALUES ('$email', '$password')";
            $conn->query($employeeQuery);

            // Get the auto-incremented employee_id
            $employeeID = $conn->insert_id;

            // Insert names into the name table
            $nameQuery = "INSERT INTO names (id, first_name, mid_name, last_name,roles) VALUES ('$employeeID', '$fname', '$mname', '$lname','employee')";
            $conn->query($nameQuery);

            echo "Registration successful!";
            header("Location: employeeLoginForm.php");
        }
    } else {
        echo "Error checking email existence";
    }
}

$conn->close();
?>
