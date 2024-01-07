<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
       body{
        background-color: black;
       }

       h1 {
            font-size: 3rem;
            text-align: center;
            margin-top: 2rem;
            margin-bottom: 3rem;
            background: -webkit-linear-gradient(#888, #333); /* Adjust the color values */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p{
            color: white;
        }

    </style>
</head>
<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RMS <sup>employee</sup></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav me-auto">
        <!-- for space purpose -->
        </div>

        <!-- navbar items -->
      <span class="navbar-text">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contact.php">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active btn btn-outline-primary" href="logout.php">Log out</a>
        </li>
      </ul>
      </span>
</div>
  </div>
</nav>

<div class="details px-5">
    <h1 class="">Working Projects</h1>
    

    <?php
// Start the session
session_start();

// Check if emp_email is set in the session
if (!isset($_SESSION['emp_email'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: employeeLoginForm.php"); // Change the URL to your login page
    exit();
}

// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "software";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get employee ID from the session
$emp_email = $_SESSION['emp_email'];

// Get the employee's ID based on the email using prepared statement to prevent SQL injection
$employeeQuery = $conn->prepare("SELECT employee_id FROM employee WHERE email = ?");
$employeeQuery->bind_param("s", $emp_email);
$employeeQuery->execute();
$employeeResult = $employeeQuery->get_result();

if ($employeeResult->num_rows > 0) {
    $employeeRow = $employeeResult->fetch_assoc();
    $employee_id = $employeeRow['employee_id'];

    // Get projects whose due date has not passed and the employee is currently working on
    $sql = "SELECT DISTINCT project.project_id, project.descript, project.due_date, project.assigned_date, names.first_name
            FROM project
            JOIN names ON project.client_id = names.id
            WHERE project.due_date >= NOW() AND project.employee_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="project mt-3 bg-light rounded-4 text-light px-2 pt-3 pb-1">';
            echo "<p class='text-dark'>Client Name: " . $row["first_name"] . "</p>";
            echo "<p class='text-dark'>Description: " . $row["descript"] . "</p>";
            echo "<p class='text-dark'>Assigned Date: " . $row["assigned_date"] . "</p>";
            echo "<p class='text-danger'>Due Date: " . $row["due_date"] . "</p>";
            echo '</div>';
        }
    } else {
        echo "<p>No working projects.</p>";
    }
} else {
    echo "Employee not found.";
}

// Close connections
$stmt->close();
$employeeQuery->close();
$conn->close();
?>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
