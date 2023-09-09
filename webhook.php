<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $webhook = $_POST['webhook'];
    $branding = $_POST['branding'];
    $profilePicture = $_POST['profile_picture'];
    $webhookName = $_POST['webhook_name'];
    $shoplink = $_POST['shop_link'];
    $helplink = $_POST['help_link'];

    // Generate the PHP code
    $phpCode = <<<EOT
<?php
const DISCORD_WEBHOOK_URL = '$webhook';
const BRANDING_TEXT = '$branding';
const PROFILE_PICTURE_URL = '$profilePicture';
const WEBHOOK_NAME = '$webhookName';
const HELP = '$helplink';
const SHOP = '$shoplink';
?>
EOT;

    // Save the generated code to a file
    $filename = 'config.php'; // Adjust the filename as needed
    file_put_contents($filename, $phpCode);

    echo "Setup script completed. File created: $filename";
}

    // Delete the setup.php file & setupnotstarted.php file
    unlink('setup.php');
    unlink('setupnotstarted.php');
    
?>
