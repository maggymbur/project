<?php

  $con = mysqli_connect('localhost','root');

  if($con) {
      echo "connection successful";
  }
  else {
      echo"connection failed";
  }

  mysqli_select_db($con, 'feedback');

  $name = $_POST['name'];
  $email = $_POST['email'];
  $feedback = $_POST['feedback'];

  $query = "INSERT INTO users (name, email, feedback) VALUES('$name', '$email', '$feedback' )";

  mysqli_query($con, $query);
  header('location: feedback.htm');
exit(); // Make sure to exit the script after the redirect
?>