<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['psw'];

  try{
  $sql = "insert into `registration`(username,password) values('$username','$password')";
  $result = mysqli_query($conn,$sql);

  if($result)
  {
    echo "Registration Successful";
  } 

  else
    echo "ERROR: ". mysqli_error($conn);
}

  catch (mysqli_sql_exception $e)
  {
    if($e ->getCode() == 1062)
    {
      echo "Username already exists";
    }    

    else
    {
      echo "ERROR: " . $e->getMessage();
    }
  }
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
        <input type="checkbox" name="remember" style="margin-bottom:15px"> By creating an account you agree to our Terms & Privacy
      </label>

      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>

</body>

</html>
