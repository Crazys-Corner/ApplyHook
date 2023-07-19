
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

      <a class="navbar-brand link-light" href="index.php" style="padding: 5px;">Setup</a>
  </nav>
  
  </div>
  <div class="text-center" style="margin-top: 25vh; margin-left: 25vh; margin-right: 25vh;">
  <h1>Setup Script</h1>
  <form action="webhook.php" method="post">
      <label for="webhook"><h3>Discord Webhook Link:</h3></label>
      <input type="text" name="webhook" class="form-control" id="webhook" placeholder="EX: https://discord.com/api/webhooks/1234567890/a1b2c3d4e5f6ggjdhskjghslkjdghlksjhgskdjhgksjh_ghsjgdh1231" required>
      <label for="branding"><h3>Branding Text:</h3></label>
      <input type="text" name="branding" id="branding" class="form-control" placeholder="Server Name Here" required>
      <label for="profile_picture"><h3>Profile Picture URL:</h3></label>
<input type="text" name="profile_picture" id="profile_picture" class="form-control" placeholder="https://example.com/avatar.png">
<label for="webhook_name"><h3>Webhook Name:</h3></label>
<input type="text" name="webhook_name" id="webhook_name" class="form-control" placeholder="My Webhook Name">
      <input type="submit" value="Create" class="btn btn-danger" style="margin-top: 3vh; size: 5rem;"> <br>
      <small>Warning, upon clicking create, a file will be generated, and for security purposes, <span class="text-danger">this file will be deleted.</span> In order to change setup data, you will need to reupload the setup files, locatable on the <a href="https://github.com/Crazys-Corner/Discord-Webhook-Forms" target="_blank">GitHub</a>, starting setup again, will overwrite the existing Webhook code.  </small>
  </div>

  <footer class="text-center" style="margin-top: 25vh; font-size: small;">
    <span><a href="https://github.com/Crazys-Corner" target="_blank">Written By crazy's_corner</a> <br> <br> This is open source, FREE software, please don't delete this footer & please don't redistribute.</span>
  </footer>
</body>
</html>
