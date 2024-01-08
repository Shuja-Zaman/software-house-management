<!--  resolved -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Client Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
  h1 {
            font-size: 3rem;
            text-align: center;
            margin-top: 2rem;
            background: -webkit-linear-gradient(#888, #333); /* Adjust the color values */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .wrapper{
          border-right: 0.5px solid black;
          /* margin-top: 2rem; */
        }

</style>
</head>
<body>

  <!-- navbar -->
  <nav class="navbar sticky-top navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
  <path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>
</svg>RMS <sup>client</sup></a>
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
          <a class="nav-link active btn btn-outline-primary text-white" href="logout.php">Log out</a>
        </li>
      </ul>
      </span>
</div>
  </div>
</nav>

<div class="content mb-3 mt-4 d-flex">

<div class="wrapper  px-5 col-md-6">
  <h1>Submit a New Project</h1>
    <form class="row g-3" method="post" action="clientProject.php">
        <div class="col-md-12">
            <label for="validationDefault01" class="form-label">Phone</label>
            <input type="tel" name="phone" class="form-control" id="validationDefault01" placeholder="+92" required>
        </div>
        <div class="col-md-12">
            <label for="validationDefault02" class="form-label">Budget</label>
            <input type="number" name="budget" class="form-control" id="validationDefault02" placeholder="budget" required>
        </div>
        
        <div class="col-md-12">
            <label for="validationDefault02" class="form-label">Due Date</label>
            <input type="date" name="duedate" class="form-control" id="validationDefault02" required>
        </div>
        <div class="form-floating">
          <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
          <label for="floatingTextarea2">Description</label>
        </div>
        
        <div class="col-12">
            <button class="btn btn-outline-dark" type="submit">Submit project</button>
        </div>
        </form>

        </div>

<?php
// Assuming you have started the session in your login page
// Retrieve the client email from the session
session_start();
$clientEmail = $_SESSION['client_email'];

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

// Fetch client ID based on the provided email
$clientQuery = "SELECT client_id FROM client WHERE email = '$clientEmail'";
$clientResult = $conn->query($clientQuery);

if ($clientResult->num_rows > 0) {
    $row = $clientResult->fetch_assoc();
    $clientId = $row['client_id'];

    // Fetch assigned projects based on client ID
    $projectsQuery = "SELECT * FROM project WHERE client_id = '$clientId'";
    $projectsResult = $conn->query($projectsQuery);

    echo '<div class="projects-section px-3 col-md-6">';
    echo '<h1 class="title">Your Assigned Projects</h1>';

    while ($project = $projectsResult->fetch_assoc()) {
        echo '<div class="project mt-1 bg-black rounded-4 text-light px-2 pt-3 pb-1">';
        echo '<p>Description: ' . $project['descript'] . '</p>';
        
        // Fetch budget from project_budget table based on project ID
        $projectId = $project['project_id'];
        $budgetQuery = "SELECT budget FROM project_budget WHERE project_id = '$projectId'";
        $budgetResult = $conn->query($budgetQuery);

        if ($budgetResult->num_rows > 0) {
            $budgetRow = $budgetResult->fetch_assoc();
            echo '<p class="text-success">Budget: $' . $budgetRow['budget'] . '</p>';
        } else {
            echo '<p>Budget information not available</p>';
        }

        echo '<p class="text-warning">Due Date: ' . $project['due_date'] . '</p>';
        echo '</div>';
    }

    echo '</div>';
} else {
    echo "Client not found. Please check the provided email.";
}

// Close connection
$conn->close();
?>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>
