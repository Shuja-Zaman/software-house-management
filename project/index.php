<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <style>
        body{
            background-color: black;
        }
        h3{
            text-align: center;
            margin-top: 2rem;
            color: white;
        }
        h1 {
            font-size: 3rem;
            text-align: center;
            margin-top: 2rem;
            background: -webkit-linear-gradient(#333, #666); /* Adjust the color values */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .tag{
            text-align: center;
            color: white;
        }

        .row{
            margin-top: 1rem;
            width: 100%;
            padding-left: 1rem;
            margin-bottom: 2rem;
        }

        .card{
          transition: 0.4s ease-in-out;
        }

        .card:hover{
          scale: 1.1;
          transition: 0.5s ease-in-out;
        }
    </style>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RMS</a>
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contact.php">Contact us</a>
        </li>
      </ul>
      </span>
</div>
  </div>
</nav>

    <!-- body -->
    <h1>RaheeMaaz Software House</h1>
    <p class="tag">We have solution to all your problems</p>
    <h3>Select Role</h3>

    <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="images/adminDP.jpeg" class="card-img-top" alt="...">
      <div class="card-body ">
        <h5 class="card-title">Admin</h5>
        <p class="card-text">Admin can see all the projects that are going on and also the projects that are completed. Admin has the authority to drop any project.</p>
        <a href="adminRegistrationForm.php" class="btn btn-primary">Register</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="images/empDP.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Employee</h5>
        <p class="card-text">Employees work on the projects submitted by the clients. </p>
        <a href="employeeRegistrationForm.php" class="btn btn-primary">Register</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="images/clientDP.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Client</h5>
        <p class="card-text">Clients submit the projects to the software house and provide their own budget.</p>
        <a href="clientRegistrationForm.php" class="btn btn-primary">Register</a>
    </div>
    </div>
  </div>
  
</div>
    


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>