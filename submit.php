<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Prepare the payload to be sent to Discord Webhook
  $payload = [
    'content' => "New form submission:\nName: $name\nEmail: $email",
  ];

  // Make the HTTP POST request to Discord Webhook URL
  $ch = curl_init('https://discord.com/api/webhooks/1113089573354999869/X2ZkhLAvsaIqHYuRtzXtMpKxrrJHp3xn6br-yKfjkEa1fqI5l_85TknsdtUdIZ3aut83');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);

  if ($response === false) {
    echo 'Error sending form data to Discord';
  } else {
    echo 'Form submitted successfully';
  }
}
?>
