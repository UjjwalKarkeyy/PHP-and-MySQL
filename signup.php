<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['psw'];
  $signup_success = 0;
  $user_exists = 0;

    $check = "select * from `registration` where username = '$username'";
    $result = $conn->query($check);

    if($result)
    {
      $num = mysqli_num_rows($result);
      if($num != 0)
      {
        $user_exists = 1;
      }

      else
      {
        $sql = "insert into `registration`(username, password) values('$username', '$password')";
        $result = $conn->query($sql);
        if($result)
        {
          $signup_success = 1;
        }

        // else
        // {
        //   echo "Registration Failed! Try again later!"; // add this to php
        // }
      }
    }

    else
      echo "ERROR during registration!";
}
?>

<?php

if($user_exists)
{
  echo'<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Warning!</strong> Username already exists.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if($signup_success)
{
  echo'<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Successful!</strong> You are successfully signed up.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="/main.css">
</head>

<body>

  <form action="/signup.php" method="POST">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label>
        <input type="checkbox" name="remember" style="margin-bottom:15px" required> By creating an account you agree to our Terms
        & Privacy
      </label>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>

</body>

</html>