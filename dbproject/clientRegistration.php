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

// Start the session
session_start();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];

    // Check if email already exists
    $emailCheckQuery = "SELECT COUNT(*) as count FROM client WHERE email = '$email'";
    $emailCheckResult = $conn->query($emailCheckQuery);

    if ($emailCheckResult && $emailCheckResult->num_rows > 0) {
        $emailCount = $emailCheckResult->fetch_assoc()['count'];

        if ($emailCount > 0) {
            echo "Email already exists. Please choose a different email.";
        } else {
            // Insert data into the client table
            $clientQuery = "INSERT INTO client (email, pass) VALUES ('$email', '$password')";
            $conn->query($clientQuery);

            // Get the auto-incremented client_id
            $clientIDQuery = "SELECT client_id FROM client WHERE email = '$email'";
            $result = $conn->query($clientIDQuery);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $clientID = $row['client_id'];

                // Insert names into the name table
                $nameQuery = "INSERT INTO names (id, first_name, mid_name, last_name, roles) VALUES ('$clientID', '$fname', '$mname', '$lname','client')";
                $conn->query($nameQuery);

                // Store the client email in the session variable
                $_SESSION['client_email'] = $email;

                echo "Registration successful!";
                header("Location: clientLoginForm.php");
            } else {
                echo "Error fetching client_id";
            }
        }
    } else {
        echo "Error checking email existence";
    }
}

$conn->close();
?>
