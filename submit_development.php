<?php
if (!file_exists('config.php')) {
  header('location: setupnotstarted.php');
  exit; // Ensure the script stops execution after the redirect
}
require ('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form fields
  $name = $_POST['name'];
  $email = $_POST['email'];
  $discord = $_POST['discord'];
  $role = $_POST['role'];
  $knowledge = $_POST['knowledge'];
  $workPutIn = $_POST['work_put_in'];
  $blacklist = $_POST['blacklist-yes'];
  $why_apply = $_POST['why_apply'];
  $previous = $_POST['previous_exp'];
  $about = $_POST['Tell us about yourself'];
  $strengths = $_POST['What are your strengths and weaknesses?'];
  // Prepare the message payload as an embed
  $payload = [
    'embeds' => [
      [
        "color" => hexdec( "#621cc9" ),
        'title' => 'Development Application',
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
          ['name' => 'About them',
          'value' => $about 
        ],
        ['name' => 'Strengths and Weaknesses', 
          'value' => $strengths
      ],
          [
            'name' => 'Role',
            'value' => $role
          ],
          [
            'name' => 'Knowledge',
            'value' => $knowledge
          ],
          [
            'name' => 'Work They Are Willing to Do',
            'value' => $workPutIn
          ],
          [
            'name' => 'Why They Applied',
            'value' => $why_apply
          ],
          [
            'name' => 'Their Previous Experiences',
            'value' => $previous
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
    header('location: failure.php');
  } else {
    header('location: success.php');
  }
}
?>
