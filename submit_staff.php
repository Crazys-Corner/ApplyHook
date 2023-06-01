<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form fields
  $name = $_POST['name'];
  $email = $_POST['email'];
  $discord = $_POST['discord'];
  $role = $_POST['role'];

  // Prepare the message payload as an embed
  $payload = [
    'embeds' => [
      [
        'title' => 'Application Form',
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
          ]
        ]
      ]
    ]
  ];

  // Send the message to Discord using a webhook
  $webhookUrl = 'YOUR_DISCORD_WEBHOOK_URL';
  $data = json_encode($payload);

  $ch = curl_init($webhookUrl);
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
    echo "There was an error submitting the form. Please try again.";
  } else {
    echo "Thank you for your application!";
  }
}
?>
