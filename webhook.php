<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $webhook = $_POST['webhook'];
    $branding = $_POST['branding'];

    // Generate the PHP code
    $phpCode = <<<EOT
<?php
putenv("DISCORD_WEBHOOK_URL={$webhook}");
putenv("BRANDING_TEXT={$branding}");
EOT;

    // Save the generated code to a file
    $filename = 'config.php'; // Adjust the filename as needed
    file_put_contents($filename, $phpCode);

    // Set the environmental variables for the current script execution
    putenv("DISCORD_WEBHOOK_URL={$webhook}");
    putenv("BRANDING_TEXT={$branding}");

    // Delete the setup.html file
    unlink('setup.html');

    echo "Setup script completed. File created: $filename";
}
?>
