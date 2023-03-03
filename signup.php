<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'form';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()){
    exit('Error connecting to the database' . mysqli_connect_error());
}

if(isset($_POST['username'], $_POST['password'], $_POST['email'])){
    // Validate inputs
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        exit('Empty Field(s)');
    }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Invalid email');
    }
    if(!preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])) {
        exit('Invalid username');
    }
    if(strlen($_POST['password']) < 6) {
        exit('Password must be at least 6 characters long');
    }

    // Check if username already exists
    $stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?');
    if($stmt) {
        $stmt->bind_param('s', $_POST['username']);
        if($stmt->execute()) {
            $stmt->store_result();

            if($stmt->num_rows>0){
                exit('Username Already Exists. Try again');
            }
            else{
              // Insert new user into database
              $stmt = $con->prepare('INSERT INTO users(username, password, email) VALUES (?, ?, ?)');
              if($stmt) {
                  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                  $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                  if($stmt->execute()) {
                    echo "signup successful";
                  }
                  
                  else {
                      exit('Error occurred while registering the user');
                  }
              } 
              else{
                  exit('Error occurred while preparing the statement');
              }
            }
        }
        else {
            exit('Error occurred while executing the statement');
        }
    }
    else {
        exit('Error occurred while preparing the statement');
    }
   
}

?>
