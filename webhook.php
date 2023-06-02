<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $webhook = $_POST['webhook'];

    // Generate the PHP code
    $phpCode = <<<EOT
<?php
putenv("DISCORD_WEBHOOK_URL={$webhook}");
EOT;

    // Save the generated code to a file
    $filename = 'config.php'; // Adjust the filename as needed
    file_put_contents($filename, $phpCode);

    // Set the environmental variable for the current script execution
    putenv("DISCORD_WEBHOOK_URL={$webhook}");

    // Delete the setup script
    unlink('setup.html');

    echo "Setup script completed. File created: $filename";
}
?>
