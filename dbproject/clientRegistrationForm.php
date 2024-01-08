<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
    
        html, body{
            height: 100%;
            width: 100%;
            box-sizing: border-box;
            background-color: whitesmoke;
        }
    
        .wrapper{
            width: 100%;
            margin-top: 3rem;
        }


        h1 {
            font-size: 3rem;
            text-align: center;
            margin-top: 2rem;
            background: -webkit-linear-gradient(#888, #333); /* Adjust the color values */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .tag{
          font-family: 'Courier New', Courier, monospace;
          text-align: center;
          font-weight: 900;
        }


    </style>    

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
    <a class="navbar-brand" href="#"> <h2><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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

<h1>Registration Form.</h1>
<p class="tag">Join us now and secure your future.</p>


        <div class="wrapper px-5">

            <form class="row g-3" method="post" action="clientRegistration.php">
        <div class="col-md-4">
            <label for="validationDefault01" class="form-label">First name</label>
            <input type="text" name="fname" class="form-control" id="validationDefault01" placeholder="Shuja" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Mid name</label>
            <input type="text" name="mname" class="form-control" id="validationDefault02" placeholder="Uz" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Last name</label>
            <input type="text" name="lname" class="form-control" id="validationDefault02" placeholder="Zaman" required>
        </div>
        
        <div class="col-md-6">
            <label for="validationDefault03" class="form-label">Email</label>
            <input type="email" name="email" placeholder="info@gmail.com" class="form-control" id="validationDefault03" required>
        </div>
        <div class="col-md-6">
            <label for="validationDefault03" class="form-label">Password</label>
            <input type="password" name="password" placeholder="" class="form-control" id="validationDefault03" required>
        </div>
        
        <div class="col-12">
        <p>Already a member? <a href="clientLoginForm.php" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Login Now</a></p>
        </div>
        <div class="col-12">
            <button class="btn btn-outline-dark" type="submit">Submit form</button>
        </div>
        </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>