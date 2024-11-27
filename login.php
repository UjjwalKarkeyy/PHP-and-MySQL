<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    $username = $_POST['username'];
    $password = $_POST['psw'];
    $login = 0;
    $inavlid = 0;

    $check = "select * from `registration` where username = '$username' and password='$password'";
    $result = $conn->query($check);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num != 0) {
            $login = 1;
            session_start();
            $_SESSION['username'] = $username;
            header('location:home.php');
        } else {
            $invalid = 1;
        }
    }
}
?>

<?php

if ($invalid) {
    echo '<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Danger!</strong> Invalid username or password!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/main.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <form action="/login.php" method="POST">
        <div class="container w-50">
            <h1 class="text-center">Login</h1>
            <hr>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <div class="clearfix">
                <button type="submit" class="loginbtn">Login</button>
                <a href="./signup.php">
                    <button type="button" class="signupbtn">SignUp?</button>
                </a>
            </div>
        </div>
    </form>

</body>

</html>