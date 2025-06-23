<?php
// otp.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];

    // Save email to session
    session_start();
    $_SESSION['email'] = $email;

    // Redirect to OTP form
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Enter OTP</title>
  <style>
    body { font-family: Arial; text-align: center; background: #eef2f3; padding: 50px; }
    input { margin: 10px; padding: 10px; width: 200px; }
    button { padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer; }
  </style>
</head>
<body>
  <h2>OTP Verification</h2>
  <p>(Simulated - enter any 6 digit OTP)</p>
  <form action="vote.php" method="POST">
    <input type="text" name="otp" placeholder="Enter OTP" required><br>
    <button type="submit">Verify OTP</button>
  </form>
</body>
</html>
