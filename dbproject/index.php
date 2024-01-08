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
          background-color: whitesmoke;
        }
        
        h1 {
          font-family: 'Courier New', Courier, monospace;
            font-size: 3rem;
            font-weight: 900;
            text-align: center;
            margin-top: 2rem;
            color: navy;
          }
        .tag{
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bolder;
            font-size: larger;    
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
          box-shadow: 5px 5px 10px #888888;
          cursor: pointer;
        }

        .para{
          text-align: center;

        }

        
    </style>

    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h2><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
  <path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>
</svg>RMS</h2></a>
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
    <h1>RaheeMaaz Software House.</h1>
    <p class="tag">'We have solution to all your problems'</p>

    <!-- carousal -->
<div class="container">
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2000">
      <img src="images/carousal1.png" class="d-block w-100 object-fit-cover" style="height: 65vh;" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/carousal2.png" class="d-block w-100  object-fit-cover" style="height: 65vh;" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/carousal3.png" class="d-block w-100 object-fit-cover" style="height: 65vh;" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
      </div>

      <hr>

      <!-- moto section -->
        <div class="container moto-section" style="padding: 30px;">
          <h1>Our Moto.</h1>
          <p class="para">At RaheeMaaz Software House, we are dedicated to delivering innovative solutions with exceptional quality. <br> Our commitment revolves around exceeding client expectations and ensuring their utmost satisfaction. <br> Through a blend of creativity, expertise, and customer-centric focus, we strive to provide software solutions that not only meet but <br> exceed the unique needs of our clients. "Innovative Solutions, Exceptional Quality, Customer Satisfaction" is not just <br> a motto; it's the guiding principle that propels us forward in our journey to offer excellence in every project we undertake.</p>
        </div>
      
<hr>

      <!-- cards -->
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card" style="width: 20rem;">
      <img src="images/adminDP.jpeg" class="card-img-top object-fit-cover"  alt="...">
      <div class="card-body ">
        <h5 class="card-title">Admin</h5>
        <p class="card-text">Admin can see all the projects that are going on and also the projects that are completed. Admin has the authority to drop any project.</p>
        <a href="adminRegistrationForm.php" class="btn btn-primary">Register</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 20rem;">
      <img src="images/empDP.jpeg" class="card-img-top object-fit-cover" alt="...">
      <div class="card-body">
        <h5 class="card-title">Employee</h5>
        <p class="card-text">Employees work on the projects submitted by the clients. With their skills, they complete the tasks </p>
        <a href="employeeRegistrationForm.php" class="btn btn-primary">Register</a>
    </div>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 20rem;">
      <img src="images/clientDP.jpeg" class="card-img-top object-fit-cover" alt="...">
      <div class="card-body">
        <h5 class="card-title">Client</h5>
        <p class="card-text">Clients submit the projects to the software house and provide their own budget.</p>
        <a href="clientRegistrationForm.php" class="btn btn-primary">Register</a>
    </div>
    </div>
  </div>
  
</div>
</div>
     


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>