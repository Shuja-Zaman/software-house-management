<?php
// remove_project.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
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

    // Get the project ID from the form
    $projectId = $_POST['project_id'];

    // Perform the removal query for project_budget
    $removeBudgetQuery = "DELETE FROM project_budget WHERE project_id = $projectId";
    $resultBudget = $conn->query($removeBudgetQuery);

    // Perform the removal query for the project
    $removeProjectQuery = "DELETE FROM project WHERE project_id = $projectId";
    $resultProject = $conn->query($removeProjectQuery);

    // Check if both deletion queries were successful
    if ($resultBudget && $resultProject) {
        // Redirect back to the admin dashboard
        header("Location: adminPage.php");
        exit();
    } else {
        // Handle errors accordingly
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
