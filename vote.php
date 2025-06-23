<?php
session_start();

if (!isset($_SESSION['email'])) {
    // No session means user hasn't come through login
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cast Your Vote</title>
  <style>
    body { font-family: Arial; text-align: center; background: #f0f8ff; padding: 50px; }
    form { display: inline-block; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    label { display: block; margin: 10px 0; }
    button { margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
  </style>
</head>
<body>
  <h2>Vote for Your Candidate</h2>
  <form action="submit_vote.php" method="POST">
    <label><input type="radio" name="candidate_id" value="1" required> Alice Johnson</label>
    <label><input type="radio" name="candidate_id" value="2"> Bob Smith</label>
    <label><input type="radio" name="candidate_id" value="3"> Charlie Kim</label>
    <button type="submit">Submit Vote</button>
  </form>
</body>
</html>
