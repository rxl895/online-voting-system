<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();



<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit();
}

$email = $_SESSION['email'];
$candidate_id = $_POST['candidate_id'];

// Connect to DB
require 'config/db_config.php';

// Check if the user has already voted
$check_query = "SELECT has_voted FROM voters WHERE email = ?";
$stmt = $conn->prepare($check_query);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($has_voted);
$stmt->fetch();
$stmt->close();

if ($has_voted) {
    echo "<h2>You have already voted!</h2>";
    exit();
}

// Record the vote
$vote_query = "UPDATE candidates SET votes = votes + 1 WHERE id = ?";
$stmt = $conn->prepare($vote_query);
$stmt->bind_param("i", $candidate_id);
$stmt->execute();
$stmt->close();

// Mark the voter as voted
$update_voter = "UPDATE voters SET has_voted = 1 WHERE email = ?";
$stmt = $conn->prepare($update_voter);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->close();

echo "<h2>Thank you! Your vote has been submitted.</h2>";
session_destroy();
?>
