<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['psw'];

    $check = "select * from `registration` where username = '$username'";
    $result = $conn->query($check);

    if($result)
    {
      $num = mysqli_num_rows($result);
      if($num != 0)
      {
        echo "Username alrady exists!";
      }

      else
      {
        $sql = "insert into `registration`(username, password) values('$username', '$password')";
        $result = $conn->query($sql);
        if($result)
        {
          echo "Registration Successfull!";
        }

        else
        {
          echo "Registration Failed! Try again later!";
        }
      }
    }

    else
      echo "ERROR during registration!";
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