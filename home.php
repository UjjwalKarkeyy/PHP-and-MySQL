<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location: login.php');
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./main.css">
</head>

<body>
  <div class="home d-flex align-items-center justify-content-between container-fluid p-4">
    <h1 class="ps-3">
      <?php
      echo "Welcome " . ucfirst($username) . "!";
      ?>
    </h1>
    <a href="./logout.php" class="logoutbtn btn btn-primary me-3">
      Logout
      <?php
      ?>
    </a>
  </div>

</body>

</html>