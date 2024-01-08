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

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the client with the provided email and password exists
    $query = "SELECT * FROM client WHERE email='$email' AND pass='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Client credentials are correct, fetch client ID
        $clientQuery = "SELECT client_id FROM client WHERE email='$email'";
        $clientResult = $conn->query($clientQuery);

        if ($clientResult->num_rows > 0) {
            $clientRow = $clientResult->fetch_assoc();
            $clientId = $clientRow['client_id'];

            // Store client ID and email in session variables
            $_SESSION['client_id'] = $clientId;
            $_SESSION['client_email'] = $email;

            // Redirect to clientPage.php
            header("Location: clientPage.php");
            exit();
        } else {
            echo "Error fetching client ID. Please try again.";
        }
    } else {
        echo "Invalid email or password. Please try again.";
    }
}

$conn->close();
?>
