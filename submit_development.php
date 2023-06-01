<?php
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
  $webhookUrl = 'https://discord.com/api/webhooks/1113089573354999869/X2ZkhLAvsaIqHYuRtzXtMpKxrrJHp3xn6br-yKfjkEa1fqI5l_85TknsdtUdIZ3aut83';
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