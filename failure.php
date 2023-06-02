<?php 
if (!file_exists('config.php')) {
  header('location: setupnotstarted.php');
  exit; // Ensure the script stops execution after the redirect
}
require('config.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
  <nav class="navbar navbar-expand-lg fixed-top navbar-scroll desktop-navigation">
    <div class="container-fluid d-flex justify-content-between">

      <a class="navbar-brand link-light" href="index.php" style="padding: 5px;">AOC RP</a>

    
        <!-- Left links -->
        <ul class="navbar-nav">
         
        </ul>
        <!-- Left links -->
        
        <!-- Right Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link link-light" href="#" 
              >Shop</a>
          </li>
        <li class="nav-item">
            <a class="nav-link link-light" href="#" 
              >Help</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-light" href="#" 
              >Menu</a>
          </li>

        </ul>
    </div>


  </nav>
  
  </div>
<div class="text-center">

    <h1 class="text-center text-danger" style="margin-top: 25vh;">Failure</h1>
    <h5 class="text-center">Your application has NOT been submitted. Please try again. If issue persists, please contact your website's administrator, or visit the <a href="https://github.com/Crazys-Corner/Discord-Webhook-Forms" target="_blank">Github</a> repository for more.</h5>
    <a href="index.php" class="text-white btn btn-primary" style="margin-top: 10vh;">Click here to go back to the application page.</a>
</div>


</body>
</html>
