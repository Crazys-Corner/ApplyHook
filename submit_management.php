<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form fields
  $name = $_POST['name'];
  $email = $_POST['email'];
  $discord = $_POST['discord'];
  $role = $_POST['role'];
  $previousExp = isset($_POST['previous_exp']) ? $_POST['previous_exp'] : '';
  $whyApply = $_POST['why_apply'];
  $isStaff = $_POST['is-staff'];
  $moreWork = isset($_POST['more-work']) ? $_POST['more-work'] : '';
  $blacklistYes = $_POST['blacklist-yes'];

  // Prepare the message payload as an embed
  $payload = [
    'embeds' => [
      [
        "color" => hexdec( "#ff005d" ),
        'title' => 'Management Application',
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
            'name' => 'Previous Experience in Management',
            'value' => $previousExp
          ],
          [
            'name' => 'Why are you applying for a Management Position',
            'value' => $whyApply
          ],
          [
            'name' => 'Are you currently a staff member?',
            'value' => $isStaff
          ],
          [
            'name' => 'Are you aware that you might be asked to do some light development work?',
            'value' => $moreWork
          ],
          [
            'name' => 'Are you aware that any forms of abuse will result in permanent blacklisting?',
            'value' => $blacklistYes
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
