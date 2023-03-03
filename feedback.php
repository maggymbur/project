<?php error_reporting(0);?>
<?php
  $con = mysqli_connect('localhost','root');

  if($con) {
      echo "connection successful";
  }
  else {
      echo"connection failed";
  }

  mysqli_select_db($con, 'photography');

  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];

  $query = "INSERT INTO users (name, email, number) VALUES('$name', '$email', '$number' )";

  mysqli_query($con, $query);
  header('location:index.htm');
?>
