<?php
require_once 'config.php'; // Use require_once instead of require for better error handling

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Validate and sanitize form fields
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $discord = filter_input(INPUT_POST, 'discord', FILTER_SANITIZE_STRING);
  $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
  $previous = filter_input(INPUT_POST, 'previous_exp', FILTER_SANITIZE_STRING);
  $why_apply = filter_input(INPUT_POST, 'why_apply', FILTER_SANITIZE_STRING);
  $blacklist = filter_input(INPUT_POST, 'blacklist-yes', FILTER_SANITIZE_STRING);
  $why_hire = filter_input(INPUT_POST, 'whyhire', FILTER_SANITIZE_STRING);
  $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_STRING);
  $strengths = filter_input(INPUT_POST, 'strengths', FILTER_SANITIZE_STRING);

  // Validate required fields
  $requiredFields = [
    'name' => $name,
    'email' => $email,
    'discord' => $discord,
    'role' => $role,
    'about' => $about,
    'strengths' => $strengths
  ];

  $missingFields = [];
  foreach ($requiredFields as $field => $value) {
    if (empty($value)) {
      $missingFields[] = $field;
    }
  }

  if (!empty($missingFields)) {
    // Redirect to an error page with the list of missing fields
    $errorMessage = 'The following fields are required: ' . implode(', ', $missingFields);
    header('Location: error.php?message=' . urlencode($errorMessage));
    exit;
  }

  // Prepare the message payload as an embed
  $payload = [
    'embeds' => [
      [
        'color' => hexdec('03f8fc'),
        'title' => 'Staff Application',
        'avatar_url' => PROFILE_PICTURE_URL,
        'username' => WEBHOOK_NAME,
        'fields' => [
          [
            'name' => 'Name',
            'value' => $name
          ],
          [
            'name' => 'Email',
            'value' => $email
          ],
          [
            'name' => 'Discord Username & Tagline',
            'value' => $discord
          ],
          [
            'name' => 'About them',
            'value' => $about
          ],
          [
            'name' => 'Strengths and Weaknesses',
            'value' => $strengths
          ],
          [
            'name' => 'Role',
            'value' => $role
          ],
          [
            'name' => 'Previous Experience',
            'value' => $previous
          ],
          [
            'name' => 'Why they applied',
            'value' => $why_apply
          ],
          [
            'name' => 'Agreed to No Abuse',
            'value' => $blacklist
          ],
          [
            'name' => 'Why we should hire over others',
            'value' => $why_hire
          ]
        ]
      ]
    ]
  ];

  // Send the message to Discord using a webhook
  $data = json_encode($payload);
  $discordWebhookURL = DISCORD_WEBHOOK_URL;

  $ch = curl_init($discordWebhookURL);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data)
  ]);

  $result = curl_exec($ch);
  curl_close($ch);

  // Check if the message was sent successfully
  if ($result === false) {
    //header('Location: failure.php');
    $error = curl_error($ch);
    echo "cURL error: " . $error;
  } else {
    header('Location: success.php');
   // ^^ Comment above out for debug if it's not sending to discord ^^
    echo("success");
   echo("<br>");
   echo("Discord Webhook URL: ");
   echo ('DISCORD_WEBHOOK_URL');
   echo ("<br>");
   echo("VAR DUMP FOLLOWING:");
   echo("<br>");
   var_dump($_POST); // Display the entire $_POST array for debugging purposes
  }
} else {
  header('Location: setupnotstarted.php');
  exit;
}
?>
