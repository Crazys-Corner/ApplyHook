<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $webhook = $_POST['webhook'];
    $branding = $_POST['branding'];
    $profilePicture = $_POST['profile_picture'];
    $webhookName = $_POST['webhook_name'];

    // Generate the PHP code
    $phpCode = <<<EOT
<?php
putenv("DISCORD_WEBHOOK_URL={$webhook}");
putenv("BRANDING_TEXT={$branding}");
putenv("PROFILE_PICTURE_URL={$profilePicture}");
putenv("WEBHOOK_NAME={$webhookName}");
EOT;

    // Save the generated code to a file
    $filename = 'config.php'; // Adjust the filename as needed
    file_put_contents($filename, $phpCode);

    // Set the environmental variables for the current script execution
    putenv("DISCORD_WEBHOOK_URL={$webhook}");
    putenv("BRANDING_TEXT={$branding}");
    putenv("PROFILE_PICTURE_URL={$profilePicture}");
    putenv("WEBHOOK_NAME={$webhookName}");

    // Delete the setup.php file & setupnotstarted.php file
   unlink('setup.php');
   unlink('setupnotstarted.php');

    echo "Setup script completed. File created: $filename";
}
?>
