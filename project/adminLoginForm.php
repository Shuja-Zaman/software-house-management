<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin registration</title>
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
            background-color: black;
        }
    
        .wrapper{
            width: 100%;
            margin-top: 3rem;
        }

        label{
            color: white;
        }
        p{
            color: white;
        }

        h1 {
            font-size: 3rem;
            text-align: center;
            margin-top: 2rem;
            background: -webkit-linear-gradient(#888, #333); /* Adjust the color values */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
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

<h1>Login Form</h1>

        <div class="wrapper px-5">

            <form class="row g-3" method="post" action="adminLogin.php">
        
        <div class="col-md-12">
            <label for="validationDefault03" class="form-label">Email</label>
            <input type="email" name="email" placeholder="info@gmail.com" class="form-control" id="validationDefault03" required>
        </div>
        <div class="col-md-12">
            <label for="validationDefault03" class="form-label">Password</label>
            <input type="password" name="password" placeholder="" class="form-control" id="validationDefault03" required>
        </div>
        
        <div class="col-12">
        <p>Not a member? <a href="adminRegistrationForm.php" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Register Now</a></p>
        </div>
        <div class="col-12">
            <button class="btn btn-outline-light" type="submit">Submit form</button>
        </div>
        </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>