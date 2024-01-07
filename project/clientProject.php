<?php
// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "software";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session
session_start();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_SESSION['client_email']; // Use client_email from the session

    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $budget = $_POST['budget'];
    $duedate = $_POST['duedate'];

    // Get client ID from the session
    if (isset($_SESSION['client_id'])) {
        $clientId = $_SESSION['client_id'];

        // Check if there are any rows in the project table
        $result = $conn->query("SELECT COUNT(*) as count FROM project");
        $row = $result->fetch_assoc();
        $count = $row['count'];

        // Fetch employee_id based on the condition
        if ($count == 0) {
            // If no rows in the project table, fetch the first employee_id from the employee table
            $result = $conn->query("SELECT MIN(employee_id) as min_employee_id FROM employee");
            $row = $result->fetch_assoc();
            $employeeId = $row['min_employee_id'];
        } else {
            // If there are rows, fetch the employee_id of the last row in the project table
            $result = $conn->query("SELECT employee_id FROM project ORDER BY project_id DESC LIMIT 1");
            $row = $result->fetch_assoc();
            $lastEmployeeId = $row['employee_id'];

            // Fetch all distinct employee IDs
            $result = $conn->query("SELECT DISTINCT employee_id FROM employee");
            $employeeIds = [];
            while ($row = $result->fetch_assoc()) {
                $employeeIds[] = $row['employee_id'];
            }

            // Find the index of the last assigned employee_id in the array
            $currentIndex = array_search($lastEmployeeId, $employeeIds);

            // Calculate the index of the next employee_id in a cyclic manner
            $nextIndex = ($currentIndex + 1) % count($employeeIds);

            // Get the next employee_id
            $employeeId = $employeeIds[$nextIndex];

            // If there is only one employee_id in the employee table, use that for the new project
            if (!$employeeId) {
                $result = $conn->query("SELECT MAX(employee_id) as max_employee_id FROM employee");
                $row = $result->fetch_assoc();
                $employeeId = $row['max_employee_id'];
            }
        }

        // Insert data into the project table
        $sql = "INSERT INTO project (client_id, email, phone, descript, assigned_date, due_date, employee_id) VALUES ('$clientId', '$email', '$phone', '$description', CURRENT_TIMESTAMP, '$duedate', '$employeeId')";

        if ($conn->query($sql) === TRUE) {
            // Get the auto-incremented project_id
            $projectId = $conn->insert_id;

            // Insert data into the project_budget table
            $sqlBudget = "INSERT INTO project_budget (project_id, budget) VALUES ('$projectId', '$budget')";
            if ($conn->query($sqlBudget) === TRUE) {
                echo "New project created successfully";
            } else {
                echo "Error inserting into project_budget: " . $sqlBudget . "<br>" . $conn->error;
            }
        } else {
            echo "Error inserting into project: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Client ID not found in session. Please log in.";
    }
}

// Close connection
$conn->close();
?>
