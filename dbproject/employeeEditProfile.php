<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    .tag {
        font-family: 'Courier New', Courier, monospace;
        text-align: center;
        font-weight: 900;
    }

    h1 {
        font-size: 3rem;
        text-align: center;
        margin-top: 2rem;
        background: -webkit-linear-gradient(#888, #333);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<body>
    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
  <path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>
</svg>RMS <sup>admin</sup></a>
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
                        <a class="nav-link active btn btn-outline-primary text-light" href="logout.php">Log out</a>
                    </li>
                    
                </ul>
            </span>
        </div>
    </div>
</nav>

    <h1>Edit Profile</h1>
    <p class="tag">Your details are safe in our hand.</p>

    <div class="wrapper px-5">
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

        // Get employee email from the session
        $emp_email = $_SESSION['emp_email'];

        // Retrieve employee_id from the employee table using emp_email
        $getEmployeeIDQuery = "SELECT employee_id FROM employee WHERE email = '$emp_email'";
        $employeeIDResult = $conn->query($getEmployeeIDQuery);

        if ($employeeIDResult && $employeeIDResult->num_rows > 0) {
            $employeeID = $employeeIDResult->fetch_assoc()['employee_id'];

            // Retrieve employee details from the names table using employee_id
            $getEmployeeDetailsQuery = "SELECT first_name, mid_name, last_name FROM names WHERE id = '$employeeID'";
            $employeeDetailsResult = $conn->query($getEmployeeDetailsQuery);

            if ($employeeDetailsResult && $employeeDetailsResult->num_rows > 0) {
                $employeeDetails = $employeeDetailsResult->fetch_assoc();

                // Display the form with pre-filled values
                ?>
                <form class="row g-3" method="post" action="employeeEditProfile.php">
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">First name</label>
                        <input type="text" name="fname" class="form-control" id="validationDefault01" placeholder="Shuja" value="<?php echo $employeeDetails['first_name']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Mid name</label>
                        <input type="text" name="mname" class="form-control" id="validationDefault02" placeholder="Uz" value="<?php echo $employeeDetails['mid_name']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Last name</label>
                        <input type="text" name="lname" class="form-control" id="validationDefault02" placeholder="Zaman" value="<?php echo $employeeDetails['last_name']; ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="validationDefault03" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="validationDefault03" value="<?php echo $emp_email; ?>" required readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault03" class="form-label">New Email</label>
                        <input type="email" name="new_email" class="form-control" id="validationDefault03" value="<?php echo $emp_email; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault03" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="validationDefault03" required>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-outline-dark" type="submit">Save</button>
                    </div>
                </form>
                <?php
            } else {
                echo "Error fetching employee details from the names table.";
            }
        } else {
            echo "Error fetching employee ID from the employee table.";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $new_fname = $_POST["fname"];
            $new_mname = $_POST["mname"];
            $new_lname = $_POST["lname"];
            $new_email = $_POST["new_email"];
            $new_password = $_POST["password"];
        
            // Update employee details in the names table
            $updateEmployeeQuery = "UPDATE names SET first_name='$new_fname', mid_name='$new_mname', last_name='$new_lname' WHERE id='$employeeID'";
            if ($conn->query($updateEmployeeQuery) === TRUE) {
                // Update employee email in the employee table
                $updateEmailQuery = "UPDATE employee SET email='$new_email' WHERE employee_id='$employeeID'";
                if ($conn->query($updateEmailQuery) === TRUE) {
                    // Update session variable with the new email
                    $_SESSION['emp_email'] = $new_email;
                    
                    // Update employee password in the employee table
                    $updatePasswordQuery = "UPDATE employee SET pass='$new_password' WHERE employee_id='$employeeID'";
                    if ($conn->query($updatePasswordQuery) === TRUE) {
                        echo "Profile updated successfully!";
                        
                        
                        exit();
                    } else {
                        echo "Error updating password: " . $conn->error;
                    }
                } else {
                    echo "Error updating email: " . $conn->error;
                }
            } else {
                echo "Error updating employee details: " . $conn->error;
            }
        
        }

        $conn->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
