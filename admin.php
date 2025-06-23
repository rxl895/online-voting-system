<?php
require 'config/db_config.php';

// Fetch candidates and vote counts
$query = "SELECT name, votes FROM candidates";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard - Voting Results</title>
  <style>
    body { font-family: Arial; background: #f3f3f3; text-align: center; padding: 40px; }
    table { margin: auto; background: white; border-collapse: collapse; width: 50%; }
    th, td { border: 1px solid #ccc; padding: 12px; text-align: center; }
    th { background: #007bff; color: white; }
  </style>
</head>
<body>
  <h2>🗳️ Voting Results</h2>
  <table>
    <tr>
      <th>Candidate</th>
      <th>Votes</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo $row['votes']; ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>

<?php
$conn->close();
?>
