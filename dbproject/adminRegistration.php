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
    $emailCheckQuery = "SELECT COUNT(*) as count FROM admin WHERE email = '$email'";
    $emailCheckResult = $conn->query($emailCheckQuery);

    if ($emailCheckResult) {
        $emailCount = $emailCheckResult->fetch_assoc()['count'];

        if ($emailCount > 0) {
            echo "Email already exists. Please choose a different email.";
        } else {
            // Insert data into the admin table
            $adminQuery = "INSERT INTO admin (email, pass) VALUES ('$email', '$password')";

            if ($conn->query($adminQuery) === TRUE) {
                // Get the auto-incremented admin_id
                $adminIDQuery = "SELECT admin_id FROM admin WHERE email = '$email'";
                $result = $conn->query($adminIDQuery);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $adminID = $row["admin_id"];

                    // Insert names into the names table
                    $nameQuery = "INSERT INTO names (id, first_name, mid_name, last_name, roles) VALUES ('$adminID', '$fname', '$mname', '$lname', 'admin')";

                    if ($conn->query($nameQuery) === TRUE) {
                        echo "Registration successful!";
                        header("Location: adminLoginForm.php");
                    } else {
                        echo "Error inserting names: " . $conn->error;
                    }
                } else {
                    echo "Error retrieving admin_id: " . $conn->error;
                }
            } else {
                echo "Error inserting admin data: " . $conn->error;
            }
        }
    } else {
        echo "Error checking email existence";
    }
}

$conn->close();
?>
