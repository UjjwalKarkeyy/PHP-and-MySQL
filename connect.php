<?php
    $HOSTNAME = 'localhost'; 
    $USERNAME = 'root';
    $PASSWORD = '4713';
    $DATABASE ='SignUpForm';

    $conn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

    if($conn)
    {
        echo "Connected!";
    }

    else
        die(mysqli_error($conn));
?>