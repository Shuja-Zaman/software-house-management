<?php
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

// Function to fetch client name from the name table
function getClientName($clientId, $conn)
{
    $query = "SELECT first_name FROM names WHERE id = $clientId AND roles='client' ";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['first_name'];
    }

    return "Unknown";
}

// Query ongoing projects
$ongoingProjectsQuery = "SELECT * FROM project WHERE due_date >= NOW()";
$ongoingProjectsResult = $conn->query($ongoingProjectsQuery);

// Query completed projects
$completedProjectsQuery = "SELECT * FROM project WHERE due_date < NOW()";
$completedProjectsResult = $conn->query($completedProjectsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background-color: black;
        }

        h1 {
            font-size: 3rem;
            text-align: center;
            margin-top: 2rem;
            margin-bottom: 2rem;
            background: -webkit-linear-gradient(#657, #444);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        h2 {
            color: white;
            margin-bottom: 1rem;
        }

        p {
            color: white;
        }

        .project-section1 {
            width: 50%;
            padding-left: 3rem;
            border-right: 2px solid white;
        }

        .project-section2 {
            width: 50%;
            padding-left: 3rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">RMS <sup>admin</sup></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav me-auto">
                <!-- for space purpose -->
            </div>

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

<h1>Admin Dashboard</h1>

<div class="content d-flex">

    <div class="project-section1">
        <h2>Ongoing Projects</h2>
        <?php
        if ($ongoingProjectsResult->num_rows > 0) {
            while ($row = $ongoingProjectsResult->fetch_assoc()) {
                $clientId = $row['client_id'];
                $clientName = getClientName($clientId, $conn);
                $projectId = $row['project_id'];

                echo "<div class='card mt-2 me-4'>";
                echo "<div class='card-header'>$clientName</div>";
                echo "<ul class='list-group list-group-flush'>";
                echo "<li class='list-group-item'>Description: {$row['descript']}</li>";
                echo "<li class='list-group-item'>Due Date: {$row['due_date']}</li>";
                echo "<li class='list-group-item'>Assigned Date: {$row['assigned_date']}</li>";
                echo "</ul>";

                echo "<div class='card-footer'>";
                echo "<button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal{$projectId}'>Remove Project</button>";
                echo "</div>";

                echo "<div class='modal fade' id='confirmDeleteModal{$projectId}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo "<div class='modal-content'>";
                echo "<div class='modal-header'>";
                echo "<h5 class='modal-title' id='exampleModalLabel'>Confirm Deletion</h5>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo "</div>";
                echo "<div class='modal-body'>";
                echo "Are you sure you want to remove this project?";
                echo "</div>";
                echo "<div class='modal-footer'>";
                echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
                echo "<form method='post' action='remove_project.php'>";
                echo "<input type='hidden' name='project_id' value='$projectId'>";
                echo "<button type='submit' class='btn btn-danger'>Confirm Deletion</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                echo "</div>";
            }
        } else {
            echo "<p>No ongoing projects.</p>";
        }
        ?>
    </div>

    <div class="project-section2">
    <h2>Completed Projects</h2>

<?php
if ($completedProjectsResult->num_rows > 0) {
    while ($row = $completedProjectsResult->fetch_assoc()) {
        $projectId = $row['project_id'];
        $clientId = $row['client_id'];
        $clientName = getClientName($clientId, $conn);

        echo "<div class='card mt-2 me-4'>";
        echo "<div class='card-header'>$clientName</div>";
        echo "<ul class='list-group list-group-flush'>";
        echo "<li class='list-group-item'>Description: {$row['descript']}</li>";
        echo "<li class='list-group-item'>Due Date: {$row['due_date']}</li>";
        echo "<li class='list-group-item'>Assigned Date: {$row['assigned_date']}</li>";
        echo "</ul>";

        echo "<div class='card-footer'>";
        echo "<button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#confirmDeleteModal{$projectId}'>Remove Project</button>";
        echo "</div>";

        echo "<div class='modal fade' id='confirmDeleteModal{$projectId}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
        echo "<div class='modal-dialog'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title' id='exampleModalLabel'>Confirm Deletion</h5>";
        echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "Are you sure you want to remove this project?";
        echo "</div>";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
        echo "<form method='post' action='remove_project.php'>";
        echo "<input type='hidden' name='project_id' value='$projectId'>";
        echo "<button type='submit' class='btn btn-danger'>Confirm Deletion</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "</div>";
    }
} else {
    echo "<p>No completed projects.</p>";
}
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
