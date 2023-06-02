<?php
  require ('config.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the form fields
  $name = $_POST['name'];
  $email = $_POST['email'];
  $discord = $_POST['discord'];
  $role = $_POST['role'];
  $previous = $_POST['previous_exp'];
  $why_apply = $_POST['why_apply'];
  $blacklist = $_POST['blacklist-yes'];

  
  // Prepare the message payload as an embed
  $payload = [
    'embeds' => [
      [
        "color" => hexdec( "#03f8fc" ),
        'title' => 'Staff Application',
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
          ]
        ]
      ]
    ]
  ];

  // Send the message to Discord using a webhook
  
  $data = json_encode($payload);
  $discordWebhookURL = getenv('DISCORD_WEBHOOK_URL');
  
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
    header('location: failure.html');
  } else {
    header('location: success.html');
  }
}
?>
