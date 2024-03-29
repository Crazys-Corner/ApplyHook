<?php 
if (!file_exists('config.php')) {
  header('location: setupnotstarted.php');
  exit; // Ensure the script stops execution after the redirect
}
require ('config.php');

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

      <a class="navbar-brand link-light" href="index.php" style="padding: 5px;"><?php echo (BRANDING_TEXT); ?></a>

    
        <!-- Left links -->
        <ul class="navbar-nav">
         
        </ul>
        <!-- Left links -->
        
        <!-- Right Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link link-light" href="<?php echo (SHOP);?>" 
              >Shop</a>
          </li>
        <li class="nav-item">
            <a class="nav-link link-light" href="<?php echo (HELP);?>" 
              >Help</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-light" href="#" 
              >Menu</a>
          </li>

        </ul>
    </div>


  </nav>
  <div class="container py-5">
    <h1>Application Form</h1>
    <form id="application-form" method="POST">
      <!-- Rest of the form code -->
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="discord" class="form-label">Discord Username &amp; Tagline:</label>
        <input type="text" class="form-control" id="discord" name="discord" required>
      </div>
      <!-- Role selection -->
      <div class="mb-3">
        <label class="form-label">Role you are applying for:</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="role-development" value="Development" required>
          <label class="form-check-label" for="role-development">
            Development
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="role-staff" value="Staff" required>
          <label class="form-check-label" for="role-staff">
            Staff
          </label>
        </div>
      </div>
      <div class="mb-3">
        <label for="tellus" class="form-label">Tell us about yourself:</label>
        <input type="text" class="form-control" id="tellus" name="about">
      </div>
      <div class="mb-3">
        <label for="sw" class="form-label">What are your strengths and weaknesses:</label>
        <input type="text" class="form-control" id="sw" name="strengths">
      </div>
      <!-- Additional fields based on role -->
      <div id="additional-fields"></div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <footer class="text-center" style="margin-top: 25vh; font-size: small;">
    <span><a href="https://github.com/Crazys-Corner" target="_blank">Written By crazy's_corner</a> <br> <br> This is open source, FREE software, please don't delete this footer & please don't redistribute.</span>
  </footer>
  <script>
    // Function to handle the change event on the role radio buttons
    function handleRoleChange() {
      var additionalFields = document.getElementById('additional-fields');
      additionalFields.innerHTML = '';

      // Get the selected role
      var selectedRole = document.querySelector('input[name="role"]:checked').value;

      // Check if additional fields should be added based on the selected role
      if (selectedRole === 'Development') {
        additionalFields.innerHTML = `
        <!-- Additional fields for Development role -->
          <div class="mb-3">
            <label for="previous-exp" class="form-label">Previous experience in Development from previous servers, or other endeavors:</label>
            <textarea class="form-control" id="previous-exp" name="previous_exp"></textarea>
          </div>
          <div class="mb-3">
            <label for="work-put-in" class="form-label">Work you are willing to put in, what days, what you are looking to do, etc:</label>
            <textarea class="form-control" id="work-put-in" name="work_put_in"></textarea>
          </div>
          <div class="mb-3">
            <label for="knowledge" class="form-label">What you know about Development, whether it be NPCs, Map or Server-Sided:</label>
            <textarea class="form-control" id="knowledge" name="knowledge"></textarea>
          </div>
          <div class="mb-3">
            <label for="why-apply" class="form-label">Why are you applying for a Developer Position:</label>
            <textarea class="form-control" id="why-apply" name="why_apply" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Are you aware that any forms of abuse will result in permanent blacklisting?</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="blacklist-yes" id="blacklist-accept" value="Yes" required>
              <label class="form-check-label" for="blacklist-accept">
                Yes
              </label>
            </div>
          </div>
        `;;
        document.getElementById('application-form').action = 'submit_development.php';
      } else {
        additionalFields.innerHTML = `
          <div class="mb-3">
            <label for="previous-exp" class="form-label">Previous experience in Staff:</label>
            <textarea class="form-control" id="previous-exp" name="previous_exp"></textarea>
          </div>
          <div class="mb-3">
        <label for="why-apply" class="form-label">Why are you applying for a Staff Position:</label>
        <textarea class="form-control" id="why-apply" name="why_apply" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Do you understand that you will have to complete a staff training?</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="stafftrain-yes" id="stafftrain-accept" value="Yes" required>
          <label class="form-check-label" for="stafftrain-accept">
            Yes
          </label>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Are you aware that any forms of abuse will result in permanant blacklisting?</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="blacklist-yes" id="blacklist-accept" value="Yes" required>
          <label class="form-check-label" for="blacklist-accept">
            Yes
          </label>
        </div>
      </div>
      <div class="mb-3">
            <label for="whyhire" class="form-label">Why should we hire you over another potential staff member?</label>
            <textarea class="form-control" id="whyhire" name="whyhire"></textarea>
          </div>
      
        `;
        document.getElementById('application-form').action = 'submit_staff.php';
      }
    }

    // Add event listener for the role radio buttons
    var roleRadios = document.querySelectorAll('input[name="role"]');
    roleRadios.forEach(function(radio) {
      radio.addEventListener('change', handleRoleChange);
    });

    // Initialize the form based on the initially selected role
    handleRoleChange();
  </script>
</body>
</html>
